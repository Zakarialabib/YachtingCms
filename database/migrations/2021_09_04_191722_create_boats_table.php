<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->text('description');
            $table->integer('guests')->default(2);
            $table->integer('cabins')->default(2);
            $table->integer('single_beds')->default(2);
            $table->integer('double_beds')->default(2);
            $table->integer('bathrooms')->default(2);
            $table->integer('number_of_engines')->default(2);
            $table->integer('power_per_motor')->default(2);
            $table->integer('gallons_per_hour')->default(2);
            $table->date('year_factory_boat');
            $table->boolean('captained');
            $table->boolean('status')->default(0);
            $table->boolean('boat_size');
            $table->boolean('booking_type')->default(0);
            $table->double('price', 8, 2);
            $table->integer('nbr_comment')->default(0);
            $table->integer('ratio')->default(25);
            $table->string('photo_path', 2048)->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boats');
    }
}
