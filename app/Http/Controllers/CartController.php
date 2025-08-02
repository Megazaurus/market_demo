<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\IndexRequest;
use App\Http\Requests\Cart\StoreRequest;
use App\Models\CartHistory;
use App\Models\CartProductHistory;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {

        $carts = Cart::with(['product'])->where('user_id', Auth::id())->get();
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
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        $cart = Cart::create($validated);

        return response()->json($cart, 201);
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

    public function checkout()
    {
        $user = Auth::user();

        $cartItems = Cart::with('product')
            ->where('user_id', $user->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        DB::beginTransaction();

        try {
            $history = CartHistory::create([
                'user_id' => $user->id,
            ]);

            foreach ($cartItems as $item) {
                CartProductHistory::create([
                    'cart_history_id' => $history->id,
                    'product_id' => $item->product_id,
                    'count' => $item->count,
                    'price' => $item->product->price, // Цена на момент покупки
                ]);
            }

            // Очистка корзины
            Cart::where('user_id', $user->id)->delete();

            DB::commit();
            return response()->json(['message' => 'Checkout completed successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'error' => 'Checkout failed',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
}
