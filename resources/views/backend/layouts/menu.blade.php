@if (Auth::user()->image == '')
    @php
        Auth::user()->image = 'no-avatar.png';
    @endphp
@endif
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
</a>
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{ url('upload') . '/' .Auth::user()->image }}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->fullname }}</span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <img src="{{ url('upload') . '/' .Auth::user()->image }}" class="img-circle" alt="User Image">
                    <p>
                        {{ Auth::user()->fullname }}
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="{{ route('backend.user.update', Auth::id()) }}" class="btn btn-default btn-flat">Chỉnh sửa</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</div>