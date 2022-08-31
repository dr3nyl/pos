<div>
    @forelse($posts as $post)
        <!-- all post in public wall -->
        <x-posts.post-card :post="$post" :userId="$userId"/>
    @empty
        <div class="flex justify-center mt-12">
            <h1 class="text-lg">No Post yet.</h1>
        </div>
    @endforelse
</div>