<x-app-layout>
    <form method="POST" name="contract" action="{{ route('contracts.update', ['contract' => $contract]) }}">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value={{ $contract->id }}>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white col-2 shadow-sm sm:rounded-lg">
            <x-input-label class="text-align-right">{{ __('close_date') }}</x-input-label>
            <div>
            <x-text-input type="date" name="close_date" value="{{ date('Y-m-d') }}"></x-text-input>
            <x-input-error :messages="$errors->get('close_date')" class="mt-2" />
            </div>
        </div>
        <a href='/contracts'>
            <x-primary-button>
                {{ __('back')}}
            </x-primary-button>
        </a>
        <x-primary-button  type="submit">
            {{ __('save')}}
        </x-primary-button>
        <input type="submit" value="send" />
    </div>
    </form>
</x-app-layout>