<?php
//BindEvents Method @1-29CDF14B
function BindEvents()
{
    global $employee_recognition;
    $employee_recognition->Navigator->CCSEvents["BeforeShow"] = "employee_recognition_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_recognition_Navigator_BeforeShow @10-A5BCB507
function employee_recognition_Navigator_BeforeShow(& $sender)
{
    $employee_recognition_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_recognition; //Compatibility
//End employee_recognition_Navigator_BeforeShow

//Hide-Show Component @11-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_recognition_Navigator_BeforeShow @10-8AB4DF55
    return $employee_recognition_Navigator_BeforeShow;
}
//End Close employee_recognition_Navigator_BeforeShow


?>
