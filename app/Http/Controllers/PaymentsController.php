<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;


class PaymentsController extends Controller
{
    private static $columns = [
        'type',
        'time',
        'contract',
        'date',
        'room',
        'amount',
        'discount',
        'total',
        'bank_account',
        'concept',
        'represent',
        'notes'
    ];

    public function index(Request $request)
    {
        if ($request->contract) {
            $number=addslashes($request->contract);
            $contract = DB::table('contracts')->
                select('room')->
                where('number', $number)->
                get();
            $room = $contract[0]->room;
            $result = DB::table('payments')->
                select(self::$columns)->
                where('contract', $number)->
                orderBy('time', 'desc')->
                paginate(10);
            return view('bitza.payments.index', ['result' => $result, 'action' => 'create', 'room' => $room, 'room1' => '']);
        }
        else {
            $result = DB::table('payments')->
            select(self::$columns)->
            orderBy('time', 'desc')->
            paginate(10);
            return view('bitza.payments.index', ['result' => $result, 'action' => 'create', 'room' => '', 'room1' => $this->getRoom1()]);
        }
    }

    private function getRoom1()
    {
        $query = 'select distinct SUBSTRING(room, 1, 1) as r1 from contracts where status = "A" order by r1;';
        return DB::select($query);
    }
    
    public function getRoom2(Request $request)
    {
        $r1 = $request->r1;
        $query = "SELECT DISTINCT SUBSTRING(room, 3) as r2 FROM contracts WHERE status = 'A' AND SUBSTRING(room, 1, 1) = '$r1' ORDER BY r2;";
        $result = DB::select($query);
        $room2 = [];
        $counter = 0;
        foreach($result as $r2) {
            $counter++;
            $room2[$counter] = $r2->r2;
        }
        echo json_encode($room2);
    }

    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->concept = $request->concept;
        $payment->date = date('Y-m-d', strtotime($request->date));
        $payment->amount = intval($request->amount);
        $payment->discount = intval($request->discount);
        $payment->total = $payment->amount - $payment->discount;
        $payment->bank_account = addslashes($request->bank_account);
        $payment->notes = addslashes($request->notes);
        if ($request->room1) {
            Log::debug("Room: {$request->room1}, {$request->room2}");
            $room = $request->room1 . '.' . $request->room2;
        } elseif ($request->room) {
            $room = $request->room;
        }
        $payment->room = $room;
        $payment->contract = $this->getActiveContractByRoom($room);
        $payment->status = 'New';
        $payment->concept = __('rent') . " {$room}";
        $payment->save();
        return redirect()->route('payments.index');
    }

    private function getActiveContractByRoom($room)
    {
        $query = "SELECT number FROM contracts where room = '$room' AND status = 'A'";
        $result = DB::selectOne($query);
        return $result->number;
    }

}
