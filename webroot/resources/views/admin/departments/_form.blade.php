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
            value="{{ $department->name }}"
        />
    </div>
</div>

<div class="mb-4 w-full">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
{{--        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">--}}
{{--            Role--}}
{{--        </label>--}}
{{--        <select class="border border-gray-300 text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none rounded" name="role_id">--}}
{{--            <option>Choose a role</option>--}}
{{--            @foreach(\App\Models\User::ROLES as $key => $role)--}}
{{--                <option value="{{ $key }}" {{ $key == $user->role_id ? 'selected' : '' }}>{{ $role }}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
    </div>
</div>

<div class="flex mb-6 text-center justify-center">
    <x-forms.submit-button text="{{ isset($department->id) ? 'Edit Department' : 'Add Department' }}" />
    <x-forms.cancel-button route="{{ route('departments.index') }}" />
</div>
