<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('admins.homeAdmin') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('admins/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admins/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('admins.homeAdmin') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('admins/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('admins/assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admins.adminAnalytic') }}" class="nav-link" data-key="t-analytics">
                                    Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admins.users.userManager') }}" class="nav-link" data-key="t-crm">
                                    User Manager </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ route('admins.homeAdmin') }}" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li> --}}
                            {{-- <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-job.html" class="nav-link" data-key="t-job">Job</a> --}}
                </li>
            </ul>
        </div>
        </li> <!-- end Dashboard Menu -->
        <!-- end Dashboard Menu -->
        <li class="nav-item">
            <ul class="nav nav-sm flex-column">
                {{-- <li class="nav-item">
                            <a href="#sidebarCalendar" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarCalendar" data-key="t-calender">
                                Products
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarCalendar">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="apps-calendar.html" class="nav-link" data-key="t-main-calender"> Main Calender </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="apps-calendar-month-grid.html" class="nav-link" data-key="t-month-grid"> Month Grid </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                <li class="nav-item">
                    <a href="{{ route('admins.products.listProducts') }}" class="nav-link" data-key="t-chat"> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admins.categories.listCategories') }}" class="nav-link" data-key="t-chat">
                        Categories </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admins.authors.listAuthors') }}" class="nav-link" data-key="t-chat"> Author </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admins.publishers.listPublishers') }}" class="nav-link" data-key="t-chat">
                        Publisher </a>
                </li>
            </ul>
            {{-- <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                    </a> --}}

        </li>
        <li class="nav-item">
            <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button"
                aria-expanded="false" aria-controls="sidebarDashboards">
                <i class="ri-apps-2-line"></i> <span data-key="t-dashboards">Im-Ex Excel</span>
            </a>
            <div class="collapse menu-dropdown" id="sidebarDashboards">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admins.excels.viewExport') }}" class="nav-link" data-key="t-analytics">
                            Import Excels </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admins.excels.viewExport') }}" class="nav-link" data-key="t-crm"> Export Excels </a>
                    </li>
                    {{-- <li class="nav-item">
                                <a href="{{ route('admins.homeAdmin') }}" class="nav-link" data-key="t-ecommerce"> Ecommerce </a>
                            </li> --}}
                    {{-- <li class="nav-item">
                                <a href="dashboard-crypto.html" class="nav-link" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-projects.html" class="nav-link" data-key="t-projects"> Projects </a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-nft.html" class="nav-link" data-key="t-nft"> NFT</a>
                            </li>
                            <li class="nav-item">
                                <a href="dashboard-job.html" class="nav-link" data-key="t-job">Job</a> --}}
        </li>
        </ul>
    </div>
    </li>


    </ul>

</div>

<!-- Sidebar -->
</div>

<div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
