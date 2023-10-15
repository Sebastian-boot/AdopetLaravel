<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateFoundationsRequest;
use App\Models\Fundaciones;
use Illuminate\Http\Request;

class ApiFundacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fundaciones = Fundaciones::query()
            ->when(request('search'), function ($query) {
               return $query->where('name', 'like', '%'. request('search') .'%')
                    ->orWhere('nit', 'like', '%'. request('search') .'%');
            })
            ->paginate(10);
        return view('layouts.indexFoundations', compact('fundaciones'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = Fundaciones::all();
        return view('layouts\createfoundations', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        $fundacion = Fundaciones::create($requestData);
        return redirect()->route('fundaciones.show', $fundacion->id)
            ->with('success', "The foundation $fundacion->name successfully added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Fundaciones $fundacione)
    {
        return view('layouts.showFoundations', compact('fundacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fundaciones $fundacione)
    {
        
        return view('layouts.editFoundations', compact('fundacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFoundationsRequest $request, Fundaciones $fundacione)
    {
        $requestData = $request->all();

        $fundacione->update($requestData);


         return redirect()->route('fundaciones.show', $fundacione->id)
            ->with('success', "The $fundacione->name foudantion information successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fundaciones $fundacione)
    {
        $fundacione->delete();

        return redirect()->route('fundaciones.index')
            ->with('success', "Fundacion $fundacione->name removed correctly");
    }
}
