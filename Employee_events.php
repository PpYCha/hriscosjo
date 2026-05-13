<?php
//BindEvents Method @1-61886932
function BindEvents()
{
    global $employee;
    global $CCSEvents;
    $employee->employee_TotalRecords->CCSEvents["BeforeShow"] = "employee_employee_TotalRecords_BeforeShow";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
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

//Page_BeforeShow @1-0036CFC8
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Employee; //Compatibility
//End Page_BeforeShow

//Custom Code @178-2A29BDB7
// -------------------------
    // Write your own code here.

//	$dateOfBirth = $BirthDate;
//	$today = date("Y-m-d");
//	$diff = date_diff(date_create($dateOfBirth), date_create($today));
//	echo 'Age is ' .$diff->format('%y');
// -------------------------
//End Custom Code

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow


?>
