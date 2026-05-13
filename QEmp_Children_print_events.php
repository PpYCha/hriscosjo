<?php
//BindEvents Method @1-CC8F83F6
function BindEvents()
{
    global $employee_employee_childre;
    $employee_employee_childre->Detail->CCSEvents["OnCalculate"] = "employee_employee_childre_Detail_OnCalculate";
    $employee_employee_childre->Navigator->CCSEvents["BeforeShow"] = "employee_employee_childre_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_employee_childre_Detail_OnCalculate @18-F33204F6
function employee_employee_childre_Detail_OnCalculate(& $sender)
{
    $employee_employee_childre_Detail_OnCalculate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_childre; //Compatibility
//End employee_employee_childre_Detail_OnCalculate

//Custom Code @47-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_employee_childre_Detail_OnCalculate @18-67BEF4BC
    return $employee_employee_childre_Detail_OnCalculate;
}
//End Close employee_employee_childre_Detail_OnCalculate

//employee_employee_childre_Navigator_BeforeShow @24-CF7F92C8
function employee_employee_childre_Navigator_BeforeShow(& $sender)
{
    $employee_employee_childre_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_childre; //Compatibility
//End employee_employee_childre_Navigator_BeforeShow

//Hide-Show Component @25-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_childre_Navigator_BeforeShow @24-B62872EE
    return $employee_employee_childre_Navigator_BeforeShow;
}
//End Close employee_employee_childre_Navigator_BeforeShow


?>
