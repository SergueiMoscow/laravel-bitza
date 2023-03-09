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
        DB::statement($this->createIndex());
    }

    public function createIndex()
    {
        RETURN <<<SQL
            ALTER TABLE `documents`
            ADD KEY `i_contact_id` (`contact_id`);
        SQL;

    }

    public function dropIndex()
    {
        return <<<SQL
            ALTER TABLE documents DROP INDEX IF EXISTS `i_contact_id`;
        SQL;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        $this->dropIndex();
    }
};
