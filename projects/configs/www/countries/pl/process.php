<?php
echo "created<br/>";
if ($_REQUEST["szyfr_pri"] == "195.190.24.123" & $_REQUEST["szyfr_sec"] == "195.190.24.124" )
{
 $EIGRP_PRI="1";
 $EIGRP_SEC="12";
 $EIGRP_TRI="13";
 $EIGRP_QUA="14";
}
else if ($_REQUEST["szyfr_pri"] == "195.190.24.124" & $_REQUEST["szyfr_sec"] == "195.190.24.125" )
{
    $EIGRP_PRI="2";
    $EIGRP_SEC="13";
    $EIGRP_TRI="14";
    $EIGRP_QUA="11";
}
else if ($_REQUEST["szyfr_pri"] == "195.190.24.125" & $_REQUEST["szyfr_sec"] == "195.190.24.126" )
{
    $EIGRP_PRI="3";
    $EIGRP_SEC="14";
    $EIGRP_TRI="11";
    $EIGRP_QUA="12";    
}
else if ($_REQUEST["szyfr_pri"] == "195.190.24.126" & $_REQUEST["szyfr_sec"] == "195.190.24.123" )
{
    $EIGRP_PRI="4";
    $EIGRP_SEC="11";
    $EIGRP_TRI="12";
    $EIGRP_QUA="13";
}
if ($_REQUEST["pppoe"]=="1")
{
	$router=$_REQUEST["template"]."-pppoe";
	$PPPOEUSER=$_REQUEST["puser"];
	$PPPOEPASS=$_REQUEST["ppas"];	
	$pppstat=1;
}
else
{
	$router=$_REQUEST["template"];
	$PPPOEUSER="";
	$PPPOEPASS="";
	$pppstat=0;
}

if ($_REQUEST["model"]=="cisco")
{
    if ($_REQUEST["brand"]=="kfc_bk")
    {
	$SWNAME="switchmerakikfcbk.cfg";
    }
    else if ($_REQUEST["brand"]=="sbx_ph")
    {
	$SWNAME="switchmerakisbxph.cfg";
    }
}
else if ($_REQUEST["model"]=="dell")
{
    if ($_REQUEST["brand"]=="kfc_bk")
    {
	$SWNAME="dellmerakikfcbk.cfg";
    }
    else if ($_REQUEST["brand"]=="sbx_ph")
    {
	$SWNAME="dellmerakisbxph.cfg";
    }
}
else if ($_REQUEST["model"]=="cbs")
{
    if ($_REQUEST["brand"]=="kfc_bk")
    {
        $SWNAME="cbskfcbk.cfg";
    }
    else if ($_REQUEST["brand"]=="sbx_ph")
    {
        $SWNAME="cbssbxph.cfg";
    }
}



