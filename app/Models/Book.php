<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
        use HasFactory;
        protected $fillable = [
            'name',
            'price',
            'photo',
            'description',
            'totalBook',
        ];
        public function averageRating()
        {
            return $this->comments()->avg('rate');
        }
        function categories(): BelongsToMany
        {
            return $this->belongsToMany(Category::class);
        }
        public function comments()
        {
            return $this->hasMany(Comment::class);
        }
        public function cartItems()
        {
            return $this->hasMany(Cart::class);
        }
        public function getAverageRatingAttribute()
    {
        return $this->comments()->avg('rate');
    }
    
    //Search scope
    public function scopeSearch($query)
    {
        if(request('key')){
            $key = request('key');
            $query = $query->where('name', 'like', '%' . $key . '%');
        }
        if(request('cat_id')){
            $query = $query->where('category_id', request('cat_id'));
        }
    }
    
}
