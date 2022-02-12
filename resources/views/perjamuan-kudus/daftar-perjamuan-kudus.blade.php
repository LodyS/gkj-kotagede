@extends('layouts.app')

@section('content')

<h1 align="center">Daftar Perjamuan Kudus</h1>
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

@can ('create perjamuan kudus')
<div class="col-sx-12">
    <a href="tambah-perjamuan-kudus" class='btn btn-outline-secondary'>Tambah Perjamuan Kudus</a>
    <a href="cari-perjamuan-kudus" class='btn btn-outline-secondary'>Cari Perjamuan Kudus</a>
</div>
@endcan
</div>

<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>Nama Jemaat</th>
        <th>Waktu</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>

    @php ($i=1)
        @foreach ($PerjamuanKudus as $perjamuan)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $perjamuan->nama_jemaat}}</td>
            <td>Tanggal : {{date('d-m-Y', strtotime($perjamuan->tanggal))}}, Jam : {{ $perjamuan->jam_ibadah}}</td>
        @can ('edit perjamuan kudus')
            <td><a href="edit-perjamuan-kudus/{{$perjamuan->id}}" class='btn btn-outline-dark'>Edit</a></td>
        @endcan
        @can ('delete perjamuan kudus')
            <td><a href="hapus-perjamuan-kudus/{{$perjamuan->id}}" class='btn btn-outline-danger'>Hapus</a></td>
        @endcan
        </tr>
        
        @php($i++)
    @endforeach
</table>

{{ $PerjamuanKudus->links() }}

@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

</script>