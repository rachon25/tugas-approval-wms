<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use App\Models\ApprovalHistory;


class DaftarHistoryApprovalMrController extends Controller
{
    public function index()
    {
        $daftars = ApprovalHistory::all();
        return view('history_approve.index', ['page_title' => 'List history MR Approve', 'daftars' => $daftars]);
    }
}