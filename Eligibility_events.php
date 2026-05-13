<?php
//BindEvents Method @1-2C1928CF
function BindEvents()
{
    global $employee_eligibility;
    $employee_eligibility->employee_eligibility_TotalRecords->CCSEvents["BeforeShow"] = "employee_eligibility_employee_eligibility_TotalRecords_BeforeShow";
    $employee_eligibility->ds->CCSEvents["BeforeExecuteSelect"] = "employee_eligibility_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_eligibility_employee_eligibility_TotalRecords_BeforeShow @5-1B1F570F
function employee_eligibility_employee_eligibility_TotalRecords_BeforeShow(& $sender)
{
    $employee_eligibility_employee_eligibility_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_eligibility; //Compatibility
//End employee_eligibility_employee_eligibility_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_eligibility_employee_eligibility_TotalRecords_BeforeShow @5-791AA499
    return $employee_eligibility_employee_eligibility_TotalRecords_BeforeShow;
}
//End Close employee_eligibility_employee_eligibility_TotalRecords_BeforeShow

//employee_eligibility_ds_BeforeExecuteSelect @2-9766F058
function employee_eligibility_ds_BeforeExecuteSelect(& $sender)
{
    $employee_eligibility_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_eligibility; //Compatibility
//End employee_eligibility_ds_BeforeExecuteSelect

//Custom Code @48-2A29BDB7
// -------------------------
global $employee_eligibility;
if($employee_eligibility->ds->Where =="")
$employee_eligibility->ds->Where = "EligibilityID = -1";
    // Write your own code here.
// -------------------------
//End Custom Code

//Close employee_eligibility_ds_BeforeExecuteSelect @2-B7C99E6D
    return $employee_eligibility_ds_BeforeExecuteSelect;
}
//End Close employee_eligibility_ds_BeforeExecuteSelect


?>
