@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-strippped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>PO ID</th>
                            <th>PO Name</th>
                            <th>PO Assign</th>
                            <th>PO Release</th>
                            <th>No Material Req</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $no_daftar = 1; @endphp
                        @foreach ($daftars as $daftar)
                            <tr>
                                <td>{{ $no_daftar }}</td>
                                <td>{{ $daftar->no_po }} </td>
                                <td>{{ $daftar->po_name }} </td>
                                <td>{{ $daftar->assignment }} </td>
                                <td>{{ $daftar->date_assign }} </td>
                                <td>{{ $daftar->id_mr }} </td>
                                <td>{{ $daftar->status_mr }} </td>
                                <td>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('daftar_mr.detail_approval', ['no_po' => $daftar->no_po]) }}">
                                        Detail Approval
                                    </a>
                                </td>
                            </tr>

                            @php $no_daftar++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
