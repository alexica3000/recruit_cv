@php
    /** @var \App\Models\Recruit $recruit */
    /** @var \App\Models\Experience $work */
@endphp

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
            Name
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
            type="text"
            placeholder="Name"
            name="name"
            value="{{ old('name', $recruit->name) }}"
        />
        <x-error-input inputName="name" />
    </div>
    <div class="md:ml-2 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
            City
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('city') border-red-500 @enderror"
            id="city"
            type="text"
            placeholder="City"
            name="city"
            value="{{ old('city', $recruit->city) }}"
        />
        <x-error-input inputName="city" />
    </div>
</div>

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Job
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('job') border-red-500 @enderror"
            id="job"
            type="text"
            placeholder="Job"
            name="job"
            value="{{ old('job', $recruit->job) }}"
        />
        <x-error-input inputName="job" />
    </div>
    <div class="md:ml-2 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
            Birth Date
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('birth_date') border-red-500 @enderror"
            id="birth_date"
            type="date"
            placeholder="Birth Date"
            name="birth_date"
            value="{{ old('birth_date', $recruit->birth_date ? $recruit->birth_date->format('Y-m-d') : '') }}"
        />
        <x-error-input inputName="birth_date" />
    </div>
</div>

<div class="mb-4 md:flex w-full">
    <div class="md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Description
        </label>
        <textarea name="description" id="description" cols="33" rows="5" class="@error('description') border-red-500 @enderror">{{ old('description', $recruit->description) }}</textarea>
        <x-error-input inputName="description" />
    </div>
    <div class="md:mr-2 md:mb-0 w-1/2">
        <x-logo :model="$recruit" />
        <x-error-input inputName="image" />
    </div>
</div>

<div class="mb-6 text-center flex justify-center">
    <x-forms.submit-button text="{{ isset($recruit->id) ? 'Save Recruit' : 'Add Recruit' }}" />
    <x-forms.cancel-button route="{{ route('recruits.index') }}" />
</div>
