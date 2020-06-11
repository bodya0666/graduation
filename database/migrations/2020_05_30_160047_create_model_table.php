<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('brand_id')
                ->constrained('brand')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->timestamps();

//            $table
//                ->foreign('brand_id')
//                ->references('id')
//                ->on('brand')
//                ->onDelete('CASCADE')
//                ->onUpdate('CASCADE');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model');
    }
}
