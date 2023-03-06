<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allproducts', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('name');
            $table->longText('description');
            $table->string('price');
            $table->string('size')->nullable();
            $table->string('color');
            $table->string('quantity');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allproducts');
    }
}
