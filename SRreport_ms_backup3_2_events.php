<?php
//BindEvents Method @1-BD87611B
function BindEvents()
{
    global $employee_lut_servicerecpu;
    $employee_lut_servicerecpu->ds->CCSEvents["BeforeExecuteSelect"] = "employee_lut_servicerecpu_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_lut_servicerecpu_ds_BeforeExecuteSelect @2-491DFE6A
function employee_lut_servicerecpu_ds_BeforeExecuteSelect(& $sender)
{
    $employee_lut_servicerecpu_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_lut_servicerecpu; //Compatibility
//End employee_lut_servicerecpu_ds_BeforeExecuteSelect

//Custom Code @91-2A29BDB7
// -------------------------
    // Write your own code here.

	global $employee_lut_servicerecpu;
	if ($employee_lut_servicerecpu->ds->Where=="")
	$employee_lut_servicerecpu->ds->Where="ServiceRecID=0";


// -------------------------
//End Custom Code

//Close employee_lut_servicerecpu_ds_BeforeExecuteSelect @2-81D71DF5
    return $employee_lut_servicerecpu_ds_BeforeExecuteSelect;
}
//End Close employee_lut_servicerecpu_ds_BeforeExecuteSelect


?>
