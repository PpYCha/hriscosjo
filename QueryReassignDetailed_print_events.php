<?php
//BindEvents Method @1-2F5F7937
function BindEvents()
{
    global $employee_departmentoffice;
    global $departmentoffice_departme;
    global $Report_Print;
    $employee_departmentoffice->Navigator->CCSEvents["BeforeShow"] = "employee_departmentoffice_Navigator_BeforeShow";
    $employee_departmentoffice->ds->CCSEvents["BeforeExecuteSelect"] = "employee_departmentoffice_ds_BeforeExecuteSelect";
    $departmentoffice_departme->CCSEvents["BeforeShow"] = "departmentoffice_departme_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//employee_departmentoffice_Navigator_BeforeShow @51-647ABD4B
function employee_departmentoffice_Navigator_BeforeShow(& $sender)
{
    $employee_departmentoffice_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_departmentoffice; //Compatibility
//End employee_departmentoffice_Navigator_BeforeShow

//Hide-Show Component @52-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_departmentoffice_Navigator_BeforeShow @51-D64BB01E
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

//Custom Code @81-2A29BDB7
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

//departmentoffice_departme_BeforeShow @27-97ACB171
function departmentoffice_departme_BeforeShow(& $sender)
{
    $departmentoffice_departme_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_departme; //Compatibility
//End departmentoffice_departme_BeforeShow

//Hide-Show Component @37-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close departmentoffice_departme_BeforeShow @27-67CBFCA1
    return $departmentoffice_departme_BeforeShow;
}
//End Close departmentoffice_departme_BeforeShow

//Report_Print_BeforeShow @34-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @36-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @34-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
