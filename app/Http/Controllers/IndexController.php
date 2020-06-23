<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Car;
use App\Distance;
use App\Model;
use App\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $carsQuery = DB::table('car')
            ->leftJoin('site_brand', 'car.site_brand_id', '=', 'site_brand.id')
            ->leftJoin('brand', 'brand.id', '=', 'site_brand.brand_id')
            ->leftJoin('site_model', 'car.site_model_id', '=', 'site_model.id')
            ->leftJoin('model', 'model.id', '=', 'site_model.model_id')
            ->join('car_image', 'car.id', '=', 'car_image.car_id')
            ->where('car_image.is_main', '=', 1)
            ->select(['car.*', 'car_image.name as image']);

        if ($request->has('mileageFrom')) {
            $carsQuery->where('distance', '>=', $request->query('mileageFrom'));
        }

        if ($request->has('mileageTo')) {
            $carsQuery->where('distance', '<=', $request->query('mileageTo'));
        }

        if ($request->has('yearFrom')) {
            $carsQuery->where('year', '>=', $request->query('yearFrom'));
        }

        if ($request->has('yearTo')) {
            $carsQuery->where('year', '<=', $request->query('yearTo'));
        }

        if ($request->has('brand')) {
            $carsQuery->where('brand.id', '=', $request->query('brand'));
        }

        if ($request->has('brand')) {
            $models = Model::where('brand_id', '=', $request->query('brand'))->get();
        } else {
            $models = [];
        }

        $cars = $carsQuery->paginate(10);

        $brands = Brand::all();
        $years = Year::all();
        $distances = Distance::all();

        return view('index', compact('cars', 'brands', 'models', 'years', 'distances'));
    }

    public function models(Request $request)
    {

        $models = Model::where('brand_id', '=', $request->query('brand'))->get();

        $result = [];

        foreach ($models as $key => $model)
        {
            $result[] = [
                'name' => $model->getAttribute('name'),
                'value' => $model->id
            ];
        }

        return response($result);
    }
}
