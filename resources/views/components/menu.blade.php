<div>
    <div class="utf-dashboard-sidebar-item">
        <div class="utf-dashboard-sidebar-item-inner" data-simplebar>
            <div class="utf-dashboard-nav-container">
                <!-- Responsive Navigation Trigger -->
                <a href="#" class="utf-dashboard-responsive-trigger-item">
                    <span class="hamburger utf-hamburger-collapse-item">
                        <span class="utf-hamburger-box-item">
                            <span class="utf-hamburger-inner-item"></span>
                        </span>
                    </span>
                    <span class="trigger-title">Dashboard Navigation Menu</span> </a>
                <!-- Navigation -->
                <div class="utf-dashboard-nav">
                    <div class="utf-dashboard-nav-inner">
                        <div class="dashboard-profile-box">
                            <span class="avatar-img">
                                <img alt="" src="{{ asset('assets/images/user-avatar-placeholder.png') }}"
                                    class="photo">
                            </span>
                            <div class="user-profile-text">
                                <span class="fullname">{{ Auth::user()->name }}</span>
                                <span class="user-role">Software Engineer</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <ul>
                            <li class="active"><a href="{{ route(strtolower(Auth::user()->type).'/dashboard') }}"><i
                                        class="icon-material-outline-dashboard"></i>Dashboard</a></li>
                            <li><a href="{{ route(strtolower(Auth::user()->type).'/manage-jobs-post') }}"><i class="icon-line-awesome-user-secret"></i>
                                    Manage Jobs Post</a></li>
                            <li><a href="{{ route(strtolower(Auth::user()->type).'/manage-jobs') }}"><i
                                        class="icon-material-outline-group"></i>Manage Jobs <span class="nav-tag">5</span></a></li>
                            <li><a href="{{ route(strtolower(Auth::user()->type).'/manage-resume') }}"><i
                                        class="icon-material-outline-supervisor-account"></i> Manage Resume</a></li>
                            <li><a href="{{ route(strtolower(Auth::user()->type).'/bookmarks-jobs') }}"><i class="icon-feather-heart"></i> Bookmarks
                                    Jobs</a></li>
                            <li><a href="#"><i class="icon-line-awesome-file-text"></i>
                                    Freelancer Tasks</a>
                                <ul class="dropdown-nav">
                                    <li><a href="{{ route(strtolower(Auth::user()->type).'/dashboard') }}"><i
                                                class="icon-feather-chevron-right"></i> Freelancer Manage Tasks</a></li>
                                    <li><a href="{{ route(strtolower(Auth::user()->type).'/dashboard') }}"><i
                                                class="icon-feather-chevron-right"></i> Freelancer Manage Bidders</a>
                                    </li>
                                    <li><a href="{{ route(strtolower(Auth::user()->type).'/dashboard') }}"><i
                                                class="icon-feather-chevron-right"></i> Freelancer Active Bids</a></li>
                                    <li><a href="{{ route(strtolower(Auth::user()->type).'/dashboard') }}"><i
                                                class="icon-feather-chevron-right"></i> Freelancer Post Bids</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route(strtolower(Auth::user()->type).'/reviews') }}"><i
                                        class="icon-material-outline-rate-review"></i>Reviews</a></li>
                            <li><a href="{{ route(strtolower(Auth::user()->type).'/my-profile') }}"><i class="icon-feather-user"></i> My Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>