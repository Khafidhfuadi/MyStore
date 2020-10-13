@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        {{-- <a class="btn btn-success px-4 float-right mb-2 btn-sm" href="">tambah</a> --}}
        <a href="{{ route('product.create') }}" class="btn btn-success px-4 float-right mb-2 btn-sm">
            <i class="fas fa-pen-add"></i> Tambah
          </a>

      </div><!-- /.container-fluid -->
      @if(session('info'))
      <div class="alert alert-success col-3" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>{{session('info')}}</strong>
        </div>
      @endif
      @if(session('error'))
      <div class="alert alert-danger col-3" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <strong>{{session('error')}}</strong>
       </div>
     @endif
    <table class="table table-striped table-hover table-success">
        <thead>
          <tr>
            <th>#</th>
            <th scope="col">Nama Produk</th>
            <th scope="col">Nama Slug</th>
            <th scope="col">Gambar</th>
            <th width="280" scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($product as $merk)
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td scope="row">{{$merk->product_title}}</td>
            <td scope="row">{{$merk->product_slug}}</td>
            <td scope="row">{{$merk->product_image}}</td>
            <td scope="row" class="text-center">
                <form action="{{ route('product.destroy', $merk->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('product.show', $merk->product_slug) }}" class="btn btn-info btn-sm">
                      <i class="fas fa-info-circle"></i> Show
                    </a>
                    <a href="{{ route('product.edit', $merk->product_slug) }}" class="btn btn-warning btn-sm">
                      <i class="fas fa-pen-square"></i> Edit
                    </a>
                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="fas fa-trash-alt"></i> Delete
                    </button>
                  </form>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$product->links()}}
@endsection
