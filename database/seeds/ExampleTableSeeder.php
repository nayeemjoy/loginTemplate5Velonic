<?php

use Illuminate\Database\Seeder;
use App\Example;
class ExampleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach(range(1, 20) as $index) { 
        	$example = new Example;
        	$example->name = $faker->name;
        	$example->passport_no = $faker->randomNumber;
        	$example->broker_name = $faker->name;
        	$example->manager_id = 1;
        	$example->save();
        }
    }
}
