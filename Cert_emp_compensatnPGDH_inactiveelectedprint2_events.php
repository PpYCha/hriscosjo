<?php
//BindEvents Method @1-C8D50D7B
function BindEvents()
{
    global $departmentoffice_employee1;
    $departmentoffice_employee1->ds->CCSEvents["BeforeExecuteSelect"] = "departmentoffice_employee1_ds_BeforeExecuteSelect";
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

//Custom Code @81-2A29BDB7
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
