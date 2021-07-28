<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience
 * @package App\Models
 * @property string $name
 * @property string $short
 * @property Carbon $start
 * @property Carbon $end
 * @property string $description
 */
class Experience extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'short', 'start', 'end', 'description'];

    protected $casts = [
        'start' => 'datetime',
        'end'   => 'datetime',
    ];

    public const TYPE_WORK = 'TYPE_WORK';
    public const TYPE_EDUCATION = 'TYPE_EDUCATION';
    public const TYPE_COURSE = 'TYPE_COURSE';

    public const TYPES = [
        self::TYPE_WORK      => 'Work Experience',
        self::TYPE_EDUCATION => 'Education',
        self::TYPE_COURSE    => 'Course or Training',
    ];
}
