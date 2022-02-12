@extends('layouts.app')

@section('content')

<h1>Hapus Pekerjaan</h1>

<form action="{{ url('delete-pekerjaan') }}" method="post">
{{ @csrf_field() }} 

<input type="hidden" value="{{ $pekerjaan->id}}" name="id">

<h3>Anda yakin akan menghapus data ini</h3>
<div class="col-sm-3">
    <button type="submit" class="btn btn-danger">Hapus</button>
    <a href="pekerjaan/daftar-pekerjaan" class="btn btn-danger">Batal</a>
    </div>
</form>

@endsection