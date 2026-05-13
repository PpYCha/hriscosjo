<?php
//BindEvents Method @1-8965E7DC
function BindEvents()
{
    global $employee_lut_statofappt2;
    global $departmentoffice_employee;
    global $Report_Print;
    $employee_lut_statofappt2->Navigator->CCSEvents["BeforeShow"] = "employee_lut_statofappt2_Navigator_BeforeShow";
    $departmentoffice_employee->CCSEvents["BeforeShow"] = "departmentoffice_employee_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//employee_lut_statofappt2_Navigator_BeforeShow @38-07001698
function employee_lut_statofappt2_Navigator_BeforeShow(& $sender)
{
    $employee_lut_statofappt2_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_lut_statofappt2; //Compatibility
//End employee_lut_statofappt2_Navigator_BeforeShow

//Hide-Show Component @39-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_lut_statofappt2_Navigator_BeforeShow @38-3ECE291A
    return $employee_lut_statofappt2_Navigator_BeforeShow;
}
//End Close employee_lut_statofappt2_Navigator_BeforeShow

//departmentoffice_employee_BeforeShow @17-D32924BE
function departmentoffice_employee_BeforeShow(& $sender)
{
    $departmentoffice_employee_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee; //Compatibility
//End departmentoffice_employee_BeforeShow

//Hide-Show Component @24-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close departmentoffice_employee_BeforeShow @17-554DD2D7
    return $departmentoffice_employee_BeforeShow;
}
//End Close departmentoffice_employee_BeforeShow

//Report_Print_BeforeShow @21-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @23-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @21-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
