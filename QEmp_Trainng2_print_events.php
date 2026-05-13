<?php
//BindEvents Method @1-DFA95614
function BindEvents()
{
    global $employee_employee_trainin;
    $employee_employee_trainin->Navigator->CCSEvents["BeforeShow"] = "employee_employee_trainin_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_employee_trainin_Navigator_BeforeShow @24-C20B4437
function employee_employee_trainin_Navigator_BeforeShow(& $sender)
{
    $employee_employee_trainin_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_trainin; //Compatibility
//End employee_employee_trainin_Navigator_BeforeShow

//Hide-Show Component @25-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_trainin_Navigator_BeforeShow @24-141E7418
    return $employee_employee_trainin_Navigator_BeforeShow;
}
//End Close employee_employee_trainin_Navigator_BeforeShow


?>
