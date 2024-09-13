<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'user_id',
        'product_id', // Corrected this from 'prod_id' to 'product_id'
        'user_review'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id', 'id');
    }

    public function ratings()
    {
        return $this->belongsTo(Rating::class, 'user_id', 'id');
    }
        
    
}
