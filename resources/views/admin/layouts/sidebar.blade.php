<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Interface
    </div> --}}

    <!-- Nav Item - Pages Collapse Menu -->
    {{-- ---------- categorys --------------------- --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-th-list"></i>
            <span>Categorys</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="">Categorys List</a>
                <a class="collapse-item" href="">Deleted Categorys</a>
            </div>
        </div>
    </li>
    {{-- ---------- categorys --------------------- --}}

    {{-- ---------- products --------------------- --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePro"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-box"></i>
            <span>Products</span>
        </a>
        <div id="collapsePro" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="">Products List</a>
                <a class="collapse-item" href="">Deleted Products</a>
            </div>
        </div>
    </li>
    {{-- ---------- Products --------------------- --}}



    {{-- ---------- Users --------------------- --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="">Users List</a>
                <a class="collapse-item" href="">Deleted Users</a>
            </div>
        </div>
    </li>
    {{-- ---------- Users --------------------- --}}

    {{-- ---------- Brands --------------------- --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBrands"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-industry"></i>
            <span>Brands</span>
        </a>
        <div id="collapseBrands" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="">Brands List</a>
                <a class="collapse-item" href="">Deleted Brands</a>
            </div>
        </div>
    </li>
    {{-- ---------- Brands --------------------- --}}

    {{-- ---------- Colors --------------------- --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseColors"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-palette"></i>
            <span>Colors</span>
        </a>
        <div id="collapseColors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="">Colors List</a>
                <a class="collapse-item" href="">Deleted Colors</a>
            </div>
        </div>
    </li>
    {{-- ---------- Colors --------------------- --}}

    {{-- ---------- Sizes --------------------- --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSizes"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-expand-arrows-alt"></i>
            <span>Sizes</span>
        </a>
        <div id="collapseSizes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="">Sizes List</a>
                <a class="collapse-item" href="">Deleted Sizes</a>
            </div>
        </div>
    </li>
    {{-- ---------- Sizes --------------------- --}}

    {{-- ---------- Oders --------------------- --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOders"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-shopping-cart"></i>
            <span>Oders</span>
        </a>
        <div id="collapseOders" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <h6 class="collapse-header">Custom Components:</h6> --}}
                <a class="collapse-item" href="">Oders List</a>
                <a class="collapse-item" href="">Deleted Oders</a>
            </div>
        </div>
    </li>
    {{-- ---------- Oders --------------------- --}}
    <!-- Divider -->




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->


</ul>
