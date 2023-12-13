<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['title','price','user_id'];
    public function person(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
