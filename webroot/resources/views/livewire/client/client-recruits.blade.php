@php
    /** @var \App\Models\Recruit $recruit */
@endphp

<div>
    <div class="mb-4 md:mr-2 md:mb-0">
        <x-search />
    </div>

    @if(count($recruits))
        <table class="min-w-max w-full table-auto mt-4">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-2 px-6 text-left">Id</th>
                <th class="py-2 px-6 text-left">Name</th>
                <th class="py-2 px-6 text-center">City</th>
                <th class="py-2 px-6 text-center">Job</th>
                <th class="py-2 px-6 text-center">Birth Date</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            @foreach($recruits as $recruit)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-2 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="mr-2">
                                {{ $recruit->id }}
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-left">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <img src="{{ $recruit->logoUrl }}" alt="" class="h-7 w-7 rounded-full inline-block">
                                <span class="ml-2">
                                    <a href="{{ route('recruit', $recruit) }}">{{ $recruit->name }}</a>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $recruit->city }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $recruit->job }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        @if($recruit->birth_date)
                            <div class="flex items-center">
                                <div class="mr-2">
                                    <span class="ml-2">{{ $recruit->birth_date->format('d.m.Y') }}</span>
                                </div>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <div class="mt-5">
        {{ $recruits->links() }}
    </div>
</div>
