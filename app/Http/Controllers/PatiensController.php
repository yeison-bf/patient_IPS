<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Patiens as ModelsPatiens;
use App\Models\RegimenEPS;
use App\Models\Sex;
use App\Models\StateCivil;
use App\Models\TypeDocument;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PatiensController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = ModelsPatiens::join('type_documents', 'type_documents.id', '=', 'patiens.type_document')
        ->join('regimen_e_p_s', 'regimen_e_p_s.id', '=', 'patiens.regimen')
        ->join('sexes', 'sexes.id', '=', 'patiens.sex')
        ->join('countries', 'countries.id', '=', 'patiens.pais')
        ->join('state_civils', 'state_civils.id', '=', 'patiens.estadoCivil')
        ->select('patiens.*', 'type_documents.abbreviation as type_document_name', 'regimen_e_p_s.name as regimen_e_p_s_name', 'sexes.name as sex_name', 'countries.name as country_name', 'state_civils.name as state_civil_name')
        ->get();

        // return response()->json($patients);
        return view('patients.list', compact('patients'));

    }


    /**
     * Display a listing of the resource.
     */
    public function showRegister()
    {
        $client = new Client();
        $responseCity = $client->get('https://api-colombia.com/api/v1/city');
        $dataCity = json_decode($responseCity->getBody(), true);

        $patients = ModelsPatiens::all();

        $typeDocuments = TypeDocument::all();
        $regimenEPSs = RegimenEPS::all();
        $sexes = Sex::all();
        $countries = Country::all();
        $stateCivils = StateCivil::all();

        return view('patients.register', compact('patients', 'dataCity', 'typeDocuments', 'regimenEPSs', 'sexes', 'countries', 'stateCivils'));
        // return response()->json($patients);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function register(Request $request)
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


    public function showEdit(Request $request, $id)
    {
        $client = new Client();
        $responseCity = $client->get('https://api-colombia.com/api/v1/city');
        $dataCity = json_decode($responseCity->getBody(), true);

        $patients = ModelsPatiens::find($id);

        $typeDocuments = TypeDocument::all();
        $regimenEPSs = RegimenEPS::all();
        $sexes = Sex::all();
        $countries = Country::all();
        $stateCivils = StateCivil::all();

        return view('patients.update', compact('patients', 'dataCity', 'typeDocuments', 'regimenEPSs', 'sexes', 'countries', 'stateCivils'));
        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patient = ModelsPatiens::find($id);
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

        // return response()->json($patient);
        return redirect()->route('patiens.list');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function activePatient(string $id)
    {
        $patien = ModelsPatiens::findOrFail($id);
        $patien->estado = !$patien->estado;
        $patien->save();
        return redirect()->route('patiens.list');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function history(Request $request, $id)
    {
        $patients = ModelsPatiens::join('type_documents', 'type_documents.id', '=', 'patiens.type_document')
        ->join('regimen_e_p_s', 'regimen_e_p_s.id', '=', 'patiens.regimen')
        ->join('sexes', 'sexes.id', '=', 'patiens.sex')
        ->join('countries', 'countries.id', '=', 'patiens.pais')
        ->join('state_civils', 'state_civils.id', '=', 'patiens.estadoCivil')
        ->select('patiens.*', 'type_documents.abbreviation as type_document_name', 'regimen_e_p_s.name as regimen_e_p_s_name', 'sexes.name as sex_name', 'countries.name as country_name', 'state_civils.name as state_civil_name')
        ->where('patiens.id', $id)
        ->get();

        //  return response()->json($patients);
        return view('patients.history', compact('patients'));
    }
}
