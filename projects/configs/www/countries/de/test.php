$new_config_sw=fopen("../../final/switches/pl/$SW_HOSTNAME","w");
$template=file("../templates/switch/switch.cfg");
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
        }
fclose($new_config_sw);
unset($template);
