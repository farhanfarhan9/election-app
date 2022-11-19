<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user-material">
            <div class="sidebar-user-material-body">
                <div class="card-body text-center">
                    <a href="#">
                        <img src="{{asset('dashboard/global_assets/images/image.png')}}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
                    </a>
                    <h6 class="mb-0 text-white text-shadow-dark">{{ Auth::user()->name }}</h6>
                    <span class="font-size-sm text-white text-shadow-dark">{{ Auth::user()->email }}</span>
                </div>
                                            
                <div class="sidebar-user-material-footer">
                    <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>Navigation</span></a>
                </div>
            </div>

            <div class="collapse" id="user-nav">
                <ul class="nav nav-sidebar">
                    {{--
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-coins"></i>
                            <span>My balance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-comment-discussion"></i>
                            <span>Messages</span>
                            <span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-cog5"></i>
                            <span>Account settings</span>
                        </a>
                    </li>
                    --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i>
                            <span>{{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main Menu</div> <i class="icon-menu" title="Main"></i></li>
                <li class="nav-item">
                    <a href="{{route('home.index')}}" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Admin</div> <i class="icon-menu" title="update"></i></li>  
                <li class="nav-item">
                    <a href="{{route('home.users.index')}}" class="nav-link">
                        <i class="bi bi-person"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('home.elections.index')}}" class="nav-link">
                        <i class="bi bi-ticket-perforated-fill"></i>
                        <span>Pemilihan</span>
                    </a>
                </li>
                {{-- 

                <li class="nav-item">
                    <a href="{{route('home.answer.index')}}" class="nav-link">
                        <i class="bi bi-chat-left-text"></i>
                        <span>Data Jawaban</span>
                    </a>
                </li>
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Update Content</div> <i class="icon-menu" title="update"></i></li>  
                <li class="nav-item">
                    <a href="{{route('home.education.index')}}" class="nav-link">
                        <i class="icon-coins"></i>
                        <span>Online Offline</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('home.talkshow.index')}}" class="nav-link">
                        <i class="icon-users"></i>
                        <span>Talk Show DRS</span>
                    </a>
                </li>                
                <li class="nav-item">
                    <a href="{{route('home.siklus.index')}}" class="nav-link">
                        <i class="icon-credit-card"></i>
                        <span>Siklus Refil</span>
                    </a>
                </li>                
                <li class="nav-item">
                    <a href="{{route('home.blog.index')}}" class="nav-link">
                        <i class="icon-user-tie"></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Admin Menu</div> <i class="icon-menu" title="update"></i></li>  
                <li class="nav-item">
                    <a href="{{route('home.users.index')}}" class="nav-link">
                        <i class="icon-reorder">
                            <svg width="16" height="14" viewBox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 10H16V8H0V10ZM0 14H16V12H0V14ZM0 6H16V4H0V6ZM0 0V2H16V0H0Z" fill="#666666"/>
                            </svg>
                        </i>
                        <span>Admin</span>
                    </a>
                </li> --}}

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>
<!-- /main sidebar -->