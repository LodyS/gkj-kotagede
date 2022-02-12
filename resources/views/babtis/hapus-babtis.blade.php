@extends('layouts.app')

@section('content')

<h1>Hapus Babtis</h1>

<form action="{{ url('delete-babtis') }}" method="post">
{{ @csrf_field() }} 

<input type="hidden" value="{{ $babtis->id}}" name="id">

<h3>Anda yakin akan menghapus {{ $babtis->nama_babtis }}
<div class="col-sm-3">
    <button type="submit" class="btn btn-danger">Hapus</button>
    <a href="babtis/daftar-babtis" class="btn btn-danger">Batal</a>
    </div>
</form>

@endsection