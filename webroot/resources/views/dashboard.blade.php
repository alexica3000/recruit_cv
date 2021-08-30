<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <x-main-wrapper>
        <div class="flex justify-center">
            <div class="mb-5 w-full lg:w-8/12 bg-white rounded-lg lg:rounded-l-none ">
                <div class="mt-8 text-2xl">
                    Welcome, {{ auth()->user()->name }}
                </div>

                <div class="mt-6 text-gray-500">
                    <div>
                        <strong>Total users:</strong> {{ $totalUsers }}
                    </div>
                    <div>
                        <strong>Total companies:</strong> {{ $totalCompanies }}
                    </div>
                    <div>
                        <strong>Total recruits:</strong> {{ $totalRecruits }}
                    </div>
                </div>
            </div>
        </div>
    </x-main-wrapper>
</x-app-layout>
