<?php
//BindEvents Method @1-F0BC5FFB
function BindEvents()
{
    global $employee_specialskills;
    $employee_specialskills->employee_specialskills_TotalRecords->CCSEvents["BeforeShow"] = "employee_specialskills_employee_specialskills_TotalRecords_BeforeShow";
    $employee_specialskills->ds->CCSEvents["BeforeExecuteSelect"] = "employee_specialskills_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_specialskills_employee_specialskills_TotalRecords_BeforeShow @5-EA851075
function employee_specialskills_employee_specialskills_TotalRecords_BeforeShow(& $sender)
{
    $employee_specialskills_employee_specialskills_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_specialskills; //Compatibility
//End employee_specialskills_employee_specialskills_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_specialskills_employee_specialskills_TotalRecords_BeforeShow @5-5F60A474
    return $employee_specialskills_employee_specialskills_TotalRecords_BeforeShow;
}
//End Close employee_specialskills_employee_specialskills_TotalRecords_BeforeShow

//employee_specialskills_ds_BeforeExecuteSelect @2-D076A405
function employee_specialskills_ds_BeforeExecuteSelect(& $sender)
{
    $employee_specialskills_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_specialskills; //Compatibility
//End employee_specialskills_ds_BeforeExecuteSelect

//Custom Code @26-2A29BDB7
// -------------------------
global $employee_specialskills;
if($employee_specialskills->ds->Where =="")
$employee_specialskills->ds->Where = "SpecialSkillsID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_specialskills_ds_BeforeExecuteSelect @2-8A91FB13
    return $employee_specialskills_ds_BeforeExecuteSelect;
}
//End Close employee_specialskills_ds_BeforeExecuteSelect


?>
