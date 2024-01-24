<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['deadline'];

    public function getFormattedDeadlineAttribute()
    {
        return $this->deadline ? $this->deadline->format('Y-m-d H:i:s') : null;
    }
    public function isOpenForVoting()
    {
        return $this->deadline === null || now()->lt($this->deadline);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_poll_votes')->withPivot('option_id')->withTimestamps();
    }
}
