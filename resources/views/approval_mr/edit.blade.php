@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.approval_mr.update') }}" method="POST">
                @csrf
                @method('PUT')
                <a>Add Material Request(MR)</a>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-strippped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>MR ID</th>
                                <th>No PO</th>
                                <th>Po name</th>
                                <th>Part Number</th>
                                <th>Material Name</th>
                                <th>UoM</th>
                                <th>Qty MR</th>
                                <th>Assigment</th>
                                <th>Assigment Date</th>
                                <th>Status Approval MR</th>
                                <th>Status MR</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no_daftar = 1; ?>
                            @foreach ($daftar as $daftarmr)
                                <tr>
                                    <td>{{ $no_daftar }}</td>
                                    <td>{{ $daftarmr->id_mr }} </td>
                                    <td>{{ $daftarmr->no_po }} </td>
                                    <td>{{ $daftarmr->daftarPoRelasi->po_name ?? '' }} </td>
                                    <td>{{ $daftarmr->part_num }} </td>
                                    <td>{{ $daftarmr->daftarMaterial->material_name ?? '' }}</td>
                                    <td>{{ $daftarmr->daftarMaterial->uom ?? '' }}</td>
                                    <td>{{ $daftarmr->qty_plan }} </td>
                                    <td>{{ $daftarmr->assignment }} </td>
                                    <td>{{ $daftarmr->date_assign }} </td>
                                    <td>{{ $daftarmr->status_approval }} </td>
                                    <td>{{ $daftarmr->status_mr }} </td>
                                </tr>

                                <?php $no_daftar++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
