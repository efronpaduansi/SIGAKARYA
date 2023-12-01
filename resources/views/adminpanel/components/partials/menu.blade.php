<nav class="main-navbar">
    <div class="container">
        <ul>
            <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
                <a href="{{ url('/home') }}" class="menu-link">
                    <span><i class="bi bi-grid-fill"></i> Dashboard</span>
                </a>
            </li>

            <li
                class="menu-item has-sub {{ request()->is('karyawan') || request()->is('karyawan/*') || request()->is('jabatan') || request()->is('pinjaman') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <span><i class="bi bi-stack"></i> File Master</span>
                </a>
                <div class="submenu">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'bendahara')
                                <li class="submenu-item">
                                    <a href="{{ route('karyawan.index') }}" class="submenu-link">Data Karyawan</a>
                                </li>

                                <li class="submenu-item">
                                    <a href="{{ route('jabatan.index') }}" class="submenu-link">Data Jabatan</a>
                                </li>
                            @endif

                            <li class="submenu-item">
                                <a href="{{ route('pinjaman.index') }}" class="submenu-link">Data Pinjaman</a>
                            </li>

                            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'bendahara')
                                <li class="submenu-item">
                                    <a href="{{ route('absensi.index') }}" class="submenu-link">Data Absensi</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </li>

            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'bendahara')
                <li class="menu-item has-sub  {{ request()->is('users') ? 'active' : '' }}">
                    <a href="#" class="menu-link">
                        <span><i class="bi bi-file-earmark-medical-fill"></i>
                            File Aksi</span>
                    </a>
                    <div class="submenu">
                        <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                        <div class="submenu-group-wrapper">
                            <ul class="submenu-group">
                                <li class="submenu-item">
                                    <a href="{{ route('users.index') }}" class="submenu-link">User Manajemen</a>
                                </li>
    {{--                            <li class="submenu-item">--}}
    {{--                                <a href="form-layout.html" class="submenu-link">Reset Password</a>--}}
    {{--                            </li>--}}
                            </ul>
                        </div>
                    </div>
                </li>
            @endif

            <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
                <a href="{{ url('/absensi-karyawan') }}" class="menu-link">
                    <span><i class="fas fa-clock"></i> Absensi</span>
                </a>
            </li>

            <li class="menu-item {{ request()->is('timesheet/*') ? 'active' : '' }}">
                <a href="{{ url('/timesheet') }}" class="menu-link">
                    <span><i class="fas fa-business-time"></i> Leave & Cuti</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
