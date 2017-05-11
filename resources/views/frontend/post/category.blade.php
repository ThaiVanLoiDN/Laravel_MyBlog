@extends('frontend.layouts.master')
@section('content')
<div class="blogArchive_area">

  @foreach ($postCategory as $post)
  @if ($post->image == '')
  @php
  $post->image = 'no-image.png';
  @endphp
  @endif
  <div class="single_archiveblog wow fadeInDown">

    <div class="archiveblog_right">
      <h2><a href="{{ route('frontend.post.show', ['id' => $post->id, 'slug' => str_slug($post->title)]) }}">{{ $post->title }}</a></h2>
      <div class="post_commentbox">
        <a href="{{ route('frontend.post.show', ['id' => $post->category->id, 'slug' => str_slug($post->category->name)]) }}"><i class="fa fa-tags"></i>{{ $post->category->name }}</a>
        <a><i class="fa fa-user"></i>{{ $post->user->fullname }}</a>             
      </div>
      <a href="{{ route('frontend.post.show', ['id' => $post->id, 'slug' => str_slug($post->title)]) }}">
      <img src="{{ url('upload') . '/' .$post->image }}" class="img-thumbnail">
      </a>
      <p>{{ str_limit($post->description, 255) }}</p>
      <a class="read_more" href="{{ route('frontend.post.show', ['id' => $post->id, 'slug' => str_slug($post->title)]) }}">Đọc tiếp<i class="fa fa-long-arrow-right"></i></a>
    </div>
  </div>
  <!-- End single archive post -->
  @endforeach

  


</div>
<!-- start pagination -->
<nav>
  {{ $postCategory->links() }}
</nav><!-- End pagination -->
@stop