<?php
//BindEvents Method @1-FFABAE6E
function BindEvents()
{
    global $employee_membershipassoco;
    $employee_membershipassoco->Navigator->CCSEvents["BeforeShow"] = "employee_membershipassoco_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_membershipassoco_Navigator_BeforeShow @10-973E1ABB
function employee_membershipassoco_Navigator_BeforeShow(& $sender)
{
    $employee_membershipassoco_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_membershipassoco; //Compatibility
//End employee_membershipassoco_Navigator_BeforeShow

//Hide-Show Component @11-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_membershipassoco_Navigator_BeforeShow @10-DDDE0EB4
    return $employee_membershipassoco_Navigator_BeforeShow;
}
//End Close employee_membershipassoco_Navigator_BeforeShow


?>
