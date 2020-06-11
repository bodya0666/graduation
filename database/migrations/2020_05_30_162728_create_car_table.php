<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price')->nullable();
            $table->string('url');
            $table->string('distance')->nullable();
            $table->string('gear')->nullable();
            $table->string('fuel')->nullable();
            $table->string('engine')->nullable();
            $table->string('location')->nullable();
            $table->text('equipment')->nullable();
            $table->text('description')->nullable();
            $table->text('year')->nullable();
            $table->foreignId('site_id')
                ->constrained('site')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('site_brand_id')
                ->constrained('site_brand')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
            $table->foreignId('site_model_id')
                ->constrained('site_model')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE');
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
        Schema::dropIfExists('car');
    }
}
