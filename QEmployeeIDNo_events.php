<?php
//BindEvents Method @1-3C2B06AD
function BindEvents()
{
    global $employee_departmentoffice;
    $employee_departmentoffice->Navigator->CCSEvents["BeforeShow"] = "employee_departmentoffice_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_departmentoffice_Navigator_BeforeShow @29-647ABD4B
function employee_departmentoffice_Navigator_BeforeShow(& $sender)
{
    $employee_departmentoffice_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_departmentoffice; //Compatibility
//End employee_departmentoffice_Navigator_BeforeShow

//Hide-Show Component @30-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_departmentoffice_Navigator_BeforeShow @29-D64BB01E
    return $employee_departmentoffice_Navigator_BeforeShow;
}
//End Close employee_departmentoffice_Navigator_BeforeShow


?>
