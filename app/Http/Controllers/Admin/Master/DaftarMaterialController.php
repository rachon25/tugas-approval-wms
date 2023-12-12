<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatDaftarMaterialRequest;
use App\Http\Requests\EditDaftarMaterial;
use App\Models\DaftarMaterial;

class DaftarMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftars = DaftarMaterial::all();
        return view('admin.master.daftar_material.index', ['page_title' => 'List Material', 'daftars' => $daftars]);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.daftar_material.create', ['page_title' => 'Add List Material']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatDaftarMaterialRequest $request)
{
    $existingMaterial = DaftarMaterial::where('part_num', $request->input('part_num'))->first();

    if ($existingMaterial) {
        $existingMaterial->update($request->all());
        return redirect()->route('admin.master.daftar_material.create')->with('error', 'Serial Number sudah ada. Silahkan input Serial Number lainnya.');
    } else {
        $materials = new DaftarMaterial();
        $materials->fill($request->all());
        $materials->save();
        return redirect()->route('admin.master.daftar_material.index')->with('success', 'Material tersimpan.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(DaftarMaterial $daftarMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarMaterial $daftarMaterial)
    {
    
        return view('admin.master.daftar_material.edit',['page_title' => 'Edit List Material','material' => $daftarMaterial]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatDaftarMaterialRequest $request, DaftarMaterial $daftarMaterial)
    {
        
        $existingMaterial = DaftarMaterial::where('part_num', $request->input('part_num'))->first();

    if ($existingMaterial) {
        $existingMaterial->update($request->all());
        return redirect()->route('admin.master.daftar_material.index')->with('error', 'Serial Number sudah ada. Silahkan input Serial Number lainnya.');
    } else {
        
        $daftarMaterial->fill($request->all());
        $daftarMaterial->save();
        return redirect()->route('admin.master.daftar_material.index')->with('success', 'Material tersimpan.');
    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarMaterial $daftarMaterial)
    {
        $daftarMaterial->delete();
        return redirect()->route('admin.master.daftar_material.index')->with('success', 'Material berhasil di delete.');
    }
}
