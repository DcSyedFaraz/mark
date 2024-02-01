<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YourTableName extends Model
{
    use HasFactory;
    protected $table = 'YourTableName';
    public $timestamps = false;
    protected $guarded = [];
}
