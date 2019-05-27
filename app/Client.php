<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Department;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email',
        'department_id',
        'password'
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }
}
