<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('User Management') }} --}}
            @lang('User Management')
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 bg-white my-10 rounded shadow">
            <div class="py-4">
                {{ $users->links() }}
            </div>
            <table class="w-full">
                <tr>
                    <th class="border p-4">Name</th>
                    <th class="border p-4">E-mail</th>
                    <th class="border p-4">Actions</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td class="border p-4">{{ $user->name }}</td>
                        <td class="border p-4">{{ $user->email }}</td>
                        <td class="border p-4">
                            <a href="{{ route('users.show', $user) }}">
                                Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="py-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
