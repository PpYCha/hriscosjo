<?php
//BindEvents Method @1-ECE775C2
function BindEvents()
{
    global $employee_employee_childre;
    global $Report_Print;
    $employee_employee_childre->Detail->CCSEvents["OnCalculate"] = "employee_employee_childre_Detail_OnCalculate";
    $employee_employee_childre->Navigator->CCSEvents["BeforeShow"] = "employee_employee_childre_Navigator_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
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

//Report_Print_BeforeShow @13-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @15-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @13-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
