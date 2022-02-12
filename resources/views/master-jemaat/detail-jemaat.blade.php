@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

    <!--<div class="col-sx-12">
        <a href="cari-ulang-tahun" class='btn btn-outline-secondary'>Cari Jemaat</a>
    </div>-->

<h1 align="center">Data Jemaat</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>ID Jemaat</td>
                <td>Nama Jemaat</td>
            
                <td>Detail</td>
            </tr>
            @php ($i=1)
            @foreach ($Jemaat as $jemaat)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $jemaat->id_jemaat }}</td>
                <td>{{ $jemaat->nama_jemaat}}</td>
                <td><a href="detail-informasi-jemaat/{{$jemaat->id}}" class="btn btn-outline-dark">Detail</a></td>
            <tr>
        @php($i++)
            @endforeach
    </table>
    {{ $Jemaat->links() }}
</div>


</div>
@endsection