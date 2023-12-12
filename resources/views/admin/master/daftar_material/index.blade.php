@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @role('Superadmin|PMO')
                <a href="{{ route('admin.master.daftar_material.create') }}" class="btn btn-success btn-sm mb-2"
                    style="margin-bottom: 5px;">Add Material</a>
            @endrole
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-strippped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Part Number</th>
                            <th>Material Name</th>
                            <th>UoM</th>
                            @role('Superadmin|PMO')
                                <th>Option</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no_daftar = 1; ?>
                        @foreach ($daftars as $daftar)
                            <tr>
                                <td>{{ $no_daftar }}</td>
                                <td>{{ $daftar->part_num }} </td>
                                <td>{{ $daftar->material_name }} </td>
                                <td>{{ $daftar->uom }} </td>
                                @role('Superadmin|PMO')
                                    <td>
                                        <a href="{{ route('admin.master.daftar_material.edit', $daftar->id_part_num) }}">
                                            <i class="fas fa-fw fa-edit"></i>
                                        </a>

                                        <form data-part-num="{{ $daftar->part_num }}"
                                            data-material-name="{{ $daftar->material_name }}"
                                            action="{{ route('admin.master.daftar_material.destroy', $daftar->id_part_num) }}"
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
