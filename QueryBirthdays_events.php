<?php
//BindEvents Method @1-7F082871
function BindEvents()
{
    global $employee_departmentoffice;
    global $departmentoffice_employee;
    global $Report_Print;
    $employee_departmentoffice->Navigator->CCSEvents["BeforeShow"] = "employee_departmentoffice_Navigator_BeforeShow";
    $employee_departmentoffice->ds->CCSEvents["BeforeExecuteSelect"] = "employee_departmentoffice_ds_BeforeExecuteSelect";
    $departmentoffice_employee->CCSEvents["BeforeShow"] = "departmentoffice_employee_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//employee_departmentoffice_Navigator_BeforeShow @55-647ABD4B
function employee_departmentoffice_Navigator_BeforeShow(& $sender)
{
    $employee_departmentoffice_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_departmentoffice; //Compatibility
//End employee_departmentoffice_Navigator_BeforeShow

//Hide-Show Component @56-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_departmentoffice_Navigator_BeforeShow @55-D64BB01E
    return $employee_departmentoffice_Navigator_BeforeShow;
}
//End Close employee_departmentoffice_Navigator_BeforeShow

//employee_departmentoffice_ds_BeforeExecuteSelect @2-EA882579
function employee_departmentoffice_ds_BeforeExecuteSelect(& $sender)
{
    $employee_departmentoffice_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_departmentoffice; //Compatibility
//End employee_departmentoffice_ds_BeforeExecuteSelect

//Custom Code @99-2A29BDB7
// -------------------------
    // Write your own code here.
global $employee_departmentoffice;
if ($employee_departmentoffice->ds->Where=="")
$employee_departmentoffice->ds->Where = "EmployeeID = -1";

// -------------------------
//End Custom Code

//Close employee_departmentoffice_ds_BeforeExecuteSelect @2-88FD8D6B
    return $employee_departmentoffice_ds_BeforeExecuteSelect;
}
//End Close employee_departmentoffice_ds_BeforeExecuteSelect

//departmentoffice_employee_BeforeShow @22-D32924BE
function departmentoffice_employee_BeforeShow(& $sender)
{
    $departmentoffice_employee_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee; //Compatibility
//End departmentoffice_employee_BeforeShow

//Hide-Show Component @39-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close departmentoffice_employee_BeforeShow @22-554DD2D7
    return $departmentoffice_employee_BeforeShow;
}
//End Close departmentoffice_employee_BeforeShow

//Report_Print_BeforeShow @36-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @38-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @36-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
