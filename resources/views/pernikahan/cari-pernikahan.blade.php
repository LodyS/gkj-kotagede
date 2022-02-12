@extends('layouts.app')

@section('content')

<h1 align="center">Cari pernikahan</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

<form action="" method="POST" id="list-pernikahan">@csrf
    <div class="col-sm-3">
        <label>Jemaat</label> 
            <select class="form-control" name="id_pernikahan" id="id_pernikahan" required>
                <option value="">Pilih Jemaat</option>
                @foreach ($pernikahan as $nikah)
                <option value="{{ $nikah->id }}">{{ $nikah->suami }} & {{ $nikah->istri }}</option>
                @endforeach
            </select>
        <button type="submit" class="btn btn-primary" id="cari">Cari</button>
    </div>
</div>

<table class="table table-hover" id="get-pernikahan">
    <thead>
        <tr>
            <th>No</th>
            <th>Suami</th>
            <th>Istri</th>
            <th>Tanggal</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>

    <tbody>
    </body>
</table>
</form>

@endsection

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<link href="{{ asset('js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>

<script type="text/javascript">

$(document).ready(function(){

$('#id_pernikahan').select2({
    width: '100%'
});    

$('#list-pernikahan #cari').on('click', function (e) {
    e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "search-pernikahan",
            data: $("#list-pernikahan").serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                let table = $("#get-pernikahan tbody");
                let no = 1;
                table.empty();
                $.each(data, function(i, item){
                       
                table.append("<tr><td>"+no+++"</td><td>"+item.suami+"</td><td>"+item.istri+"</td><td>"+item.tanggal+"</td> <td><a href='edit-pernikahan/"+item.id+"' class='btn btn-outline-dark'>Edit</a></td> <td><a href='hapus-pernikahan/"+item.id+"' class='btn btn-outline-danger'>Hapus</a></td></tr>");
                            
                });
            }
        });
    });
});

</script>