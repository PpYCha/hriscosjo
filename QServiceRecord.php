<?php
//Include Common Files @1-507A01BF
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QServiceRecord.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_servicerecord ReportGroup class @2-3915F42D
class clsReportGroupemployee_servicerecord {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $DateFrom, $_DateFromAttributes;
    var $DateTo, $_DateToAttributes;
    var $Designation, $_DesignationAttributes;
    var $StatofAppt, $_StatofApptAttributes;
    var $AnnualSalary, $_AnnualSalaryAttributes;
    var $OfficeStatn, $_OfficeStatnAttributes;
    var $Branch, $_BranchAttributes;
    var $AbsenceWOPay, $_AbsenceWOPayAttributes;
    var $Separation, $_SeparationAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_servicerecord(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->Designation = $this->Parent->Designation->Value;
        $this->StatofAppt = $this->Parent->StatofAppt->Value;
        $this->AnnualSalary = $this->Parent->AnnualSalary->Value;
        $this->OfficeStatn = $this->Parent->OfficeStatn->Value;
        $this->Branch = $this->Parent->Branch->Value;
        $this->AbsenceWOPay = $this->Parent->AbsenceWOPay->Value;
        $this->Separation = $this->Parent->Separation->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Sorter_DateFromAttributes = $this->Parent->Sorter_DateFrom->Attributes->GetAsArray();
        $this->_Sorter_DateToAttributes = $this->Parent->Sorter_DateTo->Attributes->GetAsArray();
        $this->_Sorter_DesignationAttributes = $this->Parent->Sorter_Designation->Attributes->GetAsArray();
        $this->_Sorter_StatofApptAttributes = $this->Parent->Sorter_StatofAppt->Attributes->GetAsArray();
        $this->_Sorter_AnnualSalaryAttributes = $this->Parent->Sorter_AnnualSalary->Attributes->GetAsArray();
        $this->_Sorter_OfficeStatnAttributes = $this->Parent->Sorter_OfficeStatn->Attributes->GetAsArray();
        $this->_Sorter_BranchAttributes = $this->Parent->Sorter_Branch->Attributes->GetAsArray();
        $this->_Sorter_AbsenceWOPayAttributes = $this->Parent->Sorter_AbsenceWOPay->Attributes->GetAsArray();
        $this->_Sorter_SeparationAttributes = $this->Parent->Sorter_Separation->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_DesignationAttributes = $this->Parent->Designation->Attributes->GetAsArray();
        $this->_StatofApptAttributes = $this->Parent->StatofAppt->Attributes->GetAsArray();
        $this->_AnnualSalaryAttributes = $this->Parent->AnnualSalary->Attributes->GetAsArray();
        $this->_OfficeStatnAttributes = $this->Parent->OfficeStatn->Attributes->GetAsArray();
        $this->_BranchAttributes = $this->Parent->Branch->Attributes->GetAsArray();
        $this->_AbsenceWOPayAttributes = $this->Parent->AbsenceWOPay->Attributes->GetAsArray();
        $this->_SeparationAttributes = $this->Parent->Separation->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
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
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
    }
}
//End employee_servicerecord ReportGroup class

