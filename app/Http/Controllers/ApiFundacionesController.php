<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Fundaciones;
use Illuminate\Http\Request;

class ApiFundacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fundaciones = Fundaciones::all();
        return view('layouts.foundations', ['fundaciones' => $fundaciones]);
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
        $request->validate([
            'name' => 'required|min:5'
        ]);

        $fundaciones = new Fundaciones;
        $fundaciones->name = $request->input('name');
        $fundaciones->introduction = $request->input('introduction');
        $fundaciones->history = $request->input('history');
        $fundaciones->email = $request->input('email');
        $fundaciones->phone = $request->input('phone');
        $fundaciones->website = $request->input('website');
        $fundaciones->nit = $request->input('nit');
        $fundaciones->employeeCount = $request->input('employeeCount');
        $fundaciones->FoundationFoundingDate = $request->input('FoundationFoundingDate');
        $fundaciones->animalsAssitedCount = $request->input('animalsAssitedCount');
        $fundaciones->currentAnimalAssitedCount = $request->input('currentAnimalAssitedCount');
        $fundaciones->limitAnimalAssitedCount = $request->input('limitAnimalAssitedCount');
        $fundaciones->foundationrating = $request->input('foundationrating');

        try {
            $fundaciones->save();
        } catch (\Exception $e) {
            // Log the exception or display the error message for debugging
            dd($e->getMessage());
        } finally{
            return redirect()->route('fundacionesView')->with('success','Fundación pendiente de por validar');
        }


        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fundacion = Fundaciones::find($id);

        if (!$fundacion) {
            return abort(404); // Or handle the case where the record is not found.
        }

        return view('fundaciones.show', ['fundacion' => $fundacion]);
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
        $fundacion = Fundaciones::find($id);

        if (!$fundacion) {
            return abort(404); // Or handle the case where the record is not found.
        }

        // Update fields with data from the request
        $fundacion->name = $request->name;
        $fundacion->introduction = $request->introduction;
        $fundacion->history = $request->history;
        $fundacion->email = $request->email;
        $fundacion->phone = $request->phone;
        $fundacion->website = $request->website;
        $fundacion->nit = $request->nit;
        $fundacion->employeeCount = $request->employeeCount;
        $fundacion->FoundationFoundingDate = $request->FoundationFoundingDate;
        $fundacion->animalsAssitedCount = $request->animalsAssitedCount;
        $fundacion->currentAnimalAssitedCount = $request->currentAnimalAssitedCount;
        $fundacion->limitAnimalAssitedCount = $request->limitAnimalAssitedCount;
        $fundacion->foundationrating = $request->foundationrating;

        // Save the updated record
        $fundacion->save();
        
        return view('fundacionesView', ['fundacion' => $fundacion]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
