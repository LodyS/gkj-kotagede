@extends('layouts.app')

@section('content')

<h1 align="center">Tambah Daftar Jemaat Meninggal</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

@if (session('warning'))
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('warning') }}
    </div>
@endif

<form action="{{ url('simpan-meninggal') }}" method="post" id="meninggal">{{ @csrf_field() }} 
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">
    <div class="col-sm-3">
        <label>Jemaat</label> 
            <select class="form-control select @error('id_jemaat') is-invalid @enderror" name="id_jemaat" id="id_jemaat">
                <option value="">Pilih Jemaat</option>
                @foreach ($jemaat as $Jemaat)
                <option value="{{ $Jemaat->id }}">{{ $Jemaat->nama_jemaat }}</option>
            @endforeach
        </select>
    </div>

    @error('id_jemaat')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jemaat<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Tanggal</label> 
        <input type="date" name="tanggal" id="tanggal" value="{{ date('Y-m-d')}}" class="form-control @error('sebab') is-invalid @enderror">
    </div>

    @error('tanggal')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tanggal<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Sebab</label> 
        <input type="text" name="sebab" id="sebab" class="form-control @error('sebab') is-invalid @enderror">
    </div>

    @error('sebab')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi sebab kematian<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <button type="submit" class="btn btn-danger">Simpan</button>
    </div>
</form>

@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<link href="{{ asset('js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.select').select2({
        dropdownParent: $("#meninggal"),
        width: '100%'
    });
});
</script>