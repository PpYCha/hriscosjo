<?php
//BindEvents Method @1-B3E7B46E
function BindEvents()
{
    global $employee_eligibility;
    $employee_eligibility->Navigator->CCSEvents["BeforeShow"] = "employee_eligibility_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_eligibility_Navigator_BeforeShow @9-CE31FEC8
function employee_eligibility_Navigator_BeforeShow(& $sender)
{
    $employee_eligibility_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_eligibility; //Compatibility
//End employee_eligibility_Navigator_BeforeShow

//Hide-Show Component @10-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_eligibility_Navigator_BeforeShow @9-7D86DBCA
    return $employee_eligibility_Navigator_BeforeShow;
}
//End Close employee_eligibility_Navigator_BeforeShow


?>
