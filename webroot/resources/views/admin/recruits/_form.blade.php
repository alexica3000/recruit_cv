@php
    /** @var \App\Models\Recruit $recruit */
@endphp

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
            value="{{ $recruit->name }}"
        />
    </div>
    <div class="md:ml-2 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
            City
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="city"
            type="text"
            placeholder="City"
            name="city"
            value="{{ $recruit->city }}"
        />
    </div>
</div>

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Job
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border border-red-500 rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="job"
            type="text"
            placeholder="Job"
            name="job"
            value="{{ $recruit->job }}"
        />
        <p class="text-xs italic text-red-500">Please choose a password.</p>
    </div>
    <div class="md:ml-2 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
            Birth Date
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="birth_date"
            type="date"
            placeholder="Birth Date"
            name="birth_date"
            value="{{ old('birth_date', $recruit->birth_date ? $recruit->birth_date->format('Y-m-d') : '') }}"
        />
    </div>
</div>

<div class="mb-4 w-full">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Description
        </label>
        <textarea name="description" id="description" cols="75" rows="5">{{ $recruit->description }}</textarea>
    </div>
</div>

<div class="mb-6 text-center flex justify-center">
    <x-forms.submit-button text="{{ isset($recruit->id) ? 'Edit Recruit' : 'Add Recruit' }}" />
    <x-forms.cancel-button route="{{ route('recruits.index') }}" />
</div>
