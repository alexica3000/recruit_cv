@php
    /** @var \App\Models\Company $company */
    /** @var \App\Models\User $user */
@endphp

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
            Name
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror "
            type="text"
            placeholder="Name"
            name="name"
            value="{{ old('name', $user->name) }}"
        />
        @error('name')
            <div class="text-xs italic text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="md:ml-2 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
            Email
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
            id="email"
            type="email"
            placeholder="Email"
            name="email"
            value="{{ old('email', $user->email) }}"
        />
        @error('email')
            <div class="text-xs italic text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Password
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="password"
            type="password"
            placeholder="******************"
            name="password"
        />
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

<div class="mb-4 md:flex md:justify-between" x-data="handleRole">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Role
        </label>
        <select
            class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none rounded @error('role_id') border-red-500 @enderror"
            name="role_id"
            @change="selectRole"
        >
            <option value="">Choose a role</option>
            @foreach(\App\Models\User::ROLES as $key => $role)
                <option value="{{ $key }}" {{ ($key == $user->role_id || $key == old('role_id')) ? 'selected' : '' }}>{{ $role }}</option>
            @endforeach
        </select>
        @error('role_id')
            <div class="text-xs italic text-red-500 mt-2">{{ $message }}</div>
        @enderror
        @error('company')
            <div class="text-xs italic text-red-500 mt-2">{{ $message }}</div>
        @enderror
    </div>
    <div class="md:ml-2 w-1/2 {{ $user->role_id == \App\Models\User::ROLE_CLIENT ? '' : 'hidden' }}" id="choose_company">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="c_company">
            Choose Company
        </label>
        <select name="company" id="company" class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none rounded">
            <option value="" hidden>Please Select</option>
            @if(isset($companies) && count($companies))
                @foreach($companies as $company)
                    <option value="{{ $company->id }}" {{ $company->id == $user->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="mb-6 text-center flex justify-center">
    <x-forms.submit-button text="{{ isset($user->id) ? 'Edit User' : 'Add User' }}" />
    <x-forms.cancel-button route="{{ route('users.index') }}" />
</div>

<script>
    function handleRole() {
        return {
            selectRole: function(e) {
                const roleId = e.target.value;
                const clientId = '{{ \App\Models\User::ROLE_CLIENT }}';

                if (roleId === clientId) {
                    document.getElementById('choose_company').classList.remove('hidden');
                } else {
                    document.getElementById('choose_company').classList.add('hidden');
                }
            }
        }
    }
</script>
