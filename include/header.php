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


    <!-- custom css links -->
    <link rel="stylesheet" href="<?php echo $css_path ?>css/style.css" />
    <link rel="stylesheet" href="<?php echo $css_path ?>css/admin.css" />
    <link rel="stylesheet" href="<?php echo $css_path ?>css/searchBar.css" />
    <link rel="stylesheet" href="<?php echo $css_path ?>css/navigation.css" />



    <!-- pie chart js links -->
    <script src="script/pie_chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- jquery cdn link -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <title>navigation bar</title>

</head>

<body>
    <div class="container_fluid">

        <?php include 'navigation.php' ?>
        <div class="main_body">


            <div class="search_bar">
                <div class="search">
                    <i class="fa fa-search searchIcon"></i>
                    <input type="text" class="search_field" name="search_bar" placeholder="Search">
                </div>
                <div class="imp_icons">

                    <label class="logout">
                        <a href=""><i class="fas fa-sign-out-alt"></i></a>
                        
                    </label>
                </div>
            </div>
        <!-- </div> -->
    <!-- </div> -->