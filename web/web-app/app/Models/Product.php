<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',// foreign key (id of the category)
        'name',
        'description',
        'original_price',
        'selling_price',
        'image',
        'qty',
        'status',
        'trending',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
        //in  product table category id convert in to category name. to this,
        //name of the model->Category::class
        //give foreign key to category->category_id
        //give primary key to category->id
    }
}


