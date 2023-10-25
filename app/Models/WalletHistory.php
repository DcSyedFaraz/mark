<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    use HasFactory;
    public $table = "wallet_history";

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
