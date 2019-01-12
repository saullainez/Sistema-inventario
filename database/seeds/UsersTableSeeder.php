<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug', 'admin')->first();
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@hotmail.es';
        $user->password = Hash::make('asd.123');
        $user->save();
        $user->roles()->attach($admin);
        /*User::create([
            'name'      => 'Admin',
            'email'      => 'admin@hotmail.es',
            'password'   => Hash::make($request['asd.123']),
        ]);*/
    }
}
