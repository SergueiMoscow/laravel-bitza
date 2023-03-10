<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white col-2 shadow-sm sm:rounded-lg">
            <x-input-label class="text-align-right">{{ __('surname') }}, {{ __('name') }}</x-input-label>
            <h1>{{ $contact->surname }} {{ $contact->name }}</h1>
            <x-input-label class="text-align-right">{{ __('birth_date') }}</x-input-label>
            <div>{{ $contact->birth_date }}</div>
            <x-input-label class="text-align-right">{{ __('birth_place') }}</x-input-label>
            <div>{{ $contact->birth_place }}</div>
            <x-input-label class="text-align-right">{{ __('document') }}</x-input-label>
            <div>{{ $contact->document }}</div>
            <x-input-label class="text-align-right">{{ __('doc_series') }} / {{ __('doc_number') }}</x-input-label>
            <div>{{ $contact->doc_series }} / {{ $contact->doc_number }}</div>
            <x-input-label class="text-align-right">{{ __('doc_date') }}</x-input-label>
            <div>{{ $contact->doc_date }}</div>
            <x-input-label class="text-align-right">{{ __('doc_issued') }}</x-input-labeliv>
                <div>{{ $contact->doc_issued1 }}</div>
                <x-input-label class="text-align-right">{{ __('address') }}</x-input-label>
                <div>{{ $contact->address1 }}<br>{{ $contact->address2 }}</div>
                <x-input-label class="text-align-right">{{ __('city') }}</x-input-label>
                <div>{{ $contact->city }}</div>
                <x-input-label class="text-align-right">{{ __('email') }}</x-input-label>
                <div>{{ $contact->email }}</div>
                <x-input-label class="text-align-right">{{ __('phone') }}</x-input-label>
                <div>{{ $contact->phone }}</div>
                <x-input-label class="text-align-right">{{ __('notes') }}</x-input-label>
                <div>{{ $contact->notes }}</div>
        </div>
        <a href='/contacts'>
            <x-primary-button>
                {{ __('back') }}
            </x-primary-button>
        </a>
        <a href='/contacts/{{ $contact->id }}/edit'>
            <x-secondary-button>
                {{ __('edit') }}
            </x-secondary-button>
        </a>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white thumbnails shadow-sm sm:rounded-lg">
            @foreach ($contact->documents as $doc)
                <div class="thumbnail">
                    <img src="/getdoc?id={{ $doc->id }}">
                    <div class="deleteimage">
                       <a href="#" onclick="deletedoc({{ $doc->id }}, {{ $contact->id }})"><img src="/img/delete.svg"></a>
                    </div>
                </div>
            @endforeach
        </div>
            <form name="myform" action="{{ route('contact_add_doc', array($contact->id)) }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('file')
                    <span>{{ $message }}</span>
                    <br />
                @enderror
                <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                @error('description')
                    <span>{{ $message }}</span>
                    <br />
                @enderror
                <input type="text" name="description" value="{{ __('passport') }}">
                <input type="file" name="image" accept=".jpg,.jpeg,.png"/>
                <br />
            <x-primary-button>
                {{ __('send') }}
            </x-primary-button>
            </form>
    </div>
</x-app-layout>
<script src="/js/bitza.js"></script>
