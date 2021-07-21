<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HasImagesInterface
{
    public function images(): MorphMany;
}
