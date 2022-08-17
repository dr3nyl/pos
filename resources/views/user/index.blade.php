<x-app-layout>
    <x-slot name="header">
        <h2 class="flex justify-center font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Activity Feed') }}
        </h2>
    </x-slot>
    <!-- Create post textfield and wall posts -->
    <livewire:create-posts />
    <!-- Display wall post -->
    <livewire:post-section />

    @auth
        <script type="text/javascript">
            window.onscroll = function(ev) {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
            window.livewire.emit('load-more');
            }
            };
        </script>
    @endauth

</x-app-layout>