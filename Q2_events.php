<?php
//BindEvents Method @1-4598CCC3
function BindEvents()
{
    global $employee;
    $employee->Navigator->CCSEvents["BeforeShow"] = "employee_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_Navigator_BeforeShow @37-77AEBAE0
function employee_Navigator_BeforeShow(& $sender)
{
    $employee_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee; //Compatibility
//End employee_Navigator_BeforeShow

//Hide-Show Component @38-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_Navigator_BeforeShow @37-D4DC2A28
    return $employee_Navigator_BeforeShow;
}
//End Close employee_Navigator_BeforeShow


?>
