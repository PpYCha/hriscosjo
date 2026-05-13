<?php
//Include Common Files @1-439DB2EF
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Query_EmpDepartment_pgo.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//departmentoffice_employee1 ReportGroup class @2-EC7BCAAE
class clsReportGroupdepartmentoffice_employee1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $OfficeAcronym, $_OfficeAcronymAttributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $employee_Position, $_employee_PositionAttributes;
    var $SalaryGrade, $_SalaryGradeAttributes;
    var $MonthlySalary, $_MonthlySalaryAttributes;
    var $StatApp, $_StatAppAttributes;
    var $ReportLabel1, $_ReportLabel1Attributes;
    var $ReportLabel2, $_ReportLabel2Attributes;
    var $ReportLabel3, $_ReportLabel3Attributes;
    var $ReportLabel4, $_ReportLabel4Attributes;
    var $ReportLabel5, $_ReportLabel5Attributes;
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
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->employee_Position = $this->Parent->employee_Position->Value;
        $this->SalaryGrade = $this->Parent->SalaryGrade->Value;
        $this->MonthlySalary = $this->Parent->MonthlySalary->Value;
        $this->StatApp = $this->Parent->StatApp->Value;
        $this->ReportLabel1 = $this->Parent->ReportLabel1->Value;
        $this->ReportLabel2 = $this->Parent->ReportLabel2->Value;
        $this->ReportLabel3 = $this->Parent->ReportLabel3->Value;
        $this->ReportLabel4 = $this->Parent->ReportLabel4->Value;
        $this->ReportLabel5 = $this->Parent->ReportLabel5->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_OfficeAcronymAttributes = $this->Parent->OfficeAcronym->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_employee_PositionAttributes = $this->Parent->employee_Position->Attributes->GetAsArray();
        $this->_SalaryGradeAttributes = $this->Parent->SalaryGrade->Attributes->GetAsArray();
        $this->_MonthlySalaryAttributes = $this->Parent->MonthlySalary->Attributes->GetAsArray();
        $this->_StatAppAttributes = $this->Parent->StatApp->Attributes->GetAsArray();
        $this->_ReportLabel1Attributes = $this->Parent->ReportLabel1->Attributes->GetAsArray();
        $this->_ReportLabel2Attributes = $this->Parent->ReportLabel2->Attributes->GetAsArray();
        $this->_ReportLabel3Attributes = $this->Parent->ReportLabel3->Attributes->GetAsArray();
        $this->_ReportLabel4Attributes = $this->Parent->ReportLabel4->Attributes->GetAsArray();
        $this->_ReportLabel5Attributes = $this->Parent->ReportLabel5->Attributes->GetAsArray();
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
        $this->EmployeeIDNo = $Header->EmployeeIDNo;
        $Header->_EmployeeIDNoAttributes = $this->_EmployeeIDNoAttributes;
        $this->Parent->EmployeeIDNo->Value = $Header->EmployeeIDNo;
        $this->Parent->EmployeeIDNo->Attributes->RestoreFromArray($Header->_EmployeeIDNoAttributes);
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
        $this->SalaryGrade = $Header->SalaryGrade;
        $Header->_SalaryGradeAttributes = $this->_SalaryGradeAttributes;
        $this->Parent->SalaryGrade->Value = $Header->SalaryGrade;
        $this->Parent->SalaryGrade->Attributes->RestoreFromArray($Header->_SalaryGradeAttributes);
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
        $this->ReportLabel5 = $Header->ReportLabel5;
        $Header->_ReportLabel5Attributes = $this->_ReportLabel5Attributes;
        $this->Parent->ReportLabel5->Value = $Header->ReportLabel5;
        $this->Parent->ReportLabel5->Attributes->RestoreFromArray($Header->_ReportLabel5Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End departmentoffice_employee1 ReportGroup class

//departmentoffice_employee1 GroupsCollection class @2-CFFAD5CA
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
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->employee_Position->Value = $this->Parent->employee_Position->initialValue;
        $this->Parent->SalaryGrade->Value = $this->Parent->SalaryGrade->initialValue;
        $this->Parent->MonthlySalary->Value = $this->Parent->MonthlySalary->initialValue;
        $this->Parent->StatApp->Value = $this->Parent->StatApp->initialValue;
        $this->Parent->ReportLabel1->Value = $this->Parent->ReportLabel1->initialValue;
        $this->Parent->ReportLabel2->Value = $this->Parent->ReportLabel2->initialValue;
        $this->Parent->ReportLabel3->Value = $this->Parent->ReportLabel3->initialValue;
        $this->Parent->ReportLabel4->Value = $this->Parent->ReportLabel4->initialValue;
        $this->Parent->ReportLabel5->Value = $this->Parent->ReportLabel5->initialValue;
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

//Class_Initialize Event @2-C0FE55B8
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

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->OfficeAcronym = & new clsControl(ccsReportLabel, "OfficeAcronym", "OfficeAcronym", ccsText, "", "", $this);
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->EmployeeIDNo = & new clsControl(ccsReportLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", "", $this);
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->NameExtension = & new clsControl(ccsReportLabel, "NameExtension", "NameExtension", ccsText, "", "", $this);
        $this->employee_Position = & new clsControl(ccsReportLabel, "employee_Position", "employee_Position", ccsText, "", "", $this);
        $this->SalaryGrade = & new clsControl(ccsReportLabel, "SalaryGrade", "SalaryGrade", ccsText, "", "", $this);
        $this->MonthlySalary = & new clsControl(ccsReportLabel, "MonthlySalary", "MonthlySalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), "", $this);
        $this->StatApp = & new clsControl(ccsReportLabel, "StatApp", "StatApp", ccsText, "", "", $this);
        $this->ReportLabel1 = & new clsControl(ccsReportLabel, "ReportLabel1", "ReportLabel1", ccsText, "", "", $this);
        $this->ReportLabel2 = & new clsControl(ccsReportLabel, "ReportLabel2", "ReportLabel2", ccsText, "", "", $this);
        $this->ReportLabel3 = & new clsControl(ccsReportLabel, "ReportLabel3", "ReportLabel3", ccsText, "", "", $this);
        $this->ReportLabel4 = & new clsControl(ccsReportLabel, "ReportLabel4", "ReportLabel4", ccsText, "", "", $this);
        $this->ReportLabel5 = & new clsControl(ccsReportLabel, "ReportLabel5", "ReportLabel5", ccsText, "", "", $this);
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

//CheckErrors Method @2-29DF4BA2
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->employee_Position->Errors->Count());
        $errors = ($errors || $this->SalaryGrade->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->StatApp->Errors->Count());
        $errors = ($errors || $this->ReportLabel1->Errors->Count());
        $errors = ($errors || $this->ReportLabel2->Errors->Count());
        $errors = ($errors || $this->ReportLabel3->Errors->Count());
        $errors = ($errors || $this->ReportLabel4->Errors->Count());
        $errors = ($errors || $this->ReportLabel5->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-5EE3626F
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->employee_Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SalaryGrade->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatApp->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-16D207B3
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
        $this->DataSource->Parameters["urls_ItemNo"] = CCGetFromGet("s_ItemNo", NULL);
        $this->DataSource->Parameters["urls_SalaryGrade"] = CCGetFromGet("s_SalaryGrade", NULL);
        $this->DataSource->Parameters["urls_StepIncrement"] = CCGetFromGet("s_StepIncrement", NULL);
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
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->employee_Position->SetValue($this->DataSource->employee_Position->GetValue());
            $this->SalaryGrade->SetValue($this->DataSource->SalaryGrade->GetValue());
            $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
            $this->StatApp->SetValue($this->DataSource->StatApp->GetValue());
            $this->ReportLabel1->SetValue($this->DataSource->ReportLabel1->GetValue());
            $this->ReportLabel2->SetValue($this->DataSource->ReportLabel2->GetValue());
            $this->ReportLabel3->SetValue($this->DataSource->ReportLabel3->GetValue());
            $this->ReportLabel4->SetValue($this->DataSource->ReportLabel4->GetValue());
            $this->ReportLabel5->SetValue($this->DataSource->ReportLabel5->GetValue());
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
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["employee_Position"] = $this->employee_Position->Visible;
            $this->ControlsVisible["SalaryGrade"] = $this->SalaryGrade->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["StatApp"] = $this->StatApp->Visible;
            $this->ControlsVisible["ReportLabel1"] = $this->ReportLabel1->Visible;
            $this->ControlsVisible["ReportLabel2"] = $this->ReportLabel2->Visible;
            $this->ControlsVisible["ReportLabel3"] = $this->ReportLabel3->Visible;
            $this->ControlsVisible["ReportLabel4"] = $this->ReportLabel4->Visible;
            $this->ControlsVisible["ReportLabel5"] = $this->ReportLabel5->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
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
                        $this->SalaryGrade->SetValue($items[$i]->SalaryGrade);
                        $this->SalaryGrade->Attributes->RestoreFromArray($items[$i]->_SalaryGradeAttributes);
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
                        $this->ReportLabel5->SetValue($items[$i]->ReportLabel5);
                        $this->ReportLabel5->Attributes->RestoreFromArray($items[$i]->_ReportLabel5Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->EmployeeIDNo->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->NameExtension->Show();
                        $this->employee_Position->Show();
                        $this->SalaryGrade->Show();
                        $this->MonthlySalary->Show();
                        $this->StatApp->Show();
                        $this->ReportLabel1->Show();
                        $this->ReportLabel2->Show();
                        $this->ReportLabel3->Show();
                        $this->ReportLabel4->Show();
                        $this->ReportLabel5->Show();
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

//DataSource Variables @2-B58074EB
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $OfficeAcronym;
    var $EmployeeIDNo;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $NameExtension;
    var $employee_Position;
    var $SalaryGrade;
    var $MonthlySalary;
    var $StatApp;
    var $ReportLabel1;
    var $ReportLabel2;
    var $ReportLabel3;
    var $ReportLabel4;
    var $ReportLabel5;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-41CCDA82
    function clsdepartmentoffice_employee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report departmentoffice_employee1";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->employee_Position = new clsField("employee_Position", ccsText, "");
        
        $this->SalaryGrade = new clsField("SalaryGrade", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->StatApp = new clsField("StatApp", ccsText, "");
        
        $this->ReportLabel1 = new clsField("ReportLabel1", ccsText, "");
        
        $this->ReportLabel2 = new clsField("ReportLabel2", ccsText, "");
        
        $this->ReportLabel3 = new clsField("ReportLabel3", ccsText, "");
        
        $this->ReportLabel4 = new clsField("ReportLabel4", ccsText, "");
        
        $this->ReportLabel5 = new clsField("ReportLabel5", ccsText, "");
        

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

//Prepare Method @2-722A72FC
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
        $this->wp->AddParameter("6", "urls_ItemNo", ccsText, "", "", $this->Parameters["urls_ItemNo"], "", false);
        $this->wp->AddParameter("7", "urls_SalaryGrade", ccsText, "", "", $this->Parameters["urls_SalaryGrade"], "", false);
        $this->wp->AddParameter("8", "urls_StepIncrement", ccsText, "", "", $this->Parameters["urls_StepIncrement"], "", false);
        $this->wp->AddParameter("9", "urlCheckBoxList1", ccsText, "", "", $this->Parameters["urlCheckBoxList1"], "", false);
        $this->wp->AddParameter("10", "urlListBox1", ccsInteger, "", "", $this->Parameters["urlListBox1"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.OfficeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "employee.Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "employee.FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "employee.MiddleName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "employee.Position", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "employee.ItemNo", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opContains, "employee.SalaryGrade", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsText),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opContains, "employee.StepIncrement", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsText),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opIn, "lut_statofappt2.StatApp", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsText, true),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opEqual, "employee.Sex", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
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
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]), 
             $this->wp->Criterion[10]);
    }
//End Prepare Method

//Open Method @2-24737008
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT EmployeeIDNo, Surname, FirstName, MiddleName, NameExtension, employee.Position AS employee_Position, ItemNo, SalaryGrade, StepIncrement,\n\n" .
        "MonthlySalary, employee.StatAppID AS employee_StatAppID, StatApp, OfficeAcronym, employee.OfficeID AS employee_OfficeID,\n\n" .
        "lut_sex.*, BirthDate, PermMunicipality, EffectiveMonth, EffectiveDay, EffectiveYear \n\n" .
        "FROM ((employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) INNER JOIN lut_statofappt2 ON\n\n" .
        "employee.StatAppID = lut_statofappt2.StatAppID) INNER JOIN lut_sex ON\n\n" .
        "employee.Sex = lut_sex.SexID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "departmentoffice.OfficeAcronym asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-FD1DAF9C
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->employee_Position->SetDBValue($this->f("employee_Position"));
        $this->SalaryGrade->SetDBValue($this->f("SalaryGrade"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->StatApp->SetDBValue($this->f("StatApp"));
        $this->ReportLabel1->SetDBValue($this->f("BirthDate"));
        $this->ReportLabel2->SetDBValue($this->f("PermMunicipality"));
        $this->ReportLabel3->SetDBValue($this->f("EffectiveMonth"));
        $this->ReportLabel4->SetDBValue($this->f("EffectiveDay"));
        $this->ReportLabel5->SetDBValue($this->f("EffectiveYear"));
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

//Class_Initialize Event @24-206D3ED5
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
            $this->ClearParameters->Page = "Query_EmpDepartment_pgo.php";
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
            $this->s_ItemNo = & new clsControl(ccsTextBox, "s_ItemNo", "s_ItemNo", ccsText, "", CCGetRequestParam("s_ItemNo", $Method, NULL), $this);
            $this->s_SalaryGrade = & new clsControl(ccsListBox, "s_SalaryGrade", "s_SalaryGrade", ccsText, "", CCGetRequestParam("s_SalaryGrade", $Method, NULL), $this);
            $this->s_SalaryGrade->DSType = dsTable;
            $this->s_SalaryGrade->DataSource = new clsDBConnection1();
            $this->s_SalaryGrade->ds = & $this->s_SalaryGrade->DataSource;
            $this->s_SalaryGrade->DataSource->SQL = "SELECT * \n" .
"FROM lut_salarygrade {SQL_Where} {SQL_OrderBy}";
            list($this->s_SalaryGrade->BoundColumn, $this->s_SalaryGrade->TextColumn, $this->s_SalaryGrade->DBFormat) = array("SalaryGrade", "SalaryGrade", "");
            $this->s_StepIncrement = & new clsControl(ccsListBox, "s_StepIncrement", "s_StepIncrement", ccsText, "", CCGetRequestParam("s_StepIncrement", $Method, NULL), $this);
            $this->s_StepIncrement->DSType = dsTable;
            $this->s_StepIncrement->DataSource = new clsDBConnection1();
            $this->s_StepIncrement->ds = & $this->s_StepIncrement->DataSource;
            $this->s_StepIncrement->DataSource->SQL = "SELECT * \n" .
"FROM lut_stepincrement {SQL_Where} {SQL_OrderBy}";
            list($this->s_StepIncrement->BoundColumn, $this->s_StepIncrement->TextColumn, $this->s_StepIncrement->DBFormat) = array("StepIncrement", "StepIncrement", "");
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

//Validate Method @24-F676E2A3
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        if($this->EditMode && strlen($this->DataSource->Where))
            $Where = " AND NOT (" . $this->DataSource->Where . ")";
        $Validation = ($this->s_employee_OfficeID->Validate() && $Validation);
        $Validation = ($this->s_Surname->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_MiddleName->Validate() && $Validation);
        $Validation = ($this->s_employee_Position->Validate() && $Validation);
        $Validation = ($this->s_ItemNo->Validate() && $Validation);
        $Validation = ($this->s_SalaryGrade->Validate() && $Validation);
        $Validation = ($this->s_StepIncrement->Validate() && $Validation);
        $Validation = ($this->CheckBoxList1->Validate() && $Validation);
        $Validation = ($this->ListBox1->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_employee_OfficeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_employee_Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_ItemNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_SalaryGrade->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_StepIncrement->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CheckBoxList1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox1->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @24-4B4F5D10
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_employee_OfficeID->Errors->Count());
        $errors = ($errors || $this->s_Surname->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_MiddleName->Errors->Count());
        $errors = ($errors || $this->s_employee_Position->Errors->Count());
        $errors = ($errors || $this->s_ItemNo->Errors->Count());
        $errors = ($errors || $this->s_SalaryGrade->Errors->Count());
        $errors = ($errors || $this->s_StepIncrement->Errors->Count());
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

//Show Method @24-325B2576
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
        $this->s_SalaryGrade->Prepare();
        $this->s_StepIncrement->Prepare();
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
            $Error = ComposeStrings($Error, $this->s_ItemNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_SalaryGrade->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_StepIncrement->Errors->ToString());
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
        $this->s_ItemNo->Show();
        $this->s_SalaryGrade->Show();
        $this->s_StepIncrement->Show();
        $this->CheckBoxList1->Show();
        $this->ListBox1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End departmentoffice_employee Class @24-FCB6E20C

//Initialize Page @1-954CD9AF
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
$TemplateFileName = "Query_EmpDepartment_pgo.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-C4978808
include_once("./Query_EmpDepartment_pgo_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A0957B11
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$departmentoffice_employee1 = & new clsReportdepartmentoffice_employee1("", $MainPage);
$departmentoffice_employee = & new clsRecorddepartmentoffice_employee("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "Query_EmpDepartment_pgo.php";
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
