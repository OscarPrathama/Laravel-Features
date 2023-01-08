<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ isRoute('admin.dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isRoute('admin.categories.index') ? 'active' : '' }}" href="{{ route("admin.categories.index") }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Categories
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isRoute('admin.menus.index') ? 'active' : '' }}" href="{{ route("admin.menus.index") }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Menu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isRoute('admin.tables.index') ? 'active' : '' }}" href="{{ route("admin.tables.index") }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Table
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ isRoute('admin.reservations.index') ? 'active' : '' }}" href="{{ route("admin.reservations.index") }}">
                    <span data-feather="file-text" class="align-text-bottom"></span>
                    Reservation
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
        </h6>

        @if (auth()->user()->is_admin === 1)
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link {{ isRoute('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                        <span data-feather="shopping-cart" class="align-text-bottom"></span>
                        Users
                    </a>
                </li>
            </ul>
        @endif

    </div>
</nav>