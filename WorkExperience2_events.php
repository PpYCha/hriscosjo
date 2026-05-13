<?php
//BindEvents Method @1-63DAACEE
function BindEvents()
{
    global $employee_workexperience;
    $employee_workexperience->employee_workexperience_TotalRecords->CCSEvents["BeforeShow"] = "employee_workexperience_employee_workexperience_TotalRecords_BeforeShow";
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


?>
