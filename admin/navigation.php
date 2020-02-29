<?php 
include 'root.php';
echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/navigation.css">';
?>

<script src="https://kit.fontawesome.com/78b37ab1e1.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<div id="nav-container">
            <div class="nav_div">

                <nav id="navigation">
                    <div class="profile">
                        <div id="aspect-ratio">
                            <!-- New div for aspect-ratio -->
                            <div class="user_img">
                                <img src="<?php echo $baseLocation ?>/images/index.jfif" id="profile_img" alt="profile"><br>
                            </div>
                            <div class="user_id">
                                <h4 style="color: #fff">username</h4>
                            </div>
                        </div>
                    </div>

                    <div class="nav_list" id="nav_list">
                        <ul>
                            <li class="button">
                                <a href="#">
                                    <span class="logo"><i class="fas fa-bars"></i></span>
                                    <span class="title">Collapse</span>
                                </a>
                            </li>
                            <li class="list">
                                <?php echo "<a href='$baseLocation/admin/' class='nav-item'>" ?>
                                    <span class="logo"> <i class="fas fa-home"></i></span>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li class="list">
                                <?php echo "<a href='$baseLocation/admin/users' class='nav-item'>" ?>
                                    <span class="logo"><i class="far fa-user"></i></span>
                                    <span class="title">User</span>
                                </a>
                            </li>
                            <li class="list">
                                <a class="nav-item" href="#">
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
                            <img src="<?php echo $baseLocation ?>/images/logo/finallogo.png" id="university_logo" alt="university logo" width="200px">
                        </div>
                    </div>
                </nav>
                
            </div>
        </div>
        