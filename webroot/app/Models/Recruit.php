<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recruit
 * @package App\Models
 * @property  int $id
 */
class Recruit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'job', 'description', 'birth_date'];
    protected $perPage = 10;

    protected $casts = [
        'birth_date' => 'datetime'
    ];
}
