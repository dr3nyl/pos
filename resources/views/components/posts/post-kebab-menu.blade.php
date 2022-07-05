@props(['post'])

<div class="ml-auto mb-5"
    x-data="{
        open: false,
        toggle() {
            if (this.open) {
                return this.close()
            }

            this.$refs.button.focus()

            this.open = true
        },
        close(focusAfter) {
            if (! this.open) return

            this.open = false

            focusAfter && focusAfter.focus()
        }
    }"
    x-on:keydown.escape.prevent.stop="close($refs.button)"
    x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
    x-id="['dropdown-button']"
    class="relative"
>
    <div x-data="{ open: false }">
        <button x-ref="button"
                x-on:click="toggle()"
                :aria-expanded="open"
                :aria-controls="$id('dropdown-button')"
                type="button">...</button>

        <!-- Panel -->
        <div
            x-ref="panel"
            x-show="open"
            x-transition.origin.top.left
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            style="display: none;"
            class="absolute w-40 bg-white rounded shadow-md overflow-hidden"
        >
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
</div>