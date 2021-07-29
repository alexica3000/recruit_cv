@php
  /** @var \App\Models\Experience $resource */
@endphp

<div>
    <div class="border-b border-bottom border-gray-300 mb-3 font-weight-bold">{{ $title ?? 'Experience' }}</div>
</div>

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
            Employer
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            type="text"
            placeholder="Name"
            name="{{ $field }}[name]"
            value="{{ $resource->name }}"
        />
    </div>
    <div class="md:ml-2 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
            Job
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            type="text"
            placeholder="Job"
            name="{{ $field }}[short]"
            value="{{ $resource->short }}"
        />
    </div>
</div>

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
            Start
        </label>
        <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            type="date"
            placeholder="Start"
            name="{{ $field }}[start]"
            value="{{ $resource->start ? $resource->start->format('Y-m-d') : '' }}"
        />
    </div>
    <div class="md:ml-2 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
            End On
        </label>
        <input
            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            type="date"
            placeholder="End On"
            name="{{ $field }}[end]"
            value="{{ $resource->end ? $resource->end->format('Y-m-d') : '' }}"
        />
    </div>
</div>

<div class="mb-4 md:flex md:justify-between">
    <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
        <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
            Description
        </label>
        <textarea name="{{ $field }}[description]" id="description" cols="33" rows="5">{{ $resource->description }}</textarea>
    </div>
</div>
