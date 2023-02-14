<form method="POST" action="@if ($action == 'create'){{ route('contacts.store') }}@else{{ route('contacts.update', ['contact' => $contact]) }}@endif">
    @csrf
    @if ($action == 'edit') @method('PUT') @endif
    <label for="surname">{{ __('surname') }}</label>
    <input name="surname" id="surname" type="text" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('surname') }}@else{{ $contact->surname}}@endif"/>
    <label for="name">{{ __('name') }}</label>
    <input name="name" id="name" type="text" class="{{ $classForInputText }}"  value="@if ($action == 'create'){{ old('name') }}@else{{ $contact->name}}@endif"/>
    <label for="birth_date">{{ __('birth date') }}</label>
    <input name="birth_date" id="birth_date" type="date" class="{{ $classForInputText }}"  value="@if ($action == 'create'){{ old('birth_date') }}@else{{ $contact->birth_date}}@endif"/>
    <label for="birth_place">{{ __('birth place') }}</label>
    <input name="birth_place" id="birth_place" type="text" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('birth_place') }}@else{{ $contact->birth_place}}@endif"/>
    <label for="doc_series">{{ __('document number') }}</label>
    <input name="doc_series" id="doc_series" type="text" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('doc_series') }}@else{{ $contact->doc_series}}@endif"/>
    <input name="doc_number" id="doc_number" type="text" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('doc_number') }}@else{{ $contact->doc_number}}@endif"/>
    <label for="doc_date">{{ __('document issued') }}</label>
    <input name="doc_date" id="doc_date" type="text" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('doc_date') }}@else{{ $contact->doc_date }}@endif"/>
    <label for="phone">{{ __('phone') }}</label>
    <input name="phone" id="phone" type="text" class="{{ $classForInputText }}" />

    <input type="submit" class="{{ $classForInputButton }}" value="{{ __($action) }}" />
</form>