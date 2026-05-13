<?php
//BindEvents Method @1-541D25BC
function BindEvents()
{
    global $employee_educbackgrnd;
    $employee_educbackgrnd->Navigator->CCSEvents["BeforeShow"] = "employee_educbackgrnd_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_educbackgrnd_Navigator_BeforeShow @9-41D39B2B
function employee_educbackgrnd_Navigator_BeforeShow(& $sender)
{
    $employee_educbackgrnd_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_educbackgrnd; //Compatibility
//End employee_educbackgrnd_Navigator_BeforeShow

//Hide-Show Component @10-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_educbackgrnd_Navigator_BeforeShow @9-0CFDA653
    return $employee_educbackgrnd_Navigator_BeforeShow;
}
//End Close employee_educbackgrnd_Navigator_BeforeShow


?>
