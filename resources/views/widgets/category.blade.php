<div class="single_sidebar">
    <h2>Category</h2>
    <ul class="catg_nav">
    @foreach ($listCategory as $category)
        <li><a href="{{ route('frontend.category.show', ['id' => $category->id, 'slug' => str_slug($category->name) ]) }}">{{ $category->name }}</a></li>
    @endforeach
    </ul>
</div>