<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey = "TypeID";
    protected $guarded = [];

    public function GameAccount(){
        return $this->belongsTo(GameAccount::class);
    }
}
