<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return response()->json([
            'mesage'=>'success',
            'info'=>'lista productos',
            'producto'=>$products,
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->codigo = $request->codigo;
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->precio = $request->precio;
        $product->estado = $request->estado;
        $product->cantidad = $request->cantidad;
        $product->category_id = $request->category_id;
        $product->save();

        return response()->json([
            'message' => 'success',
            'info' => 'Producto creado',
            'producto' => $product,
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response() ->json([
            'mesage' =>'busqueda encontrar',
            'producto_find' => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->codigo = $request->codigo;
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->precio = $request->precio;
        $product->estado = $request->estado;
        $product->cantidad = $request->cantidad;
        $product->category_id = $request->category_id;
        $product->save();

        return response()->json([
            'mesage'=>'success',
            'info'=>'actualizada',
            'categoria'=>$product,

        ],201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
