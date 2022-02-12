@extends('layouts.app')

@section('content')
<h1 align="center">Edit Usaha</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="{{ url('update-usaha') }}" method="post">{{ @csrf_field() }} 
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">
<input type="hidden" value="{{ $usaha->id}}" name="id">
<input type="hidden" value="{{ $usaha->id_jemaat}}" name="id_jemaat">

    <div class="col-sm-3">
        <label class="col-md-8">Nama Jemaat</label>
		<input type="text" class="form-control" value="{{ $usaha->nama_jemaat}}" readonly>
	</div>
  
    <div class="col-sm-3">
        <label>Usaha</label> 
        <input type="text" name="usaha" id="usaha" value="{{ $usaha->usaha }}" class="form-control @error('usaha') is-invalid @enderror">
    </div>

    @error('usaha')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi usaha<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
    <button type="submit" class="btn btn-danger">Simpan</button>
    </div>
@endsection