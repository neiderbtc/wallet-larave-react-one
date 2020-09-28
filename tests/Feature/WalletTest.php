<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Wallets;
use App\Models\Transfers;

class WalletTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function testGetWallet()
    {

        // $wallet = Wallets::factory()->create();
        // $transfers = Transfers::factory(3)->create([
        //     'wallet_id'=>$wallet->id
        // ]);

        $response = $this->json('GET','/api/wallet');

        $response->assertStatus(200)
        ->assertJsonStructure([
            'id','money','transfers'=>[
                '*'=>[
                    'id','amount','description','wallet_id'
                ]
            ]
        ]);
        $this->assertCount(3,$response->json()['transfers']);
    }
}
