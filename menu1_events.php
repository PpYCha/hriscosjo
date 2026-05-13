<?php
// //Events @1-F81417CB

//menu1_Logout_BeforeShow @2-D5BD27E1
function menu1_Logout_BeforeShow(& $sender)
{
    $menu1_Logout_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $menu1; //Compatibility
//End menu1_Logout_BeforeShow

//Custom Code @10-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
global $Tpl;
$custom_user = CCGetUserLogin();
if ($custom_user) {
    $Tpl->setvar("CustomLogoutLinkText", "LOGOUT");
	$Tpl->setvar("CustomLogoutText", " -You are logged in as <strong>".$custom_user."</strong>");
	} else {
	   $Tpl->setvar("CustomLogoutLinkText", "");
	   $Tpl->setvar("CustomLogoutText", "You are NOT logged in.");
	   }

//End Custom Code

//Close menu1_Logout_BeforeShow @2-6D51043A
    return $menu1_Logout_BeforeShow;
}
//End Close menu1_Logout_BeforeShow


?>
