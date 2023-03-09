<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white col-2 shadow-sm sm:rounded-lg">
            <x-input-label class="text-align-right">{{ __('number') }}</x-input-label>
            <h1>{{ $contract->number }}</h1>
            <x-input-label class="text-align-right">{{ __('date_begin') }}</x-input-label>
            <div>{{ $contract->openDate() }}</div>
            <x-input-label class="text-align-right">{{ __('room') }}</x-input-label>
            <div>{{ $contract->room }}</div>
            <x-input-label class="text-align-right">{{ __('paydate') }}</x-input-label>
            <div>{{ $contract->paydate }}</div>
            <x-input-label class="text-align-right">{{ __('price') }}</x-input-label>
            <div>{{ $contract->price }}</div>
            <x-input-label class="text-align-right">{{ __('contact') }}</x-input-label>
            <div>{{ $contract->contact->surname }} {{ $contract->contact->name }}</div>
            <x-input-label class="text-align-right">{{ __('status') }}</x-input-label>
            <div>{{ $contract->status }}</div>
            <x-input-label class="text-align-right">{{ __('close_date') }}</x-input-label>
            <div>{{ $contract->close_date }}</div>
        </div>
        <a href='/contracts'>
            <x-primary-button>
                {{ __('back')}}
            </x-primary-button>
        </a>
        <a href='/contracts/{{ $contract->id }}/edit'>
            <x-secondary-button>
                {{ __('edit')}}
            </x-secondary-button>
        </a>
    </div>
</x-app-layout>