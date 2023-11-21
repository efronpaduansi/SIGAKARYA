<div class="header-top">
    <div class="container">
        <div class="logo">
            {{-- <a href="index.html"><img src="./assets/compiled/svg/logo.svg" alt="Logo" /></a> --}}
            <h2>SIGAKARYA</h2>
            <p>Sistem Penggajian Karyawan</p>
        </div>
        <div class="header-top-right">
            <div class="dropdown">
                <a href="#" id="topbarUserDropdown"
                    class="user-dropdown d-flex align-items-center dropend dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <div class="avatar avatar-md2">
                        <img src="{{ asset('adminpanel/assets/compiled/jpg/1.jpg') }}" alt="Avatar" />
                    </div>
                    <div class="text">
                        <h6 class="user-dropdown-name text-capitalize">{{ Auth::user()->name }}</h6>
                        <p class="user-dropdown-status text-sm text-muted text-capitalize">
                            {{ Auth::user()->role }}
                        </p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                    <li><a class="dropdown-item" href="{{ route('profile.index') }}"><i class="bi bi-person"></i> Profil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Pengaturan</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" onclick="return confirm('Keluar dari aplikasi?')"
                                class="dropdown-item text-danger"><i class="bi bi-box-arrow-right"></i> Logout </button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Burger button responsive -->
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </div>
    </div>
</div>
