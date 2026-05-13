<?php
//BindEvents Method @1-55925C12
function BindEvents()
{
    global $employee_employee_referen;
    $employee_employee_referen->Navigator->CCSEvents["BeforeShow"] = "employee_employee_referen_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_employee_referen_Navigator_BeforeShow @23-41338B58
function employee_employee_referen_Navigator_BeforeShow(& $sender)
{
    $employee_employee_referen_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_referen; //Compatibility
//End employee_employee_referen_Navigator_BeforeShow

//Hide-Show Component @24-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_referen_Navigator_BeforeShow @23-4C61CD5A
    return $employee_employee_referen_Navigator_BeforeShow;
}
//End Close employee_employee_referen_Navigator_BeforeShow


?>
