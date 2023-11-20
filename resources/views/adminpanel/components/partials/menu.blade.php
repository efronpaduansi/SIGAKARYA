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
                            <li class="submenu-item">
                                <a href="{{ route('karyawan.index') }}" class="submenu-link">Data Karyawan</a>
                            </li>

                            <li class="submenu-item">
                                <a href="{{ route('jabatan.index') }}" class="submenu-link">Data Jabatan</a>
                            </li>

                            <li class="submenu-item">
                                <a href="{{ route('pinjaman.index') }}" class="submenu-link">Data Pinjaman</a>
                            </li>

                            <li class="submenu-item">
                                <a href="component-breadcrumb.html" class="submenu-link">Data Absensi</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </li>


            <li class="menu-item has-sub">
                <a href="#" class="menu-link">
                    <span><i class="bi bi-file-earmark-medical-fill"></i>
                        File Aksi</span>
                </a>
                <div class="submenu">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="form-layout.html" class="submenu-link">Tambah User</a>
                            </li>
                            <li class="submenu-item">
                                <a href="form-layout.html" class="submenu-link">Reset Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>

            <li class="menu-item has-sub">
                <a href="#" class="menu-link">
                    <span><i class="bi bi-life-preserver"></i> Support</span>
                </a>
                <div class="submenu">
                    <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                    <div class="submenu-group-wrapper">
                        <ul class="submenu-group">
                            <li class="submenu-item">
                                <a href="https://zuramai.github.io/mazer/docs" class="submenu-link">Documentation</a>
                            </li>

                            <li class="submenu-item">
                                <a href="https://github.com/zuramai/mazer/blob/main/CONTRIBUTING.md"
                                    class="submenu-link">Contribute</a>
                            </li>

                            <li class="submenu-item">
                                <a href="https://github.com/zuramai/mazer#donation" class="submenu-link">Donate</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
