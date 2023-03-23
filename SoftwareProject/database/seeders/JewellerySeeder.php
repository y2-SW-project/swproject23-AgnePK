<?php

namespace Database\Seeders;

use App\Models\Jewellery;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JewellerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jewellery::factory()->times(10)->hasUsers(2)->create();


        foreach (User::all() as $person) {
            $jewellery = Jewellery::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $person->jewellery()->attach($jewellery);
        }
    }
}
