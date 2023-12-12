@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover table-strippped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>PO Number</th>
                            <th>PO Name</th>
                            <th>Approval</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $no_daftar = 1; @endphp
                        @foreach ($daftars as $daftar)
                            <tr>
                                <td>{{ $no_daftar }}</td>
                                <td>{{ $daftar->po_name}}</td>
                                <td>{{ $daftar->no_po }}</td>
                                <td>{{ $daftar->name}}</td>
                                <td>{{ $daftar->created_at }}</td>
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
