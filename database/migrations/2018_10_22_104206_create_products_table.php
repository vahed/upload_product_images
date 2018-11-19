<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {	
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedInteger('photo_id');
			$table->string('image_name');
			$table->text('comment');
            $table->timestamps();
			$table->foreign('photo_id')->references('id')->on('Photos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
