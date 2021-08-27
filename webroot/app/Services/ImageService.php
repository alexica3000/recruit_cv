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

    /**
     * @param Request $request
     * @param HasImagesInterface $resource
     */
    public function updateImage(Request $request, HasImagesInterface $resource): void
    {
        if(!$request->hasFile('image')) {
            if (isset($resource->logo)) {
                $this->deleteImage($resource->logo);
            }

            return;
        }

        $url = $request->file('image')->store(self::IMAGES_PATH);

        if (isset($resource->logo)) {
            $this->deleteFile($resource->logo->url);
            $resource->logo->update(['url' => $url]);
        } else {
            $image = new Image(['url' => $url]);
            $resource->images()->save($image);
        }
    }

    public function deleteImage(Image $image = null): void
    {
        if ($image) {
            Storage::delete($image->url);
            $image->delete();
        }
    }

    private function deleteFile(string $url = null): void
    {
        if (Storage::exists($url)) {
            Storage::delete($url);
        }
    }
}
