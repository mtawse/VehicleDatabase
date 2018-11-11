<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'name' => 'Test',
            'email' => env('TEST_USERNAME', 'test@localhost.com'),
            'password' => Hash::make(env('TEST_PASSWORD', 'password')),
        ]);
    }
}
