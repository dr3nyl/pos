<div>
    
    <!-- Textarea to post -->
    <x-create-post />

    @forelse($posts as $post)

        <!-- all post in public wall -->
        <x-post-card :post="$post" />
        
    @empty

        <div class="flex justify-center mt-12">
            <h1 class="text-lg">No Post yet.</h1>
        </div>

    @endforelse

</div>