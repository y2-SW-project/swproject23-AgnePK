<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Jewellery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        // $role_user = Role::where('name', 'user')->first();

        $admin = new User();
        $admin->name = 'Franky Bennet';
        $admin->address = '12 Rosewood Street, Co. Wexford';
        $admin->phoneNo = '089 123 4567';
        $admin->email = 'frankey@email.com';
        $admin->password = Hash::make('password');
        $admin->save();
        // attach the admin role to the user that was created above.
        $admin->roles()->attach($role_admin);

        // foreach (Jewellery::all() as $jewellery) {
        //     $users = user::inRandomOrder()->take(rand(1, 3))->pluck('id');
        //     $jewellery->users()->attach($users);
        // }
    }
}
