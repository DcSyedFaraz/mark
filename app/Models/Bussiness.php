<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bussiness extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeSearchByCategory($query, $category)
    {
        return $query->where('category', 'like', "%$category%");
    }

    public function username(){
        return $this->belongsTo(User::class,"user_id");
    }
}
