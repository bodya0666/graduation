<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\SiteModel;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SiteModelController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $siteModels = SiteModel::all();

        return view('admin.siteModel.index', compact('siteModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $edit = false;

        return view('admin.siteModel.form', compact('edit'));
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
            'model_id' => 'required|integer',
        ]);
//        var_dump($validatedData);die;
        $show = SiteModel::create($validatedData);

        return redirect('/admin/siteModel')->with('success', 'SiteModel Case is successfully saved');
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
        $siteModel = SiteModel::findOrFail($id);
        $edit = true;

        return view('admin.siteModel.form', compact('siteModel', 'edit'));
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
            'model_id' => 'required|integer',
        ]);
        SiteModel::whereId($id)->update($validatedData);

        return redirect('/admin/siteModel')->with('success', 'SiteModel Case Data is successfully updated');
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
        $siteModel = SiteModel::findOrFail($id);
        $siteModel->delete();

        return redirect('/admin/siteModel')->with('success', 'SiteModel Case Data is successfully deleted');
    }
}
