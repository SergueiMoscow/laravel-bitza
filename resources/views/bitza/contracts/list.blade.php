@foreach ($result as $row)
    <div class="bg-white col-7 shadow-sm sm:rounded-lg">
        <div class="cell-1 click-show-contact" data-contact-id="{{ $row->room }}"><a href="/contracts/{{ $row->id }}"><span class="surname">{{ $row->room }}</span></a></div>
        <div class="cell-1">{{ $row->surname.' '.$row->name }}</div>
        <div class="cell-1">{{ date("d.m.Y", strtotime($row->date_begin)) }}</div>
        <div class="cell-1">{{ $row->price }}</div>
        <div class="cell-1">{{ $row->paydate }}</div>
        <div class="cell-1">{{ $row->status }}</div>
        <div class="cell-1">{{ __('Payments') }}</div>
    </div>
@endforeach
{{ $result->links('bitza.mypagination') }}
<!--
<button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3">
    Log in
</button>
-->