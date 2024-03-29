@php
    /** @var \App\Models\Qualification $qualification */
@endphp

<div>
    <div class="mt-4">
        <button wire:click="create"><i class="fas fa-plus-circle"></i></button>
        {{ $title ?? '' }}
    </div>

    @if(isset($qualifications) && count($qualifications))
        <table class="min-w-max w-full table-auto mt-4">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-2 px-6 text-left">Id</th>
                <th class="py-2 px-6 text-left">{{ $fieldName }}</th>
                <th class="py-2 px-6 text-center">{{ $fieldShort }}</th>
                <th class="py-2 px-6 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            @foreach($qualifications as $qualification)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-2 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="mr-2">
                                {{ $qualification->id }}
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-left">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $qualification->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $qualification->short }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <button wire:click="$emit('editQualification', {{ $qualification }})"><i class="fas fa-edit"></i></button>
                            </div>
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" x-data="{}">
                                <button wire:click="delete({{$qualification->id}})"><i class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

</div>
