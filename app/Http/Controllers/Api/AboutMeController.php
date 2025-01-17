<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutMe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AboutMeController extends Controller
{
    /**
     * Obtener la información de "About Me".
     */
    public function index()
    {
        $aboutMe = AboutMe::first(); // Obtener el primer registro de AboutMe
        if ($aboutMe) {
            return response()->json($aboutMe, 200);
        }

        return response()->json(['message' => 'No data found'], 404);
    }

    /**
     * Crear o actualizar la información de "About Me".
     */
    public function store(Request $request)
    {
        // Validación de los datos entrantes
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'platform' => 'required|string|max:255',
            'linkedin_url' => 'nullable|url',
            'github_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'image_url' => 'nullable|string|max:255',
            'icon_class' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear o actualizar la entrada
        $aboutMe = AboutMe::updateOrCreate(
            ['id' => 1], // Suponiendo que solo hay un registro
            $request->all()
        );

        return response()->json($aboutMe, 201);
    }

    /**
     * Eliminar la información de "About Me".
     */
    public function destroy()
    {
        $aboutMe = AboutMe::first(); // Obtener el primer registro de AboutMe
        if ($aboutMe) {
            $aboutMe->delete();
            return response()->json(['message' => 'Deleted successfully'], 200);
        }

        return response()->json(['message' => 'No data found'], 404);
    }
}
