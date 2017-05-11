<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
      @if (isset($title))
        @php
          echo $title.' - ';
        @endphp
      @endif
      Thái Văn Lợi
    </title>

    <!-- Bootstrap -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- for fontawesome icon css file -->
    <link href="{{ url('css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- superslides css -->
    <link rel="stylesheet" href="{{ url('css/superslides.css') }}">
    <!-- for content animate css file -->
    <link rel="stylesheet" href="{{ url('css/animate.css') }}">    
    <!-- slick slider css file -->
    <link href="{{ url('css/slick.css') }}" rel="stylesheet">        
    <!-- website theme color file -->   
    <link id="switcher" href="{{ url('css/themes/cyan-theme.css') }}" rel="stylesheet">   
    <!-- main site css file -->    
    <link href="{{ url('style.css') }}" rel="stylesheet">
    <!-- google fonts  -->  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>    
    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('img/favicon.ico') }}" type="image/x-icon">  

    <link href="{{ url('css/style.css') }}" rel="stylesheet">   
  <!-- <script src="{{ url('js/sequencejs-options.apple-style.js') }}"></script> -->
  
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <meta name="robots" content="noodp"/>
    <meta name="keywords" content="Thái Văn Lợi - Đà Nẵng"/>
    <link rel="canonical" href="{{getenv('APP_URL')}}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Thái Văn Lợi - Đà Nẵng" />

    <meta property="og:url" content="{{ getenv('APP_URL')}}/{{ Request::path() }}" />

    <?php if(isset($description)){ 
      ?>
      <meta property="og:description" content="{{$description}}" />
      <meta name="description" content="{{$description}}"/>
      <?php
    }else{
      ?>
      <meta name="description" content="Blog cá nhân của Thái Văn Lợi"/>
      <meta property="og:description" content="Blog cá nhân của Thái Văn Lợi" />
      <?php
    }
    ?>

    <meta property="og:url" content="{{getenv('APP_URL')}}" />
    <meta property="og:site_name" content="Thái Văn Lợi - Đà Nẵng" />

  </head>
<body>
  
  <!-- Preloader -->
  <div id="preloader">
    <div id="status">&nbsp;</div>
  </div>
 
  <!-- End Preloader -->   
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
  <!-- start navbar -->
 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{route('frontend.home.index') }}">Thai Van <span>Loi</span></a>
        <!-- <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo"></a> -->
      </div>
      <div id="navbar" class="navbar-collapse collapse navbar_area">          
        <ul class="nav navbar-nav navbar-right custom_nav">
          <li><a href="{{route('frontend.home.index') }}">Trang chủ</a></li>
          <li><a href="{{route('frontend.contact.contact') }}">Liên hệ</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <!-- End navbar -->