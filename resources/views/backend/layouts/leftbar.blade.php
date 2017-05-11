@if (Auth::user()->image == '')
    @php
        Auth::user()->image = 'no-avatar.png';
    @endphp
@endif
<section class="sidebar">
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ url('upload') . '/' .Auth::user()->image }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->fullname }}</p>
            <a href=""><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>

    <ul class="sidebar-menu">
        <li class="{{ Request::is('admincp') ? 'active' : '' }}"><a href="{{ route('backend.home.index') }}"><i class="fa fa-home"></i> <span>Trang chủ</span></a></li>      
        
        <li class="{{ Request::is('admincp/quan-tri-vien*') ? 'active' : '' }}"><a href="{{ route('backend.user.index') }}"><i class="fa fa-user"></i> <span>Quản trị viên</span></a></li>
        
        <li class="{{ Request::is('admincp/lien-he*') ? 'active' : '' }}"><a href="{{ route('backend.contact.index') }}"><i class="fa fa-envelope"></i> <span>Liên lạc</span></a></li>

        <li class="treeview {{ Request::is('admincp/bai-viet*') || Request::is('admincp/chuyen-muc*') ? 'active' : '' }}">
            <a href="{{ route('backend.post.index') }}">
                <i class="fa fa-link"></i> 
                <span>Bài viết</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admincp/bai-viet*') ? 'active' : '' }}"><a href="{{ route('backend.post.index') }}"><i class="fa fa-file"></i> <span>Bài viết</span></a></li>
                <li class="{{ Request::is('admincp/chuyen-muc*') ? 'active' : '' }}"><a href="{{ route('backend.category.index') }}"><i class="fa fa-folder-open"></i> <span>Chuyên mục</span></a></li>
            </ul>
        </li>

        <li class="treeview {{ Request::is('admincp/trich-dan*') || Request::is('admincp/slider*') ? 'active' : '' || Request::is('admincp/quang-cao*') ? 'active' : ''  }}">
            <a href="#">
                <i class="fa fa-link"></i> 
                <span>Hiển thị</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admincp/trich-dan*') ? 'active' : '' }}"><a href="{{ route('backend.quotes.index') }}"><i class="fa fa-quote-left"></i> <span>Trích dẫn</span></a></li>
                <li class="{{ Request::is('admincp/slider*') ? 'active' : '' }}"><a href="{{ route('backend.slider.index') }}"><i class="fa fa-sliders"></i> <span>Slider</span></a></li>
                <li class="{{ Request::is('admincp/quang-cao*') ? 'active' : '' }}"><a href="{{ route('backend.ads.index') }}"><i class="fa fa-money"></i> <span>Quảng cáo</span></a></li>
            </ul>
        </li>

        <li class="treeview {{ Request::is('admincp/viec-lam*') || Request::is('admincp/du-an*') || Request::is('admincp/thong-tin*') || Request::is('admincp/ky-nang*')  }}">
            <a href="#">
                <i class="fa fa-link"></i> 
                <span>Thông tin</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ Request::is('admincp/viec-lam*') ? 'active' : '' }}"><a href="{{ route('backend.work.index') }}"><i class="fa fa-plus-square"></i> <span>Việc làm</span></a></li>
                <li class="{{ Request::is('admincp/du-an*') ? 'active' : '' }}"><a href="{{ route('backend.project.index') }}"><i class="fa fa-bitbucket"></i> <span>Dự án</span></a></li>
                <li class="{{ Request::is('admincp/mang-xa-hoi*') ? 'active' : '' }}"><a href="{{ route('backend.info.index') }}"><i class="fa fa-globe" aria-hidden="true"></i> <span>Mạng xã hội</span></a></li>
                <li class="{{ Request::is('admincp/ky-nang*') ? 'active' : '' }}"><a href="{{ route('backend.skill.index') }}"><i class="fa fa-flash"></i> <span>Kỹ năng</span></a></li>
            </ul>
        </li>
    </ul>
</section>
