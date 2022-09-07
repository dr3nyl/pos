@props(['post', 'userId'])

<x-card outerDivAttribute="py-2 {{ auth()->user() ? '' : 'mt-3' }}" innerDivAttribute="px-6 py-3 break-all {{ $userId ? 'w-full' : 'w-96 lg:w-1/3' }}">
    <div class="header flex items-center mb-4">
        <a href="/profile/{{ $post->user->email }}" class="">
            <img class="rounded-3xl mr-2 hover:border hover:border-gray-100" src="{{ asset('storage/' . $post->user->photo)}}" alt="" width="50" height="50">
        </a>
        <div class="flex flex-col">
            <!-- Post name -->
            <h2>{{ $post->user->name }}</h2>
            <!-- Date posted -->
            <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
        </div>
        <!-- ... button -->
        @if(Auth::check() && $post->user->id == auth()->id())
        <x-posts.post-kebab-menu :post="$post"/>
        @endif
        
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
</x-card>