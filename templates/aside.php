            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="../view_admin/dashboard.php" class="app-brand-link">
                        <img src="../assets/img/logo.png" class="app-brand-logo demo" width="25">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">TOKO KIKI</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="../view_admin/dashboard.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Karyawan</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-circle"></i>
                            <div data-i18n="Account Settings">Data Karyawan</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="../view_karyawan/jabatan.php" class="menu-link">
                                    <div data-i18n="Account">Jabatan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="../view_karyawan/karyawan.php" class="menu-link">
                                    <div data-i18n="Notifications">Karyawan</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Gaji</span></li>
                    <li class="menu-item">
                        <a href="../view_gaji/gaji.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-collection"></i>
                            <div data-i18n="Basic">Input Gaji</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase"><span class="menu-header-text">PENGGUNA</span></li>
                    <li class="menu-item">
                        <a href="../view_user/users.php" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Tables">Pengguna</div>
                        </a>
                    </li>
                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Menu</span></li>
                    <li class="menu-item">
                        <a href="../logout.php" class="menu-link" onclick="return confirm('Yakin ingin keluar dari aplikasi?');">
                            <i class="menu-icon tf-icons bx bx-power-off"></i>
                            <div data-i18n="Support">Logout</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->