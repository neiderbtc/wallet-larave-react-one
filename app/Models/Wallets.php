<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallets extends Model
{
    use HasFactory;
    public function transfers(){
        return $this->hashMany('App\Models\Transfers');
    }

    public function getJsonWallets(){
        return $this->get();
    }
}
