@php
    /** @var \App\Models\Company $company */
@endphp

<div class="w-full flex">
    <div class="w-1/2">
        <h1 class="mb-3">Share with Company</h1>

        <select name="company" wire:model="selectedCompany">
            <option value="" hidden>Select Company</option>
            @if(isset($availableCompanies) && count($availableCompanies))
                @foreach($availableCompanies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="w-1/3">
        @if(isset($sharedCompanies) && count($sharedCompanies))
            @foreach($sharedCompanies as $company)
                <div class="border-b-2 relative">
                    {{ $company->name }}
                    <div class="absolute right-0 top-0">
                        <button type="button" wire:click="delete({{ $company->id }})"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
