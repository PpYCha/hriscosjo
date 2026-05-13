<?php
//BindEvents Method @1-D1BA74A7
function BindEvents()
{
    global $employee_employee_eligibi;
    $employee_employee_eligibi->Navigator->CCSEvents["BeforeShow"] = "employee_employee_eligibi_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_employee_eligibi_Navigator_BeforeShow @24-A3C38EC5
function employee_employee_eligibi_Navigator_BeforeShow(& $sender)
{
    $employee_employee_eligibi_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_employee_eligibi; //Compatibility
//End employee_employee_eligibi_Navigator_BeforeShow

//Hide-Show Component @25-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_employee_eligibi_Navigator_BeforeShow @24-62AE393C
    return $employee_employee_eligibi_Navigator_BeforeShow;
}
//End Close employee_employee_eligibi_Navigator_BeforeShow


?>
