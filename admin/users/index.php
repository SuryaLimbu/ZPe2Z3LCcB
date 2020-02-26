<?php 
$base = "../../" ;
include $base."/include/footer.php";?>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<body>
    <div class="container_fluid">
        <?php include $base."/admin/navigation.php"; 
        echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/style.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/admin.css">';
        echo '<link rel="stylesheet" type="text/css" href="'.SCRIPT_ROOT.'/css/searchBar.css">';
        ?>


        <div class="main_body">
            <?php include $base."/include/searchBar.php"; ?>
            <!-- </div> -->
            <?php include 'body.php'?>
            <?php include $base."/include/footer.php";?>
        </div> <!-- div for main_body -->
    </div>
</body>