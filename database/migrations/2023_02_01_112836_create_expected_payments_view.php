<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement($this->createView());
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


    private function createView(): string
    {
        return <<<SQL
        CREATE VIEW expectedPayments AS
        SELECT 
            contracts.number, 
            contracts.date_begin, 
            contracts.room, 
            contracts.price, 
            sum(payments.total) as payed, 
            DATEDIFF(now(),contracts.date_begin) as diff, 
            DATEDIFF(now(),contracts.date_begin)/(365/12) as monthdiff, 
            COALESCE(sum(payments.total)/contracts.price,0) as paidmonths, 
            DATEDIFF(now(),contracts.date_begin)/(365/12)-COALESCE(sum(payments.total)/contracts.price,0) as debtmonth, 
            ((DATEDIFF(now(),contracts.date_begin)/(365/12))-COALESCE(sum(payments.total)/contracts.price,0))*contracts.price as debtrur 
        from contracts as contracts
        left join payments as payments on contracts.number=payments.contract
        where contracts.status='A'
        group by contracts.number, contracts.date_begin, contracts.room, contracts.price
        order by debtrur desc;
        SQL;
    
    }
    private function dropView()
    {
        return <<<SQL
            DROP VIEW IF EXISTS `expectedPayments`;
        SQL;
    }

};