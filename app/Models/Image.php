<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'sport_id',
        'image_path',
        'title',
        
    ];

    public function sport(){
        return $this->hasOne(Sport::class, 'sport_id');
    }
}
