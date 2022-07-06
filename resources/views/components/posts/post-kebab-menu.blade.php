@props(['post'])

<div class="ml-auto mb-5"
     x-cloak x-data="{ show: false}" 
     @click.away="show = false"
     class="relative">   

    <!-- Trigger -->
    <div @click="show = ! show">
        <button x-ref="button"
            :aria-controls="$id('dropdown-button')"
            type="button">...
        </button>
    </div>

    <!-- Panel -->
    <div
        x-show="show"
        x-transition.origin.top.left
        style="display: none;"
        class="absolute w-40 bg-white rounded shadow-md overflow-hidden">

        <div>
            <button 
                class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-50 disabled:text-gray-500" 
                type="button" 
                wire:click="deleteConfirm({{ $post->id }})" 
                href="#">

                <i class="fa fa-trash fa-xs mr-2" aria-hidden="true"></i>
                Delete Post
            </button>

            <button
                type="button"
                class="block w-full px-4 py-2 text-left text-sm hover:bg-gray-50 disabled:text-gray-500 line-through"
                type="button"
                disabled >
                <i class="fa fa-pencil fa-xs mr-2" aria-hidden="true"></i>
                Update Post
            </button>
        </div>
    </div>
</div>