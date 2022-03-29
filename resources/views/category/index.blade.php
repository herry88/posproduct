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
                            <a href="#" class="btn btn-danger btn-lg">Tambah Data</a>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
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
@endsection
@section('script')
    <script>
        var table, save_method;
        $(function() {
            table = $('.table').DataTable({
                "processing": true,
                "serverside": true,
                "ajax": {
                    "url": "{{ route('category.data') }}",
                    "type": "GET"
                },
                "column": [{
                        data: 'name',
                        name: 'name'
                    }

                ]

            });
        });
    </script>
@endsection
