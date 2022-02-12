@extends('layouts.app')

@section('content')

<h1 align="center">Cari babtis</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="" method="POST" id="list-babtis">@csrf
    <div class="col-sm-3">
        <select class="form-control" name="id_jemaat" id="id_jemaat" required>
                <option value="">Pilih Jemaat</option>
                @foreach ($data as $babtis)
                <option value="{{ $babtis->id_jemaat }}">{{ $babtis->nama_jemaat }}</option>
                @endforeach
            </select>
        <button type="submit" class="btn btn-primary" id="cari">Cari</button>
    </div>
</div>

<table class="table table-hover" id="get-babtis">
    <thead>
        <tr>
            <th>No</th>
            <th>No Surat Babtis</th>
            <th>Nama Jemaat</th>
            <th>Tanggal Babtis</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>

    <tbody></body>
</table>

</form>

@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<link href="{{ asset('js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>

<script type="text/javascript">

$(document).ready(function(){

$('#id_jemaat').select2({
    width: '100%'
});    

$('#list-babtis #cari').on('click', function (e) {
    e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "search-babtis",
            data: $("#list-babtis").serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                let table = $("#get-babtis tbody");
                let no = 1;
                table.empty();
                $.each(data, function(i, item){
                       
                table.append("<tr><td>"+no+++"</td><td>"+item.no_surat_babtis+"</td><td>"+item.nama_jemaat+"</td><td>"+item.tanggal_babtis+"</td><td><a href='edit-babtis/"+item.id+"' class='btn btn-outline-dark'>Edit</a></td> <td><a href='hapus-babtis/"+item.id+"' class='btn btn-outline-danger'>Hapus</a></td></tr>");
                            
                });
            }
        });
    });
});

</script>