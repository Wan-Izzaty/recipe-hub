<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        recipe = Users::all();
        return view ('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request -> validate([
            'title' => 'required',
            'ingredients' => 'required',
            'direction' => 'required',
        ]);
        $recipe = Users::create($data); //save to DB
        return redirect ()->route('user.show', $recipe->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Users $users)
    {
        return view ('recipe.show', ['recipe' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        return view ('recipe.edit', ['recipe' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users $users)
    {
        $data = $request -> validate([
                'title' => 'required',
                'ingredients' => 'required',
                'directions' => 'required',
        ]);

        $users ->update($data);
        return redirect () -> route ('user.show', $users ->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users $users)
    {
        $users ->delete();
        return redirect ()->route(user.index);
    }
}
