@extends('layouts.app')

@section('content')
<h1 align="center">Tambah Usaha</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="{{ url('simpan-usaha') }}" method="post" id="usaha">{{ @csrf_field() }} 
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
        <label>Usaha</label> 
        <input type="text" name="usaha" id="usaha" class="form-control @error('usaha') is-invalid @enderror">
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

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<link href="{{ asset('js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
<script type="text/javascript">

$(document).ready(function(){
    $('.select').select2({
        dropdownParent: $("#usaha"),
        width: '100%'
    });
});
</script>