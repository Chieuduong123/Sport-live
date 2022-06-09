<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'name',
        'image_path',
        'describe',
        'price_id',
        'category_id',
    ];


    public function categories(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function prices(){
        return $this->hasOne(Price::class, 'id', 'price_id');
    }

    public function image(){
        return $this->hasMany(Image::class);
    }
}
