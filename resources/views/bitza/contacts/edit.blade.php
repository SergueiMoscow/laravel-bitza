<x-app-layout>
    <form method="POST" name="contact" action="{{ route('contacts.update', ['contact' => $contact]) }}">
    @csrf
    @method('PUT')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white col-2 shadow-sm sm:rounded-lg">
            <x-input-label class="text-align-right">{{ __('surname') }}</x-input-label>
            <div>
            <x-text-input name="surname" value="{{ $contact->surname }}"></x-text-input>
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('name') }}</x-input-label>
            <div>
            <x-text-input name="name" value="{{ $contact->name }}"></x-text-input>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('birth_date') }}</x-input-label>
            <div>
            <x-text-input name="birth_date" type="date" value="{{ $contact->birth_date }}"></x-text-input>
            <x-input-error :messages="$errors->get('birth_date')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('birth_place') }}</x-input-label>
            <div>
            <x-text-input name="birth_place" value="{{ $contact->birth_place }}"></x-text-input>
            <x-input-error :messages="$errors->get('birth_place')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('document') }}</x-input-label>
            <div>
            <x-text-input name="document" value="{{ $contact->document }}"></x-text-input>
            <x-input-error :messages="$errors->get('document')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('doc_series') }}</x-input-label>
            <div>
            <x-text-input name="doc_series" value="{{ $contact->doc_series }}"></x-text-input>
            <x-input-error :messages="$errors->get('doc_series')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('doc_number') }}</x-input-label>
            <div>
            <x-text-input name="doc_number" value="{{ $contact->doc_number }}"></x-text-input>
            <x-input-error :messages="$errors->get('doc_number')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('doc_date') }}</x-input-label>
            <div>
            <x-text-input name="doc_date" type="date" value="{{ $contact->doc_date }}"></x-text-input>
            <x-input-error :messages="$errors->get('doc_date')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('doc_issued') }}</x-input-labeliv>
            <div>
            <x-text-input name="doc_issued1" value="{{ $contact->doc_issued1 }}"></x-text-input>
            <x-input-error :messages="$errors->get('doc_issued1')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('address') }}</x-input-label>
            <div>
            <x-text-input name="address1" value="{{ $contact->address1 }}"></x-text-input>
            <x-input-error :messages="$errors->get('address1')" class="mt-2" />
            </div>
            <div></div>
            <div>
            <x-text-input name="address2" value="{{ $contact->address2 }}"></x-text-input>
            <x-input-error :messages="$errors->get('address2')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('city') }}</x-input-label>
            <div>
            <x-text-input name="city" value="{{ $contact->city }}"></x-text-input>
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('email') }}</x-input-label>
            <div>
            <x-text-input name="email" value="{{ $contact->email }}"></x-text-input>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('phone') }}</x-input-label>
            <div>
            <x-text-input name="phone" value="{{ $contact->phone }}"></x-text-input>
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <x-input-label class="text-align-right">{{ __('notes') }}</x-input-label>
            <div>
            <x-text-input name="notes" value="{{ $contact->notes }}"></x-text-input>
            <x-input-error :messages="$errors->get('notes')" class="mt-2" />
            </div>
        </div>
        <a href='/contacts'>
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