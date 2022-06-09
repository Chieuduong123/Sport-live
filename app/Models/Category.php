<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'memo',
        'sort',     
    ];

    public function sport(){
        return $this->hasMany(Sport::class, 'category_id');
    }
}
