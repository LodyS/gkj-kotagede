@extends('layouts.app')

@section('content')
<h1 align="center">Edit Pernikahan</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<form action="{{ url('update-pernikahan') }}" method="post" id="pernikahan">{{ @csrf_field() }} 
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">

    <div class="col-sm-3">
        <label class="col-md-8">Suami</label>
			<select name="suami" id="suami" class="form-control select" required>
			<option value="--">Pilih Jemaat</option>
            @foreach ($Jemaat as $jemaat)
            <option value="{{ $jemaat->id}}" {{($pernikahan->suami == $jemaat->id)?'selected':''}}>{{ $jemaat->nama_jemaat }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label class="col-md-8">Istri</label>
			<select name="istri" id="istri" class="form-control select" required>
			<option value="--">Pilih Jemaat</option>
            @foreach ($Jemaat as $jemaat)
            <option value="{{ $jemaat->id}}" {{($pernikahan->istri == $jemaat->id)?'selected':''}}>{{ $jemaat->nama_jemaat }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal</label> 
        <input type="date" name="tanggal" id="tanggal" value="{{ $pernikahan->tanggal }}" class="form-control" required>
        <input type="hidden" name="id" value="{{ $pernikahan->id }}" required>
    </div>

    <div class="col-sm-3">
        <label class="col-md-8">Gereja</label>
			<select name="id_gereja" id="id_gereja" class="form-control select">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}" {{($pernikahan->id_gereja == $gereja->id)?'selected':''}}>{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Pendeta</label> 
        <input type="text" name="pendeta" id="pendeta" value="{{ $pernikahan->pendeta }}" class="form-control" required>
    </div>

    <div class="col-sm-3">
        <label>Catatan Sipil</label> 
        <input type="text" name="catatan_sipil" id="catatan_sipil" value="{{ $pernikahan->catatan_sipil }}" class="form-control" required>
    </div>

    <div class="col-sm-3">
        <label>No Surat</label> 
        <input type="text" name="no_surat" id="no_surat" value="{{ $pernikahan->no_surat }}" class="form-control" required>
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