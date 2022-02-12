@extends('layouts.app')

@section('content')

<h1 align="center">Tambah Perjamuan Kudus</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="{{ url('simpan-perjamuan-kudus') }}" method="post" id="perjamuan">{{ @csrf_field() }} 
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">
    
    <div class="col-sm-3">
        <label>Jemaat</label> 
            <select class="form-control select @error('id_jemaat') is-invalid @enderror"" id="id_jemaat" name="id_jemaat">
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
        <input type="date" name="tanggal" value="{{ date('Y-m-d')}}" class="form-control @error('tanggal') is-invalid @enderror">
    </div>

    @error('tanggal')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tanggal<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Jam Ibadah</label> 
            <select class="form-control @error('jam_ibadah') is-invalid @enderror" name="jam_ibadah" id="jam_ibadah">
            <option value="">Pilih Jam Ibadah</option>
             <option value="07:00">07:00</option>
             <option value="09:00">09:00</option>
             <option value="18:00">18:00</option>
        </select>
    </div>

    @error('jam_ibadah')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jam ibadah<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Keterangan</label> 
        <input type="text" name="keterangan" value="Di gereja" class="form-control">
    </div>

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
        dropdownParent: $("#perjamuan"),
        width: '100%'
    });
});
</script>