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
        CREATE VIEW listContacts AS
        SELECT 
            CONCAT(contacts.surname, ' ', contacts.name) as n,
            id 
        from contacts;
        SQL;
    
    }

    private function dropView()
    {
        return <<<SQL
            DROP VIEW IF EXISTS `listContacts`;
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
