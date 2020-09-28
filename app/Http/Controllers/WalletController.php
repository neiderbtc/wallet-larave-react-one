<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Wallets;
use App\Models\Transfers;

class WalletController extends Controller
{
    protected $WalletModel;
    protected $Transfers;


    public function __construct(){
        $this->WalletModel = new Wallets(); 
        $this->Transfers = new Transfers(); 
    }

    public function index(){

        $wallet = Wallets::firstOrFail();

        return json_encode(array(
            'status'=>200,
            'response'=>$wallet
        ));
    }
    public function ObtenerListaWallets(){

        $tranferencias = [];
        $wallets = [];
        
        $wallet = $this->WalletModel->getJsonWallets();

        foreach ($wallet as $value) {
            $wallets['id'] = $value['id'];
            $wallets['money'] = $value['money'];
            $wallets['created_at'] = $value['created_at'];
            $wallets['updated_at'] = $value['updated_at'];
            $tranferencia = $this->Transfers->tranfersWallet($value['id']);
            // var_dump($tranferencia);
            $wallets['transfers'] = $tranferencia;
        }

// var_dump($tranferencias);

     
        $resultado = json_encode(array_merge($wallets,$tranferencias));

        return $resultado;

    }

    public function AddTransfer(Request $request){

        $this->Transfers->amount = $request->amount; 
        $this->Transfers->description = $request->description; 
        $this->Transfers->wallet_id = $request->wallet_id; 
        $this->Transfers->save();

        $wallet = Wallets::find($request->wallet_id);
        $wallet->money = $wallet->money + $request->amount;
        $wallet->update();
        
        return response()->json($this->Transfers,201);

    }
}
