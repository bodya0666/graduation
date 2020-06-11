<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Car;
use App\Model;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        $brands = Brand::all();
        $models = Model::all();


        return view('index', compact('cars', 'brands', 'models'));
    }
}
