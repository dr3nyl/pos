<div class="footer divide-y text-sm -mb-1"
     x-cloak x-data="{ show: false}" 
     @click.away="show = false">

    <!-- Empty div just to trigger divide-y style -->
    <div class="flex items-center">
        @if($count)
            <i class="fas fa-thumbs-up fa-sm mr-2 text-blue-400"></i>
            <h4 class="text-gray-500 text-sm">{{ $count }}</h4>
        @endif
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

    <div x-show="show">
        <form  wire:submit.prevent="storeComment" action="" method="post">
            <input type="text" class="rounded-lg mt-3 mb-3 w-full border-gray-200" name="" id="" cols="54" rows="2" placeholder="comment here"></input>
        </form>
    </div>
   
</div>