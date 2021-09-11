<div>
    <div class="mb-4 md:mr-2 md:mb-0">
        <x-search />

        <select
            class="text-sm text-gray-600 pl-5 pr-10 ml-2 bg-white hover:border-gray-400 focus:outline-none appearance-none border rounded leading-tight"
            wire:model="roleId"
        >
            <option value="">Choose a role</option>
            @foreach(\App\Models\User::ROLES as $key => $role)
                <option value="{{ $key }}">{{ $role }}</option>
            @endforeach
        </select>

        <select
            class="text-sm text-gray-600 pl-5 pr-10 ml-2 bg-white hover:border-gray-400 focus:outline-none appearance-none border rounded leading-tight"
            wire:model="companyId"
        >
            <option value="">Choose a companies</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>

        <button
            type="button"
            class="text-sm text-gray-800 bg-gray-300 py-2 px-8 ml-2 rounded hover:bg-gray-600 hover:text-gray-100"
            wire:click="clear"
        >Clear</button>
        <x-tooltip>Please, click to Clear button to reset the Search</x-tooltip>
    </div>

    <table class="min-w-max w-full table-auto mt-4">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-2 px-6 text-left">Id</th>
                <th class="py-2 px-6 text-left">Name</th>
                <th class="py-2 px-6 text-center">Email</th>
                <th class="py-2 px-6 text-center">Company</th>
                <th class="py-2 px-6 text-center">Role</th>
                <th class="py-2 px-6 text-center">Created At</th>
                <th class="py-2 px-6 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
        @php /** @var \App\Models\User $user */ @endphp
        @foreach($users as $user)
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                <td class="py-2 px-6 text-left whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="mr-2">
                            {{ $user->id }}
                        </div>
                    </div>
                </td>
                <td class="py-2 px-6 text-left">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <span>{{ $user->name }}</span>
                        </div>
                    </div>
                </td>
                <td class="py-2 px-6">
                    <div>{{ $user->email }}</div>
                </td>
                <td class="py-2 px-6">
                    <div>{{ $user->company?->name }}</div>
                </td>
                <td class="py-2 px-6 text-center">
                    <span class="bg-gray-200 text-gray-600 py-1 px-3 rounded-full text-xs">{{ $user->role }}</span>
                </td>
                <td class="py-2 px-6 text-center">
                    {{ $user->created_at->format('d.m.Y') }}
                </td>
                <td class="py-2 px-6 text-center">
                    <div class="flex item-center justify-center">
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                            <a href="{{ route('users.edit', $user) }}"><i class="fas fa-edit"></i></a>
                        </div>
                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110" x-data="{}">
                            <button id="del_user_{{ $user->id }}" wire:click="destroy({{$user->id}})"></button>
                            <button
                                type="button"
                                @click="$dispatch('dispatchdeletemodal', {title: '{{ $user->slashesName }}', form_id: 'del_user_{{ $user->id }}'})"
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
        {{ $users->links() }}
    </div>
</div>
