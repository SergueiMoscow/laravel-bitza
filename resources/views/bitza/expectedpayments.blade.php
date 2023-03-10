<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
                {{-- <div class="p-6 text-gray-900"> --}}
                    @foreach($result as $row)
                    @if ($row->debtmonth > 1)
                        <?php $bg_class = 'bg-lightcoral' ?>
                    @elseif ($row->debtmonth > 0)
                        <?php $bg_class = 'bg-gold' ?>
                    @else
                        <?php $bg_class = 'bg-greenyellow' ?>
                    @endif
                    <?php $payedThisMonth = (date('m', strtotime($row->lastpayment)) === date('m')) ?>
                    <div class="{{ $bg_class }} col-6 shadow-sm sm:rounded-lg">
                      <a href="/payments?contract={{ $row->number }}"><div class="cell-1">{{ $row->room }} {{ $payedThisMonth ? '+' : ''}}</div></a>
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
