<div>
  <!-- Header Container -->
  <header id="utf-header-container-block" class="fullwidth dashboard-header not-sticky">

    <div id="header">
    <div class="container">
      <div class="utf-left-side">
      <div id="logo"> <a href="{{ url('/') }}">
      <img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
      </div> <div class="clearfix"></div> </div>
      <div class="utf-right-side">
      @guest
      @if (Route::has('login'))
      <div class="utf-header-widget-item">
      <a href="#utf-signin-dialog-block" class="popup-with-zoom-anim log-in-button"><i class="icon-feather-log-in"></i>
        <span>Sign In</span></a>
        </div>
        @endif
        @else
        <div class="utf-header-widget-item">
        <div class="utf-header-notifications user-menu">
          <div class="utf-header-notifications-trigger user-profile-title">
          <a href="#">
          <div class="user-avatar status-online">
            <img src="{{ asset('assets/images/user_small_1.jpg') }}" alt="">
            </div>
            <div class="user-name">{{ Auth::user()->name }}</div>
      </a>
    </div>
    <div class=" utf-header-notifications-dropdown-block">
      <ul class="utf-user-menu-dropdown-nav">
        <li><a href="<?=strtolower(Auth::user()->type);?>/dashboard"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
              class="icon-material-outline-power-settings-new"></i> {{ __('Logout') }}</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
</div>
</div>
@endguest
<span class="mmenu-trigger">
  <button class="hamburger utf-hamburger-collapse-item" type="button">
    <span class="utf-hamburger-box-item">
      <span class="utf-hamburger-inner-item"></span>
    </span>
  </button>
</span>
</div>
</div>
</div>
</header>
<div class="clearfix"></div>
</div>