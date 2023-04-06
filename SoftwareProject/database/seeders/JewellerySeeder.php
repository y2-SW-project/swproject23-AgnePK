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
        Jewellery::factory()->times(20)->hasUsers(2)->create();
        // $jewellery = [
        //     [
        //         'name' => 'Gold bracelet',
        //         'img' => '1.jpg',
        //         'price' => 12.25,
        //         'description' => 'asdjlidh  whdawdi owhdoawduwg awdyiwa iugda  wiadgwu wgdiua ore egeirterg eorr',
        //         'category' => 'bracelets',
        //         'material' => 'gold',
        //     ],       
        //     [
        //         'name' => 'Silver bracelet',
        //         'img' => '2.jpg',
        //         'price' => 12.25,
        //         'description' => 'asdjlidh  whdawdi owhdoawduwg awdyiwa iugda  wiadgwu wgdiua ore egeirterg eorr',
        //         'category' => 'bracelets',
        //         'material' => 'gold',
        //     ],       
        //     [
        //         'name' => 'Silver bracelet',
        //         'img' => '3.jpg',
        //         'price' => 12.25,
        //         'description' => 'asdjlidh  whdawdi owhdoawduwg awdyiwa iugda  wiadgwu wgdiua ore egeirterg eorr',
        //         'category' => 'bracelets',
        //         'material' => 'gold',
        //     ]          
        // ];

        // foreach ($jewellery as $key => $value) {
        //     Jewellery::create($value);
        // }
 

        foreach (User::all() as $person) {
            $jewellery = Jewellery::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $person->jewellery()->attach($jewellery);
        }
    }
}
