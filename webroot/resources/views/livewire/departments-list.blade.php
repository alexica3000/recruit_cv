<div>
    <div class="mb-4 md:mr-2 md:mb-0">
        <input
            class="px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            type="text"
            placeholder="Search"
            name="search"
            wire:model.debounce.500ms="search"
        />
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
        @foreach($departments as $department)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-2 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="mr-2">
                            {{ $department->id }}
                        </div>
                    </div>
                </td>
                <td class="py-2 px-6 text-left">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <span>{{ $department->name }}</span>
                        </div>
                    </div>
                </td>
                <td class="py-2 px-6 text-center">
                    {{ $department->created_at->format('d.m.Y') }}
                </td>
                <td class="py-2 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="{{ route('departments.edit', $department) }}"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" x-data="{}">
                            <button id="del_user_{{ $department->id }}" wire:click="destroy({{$department->id}})"></button>
                            <button
                                type="button"
                                @click="$dispatch('dispatchdeletemodal', {title: '{{ addslashes($department->name) }}', form_id: 'del_user_{{ $department->id }}'})"
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
</div>
