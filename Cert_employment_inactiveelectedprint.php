<?php
//Include Common Files @1-19A2B8C8
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Cert_employment_inactiveelectedprint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//departmentoffice_employee1 ReportGroup class @2-6411BA99
class clsReportGroupdepartmentoffice_employee1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleInitial, $_MiddleInitialAttributes;
    var $NameOfficeDept, $_NameOfficeDeptAttributes;
    var $employee_Position, $_employee_PositionAttributes;
    var $MonthlySalary, $_MonthlySalaryAttributes;
    var $SalaryWords, $_SalaryWordsAttributes;
    var $CertDay, $_CertDayAttributes;
    var $CertMonth, $_CertMonthAttributes;
    var $CertYear, $_CertYearAttributes;
    var $ServiceRecPurpose, $_ServiceRecPurposeAttributes;
    var $Hidden1, $_Hidden1Attributes;
    var $Hidden2, $_Hidden2Attributes;
    var $Hidden3, $_Hidden3Attributes;
    var $Hidden4, $_Hidden4Attributes;
    var $Hidden5, $_Hidden5Attributes;
    var $Hidden6, $_Hidden6Attributes;
    var $Hidden7, $_Hidden7Attributes;
    var $Hidden8, $_Hidden8Attributes;
    var $Hidden9, $_Hidden9Attributes;
    var $Hidden10, $_Hidden10Attributes;
    var $Hidden11, $_Hidden11Attributes;
    var $ImageLink2, $_ImageLink2Page, $_ImageLink2Parameters, $_ImageLink2Attributes;
    var $ImageLink3, $_ImageLink3Page, $_ImageLink3Parameters, $_ImageLink3Attributes;
    var $ImageLink4, $_ImageLink4Page, $_ImageLink4Parameters, $_ImageLink4Attributes;
    var $ImageLink1, $_ImageLink1Page, $_ImageLink1Parameters, $_ImageLink1Attributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupdepartmentoffice_employee1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleInitial = $this->Parent->MiddleInitial->Value;
        $this->NameOfficeDept = $this->Parent->NameOfficeDept->Value;
        $this->employee_Position = $this->Parent->employee_Position->Value;
        $this->MonthlySalary = $this->Parent->MonthlySalary->Value;
        $this->SalaryWords = $this->Parent->SalaryWords->Value;
        $this->CertDay = $this->Parent->CertDay->Value;
        $this->CertMonth = $this->Parent->CertMonth->Value;
        $this->CertYear = $this->Parent->CertYear->Value;
        $this->ServiceRecPurpose = $this->Parent->ServiceRecPurpose->Value;
        $this->Hidden1 = $this->Parent->Hidden1->Value;
        $this->Hidden2 = $this->Parent->Hidden2->Value;
        $this->Hidden3 = $this->Parent->Hidden3->Value;
        $this->Hidden4 = $this->Parent->Hidden4->Value;
        $this->Hidden5 = $this->Parent->Hidden5->Value;
        $this->Hidden6 = $this->Parent->Hidden6->Value;
        $this->Hidden7 = $this->Parent->Hidden7->Value;
        $this->Hidden8 = $this->Parent->Hidden8->Value;
        $this->Hidden9 = $this->Parent->Hidden9->Value;
        $this->Hidden10 = $this->Parent->Hidden10->Value;
        $this->Hidden11 = $this->Parent->Hidden11->Value;
        $this->ImageLink2 = $this->Parent->ImageLink2->Value;
        $this->ImageLink3 = $this->Parent->ImageLink3->Value;
        $this->ImageLink4 = $this->Parent->ImageLink4->Value;
        $this->ImageLink1 = $this->Parent->ImageLink1->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_ImageLink2Page = $this->Parent->ImageLink2->Page;
        $this->_ImageLink2Parameters = $this->Parent->ImageLink2->Parameters;
        $this->_ImageLink3Page = $this->Parent->ImageLink3->Page;
        $this->_ImageLink3Parameters = $this->Parent->ImageLink3->Parameters;
        $this->_ImageLink4Page = $this->Parent->ImageLink4->Page;
        $this->_ImageLink4Parameters = $this->Parent->ImageLink4->Parameters;
        $this->_ImageLink1Page = $this->Parent->ImageLink1->Page;
        $this->_ImageLink1Parameters = $this->Parent->ImageLink1->Parameters;
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleInitialAttributes = $this->Parent->MiddleInitial->Attributes->GetAsArray();
        $this->_NameOfficeDeptAttributes = $this->Parent->NameOfficeDept->Attributes->GetAsArray();
        $this->_employee_PositionAttributes = $this->Parent->employee_Position->Attributes->GetAsArray();
        $this->_MonthlySalaryAttributes = $this->Parent->MonthlySalary->Attributes->GetAsArray();
        $this->_SalaryWordsAttributes = $this->Parent->SalaryWords->Attributes->GetAsArray();
        $this->_CertDayAttributes = $this->Parent->CertDay->Attributes->GetAsArray();
        $this->_CertMonthAttributes = $this->Parent->CertMonth->Attributes->GetAsArray();
        $this->_CertYearAttributes = $this->Parent->CertYear->Attributes->GetAsArray();
        $this->_ServiceRecPurposeAttributes = $this->Parent->ServiceRecPurpose->Attributes->GetAsArray();
        $this->_Hidden1Attributes = $this->Parent->Hidden1->Attributes->GetAsArray();
        $this->_Hidden2Attributes = $this->Parent->Hidden2->Attributes->GetAsArray();
        $this->_Hidden3Attributes = $this->Parent->Hidden3->Attributes->GetAsArray();
        $this->_Hidden4Attributes = $this->Parent->Hidden4->Attributes->GetAsArray();
        $this->_Hidden5Attributes = $this->Parent->Hidden5->Attributes->GetAsArray();
        $this->_Hidden6Attributes = $this->Parent->Hidden6->Attributes->GetAsArray();
        $this->_Hidden7Attributes = $this->Parent->Hidden7->Attributes->GetAsArray();
        $this->_Hidden8Attributes = $this->Parent->Hidden8->Attributes->GetAsArray();
        $this->_Hidden9Attributes = $this->Parent->Hidden9->Attributes->GetAsArray();
        $this->_Hidden10Attributes = $this->Parent->Hidden10->Attributes->GetAsArray();
        $this->_Hidden11Attributes = $this->Parent->Hidden11->Attributes->GetAsArray();
        $this->_ImageLink2Attributes = $this->Parent->ImageLink2->Attributes->GetAsArray();
        $this->_ImageLink3Attributes = $this->Parent->ImageLink3->Attributes->GetAsArray();
        $this->_ImageLink4Attributes = $this->Parent->ImageLink4->Attributes->GetAsArray();
        $this->_ImageLink1Attributes = $this->Parent->ImageLink1->Attributes->GetAsArray();
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
        $this->NameOfficeDept = $Header->NameOfficeDept;
        $Header->_NameOfficeDeptAttributes = $this->_NameOfficeDeptAttributes;
        $this->Parent->NameOfficeDept->Value = $Header->NameOfficeDept;
        $this->Parent->NameOfficeDept->Attributes->RestoreFromArray($Header->_NameOfficeDeptAttributes);
        $this->employee_Position = $Header->employee_Position;
        $Header->_employee_PositionAttributes = $this->_employee_PositionAttributes;
        $this->Parent->employee_Position->Value = $Header->employee_Position;
        $this->Parent->employee_Position->Attributes->RestoreFromArray($Header->_employee_PositionAttributes);
        $this->MonthlySalary = $Header->MonthlySalary;
        $Header->_MonthlySalaryAttributes = $this->_MonthlySalaryAttributes;
        $this->Parent->MonthlySalary->Value = $Header->MonthlySalary;
        $this->Parent->MonthlySalary->Attributes->RestoreFromArray($Header->_MonthlySalaryAttributes);
        $this->SalaryWords = $Header->SalaryWords;
        $Header->_SalaryWordsAttributes = $this->_SalaryWordsAttributes;
        $this->Parent->SalaryWords->Value = $Header->SalaryWords;
        $this->Parent->SalaryWords->Attributes->RestoreFromArray($Header->_SalaryWordsAttributes);
        $this->CertDay = $Header->CertDay;
        $Header->_CertDayAttributes = $this->_CertDayAttributes;
        $this->Parent->CertDay->Value = $Header->CertDay;
        $this->Parent->CertDay->Attributes->RestoreFromArray($Header->_CertDayAttributes);
        $this->CertMonth = $Header->CertMonth;
        $Header->_CertMonthAttributes = $this->_CertMonthAttributes;
        $this->Parent->CertMonth->Value = $Header->CertMonth;
        $this->Parent->CertMonth->Attributes->RestoreFromArray($Header->_CertMonthAttributes);
        $this->CertYear = $Header->CertYear;
        $Header->_CertYearAttributes = $this->_CertYearAttributes;
        $this->Parent->CertYear->Value = $Header->CertYear;
        $this->Parent->CertYear->Attributes->RestoreFromArray($Header->_CertYearAttributes);
        $this->ServiceRecPurpose = $Header->ServiceRecPurpose;
        $Header->_ServiceRecPurposeAttributes = $this->_ServiceRecPurposeAttributes;
        $this->Parent->ServiceRecPurpose->Value = $Header->ServiceRecPurpose;
        $this->Parent->ServiceRecPurpose->Attributes->RestoreFromArray($Header->_ServiceRecPurposeAttributes);
        $this->Hidden1 = $Header->Hidden1;
        $Header->_Hidden1Attributes = $this->_Hidden1Attributes;
        $this->Parent->Hidden1->Value = $Header->Hidden1;
        $this->Parent->Hidden1->Attributes->RestoreFromArray($Header->_Hidden1Attributes);
        $this->Hidden2 = $Header->Hidden2;
        $Header->_Hidden2Attributes = $this->_Hidden2Attributes;
        $this->Parent->Hidden2->Value = $Header->Hidden2;
        $this->Parent->Hidden2->Attributes->RestoreFromArray($Header->_Hidden2Attributes);
        $this->Hidden3 = $Header->Hidden3;
        $Header->_Hidden3Attributes = $this->_Hidden3Attributes;
        $this->Parent->Hidden3->Value = $Header->Hidden3;
        $this->Parent->Hidden3->Attributes->RestoreFromArray($Header->_Hidden3Attributes);
        $this->Hidden4 = $Header->Hidden4;
        $Header->_Hidden4Attributes = $this->_Hidden4Attributes;
        $this->Parent->Hidden4->Value = $Header->Hidden4;
        $this->Parent->Hidden4->Attributes->RestoreFromArray($Header->_Hidden4Attributes);
        $this->Hidden5 = $Header->Hidden5;
        $Header->_Hidden5Attributes = $this->_Hidden5Attributes;
        $this->Parent->Hidden5->Value = $Header->Hidden5;
        $this->Parent->Hidden5->Attributes->RestoreFromArray($Header->_Hidden5Attributes);
        $this->Hidden6 = $Header->Hidden6;
        $Header->_Hidden6Attributes = $this->_Hidden6Attributes;
        $this->Parent->Hidden6->Value = $Header->Hidden6;
        $this->Parent->Hidden6->Attributes->RestoreFromArray($Header->_Hidden6Attributes);
        $this->Hidden7 = $Header->Hidden7;
        $Header->_Hidden7Attributes = $this->_Hidden7Attributes;
        $this->Parent->Hidden7->Value = $Header->Hidden7;
        $this->Parent->Hidden7->Attributes->RestoreFromArray($Header->_Hidden7Attributes);
        $this->Hidden8 = $Header->Hidden8;
        $Header->_Hidden8Attributes = $this->_Hidden8Attributes;
        $this->Parent->Hidden8->Value = $Header->Hidden8;
        $this->Parent->Hidden8->Attributes->RestoreFromArray($Header->_Hidden8Attributes);
        $this->Hidden9 = $Header->Hidden9;
        $Header->_Hidden9Attributes = $this->_Hidden9Attributes;
        $this->Parent->Hidden9->Value = $Header->Hidden9;
        $this->Parent->Hidden9->Attributes->RestoreFromArray($Header->_Hidden9Attributes);
        $this->Hidden10 = $Header->Hidden10;
        $Header->_Hidden10Attributes = $this->_Hidden10Attributes;
        $this->Parent->Hidden10->Value = $Header->Hidden10;
        $this->Parent->Hidden10->Attributes->RestoreFromArray($Header->_Hidden10Attributes);
        $this->Hidden11 = $Header->Hidden11;
        $Header->_Hidden11Attributes = $this->_Hidden11Attributes;
        $this->Parent->Hidden11->Value = $Header->Hidden11;
        $this->Parent->Hidden11->Attributes->RestoreFromArray($Header->_Hidden11Attributes);
        $this->ImageLink2 = $Header->ImageLink2;
        $this->_ImageLink2Page = $Header->_ImageLink2Page;
        $this->_ImageLink2Parameters = $Header->_ImageLink2Parameters;
        $Header->_ImageLink2Attributes = $this->_ImageLink2Attributes;
        $this->Parent->ImageLink2->Value = $Header->ImageLink2;
        $this->Parent->ImageLink2->Attributes->RestoreFromArray($Header->_ImageLink2Attributes);
        $this->ImageLink3 = $Header->ImageLink3;
        $this->_ImageLink3Page = $Header->_ImageLink3Page;
        $this->_ImageLink3Parameters = $Header->_ImageLink3Parameters;
        $Header->_ImageLink3Attributes = $this->_ImageLink3Attributes;
        $this->Parent->ImageLink3->Value = $Header->ImageLink3;
        $this->Parent->ImageLink3->Attributes->RestoreFromArray($Header->_ImageLink3Attributes);
        $this->ImageLink4 = $Header->ImageLink4;
        $this->_ImageLink4Page = $Header->_ImageLink4Page;
        $this->_ImageLink4Parameters = $Header->_ImageLink4Parameters;
        $Header->_ImageLink4Attributes = $this->_ImageLink4Attributes;
        $this->Parent->ImageLink4->Value = $Header->ImageLink4;
        $this->Parent->ImageLink4->Attributes->RestoreFromArray($Header->_ImageLink4Attributes);
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
//End departmentoffice_employee1 ReportGroup class

