<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Event extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            'user_id'=>'1',
            'type_id'=>'1',
            'status_id'=>'1',
            'place_id'=>'1',
            'name'=>'aa',
            'additions'=>'aa',
            'nameOnTheCard'=>'aa',
            'music'=>'aa',
        ]);
    }
}
