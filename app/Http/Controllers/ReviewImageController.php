<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Review\IndexImageRequest;
use Illuminate\Routing\Controller;
use App\Models\ReviewImage;

class ReviewImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['destroy']);
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

        $image = ReviewImage::create([
            'user_id' => $request->input('user_id'),
            'review_id' => $request->input('review_id'),
            'src_img' => $path,

        ]);

        return response()->json([
            'message' => 'Фото завантажено',
            'path' => '/storage/' . $path,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ReviewImage $image)
    {
        // return response()->json([
        //     'message' => 'Фоточка',
        //     'image' => $image,
        //     'url' => asset('storage/' . $image->src_img),

        // ]);
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
