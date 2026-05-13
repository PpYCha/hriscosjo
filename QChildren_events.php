<?php
//BindEvents Method @1-A7191505
function BindEvents()
{
    global $employee_children;
    $employee_children->Navigator->CCSEvents["BeforeShow"] = "employee_children_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_children_Navigator_BeforeShow @10-1EFCA792
function employee_children_Navigator_BeforeShow(& $sender)
{
    $employee_children_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_children; //Compatibility
//End employee_children_Navigator_BeforeShow

//Hide-Show Component @11-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_children_Navigator_BeforeShow @10-71C6E6EB
    return $employee_children_Navigator_BeforeShow;
}
//End Close employee_children_Navigator_BeforeShow


?>
