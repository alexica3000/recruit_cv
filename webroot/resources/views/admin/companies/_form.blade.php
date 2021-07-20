@php /** @var \App\Models\Company $company */ @endphp

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
            value="{{ $company->name }}"
        />
    </div>
</div>

<div class="mb-4 w-full flex">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
            Image
        </label>
        <label class="px-4 py-2 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-600 hover:text-white">
            <i class="fas fa-cloud-upload-alt"></i>
            <span class="mt-2 text-base leading-normal">Select a file</span>
            <input type='file' class="hidden" name="image" />
        </label>
    </div>
    @if($company->logo)
        <div class="w-1/4">
            <img src="{{ $company->logoUrl }}" alt="">
        </div>
    @endif
</div>

<div class="flex mb-6 text-center justify-center">
    <x-forms.submit-button text="{{ isset($company->id) ? 'Edit Company' : 'Add Company' }}" />
    <x-forms.cancel-button route="{{ route('companies.index') }}" />
</div>
