<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'UserID';

    protected $guarded = [];

    protected $hidden = 'Password';

    public function GameAccount(){
        return $this->hasMany(GameAccount::class);
    }

    public function TransaksiHistory(){
        return $this->hasOne(TransaksiHistory::class);
    }
}
