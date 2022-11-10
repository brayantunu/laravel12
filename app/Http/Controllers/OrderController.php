<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->site_id = $request->site_id;
        $order->user_id = $request->user_id;
        $order->pay_id = $request->pay_id;
        // $order->precio_total = $request->precio_total;
        $order->save();
     
        foreach ($request->product as $product){
            $instancia_product = new Order_detail();
            $instancia_product->cantidad = $product["cantidad"];
            // $instancia_product->precio_total = $product["precio_total"];
            $instancia_product->product_id = $product["product_id"];
            $instancia_product->order_id = $order->id;
            $instancia_product->save();

           
        }
        return response()->json([
            'success' => true,
            'message' =>'orden registrado',
            
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
    
        //
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
        //
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
