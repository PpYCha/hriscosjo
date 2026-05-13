<?php
//Include Common Files @1-F9BAAB0F
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QueryReassignDetailed_print.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_departmentoffice ReportGroup class @2-7ED0887B
class clsReportGroupemployee_departmentoffice {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $departmentoffice_OfficeAcronym, $_departmentoffice_OfficeAcronymAttributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $employee_Position, $_employee_PositionAttributes;
    var $ReassignmentOffice, $_ReassignmentOfficeAttributes;
    var $ReassignmentDate, $_ReassignmentDateAttributes;
    var $ReassignmentRemarks, $_ReassignmentRemarksAttributes;
    var $DetailedOffice, $_DetailedOfficeAttributes;
    var $DetailedDate, $_DetailedDateAttributes;
    var $DetailedRemarks, $_DetailedRemarksAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;
    var $departmentoffice_OfficeAcronymTotalIndex;

    function clsReportGroupemployee_departmentoffice(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->departmentoffice_OfficeAcronym = $this->Parent->departmentoffice_OfficeAcronym->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->employee_Position = $this->Parent->employee_Position->Value;
        $this->ReassignmentOffice = $this->Parent->ReassignmentOffice->Value;
        $this->ReassignmentDate = $this->Parent->ReassignmentDate->Value;
        $this->ReassignmentRemarks = $this->Parent->ReassignmentRemarks->Value;
        $this->DetailedOffice = $this->Parent->DetailedOffice->Value;
        $this->DetailedDate = $this->Parent->DetailedDate->Value;
        $this->DetailedRemarks = $this->Parent->DetailedRemarks->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_departmentoffice_OfficeAcronymAttributes = $this->Parent->departmentoffice_OfficeAcronym->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_employee_PositionAttributes = $this->Parent->employee_Position->Attributes->GetAsArray();
        $this->_ReassignmentOfficeAttributes = $this->Parent->ReassignmentOffice->Attributes->GetAsArray();
        $this->_ReassignmentDateAttributes = $this->Parent->ReassignmentDate->Attributes->GetAsArray();
        $this->_ReassignmentRemarksAttributes = $this->Parent->ReassignmentRemarks->Attributes->GetAsArray();
        $this->_DetailedOfficeAttributes = $this->Parent->DetailedOffice->Attributes->GetAsArray();
        $this->_DetailedDateAttributes = $this->Parent->DetailedDate->Attributes->GetAsArray();
        $this->_DetailedRemarksAttributes = $this->Parent->DetailedRemarks->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $this->departmentoffice_OfficeAcronym = $Header->departmentoffice_OfficeAcronym;
        $Header->_departmentoffice_OfficeAcronymAttributes = $this->_departmentoffice_OfficeAcronymAttributes;
        $this->Parent->departmentoffice_OfficeAcronym->Value = $Header->departmentoffice_OfficeAcronym;
        $this->Parent->departmentoffice_OfficeAcronym->Attributes->RestoreFromArray($Header->_departmentoffice_OfficeAcronymAttributes);
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
        $this->ReassignmentOffice = $Header->ReassignmentOffice;
        $Header->_ReassignmentOfficeAttributes = $this->_ReassignmentOfficeAttributes;
        $this->Parent->ReassignmentOffice->Value = $Header->ReassignmentOffice;
        $this->Parent->ReassignmentOffice->Attributes->RestoreFromArray($Header->_ReassignmentOfficeAttributes);
        $this->ReassignmentDate = $Header->ReassignmentDate;
        $Header->_ReassignmentDateAttributes = $this->_ReassignmentDateAttributes;
        $this->Parent->ReassignmentDate->Value = $Header->ReassignmentDate;
        $this->Parent->ReassignmentDate->Attributes->RestoreFromArray($Header->_ReassignmentDateAttributes);
        $this->ReassignmentRemarks = $Header->ReassignmentRemarks;
        $Header->_ReassignmentRemarksAttributes = $this->_ReassignmentRemarksAttributes;
        $this->Parent->ReassignmentRemarks->Value = $Header->ReassignmentRemarks;
        $this->Parent->ReassignmentRemarks->Attributes->RestoreFromArray($Header->_ReassignmentRemarksAttributes);
        $this->DetailedOffice = $Header->DetailedOffice;
        $Header->_DetailedOfficeAttributes = $this->_DetailedOfficeAttributes;
        $this->Parent->DetailedOffice->Value = $Header->DetailedOffice;
        $this->Parent->DetailedOffice->Attributes->RestoreFromArray($Header->_DetailedOfficeAttributes);
        $this->DetailedDate = $Header->DetailedDate;
        $Header->_DetailedDateAttributes = $this->_DetailedDateAttributes;
        $this->Parent->DetailedDate->Value = $Header->DetailedDate;
        $this->Parent->DetailedDate->Attributes->RestoreFromArray($Header->_DetailedDateAttributes);
        $this->DetailedRemarks = $Header->DetailedRemarks;
        $Header->_DetailedRemarksAttributes = $this->_DetailedRemarksAttributes;
        $this->Parent->DetailedRemarks->Value = $Header->DetailedRemarks;
        $this->Parent->DetailedRemarks->Attributes->RestoreFromArray($Header->_DetailedRemarksAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End employee_departmentoffice ReportGroup class

//employee_departmentoffice GroupsCollection class @2-F9DB6B3D
class clsGroupsCollectionemployee_departmentoffice {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $mdepartmentoffice_OfficeAcronymCurrentHeaderIndex;
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
        $this->mdepartmentoffice_OfficeAcronymCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_departmentoffice($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->departmentoffice_OfficeAcronymTotalIndex = $this->mdepartmentoffice_OfficeAcronymCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->departmentoffice_OfficeAcronym->Value = $this->Parent->departmentoffice_OfficeAcronym->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->employee_Position->Value = $this->Parent->employee_Position->initialValue;
        $this->Parent->ReassignmentOffice->Value = $this->Parent->ReassignmentOffice->initialValue;
        $this->Parent->ReassignmentDate->Value = $this->Parent->ReassignmentDate->initialValue;
        $this->Parent->ReassignmentRemarks->Value = $this->Parent->ReassignmentRemarks->initialValue;
        $this->Parent->DetailedOffice->Value = $this->Parent->DetailedOffice->initialValue;
        $this->Parent->DetailedDate->Value = $this->Parent->DetailedDate->initialValue;
        $this->Parent->DetailedRemarks->Value = $this->Parent->DetailedRemarks->initialValue;
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
        if ($groupName == "departmentoffice_OfficeAcronym") {
            $Groupdepartmentoffice_OfficeAcronym = & $this->InitGroup(true);
            $this->Parent->departmentoffice_OfficeAcronym_Header->CCSEventResult = CCGetEvent($this->Parent->departmentoffice_OfficeAcronym_Header->CCSEvents, "OnInitialize", $this->Parent->departmentoffice_OfficeAcronym_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->departmentoffice_OfficeAcronym_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->departmentoffice_OfficeAcronym_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->departmentoffice_OfficeAcronym_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->departmentoffice_OfficeAcronym_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->departmentoffice_OfficeAcronym_Header->Height;
                $Groupdepartmentoffice_OfficeAcronym->SetTotalControls("GetNextValue");
            $this->Parent->departmentoffice_OfficeAcronym_Header->CCSEventResult = CCGetEvent($this->Parent->departmentoffice_OfficeAcronym_Header->CCSEvents, "OnCalculate", $this->Parent->departmentoffice_OfficeAcronym_Header);
            $Groupdepartmentoffice_OfficeAcronym->SetControls();
            $Groupdepartmentoffice_OfficeAcronym->Mode = 1;
            $Groupdepartmentoffice_OfficeAcronym->GroupType = "departmentoffice_OfficeAcronym";
            $this->mdepartmentoffice_OfficeAcronymCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $Groupdepartmentoffice_OfficeAcronym;
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
        $Groupdepartmentoffice_OfficeAcronym = & $this->InitGroup(true);
        $this->Parent->departmentoffice_OfficeAcronym_Footer->CCSEventResult = CCGetEvent($this->Parent->departmentoffice_OfficeAcronym_Footer->CCSEvents, "OnInitialize", $this->Parent->departmentoffice_OfficeAcronym_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->departmentoffice_OfficeAcronym_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->departmentoffice_OfficeAcronym_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->departmentoffice_OfficeAcronym_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $Groupdepartmentoffice_OfficeAcronym->SetTotalControls("GetPrevValue");
        $Groupdepartmentoffice_OfficeAcronym->SyncWithHeader($this->Groups[$this->mdepartmentoffice_OfficeAcronymCurrentHeaderIndex]);
        if ($this->Parent->departmentoffice_OfficeAcronym_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->departmentoffice_OfficeAcronym_Footer->Height;
        $this->Parent->departmentoffice_OfficeAcronym_Footer->CCSEventResult = CCGetEvent($this->Parent->departmentoffice_OfficeAcronym_Footer->CCSEvents, "OnCalculate", $this->Parent->departmentoffice_OfficeAcronym_Footer);
        $Groupdepartmentoffice_OfficeAcronym->SetControls();
        $this->RestoreValues();
        $Groupdepartmentoffice_OfficeAcronym->Mode = 2;
        $Groupdepartmentoffice_OfficeAcronym->GroupType ="departmentoffice_OfficeAcronym";
        $this->Groups[] = & $Groupdepartmentoffice_OfficeAcronym;
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

//employee_departmentoffice Variables @2-9FDE6625

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
    var $departmentoffice_OfficeAcronym_HeaderBlock, $departmentoffice_OfficeAcronym_Header;
    var $departmentoffice_OfficeAcronym_FooterBlock, $departmentoffice_OfficeAcronym_Footer;
    var $SorterName, $SorterDirection;

    var $ds;
    var $DataSource;
    var $UseClientPaging = false;

    //Report Controls
    var $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    var $Page_FooterControls, $Page_HeaderControls;
    var $departmentoffice_OfficeAcronym_HeaderControls, $departmentoffice_OfficeAcronym_FooterControls;
//End employee_departmentoffice Variables

//Class_Initialize Event @2-FC56D920
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
        $this->departmentoffice_OfficeAcronym_Footer = new clsSection($this);
        $this->departmentoffice_OfficeAcronym_Footer->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->departmentoffice_OfficeAcronym_Footer->Height);
        $this->departmentoffice_OfficeAcronym_Header = new clsSection($this);
        $this->departmentoffice_OfficeAcronym_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->departmentoffice_OfficeAcronym_Header->Height);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployee_departmentofficeDataSource($this);
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
        $this->departmentoffice_OfficeAcronym = & new clsControl(ccsReportLabel, "departmentoffice_OfficeAcronym", "departmentoffice_OfficeAcronym", ccsText, "", "", $this);
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->employee_Position = & new clsControl(ccsReportLabel, "employee_Position", "employee_Position", ccsText, "", "", $this);
        $this->ReassignmentOffice = & new clsControl(ccsReportLabel, "ReassignmentOffice", "ReassignmentOffice", ccsText, "", "", $this);
        $this->ReassignmentDate = & new clsControl(ccsReportLabel, "ReassignmentDate", "ReassignmentDate", ccsDate, array("mmmm", " ", "d", ", ", "yyyy"), "", $this);
        $this->ReassignmentRemarks = & new clsControl(ccsReportLabel, "ReassignmentRemarks", "ReassignmentRemarks", ccsText, "", "", $this);
        $this->DetailedOffice = & new clsControl(ccsReportLabel, "DetailedOffice", "DetailedOffice", ccsText, "", "", $this);
        $this->DetailedDate = & new clsControl(ccsReportLabel, "DetailedDate", "DetailedDate", ccsDate, array("mmmm", " ", "d", ", ", "yyyy"), "", $this);
        $this->DetailedRemarks = & new clsControl(ccsReportLabel, "DetailedRemarks", "DetailedRemarks", ccsText, "", "", $this);
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

//CheckErrors Method @2-A4BB7E1E
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->departmentoffice_OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->employee_Position->Errors->Count());
        $errors = ($errors || $this->ReassignmentOffice->Errors->Count());
        $errors = ($errors || $this->ReassignmentDate->Errors->Count());
        $errors = ($errors || $this->ReassignmentRemarks->Errors->Count());
        $errors = ($errors || $this->DetailedOffice->Errors->Count());
        $errors = ($errors || $this->DetailedDate->Errors->Count());
        $errors = ($errors || $this->DetailedRemarks->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-130CB9DE
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->departmentoffice_OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->employee_Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReassignmentOffice->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReassignmentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReassignmentRemarks->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetailedOffice->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetailedDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DetailedRemarks->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-71B0EC40
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_ReassignmentID"] = CCGetFromGet("s_ReassignmentID", NULL);
        $this->DataSource->Parameters["urls_ReassignmentOffice"] = CCGetFromGet("s_ReassignmentOffice", NULL);
        $this->DataSource->Parameters["urls_DetailedID"] = CCGetFromGet("s_DetailedID", NULL);
        $this->DataSource->Parameters["urls_DetailedOffice"] = CCGetFromGet("s_DetailedOffice", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $departmentoffice_OfficeAcronymKey = "";
        $Groups = new clsGroupsCollectionemployee_departmentoffice($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->departmentoffice_OfficeAcronym->SetValue($this->DataSource->departmentoffice_OfficeAcronym->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->employee_Position->SetValue($this->DataSource->employee_Position->GetValue());
            $this->ReassignmentOffice->SetValue($this->DataSource->ReassignmentOffice->GetValue());
            $this->ReassignmentDate->SetValue($this->DataSource->ReassignmentDate->GetValue());
            $this->ReassignmentRemarks->SetValue($this->DataSource->ReassignmentRemarks->GetValue());
            $this->DetailedOffice->SetValue($this->DataSource->DetailedOffice->GetValue());
            $this->DetailedDate->SetValue($this->DataSource->DetailedDate->GetValue());
            $this->DetailedRemarks->SetValue($this->DataSource->DetailedRemarks->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $departmentoffice_OfficeAcronymKey != $this->DataSource->f("departmentoffice_OfficeAcronym")) {
                $Groups->OpenGroup("departmentoffice_OfficeAcronym");
            }
            $Groups->AddItem();
            $departmentoffice_OfficeAcronymKey = $this->DataSource->f("departmentoffice_OfficeAcronym");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $departmentoffice_OfficeAcronymKey != $this->DataSource->f("departmentoffice_OfficeAcronym")) {
                $Groups->CloseGroup("departmentoffice_OfficeAcronym");
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
            $this->ControlsVisible["departmentoffice_OfficeAcronym"] = $this->departmentoffice_OfficeAcronym->Visible;
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["employee_Position"] = $this->employee_Position->Visible;
            $this->ControlsVisible["ReassignmentOffice"] = $this->ReassignmentOffice->Visible;
            $this->ControlsVisible["ReassignmentDate"] = $this->ReassignmentDate->Visible;
            $this->ControlsVisible["ReassignmentRemarks"] = $this->ReassignmentRemarks->Visible;
            $this->ControlsVisible["DetailedOffice"] = $this->DetailedOffice->Visible;
            $this->ControlsVisible["DetailedDate"] = $this->DetailedDate->Visible;
            $this->ControlsVisible["DetailedRemarks"] = $this->DetailedRemarks->Visible;
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
                        $this->employee_Position->SetValue($items[$i]->employee_Position);
                        $this->employee_Position->Attributes->RestoreFromArray($items[$i]->_employee_PositionAttributes);
                        $this->ReassignmentOffice->SetValue($items[$i]->ReassignmentOffice);
                        $this->ReassignmentOffice->Attributes->RestoreFromArray($items[$i]->_ReassignmentOfficeAttributes);
                        $this->ReassignmentDate->SetValue($items[$i]->ReassignmentDate);
                        $this->ReassignmentDate->Attributes->RestoreFromArray($items[$i]->_ReassignmentDateAttributes);
                        $this->ReassignmentRemarks->SetValue($items[$i]->ReassignmentRemarks);
                        $this->ReassignmentRemarks->Attributes->RestoreFromArray($items[$i]->_ReassignmentRemarksAttributes);
                        $this->DetailedOffice->SetValue($items[$i]->DetailedOffice);
                        $this->DetailedOffice->Attributes->RestoreFromArray($items[$i]->_DetailedOfficeAttributes);
                        $this->DetailedDate->SetValue($items[$i]->DetailedDate);
                        $this->DetailedDate->Attributes->RestoreFromArray($items[$i]->_DetailedDateAttributes);
                        $this->DetailedRemarks->SetValue($items[$i]->DetailedRemarks);
                        $this->DetailedRemarks->Attributes->RestoreFromArray($items[$i]->_DetailedRemarksAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->employee_Position->Show();
                        $this->ReassignmentOffice->Show();
                        $this->ReassignmentDate->Show();
                        $this->ReassignmentRemarks->Show();
                        $this->DetailedOffice->Show();
                        $this->DetailedDate->Show();
                        $this->DetailedRemarks->Show();
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
                    case "departmentoffice_OfficeAcronym":
                        if ($items[$i]->Mode == 1) {
                            $this->departmentoffice_OfficeAcronym->SetValue($items[$i]->departmentoffice_OfficeAcronym);
                            $this->departmentoffice_OfficeAcronym->Attributes->RestoreFromArray($items[$i]->_departmentoffice_OfficeAcronymAttributes);
                            $this->departmentoffice_OfficeAcronym_Header->CCSEventResult = CCGetEvent($this->departmentoffice_OfficeAcronym_Header->CCSEvents, "BeforeShow", $this->departmentoffice_OfficeAcronym_Header);
                            if ($this->departmentoffice_OfficeAcronym_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section departmentoffice_OfficeAcronym_Header";
                                $this->Attributes->Show();
                                $this->departmentoffice_OfficeAcronym->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section departmentoffice_OfficeAcronym_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->departmentoffice_OfficeAcronym_Footer->CCSEventResult = CCGetEvent($this->departmentoffice_OfficeAcronym_Footer->CCSEvents, "BeforeShow", $this->departmentoffice_OfficeAcronym_Footer);
                            if ($this->departmentoffice_OfficeAcronym_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section departmentoffice_OfficeAcronym_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section departmentoffice_OfficeAcronym_Footer", true, "Section Detail");
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

//DataSource Variables @2-5D0E097D
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $departmentoffice_OfficeAcronym;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $employee_Position;
    var $ReassignmentOffice;
    var $ReassignmentDate;
    var $ReassignmentRemarks;
    var $DetailedOffice;
    var $DetailedDate;
    var $DetailedRemarks;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-009DFBC7
    function clsemployee_departmentofficeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_departmentoffice";
        $this->Initialize();
        $this->departmentoffice_OfficeAcronym = new clsField("departmentoffice_OfficeAcronym", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->employee_Position = new clsField("employee_Position", ccsText, "");
        
        $this->ReassignmentOffice = new clsField("ReassignmentOffice", ccsText, "");
        
        $this->ReassignmentDate = new clsField("ReassignmentDate", ccsDate, $this->DateFormat);
        
        $this->ReassignmentRemarks = new clsField("ReassignmentRemarks", ccsText, "");
        
        $this->DetailedOffice = new clsField("DetailedOffice", ccsText, "");
        
        $this->DetailedDate = new clsField("DetailedDate", ccsDate, $this->DateFormat);
        
        $this->DetailedRemarks = new clsField("DetailedRemarks", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-998D07AC
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "departmentoffice.OfficeID, Surname";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-65781C87
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_ReassignmentID", ccsInteger, "", "", $this->Parameters["urls_ReassignmentID"], "", false);
        $this->wp->AddParameter("2", "urls_ReassignmentOffice", ccsInteger, "", "", $this->Parameters["urls_ReassignmentOffice"], "", false);
        $this->wp->AddParameter("3", "urls_DetailedID", ccsInteger, "", "", $this->Parameters["urls_DetailedID"], "", false);
        $this->wp->AddParameter("4", "urls_DetailedOffice", ccsText, "", "", $this->Parameters["urls_DetailedOffice"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "ReassignmentID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opEqual, "ReassignmentOffice", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsInteger),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opEqual, "DetailedID", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsInteger),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "DetailedOffice", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opOR(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]);
    }
//End Prepare Method

//Open Method @2-06FBFE6C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Surname, FirstName, MiddleName, employee.Position AS employee_Position, employee.OfficeID AS employee_OfficeID, departmentoffice.OfficeAcronym AS departmentoffice_OfficeAcronym,\n\n" .
        "ReassignmentID, ReassignmentOffice, ReassignmentDate, ReassignmentRemarks, DetailedID, DetailedOffice, DetailedDate, DetailedRemarks,\n\n" .
        "departmentoffice1.OfficeAcronym AS departmentoffice1_OfficeAcronym \n\n" .
        "FROM (employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) LEFT JOIN departmentoffice departmentoffice1 ON\n\n" .
        "employee.ReassignmentOffice = departmentoffice1.OfficeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "departmentoffice.OfficeAcronym asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-537D8080
    function SetValues()
    {
        $this->departmentoffice_OfficeAcronym->SetDBValue($this->f("departmentoffice_OfficeAcronym"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->employee_Position->SetDBValue($this->f("employee_Position"));
        $this->ReassignmentOffice->SetDBValue($this->f("departmentoffice1_OfficeAcronym"));
        $this->ReassignmentDate->SetDBValue(trim($this->f("ReassignmentDate")));
        $this->ReassignmentRemarks->SetDBValue($this->f("ReassignmentRemarks"));
        $this->DetailedOffice->SetDBValue($this->f("DetailedOffice"));
        $this->DetailedDate->SetDBValue(trim($this->f("DetailedDate")));
        $this->DetailedRemarks->SetDBValue($this->f("DetailedRemarks"));
    }
//End SetValues Method

} //End employee_departmentofficeDataSource Class @2-FCB6E20C

class clsRecorddepartmentoffice_departme { //departmentoffice_departme Class @27-AF96E60A

//Variables @27-D6FF3E86

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

//Class_Initialize Event @27-681A2876
    function clsRecorddepartmentoffice_departme($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record departmentoffice_departme/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "departmentoffice_departme";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = & new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_ReassignmentID", "s_ReassignmentOffice", "s_DetailedID", "s_DetailedOffice", "ccsForm"));
            $this->ClearParameters->Page = "QueryReassignDetailed_print.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_ReassignmentID = & new clsControl(ccsCheckBox, "s_ReassignmentID", "s_ReassignmentID", ccsInteger, "", CCGetRequestParam("s_ReassignmentID", $Method, NULL), $this);
            $this->s_ReassignmentID->CheckedValue = $this->s_ReassignmentID->GetParsedValue(1);
            $this->s_ReassignmentID->UncheckedValue = $this->s_ReassignmentID->GetParsedValue(0);
            $this->s_ReassignmentOffice = & new clsControl(ccsListBox, "s_ReassignmentOffice", "s_ReassignmentOffice", ccsInteger, "", CCGetRequestParam("s_ReassignmentOffice", $Method, NULL), $this);
            $this->s_ReassignmentOffice->DSType = dsTable;
            $this->s_ReassignmentOffice->DataSource = new clsDBConnection1();
            $this->s_ReassignmentOffice->ds = & $this->s_ReassignmentOffice->DataSource;
            $this->s_ReassignmentOffice->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            list($this->s_ReassignmentOffice->BoundColumn, $this->s_ReassignmentOffice->TextColumn, $this->s_ReassignmentOffice->DBFormat) = array("OfficeID", "OfficeAcronym", "");
            $this->s_DetailedOffice = & new clsControl(ccsTextBox, "s_DetailedOffice", "s_DetailedOffice", ccsText, "", CCGetRequestParam("s_DetailedOffice", $Method, NULL), $this);
            $this->s_DetailedID = & new clsControl(ccsCheckBox, "s_DetailedID", "s_DetailedID", ccsInteger, "", CCGetRequestParam("s_DetailedID", $Method, NULL), $this);
            $this->s_DetailedID->CheckedValue = $this->s_DetailedID->GetParsedValue(1);
            $this->s_DetailedID->UncheckedValue = $this->s_DetailedID->GetParsedValue(0);
        }
    }
//End Class_Initialize Event

//Validate Method @27-F265B575
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_ReassignmentID->Validate() && $Validation);
        $Validation = ($this->s_ReassignmentOffice->Validate() && $Validation);
        $Validation = ($this->s_DetailedOffice->Validate() && $Validation);
        $Validation = ($this->s_DetailedID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_ReassignmentID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_ReassignmentOffice->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DetailedOffice->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DetailedID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @27-1D9AB78D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_ReassignmentID->Errors->Count());
        $errors = ($errors || $this->s_ReassignmentOffice->Errors->Count());
        $errors = ($errors || $this->s_DetailedOffice->Errors->Count());
        $errors = ($errors || $this->s_DetailedID->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @27-ED598703
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

//Operation Method @27-21B5C9B4
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
        $Redirect = "QueryReassignDetailed_print.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "QueryReassignDetailed_print.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @27-46077FF4
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

        $this->s_ReassignmentOffice->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_ReassignmentID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_ReassignmentOffice->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DetailedOffice->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DetailedID->Errors->ToString());
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
        $this->s_ReassignmentID->Show();
        $this->s_ReassignmentOffice->Show();
        $this->s_DetailedOffice->Show();
        $this->s_DetailedID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End departmentoffice_departme Class @27-FCB6E20C

//Initialize Page @1-304A38AE
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
$TemplateFileName = "QueryReassignDetailed_print.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5FB88FCE
CCSecurityRedirect("7;6;5;4;3;2", "");
//End Authenticate User

//Include events file @1-2E657C66
include_once("./QueryReassignDetailed_print_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-96FEDF63
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_departmentoffice = & new clsReportemployee_departmentoffice("", $MainPage);
$departmentoffice_departme = & new clsRecorddepartmentoffice_departme("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QueryReassignDetailed_print.php";
$MainPage->employee_departmentoffice = & $employee_departmentoffice;
$MainPage->departmentoffice_departme = & $departmentoffice_departme;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
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

//Execute Components @1-7E345E17
$departmentoffice_departme->Operation();
//End Execute Components

//Go to destination page @1-A70A8FD2
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_departmentoffice);
    unset($departmentoffice_departme);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-9440DFC7
$employee_departmentoffice->Show();
$departmentoffice_departme->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-386569C6
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_departmentoffice);
unset($departmentoffice_departme);
unset($Tpl);
//End Unload Page


?>
