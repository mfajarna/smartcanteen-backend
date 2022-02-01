<!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <!-- Left Menu Start -->
                <ul class="metismenu list-unstyled" id="side-menu">
                    @if(auth()->user()->role === "superadmin")
                    <li class="menu-title" key="t-menu">Menu</li>

                    <li>
                        <a href="{{ route('admin.dashboard.index') }}" class="waves-effect">
                            <i class="bx bx-home-circle"></i>
                            <span key="t-dashboards">Dashboards</span>
                        </a>
                    </li>


                    <li class="menu-title" key="t-apps">Manajemen</li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-dashboards">Layanan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.tenant.index') }}" key="t-tui-calendar">Manajemen Tenant</a></li>
                            <li><a href="{{ route('admin.menu.index') }}" key="t-full-calendar">Manajemen Menu</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-cash-register"></i>
                            <span key="t-dashboards">Transaksi</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{route('admin.transaction.index')}}" key="t-tui-calendar">Manajemen Transaksi</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('admin.methodpayment.index') }}" class="waves-effect">
                            <i class="bx bx-credit-card-alt"></i>
                            <span key="t-dashboards">Metode Pembayaran</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bxs-report"></i>
                            <span key="t-dashboards">Laporan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.laporan.index') }}" key="t-full-calendar">Laporan Transaksi</a></li>
                            <li><a href="{{ route('admin.log_laporan.index') }}" key="t-full-calendar">Log Laporan</a></li>
                        </ul>
                    </li>

                    @endif

                    @if (auth()->user()->role === "admin1")
                        <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('admin.dashboard.index') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-dashboards">Dashboards</span>
                            </a>
                        </li>

                        <li class="menu-title" key="t-apps">Manajemen Tenant</li>
                        <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-receipt"></i>
                            <span key="t-dashboards">Layanan</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('admin.tenant.index') }}" key="t-tui-calendar">Tenant Profile</a></li>
                        </ul>
                    </li>
                    @endif

                    @if (auth()->user()->role === "admin2")
                    <li class="menu-title" key="t-menu">Menu</li>

                        <li>
                            <a href="{{ route('admin.dashboard.index') }}" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-dashboards">Dashboards</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bxs-report"></i>
                                <span key="t-dashboards">Laporan</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.laporan.index') }}" key="t-full-calendar">Laporan Transaksi</a></li>
                                <li><a href="{{ route('admin.log_laporan.index') }}" key="t-full-calendar">Log Laporan</a></li>
                            </ul>
                    </li>
                    @endif


                </ul>
            </div>
            <!-- Sidebar -->
        </div>
    </div>
