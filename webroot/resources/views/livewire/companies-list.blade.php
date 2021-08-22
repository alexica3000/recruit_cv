<div>
    @php /** @var \App\Models\Company $company */ @endphp
    <div class="mb-4 md:mr-2 md:mb-0">
        <x-search />
    </div>

    <table class="min-w-max w-full table-auto mt-4">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-2 px-6 text-left">Id</th>
            <th class="py-2 px-6 text-left">Name</th>
            <th class="py-2 px-6 text-center">Created At</th>
            <th class="py-2 px-6 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">

        @foreach($companies as $company)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-2 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="mr-2">
                            {{ $company->id }}
                        </div>
                    </div>
                </td>
                <td class="py-2 px-6 text-left">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <img src="{{ $company->logoUrl }}" alt="" class="h-7 w-7 rounded-full inline-block">
                            <span class="ml-2">{{ $company->name }}</span>
                        </div>
                    </div>
                </td>
                <td class="py-2 px-6 text-center">
                    {{ $company->created_at->format('d.m.Y') }}
                </td>
                <td class="py-2 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="{{ route('companies.edit', $company) }}"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" x-data="{}">
                            <button id="del_company_{{ $company->id }}" wire:click="destroy({{$company->id}})"></button>
                            <button
                                type="button"
                                @click="$dispatch('dispatchdeletemodal', {title: '{{ $company->slashedName }}', form_id: 'del_company_{{ $company->id }}'})"
                            >
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $companies->links() }}
    </div>
</div>
