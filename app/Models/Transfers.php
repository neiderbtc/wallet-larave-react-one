<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfers extends Model
{
    use HasFactory;
    public function wallet(){
        return $this->belongsTo('App\Models\Wallet');
    }

    public function tranfersWallet($id){
        return $this->where('wallet_id',$id)->get();
    }
}
