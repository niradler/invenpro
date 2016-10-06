<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 2; $i++) { 
    		DB::table('inventories')->insert([
            'name' => str_random(10),
            'comment' => 'test',
            'user_id' => '1',
        ]);
    	}
    	  
         $this->call(ItemsTableSeeder::class);
    }
}
