<?php
/*
Plugin Name: Xtreme Dock Menu
Plugin URI: http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-dock-menu-xml-as3.html
Description: The most advanced XML Dock Menu application. No Flash Knowledge required to insert the Dock Menu SWF inside the HTML page(s) of your site.
Version: 1.2
Author: Flashtuning 
Author http://www.flashtuning.net
*/

$xtreme_dock_swf_nr	= 0; 											

function xtremeDockMenuStart($xtreme_obj) {
	
	$txtP = preg_replace_callback('/\[xtreme-dock-menu\s*(width="(\d+)")?\s*(height="(\d+)")?\s*(xml="([^"]+)")?\s*\]/i', 'xtremeDockMenuAddObj', $xtreme_obj); 
	
	return $txtP;
}

function xtremeDockMenuAddObj($xtreme_dock_param) {

    global $xtreme_dock_swf_nr; //number of swfs
	$xtreme_dock_swf_nr++;
	
	$xtreme_dock_rand = substr(rand(),0,3);
	
	$xtreme_dock_dir = WP_CONTENT_URL .'/flashtuning/xtreme-dock-menu/';
	$xtreme_dock_swf = $xtreme_dock_dir.'dockmenu.swf';
	$xtreme_dock_config = "swfobj2";
	
	if ($xtreme_dock_param[2] !=""){$xtreme_dock_width = $xtreme_dock_param[2];}
	else {$xtreme_dock_width = 580;}
	
	if ($xtreme_dock_param[4] !=""){$xtreme_dock_height = $xtreme_dock_param[4];}
	else {$xtreme_dock_height = 200;}
	
	if ($xtreme_dock_param[6] !=""){$xtreme_dock_xml = $xtreme_dock_dir.$xtreme_dock_param[6];}
	else {$xtreme_dock_xml = $xtreme_dock_dir.'dock-settings.xml';}
	
	
	
	/*
		quality - low | medium | high | autolow | autohigh | best
		bgcolor - hexadecimal RGB value
		wmode - Window | Opaque | Transparent
		allowfullscreen - true | false
		scale - noscale | showall | noborder | exactfit
		salign - L | R | T | B | TL | TR | BL | BR 
		allowscriptaccess - always | never | samedomain
	
	*/
	
	$xtreme_dock_param = array("quality" =>	"high", "bgcolor" => "", "wmode"	=>	"window", "version" =>	"9.0.0", "allowfullscreen"	=>	"true", "scale" => "noscale", "salign" => "TL", "allowscriptaccess" => "samedomain");
	
	if (is_feed()) {$xtreme_dock_config = "xhtml";}

	
	if ($xtreme_dock_config != "xhtml") {
		$xtreme_dock_output = "<div id=\"xtreme-dock-menu".$xtreme_dock_rand."\">Please install flash player.</div>";
	
	}
	
	switch ($xtreme_dock_config) {
	
		case "xhtml":
			$xtreme_dock_output.= "\n<object width=\"".$xtreme_dock_width."\" height=\"".$xtreme_dock_height."\">\n";
			$xtreme_dock_output.= "<param name=\"movie\" value=\"".$xtreme_dock_swf."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"quality\" value=\"".$xtreme_dock_param['quality']."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"bgcolor\" value=\"".$xtreme_dock_param['bgcolor']."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"wmode\" value=\"".$xtreme_dock_param['wmode']."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"allowFullScreen\" value=\"".$xtreme_dock_param['allowfullscreen']."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"scale\" value=\"".$xtreme_dock_param['scale']."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"salign\" value=\"".$xtreme_dock_param['salign']."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"allowscriptaccess\" value=\"".$xtreme_dock_param['allowscriptaccess']."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"base\" value=\"".$xtreme_dock_dir."\"></param>\n";
			$xtreme_dock_output.= "<param name=\"FlashVars\" value=\"setupXML=".$xtreme_dock_xml."\"></param>\n";
			
			
			$xtreme_dock_output.= "<embed type=\"application/x-shockwave-flash\" width=\"".$xtreme_dock_width."\" height=\"".$xtreme_dock_height."\" src=\"".$xtreme_dock_swf."\" ";
			$xtreme_dock_output.= "quality=\"".$xtreme_dock_param['quality']."\" bgcolor=\"".$xtreme_dock_param['bgcolor']."\" wmode=\"".$xtreme_dock_param['wmode']."\" scale=\"".$xtreme_dock_param['scale']."\" salign=\"".$xtreme_dock_param['salign']."\" allowScriptAccess=\"".$xtreme_dock_param['allowscriptaccess']."\" allowFullScreen=\"".$xtreme_dock_param['allowfullscreen']."\" base=\"".$xtreme_dock_dir."\" FlashVars=\"setupXML=".$xtreme_dock_xml."\"  ";
			
			$xtreme_dock_output.= "></embed>\n";
			$xtreme_dock_output.= "</object>\n";
			break;
	
		default:
		
			$xtreme_dock_output.= '<script type="text/javascript">';
			$xtreme_dock_output.= "swfobject.embedSWF('{$xtreme_dock_swf}', 'xtreme-dock-menu{$xtreme_dock_rand}', '{$xtreme_dock_width}', '{$xtreme_dock_height}', '{$xtreme_dock_param['version']}', '' , { setupXML: '{$xtreme_dock_xml}'}, {base: '{$xtreme_dock_dir}', wmode: '{$xtreme_dock_param['wmode']}', scale: '{$xtreme_dock_param['scale']}', salign: '{$xtreme_dock_param['salign']}', allowScriptAccess: '{$xtreme_dock_param['allowscriptaccess']}', allowFullScreen: '{$xtreme_dock_param['allowfullscreen']}'}, {});";
			$xtreme_dock_output.= '</script>';
	
			break;
					
	}
	return $xtreme_dock_output;
}

