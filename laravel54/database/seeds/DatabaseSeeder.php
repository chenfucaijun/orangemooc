<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => str_random(8),
            'email' => str_random(8).'@qq.com',
            'password' => bcrypt('chen1992'),
        ]);

        DB::table('users')->insert([
            'name' => str_random(8),
            'email' => str_random(8).'@qq.com',
            'password' => bcrypt('chen1992'),
        ]);

        DB::table('users')->insert([
            'name' => str_random(8),
            'email' => str_random(8).'@qq.com',
            'password' => bcrypt('chen1992'),
        ]);
    }
}
