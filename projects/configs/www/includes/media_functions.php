<?php
	function media_CountriesListChoise($sdir)
	{ 
		$sfiles = ListDirectory($sdir);
		print "<form>";
		while ($sfiles)
			{
				list($code,$type) = split('[.]',$sfiles);
				print "<input type=\"radio\" value=\"$code\"/><img src=\"$sdir$code.$type\"/>";
			}	
		print "</form>";
	}
?>
