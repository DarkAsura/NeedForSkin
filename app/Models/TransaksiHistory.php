<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHistory extends Model
{
    use HasFactory;
    protected $primaryKey = 'TransaksiHistoryID';
    protected $guarded = [];

    public function Transaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
