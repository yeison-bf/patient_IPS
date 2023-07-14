<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $professions = Profession::all();
        return view('professions.list', compact('professions'));
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $profession = new Profession();
        $profession->name = $request->input('nameProfession');
        $profession->save();

        return redirect()->route('professions.list');
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $profession = Profession::find($request->input('idProfessionEdit'));
        $profession->name = strtoupper($request->input('namePrfesionEdit'));
        $profession->save();

        return redirect()->route('professions.list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
