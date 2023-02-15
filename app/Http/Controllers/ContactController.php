<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private static $columns = [
        'id',
        'surname',
        'name',
        "birth_date",
        'birth_place',
        'city',
        'phone'
    ];
    public function index()
    {
        $result = DB::table('contacts')->
        select(self::$columns)->
        orderBy('id', 'desc')->paginate(10);
        return view('bitza.contacts.index', ['result' => $result, 'action' => 'create']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bitza.contacts.form', ['action' => 'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $validated = $request->safe();
        $contact = new Contact();
        $contact->surname = $validated->surname;
        $contact->name = $validated->name;
        $contact->birth_date = $validated->birth_date;
        $contact->birth_place = $validated->birth_place;
        // $contact->document = $validated->document;
        $contact->doc_series = $validated->doc_series;
        $contact->doc_number = $validated->doc_number;
        $contact->doc_date = $validated->doc_date;
        // $contact->doc_issued1 = $validated->doc_issued1;
        // $contact->address1 = $validated->address1;
        // $contact->address2 = $validated->address2;
        // $contact->city = $validated->city;
        // $contact->email = $validated->email;
        $contact->phone = $validated->phone;
        $contact->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('bitza.contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('bitza.contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactRequest $request, Contact $contact)
    {
        $validated = $request->safe();
        $contact->surname = $validated->surname;
        $contact->name = $validated->name;
        $contact->birth_date = $validated->birth_date;
        $contact->birth_place = $validated->birth_place;
        $contact->document = $validated->document;
        $contact->doc_series = $validated->doc_series;
        $contact->doc_number = $validated->doc_number;
        $contact->doc_date = $validated->doc_date;
            $contact->doc_issued1 = $validated->doc_issued1;
            $contact->address1 = $validated->address1;
            $contact->address2 = $validated->address2;
            $contact->city = $validated->city;
            $contact->email = $validated->email;
            $contact->notes = $validated->notes;
        $contact->phone = $validated->phone;

        $contact->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        echo "ContactController_destroy";
    }

    public function search(Request $request)
    {
        $searchString = $request->q;
        $result = DB::table('contacts')->
            where('surname', 'like', "%$searchString%")->
            orWhere('name', 'like', "%$searchString%")->
            orderBy('id', 'desc')->paginate();
        return view('bitza.contacts.list', ['result' => $result]);
    }

    public function getList(Request $request)
    {
        $searchString = $request->q;
        $result = DB::table('listContacts')->
            where('n', 'like', "%$searchString%")->
            orderBy('n')->get();
        echo json_encode($result);
        return ;

    }
}
