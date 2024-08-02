<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'name',
        'password',
        'phone',
        'email',
        'address',
        'role',
        'ban',
    ];

    public function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }
}
