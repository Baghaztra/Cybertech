<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Division;
use App\Models\Event;
use App\Models\Member;
use App\Models\MemberStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'username' => 'Cybermin',
            'email' => 'cybertechpnpofficial@gmail.com',
            'password' => bcrypt('Admin#1234')
        ]);

        // User::factory(9)->create();

        // Event::factory(10)->create();
        // asset buat masing masing event
        // foreach (Event::all() as $event) {
        //     Asset::factory()->create([
        //         'path' => fake()->imageUrl(),
        //         'type' => 'event',
        //         'entity_id' => $event->id,
        //     ]);
        // }
        // buat asset random
        // Asset::factory(5)->create();
        // Division::factory(4)->create();


        // MemberStatus::factory(5)->create();
        // Member::factory(50)->create();
    }
}
