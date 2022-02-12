@extends('layouts.app')

@section('content')
<h1 align="center">{{ isset($jemaat->id) ? 'Edit Jemaat' : 'Tambah Jemaat' }}</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="{{ isset($jemaat->id) ? url('update-jemaat') : url('simpan-jemaat') }}" method="post" id="gereja">{{ @csrf_field() }}
<input type="hidden" name="id" value="{{ isset($jemaat) ? $jemaat->id : '' }}">
<input type="hidden" name="user_input" value="{{ Auth::user()->id }}">
<input type="hidden" name="user_update" value="{{ Auth::user()->id }}">

    <div class="form-row">
        <div class="col-sm-2">
        <label>ID Jemaat</label>
        <input type="text" name="id_jemaat" id="id_jemaat" class="form-control" value="{{ isset($jemaat) ? $jemaat->id_jemaat : '' }}" required>
    </div>

    <div class="col-sm-1">
        <label>Status</label>
            <select id="status" class="form-control" name="status" required>
            <option value="">Pilih</option>
            <option value="aktif" {{($jemaat->status == 'aktif')?'selected':''}}>Aktif</option>
            <option value="tidak aktif" {{($jemaat->status == 'tidak aktif')?'selected':''}}>Tidak Aktif</option>
        </select>
    </div>

    <div class="col-sm-2">
        <label>No KK</label>
        <input type="text" name="no_kk" id="no_kk" class="form-control" value="{{ isset($jemaat) ? $jemaat->no_kk : '' }}">
    </div>

    <div class="col-sm-3">
        <label>Nama Orang Tua</label>
            <select class="form-control" name="nama_orangtua">
            <option value="">Pilih</option>
            @foreach ($Pernikahan as $parent)
            <option value="{{ $parent->orang_tua }}" {{($jemaat->orang_tua == $parent->orang_tua)?'selected':''}}>{{ $parent->orang_tua }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-3">
        <label>Nama Jemaat</label>
        <input type="text" name="nama_jemaat" value="{{ isset($jemaat) ? $jemaat->nama_jemaat : '' }}" class="form-control" required>
        </div>
    </div>

    <div class="col-sm-3">
        <label>Tempat Lahir</label>
        <input type="text" name="ttl" value="{{ isset($jemaat) ? $jemaat->ttl : '' }}" class="form-control" required>
        </div>
    </div>

    <div class="form-group col-sm-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="{{ isset($jemaat) ? $jemaat->tanggal :date('Y-m-d') }}" class="form-control">
    </div>

    <div class="col-sm-2">
        <label>Jenis Kelamin</label>
            <select class="form-control" name="jkel" required>
            <option value="">Pilih</option>
            <option value="L" {{($jemaat->jkel == 'L')?'selected':''}}>Laki-laki</option>
            <option value="P" {{($jemaat->jkel == 'P')?'selected':''}}>Wanita</option>
        </select>
    </div>

    <div class="col-sm-1">
        <label>Wilayah</label>
            <select class="form-control" name="ket" id="ket" required>
            <option value="">Pilih</option>
            <option value="01" {{($jemaat->ket == '01')?'selected':''}}>01</option>
            <option value="02" {{($jemaat->ket == '02')?'selected':''}}>02</option>
            <option value="03" {{($jemaat->ket == '03')?'selected':''}}>03</option>
            <option value="04" {{($jemaat->ket == '04')?'selected':''}}>04</option>
            <option value="05" {{($jemaat->ket == '05')?'selected':''}}>05</option>
        </select>
    </div>

    <div class="form-group col-sm-3">
        <label>Alamat</label>
        <input typee="text" class="form-control" id="alamat" name="alamat" value="{{ isset($jemaat) ? $jemaat->alamat : '' }}">
        </div>
    </div>

    <div class="form-row">
        <div class="col-sm-2">
            <label>Pernikahan</label>
            <select class="form-control" name="pernikahan" required>
            <option value="">Pilih</option>
            <option value="Menikah" {{($jemaat->pernikahan == 'Menikah')?'selected':''}}>Menikah</option>
            <option value="Belum Menikah" {{($jemaat->pernikahan == 'Belum Menikah')?'selected':''}}>Belum Menikah</option>
            <option value="Janda" {{($jemaat->pernikahan == 'Janda')?'selected':''}}>Janda</option>
            <option value="Duda" {{($jemaat->pernikahan == 'Duda')?'selected':''}}>Duda</option>
        </select>
    </div>

    <div class="col-sm-2">
        <label>Gereja</label>
            <select id="gereja" name="asal_gereja" class="form-control" required>
            <option value="">Pilih</option>
            @foreach ($gereja as $Gereja)
            <option value="{{ $Gereja->id }}" {{ ($jemaat->asal_gereja == $Gereja->id) ? 'selected' :'' }}>{{ $Gereja->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-2">
        <label>Golongan Darah</label>
            <select class="form-control" name="gol_darah">
            <option value="">Pilih</option>
            <option value="A" {{($jemaat->gol_darah == 'A')?'selected':''}}>A</option>
            <option value="B" {{($jemaat->gol_darah == 'B')?'selected':''}}>B</option>
            <option value="AB" {{($jemaat->gol_darah == 'AB')?'selected':''}}>AB</option>
            <option value="O" {{($jemaat->gol_darah == 'O')?'selected':''}}>O</option>
        </select>
    </div>

    <div class="col-sm-2">
        <label>No HP</label>
        <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ isset($jemaat) ? $jemaat->no_hp : '' }}">
    </div>

    <div class="col-sm-3">
        <label>E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ isset($jemaat) ? $jemaat->email : '' }}">
        </div>
    </div><br/>

    <div class="col-sm-6">
        <button type="submit" class="btn btn-danger">Simpan</button>
    </div>
</div>

@endsection
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<link href="{{ asset('js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>

<script type="text/javascript">

$(document).ready(function(){

$('select').select2({
        dropdownParent: $("#gereja"),
        width: '100%'
    });
});

</script>
