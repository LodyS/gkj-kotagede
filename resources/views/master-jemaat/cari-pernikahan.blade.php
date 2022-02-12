@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                <form action="" method="POST" id="list-pernikahan">@csrf

<div class="form-row">
    <div class="col-sm-3">
        <label>Tanggal</label> 
        <input type="number" name="tanggal" id="bulan" min="0" max="31" class="form-control">
</div>

<div class="col-sm-3">
    <label>Bulan</label> 
            <select class="form-control mb-2"  name="bulan" id="bulan" required>
            <option value="">Pilih Bulan</option>
            <option value="1"  {{(date('m') == '1')?'selected':''}}>Januari</option>
            <option value="2"  {{(date('m') == '2')?'selected':''}}>Febuari</option>
            <option value="3"  {{(date('m') == '3')?'selected':''}}>Maret</option>
            <option value="4"  {{(date('m') == '4')?'selected':''}}>April</option>
            <option value="5"  {{(date('m') == '5')?'selected':''}}>Mei</option>
            <option value="6"  {{(date('m') == '6')?'selected':''}}>Juni</option>
            <option value="7"  {{(date('m') == '7')?'selected':''}}>Juli</option>
            <option value="8"  {{(date('m') == '8')?'selected':''}}>Agustus</option>
            <option value="9"  {{(date('m') == '9')?'selected':''}}>September</option>
            <option value="10" {{(date('m') == '10')?'selected':''}}>Oktober</option>
            <option value="11" {{(date('m') == '11')?'selected':''}}>November</option>
            <option value="12" {{(date('m') == '12')?'selected':''}}>Desember</option>
        </select>
    </div>
</div>

<button type="submit" class="btn btn-primary" id="cari">Cari</button>

<h1 align="center">Hasil Pencarian</h1>
    <div class="media-body">
        <table class="table table-hover" id="daftar-pernikahan">
            <thead>
                <tr>
                <td>No</td>
                <td>Pasangan</td>
                <td>Tanggal Pernikahan</td>
                <td>Wilayah</td>
                </tr>
            </thead>
        <tbody></body>
    </table>
</div>
@endsection

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

$(document).ready(function(){

$('#list-pernikahan #cari').on('click', function (e) {
    e.preventDefault();
        $.ajax({
            type: 'POST',
            url: "search-pernikahan",
            data: $("#list-pernikahan").serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data);
                let table = $("#daftar-pernikahan tbody");
                let no = 1;
                table.empty();
                $.each(data, function(i, item){

                    var date = new Date(item.tanggal).toDateString("d-m-y");  
                    table.append("<tr><td>"+no+++"</td><td>"+item.pasangan+"</td><td>"+date+"</td><td>"+item.ket+"</td></tr>");
                            
                });
            }
        });
    });
});

</script>