function  xtremeDockMenuEcho($xtreme_dock_width, $xtreme_dock_height, $xtreme_dock_xml) {
    echo xtremeDockMenuAddObj( array( null, null, $xtreme_dock_width, null, $xtreme_dock_height, null, $xtreme_dock_xml) );
}


function xtremeDockMenuAdmin() {

if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }


?>
		<div class="wrap">
			<h2>Xtreme Dock Menu 1.2</h2>
					<table>
					<tr>
						<th valign="top" style="padding-top: 10px;color:#FF0000;">
							!IMPORTANT: Copy the free archive folder in the wp-content folder. (eg.: http://www.yoursite.com/wp-content/flashtuning/xtreme-dock-menu/)
						</th>
					</tr>
                    
                    <tr>
						<td>
					      <ul>
					        <li>1. Insert the swf into post or page using this tag: <strong>[xtreme-dock-menu]</strong>.</li>
                            <li>2. If you want to modify the width and height of the dock menu insert this attributes into the tag: <strong>[xtreme-dock-menu width="yourvalue" height="yourvalue"]</strong></li>
   					        <li>3. If you want to use multiple instances of Xtreme Dock Menu on different pages. Follow this steps:
                            	<ul>
	                           <li>a. There are 2 xml files in <strong>wp-content/flashtuning/xtreme-dock-menu</strong> folder: dock-settings.xml, used for general settings, and dock-contents.xml, used for individual items.</li>
                                <li>b. Modify the 2 xml files according to your needs and rename them (eg.: dock-settings2.xml, dock-contents2.xml) </li>
                                <li>c. Open the dock-settings2.xml, search for this tag <strong> < object param="contentXML"	value="dock-content.xml" /></strong> and change the attribute value to <em>dock-contents2.xml</em> </li>
                                <li>d. Copy the 2 modified xml files to <strong>wp-content/flashtuning/xtreme-dock-menu</strong> folder</li>
                                <li>e. Use the <strong>xml</strong> attribute [xtreme-dock-menu xml="dock-settings2.xml"] when you insert the dock menu on a page. </li>
                                </ul>
                            <li>4. Optionally for custom pages use this php function: <strong>xtremeDockMenuEcho(width,height,xmlFile)</strong> (e.g: xtremeDockMenuEcho(580,200,'dock-settings.xml') )</li>                  
                            </ul>
						</td>
				  </tr>         
                    
                    
					<tr>
						<td>
						  <p>Check out other useful links. If you have any questions / suggestions, please leave a comment on the component page. </p>
					      <ul>
					        <li><a href="http://www.flashtuning.net">Author Home Page</a></li>
			                <li><a href="http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-dock-menu-xml-as3.html">Xtreme Dock Menu Page</a> </li>
			           </ul>
						</td>
				  </tr>
				</table>
			
		</div>
		
<?php
}
function xtremeDockMenuAdminAdd() {
	
	add_options_page('Xtreme Dock Menu Options', 'Xtreme Dock Menu', 'manage_options','xtremedockmenu', 'xtremeDockMenuAdmin');
}

function xtremeDockMenuSwfObj() {
		wp_enqueue_script('swfobject');
	}


add_filter('the_content', 'xtremeDockMenuStart');
add_action('admin_menu', 'xtremeDockMenuAdminAdd');
add_action('init', 'xtremeDockMenuSwfObj');
?>