<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameWithdraw extends Model
{
    use HasFactory;
    protected $table ='game_withdraws';
    protected $guarded=[];

    public function games()
    {
        return $this->HasOne(GameType::class,'id','game_id');
    }

    public function user()
    {
        return $this->HasOne(User::class,'id','user_id');
    }
}
