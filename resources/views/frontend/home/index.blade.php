@extends('frontend.layouts.app')
@section('content')
<!-- start slider section -->
<section id="sliderSection">
    <div class="mainslider_area hidden-xs hidden-sm hidden-md">
        <!-- Start super slider -->
        <div id="slides">
            <ul class="slides-container">
                @foreach ($listSlider as $slider)
                @php
                    if ($slider->image == ''):
                        $slider->image = 'no-image.png';
                    endif
                @endphp
                <li>
                    <img src="{{ url('upload').'/'.$slider->image }}" alt="{{ $slider->name }}">
                    <div class="slider_caption">
                        <h2><a href="{{ $slider->link }}" title="{{ $slider->name }}">{{ $slider->name }}</a></h2>
                        <p>{{ str_limit($slider->description, 255) }}</p>
                        <a class="slider_btn" href="{{ $slider->link }}">Read More</a>
                    </div>
                </li>
                @endforeach
               
            </ul>
            <nav class="slides-navigation">
                <a href="#" class="next"></a>
                <a href="#" class="prev"></a>
            </nav>
        </div>
    </div>
    </div>
</section>
<!-- End slider section -->

<!-- Start aboutme area -->
<section id="about-me"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Thái Văn Lợi</h2>
                <h3 class="section-subheading text-muted">Chặng đường tôi đã qua..</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <ul class="timeline">
                    @foreach ($listWork as $key => $work)
                    @php
                        if ($work->image == ''):
                            $work->image = 'no-image.png';
                        endif
                    @endphp
                    <li class="{{ ($key%2) ? 'timeline-inverted' : '' }}">
                        <div class="timeline-image">
                            <img class="img-circle img-responsive" src="{{ url('upload').'/'.$work->image }}" alt="">
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>{{ $work->time }}</h4>
                                <h4 class="subheading text-bold">{{ $work->name }}</h4>
                            </div>
                            <div class="timeline-body">
                                <p class="text-muted">{{ $work->description }}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>To be
                                <br>Continue
                                <br>...
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End aboutme section -->

<!-- start Our Team area -->
<section id="ourTeam">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="team_area wow fadeInLeftBig">
                    <div class="team_title">
                        <hr>
                        <h2>My Project</h2>
                        <p>Những dự án tôi đã thực hiện...</p>
                    </div>
                    <div class="team">
                        <ul class="team_nav">
                            @foreach ($listProject as $project)
                            @php
                                if ($project->image == ''):
                                    $project->image = 'no-image.png';
                                endif
                            @endphp
                            <li>
                                <div class="team_img">
                                    <img src="{{ url('upload').'/'.$project->image }}" alt="team-img">
                                </div>
                                <div class="team_content">
                                    <h4 class="team_name">
                                        <a href="{{ $project->link }}">
                                            {{ $project->name }}
                                        </a>
                                    </h4>
                                    <p><em>{{ $project->time }}</em></p>
                                    <p>{{ $project->description }}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Team area -->

<div class="progress_area bg-light-gray" id="about">
    <div class="container">
        <div class="row">
            <!-- progress content -->
            <div class="col-md-6">
                <div class="progress_text">
                    <h2><span>Skills</span></h2>
                </div>
            </div>
            <!-- end progress content -->
            <!-- progress bar -->
            <div class="col-md-6">
                <div class="progress_content">
                    <!--single progress bar-->
                    @foreach ($listSkill as $skill)
                        {{-- expr --}}
                    <div class="progress  progress-bar-value">                  
                        <div class="progress-bar wow fadeInLeft animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: {{ $skill->percent }}%; visibility: visible; animation-duration: 1.5s; animation-name: fadeInLeft;" data-wow-duration="1.5s">
                            <span class="p_text_left">{{ $skill->name }}</span>
                            <span class="p_text_right">{{ $skill->percent }}%</span>
                        </div>
                    </div>
                    @endforeach

                    
                    <!-- end single progress bar-->
                </div>
            </div>
            <!-- end progress bar -->
        </div>
    </div>  
</div>
<!-- start special quote -->
<section id="specialQuote">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 wow bounceInLeft">
                <p>"Hãy theo đuổi đam mê, thành công sẽ theo đuổi bạn!" <span>- Three Idiots</span></p>
            </div>
        </div>
    </div>
</section>
<!-- End special quote -->

<!-- start client testimonial -->
<section id="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="testimonial_area wow bounceIn">
                    <div class="client_title">
                        <hr>
                        <h2>Danh ngôn</h2>
                    </div>
                    <ul class="testimon_nav">
                    @foreach ($listQuotes as $quote)
                    @php
                        if ($quote->image == ''):
                            $quote->image = 'no-avatar.png';
                        endif
                    @endphp
                        <li>
                            <div class="testimonial_content">
                                <blockquote>
                                    <p>{{ $quote->content }}</p>
                                    <small>{{ $quote->author }}</small>
                                </blockquote>
                                <div class="client_img">
                                    <img src="{{ url('upload').'/'.$quote->image }}" alt="img">
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End client testimonial -->

<!-- start featured blog area -->
<section id="featuredBlog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="featuredBlog_area">
                    <div class="team_title">
                        <hr>
                        <h2>Bài viết</h2>
                    </div>
                    <!-- start featured blog -->
                    <div class="featured_blog">
                        <div class="row">
                            @foreach ($listPost as $post)
                            @php
                                $url = route('frontend.post.show', [ 'id' => $post->id, 'slug' => str_slug( str_limit($post->title, 50) ) ]);
                                if ($post->image == ''):
                                    $post->image = 'no-image.png';
                                endif
                            @endphp
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="single_featured_blog">
                                        <img alt="img" src="{{ url('upload').'/'.$post->image }}">
                                    <h2><a href="{{ $url }}">{{ str_limit($post->title, 50) }}</a></h2>
                                    <div class="post_commentbox">
                                        <a href="{{ route('frontend.category.show', ['id' => $post->category->id, 'slug' => str_slug($post->category->name)]) }}"><i class="fa fa-tags"></i>{{ $post->category->name }}</a>
                                    </div>
                                    <p>{{ str_limit($post->description, 255) }}</p>
                                    <a href="{{ $url }}" class="read_more">Đọc tiếp...<i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End featured blog area -->

<!-- start clients brand area -->
<section id="clients_brand">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="clients_brand_area wow flipInX">
                    <div class="clients_brand">
                        <!-- Start clients brand slider -->
                        <ul class="clb_nav wow flipInX">
                            @foreach ($listAds as $ads)
                            @php
                                if ($ads->image == ''):
                                    $ads->image = 'no-image.png';
                                endif
                            @endphp
                            <li>
                                <a href="{{ $ads->link }}">
                                    <img src="{{ url('upload').'/'.$ads->image }}" alt="{{ $ads->name }}" name="img-full-width">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- End clients brand slider -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End clients brand area -->
@stop