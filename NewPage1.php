<?php
//Include Common Files @1-EDC1CE42
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "NewPage1.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_employee_leave ReportGroup class @2-D55C0B39
class clsReportGroupemployee_employee_leave {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $LeaveID, $_LeaveIDAttributes;
    var $EmployeeID, $_EmployeeIDAttributes;
    var $LeaveMonth, $_LeaveMonthAttributes;
    var $LeaveYear, $_LeaveYearAttributes;
    var $Particular, $_ParticularAttributes;
    var $VLEarned, $_VLEarnedAttributes;
    var $VLAbsenceUndertWpay, $_VLAbsenceUndertWpayAttributes;
    var $VLPrevBalance, $_VLPrevBalanceAttributes;
    var $VLUndertWopay, $_VLUndertWopayAttributes;
    var $SLEarned, $_SLEarnedAttributes;
    var $SLAbsenceWpay, $_SLAbsenceWpayAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_employee_leave(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->LeaveID = $this->Parent->LeaveID->Value;
        $this->EmployeeID = $this->Parent->EmployeeID->Value;
        $this->LeaveMonth = $this->Parent->LeaveMonth->Value;
        $this->LeaveYear = $this->Parent->LeaveYear->Value;
        $this->Particular = $this->Parent->Particular->Value;
        $this->VLEarned = $this->Parent->VLEarned->Value;
        $this->VLAbsenceUndertWpay = $this->Parent->VLAbsenceUndertWpay->Value;
        $this->VLPrevBalance = $this->Parent->VLPrevBalance->Value;
        $this->VLUndertWopay = $this->Parent->VLUndertWopay->Value;
        $this->SLEarned = $this->Parent->SLEarned->Value;
        $this->SLAbsenceWpay = $this->Parent->SLAbsenceWpay->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_Sorter_SurnameAttributes = $this->Parent->Sorter_Surname->Attributes->GetAsArray();
        $this->_Sorter_FirstNameAttributes = $this->Parent->Sorter_FirstName->Attributes->GetAsArray();
        $this->_Sorter_LeaveIDAttributes = $this->Parent->Sorter_LeaveID->Attributes->GetAsArray();
        $this->_Sorter_EmployeeIDAttributes = $this->Parent->Sorter_EmployeeID->Attributes->GetAsArray();
        $this->_Sorter_LeaveMonthAttributes = $this->Parent->Sorter_LeaveMonth->Attributes->GetAsArray();
        $this->_Sorter_LeaveYearAttributes = $this->Parent->Sorter_LeaveYear->Attributes->GetAsArray();
        $this->_Sorter_ParticularAttributes = $this->Parent->Sorter_Particular->Attributes->GetAsArray();
        $this->_Sorter_VLEarnedAttributes = $this->Parent->Sorter_VLEarned->Attributes->GetAsArray();
        $this->_Sorter_VLAbsenceUndertWpayAttributes = $this->Parent->Sorter_VLAbsenceUndertWpay->Attributes->GetAsArray();
        $this->_Sorter_VLPrevBalanceAttributes = $this->Parent->Sorter_VLPrevBalance->Attributes->GetAsArray();
        $this->_Sorter_VLUndertWopayAttributes = $this->Parent->Sorter_VLUndertWopay->Attributes->GetAsArray();
        $this->_Sorter_SLEarnedAttributes = $this->Parent->Sorter_SLEarned->Attributes->GetAsArray();
        $this->_Sorter_SLAbsenceWpayAttributes = $this->Parent->Sorter_SLAbsenceWpay->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_LeaveIDAttributes = $this->Parent->LeaveID->Attributes->GetAsArray();
        $this->_EmployeeIDAttributes = $this->Parent->EmployeeID->Attributes->GetAsArray();
        $this->_LeaveMonthAttributes = $this->Parent->LeaveMonth->Attributes->GetAsArray();
        $this->_LeaveYearAttributes = $this->Parent->LeaveYear->Attributes->GetAsArray();
        $this->_ParticularAttributes = $this->Parent->Particular->Attributes->GetAsArray();
        $this->_VLEarnedAttributes = $this->Parent->VLEarned->Attributes->GetAsArray();
        $this->_VLAbsenceUndertWpayAttributes = $this->Parent->VLAbsenceUndertWpay->Attributes->GetAsArray();
        $this->_VLPrevBalanceAttributes = $this->Parent->VLPrevBalance->Attributes->GetAsArray();
        $this->_VLUndertWopayAttributes = $this->Parent->VLUndertWopay->Attributes->GetAsArray();
        $this->_SLEarnedAttributes = $this->Parent->SLEarned->Attributes->GetAsArray();
        $this->_SLAbsenceWpayAttributes = $this->Parent->SLAbsenceWpay->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
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
        $this->LeaveID = $Header->LeaveID;
        $Header->_LeaveIDAttributes = $this->_LeaveIDAttributes;
        $this->Parent->LeaveID->Value = $Header->LeaveID;
        $this->Parent->LeaveID->Attributes->RestoreFromArray($Header->_LeaveIDAttributes);
        $this->EmployeeID = $Header->EmployeeID;
        $Header->_EmployeeIDAttributes = $this->_EmployeeIDAttributes;
        $this->Parent->EmployeeID->Value = $Header->EmployeeID;
        $this->Parent->EmployeeID->Attributes->RestoreFromArray($Header->_EmployeeIDAttributes);
        $this->LeaveMonth = $Header->LeaveMonth;
        $Header->_LeaveMonthAttributes = $this->_LeaveMonthAttributes;
        $this->Parent->LeaveMonth->Value = $Header->LeaveMonth;
        $this->Parent->LeaveMonth->Attributes->RestoreFromArray($Header->_LeaveMonthAttributes);
        $this->LeaveYear = $Header->LeaveYear;
        $Header->_LeaveYearAttributes = $this->_LeaveYearAttributes;
        $this->Parent->LeaveYear->Value = $Header->LeaveYear;
        $this->Parent->LeaveYear->Attributes->RestoreFromArray($Header->_LeaveYearAttributes);
        $this->Particular = $Header->Particular;
        $Header->_ParticularAttributes = $this->_ParticularAttributes;
        $this->Parent->Particular->Value = $Header->Particular;
        $this->Parent->Particular->Attributes->RestoreFromArray($Header->_ParticularAttributes);
        $this->VLEarned = $Header->VLEarned;
        $Header->_VLEarnedAttributes = $this->_VLEarnedAttributes;
        $this->Parent->VLEarned->Value = $Header->VLEarned;
        $this->Parent->VLEarned->Attributes->RestoreFromArray($Header->_VLEarnedAttributes);
        $this->VLAbsenceUndertWpay = $Header->VLAbsenceUndertWpay;
        $Header->_VLAbsenceUndertWpayAttributes = $this->_VLAbsenceUndertWpayAttributes;
        $this->Parent->VLAbsenceUndertWpay->Value = $Header->VLAbsenceUndertWpay;
        $this->Parent->VLAbsenceUndertWpay->Attributes->RestoreFromArray($Header->_VLAbsenceUndertWpayAttributes);
        $this->VLPrevBalance = $Header->VLPrevBalance;
        $Header->_VLPrevBalanceAttributes = $this->_VLPrevBalanceAttributes;
        $this->Parent->VLPrevBalance->Value = $Header->VLPrevBalance;
        $this->Parent->VLPrevBalance->Attributes->RestoreFromArray($Header->_VLPrevBalanceAttributes);
        $this->VLUndertWopay = $Header->VLUndertWopay;
        $Header->_VLUndertWopayAttributes = $this->_VLUndertWopayAttributes;
        $this->Parent->VLUndertWopay->Value = $Header->VLUndertWopay;
        $this->Parent->VLUndertWopay->Attributes->RestoreFromArray($Header->_VLUndertWopayAttributes);
        $this->SLEarned = $Header->SLEarned;
        $Header->_SLEarnedAttributes = $this->_SLEarnedAttributes;
        $this->Parent->SLEarned->Value = $Header->SLEarned;
        $this->Parent->SLEarned->Attributes->RestoreFromArray($Header->_SLEarnedAttributes);
        $this->SLAbsenceWpay = $Header->SLAbsenceWpay;
        $Header->_SLAbsenceWpayAttributes = $this->_SLAbsenceWpayAttributes;
        $this->Parent->SLAbsenceWpay->Value = $Header->SLAbsenceWpay;
        $this->Parent->SLAbsenceWpay->Attributes->RestoreFromArray($Header->_SLAbsenceWpayAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee_employee_leave ReportGroup class

//employee_employee_leave GroupsCollection class @2-91813FC5
class clsGroupsCollectionemployee_employee_leave {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_employee_leave(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_employee_leave($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->LeaveID->Value = $this->Parent->LeaveID->initialValue;
        $this->Parent->EmployeeID->Value = $this->Parent->EmployeeID->initialValue;
        $this->Parent->LeaveMonth->Value = $this->Parent->LeaveMonth->initialValue;
        $this->Parent->LeaveYear->Value = $this->Parent->LeaveYear->initialValue;
        $this->Parent->Particular->Value = $this->Parent->Particular->initialValue;
        $this->Parent->VLEarned->Value = $this->Parent->VLEarned->initialValue;
        $this->Parent->VLAbsenceUndertWpay->Value = $this->Parent->VLAbsenceUndertWpay->initialValue;
        $this->Parent->VLPrevBalance->Value = $this->Parent->VLPrevBalance->initialValue;
        $this->Parent->VLUndertWopay->Value = $this->Parent->VLUndertWopay->initialValue;
        $this->Parent->SLEarned->Value = $this->Parent->SLEarned->initialValue;
        $this->Parent->SLAbsenceWpay->Value = $this->Parent->SLAbsenceWpay->initialValue;
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
//End employee_employee_leave GroupsCollection class

class clsReportemployee_employee_leave { //employee_employee_leave Class @2-7B9C0478

//employee_employee_leave Variables @2-E7854FB5

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
    var $Sorter_Surname;
    var $Sorter_FirstName;
    var $Sorter_LeaveID;
    var $Sorter_EmployeeID;
    var $Sorter_LeaveMonth;
    var $Sorter_LeaveYear;
    var $Sorter_Particular;
    var $Sorter_VLEarned;
    var $Sorter_VLAbsenceUndertWpay;
    var $Sorter_VLPrevBalance;
    var $Sorter_VLUndertWopay;
    var $Sorter_SLEarned;
    var $Sorter_SLAbsenceWpay;
//End employee_employee_leave Variables

//Class_Initialize Event @2-ED27F9E8
    function clsReportemployee_employee_leave($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_employee_leave";
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
        $this->DataSource = new clsemployee_employee_leaveDataSource($this);
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
        $this->SorterName = CCGetParam("employee_employee_leaveOrder", "");
        $this->SorterDirection = CCGetParam("employee_employee_leaveDir", "");

        $this->Sorter_Surname = & new clsSorter($this->ComponentName, "Sorter_Surname", $FileName, $this);
        $this->Sorter_FirstName = & new clsSorter($this->ComponentName, "Sorter_FirstName", $FileName, $this);
        $this->Sorter_LeaveID = & new clsSorter($this->ComponentName, "Sorter_LeaveID", $FileName, $this);
        $this->Sorter_EmployeeID = & new clsSorter($this->ComponentName, "Sorter_EmployeeID", $FileName, $this);
        $this->Sorter_LeaveMonth = & new clsSorter($this->ComponentName, "Sorter_LeaveMonth", $FileName, $this);
        $this->Sorter_LeaveYear = & new clsSorter($this->ComponentName, "Sorter_LeaveYear", $FileName, $this);
        $this->Sorter_Particular = & new clsSorter($this->ComponentName, "Sorter_Particular", $FileName, $this);
        $this->Sorter_VLEarned = & new clsSorter($this->ComponentName, "Sorter_VLEarned", $FileName, $this);
        $this->Sorter_VLAbsenceUndertWpay = & new clsSorter($this->ComponentName, "Sorter_VLAbsenceUndertWpay", $FileName, $this);
        $this->Sorter_VLPrevBalance = & new clsSorter($this->ComponentName, "Sorter_VLPrevBalance", $FileName, $this);
        $this->Sorter_VLUndertWopay = & new clsSorter($this->ComponentName, "Sorter_VLUndertWopay", $FileName, $this);
        $this->Sorter_SLEarned = & new clsSorter($this->ComponentName, "Sorter_SLEarned", $FileName, $this);
        $this->Sorter_SLAbsenceWpay = & new clsSorter($this->ComponentName, "Sorter_SLAbsenceWpay", $FileName, $this);
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->LeaveID = & new clsControl(ccsReportLabel, "LeaveID", "LeaveID", ccsInteger, "", "", $this);
        $this->EmployeeID = & new clsControl(ccsReportLabel, "EmployeeID", "EmployeeID", ccsInteger, "", "", $this);
        $this->LeaveMonth = & new clsControl(ccsReportLabel, "LeaveMonth", "LeaveMonth", ccsText, "", "", $this);
        $this->LeaveYear = & new clsControl(ccsReportLabel, "LeaveYear", "LeaveYear", ccsText, "", "", $this);
        $this->Particular = & new clsControl(ccsReportLabel, "Particular", "Particular", ccsText, "", "", $this);
        $this->VLEarned = & new clsControl(ccsReportLabel, "VLEarned", "VLEarned", ccsSingle, "", "", $this);
        $this->VLAbsenceUndertWpay = & new clsControl(ccsReportLabel, "VLAbsenceUndertWpay", "VLAbsenceUndertWpay", ccsSingle, "", "", $this);
        $this->VLPrevBalance = & new clsControl(ccsReportLabel, "VLPrevBalance", "VLPrevBalance", ccsSingle, "", "", $this);
        $this->VLUndertWopay = & new clsControl(ccsReportLabel, "VLUndertWopay", "VLUndertWopay", ccsSingle, "", "", $this);
        $this->SLEarned = & new clsControl(ccsReportLabel, "SLEarned", "SLEarned", ccsSingle, "", "", $this);
        $this->SLAbsenceWpay = & new clsControl(ccsReportLabel, "SLAbsenceWpay", "SLAbsenceWpay", ccsSingle, "", "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
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

//CheckErrors Method @2-30FD949B
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->LeaveID->Errors->Count());
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->LeaveMonth->Errors->Count());
        $errors = ($errors || $this->LeaveYear->Errors->Count());
        $errors = ($errors || $this->Particular->Errors->Count());
        $errors = ($errors || $this->VLEarned->Errors->Count());
        $errors = ($errors || $this->VLAbsenceUndertWpay->Errors->Count());
        $errors = ($errors || $this->VLPrevBalance->Errors->Count());
        $errors = ($errors || $this->VLUndertWopay->Errors->Count());
        $errors = ($errors || $this->SLEarned->Errors->Count());
        $errors = ($errors || $this->SLAbsenceWpay->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-793DFAF9
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LeaveID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LeaveMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LeaveYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Particular->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VLEarned->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VLAbsenceUndertWpay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VLPrevBalance->Errors->ToString());
        $errors = ComposeStrings($errors, $this->VLUndertWopay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SLEarned->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SLAbsenceWpay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-DBD282E9
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;


        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee_employee_leave($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->LeaveID->SetValue($this->DataSource->LeaveID->GetValue());
            $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
            $this->LeaveMonth->SetValue($this->DataSource->LeaveMonth->GetValue());
            $this->LeaveYear->SetValue($this->DataSource->LeaveYear->GetValue());
            $this->Particular->SetValue($this->DataSource->Particular->GetValue());
            $this->VLEarned->SetValue($this->DataSource->VLEarned->GetValue());
            $this->VLAbsenceUndertWpay->SetValue($this->DataSource->VLAbsenceUndertWpay->GetValue());
            $this->VLPrevBalance->SetValue($this->DataSource->VLPrevBalance->GetValue());
            $this->VLUndertWopay->SetValue($this->DataSource->VLUndertWopay->GetValue());
            $this->SLEarned->SetValue($this->DataSource->SLEarned->GetValue());
            $this->SLAbsenceWpay->SetValue($this->DataSource->SLAbsenceWpay->GetValue());
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
            $this->ControlsVisible["LeaveID"] = $this->LeaveID->Visible;
            $this->ControlsVisible["EmployeeID"] = $this->EmployeeID->Visible;
            $this->ControlsVisible["LeaveMonth"] = $this->LeaveMonth->Visible;
            $this->ControlsVisible["LeaveYear"] = $this->LeaveYear->Visible;
            $this->ControlsVisible["Particular"] = $this->Particular->Visible;
            $this->ControlsVisible["VLEarned"] = $this->VLEarned->Visible;
            $this->ControlsVisible["VLAbsenceUndertWpay"] = $this->VLAbsenceUndertWpay->Visible;
            $this->ControlsVisible["VLPrevBalance"] = $this->VLPrevBalance->Visible;
            $this->ControlsVisible["VLUndertWopay"] = $this->VLUndertWopay->Visible;
            $this->ControlsVisible["SLEarned"] = $this->SLEarned->Visible;
            $this->ControlsVisible["SLAbsenceWpay"] = $this->SLAbsenceWpay->Visible;
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
                        $this->LeaveID->SetValue($items[$i]->LeaveID);
                        $this->LeaveID->Attributes->RestoreFromArray($items[$i]->_LeaveIDAttributes);
                        $this->EmployeeID->SetValue($items[$i]->EmployeeID);
                        $this->EmployeeID->Attributes->RestoreFromArray($items[$i]->_EmployeeIDAttributes);
                        $this->LeaveMonth->SetValue($items[$i]->LeaveMonth);
                        $this->LeaveMonth->Attributes->RestoreFromArray($items[$i]->_LeaveMonthAttributes);
                        $this->LeaveYear->SetValue($items[$i]->LeaveYear);
                        $this->LeaveYear->Attributes->RestoreFromArray($items[$i]->_LeaveYearAttributes);
                        $this->Particular->SetValue($items[$i]->Particular);
                        $this->Particular->Attributes->RestoreFromArray($items[$i]->_ParticularAttributes);
                        $this->VLEarned->SetValue($items[$i]->VLEarned);
                        $this->VLEarned->Attributes->RestoreFromArray($items[$i]->_VLEarnedAttributes);
                        $this->VLAbsenceUndertWpay->SetValue($items[$i]->VLAbsenceUndertWpay);
                        $this->VLAbsenceUndertWpay->Attributes->RestoreFromArray($items[$i]->_VLAbsenceUndertWpayAttributes);
                        $this->VLPrevBalance->SetValue($items[$i]->VLPrevBalance);
                        $this->VLPrevBalance->Attributes->RestoreFromArray($items[$i]->_VLPrevBalanceAttributes);
                        $this->VLUndertWopay->SetValue($items[$i]->VLUndertWopay);
                        $this->VLUndertWopay->Attributes->RestoreFromArray($items[$i]->_VLUndertWopayAttributes);
                        $this->SLEarned->SetValue($items[$i]->SLEarned);
                        $this->SLEarned->Attributes->RestoreFromArray($items[$i]->_SLEarnedAttributes);
                        $this->SLAbsenceWpay->SetValue($items[$i]->SLAbsenceWpay);
                        $this->SLAbsenceWpay->Attributes->RestoreFromArray($items[$i]->_SLAbsenceWpayAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->LeaveID->Show();
                        $this->EmployeeID->Show();
                        $this->LeaveMonth->Show();
                        $this->LeaveYear->Show();
                        $this->Particular->Show();
                        $this->VLEarned->Show();
                        $this->VLAbsenceUndertWpay->Show();
                        $this->VLPrevBalance->Show();
                        $this->VLUndertWopay->Show();
                        $this->SLEarned->Show();
                        $this->SLAbsenceWpay->Show();
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
                                $this->Sorter_Surname->Show();
                                $this->Sorter_FirstName->Show();
                                $this->Sorter_LeaveID->Show();
                                $this->Sorter_EmployeeID->Show();
                                $this->Sorter_LeaveMonth->Show();
                                $this->Sorter_LeaveYear->Show();
                                $this->Sorter_Particular->Show();
                                $this->Sorter_VLEarned->Show();
                                $this->Sorter_VLAbsenceUndertWpay->Show();
                                $this->Sorter_VLPrevBalance->Show();
                                $this->Sorter_VLUndertWopay->Show();
                                $this->Sorter_SLEarned->Show();
                                $this->Sorter_SLAbsenceWpay->Show();
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
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End employee_employee_leave Class @2-FCB6E20C

class clsemployee_employee_leaveDataSource extends clsDBConnection1 {  //employee_employee_leaveDataSource Class @2-4295D229

//DataSource Variables @2-9C12C5AF
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Surname;
    var $FirstName;
    var $LeaveID;
    var $EmployeeID;
    var $LeaveMonth;
    var $LeaveYear;
    var $Particular;
    var $VLEarned;
    var $VLAbsenceUndertWpay;
    var $VLPrevBalance;
    var $VLUndertWopay;
    var $SLEarned;
    var $SLAbsenceWpay;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-90D3F063
    function clsemployee_employee_leaveDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_employee_leave";
        $this->Initialize();
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->LeaveID = new clsField("LeaveID", ccsInteger, "");
        
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->LeaveMonth = new clsField("LeaveMonth", ccsText, "");
        
        $this->LeaveYear = new clsField("LeaveYear", ccsText, "");
        
        $this->Particular = new clsField("Particular", ccsText, "");
        
        $this->VLEarned = new clsField("VLEarned", ccsSingle, "");
        
        $this->VLAbsenceUndertWpay = new clsField("VLAbsenceUndertWpay", ccsSingle, "");
        
        $this->VLPrevBalance = new clsField("VLPrevBalance", ccsSingle, "");
        
        $this->VLUndertWopay = new clsField("VLUndertWopay", ccsSingle, "");
        
        $this->SLEarned = new clsField("SLEarned", ccsSingle, "");
        
        $this->SLAbsenceWpay = new clsField("SLAbsenceWpay", ccsSingle, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-B166ADED
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_Surname" => array("Surname", ""), 
            "Sorter_FirstName" => array("FirstName", ""), 
            "Sorter_LeaveID" => array("LeaveID", ""), 
            "Sorter_EmployeeID" => array("employee_leave.EmployeeID", ""), 
            "Sorter_LeaveMonth" => array("LeaveMonth", ""), 
            "Sorter_LeaveYear" => array("LeaveYear", ""), 
            "Sorter_Particular" => array("Particular", ""), 
            "Sorter_VLEarned" => array("VLEarned", ""), 
            "Sorter_VLAbsenceUndertWpay" => array("VLAbsenceUndertWpay", ""), 
            "Sorter_VLPrevBalance" => array("VLPrevBalance", ""), 
            "Sorter_VLUndertWopay" => array("VLUndertWopay", ""), 
            "Sorter_SLEarned" => array("SLEarned", ""), 
            "Sorter_SLAbsenceWpay" => array("SLAbsenceWpay", "")));
    }
//End SetOrder Method

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-BA1B2899
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT EmployeeIDNo, employee_leave.*, Surname, FirstName \n\n" .
        "FROM employee_leave INNER JOIN employee ON\n\n" .
        "employee_leave.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-761C5B32
    function SetValues()
    {
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->LeaveID->SetDBValue(trim($this->f("LeaveID")));
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->LeaveMonth->SetDBValue($this->f("LeaveMonth"));
        $this->LeaveYear->SetDBValue($this->f("LeaveYear"));
        $this->Particular->SetDBValue($this->f("Particular"));
        $this->VLEarned->SetDBValue(trim($this->f("VLEarned")));
        $this->VLAbsenceUndertWpay->SetDBValue(trim($this->f("VLAbsenceUndertWpay")));
        $this->VLPrevBalance->SetDBValue(trim($this->f("VLPrevBalance")));
        $this->VLUndertWopay->SetDBValue(trim($this->f("VLUndertWopay")));
        $this->SLEarned->SetDBValue(trim($this->f("SLEarned")));
        $this->SLAbsenceWpay->SetDBValue(trim($this->f("SLAbsenceWpay")));
    }
//End SetValues Method

} //End employee_employee_leaveDataSource Class @2-FCB6E20C

//Initialize Page @1-EBF3C60F
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
$TemplateFileName = "NewPage1.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-6FCBC505
include_once("./NewPage1_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-7DB5102B
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_employee_leave = & new clsReportemployee_employee_leave("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "NewPage1.php";
$MainPage->employee_employee_leave = & $employee_employee_leave;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_employee_leave->Initialize();

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

//Go to destination page @1-ED757126
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_employee_leave);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-9D18504F
$employee_employee_leave->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-562974F0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_employee_leave);
unset($Tpl);
//End Unload Page


?>
