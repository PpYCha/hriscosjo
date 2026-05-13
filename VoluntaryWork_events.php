<?php
//BindEvents Method @1-5BC10C18
function BindEvents()
{
    global $employee_voluntaryworkinv;
    $employee_voluntaryworkinv->ds->CCSEvents["BeforeExecuteSelect"] = "employee_voluntaryworkinv_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_voluntaryworkinv_ds_BeforeExecuteSelect @2-36CA6DC7
function employee_voluntaryworkinv_ds_BeforeExecuteSelect(& $sender)
{
    $employee_voluntaryworkinv_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_voluntaryworkinv; //Compatibility
//End employee_voluntaryworkinv_ds_BeforeExecuteSelect

//Custom Code @40-2A29BDB7
// -------------------------

global $employee_voluntaryworkinv;
if($employee_voluntaryworkinv->ds->Where =="")
$employee_voluntaryworkinv->ds->Where = "VolWorkID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_voluntaryworkinv_ds_BeforeExecuteSelect @2-5555334B
    return $employee_voluntaryworkinv_ds_BeforeExecuteSelect;
}
//End Close employee_voluntaryworkinv_ds_BeforeExecuteSelect


?>
