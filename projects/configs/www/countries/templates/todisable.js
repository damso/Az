window.onload = function() {
document.getElementById('with_pppoe').onchange = disablefield;
document.getElementById('without_pppoe').onchange = disablefield;

document.getElementById('fxs_0').disabled = true;
document.getElementById('fxs_1').disabled = true;
document.getElementById('1861').onchange = disablefield;
document.getElementById('2801').onchange = disablefield;
document.getElementById('2811').onchange = disablefield;
document.getElementById('881').onchange = disablefield;
document.getElementById('881G+7').onchange = disablefield;
document.getElementById('881-K9').onchange = disablefield;
document.getElementById('meraki_mx').onchange = merakidisable;
}

function disablefield()
{
if ( document.getElementById('without_pppoe').checked == true ){
document.getElementById('puser').value = '';
document.getElementById('ppas').value = '';
document.getElementById('puser').disabled = true;
document.getElementById('ppas').disabled = true;}
else if (document.getElementById('with_pppoe').checked == true ){
document.getElementById('puser').disabled = false;
document.getElementById('ppas').disabled = false;}

if ( document.getElementById('881').checked == true){
document.getElementById('fxs_0').value = '';
document.getElementById('fxs_0').disabled = true;
document.getElementById('fxs_1').value = '';
document.getElementById('fxs_1').disabled = true;}
else {
document.getElementById('fxs_0').disabled = false;
document.getElementById('fxs_1').disabled = false;}

}
function merakidisable(){
document.getElementById('wan_gw').disabled = true;
document.getElementById('loop').disabled = true;
document.getElementById('wan_ip').disabled = true;
document.getElementById('wan_netmask').disabled = true;
document.getElementById('tunnel1_ip').disabled = true;
document.getElementById('tunnel2_ip').disabled = true;
document.getElementById('tunnel3_ip').disabled = true;
document.getElementById('tunnel4_ip').disabled = true;
document.getElementById('puser').disabled = true;
document.getElementById('ppas').disabled = true;



}

function fieldenable(){
document.getElementById('wan_gw').disabled = false;
document.getElementById('loop').disabled = false;
document.getElementById('wan_ip').disabled = false;
document.getElementById('wan_netmask').disabled = false;
document.getElementById('tunnel1_ip').disabled = false;
document.getElementById('tunnel2_ip').disabled = false;
document.getElementById('tunnel3_ip').disabled = false;
document.getElementById('tunnel4_ip').disabled = false;


}