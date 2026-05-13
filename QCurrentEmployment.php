<?php
//Include Common Files @1-401EFB5A
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QCurrentEmployment.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_departmentoffice ReportGroup class @2-FF5288E7
class clsReportGroupemployee_departmentoffice {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Position, $_PositionAttributes;
    var $ItemNo, $_ItemNoAttributes;
    var $EffectiveMonth, $_EffectiveMonthAttributes;
    var $SalaryGrade, $_SalaryGradeAttributes;
    var $MonthlySalary, $_MonthlySalaryAttributes;
    var $StatAppt, $_StatApptAttributes;
    var $NameOfficeDept, $_NameOfficeDeptAttributes;
    var $OrigApptMonth, $_OrigApptMonthAttributes;
    var $PromotedMonth, $_PromotedMonthAttributes;
    var $CompRetireMonth, $_CompRetireMonthAttributes;
    var $EmpPicture4, $_EmpPicture4Attributes;
    var $EffectiveDay, $_EffectiveDayAttributes;
    var $EffectiveYear, $_EffectiveYearAttributes;
    var $StepIncrement, $_StepIncrementAttributes;
    var $OrigApptDay, $_OrigApptDayAttributes;
    var $OrigApptYear, $_OrigApptYearAttributes;
    var $PromotedDay, $_PromotedDayAttributes;
    var $PromotedYear, $_PromotedYearAttributes;
    var $CompRetireDay, $_CompRetireDayAttributes;
    var $CompRetireYear, $_CompRetireYearAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
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
        $this->Position = $this->Parent->Position->Value;
        $this->ItemNo = $this->Parent->ItemNo->Value;
        $this->EffectiveMonth = $this->Parent->EffectiveMonth->Value;
        $this->SalaryGrade = $this->Parent->SalaryGrade->Value;
        $this->MonthlySalary = $this->Parent->MonthlySalary->Value;
        $this->StatAppt = $this->Parent->StatAppt->Value;
        $this->NameOfficeDept = $this->Parent->NameOfficeDept->Value;
        $this->OrigApptMonth = $this->Parent->OrigApptMonth->Value;
        $this->PromotedMonth = $this->Parent->PromotedMonth->Value;
        $this->CompRetireMonth = $this->Parent->CompRetireMonth->Value;
        $this->EmpPicture4 = $this->Parent->EmpPicture4->Value;
        $this->EffectiveDay = $this->Parent->EffectiveDay->Value;
        $this->EffectiveYear = $this->Parent->EffectiveYear->Value;
        $this->StepIncrement = $this->Parent->StepIncrement->Value;
        $this->OrigApptDay = $this->Parent->OrigApptDay->Value;
        $this->OrigApptYear = $this->Parent->OrigApptYear->Value;
        $this->PromotedDay = $this->Parent->PromotedDay->Value;
        $this->PromotedYear = $this->Parent->PromotedYear->Value;
        $this->CompRetireDay = $this->Parent->CompRetireDay->Value;
        $this->CompRetireYear = $this->Parent->CompRetireYear->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_PositionAttributes = $this->Parent->Position->Attributes->GetAsArray();
        $this->_ItemNoAttributes = $this->Parent->ItemNo->Attributes->GetAsArray();
        $this->_EffectiveMonthAttributes = $this->Parent->EffectiveMonth->Attributes->GetAsArray();
        $this->_SalaryGradeAttributes = $this->Parent->SalaryGrade->Attributes->GetAsArray();
        $this->_MonthlySalaryAttributes = $this->Parent->MonthlySalary->Attributes->GetAsArray();
        $this->_StatApptAttributes = $this->Parent->StatAppt->Attributes->GetAsArray();
        $this->_NameOfficeDeptAttributes = $this->Parent->NameOfficeDept->Attributes->GetAsArray();
        $this->_OrigApptMonthAttributes = $this->Parent->OrigApptMonth->Attributes->GetAsArray();
        $this->_PromotedMonthAttributes = $this->Parent->PromotedMonth->Attributes->GetAsArray();
        $this->_CompRetireMonthAttributes = $this->Parent->CompRetireMonth->Attributes->GetAsArray();
        $this->_EmpPicture4Attributes = $this->Parent->EmpPicture4->Attributes->GetAsArray();
        $this->_EffectiveDayAttributes = $this->Parent->EffectiveDay->Attributes->GetAsArray();
        $this->_EffectiveYearAttributes = $this->Parent->EffectiveYear->Attributes->GetAsArray();
        $this->_StepIncrementAttributes = $this->Parent->StepIncrement->Attributes->GetAsArray();
        $this->_OrigApptDayAttributes = $this->Parent->OrigApptDay->Attributes->GetAsArray();
        $this->_OrigApptYearAttributes = $this->Parent->OrigApptYear->Attributes->GetAsArray();
        $this->_PromotedDayAttributes = $this->Parent->PromotedDay->Attributes->GetAsArray();
        $this->_PromotedYearAttributes = $this->Parent->PromotedYear->Attributes->GetAsArray();
        $this->_CompRetireDayAttributes = $this->Parent->CompRetireDay->Attributes->GetAsArray();
        $this->_CompRetireYearAttributes = $this->Parent->CompRetireYear->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->Position = $Header->Position;
        $Header->_PositionAttributes = $this->_PositionAttributes;
        $this->Parent->Position->Value = $Header->Position;
        $this->Parent->Position->Attributes->RestoreFromArray($Header->_PositionAttributes);
        $this->ItemNo = $Header->ItemNo;
        $Header->_ItemNoAttributes = $this->_ItemNoAttributes;
        $this->Parent->ItemNo->Value = $Header->ItemNo;
        $this->Parent->ItemNo->Attributes->RestoreFromArray($Header->_ItemNoAttributes);
        $this->EffectiveMonth = $Header->EffectiveMonth;
        $Header->_EffectiveMonthAttributes = $this->_EffectiveMonthAttributes;
        $this->Parent->EffectiveMonth->Value = $Header->EffectiveMonth;
        $this->Parent->EffectiveMonth->Attributes->RestoreFromArray($Header->_EffectiveMonthAttributes);
        $this->SalaryGrade = $Header->SalaryGrade;
        $Header->_SalaryGradeAttributes = $this->_SalaryGradeAttributes;
        $this->Parent->SalaryGrade->Value = $Header->SalaryGrade;
        $this->Parent->SalaryGrade->Attributes->RestoreFromArray($Header->_SalaryGradeAttributes);
        $this->MonthlySalary = $Header->MonthlySalary;
        $Header->_MonthlySalaryAttributes = $this->_MonthlySalaryAttributes;
        $this->Parent->MonthlySalary->Value = $Header->MonthlySalary;
        $this->Parent->MonthlySalary->Attributes->RestoreFromArray($Header->_MonthlySalaryAttributes);
        $this->StatAppt = $Header->StatAppt;
        $Header->_StatApptAttributes = $this->_StatApptAttributes;
        $this->Parent->StatAppt->Value = $Header->StatAppt;
        $this->Parent->StatAppt->Attributes->RestoreFromArray($Header->_StatApptAttributes);
        $this->NameOfficeDept = $Header->NameOfficeDept;
        $Header->_NameOfficeDeptAttributes = $this->_NameOfficeDeptAttributes;
        $this->Parent->NameOfficeDept->Value = $Header->NameOfficeDept;
        $this->Parent->NameOfficeDept->Attributes->RestoreFromArray($Header->_NameOfficeDeptAttributes);
        $this->OrigApptMonth = $Header->OrigApptMonth;
        $Header->_OrigApptMonthAttributes = $this->_OrigApptMonthAttributes;
        $this->Parent->OrigApptMonth->Value = $Header->OrigApptMonth;
        $this->Parent->OrigApptMonth->Attributes->RestoreFromArray($Header->_OrigApptMonthAttributes);
        $this->PromotedMonth = $Header->PromotedMonth;
        $Header->_PromotedMonthAttributes = $this->_PromotedMonthAttributes;
        $this->Parent->PromotedMonth->Value = $Header->PromotedMonth;
        $this->Parent->PromotedMonth->Attributes->RestoreFromArray($Header->_PromotedMonthAttributes);
        $this->CompRetireMonth = $Header->CompRetireMonth;
        $Header->_CompRetireMonthAttributes = $this->_CompRetireMonthAttributes;
        $this->Parent->CompRetireMonth->Value = $Header->CompRetireMonth;
        $this->Parent->CompRetireMonth->Attributes->RestoreFromArray($Header->_CompRetireMonthAttributes);
        $this->EmpPicture4 = $Header->EmpPicture4;
        $Header->_EmpPicture4Attributes = $this->_EmpPicture4Attributes;
        $this->Parent->EmpPicture4->Value = $Header->EmpPicture4;
        $this->Parent->EmpPicture4->Attributes->RestoreFromArray($Header->_EmpPicture4Attributes);
        $this->EffectiveDay = $Header->EffectiveDay;
        $Header->_EffectiveDayAttributes = $this->_EffectiveDayAttributes;
        $this->Parent->EffectiveDay->Value = $Header->EffectiveDay;
        $this->Parent->EffectiveDay->Attributes->RestoreFromArray($Header->_EffectiveDayAttributes);
        $this->EffectiveYear = $Header->EffectiveYear;
        $Header->_EffectiveYearAttributes = $this->_EffectiveYearAttributes;
        $this->Parent->EffectiveYear->Value = $Header->EffectiveYear;
        $this->Parent->EffectiveYear->Attributes->RestoreFromArray($Header->_EffectiveYearAttributes);
        $this->StepIncrement = $Header->StepIncrement;
        $Header->_StepIncrementAttributes = $this->_StepIncrementAttributes;
        $this->Parent->StepIncrement->Value = $Header->StepIncrement;
        $this->Parent->StepIncrement->Attributes->RestoreFromArray($Header->_StepIncrementAttributes);
        $this->OrigApptDay = $Header->OrigApptDay;
        $Header->_OrigApptDayAttributes = $this->_OrigApptDayAttributes;
        $this->Parent->OrigApptDay->Value = $Header->OrigApptDay;
        $this->Parent->OrigApptDay->Attributes->RestoreFromArray($Header->_OrigApptDayAttributes);
        $this->OrigApptYear = $Header->OrigApptYear;
        $Header->_OrigApptYearAttributes = $this->_OrigApptYearAttributes;
        $this->Parent->OrigApptYear->Value = $Header->OrigApptYear;
        $this->Parent->OrigApptYear->Attributes->RestoreFromArray($Header->_OrigApptYearAttributes);
        $this->PromotedDay = $Header->PromotedDay;
        $Header->_PromotedDayAttributes = $this->_PromotedDayAttributes;
        $this->Parent->PromotedDay->Value = $Header->PromotedDay;
        $this->Parent->PromotedDay->Attributes->RestoreFromArray($Header->_PromotedDayAttributes);
        $this->PromotedYear = $Header->PromotedYear;
        $Header->_PromotedYearAttributes = $this->_PromotedYearAttributes;
        $this->Parent->PromotedYear->Value = $Header->PromotedYear;
        $this->Parent->PromotedYear->Attributes->RestoreFromArray($Header->_PromotedYearAttributes);
        $this->CompRetireDay = $Header->CompRetireDay;
        $Header->_CompRetireDayAttributes = $this->_CompRetireDayAttributes;
        $this->Parent->CompRetireDay->Value = $Header->CompRetireDay;
        $this->Parent->CompRetireDay->Attributes->RestoreFromArray($Header->_CompRetireDayAttributes);
        $this->CompRetireYear = $Header->CompRetireYear;
        $Header->_CompRetireYearAttributes = $this->_CompRetireYearAttributes;
        $this->Parent->CompRetireYear->Value = $Header->CompRetireYear;
        $this->Parent->CompRetireYear->Attributes->RestoreFromArray($Header->_CompRetireYearAttributes);
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
        $this->EmployeeIDNo = $Header->EmployeeIDNo;
        $Header->_EmployeeIDNoAttributes = $this->_EmployeeIDNoAttributes;
        $this->Parent->EmployeeIDNo->Value = $Header->EmployeeIDNo;
        $this->Parent->EmployeeIDNo->Attributes->RestoreFromArray($Header->_EmployeeIDNoAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee_departmentoffice ReportGroup class

//employee_departmentoffice GroupsCollection class @2-A88A4B4A
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
        $this->Parent->Position->Value = $this->Parent->Position->initialValue;
        $this->Parent->ItemNo->Value = $this->Parent->ItemNo->initialValue;
        $this->Parent->EffectiveMonth->Value = $this->Parent->EffectiveMonth->initialValue;
        $this->Parent->SalaryGrade->Value = $this->Parent->SalaryGrade->initialValue;
        $this->Parent->MonthlySalary->Value = $this->Parent->MonthlySalary->initialValue;
        $this->Parent->StatAppt->Value = $this->Parent->StatAppt->initialValue;
        $this->Parent->NameOfficeDept->Value = $this->Parent->NameOfficeDept->initialValue;
        $this->Parent->OrigApptMonth->Value = $this->Parent->OrigApptMonth->initialValue;
        $this->Parent->PromotedMonth->Value = $this->Parent->PromotedMonth->initialValue;
        $this->Parent->CompRetireMonth->Value = $this->Parent->CompRetireMonth->initialValue;
        $this->Parent->EmpPicture4->Value = $this->Parent->EmpPicture4->initialValue;
        $this->Parent->EffectiveDay->Value = $this->Parent->EffectiveDay->initialValue;
        $this->Parent->EffectiveYear->Value = $this->Parent->EffectiveYear->initialValue;
        $this->Parent->StepIncrement->Value = $this->Parent->StepIncrement->initialValue;
        $this->Parent->OrigApptDay->Value = $this->Parent->OrigApptDay->initialValue;
        $this->Parent->OrigApptYear->Value = $this->Parent->OrigApptYear->initialValue;
        $this->Parent->PromotedDay->Value = $this->Parent->PromotedDay->initialValue;
        $this->Parent->PromotedYear->Value = $this->Parent->PromotedYear->initialValue;
        $this->Parent->CompRetireDay->Value = $this->Parent->CompRetireDay->initialValue;
        $this->Parent->CompRetireYear->Value = $this->Parent->CompRetireYear->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
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

//Class_Initialize Event @2-62A45C0E
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
        $this->Detail->Height = 24;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployee_departmentofficeDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 65;
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

        $this->Position = & new clsControl(ccsReportLabel, "Position", "Position", ccsText, "", "", $this);
        $this->ItemNo = & new clsControl(ccsReportLabel, "ItemNo", "ItemNo", ccsText, "", "", $this);
        $this->EffectiveMonth = & new clsControl(ccsReportLabel, "EffectiveMonth", "EffectiveMonth", ccsText, "", "", $this);
        $this->SalaryGrade = & new clsControl(ccsReportLabel, "SalaryGrade", "SalaryGrade", ccsText, "", "", $this);
        $this->MonthlySalary = & new clsControl(ccsReportLabel, "MonthlySalary", "MonthlySalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->StatAppt = & new clsControl(ccsReportLabel, "StatAppt", "StatAppt", ccsText, "", "", $this);
        $this->NameOfficeDept = & new clsControl(ccsReportLabel, "NameOfficeDept", "NameOfficeDept", ccsText, "", "", $this);
        $this->OrigApptMonth = & new clsControl(ccsReportLabel, "OrigApptMonth", "OrigApptMonth", ccsText, "", "", $this);
        $this->PromotedMonth = & new clsControl(ccsReportLabel, "PromotedMonth", "PromotedMonth", ccsText, "", "", $this);
        $this->CompRetireMonth = & new clsControl(ccsReportLabel, "CompRetireMonth", "CompRetireMonth", ccsText, "", "", $this);
        $this->EmpPicture4 = & new clsControl(ccsImage, "EmpPicture4", "EmpPicture4", ccsText, "", CCGetRequestParam("EmpPicture4", ccsGet, NULL), $this);
        $this->EffectiveDay = & new clsControl(ccsReportLabel, "EffectiveDay", "EffectiveDay", ccsText, "", "", $this);
        $this->EffectiveYear = & new clsControl(ccsReportLabel, "EffectiveYear", "EffectiveYear", ccsText, "", "", $this);
        $this->StepIncrement = & new clsControl(ccsReportLabel, "StepIncrement", "StepIncrement", ccsText, "", "", $this);
        $this->OrigApptDay = & new clsControl(ccsReportLabel, "OrigApptDay", "OrigApptDay", ccsText, "", "", $this);
        $this->OrigApptYear = & new clsControl(ccsReportLabel, "OrigApptYear", "OrigApptYear", ccsText, "", "", $this);
        $this->PromotedDay = & new clsControl(ccsReportLabel, "PromotedDay", "PromotedDay", ccsText, "", "", $this);
        $this->PromotedYear = & new clsControl(ccsReportLabel, "PromotedYear", "PromotedYear", ccsText, "", "", $this);
        $this->CompRetireDay = & new clsControl(ccsReportLabel, "CompRetireDay", "CompRetireDay", ccsText, "", "", $this);
        $this->CompRetireYear = & new clsControl(ccsReportLabel, "CompRetireYear", "CompRetireYear", ccsText, "", "", $this);
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->NameExtension = & new clsControl(ccsReportLabel, "NameExtension", "NameExtension", ccsText, "", "", $this);
        $this->EmployeeIDNo = & new clsControl(ccsReportLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", "", $this);
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

//CheckErrors Method @2-9240CF59
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->ItemNo->Errors->Count());
        $errors = ($errors || $this->EffectiveMonth->Errors->Count());
        $errors = ($errors || $this->SalaryGrade->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->StatAppt->Errors->Count());
        $errors = ($errors || $this->NameOfficeDept->Errors->Count());
        $errors = ($errors || $this->OrigApptMonth->Errors->Count());
        $errors = ($errors || $this->PromotedMonth->Errors->Count());
        $errors = ($errors || $this->CompRetireMonth->Errors->Count());
        $errors = ($errors || $this->EmpPicture4->Errors->Count());
        $errors = ($errors || $this->EffectiveDay->Errors->Count());
        $errors = ($errors || $this->EffectiveYear->Errors->Count());
        $errors = ($errors || $this->StepIncrement->Errors->Count());
        $errors = ($errors || $this->OrigApptDay->Errors->Count());
        $errors = ($errors || $this->OrigApptYear->Errors->Count());
        $errors = ($errors || $this->PromotedDay->Errors->Count());
        $errors = ($errors || $this->PromotedYear->Errors->Count());
        $errors = ($errors || $this->CompRetireDay->Errors->Count());
        $errors = ($errors || $this->CompRetireYear->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-CAF0F2B6
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ItemNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EffectiveMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SalaryGrade->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameOfficeDept->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OrigApptMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PromotedMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CompRetireMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmpPicture4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EffectiveDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EffectiveYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StepIncrement->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OrigApptDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OrigApptYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PromotedDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PromotedYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CompRetireDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CompRetireYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-F632909B
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

        $Groups = new clsGroupsCollectionemployee_departmentoffice($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Position->SetValue($this->DataSource->Position->GetValue());
            $this->ItemNo->SetValue($this->DataSource->ItemNo->GetValue());
            $this->EffectiveMonth->SetValue($this->DataSource->EffectiveMonth->GetValue());
            $this->SalaryGrade->SetValue($this->DataSource->SalaryGrade->GetValue());
            $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
            $this->StatAppt->SetValue($this->DataSource->StatAppt->GetValue());
            $this->NameOfficeDept->SetValue($this->DataSource->NameOfficeDept->GetValue());
            $this->OrigApptMonth->SetValue($this->DataSource->OrigApptMonth->GetValue());
            $this->PromotedMonth->SetValue($this->DataSource->PromotedMonth->GetValue());
            $this->CompRetireMonth->SetValue($this->DataSource->CompRetireMonth->GetValue());
            $this->EmpPicture4->SetValue($this->DataSource->EmpPicture4->GetValue());
            $this->EffectiveDay->SetValue($this->DataSource->EffectiveDay->GetValue());
            $this->EffectiveYear->SetValue($this->DataSource->EffectiveYear->GetValue());
            $this->StepIncrement->SetValue($this->DataSource->StepIncrement->GetValue());
            $this->OrigApptDay->SetValue($this->DataSource->OrigApptDay->GetValue());
            $this->OrigApptYear->SetValue($this->DataSource->OrigApptYear->GetValue());
            $this->PromotedDay->SetValue($this->DataSource->PromotedDay->GetValue());
            $this->PromotedYear->SetValue($this->DataSource->PromotedYear->GetValue());
            $this->CompRetireDay->SetValue($this->DataSource->CompRetireDay->GetValue());
            $this->CompRetireYear->SetValue($this->DataSource->CompRetireYear->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
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
            $this->ControlsVisible["Position"] = $this->Position->Visible;
            $this->ControlsVisible["ItemNo"] = $this->ItemNo->Visible;
            $this->ControlsVisible["EffectiveMonth"] = $this->EffectiveMonth->Visible;
            $this->ControlsVisible["SalaryGrade"] = $this->SalaryGrade->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["StatAppt"] = $this->StatAppt->Visible;
            $this->ControlsVisible["NameOfficeDept"] = $this->NameOfficeDept->Visible;
            $this->ControlsVisible["OrigApptMonth"] = $this->OrigApptMonth->Visible;
            $this->ControlsVisible["PromotedMonth"] = $this->PromotedMonth->Visible;
            $this->ControlsVisible["CompRetireMonth"] = $this->CompRetireMonth->Visible;
            $this->ControlsVisible["EmpPicture4"] = $this->EmpPicture4->Visible;
            $this->ControlsVisible["EffectiveDay"] = $this->EffectiveDay->Visible;
            $this->ControlsVisible["EffectiveYear"] = $this->EffectiveYear->Visible;
            $this->ControlsVisible["StepIncrement"] = $this->StepIncrement->Visible;
            $this->ControlsVisible["OrigApptDay"] = $this->OrigApptDay->Visible;
            $this->ControlsVisible["OrigApptYear"] = $this->OrigApptYear->Visible;
            $this->ControlsVisible["PromotedDay"] = $this->PromotedDay->Visible;
            $this->ControlsVisible["PromotedYear"] = $this->PromotedYear->Visible;
            $this->ControlsVisible["CompRetireDay"] = $this->CompRetireDay->Visible;
            $this->ControlsVisible["CompRetireYear"] = $this->CompRetireYear->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Position->SetValue($items[$i]->Position);
                        $this->Position->Attributes->RestoreFromArray($items[$i]->_PositionAttributes);
                        $this->ItemNo->SetValue($items[$i]->ItemNo);
                        $this->ItemNo->Attributes->RestoreFromArray($items[$i]->_ItemNoAttributes);
                        $this->EffectiveMonth->SetValue($items[$i]->EffectiveMonth);
                        $this->EffectiveMonth->Attributes->RestoreFromArray($items[$i]->_EffectiveMonthAttributes);
                        $this->SalaryGrade->SetValue($items[$i]->SalaryGrade);
                        $this->SalaryGrade->Attributes->RestoreFromArray($items[$i]->_SalaryGradeAttributes);
                        $this->MonthlySalary->SetValue($items[$i]->MonthlySalary);
                        $this->MonthlySalary->Attributes->RestoreFromArray($items[$i]->_MonthlySalaryAttributes);
                        $this->StatAppt->SetValue($items[$i]->StatAppt);
                        $this->StatAppt->Attributes->RestoreFromArray($items[$i]->_StatApptAttributes);
                        $this->NameOfficeDept->SetValue($items[$i]->NameOfficeDept);
                        $this->NameOfficeDept->Attributes->RestoreFromArray($items[$i]->_NameOfficeDeptAttributes);
                        $this->OrigApptMonth->SetValue($items[$i]->OrigApptMonth);
                        $this->OrigApptMonth->Attributes->RestoreFromArray($items[$i]->_OrigApptMonthAttributes);
                        $this->PromotedMonth->SetValue($items[$i]->PromotedMonth);
                        $this->PromotedMonth->Attributes->RestoreFromArray($items[$i]->_PromotedMonthAttributes);
                        $this->CompRetireMonth->SetValue($items[$i]->CompRetireMonth);
                        $this->CompRetireMonth->Attributes->RestoreFromArray($items[$i]->_CompRetireMonthAttributes);
                        $this->EmpPicture4->SetValue($items[$i]->EmpPicture4);
                        $this->EmpPicture4->Attributes->RestoreFromArray($items[$i]->_EmpPicture4Attributes);
                        $this->EffectiveDay->SetValue($items[$i]->EffectiveDay);
                        $this->EffectiveDay->Attributes->RestoreFromArray($items[$i]->_EffectiveDayAttributes);
                        $this->EffectiveYear->SetValue($items[$i]->EffectiveYear);
                        $this->EffectiveYear->Attributes->RestoreFromArray($items[$i]->_EffectiveYearAttributes);
                        $this->StepIncrement->SetValue($items[$i]->StepIncrement);
                        $this->StepIncrement->Attributes->RestoreFromArray($items[$i]->_StepIncrementAttributes);
                        $this->OrigApptDay->SetValue($items[$i]->OrigApptDay);
                        $this->OrigApptDay->Attributes->RestoreFromArray($items[$i]->_OrigApptDayAttributes);
                        $this->OrigApptYear->SetValue($items[$i]->OrigApptYear);
                        $this->OrigApptYear->Attributes->RestoreFromArray($items[$i]->_OrigApptYearAttributes);
                        $this->PromotedDay->SetValue($items[$i]->PromotedDay);
                        $this->PromotedDay->Attributes->RestoreFromArray($items[$i]->_PromotedDayAttributes);
                        $this->PromotedYear->SetValue($items[$i]->PromotedYear);
                        $this->PromotedYear->Attributes->RestoreFromArray($items[$i]->_PromotedYearAttributes);
                        $this->CompRetireDay->SetValue($items[$i]->CompRetireDay);
                        $this->CompRetireDay->Attributes->RestoreFromArray($items[$i]->_CompRetireDayAttributes);
                        $this->CompRetireYear->SetValue($items[$i]->CompRetireYear);
                        $this->CompRetireYear->Attributes->RestoreFromArray($items[$i]->_CompRetireYearAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Position->Show();
                        $this->ItemNo->Show();
                        $this->EffectiveMonth->Show();
                        $this->SalaryGrade->Show();
                        $this->MonthlySalary->Show();
                        $this->StatAppt->Show();
                        $this->NameOfficeDept->Show();
                        $this->OrigApptMonth->Show();
                        $this->PromotedMonth->Show();
                        $this->CompRetireMonth->Show();
                        $this->EmpPicture4->Show();
                        $this->EffectiveDay->Show();
                        $this->EffectiveYear->Show();
                        $this->StepIncrement->Show();
                        $this->OrigApptDay->Show();
                        $this->OrigApptYear->Show();
                        $this->PromotedDay->Show();
                        $this->PromotedYear->Show();
                        $this->CompRetireDay->Show();
                        $this->CompRetireYear->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->NameExtension->Show();
                        $this->EmployeeIDNo->Show();
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

} //End employee_departmentoffice Class @2-FCB6E20C

class clsemployee_departmentofficeDataSource extends clsDBConnection1 {  //employee_departmentofficeDataSource Class @2-7B43C9D8

//DataSource Variables @2-C6D7216B
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Position;
    var $ItemNo;
    var $EffectiveMonth;
    var $SalaryGrade;
    var $MonthlySalary;
    var $StatAppt;
    var $NameOfficeDept;
    var $OrigApptMonth;
    var $PromotedMonth;
    var $CompRetireMonth;
    var $EmpPicture4;
    var $EffectiveDay;
    var $EffectiveYear;
    var $StepIncrement;
    var $OrigApptDay;
    var $OrigApptYear;
    var $PromotedDay;
    var $PromotedYear;
    var $CompRetireDay;
    var $CompRetireYear;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $NameExtension;
    var $EmployeeIDNo;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-A06E9AB1
    function clsemployee_departmentofficeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_departmentoffice";
        $this->Initialize();
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->ItemNo = new clsField("ItemNo", ccsText, "");
        
        $this->EffectiveMonth = new clsField("EffectiveMonth", ccsText, "");
        
        $this->SalaryGrade = new clsField("SalaryGrade", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->StatAppt = new clsField("StatAppt", ccsText, "");
        
        $this->NameOfficeDept = new clsField("NameOfficeDept", ccsText, "");
        
        $this->OrigApptMonth = new clsField("OrigApptMonth", ccsText, "");
        
        $this->PromotedMonth = new clsField("PromotedMonth", ccsText, "");
        
        $this->CompRetireMonth = new clsField("CompRetireMonth", ccsText, "");
        
        $this->EmpPicture4 = new clsField("EmpPicture4", ccsText, "");
        
        $this->EffectiveDay = new clsField("EffectiveDay", ccsText, "");
        
        $this->EffectiveYear = new clsField("EffectiveYear", ccsText, "");
        
        $this->StepIncrement = new clsField("StepIncrement", ccsText, "");
        
        $this->OrigApptDay = new clsField("OrigApptDay", ccsText, "");
        
        $this->OrigApptYear = new clsField("OrigApptYear", ccsText, "");
        
        $this->PromotedDay = new clsField("PromotedDay", ccsText, "");
        
        $this->PromotedYear = new clsField("PromotedYear", ccsText, "");
        
        $this->CompRetireDay = new clsField("CompRetireDay", ccsText, "");
        
        $this->CompRetireYear = new clsField("CompRetireYear", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-C77BE6EA
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Surname";
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

//Open Method @2-F9D9EA44
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT employee.*, NameOfficeDept \n\n" .
        "FROM employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-1435A368
    function SetValues()
    {
        $this->Position->SetDBValue($this->f("Position"));
        $this->ItemNo->SetDBValue($this->f("ItemNo"));
        $this->EffectiveMonth->SetDBValue($this->f("EffectiveMonth"));
        $this->SalaryGrade->SetDBValue($this->f("SalaryGrade"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->StatAppt->SetDBValue($this->f("StatAppt"));
        $this->NameOfficeDept->SetDBValue($this->f("NameOfficeDept"));
        $this->OrigApptMonth->SetDBValue($this->f("OrigApptMonth"));
        $this->PromotedMonth->SetDBValue($this->f("PromotedMonth"));
        $this->CompRetireMonth->SetDBValue($this->f("CompRetireMonth"));
        $this->EmpPicture4->SetDBValue($this->f("EmpPicture"));
        $this->EffectiveDay->SetDBValue($this->f("EffectiveDay"));
        $this->EffectiveYear->SetDBValue($this->f("EffectiveYear"));
        $this->StepIncrement->SetDBValue($this->f("StepIncrement"));
        $this->OrigApptDay->SetDBValue($this->f("OrigApptDay"));
        $this->OrigApptYear->SetDBValue($this->f("OrigApptYear"));
        $this->PromotedDay->SetDBValue($this->f("PromotedDay"));
        $this->PromotedYear->SetDBValue($this->f("PromotedYear"));
        $this->CompRetireDay->SetDBValue($this->f("CompRetireDay"));
        $this->CompRetireYear->SetDBValue($this->f("CompRetireYear"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
    }
//End SetValues Method

} //End employee_departmentofficeDataSource Class @2-FCB6E20C

//Initialize Page @1-F6726C65
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
$TemplateFileName = "QCurrentEmployment.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-35D8B439
include_once("./QCurrentEmployment_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A3AF419C
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_departmentoffice = & new clsReportemployee_departmentoffice("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q2.php";
$MainPage->employee_departmentoffice = & $employee_departmentoffice;
$MainPage->Link1 = & $Link1;
$employee_departmentoffice->Initialize();

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

//Go to destination page @1-25E9DCF5
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_departmentoffice);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-ADBB5019
$employee_departmentoffice->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C28056DC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_departmentoffice);
unset($Tpl);
//End Unload Page


?>
