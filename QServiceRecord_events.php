<?php
//BindEvents Method @1-20DDA158
function BindEvents()
{
    global $employee_servicerecord;
    $employee_servicerecord->Navigator->CCSEvents["BeforeShow"] = "employee_servicerecord_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_servicerecord_Navigator_BeforeShow @10-0F1F52FD
function employee_servicerecord_Navigator_BeforeShow(& $sender)
{
    $employee_servicerecord_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_servicerecord; //Compatibility
//End employee_servicerecord_Navigator_BeforeShow

//Hide-Show Component @11-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_servicerecord_Navigator_BeforeShow @10-C0C8853E
    return $employee_servicerecord_Navigator_BeforeShow;
}
//End Close employee_servicerecord_Navigator_BeforeShow


?>
