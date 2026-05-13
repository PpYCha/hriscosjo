<?php
//BindEvents Method @1-88742E89
function BindEvents()
{
    global $departmentoffice_employee1;
    global $departmentoffice_employee;
    $departmentoffice_employee1->ds->CCSEvents["BeforeExecuteSelect"] = "departmentoffice_employee1_ds_BeforeExecuteSelect";
    $departmentoffice_employee->CCSEvents["BeforeShow"] = "departmentoffice_employee_BeforeShow";
}
//End BindEvents Method

//departmentoffice_employee1_ds_BeforeExecuteSelect @2-2E18A3B6
function departmentoffice_employee1_ds_BeforeExecuteSelect(& $sender)
{
    $departmentoffice_employee1_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee1; //Compatibility
//End departmentoffice_employee1_ds_BeforeExecuteSelect

//Custom Code @76-2A29BDB7
// -------------------------
    // Write your own code here.

	global $departmentoffice_employee1;
    if ($departmentoffice_employee1->ds->Where=="")
	$departmentoffice_employee1->ds->Where="EmployeeID=0";

// -------------------------
//End Custom Code

//Close departmentoffice_employee1_ds_BeforeExecuteSelect @2-4B74BB4A
    return $departmentoffice_employee1_ds_BeforeExecuteSelect;
}
//End Close departmentoffice_employee1_ds_BeforeExecuteSelect

//departmentoffice_employee_BeforeShow @22-D32924BE
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

//Close departmentoffice_employee_BeforeShow @22-554DD2D7
    return $departmentoffice_employee_BeforeShow;
}
//End Close departmentoffice_employee_BeforeShow


?>
