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
            $table->increments('id');

            $table->unsignedInteger('product_type_id')->index();
            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_types')
                ->onUpdate('cascade');

            $table->unsignedInteger('attribute_set_id')->index();
            $table->foreign('attribute_set_id')
                ->references('id')
                ->on('attribute_sets')
                ->onUpdate('cascade');

            $table->string('model_number', 20)->nullable()->unique();
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
