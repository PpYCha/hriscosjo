<?php
//BindEvents Method @1-6E55EC56
function BindEvents()
{
    global $employee_servicerecord;
    $employee_servicerecord->employee_servicerecord_TotalRecords->CCSEvents["BeforeShow"] = "employee_servicerecord_employee_servicerecord_TotalRecords_BeforeShow";
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


?>
