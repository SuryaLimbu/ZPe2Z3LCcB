    <link rel="stylesheet" type="text/css" href="../css/navigation.css">
    <script src="https://kit.fontawesome.com/78b37ab1e1.js" crossorigin="anonymous"></script>
    <div id="nav-container">
        <div class="nav_div">

            <nav id="navigation">
                <div class="profile">
                    <div id="aspect-ratio">
                        <!-- New div for aspect-ratio -->
                        <div class="user_img">
                            <img src="../images/index.jfif" id="profile_img" alt="profile"><br>
                        </div>
                    </div>
                </div>
                <span id="user-name"><i class="fas fa-user-cog"></i> <br>User Name</span>

                <div class="nav_list" id="nav_list">
                    <ul>
                        <li class="button">
                            <a href="#">
                                <span class="logo"><i class="fas fa-bars"></i></span>
                                <span class="title">Collapse</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href='?page=dashboard' <?php echo ($_GET['page'] == 'dashboard') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                                <span class="logo"> <i class="fas fa-home"></i></span>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href='?page=user' <?php echo ($_GET['page'] == 'user') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                                <span class="logo"><i class="far fa-user"></i></span>
                                <span class="title">User</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href='?page=module' <?php echo ($_GET['page'] == 'module') ? "class='nav-item active'" : "class='nav-item'"; ?>>
                                <span class="logo"><i class="fas fa-server"></i></span>
                                <span class="title">Modules</span>
                            </a>
                        </li>
                        <li class="list">
                            <a class="nav-item" href="#">
                                <span class="logo"><i class="fas fa-book-open"></i></span>
                                <span class="title">Course Materials</span>
                            </a>
                        </li>
                        <li class="list">
                            <a class="nav-item" href="#">
                                <span class="logo"><i class="far fa-clipboard"></i></span>
                                <span class="title">Assignments</span>
                            </a>
                        </li>
                        <li class="list">
                            <a class="nav-item" href="#">
                                <span class="logo"><i class="fas fa-archive"></i></span>
                                <span class="title">Archive</span>
                            </a>
                        </li>
                        <li class="list">
                            <a class="nav-item" href="#">
                                <span class="logo"><i class="far fa-envelope"></i></span>
                                <span class="title">Messages</span>
                            </a>
                        </li>
                        <li class="list">
                            <a class="nav-item" href="#">
                                <span class="logo"><i class="fas fa-desktop"></i></span>
                                <span class="title">Activities</span>
                            </a>
                        </li>
                        <li class="list">
                            <a class="nav-item" href="#">
                                <span class="logo"><i class="fas fa-calendar"></i></span>
                                <span class="title">Calender</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="logo_container">
                    <div class="logo">
                        <img src="../images/logo/finallogo.png" id="university_logo" alt="university logo" width="200px">
                    </div>
                </div>
            </nav>

        </div>
    </div>