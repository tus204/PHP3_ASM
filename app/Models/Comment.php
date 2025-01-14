<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'account_id', 'username','photo', 'rate', 'content'];
    
    public function book() : BelongsTo{
        return $this->belongsTo(Book::class);
    }
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function account() : BelongsTo {
        return $this->belongsTo(Account::class);
    }
}
