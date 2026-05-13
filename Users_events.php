<?php
//BindEvents Method @1-F2E78F0D
function BindEvents()
{
    global $users;
    $users->users_TotalRecords->CCSEvents["BeforeShow"] = "users_users_TotalRecords_BeforeShow";
}
//End BindEvents Method

//users_users_TotalRecords_BeforeShow @5-84F8C37C
function users_users_TotalRecords_BeforeShow(& $sender)
{
    $users_users_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $users; //Compatibility
//End users_users_TotalRecords_BeforeShow

//Retrieve number of records @6-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close users_users_TotalRecords_BeforeShow @5-ADD8CAEB
    return $users_users_TotalRecords_BeforeShow;
}
//End Close users_users_TotalRecords_BeforeShow


?>
