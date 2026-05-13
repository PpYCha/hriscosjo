<?php
//Include Common Files @1-23A9411E
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QueryCompulsory_printfinal.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_departmentoffice ReportGroup class @2-1E3EC059
class clsReportGroupemployee_departmentoffice {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $OfficeAcronym, $_OfficeAcronymAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $employee_Position, $_employee_PositionAttributes;
    var $MonthlySalary, $_MonthlySalaryAttributes;
    var $StatApp, $_StatAppAttributes;
    var $ReportLabel1, $_ReportLabel1Attributes;
    var $ReportLabel2, $_ReportLabel2Attributes;
    var $ReportLabel3, $_ReportLabel3Attributes;
    var $ReportLabel4, $_ReportLabel4Attributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_departmentoffice(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->OfficeAcronym = $this->Parent->OfficeAcronym->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->employee_Position = $this->Parent->employee_Position->Value;
        $this->MonthlySalary = $this->Parent->MonthlySalary->Value;
        $this->StatApp = $this->Parent->StatApp->Value;
        $this->ReportLabel1 = $this->Parent->ReportLabel1->Value;
        $this->ReportLabel2 = $this->Parent->ReportLabel2->Value;
        $this->ReportLabel3 = $this->Parent->ReportLabel3->Value;
        $this->ReportLabel4 = $this->Parent->ReportLabel4->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_OfficeAcronymAttributes = $this->Parent->OfficeAcronym->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_employee_PositionAttributes = $this->Parent->employee_Position->Attributes->GetAsArray();
        $this->_MonthlySalaryAttributes = $this->Parent->MonthlySalary->Attributes->GetAsArray();
        $this->_StatAppAttributes = $this->Parent->StatApp->Attributes->GetAsArray();
        $this->_ReportLabel1Attributes = $this->Parent->ReportLabel1->Attributes->GetAsArray();
        $this->_ReportLabel2Attributes = $this->Parent->ReportLabel2->Attributes->GetAsArray();
        $this->_ReportLabel3Attributes = $this->Parent->ReportLabel3->Attributes->GetAsArray();
        $this->_ReportLabel4Attributes = $this->Parent->ReportLabel4->Attributes->GetAsArray();
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
        $this->employee_Position = $Header->employee_Position;
        $Header->_employee_PositionAttributes = $this->_employee_PositionAttributes;
        $this->Parent->employee_Position->Value = $Header->employee_Position;
        $this->Parent->employee_Position->Attributes->RestoreFromArray($Header->_employee_PositionAttributes);
        $this->MonthlySalary = $Header->MonthlySalary;
        $Header->_MonthlySalaryAttributes = $this->_MonthlySalaryAttributes;
        $this->Parent->MonthlySalary->Value = $Header->MonthlySalary;
        $this->Parent->MonthlySalary->Attributes->RestoreFromArray($Header->_MonthlySalaryAttributes);
        $this->StatApp = $Header->StatApp;
        $Header->_StatAppAttributes = $this->_StatAppAttributes;
        $this->Parent->StatApp->Value = $Header->StatApp;
        $this->Parent->StatApp->Attributes->RestoreFromArray($Header->_StatAppAttributes);
        $this->ReportLabel1 = $Header->ReportLabel1;
        $Header->_ReportLabel1Attributes = $this->_ReportLabel1Attributes;
        $this->Parent->ReportLabel1->Value = $Header->ReportLabel1;
        $this->Parent->ReportLabel1->Attributes->RestoreFromArray($Header->_ReportLabel1Attributes);
        $this->ReportLabel2 = $Header->ReportLabel2;
        $Header->_ReportLabel2Attributes = $this->_ReportLabel2Attributes;
        $this->Parent->ReportLabel2->Value = $Header->ReportLabel2;
        $this->Parent->ReportLabel2->Attributes->RestoreFromArray($Header->_ReportLabel2Attributes);
        $this->ReportLabel3 = $Header->ReportLabel3;
        $Header->_ReportLabel3Attributes = $this->_ReportLabel3Attributes;
        $this->Parent->ReportLabel3->Value = $Header->ReportLabel3;
        $this->Parent->ReportLabel3->Attributes->RestoreFromArray($Header->_ReportLabel3Attributes);
        $this->ReportLabel4 = $Header->ReportLabel4;
        $Header->_ReportLabel4Attributes = $this->_ReportLabel4Attributes;
        $this->Parent->ReportLabel4->Value = $Header->ReportLabel4;
        $this->Parent->ReportLabel4->Attributes->RestoreFromArray($Header->_ReportLabel4Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End employee_departmentoffice ReportGroup class

//employee_departmentoffice GroupsCollection class @2-BEE3511A
class clsGroupsCollectionemployee_departmentoffice {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_departmentoffice(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_departmentoffice($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->OfficeAcronym->Value = $this->Parent->OfficeAcronym->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->employee_Position->Value = $this->Parent->employee_Position->initialValue;
        $this->Parent->MonthlySalary->Value = $this->Parent->MonthlySalary->initialValue;
        $this->Parent->StatApp->Value = $this->Parent->StatApp->initialValue;
        $this->Parent->ReportLabel1->Value = $this->Parent->ReportLabel1->initialValue;
        $this->Parent->ReportLabel2->Value = $this->Parent->ReportLabel2->initialValue;
        $this->Parent->ReportLabel3->Value = $this->Parent->ReportLabel3->initialValue;
        $this->Parent->ReportLabel4->Value = $this->Parent->ReportLabel4->initialValue;
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
//End employee_departmentoffice GroupsCollection class

class clsReportemployee_departmentoffice { //employee_departmentoffice Class @2-FD652081

//employee_departmentoffice Variables @2-87F7EA53

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
//End employee_departmentoffice Variables

//Class_Initialize Event @2-992FA34F
    function clsReportemployee_departmentoffice($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_departmentoffice";
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
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployee_departmentofficeDataSource($this);
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

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->OfficeAcronym = & new clsControl(ccsReportLabel, "OfficeAcronym", "OfficeAcronym", ccsText, "", "", $this);
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->employee_Position = & new clsControl(ccsReportLabel, "employee_Position", "employee_Position", ccsText, "", "", $this);
        $this->MonthlySalary = & new clsControl(ccsReportLabel, "MonthlySalary", "MonthlySalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->StatApp = & new clsControl(ccsReportLabel, "StatApp", "StatApp", ccsText, "", "", $this);
        $this->ReportLabel1 = & new clsControl(ccsReportLabel, "ReportLabel1", "ReportLabel1", ccsText, "", "", $this);
        $this->ReportLabel2 = & new clsControl(ccsReportLabel, "ReportLabel2", "ReportLabel2", ccsText, "", "", $this);
        $this->ReportLabel3 = & new clsControl(ccsReportLabel, "ReportLabel3", "ReportLabel3", ccsText, "", "", $this);
        $this->ReportLabel4 = & new clsControl(ccsReportLabel, "ReportLabel4", "ReportLabel4", ccsText, "", "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
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

//CheckErrors Method @2-63CBE16A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->employee_Position->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->StatApp->Errors->Count());
        $errors = ($errors || $this->ReportLabel1->Errors->Count());
        $errors = ($errors || $this->ReportLabel2->Errors->Count());
        $errors = ($errors || $this->ReportLabel3->Errors->Count());
        $errors = ($errors || $this->ReportLabel4->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-7E31E7B8
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->employee_Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatApp->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-BEC0018A
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_employee_OfficeID"] = CCGetFromGet("s_employee_OfficeID", NULL);
        $this->DataSource->Parameters["urlemployee_StatAppID1"] = CCGetFromGet("employee_StatAppID1", NULL);
        $this->DataSource->Parameters["urlemployee_ModeSeparatnID"] = CCGetFromGet("employee_ModeSeparatnID", NULL);
        $this->DataSource->Parameters["urlSeparationYear"] = CCGetFromGet("SeparationYear", NULL);
        $this->DataSource->Parameters["urlSeparationMonth"] = CCGetFromGet("SeparationMonth", NULL);
        $this->DataSource->Parameters["urlPosition"] = CCGetFromGet("Position", NULL);
        $this->DataSource->Parameters["urlemployee_StatAppID2"] = CCGetFromGet("employee_StatAppID2", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee_departmentoffice($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->OfficeAcronym->SetValue($this->DataSource->OfficeAcronym->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->employee_Position->SetValue($this->DataSource->employee_Position->GetValue());
            $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
            $this->StatApp->SetValue($this->DataSource->StatApp->GetValue());
            $this->ReportLabel1->SetValue($this->DataSource->ReportLabel1->GetValue());
            $this->ReportLabel2->SetValue($this->DataSource->ReportLabel2->GetValue());
            $this->ReportLabel3->SetValue($this->DataSource->ReportLabel3->GetValue());
            $this->ReportLabel4->SetValue($this->DataSource->ReportLabel4->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
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
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["OfficeAcronym"] = $this->OfficeAcronym->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["employee_Position"] = $this->employee_Position->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["StatApp"] = $this->StatApp->Visible;
            $this->ControlsVisible["ReportLabel1"] = $this->ReportLabel1->Visible;
            $this->ControlsVisible["ReportLabel2"] = $this->ReportLabel2->Visible;
            $this->ControlsVisible["ReportLabel3"] = $this->ReportLabel3->Visible;
            $this->ControlsVisible["ReportLabel4"] = $this->ReportLabel4->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->OfficeAcronym->SetValue($items[$i]->OfficeAcronym);
                        $this->OfficeAcronym->Attributes->RestoreFromArray($items[$i]->_OfficeAcronymAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->employee_Position->SetValue($items[$i]->employee_Position);
                        $this->employee_Position->Attributes->RestoreFromArray($items[$i]->_employee_PositionAttributes);
                        $this->MonthlySalary->SetValue($items[$i]->MonthlySalary);
                        $this->MonthlySalary->Attributes->RestoreFromArray($items[$i]->_MonthlySalaryAttributes);
                        $this->StatApp->SetValue($items[$i]->StatApp);
                        $this->StatApp->Attributes->RestoreFromArray($items[$i]->_StatAppAttributes);
                        $this->ReportLabel1->SetValue($items[$i]->ReportLabel1);
                        $this->ReportLabel1->Attributes->RestoreFromArray($items[$i]->_ReportLabel1Attributes);
                        $this->ReportLabel2->SetValue($items[$i]->ReportLabel2);
                        $this->ReportLabel2->Attributes->RestoreFromArray($items[$i]->_ReportLabel2Attributes);
                        $this->ReportLabel3->SetValue($items[$i]->ReportLabel3);
                        $this->ReportLabel3->Attributes->RestoreFromArray($items[$i]->_ReportLabel3Attributes);
                        $this->ReportLabel4->SetValue($items[$i]->ReportLabel4);
                        $this->ReportLabel4->Attributes->RestoreFromArray($items[$i]->_ReportLabel4Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->OfficeAcronym->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->employee_Position->Show();
                        $this->MonthlySalary->Show();
                        $this->StatApp->Show();
                        $this->ReportLabel1->Show();
                        $this->ReportLabel2->Show();
                        $this->ReportLabel3->Show();
                        $this->ReportLabel4->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
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
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Navigator->Show();
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

} //End employee_departmentoffice Class @2-FCB6E20C

class clsemployee_departmentofficeDataSource extends clsDBConnection1 {  //employee_departmentofficeDataSource Class @2-7B43C9D8

//DataSource Variables @2-68FEAFDB
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
    var $employee_Position;
    var $MonthlySalary;
    var $StatApp;
    var $ReportLabel1;
    var $ReportLabel2;
    var $ReportLabel3;
    var $ReportLabel4;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-E8FD4994
    function clsemployee_departmentofficeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_departmentoffice";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->employee_Position = new clsField("employee_Position", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->StatApp = new clsField("StatApp", ccsText, "");
        
        $this->ReportLabel1 = new clsField("ReportLabel1", ccsText, "");
        
        $this->ReportLabel2 = new clsField("ReportLabel2", ccsText, "");
        
        $this->ReportLabel3 = new clsField("ReportLabel3", ccsText, "");
        
        $this->ReportLabel4 = new clsField("ReportLabel4", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-D7E6D9C2
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "departmentoffice.OfficeAcronym, employee.Surname";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-2DBABC3B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_employee_OfficeID", ccsInteger, "", "", $this->Parameters["urls_employee_OfficeID"], "", false);
        $this->wp->AddParameter("2", "urlemployee_StatAppID1", ccsInteger, "", "", $this->Parameters["urlemployee_StatAppID1"], "", false);
        $this->wp->AddParameter("3", "urlemployee_ModeSeparatnID", ccsInteger, "", "", $this->Parameters["urlemployee_ModeSeparatnID"], "", false);
        $this->wp->AddParameter("4", "urlSeparationYear", ccsText, "", "", $this->Parameters["urlSeparationYear"], "", false);
        $this->wp->AddParameter("5", "urlSeparationMonth", ccsText, "", "", $this->Parameters["urlSeparationMonth"], "", false);
        $this->wp->AddParameter("6", "urlPosition", ccsText, "", "", $this->Parameters["urlPosition"], "", false);
        $this->wp->AddParameter("7", "urlemployee_StatAppID2", ccsInteger, "", "", $this->Parameters["urlemployee_StatAppID2"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.OfficeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "employee.StatAppID", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "employee.ModeSeparatnID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opEqual, "employee.SeparationYear", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "employee.SeparationMonth", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "employee.Position", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opLessThan, "employee.StatAppID", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsInteger),false);
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

//Open Method @2-75AD8DCB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Surname, FirstName, MiddleName, MonthlySalary, employee.StatAppID AS employee_StatAppID, employee.OfficeID AS employee_OfficeID,\n\n" .
        "OfficeAcronym, employee.Position AS employee_Position, lut_statofappt2.*, employee.ModeSeparatnID AS employee_ModeSeparatnID,\n\n" .
        "lut_modeseparatn.*, SeparationMonth, SeparationDay, SeparationYear \n\n" .
        "FROM ((employee LEFT JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) LEFT JOIN lut_statofappt2 ON\n\n" .
        "employee.StatAppID = lut_statofappt2.StatAppID) LEFT JOIN lut_modeseparatn ON\n\n" .
        "employee.ModeSeparatnID = lut_modeseparatn.ModeSeparatnID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-2B955247
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->employee_Position->SetDBValue($this->f("employee_Position"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->StatApp->SetDBValue($this->f("StatApp"));
        $this->ReportLabel1->SetDBValue($this->f("ModeSeparatn"));
        $this->ReportLabel2->SetDBValue($this->f("SeparationMonth"));
        $this->ReportLabel3->SetDBValue($this->f("SeparationDay"));
        $this->ReportLabel4->SetDBValue($this->f("SeparationYear"));
    }
//End SetValues Method

} //End employee_departmentofficeDataSource Class @2-FCB6E20C

class clsRecorddepartmentoffice_employee { //departmentoffice_employee Class @25-B39F2074

//Variables @25-D6FF3E86

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

//Class_Initialize Event @25-EA816E18
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
        $this->DataSource = new clsdepartmentoffice_employeeDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "departmentoffice_employee";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = & new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_employee_OfficeID", "Position", "employee_ModeSeparatnID", "SeparationMonth", "SeparationYear", "s_CompRetireMonth", "s_CompRetireYear", "employee_StatAppID1", "employee_StatAppID2", "ccsForm"));
            $this->ClearParameters->Page = "QueryCompulsory_printfinal.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_employee_OfficeID = & new clsControl(ccsListBox, "s_employee_OfficeID", "s_employee_OfficeID", ccsInteger, "", CCGetRequestParam("s_employee_OfficeID", $Method, NULL), $this);
            $this->s_employee_OfficeID->DSType = dsTable;
            $this->s_employee_OfficeID->DataSource = new clsDBConnection1();
            $this->s_employee_OfficeID->ds = & $this->s_employee_OfficeID->DataSource;
            $this->s_employee_OfficeID->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            $this->s_employee_OfficeID->DataSource->Order = "OfficeAcronym";
            list($this->s_employee_OfficeID->BoundColumn, $this->s_employee_OfficeID->TextColumn, $this->s_employee_OfficeID->DBFormat) = array("OfficeID", "OfficeAcronym", "");
            $this->s_employee_OfficeID->DataSource->Order = "OfficeAcronym";
            $this->employee_StatAppID1 = & new clsControl(ccsCheckBox, "employee_StatAppID1", "employee_StatAppID1", ccsInteger, "", CCGetRequestParam("employee_StatAppID1", $Method, NULL), $this);
            $this->employee_StatAppID1->CheckedValue = $this->employee_StatAppID1->GetParsedValue(6);
            $this->employee_StatAppID1->UncheckedValue = $this->employee_StatAppID1->GetParsedValue(0);
            $this->employee_ModeSeparatnID = & new clsControl(ccsListBox, "employee_ModeSeparatnID", "employee_ModeSeparatnID", ccsText, "", CCGetRequestParam("employee_ModeSeparatnID", $Method, NULL), $this);
            $this->employee_ModeSeparatnID->DSType = dsTable;
            $this->employee_ModeSeparatnID->DataSource = new clsDBConnection1();
            $this->employee_ModeSeparatnID->ds = & $this->employee_ModeSeparatnID->DataSource;
            $this->employee_ModeSeparatnID->DataSource->SQL = "SELECT * \n" .
"FROM lut_modeseparatn {SQL_Where} {SQL_OrderBy}";
            list($this->employee_ModeSeparatnID->BoundColumn, $this->employee_ModeSeparatnID->TextColumn, $this->employee_ModeSeparatnID->DBFormat) = array("ModeSeparatnID", "ModeSeparatn", "");
            $this->SeparationYear = & new clsControl(ccsTextBox, "SeparationYear", "SeparationYear", ccsText, "", CCGetRequestParam("SeparationYear", $Method, NULL), $this);
            $this->SeparationMonth = & new clsControl(ccsListBox, "SeparationMonth", "SeparationMonth", ccsText, "", CCGetRequestParam("SeparationMonth", $Method, NULL), $this);
            $this->SeparationMonth->DSType = dsTable;
            $this->SeparationMonth->DataSource = new clsDBConnection1();
            $this->SeparationMonth->ds = & $this->SeparationMonth->DataSource;
            $this->SeparationMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->SeparationMonth->BoundColumn, $this->SeparationMonth->TextColumn, $this->SeparationMonth->DBFormat) = array("Month", "Month", "");
            $this->Position = & new clsControl(ccsTextBox, "Position", "Position", ccsText, "", CCGetRequestParam("Position", $Method, NULL), $this);
            $this->employee_StatAppID2 = & new clsControl(ccsCheckBox, "employee_StatAppID2", "employee_StatAppID2", ccsInteger, "", CCGetRequestParam("employee_StatAppID2", $Method, NULL), $this);
            $this->employee_StatAppID2->CheckedValue = $this->employee_StatAppID2->GetParsedValue(6);
            $this->employee_StatAppID2->UncheckedValue = $this->employee_StatAppID2->GetParsedValue(0);
            if(!$this->FormSubmitted) {
                if(!is_array($this->employee_StatAppID1->Value) && !strlen($this->employee_StatAppID1->Value) && $this->employee_StatAppID1->Value !== false)
                    $this->employee_StatAppID1->SetValue(false);
                if(!is_array($this->employee_StatAppID2->Value) && !strlen($this->employee_StatAppID2->Value) && $this->employee_StatAppID2->Value !== false)
                    $this->employee_StatAppID2->SetValue(false);
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @25-4E1CA995
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlStatAppID"] = CCGetFromGet("StatAppID", NULL);
    }
//End Initialize Method

//Validate Method @25-BD0739A9
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_employee_OfficeID->Validate() && $Validation);
        $Validation = ($this->employee_StatAppID1->Validate() && $Validation);
        $Validation = ($this->employee_ModeSeparatnID->Validate() && $Validation);
        $Validation = ($this->SeparationYear->Validate() && $Validation);
        $Validation = ($this->SeparationMonth->Validate() && $Validation);
        $Validation = ($this->Position->Validate() && $Validation);
        $Validation = ($this->employee_StatAppID2->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_employee_OfficeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->employee_StatAppID1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->employee_ModeSeparatnID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeparationYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeparationMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->employee_StatAppID2->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @25-3B162880
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_employee_OfficeID->Errors->Count());
        $errors = ($errors || $this->employee_StatAppID1->Errors->Count());
        $errors = ($errors || $this->employee_ModeSeparatnID->Errors->Count());
        $errors = ($errors || $this->SeparationYear->Errors->Count());
        $errors = ($errors || $this->SeparationMonth->Errors->Count());
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->employee_StatAppID2->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @25-ED598703
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

//Operation Method @25-433208B2
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "QueryCompulsory_printfinal.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "QueryCompulsory_printfinal.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//Show Method @25-B0E4F1BD
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
        $this->employee_ModeSeparatnID->Prepare();
        $this->SeparationMonth->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->Position->SetValue($this->DataSource->Position->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_employee_OfficeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->employee_StatAppID1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->employee_ModeSeparatnID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeparationYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeparationMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->employee_StatAppID2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
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
        $this->employee_StatAppID1->Show();
        $this->employee_ModeSeparatnID->Show();
        $this->SeparationYear->Show();
        $this->SeparationMonth->Show();
        $this->Position->Show();
        $this->employee_StatAppID2->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End departmentoffice_employee Class @25-FCB6E20C

class clsdepartmentoffice_employeeDataSource extends clsDBConnection1 {  //departmentoffice_employeeDataSource Class @25-543C24D2

//DataSource Variables @25-64C58424
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;
    var $AllParametersSet;


    // Datasource fields
    var $ClearParameters;
    var $s_employee_OfficeID;
    var $employee_StatAppID1;
    var $employee_ModeSeparatnID;
    var $SeparationYear;
    var $SeparationMonth;
    var $Position;
    var $employee_StatAppID2;
//End DataSource Variables

//DataSourceClass_Initialize Event @25-9E22D369
    function clsdepartmentoffice_employeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record departmentoffice_employee/Error";
        $this->Initialize();
        $this->ClearParameters = new clsField("ClearParameters", ccsText, "");
        
        $this->s_employee_OfficeID = new clsField("s_employee_OfficeID", ccsInteger, "");
        
        $this->employee_StatAppID1 = new clsField("employee_StatAppID1", ccsInteger, "");
        
        $this->employee_ModeSeparatnID = new clsField("employee_ModeSeparatnID", ccsText, "");
        
        $this->SeparationYear = new clsField("SeparationYear", ccsText, "");
        
        $this->SeparationMonth = new clsField("SeparationMonth", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->employee_StatAppID2 = new clsField("employee_StatAppID2", ccsInteger, "");
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @25-0A9A3924
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlStatAppID", ccsInteger, "", "", $this->Parameters["urlStatAppID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "StatAppID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @25-FDA4A403
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @25-F41B8308
    function SetValues()
    {
        $this->Position->SetDBValue($this->f("Position"));
    }
//End SetValues Method

} //End departmentoffice_employeeDataSource Class @25-FCB6E20C

//Initialize Page @1-1565A149
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
$TemplateFileName = "QueryCompulsory_printfinal.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5FB88FCE
CCSecurityRedirect("7;6;5;4;3;2", "");
//End Authenticate User

//Include events file @1-61BC0255
include_once("./QueryCompulsory_printfinal_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-80EC2222
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_departmentoffice = & new clsReportemployee_departmentoffice("", $MainPage);
$departmentoffice_employee = & new clsRecorddepartmentoffice_employee("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QueryCompulsory_print.php";
$MainPage->employee_departmentoffice = & $employee_departmentoffice;
$MainPage->departmentoffice_employee = & $departmentoffice_employee;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_departmentoffice->Initialize();
$departmentoffice_employee->Initialize();

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

//Go to destination page @1-71907B9D
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_departmentoffice);
    unset($departmentoffice_employee);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-AC1854A7
$employee_departmentoffice->Show();
$departmentoffice_employee->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-81313BE1
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_departmentoffice);
unset($departmentoffice_employee);
unset($Tpl);
//End Unload Page


?>
