<?php

namespace App\Interfaces;

use App\Models\Image;
use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasImagesInterface
{
    public function images(): MorphMany;
    public function getLogoAttribute(): Image|null;
}
