<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">

        {{-- bagian master utama dashboard --}}
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file-text"></span>
                    My Posts
                </a>
            </li>
        </ul>

        {{-- kenapa di kasih can karena untuk mengaligkan bagi yang bukan adminnya --}}
        @can('admin')
            {{-- bagian admin --}}
            <h6 class="sidebar-heading d-flex justify-content-between align-item-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}"
                        href="/dashboard/categories">
                        <span data-feather="grid"></span>
                        Post Categories
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</nav>
