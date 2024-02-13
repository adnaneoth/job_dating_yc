<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::all();
        return view('skills', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addskills');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'inputs.*.name' => 'required|string|max:255'
            ],
            [
                'inputs.*.name' => 'Enter Some Skills',
            ]

        );
        foreach ($request->inputs as $key => $value) {
            Skill::create($value);
        }
        return redirect()->route("allskills")->with('success', 'Skills saved successfully');

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
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $skill->update([
            "name" => $request->name,
        ]);

        return redirect()->route('allskills');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->route('allskills');
    }
}
