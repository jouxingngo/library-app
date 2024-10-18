 <!-- Page Wrapper -->
 <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Library App</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        @if (auth()->check() && auth()->user()->hasRole('admin'))
            <li class="nav-item  {{ 'admin' === trim($__env->yieldContent('nav-active')) ? 'active' : '' }}">
                <a class="nav-link" href="/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
        @endif
        @if (!auth()->check() || !auth()->user()->hasRole('admin'))
        <li class="nav-item {{ 'book' === trim($__env->yieldContent('nav-active')) ? 'active' : '' }}">
            <a class="nav-link " href="/">
                <i class="fas fa-fw fa-home"></i>
                <span>Books</span>
            </a>
            </
            <!-- Divider -->
                 <!-- Divider -->
            <!-- Nav Item - Tables -->
            <li class="nav-item {{ 'category' === trim($__env->yieldContent('nav-active')) ? 'active' : '' }}">
                <a class="nav-link " href="/category">
                    <i class="fas fa-fw fa-tags"></i>
                    <span>Categories</span></a>
            </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item {{ 'loan' === trim($__env->yieldContent('nav-active')) ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('loan.index') }}">
                        <i class="fas fa-fw fa-clipboard-check"></i>
                        <span>My Loans</span></a>
                </li>
        @endif
       

        <!-- Heading -->
        @if (auth()->check() && auth()->user()->hasRole('admin'))            
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ 'table' === trim($__env->yieldContent('nav-active')) ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-table"></i>
                <span>Data Tables</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tables Data:</h6>
                    <a class="collapse-item" href="{{ route('book.index') }}">Books</a>
                    <a class="collapse-item" href="{{ route('category.index') }}">Categories</a>
                    <a class="collapse-item" href="{{ route('user.index') }}">Users</a>
                    <a class="collapse-item" href="{{ route('loan.index') }}">Loans</a>
                </div>
            </div>
        </li>
        @endif

   
        
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>



    </ul>
    <!-- End of Sidebar -->