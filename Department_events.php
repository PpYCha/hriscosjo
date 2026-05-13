<?php
//BindEvents Method @1-D275AEB9
function BindEvents()
{
    global $departmentoffice;
    $departmentoffice->departmentoffice_TotalRecords->CCSEvents["BeforeShow"] = "departmentoffice_departmentoffice_TotalRecords_BeforeShow";
}
//End BindEvents Method

//departmentoffice_departmentoffice_TotalRecords_BeforeShow @10-AE5FD690
function departmentoffice_departmentoffice_TotalRecords_BeforeShow(& $sender)
{
    $departmentoffice_departmentoffice_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $departmentoffice; //Compatibility
//End departmentoffice_departmentoffice_TotalRecords_BeforeShow

//Retrieve number of records @11-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close departmentoffice_departmentoffice_TotalRecords_BeforeShow @10-B55918A9
    return $departmentoffice_departmentoffice_TotalRecords_BeforeShow;
}
//End Close departmentoffice_departmentoffice_TotalRecords_BeforeShow


?>
