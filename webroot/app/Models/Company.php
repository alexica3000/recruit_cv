<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @package App\Models
 * @property Carbon $created_at
 * @property int $id
 * @property string $name
 * @property string $slashedName
 */
class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name'];

    public function addSlashedNameAttribute(): string
    {
        return addslashes($this->name);
    }
}
