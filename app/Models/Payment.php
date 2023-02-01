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
}