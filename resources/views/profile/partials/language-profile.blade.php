<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Language') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Select language") }}
        </p>
    </header>
    <form method="post" action="{{ route('profile.language') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="lang" :value="__('Language')" />
            <x-text-input id="lang" name="lang" type="text" class="mt-1 block w-full" :value="old('language', $user->lang)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-language')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