//employee_servicerecord GroupsCollection class @2-6100D742
class clsGroupsCollectionemployee_servicerecord {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_servicerecord(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_servicerecord($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->DateFrom->Value = $this->Parent->DateFrom->initialValue;
        $this->Parent->DateTo->Value = $this->Parent->DateTo->initialValue;
        $this->Parent->Designation->Value = $this->Parent->Designation->initialValue;
        $this->Parent->StatofAppt->Value = $this->Parent->StatofAppt->initialValue;
        $this->Parent->AnnualSalary->Value = $this->Parent->AnnualSalary->initialValue;
        $this->Parent->OfficeStatn->Value = $this->Parent->OfficeStatn->initialValue;
        $this->Parent->Branch->Value = $this->Parent->Branch->initialValue;
        $this->Parent->AbsenceWOPay->Value = $this->Parent->AbsenceWOPay->initialValue;
        $this->Parent->Separation->Value = $this->Parent->Separation->initialValue;
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
//End employee_servicerecord GroupsCollection class

class clsReportemployee_servicerecord { //employee_servicerecord Class @2-044A19FF

//employee_servicerecord Variables @2-F8EC0B04

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
    var $Sorter_DateFrom;
    var $Sorter_DateTo;
    var $Sorter_Designation;
    var $Sorter_StatofAppt;
    var $Sorter_AnnualSalary;
    var $Sorter_OfficeStatn;
    var $Sorter_Branch;
    var $Sorter_AbsenceWOPay;
    var $Sorter_Separation;
//End employee_servicerecord Variables

//Class_Initialize Event @2-CE9C20CA
    function clsReportemployee_servicerecord($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_servicerecord";
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
        $this->DataSource = new clsemployee_servicerecordDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
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
        $this->SorterName = CCGetParam("employee_servicerecordOrder", "");
        $this->SorterDirection = CCGetParam("employee_servicerecordDir", "");

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Sorter_DateFrom = & new clsSorter($this->ComponentName, "Sorter_DateFrom", $FileName, $this);
        $this->Sorter_DateTo = & new clsSorter($this->ComponentName, "Sorter_DateTo", $FileName, $this);
        $this->Sorter_Designation = & new clsSorter($this->ComponentName, "Sorter_Designation", $FileName, $this);
        $this->Sorter_StatofAppt = & new clsSorter($this->ComponentName, "Sorter_StatofAppt", $FileName, $this);
        $this->Sorter_AnnualSalary = & new clsSorter($this->ComponentName, "Sorter_AnnualSalary", $FileName, $this);
        $this->Sorter_OfficeStatn = & new clsSorter($this->ComponentName, "Sorter_OfficeStatn", $FileName, $this);
        $this->Sorter_Branch = & new clsSorter($this->ComponentName, "Sorter_Branch", $FileName, $this);
        $this->Sorter_AbsenceWOPay = & new clsSorter($this->ComponentName, "Sorter_AbsenceWOPay", $FileName, $this);
        $this->Sorter_Separation = & new clsSorter($this->ComponentName, "Sorter_Separation", $FileName, $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsText, "", "", $this);
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsText, "", "", $this);
        $this->Designation = & new clsControl(ccsReportLabel, "Designation", "Designation", ccsText, "", "", $this);
        $this->StatofAppt = & new clsControl(ccsReportLabel, "StatofAppt", "StatofAppt", ccsText, "", "", $this);
        $this->AnnualSalary = & new clsControl(ccsReportLabel, "AnnualSalary", "AnnualSalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->OfficeStatn = & new clsControl(ccsReportLabel, "OfficeStatn", "OfficeStatn", ccsText, "", "", $this);
        $this->Branch = & new clsControl(ccsReportLabel, "Branch", "Branch", ccsText, "", "", $this);
        $this->AbsenceWOPay = & new clsControl(ccsReportLabel, "AbsenceWOPay", "AbsenceWOPay", ccsText, "", "", $this);
        $this->Separation = & new clsControl(ccsReportLabel, "Separation", "Separation", ccsText, "", "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
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

//CheckErrors Method @2-262137A7
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->Designation->Errors->Count());
        $errors = ($errors || $this->StatofAppt->Errors->Count());
        $errors = ($errors || $this->AnnualSalary->Errors->Count());
        $errors = ($errors || $this->OfficeStatn->Errors->Count());
        $errors = ($errors || $this->Branch->Errors->Count());
        $errors = ($errors || $this->AbsenceWOPay->Errors->Count());
        $errors = ($errors || $this->Separation->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-AF8D3869
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Designation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatofAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AnnualSalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeStatn->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Branch->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AbsenceWOPay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Separation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-7B6E8712
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee_servicerecord($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->Designation->SetValue($this->DataSource->Designation->GetValue());
            $this->StatofAppt->SetValue($this->DataSource->StatofAppt->GetValue());
            $this->AnnualSalary->SetValue($this->DataSource->AnnualSalary->GetValue());
            $this->OfficeStatn->SetValue($this->DataSource->OfficeStatn->GetValue());
            $this->Branch->SetValue($this->DataSource->Branch->GetValue());
            $this->AbsenceWOPay->SetValue($this->DataSource->AbsenceWOPay->GetValue());
            $this->Separation->SetValue($this->DataSource->Separation->GetValue());
            $this->Report_TotalRecords->SetValue(1);
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
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["Designation"] = $this->Designation->Visible;
            $this->ControlsVisible["StatofAppt"] = $this->StatofAppt->Visible;
            $this->ControlsVisible["AnnualSalary"] = $this->AnnualSalary->Visible;
            $this->ControlsVisible["OfficeStatn"] = $this->OfficeStatn->Visible;
            $this->ControlsVisible["Branch"] = $this->Branch->Visible;
            $this->ControlsVisible["AbsenceWOPay"] = $this->AbsenceWOPay->Visible;
            $this->ControlsVisible["Separation"] = $this->Separation->Visible;
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
                                $this->Sorter_DateFrom->Show();
                                $this->Sorter_DateTo->Show();
                                $this->Sorter_Designation->Show();
                                $this->Sorter_StatofAppt->Show();
                                $this->Sorter_AnnualSalary->Show();
                                $this->Sorter_OfficeStatn->Show();
                                $this->Sorter_Branch->Show();
                                $this->Sorter_AbsenceWOPay->Show();
                                $this->Sorter_Separation->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Navigator->Show();
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

} //End employee_servicerecord Class @2-FCB6E20C

class clsemployee_servicerecordDataSource extends clsDBConnection1 {  //employee_servicerecordDataSource Class @2-530A2DAD

//DataSource Variables @2-DFAD57E5
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $DateFrom;
    var $DateTo;
    var $Designation;
    var $StatofAppt;
    var $AnnualSalary;
    var $OfficeStatn;
    var $Branch;
    var $AbsenceWOPay;
    var $Separation;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-F6482357
    function clsemployee_servicerecordDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_servicerecord";
        $this->Initialize();
        $this->DateFrom = new clsField("DateFrom", ccsText, "");
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->Designation = new clsField("Designation", ccsText, "");
        
        $this->StatofAppt = new clsField("StatofAppt", ccsText, "");
        
        $this->AnnualSalary = new clsField("AnnualSalary", ccsSingle, "");
        
        $this->OfficeStatn = new clsField("OfficeStatn", ccsText, "");
        
        $this->Branch = new clsField("Branch", ccsText, "");
        
        $this->AbsenceWOPay = new clsField("AbsenceWOPay", ccsText, "");
        
        $this->Separation = new clsField("Separation", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-D33C9C58
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DateFrom" => array("DateFrom", ""), 
            "Sorter_DateTo" => array("DateTo", ""), 
            "Sorter_Designation" => array("Designation", ""), 
            "Sorter_StatofAppt" => array("StatofAppt", ""), 
            "Sorter_AnnualSalary" => array("AnnualSalary", ""), 
            "Sorter_OfficeStatn" => array("OfficeStatn", ""), 
            "Sorter_Branch" => array("Branch", ""), 
            "Sorter_AbsenceWOPay" => array("AbsenceWOPay", ""), 
            "Sorter_Separation" => array("Separation", "")));
    }
//End SetOrder Method

//Prepare Method @2-532AFE75
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-3DE1E197
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_servicerecord {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-C2475E4E
    function SetValues()
    {
        $this->DateFrom->SetDBValue($this->f("DateFrom"));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->Designation->SetDBValue($this->f("Designation"));
        $this->StatofAppt->SetDBValue($this->f("StatofAppt"));
        $this->AnnualSalary->SetDBValue(trim($this->f("AnnualSalary")));
        $this->OfficeStatn->SetDBValue($this->f("OfficeStatn"));
        $this->Branch->SetDBValue($this->f("Branch"));
        $this->AbsenceWOPay->SetDBValue($this->f("AbsenceWOPay"));
        $this->Separation->SetDBValue($this->f("Separation"));
    }
//End SetValues Method

} //End employee_servicerecordDataSource Class @2-FCB6E20C

//Initialize Page @1-B83C8285
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
$TemplateFileName = "QServiceRecord.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-9196C10C
include_once("./QServiceRecord_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-BD5E7D68
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_servicerecord = & new clsReportemployee_servicerecord("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q2.php";
$MainPage->employee_servicerecord = & $employee_servicerecord;
$MainPage->Link1 = & $Link1;
$employee_servicerecord->Initialize();

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

//Go to destination page @1-4DCA7C1E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_servicerecord);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0E82A36A
$employee_servicerecord->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C375DB0B
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_servicerecord);
unset($Tpl);
//End Unload Page


?>
