<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('images')->insert([
            'image' => 'https://images.unsplash.com/photo-1517836357463-d25dfeac3438?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),            
        ]);

        DB::table('images')->insert([
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcR4spF_E9eCBZGLeF1ETn7lPheTdmGil9brZA&usqp=CAU',
            'user_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),            
        ]);

        DB::table('images')->insert([
            'image' => 'https://d1b3liscmludba.cloudfront.net/images/new/banner-1.jpg',
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),            
        ]);
        
        DB::table('images')->insert([
            'image' => 'https://fitnessfor10.com/wp-content/uploads/2019/05/Fitness-for-10-Home-Licensing-Information.jpg',
            'user_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),            
        ]);       
        
        DB::table('images')->insert([
            'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80',
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),            
        ]);        

        DB::table('images')->insert([
            'image' => 'https://www.mensjournal.com/wp-content/uploads/mf/1280-man-with-medicine-ball.jpg?w=1200&h=1200&crop=1&quality=86&strip=all',
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),            
        ]);     
    }
}
