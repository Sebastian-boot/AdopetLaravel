<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Requests\StoreAnimalRequest;
use App\Http\Requests\UpdateAnimalRequest;
use App\Models\AnimalStatus;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::query()
            ->when(request('search'), function ($query) {
               return $query->where('name', 'like', '%'. request('search') .'%')
                    ->orWhere('breed_or_type', 'like', '%'. request('search') .'%');
            })
            ->paginate(10);
        return view('animals.index', compact('animals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = AnimalStatus::all();
        return view('animals.create', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAnimalRequest $request)
    {
        $requestData = $request->all();

        if ($requestData['rescue_date'] === null)
            $requestData['rescue_date'] = now()->format('Y-m-d\TH:i');


        $animal = Animal::create($requestData);
        return redirect()->route('animal.show', $animal->id)
            ->with('success', "The animal $animal->name successfully added");
    }

    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        return view('animals.show', compact('animal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
        $status = AnimalStatus::all();
        return view('animals.edit', compact('animal', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAnimalRequest $request, Animal $animal)
    {
        $requestData = $request->all();

        if ($requestData['rescue_date'] === null)
            $requestData['rescue_date'] = now()->format('Y-m-d\TH:i');

        $animal->update($requestData);
         return redirect()->route('animal.show', $animal->id)
            ->with('success', "The $animal->name animal information successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animal.index')
            ->with('success', "Animal $animal->name removed correctly");
    }
}