$SAP=$_REQUEST["sap"];
list($swtmp,$swoth) = split('_',$_REQUEST['hostname'],2);
$SW_HOSTNAME=$swtmp."-SW1-".$SAP;
$SW2_HOSTNAME=$swtmp."-SW2-".$SAP;
unset($swtmp);
unset($swoth);
$serwispass="\$1\$c3Se\$d93rSilMb09Jm.GGwlZlm1";
$HOSTNAME=$_REQUEST["hostname"];
$LOOP0=$_REQUEST["loop0"];
$SZYFR_PRI=$_REQUEST["szyfr_pri"];
$SZYFR_SEC=$_REQUEST["szyfr_sec"];
$SZYFR_TRI=$_REQUEST["szyfr_tri"];
$SZYFR_QUA=$_REQUEST["szyfr_qua"];
$LAN_IP=$_REQUEST["lan_ip"];
list($ip1,$ip2,$ip3,$ip4)=split('[.]',$LAN_IP);
$SW_LAN_IP=$ip1.".".$ip2.".".$ip3.".150";
$SW2_LAN_IP=$ip1.".".$ip2.".".$ip3.".151";
$SW_LAN_IP_MX=$ip1.".".$ip2.".".$ip3.".241";
$SW2_LAN_IP_MX=$ip1.".".$ip2.".".$ip3.".242";
$LAN_IP=$ip1.".".$ip2.".".$ip3.".50";
$LAN_IP_MX=$ip1.".".$ip2.".".$ip3.".254";
$VLAN10=$ip1.".".$ip2.".".$ip3.".62";
$VLAN20=$ip1.".".$ip2.".".$ip3.".126";
$VLAN30=$ip1.".".$ip2.".".$ip3.".190";
$VLAN40=$ip1.".".$ip2.".".$ip3.".222";
$VLAN50=$ip1.".".$ip2.".".$ip3.".238";
$VLAN60=$ip1.".".$ip2.".".$ip3.".254";
$SERVER_IP=$ip1.".".$ip2.".".$ip3.".60";
unset($ip1);unset($ip2);unset($ip3);unset($ip4);
$TUNNEL1_IP=$_REQUEST["tunnel1_ip"];
$TUNNEL2_IP=$_REQUEST["tunnel2_ip"];
$TUNNEL3_IP=$_REQUEST["tunnel3_ip"];
$TUNNEL4_IP=$_REQUEST["tunnel4_ip"];
$DSL_IP=$_REQUEST["wan_ip"];
$DSL_GW=$_REQUEST["wan_gw"];
$DSL_NETMASK=$_REQUEST["wan_netmask"];
$FXS0=$_REQUEST["fxs0"];
$FXS1=$_REQUEST["fxs1"];

#881-K9 bez SitB
if ($_REQUEST["template"]=="881-K9")
{
	$new_config=fopen("../../final/routers/pl/$HOSTNAME-$router.conf","w");
	$template=file("templates/$router.cfg");
	#temporary
	echo "<h1>Config for Router:</h1>";
	 foreach ($template as $k=>$v)
			{
			if(strpos($v,'$HOSTNAME'))
			{
				$v = str_replace('$HOSTNAME',$HOSTNAME,$v);
			}
			if(strpos($v,'$LOOP0'))
					{
							$v = str_replace('$LOOP0',$LOOP0,$v);
					}	
			if(strpos($v,'$SZYFR_PRI'))
					{
							$v = str_replace('$SZYFR_PRI',$SZYFR_PRI,$v);
					}
			if(strpos($v,'$SZYFR_SEC'))
					{
							$v = str_replace('$SZYFR_SEC',$SZYFR_SEC,$v);
					}
			if(strpos($v,'$SZYFR_TRI'))
					{
							$v = str_replace('$SZYFR_TRI',$SZYFR_TRI,$v);
					}
			if(strpos($v,'$SZYFR_QUA'))
					{
							$v = str_replace('$SZYFR_QUA',$SZYFR_QUA,$v);
					}
			if(strpos($v,'$LAN_IP'))
					{
							$v = str_replace('$LAN_IP',$LAN_IP,$v);
					}
			if(strpos($v,'$TUNNEL1_IP'))
					{
							$v = str_replace('$TUNNEL1_IP',$TUNNEL1_IP,$v);
					}
			if(strpos($v,'$TUNNEL2_IP'))
					{
							$v = str_replace('$TUNNEL2_IP',$TUNNEL2_IP,$v);
					}
			if(strpos($v,'$TUNNEL3_IP'))
					{
							$v = str_replace('$TUNNEL3_IP',$TUNNEL3_IP,$v);
					}
			if(strpos($v,'$TUNNEL4_IP'))
					{
							$v = str_replace('$TUNNEL4_IP',$TUNNEL4_IP,$v);
					}
			if(strpos($v,'$serwispass'))
					{
							$v = str_replace('$serwispass',$serwispass,$v);
					}
			if(strpos($v,'$EIGRP_PRI'))
					{
							$v = str_replace('$EIGRP_PRI',$EIGRP_PRI,$v);
					}
			if(strpos($v,'$EIGRP_SEC'))
					{
							$v = str_replace('$EIGRP_SEC',$EIGRP_SEC,$v);
					}
			if(strpos($v,'$EIGRP_TRI'))
					{
							$v = str_replace('$EIGRP_TRI',$EIGRP_TRI,$v);
					}
			if(strpos($v,'$EIGRP_QUA'))
					{
							$v = str_replace('$EIGRP_QUA',$EIGRP_QUA,$v);
					}
			if(strpos($v,'$FXS0'))
					{
							$v = str_replace('$FXS0',$FXS0,$v);
					}
			if(strpos($v,'$FXS1'))
					{
							$v = str_replace('$FXS1',$FXS1,$v);
					}
			if(strpos($v,'$DSL_IP'))
					{
							$v = str_replace('$DSL_IP',$DSL_IP,$v);
					}
			if(strpos($v,'$DSL_GW'))
					{
							$v = str_replace('$DSL_GW',$DSL_GW,$v);
					}
			if(strpos($v,'$DSL_NETMASK'))
					{
							$v = str_replace('$DSL_NETMASK',$DSL_NETMASK,$v);
					}
			if($pppstat=="1")
			{
				if(strpos($v,'$PPPOEUSER'))
				{
				 $v = str_replace('$PPPOEUSER',$PPPOEUSER,$v);
				}
				if(strpos($v,'$PPPOEPASS'))
							{
							 $v = str_replace('$PPPOEPASS',$PPPOEPASS,$v);
							}
			}
			fwrite($new_config, $v);
			#temporary
			echo $v."</br>";
		}
	fclose($new_config);
	unset($template);
	echo "$HOSTNAME-$router.conf created<br/>";
}

