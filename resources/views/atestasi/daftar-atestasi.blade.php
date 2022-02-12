@extends('layouts.app')

@section('content')
<h1 align="center">Daftar Atestasi</h1>
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

@can ('create atestasi')
<div class="col-xs-12">
    <a href="tambah-atestasi" class='btn btn-outline-secondary'>Tambah Atestasi</a>
    <a href="cari-atestasi" class='btn btn-outline-secondary'>Cari Atestasi</a>
</div>
@endcan
</div>

<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>Nama Jemaat</th>
        <th>No Surat</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>

    @php ($i=1)
        @foreach ($Atestasi as $atestasi)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $atestasi->nama_jemaat }}</td>
            <td>{{ $atestasi->no_surat }}</td>
        @can ('edit atestasi')
            <td><a href="edit-atestasi/{{$atestasi->id}}" class='btn btn-outline-dark'>Edit</a></td>
        @endcan
        @can ('delete atestasi')
            <td><a href="hapus-atestasi/{{$atestasi->id}}" class='btn btn-outline-danger'>Hapus</a></td>
        @endcan
        </tr>
        
        @php($i++)
    @endforeach
</table>


@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

</script>