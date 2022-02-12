@extends('layouts.app')

@section('content')

<h1>Hapus atestasi</h1>

<form action="{{ url('delete-atestasi') }}" method="post">{{ @csrf_field() }} 

<input type="hidden" value="{{ $atestasi->id}}" name="id">

<h3>Anda yakin akan menghapus<br/>
<div class="col-sm-3">
    <button type="submit" class="btn btn-danger">Hapus</button>
    <a href="atestasi/daftar-atestasi" class="btn btn-danger">Batal</a>
    </div>
</form>

@endsection