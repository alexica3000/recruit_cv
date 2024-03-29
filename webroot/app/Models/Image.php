<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class Image
 * @package App\Models
 * @property string|null $url
 */
class Image extends Model
{
    use HasFactory;

    protected $fillable = ['url'];

    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
