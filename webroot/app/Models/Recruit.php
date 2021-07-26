<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Recruit
 * @package App\Models
 * @property  int $id
 * @property string $name
 * @property string $city
 * @property string $job
 * @property Carbon $birth_date
 * @property string $description
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
