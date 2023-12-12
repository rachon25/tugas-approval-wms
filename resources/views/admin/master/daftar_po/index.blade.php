@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            @role('Superadmin|PMO')
                <a href="{{ route('admin.master.daftar_po.create') }}" class="btn btn-success btn-sm mb-2"
                    style="margin-bottom: 5px;">Add po</a>
            @endrole
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
                            {{-- <th>Option</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no_daftar = 1; ?>
                        @foreach ($daftars as $daftar)
                            <tr>
                                <td>{{ $no_daftar }}</td>
                                <td>{{ $daftar->no_po }} </td>
                                <td>{{ $daftar->po_name }} </td>
                                <td>{{ $daftar->assignment }} </td>
                                <td>{{ $daftar->date_assign }} </td>
                                <td>{{ $daftar->id_mr }} </td>
                                <td>{{ $daftar->status_mr }} </td>
                                {{-- <td>
                                    <a href="{{ route('admin.master.daftar_po.edit', $daftar->id) }}">
                                        <i class="fas fa-fw fa-edit"></i>
                                    </a>

                                    <form data-part-num="{{ $daftar->no_po }}" data-po-name="{{ $daftar->po_name }}"
                                        action="{{ route('admin.master.daftar_po.destroy', $daftar->no_po) }}"
                                        method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                        
                                        <button type="button" class="btn btn-link" onclick="confirmDelete(this)">
                                            <i class="fas fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>                        
                                </td> --}}
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
    {{-- <script>
    function confirmDelete(button) {
        var partNum = button.closest('form').getAttribute('data-part-num');
        var poName = button.closest('form').getAttribute('data-po-name');

        Swal.fire({
            title: `Apakah yakin untuk menghapus Nama po '${partNum}' dengan Serial Number: '${poName}'?`,
            text: 'po yang sudah terhapus tidak bisa dikembalikan!',
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
</script> --}}
@endsection
