<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Club;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $club1 = Club::factory()->create();
        $users1 = User::factory(5)->create();

        foreach($users1 as $user)
        {
            $user->clubs()->attach($club1, ['notify' => true]);
        }

        $users2 = User::factory(5)->create();

        foreach($users2 as $user)
        {
            $club = Club::factory()->create();
            $user->clubs()->attach($club, ['notify' => true]);
            $user->clubs()->attach($club1, ['notify' => false]);
        }
    }
}
