<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <x-main-wrapper>
        <x-forms.add-button route="{{ route('companies.create') }}" />
        <livewire:companies-list/>
        <x-modal />
    </x-main-wrapper>

</x-app-layout>
