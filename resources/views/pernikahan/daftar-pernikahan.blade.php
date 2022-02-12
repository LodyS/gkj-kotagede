@extends('layouts.app')

@section('content')
<h1 align="center">Daftar Pernikahan</h1>
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

@can('create pernikahan')
<div class="col-sx-12">
    <a href="tambah-pernikahan" class='btn btn-outline-secondary'>Tambah Pernikahan</a>
    <a href="cari-pernikahan" class='btn btn-outline-secondary'>Cari Pernikahan</a>
</div>
@endcan
</div>

<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>Pasangan</th>
        <th>Tanggal</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>

    @php ($i=1)
        @foreach ($pernikahan as $nikah)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $nikah->suami }} & {{ $nikah->istri }}</td>
            <td>{{date('d-m-Y', strtotime($nikah->tanggal))}}</td>
            @can('edit pernikahan')
            <td><a href="edit-pernikahan/{{$nikah->id}}" class='btn btn-outline-dark'>Edit</a></td>
            @endcan
            @can('delete pernikahan')
            <td><a href="hapus-pernikahan/{{$nikah->id}}" class='btn btn-outline-danger'>Hapus</a></td>
            @endcan
        </tr>
        
        @php($i++)
    @endforeach
</table>
{{ $pernikahan->links() }}

@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

</script>