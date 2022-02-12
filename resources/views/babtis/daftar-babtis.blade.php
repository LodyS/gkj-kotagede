@extends('layouts.app')

@section('content')

<h1 align="center">Daftar Babtis</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

@if (session('status'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>{{ session('status') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>{{ session('warning') }}
    </div>
@endif

@can ('edit babtis')
    <div class="col-sx-12">
        <a href="tambah-babtis" class='btn btn-outline-secondary'>Tambah babtis</a>
        <a href="cari-babtis" class='btn btn-outline-secondary'>Cari babtis</a>
    </div>
@endcan
</div>

<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>No Surat Babtis</th>
        <th>Nama Jemaat</th>
        <th>Tanggal Babtis</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>

    @php ($i=1)
        @foreach ($babtis as $baptis)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $baptis->no_surat_babtis}}</td>
            <td>{{ $baptis->nama_jemaat}}</td>
            <td>{{date('d-m-Y', strtotime($baptis->tanggal_babtis))}}</td>
        @can ('edit babtis')
            <td><a href="edit-babtis/{{$baptis->id}}" class='btn btn-outline-dark'>Edit</a></td>
        @endcan
        @can ('delete babtis')
            <td><a href="hapus-babtis/{{$baptis->id}}" class='btn btn-outline-danger'>Hapus</a></td>
        @endcan
        </tr>
        
        @php($i++)
    @endforeach
</table>

{{ $babtis->links() }}

@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

</script>