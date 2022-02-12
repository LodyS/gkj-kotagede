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
                    <h1 align="center">Pendidikan</h1>
                </div>

            <div class="pull-right mb-2" align="right">
                <a class="btn btn-outline-success" align="right" href="form">Tambah</a>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

        <div class="card-body">
            <table class="table table-bordered" id="pendidikan">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th width="40%">Sekolah</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</body>

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

$('#pendidikan').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('pendidikan/index') }}",
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama_jemaat', name: 'jemaat.nama_jemaat' },
            { data: 'nama_sekolah', name: 'nama_sekolah' },
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
});



function deleteFunc(id){
    if (confirm("Hapus pendidikan ?") == true) {
    var id = id;

    $.ajax({
        type:"POST",
        url: "{{ url('remove-pendidikan') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){

            var oTable = $('#pendidikan').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}
</script>
</html>
