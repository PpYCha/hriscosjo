<?php
//BindEvents Method @1-3F6C7186
function BindEvents()
{
    global $employee_specialskills;
    $employee_specialskills->Navigator->CCSEvents["BeforeShow"] = "employee_specialskills_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_specialskills_Navigator_BeforeShow @9-A39930B4
function employee_specialskills_Navigator_BeforeShow(& $sender)
{
    $employee_specialskills_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_specialskills; //Compatibility
//End employee_specialskills_Navigator_BeforeShow

//Hide-Show Component @10-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_specialskills_Navigator_BeforeShow @9-E848755F
    return $employee_specialskills_Navigator_BeforeShow;
}
//End Close employee_specialskills_Navigator_BeforeShow


?>
