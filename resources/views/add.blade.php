@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Data:</strong> Tidak Tersimpan <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
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
                  <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
            {{-- <a class="btn btn-success px-4" href="{{url('/tambah')}}">Add</a> --}}
          </div><!-- /.container-fluid -->
        </div>
        @if(session('error'))
        <div class="alert alert-danger col-3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{session('error')}}</strong>
          </div>
        @endif


    <div class="row align-items-center justify-content-center h-100">
        <div class="col-12">
            <div class="card mt-md-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col text-left">Add Product</div>
                        <div class="col text-right">
                        <a href="{{url('product ')}}" class="btn btn-xs btn-danger">
                            <i class="fa fa-backspace"></i> Back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('product.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="#">Product</label>
                        <input type="text" name="product_title" class="form-control"
                            placeholder="Nama Product" value="">
                    </div>
                    <div class="form-group">
                        <label for="#">Slug</label>
                        <input type="text" name="product_slug" class="form-control"
                            placeholder="Nama Merk" value="">
                    </div>
                    <div class="form-group">
                        <label for="#">Image</label>
                        <input type="text" name="product_image" class="form-control"
                            placeholder="Gambar" value="">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
