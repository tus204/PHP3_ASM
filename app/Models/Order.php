<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; 
    public $incrementing = false; 
    protected $keyType = 'string'; 

    protected $fillable = [
        'user_id', 'name', 'phone', 'address', 'total_price', 'status', 'payment_confirmed', 'discount', 'delivery_confirmed'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::random(10) . '_' . time();
            }
        });
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
