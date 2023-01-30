<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('building_id')->nullable();
            $table->string('shortname', 5)->nullable();
            $table->string('floor', 2)->nullable();
            $table->string('number', 5)->nullable();
            $table->integer('square')->nullable();
            $table->integer('price1')->nullable();
            $table->integer('price2')->nullable();
            $table->string('wc', 2)->nullable();
            $table->string('name', 30)->nullable();
            $table->string('descript', 200)->nullable();
            $table->string('address1', 80)->nullable();
            $table->string('address2', 40)->nullable();
            $table->string('represent', 30)->nullable();
            $table->string('notes', 200)->nullable();
            $table->char('status', 1)->nullable();
            $table->integer('migrateid')->nullable();
            $table->timestamps();
            $table->unique('shortname');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
