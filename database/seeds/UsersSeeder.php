<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => 'password'
        ]);

        $this->command->info("Admin user token: " . $user->api_token);
    }
}
