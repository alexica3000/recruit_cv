<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>

    <x-main-wrapper>
        <x-forms.add-button route="{{ route('departments.create') }}" />
        <livewire:departments-list/>
        <x-modal />
    </x-main-wrapper>

</x-app-layout>
