<div class="single_sidebar hidden-xs hidden-sm hidden-md">
  <h2>Bài viết phổ biến</h2>
  <ul class="small_catg similar_nav">
    @foreach ($popular_post as $post)
      @if ($post->image == '')
          @php
              $post->image = 'no-picture.png';
          @endphp
      @endif
      <li>
        <div class="media">
          <a href="{{ route('frontend.post.show', ['id' => $post->id, 'slug' => str_slug($post->title)]) }}" class="media-left related-img">
            <img src="{{ url('upload') . '/' .$post->image }}" class="" alt="User Image">
          </a>
          <div class="media-body">
            <h4 class="media-heading"><a href="{{ route('frontend.post.show', ['id' => $post->id, 'slug' => str_slug($post->title)]) }}">{{ $post->title }}</a></h4> 
            <p>{{ str_limit($post->description, 255) }}</p>
          </div>
        </div>
      </li> 
    @endforeach
  </ul>
</div>