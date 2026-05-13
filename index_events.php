<?php
//BindEvents Method @1-1B73D191
function BindEvents()
{
    global $Login;
    $Login->Button_DoLogin->CCSEvents["OnClick"] = "Login_Button_DoLogin_OnClick";
    $Login->CCSEvents["BeforeShow"] = "Login_BeforeShow";
}
//End BindEvents Method

//Login_Button_DoLogin_OnClick @4-1454CF55
function Login_Button_DoLogin_OnClick(& $sender)
{
    $Login_Button_DoLogin_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Login; //Compatibility
//End Login_Button_DoLogin_OnClick

//Login @5-DE10C29C
    global $CCSLocales;
    global $Redirect;
    if ( !CCLoginUser( $Container->login->Value, $Container->password->Value)) {
        $Container->Errors->addError($CCSLocales->GetText("CCS_LoginError"));
        $Container->password->SetValue("");
        $Login_Button_DoLogin_OnClick = 0;
    } else {
        global $Redirect;
        $Redirect = CCGetParam("ret_link", $Redirect);
        $Login_Button_DoLogin_OnClick = 1;
    }
//End Login

//Close Login_Button_DoLogin_OnClick @4-0EB5DCFE
    return $Login_Button_DoLogin_OnClick;
}
//End Close Login_Button_DoLogin_OnClick

//Login_BeforeShow @3-8F00C6BA
function Login_BeforeShow(& $sender)
{
    $Login_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Login; //Compatibility
//End Login_BeforeShow

//Custom Code @9-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
if (!CCGetUserID()) {
    $Component->Visible = True;
} else {
    $Component->Visible = False;
}

//End Custom Code

//Close Login_BeforeShow @3-95DE33DE
    return $Login_BeforeShow;
}
//End Close Login_BeforeShow


?>
