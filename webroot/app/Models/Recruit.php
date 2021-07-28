<?php

namespace App\Models;

use App\Interfaces\HasImagesInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

/**
 * Class Recruit
 * @package App\Models
 * @property  int $id
 * @property string $name
 * @property string $city
 * @property string $job
 * @property Carbon $birth_date
 * @property string $description
 * @property string|null $logoUrl
 * @property Image|null $logo
 * @property Image[]|MorphMany $images
 */
class Recruit extends Model implements HasImagesInterface
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'job', 'description', 'birth_date'];
    protected $perPage = 10;

    protected $casts = [
        'birth_date' => 'datetime'
    ];

    /**
     * @return MorphMany
     */
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * @return Image|null
     */
    protected function getLogoAttribute(): Image|null
    {
        return $this->images->first();
    }

    protected function getLogoUrlAttribute(): string
    {
        if ($this->logo) {
            return Storage::url($this->logo->url);
        }

        return asset('/images/default.png');
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function work(): Experience
    {
        return $this->experience()->firstOrNew(['type' => Experience::TYPE_WORK]);
    }

    public function education(): Experience
    {
        return $this->experience()->firstOrNew(['type' => Experience::TYPE_EDUCATION]);
    }

    public function course(): Experience
    {
        return $this->experience()->firstOrNew(['type' => Experience::TYPE_COURSE]);
    }
}
