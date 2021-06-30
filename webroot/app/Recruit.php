<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    protected $fillable = [
        'name',
        'date_of_birth',
        'city',
        'job',
        'description'
    ];

    public function works()
    {
        return $this->hasMany('App\Work');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class);
    }

    public function setDateOfBirthAttribute($value)
    {
        return $this->attributes['date_of_birth'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function getDateOfBirthAttribute()
    {
        return Carbon::parse($this->attributes['date_of_birth']);
    }
}
