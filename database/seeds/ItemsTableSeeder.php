<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Inventory;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	for ($i=0; $i < 100; $i++) { 
    		DB::table('items')->insert([
            'name' => str_random(10),
            'amount' => rand(2,100),
            'url' => 'http://www.gadgetreview.com/wp-content/uploads/2014/08/other-electronic-reviews.jpg',
            'image_url' => 'http://www.gadgetreview.com/wp-content/uploads/2014/08/other-electronic-reviews.jpg',
            'comment' => 'test',
            'inventory_id' => 1,
        ]);
    	}
    }
}
