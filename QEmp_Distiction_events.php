<?php
//BindEvents Method @1-E4435EFD
function BindEvents()
{
    global $employee_employee_recogni;
    global $Report_Print;
    $employee_employee_recogni->Navigator->CCSEvents["BeforeShow"] = "employee_employee_recogni_Navigator_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//employee_employee_recogni_Navigator_BeforeShow @23-6D31BE9C
function employee_employee_recogni_Navigator_BeforeShow(& $sender)
{
    $employee_employee_recogni_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_recogni; //Compatibility
//End employee_employee_recogni_Navigator_BeforeShow

//Hide-Show Component @24-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_recogni_Navigator_BeforeShow @23-1BBC5D99
    return $employee_employee_recogni_Navigator_BeforeShow;
}
//End Close employee_employee_recogni_Navigator_BeforeShow

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
