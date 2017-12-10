<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'image' => 'banner1.jpg'
        ]);

        DB::table('slides')->insert([
            'image' => 'banner2.jpg'
        ]);

        DB::table('slides')->insert([
            'image' => 'banner3.jpg'
        ]);
    }
}
