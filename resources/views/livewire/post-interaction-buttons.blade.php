<div class="footer divide-y text-sm -mb-1"
     x-cloak x-data="{ show: false}" 
    >

    <!-- Empty div just to trigger divide-y style -->
    <div class="flex items-center">
        @if($count)
            <i class="fas fa-thumbs-up fa-sm mr-2 text-blue-400"></i>
            <h4 class="text-gray-500 text-sm">{{ $count }}</h4>
        @endif

        <div class="ml-auto">
            @if($comments->count())
                <button wire:click="loadComments" type="button">{{ $comments->count() }} {{ $commentLabel }}</button>
            @endif
        </div>
        
    </div>

    <div class="flex justify-around py-1 mt-4">
            <button 
                wire:click="storeLike"
                class="hover:text-dark " 
                type="button">
                <i class="fas fa-thumbs-up {{ $isLiked ? 'text-blue-400' : '' }}"></i> 
                Like
            </button>

            
            <div @click="show = ! show">
                <button 
                    class="hover:text-dark" 
                    type="button">
                    <i class="fas fa-comment"></i> 
                    Comment
                </button>
            </div>

        <button 
            class="hover:text-dark" 
            type="button">
            <i class="fas fa-share"></i> 
            Share
        </button>
    </div>

    <!-- Comment area -->

        <div x-show="show">
            <div class="flex items-center">
                <img class="rounded-3xl mr-2" src="{{ asset('storage/' . auth()->user()->photo)}}" alt="" width="45" height="45">
                <form wire:submit.prevent="storeComment" action="" method="post">
                    <input wire:model.defer="comment" type="text" class="rounded-lg mt-3 mb-3 w-96 border-gray-200" name="" id="" cols="54" rows="2" placeholder="comment here"></input>
                </form>
            </div>
            
 
            @foreach($comments as $comment)

                <div class="header flex items-start mb-7 mt-3">
                    <img class="rounded-3xl mr-2" src="{{ asset('storage/' . $comment->user->photo)}}"  alt="" width="45" height="45">
                    <div class="flex-col w-2/3">
                        <div class="flex flex-col bg-gray-100 px-3 py-2 rounded-xl">
                            <!-- Post name -->
                            <h2 class="font-bold">{{ $comment->name }}</h2>
                            <!-- Body of the post -->
                            <div class="body text-sm">
                                {{ $comment->comment }}
                            </div>
                            
                        </div>
                        <div class="flex justify-around ml-2 absolute">
                            <button 
                                class="hover:text-dark text-xs mr-2" 
                                type="button">
                                Like
                            </button>
                            <button 
                                class="hover:text-dark text-xs" 
                                type="button">
                                Reply
                            </button>
                        </div>
                    </div>
                </div>
    
            @endforeach
            
        </div>
 
</div>