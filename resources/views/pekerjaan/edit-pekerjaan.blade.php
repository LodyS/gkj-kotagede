@extends('layouts.app')

@section('content')

<form action="{{ url('update-pekerjaan') }}" method="post" id="pekerjaan">{{ @csrf_field() }} 
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">
<input type="hidden" name="id" value="{{ $pekerjaan->id }}">
<input type="hidden" name="id_jemaat" value="{{ $pekerjaan->id_jemaat }}">

<h1 align="center">Edit Pekerjaan</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">

    <div class="col-sm-3">
        <label>Jemaat</label> 
        <input type="text" value="{{ $pekerjaan->nama_jemaat }}" class="form-control" disabled>
    </div>

    <div class="col-sm-3">
        <label>Jenis Pekerjaan</label> 
            <select class="form-control select @error('jenis_pekerjaan') is-invalid @enderror" id="jenis_pekerjaan" name="jenis_pekerjaan" required>
            <option value="">Jenis Pekerjaan</option>
            <option value="Karyawan Swasta" {{($pekerjaan->jenis_pekerjaan == 'Karyawan Swasta')?'selected':''}}>Karyawan Swasta</option>
            <option value="Wiraswasta" {{($pekerjaan->jenis_pekerjaan == 'Wiraswasta')?'selected':''}}>Wiraswasta</option>
            <option value="PNS" {{($pekerjaan->jenis_pekerjaan == 'PNS')?'selected':''}}>PNS</option>
            <option value="Pensiunan" {{($pekerjaan->jenis_pekerjaan == 'Pensiunan')?'selected':''}}>Pensiunan</option>
            <option value="Buruh-tani" {{($pekerjaan->jenis_pekerjaan == 'Buruh Tani')?'selected':''}}>Buruh Tani</option>
            <option value="Tidak Bekerja" {{($pekerjaan->jenis_pekerjaan == 'Tidak Bekerja')?'selected':''}}>Tidak Bekerja</option>
        </select>
    </div>

    @error('jenis_pekerjaan')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jenis pekerjaan<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Tempat Kerja</label> 
        <input type="text" name="tempat_kerja" id="tempat_kerja" value="{{ $pekerjaan->tempat_kerja }}" class="form-control @error('tempat_kerja') is-invalid @enderror">
    </div>

    @error('tempat_kerja')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi tempat kerja<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Alamat Kerja</label> 
        <input type="text" name="alamat_kerja" id="alamat_kerja" value="{{ $pekerjaan->alamat_kerja }}" class="form-control @error('alamat_kerja') is-invalid @enderror">
    </div>

    @error('alamat_kerja')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi alamat kerja<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>Jabatan</label> 
        <input type="text" name="jabatan" id="jabatan" value="{{ $pekerjaan->jabatan }}" class="form-control @error('jabatan') is-invalid @enderror">
    </div>

    @error('jabatan')
        <div class="col-sm-3">
            <div class="alert alert-danger">Wajib isi jabatan<button type="button" class="close" data-dismiss="alert">×</button></div>
        </div>
    @enderror

    <div class="col-sm-3">
        <label>No Telepon</label> 
        <input type="number" name="no_telp" id="no_telp" value="{{ $pekerjaan->no_telp }}" class="form-control">
    </div>

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
        dropdownParent: $("#pekerjaan"),
        width: '100%'
    });
});
</script>