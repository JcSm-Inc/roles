<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products=Product::paginate();
        return view('products/index',compact('products'));
    }

    public function create()
    {
       return view('products.create');
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return redirect()->route('products.edit',$product->id)
            ->with('info','Producto guardado con exito');
    }

    public function show(Product $product)
    {
        //dd($product->id); //para verificar si esta llegando el dato de la vista
        return view('products.show',compact('product')); 
    }

    public function edit(Product $product)
    {
        return view('products.edit',compact('product')); 
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products.edit',$product->id)
            ->with('info','Producto actualizado con exito');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('info','Eliminado correctamente');
    }
}
