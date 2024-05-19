<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-danger p-0">
    <div class="container-fluid d-flex flex-column p-0"><a
            class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="/">
            <div class="sidebar-brand-icon"><img src="{{ asset('assets/logo-habastore.png') }}" height="80px"
                    width="80px" alt="">
            </div>
            <div class="sidebar-brand-text "><span>Haba Store</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/"><i
                        class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
            </li>
            @if (Auth::user()->type == 'admin')
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('category.index') ? 'active' : '' }}"
                        href="{{ route('category.index') }}"><i class="fas fa-tags"></i><span>Category</span></a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('product.index') ? 'active' : '' }}"
                        href="{{ route('product.index') }}"><i class="fas fa-box"></i></i><span>Product</span></a></li>
            @endif
            <hr class="sidebar-divider mt-2">
            <div class="sidebar-heading">Transaction</div>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('transaction.index') ? 'active' : '' }}"
                    href="{{ route('transaction.index') }}">
                    <i class="fas fa-cart-plus"></i>
                    <span>Transaction</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('sale.index') ? 'active' : '' }}"
                    href="{{ route('sale.index') }}">
                    <i class="fas fa-shopping-cart"></i>
                    <span>Sales</span>
                </a>
            </li>

            @if (Auth::user()->type == 'admin')
                <hr class="sidebar-divider mt-2">
                <div class="sidebar-heading">Reports</div>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('report.index') ? 'active' : '' }}"
                        href="{{ route('report.index') }}"><i class="fas fa-file"></i><span>Reports</span></a>
                </li>
                <hr class="sidebar-divider mt-2">
                <div class="sidebar-heading">Setting</div>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"
                        href="{{ route('user.index') }}"><i class="fas fa-user"></i><span>Users</span></a>
                </li>
            @endif
            <hr class="sidebar-divider mt-2">
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle"
                type="button"></button></div>
    </div>
</nav>
