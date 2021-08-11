<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $short
 */
class Qualification extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short', 'type'];

    public const TYPE_SKILL          = 'TYPE_SKILL';
    public const TYPE_CHARACTERISTIC = 'TYPE_CHARACTERISTIC';
    public const TYPE_SOCIAL         = 'TYPE_SOCIAL';
    public const TYPE_INTEREST       = 'TYPE_INTEREST';

    public const TYPES = [
        self::TYPE_SKILL          => 'Skills',
        self::TYPE_CHARACTERISTIC => 'Characteristics',
        self::TYPE_SOCIAL         => 'Social Media',
        self::TYPE_INTEREST       => 'Interests',
    ];

    public function recruit(): BelongsTo
    {
        return $this->belongsTo(Recruit::class);
    }
}
