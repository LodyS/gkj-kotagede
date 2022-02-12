@extends('layouts.app')

@section('content')

<h1 align="center">Edit Perjamuan Kudus</h1>
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

<form action="{{ url('update-perjamuan-kudus') }}" method="post">{{ @csrf_field() }} 
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">
<input type="hidden" name="id" value="{{ $PerjamuanKudus->id }}">
<input type="hidden" name="id_jemaat" value="{{ $PerjamuanKudus->id_jemaat }}">

    <div class="col-sm-3">
        <label>Jemaat</label> 
        <input type="text" value="{{ $PerjamuanKudus->nama_jemaat }}" class="form-control" readonly>
    </div>

    <div class="col-sm-3">
        <label>Tanggal</label> 
        <input type="date" id="tanggal" name="tanggal" value="{{ $PerjamuanKudus->tanggal }}" class="form-control @error('tanggal') is-invalid @enderror">
    </div>

    @error('tanggal')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tanggal<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Jam Ibadah</label> 
            <select id="jam_ibadah" class="form-control @error('jam_ibadah') is-invalid @enderror" name="jam_ibadah" >
            <option value="">Pilih Jam Ibadah</option>
             <option value="07:00" {{($PerjamuanKudus->jam_ibadah == '07:00')?'selected':''}}>07:00</option>
             <option value="09:00" {{($PerjamuanKudus->jam_ibadah == '09:00')?'selected':''}}>09:00</option>
             <option value="18:00" {{($PerjamuanKudus->jam_ibadah == '18:00')?'selected':''}}>18:00</option>
        </select>
    </div>

    @error('jam_ibadah')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jam ibadah<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Keterangan</label> 
        <input type="text" name="keterangan" value="{{ $PerjamuanKudus->keterangan }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <button type="submit" class="btn btn-danger">Simpan</button>
    </div>
</form>

@endsection