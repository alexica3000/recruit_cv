<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'employer',
        'job',
        'start_date',
        'end_date',
        'description',
        'recruit_id',
        'type'
    ];

    public function recruit()
    {
        return $this->belongsTo('App\Recruit');
    }

    public function getStartDateAttribute()
    {
        return Carbon::parse($this->attributes['start_date']);
    }

    public function getEndDateAttribute()
    {
        if($this->attributes['end_date'] == null)
            return null;
        else
            return Carbon::parse($this->attributes['end_date']);
    }
}
