<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <x-main-wrapper>
        <div class="text-right">
            <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-6 py-1 rounded font-medium hover:bg-blue-600 transition duration-200 each-in-out small">Add</a>
        </div>

        <livewire:users-list/>
        <x-modal />
    </x-main-wrapper>

</x-app-layout>