//departmentoffice_employee1 GroupsCollection class @2-9044A772
class clsGroupsCollectiondepartmentoffice_employee1 {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectiondepartmentoffice_employee1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdepartmentoffice_employee1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleInitial->Value = $this->Parent->MiddleInitial->initialValue;
        $this->Parent->NameOfficeDept->Value = $this->Parent->NameOfficeDept->initialValue;
        $this->Parent->employee_Position->Value = $this->Parent->employee_Position->initialValue;
        $this->Parent->MonthlySalary->Value = $this->Parent->MonthlySalary->initialValue;
        $this->Parent->SalaryWords->Value = $this->Parent->SalaryWords->initialValue;
        $this->Parent->CertDay->Value = $this->Parent->CertDay->initialValue;
        $this->Parent->CertMonth->Value = $this->Parent->CertMonth->initialValue;
        $this->Parent->CertYear->Value = $this->Parent->CertYear->initialValue;
        $this->Parent->ServiceRecPurpose->Value = $this->Parent->ServiceRecPurpose->initialValue;
        $this->Parent->Hidden1->Value = $this->Parent->Hidden1->initialValue;
        $this->Parent->Hidden2->Value = $this->Parent->Hidden2->initialValue;
        $this->Parent->Hidden3->Value = $this->Parent->Hidden3->initialValue;
        $this->Parent->Hidden4->Value = $this->Parent->Hidden4->initialValue;
        $this->Parent->Hidden5->Value = $this->Parent->Hidden5->initialValue;
        $this->Parent->Hidden6->Value = $this->Parent->Hidden6->initialValue;
        $this->Parent->Hidden7->Value = $this->Parent->Hidden7->initialValue;
        $this->Parent->Hidden8->Value = $this->Parent->Hidden8->initialValue;
        $this->Parent->Hidden9->Value = $this->Parent->Hidden9->initialValue;
        $this->Parent->Hidden10->Value = $this->Parent->Hidden10->initialValue;
        $this->Parent->Hidden11->Value = $this->Parent->Hidden11->initialValue;
        $this->Parent->ImageLink2->Value = $this->Parent->ImageLink2->initialValue;
        $this->Parent->ImageLink3->Value = $this->Parent->ImageLink3->initialValue;
        $this->Parent->ImageLink4->Value = $this->Parent->ImageLink4->initialValue;
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
//End departmentoffice_employee1 GroupsCollection class

class clsReportdepartmentoffice_employee1 { //departmentoffice_employee1 Class @2-AE91AF00

//departmentoffice_employee1 Variables @2-87F7EA53

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
//End departmentoffice_employee1 Variables

//Class_Initialize Event @2-B9783B15
    function clsReportdepartmentoffice_employee1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "departmentoffice_employee1";
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
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdepartmentoffice_employee1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Print");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 0;
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
        $this->NameOfficeDept = & new clsControl(ccsHidden, "NameOfficeDept", "NameOfficeDept", ccsText, "", CCGetRequestParam("NameOfficeDept", ccsGet, NULL), $this);
        $this->employee_Position = & new clsControl(ccsHidden, "employee_Position", "employee_Position", ccsText, "", CCGetRequestParam("employee_Position", ccsGet, NULL), $this);
        $this->MonthlySalary = & new clsControl(ccsHidden, "MonthlySalary", "MonthlySalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), CCGetRequestParam("MonthlySalary", ccsGet, NULL), $this);
        $this->SalaryWords = & new clsControl(ccsHidden, "SalaryWords", "SalaryWords", ccsText, "", CCGetRequestParam("SalaryWords", ccsGet, NULL), $this);
        $this->CertDay = & new clsControl(ccsHidden, "CertDay", "CertDay", ccsText, "", CCGetRequestParam("CertDay", ccsGet, NULL), $this);
        $this->CertMonth = & new clsControl(ccsHidden, "CertMonth", "CertMonth", ccsText, "", CCGetRequestParam("CertMonth", ccsGet, NULL), $this);
        $this->CertYear = & new clsControl(ccsHidden, "CertYear", "CertYear", ccsText, "", CCGetRequestParam("CertYear", ccsGet, NULL), $this);
        $this->ServiceRecPurpose = & new clsControl(ccsHidden, "ServiceRecPurpose", "ServiceRecPurpose", ccsText, "", CCGetRequestParam("ServiceRecPurpose", ccsGet, NULL), $this);
        $this->Hidden1 = & new clsControl(ccsHidden, "Hidden1", "Hidden1", ccsText, "", CCGetRequestParam("Hidden1", ccsGet, NULL), $this);
        $this->Hidden2 = & new clsControl(ccsHidden, "Hidden2", "Hidden2", ccsText, "", CCGetRequestParam("Hidden2", ccsGet, NULL), $this);
        $this->Hidden3 = & new clsControl(ccsHidden, "Hidden3", "Hidden3", ccsText, "", CCGetRequestParam("Hidden3", ccsGet, NULL), $this);
        $this->Hidden4 = & new clsControl(ccsHidden, "Hidden4", "Hidden4", ccsText, "", CCGetRequestParam("Hidden4", ccsGet, NULL), $this);
        $this->Hidden5 = & new clsControl(ccsHidden, "Hidden5", "Hidden5", ccsText, "", CCGetRequestParam("Hidden5", ccsGet, NULL), $this);
        $this->Hidden6 = & new clsControl(ccsHidden, "Hidden6", "Hidden6", ccsText, "", CCGetRequestParam("Hidden6", ccsGet, NULL), $this);
        $this->Hidden7 = & new clsControl(ccsHidden, "Hidden7", "Hidden7", ccsText, "", CCGetRequestParam("Hidden7", ccsGet, NULL), $this);
        $this->Hidden8 = & new clsControl(ccsHidden, "Hidden8", "Hidden8", ccsText, "", CCGetRequestParam("Hidden8", ccsGet, NULL), $this);
        $this->Hidden9 = & new clsControl(ccsHidden, "Hidden9", "Hidden9", ccsText, "", CCGetRequestParam("Hidden9", ccsGet, NULL), $this);
        $this->Hidden10 = & new clsControl(ccsHidden, "Hidden10", "Hidden10", ccsDate, array("mmmm", " ", "d", ", ", "yyyy"), CCGetRequestParam("Hidden10", ccsGet, NULL), $this);
        $this->Hidden11 = & new clsControl(ccsHidden, "Hidden11", "Hidden11", ccsText, "", CCGetRequestParam("Hidden11", ccsGet, NULL), $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->ImageLink2 = & new clsControl(ccsImageLink, "ImageLink2", "ImageLink2", ccsText, "", CCGetRequestParam("ImageLink2", ccsGet, NULL), $this);
        $this->ImageLink2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink2->Page = "";
        $this->ImageLink3 = & new clsControl(ccsImageLink, "ImageLink3", "ImageLink3", ccsText, "", CCGetRequestParam("ImageLink3", ccsGet, NULL), $this);
        $this->ImageLink3->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink3->Page = "";
        $this->ImageLink4 = & new clsControl(ccsImageLink, "ImageLink4", "ImageLink4", ccsText, "", CCGetRequestParam("ImageLink4", ccsGet, NULL), $this);
        $this->ImageLink4->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink4->Page = "";
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

//CheckErrors Method @2-4E78655A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleInitial->Errors->Count());
        $errors = ($errors || $this->NameOfficeDept->Errors->Count());
        $errors = ($errors || $this->employee_Position->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->SalaryWords->Errors->Count());
        $errors = ($errors || $this->CertDay->Errors->Count());
        $errors = ($errors || $this->CertMonth->Errors->Count());
        $errors = ($errors || $this->CertYear->Errors->Count());
        $errors = ($errors || $this->ServiceRecPurpose->Errors->Count());
        $errors = ($errors || $this->Hidden1->Errors->Count());
        $errors = ($errors || $this->Hidden2->Errors->Count());
        $errors = ($errors || $this->Hidden3->Errors->Count());
        $errors = ($errors || $this->Hidden4->Errors->Count());
        $errors = ($errors || $this->Hidden5->Errors->Count());
        $errors = ($errors || $this->Hidden6->Errors->Count());
        $errors = ($errors || $this->Hidden7->Errors->Count());
        $errors = ($errors || $this->Hidden8->Errors->Count());
        $errors = ($errors || $this->Hidden9->Errors->Count());
        $errors = ($errors || $this->Hidden10->Errors->Count());
        $errors = ($errors || $this->Hidden11->Errors->Count());
        $errors = ($errors || $this->ImageLink2->Errors->Count());
        $errors = ($errors || $this->ImageLink3->Errors->Count());
        $errors = ($errors || $this->ImageLink4->Errors->Count());
        $errors = ($errors || $this->ImageLink1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-EFD6871F
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleInitial->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameOfficeDept->Errors->ToString());
        $errors = ComposeStrings($errors, $this->employee_Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SalaryWords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServiceRecPurpose->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden6->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden7->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden8->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden9->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden10->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Hidden11->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-8BD03671
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleInitial"] = CCGetFromGet("s_MiddleInitial", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectiondepartmentoffice_employee1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleInitial->SetValue($this->DataSource->MiddleInitial->GetValue());
            $this->NameOfficeDept->SetValue($this->DataSource->NameOfficeDept->GetValue());
            $this->employee_Position->SetValue($this->DataSource->employee_Position->GetValue());
            $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
            $this->SalaryWords->SetValue($this->DataSource->SalaryWords->GetValue());
            $this->CertDay->SetValue($this->DataSource->CertDay->GetValue());
            $this->CertMonth->SetValue($this->DataSource->CertMonth->GetValue());
            $this->CertYear->SetValue($this->DataSource->CertYear->GetValue());
            $this->ServiceRecPurpose->SetValue($this->DataSource->ServiceRecPurpose->GetValue());
            $this->Hidden1->SetValue($this->DataSource->Hidden1->GetValue());
            $this->Hidden2->SetValue($this->DataSource->Hidden2->GetValue());
            $this->Hidden3->SetValue($this->DataSource->Hidden3->GetValue());
            $this->Hidden4->SetValue($this->DataSource->Hidden4->GetValue());
            $this->Hidden5->SetValue($this->DataSource->Hidden5->GetValue());
            $this->Hidden6->SetValue($this->DataSource->Hidden6->GetValue());
            $this->Hidden7->SetValue($this->DataSource->Hidden7->GetValue());
            $this->Hidden8->SetValue($this->DataSource->Hidden8->GetValue());
            $this->Hidden9->SetValue($this->DataSource->Hidden9->GetValue());
            $this->Hidden10->SetValue($this->DataSource->Hidden10->GetValue());
            $this->Hidden11->SetValue($this->DataSource->Hidden11->GetValue());
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
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleInitial"] = $this->MiddleInitial->Visible;
            $this->ControlsVisible["NameOfficeDept"] = $this->NameOfficeDept->Visible;
            $this->ControlsVisible["employee_Position"] = $this->employee_Position->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["SalaryWords"] = $this->SalaryWords->Visible;
            $this->ControlsVisible["CertDay"] = $this->CertDay->Visible;
            $this->ControlsVisible["CertMonth"] = $this->CertMonth->Visible;
            $this->ControlsVisible["CertYear"] = $this->CertYear->Visible;
            $this->ControlsVisible["ServiceRecPurpose"] = $this->ServiceRecPurpose->Visible;
            $this->ControlsVisible["Hidden1"] = $this->Hidden1->Visible;
            $this->ControlsVisible["Hidden2"] = $this->Hidden2->Visible;
            $this->ControlsVisible["Hidden3"] = $this->Hidden3->Visible;
            $this->ControlsVisible["Hidden4"] = $this->Hidden4->Visible;
            $this->ControlsVisible["Hidden5"] = $this->Hidden5->Visible;
            $this->ControlsVisible["Hidden6"] = $this->Hidden6->Visible;
            $this->ControlsVisible["Hidden7"] = $this->Hidden7->Visible;
            $this->ControlsVisible["Hidden8"] = $this->Hidden8->Visible;
            $this->ControlsVisible["Hidden9"] = $this->Hidden9->Visible;
            $this->ControlsVisible["Hidden10"] = $this->Hidden10->Visible;
            $this->ControlsVisible["Hidden11"] = $this->Hidden11->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleInitial->SetValue($items[$i]->MiddleInitial);
                        $this->MiddleInitial->Attributes->RestoreFromArray($items[$i]->_MiddleInitialAttributes);
                        $this->NameOfficeDept->SetValue($items[$i]->NameOfficeDept);
                        $this->NameOfficeDept->Attributes->RestoreFromArray($items[$i]->_NameOfficeDeptAttributes);
                        $this->employee_Position->SetValue($items[$i]->employee_Position);
                        $this->employee_Position->Attributes->RestoreFromArray($items[$i]->_employee_PositionAttributes);
                        $this->MonthlySalary->SetValue($items[$i]->MonthlySalary);
                        $this->MonthlySalary->Attributes->RestoreFromArray($items[$i]->_MonthlySalaryAttributes);
                        $this->SalaryWords->SetValue($items[$i]->SalaryWords);
                        $this->SalaryWords->Attributes->RestoreFromArray($items[$i]->_SalaryWordsAttributes);
                        $this->CertDay->SetValue($items[$i]->CertDay);
                        $this->CertDay->Attributes->RestoreFromArray($items[$i]->_CertDayAttributes);
                        $this->CertMonth->SetValue($items[$i]->CertMonth);
                        $this->CertMonth->Attributes->RestoreFromArray($items[$i]->_CertMonthAttributes);
                        $this->CertYear->SetValue($items[$i]->CertYear);
                        $this->CertYear->Attributes->RestoreFromArray($items[$i]->_CertYearAttributes);
                        $this->ServiceRecPurpose->SetValue($items[$i]->ServiceRecPurpose);
                        $this->ServiceRecPurpose->Attributes->RestoreFromArray($items[$i]->_ServiceRecPurposeAttributes);
                        $this->Hidden1->SetValue($items[$i]->Hidden1);
                        $this->Hidden1->Attributes->RestoreFromArray($items[$i]->_Hidden1Attributes);
                        $this->Hidden2->SetValue($items[$i]->Hidden2);
                        $this->Hidden2->Attributes->RestoreFromArray($items[$i]->_Hidden2Attributes);
                        $this->Hidden3->SetValue($items[$i]->Hidden3);
                        $this->Hidden3->Attributes->RestoreFromArray($items[$i]->_Hidden3Attributes);
                        $this->Hidden4->SetValue($items[$i]->Hidden4);
                        $this->Hidden4->Attributes->RestoreFromArray($items[$i]->_Hidden4Attributes);
                        $this->Hidden5->SetValue($items[$i]->Hidden5);
                        $this->Hidden5->Attributes->RestoreFromArray($items[$i]->_Hidden5Attributes);
                        $this->Hidden6->SetValue($items[$i]->Hidden6);
                        $this->Hidden6->Attributes->RestoreFromArray($items[$i]->_Hidden6Attributes);
                        $this->Hidden7->SetValue($items[$i]->Hidden7);
                        $this->Hidden7->Attributes->RestoreFromArray($items[$i]->_Hidden7Attributes);
                        $this->Hidden8->SetValue($items[$i]->Hidden8);
                        $this->Hidden8->Attributes->RestoreFromArray($items[$i]->_Hidden8Attributes);
                        $this->Hidden9->SetValue($items[$i]->Hidden9);
                        $this->Hidden9->Attributes->RestoreFromArray($items[$i]->_Hidden9Attributes);
                        $this->Hidden10->SetValue($items[$i]->Hidden10);
                        $this->Hidden10->Attributes->RestoreFromArray($items[$i]->_Hidden10Attributes);
                        $this->Hidden11->SetValue($items[$i]->Hidden11);
                        $this->Hidden11->Attributes->RestoreFromArray($items[$i]->_Hidden11Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleInitial->Show();
                        $this->NameOfficeDept->Show();
                        $this->employee_Position->Show();
                        $this->MonthlySalary->Show();
                        $this->SalaryWords->Show();
                        $this->CertDay->Show();
                        $this->CertMonth->Show();
                        $this->CertYear->Show();
                        $this->ServiceRecPurpose->Show();
                        $this->Hidden1->Show();
                        $this->Hidden2->Show();
                        $this->Hidden3->Show();
                        $this->Hidden4->Show();
                        $this->Hidden5->Show();
                        $this->Hidden6->Show();
                        $this->Hidden7->Show();
                        $this->Hidden8->Show();
                        $this->Hidden9->Show();
                        $this->Hidden10->Show();
                        $this->Hidden11->Show();
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
                            $this->ImageLink2->SetValue($items[$i]->ImageLink2);
                            $this->ImageLink2->Page = $items[$i]->_ImageLink2Page;
                            $this->ImageLink2->Parameters = $items[$i]->_ImageLink2Parameters;
                            $this->ImageLink2->Attributes->RestoreFromArray($items[$i]->_ImageLink2Attributes);
                            $this->ImageLink3->SetValue($items[$i]->ImageLink3);
                            $this->ImageLink3->Page = $items[$i]->_ImageLink3Page;
                            $this->ImageLink3->Parameters = $items[$i]->_ImageLink3Parameters;
                            $this->ImageLink3->Attributes->RestoreFromArray($items[$i]->_ImageLink3Attributes);
                            $this->ImageLink4->SetValue($items[$i]->ImageLink4);
                            $this->ImageLink4->Page = $items[$i]->_ImageLink4Page;
                            $this->ImageLink4->Parameters = $items[$i]->_ImageLink4Parameters;
                            $this->ImageLink4->Attributes->RestoreFromArray($items[$i]->_ImageLink4Attributes);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->ImageLink2->Show();
                                $this->ImageLink3->Show();
                                $this->ImageLink4->Show();
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

} //End departmentoffice_employee1 Class @2-FCB6E20C

class clsdepartmentoffice_employee1DataSource extends clsDBConnection1 {  //departmentoffice_employee1DataSource Class @2-95CBF60B

//DataSource Variables @2-D1873F09
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
    var $NameOfficeDept;
    var $employee_Position;
    var $MonthlySalary;
    var $SalaryWords;
    var $CertDay;
    var $CertMonth;
    var $CertYear;
    var $ServiceRecPurpose;
    var $Hidden1;
    var $Hidden2;
    var $Hidden3;
    var $Hidden4;
    var $Hidden5;
    var $Hidden6;
    var $Hidden7;
    var $Hidden8;
    var $Hidden9;
    var $Hidden10;
    var $Hidden11;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-E03D9D4E
    function clsdepartmentoffice_employee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report departmentoffice_employee1";
        $this->Initialize();
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleInitial = new clsField("MiddleInitial", ccsText, "");
        
        $this->NameOfficeDept = new clsField("NameOfficeDept", ccsText, "");
        
        $this->employee_Position = new clsField("employee_Position", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->SalaryWords = new clsField("SalaryWords", ccsText, "");
        
        $this->CertDay = new clsField("CertDay", ccsText, "");
        
        $this->CertMonth = new clsField("CertMonth", ccsText, "");
        
        $this->CertYear = new clsField("CertYear", ccsText, "");
        
        $this->ServiceRecPurpose = new clsField("ServiceRecPurpose", ccsText, "");
        
        $this->Hidden1 = new clsField("Hidden1", ccsText, "");
        
        $this->Hidden2 = new clsField("Hidden2", ccsText, "");
        
        $this->Hidden3 = new clsField("Hidden3", ccsText, "");
        
        $this->Hidden4 = new clsField("Hidden4", ccsText, "");
        
        $this->Hidden5 = new clsField("Hidden5", ccsText, "");
        
        $this->Hidden6 = new clsField("Hidden6", ccsText, "");
        
        $this->Hidden7 = new clsField("Hidden7", ccsText, "");
        
        $this->Hidden8 = new clsField("Hidden8", ccsText, "");
        
        $this->Hidden9 = new clsField("Hidden9", ccsText, "");
        
        $this->Hidden10 = new clsField("Hidden10", ccsDate, $this->DateFormat);
        
        $this->Hidden11 = new clsField("Hidden11", ccsText, "");
        

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

//Prepare Method @2-B193370B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->wp->AddParameter("2", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_MiddleInitial", ccsText, "", "", $this->Parameters["urls_MiddleInitial"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "MiddleInitial", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
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

//Open Method @2-D5ACFD19
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT ServiceRecPurpose, NameOfficeDept, Surname, FirstName, MiddleInitial, employee.Position AS employee_Position, MonthlySalary,\n\n" .
        "SalaryWords, CertDay, CertMonth, CertYear, Title, OrigApptMonth, OrigApptDay, OrigApptYear, LastServiceMonth, LastServiceDay,\n\n" .
        "LastService, NameExtension, ORNo, IssuedOn, IssuedAt \n\n" .
        "FROM (employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) INNER JOIN lut_servicerecpurpose ON\n\n" .
        "employee.SecRecPurposeID = lut_servicerecpurpose.SecRecPurposeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-2139BDE9
    function SetValues()
    {
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleInitial->SetDBValue($this->f("MiddleInitial"));
        $this->NameOfficeDept->SetDBValue($this->f("NameOfficeDept"));
        $this->employee_Position->SetDBValue($this->f("employee_Position"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->SalaryWords->SetDBValue($this->f("SalaryWords"));
        $this->CertDay->SetDBValue($this->f("CertDay"));
        $this->CertMonth->SetDBValue($this->f("CertMonth"));
        $this->CertYear->SetDBValue($this->f("CertYear"));
        $this->ServiceRecPurpose->SetDBValue($this->f("ServiceRecPurpose"));
        $this->Hidden1->SetDBValue($this->f("Title"));
        $this->Hidden2->SetDBValue($this->f("OrigApptMonth"));
        $this->Hidden3->SetDBValue($this->f("OrigApptDay"));
        $this->Hidden4->SetDBValue($this->f("OrigApptYear"));
        $this->Hidden5->SetDBValue($this->f("LastServiceMonth"));
        $this->Hidden6->SetDBValue($this->f("LastServiceDay"));
        $this->Hidden7->SetDBValue($this->f("LastService"));
        $this->Hidden8->SetDBValue($this->f("NameExtension"));
        $this->Hidden9->SetDBValue($this->f("ORNo"));
        $this->Hidden10->SetDBValue(trim($this->f("IssuedOn")));
        $this->Hidden11->SetDBValue($this->f("IssuedAt"));
    }
//End SetValues Method

} //End departmentoffice_employee1DataSource Class @2-FCB6E20C



//Initialize Page @1-25FBD393
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
$TemplateFileName = "Cert_employment_inactiveelectedprint.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-66C6D4FD
include_once("./Cert_employment_inactiveelectedprint_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-C9411D52
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$departmentoffice_employee1 = & new clsReportdepartmentoffice_employee1("", $MainPage);
$MainPage->departmentoffice_employee1 = & $departmentoffice_employee1;
$departmentoffice_employee1->Initialize();

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

//Go to destination page @1-701BFE0C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($departmentoffice_employee1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B0B6BCA9
$departmentoffice_employee1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EC936C9D
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($departmentoffice_employee1);
unset($Tpl);
//End Unload Page


?>
