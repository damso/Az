<?php
$url="Location: http://plhqlina01";
if ($_REQUEST["country"])
{
$url="Location: http://plhqlina01/projects/configs/www/countries/".$_REQUEST["country"]."/config.php";
header($url);
}
else
{
header($url);
}
?>
