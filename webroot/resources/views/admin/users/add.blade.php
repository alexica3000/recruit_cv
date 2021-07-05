<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-4">
                    <div class="text-right">
                        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-6 py-1 rounded font-medium hover:bg-blue-600 transition duration-200 each-in-out small">Add</a>
                        <button type="button" class="bg-red-500 text-white px-6 py-1 rounded font-medium hover:bg-red-600 transition duration-200 each-in-out small">Delete</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
