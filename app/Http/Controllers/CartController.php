<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\IndexRequest;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {

        $carts = Cart::all();
        return response()->json($carts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carts = Cart::create($request->all());
        return response()->json($carts, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $carts)
    {
        return response()->json($carts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $carts)
    {
        $carts->update($request->all());
        return response()->json($carts, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $carts)
    {
        $carts->delete();
        return response()->json(null, 204);
    }
}
