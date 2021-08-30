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
                    <h1 class="text-4xl font-bold underline">About</h1>
                    <div>{{ $recruit->description }}</div>

                    <h1 class="text-4xl font-bold mt-5 underline">Social</h1>
                    <div class="mt-3">
                        @if(count($recruit->qualificationsByType(\App\Models\Qualification::TYPE_SOCIAL)))
                            @foreach($recruit->qualificationsByType(\App\Models\Qualification::TYPE_SOCIAL) as $social)
                                <div>{{ $social->name }} - {{ $social->short }}</div>
                            @endforeach
                        @endif
                    </div>
                    <h1 class="text-4xl font-bold mt-5 underline">Skills</h1>
                    <div class="mt-3">
                        @if(count($recruit->qualificationsByType(\App\Models\Qualification::TYPE_SKILL)))
                            @foreach($recruit->qualificationsByType(\App\Models\Qualification::TYPE_SKILL) as $skill)
                                <div>{{ $skill->name }} - {{ $skill->short }}</div>
                            @endforeach
                        @endif
                    </div>
                    <h1 class="text-4xl font-bold mt-5 underline">Characteristics</h1>
                    <div class="mt-3">
                        @if(count($recruit->qualificationsByType(\App\Models\Qualification::TYPE_CHARACTERISTIC)))
                            @foreach($recruit->qualificationsByType(\App\Models\Qualification::TYPE_CHARACTERISTIC) as $char)
                                <div>{{ $char->name }} - {{ $char->short }}</div>
                            @endforeach
                        @endif
                    </div>
                    <h1 class="text-4xl font-bold mt-5 underline">Interests</h1>
                    <div class="mt-3">
                        @if(count($recruit->qualificationsByType(\App\Models\Qualification::TYPE_INTEREST)))
                            @foreach($recruit->qualificationsByType(\App\Models\Qualification::TYPE_INTEREST) as $int)
                                <div>{{ $int->name }} - {{ $int->short }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-span-2">
                    <h1 class=" text-4xl font-bold underline mt-5">Work Experience</h1>
                    <div class="mt-3">
                        @if(count($recruit->works))
                            @foreach($recruit->works as $work)
                                <div>{{ $work->name }} - {{ $work->short }}</div>
                                <div class="underline italic">Description</div>
                                <div>{{ $work->description }}</div>
                            @endforeach
                        @endif
                    </div>
                    <h1 class="text-4xl font-bold underline mt-5">Education</h1>
                    <div class="mt-3">
                        @if(count($recruit->educations))
                            @foreach($recruit->educations as $education)
                                <div>{{ $education->name }} - {{ $education->short }}</div>
                                <div>{{ $work->description }}</div>
                                <div class="underline italic">Description</div>
                                <div>{{ $work->description }}</div>
                            @endforeach
                        @endif
                    </div>
                    <h1 class="text-4xl font-bold underline mt-5">Courses or training</h1>
                    <div class="mt-3">
                        @if(count($recruit->courses))
                            @foreach($recruit->courses as $course)
                                <div>{{ $course->name }} - {{ $course->short }}</div>
                                <div>{{ $work->description }}</div>
                                <div class="underline italic">Description</div>
                                <div>{{ $work->description }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
    </x-main-wrapper>

</x-app-layout>
