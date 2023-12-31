<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

       /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price',
        'discount',
        'quantity',
        'image',
        'cover',
        'is_active',
        
    ];
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
