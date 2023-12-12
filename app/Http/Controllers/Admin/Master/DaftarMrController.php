<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatDaftarMrRequest;
use App\Models\DaftarMaterial;
use App\Models\DaftarMr;
use App\Models\DaftarPo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DaftarMrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftarMrs = DaftarMr::with('daftarMaterial')->get();
        $daftars = DaftarMr::all();
        return view('admin.master.daftar_mr.index', ['page_title' => 'List MR release', 'daftars' => $daftars]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $daftarPoCreat = DaftarPo::where('status_mr', 'N/Y Release MR')->pluck('po_name', 'no_po');
    $daftarMrsCreat = DaftarMaterial::pluck('material_name', 'part_num');

    return view('admin.master.daftar_mr.create', [
        'page_title' => 'Add Material Request(MR)',
        'daftarPoCreat' => $daftarPoCreat,
        'daftarMrsCreat' => $daftarMrsCreat,
    ]);
}

    /**
     * Store a newly created resource in storage.
     * return redirect()->route('admin.master.daftar_mr.index')->with('success', 'MR berhasil tersimpan.');
     */
    public function store(Request $request)
{
    $request->validate([
        'no_po' => 'required'],
        ['no_po.required' => 'PO Number tidak boleh kosong',
    ]);
    $no_po = $request->input('no_po');
    $total_qty = $request->input('total_qty');
    $partNumbers = explode(',', $request->input('partNumber')[0]);
    $materialNames = explode(',', $request->input('materialName')[0]);
    $qtyPlans = explode(',', $request->input('qtyPlan')[0]);
    $assignment = Auth::user()->name;
    $date_assign = Carbon::now();
    $status_approval = 'Waiting Approval';
    $status_mr = 'N/Y Release';

    $daftarpoUpdate = DaftarPo::where('no_po', $no_po)->first();
    $daftarpoUpdate->fill([
        'total_material'=> $total_qty,
        'status_approval' =>$status_approval, 
        'status_mr' =>$status_mr,
    ]);
    $daftarpoUpdate->save();

    $assignment = Auth::user()->name;
    $date_assign = Carbon::now();
    $status_approval = 'Waiting Approval';
    $status_mr = 'N/Y Release';

    foreach (array_map(null, $partNumbers, $materialNames, $qtyPlans) as [$partNumber, $materialName, $qtyPlan]) {
        $daftarMr_item = new DaftarMr();
        $daftarMr_item->fill([
            'id_mr' => $daftarpoUpdate->id_mr,
            'no_po' => $no_po,
            'part_num' => $partNumber,
            'qty_plan' => $qtyPlan,
            'assignment' => $assignment,
            'date_assign' => $date_assign,
            'status_approval' => $status_approval,
            'status_mr' => $status_mr,
        ]);
        $daftarMr_item->save();
    }
    return redirect()->route('admin.master.daftar_mr.index')->with('success', 'MR berhasil tersimpan.');
}


    /**
     * Display the specified resource.
     */
    public function show(DaftarMr $DaftarMr)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarMr $DaftarMr)
    {

        return view('admin.master.daftar_mr.edit', ['page_title' => 'Edit Material Request(MR)', 'material' => $DaftarMr]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(CreatDaftarMrRequest $request, DaftarMr $DaftarMr)
    // {
    //     // $existingMaterial = DaftarPo::where('id_mr', $request->input('id_mr'))->first();

    //     // if ($existingMaterial) {
    //     //     $existingMaterial->update($request->all());
    //     //     return redirect()->route('admin.master.daftar_mr.index')->with('error', 'Serial Number sudah ada. Silahkan input Serial Number lainnya.');
    //     // } else {
            
    //     //     $DaftarMr->fill($request->all());
    //     //     $DaftarMr->save();
    //     //     return redirect()->route('admin.master.daftar_mr.index')->with('success', 'MR tersimpan.');
    //     // }

    // }
    public function update(Request $request)
    {
        $request->validate([
            'id_mr' => 'required|string',
            'part_num' => 'required|string',
            'qty_plan' => 'required|numeric',
            'assignment' => 'required|string',
            'date_assign' => 'required|date',
            'no_po' => 'required',
        ]);
        DaftarMr::updateOrCreate(
            ['id_mr' => $request->input('id_mr')],
            [
                'part_num' => $request->input('part_num'),
                'qty_plan' => $request->input('qty_plan'),
                'assignment' => $request->input('assignment'),
                'date_assign' => $request->input('date_assign'),
                'no_po' => $request->input('no_po'),
            ]
        );

        return redirect()->route('admin.master.daftar_mr.index')->with('success', 'MR tersimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarMr $DaftarMr)
    {
        $DaftarMr->delete();
        return redirect()->route('admin.master.daftar_mr.index')->with('success', 'MR berhasil di delete.');
    }
}
