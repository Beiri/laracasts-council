<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        factory(User::class)
            ->create([
                'name' => 'Test',
                'username' => 'test',
                'email' => 'test@test.com',
                'password' => bcrypt('password')
            ]);
    }
}
