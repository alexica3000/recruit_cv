@php
    /** @var \App\Models\Experience $experience */
@endphp

<div x-data>
    <div
        class="fixed z-10 inset-0 overflow-y-auto {{ $showModal ? '' : 'hidden' }}"
        aria-labelledby="modal-title"
        role="dialog"
        aria-modal="true"
    >
        <div
            class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
            x-transition:enter="transition ease duration-100 transform"
            x-transition:enter-start="opacity-0 scale-90 translate-y-1"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease duration-100 transform"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-90 translate-y-1"
        >
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
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
                                wire:model="name"
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
                                wire:model="short"
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
                                wire:model="start"
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
                                wire:model="end"
                            />
                        </div>
                    </div>

                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0 w-1/2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                Description
                            </label>
                            <textarea wire:model="description" id="description" cols="33" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="submit"
                    >
                        Save
                    </button>
                    <button
                        type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                        wire:click="hideModal()"
                    >
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
