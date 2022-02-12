@extends('layouts.app')

@section('content')

<h1 align="center">Daftar Pekerjaan</h1>

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

@can ('edit pekerjaan')
    <div class="col-sx-12">
        <a href="tambah-pekerjaan" class='btn btn-outline-secondary'>Tambah Pekerjaan</a>
        <a href="cari-pekerjaan" class='btn btn-outline-secondary'>Cari Pekerjaan</a>
    </div>
@endcan
</div>

<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>Nama Jemaat</th>
        <th>pekerjaan</th>
        <th>Tempat</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>

    @php ($i=1)
        @foreach ($pekerjaan as $Pekerjaan)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $Pekerjaan->nama_jemaat}}</td>
                <td>{{ $Pekerjaan->jabatan}}</td>
                <td>{{ $Pekerjaan->tempat_kerja }}</td>
                @can ('edit pekerjaan')
                <td><a href="edit-pekerjaan/{{$Pekerjaan->id}}" class='btn btn-outline-dark'>Edit</a></td>
                @endcan
                @can ('delete pekerjaan')
                <td><a href="hapus-pekerjaan/{{$Pekerjaan->id}}" class='btn btn-outline-danger'>Hapus</a></td>
                @endcan
            </tr>
        @php($i++)
    @endforeach
</table>
{{ $pekerjaan->links() }}

@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

</script>