<?php
$css_path = '../';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icons css link -->
    <script src="https://kit.fontawesome.com/78b37ab1e1.js" crossorigin="anonymous"></script>


    <!-- custome css links -->
    <link rel="stylesheet" href="<?php echo $css_path ?>css/style.css" />
    <link rel="stylesheet" href="<?php echo $css_path ?>css/admin.css" />

    <!-- pie char js links -->
    <script src="script/pie_chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- jquery cnd link -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <title>navigation bar</title>

</head>

<body>
    <div class="container_fluid">
        <!-- div end in footer file-->
        <div id="nav-container">
            <div class="nav_div">

                <nav id="navigation">
                    <div class="profile">
                        <div id="aspect-ratio">
                            <!-- New div for aspect-ratio -->
                            <div class="user_img">
                                <img src="<?php echo $css_path ?>images/index.jfif" id="profile_img" alt="profile"><br>
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
                                <a class="nav-item" href="#">
                                    <span class="logo"> <i class="fas fa-home"></i></span>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li class="list">
                                <a class="nav-item" href="#">
                                    <span class="logo"><i class="fas fa-upload"></i></span>
                                    <span class="title">Upload</span>
                                </a>
                            </li>
                            <li class="list">
                                <a class="nav-item" href="#">
                                    <span class="logo"><i class="far fa-clipboard"></i></span>
                                    <span class="title">Assign</span>
                                </a>
                            </li>
                            <li class="list">
                                <a class="nav-item" href="#">
                                    <span class="logo"><i class="fas fa-envelope"></i></span>
                                    <span class="title">Message</span>
                                </a>
                            </li>
                            <li class="list">
                                <a class="nav-item" href="#">
                                    <span class="logo"><i class="far fa-chart-bar"></i></span>
                                    <span class="title">Anylize</span>
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

                </nav>
                <div class="logo_container">
                    <div class="logo">
                        <img src="<?php echo $css_path ?>images/logo/finallogo.png" id="university_logo" alt="university logo" width="200px">
                    </div>
                </div>
            </div>
        </div>
        <div class="main_body">
            <!-- div end in footer file-->

            <div class="search_bar">
                <div class="search">
                    <i class="fa fa-search searchIcon"></i>
                    <input type="text" class="search_field" name="search_bar" placeholder="Search">
                </div>
                <div class="imp_icons">
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                    <label class="logout">
                        <a href=""><i class="fas fa-sign-out-alt"></i></a>
                        
                    </label>

                </div>


            </div>