<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = ['name', 'description' , 'price' , 'photo'];
    function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class);
    }
    function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }
}
