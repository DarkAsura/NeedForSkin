<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $primaryKey = 'TransaksiID';

    protected $guarded = [];

    public function GameAccount(){
        return $this->hasOne(GameAccount::class,'GameAccountID','GameAccountID');
    }

    public function TransaksiHistory(){
        return $this->hasOne(TransaksiHistory::class);
    }

    public function User(){
        return $this->hasOne(User::class);
    }
}
