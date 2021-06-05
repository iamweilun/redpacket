<?php

namespace Database\Factories;

use App\Models\RedPacket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedPacketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RedPacket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        var_dump($users);
        exit();
        foreach($users as $row){
            return [
                'user_id' => $row->id,
                'amount' => rand (0,100),
                'send_quantity' => rand (0,100),
                'receive_quantity' => rand (0,100), 
            ];
        }

    }
}
