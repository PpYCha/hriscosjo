<?php
//BindEvents Method @1-CAFB5A13
function BindEvents()
{
    global $employee_lut_statofappt3;
    global $employee_lut_statofappt2;
    global $Report_Print;
    $employee_lut_statofappt3->Navigator->CCSEvents["BeforeShow"] = "employee_lut_statofappt3_Navigator_BeforeShow";
    $employee_lut_statofappt2->CCSEvents["BeforeShow"] = "employee_lut_statofappt2_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//employee_lut_statofappt3_Navigator_BeforeShow @24-81D80B2A
function employee_lut_statofappt3_Navigator_BeforeShow(& $sender)
{
    $employee_lut_statofappt3_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_lut_statofappt3; //Compatibility
//End employee_lut_statofappt3_Navigator_BeforeShow

//Hide-Show Component @25-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_lut_statofappt3_Navigator_BeforeShow @24-BFEB4C3D
    return $employee_lut_statofappt3_Navigator_BeforeShow;
}
//End Close employee_lut_statofappt3_Navigator_BeforeShow

//employee_lut_statofappt2_BeforeShow @6-AADB8B48
function employee_lut_statofappt2_BeforeShow(& $sender)
{
    $employee_lut_statofappt2_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_lut_statofappt2; //Compatibility
//End employee_lut_statofappt2_BeforeShow

//Hide-Show Component @15-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_lut_statofappt2_BeforeShow @6-BCB13B9F
    return $employee_lut_statofappt2_BeforeShow;
}
//End Close employee_lut_statofappt2_BeforeShow

//Report_Print_BeforeShow @12-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @14-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @12-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
