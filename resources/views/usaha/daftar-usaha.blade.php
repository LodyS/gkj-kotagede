@extends('layouts.app')

@section('content')

<h1 align="center">Daftar Usaha</h1>
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

    @can ('create usaha')
        <div class="col-sx-12">
            <a href="tambah-usaha" class='btn btn-outline-secondary'>Tambah Usaha</a>
            <a href="cari-usaha" class='btn btn-outline-secondary'>Cari Usaha</a>
        </div>
    @endcan
</div>

<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>Nama Jemaat</th>
        <th>Usaha</th>
        <th>Edit</th>
        <th>Hapus</th>
    </tr>

    @php ($i=1)
        @foreach ($usaha as $Usaha)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $Usaha->nama_jemaat}}</td>
            <td>{{ $Usaha->usaha}}</td>
        @can ('edit usaha')
            <td><a href="edit-usaha/{{$Usaha->id}}" class='btn btn-outline-dark'>Edit</a></td>
        @endcan
        @can ('delete usaha')
            <td><a href="hapus-usaha/{{$Usaha->id}}" class='btn btn-outline-danger'>Hapus</a></td>
        @endcan
        </tr>
        
        @php($i++)
    @endforeach
</table>
{{ $usaha->links() }}

@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

</script>