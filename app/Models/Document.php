<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class Document extends Model
{
    use HasFactory;

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public static function getFileName()
    {
        //return  Storage::disk('documents');
    }

    public function getImage()
    {
        $id = $this->id;
        $document = Document::findOrFail($id);
        $fileName = $document->imagefile;
        $fullPath = Storage::disk('documents')->get($fileName);
        $srcimg = imagecreatefromjpeg($fullPath);
        header('Content-type: image/jpeg');
        echo( imagejpeg($srcimg) );
    }
}
