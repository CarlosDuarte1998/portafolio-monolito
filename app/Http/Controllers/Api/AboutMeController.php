<?php

namespace App\Http\Controllers\Api;

use App\Models\AboutMe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

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
     * Actualizar la información de "About Me".
     */

     public function update(Request $request)
     {
         // Validar los datos, incluyendo la imagen
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
             'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar imagen
             'icon_class' => 'nullable|string|max:255',
         ]);
     
         if ($validator->fails()) {
             return response()->json($validator->errors(), 422);
         }
     
         // Manejar la imagen (si se proporciona)
         $data = $request->except('image'); // Excluir la imagen inicialmente
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = time() . '.' . $image->extension();
     
             // Guardar la imagen en el almacenamiento
             $path = $image->storeAs('images/about_me', $imageName, 'public');
     
             // Asignar la URL pública al campo correspondiente
             $data['image_url'] = "/storage/$path";
     
             // Eliminar la imagen antigua, si existe
             $aboutMe = AboutMe::first();
             if ($aboutMe && $aboutMe->image_url) {
                 $oldImagePath = str_replace('/storage/', '', $aboutMe->image_url);
                 Storage::disk('public')->delete($oldImagePath);
             }
         }
     
         // Crear o actualizar la entrada
         $aboutMe = AboutMe::updateOrCreate(['id' => 1], $data);
     
         return response()->json($aboutMe, 200);
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
