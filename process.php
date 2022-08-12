<?php
$url="Location: index.php";
if ($_REQUEST["country"])
{
$url="Location: projects/configs/www/countries/".$_REQUEST["country"]."/config.php";
header($url);
}
else
{
header($url);
}
?>
