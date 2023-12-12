@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form id="releaseForm" action="{{ route('admin.master.daftar_mr.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="part_num">Select Serial Number material</label>
                            <input type="text" name="part_num" id="part_num"  class="form-control" placeholder="Serial Number"
                                list="materialList" value="">
                            <datalist id="materialList">
                                @foreach ($daftarMrsCreat as $partNum => $name)
                                    <option data-nama="{{ $name }}" data-id="{{ $partNum }}">
                                        {{ $partNum }} - {{ $name }}
                                    </option>
                                @endforeach
                            </datalist>
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="qty_plan">Qty MR</label>
                            <input type="text" name="qty_plan" id="qty_plan" class="form-control" placeholder="Qty MR">
                        </div>
                    </div>


                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="no_po">Number PO</label>
                            <input type="text" name="no_po" id="no_po" class="form-control {{ $errors->has('no_po') ? 'is-invalid' : '' }}" placeholder="Number PO" list="poList" value="">
                            <datalist id="poList">
                                @foreach ($daftarPoCreat as $noPo => $poName)
                                    <option value="{{ $noPo }}">{{ $noPo }} - {{ $poName }}</option>
                                @endforeach
                            </datalist>
                            @error('no_po')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-ms-6 col-12">
                    <div class="form-group">

                        <button type="button" class="btn btn-primary d-block" onclick="tambahItem()">Tambah
                            Serial
                            Number Material </button>
                    </div>
                </div>
                <div class="Row">
                    <div class="col-md-12 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Serial Number</th>
                                    <th>Material Name</th>
                                    <th>Quantity Material</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="transaksiItem">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="2">Total</th>
                                    <th class="quantity">0</th>
                                    <th class="totalItem">0</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="hidden" name="total_qty" value="0">
                        <input type="hidden" name="partNumber[]" value="0">
                        <input type="hidden" name="materialName[]" value="0">
                        <input type="hidden" name="qtyPlan[]" value="0">
                        <button id="releaseBtn" class="btn btn-primary d-block">Release MR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var quantity = 0;
        var totalItem = 0;
        var listItem = [];

        function tambahItem() {
            var partNumValue = $('#part_num').val();
            var qtyPlan = $('#qty_plan').val();

            if (!partNumValue || !qtyPlan) {
                Swal.fire({
                    icon: 'error',
                    title: 'Kolom tidak boleh kosong',
                    showConfirmButton: false,
                    timer: 1500
                });
                return;
            }
            var partNumArray = partNumValue.split(' - ');
            var partNumber = partNumArray[0].trim();
            var materialName = partNumArray[1].trim();
            var existingItem = listItem.find(item => item.partNumber === partNumber);

            if (existingItem) {

                Swal.fire({
                    icon: 'question',
                    title: 'Serial Number sudah ada',
                    text: 'Apakah qty MR akan ditambahkan?',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        existingItem.qtyPlan = parseInt(existingItem.qtyPlan) + parseInt(qtyPlan);
                        updateTable();
                        updateTotalQty(parseInt(qtyPlan));
                        $('#part_num').val('');
                        $('#qty_plan').val('');
                    }
                });
            } else {
                listItem.push({
                    partNumber: partNumber,
                    materialName: materialName,
                    qtyPlan: qtyPlan
                });
                updateTable();
                updateTotalQty(parseInt(qtyPlan));
                $('#part_num').val('');
                $('#qty_plan').val('');
            }
        }

        function updateFormFields() {

            $('[name="total_qty"]').val(totalItem);
            var uniquePartNumbers = [...new Set(listItem.map(item => item.partNumber))];
            var materialNames = listItem.map(item => item.materialName);
            var qtyPlans = listItem.map(item => item.qtyPlan);

            $('[name="partNumber[]"]').val(uniquePartNumbers.join(','));
            $('[name="materialName[]"]').val(materialNames.join(','));
            $('[name="qtyPlan[]"]').val(qtyPlans.join(','));
        }

        function updateTable() {
            var tbody = $('.transaksiItem');
            tbody.empty();
            var partNumberCount = {};

            listItem.forEach((item, index) => {

                if (!partNumberCount[item.partNumber]) {
                    partNumberCount[item.partNumber] = 1;
                } else {
                    partNumberCount[item.partNumber]++;
                }

                var row = '<tr>' +
                    '<td>' + (index + 1) + '</td>' +
                    '<td>' + item.partNumber + '</td>' +
                    '<td>' + item.materialName + '</td>' +
                    '<td>' + item.qtyPlan + '</td>' +
                    '<td><button type="button" onclick="hapusItem(' + index +
                    ')" class="btn btn-danger btn-sm">Hapus</button></td>' +
                    '</tr>';
                tbody.append(row);
            });
            updateFormFields();
            var uniquePartNumbers = Object.keys(partNumberCount).length;
            $('.quantity').html(uniquePartNumbers);
        }

        function updateTotalQty(nom) {
            totalItem += nom;
            $('[name=total_qty]').val(totalItem);
            $('.totalItem').html(totalItem);
        }

        function hapusItem(index) {
            var deletedItem = listItem.splice(index, 1)[0];
            updateTable();
            updateFormFields();
            updateTotalQty(-parseInt(deletedItem.qtyPlan));
        }
    </script>
@endsection
