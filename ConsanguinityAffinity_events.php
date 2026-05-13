<?php
//BindEvents Method @1-64ACA66F
function BindEvents()
{
    global $employee;
    $employee->ds->CCSEvents["BeforeExecuteSelect"] = "employee_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_ds_BeforeExecuteSelect @2-AED2F055
function employee_ds_BeforeExecuteSelect(& $sender)
{
    $employee_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee; //Compatibility
//End employee_ds_BeforeExecuteSelect

//Custom Code @142-2A29BDB7
// -------------------------

global $employee;
if($employee->ds->Where =="")
$employee->ds->Where = "EmployeeID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_ds_BeforeExecuteSelect @2-113B64D3
    return $employee_ds_BeforeExecuteSelect;
}
//End Close employee_ds_BeforeExecuteSelect


?>
