@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

    <div class="col-sx-12">
        <a href="cari-ulang-tahun" class='btn btn-outline-secondary'>Cari Ulang Tahun</a>
    </div>

<h1 align="center">Jemaat yang ulang tahun hari ini</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Jemaat</td>
                <td>Tanggal Lahir</td>
                <td>Wilayah</td>
            </tr>
            @php ($i=1)
            @foreach ($Jemaat as $jemaat)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $jemaat->nama_jemaat}}</td>
                <td>{{ date('d-m-Y', strtotime($jemaat->tanggal))}}</td>
                <td>{{ $jemaat->ket}}</td>
            <tr>
        @php($i++)
            @endforeach
    </table>
    {{ $Jemaat->links() }}
</div>


</div>
@endsection