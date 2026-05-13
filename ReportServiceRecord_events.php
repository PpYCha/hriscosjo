<?php
//BindEvents Method @1-9DB50879
function BindEvents()
{
    global $employee_employee_service1;
    global $employee_employee_service;
    global $Report_Print;
    $employee_employee_service1->Navigator->CCSEvents["BeforeShow"] = "employee_employee_service1_Navigator_BeforeShow";
    $employee_employee_service1->ds->CCSEvents["BeforeExecuteSelect"] = "employee_employee_service1_ds_BeforeExecuteSelect";
    $employee_employee_service->CCSEvents["BeforeShow"] = "employee_employee_service_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
}
//End BindEvents Method

//employee_employee_service1_Navigator_BeforeShow @60-4BA2715A
function employee_employee_service1_Navigator_BeforeShow(& $sender)
{
    $employee_employee_service1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_service1; //Compatibility
//End employee_employee_service1_Navigator_BeforeShow

//Hide-Show Component @61-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_service1_Navigator_BeforeShow @60-F9EED256
    return $employee_employee_service1_Navigator_BeforeShow;
}
//End Close employee_employee_service1_Navigator_BeforeShow

//employee_employee_service1_ds_BeforeExecuteSelect @2-DA6C25B7
function employee_employee_service1_ds_BeforeExecuteSelect(& $sender)
{
    $employee_employee_service1_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_service1; //Compatibility
//End employee_employee_service1_ds_BeforeExecuteSelect

//Custom Code @100-2A29BDB7
// -------------------------
    // Write your own code here.
global $employee_employee_service1;
if ($employee_employee_service1->ds->Where=="")
$employee_employee_service1->ds->Where = "ServiceRecID = -1";

// -------------------------
//End Custom Code

//Close employee_employee_service1_ds_BeforeExecuteSelect @2-13E167B7
    return $employee_employee_service1_ds_BeforeExecuteSelect;
}
//End Close employee_employee_service1_ds_BeforeExecuteSelect

//employee_employee_service_BeforeShow @11-192C6A39
function employee_employee_service_BeforeShow(& $sender)
{
    $employee_employee_service_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_service; //Compatibility
//End employee_employee_service_BeforeShow

//Hide-Show Component @21-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_service_BeforeShow @11-8BAE1FC6
    return $employee_employee_service_BeforeShow;
}
//End Close employee_employee_service_BeforeShow

//Report_Print_BeforeShow @18-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @20-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @18-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow


?>
