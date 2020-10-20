@extends('layouts.app');
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                {{-- <a class="btn btn-success px-4 float-right mb-2 btn-sm"
                    href="">tambah</a> --}}

            </div><!-- /.container-fluid -->
            <div class="row">
                <div class="col-12 bg-white">
                </div>
                <div class="col-12 bg-white">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <a href="{{ url('product ') }}" class="btn btn-xs btn-danger float-right">
                                <i class="fa fa-backspace"></i> Back
                            </a>
                            <h2>Upload Data Product</h2>
                        </div>
                        <div class="card-body">
                            <form action="/product/upload/data" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="#">Upload File</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <input type="submit" class="btn btn-primary btn-sm float-right" value="Upload">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
