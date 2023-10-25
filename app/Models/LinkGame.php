<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LinkGame extends Model
{
    use HasFactory;
    protected $table ='link_games';
    protected $guarded=[];

    public function games()
    {
        return $this->HasOne(GameType::class,'id','game_id');
    }
}
