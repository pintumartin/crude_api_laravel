<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GSecProduct;

class GSecProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $length = $request->input('length', 10);
        $order_by = $request->input('order_by', 'created_at');
        $page = $request->input('page', 1);
        $order = $request->input('order', 'desc');

        $products = GSecProduct::orderBy($order_by, $order)
            ->paginate($length, ['*'], 'page', $page);

        return response()->json([
            'products' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        $product = GSecProduct::create($request->all());

        return response()->json([
            'product' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = GSecProduct::find($id);

        if (!$product) {
            return response()->json([
                'error' => 'Product not found'
            ], 404);
        }

        return response()->json([
            'product' => $product
        ]);
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
        $product = GSecProduct::find($id);

        if (!$product) {
            return response()->json([
                'error' => 'Product not found'
            ], 404);
        }

        $this->validate($request, [
            'name' => 'sometimes|required',
            'description' => 'sometimes|required',
            'price' => 'sometimes|required|numeric'
        ]);

        $product->update($request->all());

        return response()->json([
            'product' => $product
        ]);
    }

}