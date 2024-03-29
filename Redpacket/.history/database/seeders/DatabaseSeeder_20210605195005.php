<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        // \App\Models\RedPacket::factory(10)->create();

        \App\Models\RedPacket::factory()
            ->has(\App\Models\User::factory()->count(3))
            ->create();

    }
}
