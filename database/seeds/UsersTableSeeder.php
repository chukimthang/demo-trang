<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('users')->insert([
            'full_name' => 'Trang Nguyen',
            'email' => 'trangntt21.ptit@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '123456789',
            'address' => 'Vinh Phuc',
            'is_admin' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'full_name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '123456789',
            'address' => 'Vinh Phuc',
            'is_admin' => 1,
            'created_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'full_name' => 'test1',
            'email' => 'test1@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '123456789',
            'address' => 'Vinh Phuc',
            'is_admin' => 0,
            'created_at' => Carbon::now()
        ]);

        foreach (range(1,30) as $index) {
            DB::table('users')->insert([
                'full_name' => str_random(10),
                'email'  => str_random(10).'@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'is_admin' => 0,
                'created_at' => Carbon::now()
            ]);
        }
    }
}
