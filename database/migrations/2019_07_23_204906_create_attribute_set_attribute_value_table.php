<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeSetAttributeValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_set_attribute_value', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('attribute_set_id')->index();
            $table->foreign('attribute_set_id')
                ->references('id')
                ->on('attribute_sets')
                ->onDelete('cascade');

            $table->unsignedInteger('attribute_value_id')->index();
            $table->foreign('attribute_value_id')
                ->references('id')
                ->on('attribute_values')
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
        Schema::dropIfExists('attribute_set_attribute_value');
    }
}
