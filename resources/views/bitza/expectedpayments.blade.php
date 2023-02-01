<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                {{-- <div class="p-6 text-gray-900"> --}}
                    @foreach($result as $row)
                    <div class="bg-white col-6 shadow-sm sm:rounded-lg">
                      <div class="cell-1">{{ $row->room }}</div>
                      <div class="cell-1">{{ substr($row->date_begin, 0, 10) }}</div>
                      <div class="cell-1">{{ $row->price }}</div>
                      <div class="cell-1">{{ $row->paidmonths }}</div>
                      <div class="cell-1">{{ $row->debtmonth }}</div>
                      <div class="cell-1">{{ $row->debtrur }}</div>
                    </div>
                    @endforeach
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
