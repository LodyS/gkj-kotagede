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
                    <h1 align="center">Gereja</h1>
                </div>

            <div class="pull-right mb-2" align="right">
                <a class="btn btn-success" align="right" onClick="add()" href="javascript:void(0)">Tambah Gereja</a>
            </div>

        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card-body">
        <table class="table table-bordered" id="gereja">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th width="40%">Alamat</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
<!-- boostrap company model -->

<div class="modal fade" id="sistem-informasi-gereja" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="SistemInformasiGereja"></h4>
        </div>

            <div class="modal-body">
                <form action="javascript:void(0)" id="SistemInformasiGerejaForm" name="SistemInformasiGerejaForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-12">
                                    <input type="text" class="form-control" id="nama" name="nama" maxlength="50" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Alamat</label>
                                    <div class="col-sm-12">
                                    <input type="text" class="form-control" id="alamat" name="alamat" maxlength="50">
                                </div>
                            </div>

                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save">Simpan
                                </button>
                            </div>

                        </form>
                    </div>
                <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
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

$('#gereja').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ url('gereja/index') }}",
        columns: [
            { data: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama', name: 'nama' },
            { data: 'alamat', name: 'alamat' },
            { data: 'action', name: 'action', orderable: false},
        ],
        order: [[0, 'desc']]
    });
});

function add(){
    $('#SistemInformasiGerejaForm').trigger("reset");
    $('#SistemInformasiGereja').html("Tambah Gereja");
    $('#sistem-informasi-gereja').modal('show');
    $('#id').val('');
}

function editFunc(id){
    $.ajax({
        type:"POST",
        url: "{{ url('update-gereja') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
            $('#SistemInformasiGereja').html("Edit Gereja");
            $('#sistem-informasi-gereja').modal('show');
            $('#id').val(res.id);
            $('#nama').val(res.nama);
            $('#alamat').val(res.alamat);
        }
    });
}

function deleteFunc(id){
    if (confirm("Hapus Gereja ?") == true) {
    var id = id;

    $.ajax({
        type:"POST",
        url: "{{ url('remove-gereja') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){

            var oTable = $('#gereja').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}

$('#SistemInformasiGerejaForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

$.ajax({
    type:'POST',
    url: "{{ url('simpan-gereja')}}",
    data: formData,
    cache : false,
    contentType : false,
    processData : false,
    success: (data) => {
        $("#sistem-informasi-gereja").modal('hide');
            var oTable = $('#gereja').dataTable();
            oTable.fnDraw(false);
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
        },

        error: function(data){
        console.log(data);
        }
    });
});
</script>
</html>