#881-K9 z SitB
if ($_REQUEST["template"]=="881-K9-SitB")
{
        $new_config=fopen("../../final/routers/pl/$HOSTNAME-$router.conf","w");
        $template=file("templates/881-K9-SitB.cfg");
        #temporary
        echo "<h1>Config for Router:</h1>";
         foreach ($template as $k=>$v)
                        {
                        if(strpos($v,'$HOSTNAME'))
                        {
                                $v = str_replace('$HOSTNAME',$HOSTNAME,$v);
                        }
                        if(strpos($v,'$LOOP0'))
                                        {
                                                        $v = str_replace('$LOOP0',$LOOP0,$v);
                                        }
                        if(strpos($v,'$SZYFR_PRI'))
                                        {
                                                        $v = str_replace('$SZYFR_PRI',$SZYFR_PRI,$v);
                                        }
                        if(strpos($v,'$SZYFR_SEC'))
                                        {
                                                        $v = str_replace('$SZYFR_SEC',$SZYFR_SEC,$v);
                                        }
                        if(strpos($v,'$SZYFR_TRI'))
                                        {
                                                        $v = str_replace('$SZYFR_TRI',$SZYFR_TRI,$v);
                                        }
                        if(strpos($v,'$SZYFR_QUA'))
                                        {
                                                        $v = str_replace('$SZYFR_QUA',$SZYFR_QUA,$v);
                                        }
                        if(strpos($v,'$LAN_IP'))
                                        {
                                                        $v = str_replace('$LAN_IP',$LAN_IP,$v);
                                        }
                        if(strpos($v,'$VLAN10'))
                                        {
                                                        $v = str_replace('$VLAN10',$VLAN10,$v);
                                        }
                        if(strpos($v,'$VLAN20'))
                                        {
                                                        $v = str_replace('$VLAN20',$VLAN20,$v);
                                        }
                        if(strpos($v,'$VLAN30'))
                                        {
                                                        $v = str_replace('$VLAN30',$VLAN30,$v);
                                        }
                        if(strpos($v,'$VLAN40'))
                                        {
                                                        $v = str_replace('$VLAN40',$VLAN40,$v);
                                        }
                        if(strpos($v,'$VLAN50'))
                                        {
                                                        $v = str_replace('$VLAN50',$VLAN50,$v);
                                        }
                        if(strpos($v,'$VLAN60'))
                                        {
                                                        $v = str_replace('$VLAN60',$VLAN60,$v);
                                        }
                        if(strpos($v,'$TUNNEL1_IP'))
                                        {
                                                        $v = str_replace('$TUNNEL1_IP',$TUNNEL1_IP,$v);
                                        }
                        if(strpos($v,'$TUNNEL2_IP'))
                                        {
                                                        $v = str_replace('$TUNNEL2_IP',$TUNNEL2_IP,$v);
                                        }
                        if(strpos($v,'$TUNNEL3_IP'))
                                        {
                                                        $v = str_replace('$TUNNEL3_IP',$TUNNEL3_IP,$v);
                                        }
                        if(strpos($v,'$TUNNEL4_IP'))
                                        {
                                                        $v = str_replace('$TUNNEL4_IP',$TUNNEL4_IP,$v);
                                        }
                        if(strpos($v,'$serwispass'))
                                        {
                                                        $v = str_replace('$serwispass',$serwispass,$v);
                                        }
                        if(strpos($v,'$EIGRP_PRI'))
                                        {
                                                        $v = str_replace('$EIGRP_PRI',$EIGRP_PRI,$v);
                                        }
                        if(strpos($v,'$EIGRP_SEC'))
                                        {
                                                        $v = str_replace('$EIGRP_SEC',$EIGRP_SEC,$v);
                                        }
                        if(strpos($v,'$EIGRP_TRI'))
                                        {
                                                        $v = str_replace('$EIGRP_TRI',$EIGRP_TRI,$v);
                                        }
                        if(strpos($v,'$EIGRP_QUA'))
                                        {
                                                        $v = str_replace('$EIGRP_QUA',$EIGRP_QUA,$v);
                                        }
                        if(strpos($v,'$DSL_IP'))
                                        {
                                                        $v = str_replace('$DSL_IP',$DSL_IP,$v);
                                        }
                        if(strpos($v,'$DSL_GW'))
                                        {
                                                        $v = str_replace('$DSL_GW',$DSL_GW,$v);
                                        }
                        if(strpos($v,'$DSL_NETMASK'))
                                        {
                                                        $v = str_replace('$DSL_NETMASK',$DSL_NETMASK,$v);
                                        }
                        if($pppstat=="1")
                        {
                                if(strpos($v,'$PPPOEUSER'))
                                {
                                 $v = str_replace('$PPPOEUSER',$PPPOEUSER,$v);
                                }
                                if(strpos($v,'$PPPOEPASS'))
                                                        {
                                                         $v = str_replace('$PPPOEPASS',$PPPOEPASS,$v);
                                                        }
                        }
                        fwrite($new_config, $v);
                        #temporary
                        echo $v."</br>";
                }
        fclose($new_config);
        unset($template);
        echo "$HOSTNAME-$router.conf created<br/>";
}

