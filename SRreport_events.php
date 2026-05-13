<?php
//BindEvents Method @1-F07A03B7
function BindEvents()
{
    global $employee_lut_servicerecpu;
    global $employee_employee_service;
    global $Report_Print1;
    $employee_lut_servicerecpu->Navigator->CCSEvents["BeforeShow"] = "employee_lut_servicerecpu_Navigator_BeforeShow";
    $employee_lut_servicerecpu->ds->CCSEvents["BeforeExecuteSelect"] = "employee_lut_servicerecpu_ds_BeforeExecuteSelect";
    $employee_employee_service->CCSEvents["BeforeShow"] = "employee_employee_service_BeforeShow";
    $Report_Print1->CCSEvents["BeforeShow"] = "Report_Print1_BeforeShow";
}
//End BindEvents Method

//employee_lut_servicerecpu_Navigator_BeforeShow @42-C3521F18
function employee_lut_servicerecpu_Navigator_BeforeShow(& $sender)
{
    $employee_lut_servicerecpu_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_lut_servicerecpu; //Compatibility
//End employee_lut_servicerecpu_Navigator_BeforeShow

//Hide-Show Component @43-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_lut_servicerecpu_Navigator_BeforeShow @42-03F815DA
    return $employee_lut_servicerecpu_Navigator_BeforeShow;
}
//End Close employee_lut_servicerecpu_Navigator_BeforeShow

//employee_lut_servicerecpu_ds_BeforeExecuteSelect @2-491DFE6A
function employee_lut_servicerecpu_ds_BeforeExecuteSelect(& $sender)
{
    $employee_lut_servicerecpu_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_lut_servicerecpu; //Compatibility
//End employee_lut_servicerecpu_ds_BeforeExecuteSelect

//Custom Code @92-2A29BDB7
// -------------------------
    // Write your own code here.

	global $employee_lut_servicerecpu;
	if($employee_lut_servicerecpu->ds->Where=="")
	$employee_lut_servicerecpu->ds->Where="ServiceRecID=0";
// -------------------------
//End Custom Code

//Close employee_lut_servicerecpu_ds_BeforeExecuteSelect @2-81D71DF5
    return $employee_lut_servicerecpu_ds_BeforeExecuteSelect;
}
//End Close employee_lut_servicerecpu_ds_BeforeExecuteSelect

//employee_employee_service_BeforeShow @20-192C6A39
function employee_employee_service_BeforeShow(& $sender)
{
    $employee_employee_service_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_service; //Compatibility
//End employee_employee_service_BeforeShow

//Hide-Show Component @31-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_service_BeforeShow @20-8BAE1FC6
    return $employee_employee_service_BeforeShow;
}
//End Close employee_employee_service_BeforeShow

//Report_Print1_BeforeShow @89-E4A2549A
function Report_Print1_BeforeShow(& $sender)
{
    $Report_Print1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print1; //Compatibility
//End Report_Print1_BeforeShow

//Hide-Show Component @90-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print1_BeforeShow @89-7AEBF47C
    return $Report_Print1_BeforeShow;
}
//End Close Report_Print1_BeforeShow


?>
