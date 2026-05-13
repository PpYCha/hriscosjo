<?php
//BindEvents Method @1-578608DA
function BindEvents()
{
    global $employee_references;
    $employee_references->employee_references_TotalRecords->CCSEvents["BeforeShow"] = "employee_references_employee_references_TotalRecords_BeforeShow";
    $employee_references->ds->CCSEvents["BeforeExecuteSelect"] = "employee_references_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_references_employee_references_TotalRecords_BeforeShow @5-BC318ED0
function employee_references_employee_references_TotalRecords_BeforeShow(& $sender)
{
    $employee_references_employee_references_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_references; //Compatibility
//End employee_references_employee_references_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_references_employee_references_TotalRecords_BeforeShow @5-8D4BFAF1
    return $employee_references_employee_references_TotalRecords_BeforeShow;
}
//End Close employee_references_employee_references_TotalRecords_BeforeShow

//employee_references_ds_BeforeExecuteSelect @2-BC45F1B6
function employee_references_ds_BeforeExecuteSelect(& $sender)
{
    $employee_references_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_references; //Compatibility
//End employee_references_ds_BeforeExecuteSelect

//Custom Code @34-2A29BDB7
// -------------------------
global $employee_references;
if($employee_references->ds->Where =="")
$employee_references->ds->Where = "ReferenceID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_references_ds_BeforeExecuteSelect @2-FC1FD98A
    return $employee_references_ds_BeforeExecuteSelect;
}
//End Close employee_references_ds_BeforeExecuteSelect


?>
