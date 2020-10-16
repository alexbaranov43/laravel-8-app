<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        DB::table('users')->insert([
            'name' => 'Arnold Scharzenegger',
            'email' => 'theahnolhd@gmail.com',
            'password' => bcrypt('pumping iron'),
            'role_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        DB::table('users')->insert([
            'name' => 'Conor McGregor',
            'email' => 'thenotoriousmac@gmail.com',
            'password' => bcrypt('mystic mac'),
            'role_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);

        DB::table('users')->insert([
            'name' => 'John Smith',
            'email' => 'johnny@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'), 
        ]);
    }
}
