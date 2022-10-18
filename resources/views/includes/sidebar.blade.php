<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text mx-3">Kantor <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('dashboard.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div>

<!-- Nav Item - Staff -->
<li class="nav-item {{ request()->is('staff*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('staff.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Staff</span></a>
</li>

<!-- Nav Item - Staff -->
<li class="nav-item {{ request()->is('absent*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('absent.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Absent</span></a>
</li>
