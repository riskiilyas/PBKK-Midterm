<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Condition;
use App\Models\ItemType;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Condition::factory()->create(['name' => 'perfect']);
        Condition::factory()->create(['name' => 'good']);
        Condition::factory()->create(['name' => 'bad']);

        ItemType::factory(10)->create();
    }
}
