@foreach ($result as $row)
    <div class="bg-white col-7 shadow-sm sm:rounded-lg">
        <div class="cell-1">{{ date("d.m.Y", strtotime($row->time)) }}</div>
        <div class="cell-1">{{ $row->room }}</div>
        <div class="cell-1">{{ $row->amount }}</div>
        {{-- <div class="cell-1">{{ $row->discount }}</div> --}}
        <div class="cell-1">{{ $row->total }}</div>
        <div class="cell-1">{{ $row->concept }}</div>
        <div class="cell-1">{{ $row->notes }}</div>
        <div class="cell-1">{{ $row->bank_account }}</div>
    </div>
@endforeach
{{ $result->links('bitza.mypagination') }}