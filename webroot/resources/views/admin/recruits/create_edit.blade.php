@php
 /** @var \App\Models\Recruit $recruit */
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($recruit) ? __('Edit Recruit') : __('Add New Recruit') }}
        </h2>
    </x-slot>

    <x-main-wrapper>
        <div class="flex justify-center">
            <div class="w-full lg:w-8/12 bg-white rounded-lg lg:rounded-l-none">
                @if(isset($recruit))
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('recruits.update', $recruit) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('admin.recruits._form', ['recruit' => $recruit])
                    </form>
                @else
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('recruits.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.recruits._form', ['recruit' => new \App\Models\Recruit()])
                    </form>
                @endif
            </div>
        </div>

        @if(isset($recruit))
            @livewire('client-recruits', ['recruit' => $recruit])

            @livewire('experience.experiences-list-work', [
                'title' => 'Work Experience',
                'experiences' => $recruit->works,
                'field_name' => 'Employer',
                'field_short' => 'Job',
                'recruit' => $recruit,
            ])

            @livewire('experience.experiences-list-education', [
                'title' => 'Education',
                'experiences' => $recruit->educations,
                'field_name' => 'Institute',
                'field_short' => 'Education',
                'recruit' => $recruit,
            ])

            @livewire('experience.experiences-list-course', [
                'title' => 'Course or Training',
                'experiences' => $recruit->courses,
                'field_name' => 'Institute',
                'field_short' => 'Course or Training',
                'recruit' => $recruit,
            ])

            <div class="border border-1 border-gray-300 m-4"></div>

            <div class="w-full flex">
                <div class="w-1/2 inline-flex">
                    @livewire('qualification.qualifications-list-skill', ['recruit' => $recruit])
                </div>
                <div class="w-1/2 inline-flex">
                    @livewire('qualification.qualifications-list-characteristics', ['recruit' => $recruit])
                </div>
            </div>

            <div class="w-full flex">
                <div class="w-1/2 inline-flex">
                    @livewire('qualification.qualifications-list-social', ['recruit' => $recruit])
                </div>
                <div class="w-1/2 inline-flex">
                    @livewire('qualification.qualifications-list-interest', ['recruit' => $recruit])
                </div>
            </div>

            @livewire('experience.modal-experience-form')
            @livewire('qualification.form')
        @endif
    </x-main-wrapper>

</x-app-layout>
