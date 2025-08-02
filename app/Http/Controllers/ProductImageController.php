<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\IndexImageRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\ProductImage;


class ProductImageController extends Controller
{
        public function __construct()
    {
        $this->middleware('admin')->only(['store', 'update', 'destroy']);
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndexImageRequest $request)
    {
        $path = $request->file('image')->store('images', 'public');

        $image = ProductImage::create([
            'product_id' => $request->input('product_id'),
            'src_img' => $path,
            'is_main' => $request->input('is_main', false),
            'weight' => $request->input('weight', 0),
        ]);

        return response()->json([
            'message' => 'Файл завантажено',
            'path' => '/storage/' . $path,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
