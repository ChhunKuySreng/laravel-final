<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>Dashboard</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('slideshow') }}" class="nav-link {{ Request::is('slideshow') ? 'active' : '' }}">
        <i class="nav-icon fas fa-desktop"></i>
        <p>Slideshow</p>
    </a>
</li>
