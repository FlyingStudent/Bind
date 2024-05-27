<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('types')->insert([
            'name'=>'aa',
        ]);

        DB::table('users')->insert([
            'name'=>'aa',
            'email'=>'a1@email.com',
            'phone'=>'1',
            'password'=>'a2541a',
            'role'=>'user',
        ]);
        DB::table('catgories_part')->insert([
            'name'=>'aa',
        ]);        
        DB::table('parts')->insert([
            'catgory_part_id'=>'1',
            'name'=>'aa',
            'price'=>'1',
            'pictture_url'=>'aa',
            'assessment'=>'1',
        ]);
        DB::table('statuses')->insert([
            'name'=>'aa',
        ]);


        DB::table('catgories_place')->insert([
            'name'=>'aa',
        ]);        
        DB::table('places')->insert([
                 'name'=>'aa', 
                 'location'=>'aa', 
                 'phone'=>'1', 
                 'category_place_id'=>'1',
                ]);
        DB::table('bookings')->insert([
            'place_id'=>'1',
            'start_date'=>'2024-04-16',
            'end_date'=>'2024-04-16', 
        ]);        
        DB::table('prices')->insert([
            'place_id'=>'1', 
            'price'=>'10', 
            'start_time'=>'2024-04-16', 
            'end_time'=>'2024-04-16', 
        ]);

    }
}
