<?php

namespace App\Services;

use App\Interfaces\HasImagesInterface;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageService
{
    public const IMAGES_PATH = 'public/images';

    public function saveImage(Request $request, HasImagesInterface $resource)
    {
        if($request->hasFile('image')) {
            $url = $request->file('image')->store(self::IMAGES_PATH);
            $image = new Image(['url' => $url]);
            $resource->images()->save($image);
        }
    }
}
