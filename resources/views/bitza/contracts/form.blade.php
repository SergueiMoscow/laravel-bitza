<form method="POST"
    action="@if ($action == 'create') {{ route('contracts.store') }}@else{{ route('contracts.update', ['contract' => $contract]) }} @endif">
    @csrf
    @if ($action == 'edit')
        @method('PUT')
    @endif
    <label for="date_begin">{{ __('date_begin') }}</label>
    <input name="date_begin" id="date_begin" type="date" class="{{ $classForInputText }}"
        value="@if ($action == 'create') {{ old('date_begin') }}@else{{ $contract->date_begin }} @endif" />
    <x-input-error :messages="$errors->get('date_begin')" class="mt-2" />
    <label for="date_end">{{ __('date_end') }}</label>
    <input name="date_end" id="date_end" type="date" class="{{ $classForInputText }}"
        value="@if ($action == 'create') {{ old('date_end') }}@else{{ $contract->date_end }} @endif" />
    <x-input-error :messages="$errors->get('date_end')" class="mt-2" />
    <label for="room">{{ __('room') }}</label>
    {{-- <input name="room" id="room" type="text" class="{{ $classForInputText }}"  value="@if ($action == 'create'){{ old('room') }}@else{{ $contact->room}}@endif"/> --}}
    {{-- {{ Form::select('room', array('3.02' => '3.02', '3.03' => '3.03'), '3.02');  }} --}}
    <select class="{{ $classForInputText }}">
        <option>3.01</option>
        <option>3.02</option>
    </select>
    <x-input-error :messages="$errors->get('room')" class="mt-2" />
    <label for="price">{{ __('price') }}</label>
    <input name="price" id="price" type="text" class="{{ $classForInputText }}"
        value="@if ($action == 'create') {{ old('price') }}@else{{ $contact->price }} @endif" />
    <x-input-error :messages="$errors->get('price')" class="mt-2" />
    <label for="paydate">{{ __('paydate') }}</label>
    <input name="paydate" id="paydate" type="text" class="{{ $classForInputText }}"
        value="@if ($action == 'create') {{ old('paydate') }}@else{{ $contact->paydate }} @endif" />
    <x-input-error :messages="$errors->get('paydate')" class="mt-2" />
    <label for="contact">{{ __('contact') }}</label>
    <input name="contact" id="contact" type="text" class="{{ $classForInputText }}" />
    <input name="contact_id" id="contact_id" type="hidden" />
    <div id="divListContacts"><select id="listContacts"></select></div>
    <x-input-error :messages="$errors->get('contact')" class="mt-2" />
    {{-- {{ Form::label('date_begin', 'Дата') }}
    {{ Form::text('date_begin') }} --}}

    <input type="submit" class="{{ $classForInputButton }}" value="{{ __($action) }}" />
</form>
<script>
    const contactInput = document.getElementById('contact');
    const autoCompleteDiv = document.getElementById('divListContacts');
    const autoCompleteList = document.getElementById('listContacts');
    const contact_id = document.getElementById('contact_id');
    autoCompleteList.onchange = () => {
        contactInput.value = autoCompleteList.selectedOptions[0].text;
        contact_id.value = autoCompleteList.value;
    };
    autoCompleteList.onblur = () => {
        autoCompleteList.size = 1;
        autoCompleteList.style.display = 'hidden';
    }
    const list = [];
    contactInput.addEventListener('keyup', (event) => {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '/contacts/list?q=' + event.srcElement.value, true);
        xhr.responseType = 'json';
        xhr.send();
        let counter = 0;
        xhr.onload = function() {
            //autoCompleteDiv.innerText = xhr.response;
            //console.log(xhr.response);
            var i, L = autoCompleteList.options.length - 1;
            for(i = L; i >= 0; i--) {
                autoCompleteList.remove(i);
            }
            for (item of xhr.response) {
                const opt = document.createElement('option');
                opt.value = item.id;
                opt.innerHTML = item.n;
                console.log(item);
                autoCompleteList.appendChild(opt);
                counter ++;
                if (counter > 10) {
                    break;
                }
            }
            autoCompleteList.style.display = 'block';
            autoCompleteList.size = 5;
        }
        //console.log(contactInput.value);

    });
</script>
