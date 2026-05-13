<?php
//BindEvents Method @1-0B9EBE4E
function BindEvents()
{
    global $employee_training;
    $employee_training->employee_training_TotalRecords->CCSEvents["BeforeShow"] = "employee_training_employee_training_TotalRecords_BeforeShow";
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


?>
