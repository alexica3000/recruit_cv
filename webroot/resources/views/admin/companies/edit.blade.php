<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <x-main-wrapper>
        <div class="flex justify-center">
            <div class="w-full lg:w-8/12 bg-white rounded-lg lg:rounded-l-none ">
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" action="{{ route('companies.update', $company) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('admin.companies._form', ['company' => $company])
                </form>
            </div>
        </div>
    </x-main-wrapper>

</x-app-layout>
