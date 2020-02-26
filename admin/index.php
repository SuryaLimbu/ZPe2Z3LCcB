<?php
 $base = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icons css link -->

    <!-- custom css links -->
    <link rel="stylesheet" href="../css/navigation.css" />
    <link rel="stylesheet" href="<?php echo $base ?>css/style.css" />
    <link rel="stylesheet" href="<?php echo $base ?>css/admin.css" />

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
        <?php include $base.'/include/searchBar.php'; ?>
        <!-- </div> -->
    <!-- </div> -->
    <?php include $base."/include/footer.php";?>
        </div> <!-- div for main_body -->
 </div>
</body>