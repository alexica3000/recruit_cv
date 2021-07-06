<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New User') }}
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
                        <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('users.store') }}" method="post">
                            @csrf
                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                        Name
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        type="text"
                                        placeholder="Name"
                                        name="name"
                                    />
                                </div>
                                <div class="md:ml-2 w-1/2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                                        Email
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="email"
                                        type="email"
                                        placeholder="Email"
                                        name="email"
                                    />
                                </div>
                            </div>

                            <div class="mb-4 md:flex md:justify-between">
                                <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                        Password
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="password"
                                        type="password"
                                        placeholder="******************"
                                        name="password"
                                    />
                                    <p class="text-xs italic text-red-500">Please choose a password.</p>
                                </div>
                                <div class="md:ml-2 w-1/2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                        Confirm Password
                                    </label>
                                    <input
                                        class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                        id="c_password"
                                        type="password"
                                        placeholder="******************"
                                        name="password_confirmation"
                                    />
                                </div>
                            </div>

                            <div class="mb-4 w-full">
                                <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
                                    <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                        Role
                                    </label>
                                    <select class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" name="role_id">
                                        <option>Choose a role</option>
                                        @foreach(\App\Models\User::ROLES as $key => $role)
                                            <option value="{{ $key }}">{{ $role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-6 text-center">
                                <button
                                    class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                    type="submit"
                                >
                                    Add Account
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
