<?php
//BindEvents Method @1-555A560A
function BindEvents()
{
    global $employee_references;
    $employee_references->Navigator->CCSEvents["BeforeShow"] = "employee_references_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_references_Navigator_BeforeShow @9-7D521526
function employee_references_Navigator_BeforeShow(& $sender)
{
    $employee_references_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_references; //Compatibility
//End employee_references_Navigator_BeforeShow

//Hide-Show Component @10-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_references_Navigator_BeforeShow @9-E3A303EC
    return $employee_references_Navigator_BeforeShow;
}
//End Close employee_references_Navigator_BeforeShow


?>
