<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show(Request $request, $id)
    {

        $user = User::join('professions', 'users.profession_id', '=', 'professions.id')
        ->select('*')
        ->where('users.id', '=', $id)
        ->get();

        $profession = Profession::all();

        return view('profile', compact('user', 'profession'));
        //return response()->json($user);
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
        
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->document = $request->input('document');
        $user->fullname = $request->input('fullname');
        // $user->role = $request->input('role');
        $user->profession_id = $request->input('profession');
        // $user->password = $request->input('password_new');
        $user->email = $request->input('email');
        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
