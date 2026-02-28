<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    public function create()
    {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Skill::create([
            'name' => $request->name
        ]);

        return redirect()->route('skills.index');
    }

    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);
        return view('skills.edit', compact('skill'));
    }

    public function update(Request $request, string $id)
    {
        $skill = Skill::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $skill->update([
            'name' => $request->name
        ]);

        return redirect()->route('skills.index');
    }

    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index');
    }
}
