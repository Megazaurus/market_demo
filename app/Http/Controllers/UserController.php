<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\IndexRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['destroy']);
    }
    /**
     * Display a listing of the resource.
     */
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|string|in:user,admin',
        ]);

        $user->role = $request->input('role');
        $user->save();

        return response()->json(['message' => 'Тепер Адмін']);
    }

    public function index(IndexRequest $request)
    {
        $data = $request->validated();
        $page = $request->input("page", 1);
        $count = $request->input("count", 10);

        $user = User::query()
            ->when(array_key_exists('name', $data) && $data['name'], fn($query) => $query->where('name', 'like', '%' . $data['name'] . '%'))
            ->when(array_key_exists('email', $data) && $data['email'], fn($query) => $query->where('email', 'like', '%' . $data['email'] . '%'))
            ->paginate(perPage: $count, page: $page);

        return response()->json($user);
        // $page = $request->input("page",1);
        // $count = $request->input("count",10);
        // $user = User::paginate(perPage: $count , page: $page);
        // return response()->json($user);
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
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json($user, 202);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
