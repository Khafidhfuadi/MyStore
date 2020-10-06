@extends('layouts.app')

@section('content')
<table class="table table-striped table-hover table-success">
    <thead>
      <tr>
        <th>#</th>
        <th scope="col">Nama Produk</th>
        <th scope="col">Nama Slug</th>
        <th scope="col">Gambar</th>
        <th scope="col" class="text-center">Action</th>
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
            <form action="" method="" >
                <div class="row"></div>
                <a href="{{ route('product.edit', $merk->id) }}" class="btn btn-warning btn-sm mb-3">
                Ubah</a>
                <button type="submit" class="btn btn-danger btn-sm">
                Hapus</i></button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
@endsection
