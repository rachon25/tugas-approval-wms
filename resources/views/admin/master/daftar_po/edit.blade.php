@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.daftar_material.update',$daftars->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="part_num">Serial Number</label>
                    <input type="text" name="part_num" id="part_num"
                        class="form-control {{ $errors->has('part_num') ? 'is-invalid' : '' }}" placeholder="Serial Number" value="{{old('part_num',$daftars->no_po)}}">

                    @if ($errors->has('part_num'))
                        <span class="help-block">
                            {{ $errors->first('part_num') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="material_name">Material Name</label>
                    <input type="text" name="material_name" id="material_name"
                        class="form-control {{ $errors->has('material_name') ? 'is-invalid' : '' }}"
                        placeholder="Material Name" value="{{old('part_num',$daftars->material_name)}}">

                    @if ($errors->has('material_name'))
                        <span class="help-block">
                            {{ $errors->first('material_name') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="uom">UoM</label>
                    <input type="text" name="uom" id="uom"
                        class="form-control
                        {{ $errors->has('uom') ? 'is-invalid' : '' }}"
                        placeholder="UoM" value="{{old('part_num',$daftars->uom)}}">

                    @if ($errors->has('uom'))
                        <span class="help-block">
                            {{ $errors->first('uom') }}
                        </span>
                    @endif
                </div>
                <button class="btn btn-primary">update</button>
            </form>
        </div>
    </div>
@endsection
@section('js')
@endsection
