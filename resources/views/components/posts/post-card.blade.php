@props(['post'])

<div class="py-2 flex items-center justify-center {{ auth()->user() ? '' : 'mt-3' }}">
    <div class="bg-white border-b border-gray-200 px-6 py-3 w-1/3 break-all">
        <div class="header flex items-center mb-4">
            <img class="rounded-3xl mr-2" src="{{ asset('storage/' . $post->user->photo)}}" alt="" width="50" height="50">
            <div class="flex flex-col">
                <!-- Post name -->
                <h2>{{ $post->user->name }}</h2>
                <!-- Date posted -->
                <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            <!-- ... button -->
            <x-posts.post-kebab-menu :post="$post"/>
            
        </div>
        <!-- Body of the post -->
        <div class="body mb-10 text-sm">
            {{ $post->body }}
        </div>
        <!-- Like, Comment, and Share buttons -->
        @auth

            <livewire:post-interaction-buttons :post="$post" :wire:key="$post->id"/>
            
        @else
            <h2 class="italic text-blue-400 text-xs">Sign up and react to this post!</h2>
        @endauth
    </div>
</div>