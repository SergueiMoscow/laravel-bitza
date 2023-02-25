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
        DB::statement($this->createView());
    }

    private function createView(): string
    {
        return <<<SQL
        CREATE OR REPLACE VIEW freeRooms AS
        SELECT rooms.shortname from rooms
        WHERE rooms.status = 'A'
        AND rooms.shortname NOT IN (SELECT contracts.room FROM contracts where status = 'A');
        SQL;
    
    }

    private function dropView()
    {
        return <<<SQL
            DROP VIEW IF EXISTS `freeRooms`;
        SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement($this->dropView());
    }
};
