@extends('layouts.app')

@section('content')
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="csrf-token" content="{{ csrf_token() }}">
        </head>

    <body>

    <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    <h1 align="center">Jemaat</h1>
                </div>

            <div class="pull-right mb-2" align="right">
                <a class="btn btn-outline-success" align="right" href="form-jemaat">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/>
                <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
                <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
                </svg>Tambah Jemaat</a>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

        <div class="card-body">
            <table class="table table-bordered" id="jemaat">
                <thead>
                    <tr>
                        <th>No</th>
                        <th width="55%">Nama</th>
                        <th width="10%">Wilayah</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>
@endsection
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="{{ asset('js/datatable/js/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
$(document).ready( function () {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#jemaat').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('jemaat/index') }}",
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_jemaat', name: 'nama_jemaat' },
            { data: 'ket', name: 'ket' },
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
});



function deleteFunc(id){
    if (confirm("Hapus jemaat ?") == true) {
    var id = id;

    $.ajax({
        type:"POST",
        url: "{{ url('remove-jemaat') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){

            var oTable = $('#jemaat').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}
</script>
</html>
