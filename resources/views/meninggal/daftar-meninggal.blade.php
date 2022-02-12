@extends('layouts.app')

@section('content')

<h1 align="center">Daftar Meninggal</h1>
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

    @can ('create meninggal')
        <div class="col-sx-12">
            <a href="tambah-meninggal" class='btn btn-outline-secondary'>Tambah meninggal</a>
            <a href="cari-meninggal" class='btn btn-outline-secondary'>Cari meninggal</a>
        </div>
    @endcan
</div>

<table class="table table-hover" id="meninggal">
    <tr>
        <th>No</th>
        <th>Nama Jemaat</th>
        <th>Tanggal</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>

    @php ($i=1)
        @foreach ($Meninggal as $meninggal)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $meninggal->nama_jemaat}}</td>
            <td>{{date('d-m-Y', strtotime($meninggal->tanggal))}}</td>
        @can ('edit meninggal')
            <td><a href="edit-meninggal/{{$meninggal->id}}" class='btn btn-outline-dark'>Edit</a></td>
        @endcan
        @can ('delete meninggal')
            <td><a href="hapus-meninggal/{{$meninggal->id}}" class='btn btn-outline-danger'>Hapus</a></td>
        @endcan
        </tr>
        
        @php($i++)
    @endforeach
</table>
{{ $Meninggal->links() }}

@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

</script>