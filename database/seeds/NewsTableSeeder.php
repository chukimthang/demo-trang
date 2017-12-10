<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 20; $i++) { 
            DB::table('news')->insert([
                'title' => rtrim($faker->text(100), '.'),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
                'image' => $faker->imageUrl(320, 320),
                'created_at' => Carbon::createFromTimestamp(
                    rand(strtotime('2017-02-14'), strtotime('2017-12-10')))
                    ->format('Y-m-d h:i:s')

            ]);
        }
    }
}
