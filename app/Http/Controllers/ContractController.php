<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Models\Contract;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private static $columns = [
        'room',
        'contact_id',
        'date_begin',
        "price",
        'paydate',
        'contracts.status',
        'contacts.surname',
        'contacts.name',
        'contracts.id'
    ];

    public function index()
    {
        $result = DB::table('contracts')->
        join('contacts', 'contacts.id', '=', 'contracts.contact_id')->
        select(self::$columns)->
        where('contracts.status', 'A')->
        orderBy('id', 'desc')->paginate(10);
        $rooms = Room::getFreeRooms();
        return view('bitza.contracts.index', ['result' => $result, 'action' => 'create', 'rooms' => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bitza.contracts.form', ['action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContractRequest $request)
    {
        $validated = $request->safe();
        $contract = new Contract();
        $contract->date_begin = $validated->date_begin;
        $contract->date_end = $validated->date_end;
        $contract->room = $validated->room;
        $contract->price = $validated->price;
        $contract->paydate = $validated->paydate;
        //$contract->contact_id = $validated->contact_id;
        $contract->status = 'A';
        $contract->save();
        return redirect()->route('contracts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return view('bitza.contracts.show', ['contract' => $contract]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        //
    }
    public function search(Request $request)
    {
        $searchString = $request->q;
        $result = DB::table('contracts')->
            join('contacts', 'contacts.id', '=', 'contracts.contact_id')->
            select(self::$columns)->
            where('contracts.status', '=', 'A')->
            where(function($query) use ($searchString) {
                $query->where('surname', 'like', "%$searchString%")->
                orWhere('name', 'like', "%$searchString%")-> 
                orWhere('room', 'like', "%$searchString%");
            })->
            orderBy('id', 'desc')->paginate();
        return view('bitza.contracts.list', ['result' => $result]);
    }

}
