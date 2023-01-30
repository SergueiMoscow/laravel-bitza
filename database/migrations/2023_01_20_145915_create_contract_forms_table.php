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
        Schema::create('contract_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->nullable();
            $table->string('descrip', 50)->nullable();
            $table->string('htmlfile', 20)->nullable();
            $table->string('status', 1)->nullable();
            $table->integer('migrateid')->nullable();
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
        Schema::dropIfExists('contract_forms');
    }
};
