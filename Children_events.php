<?php
//BindEvents Method @1-2DFAED3A
function BindEvents()
{
    global $employee_children;
    $employee_children->employee_children_TotalRecords->CCSEvents["BeforeShow"] = "employee_children_employee_children_TotalRecords_BeforeShow";
    $employee_children->ds->CCSEvents["BeforeExecuteSelect"] = "employee_children_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_children_employee_children_TotalRecords_BeforeShow @5-9CFCFECF
function employee_children_employee_children_TotalRecords_BeforeShow(& $sender)
{
    $employee_children_employee_children_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_children; //Compatibility
//End employee_children_employee_children_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_children_employee_children_TotalRecords_BeforeShow @5-5E9E4A9F
    return $employee_children_employee_children_TotalRecords_BeforeShow;
}
//End Close employee_children_employee_children_TotalRecords_BeforeShow

//employee_children_ds_BeforeExecuteSelect @2-C6A9A761
function employee_children_ds_BeforeExecuteSelect(& $sender)
{
    $employee_children_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_children; //Compatibility
//End employee_children_ds_BeforeExecuteSelect

//Custom Code @32-2A29BDB7
// -------------------------
global $employee_children;
if($employee_children->ds->Where =="")
$employee_children->ds->Where = "EmployeeChildID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_children_ds_BeforeExecuteSelect @2-633ECBDF
    return $employee_children_ds_BeforeExecuteSelect;
}
//End Close employee_children_ds_BeforeExecuteSelect


?>
