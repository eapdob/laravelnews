<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('auth.delete_account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('auth.once_your_account_is_deleted') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('auth.delete_account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('auth.are_you_sure_you_want_to_delete') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('auth.once_your_account_is_deleted') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('auth.password_alt') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('auth.password_alt') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('auth.cancel') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('auth.delete_account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
