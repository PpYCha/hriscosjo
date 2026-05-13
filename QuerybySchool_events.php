<?php
//BindEvents Method @1-4AC93EE6
function BindEvents()
{
    global $employee_employee_educbac;
    global $Report_Print;
    global $employee_employee_educbac1;
    $employee_employee_educbac->CCSEvents["BeforeShow"] = "employee_employee_educbac_BeforeShow";
    $Report_Print->CCSEvents["BeforeShow"] = "Report_Print_BeforeShow";
    $employee_employee_educbac1->Navigator->CCSEvents["BeforeShow"] = "employee_employee_educbac1_Navigator_BeforeShow";
    $employee_employee_educbac1->ds->CCSEvents["BeforeExecuteSelect"] = "employee_employee_educbac1_ds_BeforeExecuteSelect";
}
//End BindEvents Method

//employee_employee_educbac_BeforeShow @6-74E565BE
function employee_employee_educbac_BeforeShow(& $sender)
{
    $employee_employee_educbac_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_educbac; //Compatibility
//End employee_employee_educbac_BeforeShow

//Hide-Show Component @13-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_educbac_BeforeShow @6-30E70761
    return $employee_employee_educbac_BeforeShow;
}
//End Close employee_employee_educbac_BeforeShow

//Report_Print_BeforeShow @10-6CD7E3F9
function Report_Print_BeforeShow(& $sender)
{
    $Report_Print_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Report_Print; //Compatibility
//End Report_Print_BeforeShow

//Hide-Show Component @12-286F3E6C
    $Parameter1 = CCGetFromGet("ViewMode", "");
    $Parameter2 = "Print";
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsText))
        $Component->Visible = false;
//End Hide-Show Component

//Close Report_Print_BeforeShow @10-0DD1CC60
    return $Report_Print_BeforeShow;
}
//End Close Report_Print_BeforeShow

//employee_employee_educbac1_Navigator_BeforeShow @23-8E1C7ECE
function employee_employee_educbac1_Navigator_BeforeShow(& $sender)
{
    $employee_employee_educbac1_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_educbac1; //Compatibility
//End employee_employee_educbac1_Navigator_BeforeShow

//Hide-Show Component @24-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_educbac1_Navigator_BeforeShow @23-EC7CC32C
    return $employee_employee_educbac1_Navigator_BeforeShow;
}
//End Close employee_employee_educbac1_Navigator_BeforeShow

//employee_employee_educbac1_ds_BeforeExecuteSelect @2-48581BFE
function employee_employee_educbac1_ds_BeforeExecuteSelect(& $sender)
{
    $employee_employee_educbac1_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_educbac1; //Compatibility
//End employee_employee_educbac1_ds_BeforeExecuteSelect

//Custom Code @55-2A29BDB7
// -------------------------
    // Write your own code here.

	global $employee_employee_educbac1;
	if ($employee_employee_educbac1->ds->Where=="")
	$employee_employee_educbac1->ds->Where = "EmployeeEducID=0";

// -------------------------
//End Custom Code

//Close employee_employee_educbac1_ds_BeforeExecuteSelect @2-AC81C3AB
    return $employee_employee_educbac1_ds_BeforeExecuteSelect;
}
//End Close employee_employee_educbac1_ds_BeforeExecuteSelect


?>
