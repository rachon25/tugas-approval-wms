@extends('layouts.admin')
@section('css')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.master.daftar_mr.update',$material->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="id_mr">Number MR</label>
                    <input type=Re name="id_mr" id="id_mr"
                        class="form-control {{ $errors->has('id_mr') ? 'is-invalid' : '' }}" placeholder="Number MR" value="{{old('id_mr',$material->id_mr)}}" readonly>

                    @if ($errors->has('id_mr'))
                        <span class="help-block">
                            {{ $errors->first('id_mr') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="no_po">Number PO</label>
                    <input type="text" name="no_po" id="no_po"
                        class="form-control {{ $errors->has('no_po') ? 'is-invalid' : '' }}" placeholder="Number PO" value="{{old('no_po',$material->no_po)}}">

                    @if ($errors->has('no_po'))
                        <span class="help-block">
                            {{ $errors->first('no_po') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="part_num">Serial Number</label>
                    <input type="text" name="part_num" id="part_num"
                        class="form-control {{ $errors->has('part_num') ? 'is-invalid' : '' }}" placeholder="Serial Number" value="{{old('part_num',$material->part_num)}}">

                    @if ($errors->has('part_num'))
                        <span class="help-block">
                            {{ $errors->first('part_num') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="qty_plan">Qty MR</label>
                    <input type="text" name="qty_plan" id="qty_plan"
                        class="form-control {{ $errors->has('qty_plan') ? 'is-invalid' : '' }}" placeholder="Qty MR" value="{{old('qty_plan',$material->qty_plan)}}">

                    @if ($errors->has('qty_plan'))
                        <span class="help-block">
                            {{ $errors->first('qty_plan') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="assignment">Assignment</label>
                    <input type="text" name="assignment" id="assignment"
                        class="form-control {{ $errors->has('assignment') ? 'is-invalid' : '' }}"
                        placeholder="Assignment" value="{{old('assignment',$material->assignment ?? '')}}">

                    @if ($errors->has('assignment'))
                        <span class="help-block">
                            {{ $errors->first('assignment') }}
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="date_assign">Assign Date</label>
                    <input type="date" name="date_assign" id="date_assign"
                        class="form-control
                        {{ $errors->has('date_assign') ? 'is-invalid' : '' }}"
                        placeholder="Assign" value="{{old('date_assign',$material->date_assign ?? '')}}">

                    @if ($errors->has('date_assign'))
                        <span class="help-block">
                            {{ $errors->first('date_assign') }}
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
