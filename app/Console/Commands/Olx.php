<?php

namespace App\Console\Commands;

use App\Brand;
use App\Car;
use App\CarImage;
use App\Model;
use App\SiteBrand;
use App\SiteModel;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Olx extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parser:olx';

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

        $i = 1;
        while (true)
        {
            $dom = $this->getDom($this->getUrl($i), $client);
            $cars = $dom->find('.marginright5.link.linkWithHash.detailsLink');

            $urls = [];

            foreach ($cars as $key => $car)
            {
                $car = pq($car);

                $urls[] = $car->attr('href');
            }

            foreach ($urls as $key => $url)
            {
                $this->parseCar($url, $client);
            }

            $i++;
        }
    }

    protected function parseCar($url, Client $client)
    {
        $dom = $this->getDom($url, $client);

        $data = [];

        $data['name'] = trim($dom->find('h1')->text());
        $data['url'] = $url;
        $data['site_id'] = 2;
        $data['price'] = ceil(strval(str_replace(',', '.', preg_replace("/[^0-9.,]/", '', $dom->find('.pricelabel strong.pricelabel__value')->text()))));

        $carInfo = $dom->find('.offer-details__item');

        foreach ($carInfo as $key => $info)
        {
            $info = pq($info);

            $value = $info->find('.offer-details__value')->text();
            switch ($info->find('.offer-details__name')->text())
            {
                case 'Марка':
                    $brand = $value;
                    break;
                case 'Модель':
                    $model = $value;
                    break;
                case 'Рік випуску':
                    $data['year'] = $value;
                    break;
                case 'Вид палива':
                    $data['flue'] = $value;
                    break;
                case 'Об\'єм двигуна':
                    $data['engine'] = $value;
                    break;
                case 'Коробка передач':
                    $data['gear'] = $value;
                    break;
                case 'Пробіг':
                    $data['distance'] = $value;
                    break;
            }
        }
        if (isset($brand, $model)) {
            $this->saveBrandAndModel($brand, $model, $data);
        }

        $car = Car::create($data);

        $images = $dom->find('#descGallery a');

        $i = 1;
        foreach ($images as $key => $image)
        {
            $image = pq($image);

            $imageUrl = $image->attr('href');
            $name = Str::random() . basename($imageUrl);
            CarImage::create([
                'name' => $name,
                'is_main' => $i === 1 ? 1 : 0,
                'car_id' => $car->getAttribute('id'),
            ]);

            Image::make($imageUrl)->save(public_path('images/' . $name));
            $i++;
        }
    }

    private function getUrl($page = 1)
    {
        return "https://www.olx.ua/uk/transport/legkovye-avtomobili/?page=$page";
    }

    private function getDom($url, Client $client)
    {
        $request = new Request('GET', $url);
        $response = $client->send($request, [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.106 Safari/537.36',
                'Referer' => 'https://rst.ua/ukr/oldcars/?task=newresults&make%5B%5D=0&year%5B%5D=0&year%5B%5D=0&price%5B%5D=0&price%5B%5D=0&engine%5B%5D=0&engine%5B%5D=0&gear=0&fuel=0&drive=0&condition=0&from=sform',
            ]
        ]);

        return \phpQuery::newDocumentHTML($response->getBody()->getContents());
    }

    private function saveBrandAndModel($brandName, $modelName, &$data)
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
