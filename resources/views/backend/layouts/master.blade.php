@if (Auth::user()->image == '')
    @php
        Auth::user()->image = 'no-avatar.png';
    @endphp
@endif
@include('backend.layouts.header')

<header class="main-header">
    <a href="{{ route('backend.home.index') }}" class="logo">

        @php
            switch (Auth::user()->role) {
                case '3':
			        echo '<span class="logo-mini"><b>A</b></span>';
			        echo '<span class="logo-lg"><b>Admin</b></span>';
                    break;
                case '2':
                    echo '<span class="logo-mini"><b>S</b></span>';
			        echo '<span class="logo-lg"><b>Smod</b></span>';
                    break;
                case '1':
                    echo '<span class="logo-mini"><b>M</b></span>';
			        echo '<span class="logo-lg"><b>Mod</b></span>';
                    break;
                default:
                    # code...
                    break;
            }
        @endphp
    </a>

    <nav class="navbar navbar-static-top" role="navigation">
        @include('backend.layouts.menu')
    </nav>
</header>
<aside class="main-sidebar">
    @include('backend.layouts.leftbar')
</aside>

<div class="content-wrapper">
    @yield('main-content')
</div>

@include('backend.layouts.footer')