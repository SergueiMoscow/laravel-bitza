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
        CREATE OR REPLACE VIEW expectedPayments AS
        SELECT 
            contracts.number, 
            DATE_FORMAT(contracts.date_begin, '%d.%m.%Y') as date_begin,
            contracts.room, 
            contracts.price, 
            sum(payments.total) as payed, 
            DATEDIFF(now(),contracts.date_begin) as diff, 
            ROUND(DATEDIFF(now(),contracts.date_begin)/(365/12), 1) as monthdiff, 
            ROUND(COALESCE(sum(payments.total)/contracts.price,0), 1) as paidmonths, 
            ROUND(DATEDIFF(now(),contracts.date_begin)/(365/12)-COALESCE(sum(payments.total)/contracts.price,0), 1) as debtmonth, 
            ROUND(((DATEDIFF(now(),contracts.date_begin)/(365/12))-COALESCE(sum(payments.total)/contracts.price,0))*contracts.price, 0) as debtrur 
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