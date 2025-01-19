<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    

    public function index()
    {
        return response()->json([
            'data' => Project::all(),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'image|mimes:png,jpg,jpeg',
            'skills' => 'required|array',
            'url' => 'nullable|string',
            'github_url' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
        ]);

        
        $project = Project::create($validatedData);


        //Add skills to the project

        $project->skills()->attach($request->skills);

        //Return the response
 

        if($project){
            return response()->json([
                'message' => 'Project created successfully',
                'project' => $project,
            ]);
        }



    


    }

    /**
     * Display the specified resource.
     */

    public function show($id){
        $project = Project::find($id);

        //Retornar la respuesta

        if($project){
            return response()->json([
                'project' => $project,
            ]);
        }

        return response()->json([
            'message' => 'Project not found',
        ], 404);
    }


}
