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
        	$example->title = $faker->name;
        	$example->description = $faker->paragraph;
        	$example->status = 'disable';
        	$example->user_id = 1;
        	$example->save();
        }
    }
}
