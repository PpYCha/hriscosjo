<?php
//BindEvents Method @1-EA6DBA6F
function BindEvents()
{
    global $employee_recognition;
    $employee_recognition->employee_recognition_TotalRecords->CCSEvents["BeforeShow"] = "employee_recognition_employee_recognition_TotalRecords_BeforeShow";
    $employee_recognition->ds->CCSEvents["BeforeExecuteSelect"] = "employee_recognition_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_recognition_employee_recognition_TotalRecords_BeforeShow @5-C9A4F85E
function employee_recognition_employee_recognition_TotalRecords_BeforeShow(& $sender)
{
    $employee_recognition_employee_recognition_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_recognition; //Compatibility
//End employee_recognition_employee_recognition_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_recognition_employee_recognition_TotalRecords_BeforeShow @5-8ED49F16
    return $employee_recognition_employee_recognition_TotalRecords_BeforeShow;
}
//End Close employee_recognition_employee_recognition_TotalRecords_BeforeShow

//employee_recognition_ds_BeforeExecuteSelect @2-591C334A
function employee_recognition_ds_BeforeExecuteSelect(& $sender)
{
    $employee_recognition_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_recognition; //Compatibility
//End employee_recognition_ds_BeforeExecuteSelect

//Custom Code @26-2A29BDB7
// -------------------------
global $employee_recognition;
if($employee_recognition->ds->Where =="")
$employee_recognition->ds->Where = "RecognitionID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_recognition_ds_BeforeExecuteSelect @2-467D3B93
    return $employee_recognition_ds_BeforeExecuteSelect;
}
//End Close employee_recognition_ds_BeforeExecuteSelect


?>
