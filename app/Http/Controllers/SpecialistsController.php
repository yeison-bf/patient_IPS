<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use GuzzleHttp\Client;
use App\Models\Patiens as ModelsPatiens;
use App\Models\Profession;
use App\Models\RegimenEPS;
use App\Models\Sex;
use App\Models\StateCivil;
use App\Models\TypeDocument;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SpecialistsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::join('professions', 'users.profesion', '=', 'professions.id')
        ->join('roles', 'users.role', '=', 'roles.id')
        ->select('users.*', 'professions.name as professions_name', 'roles.name as nameRole')
        ->get();
        // return response()->json($users);
        return view('especialistas.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showRegister()
    {
        $roles = Role::all();
        $professions = Profession::all();

        return view('especialistas.register', compact('roles', 'professions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $user = new User();
        $user->document = $request->input('documento');
        $user->name = $request->input('nombres');
        $user->lastname = $request->input('apellidos');
        $user->role = $request->input('roles');
        $user->email = $request->input('email');
        $user->password =  Hash::make($request->input('password'));
        $user->profesion = $request->input('profesion');
        $user->city = $request->input('ciudad');
        $user->location = $request->input('direccion');
        $user->numberPhone = $request->input('celular');
        $user->estado = 1;

        $user->save();

        return redirect()->route('specialists.list');
    }

    /**
     * Display the specified resource.
     */
    public function showEdit(int $id)
    {
        //
        $user = User::find($id);
        $roles = Role::all();
        $professions = Profession::all();

        // return response()->json($user);
        return view('especialistas.update', compact('user', 'roles', 'professions'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->document = $request->input('documento');
        $user->name = $request->input('nombres');
        $user->lastname = $request->input('apellidos');
        $user->role = $request->input('roles');
        $user->email = $request->input('email');
        $user->profesion = $request->input('profesion');
        $user->city = $request->input('ciudad');
        $user->location = $request->input('direccion');
        $user->numberPhone = $request->input('celular');
        $user->estado = 1;

        $user->save();

        return redirect()->route('specialists.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


     /**
     * Show the form for editing the specified resource.
     */
    public function activeSpecialist(string $id)
    {
        $user = User::findOrFail($id);
        $user->estado = !$user->estado;
        $user->save();
        return redirect()->route('specialists.list');
    }

}
