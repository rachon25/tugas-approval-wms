@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($mrDetail = $mrDetails->first())
                <div class="mr-details">
                    <p>ID MR: {{ $mrDetail->id_mr }}</p>
                    <p>PO Number: {{ $mrDetail->no_po }}</p>
                    <p>PO Name: {{ $mrDetail->daftarPoRelasi->po_name }}</p>
                    <input type="hidden" name="no_po" value="{{ $mrDetail->no_po }}">
                    <input type="hidden" name="po_name" value="{{ $mrDetail->po_name }}">
                    <input type="hidden" name="id_mr" value="{{ $mrDetail->id_mr }}">
                </div>
            @else
                <p>Tidak ada data MR yang ditemukan.</p>
            @endif

            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hover table-strippped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Part Number</th>
                            <th>Material Name</th>
                            <th>UOM</th>
                            <th>Quantity Plan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php $no_daftar = 1; @endphp
                        @foreach ($mrDetails as $daftar)
                            <tr>
                                <td>{{ $no_daftar }}</td>
                                <td>{{ $daftar->part_num }}</td>
                                <td>{{ $daftar->daftarMaterial->material_name ?? '' }}</td>
                                <td>{{ $daftar->daftarMaterial->uom ?? '' }}</td>
                                <td>{{ $daftar->qty_plan }}</td>
                            </tr>
                            @php $no_daftar++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form action="{{ route('daftar_mr.approve', ['no_po' => $mrDetail->no_po]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary mt-3">Approve MR</button>
            </form>

        </div>
    </div>
@endsection

@section('js')
@endsection
