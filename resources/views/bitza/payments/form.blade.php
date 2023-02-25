<form method="POST"
    action="@if ($action == 'create') {{ route('payments.store') }}@else{{ route('payments.update', ['payment' => $payment]) }} @endif">
    @csrf
    @if ($action == 'edit')
        @method('PUT')
    @endif
    <label for="date">{{ __('date') }}</label>
    <input name="date" id="date" type="date" class="{{ $classForInputText }}"
        value="@if ($action == 'create'){{ old('date') ? old('date') : trim(date('Y-m-d')) }}@else{{ $payment->date }} @endif" />
    <x-input-error :messages="$errors->get('date')" class="mt-2" />
    <label for="room1">{{ __('room') }}</label>
    <select name="room1" id="room1" class="{{ str_replace('w-full', '', $classForInputText) }}" onchange="fillr2()">
    <option>{{__('Select')}}</option>
    @foreach ($room1 as $r1)
        <option>{{ $r1->r1 }}</option>
    @endforeach
    </select>
    <select name="room2" id="room2" class="{{ str_replace('w-full', '', $classForInputText) }}"></select><br>
    <label for="amount">{{ __('amount') }}</label>
    <input name="amount" id="amount" type="number" class="{{ $classForInputText }}"
        value="@if ($action == 'create'){{ old('amount') ? old('amount') : '0' }}@else{{ $payment->amount }} @endif"
        onimput="javascript:countTotal()"/>
    <x-input-error :messages="$errors->get('amount')" class="mt-2" />
    <label for="discount">{{ __('discount') }}</label>
    <input name="discount" id="discount" type="number" class="{{ $classForInputText }}"
        value="@if ($action == 'create'){{ old('discount') ? old('discount') : '0' }}@else{{ $payment->discount }} @endif" />
    <x-input-error :messages="$errors->get('discount')" class="mt-2" />
    <label for="total">{{ __('total') }}</label>
    <input name="total" id="total" type="number" class="{{ $classForInputText }}"
        value="@if ($action == 'create'){{ old('total') ? old('total') : '0' }}@else{{ $payment->total }} @endif" />
    <x-input-error :messages="$errors->get('total')" class="mt-2" />
    <label for="bank_account">{{ __('account') }}</label>
    <input name="bank_account" id="bank_account" type="text" class="{{ $classForInputText }}"
        value="@if ($action == 'create'){{ old('bank_account') ? old('bank_account') : 'Нал' }}@else{{ $payment->bank_account }} @endif" />
    <x-input-error :messages="$errors->get('bank_account')" class="mt-2" />
    <input type="submit" class="{{ $classForInputButton }}" value="{{ __($action) }}" />

</form>
<script>
function removeOptions(selectElement) {
   const length = selectElement.options.length - 1;
   for(let i = length; i >= 0; i--) {
      selectElement.remove(i);
   }
}

const fillr2 = () => {
    room1 = document.getElementById('room1');
    r1 = room1.value;
    room2 = document.getElementById('room2');
    removeOptions(room2);
    
    const url = `/payments/r2`;
    ajax({
        url: url,
        method: "POST",
        responseType: "json",
        data: {r1: r1},
        success: (r2) => {
            console.log(r2);
            console.log(typeof r2);
            Object.values(r2).forEach ( val => {
                console.log (val);
                const opt = document.createElement('option');
                opt.text = val;
                room2.appendChild(opt)
            });
        }
    });
};

const countTotal = () => {
    amount = document.getElementById('amount');
    dicsount = document.getElementById('dicsount');
    total = amount.value - discount.value;
    document.getElementById('total').value = total;
};
document.getElementById('amount').addEventListener('input', () => {
    countTotal();
});
document.getElementById('discount').addEventListener('input', () => {
    countTotal();
});

</script>