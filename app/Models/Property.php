<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function category()
    { 
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}



