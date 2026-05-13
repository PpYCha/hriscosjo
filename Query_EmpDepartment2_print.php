<?php
//Include Common Files @1-1EF34819
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Query_EmpDepartment2_print.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//departmentoffice_employee1 ReportGroup class @2-4A95A992
class clsReportGroupdepartmentoffice_employee1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $OfficeAcronym, $_OfficeAcronymAttributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $employee_Position, $_employee_PositionAttributes;
    var $StatApp, $_StatAppAttributes;
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
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->employee_Position = $this->Parent->employee_Position->Value;
        $this->StatApp = $this->Parent->StatApp->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_OfficeAcronymAttributes = $this->Parent->OfficeAcronym->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_employee_PositionAttributes = $this->Parent->employee_Position->Attributes->GetAsArray();
        $this->_StatAppAttributes = $this->Parent->StatApp->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
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
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
        $this->employee_Position = $Header->employee_Position;
        $Header->_employee_PositionAttributes = $this->_employee_PositionAttributes;
        $this->Parent->employee_Position->Value = $Header->employee_Position;
        $this->Parent->employee_Position->Attributes->RestoreFromArray($Header->_employee_PositionAttributes);
        $this->StatApp = $Header->StatApp;
        $Header->_StatAppAttributes = $this->_StatAppAttributes;
        $this->Parent->StatApp->Value = $Header->StatApp;
        $this->Parent->StatApp->Attributes->RestoreFromArray($Header->_StatAppAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End departmentoffice_employee1 ReportGroup class

//departmentoffice_employee1 GroupsCollection class @2-AA4B77D4
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
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->OfficeAcronym->Value = $this->Parent->OfficeAcronym->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->employee_Position->Value = $this->Parent->employee_Position->initialValue;
        $this->Parent->StatApp->Value = $this->Parent->StatApp->initialValue;
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

//departmentoffice_employee1 Variables @2-829FF33D

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
//End departmentoffice_employee1 Variables

//Class_Initialize Event @2-076F9D81
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
        $this->Page_Footer->Height = 2;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->OfficeAcronym_Footer = new clsSection($this);
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
                $this->PageSize = 500;
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

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->OfficeAcronym = & new clsControl(ccsReportLabel, "OfficeAcronym", "OfficeAcronym", ccsText, "", "", $this);
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->NameExtension = & new clsControl(ccsReportLabel, "NameExtension", "NameExtension", ccsText, "", "", $this);
        $this->employee_Position = & new clsControl(ccsReportLabel, "employee_Position", "employee_Position", ccsText, "", "", $this);
        $this->StatApp = & new clsControl(ccsReportLabel, "StatApp", "StatApp", ccsText, "", "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->PageBreak = & new clsPanel("PageBreak", $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
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

//CheckErrors Method @2-1946FF1B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->employee_Position->Errors->Count());
        $errors = ($errors || $this->StatApp->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-7D811666
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->employee_Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatApp->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-E69637C4
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_employee_OfficeID"] = CCGetFromGet("s_employee_OfficeID", NULL);
        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleName"] = CCGetFromGet("s_MiddleName", NULL);
        $this->DataSource->Parameters["urls_employee_Position"] = CCGetFromGet("s_employee_Position", NULL);
        $this->DataSource->Parameters["urlCheckBoxList1"] = CCGetFromGet("CheckBoxList1", NULL);
        $this->DataSource->Parameters["urlListBox1"] = CCGetFromGet("ListBox1", NULL);

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
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->employee_Position->SetValue($this->DataSource->employee_Position->GetValue());
            $this->StatApp->SetValue($this->DataSource->StatApp->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
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
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["employee_Position"] = $this->employee_Position->Visible;
            $this->ControlsVisible["StatApp"] = $this->StatApp->Visible;
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
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->employee_Position->SetValue($items[$i]->employee_Position);
                        $this->employee_Position->Attributes->RestoreFromArray($items[$i]->_employee_PositionAttributes);
                        $this->StatApp->SetValue($items[$i]->StatApp);
                        $this->StatApp->Attributes->RestoreFromArray($items[$i]->_StatAppAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->NameExtension->Show();
                        $this->employee_Position->Show();
                        $this->StatApp->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetText(CCFormatNumber($items[$i]->Report_TotalRecords, array(False, 0, Null, Null, False, "", "", 1, True, "")), ccsFloat);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
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
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
                                $this->Navigator->Show();
                                $this->Report_CurrentDate->Show();
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
                            $this->OfficeAcronym_Footer->CCSEventResult = CCGetEvent($this->OfficeAcronym_Footer->CCSEvents, "BeforeShow", $this->OfficeAcronym_Footer);
                            if ($this->OfficeAcronym_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section OfficeAcronym_Footer";
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

//DataSource Variables @2-F650C7CA
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
    var $NameExtension;
    var $employee_Position;
    var $StatApp;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-53119EE8
    function clsdepartmentoffice_employee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report departmentoffice_employee1";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->employee_Position = new clsField("employee_Position", ccsText, "");
        
        $this->StatApp = new clsField("StatApp", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-8B104861
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "employee.Surname";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-75311826
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_employee_OfficeID", ccsInteger, "", "", $this->Parameters["urls_employee_OfficeID"], "", false);
        $this->wp->AddParameter("2", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->AddParameter("5", "urls_employee_Position", ccsText, "", "", $this->Parameters["urls_employee_Position"], "", false);
        $this->wp->AddParameter("6", "urlCheckBoxList1", ccsText, "", "", $this->Parameters["urlCheckBoxList1"], "", false);
        $this->wp->AddParameter("7", "urlListBox1", ccsInteger, "", "", $this->Parameters["urlListBox1"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.OfficeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "employee.Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "employee.FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "employee.MiddleName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "employee.Position", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opIn, "lut_statofappt2.StatApp", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText, true),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opEqual, "employee.Sex", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]);
    }
//End Prepare Method

//Open Method @2-2491221A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT StatApp, OfficeAcronym, lut_sex.*, Surname, FirstName, MiddleName, MiddleInitial, NameExtension, employee.Position AS employee_Position \n\n" .
        "FROM ((employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) INNER JOIN lut_statofappt2 ON\n\n" .
        "employee.StatAppID = lut_statofappt2.StatAppID) LEFT JOIN lut_sex ON\n\n" .
        "employee.Sex = lut_sex.SexID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "departmentoffice.OfficeAcronym asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-7175BCBF
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->employee_Position->SetDBValue($this->f("employee_Position"));
        $this->StatApp->SetDBValue($this->f("StatApp"));
    }
//End SetValues Method

} //End departmentoffice_employee1DataSource Class @2-FCB6E20C

class clsRecorddepartmentoffice_employee { //departmentoffice_employee Class @24-B39F2074

//Variables @24-D6FF3E86

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

//Class_Initialize Event @24-B47E2F2C
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
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_employee_OfficeID", "s_Surname", "s_FirstName", "s_MiddleName", "s_employee_Position", "s_ItemNo", "s_SalaryGrade", "s_StepIncrement", "s_employee_StatAppID", "ccsForm"));
            $this->ClearParameters->Page = "Query_EmpDepartment2_print.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_employee_OfficeID = & new clsControl(ccsListBox, "s_employee_OfficeID", "s_employee_OfficeID", ccsInteger, "", CCGetRequestParam("s_employee_OfficeID", $Method, NULL), $this);
            $this->s_employee_OfficeID->DSType = dsTable;
            $this->s_employee_OfficeID->DataSource = new clsDBConnection1();
            $this->s_employee_OfficeID->ds = & $this->s_employee_OfficeID->DataSource;
            $this->s_employee_OfficeID->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            list($this->s_employee_OfficeID->BoundColumn, $this->s_employee_OfficeID->TextColumn, $this->s_employee_OfficeID->DBFormat) = array("OfficeID", "OfficeAcronym", "");
            $this->s_Surname = & new clsControl(ccsTextBox, "s_Surname", "s_Surname", ccsText, "", CCGetRequestParam("s_Surname", $Method, NULL), $this);
            $this->s_FirstName = & new clsControl(ccsTextBox, "s_FirstName", "s_FirstName", ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_MiddleName = & new clsControl(ccsTextBox, "s_MiddleName", "s_MiddleName", ccsText, "", CCGetRequestParam("s_MiddleName", $Method, NULL), $this);
            $this->s_employee_Position = & new clsControl(ccsTextBox, "s_employee_Position", "s_employee_Position", ccsText, "", CCGetRequestParam("s_employee_Position", $Method, NULL), $this);
            $this->CheckBoxList1 = & new clsControl(ccsCheckBoxList, "CheckBoxList1", "CheckBoxList1", ccsText, "", CCGetRequestParam("CheckBoxList1", $Method, NULL), $this);
            $this->CheckBoxList1->Multiple = true;
            $this->CheckBoxList1->DSType = dsTable;
            $this->CheckBoxList1->DataSource = new clsDBConnection1();
            $this->CheckBoxList1->ds = & $this->CheckBoxList1->DataSource;
            $this->CheckBoxList1->DataSource->SQL = "SELECT * \n" .
"FROM lut_statofappt2 {SQL_Where} {SQL_OrderBy}";
            list($this->CheckBoxList1->BoundColumn, $this->CheckBoxList1->TextColumn, $this->CheckBoxList1->DBFormat) = array("StatApp", "StatApp", "");
            $this->CheckBoxList1->HTML = true;
            $this->ListBox1 = & new clsControl(ccsListBox, "ListBox1", "ListBox1", ccsInteger, "", CCGetRequestParam("ListBox1", $Method, NULL), $this);
            $this->ListBox1->DSType = dsTable;
            $this->ListBox1->DataSource = new clsDBConnection1();
            $this->ListBox1->ds = & $this->ListBox1->DataSource;
            $this->ListBox1->DataSource->SQL = "SELECT * \n" .
"FROM lut_sex {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox1->BoundColumn, $this->ListBox1->TextColumn, $this->ListBox1->DBFormat) = array("SexID", "Sex", "");
        }
    }
//End Class_Initialize Event

//Validate Method @24-179C4073
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_employee_OfficeID->Validate() && $Validation);
        $Validation = ($this->s_Surname->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_MiddleName->Validate() && $Validation);
        $Validation = ($this->s_employee_Position->Validate() && $Validation);
        $Validation = ($this->CheckBoxList1->Validate() && $Validation);
        $Validation = ($this->ListBox1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_employee_OfficeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_employee_Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CheckBoxList1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @24-AF040580
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_employee_OfficeID->Errors->Count());
        $errors = ($errors || $this->s_Surname->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_MiddleName->Errors->Count());
        $errors = ($errors || $this->s_employee_Position->Errors->Count());
        $errors = ($errors || $this->CheckBoxList1->Errors->Count());
        $errors = ($errors || $this->ListBox1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @24-ED598703
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

//Operation Method @24-DD94EE4C
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
        $Redirect = $FileName;
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = $FileName . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @24-41D9E50D
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

        $this->s_employee_OfficeID->Prepare();
        $this->CheckBoxList1->Prepare();
        $this->ListBox1->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_employee_OfficeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Surname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_employee_Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CheckBoxList1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox1->Errors->ToString());
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
        $this->s_employee_OfficeID->Show();
        $this->s_Surname->Show();
        $this->s_FirstName->Show();
        $this->s_MiddleName->Show();
        $this->s_employee_Position->Show();
        $this->CheckBoxList1->Show();
        $this->ListBox1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End departmentoffice_employee Class @24-FCB6E20C

//Initialize Page @1-4610E53D
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
$TemplateFileName = "Query_EmpDepartment2_print.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5FB88FCE
CCSecurityRedirect("7;6;5;4;3;2", "");
//End Authenticate User

//Include events file @1-2A6E4453
include_once("./Query_EmpDepartment2_print_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-20A71935
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$departmentoffice_employee1 = & new clsReportdepartmentoffice_employee1("", $MainPage);
$departmentoffice_employee = & new clsRecorddepartmentoffice_employee("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "";
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
