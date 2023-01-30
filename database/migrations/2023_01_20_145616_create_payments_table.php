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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('type', 10)->nullable();
            $table->datetime('time')->useCurrent();
            $table->string('contract', 20)->default('');
            $table->string('room', 5)->default('');
            $table->unsignedInteger('building_id')->default(0);
            $table->date('date')->nullable();
            $table->integer('amount')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total')->nullable();
            $table->string('bank_account', 20)->default('');
            $table->string('book_account', 20)->default('');
            $table->string('concept', 20)->nullable();
            $table->string('represent', 20)->nullable();
            $table->string('notes', 255)->nullable();
            $table->string('status', 5)->default('New');
            $table->integer('migrateid')->nullable();
            $table->timestamps();

            $table->index('time');
            $table->index('contract');
            $table->index('room');
            $table->index('building_id');
            $table->index('date');
            $table->index('bank_account');
            $table->index('book_account');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
