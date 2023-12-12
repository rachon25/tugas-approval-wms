<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\ApprovalHistory;
use App\Models\DaftarMaterial;
use App\Models\DaftarMr;
use App\Models\DaftarPo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DaftarApprovalMrController extends Controller
{
    public function index()
    {
        $daftars = DaftarPo::where("status_approval", "Waiting Approval")->get();
        return view('approval_mr.index', ['page_title' => 'List MR Waiting MR Approve', 'daftars' => $daftars]);
    }
    public function detailApprovalMR($no_po)
    {
        $mrDetails = DaftarMr::where('no_po', $no_po)->get();
        return view('approval_mr.detail_approval',
            ['page_title' => 'Detail Approval MR',
                'mrDetails' => $mrDetails
            ]);
    }
    public function approveMR($no_po)
    {
        $mrDetail = DaftarPo::where('no_po', $no_po)->firstOrFail();
        $po_name = $mrDetail->po_name;
        $id_mr = $mrDetail->id_mr;
        $name = Auth::user()->name;
        $historyApprove = new ApprovalHistory();
        $historyApprove->fill([
            'no_po' => $no_po,
            'po_name' => $po_name,
            'id_mr' => $id_mr,
            'name' => $name,
        ]);
        $historyApprove->save();

        DaftarPo::where('no_po', $no_po)->update(['status_approval' => 'Approved']);
        DaftarMr::where('no_po', $no_po)->update(['status_approval' => 'Approved']);

        return redirect()->route('approval_mr.index')->with('success', 'MR Approved.');
    }

}
