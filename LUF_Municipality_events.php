<?php
//BindEvents Method @1-35A8E765
function BindEvents()
{
    global $lut_municipality;
    $lut_municipality->lut_municipality_TotalRecords->CCSEvents["BeforeShow"] = "lut_municipality_lut_municipality_TotalRecords_BeforeShow";
}
//End BindEvents Method

//lut_municipality_lut_municipality_TotalRecords_BeforeShow @5-DA84743D
function lut_municipality_lut_municipality_TotalRecords_BeforeShow(& $sender)
{
    $lut_municipality_lut_municipality_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lut_municipality; //Compatibility
//End lut_municipality_lut_municipality_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close lut_municipality_lut_municipality_TotalRecords_BeforeShow @5-62487464
    return $lut_municipality_lut_municipality_TotalRecords_BeforeShow;
}
//End Close lut_municipality_lut_municipality_TotalRecords_BeforeShow


?>
