@extends('layouts.app')

@section('content')

<form action="{{ url('simpan-pekerjaan') }}" method="post" id="pekerjaan">{{ @csrf_field() }} 
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">

<h1 align="center">Tambah Pekerjaan</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

    <div class="col-sm-3">
        <label>Jemaat</label> 
            <select class="form-control select @error('id_jemaat') is-invalid @enderror" name="id_jemaat">
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
        <label>Jenis Pekerjaan</label> 
            <select class="form-control select @error('jenis_pekerjaan') is-invalid @enderror" id="jenis_pekerjaan" name="jenis_pekerjaan">
            <option value="">Jenis Pekerjaan</option>
            <option value="Karyawan Swasta">Karyawan Swasta</option>
            <option value="Wiraswasta">Wiraswasta</option>
            <option value="PNS">PNS</option>
            <option value="Pensiunan">Pensiunan</option>
            <option value="Buruh-tani">Buruh Tani</option>
            <option value="Tidak Bekerja">Tidak Bekerja</option>
        </select>
    </div>

    @error('jenis_pekerjaan')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jenis pekerjaan<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Tempat Kerja</label> 
        <input type="text" name="tempat_kerja" id="tempat_kerja" class="form-control @error('tempat_kerja') is-invalid @enderror">
    </div>

    @error('tempat_kerja')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tempat kerja<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Alamat Kerja</label> 
        <input type="text" name="alamat_kerja" id="alamat_kerja" class="form-control @error('alamat_kerja') is-invalid @enderror">
    </div>

    @error('alamat_kerja')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi alamat kerja<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Jabatan</label> 
        <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror">
    </div>

    @error('jabatan')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jabatan<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>No Telepon</label> 
        <input type="number" name="no_telp" id="no_telp" class="form-control @error('no_telp') is-invalid @enderror">
    </div>

    @error('no_telp')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi no telp<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

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
        dropdownParent: $("#pekerjaan"),
        width: '100%'
    });
});
</script>