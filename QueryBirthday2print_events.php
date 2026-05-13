<?php
//BindEvents Method @1-212904F9
function BindEvents()
{
    global $departmentoffice_employee1;
    $departmentoffice_employee1->Navigator->CCSEvents["BeforeShow"] = "departmentoffice_employee1_Navigator_BeforeShow";
    $departmentoffice_employee1->ds->CCSEvents["BeforeExecuteSelect"] = "departmentoffice_employee1_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//departmentoffice_employee1_Navigator_BeforeShow @47-071604A1
function departmentoffice_employee1_Navigator_BeforeShow(& $sender)
{
    $departmentoffice_employee1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee1; //Compatibility
//End departmentoffice_employee1_Navigator_BeforeShow

//Hide-Show Component @48-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close departmentoffice_employee1_Navigator_BeforeShow @47-0BFB954C
    return $departmentoffice_employee1_Navigator_BeforeShow;
}
//End Close departmentoffice_employee1_Navigator_BeforeShow

//departmentoffice_employee1_ds_BeforeExecuteSelect @2-2E18A3B6
function departmentoffice_employee1_ds_BeforeExecuteSelect(& $sender)
{
    $departmentoffice_employee1_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice_employee1; //Compatibility
//End departmentoffice_employee1_ds_BeforeExecuteSelect

//Custom Code @72-2A29BDB7
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


?>
