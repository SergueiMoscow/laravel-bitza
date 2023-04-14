<x-app-layout>
    @php
        $classForInputText = "border-gray-300 rounded-md w-full";
        $classForInputButton = "inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ml-3";
    @endphp
    <div class="content">
        <div class="search">
        <form method="POST" action="{{ route('tax.index') }}">
        <table>
        <tr>
        <td>
            <input name="kvartal" class="{{ $classForInputText }}" type="number" id="kvartal" value="{{ $kvartal }}"/>
        </td>
        <td>
            <input name="year" class="{{ $classForInputText }}" type="number" id="year" value="{{ $year }}"/>
        </td>
        <td>
            {{-- <input type="submit" class="{{ $classForInputButton }}">Show</button> --}}
            <input type="submit" class="{{ $classForInputButton }}" value="Show">
        </td>
        </tr>
        </table>
        </form>
        </div>
        <div class="edit">
        </div>
        <div id="list_payments" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('bitza.payments.list')
        </div>
    </div>
    <div>
        Total: {{ $total }}<br />
        Tax: {{ $total * .06 }}<br />
    </div>
</x-app-layout>
<script src="/js/bitza.js"></script>
