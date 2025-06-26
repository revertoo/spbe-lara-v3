@auth
    <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="https://spbe.denpasarkota.go.id/">{{ env('APP_NAME') }}</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
                <a href="https://spbe.denpasarkota.go.id/">{{ env('APP_NAME') }}</a>
            </div>
            <ul class="sidebar-menu">
                @role('superadmin|admin-aplikasi|viewer-spbe|viewer-all')
                    <li class="menu-header">Dashboard</li>
                @endrole
                @role('superadmin|admin-aplikasi|viewer-aplikasi|viewer-all')
                    <li class="{{ Request::is('dashboard/aplikasi') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.aplikasi') }}"><i
                                class="fas fa-tachometer-alt"></i><span>Dashboard
                                Aplikasi</span></a>
                    </li>
                @endrole
                @role('superadmin|admin-spbe')
                    <li class="{{ Request::is('dashboard/spbe') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard.spbe') }}"><i class="fas fa-columns"></i><span>Dashboard
                                SPBE</span></a>
                    </li>
                @endrole

                @role('superadmin|admin-aplikasi|operator-aplikasi|viewer-aplikasi|viewer-all')
                    <li class="menu-header">Aplikasi</li>
                    <li class="{{ Request::is('admin/application*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.application.index') }}"><i class="fas fa-globe"></i><span>Data
                                Aplikasi</span></a>
                    </li>
                    <li class="{{ Request::is('admin/subdomain*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.subdomain.index') }}"><i
                                class="fas fa-archive"></i><span>Portal
                                CMS</span></a>
                    </li>
                    <li class="{{ Request::is('admin/appdesa*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.appdesa.index') }}"><i
                                class="fas fa-window-maximize"></i><span>Aplikasi Desa</span></a>
                    </li>
                    <li class="{{ Request::is('admin/applain*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.applain.index') }}"><i class="fas fa-box"></i><span>Aplikasi
                                Lainnya</span></a>
                    </li>
                    <li class="{{ Request::is('admin/monevapp*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.monevapp.index') }}"><i
                                class="fas fa-clipboard-check"></i><span>Monev
                                Aplikasi</span></a>
                    </li>
                @endrole

                @role('superadmin|admin-aplikasi|admin-spbe')
                    <li class="menu-header">Master Data</li>
                @endrole
                @role('superadmin|admin-aplikasi')
                    <li class="nav-item dropdown {{ Request::is('masterapp*') ? 'active' : '' }}">
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-archway"></i>
                            <span>Master Aplikasi</span></a>
                        <ul class="dropdown-menu">
                            <li class="{{ Request::is('masterapp/katapp*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.katapp.index') }}">Kategori Aplikasi</a>
                            </li>
                            <li class="{{ Request::is('masterapp/katdb*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.katdb.index') }}">Kategori Database</a>
                            </li>
                            <li class="{{ Request::is('masterapp/katserver*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.katserver.index') }}">Kategori Server</a>
                            </li>
                            <li class="{{ Request::is('masterapp/katplatform*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.katplatform.index') }}">Kategori Platform</a>
                            </li>
                            <li class="{{ Request::is('masterapp/katpengguna*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.katpengguna.index') }}">Kategori Penggunaan</a>
                            </li>
                            <li class="{{ Request::is('masterapp/bahasaprogram*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.bahasaprogram.index') }}">Bahasa Pemrograman</a>
                            </li>
                            <li class="{{ Request::is('masterapp/frameworkapp*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.frameworkapp.index') }}">Framework Aplikasi</a>
                            </li>
                            <li class="{{ Request::is('masterapp/layananapp*') ? 'active' : '' }}"><a class="nav-link"
                                    href="{{ route('masterapp.layananapp.index') }}">Layanan Aplikasi</a>
                            </li>
                        </ul>
                    </li>
                @endrole

                @role('superadmin')
                    <li class="menu-header">Add On</li>
                    <li class="{{ Request::is('admin/faq*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.faq.index') }}"><i
                                class="fas fa-question-circle"></i><span>FAQ</span></a>
                    </li>
                    <li class="{{ Request::is('admin/changelog*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.changelog.index') }}"><i
                                class="fas fa-history"></i><span>Change Log</span></a>
                    </li>
                @endrole

                @role('superadmin|admin-aplikasi|admin-spbe')
                    <li class="menu-header">Settings</li>
                @endrole
                @role('superadmin|admin-aplikasi|admin-spbe')
                    <li class="{{ Request::is('admin/user*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.user.index') }}"><i
                                class="fas fa-users"></i><span>Users</span></a>
                    </li>
                @endrole
                @role('superadmin')
                    <li class="{{ Request::is('admin/role*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.role.index') }}"><i
                                class="fas fa-user-cog"></i><span>Roles</span></a>
                    </li>
                    <li class="{{ Request::is('admin/permission*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.permission.index') }}"><i
                                class="fas fa-lock-open"></i><span>Permission</span></a>
                    </li>
                    <li class="{{ Request::is('admin/opd*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.opd.index') }}"><i
                                class="fas fa-building"></i><span>Perangkat
                                Daerah</span></a>
                    </li>
                @endrole

                @if (Auth::user()->role == 'superadmin')
                    <li class="menu-header">Hak Akses</li>
                    <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Hak
                                Akses</span></a>
                    </li>
                @endif
            </ul>
        </aside>
    </div>
@endauth
