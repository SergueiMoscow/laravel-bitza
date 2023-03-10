<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
	use HasFactory;

	public function contract()
	{
		return $this->belongsTo(Contract::class);
	}
	public static function expectedPayments()
	{
		$query = "SELECT * FROM expectedPayments";
		$result = DB::select($query);
		foreach ($result as $row) {
			$row->lastpayment = self::getLastPayment($row->number);
		}
		return $result;
		// echo "<table><tr>
		// <td>Ком.</td>
		// <td>Договор</td>
		// <td>Цена</td>
		// <td>Дата</td>
		// <td>Прожито</td>
		// <td>Оплачено мес</td>
		// <td>Долг мес.</td>
		// <td>Долг руб.</td>
		// </tr>";
		// $result = getResult($query) or die(db_error());
	}

	private static function getLastPayment($contractNumber)
	{
		$query = "SELECT `time` from payments where contract = '$contractNumber' ORDER BY `time` LIMIT 0, 1";
		$result = DB::selectOne($query);
		if ($result) {
			return $result->time;
		} else {
			return null;
		}

		//return is_null($row->time) ? date('Y-m-d H:i:s', strtotime('-1 month')) : $row->time;
	}
}