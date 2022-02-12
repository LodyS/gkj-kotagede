@extends('layouts.app')

@section('content')

<h1>Hapus usaha</h1>

<form action="{{ url('delete-usaha') }}" method="post">{{ @csrf_field() }} 

<input type="hidden" value="{{ $usaha->id}}" name="id">

<h3>Anda yakin akan menghapus<br/>
<div class="col-sm-3">
    <button type="submit" class="btn btn-danger">Hapus</button>
    <a href="usaha/daftar-usaha" class="btn btn-danger">Batal</a>
    </div>
</form>

@endsection