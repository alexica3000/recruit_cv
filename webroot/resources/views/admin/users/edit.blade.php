<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="m-4 flex justify-center">

                    @if(session('errors'))
{{--                        @dd(session('errors'))--}}
                    @endif

                    <div class="w-full lg:w-8/12 bg-white rounded-lg lg:rounded-l-none">
                        <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('users.update', $user) }}" method="post">
                            @csrf
                            @method('put')
                            @include('admin.users._form', ['user' => $user])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
