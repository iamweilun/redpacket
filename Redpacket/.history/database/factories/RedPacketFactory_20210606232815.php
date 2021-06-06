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
            'amount' => $this->frand(0.1, 100, 2),
            'random' => rand (0,1),
            'total_quantity' => 9,
            'original_quantity' => 9,
        ];

    }

    public function frand($min, $max, $decimals = 0) {
        $scale = pow(10, $decimals);
        return mt_rand($min * $scale, $max * $scale) / $scale;
    }
}
