<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Recruits') }}
        </h2>
    </x-slot>

    <x-main-wrapper>
        @livewire('client.client-recruits')
    </x-main-wrapper>

</x-app-layout>
