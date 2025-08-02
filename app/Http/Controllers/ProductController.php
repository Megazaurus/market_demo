<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\IndexRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('admin')->only(['store', 'update', 'destroy']);
    }

    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $page = $request->input("page", 1);
        $count = $request->input("count", 10);

        $products = Product::query()
            ->when(array_key_exists('title', $data) && $data['title'], fn($query) => $query->where('title', 'like', '%' . $data['title'] . '%'))
            ->when(array_key_exists('price', $data) && $data['price'], fn($query) => $query->where('price', 'like', '%' . $data['price'] . '%'))
            ->when(array_key_exists('promotion_price', $data) && $data['promotion_price'], fn($query) => $query->where('promotion_price', 'like', '%' . $data['promotion_price'] . '%'))
            ->when(array_key_exists('category_id', $data) && $data['category_id'], fn($query) => $query->where('category_id', $data['category_id']))
            ->when(array_key_exists('is_available', $data) && $data['is_available'], fn($query) => $query->where('is_available', $data['is_available']))
            ->when(array_key_exists('is_new', $data) && $data['is_new'], fn($query) => $query->where('is_new', $data['is_new']))
            ->paginate(perPage: $count, page: $page);

        return response()->json($products);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return response()->json($product, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Deleted',
            204
        ]);
    }
}
