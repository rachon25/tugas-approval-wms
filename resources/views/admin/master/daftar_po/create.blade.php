@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.daftar_po.store') }}" method="POST">
                @csrf
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="no_po">Number PO</label>
                        <input type="text" name="no_po" id="no_po"
                            class="form-control {{ $errors->has('no_po') ? 'is-invalid' : '' }}" placeholder="Number PO"
                            value="{{ old('no_po') }}">

                        @error('no_po')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-12">
                    <div class="form-group">
                        <label for="po_name">PO Name</label>
                        <input type="text" name="po_name" id="po_name"
                            class="form-control {{ $errors->has('po_name') ? 'is-invalid' : '' }}" placeholder="PO Name"
                            value="{{ old('po_name') }}">

                        @error('po_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
