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
            value="{{ $user->name }}"
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
            value="{{ $user->email }}"
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
        <select class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none rounded" name="role_id">
            <option>Choose a role</option>
            @foreach(\App\Models\User::ROLES as $key => $role)
                <option value="{{ $key }}" {{ $key == $user->role_id ? 'selected' : '' }}>{{ $role }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="mb-6 text-center flex justify-center">
    <x-forms.submit-button text="{{ isset($user->id) ? 'Edit User' : 'Add User' }}" />
    <x-forms.cancel-button route="{{ route('users.index') }}" />
</div>
