<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-center font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Activity Feed') }}
        </h2>
    </x-slot>

    <livewire:create-posts :posts="$posts" />
    
    <!-- <livewire:post-section /> -->

</x-app-layout>