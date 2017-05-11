<ul>
    @foreach ($listCategory as $category)
        <li>
        	<a href="{{ route('frontend.category.show', ['id' => $category->id, 'slug' => str_slug($category->name) ]) }}">
        		{{ $category->name }}
        	</a>
        </li>
    @endforeach
</ul>