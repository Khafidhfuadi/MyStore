<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product') }}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="mt-3 mr-2">
            <a href="{{ route('product.create') }}" class="btn btn-success px-4 float-right mb-2 btn-sm">
                <i class="fas fa-plus"></i> Tambah
            </a>
            <a href="/upload" class="btn btn-info px-4 float-right mb-2 mr-2 btn-sm">
                <i class="fas fa-upload"></i> Upload
            </a>
        </div>
        <div class="float-left">
            <span class="text-sm">Export Data Here : </span>
            <a href="product/export/xlsx" class="btn btn-info btn-sm">
                <i class="fas fa-download"></i> XLSX
            </a>
            <a href="product/export/csv" class="btn btn-warning btn-sm">
                <i class="fas fa-download"></i> CSV
            </a>
            <a href="product/export/pdf" class="btn btn-primary btn-sm">
                <i class="fas fa-download"></i> PDF
            </a>
        </div>

        @if (session('info'))
            <div class="alert alert-success col-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger col-3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <strong>{{ session('error') }}</strong>
            </div>
        @endif
        <table class="table table-striped table-hover table-info">
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
                        <td scope="row">{{ $merk->product_title }}</td>
                        <td scope="row">{{ $merk->product_slug }}</td>
                        <td scope="row">{{ $merk->product_image }}</td>
                        <td scope="row" class="text-center">
                            <form action="{{ route('product.destroy', $merk->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('product.show', $merk->product_slug) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-info-circle"></i> Show
                                </a>
                                <a href="{{ route('product.edit', $merk->product_slug) }}"
                                    class="btn btn-warning btn-sm">
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
        <hr>
        {{ $product->links() }}
    </div>
</x-app-layout>
