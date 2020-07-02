<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('codeno');
            $table->string('name');
            $table->text('photo');
            $table->string('price');
            $table->string('discount');
            $table->text('description');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('subcategory_id');
            $table->timestamps();

            $table->foreign('brand_id')
                  ->references('id')->on('brands')
                  ->onDelete('cascade');

            $table->foreign('subcategory_id')
                  ->references('id')->on('subcategories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
