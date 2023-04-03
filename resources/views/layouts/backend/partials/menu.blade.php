<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('homepage') }}" class="nav-link">
        <i class="nav-icon fas fa-house"></i>
        <p>WebPage</p>
    </a>
</li>
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
<li class="nav-item">
    <a href="{{ url('product') }}" class="nav-link {{ Request::is('product') ? 'active' : '' }}">
        <i class="nav-icon fas fa-boxes-stacked"></i>
        <p>Product</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('category') }}" class="nav-link {{ Request::is('category') ? 'active' : '' }}">
        <i class="nav-icon fas fa-list"></i>
        <p>Category</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{ url('user') }}" class="nav-link {{ Request::is('user') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i>
        <p>User</p>
    </a>
</li>
