<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\IndexRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $page = $request->input("page", 1);
        $count = $request->input("count", 10);

        $category = Category::query()
            ->when(array_key_exists('title', $data) && $data['title'], fn($query) => $query->where('title', 'like', '%' . $data['title'] . '%'))
            ->when(array_key_exists('parent_id', $data) && $data['parent_id'], fn($query) => $query->where('parent_id', $data['parent_id']))
            ->paginate(perPage: $count, page: $page);
        return response()->json($category);
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
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(null, 204);
    }
}
