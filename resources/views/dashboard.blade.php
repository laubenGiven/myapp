<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Patient Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-3">
            <div class="bg-white overflow-hidden shadow-xl md:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
