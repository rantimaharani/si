<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user ->name = "admin";
        $user ->email = "admin@gmail.com";
        $user ->password = bcrypt ("admin123");
        $user ->save();
    }
}
