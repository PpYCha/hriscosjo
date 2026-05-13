<?php
//BindEvents Method @1-F0771EAB
function BindEvents()
{
    global $employee_voluntaryworkinv;
    $employee_voluntaryworkinv->Navigator->CCSEvents["BeforeShow"] = "employee_voluntaryworkinv_Navigator_BeforeShow";
}
//End BindEvents Method

//employee_voluntaryworkinv_Navigator_BeforeShow @9-1E66FDC9
function employee_voluntaryworkinv_Navigator_BeforeShow(& $sender)
{
    $employee_voluntaryworkinv_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $employee_voluntaryworkinv; //Compatibility
//End employee_voluntaryworkinv_Navigator_BeforeShow

//Hide-Show Component @10-286333C6
    $Parameter1 = $Container->TotalPages;
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close employee_voluntaryworkinv_Navigator_BeforeShow @9-1E17B439
    return $employee_voluntaryworkinv_Navigator_BeforeShow;
}
//End Close employee_voluntaryworkinv_Navigator_BeforeShow


?>
