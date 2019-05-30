<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
        'logo'
    ];

    public function clients()
    {
        return $this->hasMany('App\Client');
    }
}
