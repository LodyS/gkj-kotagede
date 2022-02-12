@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">


    <table class="table table-hover">
        <h3 align="center">Data Diri</h3>
            <thead align="center">
                <tr><td>Nama : {{ $datadiri->nama_jemaat }} </td></tr>
                <tr><td>Wilayah : {{ $datadiri->wilayah }} </td></tr>
                <tr><td>ID Jemaat : {{ $datadiri->id_jemaat }} </td></tr>
                <tr><td>Status Ke anggotaan : {{ $datadiri->status }} </td></tr>
                <tr>
                @if ($datadiri->jkel == 'L')
                <td>Jenis Kelamin : Pria </td>
                @endif
                @if ($datadiri->jkel == 'P')
                <td>Jenis Kelamin : Wanita </td>
                @endif
                </tr>
                <tr><td>Tempat, Tanggal lahir: {{ $datadiri->ttl }} & {{ date('d-m-Y', strtotime($datadiri->tanggal))}} </td></tr>
                <tr><td>Golongan Darah : {{ $datadiri->goldarah }} </td></tr>
                <tr><td>Alamat : {{ $datadiri->alamat }} </td></tr>
                <tr><td>No HP : {{ $datadiri->no_hp }} </td></tr>
            </thead>
    </table>
    
    <table class="table table-hover">
        <h3 align="center">Data Pekerjaan</h3>
            <thead align="center">
                @if (isset($datakerja))
                <tr><td>Jenis Pekerjaan : {{ $datakerja->jenis_pekerjaan }}</td></tr>
                <tr><td>Tempat Kerja : {{ $datakerja->tempat_kerja }} </td></tr>
                <tr><td>Alamat Pekerjaan : {{ $datakerja->alamat_kerja }}</td></tr>
                <tr><td>Jabatan : {{ $datakerja->jabatan }}</td></tr>
                @else
                <tr><td>Jenis Pekerjaan : </td></tr>
                <tr><td>Tempat Kerja : </td></tr>
                <tr><td>Alamat Pekerjaan : </td></tr>
                <tr><td>Jabatan : </td></tr>
            @endif
        </thead>
    </table>

    <table class="table table-hover">
        <h3 align="center">Data Babtis</h3>
            <thead align="center">
                @if (isset($datababtis))
                <tr><td>Tempat Babtis : {{ $datababtis->gereja}}</td></tr>
                <tr><td>Tanggal Babtis : {{ date('d-m-Y', strtotime($datababtis->tanggal_babtis)) }} </td></tr>
                <tr><td>No Surat Babtis : {{ $datababtis->no_surat_babtis }} </td></tr>
                <tr><td>Pendeta : {{ $datababtis->pendeta_babtis }} </td></tr>
                @else
                <tr><td>Tempat Babtis : </td></tr>
                <tr><td>Tanggal Babtis :  </td></tr>
                <tr><td>No Surat Babtis : </td></tr>
                <tr><td>Pendeta : </td></tr>
            @endif
        </thead>
    </table>

    <table class="table table-hover">
        <h3 align="center">Data Sidi</h3>
            <thead align="center">
                @if (isset($datababtis))
                <tr><td>Tempat Sidi : {{ $datababtis->gereja}}</td></tr>
                <tr><td>Tanggal Sidi : {{ date('d-m-Y', strtotime($datababtis->tanggal_sidi)) }} </td></tr>
                <tr><td>No Surat Sidi : {{ $datababtis->no_surat_sidi }} </td></tr>
                <tr><td>Pendeta : {{ $datababtis->pendeta_sidi }} </td></tr>
                @else
                <tr><td>Tempat Sidi : </td></tr>
                <tr><td>Tanggal Sidi :  </td></tr>
                <tr><td>No Surat Sidi : </td></tr>
                <tr><td>Pendeta : </td></tr>
                @endif
            </thead>
        </table>
    </div>
</div>
@endsection