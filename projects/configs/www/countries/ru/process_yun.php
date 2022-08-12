<?php
#list($oct1,$oct2,$oct3,$oct4)=split('[.]', $_REQUEST["szyfr_pri"]);
#echo $oct4;
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
#DMVPN Yum warunki
$DMVPN_SOURCE=$_REQUEST["dmvpn_source"];

if ($_REQUEST["dmvpn_source"] == "FastEthernet4")
{
	$YUM_GW = $_REQUEST["wan_gw"];
}else
{
	$YUM_GW = "192.168.0.1";
}




$router=$_REQUEST["template"];
$PPPOEUSER="";
$PPPOEPASS="";
$pppstat=0;
	
$SW_HOSTNAME="SW_".$_REQUEST['hostname'];
$SW_SNMP_COMMUNITY="R0snmp\$trRest";
$SAP=$_REQUEST["sap"];
$serwispass="\$1\$c3Se\$d93rSilMb09Jm.GGwlZlm1";
$HOSTNAME=$_REQUEST["hostname"];
$LOOP0=$_REQUEST["loop0"];
$SZYFR_PRI=$_REQUEST["szyfr_pri"];
$SZYFR_SEC=$_REQUEST["szyfr_sec"];
$SZYFR_TRI=$_REQUEST["szyfr_tri"];
$LAN_IP=$_REQUEST["lan_ip"];
$TUNNEL1_IP=$_REQUEST["tunnel1_ip"];
$TUNNEL2_IP=$_REQUEST["tunnel2_ip"];
$TUNNEL3_IP=$_REQUEST["tunnel3_ip"];
$DSL_IP=$_REQUEST["wan_ip"];
$DSL_GW=$_REQUEST["wan_gw"];
$DSL_NETMASK=$_REQUEST["wan_netmask"];
$DMVPN_IP=$_REQUEST["dmvpn_ip"];
$DMVPN_MASK=$_REQUEST["dmvpn_mask"];

$new_config=fopen("../../final/routers/ru/$HOSTNAME-$router.conf","w");
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
		if(strpos($v,'$DMVPN_IP'))
                {
                        $v = str_replace('$DMVPN_IP',$DMVPN_IP,$v);
                }
		if(strpos($v,'$DMVPN_MASK'))
                {
                        $v = str_replace('$DMVPN_MASK',$DMVPN_MASK,$v);
                }
		if(strpos($v,'$DMVPN_SOURCE'))
                {
                        $v = str_replace('$DMVPN_SOURCE',$DMVPN_SOURCE,$v);
                }
		if(strpos($v,'$YUM_GW'))
                {
                        $v = str_replace('$YUM_GW',$YUM_GW,$v);
                }
		fwrite($new_config, $v);
		#temporary
		echo $v."</br>";
	}
fclose($new_config);
unset($template);
echo "$HOSTNAME-$router.conf created<br/>";
function new_szyfr($code)
{
	$szyfr_path_final="../../final/szyfr/ru/";
	global $SAP,$TUNNEL1_IP,$TUNNEL2_IP,$TUNNEL3_IP,$EIGRP_PRI,$EIGRP_SEC,$EIGRP_TRI,$SZYFR_PRI,$SZYFR_SEC,$SZYFR_TRI,$HOSTNAME,$LOOP0,$router;
		if($code== "PRI")
		{
			$szyfr_suffix_final=".enc_pri.conf";
			$sap = $SAP."1";
			$description = "Primary";
			$tunnel = $TUNNEL1_IP;
			$eigrp = $EIGRP_PRI;
			$szyfr = $SZYFR_PRI;
			$delay = "delay 100";
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
			$delay = "";
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
			$delay = "delay 60000";
			$vrf = "Outside";
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
			if(strpos($v,'$delay'))
                        {
                                $v = str_replace('$delay',$delay,$v);
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
echo "<h1>SZFR_PRI</h1>";
new_szyfr("PRI");
#temporary
echo "<h1>SZFR_SEC</h1>";
new_szyfr("SEC");
#temporary
echo "<h1>SZFR_TRI</h1>";
new_szyfr("TRI");
#temporary
echo "<h1>VPN_GATE</h1>";
$new_csp=fopen("../../final/vpngate/ru/$HOSTNAME.vpngate.conf","w");
$template=file("templates/csp.cfg");
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
                fwrite($new_csp, $v);
		#temporary
		echo $v."</br>";
	}
fclose($new_csp);
unset($template);
echo $HOSTNAME.".vpngate.conf created</br>";
echo "<a href=\"http://plhqlina001\"><<<Back</a>";
?>
