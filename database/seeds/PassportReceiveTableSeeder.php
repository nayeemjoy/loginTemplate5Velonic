<?php

use Illuminate\Database\Seeder;
use App\PassportMaking;
class PassportReceiveTableSeeder extends Seeder
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
        	$passport_making = new PassportMaking;
        	$passport_making->name = $faker->name;
        	$passport_making->passport_no = $faker->randomNumber;
        	$passport_making->broker_name = $faker->name;
        	$passport_making->amount_of_money = $faker->randomNumber;
        	$passport_making->manager_id = 1;
        	$passport_making->save();
        }
    }
}
