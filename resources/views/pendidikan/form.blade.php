@extends('layouts.app')

@section('content')
<h1 align="center">{{ ($aksi == 'create') ?'Tambah' : 'Edit' }} Pendidikan</h1>
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

<form action="{{ ($aksi == 'update') ? url('update-pendidikan') : url('simpan-pendidikan') }}" method="post" id="pendidikan">{{ @csrf_field() }}
<input type="hidden" name="id" value="{{ isset($pendidikan) ? $pendidikan->id : '' }}">
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">

    <div class="col-sm-3">
        <label>Jemaat</label>
			<select class="form-control select" name="id_jemaat" id="id_jemaat" required>
			<option value="--">Pilih Jemaat</option>
            @foreach ($jemaat as $j)
            <option value="{{ $j->id}}" {{($pendidikan->id_jemaat == $j->id)?'selected':''}}>{{ $j->nama_jemaat }}</option>
            @endforeach
        </select>
	</div>

    <div class="col-sm-3">
        <label>Jenjang Pendidikan</label>
			<select name="jenjang_pendidikan" id="jenjang_pendidikan" class="form-control select" required>
			<option value="--">Pilih Jenjang Pendidikan</option>
            <option value="TK" {{($pendidikan->jenjang_pendidikan == 'TK')?'selected':''}}>TK</option>
            <option value="SD" {{($pendidikan->jenjang_pendidikan == 'SD')?'selected':''}}>SD</option>
            <option value="SMP" {{($pendidikan->jenjang_pendidikan == 'SMP')?'selected':''}}>SMP</option>
            <option value="SMA/SMK" {{($pendidikan->jenjang_pendidikan == 'SMA/SMK')?'selected':''}}>SMK</option>
            <option value="D1" {{($pendidikan->jenjang_pendidikan == 'D1')?'selected':''}}>D1</option>
            <option value="D2" {{($pendidikan->jenjang_pendidikan == 'D2')?'selected':''}}>D2</option>
            <option value="D3" {{($pendidikan->jenjang_pendidikan == 'D3')?'selected':''}}>D3</option>
            <option value="D4" {{($pendidikan->jenjang_pendidikan == 'D4')?'selected':''}}>D4</option>
            <option value="S1" {{($pendidikan->jenjang_pendidikan == 'S1')?'selected':''}}>S1</option>
            <option value="S2" {{($pendidikan->jenjang_pendidikan == 'S2')?'selected':''}}>S2</option>
            <option value="S3" {{($pendidikan->jenjang_pendidikan == 'S3')?'selected':''}}>S3</option>
        </select>
	</div>


    <div class="col-sm-3">
        <label>Nama Sekolah</label>
        <input type="text" name="nama_sekolah" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->nama_sekolah :''}}">
    </div>

    <div class="col-sm-3">
        <label>Tahun Lulus</label>
        <input type="number" name="tahun_lulus" minlength="4" maxlength="4" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->tahun_lulus :''}}">
    </div>

    <div class="col-sm-3">
        <label>Gelar</label>
        <input type="text" name="gelar" class="form-control" value="{{ isset($pendidikan) ? $pendidikan->gelar :''}}">
    </div>

    <div class="col-sm-3">
        <label>Pendidikan Khusus</label>
        <input type="text" name="pendidikan_khusus" value="{{ isset($pendidikan) ? $pendidikan->pendidikan_khusus :''}}" class="form-control">
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
        dropdownParent: $("#pendidikan"),
        width: '100%'
    });
});
</script>
