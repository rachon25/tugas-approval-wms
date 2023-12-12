@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $page_title ?? 'Dashboard'}} </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        harap login menggunakan superadmin, untuk melihat CV saya, terima kasih,<br>
        Terima kasih
    </div>

    <div class="card-footer">
       Best regard <br>
       <br>
       <br>
       Suryanto
    </div>

</div>
@endsection