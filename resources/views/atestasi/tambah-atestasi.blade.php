@extends('layouts.app')

@section('content')

<h1 align="center">Tambah Atestasi</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

@if (session('status'))
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('warning') }}
    </div>
@endif

<form action="{{ url('simpan-atestasi') }}" method="post" id="atestasi">{{ @csrf_field() }} 
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">

    <div class="col-sm-3">
        <label class="col-md-8">Nama Jemaat</label>
			<select name="id_jemaat" id="id_jemaat" class="form-control select @error('id_jemaat') is-invalid @enderror">
			<option value="--">Pilih Jemaat</option>
            @foreach ($jemaat as $Jemaat)
            <option value="{{ $Jemaat->id}}">{{ $Jemaat->nama_jemaat }}</option>
            @endforeach
        </select>
	</div>

    @error('id_jemaat')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jemaat<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror
  
    <div class="col-sm-3">
        <label>No Surat</label> 
        <input type="text" name="no_surat" id="no_surat" class="form-control @error('no_surat') is-invalid @enderror">
    </div>

    @error('no_surat')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi no surat<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Tanggal</label> 
        <input type="date" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" class="form-control @error('tanggal') is-invalid @enderror">
    </div>

    @error('tanggal')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tanggal<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Alasan</label> 
        <input type="text" name="alasan" id="alasan" class="form-control @error('alasan') is-invalid @enderror">
    </div>
    
    @error('alasan')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tanggal<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <button type="submit" class="btn btn-danger">Simpan</button>
    </div>
@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<link href="{{ asset('js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.select').select2({
        dropdownParent: $("#atestasi"),
        width: '100%'
    });
});
</script>