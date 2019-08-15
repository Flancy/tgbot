<?php

use Illuminate\Database\Seeder;

class BotUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\BotUser\BotUser', 10)->create();
    }
}
