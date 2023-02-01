<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;


class ExpectedPaymentsController extends Controller
{

    public function __construct()
    {

    }

    public function expectedPayments()
    {
        $result = Payment::expectedPayments();
        return view('bitza.expectedpayments', ['result' => $result]);
    }
}
