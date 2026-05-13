<?php
//BindEvents Method @1-C03052FF
function BindEvents()
{
    global $employee_workexperience;
    $employee_workexperience->Navigator->CCSEvents["BeforeShow"] = "employee_workexperience_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_workexperience_Navigator_BeforeShow @9-39CFA4C4
function employee_workexperience_Navigator_BeforeShow(& $sender)
{
    $employee_workexperience_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_workexperience; //Compatibility
//End employee_workexperience_Navigator_BeforeShow

//Hide-Show Component @10-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_workexperience_Navigator_BeforeShow @9-2F51DE0D
    return $employee_workexperience_Navigator_BeforeShow;
}
//End Close employee_workexperience_Navigator_BeforeShow


?>
