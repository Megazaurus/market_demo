<?php

namespace App\Http\Controllers;

use App\Models\CartHistory;
use App\Http\Requests\CartHistory\IndexRequest;
use Illuminate\Http\Request;

class CartHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $cartHistories = CartHistory::create($validated);
        return response()->json($cartHistories, 201);

        // $userId = $request->user()->id;
        // $histories = CartHistory::with('cartProductHistories.product')
        //     ->where('user_id', $userId)
        //     ->get();

        // return response()->json($histories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CartHistory $cartHistory)
    {
    $cartHistory->load('cartProductHistories.product');
    return response()->json($cartHistory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