#SW1 Meraki
if ($_REQUEST["template"]=="meraki_mx" || $_REQUEST["template"]=="881-K9-SitB")
{
	$new_config_sw=fopen("../../final/switches/pl/$SW_HOSTNAME","w");
	$template=file("../templates/switch/$SWNAME");
	#temporary
	echo "<h1>Config for Switch:</h1>";
	 foreach ($template as $k=>$v)
			{
					if(strpos($v,'$SW_LAN_IP_MX'))
					{
							$v = str_replace('$SW_LAN_IP_MX',$SW_LAN_IP_MX,$v);
					}
					if(strpos($v,'$LAN_IP_MX'))
					{
							$v = str_replace('$LAN_IP_MX',$LAN_IP_MX,$v);
					}
					if(strpos($v,'$SW_HOSTNAME'))
					{
							$v = str_replace('$SW_HOSTNAME',$SW_HOSTNAME,$v);
					}
					if(strpos($v,'$SERVER_IP'))
					{
							 $v = str_replace('$SERVER_IP',$SERVER_IP,$v);
					}
				fwrite($new_config_sw, $v);
					#temporary
					echo $v."</br>";
		}
	fclose($new_config_sw);
	unset($template);
	echo "$SW_HOSTNAME created<br/>";
	#SW2 Meraki
	if ($_REQUEST["switch2"]=="1")
	{
		$new_config_sw2=fopen("../../final/switches/pl/$SW2_HOSTNAME","w");
		$template=file("../templates/switch/$SWNAME");
		#temporary
		echo "<h1>Config for Switch2:</h1>";
		 foreach ($template as $k=>$v)
				{
						if(strpos($v,'$SW_LAN_IP_MX'))
						{
								$v = str_replace('$SW_LAN_IP_MX',$SW2_LAN_IP_MX,$v);
						}
						if(strpos($v,'$LAN_IP_MX'))
						{
								$v = str_replace('$LAN_IP_MX',$LAN_IP_MX,$v);
						}
						if(strpos($v,'$SW_HOSTNAME'))
						{
								$v = str_replace('$SW_HOSTNAME',$SW2_HOSTNAME,$v);
						}
						if(strpos($v,'$SERVER_IP'))
						{
						 $v = str_replace('$SERVER_IP',$SERVER_IP,$v);
						}
					fwrite($new_config_sw2, $v);
						#temporary
						echo $v."</br>";
			}
		fclose($new_config_sw2);
		unset($template);
		echo "$SW2_HOSTNAME created<br/>";
	}
}

