<?php

namespace App\Models;

use App\Interfaces\HasImagesInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

/**
 * Class Company
 * @package App\Models
 * @property Carbon $created_at
 * @property int $id
 * @property string $name
 * @property string $slashedName
 * @property Image $logo
 * @property string $logoUrl
 */
class Company extends Model implements HasImagesInterface
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name'];

    public function getSlashedNameAttribute(): string
    {
        return addslashes($this->name);
    }

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function getLogoAttribute(): Model|Image|null
    {
        return $this->images()->first();
    }

    public function getLogoUrlAttribute(): string
    {
        if ($this->logo) {
            return Storage::url($this->logo->url);
        }

        return asset('/images/default.png');
    }
}
