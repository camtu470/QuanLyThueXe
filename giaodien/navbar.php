
        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Mioto</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index_admin.php" class="nav-item nav-link active">Trang Chủ</a>
                       <a href="#" class="nav-item nav-link">Admin : <?php echo isset($_SESSION['TenDangNhap']) ? $_SESSION['TenDangNhap'] : ''; ?></a>
                         
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Cá nhân</a>
                        
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="property-list.html" class="dropdown-item">Profile</a>
                                <a href="property-type.html" class="dropdown-item">Đổi mật khẩu</a>
                            </div>
                        </div>
                     -->
                       
                    </div>
                    
                    <a href="logout.php" class="btn btn-primary px-3 d-none d-lg-flex">Đăng xuất</a>
                </div>
            </nav>
        </div>
        <!-- Navbar End -->