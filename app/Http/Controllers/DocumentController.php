<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{

    public function getImage(Request $request)
    {
        $id = $request->id;
        $document = Document::findOrFail($id);
        $fileName = $document->imagefile;
        $fullPath = storage_path('documents'). DIRECTORY_SEPARATOR . $fileName;
        $srcimg = imagecreatefromjpeg($fullPath);
        header('Content-type: image/jpeg');
        echo( imagejpeg($srcimg) );
    }

    public function deleteImage(Request $request)
    {
        $id = $request->id;
        $document = Document::findOrFail($id);
        $fileName = $document->imagefile;
        $fullPath = storage_path('documents'). DIRECTORY_SEPARATOR . $fileName;
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
        $document->delete();
        return redirect()->route('contacts.show', [$request->contact_id]);
    }
}
