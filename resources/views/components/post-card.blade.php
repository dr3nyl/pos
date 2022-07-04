@props(['post'])

<div class="py-2 flex items-center justify-center">
    <div class="sm:px-6 lg:px-8 w-2/5">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="header flex items-center mb-4">
                    <img class="rounded-3xl mr-2" src="{{ asset('images/clown_teyvat.jpg') }}" alt="" width="50" height="50">
                    <div class="flex flex-col">
                        <h2>{{ $post->user->name }}</h2>
                        <p class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="ml-auto mb-5">x</div>
                </div>
                <div class="body mb-7 text-sm">
                    {{ $post->body }}
                </div>

                <div class="footer border-b-2 border-t-2 text-sm">
                    <div class="flex justify-around py-1">
                        <div>Like</div>
                        <div>Comment</div>
                        <div>Share</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>