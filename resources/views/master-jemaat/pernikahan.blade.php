@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

    <div class="col-sx-12">
        <a href="cari-pernikahan" class='btn btn-outline-secondary'>Cari Pernikahan</a>
    </div>

<h1 align="center">Jemaat yang ulang tahun hari pernikahan ini</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Pasangan</td>
                <td>Tanggal Pernikahan</td>
                <td>Wilayah</td>
            </tr>
            @php ($i=1)
            @foreach ($Pernikahan as $nikah)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $nikah->suami }} & {{ $nikah->istri }}</td>
                <td>{{ date('d-m-Y', strtotime($nikah->tanggal))}}</td>
                <td>{{ $nikah->ket}}</td>
            <tr>
        @php($i++)
            @endforeach
    </table>
    {{ $Pernikahan->links() }}
</div>


</div>
@endsection