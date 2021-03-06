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
            <div class="col-8">
                <div class="card mt-md-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col text-left">Update Product</div>
                            <div class="col text-right">
                                <a href="/product" class="btn btn-xs btn-dark">
                                    <i class="fa fa-arrow-circle-left"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.update', $product->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="#">Product</label>
                                <input type="text" name="product_title" class="form-control" placeholder="Nama Product"
                                    value="{{ $product->product_title }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="#">Slug</label>
                                <input type="text" name="product_slug" class="form-control" placeholder="Nama Merk"
                                    value="{{ $product->product_slug }}" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label for="#">Image</label>
                                <input type="text" name="product_image" class="form-control" placeholder="Harga Beli"
                                    value="{{ $product->product_image }}" autocomplete="off">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-save"></i>
                                Save
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
