<div>
    <table class="min-w-max w-full table-auto mt-4">
        <thead>
        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
            <th class="py-3 px-6 text-left">Id</th>
            <th class="py-3 px-6 text-left">Name</th>
            <th class="py-3 px-6 text-center">Email</th>
            <th class="py-3 px-6 text-center">Role</th>
            <th class="py-3 px-6 text-center">Created At</th>
            <th class="py-3 px-6 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @foreach($users as $user)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-3 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="mr-2">
                            {{ $user->id }}
                        </div>
                    </div>
                </td>
                <td class="py-3 px-6 text-left">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <span>{{ $user->name }}</span>
                        </div>
                    </div>
                </td>
                <td class="py-3 px-6">
                    <div>{{ $user->email }}</div>
                </td>
                <td class="py-3 px-6 text-center">
                    <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs">{{ $user->role }}</span>
                </td>
                <td class="py-3 px-6 text-center">
                    {{ $user->created_at->format('d.m.Y') }}
                </td>
                <td class="py-3 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <i class="fas fa-edit"></i>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
{{--                            <button wire:click="destroy({{$user}})"><i class="fas fa-trash-alt"></i></button>--}}
                            <button wire:click="$emit('showModal', {{$user->id}})"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
