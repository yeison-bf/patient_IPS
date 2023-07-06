<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patiens as ModelsPatiens;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PatiensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $responseCity = $client->get('https://api-colombia.com/api/v1/city');
        $dataCity = json_decode($responseCity->getBody(), true);

        $patients = ModelsPatiens::all();
        return view('patients.list', compact('patients', 'dataCity'));
        // return response()->json($patients);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $patient = new ModelsPatiens;
        $patient->type_document = $request->input('tipoDocvumento');
        $patient->document = $request->input('documento');
        $patient->expedition = $request->input('expedicion');
        $patient->name = $request->input('primerNombre');
        $patient->second_name = $request->input('segundoNombre');
        $patient->surname = $request->input('primerApellido');
        $patient->second_Surname = $request->input('segundoApellido');
        $patient->sex = $request->input('sexo');
        $patient->birth_date = $request->input('fechsNacimiento');
        $patient->age = $request->input('edad');
        $patient->pais = $request->input('pais');
        $patient->city = $request->input('ciudad');
        $patient->location = $request->input('direccion');
        $patient->estrato = $request->input('estrato');
        $patient->celular = $request->input('celular');
        $patient->telefono = $request->input('telefono');
        $patient->email = $request->input('email');
        $patient->estadoCivil = $request->input('estadoCivil');
        $patient->regimen = $request->input('regimen');
        $patient->eps = $request->input('eps');
        $patient->estado = 1;

        $patient->save();

        return redirect()->route('patiens.list');
        // return response()->json($patient);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $patien = ModelsPatiens::findOrFail($id);
        $patien->estado = !$patien->estado; 
        $patien->save();
        return redirect()->route('patiens.list');
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
