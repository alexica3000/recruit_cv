<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    const SKILLS_TYPE = 1;
    const CHARACTERISTICS_TYPE = 2;
    const SOCIAL_TYPE = 3;
    const INTERESTS_TYPE = 4;

    protected $fillable = [
      'char',
      'description'
    ];

    public function recruit()
    {
        return $this->belongsTo(Recruit::class);
    }
}
