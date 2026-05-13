<?php
//BindEvents Method @1-5192432D
function BindEvents()
{
    global $employee_departmentoffice;
    global $departmentoffice_employee;
    global $Report_Print;
    $employee_departmentoffice->Navigator->CCSEvents["BeforeShow"] = "employee_departmentoffice_Navigator_BeforeShow";
    $employee_departmentoffice->ds->CCSEvents["BeforeExecuteSelect"] = "employee_departmentoffice_ds_BeforeExecuteSelect";
    $departmentoffice_employee->CCSEvents["BeforeShow"] = "departmentoffice_employee_BeforeShow";
    $departmentoffice_employee->ds->CCSEvents["BeforeExecuteSelect"] = "departmentoffice_employee_ds_BeforeExecuteSelect";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//employee_departmentoffice_Navigator_BeforeShow @44-647ABD4B
function employee_departmentoffice_Navigator_BeforeShow(& $sender)
{
    $employee_departmentoffice_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_departmentoffice; //Compatibility
//End employee_departmentoffice_Navigator_BeforeShow

//Hide-Show Component @45-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_departmentoffice_Navigator_BeforeShow @44-D64BB01E
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

//Custom Code @78-2A29BDB7
// -------------------------
    // Write your own code here.

	global $employee_departmentoffice;
	if ($employee_departmentoffice->ds->Where=="")
    $employee_departmentoffice->ds->Where = "EmployeeID=0";
// -------------------------
//End Custom Code

//Close employee_departmentoffice_ds_BeforeExecuteSelect @2-88FD8D6B
    return $employee_departmentoffice_ds_BeforeExecuteSelect;
}
//End Close employee_departmentoffice_ds_BeforeExecuteSelect

//departmentoffice_employee_BeforeShow @25-D32924BE
function departmentoffice_employee_BeforeShow(& $sender)
{
    $departmentoffice_employee_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee; //Compatibility
//End departmentoffice_employee_BeforeShow

//Hide-Show Component @35-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close departmentoffice_employee_BeforeShow @25-554DD2D7
    return $departmentoffice_employee_BeforeShow;
}
//End Close departmentoffice_employee_BeforeShow

//departmentoffice_employee_ds_BeforeExecuteSelect @25-039D6280
function departmentoffice_employee_ds_BeforeExecuteSelect(& $sender)
{
    $departmentoffice_employee_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee; //Compatibility
//End departmentoffice_employee_ds_BeforeExecuteSelect

//Custom Code @79-2A29BDB7
// -------------------------
    // Write your own code here.


// -------------------------
//End Custom Code

//Close departmentoffice_employee_ds_BeforeExecuteSelect @25-93B08C81
    return $departmentoffice_employee_ds_BeforeExecuteSelect;
}
//End Close departmentoffice_employee_ds_BeforeExecuteSelect

//Report_Print_BeforeShow @32-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @34-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @32-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
