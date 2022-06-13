<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sport extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'uuid',
        'name',
        'image_path',
        'describe',
        'price_id',
        'category_id',
    ];


    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function prices()
    {
        return $this->hasOne(Price::class, 'id', 'price_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'id', 'sport_id');
    }
}
