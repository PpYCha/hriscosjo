<?php
//BindEvents Method @1-9ED2C33A
function BindEvents()
{
    global $employee_training;
    $employee_training->employee_training_TotalRecords->CCSEvents["BeforeShow"] = "employee_training_employee_training_TotalRecords_BeforeShow";
    $employee_training->ds->CCSEvents["BeforeExecuteSelect"] = "employee_training_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_training_employee_training_TotalRecords_BeforeShow @5-D5FC39D1
function employee_training_employee_training_TotalRecords_BeforeShow(& $sender)
{
    $employee_training_employee_training_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_training; //Compatibility
//End employee_training_employee_training_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_training_employee_training_TotalRecords_BeforeShow @5-CD9BB345
    return $employee_training_employee_training_TotalRecords_BeforeShow;
}
//End Close employee_training_employee_training_TotalRecords_BeforeShow

//employee_training_ds_BeforeExecuteSelect @2-3E1716F7
function employee_training_ds_BeforeExecuteSelect(& $sender)
{
    $employee_training_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_training; //Compatibility
//End employee_training_ds_BeforeExecuteSelect

//Custom Code @46-2A29BDB7
// -------------------------
global $employee_training;
if($employee_training->ds->Where =="")
$employee_training->ds->Where = "TrainingID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_training_ds_BeforeExecuteSelect @2-F9A37D2B
    return $employee_training_ds_BeforeExecuteSelect;
}
//End Close employee_training_ds_BeforeExecuteSelect


?>
