<?php
//Include Common Files @1-CB0203D6
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ReportServiceRecord2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_employee_service1 ReportGroup class @2-6EA02B71
class clsReportGroupemployee_employee_service1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleInitial, $_MiddleInitialAttributes;
    var $BirthMonth, $_BirthMonthAttributes;
    var $BirthDay, $_BirthDayAttributes;
    var $BirthYear, $_BirthYearAttributes;
    var $PlaceOfBirth, $_PlaceOfBirthAttributes;
    var $DateFrom, $_DateFromAttributes;
    var $DateTo, $_DateToAttributes;
    var $Designation, $_DesignationAttributes;
    var $StatofAppt, $_StatofApptAttributes;
    var $AnnualSalary, $_AnnualSalaryAttributes;
    var $OfficeStatn, $_OfficeStatnAttributes;
    var $Branch, $_BranchAttributes;
    var $AbsenceWOPay, $_AbsenceWOPayAttributes;
    var $Separation, $_SeparationAttributes;
    var $Signatory2, $_Signatory2Attributes;
    var $PositionSig2, $_PositionSig2Attributes;
    var $Report_CurrentPage, $_Report_CurrentPageAttributes;
    var $Report_TotalPages, $_Report_TotalPagesAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;
    var $SurnameTotalIndex;
    var $FirstNameTotalIndex;
    var $MiddleInitialTotalIndex;
    var $BirthMonthTotalIndex;
    var $BirthDayTotalIndex;
    var $BirthYearTotalIndex;
    var $PlaceOfBirthTotalIndex;

    function clsReportGroupemployee_employee_service1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleInitial = $this->Parent->MiddleInitial->Value;
        $this->BirthMonth = $this->Parent->BirthMonth->Value;
        $this->BirthDay = $this->Parent->BirthDay->Value;
        $this->BirthYear = $this->Parent->BirthYear->Value;
        $this->PlaceOfBirth = $this->Parent->PlaceOfBirth->Value;
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->Designation = $this->Parent->Designation->Value;
        $this->StatofAppt = $this->Parent->StatofAppt->Value;
        $this->AnnualSalary = $this->Parent->AnnualSalary->Value;
        $this->OfficeStatn = $this->Parent->OfficeStatn->Value;
        $this->Branch = $this->Parent->Branch->Value;
        $this->AbsenceWOPay = $this->Parent->AbsenceWOPay->Value;
        $this->Separation = $this->Parent->Separation->Value;
        $this->Signatory2 = $this->Parent->Signatory2->Value;
        $this->PositionSig2 = $this->Parent->PositionSig2->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleInitialAttributes = $this->Parent->MiddleInitial->Attributes->GetAsArray();
        $this->_BirthMonthAttributes = $this->Parent->BirthMonth->Attributes->GetAsArray();
        $this->_BirthDayAttributes = $this->Parent->BirthDay->Attributes->GetAsArray();
        $this->_BirthYearAttributes = $this->Parent->BirthYear->Attributes->GetAsArray();
        $this->_PlaceOfBirthAttributes = $this->Parent->PlaceOfBirth->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_DesignationAttributes = $this->Parent->Designation->Attributes->GetAsArray();
        $this->_StatofApptAttributes = $this->Parent->StatofAppt->Attributes->GetAsArray();
        $this->_AnnualSalaryAttributes = $this->Parent->AnnualSalary->Attributes->GetAsArray();
        $this->_OfficeStatnAttributes = $this->Parent->OfficeStatn->Attributes->GetAsArray();
        $this->_BranchAttributes = $this->Parent->Branch->Attributes->GetAsArray();
        $this->_AbsenceWOPayAttributes = $this->Parent->AbsenceWOPay->Attributes->GetAsArray();
        $this->_SeparationAttributes = $this->Parent->Separation->Attributes->GetAsArray();
        $this->_Signatory2Attributes = $this->Parent->Signatory2->Attributes->GetAsArray();
        $this->_PositionSig2Attributes = $this->Parent->PositionSig2->Attributes->GetAsArray();
        $this->_Report_CurrentPageAttributes = $this->Parent->Report_CurrentPage->Attributes->GetAsArray();
        $this->_Report_TotalPagesAttributes = $this->Parent->Report_TotalPages->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->MiddleInitial = $Header->MiddleInitial;
        $Header->_MiddleInitialAttributes = $this->_MiddleInitialAttributes;
        $this->Parent->MiddleInitial->Value = $Header->MiddleInitial;
        $this->Parent->MiddleInitial->Attributes->RestoreFromArray($Header->_MiddleInitialAttributes);
        $this->BirthMonth = $Header->BirthMonth;
        $Header->_BirthMonthAttributes = $this->_BirthMonthAttributes;
        $this->Parent->BirthMonth->Value = $Header->BirthMonth;
        $this->Parent->BirthMonth->Attributes->RestoreFromArray($Header->_BirthMonthAttributes);
        $this->BirthDay = $Header->BirthDay;
        $Header->_BirthDayAttributes = $this->_BirthDayAttributes;
        $this->Parent->BirthDay->Value = $Header->BirthDay;
        $this->Parent->BirthDay->Attributes->RestoreFromArray($Header->_BirthDayAttributes);
        $this->BirthYear = $Header->BirthYear;
        $Header->_BirthYearAttributes = $this->_BirthYearAttributes;
        $this->Parent->BirthYear->Value = $Header->BirthYear;
        $this->Parent->BirthYear->Attributes->RestoreFromArray($Header->_BirthYearAttributes);
        $this->PlaceOfBirth = $Header->PlaceOfBirth;
        $Header->_PlaceOfBirthAttributes = $this->_PlaceOfBirthAttributes;
        $this->Parent->PlaceOfBirth->Value = $Header->PlaceOfBirth;
        $this->Parent->PlaceOfBirth->Attributes->RestoreFromArray($Header->_PlaceOfBirthAttributes);
        $this->DateFrom = $Header->DateFrom;
        $Header->_DateFromAttributes = $this->_DateFromAttributes;
        $this->Parent->DateFrom->Value = $Header->DateFrom;
        $this->Parent->DateFrom->Attributes->RestoreFromArray($Header->_DateFromAttributes);
        $this->DateTo = $Header->DateTo;
        $Header->_DateToAttributes = $this->_DateToAttributes;
        $this->Parent->DateTo->Value = $Header->DateTo;
        $this->Parent->DateTo->Attributes->RestoreFromArray($Header->_DateToAttributes);
        $this->Designation = $Header->Designation;
        $Header->_DesignationAttributes = $this->_DesignationAttributes;
        $this->Parent->Designation->Value = $Header->Designation;
        $this->Parent->Designation->Attributes->RestoreFromArray($Header->_DesignationAttributes);
        $this->StatofAppt = $Header->StatofAppt;
        $Header->_StatofApptAttributes = $this->_StatofApptAttributes;
        $this->Parent->StatofAppt->Value = $Header->StatofAppt;
        $this->Parent->StatofAppt->Attributes->RestoreFromArray($Header->_StatofApptAttributes);
        $this->AnnualSalary = $Header->AnnualSalary;
        $Header->_AnnualSalaryAttributes = $this->_AnnualSalaryAttributes;
        $this->Parent->AnnualSalary->Value = $Header->AnnualSalary;
        $this->Parent->AnnualSalary->Attributes->RestoreFromArray($Header->_AnnualSalaryAttributes);
        $this->OfficeStatn = $Header->OfficeStatn;
        $Header->_OfficeStatnAttributes = $this->_OfficeStatnAttributes;
        $this->Parent->OfficeStatn->Value = $Header->OfficeStatn;
        $this->Parent->OfficeStatn->Attributes->RestoreFromArray($Header->_OfficeStatnAttributes);
        $this->Branch = $Header->Branch;
        $Header->_BranchAttributes = $this->_BranchAttributes;
        $this->Parent->Branch->Value = $Header->Branch;
        $this->Parent->Branch->Attributes->RestoreFromArray($Header->_BranchAttributes);
        $this->AbsenceWOPay = $Header->AbsenceWOPay;
        $Header->_AbsenceWOPayAttributes = $this->_AbsenceWOPayAttributes;
        $this->Parent->AbsenceWOPay->Value = $Header->AbsenceWOPay;
        $this->Parent->AbsenceWOPay->Attributes->RestoreFromArray($Header->_AbsenceWOPayAttributes);
        $this->Separation = $Header->Separation;
        $Header->_SeparationAttributes = $this->_SeparationAttributes;
        $this->Parent->Separation->Value = $Header->Separation;
        $this->Parent->Separation->Attributes->RestoreFromArray($Header->_SeparationAttributes);
        $this->Signatory2 = $Header->Signatory2;
        $Header->_Signatory2Attributes = $this->_Signatory2Attributes;
        $this->Parent->Signatory2->Value = $Header->Signatory2;
        $this->Parent->Signatory2->Attributes->RestoreFromArray($Header->_Signatory2Attributes);
        $this->PositionSig2 = $Header->PositionSig2;
        $Header->_PositionSig2Attributes = $this->_PositionSig2Attributes;
        $this->Parent->PositionSig2->Value = $Header->PositionSig2;
        $this->Parent->PositionSig2->Attributes->RestoreFromArray($Header->_PositionSig2Attributes);
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee_employee_service1 ReportGroup class

