<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::create([
            'name'=>'System Admin',
            'email'=>'webmaster@example.com',
            'email_verified_at'=> now(),
            'is_admin'=> true,
            'password'=>\Hash::make('password')
        ]);
        $regular  = User::create([
            'name'=>'Regular user',
            'email'=>'client@example.com',
            'email_verified_at'=> now(),
            'password'=>\Hash::make('password')
        ]);
    }
}
