<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();
        $user = [
                'name' => 'Tchamou ramses',
                'email' => "tchamouramses@gmail.com",
                'password' => bcrypt('brice1997'),
            ];
        $user = User::create($user);

    }
}
