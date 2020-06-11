<?php

namespace App\Console\Commands;

use App\Brand;
use App\Car;
use App\CarImage;
use App\SiteBrand;
use App\Model;
use App\SiteModel;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AutoRiaParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:autoRia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $client = new Client();

        $dom = $this->getDom($this->getUrl(), $client);
        $html = $dom->html();

        $start = strpos($html, 'window.ria.server.resultsCountCommon = Number(');
        // 46 it's count character in "window.ria.server.resultsCountCommon = Number("
        $tempString = substr($html, $start + 46);
        $length = strpos($tempString, ');');

        $carCount = (int)substr($tempString, 0, $length);
        $pageCount = ceil($carCount / 100);

        for ($i = 0; $i <= $pageCount; $i++)
        {
            $pageDom = $this->getDom($this->getUrl($i), $client);
            $links = $pageDom->find('.ticket-title a');

            foreach ($links as $key => $value)
            {
                $src = trim(pq($value)->attr('href'));
                if ($src != '/uk{link}') {
//                    Car::firstOr(['url' => $src], function () use ($src, $client) {
                        $this->parseCar($src, $client);
//                    });
                }
            }

        }
    }

    protected function parseCar($url, Client $client)
    {
        $dom = $this->getDom($url, $client);

        $data['name'] = $dom->find('.auto-content_title')->text();
        $data['url'] = $url;
        $data['price'] = preg_replace('/\$| /', '', $dom->find('.price_value strong')->text());
        $data['distance'] = (int)preg_replace('/[^0-9]/', '', $dom->find('#description_v3 dl dd.mhide span.argument')->text()) * 1000;
        if ($dom->find('#description_v3 dl dd:eq(4) span.label')->text() == 'Коробка передач') {
            $data['gear'] = $dom->find('#description_v3 dl dd:eq(4) span.argument')->text();
        }
        $engineData = $dom->find('#description_v3 dl dd:eq(2) span.argument')->text();
        $engineData = explode(' • ', $engineData);
        if (isset($engineData[0], $engineData[1])) {
            $data['engine'] = $engineData[0];
            $data['fuel'] = $engineData[1];
        }
        $data['site_id'] = 1;

        $this->saveBrandAndBrand(
            trim($dom->find('#breadcrumbs .item:eq(3)')->text()),
            trim($dom->find('#breadcrumbs .item:eq(4)')->text()),
            $data
        );
//        var_dump($data);
//        die;
        $car = Car::create($data);

        $carId = $dom->find('body')->attr('data-auto-id');

        $request = new Request(
            'GET',
            "https://auto.ria.com/demo/bu/finalPage/photos/$carId?langId=4"
        );
        $response = $client->send($request);
        $imageJson = json_decode($response->getBody()->getContents());

        $i = 1;
        foreach ($imageJson->photo as $key => $item)
        {
            $name = Str::random() . basename($item->huge);
            CarImage::create([
                'name' => $name,
                'is_main' => $i === 1 ? 1 : 0,
                'car_id' => $car->getAttribute('id'),
            ]);

            Image::make($item->huge)->save(public_path('images/' . $name));
            $i++;
        }
    }

    private function getUrl($page = 0)
    {
        return "https://auto.ria.com/uk/search/?price.currency=1&abroad.not=0&custom.not=-1&page=$page&size=100";
    }

    private function getDom($url, Client $client)
    {
        $request = new Request('GET', $url);
        $response = $client->send($request);

        return \phpQuery::newDocumentHTML($response->getBody()->getContents());
    }

    private function saveBrandAndBrand($brandName, $modelName, &$data)
    {
        $brand = Brand::firstOrCreate([
            'name' => $brandName
        ]);

        $siteBrand = SiteBrand::firstOrCreate([
            'name' => $brand->getAttribute('name'),
            'brand_id' => $brand->getAttribute('id')
        ]);

        $model = Model::firstOrCreate([
            'name' => $modelName,
            'brand_id' => $brand->getAttribute('id'),
        ]);

        $siteModel = SiteModel::firstOrCreate([
            'name' => $model->getAttribute('name'),
            'model_id' => $model->getAttribute('id')
        ]);

        $data['site_brand_id'] = $siteBrand->getAttribute('id');
        $data['site_model_id'] = $siteModel->getAttribute('id');
    }
}
