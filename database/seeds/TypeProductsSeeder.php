<?php

use Illuminate\Database\Seeder;

class TypeProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
       $type_products = [
            'Thực đơn hỗ trợ điều trị bệnh',
            'Tăng cường sức khỏe',
            'Tiểu đường',
            'Ung thư',
            'Sản phẩm nhập khẩu',
            'Handmade',
            'Rau sạch'
        ];

        for($i = 0; $i < count($type_products); $i++) {
            DB::table('type_products')->insert([
                'name' => $type_products[$i],
                'description' => $faker->paragraph($nbSentences = 50, $variableNbSentences = true)
            ]);
        }
    }
}
