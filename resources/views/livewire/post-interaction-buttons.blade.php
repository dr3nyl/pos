<div class="footer divide-y text-sm -mb-1">
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
        <button 
            class="hover:text-dark" 
            type="button">
            <i class="fas fa-comment"></i> 
            Comment
        </button>
        <button 
            class="hover:text-dark" 
            type="button">
            <i class="fas fa-share"></i> 
            Share
        </button>
    </div>
</div>