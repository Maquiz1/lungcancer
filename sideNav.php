        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="dashboard.php" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/logo.png" alt="logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="dashboard.php" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Main</li>

                    <li class="side-nav-item">
                        <a href="dashboard.php" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <span class="badge bg-success float-end">9+</span>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebarMultiLevel" aria-expanded="false" aria-controls="sidebarMultiLevel" class="side-nav-link">
                            <i class="ri-share-line"></i>
                            <span> Clients </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebarMultiLevel">
                            <ul class="side-nav-second-level">
                                <!-- <li>
                                    <a href="add.php?id=2&btn=Add">Add new Client</a>
                                </li> -->
                               
                                <li class="side-nav-item">
                                    <a data-bs-toggle="collapse" href="#sidebarSecondLevel2" aria-expanded="false" aria-controls="sidebarSecondLevel2">
                                        <span> Clients Management </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="collapse" id="sidebarSecondLevel2">
                                        <ul class="side-nav-third-level">
                                            <?php foreach ($override->getNews('sites', 'status', 1, 'id', $user->data()->site_id) as $value) { ?>
                                                <li>
                                                    <a href="info.php?id=4&site_id=<?= $value['id']; ?>"><?= $value['name']; ?></a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Bootstrap Wizard Form js -->
        <script src="assets/vendor/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

        <!-- Wizard Form Demo js -->
        <script src="assets/js/pages/form-wizard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>