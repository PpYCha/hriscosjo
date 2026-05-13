<?php
//BindEvents Method @1-AEAA0355
function BindEvents()
{
    global $employee_membershipassoco;
    $employee_membershipassoco->employee_membershipassoco_TotalRecords->CCSEvents["BeforeShow"] = "employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow";
    $employee_membershipassoco->ds->CCSEvents["BeforeExecuteSelect"] = "employee_membershipassoco_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow @5-9941B8C4
function employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow(& $sender)
{
    $employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_membershipassoco; //Compatibility
//End employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow @5-EED7188A
    return $employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow;
}
//End Close employee_membershipassoco_employee_membershipassoco_TotalRecords_BeforeShow

//employee_membershipassoco_ds_BeforeExecuteSelect @2-323F2D20
function employee_membershipassoco_ds_BeforeExecuteSelect(& $sender)
{
    $employee_membershipassoco_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_membershipassoco; //Compatibility
//End employee_membershipassoco_ds_BeforeExecuteSelect

//Custom Code @26-2A29BDB7
// -------------------------
global $employee_membershipassoco;
if($employee_membershipassoco->ds->Where =="")
$employee_membershipassoco->ds->Where = "MembershipID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_membershipassoco_ds_BeforeExecuteSelect @2-F0CC4C16
    return $employee_membershipassoco_ds_BeforeExecuteSelect;
}
//End Close employee_membershipassoco_ds_BeforeExecuteSelect


?>
