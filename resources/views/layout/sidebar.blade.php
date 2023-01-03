<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand sidebar-gone-show"><a href="{{ route('dashboard') }}">Maslahah</a></div>
        <ul class="sidebar-menu">
            {{-- <li class="menu-header">Dashboard</li> --}}
            <li><a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>

            <li class="menu-header">Main Menu</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-credit-card"></i><span>M-Pay</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('rekening') }}">Master Rekening</a></li>
                <li><a class="nav-link" href="{{ route('mutasi') }}">Mutasi Simpanan</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="{{ route('kanban') }}"><i class="fas fa-th"></i> <span>Kanban Board</span></a></li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
