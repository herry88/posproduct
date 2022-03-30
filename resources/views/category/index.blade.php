@extends('layouts.master')

@section('title')
    <title>Halaman Kategori</title>
@endsection

@section('container-fluid')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
                <h5 class="page-title">Halaman Kategori</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <button id="createNewCategory" class="btn btn btn-info waves-effect waves-light" data-toggle="modal"
                                data-target="#myModal">Tambah Data Kategori</button>
                        </div>
                        <table class="table data-table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Tools</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('category.form')
@endsection
@section('script')
    <script type="text/javascript">
        var table, save_method;
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('category.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
            $('#createNewCategory').click(function() {
                save_method = "add";
                $('#myModal form')[0].reset();
                $('#myModal').modal('show');
            });
            $('#myModal form').on('submit', function(e) {
                if (!e.isDefaultPrevented()) {
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ route('category.store') }}";
                    else url = "category/" + id;
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $('#myModal form').serialize(),
                        success: function(data) {
                            $('#myModal').modal('hide');
                            table.ajax.reload();
                        },
                        error: function() {
                            alert("Tidak dapat menyimpan data!");
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@endsection
