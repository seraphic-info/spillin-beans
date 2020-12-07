<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'bean_pot',
    ];

    public function players()
    {
        return $this->hasMany(Player::class, 'contest_id', 'id');
    }

}
