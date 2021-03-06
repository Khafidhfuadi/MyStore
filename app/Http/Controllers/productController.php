<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
// use PDF;

// use Brian2694\Toastr\Facades\Toastr;


class productController extends Controller
{
    public function index()
    {
      // $posts = Product::orderBy('created_at', 'ASC')->get();
      $product = Product::paginate(5);
      return view('product', compact('product'));
    }

    // public function showProduct($slug)
    // {
    // //   $product = Product::where('product_slug', $slug)
    // //           ->firstOrFail();

    // //   // if (!$data) {
    // //   //     abort(404);
    // //   // }
    // //   // Atau dengan firstOrFail();

    //   // dd($data);
    //   return view('add');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Product::where('product_slug', $request->product_slug)->exists()) {
                return redirect('/product/create')->with('error','Slug sudah tersedia');
          } else{
            $product = new Product;
            $product->product_title = $request->product_title;
            $product->product_slug =\Str::slug ($request->product_slug);
            $product->product_image = $request->product_image;
            // $product->product_price = $request->product_price;
            $product->save();
          }
          return redirect('product')->with('info','Sukses tambah data!');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      return view("view", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
      $product = Product::where('product_slug', $slug)
                ->firstOrFail();

        return view('edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if (Product::where('product_slug', $request->product_slug)->exists()) {
            return redirect('product')->with('error','Slug sudah tersedia');
          } else{
            $request->validate([
                'product_title' => 'required',
                'product_slug'    => 'required',
                'product_image' => 'required',
            ]);
            $product->update($request->all());
          }
          return redirect('product')->with('info','Sukses update data');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
    //   Toastr::success('Data Has Been Delete','Success');
      return redirect('product')->with('info','Data Berhasil Dihapus!');;
    }

    public function exportXL() {
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    public function exportCSV() {
        return Excel::download(new ProductsExport, 'products.csv');
    }

    public function exportPDF() {
        return Excel::download(new ProductsExport, 'products.pdf');

    }

    public function upload() {
        return view('uploadData');
    }

    public function uploadData(Request $request) {

        $data = Excel::import(new ProductsImport, $request->file('file')->store('temp'));



        return redirect('/product')->with('info','Sukses upload data');
    }
}