//employee_employee_service1 GroupsCollection class @2-BEF2F524
class clsGroupsCollectionemployee_employee_service1 {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $mSurnameCurrentHeaderIndex;
    var $mFirstNameCurrentHeaderIndex;
    var $mMiddleInitialCurrentHeaderIndex;
    var $mBirthMonthCurrentHeaderIndex;
    var $mBirthDayCurrentHeaderIndex;
    var $mBirthYearCurrentHeaderIndex;
    var $mPlaceOfBirthCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_employee_service1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mSurnameCurrentHeaderIndex = 1;
        $this->mFirstNameCurrentHeaderIndex = 2;
        $this->mMiddleInitialCurrentHeaderIndex = 3;
        $this->mBirthMonthCurrentHeaderIndex = 4;
        $this->mBirthDayCurrentHeaderIndex = 5;
        $this->mBirthYearCurrentHeaderIndex = 6;
        $this->mPlaceOfBirthCurrentHeaderIndex = 7;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_employee_service1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->SurnameTotalIndex = $this->mSurnameCurrentHeaderIndex;
        $group->FirstNameTotalIndex = $this->mFirstNameCurrentHeaderIndex;
        $group->MiddleInitialTotalIndex = $this->mMiddleInitialCurrentHeaderIndex;
        $group->BirthMonthTotalIndex = $this->mBirthMonthCurrentHeaderIndex;
        $group->BirthDayTotalIndex = $this->mBirthDayCurrentHeaderIndex;
        $group->BirthYearTotalIndex = $this->mBirthYearCurrentHeaderIndex;
        $group->PlaceOfBirthTotalIndex = $this->mPlaceOfBirthCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleInitial->Value = $this->Parent->MiddleInitial->initialValue;
        $this->Parent->BirthMonth->Value = $this->Parent->BirthMonth->initialValue;
        $this->Parent->BirthDay->Value = $this->Parent->BirthDay->initialValue;
        $this->Parent->BirthYear->Value = $this->Parent->BirthYear->initialValue;
        $this->Parent->PlaceOfBirth->Value = $this->Parent->PlaceOfBirth->initialValue;
        $this->Parent->DateFrom->Value = $this->Parent->DateFrom->initialValue;
        $this->Parent->DateTo->Value = $this->Parent->DateTo->initialValue;
        $this->Parent->Designation->Value = $this->Parent->Designation->initialValue;
        $this->Parent->StatofAppt->Value = $this->Parent->StatofAppt->initialValue;
        $this->Parent->AnnualSalary->Value = $this->Parent->AnnualSalary->initialValue;
        $this->Parent->OfficeStatn->Value = $this->Parent->OfficeStatn->initialValue;
        $this->Parent->Branch->Value = $this->Parent->Branch->initialValue;
        $this->Parent->AbsenceWOPay->Value = $this->Parent->AbsenceWOPay->initialValue;
        $this->Parent->Separation->Value = $this->Parent->Separation->initialValue;
        $this->Parent->Signatory2->Value = $this->Parent->Signatory2->initialValue;
        $this->Parent->PositionSig2->Value = $this->Parent->PositionSig2->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
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
        if ($groupName == "Surname") {
            $GroupSurname = & $this->InitGroup(true);
            $this->Parent->Surname_Header->CCSEventResult = CCGetEvent($this->Parent->Surname_Header->CCSEvents, "OnInitialize", $this->Parent->Surname_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Surname_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Surname_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Surname_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Surname_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Surname_Header->Height;
                $GroupSurname->SetTotalControls("GetNextValue");
            $this->Parent->Surname_Header->CCSEventResult = CCGetEvent($this->Parent->Surname_Header->CCSEvents, "OnCalculate", $this->Parent->Surname_Header);
            $GroupSurname->SetControls();
            $GroupSurname->Mode = 1;
            $OpenFlag = true;
            $GroupSurname->GroupType = "Surname";
            $this->mSurnameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSurname;
        }
        if ($groupName == "FirstName" or $OpenFlag) {
            $GroupFirstName = & $this->InitGroup(true);
            $this->Parent->FirstName_Header->CCSEventResult = CCGetEvent($this->Parent->FirstName_Header->CCSEvents, "OnInitialize", $this->Parent->FirstName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->FirstName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->FirstName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->FirstName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->FirstName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FirstName_Header->Height;
                $GroupFirstName->SetTotalControls("GetNextValue");
            $this->Parent->FirstName_Header->CCSEventResult = CCGetEvent($this->Parent->FirstName_Header->CCSEvents, "OnCalculate", $this->Parent->FirstName_Header);
            $GroupFirstName->SetControls();
            $GroupFirstName->Mode = 1;
            $OpenFlag = true;
            $GroupFirstName->GroupType = "FirstName";
            $this->mFirstNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupFirstName;
        }
        if ($groupName == "MiddleInitial" or $OpenFlag) {
            $GroupMiddleInitial = & $this->InitGroup(true);
            $this->Parent->MiddleInitial_Header->CCSEventResult = CCGetEvent($this->Parent->MiddleInitial_Header->CCSEvents, "OnInitialize", $this->Parent->MiddleInitial_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->MiddleInitial_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->MiddleInitial_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->MiddleInitial_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->MiddleInitial_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->MiddleInitial_Header->Height;
                $GroupMiddleInitial->SetTotalControls("GetNextValue");
            $this->Parent->MiddleInitial_Header->CCSEventResult = CCGetEvent($this->Parent->MiddleInitial_Header->CCSEvents, "OnCalculate", $this->Parent->MiddleInitial_Header);
            $GroupMiddleInitial->SetControls();
            $GroupMiddleInitial->Mode = 1;
            $OpenFlag = true;
            $GroupMiddleInitial->GroupType = "MiddleInitial";
            $this->mMiddleInitialCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupMiddleInitial;
        }
        if ($groupName == "BirthMonth" or $OpenFlag) {
            $GroupBirthMonth = & $this->InitGroup(true);
            $this->Parent->BirthMonth_Header->CCSEventResult = CCGetEvent($this->Parent->BirthMonth_Header->CCSEvents, "OnInitialize", $this->Parent->BirthMonth_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->BirthMonth_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->BirthMonth_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->BirthMonth_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->BirthMonth_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->BirthMonth_Header->Height;
                $GroupBirthMonth->SetTotalControls("GetNextValue");
            $this->Parent->BirthMonth_Header->CCSEventResult = CCGetEvent($this->Parent->BirthMonth_Header->CCSEvents, "OnCalculate", $this->Parent->BirthMonth_Header);
            $GroupBirthMonth->SetControls();
            $GroupBirthMonth->Mode = 1;
            $OpenFlag = true;
            $GroupBirthMonth->GroupType = "BirthMonth";
            $this->mBirthMonthCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupBirthMonth;
        }
        if ($groupName == "BirthDay" or $OpenFlag) {
            $GroupBirthDay = & $this->InitGroup(true);
            $this->Parent->BirthDay_Header->CCSEventResult = CCGetEvent($this->Parent->BirthDay_Header->CCSEvents, "OnInitialize", $this->Parent->BirthDay_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->BirthDay_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->BirthDay_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->BirthDay_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->BirthDay_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->BirthDay_Header->Height;
                $GroupBirthDay->SetTotalControls("GetNextValue");
            $this->Parent->BirthDay_Header->CCSEventResult = CCGetEvent($this->Parent->BirthDay_Header->CCSEvents, "OnCalculate", $this->Parent->BirthDay_Header);
            $GroupBirthDay->SetControls();
            $GroupBirthDay->Mode = 1;
            $OpenFlag = true;
            $GroupBirthDay->GroupType = "BirthDay";
            $this->mBirthDayCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupBirthDay;
        }
        if ($groupName == "BirthYear" or $OpenFlag) {
            $GroupBirthYear = & $this->InitGroup(true);
            $this->Parent->BirthYear_Header->CCSEventResult = CCGetEvent($this->Parent->BirthYear_Header->CCSEvents, "OnInitialize", $this->Parent->BirthYear_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->BirthYear_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->BirthYear_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->BirthYear_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->BirthYear_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->BirthYear_Header->Height;
                $GroupBirthYear->SetTotalControls("GetNextValue");
            $this->Parent->BirthYear_Header->CCSEventResult = CCGetEvent($this->Parent->BirthYear_Header->CCSEvents, "OnCalculate", $this->Parent->BirthYear_Header);
            $GroupBirthYear->SetControls();
            $GroupBirthYear->Mode = 1;
            $OpenFlag = true;
            $GroupBirthYear->GroupType = "BirthYear";
            $this->mBirthYearCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupBirthYear;
        }
        if ($groupName == "PlaceOfBirth" or $OpenFlag) {
            $GroupPlaceOfBirth = & $this->InitGroup(true);
            $this->Parent->PlaceOfBirth_Header->CCSEventResult = CCGetEvent($this->Parent->PlaceOfBirth_Header->CCSEvents, "OnInitialize", $this->Parent->PlaceOfBirth_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->PlaceOfBirth_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->PlaceOfBirth_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->PlaceOfBirth_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->PlaceOfBirth_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PlaceOfBirth_Header->Height;
                $GroupPlaceOfBirth->SetTotalControls("GetNextValue");
            $this->Parent->PlaceOfBirth_Header->CCSEventResult = CCGetEvent($this->Parent->PlaceOfBirth_Header->CCSEvents, "OnCalculate", $this->Parent->PlaceOfBirth_Header);
            $GroupPlaceOfBirth->SetControls();
            $GroupPlaceOfBirth->Mode = 1;
            $GroupPlaceOfBirth->GroupType = "PlaceOfBirth";
            $this->mPlaceOfBirthCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupPlaceOfBirth;
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
        $GroupPlaceOfBirth = & $this->InitGroup(true);
        $this->Parent->PlaceOfBirth_Footer->CCSEventResult = CCGetEvent($this->Parent->PlaceOfBirth_Footer->CCSEvents, "OnInitialize", $this->Parent->PlaceOfBirth_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->PlaceOfBirth_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->PlaceOfBirth_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->PlaceOfBirth_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupPlaceOfBirth->SetTotalControls("GetPrevValue");
        $GroupPlaceOfBirth->SyncWithHeader($this->Groups[$this->mPlaceOfBirthCurrentHeaderIndex]);
        if ($this->Parent->PlaceOfBirth_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->PlaceOfBirth_Footer->Height;
        $this->Parent->PlaceOfBirth_Footer->CCSEventResult = CCGetEvent($this->Parent->PlaceOfBirth_Footer->CCSEvents, "OnCalculate", $this->Parent->PlaceOfBirth_Footer);
        $GroupPlaceOfBirth->SetControls();
        $this->RestoreValues();
        $GroupPlaceOfBirth->Mode = 2;
        $GroupPlaceOfBirth->GroupType ="PlaceOfBirth";
        $this->Groups[] = & $GroupPlaceOfBirth;
        if ($groupName == "PlaceOfBirth") return;
        $GroupBirthYear = & $this->InitGroup(true);
        $this->Parent->BirthYear_Footer->CCSEventResult = CCGetEvent($this->Parent->BirthYear_Footer->CCSEvents, "OnInitialize", $this->Parent->BirthYear_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->BirthYear_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->BirthYear_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->BirthYear_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupBirthYear->SetTotalControls("GetPrevValue");
        $GroupBirthYear->SyncWithHeader($this->Groups[$this->mBirthYearCurrentHeaderIndex]);
        if ($this->Parent->BirthYear_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->BirthYear_Footer->Height;
        $this->Parent->BirthYear_Footer->CCSEventResult = CCGetEvent($this->Parent->BirthYear_Footer->CCSEvents, "OnCalculate", $this->Parent->BirthYear_Footer);
        $GroupBirthYear->SetControls();
        $this->RestoreValues();
        $GroupBirthYear->Mode = 2;
        $GroupBirthYear->GroupType ="BirthYear";
        $this->Groups[] = & $GroupBirthYear;
        if ($groupName == "BirthYear") return;
        $GroupBirthDay = & $this->InitGroup(true);
        $this->Parent->BirthDay_Footer->CCSEventResult = CCGetEvent($this->Parent->BirthDay_Footer->CCSEvents, "OnInitialize", $this->Parent->BirthDay_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->BirthDay_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->BirthDay_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->BirthDay_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupBirthDay->SetTotalControls("GetPrevValue");
        $GroupBirthDay->SyncWithHeader($this->Groups[$this->mBirthDayCurrentHeaderIndex]);
        if ($this->Parent->BirthDay_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->BirthDay_Footer->Height;
        $this->Parent->BirthDay_Footer->CCSEventResult = CCGetEvent($this->Parent->BirthDay_Footer->CCSEvents, "OnCalculate", $this->Parent->BirthDay_Footer);
        $GroupBirthDay->SetControls();
        $this->RestoreValues();
        $GroupBirthDay->Mode = 2;
        $GroupBirthDay->GroupType ="BirthDay";
        $this->Groups[] = & $GroupBirthDay;
        if ($groupName == "BirthDay") return;
        $GroupBirthMonth = & $this->InitGroup(true);
        $this->Parent->BirthMonth_Footer->CCSEventResult = CCGetEvent($this->Parent->BirthMonth_Footer->CCSEvents, "OnInitialize", $this->Parent->BirthMonth_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->BirthMonth_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->BirthMonth_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->BirthMonth_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupBirthMonth->SetTotalControls("GetPrevValue");
        $GroupBirthMonth->SyncWithHeader($this->Groups[$this->mBirthMonthCurrentHeaderIndex]);
        if ($this->Parent->BirthMonth_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->BirthMonth_Footer->Height;
        $this->Parent->BirthMonth_Footer->CCSEventResult = CCGetEvent($this->Parent->BirthMonth_Footer->CCSEvents, "OnCalculate", $this->Parent->BirthMonth_Footer);
        $GroupBirthMonth->SetControls();
        $this->RestoreValues();
        $GroupBirthMonth->Mode = 2;
        $GroupBirthMonth->GroupType ="BirthMonth";
        $this->Groups[] = & $GroupBirthMonth;
        if ($groupName == "BirthMonth") return;
        $GroupMiddleInitial = & $this->InitGroup(true);
        $this->Parent->MiddleInitial_Footer->CCSEventResult = CCGetEvent($this->Parent->MiddleInitial_Footer->CCSEvents, "OnInitialize", $this->Parent->MiddleInitial_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->MiddleInitial_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->MiddleInitial_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->MiddleInitial_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupMiddleInitial->SetTotalControls("GetPrevValue");
        $GroupMiddleInitial->SyncWithHeader($this->Groups[$this->mMiddleInitialCurrentHeaderIndex]);
        if ($this->Parent->MiddleInitial_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->MiddleInitial_Footer->Height;
        $this->Parent->MiddleInitial_Footer->CCSEventResult = CCGetEvent($this->Parent->MiddleInitial_Footer->CCSEvents, "OnCalculate", $this->Parent->MiddleInitial_Footer);
        $GroupMiddleInitial->SetControls();
        $this->RestoreValues();
        $GroupMiddleInitial->Mode = 2;
        $GroupMiddleInitial->GroupType ="MiddleInitial";
        $this->Groups[] = & $GroupMiddleInitial;
        if ($groupName == "MiddleInitial") return;
        $GroupFirstName = & $this->InitGroup(true);
        $this->Parent->FirstName_Footer->CCSEventResult = CCGetEvent($this->Parent->FirstName_Footer->CCSEvents, "OnInitialize", $this->Parent->FirstName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->FirstName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->FirstName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->FirstName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupFirstName->SetTotalControls("GetPrevValue");
        $GroupFirstName->SyncWithHeader($this->Groups[$this->mFirstNameCurrentHeaderIndex]);
        if ($this->Parent->FirstName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FirstName_Footer->Height;
        $this->Parent->FirstName_Footer->CCSEventResult = CCGetEvent($this->Parent->FirstName_Footer->CCSEvents, "OnCalculate", $this->Parent->FirstName_Footer);
        $GroupFirstName->SetControls();
        $this->RestoreValues();
        $GroupFirstName->Mode = 2;
        $GroupFirstName->GroupType ="FirstName";
        $this->Groups[] = & $GroupFirstName;
        if ($groupName == "FirstName") return;
        $GroupSurname = & $this->InitGroup(true);
        $this->Parent->Surname_Footer->CCSEventResult = CCGetEvent($this->Parent->Surname_Footer->CCSEvents, "OnInitialize", $this->Parent->Surname_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Surname_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Surname_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Surname_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSurname->SetTotalControls("GetPrevValue");
        $GroupSurname->SyncWithHeader($this->Groups[$this->mSurnameCurrentHeaderIndex]);
        if ($this->Parent->Surname_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Surname_Footer->Height;
        $this->Parent->Surname_Footer->CCSEventResult = CCGetEvent($this->Parent->Surname_Footer->CCSEvents, "OnCalculate", $this->Parent->Surname_Footer);
        $GroupSurname->SetControls();
        $this->RestoreValues();
        $GroupSurname->Mode = 2;
        $GroupSurname->GroupType ="Surname";
        $this->Groups[] = & $GroupSurname;
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
//End employee_employee_service1 GroupsCollection class

class clsReportemployee_employee_service1 { //employee_employee_service1 Class @2-02F2C5A5

//employee_employee_service1 Variables @2-D9D377E2

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
    var $Surname_HeaderBlock, $Surname_Header;
    var $Surname_FooterBlock, $Surname_Footer;
    var $FirstName_HeaderBlock, $FirstName_Header;
    var $FirstName_FooterBlock, $FirstName_Footer;
    var $MiddleInitial_HeaderBlock, $MiddleInitial_Header;
    var $MiddleInitial_FooterBlock, $MiddleInitial_Footer;
    var $BirthMonth_HeaderBlock, $BirthMonth_Header;
    var $BirthMonth_FooterBlock, $BirthMonth_Footer;
    var $BirthDay_HeaderBlock, $BirthDay_Header;
    var $BirthDay_FooterBlock, $BirthDay_Footer;
    var $BirthYear_HeaderBlock, $BirthYear_Header;
    var $BirthYear_FooterBlock, $BirthYear_Footer;
    var $PlaceOfBirth_HeaderBlock, $PlaceOfBirth_Header;
    var $PlaceOfBirth_FooterBlock, $PlaceOfBirth_Footer;
    var $SorterName, $SorterDirection;

    var $ds;
    var $DataSource;
    var $UseClientPaging = false;

    //Report Controls
    var $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    var $Page_FooterControls, $Page_HeaderControls;
    var $Surname_HeaderControls, $Surname_FooterControls;
    var $FirstName_HeaderControls, $FirstName_FooterControls;
    var $MiddleInitial_HeaderControls, $MiddleInitial_FooterControls;
    var $BirthMonth_HeaderControls, $BirthMonth_FooterControls;
    var $BirthDay_HeaderControls, $BirthDay_FooterControls;
    var $BirthYear_HeaderControls, $BirthYear_FooterControls;
    var $PlaceOfBirth_HeaderControls, $PlaceOfBirth_FooterControls;
//End employee_employee_service1 Variables

//Class_Initialize Event @2-1498F1A2
    function clsReportemployee_employee_service1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_employee_service1";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 2;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Surname_Footer = new clsSection($this);
        $this->Surname_Header = new clsSection($this);
        $this->Surname_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Surname_Header->Height);
        $this->FirstName_Footer = new clsSection($this);
        $this->FirstName_Header = new clsSection($this);
        $this->FirstName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FirstName_Header->Height);
        $this->MiddleInitial_Footer = new clsSection($this);
        $this->MiddleInitial_Header = new clsSection($this);
        $this->MiddleInitial_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->MiddleInitial_Header->Height);
        $this->BirthMonth_Footer = new clsSection($this);
        $this->BirthMonth_Header = new clsSection($this);
        $this->BirthMonth_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->BirthMonth_Header->Height);
        $this->BirthDay_Footer = new clsSection($this);
        $this->BirthDay_Header = new clsSection($this);
        $this->BirthDay_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->BirthDay_Header->Height);
        $this->BirthYear_Footer = new clsSection($this);
        $this->BirthYear_Header = new clsSection($this);
        $this->BirthYear_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->BirthYear_Header->Height);
        $this->PlaceOfBirth_Footer = new clsSection($this);
        $this->PlaceOfBirth_Header = new clsSection($this);
        $this->PlaceOfBirth_Header->Height = 2;
        $MaxSectionSize = max($MaxSectionSize, $this->PlaceOfBirth_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployee_employee_service1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Web");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 50;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->Surname = & new clsControl(ccsHidden, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsHidden, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleInitial = & new clsControl(ccsHidden, "MiddleInitial", "MiddleInitial", ccsText, "", CCGetRequestParam("MiddleInitial", ccsGet, NULL), $this);
        $this->BirthMonth = & new clsControl(ccsHidden, "BirthMonth", "BirthMonth", ccsText, "", CCGetRequestParam("BirthMonth", ccsGet, NULL), $this);
        $this->BirthDay = & new clsControl(ccsHidden, "BirthDay", "BirthDay", ccsText, "", CCGetRequestParam("BirthDay", ccsGet, NULL), $this);
        $this->BirthYear = & new clsControl(ccsHidden, "BirthYear", "BirthYear", ccsText, "", CCGetRequestParam("BirthYear", ccsGet, NULL), $this);
        $this->PlaceOfBirth = & new clsControl(ccsHidden, "PlaceOfBirth", "PlaceOfBirth", ccsText, "", CCGetRequestParam("PlaceOfBirth", ccsGet, NULL), $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsText, "", "", $this);
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsText, "", "", $this);
        $this->Designation = & new clsControl(ccsReportLabel, "Designation", "Designation", ccsText, "", "", $this);
        $this->StatofAppt = & new clsControl(ccsReportLabel, "StatofAppt", "StatofAppt", ccsText, "", "", $this);
        $this->AnnualSalary = & new clsControl(ccsReportLabel, "AnnualSalary", "AnnualSalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->OfficeStatn = & new clsControl(ccsReportLabel, "OfficeStatn", "OfficeStatn", ccsText, "", "", $this);
        $this->Branch = & new clsControl(ccsReportLabel, "Branch", "Branch", ccsText, "", "", $this);
        $this->AbsenceWOPay = & new clsControl(ccsReportLabel, "AbsenceWOPay", "AbsenceWOPay", ccsText, "", "", $this);
        $this->Separation = & new clsControl(ccsReportLabel, "Separation", "Separation", ccsText, "", "", $this);
        $this->Signatory2 = & new clsControl(ccsHidden, "Signatory2", "Signatory2", ccsText, "", CCGetRequestParam("Signatory2", ccsGet, NULL), $this);
        $this->PositionSig2 = & new clsControl(ccsHidden, "PositionSig2", "PositionSig2", ccsText, "", CCGetRequestParam("PositionSig2", ccsGet, NULL), $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->PageBreak = & new clsPanel("PageBreak", $this);
        $this->Report_CurrentPage = & new clsControl(ccsReportLabel, "Report_CurrentPage", "Report_CurrentPage", ccsInteger, "", "", $this);
        $this->Report_TotalPages = & new clsControl(ccsReportLabel, "Report_TotalPages", "Report_TotalPages", ccsInteger, "", "", $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->NameExtension = & new clsControl(ccsListBox, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->NameExtension->DSType = dsTable;
        $this->NameExtension->DataSource = new clsDBConnection1();
        $this->NameExtension->ds = & $this->NameExtension->DataSource;
        $this->NameExtension->DataSource->SQL = "SELECT * \n" .
"FROM lut_servicerecpurpose {SQL_Where} {SQL_OrderBy}";
        list($this->NameExtension->BoundColumn, $this->NameExtension->TextColumn, $this->NameExtension->DBFormat) = array("ServiceRecPurpose", "ServiceRecPurpose", "");
        $this->Report_CurrentDate = & new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array("mmmm", " ", "d", ", ", "yyyy"), "", $this);
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

//CheckErrors Method @2-9D6C2584
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleInitial->Errors->Count());
        $errors = ($errors || $this->BirthMonth->Errors->Count());
        $errors = ($errors || $this->BirthDay->Errors->Count());
        $errors = ($errors || $this->BirthYear->Errors->Count());
        $errors = ($errors || $this->PlaceOfBirth->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->Designation->Errors->Count());
        $errors = ($errors || $this->StatofAppt->Errors->Count());
        $errors = ($errors || $this->AnnualSalary->Errors->Count());
        $errors = ($errors || $this->OfficeStatn->Errors->Count());
        $errors = ($errors || $this->Branch->Errors->Count());
        $errors = ($errors || $this->AbsenceWOPay->Errors->Count());
        $errors = ($errors || $this->Separation->Errors->Count());
        $errors = ($errors || $this->Signatory2->Errors->Count());
        $errors = ($errors || $this->PositionSig2->Errors->Count());
        $errors = ($errors || $this->Report_CurrentPage->Errors->Count());
        $errors = ($errors || $this->Report_TotalPages->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-E1EA9679
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleInitial->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PlaceOfBirth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Designation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatofAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AnnualSalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeStatn->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Branch->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AbsenceWOPay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Separation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentPage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_TotalPages->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-C39A4C57
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_EmployeeIDNo"] = CCGetFromGet("s_EmployeeIDNo", NULL);
        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleName"] = CCGetFromGet("s_MiddleName", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->NameExtension->Prepare();

        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $SurnameKey = "";
        $FirstNameKey = "";
        $MiddleInitialKey = "";
        $BirthMonthKey = "";
        $BirthDayKey = "";
        $BirthYearKey = "";
        $PlaceOfBirthKey = "";
        $Groups = new clsGroupsCollectionemployee_employee_service1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleInitial->SetValue($this->DataSource->MiddleInitial->GetValue());
            $this->BirthMonth->SetValue($this->DataSource->BirthMonth->GetValue());
            $this->BirthDay->SetValue($this->DataSource->BirthDay->GetValue());
            $this->BirthYear->SetValue($this->DataSource->BirthYear->GetValue());
            $this->PlaceOfBirth->SetValue($this->DataSource->PlaceOfBirth->GetValue());
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->Designation->SetValue($this->DataSource->Designation->GetValue());
            $this->StatofAppt->SetValue($this->DataSource->StatofAppt->GetValue());
            $this->AnnualSalary->SetValue($this->DataSource->AnnualSalary->GetValue());
            $this->OfficeStatn->SetValue($this->DataSource->OfficeStatn->GetValue());
            $this->Branch->SetValue($this->DataSource->Branch->GetValue());
            $this->AbsenceWOPay->SetValue($this->DataSource->AbsenceWOPay->GetValue());
            $this->Separation->SetValue($this->DataSource->Separation->GetValue());
            $this->Signatory2->SetValue($this->DataSource->Signatory2->GetValue());
            $this->PositionSig2->SetValue($this->DataSource->PositionSig2->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $SurnameKey != $this->DataSource->f("Surname")) {
                $Groups->OpenGroup("Surname");
            } elseif ($FirstNameKey != $this->DataSource->f("FirstName")) {
                $Groups->OpenGroup("FirstName");
            } elseif ($MiddleInitialKey != $this->DataSource->f("MiddleInitial")) {
                $Groups->OpenGroup("MiddleInitial");
            } elseif ($BirthMonthKey != $this->DataSource->f("BirthMonth")) {
                $Groups->OpenGroup("BirthMonth");
            } elseif ($BirthDayKey != $this->DataSource->f("BirthDay")) {
                $Groups->OpenGroup("BirthDay");
            } elseif ($BirthYearKey != $this->DataSource->f("BirthYear")) {
                $Groups->OpenGroup("BirthYear");
            } elseif ($PlaceOfBirthKey != $this->DataSource->f("PlaceOfBirth")) {
                $Groups->OpenGroup("PlaceOfBirth");
            }
            $Groups->AddItem();
            $SurnameKey = $this->DataSource->f("Surname");
            $FirstNameKey = $this->DataSource->f("FirstName");
            $MiddleInitialKey = $this->DataSource->f("MiddleInitial");
            $BirthMonthKey = $this->DataSource->f("BirthMonth");
            $BirthDayKey = $this->DataSource->f("BirthDay");
            $BirthYearKey = $this->DataSource->f("BirthYear");
            $PlaceOfBirthKey = $this->DataSource->f("PlaceOfBirth");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $SurnameKey != $this->DataSource->f("Surname")) {
                $Groups->CloseGroup("Surname");
            } elseif ($FirstNameKey != $this->DataSource->f("FirstName")) {
                $Groups->CloseGroup("FirstName");
            } elseif ($MiddleInitialKey != $this->DataSource->f("MiddleInitial")) {
                $Groups->CloseGroup("MiddleInitial");
            } elseif ($BirthMonthKey != $this->DataSource->f("BirthMonth")) {
                $Groups->CloseGroup("BirthMonth");
            } elseif ($BirthDayKey != $this->DataSource->f("BirthDay")) {
                $Groups->CloseGroup("BirthDay");
            } elseif ($BirthYearKey != $this->DataSource->f("BirthYear")) {
                $Groups->CloseGroup("BirthYear");
            } elseif ($PlaceOfBirthKey != $this->DataSource->f("PlaceOfBirth")) {
                $Groups->CloseGroup("PlaceOfBirth");
            }
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
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleInitial"] = $this->MiddleInitial->Visible;
            $this->ControlsVisible["BirthMonth"] = $this->BirthMonth->Visible;
            $this->ControlsVisible["BirthDay"] = $this->BirthDay->Visible;
            $this->ControlsVisible["BirthYear"] = $this->BirthYear->Visible;
            $this->ControlsVisible["PlaceOfBirth"] = $this->PlaceOfBirth->Visible;
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["Designation"] = $this->Designation->Visible;
            $this->ControlsVisible["StatofAppt"] = $this->StatofAppt->Visible;
            $this->ControlsVisible["AnnualSalary"] = $this->AnnualSalary->Visible;
            $this->ControlsVisible["OfficeStatn"] = $this->OfficeStatn->Visible;
            $this->ControlsVisible["Branch"] = $this->Branch->Visible;
            $this->ControlsVisible["AbsenceWOPay"] = $this->AbsenceWOPay->Visible;
            $this->ControlsVisible["Separation"] = $this->Separation->Visible;
            $this->ControlsVisible["Signatory2"] = $this->Signatory2->Visible;
            $this->ControlsVisible["PositionSig2"] = $this->PositionSig2->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->DateFrom->SetValue($items[$i]->DateFrom);
                        $this->DateFrom->Attributes->RestoreFromArray($items[$i]->_DateFromAttributes);
                        $this->DateTo->SetValue($items[$i]->DateTo);
                        $this->DateTo->Attributes->RestoreFromArray($items[$i]->_DateToAttributes);
                        $this->Designation->SetValue($items[$i]->Designation);
                        $this->Designation->Attributes->RestoreFromArray($items[$i]->_DesignationAttributes);
                        $this->StatofAppt->SetValue($items[$i]->StatofAppt);
                        $this->StatofAppt->Attributes->RestoreFromArray($items[$i]->_StatofApptAttributes);
                        $this->AnnualSalary->SetValue($items[$i]->AnnualSalary);
                        $this->AnnualSalary->Attributes->RestoreFromArray($items[$i]->_AnnualSalaryAttributes);
                        $this->OfficeStatn->SetValue($items[$i]->OfficeStatn);
                        $this->OfficeStatn->Attributes->RestoreFromArray($items[$i]->_OfficeStatnAttributes);
                        $this->Branch->SetValue($items[$i]->Branch);
                        $this->Branch->Attributes->RestoreFromArray($items[$i]->_BranchAttributes);
                        $this->AbsenceWOPay->SetValue($items[$i]->AbsenceWOPay);
                        $this->AbsenceWOPay->Attributes->RestoreFromArray($items[$i]->_AbsenceWOPayAttributes);
                        $this->Separation->SetValue($items[$i]->Separation);
                        $this->Separation->Attributes->RestoreFromArray($items[$i]->_SeparationAttributes);
                        $this->Signatory2->SetValue($items[$i]->Signatory2);
                        $this->Signatory2->Attributes->RestoreFromArray($items[$i]->_Signatory2Attributes);
                        $this->PositionSig2->SetValue($items[$i]->PositionSig2);
                        $this->PositionSig2->Attributes->RestoreFromArray($items[$i]->_PositionSig2Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->DateFrom->Show();
                        $this->DateTo->Show();
                        $this->Designation->Show();
                        $this->StatofAppt->Show();
                        $this->AnnualSalary->Show();
                        $this->OfficeStatn->Show();
                        $this->Branch->Show();
                        $this->AbsenceWOPay->Show();
                        $this->Separation->Show();
                        $this->Signatory2->Show();
                        $this->PositionSig2->Show();
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
                            $this->Report_CurrentPage->SetValue($items[$i]->PageNumber);
                            $this->Report_CurrentPage->Attributes->RestoreFromArray($items[$i]->_Report_CurrentPageAttributes);
                            $this->Report_TotalPages->SetValue($Groups->TotalPages);
                            $this->Report_TotalPages->Attributes->RestoreFromArray($items[$i]->_Report_TotalPagesAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->NameExtension->SetValue($items[$i]->NameExtension);
                            $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
                                $this->Report_CurrentPage->Show();
                                $this->Report_TotalPages->Show();
                                $this->Navigator->Show();
                                $this->NameExtension->Show();
                                $this->Report_CurrentDate->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Surname":
                        if ($items[$i]->Mode == 1) {
                            $this->Surname->SetValue($items[$i]->Surname);
                            $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                            $this->FirstName->SetValue($items[$i]->FirstName);
                            $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                            $this->MiddleInitial->SetValue($items[$i]->MiddleInitial);
                            $this->MiddleInitial->Attributes->RestoreFromArray($items[$i]->_MiddleInitialAttributes);
                            $this->BirthMonth->SetValue($items[$i]->BirthMonth);
                            $this->BirthMonth->Attributes->RestoreFromArray($items[$i]->_BirthMonthAttributes);
                            $this->BirthDay->SetValue($items[$i]->BirthDay);
                            $this->BirthDay->Attributes->RestoreFromArray($items[$i]->_BirthDayAttributes);
                            $this->BirthYear->SetValue($items[$i]->BirthYear);
                            $this->BirthYear->Attributes->RestoreFromArray($items[$i]->_BirthYearAttributes);
                            $this->PlaceOfBirth->SetValue($items[$i]->PlaceOfBirth);
                            $this->PlaceOfBirth->Attributes->RestoreFromArray($items[$i]->_PlaceOfBirthAttributes);
                            $this->Surname_Header->CCSEventResult = CCGetEvent($this->Surname_Header->CCSEvents, "BeforeShow", $this->Surname_Header);
                            if ($this->Surname_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Surname_Header";
                                $this->Attributes->Show();
                                $this->Surname->Show();
                                $this->FirstName->Show();
                                $this->MiddleInitial->Show();
                                $this->BirthMonth->Show();
                                $this->BirthDay->Show();
                                $this->BirthYear->Show();
                                $this->PlaceOfBirth->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Surname_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Surname_Footer->CCSEventResult = CCGetEvent($this->Surname_Footer->CCSEvents, "BeforeShow", $this->Surname_Footer);
                            if ($this->Surname_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Surname_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Surname_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "FirstName":
                        if ($items[$i]->Mode == 1) {
                            $this->FirstName_Header->CCSEventResult = CCGetEvent($this->FirstName_Header->CCSEvents, "BeforeShow", $this->FirstName_Header);
                            if ($this->FirstName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FirstName_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FirstName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->FirstName_Footer->CCSEventResult = CCGetEvent($this->FirstName_Footer->CCSEvents, "BeforeShow", $this->FirstName_Footer);
                            if ($this->FirstName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FirstName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FirstName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "MiddleInitial":
                        if ($items[$i]->Mode == 1) {
                            $this->MiddleInitial_Header->CCSEventResult = CCGetEvent($this->MiddleInitial_Header->CCSEvents, "BeforeShow", $this->MiddleInitial_Header);
                            if ($this->MiddleInitial_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section MiddleInitial_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section MiddleInitial_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->MiddleInitial_Footer->CCSEventResult = CCGetEvent($this->MiddleInitial_Footer->CCSEvents, "BeforeShow", $this->MiddleInitial_Footer);
                            if ($this->MiddleInitial_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section MiddleInitial_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section MiddleInitial_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "BirthMonth":
                        if ($items[$i]->Mode == 1) {
                            $this->BirthMonth_Header->CCSEventResult = CCGetEvent($this->BirthMonth_Header->CCSEvents, "BeforeShow", $this->BirthMonth_Header);
                            if ($this->BirthMonth_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section BirthMonth_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section BirthMonth_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->BirthMonth_Footer->CCSEventResult = CCGetEvent($this->BirthMonth_Footer->CCSEvents, "BeforeShow", $this->BirthMonth_Footer);
                            if ($this->BirthMonth_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section BirthMonth_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section BirthMonth_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "BirthDay":
                        if ($items[$i]->Mode == 1) {
                            $this->BirthDay_Header->CCSEventResult = CCGetEvent($this->BirthDay_Header->CCSEvents, "BeforeShow", $this->BirthDay_Header);
                            if ($this->BirthDay_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section BirthDay_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section BirthDay_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->BirthDay_Footer->CCSEventResult = CCGetEvent($this->BirthDay_Footer->CCSEvents, "BeforeShow", $this->BirthDay_Footer);
                            if ($this->BirthDay_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section BirthDay_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section BirthDay_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "BirthYear":
                        if ($items[$i]->Mode == 1) {
                            $this->BirthYear_Header->CCSEventResult = CCGetEvent($this->BirthYear_Header->CCSEvents, "BeforeShow", $this->BirthYear_Header);
                            if ($this->BirthYear_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section BirthYear_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section BirthYear_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->BirthYear_Footer->CCSEventResult = CCGetEvent($this->BirthYear_Footer->CCSEvents, "BeforeShow", $this->BirthYear_Footer);
                            if ($this->BirthYear_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section BirthYear_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section BirthYear_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "PlaceOfBirth":
                        if ($items[$i]->Mode == 1) {
                            $this->PlaceOfBirth_Header->CCSEventResult = CCGetEvent($this->PlaceOfBirth_Header->CCSEvents, "BeforeShow", $this->PlaceOfBirth_Header);
                            if ($this->PlaceOfBirth_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PlaceOfBirth_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PlaceOfBirth_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->PlaceOfBirth_Footer->CCSEventResult = CCGetEvent($this->PlaceOfBirth_Footer->CCSEvents, "BeforeShow", $this->PlaceOfBirth_Footer);
                            if ($this->PlaceOfBirth_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section PlaceOfBirth_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section PlaceOfBirth_Footer", true, "Section Detail");
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

} //End employee_employee_service1 Class @2-FCB6E20C

class clsemployee_employee_service1DataSource extends clsDBConnection1 {  //employee_employee_service1DataSource Class @2-FEED6294

//DataSource Variables @2-F77E08D2
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Surname;
    var $FirstName;
    var $MiddleInitial;
    var $BirthMonth;
    var $BirthDay;
    var $BirthYear;
    var $PlaceOfBirth;
    var $DateFrom;
    var $DateTo;
    var $Designation;
    var $StatofAppt;
    var $AnnualSalary;
    var $OfficeStatn;
    var $Branch;
    var $AbsenceWOPay;
    var $Separation;
    var $Signatory2;
    var $PositionSig2;
    var $NameExtension;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-6EBDE7E7
    function clsemployee_employee_service1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_employee_service1";
        $this->Initialize();
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleInitial = new clsField("MiddleInitial", ccsText, "");
        
        $this->BirthMonth = new clsField("BirthMonth", ccsText, "");
        
        $this->BirthDay = new clsField("BirthDay", ccsText, "");
        
        $this->BirthYear = new clsField("BirthYear", ccsText, "");
        
        $this->PlaceOfBirth = new clsField("PlaceOfBirth", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsText, "");
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->Designation = new clsField("Designation", ccsText, "");
        
        $this->StatofAppt = new clsField("StatofAppt", ccsText, "");
        
        $this->AnnualSalary = new clsField("AnnualSalary", ccsSingle, "");
        
        $this->OfficeStatn = new clsField("OfficeStatn", ccsText, "");
        
        $this->Branch = new clsField("Branch", ccsText, "");
        
        $this->AbsenceWOPay = new clsField("AbsenceWOPay", ccsText, "");
        
        $this->Separation = new clsField("Separation", ccsText, "");
        
        $this->Signatory2 = new clsField("Signatory2", ccsText, "");
        
        $this->PositionSig2 = new clsField("PositionSig2", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-11DF3D42
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateFrom";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-A4A70CBE
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_EmployeeIDNo", ccsText, "", "", $this->Parameters["urls_EmployeeIDNo"], "", false);
        $this->wp->AddParameter("2", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "EmployeeIDNo", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "MiddleName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]);
    }
//End Prepare Method

//Open Method @2-D4F74C8B
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT employee.*, employee_servicerecord.*, Signatory2, PositionSig2 \n\n" .
        "FROM signatories, employee_servicerecord INNER JOIN employee ON\n\n" .
        "employee_servicerecord.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "employee.Surname asc,employee.FirstName asc,employee.MiddleInitial asc,employee.BirthMonth asc,employee.BirthDay asc,employee.BirthYear asc,employee.PlaceOfBirth asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-1F9F48F2
    function SetValues()
    {
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleInitial->SetDBValue($this->f("MiddleInitial"));
        $this->BirthMonth->SetDBValue($this->f("BirthMonth"));
        $this->BirthDay->SetDBValue($this->f("BirthDay"));
        $this->BirthYear->SetDBValue($this->f("BirthYear"));
        $this->PlaceOfBirth->SetDBValue($this->f("PlaceOfBirth"));
        $this->DateFrom->SetDBValue($this->f("DateFrom"));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->Designation->SetDBValue($this->f("Designation"));
        $this->StatofAppt->SetDBValue($this->f("StatofAppt"));
        $this->AnnualSalary->SetDBValue(trim($this->f("AnnualSalary")));
        $this->OfficeStatn->SetDBValue($this->f("OfficeStatn"));
        $this->Branch->SetDBValue($this->f("Branch"));
        $this->AbsenceWOPay->SetDBValue($this->f("AbsenceWOPay"));
        $this->Separation->SetDBValue($this->f("Separation"));
        $this->Signatory2->SetDBValue($this->f("Signatory2"));
        $this->PositionSig2->SetDBValue($this->f("PositionSig2"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
    }
//End SetValues Method

} //End employee_employee_service1DataSource Class @2-FCB6E20C

class clsRecordemployee_employee_service { //employee_employee_service Class @11-6C0CC55F

//Variables @11-D6FF3E86

    // Public variables
    var $ComponentType = "Record";
    var $ComponentName;
    var $Parent;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormEnctype;
    var $Visible;
    var $IsEmpty;

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode      = false;
    var $ds;
    var $DataSource;
    var $ValidatingControls;
    var $Controls;
    var $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @11-874FB367
    function clsRecordemployee_employee_service($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee_employee_service/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee_employee_service";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = & new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_EmployeeIDNo", "s_Surname", "s_FirstName", "s_MiddleName", "ccsForm"));
            $this->ClearParameters->Page = "ReportServiceRecord2.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_EmployeeIDNo = & new clsControl(ccsTextBox, "s_EmployeeIDNo", "s_EmployeeIDNo", ccsText, "", CCGetRequestParam("s_EmployeeIDNo", $Method, NULL), $this);
            $this->s_Surname = & new clsControl(ccsTextBox, "s_Surname", "s_Surname", ccsText, "", CCGetRequestParam("s_Surname", $Method, NULL), $this);
            $this->s_FirstName = & new clsControl(ccsTextBox, "s_FirstName", "s_FirstName", ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_MiddleName = & new clsControl(ccsTextBox, "s_MiddleName", "s_MiddleName", ccsText, "", CCGetRequestParam("s_MiddleName", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @11-7250C7F5
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_EmployeeIDNo->Validate() && $Validation);
        $Validation = ($this->s_Surname->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_MiddleName->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_EmployeeIDNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleName->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @11-27F34876
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->s_Surname->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_MiddleName->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @11-ED598703
function SetPrimaryKeys($keyArray)
{
    $this->PrimaryKeys = $keyArray;
}
function GetPrimaryKeys()
{
    return $this->PrimaryKeys;
}
function GetPrimaryKey($keyName)
{
    return $this->PrimaryKeys[$keyName];
}
//End MasterDetail

//Operation Method @11-F02307EB
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "ReportServiceRecord2.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "ReportServiceRecord2.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @11-C1862F87
    function Show()
    {
        global $CCSUseAmp;
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_EmployeeIDNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Surname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->ClearParameters->Show();
        $this->Button_DoSearch->Show();
        $this->s_EmployeeIDNo->Show();
        $this->s_Surname->Show();
        $this->s_FirstName->Show();
        $this->s_MiddleName->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employee_employee_service Class @11-FCB6E20C

//Initialize Page @1-AB8D8B27
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
$TemplateFileName = "ReportServiceRecord2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-784DBDDF
include_once("./ReportServiceRecord2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-EBDA0FB3
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_employee_service1 = & new clsReportemployee_employee_service1("", $MainPage);
$employee_employee_service = & new clsRecordemployee_employee_service("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "ReportServiceRecord2.php";
$MainPage->employee_employee_service1 = & $employee_employee_service1;
$MainPage->employee_employee_service = & $employee_employee_service;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_employee_service1->Initialize();

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

//Execute Components @1-AD0ECF0F
$employee_employee_service->Operation();
//End Execute Components

//Go to destination page @1-32C855A8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_employee_service1);
    unset($employee_employee_service);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-D807E958
$employee_employee_service1->Show();
$employee_employee_service->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-88F4C2D2
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_employee_service1);
unset($employee_employee_service);
unset($Tpl);
//End Unload Page


?>
