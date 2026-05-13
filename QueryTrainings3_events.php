<?php
//BindEvents Method @1-D868DCEC
function BindEvents()
{
    global $departmentoffice_employee1;
    global $departmentoffice_employee;
    global $Report_Print;
    $departmentoffice_employee1->Navigator->CCSEvents["BeforeShow"] = "departmentoffice_employee1_Navigator_BeforeShow";
    $departmentoffice_employee->CCSEvents["BeforeShow"] = "departmentoffice_employee_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//departmentoffice_employee1_Navigator_BeforeShow @57-071604A1
function departmentoffice_employee1_Navigator_BeforeShow(& $sender)
{
    $departmentoffice_employee1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee1; //Compatibility
//End departmentoffice_employee1_Navigator_BeforeShow

//Hide-Show Component @58-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close departmentoffice_employee1_Navigator_BeforeShow @57-0BFB954C
    return $departmentoffice_employee1_Navigator_BeforeShow;
}
//End Close departmentoffice_employee1_Navigator_BeforeShow

//departmentoffice_employee_BeforeShow @11-D32924BE
function departmentoffice_employee_BeforeShow(& $sender)
{
    $departmentoffice_employee_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee; //Compatibility
//End departmentoffice_employee_BeforeShow

//Hide-Show Component @31-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close departmentoffice_employee_BeforeShow @11-554DD2D7
    return $departmentoffice_employee_BeforeShow;
}
//End Close departmentoffice_employee_BeforeShow

//Report_Print_BeforeShow @28-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @30-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @28-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
