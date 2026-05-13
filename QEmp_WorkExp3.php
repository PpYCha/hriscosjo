<?php
//Include Common Files @1-1896240A
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QEmp_WorkExp3.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_employee_workexp ReportGroup class @2-8A4C206B
class clsReportGroupemployee_employee_workexp {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $ReportLabel2, $_ReportLabel2Attributes;
    var $DateFrom, $_DateFromAttributes;
    var $DateTo, $_DateToAttributes;
    var $PositionTitle, $_PositionTitleAttributes;
    var $Department, $_DepartmentAttributes;
    var $MonthlySalary, $_MonthlySalaryAttributes;
    var $SalaryGrade, $_SalaryGradeAttributes;
    var $StatusOfAppt, $_StatusOfApptAttributes;
    var $GovernmentService, $_GovernmentServiceAttributes;
    var $StepIncremt, $_StepIncremtAttributes;
    var $Surname, $_SurnameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_employee_workexp(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->ReportLabel2 = $this->Parent->ReportLabel2->Value;
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->PositionTitle = $this->Parent->PositionTitle->Value;
        $this->Department = $this->Parent->Department->Value;
        $this->MonthlySalary = $this->Parent->MonthlySalary->Value;
        $this->SalaryGrade = $this->Parent->SalaryGrade->Value;
        $this->StatusOfAppt = $this->Parent->StatusOfAppt->Value;
        $this->GovernmentService = $this->Parent->GovernmentService->Value;
        $this->StepIncremt = $this->Parent->StepIncremt->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_ReportLabel2Attributes = $this->Parent->ReportLabel2->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_PositionTitleAttributes = $this->Parent->PositionTitle->Attributes->GetAsArray();
        $this->_DepartmentAttributes = $this->Parent->Department->Attributes->GetAsArray();
        $this->_MonthlySalaryAttributes = $this->Parent->MonthlySalary->Attributes->GetAsArray();
        $this->_SalaryGradeAttributes = $this->Parent->SalaryGrade->Attributes->GetAsArray();
        $this->_StatusOfApptAttributes = $this->Parent->StatusOfAppt->Attributes->GetAsArray();
        $this->_GovernmentServiceAttributes = $this->Parent->GovernmentService->Attributes->GetAsArray();
        $this->_StepIncremtAttributes = $this->Parent->StepIncremt->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $this->ReportLabel2 = $Header->ReportLabel2;
        $Header->_ReportLabel2Attributes = $this->_ReportLabel2Attributes;
        $this->Parent->ReportLabel2->Value = $Header->ReportLabel2;
        $this->Parent->ReportLabel2->Attributes->RestoreFromArray($Header->_ReportLabel2Attributes);
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
        $this->StatusOfAppt = $Header->StatusOfAppt;
        $Header->_StatusOfApptAttributes = $this->_StatusOfApptAttributes;
        $this->Parent->StatusOfAppt->Value = $Header->StatusOfAppt;
        $this->Parent->StatusOfAppt->Attributes->RestoreFromArray($Header->_StatusOfApptAttributes);
        $this->GovernmentService = $Header->GovernmentService;
        $Header->_GovernmentServiceAttributes = $this->_GovernmentServiceAttributes;
        $this->Parent->GovernmentService->Value = $Header->GovernmentService;
        $this->Parent->GovernmentService->Attributes->RestoreFromArray($Header->_GovernmentServiceAttributes);
        $this->StepIncremt = $Header->StepIncremt;
        $Header->_StepIncremtAttributes = $this->_StepIncremtAttributes;
        $this->Parent->StepIncremt->Value = $Header->StepIncremt;
        $this->Parent->StepIncremt->Attributes->RestoreFromArray($Header->_StepIncremtAttributes);
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
        $this->MiddleName = $Header->MiddleName;
        $Header->_MiddleNameAttributes = $this->_MiddleNameAttributes;
        $this->Parent->MiddleName->Value = $Header->MiddleName;
        $this->Parent->MiddleName->Attributes->RestoreFromArray($Header->_MiddleNameAttributes);
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
        $this->EmployeeIDNo = $Header->EmployeeIDNo;
        $Header->_EmployeeIDNoAttributes = $this->_EmployeeIDNoAttributes;
        $this->Parent->EmployeeIDNo->Value = $Header->EmployeeIDNo;
        $this->Parent->EmployeeIDNo->Attributes->RestoreFromArray($Header->_EmployeeIDNoAttributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
    }
}
//End employee_employee_workexp ReportGroup class

//employee_employee_workexp GroupsCollection class @2-A8468CE2
class clsGroupsCollectionemployee_employee_workexp {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_employee_workexp(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_employee_workexp($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->ReportLabel2->Value = $this->Parent->ReportLabel2->initialValue;
        $this->Parent->DateFrom->Value = $this->Parent->DateFrom->initialValue;
        $this->Parent->DateTo->Value = $this->Parent->DateTo->initialValue;
        $this->Parent->PositionTitle->Value = $this->Parent->PositionTitle->initialValue;
        $this->Parent->Department->Value = $this->Parent->Department->initialValue;
        $this->Parent->MonthlySalary->Value = $this->Parent->MonthlySalary->initialValue;
        $this->Parent->SalaryGrade->Value = $this->Parent->SalaryGrade->initialValue;
        $this->Parent->StatusOfAppt->Value = $this->Parent->StatusOfAppt->initialValue;
        $this->Parent->GovernmentService->Value = $this->Parent->GovernmentService->initialValue;
        $this->Parent->StepIncremt->Value = $this->Parent->StepIncremt->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
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
//End employee_employee_workexp GroupsCollection class

class clsReportemployee_employee_workexp { //employee_employee_workexp Class @2-D36F60AA

//employee_employee_workexp Variables @2-87F7EA53

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
//End employee_employee_workexp Variables

//Class_Initialize Event @2-4D1E074A
    function clsReportemployee_employee_workexp($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_employee_workexp";
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
        $this->DataSource = new clsemployee_employee_workexpDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Web");
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
        $this->ReportLabel2 = & new clsControl(ccsImage, "ReportLabel2", "ReportLabel2", ccsText, "", CCGetRequestParam("ReportLabel2", ccsGet, NULL), $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsDate, array("mm", "/", "dd", "/", "yyyy"), "", $this);
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsDate, array("mm", "/", "dd", "/", "yyyy"), "", $this);
        $this->PositionTitle = & new clsControl(ccsReportLabel, "PositionTitle", "PositionTitle", ccsText, "", "", $this);
        $this->Department = & new clsControl(ccsReportLabel, "Department", "Department", ccsText, "", "", $this);
        $this->MonthlySalary = & new clsControl(ccsReportLabel, "MonthlySalary", "MonthlySalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->SalaryGrade = & new clsControl(ccsReportLabel, "SalaryGrade", "SalaryGrade", ccsText, "", "", $this);
        $this->StatusOfAppt = & new clsControl(ccsReportLabel, "StatusOfAppt", "StatusOfAppt", ccsText, "", "", $this);
        $this->GovernmentService = & new clsControl(ccsReportLabel, "GovernmentService", "GovernmentService", ccsText, "", "", $this);
        $this->StepIncremt = & new clsControl(ccsReportLabel, "StepIncremt", "StepIncremt", ccsText, "", "", $this);
        $this->Surname = & new clsControl(ccsHidden, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsHidden, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->NameExtension = & new clsControl(ccsHidden, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->EmployeeIDNo = & new clsControl(ccsHidden, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsHidden, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
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

//CheckErrors Method @2-E949D5D2
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->ReportLabel2->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->PositionTitle->Errors->Count());
        $errors = ($errors || $this->Department->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->SalaryGrade->Errors->Count());
        $errors = ($errors || $this->StatusOfAppt->Errors->Count());
        $errors = ($errors || $this->GovernmentService->Errors->Count());
        $errors = ($errors || $this->StepIncremt->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-A91009B8
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionTitle->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Department->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SalaryGrade->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatusOfAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GovernmentService->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StepIncremt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-057AB88F
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

        $Groups = new clsGroupsCollectionemployee_employee_workexp($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->ReportLabel2->SetValue($this->DataSource->ReportLabel2->GetValue());
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->PositionTitle->SetValue($this->DataSource->PositionTitle->GetValue());
            $this->Department->SetValue($this->DataSource->Department->GetValue());
            $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
            $this->SalaryGrade->SetValue($this->DataSource->SalaryGrade->GetValue());
            $this->StatusOfAppt->SetValue($this->DataSource->StatusOfAppt->GetValue());
            $this->GovernmentService->SetValue($this->DataSource->GovernmentService->GetValue());
            $this->StepIncremt->SetValue($this->DataSource->StepIncremt->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
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
            $this->ControlsVisible["PositionTitle"] = $this->PositionTitle->Visible;
            $this->ControlsVisible["Department"] = $this->Department->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["SalaryGrade"] = $this->SalaryGrade->Visible;
            $this->ControlsVisible["StatusOfAppt"] = $this->StatusOfAppt->Visible;
            $this->ControlsVisible["GovernmentService"] = $this->GovernmentService->Visible;
            $this->ControlsVisible["StepIncremt"] = $this->StepIncremt->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
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
                        $this->StatusOfAppt->SetValue($items[$i]->StatusOfAppt);
                        $this->StatusOfAppt->Attributes->RestoreFromArray($items[$i]->_StatusOfApptAttributes);
                        $this->GovernmentService->SetValue($items[$i]->GovernmentService);
                        $this->GovernmentService->Attributes->RestoreFromArray($items[$i]->_GovernmentServiceAttributes);
                        $this->StepIncremt->SetValue($items[$i]->StepIncremt);
                        $this->StepIncremt->Attributes->RestoreFromArray($items[$i]->_StepIncremtAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->DateFrom->Show();
                        $this->DateTo->Show();
                        $this->PositionTitle->Show();
                        $this->Department->Show();
                        $this->MonthlySalary->Show();
                        $this->SalaryGrade->Show();
                        $this->StatusOfAppt->Show();
                        $this->GovernmentService->Show();
                        $this->StepIncremt->Show();
                        $this->Surname->Show();
                        $this->MiddleName->Show();
                        $this->NameExtension->Show();
                        $this->EmployeeIDNo->Show();
                        $this->FirstName->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->ReportLabel2->SetValue($items[$i]->ReportLabel2);
                            $this->ReportLabel2->Attributes->RestoreFromArray($items[$i]->_ReportLabel2Attributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $this->ReportLabel2->Show();
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

} //End employee_employee_workexp Class @2-FCB6E20C

class clsemployee_employee_workexpDataSource extends clsDBConnection1 {  //employee_employee_workexpDataSource Class @2-6B2FF88A

//DataSource Variables @2-AC124433
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $ReportLabel2;
    var $DateFrom;
    var $DateTo;
    var $PositionTitle;
    var $Department;
    var $MonthlySalary;
    var $SalaryGrade;
    var $StatusOfAppt;
    var $GovernmentService;
    var $StepIncremt;
    var $Surname;
    var $MiddleName;
    var $NameExtension;
    var $EmployeeIDNo;
    var $FirstName;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-DAF96928
    function clsemployee_employee_workexpDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_employee_workexp";
        $this->Initialize();
        $this->ReportLabel2 = new clsField("ReportLabel2", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsDate, $this->DateFormat);
        
        $this->PositionTitle = new clsField("PositionTitle", ccsText, "");
        
        $this->Department = new clsField("Department", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->SalaryGrade = new clsField("SalaryGrade", ccsText, "");
        
        $this->StatusOfAppt = new clsField("StatusOfAppt", ccsText, "");
        
        $this->GovernmentService = new clsField("GovernmentService", ccsText, "");
        
        $this->StepIncremt = new clsField("StepIncremt", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-FEBFE8E7
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateFrom desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-B547B724
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-112F5C18
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT EmployeeIDNo, employee_workexperience.*, Surname, FirstName, MiddleName, NameExtension, EmpPicture \n\n" .
        "FROM employee_workexperience INNER JOIN employee ON\n\n" .
        "employee_workexperience.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-004DCFDA
    function SetValues()
    {
        $this->ReportLabel2->SetDBValue($this->f("EmpPicture"));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue(trim($this->f("DateTo")));
        $this->PositionTitle->SetDBValue($this->f("PositionTitle"));
        $this->Department->SetDBValue($this->f("Department"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->SalaryGrade->SetDBValue($this->f("SalaryGrade"));
        $this->StatusOfAppt->SetDBValue($this->f("StatusOfAppt"));
        $this->GovernmentService->SetDBValue($this->f("GovernmentService"));
        $this->StepIncremt->SetDBValue($this->f("StepIncremt"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
    }
//End SetValues Method

} //End employee_employee_workexpDataSource Class @2-FCB6E20C

//Initialize Page @1-3FDED022
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
$TemplateFileName = "QEmp_WorkExp3.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-478D6C9D
include_once("./QEmp_WorkExp3_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-524E1768
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_employee_workexp = & new clsReportemployee_employee_workexp("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QEmp_WorkExp3_print.php";
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q_Employee.php";
$MainPage->employee_employee_workexp = & $employee_employee_workexp;
$MainPage->Report_Print = & $Report_Print;
$MainPage->Link1 = & $Link1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_employee_workexp->Initialize();

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

//Go to destination page @1-16861322
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_employee_workexp);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-AD392A8E
$employee_employee_workexp->Show();
$Report_Print->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-156F7E9D
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_employee_workexp);
unset($Tpl);
//End Unload Page


?>
