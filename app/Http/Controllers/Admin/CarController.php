<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Car;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CarController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $cars = Car::all();

        return view('admin.car.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $edit = false;

        return view('admin.car.form', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'url' => 'required|max:255',
            'distance' => 'required|max:255',
            'gear' => 'required|max:255',
            'fuel' => 'required|max:255',
            'engine' => 'required|max:255',
            'location' => 'max:255',
            'equipment' => 'max:255',
            'description' => 'max:255',
            'year' => 'max:255',
            'site_id' => 'max:255',
            'site_brand_id' => 'max:255',
            'site_model_id' => 'max:255',
        ]);
        $show = Car::create($validatedData);

        return redirect('/admin/car')->with('success', 'Car Case is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Factory|View
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $edit = true;

        return view('admin.car.form', compact('car', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'url' => 'required|max:255',
            'distance' => 'required|max:255',
            'gear' => 'required|max:255',
            'fuel' => 'required|max:255',
            'engine' => 'required|max:255',
            'location' => 'max:255',
            'equipment' => 'max:255',
            'description' => 'max:255',
            'year' => 'max:255',
            'site_id' => 'max:255',
            'site_brand_id' => 'max:255',
            'site_model_id' => 'max:255',
        ]);
        Car::whereId($id)->update($validatedData);

        return redirect('/admin/car')->with('success', 'Car Case Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect('/admin/car')->with('success', 'Car Case Data is successfully deleted');
    }
}
