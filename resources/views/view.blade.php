@extends('layouts.app')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Add Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                {{-- <a class="btn btn-success px-4" href="{{ url('/tambah') }}">Add</a>
                --}}
            </div><!-- /.container-fluid -->
        </div>
        <div class="row align-items-center justify-content-center h-100">
            <div class="col-12">
                <div class="card mt-md-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-eft">Product</div>
                            <div class="col text-right">
                                <a href="/product" class="btn btn-xs btn-dark">
                                    <i class="fa fa-backspace"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.show', $product->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="#">product_title</label>
                                <div class="form-control">{{ $product->product_title }}</div>
                            </div>
                            <div class="form-group">
                                <label for="#">product_slug</label>
                                <div class="form-control">{{ $product->product_slug }}</div>
                            </div>
                            <div class="form-group">
                                <label for="#">product_image</label>
                                <div class="form-control">{{ $product->product_image }}</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endsection
