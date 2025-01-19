<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileManager
{
    /**
     * Subir un archivo al almacenamiento.
     *
     * @param \Illuminate\Http\UploadedFile $file El archivo subido
     * @param string $folder La carpeta donde se almacenará el archivo
     * @return string|null Retorna la URL pública del archivo o null si falla
     */
    public function uploadFile($file, $folder = 'uploads')
    {
        if (!$file->isValid()) {
            return null;
        }

        $fileName = time() . '.' . $file->extension();
        $path = $file->storeAs($folder, $fileName, 'public');

        return "/storage/$path";
    }

    /**
     * Subir una imagen al almacenamiento.
     *
     * @param \Illuminate\Http\UploadedFile $image La imagen subida
     * @param string $folder La carpeta donde se almacenará la imagen
     * @return string|null Retorna la URL pública de la imagen o null si falla
     */
    public function uploadImage($image, $folder = 'images')
    {
        return $this->uploadFile($image, $folder);
    }

    /**
     * Subir un archivo PDF al almacenamiento.
     *
     * @param \Illuminate\Http\UploadedFile $pdf El archivo PDF subido
     * @param string $folder La carpeta donde se almacenará el PDF
     * @return string|null Retorna la URL pública del archivo PDF o null si falla
     */
    public function uploadPdf($pdf, $folder = 'pdfs')
    {
        if ($pdf->extension() !== 'pdf') {
            return null; // Validar que sea un PDF
        }

        return $this->uploadFile($pdf, $folder);
    }

    /**
     * Eliminar un archivo del almacenamiento.
     *
     * @param string $fileUrl La URL pública del archivo
     * @return bool Retorna true si se elimina correctamente, de lo contrario false
     */
    public function deleteFile($fileUrl)
    {
        $filePath = str_replace('/storage/', '', $fileUrl);

        if (Storage::disk('public')->exists($filePath)) {
            return Storage::disk('public')->delete($filePath);
        }

        return false;
    }

    /**
     * Listar imágenes en una carpeta específica.
     *
     * @param string $folder La carpeta donde buscar las imágenes
     * @return array Retorna una lista de URLs públicas
     */
    public function listImages($folder = 'images')
    {
        return $this->listFiles($folder);
    }

    /**
     * Listar PDFs en una carpeta específica.
     *
     * @param string $folder La carpeta donde buscar los PDFs
     * @return array Retorna una lista de URLs públicas
     */
    public function listPdfs($folder = 'pdfs')
    {
        return $this->listFiles($folder);
    }

    /**
     * Obtener una lista de archivos en una carpeta específica.
     *
     * @param string $folder La carpeta donde buscar los archivos
     * @return array Retorna una lista de URLs públicas
     */
    private function listFiles($folder = 'uploads')
    {
        $files = Storage::disk('public')->files($folder);

        return array_map(function ($file) {
            return asset('storage/' . $file);
        }, $files);
    }
}
