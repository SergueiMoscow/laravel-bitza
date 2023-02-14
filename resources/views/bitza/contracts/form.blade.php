<form method="POST" action="@if ($action == 'create'){{ route('contacts.store') }}@else{{ route('contacts.update', ['contact' => $contact]) }}@endif">
    @csrf
    @if ($action == 'edit') @method('PUT') @endif
    <label for="date_begin">{{ __('date_begin') }}</label>
    <input name="date_begin" id="date_begin" type="date" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('date_begin') }}@else{{ $contract->date_begin}}@endif"/>
    <label for="date_end">{{ __('date_end') }}</label>
    <input name="date_end" id="date_end" type="date" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('date_end') }}@else{{ $contract->date_end}}@endif"/>
    <label for="room">{{ __('room') }}</label>
    <input name="room" id="room" type="text" class="{{ $classForInputText }}"  value="@if ($action == 'create'){{ old('room') }}@else{{ $contact->room}}@endif"/>
    <label for="price">{{ __('price') }}</label>
    <input name="price" id="price" type="text" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('price') }}@else{{ $contact->price}}@endif"/>
    <label for="paydate">{{ __('paydate') }}</label>
    <input name="paydate" id="paydate" type="text" class="{{ $classForInputText }}" value="@if ($action == 'create'){{ old('paydate') }}@else{{ $contact->paydate}}@endif"/>
    <label for="contact">{{ __('contact') }}</label>
    <input name="contact" id="contact" type="text" class="{{ $classForInputText }}" />
    {{ Form::label('date_begin', 'Дата') }}
    {{ Form::text('date_begin') }}

    <input type="submit" class="{{ $classForInputButton }}" value="{{ __($action) }}" />
</form>