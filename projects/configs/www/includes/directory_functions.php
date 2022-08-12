<?php
function show_dir_files($country,$sdir) 
{
	$path_to="projects/configs/www/countries/$country/final/";
	$path_to=$path_to.$sdir;	
	$dh = opendir($path_to);
while (($file = readdir ($dh))) 
{
	if ($file != "." && $file != "..") 
	{
		echo "<option>$file</option>";
	}
}
closedir($dh);
}

