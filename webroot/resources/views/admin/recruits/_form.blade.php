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

<div class="mb-4 md:flex w-full">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Description
        </label>
        <textarea name="description" id="description" cols="33" rows="5">{{ $recruit->description }}</textarea>
    </div>
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="px-4 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white">
            <i class="fas fa-cloud-upload-alt"></i>
            <span class="mt-2 text-base leading-normal">Select a file</span>
            <input type='file' class="hidden" name="image" />
        </label>
        @if($recruit->logo)
            <div class="w-1/4">
                <img src="{{ $recruit->logoUrl }}" alt="">
            </div>
        @endif
    </div>
</div>

@include('admin.recruits._experience', ['title' => 'Work Experience', 'resource' => $recruit->work(), 'field' => 'work'])
@include('admin.recruits._experience', ['title' => 'Education', 'resource' => $recruit->education(), 'field' => 'education'])
@include('admin.recruits._experience', ['title' => 'Course or Training', 'resource' => $recruit->course(), 'field' => 'course'])

<hr class="border border-gray-300 my-4">

<div class="mb-6 text-center flex justify-center">
    <x-forms.submit-button text="{{ isset($recruit->id) ? 'Edit Recruit' : 'Add Recruit' }}" />
    <x-forms.cancel-button route="{{ route('recruits.index') }}" />
</div>
