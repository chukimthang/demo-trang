<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) { 
            DB::table('products')->insert([
                'name' => rtrim($faker->text(30), '.'),
                'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'unit_price' => $faker->numberBetween(50, 1000) * 1000,
                'discount' => $faker->numberBetween(1, 50),
                'image' => $faker->imageUrl(320, 320),
                'unit' =>  $faker->numberBetween(0, 2),
                'quantity' => $faker->numberBetween(0, 100),
                'status' => $faker->numberBetween(0, 1),
                'type_product_id' => $faker->numberBetween(1, 7)
            ]);
        }
    }
}
