@extends('layouts.app')

@section('content')

<h1 align="center">Tambah Pernikahan</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="{{ url('simpan-pernikahan') }}" method="post" id="pernikahan">{{ @csrf_field() }} 
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">

    <div class="col-sm-3">
        <label class="col-md-8">Suami</label>
			<select name="suami" id="suami" class="form-control select @error('suami') is-invalid @enderror">
			<option value="--">Pilih Jemaat</option>
            @foreach ($suami as $jemaat)
            <option value="{{ $jemaat->id}}">{{ $jemaat->nama_jemaat }}</option>
            @endforeach
        </select>
	</div>

    @error('suami')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi suami<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label class="col-md-8">Istri</label>
			<select name="istri" id="istri" class="form-control select @error('istri') is-invalid @enderror">
			<option value="--">Pilih Jemaat</option>
            @foreach ($istri as $jemaat)
            <option value="{{ $jemaat->id}}">{{ $jemaat->nama_jemaat }}</option>
            @endforeach
        </select>
	</div>

    @error('istri')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi istri<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Tanggal</label> 
        <input type="date" name="tanggal" id="tanggal" value="{{ date('Y-m-d')}}" class="form-control @error('tanggal') is-invalid @enderror">
    </div>

    @error('tanggal')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tanggal<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label class="col-md-8">Gereja</label>
			<select name="id_gereja" id="id_gereja" class="form-control select @error('id_gereja') is-invalid @enderror">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}">{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    @error('id_gereja')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi gereja<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Pendeta</label> 
        <input type="text" name="pendeta" id="pendeta" class="form-control @error('pendeta') is-invalid @enderror">
    </div>

    @error('pendeta')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi pendeta<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Catatan Sipil</label> 
        <input type="text" name="catatan_sipil" id="catatan_sipil" class="form-control @error('catatan_sipil') is-invalid @enderror">
    </div>

    @error('catatan_sipil')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi catatan sipil<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror
    
    <div class="col-sm-3">
        <label>No Surat</label> 
        <input type="text" name="no_surat" id="no_surat" class="form-control">
    </div>

    <div class="col-sm-3">
        <button type="submit" id="ajax-submit" class="btn btn-danger">Simpan</button>
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
        dropdownParent: $("#pernikahan"),
        width: '100%'
    });
});
</script>