@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<h1 align="center">Data Jemaat yang meninggal bulan ini</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama Jemaat</td>
                <td>Tanggal Lahir</td>
                <td>Wilayah</td>
            </tr>
            @php ($i=1)
            @foreach ($Meninggal as $ninggal)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $ninggal->nama_jemaat }}</td>
                <td>{{ date('d-m-Y', strtotime($ninggal->tanggal_lahir))}}</td>
                <td>{{ $ninggal->ket}}</td>
            <tr>
        @php($i++)
            @endforeach
    </table>
    {{ $Meninggal->links() }}
</div>


</div>
@endsection