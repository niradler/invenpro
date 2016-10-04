<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
             Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->string('name');
            $table->string('comment');
             $table->string('url');
            $table->timestamps();

        });
                          Schema::table('items', function ($table) {
            $table->integer('inventory_id')->unsigned();
             $table->foreign('inventory_id')->references('id')->on('inventories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('items');


    }
}
