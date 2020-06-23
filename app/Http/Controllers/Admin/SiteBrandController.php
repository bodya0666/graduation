<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\SiteBrand;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SiteBrandController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $siteBrands = SiteBrand::all();

        return view('admin.siteBrand.index', compact('siteBrands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $edit = false;

        return view('admin.siteBrand.form', compact('edit'));
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
            'brand_id' => 'required|max:255',
        ]);
        $show = SiteBrand::create($validatedData);

        return redirect('/admin/siteBrand')->with('success', 'SiteBrand Case is successfully saved');
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
        $siteBrand = SiteBrand::findOrFail($id);
        $edit = true;

        return view('admin.siteBrand.form', compact('siteBrand', 'edit'));
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
            'brand_id' => 'required|max:255',
        ]);
        SiteBrand::whereId($id)->update($validatedData);

        return redirect('/admin/siteBrand')->with('success', 'SiteBrand Case Data is successfully updated');
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
        $siteBrand = SiteBrand::findOrFail($id);
        $siteBrand->delete();

        return redirect('/admin/siteBrand')->with('success', 'SiteBrand Case Data is successfully deleted');
    }
}
