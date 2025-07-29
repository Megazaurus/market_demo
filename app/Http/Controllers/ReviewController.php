<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\IndexRequest;
use Illuminate\Http\Request;
use App\Models\Review;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $page = $request->input("page", 1);
        $count = $request->input("count", 10);

        $review = Review::query()
            ->when(array_key_exists('description', $data) && $data['description'], fn($query) => $query->where('description', 'like', '%' . $data['description'] . '%'))
            ->when(array_key_exists('user_id', $data) && $data['user_id'], fn($query) => $query->where('user_id', $data['user_id']))
            ->when(array_key_exists('product_id', $data) && $data['product_id'], fn($query) => $query->where('product_id', $data['product_id']))
            ->paginate(perPage: $count, page: $page);
        ;

        return response()->json($review);
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
        $review = Review::create($request->all());
        return response()->json($review, 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return response()->json($review);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        $review->update($request->all());
        return response()->json($review, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json(null, 204);
    }
}
