<?php

namespace App\Services;

use App\Interfaces\HasImagesInterface;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public const IMAGES_PATH = 'public/images';

    public function saveImage(Request $request, HasImagesInterface $resource): void
    {
        if($request->hasFile('image')) {
            $url = $request->file('image')->store(self::IMAGES_PATH);
            $image = new Image(['url' => $url]);
            $resource->images()->save($image);
        }
    }

    public function updateImage(Request $request, HasImagesInterface $resource): void
    {
        if(!$request->hasFile('image')) {
            return;
        }

        Storage::delete($resource->logo->url);

        $url = $request->file('image')->store(self::IMAGES_PATH);
        $resource->logo->update(['url' => $url]);
    }

    public function deleteImage(Image $image): void
    {
        Storage::delete($image->url);
        $image->delete();
    }
}
