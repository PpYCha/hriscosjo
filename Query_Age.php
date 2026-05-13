<?php
//Include Common Files @1-21EE0D15
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Query_Age.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//departmentoffice_employee1 ReportGroup class @2-F80F5B2B
class clsReportGroupdepartmentoffice_employee1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $OfficeAcronym, $_OfficeAcronymAttributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $BirthDate, $_BirthDateAttributes;
    var $Count_Surname, $_Count_SurnameAttributes;
    var $TotalCount_Surname, $_TotalCount_SurnameAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;
    var $OfficeAcronymTotalIndex;

    function clsReportGroupdepartmentoffice_employee1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->OfficeAcronym = $this->Parent->OfficeAcronym->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->BirthDate = $this->Parent->BirthDate->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->Count_Surname = $this->Parent->Count_Surname->GetTotalValue($mode);
        $this->TotalCount_Surname = $this->Parent->TotalCount_Surname->GetTotalValue($mode);
        $this->_Sorter_SurnameAttributes = $this->Parent->Sorter_Surname->Attributes->GetAsArray();
        $this->_Sorter_FirstNameAttributes = $this->Parent->Sorter_FirstName->Attributes->GetAsArray();
        $this->_Sorter_MiddleNameAttributes = $this->Parent->Sorter_MiddleName->Attributes->GetAsArray();
        $this->_Sorter_BirthDateAttributes = $this->Parent->Sorter_BirthDate->Attributes->GetAsArray();
        $this->_OfficeAcronymAttributes = $this->Parent->OfficeAcronym->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_BirthDateAttributes = $this->Parent->BirthDate->Attributes->GetAsArray();
        $this->_Count_SurnameAttributes = $this->Parent->Count_Surname->Attributes->GetAsArray();
        $this->_TotalCount_SurnameAttributes = $this->Parent->TotalCount_Surname->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $Header->Count_Surname = $this->Count_Surname;
        $Header->_Count_SurnameAttributes = $this->_Count_SurnameAttributes;
        $Header->TotalCount_Surname = $this->TotalCount_Surname;
        $Header->_TotalCount_SurnameAttributes = $this->_TotalCount_SurnameAttributes;
        $this->OfficeAcronym = $Header->OfficeAcronym;
        $Header->_OfficeAcronymAttributes = $this->_OfficeAcronymAttributes;
        $this->Parent->OfficeAcronym->Value = $Header->OfficeAcronym;
        $this->Parent->OfficeAcronym->Attributes->RestoreFromArray($Header->_OfficeAcronymAttributes);
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->MiddleName = $Header->MiddleName;
        $Header->_MiddleNameAttributes = $this->_MiddleNameAttributes;
        $this->Parent->MiddleName->Value = $Header->MiddleName;
        $this->Parent->MiddleName->Attributes->RestoreFromArray($Header->_MiddleNameAttributes);
        $this->BirthDate = $Header->BirthDate;
        $Header->_BirthDateAttributes = $this->_BirthDateAttributes;
        $this->Parent->BirthDate->Value = $Header->BirthDate;
        $this->Parent->BirthDate->Attributes->RestoreFromArray($Header->_BirthDateAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
        $this->Count_Surname = $this->Parent->Count_Surname->GetValue();
        $this->TotalCount_Surname = $this->Parent->TotalCount_Surname->GetValue();
    }
}
//End departmentoffice_employee1 ReportGroup class

