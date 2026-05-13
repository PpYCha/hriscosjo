<?php
//BindEvents Method @1-15829E3D
function BindEvents()
{
    global $employee_employee_workexp;
    $employee_employee_workexp->Navigator->CCSEvents["BeforeShow"] = "employee_employee_workexp_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_employee_workexp_Navigator_BeforeShow @24-0E6261E5
function employee_employee_workexp_Navigator_BeforeShow(& $sender)
{
    $employee_employee_workexp_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_workexp; //Compatibility
//End employee_employee_workexp_Navigator_BeforeShow

//Hide-Show Component @25-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_workexp_Navigator_BeforeShow @24-CFE224D0
    return $employee_employee_workexp_Navigator_BeforeShow;
}
//End Close employee_employee_workexp_Navigator_BeforeShow


?>
