@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <a href="{{ route('admin.master.daftar_mr.create') }}" class="btn btn-success btn-sm mb-2"
                style="margin-bottom: 5px;">Add Material Request(MR)</a>
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
                            @role('Superadmin|PMO')
                                <th>Option</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no_daftar = 1; ?>
                        @foreach ($daftars as $daftarmr)
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
                                @role('Superadmin|PMO')
                                    <td>
                                        <a href="{{ route('admin.master.daftar_mr.edit', $daftarmr->id) }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>

                                        <form data-part-num="{{ $daftarmr->part_num }}"
                                            data-material-name="{{ $daftarmr->material_name }}"
                                            action="{{ route('admin.master.daftar_mr.destroy', $daftarmr->id) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button" class="btn btn-link" onclick="confirmDelete(this)">
                                                <i class="fas fa-fw fa-trash text-danger"></i>
                                            </button>
                                        </form>
                                    </td>
                                @endrole
                            </tr>

                            <?php $no_daftar++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function confirmDelete(button) {
            var partNum = button.closest('form').getAttribute('data-part-num');
            var materialName = button.closest('form').getAttribute('data-material-name');

            Swal.fire({
                title: `Apakah yakin untuk menghapus Nama Material '${partNum}' dengan Serial Number: '${materialName}'?`,
                text: 'Material yang sudah terhapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    button.closest('form').submit();
                }
            });
        }
    </script>
@endsection
