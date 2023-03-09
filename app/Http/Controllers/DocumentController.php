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

}
