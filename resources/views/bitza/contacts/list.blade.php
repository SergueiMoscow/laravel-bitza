@foreach ($result as $row)
    <div class="bg-white col-5 shadow-sm sm:rounded-lg">
        <div class="cell-1"><span class="surname">{{ $row->surname }}</span><br>{{ $row->name }}</div>
        <div class="cell-1">{{ date("d.m.Y", strtotime($row->birth_date)) }}</div>
        <div class="cell-1">{{ $row->birth_place }}</div>
        <div class="cell-1">{{ $row->city }}</div>
        <div class="cell-1">{{ $row->phone }}</div>
    </div>
@endforeach
{{ $result->links('bitza.mypagination') }}
