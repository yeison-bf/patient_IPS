<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $company = Configuration::first();
        return view('configuration.company', compact('company'));
    }

    public function upload(Request $request)
    {
        // Validar y guardar la imagen en el servidor o en la base de datos según tus necesidades
        $image = $request->file('file');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploadDocument'), $imageName);
        $basePath = public_path('uploadDocument');
        // Devolver una respuesta de éxito
        return response()->json(['success' => $basePath . '/' . $imageName]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function create(Request $request)
    {
        $companies = Configuration::count();
        if ($companies >= 1) {
            $company = Configuration::first();
            return redirect()->route('company.create')->with('mensaje', 'Ya tiene la empresa registrada');
        } else {
            $company = new Configuration();
            $company->razonSocial = $request->input('razonSocial');
            $company->nit = $request->input('nit');
            $company->direccion = $request->input('direccion');
            $company->telefono = $request->input('telefono');
            $company->logo = $request->input('logo');
            $company->ciudad = $request->input('ciudad');

            $company->save();
            
            return view('configuration.company', compact('company'));
        }
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
