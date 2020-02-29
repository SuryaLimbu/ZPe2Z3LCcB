<?php
require '../include/init.php';

if (isset($_GET['page'])) {
    require '../pages/'.$_GET['page'].'.php';
}
$contents = [
    'title'=>$title,
    'navigation'=>$navigation,
    'body'=>$body
];


echo loadTemplate('../templates/homeLayout.php',$contents);