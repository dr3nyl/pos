<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-center font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Activity Feed') }}
        </h2>
    </x-slot>
    <!-- Create post textfield and wall posts -->
    <livewire:create-posts />
    <!-- Display wall post -->
    <livewire:post-section :posts="$posts"  />
</x-app-layout>