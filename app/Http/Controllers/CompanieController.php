<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $companies = Companie::all();
        return view('companies', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Companie::all(); 
        return view('addcompanie', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "required",
            "location" => "required",
            
        ]);

        Companie::create($request->all());

        return redirect()->route("addcompanie");
    }

    /**
     * Display the specified resource.
     */
    public function show(Companie $companie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Companie $companie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $annonce = Companie::find($id);

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',

        ]);

        $annonce->update([
            "name" => $request->name,
            "description" => $request->description,
            'location' => $request->location,

        ]);

        return redirect()->route('companie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $annonce = Companie::find($id);
        $annonce->delete();
        return redirect()->route('companie');
    }
}
