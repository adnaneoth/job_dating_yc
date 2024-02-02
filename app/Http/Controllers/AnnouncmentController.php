<?php

namespace App\Http\Controllers;

use App\Models\Announcment;
use App\Models\Companie;
use Illuminate\Http\Request;

class AnnouncmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcments = Announcment::all();
        $companies = Companie::all();
        return view('announces', compact('announcments', 'companies'));
    }

    public function indexH()
    {
        $announcments = Announcment::all();
        $companies = Companie::all();
        return view('welcome', compact('announcments', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => ["required", "unique:announcments"],
            "description" => "required",
            "companie_id" => "required",
            
        ]);

        Announcment::create($request->all());

        return redirect()->route("add");

    }

    public function create()
    {
        $companies = Companie::all(); 
        return view('add', compact('companies'));
    }
    
    /**
     * Display the specified resource.
     */
    public function delete($id)
    {
        $annonce = Announcment::find($id);
        $annonce->delete();
        return redirect()->route('afficher');
    }

   


    public function update(Request $request, $id)
    {
        $annonce = Announcment::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $annonce->update([
            "title" => $request->title,
            "description" => $request->description,
        ]);

        return redirect()->route('afficher');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcment $announcment)
    {
        //
    }
}
