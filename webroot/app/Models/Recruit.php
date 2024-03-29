<?php

namespace App\Models;

use App\Interfaces\HasImagesInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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
 * @property HasMany $works
 * @property HasMany $educations
 * @property HasMany $courses
 * @property Collection $companies
 */
class Recruit extends Model implements HasImagesInterface
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'job', 'description', 'birth_date'];
    protected $perPage = 50;

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
    public function getLogoAttribute(): Image|null
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

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function works(): HasMany
    {
        return $this->experiences()->where('type', Experience::TYPE_WORK);
    }

    public function educations(): HasMany
    {
        return $this->experiences()->where('type', Experience::TYPE_EDUCATION);
    }

    public function courses(): HasMany
    {
        return $this->experiences()->where('type', Experience::TYPE_COURSE);
    }

    public function qualifications(): HasMany
    {
        return $this->hasMany(Qualification::class);
    }

    public function qualificationsByType(string $type): Collection
    {
        return $this->qualifications()->where('type', $type)->get();
    }

    public function companies(): BelongsToMany
    {
        return $this->belongsToMany(Company::class, 'companies_recruits')->orderBy('name');
    }
}
