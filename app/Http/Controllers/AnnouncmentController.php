<?php

namespace App\Http\Controllers;

use App\Models\Announcment;
use App\Models\Companie;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



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
        $user = auth()->user();
        $companies = Companie::all();
        if (auth()->check() && auth()->user()->hasrole('apprenant')) {
            $userSkills = auth()->user()->skills->pluck('id');
            $halfSkillsCount = $userSkills->count() / 2;
            $announcments = Announcment::whereExists(function ($query) use ($userSkills, $halfSkillsCount) {
                $query->select(DB::raw(1))
                    ->from('skills')
                    ->join('announce_skill', 'skills.id', '=', 'announce_skill.skill_id')
                    ->whereColumn('announcments.id', 'announce_skill.announcment_id')
                    ->whereIn('skills.id', $userSkills)
                    ->groupBy('announce_skill.announcment_id')
                    ->havingRaw('COUNT(*) >= ?', [$halfSkillsCount]);
            })->get();

        } else {
            $announcments = Announcment::all();
        }
        return view('welcome', compact('announcments', 'companies', 'user'));
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

        $annonce = Announcment::create($request->all());
        $id_skill = $request->skill_ids;
        $annonce->skill()->attach($id_skill);
        return redirect()->route("add");
    }

    public function create()
    {
        $companies = Companie::all();
        $allskills = Skill::all();
        return view('add', compact('companies', 'allskills'));
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




    public function apply(Request $request, Announcment $announcment)
    {

        $user = auth()->user();

        $user->announcments()->syncWithoutDetaching($request->annonce_ids);

        return redirect()->route("afficherH");
    }

    public function remove(Request $request, Announcment $announcment)
    {
        $user = auth()->user();

        $user->announcments()->detach($request->annonce_ids);

        return redirect()->route("afficherH");
    }

}
