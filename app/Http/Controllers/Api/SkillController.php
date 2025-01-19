<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return response()->json([
            'skills' => Skill::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            // 1 = Experience Skill, 2 = Projects
            'typeSkill' => 'required',
        ]);

        $skill = Skill::create($validatedData);

        return response()->json([
            'message' => 'Skill created successfully',
            'skill' => $skill,
        ]);
    }

    /**
     * Display the specified resource.
     */

    public function show($id){
        $skill = Skill::find($id);

        //Retornar la respuesta

        if($skill){
            return response()->json([
                'skill' => $skill,
            ]);
        }

        return response()->json([
            'message' => 'Skill not found',
        ], 404);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id){
        $skill = Skill::find($id);

        if($skill){
            $validatedData = $request->validate([
                'name' => 'required',
                'description' => 'nullable',
                // 1 = Experience Skill, 2 = Projects
                'typeSkill' => 'required',
            ]);

            $skill->update($validatedData);

            return response()->json([
                'message' => 'Skill updated successfully',
                'skill' => $skill,
            ]);
        }

        return response()->json([
            'message' => 'Skill not found',
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id){
        $skill = Skill::find($id);

        if($skill){
            $skill->delete();

            return response()->json([
                'message' => 'Skill deleted successfully',
            ]);
        }

        return response()->json([
            'message' => 'Skill not found',
        ], 404);

    }



}
