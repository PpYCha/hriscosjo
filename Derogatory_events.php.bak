<?php
//BindEvents Method @1-4E8BD03F
function BindEvents()
{
    global $derogatory;
    $derogatory->derogatory_TotalRecords->CCSEvents["BeforeShow"] = "derogatory_derogatory_TotalRecords_BeforeShow";
}
//End BindEvents Method

//derogatory_derogatory_TotalRecords_BeforeShow @5-2C979CA6
function derogatory_derogatory_TotalRecords_BeforeShow(& $sender)
{
    $derogatory_derogatory_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $derogatory; //Compatibility
//End derogatory_derogatory_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close derogatory_derogatory_TotalRecords_BeforeShow @5-AB5E4520
    return $derogatory_derogatory_TotalRecords_BeforeShow;
}
//End Close derogatory_derogatory_TotalRecords_BeforeShow


?>
