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
        
        return [
            'user_id' => User::factory(),
            'amount' => rand (0,100),
            'random' => rand (0,1),
            'total_quantity' => 10,
            'original_quantity' => 10,
        ];

    }
}
