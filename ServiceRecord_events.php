<?php
//BindEvents Method @1-010F4D82
function BindEvents()
{
    global $employee_servicerecord;
    $employee_servicerecord->employee_servicerecord_TotalRecords->CCSEvents["BeforeShow"] = "employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow";
    $employee_servicerecord->ds->CCSEvents["BeforeExecuteSelect"] = "employee_servicerecord_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow @5-B03FE68D
function employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow(& $sender)
{
    $employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_servicerecord; //Compatibility
//End employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow @5-F2B86FFF
    return $employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow;
}
//End Close employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow

//employee_servicerecord_ds_BeforeExecuteSelect @2-024F86F8
function employee_servicerecord_ds_BeforeExecuteSelect(& $sender)
{
    $employee_servicerecord_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_servicerecord; //Compatibility
//End employee_servicerecord_ds_BeforeExecuteSelect

//Custom Code @56-2A29BDB7
// -------------------------
global $employee_servicerecord;
if($employee_servicerecord->ds->Where =="")
$employee_servicerecord->ds->Where = "ServiceRecID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_servicerecord_ds_BeforeExecuteSelect @2-4BCA7B69
    return $employee_servicerecord_ds_BeforeExecuteSelect;
}
//End Close employee_servicerecord_ds_BeforeExecuteSelect


?>
