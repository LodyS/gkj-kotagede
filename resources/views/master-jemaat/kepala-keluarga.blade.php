@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<h1 align="center">Data Jemaat per kepala keluarga</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>ID Jemaat</td>
                <td>Nama Jemaat</td>
                <td>Alamat</td>
                <td>Wilayah</td>
            </tr>
            @php ($i=1)
            @foreach ($Jemaat as $jemaat)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $jemaat->id_jemaat}}</td>
                <td><a href="detail-kepala-keluarga/{{ $jemaat->no_kk}}">{{ $jemaat->nama_jemaat}}</a></td>
                <td>{{ $jemaat->alamat}}</td>
                <td>{{ $jemaat->ket}}</td>
                <td>
            <tr>
        @php($i++)
            @endforeach
    </table>
    {{ $Jemaat->links() }}
</div>


</div>
@endsection