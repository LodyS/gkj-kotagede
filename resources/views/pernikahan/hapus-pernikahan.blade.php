@extends('layouts.app')

@section('content')

<h1>Hapus gereja</h1>

<form action="{{ url('delete-pernikahan') }}" method="post">{{ @csrf_field() }} 

<input type="hidden" value="{{ $pernikahan->id}}" name="id">

<h3>Anda yakin akan menghapus data ini ?<br/>
<div class="col-sm-3">
    <button type="submit" class="btn btn-danger">Hapus</button>
    <a href="pernikahan/daftar-pernikahan" class="btn btn-danger">Batal</a>
    </div>
</form>

@endsection