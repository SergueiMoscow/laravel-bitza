<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white col-2 shadow-sm sm:rounded-lg">
            <div>{{ __('surname') }}, {{ __('name') }}</div>
            <h1>{{ $contact->surname }} {{ $contact->name }}</h1>
            <div>{{ __('birth_date') }}</div>
            <div>{{ $contact->birth_date }}</div>
            <div>{{ __('birth_place') }}</div>
            <div>{{ $contact->birth_place }}</div>
            <div>{{ __('document') }}</div>
            <div>{{ $contact->document }}</div>
            <div>{{ __('doc_series') }} / {{ __('doc_number') }}</div>
            <div>{{ $contact->doc_series }} / {{ __('doc_number') }}</div>
            <div>{{ __('doc_date') }}</div>
            <div>{{ $contact->doc_date }}</div>
            <div>{{ __('doc_issued') }}</div>
            <div>{{ $contact->doc_issued }}</div>
            <div>{{ __('address') }}</div>
            <div>{{ $contact->address1 }}<br>{{ $contact->address2 }}</div>
            <div>{{ __('city') }}</div>
            <div>{{ $contact->city }}</div>
            <div>{{ __('email') }}</div>
            <div>{{ $contact->email }}</div>
            <div>{{ __('phone') }}</div>
            <div>{{ $contact->phone }}</div>
            <div>{{ __('notes') }}</div>
            <div>{{ $contact->notes }}</div>
        </div>
    </div>
</x-app-layout>