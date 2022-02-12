@extends('layouts.app')

@section('content')
<h1 align="center">Edit Babtis</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="{{ url('update-babtis') }}" method="post" id="babtis">{{ @csrf_field() }} 
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">
<input type="hidden" name="id" value="{{ $babtis->id }}">

    <div class="col-sm-3">
        <label class="col-md-8">Jemaat</label>
		<input type="text" value="{{ $babtis->nama_jemaat }}" class="form-control" disabled>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Babtis</label> 
        <input type="date" name="tanggal_babtis" class="form-control" value="{{ $babtis->tanggal_babtis }}" required>
    </div>

    <div class="col-sm-3">
        <label>No Surat Babtis</label> 
        <input type="text" name="no_surat_babtis" value="{{ $babtis->no_surat_babtis }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>Pendeta Babtis</label> 
        <input type="text" name="pendeta_babtis" value="{{ $babtis->pendeta_babtis }}" class="form-control">
    </div>

	<div class="col-sm-3">
        <label class="col-md-8">Gereja Atestasi</label>
			<select name="gereja_atestasi" class="form-control select">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}" {{($babtis->gereja_atestasi == $gereja->id)?'selected':''}}>{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Atestasi</label> 
        <input type="date" name="tanggal_atestasi" value="{{ $babtis->tanggal_atestasi }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>No Surat</label> 
        <input type="text" name="no_surat" class="form-control" value="{{ $babtis->no_surat }}">
    </div>

    <div class="col-sm-3">
        <label class="col-md-8">Gereja Sidi</label>
			<select name="gereja_sidi" id="provinsi" class="form-control select">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}" {{($babtis->gereja_sidi == $gereja->id)?'selected':''}}>{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Sidi</label> 
        <input type="date" name="tanggal_sidi" value="{{ $babtis->tanggal_sidi }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>No Surat Sidi</label> 
        <input type="text" name="no_surat_sidi" value="{{ $babtis->no_surat_sidi }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>Pendeta Sidi</label> 
        <input type="text" name="pendeta_sidi" value="{{ $babtis->pendeta_sidi }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label class="col-md-8">Gereja Penyerahan</label>
			<select name="gereja_penyerahan" class="form-control select">
			<option value="--">Pilih Gereja</option>
            @foreach ($Gereja as $gereja)
            <option value="{{ $gereja->id}}" {{($babtis->gereja_penyerahan == $gereja->id)?'selected':''}}>{{ $gereja->nama }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Tanggal Penyerahan</label> 
        <input type="date" name="tanggal_penyerahan" value="{{ $babtis->tanggal_penyerahan }}" class="form-control">
    </div>

    <div class="col-sm-3">
        <label>Pendeta Penyerahan</label> 
        <input type="text" name="pendeta_penyerahan" value="{{ $babtis->pendeta_penyerahan }}" class="form-control">
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