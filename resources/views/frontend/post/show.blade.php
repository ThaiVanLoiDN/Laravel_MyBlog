@extends('frontend.layouts.master')
@section('content')
         <div class="blogArchive_area">
         <!-- start single archive post -->
          <div class="single_archiveblog">

            <div class="archiveblog_right">
              <h2>{{ $post->title }}</h2>
              <div class="post_commentbox">
                <a href="{{ route('frontend.category.show', ['id' => $post->category->id, 'slug' => str_slug($post->category->name) ]) }}"><i class="fa fa-tags"></i>{{ $post->category->name }}</a>
                <a><i class="fa fa-user"></i>{{ $post->user->fullname }}</a>
              </div>
              <div class="content-post">
                
              {!! $post->content !!}             
              </div>
              
            </div>
          </div>
          <!-- End single archive post -->
          </div>
         <!-- start pagination -->
         
          <!-- End pagination -->
          <div class="similar_post">
            <h2>Bài viết cùng chuyên mục</h2>
            <ul class="small_catg similar_nav wow fadeInDown">
              @foreach ($listOtherPost as $otherPost)
                @if ($otherPost->image == '')
                    @php
                        $otherPost->image = 'no-picture.png';
                    @endphp
                @endif
                <li>
                  <div class="media wow fadeInDown">
                    <a href="{{ route('frontend.post.show', ['id' => $otherPost->id, 'slug' => str_slug($otherPost->title)]) }}" class="media-left related-img">
                      <img src="{{ url('upload') . '/' .$otherPost->image }}">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="{{ route('frontend.post.show', ['id' => $otherPost->id, 'slug' => str_slug($otherPost->title)]) }}">{{ $otherPost->title }}</a></h4> 
                      <p>{{ str_limit($otherPost->description, 255) }}</p>
                    </div>
                  </div>
                </li>                    
              @endforeach
            </ul>
          </div>

  @stop