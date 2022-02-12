@extends('layouts.app')

@section('content')

<h1 align="center">Edit Daftar Jemaat Meninggal</h1>
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

<form action="{{ url('update-meninggal') }}" method="post">{{ @csrf_field() }} 
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">
<input type="hidden" name="id" value="{{$Meninggal->id}}"class="form-control">
<input type="hidden" name="id_jemaat" value="{{$Meninggal->id_jemaat}}"class="form-control">

    <div class="col-sm-3">
        <label>Jemaat</label> 
        <input type="text" value="{{$Meninggal->nama_jemaat}}"class="form-control" required readonly>
        <input type="hidden" name="id" value="{{$Meninggal->id}}"class="form-control" required>
    </div>

    <div class="col-sm-3">
        <label>Tanggal</label> 
        <input type="date" name="tanggal" value="{{ $Meninggal->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror">
    </div>

    @error('tanggal')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tanggal<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Sebab</label> 
        <input type="text" name="sebab" id="sebab" value="{{ $Meninggal->sebab }}" class="form-control @error('sebab') is-invalid @enderror">
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