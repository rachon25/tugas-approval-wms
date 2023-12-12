<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatDaftarPoRequest;
use App\Models\DaftarMr;
use App\Models\DaftarPo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DaftarPoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftars = DaftarPo::all();
        return view('admin.master.daftar_po.index', ['page_title' => 'List PO release', 'daftars' => $daftars]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.master.daftar_po.create', ['page_title' => 'Add PO']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'no_po' => 'required',
            'po_name' => 'required',
        ], [
            'no_po.required' => 'PO Number tidak boleh kosong',
            'po_name.required' => 'PO Name tidak boleh kosong',
        ]);
        $no_po = $request->input('no_po');
        $po_name = $request->input('po_name');
        $total_material = 0;
        $assignment = Auth::user()->name;
        $date_assign = Carbon::now();
        $status_approval = 'N/Y Release MR';
        $status_mr = 'N/Y Release MR';

        $purcaseorder = new DaftarPo();
        $purcaseorder->fill([
            "no_po" => $no_po,
            "po_name" => $po_name,
            "total_material" => $total_material,
            "assignment" => $assignment,
            "date_assign" => $date_assign,
            "status_approval" => $status_approval,
            "status_mr" => $status_mr,
        ]);
        $purcaseorder->save();
        return redirect()->route('admin.master.daftar_po.index')->with('success', 'PO berhasil tersimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(DaftarPo $DaftarPo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarPo $DaftarPo)
    {

        return view('admin.master.daftar_po.edit', ['page_title' => 'Edit PO', 'material' => $DaftarPo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreatDaftarPoRequest $request, DaftarPo $DaftarPo)
    {
        $DaftarPo->fill($request->all());
        $DaftarPo->save();
        return redirect()->route('admin.master.daftar_po.index')->with('success', 'PO berhasil di edit.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarPo $DaftarPo)
    {
        $DaftarPo->delete();
        return redirect()->route('admin.master.daftar_po.index')->with('success', 'PO berhasil di delete.');
    }
}
