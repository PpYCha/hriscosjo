<?php
//Include Common Files @1-3A7C37B0
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "SRreport_ms_backup3_2c.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_lut_servicerecpu ReportGroup class @2-33325D0B
class clsReportGroupemployee_lut_servicerecpu {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Surname, $_SurnameAttributes;
    var $DateTo, $_DateToAttributes;
    var $Designation, $_DesignationAttributes;
    var $StatofAppt, $_StatofApptAttributes;
    var $AnnualSalary, $_AnnualSalaryAttributes;
    var $Slash, $_SlashAttributes;
    var $OfficeStatn, $_OfficeStatnAttributes;
    var $Branch, $_BranchAttributes;
    var $AbsenceWOPay, $_AbsenceWOPayAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $BirthMonth, $_BirthMonthAttributes;
    var $BirthDay, $_BirthDayAttributes;
    var $BirthYear, $_BirthYearAttributes;
    var $PlaceOfBirth, $_PlaceOfBirthAttributes;
    var $DateFrom, $_DateFromAttributes;
    var $Separation, $_SeparationAttributes;
    var $ServiceRecPurpose, $_ServiceRecPurposeAttributes;
    var $OfficeID, $_OfficeIDAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $ImageLink1, $_ImageLink1Page, $_ImageLink1Parameters, $_ImageLink1Attributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_lut_servicerecpu(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Surname = $this->Parent->Surname->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->Designation = $this->Parent->Designation->Value;
        $this->StatofAppt = $this->Parent->StatofAppt->Value;
        $this->AnnualSalary = $this->Parent->AnnualSalary->Value;
        $this->Slash = $this->Parent->Slash->Value;
        $this->OfficeStatn = $this->Parent->OfficeStatn->Value;
        $this->Branch = $this->Parent->Branch->Value;
        $this->AbsenceWOPay = $this->Parent->AbsenceWOPay->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->BirthMonth = $this->Parent->BirthMonth->Value;
        $this->BirthDay = $this->Parent->BirthDay->Value;
        $this->BirthYear = $this->Parent->BirthYear->Value;
        $this->PlaceOfBirth = $this->Parent->PlaceOfBirth->Value;
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->Separation = $this->Parent->Separation->Value;
        $this->ServiceRecPurpose = $this->Parent->ServiceRecPurpose->Value;
        $this->OfficeID = $this->Parent->OfficeID->Value;
        $this->ImageLink1 = $this->Parent->ImageLink1->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_ImageLink1Page = $this->Parent->ImageLink1->Page;
        $this->_ImageLink1Parameters = $this->Parent->ImageLink1->Parameters;
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_DesignationAttributes = $this->Parent->Designation->Attributes->GetAsArray();
        $this->_StatofApptAttributes = $this->Parent->StatofAppt->Attributes->GetAsArray();
        $this->_AnnualSalaryAttributes = $this->Parent->AnnualSalary->Attributes->GetAsArray();
        $this->_SlashAttributes = $this->Parent->Slash->Attributes->GetAsArray();
        $this->_OfficeStatnAttributes = $this->Parent->OfficeStatn->Attributes->GetAsArray();
        $this->_BranchAttributes = $this->Parent->Branch->Attributes->GetAsArray();
        $this->_AbsenceWOPayAttributes = $this->Parent->AbsenceWOPay->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_BirthMonthAttributes = $this->Parent->BirthMonth->Attributes->GetAsArray();
        $this->_BirthDayAttributes = $this->Parent->BirthDay->Attributes->GetAsArray();
        $this->_BirthYearAttributes = $this->Parent->BirthYear->Attributes->GetAsArray();
        $this->_PlaceOfBirthAttributes = $this->Parent->PlaceOfBirth->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_SeparationAttributes = $this->Parent->Separation->Attributes->GetAsArray();
        $this->_ServiceRecPurposeAttributes = $this->Parent->ServiceRecPurpose->Attributes->GetAsArray();
        $this->_OfficeIDAttributes = $this->Parent->OfficeID->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_ImageLink1Attributes = $this->Parent->ImageLink1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
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
        $this->Slash = $Header->Slash;
        $Header->_SlashAttributes = $this->_SlashAttributes;
        $this->Parent->Slash->Value = $Header->Slash;
        $this->Parent->Slash->Attributes->RestoreFromArray($Header->_SlashAttributes);
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
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->MiddleName = $Header->MiddleName;
        $Header->_MiddleNameAttributes = $this->_MiddleNameAttributes;
        $this->Parent->MiddleName->Value = $Header->MiddleName;
        $this->Parent->MiddleName->Attributes->RestoreFromArray($Header->_MiddleNameAttributes);
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
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
        $this->Separation = $Header->Separation;
        $Header->_SeparationAttributes = $this->_SeparationAttributes;
        $this->Parent->Separation->Value = $Header->Separation;
        $this->Parent->Separation->Attributes->RestoreFromArray($Header->_SeparationAttributes);
        $this->ServiceRecPurpose = $Header->ServiceRecPurpose;
        $Header->_ServiceRecPurposeAttributes = $this->_ServiceRecPurposeAttributes;
        $this->Parent->ServiceRecPurpose->Value = $Header->ServiceRecPurpose;
        $this->Parent->ServiceRecPurpose->Attributes->RestoreFromArray($Header->_ServiceRecPurposeAttributes);
        $this->OfficeID = $Header->OfficeID;
        $Header->_OfficeIDAttributes = $this->_OfficeIDAttributes;
        $this->Parent->OfficeID->Value = $Header->OfficeID;
        $this->Parent->OfficeID->Attributes->RestoreFromArray($Header->_OfficeIDAttributes);
        $this->ImageLink1 = $Header->ImageLink1;
        $this->_ImageLink1Page = $Header->_ImageLink1Page;
        $this->_ImageLink1Parameters = $Header->_ImageLink1Parameters;
        $Header->_ImageLink1Attributes = $this->_ImageLink1Attributes;
        $this->Parent->ImageLink1->Value = $Header->ImageLink1;
        $this->Parent->ImageLink1->Attributes->RestoreFromArray($Header->_ImageLink1Attributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee_lut_servicerecpu ReportGroup class

//employee_lut_servicerecpu GroupsCollection class @2-50E98D7C
class clsGroupsCollectionemployee_lut_servicerecpu {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_lut_servicerecpu(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_lut_servicerecpu($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->DateTo->Value = $this->Parent->DateTo->initialValue;
        $this->Parent->Designation->Value = $this->Parent->Designation->initialValue;
        $this->Parent->StatofAppt->Value = $this->Parent->StatofAppt->initialValue;
        $this->Parent->AnnualSalary->Value = $this->Parent->AnnualSalary->initialValue;
        $this->Parent->Slash->Value = $this->Parent->Slash->initialValue;
        $this->Parent->OfficeStatn->Value = $this->Parent->OfficeStatn->initialValue;
        $this->Parent->Branch->Value = $this->Parent->Branch->initialValue;
        $this->Parent->AbsenceWOPay->Value = $this->Parent->AbsenceWOPay->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->BirthMonth->Value = $this->Parent->BirthMonth->initialValue;
        $this->Parent->BirthDay->Value = $this->Parent->BirthDay->initialValue;
        $this->Parent->BirthYear->Value = $this->Parent->BirthYear->initialValue;
        $this->Parent->PlaceOfBirth->Value = $this->Parent->PlaceOfBirth->initialValue;
        $this->Parent->DateFrom->Value = $this->Parent->DateFrom->initialValue;
        $this->Parent->Separation->Value = $this->Parent->Separation->initialValue;
        $this->Parent->ServiceRecPurpose->Value = $this->Parent->ServiceRecPurpose->initialValue;
        $this->Parent->OfficeID->Value = $this->Parent->OfficeID->initialValue;
        $this->Parent->ImageLink1->Value = $this->Parent->ImageLink1->initialValue;
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
//End employee_lut_servicerecpu GroupsCollection class

class clsReportemployee_lut_servicerecpu { //employee_lut_servicerecpu Class @2-FE4888D2

//employee_lut_servicerecpu Variables @2-87F7EA53

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
//End employee_lut_servicerecpu Variables

//Class_Initialize Event @2-0BFC5AA3
    function clsReportemployee_lut_servicerecpu($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_lut_servicerecpu";
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
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployee_lut_servicerecpuDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Print");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 100;
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
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsText, "", "", $this);
        $this->Designation = & new clsControl(ccsReportLabel, "Designation", "Designation", ccsText, "", "", $this);
        $this->StatofAppt = & new clsControl(ccsReportLabel, "StatofAppt", "StatofAppt", ccsText, "", "", $this);
        $this->AnnualSalary = & new clsControl(ccsReportLabel, "AnnualSalary", "AnnualSalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->Slash = & new clsControl(ccsReportLabel, "Slash", "Slash", ccsText, "", "", $this);
        $this->OfficeStatn = & new clsControl(ccsReportLabel, "OfficeStatn", "OfficeStatn", ccsText, "", "", $this);
        $this->Branch = & new clsControl(ccsReportLabel, "Branch", "Branch", ccsText, "", "", $this);
        $this->AbsenceWOPay = & new clsControl(ccsReportLabel, "AbsenceWOPay", "AbsenceWOPay", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsHidden, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsHidden, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->NameExtension = & new clsControl(ccsHidden, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->BirthMonth = & new clsControl(ccsHidden, "BirthMonth", "BirthMonth", ccsText, "", CCGetRequestParam("BirthMonth", ccsGet, NULL), $this);
        $this->BirthDay = & new clsControl(ccsHidden, "BirthDay", "BirthDay", ccsText, "", CCGetRequestParam("BirthDay", ccsGet, NULL), $this);
        $this->BirthYear = & new clsControl(ccsHidden, "BirthYear", "BirthYear", ccsText, "", CCGetRequestParam("BirthYear", ccsGet, NULL), $this);
        $this->PlaceOfBirth = & new clsControl(ccsHidden, "PlaceOfBirth", "PlaceOfBirth", ccsText, "", CCGetRequestParam("PlaceOfBirth", ccsGet, NULL), $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsDate, array("mm", "/", "dd", "/", "yyyy"), "", $this);
        $this->Separation = & new clsControl(ccsReportLabel, "Separation", "Separation", ccsText, "", "", $this);
        $this->ServiceRecPurpose = & new clsControl(ccsHidden, "ServiceRecPurpose", "ServiceRecPurpose", ccsText, "", CCGetRequestParam("ServiceRecPurpose", ccsGet, NULL), $this);
        $this->OfficeID = & new clsControl(ccsHidden, "OfficeID", "OfficeID", ccsInteger, "", CCGetRequestParam("OfficeID", ccsGet, NULL), $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->PageBreak = & new clsPanel("PageBreak", $this);
        $this->Report_CurrentDate = & new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Report_CurrentDate->HTML = true;
        $this->Report_CurrentDate->EmptyText = "&nbsp;";
        $this->ImageLink1 = & new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink1->Page = "";
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

//CheckErrors Method @2-0C011E4E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->Designation->Errors->Count());
        $errors = ($errors || $this->StatofAppt->Errors->Count());
        $errors = ($errors || $this->AnnualSalary->Errors->Count());
        $errors = ($errors || $this->Slash->Errors->Count());
        $errors = ($errors || $this->OfficeStatn->Errors->Count());
        $errors = ($errors || $this->Branch->Errors->Count());
        $errors = ($errors || $this->AbsenceWOPay->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->BirthMonth->Errors->Count());
        $errors = ($errors || $this->BirthDay->Errors->Count());
        $errors = ($errors || $this->BirthYear->Errors->Count());
        $errors = ($errors || $this->PlaceOfBirth->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->Separation->Errors->Count());
        $errors = ($errors || $this->ServiceRecPurpose->Errors->Count());
        $errors = ($errors || $this->OfficeID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->ImageLink1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-AD1DF63F
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Designation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatofAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AnnualSalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Slash->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeStatn->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Branch->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AbsenceWOPay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PlaceOfBirth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Separation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServiceRecPurpose->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-F36DBBA1
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleName"] = CCGetFromGet("s_MiddleName", NULL);
        $this->DataSource->Parameters["urls_NameExtension"] = CCGetFromGet("s_NameExtension", NULL);
        $this->DataSource->Parameters["urls_OfficeID"] = CCGetFromGet("s_OfficeID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee_lut_servicerecpu($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->Designation->SetValue($this->DataSource->Designation->GetValue());
            $this->StatofAppt->SetValue($this->DataSource->StatofAppt->GetValue());
            $this->AnnualSalary->SetValue($this->DataSource->AnnualSalary->GetValue());
            $this->Slash->SetValue($this->DataSource->Slash->GetValue());
            $this->OfficeStatn->SetValue($this->DataSource->OfficeStatn->GetValue());
            $this->Branch->SetValue($this->DataSource->Branch->GetValue());
            $this->AbsenceWOPay->SetValue($this->DataSource->AbsenceWOPay->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->BirthMonth->SetValue($this->DataSource->BirthMonth->GetValue());
            $this->BirthDay->SetValue($this->DataSource->BirthDay->GetValue());
            $this->BirthYear->SetValue($this->DataSource->BirthYear->GetValue());
            $this->PlaceOfBirth->SetValue($this->DataSource->PlaceOfBirth->GetValue());
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->Separation->SetValue($this->DataSource->Separation->GetValue());
            $this->ServiceRecPurpose->SetValue($this->DataSource->ServiceRecPurpose->GetValue());
            $this->OfficeID->SetValue($this->DataSource->OfficeID->GetValue());
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
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["Designation"] = $this->Designation->Visible;
            $this->ControlsVisible["StatofAppt"] = $this->StatofAppt->Visible;
            $this->ControlsVisible["AnnualSalary"] = $this->AnnualSalary->Visible;
            $this->ControlsVisible["Slash"] = $this->Slash->Visible;
            $this->ControlsVisible["OfficeStatn"] = $this->OfficeStatn->Visible;
            $this->ControlsVisible["Branch"] = $this->Branch->Visible;
            $this->ControlsVisible["AbsenceWOPay"] = $this->AbsenceWOPay->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["BirthMonth"] = $this->BirthMonth->Visible;
            $this->ControlsVisible["BirthDay"] = $this->BirthDay->Visible;
            $this->ControlsVisible["BirthYear"] = $this->BirthYear->Visible;
            $this->ControlsVisible["PlaceOfBirth"] = $this->PlaceOfBirth->Visible;
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["Separation"] = $this->Separation->Visible;
            $this->ControlsVisible["ServiceRecPurpose"] = $this->ServiceRecPurpose->Visible;
            $this->ControlsVisible["OfficeID"] = $this->OfficeID->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->DateTo->SetValue($items[$i]->DateTo);
                        $this->DateTo->Attributes->RestoreFromArray($items[$i]->_DateToAttributes);
                        $this->Designation->SetValue($items[$i]->Designation);
                        $this->Designation->Attributes->RestoreFromArray($items[$i]->_DesignationAttributes);
                        $this->StatofAppt->SetValue($items[$i]->StatofAppt);
                        $this->StatofAppt->Attributes->RestoreFromArray($items[$i]->_StatofApptAttributes);
                        $this->AnnualSalary->SetValue($items[$i]->AnnualSalary);
                        $this->AnnualSalary->Attributes->RestoreFromArray($items[$i]->_AnnualSalaryAttributes);
                        $this->Slash->SetValue($items[$i]->Slash);
                        $this->Slash->Attributes->RestoreFromArray($items[$i]->_SlashAttributes);
                        $this->OfficeStatn->SetValue($items[$i]->OfficeStatn);
                        $this->OfficeStatn->Attributes->RestoreFromArray($items[$i]->_OfficeStatnAttributes);
                        $this->Branch->SetValue($items[$i]->Branch);
                        $this->Branch->Attributes->RestoreFromArray($items[$i]->_BranchAttributes);
                        $this->AbsenceWOPay->SetValue($items[$i]->AbsenceWOPay);
                        $this->AbsenceWOPay->Attributes->RestoreFromArray($items[$i]->_AbsenceWOPayAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->BirthMonth->SetValue($items[$i]->BirthMonth);
                        $this->BirthMonth->Attributes->RestoreFromArray($items[$i]->_BirthMonthAttributes);
                        $this->BirthDay->SetValue($items[$i]->BirthDay);
                        $this->BirthDay->Attributes->RestoreFromArray($items[$i]->_BirthDayAttributes);
                        $this->BirthYear->SetValue($items[$i]->BirthYear);
                        $this->BirthYear->Attributes->RestoreFromArray($items[$i]->_BirthYearAttributes);
                        $this->PlaceOfBirth->SetValue($items[$i]->PlaceOfBirth);
                        $this->PlaceOfBirth->Attributes->RestoreFromArray($items[$i]->_PlaceOfBirthAttributes);
                        $this->DateFrom->SetValue($items[$i]->DateFrom);
                        $this->DateFrom->Attributes->RestoreFromArray($items[$i]->_DateFromAttributes);
                        $this->Separation->SetValue($items[$i]->Separation);
                        $this->Separation->Attributes->RestoreFromArray($items[$i]->_SeparationAttributes);
                        $this->ServiceRecPurpose->SetValue($items[$i]->ServiceRecPurpose);
                        $this->ServiceRecPurpose->Attributes->RestoreFromArray($items[$i]->_ServiceRecPurposeAttributes);
                        $this->OfficeID->SetValue($items[$i]->OfficeID);
                        $this->OfficeID->Attributes->RestoreFromArray($items[$i]->_OfficeIDAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Surname->Show();
                        $this->DateTo->Show();
                        $this->Designation->Show();
                        $this->StatofAppt->Show();
                        $this->AnnualSalary->Show();
                        $this->Slash->Show();
                        $this->OfficeStatn->Show();
                        $this->Branch->Show();
                        $this->AbsenceWOPay->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->NameExtension->Show();
                        $this->BirthMonth->Show();
                        $this->BirthDay->Show();
                        $this->BirthYear->Show();
                        $this->PlaceOfBirth->Show();
                        $this->DateFrom->Show();
                        $this->Separation->Show();
                        $this->ServiceRecPurpose->Show();
                        $this->OfficeID->Show();
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

} //End employee_lut_servicerecpu Class @2-FCB6E20C

class clsemployee_lut_servicerecpuDataSource extends clsDBConnection1 {  //employee_lut_servicerecpuDataSource Class @2-1A56D39F

//DataSource Variables @2-D250EDB5
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Surname;
    var $DateTo;
    var $Designation;
    var $StatofAppt;
    var $AnnualSalary;
    var $Slash;
    var $OfficeStatn;
    var $Branch;
    var $AbsenceWOPay;
    var $FirstName;
    var $MiddleName;
    var $NameExtension;
    var $BirthMonth;
    var $BirthDay;
    var $BirthYear;
    var $PlaceOfBirth;
    var $DateFrom;
    var $Separation;
    var $ServiceRecPurpose;
    var $OfficeID;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-3F42A847
    function clsemployee_lut_servicerecpuDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_lut_servicerecpu";
        $this->Initialize();
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->Designation = new clsField("Designation", ccsText, "");
        
        $this->StatofAppt = new clsField("StatofAppt", ccsText, "");
        
        $this->AnnualSalary = new clsField("AnnualSalary", ccsSingle, "");
        
        $this->Slash = new clsField("Slash", ccsText, "");
        
        $this->OfficeStatn = new clsField("OfficeStatn", ccsText, "");
        
        $this->Branch = new clsField("Branch", ccsText, "");
        
        $this->AbsenceWOPay = new clsField("AbsenceWOPay", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->BirthMonth = new clsField("BirthMonth", ccsText, "");
        
        $this->BirthDay = new clsField("BirthDay", ccsText, "");
        
        $this->BirthYear = new clsField("BirthYear", ccsText, "");
        
        $this->PlaceOfBirth = new clsField("PlaceOfBirth", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->Separation = new clsField("Separation", ccsText, "");
        
        $this->ServiceRecPurpose = new clsField("ServiceRecPurpose", ccsText, "");
        
        $this->OfficeID = new clsField("OfficeID", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-F932CA11
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateFrom, DateTo, MonthlySalary";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-75337585
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("2", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("3", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->AddParameter("4", "urls_NameExtension", ccsText, "", "", $this->Parameters["urls_NameExtension"], "", false);
        $this->wp->AddParameter("5", "urls_OfficeID", ccsInteger, "", "", $this->Parameters["urls_OfficeID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "Surname", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "FirstName", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "MiddleName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "NameExtension", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "OfficeID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @2-CC28D2D5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Surname, FirstName, MiddleName, NameExtension, BirthMonth, BirthDay, BirthYear, PlaceOfBirth, employee.SecRecPurposeID AS employee_SecRecPurposeID,\n\n" .
        "lut_servicerecpurpose.*, employee_servicerecord.*, OfficeID \n\n" .
        "FROM (employee INNER JOIN lut_servicerecpurpose ON\n\n" .
        "employee.SecRecPurposeID = lut_servicerecpurpose.SecRecPurposeID) INNER JOIN employee_servicerecord ON\n\n" .
        "employee_servicerecord.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-4EA684B3
    function SetValues()
    {
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->Designation->SetDBValue($this->f("Designation"));
        $this->StatofAppt->SetDBValue($this->f("StatofAppt"));
        $this->AnnualSalary->SetDBValue(trim($this->f("AnnualSalary")));
        $this->Slash->SetDBValue($this->f("Slash"));
        $this->OfficeStatn->SetDBValue($this->f("OfficeStatn"));
        $this->Branch->SetDBValue($this->f("Branch"));
        $this->AbsenceWOPay->SetDBValue($this->f("AbsenceWOPay"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->BirthMonth->SetDBValue($this->f("BirthMonth"));
        $this->BirthDay->SetDBValue($this->f("BirthDay"));
        $this->BirthYear->SetDBValue($this->f("BirthYear"));
        $this->PlaceOfBirth->SetDBValue($this->f("PlaceOfBirth"));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->Separation->SetDBValue($this->f("Separation"));
        $this->ServiceRecPurpose->SetDBValue($this->f("ServiceRecPurpose"));
        $this->OfficeID->SetDBValue(trim($this->f("OfficeID")));
    }
//End SetValues Method

} //End employee_lut_servicerecpuDataSource Class @2-FCB6E20C



//Initialize Page @1-871897F6
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
$TemplateFileName = "SRreport_ms_backup3_2c.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-2BBDF0B6
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_lut_servicerecpu = & new clsReportemployee_lut_servicerecpu("", $MainPage);
$MainPage->employee_lut_servicerecpu = & $employee_lut_servicerecpu;
$employee_lut_servicerecpu->Initialize();

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

//Go to destination page @1-295C58D9
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_lut_servicerecpu);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-3730B25E
$employee_lut_servicerecpu->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-AE05B656
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_lut_servicerecpu);
unset($Tpl);
//End Unload Page


?>
