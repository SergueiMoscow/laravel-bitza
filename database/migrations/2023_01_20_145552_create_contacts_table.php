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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('surname', 40)->nullable();
            $table->string('name', 40)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place', 100)->nullable();
            $table->string('document', 15)->nullable();
            $table->string('doc_series', 4)->nullable();
            $table->string('doc_number', 10)->nullable();
            $table->date('doc_date')->nullable();
            $table->string('doc_issued1', 255)->nullable();
            $table->string('doc_issued2', 10)->nullable();
            $table->string('address1', 80)->nullable();
            $table->string('address2', 40)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('state', 30)->nullable();
            $table->string('country', 15)->nullable();
            $table->string('workplace', 60)->nullable();
            $table->string('notes', 300)->nullable();
            $table->text('images')->nullable();
            $table->string('status', 10)->nullable();
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
        Schema::dropIfExists('contacts');
    }
};
