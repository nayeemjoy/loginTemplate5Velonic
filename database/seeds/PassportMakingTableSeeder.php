<?php

use Illuminate\Database\Seeder;
use App\PassportReceive;
class PassportMakingTableSeeder extends Seeder
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
        	$passport_receive = new PassportReceive;
        	$passport_receive->name = $faker->name;
        	$passport_receive->passport_no = $faker->randomNumber;
        	$passport_receive->broker_name = $faker->name;
        	$passport_receive->manager_id = 1;
        	$passport_receive->save();
        }
    }
}
