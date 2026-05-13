<?php
//BindEvents Method @1-27B5F046
function BindEvents()
{
    global $employee_educbackgrnd;
    $employee_educbackgrnd->ds->CCSEvents["BeforeExecuteSelect"] = "employee_educbackgrnd_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_educbackgrnd_ds_BeforeExecuteSelect @2-10618729
function employee_educbackgrnd_ds_BeforeExecuteSelect(& $sender)
{
    $employee_educbackgrnd_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_educbackgrnd; //Compatibility
//End employee_educbackgrnd_ds_BeforeExecuteSelect

//Custom Code @54-2A29BDB7
// -------------------------
global $employee_educbackgrnd;
if($employee_educbackgrnd->ds->Where =="")
$employee_educbackgrnd->ds->Where = "EmployeeEducID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_educbackgrnd_ds_BeforeExecuteSelect @2-39FED3C4
    return $employee_educbackgrnd_ds_BeforeExecuteSelect;
}
//End Close employee_educbackgrnd_ds_BeforeExecuteSelect


?>
