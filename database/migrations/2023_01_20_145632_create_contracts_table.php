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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_begin')->nullable();
            $table->dateTime('date_end')->nullable();
            $table->unsignedInteger('document_id');
            $table->string('number', 20);
            $table->unsignedInteger('building_id');
            $table->string('room', 5)->nullable();
            $table->smallInteger('paydate')->nullable();
            $table->integer('price')->nullable();
            $table->integer('deposit')->nullable();
            $table->integer('discount')->nullable();
            $table->unsignedInteger('contact_id')->nullable();
            $table->string('status', 10)->default('Active');
            $table->date('close_date')->nullable();
            $table->unsignedInteger('migrateid')->nullable();
            $table->timestamps();
            $table->index('date_begin');
            $table->index('number');
            $table->index('building_id');
            $table->index('room');
            $table->index('contact_id');
            $table->index('document_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
