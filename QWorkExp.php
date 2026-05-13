<?php
//Include Common Files @1-3C1725FC
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QWorkExp.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_workexperience ReportGroup class @2-71424328
class clsReportGroupemployee_workexperience {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $DateFrom, $_DateFromAttributes;
    var $DateTo, $_DateToAttributes;
    var $PositionTitle, $_PositionTitleAttributes;
    var $Department, $_DepartmentAttributes;
    var $MonthlySalary, $_MonthlySalaryAttributes;
    var $SalaryGrade, $_SalaryGradeAttributes;
    var $StepIncremt, $_StepIncremtAttributes;
    var $StatusOfAppt, $_StatusOfApptAttributes;
    var $GovernmentService, $_GovernmentServiceAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_workexperience(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->PositionTitle = $this->Parent->PositionTitle->Value;
        $this->Department = $this->Parent->Department->Value;
        $this->MonthlySalary = $this->Parent->MonthlySalary->Value;
        $this->SalaryGrade = $this->Parent->SalaryGrade->Value;
        $this->StepIncremt = $this->Parent->StepIncremt->Value;
        $this->StatusOfAppt = $this->Parent->StatusOfAppt->Value;
        $this->GovernmentService = $this->Parent->GovernmentService->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_Sorter_DateFromAttributes = $this->Parent->Sorter_DateFrom->Attributes->GetAsArray();
        $this->_Sorter_DateToAttributes = $this->Parent->Sorter_DateTo->Attributes->GetAsArray();
        $this->_Sorter_PositionTitleAttributes = $this->Parent->Sorter_PositionTitle->Attributes->GetAsArray();
        $this->_Sorter_DepartmentAttributes = $this->Parent->Sorter_Department->Attributes->GetAsArray();
        $this->_Sorter_MonthlySalaryAttributes = $this->Parent->Sorter_MonthlySalary->Attributes->GetAsArray();
        $this->_Sorter_SalaryGradeAttributes = $this->Parent->Sorter_SalaryGrade->Attributes->GetAsArray();
        $this->_Sorter_StepIncremtAttributes = $this->Parent->Sorter_StepIncremt->Attributes->GetAsArray();
        $this->_Sorter_StatusOfApptAttributes = $this->Parent->Sorter_StatusOfAppt->Attributes->GetAsArray();
        $this->_Sorter_GovernmentServiceAttributes = $this->Parent->Sorter_GovernmentService->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_PositionTitleAttributes = $this->Parent->PositionTitle->Attributes->GetAsArray();
        $this->_DepartmentAttributes = $this->Parent->Department->Attributes->GetAsArray();
        $this->_MonthlySalaryAttributes = $this->Parent->MonthlySalary->Attributes->GetAsArray();
        $this->_SalaryGradeAttributes = $this->Parent->SalaryGrade->Attributes->GetAsArray();
        $this->_StepIncremtAttributes = $this->Parent->StepIncremt->Attributes->GetAsArray();
        $this->_StatusOfApptAttributes = $this->Parent->StatusOfAppt->Attributes->GetAsArray();
        $this->_GovernmentServiceAttributes = $this->Parent->GovernmentService->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->DateFrom = $Header->DateFrom;
        $Header->_DateFromAttributes = $this->_DateFromAttributes;
        $this->Parent->DateFrom->Value = $Header->DateFrom;
        $this->Parent->DateFrom->Attributes->RestoreFromArray($Header->_DateFromAttributes);
        $this->DateTo = $Header->DateTo;
        $Header->_DateToAttributes = $this->_DateToAttributes;
        $this->Parent->DateTo->Value = $Header->DateTo;
        $this->Parent->DateTo->Attributes->RestoreFromArray($Header->_DateToAttributes);
        $this->PositionTitle = $Header->PositionTitle;
        $Header->_PositionTitleAttributes = $this->_PositionTitleAttributes;
        $this->Parent->PositionTitle->Value = $Header->PositionTitle;
        $this->Parent->PositionTitle->Attributes->RestoreFromArray($Header->_PositionTitleAttributes);
        $this->Department = $Header->Department;
        $Header->_DepartmentAttributes = $this->_DepartmentAttributes;
        $this->Parent->Department->Value = $Header->Department;
        $this->Parent->Department->Attributes->RestoreFromArray($Header->_DepartmentAttributes);
        $this->MonthlySalary = $Header->MonthlySalary;
        $Header->_MonthlySalaryAttributes = $this->_MonthlySalaryAttributes;
        $this->Parent->MonthlySalary->Value = $Header->MonthlySalary;
        $this->Parent->MonthlySalary->Attributes->RestoreFromArray($Header->_MonthlySalaryAttributes);
        $this->SalaryGrade = $Header->SalaryGrade;
        $Header->_SalaryGradeAttributes = $this->_SalaryGradeAttributes;
        $this->Parent->SalaryGrade->Value = $Header->SalaryGrade;
        $this->Parent->SalaryGrade->Attributes->RestoreFromArray($Header->_SalaryGradeAttributes);
        $this->StepIncremt = $Header->StepIncremt;
        $Header->_StepIncremtAttributes = $this->_StepIncremtAttributes;
        $this->Parent->StepIncremt->Value = $Header->StepIncremt;
        $this->Parent->StepIncremt->Attributes->RestoreFromArray($Header->_StepIncremtAttributes);
        $this->StatusOfAppt = $Header->StatusOfAppt;
        $Header->_StatusOfApptAttributes = $this->_StatusOfApptAttributes;
        $this->Parent->StatusOfAppt->Value = $Header->StatusOfAppt;
        $this->Parent->StatusOfAppt->Attributes->RestoreFromArray($Header->_StatusOfApptAttributes);
        $this->GovernmentService = $Header->GovernmentService;
        $Header->_GovernmentServiceAttributes = $this->_GovernmentServiceAttributes;
        $this->Parent->GovernmentService->Value = $Header->GovernmentService;
        $this->Parent->GovernmentService->Attributes->RestoreFromArray($Header->_GovernmentServiceAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee_workexperience ReportGroup class

//employee_workexperience GroupsCollection class @2-297C4C34
class clsGroupsCollectionemployee_workexperience {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_workexperience(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_workexperience($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->DateFrom->Value = $this->Parent->DateFrom->initialValue;
        $this->Parent->DateTo->Value = $this->Parent->DateTo->initialValue;
        $this->Parent->PositionTitle->Value = $this->Parent->PositionTitle->initialValue;
        $this->Parent->Department->Value = $this->Parent->Department->initialValue;
        $this->Parent->MonthlySalary->Value = $this->Parent->MonthlySalary->initialValue;
        $this->Parent->SalaryGrade->Value = $this->Parent->SalaryGrade->initialValue;
        $this->Parent->StepIncremt->Value = $this->Parent->StepIncremt->initialValue;
        $this->Parent->StatusOfAppt->Value = $this->Parent->StatusOfAppt->initialValue;
        $this->Parent->GovernmentService->Value = $this->Parent->GovernmentService->initialValue;
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
//End employee_workexperience GroupsCollection class

class clsReportemployee_workexperience { //employee_workexperience Class @2-35C13E69

//employee_workexperience Variables @2-29657D29

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
    var $Sorter_PositionTitle;
    var $Sorter_Department;
    var $Sorter_MonthlySalary;
    var $Sorter_SalaryGrade;
    var $Sorter_StepIncremt;
    var $Sorter_StatusOfAppt;
    var $Sorter_GovernmentService;
//End employee_workexperience Variables

//Class_Initialize Event @2-77758060
    function clsReportemployee_workexperience($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_workexperience";
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
        $this->DataSource = new clsemployee_workexperienceDataSource($this);
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
        $this->SorterName = CCGetParam("employee_workexperienceOrder", "");
        $this->SorterDirection = CCGetParam("employee_workexperienceDir", "");

        $this->Sorter_DateFrom = & new clsSorter($this->ComponentName, "Sorter_DateFrom", $FileName, $this);
        $this->Sorter_DateTo = & new clsSorter($this->ComponentName, "Sorter_DateTo", $FileName, $this);
        $this->Sorter_PositionTitle = & new clsSorter($this->ComponentName, "Sorter_PositionTitle", $FileName, $this);
        $this->Sorter_Department = & new clsSorter($this->ComponentName, "Sorter_Department", $FileName, $this);
        $this->Sorter_MonthlySalary = & new clsSorter($this->ComponentName, "Sorter_MonthlySalary", $FileName, $this);
        $this->Sorter_SalaryGrade = & new clsSorter($this->ComponentName, "Sorter_SalaryGrade", $FileName, $this);
        $this->Sorter_StepIncremt = & new clsSorter($this->ComponentName, "Sorter_StepIncremt", $FileName, $this);
        $this->Sorter_StatusOfAppt = & new clsSorter($this->ComponentName, "Sorter_StatusOfAppt", $FileName, $this);
        $this->Sorter_GovernmentService = & new clsSorter($this->ComponentName, "Sorter_GovernmentService", $FileName, $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsText, "", "", $this);
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsText, "", "", $this);
        $this->PositionTitle = & new clsControl(ccsReportLabel, "PositionTitle", "PositionTitle", ccsText, "", "", $this);
        $this->Department = & new clsControl(ccsReportLabel, "Department", "Department", ccsText, "", "", $this);
        $this->MonthlySalary = & new clsControl(ccsReportLabel, "MonthlySalary", "MonthlySalary", ccsSingle, "", "", $this);
        $this->SalaryGrade = & new clsControl(ccsReportLabel, "SalaryGrade", "SalaryGrade", ccsText, "", "", $this);
        $this->StepIncremt = & new clsControl(ccsReportLabel, "StepIncremt", "StepIncremt", ccsText, "", "", $this);
        $this->StatusOfAppt = & new clsControl(ccsReportLabel, "StatusOfAppt", "StatusOfAppt", ccsText, "", "", $this);
        $this->GovernmentService = & new clsControl(ccsReportLabel, "GovernmentService", "GovernmentService", ccsText, "", "", $this);
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

//CheckErrors Method @2-A89CBEB4
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->PositionTitle->Errors->Count());
        $errors = ($errors || $this->Department->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->SalaryGrade->Errors->Count());
        $errors = ($errors || $this->StepIncremt->Errors->Count());
        $errors = ($errors || $this->StatusOfAppt->Errors->Count());
        $errors = ($errors || $this->GovernmentService->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-D1EF9DA4
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionTitle->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Department->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SalaryGrade->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StepIncremt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatusOfAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GovernmentService->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-8CB8EA00
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

        $Groups = new clsGroupsCollectionemployee_workexperience($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->PositionTitle->SetValue($this->DataSource->PositionTitle->GetValue());
            $this->Department->SetValue($this->DataSource->Department->GetValue());
            $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
            $this->SalaryGrade->SetValue($this->DataSource->SalaryGrade->GetValue());
            $this->StepIncremt->SetValue($this->DataSource->StepIncremt->GetValue());
            $this->StatusOfAppt->SetValue($this->DataSource->StatusOfAppt->GetValue());
            $this->GovernmentService->SetValue($this->DataSource->GovernmentService->GetValue());
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
            $this->ControlsVisible["PositionTitle"] = $this->PositionTitle->Visible;
            $this->ControlsVisible["Department"] = $this->Department->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["SalaryGrade"] = $this->SalaryGrade->Visible;
            $this->ControlsVisible["StepIncremt"] = $this->StepIncremt->Visible;
            $this->ControlsVisible["StatusOfAppt"] = $this->StatusOfAppt->Visible;
            $this->ControlsVisible["GovernmentService"] = $this->GovernmentService->Visible;
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
                        $this->PositionTitle->SetValue($items[$i]->PositionTitle);
                        $this->PositionTitle->Attributes->RestoreFromArray($items[$i]->_PositionTitleAttributes);
                        $this->Department->SetValue($items[$i]->Department);
                        $this->Department->Attributes->RestoreFromArray($items[$i]->_DepartmentAttributes);
                        $this->MonthlySalary->SetValue($items[$i]->MonthlySalary);
                        $this->MonthlySalary->Attributes->RestoreFromArray($items[$i]->_MonthlySalaryAttributes);
                        $this->SalaryGrade->SetValue($items[$i]->SalaryGrade);
                        $this->SalaryGrade->Attributes->RestoreFromArray($items[$i]->_SalaryGradeAttributes);
                        $this->StepIncremt->SetValue($items[$i]->StepIncremt);
                        $this->StepIncremt->Attributes->RestoreFromArray($items[$i]->_StepIncremtAttributes);
                        $this->StatusOfAppt->SetValue($items[$i]->StatusOfAppt);
                        $this->StatusOfAppt->Attributes->RestoreFromArray($items[$i]->_StatusOfApptAttributes);
                        $this->GovernmentService->SetValue($items[$i]->GovernmentService);
                        $this->GovernmentService->Attributes->RestoreFromArray($items[$i]->_GovernmentServiceAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->DateFrom->Show();
                        $this->DateTo->Show();
                        $this->PositionTitle->Show();
                        $this->Department->Show();
                        $this->MonthlySalary->Show();
                        $this->SalaryGrade->Show();
                        $this->StepIncremt->Show();
                        $this->StatusOfAppt->Show();
                        $this->GovernmentService->Show();
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
                                $this->Sorter_DateFrom->Show();
                                $this->Sorter_DateTo->Show();
                                $this->Sorter_PositionTitle->Show();
                                $this->Sorter_Department->Show();
                                $this->Sorter_MonthlySalary->Show();
                                $this->Sorter_SalaryGrade->Show();
                                $this->Sorter_StepIncremt->Show();
                                $this->Sorter_StatusOfAppt->Show();
                                $this->Sorter_GovernmentService->Show();
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

} //End employee_workexperience Class @2-FCB6E20C

class clsemployee_workexperienceDataSource extends clsDBConnection1 {  //employee_workexperienceDataSource Class @2-5B42D1A5

//DataSource Variables @2-1A4B2F4F
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $DateFrom;
    var $DateTo;
    var $PositionTitle;
    var $Department;
    var $MonthlySalary;
    var $SalaryGrade;
    var $StepIncremt;
    var $StatusOfAppt;
    var $GovernmentService;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-15CFAE90
    function clsemployee_workexperienceDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_workexperience";
        $this->Initialize();
        $this->DateFrom = new clsField("DateFrom", ccsText, "");
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->PositionTitle = new clsField("PositionTitle", ccsText, "");
        
        $this->Department = new clsField("Department", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->SalaryGrade = new clsField("SalaryGrade", ccsText, "");
        
        $this->StepIncremt = new clsField("StepIncremt", ccsText, "");
        
        $this->StatusOfAppt = new clsField("StatusOfAppt", ccsText, "");
        
        $this->GovernmentService = new clsField("GovernmentService", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-0F3E5B7F
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateFrom";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_DateFrom" => array("DateFrom", ""), 
            "Sorter_DateTo" => array("DateTo", ""), 
            "Sorter_PositionTitle" => array("PositionTitle", ""), 
            "Sorter_Department" => array("Department", ""), 
            "Sorter_MonthlySalary" => array("MonthlySalary", ""), 
            "Sorter_SalaryGrade" => array("SalaryGrade", ""), 
            "Sorter_StepIncremt" => array("StepIncremt", ""), 
            "Sorter_StatusOfAppt" => array("StatusOfAppt", ""), 
            "Sorter_GovernmentService" => array("GovernmentService", "")));
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

//Open Method @2-9C4ABD3E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_workexperience {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-AE7076B8
    function SetValues()
    {
        $this->DateFrom->SetDBValue($this->f("DateFrom"));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->PositionTitle->SetDBValue($this->f("PositionTitle"));
        $this->Department->SetDBValue($this->f("Department"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->SalaryGrade->SetDBValue($this->f("SalaryGrade"));
        $this->StepIncremt->SetDBValue($this->f("StepIncremt"));
        $this->StatusOfAppt->SetDBValue($this->f("StatusOfAppt"));
        $this->GovernmentService->SetDBValue($this->f("GovernmentService"));
    }
//End SetValues Method

} //End employee_workexperienceDataSource Class @2-FCB6E20C

//Initialize Page @1-F52F35AE
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
$TemplateFileName = "QWorkExp.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-791417DF
include_once("./QWorkExp_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-CA61DD19
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_workexperience = & new clsReportemployee_workexperience("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "QueryEmpProfile.php";
$MainPage->employee_workexperience = & $employee_workexperience;
$MainPage->Link1 = & $Link1;
$employee_workexperience->Initialize();

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

//Go to destination page @1-1EE0B419
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_workexperience);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0743A7F3
$employee_workexperience->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-F2FF72FA
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_workexperience);
unset($Tpl);
//End Unload Page


?>
