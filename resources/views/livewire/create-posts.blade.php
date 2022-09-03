<div>
    <!-- Textarea to create post -->
    @auth
        <x-posts.create-post outerDivAttribute="$outerDivAttribute" innerDivAttribute="$innerDivAttribute"/>
    @endauth
</div>