@props(['post'])
<div class="py-2 flex items-center justify-center">
    <div class="sm:px-6 lg:px-8 w-2/5">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200 px-6 py-3">
                <div class="header flex items-center mb-4">
                    <img class="rounded-3xl mr-2" src="{{ asset('images/clown_teyvat.jpg') }}" alt="" width="50" height="50">
                    <div class="flex flex-col">
                        <h2>{{ $post->user->name }}</h2>
                        <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    
                    <x-posts.post-kebab-menu :post="$post"/>
                    
                </div>
                <div class="body mb-10 text-sm">
                    {{ $post->body }}
                </div>

                <!-- Like, Comment, and Share buttons -->
                <livewire:post-interaction-buttons :post="$post"/>
                
            </div>
        </div>
    </div>
</div>