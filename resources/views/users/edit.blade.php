<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @lang('New User')
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white my-10 rounded shadow">
            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('users.update', $user) }}">
                @csrf @method('PUT')

                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)"
                        required autofocus autocomplete="name" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        @lang('Update User')
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
