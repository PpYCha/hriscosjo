<?php
//Include Common Files @1-9B594B6B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QEmp_CurrentPosition.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_lut_statofappt2 ReportGroup class @2-B4B3A5C3
class clsReportGroupemployee_lut_statofappt2 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $NameOfficeDept, $_NameOfficeDeptAttributes;
    var $Position, $_PositionAttributes;
    var $EffectiveMonth, $_EffectiveMonthAttributes;
    var $MonthlySalary, $_MonthlySalaryAttributes;
    var $StatApp, $_StatAppAttributes;
    var $EffectiveDay, $_EffectiveDayAttributes;
    var $EffectiveYear, $_EffectiveYearAttributes;
    var $EmpPicture, $_EmpPictureAttributes;
    var $Position5, $_Position5Attributes;
    var $Position1, $_Position1Attributes;
    var $Position4, $_Position4Attributes;
    var $ReportLabel1, $_ReportLabel1Attributes;
    var $Position2, $_Position2Attributes;
    var $Position3, $_Position3Attributes;
    var $OrigApptMonth, $_OrigApptMonthAttributes;
    var $OrigApptDay, $_OrigApptDayAttributes;
    var $OrigApptYear, $_OrigApptYearAttributes;
    var $LastServiceMonth, $_LastServiceMonthAttributes;
    var $LastServiceDay, $_LastServiceDayAttributes;
    var $LastService, $_LastServiceAttributes;
    var $ModeSeparatn, $_ModeSeparatnAttributes;
    var $DetailedID, $_DetailedIDAttributes;
    var $DetailedOffice, $_DetailedOfficeAttributes;
    var $DetailedDate, $_DetailedDateAttributes;
    var $DetailedRemarks, $_DetailedRemarksAttributes;
    var $ReassignmentID, $_ReassignmentIDAttributes;
    var $ReassignmentOffice, $_ReassignmentOfficeAttributes;
    var $ReassignmentDate, $_ReassignmentDateAttributes;
    var $ReassignmentRemarks, $_ReassignmentRemarksAttributes;
    var $ReportLabel2, $_ReportLabel2Attributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_lut_statofappt2(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->NameOfficeDept = $this->Parent->NameOfficeDept->Value;
        $this->Position = $this->Parent->Position->Value;
        $this->EffectiveMonth = $this->Parent->EffectiveMonth->Value;
        $this->MonthlySalary = $this->Parent->MonthlySalary->Value;
        $this->StatApp = $this->Parent->StatApp->Value;
        $this->EffectiveDay = $this->Parent->EffectiveDay->Value;
        $this->EffectiveYear = $this->Parent->EffectiveYear->Value;
        $this->EmpPicture = $this->Parent->EmpPicture->Value;
        $this->Position5 = $this->Parent->Position5->Value;
        $this->Position1 = $this->Parent->Position1->Value;
        $this->Position4 = $this->Parent->Position4->Value;
        $this->ReportLabel1 = $this->Parent->ReportLabel1->Value;
        $this->Position2 = $this->Parent->Position2->Value;
        $this->Position3 = $this->Parent->Position3->Value;
        $this->OrigApptMonth = $this->Parent->OrigApptMonth->Value;
        $this->OrigApptDay = $this->Parent->OrigApptDay->Value;
        $this->OrigApptYear = $this->Parent->OrigApptYear->Value;
        $this->LastServiceMonth = $this->Parent->LastServiceMonth->Value;
        $this->LastServiceDay = $this->Parent->LastServiceDay->Value;
        $this->LastService = $this->Parent->LastService->Value;
        $this->ModeSeparatn = $this->Parent->ModeSeparatn->Value;
        $this->DetailedID = $this->Parent->DetailedID->Value;
        $this->DetailedOffice = $this->Parent->DetailedOffice->Value;
        $this->DetailedDate = $this->Parent->DetailedDate->Value;
        $this->DetailedRemarks = $this->Parent->DetailedRemarks->Value;
        $this->ReassignmentID = $this->Parent->ReassignmentID->Value;
        $this->ReassignmentOffice = $this->Parent->ReassignmentOffice->Value;
        $this->ReassignmentDate = $this->Parent->ReassignmentDate->Value;
        $this->ReassignmentRemarks = $this->Parent->ReassignmentRemarks->Value;
        $this->ReportLabel2 = $this->Parent->ReportLabel2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_NameOfficeDeptAttributes = $this->Parent->NameOfficeDept->Attributes->GetAsArray();
        $this->_PositionAttributes = $this->Parent->Position->Attributes->GetAsArray();
        $this->_EffectiveMonthAttributes = $this->Parent->EffectiveMonth->Attributes->GetAsArray();
        $this->_MonthlySalaryAttributes = $this->Parent->MonthlySalary->Attributes->GetAsArray();
        $this->_StatAppAttributes = $this->Parent->StatApp->Attributes->GetAsArray();
        $this->_EffectiveDayAttributes = $this->Parent->EffectiveDay->Attributes->GetAsArray();
        $this->_EffectiveYearAttributes = $this->Parent->EffectiveYear->Attributes->GetAsArray();
        $this->_EmpPictureAttributes = $this->Parent->EmpPicture->Attributes->GetAsArray();
        $this->_Position5Attributes = $this->Parent->Position5->Attributes->GetAsArray();
        $this->_Position1Attributes = $this->Parent->Position1->Attributes->GetAsArray();
        $this->_Position4Attributes = $this->Parent->Position4->Attributes->GetAsArray();
        $this->_ReportLabel1Attributes = $this->Parent->ReportLabel1->Attributes->GetAsArray();
        $this->_Position2Attributes = $this->Parent->Position2->Attributes->GetAsArray();
        $this->_Position3Attributes = $this->Parent->Position3->Attributes->GetAsArray();
        $this->_OrigApptMonthAttributes = $this->Parent->OrigApptMonth->Attributes->GetAsArray();
        $this->_OrigApptDayAttributes = $this->Parent->OrigApptDay->Attributes->GetAsArray();
        $this->_OrigApptYearAttributes = $this->Parent->OrigApptYear->Attributes->GetAsArray();
        $this->_LastServiceMonthAttributes = $this->Parent->LastServiceMonth->Attributes->GetAsArray();
        $this->_LastServiceDayAttributes = $this->Parent->LastServiceDay->Attributes->GetAsArray();
        $this->_LastServiceAttributes = $this->Parent->LastService->Attributes->GetAsArray();
        $this->_ModeSeparatnAttributes = $this->Parent->ModeSeparatn->Attributes->GetAsArray();
        $this->_DetailedIDAttributes = $this->Parent->DetailedID->Attributes->GetAsArray();
        $this->_DetailedOfficeAttributes = $this->Parent->DetailedOffice->Attributes->GetAsArray();
        $this->_DetailedDateAttributes = $this->Parent->DetailedDate->Attributes->GetAsArray();
        $this->_DetailedRemarksAttributes = $this->Parent->DetailedRemarks->Attributes->GetAsArray();
        $this->_ReassignmentIDAttributes = $this->Parent->ReassignmentID->Attributes->GetAsArray();
        $this->_ReassignmentOfficeAttributes = $this->Parent->ReassignmentOffice->Attributes->GetAsArray();
        $this->_ReassignmentDateAttributes = $this->Parent->ReassignmentDate->Attributes->GetAsArray();
        $this->_ReassignmentRemarksAttributes = $this->Parent->ReassignmentRemarks->Attributes->GetAsArray();
        $this->_ReportLabel2Attributes = $this->Parent->ReportLabel2->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->NameOfficeDept = $Header->NameOfficeDept;
        $Header->_NameOfficeDeptAttributes = $this->_NameOfficeDeptAttributes;
        $this->Parent->NameOfficeDept->Value = $Header->NameOfficeDept;
        $this->Parent->NameOfficeDept->Attributes->RestoreFromArray($Header->_NameOfficeDeptAttributes);
        $this->Position = $Header->Position;
        $Header->_PositionAttributes = $this->_PositionAttributes;
        $this->Parent->Position->Value = $Header->Position;
        $this->Parent->Position->Attributes->RestoreFromArray($Header->_PositionAttributes);
        $this->EffectiveMonth = $Header->EffectiveMonth;
        $Header->_EffectiveMonthAttributes = $this->_EffectiveMonthAttributes;
        $this->Parent->EffectiveMonth->Value = $Header->EffectiveMonth;
        $this->Parent->EffectiveMonth->Attributes->RestoreFromArray($Header->_EffectiveMonthAttributes);
        $this->MonthlySalary = $Header->MonthlySalary;
        $Header->_MonthlySalaryAttributes = $this->_MonthlySalaryAttributes;
        $this->Parent->MonthlySalary->Value = $Header->MonthlySalary;
        $this->Parent->MonthlySalary->Attributes->RestoreFromArray($Header->_MonthlySalaryAttributes);
        $this->StatApp = $Header->StatApp;
        $Header->_StatAppAttributes = $this->_StatAppAttributes;
        $this->Parent->StatApp->Value = $Header->StatApp;
        $this->Parent->StatApp->Attributes->RestoreFromArray($Header->_StatAppAttributes);
        $this->EffectiveDay = $Header->EffectiveDay;
        $Header->_EffectiveDayAttributes = $this->_EffectiveDayAttributes;
        $this->Parent->EffectiveDay->Value = $Header->EffectiveDay;
        $this->Parent->EffectiveDay->Attributes->RestoreFromArray($Header->_EffectiveDayAttributes);
        $this->EffectiveYear = $Header->EffectiveYear;
        $Header->_EffectiveYearAttributes = $this->_EffectiveYearAttributes;
        $this->Parent->EffectiveYear->Value = $Header->EffectiveYear;
        $this->Parent->EffectiveYear->Attributes->RestoreFromArray($Header->_EffectiveYearAttributes);
        $this->EmpPicture = $Header->EmpPicture;
        $Header->_EmpPictureAttributes = $this->_EmpPictureAttributes;
        $this->Parent->EmpPicture->Value = $Header->EmpPicture;
        $this->Parent->EmpPicture->Attributes->RestoreFromArray($Header->_EmpPictureAttributes);
        $this->Position5 = $Header->Position5;
        $Header->_Position5Attributes = $this->_Position5Attributes;
        $this->Parent->Position5->Value = $Header->Position5;
        $this->Parent->Position5->Attributes->RestoreFromArray($Header->_Position5Attributes);
        $this->Position1 = $Header->Position1;
        $Header->_Position1Attributes = $this->_Position1Attributes;
        $this->Parent->Position1->Value = $Header->Position1;
        $this->Parent->Position1->Attributes->RestoreFromArray($Header->_Position1Attributes);
        $this->Position4 = $Header->Position4;
        $Header->_Position4Attributes = $this->_Position4Attributes;
        $this->Parent->Position4->Value = $Header->Position4;
        $this->Parent->Position4->Attributes->RestoreFromArray($Header->_Position4Attributes);
        $this->ReportLabel1 = $Header->ReportLabel1;
        $Header->_ReportLabel1Attributes = $this->_ReportLabel1Attributes;
        $this->Parent->ReportLabel1->Value = $Header->ReportLabel1;
        $this->Parent->ReportLabel1->Attributes->RestoreFromArray($Header->_ReportLabel1Attributes);
        $this->Position2 = $Header->Position2;
        $Header->_Position2Attributes = $this->_Position2Attributes;
        $this->Parent->Position2->Value = $Header->Position2;
        $this->Parent->Position2->Attributes->RestoreFromArray($Header->_Position2Attributes);
        $this->Position3 = $Header->Position3;
        $Header->_Position3Attributes = $this->_Position3Attributes;
        $this->Parent->Position3->Value = $Header->Position3;
        $this->Parent->Position3->Attributes->RestoreFromArray($Header->_Position3Attributes);
        $this->OrigApptMonth = $Header->OrigApptMonth;
        $Header->_OrigApptMonthAttributes = $this->_OrigApptMonthAttributes;
        $this->Parent->OrigApptMonth->Value = $Header->OrigApptMonth;
        $this->Parent->OrigApptMonth->Attributes->RestoreFromArray($Header->_OrigApptMonthAttributes);
        $this->OrigApptDay = $Header->OrigApptDay;
        $Header->_OrigApptDayAttributes = $this->_OrigApptDayAttributes;
        $this->Parent->OrigApptDay->Value = $Header->OrigApptDay;
        $this->Parent->OrigApptDay->Attributes->RestoreFromArray($Header->_OrigApptDayAttributes);
        $this->OrigApptYear = $Header->OrigApptYear;
        $Header->_OrigApptYearAttributes = $this->_OrigApptYearAttributes;
        $this->Parent->OrigApptYear->Value = $Header->OrigApptYear;
        $this->Parent->OrigApptYear->Attributes->RestoreFromArray($Header->_OrigApptYearAttributes);
        $this->LastServiceMonth = $Header->LastServiceMonth;
        $Header->_LastServiceMonthAttributes = $this->_LastServiceMonthAttributes;
        $this->Parent->LastServiceMonth->Value = $Header->LastServiceMonth;
        $this->Parent->LastServiceMonth->Attributes->RestoreFromArray($Header->_LastServiceMonthAttributes);
        $this->LastServiceDay = $Header->LastServiceDay;
        $Header->_LastServiceDayAttributes = $this->_LastServiceDayAttributes;
        $this->Parent->LastServiceDay->Value = $Header->LastServiceDay;
        $this->Parent->LastServiceDay->Attributes->RestoreFromArray($Header->_LastServiceDayAttributes);
        $this->LastService = $Header->LastService;
        $Header->_LastServiceAttributes = $this->_LastServiceAttributes;
        $this->Parent->LastService->Value = $Header->LastService;
        $this->Parent->LastService->Attributes->RestoreFromArray($Header->_LastServiceAttributes);
        $this->ModeSeparatn = $Header->ModeSeparatn;
        $Header->_ModeSeparatnAttributes = $this->_ModeSeparatnAttributes;
        $this->Parent->ModeSeparatn->Value = $Header->ModeSeparatn;
        $this->Parent->ModeSeparatn->Attributes->RestoreFromArray($Header->_ModeSeparatnAttributes);
        $this->DetailedID = $Header->DetailedID;
        $Header->_DetailedIDAttributes = $this->_DetailedIDAttributes;
        $this->Parent->DetailedID->Value = $Header->DetailedID;
        $this->Parent->DetailedID->Attributes->RestoreFromArray($Header->_DetailedIDAttributes);
        $this->DetailedOffice = $Header->DetailedOffice;
        $Header->_DetailedOfficeAttributes = $this->_DetailedOfficeAttributes;
        $this->Parent->DetailedOffice->Value = $Header->DetailedOffice;
        $this->Parent->DetailedOffice->Attributes->RestoreFromArray($Header->_DetailedOfficeAttributes);
        $this->DetailedDate = $Header->DetailedDate;
        $Header->_DetailedDateAttributes = $this->_DetailedDateAttributes;
        $this->Parent->DetailedDate->Value = $Header->DetailedDate;
        $this->Parent->DetailedDate->Attributes->RestoreFromArray($Header->_DetailedDateAttributes);
        $this->DetailedRemarks = $Header->DetailedRemarks;
        $Header->_DetailedRemarksAttributes = $this->_DetailedRemarksAttributes;
        $this->Parent->DetailedRemarks->Value = $Header->DetailedRemarks;
        $this->Parent->DetailedRemarks->Attributes->RestoreFromArray($Header->_DetailedRemarksAttributes);
        $this->ReassignmentID = $Header->ReassignmentID;
        $Header->_ReassignmentIDAttributes = $this->_ReassignmentIDAttributes;
        $this->Parent->ReassignmentID->Value = $Header->ReassignmentID;
        $this->Parent->ReassignmentID->Attributes->RestoreFromArray($Header->_ReassignmentIDAttributes);
        $this->ReassignmentOffice = $Header->ReassignmentOffice;
        $Header->_ReassignmentOfficeAttributes = $this->_ReassignmentOfficeAttributes;
        $this->Parent->ReassignmentOffice->Value = $Header->ReassignmentOffice;
        $this->Parent->ReassignmentOffice->Attributes->RestoreFromArray($Header->_ReassignmentOfficeAttributes);
        $this->ReassignmentDate = $Header->ReassignmentDate;
        $Header->_ReassignmentDateAttributes = $this->_ReassignmentDateAttributes;
        $this->Parent->ReassignmentDate->Value = $Header->ReassignmentDate;
        $this->Parent->ReassignmentDate->Attributes->RestoreFromArray($Header->_ReassignmentDateAttributes);
        $this->ReassignmentRemarks = $Header->ReassignmentRemarks;
        $Header->_ReassignmentRemarksAttributes = $this->_ReassignmentRemarksAttributes;
        $this->Parent->ReassignmentRemarks->Value = $Header->ReassignmentRemarks;
        $this->Parent->ReassignmentRemarks->Attributes->RestoreFromArray($Header->_ReassignmentRemarksAttributes);
        $this->ReportLabel2 = $Header->ReportLabel2;
        $Header->_ReportLabel2Attributes = $this->_ReportLabel2Attributes;
        $this->Parent->ReportLabel2->Value = $Header->ReportLabel2;
        $this->Parent->ReportLabel2->Attributes->RestoreFromArray($Header->_ReportLabel2Attributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee_lut_statofappt2 ReportGroup class

//employee_lut_statofappt2 GroupsCollection class @2-4C4CE151
class clsGroupsCollectionemployee_lut_statofappt2 {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_lut_statofappt2(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_lut_statofappt2($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->NameOfficeDept->Value = $this->Parent->NameOfficeDept->initialValue;
        $this->Parent->Position->Value = $this->Parent->Position->initialValue;
        $this->Parent->EffectiveMonth->Value = $this->Parent->EffectiveMonth->initialValue;
        $this->Parent->MonthlySalary->Value = $this->Parent->MonthlySalary->initialValue;
        $this->Parent->StatApp->Value = $this->Parent->StatApp->initialValue;
        $this->Parent->EffectiveDay->Value = $this->Parent->EffectiveDay->initialValue;
        $this->Parent->EffectiveYear->Value = $this->Parent->EffectiveYear->initialValue;
        $this->Parent->EmpPicture->Value = $this->Parent->EmpPicture->initialValue;
        $this->Parent->Position5->Value = $this->Parent->Position5->initialValue;
        $this->Parent->Position1->Value = $this->Parent->Position1->initialValue;
        $this->Parent->Position4->Value = $this->Parent->Position4->initialValue;
        $this->Parent->ReportLabel1->Value = $this->Parent->ReportLabel1->initialValue;
        $this->Parent->Position2->Value = $this->Parent->Position2->initialValue;
        $this->Parent->Position3->Value = $this->Parent->Position3->initialValue;
        $this->Parent->OrigApptMonth->Value = $this->Parent->OrigApptMonth->initialValue;
        $this->Parent->OrigApptDay->Value = $this->Parent->OrigApptDay->initialValue;
        $this->Parent->OrigApptYear->Value = $this->Parent->OrigApptYear->initialValue;
        $this->Parent->LastServiceMonth->Value = $this->Parent->LastServiceMonth->initialValue;
        $this->Parent->LastServiceDay->Value = $this->Parent->LastServiceDay->initialValue;
        $this->Parent->LastService->Value = $this->Parent->LastService->initialValue;
        $this->Parent->ModeSeparatn->Value = $this->Parent->ModeSeparatn->initialValue;
        $this->Parent->DetailedID->Value = $this->Parent->DetailedID->initialValue;
        $this->Parent->DetailedOffice->Value = $this->Parent->DetailedOffice->initialValue;
        $this->Parent->DetailedDate->Value = $this->Parent->DetailedDate->initialValue;
        $this->Parent->DetailedRemarks->Value = $this->Parent->DetailedRemarks->initialValue;
        $this->Parent->ReassignmentID->Value = $this->Parent->ReassignmentID->initialValue;
        $this->Parent->ReassignmentOffice->Value = $this->Parent->ReassignmentOffice->initialValue;
        $this->Parent->ReassignmentDate->Value = $this->Parent->ReassignmentDate->initialValue;
        $this->Parent->ReassignmentRemarks->Value = $this->Parent->ReassignmentRemarks->initialValue;
        $this->Parent->ReportLabel2->Value = $this->Parent->ReportLabel2->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End employee_lut_statofappt2 GroupsCollection class

class clsReportemployee_lut_statofappt2 { //employee_lut_statofappt2 Class @2-30B1F82D

//employee_lut_statofappt2 Variables @2-87F7EA53

    var $ComponentType = "Report";
    var $PageSize;
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $CCSEvents = array();
    var $CCSEventResult;
    var $RelativePath = "";
    var $ViewMode = "Web";
    var $TemplateBlock;
    var $PageNumber;
    var $RowNumber;
    var $TotalRows;
    var $TotalPages;
    var $ControlsVisible = array();
    var $IsEmpty;
    var $Attributes;
    var $DetailBlock, $Detail;
    var $Report_FooterBlock, $Report_Footer;
    var $Report_HeaderBlock, $Report_Header;
    var $Page_FooterBlock, $Page_Footer;
    var $Page_HeaderBlock, $Page_Header;
    var $SorterName, $SorterDirection;

    var $ds;
    var $DataSource;
    var $UseClientPaging = false;

    //Report Controls
    var $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    var $Page_FooterControls, $Page_HeaderControls;
//End employee_lut_statofappt2 Variables

//Class_Initialize Event @2-05A47683
    function clsReportemployee_lut_statofappt2($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_lut_statofappt2";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 68;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 2;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 2;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployee_lut_statofappt2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Web");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 500;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 70;
             else if ($PageSize == "0")
                $this->PageSize = 500;
             else 
                $this->PageSize = min(500, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->NameOfficeDept = & new clsControl(ccsReportLabel, "NameOfficeDept", "NameOfficeDept", ccsText, "", "", $this);
        $this->Position = & new clsControl(ccsReportLabel, "Position", "Position", ccsText, "", "", $this);
        $this->EffectiveMonth = & new clsControl(ccsReportLabel, "EffectiveMonth", "EffectiveMonth", ccsText, "", "", $this);
        $this->MonthlySalary = & new clsControl(ccsReportLabel, "MonthlySalary", "MonthlySalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->StatApp = & new clsControl(ccsReportLabel, "StatApp", "StatApp", ccsText, "", "", $this);
        $this->EffectiveDay = & new clsControl(ccsReportLabel, "EffectiveDay", "EffectiveDay", ccsText, "", "", $this);
        $this->EffectiveYear = & new clsControl(ccsReportLabel, "EffectiveYear", "EffectiveYear", ccsText, "", "", $this);
        $this->EmpPicture = & new clsControl(ccsImage, "EmpPicture", "EmpPicture", ccsText, "", CCGetRequestParam("EmpPicture", ccsGet, NULL), $this);
        $this->Position5 = & new clsControl(ccsHidden, "Position5", "Position5", ccsText, "", CCGetRequestParam("Position5", ccsGet, NULL), $this);
        $this->Position1 = & new clsControl(ccsHidden, "Position1", "Position1", ccsText, "", CCGetRequestParam("Position1", ccsGet, NULL), $this);
        $this->Position4 = & new clsControl(ccsHidden, "Position4", "Position4", ccsText, "", CCGetRequestParam("Position4", ccsGet, NULL), $this);
        $this->ReportLabel1 = & new clsControl(ccsReportLabel, "ReportLabel1", "ReportLabel1", ccsDate, array("dddd", ", ", "mmmm", " ", "d", ", ", "yyyy"), "", $this);
        $this->Position2 = & new clsControl(ccsHidden, "Position2", "Position2", ccsText, "", CCGetRequestParam("Position2", ccsGet, NULL), $this);
        $this->Position3 = & new clsControl(ccsHidden, "Position3", "Position3", ccsText, "", CCGetRequestParam("Position3", ccsGet, NULL), $this);
        $this->OrigApptMonth = & new clsControl(ccsReportLabel, "OrigApptMonth", "OrigApptMonth", ccsText, "", "", $this);
        $this->OrigApptDay = & new clsControl(ccsReportLabel, "OrigApptDay", "OrigApptDay", ccsText, "", "", $this);
        $this->OrigApptYear = & new clsControl(ccsReportLabel, "OrigApptYear", "OrigApptYear", ccsText, "", "", $this);
        $this->LastServiceMonth = & new clsControl(ccsReportLabel, "LastServiceMonth", "LastServiceMonth", ccsText, "", "", $this);
        $this->LastServiceDay = & new clsControl(ccsReportLabel, "LastServiceDay", "LastServiceDay", ccsText, "", "", $this);
        $this->LastService = & new clsControl(ccsReportLabel, "LastService", "LastService", ccsText, "", "", $this);
        $this->ModeSeparatn = & new clsControl(ccsReportLabel, "ModeSeparatn", "ModeSeparatn", ccsText, "", "", $this);
        $this->DetailedID = & new clsControl(ccsCheckBox, "DetailedID", "DetailedID", ccsInteger, "", CCGetRequestParam("DetailedID", ccsGet, NULL), $this);
        $this->DetailedID->CheckedValue = $this->DetailedID->GetParsedValue(1);
        $this->DetailedID->UncheckedValue = $this->DetailedID->GetParsedValue(0);
        $this->DetailedOffice = & new clsControl(ccsReportLabel, "DetailedOffice", "DetailedOffice", ccsText, "", "", $this);
        $this->DetailedDate = & new clsControl(ccsReportLabel, "DetailedDate", "DetailedDate", ccsDate, array("mmmm", " ", "d", ", ", "yyyy"), "", $this);
        $this->DetailedRemarks = & new clsControl(ccsReportLabel, "DetailedRemarks", "DetailedRemarks", ccsText, "", "", $this);
        $this->ReassignmentID = & new clsControl(ccsCheckBox, "ReassignmentID", "ReassignmentID", ccsInteger, "", CCGetRequestParam("ReassignmentID", ccsGet, NULL), $this);
        $this->ReassignmentID->CheckedValue = $this->ReassignmentID->GetParsedValue(1);
        $this->ReassignmentID->UncheckedValue = $this->ReassignmentID->GetParsedValue(0);
        $this->ReassignmentOffice = & new clsControl(ccsReportLabel, "ReassignmentOffice", "ReassignmentOffice", ccsText, "", "", $this);
        $this->ReassignmentDate = & new clsControl(ccsReportLabel, "ReassignmentDate", "ReassignmentDate", ccsDate, array("mmmm", " ", "d", ", ", "yyyy"), "", $this);
        $this->ReassignmentRemarks = & new clsControl(ccsReportLabel, "ReassignmentRemarks", "ReassignmentRemarks", ccsText, "", "", $this);
        $this->ReportLabel2 = & new clsControl(ccsReportLabel, "ReportLabel2", "ReportLabel2", ccsInteger, "", "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->PageBreak = & new clsPanel("PageBreak", $this);
        $this->Report_CurrentDate = & new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
    }
//End Class_Initialize Event

//Initialize Method @2-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @2-D9921374
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->NameOfficeDept->Errors->Count());
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->EffectiveMonth->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->StatApp->Errors->Count());
        $errors = ($errors || $this->EffectiveDay->Errors->Count());
        $errors = ($errors || $this->EffectiveYear->Errors->Count());
        $errors = ($errors || $this->EmpPicture->Errors->Count());
        $errors = ($errors || $this->Position5->Errors->Count());
        $errors = ($errors || $this->Position1->Errors->Count());
        $errors = ($errors || $this->Position4->Errors->Count());
        $errors = ($errors || $this->ReportLabel1->Errors->Count());
        $errors = ($errors || $this->Position2->Errors->Count());
        $errors = ($errors || $this->Position3->Errors->Count());
        $errors = ($errors || $this->OrigApptMonth->Errors->Count());
        $errors = ($errors || $this->OrigApptDay->Errors->Count());
        $errors = ($errors || $this->OrigApptYear->Errors->Count());
        $errors = ($errors || $this->LastServiceMonth->Errors->Count());
        $errors = ($errors || $this->LastServiceDay->Errors->Count());
        $errors = ($errors || $this->LastService->Errors->Count());
        $errors = ($errors || $this->ModeSeparatn->Errors->Count());
        $errors = ($errors || $this->DetailedID->Errors->Count());
        $errors = ($errors || $this->DetailedOffice->Errors->Count());
        $errors = ($errors || $this->DetailedDate->Errors->Count());
        $errors = ($errors || $this->DetailedRemarks->Errors->Count());
        $errors = ($errors || $this->ReassignmentID->Errors->Count());
        $errors = ($errors || $this->ReassignmentOffice->Errors->Count());
        $errors = ($errors || $this->ReassignmentDate->Errors->Count());
        $errors = ($errors || $this->ReassignmentRemarks->Errors->Count());
        $errors = ($errors || $this->ReportLabel2->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-9BA0DC02
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->NameOfficeDept->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EffectiveMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatApp->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EffectiveDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EffectiveYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmpPicture->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OrigApptMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OrigApptDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OrigApptYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastServiceMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastServiceDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LastService->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ModeSeparatn->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetailedID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetailedOffice->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetailedDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetailedRemarks->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReassignmentID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReassignmentOffice->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReassignmentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReassignmentRemarks->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-3ED9E558
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;


        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee_lut_statofappt2($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->NameOfficeDept->SetValue($this->DataSource->NameOfficeDept->GetValue());
            $this->Position->SetValue($this->DataSource->Position->GetValue());
            $this->EffectiveMonth->SetValue($this->DataSource->EffectiveMonth->GetValue());
            $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
            $this->StatApp->SetValue($this->DataSource->StatApp->GetValue());
            $this->EffectiveDay->SetValue($this->DataSource->EffectiveDay->GetValue());
            $this->EffectiveYear->SetValue($this->DataSource->EffectiveYear->GetValue());
            $this->EmpPicture->SetValue($this->DataSource->EmpPicture->GetValue());
            $this->Position5->SetValue($this->DataSource->Position5->GetValue());
            $this->Position1->SetValue($this->DataSource->Position1->GetValue());
            $this->Position4->SetValue($this->DataSource->Position4->GetValue());
            $this->ReportLabel1->SetValue($this->DataSource->ReportLabel1->GetValue());
            $this->Position2->SetValue($this->DataSource->Position2->GetValue());
            $this->Position3->SetValue($this->DataSource->Position3->GetValue());
            $this->OrigApptMonth->SetValue($this->DataSource->OrigApptMonth->GetValue());
            $this->OrigApptDay->SetValue($this->DataSource->OrigApptDay->GetValue());
            $this->OrigApptYear->SetValue($this->DataSource->OrigApptYear->GetValue());
            $this->LastServiceMonth->SetValue($this->DataSource->LastServiceMonth->GetValue());
            $this->LastServiceDay->SetValue($this->DataSource->LastServiceDay->GetValue());
            $this->LastService->SetValue($this->DataSource->LastService->GetValue());
            $this->ModeSeparatn->SetValue($this->DataSource->ModeSeparatn->GetValue());
            $this->DetailedID->SetValue($this->DataSource->DetailedID->GetValue());
            $this->DetailedOffice->SetValue($this->DataSource->DetailedOffice->GetValue());
            $this->DetailedDate->SetValue($this->DataSource->DetailedDate->GetValue());
            $this->DetailedRemarks->SetValue($this->DataSource->DetailedRemarks->GetValue());
            $this->ReassignmentID->SetValue($this->DataSource->ReassignmentID->GetValue());
            $this->ReassignmentOffice->SetValue($this->DataSource->ReassignmentOffice->GetValue());
            $this->ReassignmentDate->SetValue($this->DataSource->ReassignmentDate->GetValue());
            $this->ReassignmentRemarks->SetValue($this->DataSource->ReassignmentRemarks->GetValue());
            $this->ReportLabel2->SetValue($this->DataSource->ReportLabel2->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            $this->ControlsVisible["NameOfficeDept"] = $this->NameOfficeDept->Visible;
            $this->ControlsVisible["Position"] = $this->Position->Visible;
            $this->ControlsVisible["EffectiveMonth"] = $this->EffectiveMonth->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["StatApp"] = $this->StatApp->Visible;
            $this->ControlsVisible["EffectiveDay"] = $this->EffectiveDay->Visible;
            $this->ControlsVisible["EffectiveYear"] = $this->EffectiveYear->Visible;
            $this->ControlsVisible["EmpPicture"] = $this->EmpPicture->Visible;
            $this->ControlsVisible["Position5"] = $this->Position5->Visible;
            $this->ControlsVisible["Position1"] = $this->Position1->Visible;
            $this->ControlsVisible["Position4"] = $this->Position4->Visible;
            $this->ControlsVisible["ReportLabel1"] = $this->ReportLabel1->Visible;
            $this->ControlsVisible["Position2"] = $this->Position2->Visible;
            $this->ControlsVisible["Position3"] = $this->Position3->Visible;
            $this->ControlsVisible["OrigApptMonth"] = $this->OrigApptMonth->Visible;
            $this->ControlsVisible["OrigApptDay"] = $this->OrigApptDay->Visible;
            $this->ControlsVisible["OrigApptYear"] = $this->OrigApptYear->Visible;
            $this->ControlsVisible["LastServiceMonth"] = $this->LastServiceMonth->Visible;
            $this->ControlsVisible["LastServiceDay"] = $this->LastServiceDay->Visible;
            $this->ControlsVisible["LastService"] = $this->LastService->Visible;
            $this->ControlsVisible["ModeSeparatn"] = $this->ModeSeparatn->Visible;
            $this->ControlsVisible["DetailedID"] = $this->DetailedID->Visible;
            $this->ControlsVisible["DetailedOffice"] = $this->DetailedOffice->Visible;
            $this->ControlsVisible["DetailedDate"] = $this->DetailedDate->Visible;
            $this->ControlsVisible["DetailedRemarks"] = $this->DetailedRemarks->Visible;
            $this->ControlsVisible["ReassignmentID"] = $this->ReassignmentID->Visible;
            $this->ControlsVisible["ReassignmentOffice"] = $this->ReassignmentOffice->Visible;
            $this->ControlsVisible["ReassignmentDate"] = $this->ReassignmentDate->Visible;
            $this->ControlsVisible["ReassignmentRemarks"] = $this->ReassignmentRemarks->Visible;
            $this->ControlsVisible["ReportLabel2"] = $this->ReportLabel2->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->NameOfficeDept->SetValue($items[$i]->NameOfficeDept);
                        $this->NameOfficeDept->Attributes->RestoreFromArray($items[$i]->_NameOfficeDeptAttributes);
                        $this->Position->SetValue($items[$i]->Position);
                        $this->Position->Attributes->RestoreFromArray($items[$i]->_PositionAttributes);
                        $this->EffectiveMonth->SetValue($items[$i]->EffectiveMonth);
                        $this->EffectiveMonth->Attributes->RestoreFromArray($items[$i]->_EffectiveMonthAttributes);
                        $this->MonthlySalary->SetValue($items[$i]->MonthlySalary);
                        $this->MonthlySalary->Attributes->RestoreFromArray($items[$i]->_MonthlySalaryAttributes);
                        $this->StatApp->SetValue($items[$i]->StatApp);
                        $this->StatApp->Attributes->RestoreFromArray($items[$i]->_StatAppAttributes);
                        $this->EffectiveDay->SetValue($items[$i]->EffectiveDay);
                        $this->EffectiveDay->Attributes->RestoreFromArray($items[$i]->_EffectiveDayAttributes);
                        $this->EffectiveYear->SetValue($items[$i]->EffectiveYear);
                        $this->EffectiveYear->Attributes->RestoreFromArray($items[$i]->_EffectiveYearAttributes);
                        $this->EmpPicture->SetValue($items[$i]->EmpPicture);
                        $this->EmpPicture->Attributes->RestoreFromArray($items[$i]->_EmpPictureAttributes);
                        $this->Position5->SetValue($items[$i]->Position5);
                        $this->Position5->Attributes->RestoreFromArray($items[$i]->_Position5Attributes);
                        $this->Position1->SetValue($items[$i]->Position1);
                        $this->Position1->Attributes->RestoreFromArray($items[$i]->_Position1Attributes);
                        $this->Position4->SetValue($items[$i]->Position4);
                        $this->Position4->Attributes->RestoreFromArray($items[$i]->_Position4Attributes);
                        $this->ReportLabel1->SetValue($items[$i]->ReportLabel1);
                        $this->ReportLabel1->Attributes->RestoreFromArray($items[$i]->_ReportLabel1Attributes);
                        $this->Position2->SetValue($items[$i]->Position2);
                        $this->Position2->Attributes->RestoreFromArray($items[$i]->_Position2Attributes);
                        $this->Position3->SetValue($items[$i]->Position3);
                        $this->Position3->Attributes->RestoreFromArray($items[$i]->_Position3Attributes);
                        $this->OrigApptMonth->SetValue($items[$i]->OrigApptMonth);
                        $this->OrigApptMonth->Attributes->RestoreFromArray($items[$i]->_OrigApptMonthAttributes);
                        $this->OrigApptDay->SetValue($items[$i]->OrigApptDay);
                        $this->OrigApptDay->Attributes->RestoreFromArray($items[$i]->_OrigApptDayAttributes);
                        $this->OrigApptYear->SetValue($items[$i]->OrigApptYear);
                        $this->OrigApptYear->Attributes->RestoreFromArray($items[$i]->_OrigApptYearAttributes);
                        $this->LastServiceMonth->SetValue($items[$i]->LastServiceMonth);
                        $this->LastServiceMonth->Attributes->RestoreFromArray($items[$i]->_LastServiceMonthAttributes);
                        $this->LastServiceDay->SetValue($items[$i]->LastServiceDay);
                        $this->LastServiceDay->Attributes->RestoreFromArray($items[$i]->_LastServiceDayAttributes);
                        $this->LastService->SetValue($items[$i]->LastService);
                        $this->LastService->Attributes->RestoreFromArray($items[$i]->_LastServiceAttributes);
                        $this->ModeSeparatn->SetValue($items[$i]->ModeSeparatn);
                        $this->ModeSeparatn->Attributes->RestoreFromArray($items[$i]->_ModeSeparatnAttributes);
                        $this->DetailedID->SetValue($items[$i]->DetailedID);
                        $this->DetailedID->Attributes->RestoreFromArray($items[$i]->_DetailedIDAttributes);
                        $this->DetailedOffice->SetValue($items[$i]->DetailedOffice);
                        $this->DetailedOffice->Attributes->RestoreFromArray($items[$i]->_DetailedOfficeAttributes);
                        $this->DetailedDate->SetValue($items[$i]->DetailedDate);
                        $this->DetailedDate->Attributes->RestoreFromArray($items[$i]->_DetailedDateAttributes);
                        $this->DetailedRemarks->SetValue($items[$i]->DetailedRemarks);
                        $this->DetailedRemarks->Attributes->RestoreFromArray($items[$i]->_DetailedRemarksAttributes);
                        $this->ReassignmentID->SetValue($items[$i]->ReassignmentID);
                        $this->ReassignmentID->Attributes->RestoreFromArray($items[$i]->_ReassignmentIDAttributes);
                        $this->ReassignmentOffice->SetValue($items[$i]->ReassignmentOffice);
                        $this->ReassignmentOffice->Attributes->RestoreFromArray($items[$i]->_ReassignmentOfficeAttributes);
                        $this->ReassignmentDate->SetValue($items[$i]->ReassignmentDate);
                        $this->ReassignmentDate->Attributes->RestoreFromArray($items[$i]->_ReassignmentDateAttributes);
                        $this->ReassignmentRemarks->SetValue($items[$i]->ReassignmentRemarks);
                        $this->ReassignmentRemarks->Attributes->RestoreFromArray($items[$i]->_ReassignmentRemarksAttributes);
                        $this->ReportLabel2->SetValue($items[$i]->ReportLabel2);
                        $this->ReportLabel2->Attributes->RestoreFromArray($items[$i]->_ReportLabel2Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->NameOfficeDept->Show();
                        $this->Position->Show();
                        $this->EffectiveMonth->Show();
                        $this->MonthlySalary->Show();
                        $this->StatApp->Show();
                        $this->EffectiveDay->Show();
                        $this->EffectiveYear->Show();
                        $this->EmpPicture->Show();
                        $this->Position5->Show();
                        $this->Position1->Show();
                        $this->Position4->Show();
                        $this->ReportLabel1->Show();
                        $this->Position2->Show();
                        $this->Position3->Show();
                        $this->OrigApptMonth->Show();
                        $this->OrigApptDay->Show();
                        $this->OrigApptYear->Show();
                        $this->LastServiceMonth->Show();
                        $this->LastServiceDay->Show();
                        $this->LastService->Show();
                        $this->ModeSeparatn->Show();
                        $this->DetailedID->Show();
                        $this->DetailedOffice->Show();
                        $this->DetailedDate->Show();
                        $this->DetailedRemarks->Show();
                        $this->ReassignmentID->Show();
                        $this->ReassignmentOffice->Show();
                        $this->ReassignmentDate->Show();
                        $this->ReassignmentRemarks->Show();
                        $this->ReportLabel2->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->PageBreak->Visible = (($i < count($items) - 1) && ($this->ViewMode == "Print"));
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
                                $this->Report_CurrentDate->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End employee_lut_statofappt2 Class @2-FCB6E20C

class clsemployee_lut_statofappt2DataSource extends clsDBConnection1 {  //employee_lut_statofappt2DataSource Class @2-65E8B814

//DataSource Variables @2-34EF1EDF
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $NameOfficeDept;
    var $Position;
    var $EffectiveMonth;
    var $MonthlySalary;
    var $StatApp;
    var $EffectiveDay;
    var $EffectiveYear;
    var $EmpPicture;
    var $Position5;
    var $Position1;
    var $Position4;
    var $ReportLabel1;
    var $Position2;
    var $Position3;
    var $OrigApptMonth;
    var $OrigApptDay;
    var $OrigApptYear;
    var $LastServiceMonth;
    var $LastServiceDay;
    var $LastService;
    var $ModeSeparatn;
    var $DetailedID;
    var $DetailedOffice;
    var $DetailedDate;
    var $DetailedRemarks;
    var $ReassignmentID;
    var $ReassignmentOffice;
    var $ReassignmentDate;
    var $ReassignmentRemarks;
    var $ReportLabel2;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-D5725E7C
    function clsemployee_lut_statofappt2DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_lut_statofappt2";
        $this->Initialize();
        $this->NameOfficeDept = new clsField("NameOfficeDept", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->EffectiveMonth = new clsField("EffectiveMonth", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->StatApp = new clsField("StatApp", ccsText, "");
        
        $this->EffectiveDay = new clsField("EffectiveDay", ccsText, "");
        
        $this->EffectiveYear = new clsField("EffectiveYear", ccsText, "");
        
        $this->EmpPicture = new clsField("EmpPicture", ccsText, "");
        
        $this->Position5 = new clsField("Position5", ccsText, "");
        
        $this->Position1 = new clsField("Position1", ccsText, "");
        
        $this->Position4 = new clsField("Position4", ccsText, "");
        
        $this->ReportLabel1 = new clsField("ReportLabel1", ccsDate, $this->DateFormat);
        
        $this->Position2 = new clsField("Position2", ccsText, "");
        
        $this->Position3 = new clsField("Position3", ccsText, "");
        
        $this->OrigApptMonth = new clsField("OrigApptMonth", ccsText, "");
        
        $this->OrigApptDay = new clsField("OrigApptDay", ccsText, "");
        
        $this->OrigApptYear = new clsField("OrigApptYear", ccsText, "");
        
        $this->LastServiceMonth = new clsField("LastServiceMonth", ccsText, "");
        
        $this->LastServiceDay = new clsField("LastServiceDay", ccsText, "");
        
        $this->LastService = new clsField("LastService", ccsText, "");
        
        $this->ModeSeparatn = new clsField("ModeSeparatn", ccsText, "");
        
        $this->DetailedID = new clsField("DetailedID", ccsInteger, "");
        
        $this->DetailedOffice = new clsField("DetailedOffice", ccsText, "");
        
        $this->DetailedDate = new clsField("DetailedDate", ccsDate, $this->DateFormat);
        
        $this->DetailedRemarks = new clsField("DetailedRemarks", ccsText, "");
        
        $this->ReassignmentID = new clsField("ReassignmentID", ccsInteger, "");
        
        $this->ReassignmentOffice = new clsField("ReassignmentOffice", ccsText, "");
        
        $this->ReassignmentDate = new clsField("ReassignmentDate", ccsDate, $this->DateFormat);
        
        $this->ReassignmentRemarks = new clsField("ReassignmentRemarks", ccsText, "");
        
        $this->ReportLabel2 = new clsField("ReportLabel2", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-FDB2E7B2
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), BirthDate)), '%Y') + 0 AS Expr1 \n\n" .
        "FROM ((employee INNER JOIN lut_statofappt2 ON\n\n" .
        "employee.StatAppID = lut_statofappt2.StatAppID) INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) INNER JOIN lut_modeseparatn ON\n\n" .
        "employee.ModeSeparatnID = lut_modeseparatn.ModeSeparatnID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-6215423E
    function SetValues()
    {
        $this->NameOfficeDept->SetDBValue($this->f("NameOfficeDept"));
        $this->Position->SetDBValue($this->f("employee_Position"));
        $this->EffectiveMonth->SetDBValue($this->f("EffectiveMonth"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->StatApp->SetDBValue($this->f("StatApp"));
        $this->EffectiveDay->SetDBValue($this->f("EffectiveDay"));
        $this->EffectiveYear->SetDBValue($this->f("EffectiveYear"));
        $this->EmpPicture->SetDBValue($this->f("EmpPicture"));
        $this->Position5->SetDBValue($this->f("EmployeeIDNo"));
        $this->Position1->SetDBValue($this->f("Surname"));
        $this->Position4->SetDBValue($this->f("NameExtension"));
        $this->ReportLabel1->SetDBValue(trim($this->f("BirthDate")));
        $this->Position2->SetDBValue($this->f("FirstName"));
        $this->Position3->SetDBValue($this->f("MiddleName"));
        $this->OrigApptMonth->SetDBValue($this->f("OrigApptMonth"));
        $this->OrigApptDay->SetDBValue($this->f("OrigApptDay"));
        $this->OrigApptYear->SetDBValue($this->f("OrigApptYear"));
        $this->LastServiceMonth->SetDBValue($this->f("LastServiceMonth"));
        $this->LastServiceDay->SetDBValue($this->f("LastServiceDay"));
        $this->LastService->SetDBValue($this->f("LastService"));
        $this->ModeSeparatn->SetDBValue($this->f("ModeSeparatn"));
        $this->DetailedID->SetDBValue(trim($this->f("DetailedID")));
        $this->DetailedOffice->SetDBValue($this->f("DetailedOffice"));
        $this->DetailedDate->SetDBValue(trim($this->f("DetailedDate")));
        $this->DetailedRemarks->SetDBValue($this->f("DetailedRemarks"));
        $this->ReassignmentID->SetDBValue(trim($this->f("ReassignmentID")));
        $this->ReassignmentOffice->SetDBValue($this->f("OfficeAcronym"));
        $this->ReassignmentDate->SetDBValue(trim($this->f("ReassignmentDate")));
        $this->ReassignmentRemarks->SetDBValue($this->f("ReassignmentRemarks"));
        $this->ReportLabel2->SetDBValue(trim($this->f("Expr1")));
    }
//End SetValues Method

} //End employee_lut_statofappt2DataSource Class @2-FCB6E20C

//Initialize Page @1-BF1C53C6
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "QEmp_CurrentPosition.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-77BB4DA2
include_once("./QEmp_CurrentPosition_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E1609032
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QEmp_CurrentPosition_print3.php";
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q_Employee.php";
$employee_lut_statofappt2 = & new clsReportemployee_lut_statofappt2("", $MainPage);
$MainPage->Report_Print = & $Report_Print;
$MainPage->Link1 = & $Link1;
$MainPage->employee_lut_statofappt2 = & $employee_lut_statofappt2;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_lut_statofappt2->Initialize();

BindEvents();

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-E710DB26
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
$Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "");
$Attributes->Show();
//End Initialize HTML Template

//Go to destination page @1-AE86AD11
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_lut_statofappt2);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B3F1E67D
$employee_lut_statofappt2->Show();
$Report_Print->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C96DAF04
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_lut_statofappt2);
unset($Tpl);
//End Unload Page


?>
