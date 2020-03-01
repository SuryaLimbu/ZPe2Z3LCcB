<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icons css link -->

    <!-- custom css links -->
    <link rel="stylesheet" href="../css/navigation.css" />
    <link rel="stylesheet" href="../css/searchBar.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/admin.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">
    <!-- pie chart js links -->
    <script src="../script/pie_chart.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- jquery cdn link -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="../icon.png" />
</head>

<body>
    <div class="container_fluid">

        <?php echo $navigation; ?>
        <div class="main_body">
            <div class="search_bar">
                <div class="search">
                    <i class="fa fa-search searchIcon"></i>
                    <input type="text" class="search_field" name="search_bar" placeholder="Search">
                </div>
                <div class="imp_icons">
                        <a href="../"><i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
            <div id="contentBody">
                <?php echo $body; ?>
            </div>
            <script src='../script/JQuery.js'></script>
            <script src='../script/javascript.js'></script>
        </div> <!-- div for main_body -->
    </div>
</body>