@extends('layouts.app')

@section('content')
<h1 align="center">Tambah Babtis</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="{{ url('simpan-babtis') }}" method="post" id="babtis">{{ @csrf_field() }} 
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">

    <div class="col-sm-3">
        <label class="col-md-8">Jemaat</label>
			<select name="id_jemaat" class="form-control select" required>
			<option value="--">Pilih Jemaat</option>
            @foreach ($Jemaat as $jemaat)
            <option value="{{ $jemaat->id}}">{{ $jemaat->nama_jemaat }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Babtis</label> 
        <input type="date" name="tanggal_babtis" value="{{ date('Y-m-d') }}" class="form-control" required>
    </div>

    <div class="col-sm-3">
        <label>No Surat Babtis</label> 
        <input type="text" name="no_surat_babtis" class="form-control text">
    </div>

    <div class="col-sm-3">
        <label>Pendeta Babtis</label> 
        <input type="text" name="pendeta_babtis" class="form-control">
    </div>

	<div class="col-sm-3">
        <label class="col-md-8">Gereja Atestasi</label>
			<select name="gereja_atestasi" class="form-control select">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}">{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Atestasi</label> 
        <input type="date" name="tanggal_atestasi" value="{{ date('Y-m-d')}}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>No Surat</label> 
        <input type="text" name="no_surat" class="form-control">
    </div>

    <div class="col-sm-3">
        <label class="col-md-8">Gereja Sidi</label>
			<select name="gereja_sidi" id="provinsi" class="form-control select">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}">{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Sidi</label> 
        <input type="date" name="tanggal_sidi" value="{{ date('Y-m-d') }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>No Surat Sidi</label> 
        <input type="text" name="no_surat_sidi" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>Pendeta Sidi</label> 
        <input type="text" name="pendeta_sidi" class="form-control">
    </div>

    <div class="col-sm-3">
        <label class="col-md-8">Gereja Penyerahan</label>
			<select name="gereja_penyerahan" class="form-control select">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}">{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Penyerahan</label> 
        <input type="date" name="tanggal_penyerahan" value="{{ date('Y-m-d') }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>Pendeta Penyerahan</label> 
        <input type="text" name="pendeta_penyerahan"  class="form-control">
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
        dropdownParent: $("#babtis"),
        width: '100%'
    });
});
</script>