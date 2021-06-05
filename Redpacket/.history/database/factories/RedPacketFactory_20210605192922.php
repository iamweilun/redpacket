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
        $user = User::all();
        return [
            'user_id' => $this->faker->name(),
            'amount' => rand (0,100),
            'send_quantity' => rand (0,100),
            'receive_quantity' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
        ];
    }
}