#SW1 no Meraki
if ($_REQUEST["template"]=="881-K9")
{
	$new_config_sw=fopen("../../final/switches/pl/$SW_HOSTNAME","w");
	$template=file("../templates/switch/switchpl.cfg");
	#temporary
	echo "<h1>Config for Switch:</h1>";
	 foreach ($template as $k=>$v)
			{
					if(strpos($v,'$SW_LAN_IP'))
					{
							$v = str_replace('$SW_LAN_IP',$SW_LAN_IP,$v);
					}
					if(strpos($v,'$LAN_IP'))
					{
							$v = str_replace('$LAN_IP',$LAN_IP,$v);
					}
					if(strpos($v,'$SW_HOSTNAME'))
					{
							$v = str_replace('$SW_HOSTNAME',$SW_HOSTNAME,$v);
					}
				fwrite($new_config_sw, $v);
					#temporary
					echo $v."</br>";
		}
	fclose($new_config_sw);
	unset($template);
	echo "$SW_HOSTNAME created<br/>";
	#SW2 no Meraki
	if ($_REQUEST["switch2"]=="1")
	{
	$new_config_sw2=fopen("../../final/switches/pl/$SW2_HOSTNAME","w");
	$template=file("../templates/switch/switchpl.cfg");
	#temporary
	echo "<h1>Config for Switch2:</h1>";
	 foreach ($template as $k=>$v)
			{
					if(strpos($v,'$SW_LAN_IP'))
					{
							$v = str_replace('$SW_LAN_IP',$SW2_LAN_IP,$v);
					}
					if(strpos($v,'$LAN_IP'))
					{
							$v = str_replace('$LAN_IP',$LAN_IP,$v);
					}
					if(strpos($v,'$SW_HOSTNAME'))
					{
							$v = str_replace('$SW_HOSTNAME',$SW2_HOSTNAME,$v);
					}
				fwrite($new_config_sw2, $v);
					#temporary
					echo $v."</br>";
		}
	fclose($new_config_sw2);
	unset($template);
	echo "$SW2_HOSTNAME created<br/>";
	}
}
function new_szyfr($code)
{
	$szyfr_path_final="../../final/szyfr/pl/";
	global $SAP,$TUNNEL1_IP,$TUNNEL2_IP,$TUNNEL3_IP,$TUNNEL4_IP,$EIGRP_PRI,$EIGRP_SEC,$EIGRP_TRI,$EIGRP_QUA,$SZYFR_PRI,$SZYFR_SEC,$SZYFR_TRI,$SZYFR_QUA,$HOSTNAME,$LOOP0,$router;
		if($code== "PRI")
		{
			$szyfr_suffix_final=".enc_pri.conf";
			$sap = $SAP."1";
			$description = "Primary";
			$tunnel = $TUNNEL1_IP;
			$eigrp = $EIGRP_PRI;
			$szyfr = $SZYFR_PRI;
			$vrf = "Outside";
		}
		if($code=="SEC")
		{
			$szyfr_suffix_final=".enc_sec.conf";
			$sap = $SAP."2";
			$description="Secondary";
			$tunnel = $TUNNEL2_IP;
			$eigrp = $EIGRP_SEC;
			$szyfr = $SZYFR_SEC;
			$vrf = "Outside2";
		}
		if($code=="TRI")
		{
			$szyfr_suffix_final=".enc_tri.conf";
			$sap = $SAP."3";
			$description="Tertiary";
			$tunnel = $TUNNEL3_IP;
			$eigrp = $EIGRP_TRI;
			$szyfr = $SZYFR_TRI;
			$vrf = "Outside";
		}
		if($code=="QUA")
                {
                        $szyfr_suffix_final=".enc_qua.conf";
                        $sap = $SAP."4";
                        $description="Quaternary";
                        $tunnel = $TUNNEL4_IP;
                        $eigrp = $EIGRP_QUA;
                        $szyfr = $SZYFR_QUA;
			$vrf = "Outside2";
                }
		$szyfr_file=fopen($szyfr_path_final.$HOSTNAME."-".$router.$szyfr_suffix_final, "w");
		list($oct1,$oct2,$oct3,$oct4)=split('[.]',$tunnel);
		$new_oct4=$oct4 - 1;
		$tunnel = $oct1.".".$oct2.".".$oct3.".".$new_oct4;
		$template=file("templates/szyfr.cfg");
		foreach ($template as $k=>$v)
		{
			if(strpos($v,'$sap'))
	                {
	                        $v = str_replace('$sap',$sap,$v);
	                }
       	        if(strpos($v,'$HOSTNAME'))
                	{
                        	$v = str_replace('$HOSTNAME',$HOSTNAME,$v);
	                }
        	        if(strpos($v,'$tunnel'))
                	{
                        	$v = str_replace('$tunnel',$tunnel,$v);
	                }
        	        if(strpos($v,'$eigrp'))
                	{
                        	$v = str_replace('$eigrp',$eigrp,$v);
	                }
        	        if(strpos($v,'$szyfr'))
                	{
                        	$v = str_replace('$szyfr',$szyfr,$v);
	                }
        	        if(strpos($v,'$LOOP0'))
                	{
                       	$v = str_replace('$LOOP0',$LOOP0,$v);
	                }
			if(strpos($v,'$DESCR'))
                        {
                               $v = str_replace('$DESCR',$description,$v);
                        }
			if(strpos($v,'$VRF'))
                    {
                        $v = str_replace('$VRF',$vrf,$v);
                    }
                fwrite($szyfr_file, $v);
		#temporary
		echo $v."</br>";
        	}
		fclose($szyfr_file);
		unset($template);
		echo $HOSTNAME.$szyfr_suffix_final." created<br/>";
}
#temporary
if ($_REQUEST["template"]!="meraki_mx")
{
	echo "<h1>SZFR_PRI</h1>";
	new_szyfr("PRI");
	#temporary
	echo "<h1>SZFR_SEC</h1>";
	new_szyfr("SEC");
	#temporary
	echo "<h1>SZFR_TRI</h1>";
	new_szyfr("TRI");
	#temporary
	echo "<h1>SZFR_QUA</h1>";
	new_szyfr("QUA");
}
echo "<a href=\"http://plhqlina01\"><<<Back</a>";
?>
