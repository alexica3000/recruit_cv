@php /** @var \App\Models\Company $company */ @endphp

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
            value="{{ old('name', $company->name) }}"
        />
        <x-error-input inputName="name" />
    </div>
</div>

<div class="mb-4 w-full flex">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <x-logo :model="$company" />
        <x-error-input inputName="image" />
    </div>
</div>

<div class="flex mb-6 text-center justify-center">
    <x-forms.submit-button text="{{ isset($company->id) ? 'Save Company' : 'Add Company' }}" />
    <x-forms.cancel-button route="{{ route('companies.index') }}" />
</div>
