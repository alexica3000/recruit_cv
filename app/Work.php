<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Work extends Model
{
    const WORK_TYPE = 1;
    const EDUCATION_TYPE = 2;
    const COURSE_TYPE = 3;

    protected $fillable = [
        'employer',
        'job',
        'start_date',
        'end_date',
        'description'
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

    public function setStartDateAttribute($value)
    {
        return $this->attributes['start_date'] = $value . '-01-01';
    }

    public function setEndDateAttribute($value)
    {
        return $this->attributes['end_date'] = ($value == null) ? null : $value . '-01-01';
    }

    public static function typeOfTable ($type)
    {
        switch($type)
        {
            case '#works-table-wo':
                $typeNr = 1;
                break;
            case '#educations-table-wo':
                $typeNr = 2;
                break;
            case '#courses-table-wo':
                $typeNr = 3;
                break;
        }
        return $typeNr;
    }
}
