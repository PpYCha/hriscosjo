<?php
//BindEvents Method @1-A8C21470
function BindEvents()
{
    global $employee_workexperience;
    $employee_workexperience->employee_workexperience_TotalRecords->CCSEvents["BeforeShow"] = "employee_workexperience_employee_workexperience_TotalRecords_BeforeShow";
    $employee_workexperience->ds->CCSEvents["BeforeExecuteSelect"] = "employee_workexperience_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_workexperience_employee_workexperience_TotalRecords_BeforeShow @5-59CE0D84
function employee_workexperience_employee_workexperience_TotalRecords_BeforeShow(& $sender)
{
    $employee_workexperience_employee_workexperience_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_workexperience; //Compatibility
//End employee_workexperience_employee_workexperience_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_workexperience_employee_workexperience_TotalRecords_BeforeShow @5-9862FB57
    return $employee_workexperience_employee_workexperience_TotalRecords_BeforeShow;
}
//End Close employee_workexperience_employee_workexperience_TotalRecords_BeforeShow

//employee_workexperience_ds_BeforeExecuteSelect @2-C18C632F
function employee_workexperience_ds_BeforeExecuteSelect(& $sender)
{
    $employee_workexperience_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_workexperience; //Compatibility
//End employee_workexperience_ds_BeforeExecuteSelect

//Custom Code @56-2A29BDB7
// -------------------------
global $employee_workexperience;
if($employee_workexperience->ds->Where =="")
$employee_workexperience->ds->Where = "WorkExpID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_workexperience_ds_BeforeExecuteSelect @2-431879BC
    return $employee_workexperience_ds_BeforeExecuteSelect;
}
//End Close employee_workexperience_ds_BeforeExecuteSelect


?>
