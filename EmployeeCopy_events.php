<?php
//BindEvents Method @1-6EC1E026
function BindEvents()
{
    global $employee;
    $employee->employee_TotalRecords->CCSEvents["BeforeShow"] = "employee_employee_TotalRecords_BeforeShow";
}
//End BindEvents Method

//employee_employee_TotalRecords_BeforeShow @12-B7EC2597
function employee_employee_TotalRecords_BeforeShow(& $sender)
{
    $employee_employee_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee; //Compatibility
//End employee_employee_TotalRecords_BeforeShow

//Retrieve number of records @13-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close employee_employee_TotalRecords_BeforeShow @12-80AE5E2A
    return $employee_employee_TotalRecords_BeforeShow;
}
//End Close employee_employee_TotalRecords_BeforeShow


?>
