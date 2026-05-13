<?php
//BindEvents Method @1-5CEC8FD0
function BindEvents()
{
    global $employee_lut_servicerecpu;
    $employee_lut_servicerecpu->Navigator->CCSEvents["BeforeShow"] = "employee_lut_servicerecpu_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_lut_servicerecpu_Navigator_BeforeShow @42-C3521F18
function employee_lut_servicerecpu_Navigator_BeforeShow(& $sender)
{
    $employee_lut_servicerecpu_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_lut_servicerecpu; //Compatibility
//End employee_lut_servicerecpu_Navigator_BeforeShow

//Hide-Show Component @43-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_lut_servicerecpu_Navigator_BeforeShow @42-03F815DA
    return $employee_lut_servicerecpu_Navigator_BeforeShow;
}
//End Close employee_lut_servicerecpu_Navigator_BeforeShow


?>
