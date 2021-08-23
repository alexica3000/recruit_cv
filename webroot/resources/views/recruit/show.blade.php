@php
 /** @var \App\Models\Recruit $recruit */
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Recruit - {{ $recruit->name }}
        </h2>
    </x-slot>

    <x-main-wrapper>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <img src="{{ $recruit->logoUrl }}" alt="{{ $recruit->name }}" class="rounded-full float-right" style="height: 150px; width: 150px;">
                </div>
                <div class="col-span-2">
                    <h1 class="ml-6 mt-11 text-5xl bold">{{ $recruit->name }}</h1>
                </div>
                <div>
                    <h1 class="text-4xl font-bold">About</h1>
                    <div>{{ $recruit->description }}</div>
                    <hr>
                    <h1 class="text-4xl font-bold mt-5">Skills</h1>
                    <div>
                        @if(count($recruit->qualificationsByType(\App\Models\Qualification::TYPE_SKILL)))
                            @foreach($recruit->qualificationsByType(\App\Models\Qualification::TYPE_SKILL) as $skill)
                                <div>{{ $skill->name }} - {{ $skill->short }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div>test</div>
                <div class="col-span-2">test2</div>
                <div>test2</div>
            </div>
    </x-main-wrapper>

</x-app-layout>