//departmentoffice_employee1 GroupsCollection class @2-4BF9A4FC
class clsGroupsCollectiondepartmentoffice_employee1 {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $mOfficeAcronymCurrentHeaderIndex;
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
        $this->mOfficeAcronymCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdepartmentoffice_employee1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->OfficeAcronymTotalIndex = $this->mOfficeAcronymCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->OfficeAcronym->Value = $this->Parent->OfficeAcronym->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->BirthDate->Value = $this->Parent->BirthDate->initialValue;
        $this->Parent->Count_Surname->Value = $this->Parent->Count_Surname->initialValue;
        $this->Parent->TotalCount_Surname->Value = $this->Parent->TotalCount_Surname->initialValue;
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
        if ($groupName == "OfficeAcronym") {
            $GroupOfficeAcronym = & $this->InitGroup(true);
            $this->Parent->OfficeAcronym_Header->CCSEventResult = CCGetEvent($this->Parent->OfficeAcronym_Header->CCSEvents, "OnInitialize", $this->Parent->OfficeAcronym_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->OfficeAcronym_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->OfficeAcronym_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->OfficeAcronym_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->OfficeAcronym_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->OfficeAcronym_Header->Height;
                $GroupOfficeAcronym->SetTotalControls("GetNextValue");
            $this->Parent->OfficeAcronym_Header->CCSEventResult = CCGetEvent($this->Parent->OfficeAcronym_Header->CCSEvents, "OnCalculate", $this->Parent->OfficeAcronym_Header);
            $GroupOfficeAcronym->SetControls();
            $GroupOfficeAcronym->Mode = 1;
            $GroupOfficeAcronym->GroupType = "OfficeAcronym";
            $this->mOfficeAcronymCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupOfficeAcronym;
            $this->Parent->Count_Surname->Reset();
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
        $GroupOfficeAcronym = & $this->InitGroup(true);
        $this->Parent->OfficeAcronym_Footer->CCSEventResult = CCGetEvent($this->Parent->OfficeAcronym_Footer->CCSEvents, "OnInitialize", $this->Parent->OfficeAcronym_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->OfficeAcronym_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->OfficeAcronym_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->OfficeAcronym_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupOfficeAcronym->SetTotalControls("GetPrevValue");
        $GroupOfficeAcronym->SyncWithHeader($this->Groups[$this->mOfficeAcronymCurrentHeaderIndex]);
        if ($this->Parent->OfficeAcronym_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->OfficeAcronym_Footer->Height;
        $this->Parent->OfficeAcronym_Footer->CCSEventResult = CCGetEvent($this->Parent->OfficeAcronym_Footer->CCSEvents, "OnCalculate", $this->Parent->OfficeAcronym_Footer);
        $GroupOfficeAcronym->SetControls();
        $this->Parent->Count_Surname->Reset();
        $this->RestoreValues();
        $GroupOfficeAcronym->Mode = 2;
        $GroupOfficeAcronym->GroupType ="OfficeAcronym";
        $this->Groups[] = & $GroupOfficeAcronym;
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

//departmentoffice_employee1 Variables @2-2C2575E2

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
    var $OfficeAcronym_HeaderBlock, $OfficeAcronym_Header;
    var $OfficeAcronym_FooterBlock, $OfficeAcronym_Footer;
    var $SorterName, $SorterDirection;

    var $ds;
    var $DataSource;
    var $UseClientPaging = false;

    //Report Controls
    var $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    var $Page_FooterControls, $Page_HeaderControls;
    var $OfficeAcronym_HeaderControls, $OfficeAcronym_FooterControls;
    var $Sorter_Surname;
    var $Sorter_FirstName;
    var $Sorter_MiddleName;
    var $Sorter_BirthDate;
//End departmentoffice_employee1 Variables

//Class_Initialize Event @2-A3CF1EAA
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
        $this->Report_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 2;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->OfficeAcronym_Footer = new clsSection($this);
        $this->OfficeAcronym_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->OfficeAcronym_Footer->Height);
        $this->OfficeAcronym_Header = new clsSection($this);
        $this->OfficeAcronym_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->OfficeAcronym_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdepartmentoffice_employee1DataSource($this);
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
        $this->SorterName = CCGetParam("departmentoffice_employee1Order", "");
        $this->SorterDirection = CCGetParam("departmentoffice_employee1Dir", "");

        $this->Sorter_Surname = & new clsSorter($this->ComponentName, "Sorter_Surname", $FileName, $this);
        $this->Sorter_FirstName = & new clsSorter($this->ComponentName, "Sorter_FirstName", $FileName, $this);
        $this->Sorter_MiddleName = & new clsSorter($this->ComponentName, "Sorter_MiddleName", $FileName, $this);
        $this->Sorter_BirthDate = & new clsSorter($this->ComponentName, "Sorter_BirthDate", $FileName, $this);
        $this->OfficeAcronym = & new clsControl(ccsReportLabel, "OfficeAcronym", "OfficeAcronym", ccsText, "", "", $this);
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->BirthDate = & new clsControl(ccsReportLabel, "BirthDate", "BirthDate", ccsDate, array("mm", "/", "dd", "/", "yyyy"), "", $this);
        $this->Count_Surname = & new clsControl(ccsReportLabel, "Count_Surname", "Count_Surname", ccsInteger, "", 0, $this);
        $this->Count_Surname->TotalFunction = "Count";
        $this->Count_Surname->IsEmptySource = true;
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->TotalCount_Surname = & new clsControl(ccsReportLabel, "TotalCount_Surname", "TotalCount_Surname", ccsInteger, "", 0, $this);
        $this->TotalCount_Surname->TotalFunction = "Count";
        $this->TotalCount_Surname->IsEmptySource = true;
        $this->PageBreak = & new clsPanel("PageBreak", $this);
        $this->Report_CurrentDate = & new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
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

//CheckErrors Method @2-164F8EC4
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->BirthDate->Errors->Count());
        $errors = ($errors || $this->Count_Surname->Errors->Count());
        $errors = ($errors || $this->TotalCount_Surname->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-9D52C22B
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Count_Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-45D0BED9
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_departmentoffice_OfficeID"] = CCGetFromGet("s_departmentoffice_OfficeID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $OfficeAcronymKey = "";
        $Groups = new clsGroupsCollectiondepartmentoffice_employee1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->OfficeAcronym->SetValue($this->DataSource->OfficeAcronym->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->BirthDate->SetValue($this->DataSource->BirthDate->GetValue());
            $this->Report_Row_Number->SetValue(1);
            $this->Count_Surname->SetValue(1);
            $this->TotalCount_Surname->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $OfficeAcronymKey != $this->DataSource->f("OfficeAcronym")) {
                $Groups->OpenGroup("OfficeAcronym");
            }
            $Groups->AddItem();
            $OfficeAcronymKey = $this->DataSource->f("OfficeAcronym");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $OfficeAcronymKey != $this->DataSource->f("OfficeAcronym")) {
                $Groups->CloseGroup("OfficeAcronym");
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
            $this->ControlsVisible["OfficeAcronym"] = $this->OfficeAcronym->Visible;
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["BirthDate"] = $this->BirthDate->Visible;
            $this->ControlsVisible["Count_Surname"] = $this->Count_Surname->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->BirthDate->SetValue($items[$i]->BirthDate);
                        $this->BirthDate->Attributes->RestoreFromArray($items[$i]->_BirthDateAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->BirthDate->Show();
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
                            $this->TotalCount_Surname->SetValue($items[$i]->TotalCount_Surname);
                            $this->TotalCount_Surname->Attributes->RestoreFromArray($items[$i]->_TotalCount_SurnameAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_Surname->Show();
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
                                $this->Sorter_Surname->Show();
                                $this->Sorter_FirstName->Show();
                                $this->Sorter_MiddleName->Show();
                                $this->Sorter_BirthDate->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->PageBreak->Visible = (($i < count($items) - 1) && ($this->ViewMode == "Print"));
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
                                $this->Report_CurrentDate->Show();
                                $this->Navigator->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "OfficeAcronym":
                        if ($items[$i]->Mode == 1) {
                            $this->OfficeAcronym->SetValue($items[$i]->OfficeAcronym);
                            $this->OfficeAcronym->Attributes->RestoreFromArray($items[$i]->_OfficeAcronymAttributes);
                            $this->OfficeAcronym_Header->CCSEventResult = CCGetEvent($this->OfficeAcronym_Header->CCSEvents, "BeforeShow", $this->OfficeAcronym_Header);
                            if ($this->OfficeAcronym_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section OfficeAcronym_Header";
                                $this->Attributes->Show();
                                $this->OfficeAcronym->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section OfficeAcronym_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Count_Surname->SetValue($items[$i]->Count_Surname);
                            $this->Count_Surname->Attributes->RestoreFromArray($items[$i]->_Count_SurnameAttributes);
                            $this->OfficeAcronym_Footer->CCSEventResult = CCGetEvent($this->OfficeAcronym_Footer->CCSEvents, "BeforeShow", $this->OfficeAcronym_Footer);
                            if ($this->OfficeAcronym_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section OfficeAcronym_Footer";
                                $this->Count_Surname->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section OfficeAcronym_Footer", true, "Section Detail");
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

//DataSource Variables @2-AD510A35
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $OfficeAcronym;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $BirthDate;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-B477B8B7
    function clsdepartmentoffice_employee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report departmentoffice_employee1";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->BirthDate = new clsField("BirthDate", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-0340C451
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Surname";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Surname" => array("Surname", ""), 
            "Sorter_FirstName" => array("FirstName", ""), 
            "Sorter_MiddleName" => array("MiddleName", ""), 
            "Sorter_BirthDate" => array("BirthDate", "")));
    }
//End SetOrder Method

//Prepare Method @2-A98F9280
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_departmentoffice_OfficeID", ccsInteger, "", "", $this->Parameters["urls_departmentoffice_OfficeID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "departmentoffice.OfficeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-5EC6BBE8
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT OfficeAcronym, Surname, FirstName, MiddleName, BirthDate, departmentoffice.OfficeID AS departmentoffice_OfficeID \n\n" .
        "FROM employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "departmentoffice.OfficeAcronym asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-14E60C0E
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->BirthDate->SetDBValue(trim($this->f("BirthDate")));
    }
//End SetValues Method

} //End departmentoffice_employee1DataSource Class @2-FCB6E20C

class clsRecorddepartmentoffice_employee { //departmentoffice_employee Class @13-B39F2074

//Variables @13-D6FF3E86

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

//Class_Initialize Event @13-50FB471E
    function clsRecorddepartmentoffice_employee($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record departmentoffice_employee/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "departmentoffice_employee";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = & new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_departmentoffice_OfficeID", "ccsForm"));
            $this->ClearParameters->Page = "Query_Age.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_departmentoffice_OfficeID = & new clsControl(ccsListBox, "s_departmentoffice_OfficeID", "s_departmentoffice_OfficeID", ccsInteger, "", CCGetRequestParam("s_departmentoffice_OfficeID", $Method, NULL), $this);
            $this->s_departmentoffice_OfficeID->DSType = dsTable;
            $this->s_departmentoffice_OfficeID->DataSource = new clsDBConnection1();
            $this->s_departmentoffice_OfficeID->ds = & $this->s_departmentoffice_OfficeID->DataSource;
            $this->s_departmentoffice_OfficeID->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            list($this->s_departmentoffice_OfficeID->BoundColumn, $this->s_departmentoffice_OfficeID->TextColumn, $this->s_departmentoffice_OfficeID->DBFormat) = array("OfficeID", "OfficeAcronym", "");
        }
    }
//End Class_Initialize Event

//Validate Method @13-5FE41226
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_departmentoffice_OfficeID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_departmentoffice_OfficeID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @13-FDF00FEB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_departmentoffice_OfficeID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @13-ED598703
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

//Operation Method @13-01A9BD18
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
        $Redirect = "Query_Age.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "Query_Age.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @13-E8CBD7EC
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

        $this->s_departmentoffice_OfficeID->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_departmentoffice_OfficeID->Errors->ToString());
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
        $this->s_departmentoffice_OfficeID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End departmentoffice_employee Class @13-FCB6E20C

//Initialize Page @1-AF654F8F
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
$TemplateFileName = "Query_Age.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-CA18FF61
include_once("./Query_Age_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-37AB7142
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$departmentoffice_employee1 = & new clsReportdepartmentoffice_employee1("", $MainPage);
$departmentoffice_employee = & new clsRecorddepartmentoffice_employee("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "Query_Age.php";
$MainPage->departmentoffice_employee1 = & $departmentoffice_employee1;
$MainPage->departmentoffice_employee = & $departmentoffice_employee;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
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

//Execute Components @1-C7600C30
$departmentoffice_employee->Operation();
//End Execute Components

//Go to destination page @1-F52E8E2C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($departmentoffice_employee1);
    unset($departmentoffice_employee);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-FFB89A28
$departmentoffice_employee1->Show();
$departmentoffice_employee->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-01E2E0AA
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($departmentoffice_employee1);
unset($departmentoffice_employee);
unset($Tpl);
//End Unload Page


?>
