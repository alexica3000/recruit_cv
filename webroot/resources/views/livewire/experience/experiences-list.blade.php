@php
    /** @var \App\Models\Experience $experience */
@endphp

<div>
    <div class="mt-4">
        {{ $title ?? '' }}
    </div>

    @if(isset($experiences) && count($experiences))
        <table class="min-w-max w-full table-auto mt-4">
            <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-2 px-6 text-left">Id</th>
                <th class="py-2 px-6 text-left">{{ $field_name }}</th>
                <th class="py-2 px-6 text-center">{{ $field_short }}</th>
                <th class="py-2 px-6 text-center">{{ $field_start ?? 'Start' }}</th>
                <th class="py-2 px-6 text-center">{{ $field_end ?? 'End' }}</th>
                <th class="py-2 px-6 text-center">{{ $field_description ?? 'Description' }}</th>
                <th class="py-2 px-6 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            @foreach($experiences as $experience)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-2 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="mr-2">
                                {{ $experience->id }}
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-left">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $experience->name }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $experience->short }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $experience->start ? $experience->start->format('d.m.Y') : '' }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $experience->end ? $experience->end->format('d.m.Y') : '' }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex items-center">
                            <div class="mr-2">
                                <span class="ml-2">{{ $experience->description }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="py-2 px-6 text-center">
                        <div class="flex item-center justify-center">
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                <button wire:click="$emit('editExperience')"><i class="fas fa-edit"></i></button>
                            </div>
                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" x-data="{}">
{{--                                <button id="del_recruit_{{ $recruit->id }}" wire:click="destroy({{$recruit->id}})"></button>--}}
{{--                                <button--}}
{{--                                    type="button"--}}
{{--                                    @click="$dispatch('dispatchdeletemodal', {title: '{{ $recruit->slashedName }}', form_id: 'del_recruit_{{ $recruit->id }}'})"--}}
{{--                                >--}}
{{--                                    <i class="fas fa-trash-alt"></i>--}}
{{--                                </button>--}}
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

{{--    @include('components.modal-experience-form')--}}
</div>
