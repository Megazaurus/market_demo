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

    public function index(Request $request)
    {
        $userId = $request->user()->id;

        $histories = CartHistory::with(['cartProductHistories.product'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($histories);

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
