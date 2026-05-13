<?php
//Include Common Files @1-FBC1A863
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Query_EmpID_print3.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_departmentoffice ReportGroup class @2-2BC25F8C
class clsReportGroupemployee_departmentoffice {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $OfficeAcronym, $_OfficeAcronymAttributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $PhilhealthNo, $_PhilhealthNoAttributes;
    var $ReportLabel5, $_ReportLabel5Attributes;
    var $ReportLabel2, $_ReportLabel2Attributes;
    var $ReportLabel1, $_ReportLabel1Attributes;
    var $ReportLabel3, $_ReportLabel3Attributes;
    var $ReportLabel4, $_ReportLabel4Attributes;
    var $ReportLabel6, $_ReportLabel6Attributes;
    var $ReportLabel7, $_ReportLabel7Attributes;
    var $ReportLabel8, $_ReportLabel8Attributes;
    var $ReportLabel9, $_ReportLabel9Attributes;
    var $ReportLabel10, $_ReportLabel10Attributes;
    var $ReportLabel11, $_ReportLabel11Attributes;
    var $ReportLabel12, $_ReportLabel12Attributes;
    var $ReportLabel13, $_ReportLabel13Attributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;
    var $OfficeAcronymTotalIndex;

    function clsReportGroupemployee_departmentoffice(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->OfficeAcronym = $this->Parent->OfficeAcronym->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->PhilhealthNo = $this->Parent->PhilhealthNo->Value;
        $this->ReportLabel5 = $this->Parent->ReportLabel5->Value;
        $this->ReportLabel2 = $this->Parent->ReportLabel2->Value;
        $this->ReportLabel1 = $this->Parent->ReportLabel1->Value;
        $this->ReportLabel3 = $this->Parent->ReportLabel3->Value;
        $this->ReportLabel4 = $this->Parent->ReportLabel4->Value;
        $this->ReportLabel6 = $this->Parent->ReportLabel6->Value;
        $this->ReportLabel7 = $this->Parent->ReportLabel7->Value;
        $this->ReportLabel8 = $this->Parent->ReportLabel8->Value;
        $this->ReportLabel9 = $this->Parent->ReportLabel9->Value;
        $this->ReportLabel10 = $this->Parent->ReportLabel10->Value;
        $this->ReportLabel11 = $this->Parent->ReportLabel11->Value;
        $this->ReportLabel12 = $this->Parent->ReportLabel12->Value;
        $this->ReportLabel13 = $this->Parent->ReportLabel13->Value;
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
        $this->_PhilhealthNoAttributes = $this->Parent->PhilhealthNo->Attributes->GetAsArray();
        $this->_ReportLabel5Attributes = $this->Parent->ReportLabel5->Attributes->GetAsArray();
        $this->_ReportLabel2Attributes = $this->Parent->ReportLabel2->Attributes->GetAsArray();
        $this->_ReportLabel1Attributes = $this->Parent->ReportLabel1->Attributes->GetAsArray();
        $this->_ReportLabel3Attributes = $this->Parent->ReportLabel3->Attributes->GetAsArray();
        $this->_ReportLabel4Attributes = $this->Parent->ReportLabel4->Attributes->GetAsArray();
        $this->_ReportLabel6Attributes = $this->Parent->ReportLabel6->Attributes->GetAsArray();
        $this->_ReportLabel7Attributes = $this->Parent->ReportLabel7->Attributes->GetAsArray();
        $this->_ReportLabel8Attributes = $this->Parent->ReportLabel8->Attributes->GetAsArray();
        $this->_ReportLabel9Attributes = $this->Parent->ReportLabel9->Attributes->GetAsArray();
        $this->_ReportLabel10Attributes = $this->Parent->ReportLabel10->Attributes->GetAsArray();
        $this->_ReportLabel11Attributes = $this->Parent->ReportLabel11->Attributes->GetAsArray();
        $this->_ReportLabel12Attributes = $this->Parent->ReportLabel12->Attributes->GetAsArray();
        $this->_ReportLabel13Attributes = $this->Parent->ReportLabel13->Attributes->GetAsArray();
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
        $this->PhilhealthNo = $Header->PhilhealthNo;
        $Header->_PhilhealthNoAttributes = $this->_PhilhealthNoAttributes;
        $this->Parent->PhilhealthNo->Value = $Header->PhilhealthNo;
        $this->Parent->PhilhealthNo->Attributes->RestoreFromArray($Header->_PhilhealthNoAttributes);
        $this->ReportLabel5 = $Header->ReportLabel5;
        $Header->_ReportLabel5Attributes = $this->_ReportLabel5Attributes;
        $this->Parent->ReportLabel5->Value = $Header->ReportLabel5;
        $this->Parent->ReportLabel5->Attributes->RestoreFromArray($Header->_ReportLabel5Attributes);
        $this->ReportLabel2 = $Header->ReportLabel2;
        $Header->_ReportLabel2Attributes = $this->_ReportLabel2Attributes;
        $this->Parent->ReportLabel2->Value = $Header->ReportLabel2;
        $this->Parent->ReportLabel2->Attributes->RestoreFromArray($Header->_ReportLabel2Attributes);
        $this->ReportLabel1 = $Header->ReportLabel1;
        $Header->_ReportLabel1Attributes = $this->_ReportLabel1Attributes;
        $this->Parent->ReportLabel1->Value = $Header->ReportLabel1;
        $this->Parent->ReportLabel1->Attributes->RestoreFromArray($Header->_ReportLabel1Attributes);
        $this->ReportLabel3 = $Header->ReportLabel3;
        $Header->_ReportLabel3Attributes = $this->_ReportLabel3Attributes;
        $this->Parent->ReportLabel3->Value = $Header->ReportLabel3;
        $this->Parent->ReportLabel3->Attributes->RestoreFromArray($Header->_ReportLabel3Attributes);
        $this->ReportLabel4 = $Header->ReportLabel4;
        $Header->_ReportLabel4Attributes = $this->_ReportLabel4Attributes;
        $this->Parent->ReportLabel4->Value = $Header->ReportLabel4;
        $this->Parent->ReportLabel4->Attributes->RestoreFromArray($Header->_ReportLabel4Attributes);
        $this->ReportLabel6 = $Header->ReportLabel6;
        $Header->_ReportLabel6Attributes = $this->_ReportLabel6Attributes;
        $this->Parent->ReportLabel6->Value = $Header->ReportLabel6;
        $this->Parent->ReportLabel6->Attributes->RestoreFromArray($Header->_ReportLabel6Attributes);
        $this->ReportLabel7 = $Header->ReportLabel7;
        $Header->_ReportLabel7Attributes = $this->_ReportLabel7Attributes;
        $this->Parent->ReportLabel7->Value = $Header->ReportLabel7;
        $this->Parent->ReportLabel7->Attributes->RestoreFromArray($Header->_ReportLabel7Attributes);
        $this->ReportLabel8 = $Header->ReportLabel8;
        $Header->_ReportLabel8Attributes = $this->_ReportLabel8Attributes;
        $this->Parent->ReportLabel8->Value = $Header->ReportLabel8;
        $this->Parent->ReportLabel8->Attributes->RestoreFromArray($Header->_ReportLabel8Attributes);
        $this->ReportLabel9 = $Header->ReportLabel9;
        $Header->_ReportLabel9Attributes = $this->_ReportLabel9Attributes;
        $this->Parent->ReportLabel9->Value = $Header->ReportLabel9;
        $this->Parent->ReportLabel9->Attributes->RestoreFromArray($Header->_ReportLabel9Attributes);
        $this->ReportLabel10 = $Header->ReportLabel10;
        $Header->_ReportLabel10Attributes = $this->_ReportLabel10Attributes;
        $this->Parent->ReportLabel10->Value = $Header->ReportLabel10;
        $this->Parent->ReportLabel10->Attributes->RestoreFromArray($Header->_ReportLabel10Attributes);
        $this->ReportLabel11 = $Header->ReportLabel11;
        $Header->_ReportLabel11Attributes = $this->_ReportLabel11Attributes;
        $this->Parent->ReportLabel11->Value = $Header->ReportLabel11;
        $this->Parent->ReportLabel11->Attributes->RestoreFromArray($Header->_ReportLabel11Attributes);
        $this->ReportLabel12 = $Header->ReportLabel12;
        $Header->_ReportLabel12Attributes = $this->_ReportLabel12Attributes;
        $this->Parent->ReportLabel12->Value = $Header->ReportLabel12;
        $this->Parent->ReportLabel12->Attributes->RestoreFromArray($Header->_ReportLabel12Attributes);
        $this->ReportLabel13 = $Header->ReportLabel13;
        $Header->_ReportLabel13Attributes = $this->_ReportLabel13Attributes;
        $this->Parent->ReportLabel13->Value = $Header->ReportLabel13;
        $this->Parent->ReportLabel13->Attributes->RestoreFromArray($Header->_ReportLabel13Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End employee_departmentoffice ReportGroup class

//employee_departmentoffice GroupsCollection class @2-D95AC386
class clsGroupsCollectionemployee_departmentoffice {
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

    function clsGroupsCollectionemployee_departmentoffice(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mOfficeAcronymCurrentHeaderIndex = 1;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_departmentoffice($this->Parent);
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
        $this->Parent->PhilhealthNo->Value = $this->Parent->PhilhealthNo->initialValue;
        $this->Parent->ReportLabel5->Value = $this->Parent->ReportLabel5->initialValue;
        $this->Parent->ReportLabel2->Value = $this->Parent->ReportLabel2->initialValue;
        $this->Parent->ReportLabel1->Value = $this->Parent->ReportLabel1->initialValue;
        $this->Parent->ReportLabel3->Value = $this->Parent->ReportLabel3->initialValue;
        $this->Parent->ReportLabel4->Value = $this->Parent->ReportLabel4->initialValue;
        $this->Parent->ReportLabel6->Value = $this->Parent->ReportLabel6->initialValue;
        $this->Parent->ReportLabel7->Value = $this->Parent->ReportLabel7->initialValue;
        $this->Parent->ReportLabel8->Value = $this->Parent->ReportLabel8->initialValue;
        $this->Parent->ReportLabel9->Value = $this->Parent->ReportLabel9->initialValue;
        $this->Parent->ReportLabel10->Value = $this->Parent->ReportLabel10->initialValue;
        $this->Parent->ReportLabel11->Value = $this->Parent->ReportLabel11->initialValue;
        $this->Parent->ReportLabel12->Value = $this->Parent->ReportLabel12->initialValue;
        $this->Parent->ReportLabel13->Value = $this->Parent->ReportLabel13->initialValue;
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
//End employee_departmentoffice GroupsCollection class

class clsReportemployee_departmentoffice { //employee_departmentoffice Class @2-FD652081

//employee_departmentoffice Variables @2-829FF33D

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
//End employee_departmentoffice Variables

//Class_Initialize Event @2-6068C95D
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
        $this->DataSource = new clsemployee_departmentofficeDataSource($this);
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
                $this->PageSize = 500;
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

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsInteger, array(False, 0, Null, Null, False, "", "", 1, True, ""), 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->OfficeAcronym = & new clsControl(ccsReportLabel, "OfficeAcronym", "OfficeAcronym", ccsText, "", "", $this);
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->PhilhealthNo = & new clsControl(ccsReportLabel, "PhilhealthNo", "PhilhealthNo", ccsText, "", "", $this);
        $this->ReportLabel5 = & new clsControl(ccsReportLabel, "ReportLabel5", "ReportLabel5", ccsText, "", "", $this);
        $this->ReportLabel2 = & new clsControl(ccsReportLabel, "ReportLabel2", "ReportLabel2", ccsText, "", "", $this);
        $this->ReportLabel1 = & new clsControl(ccsReportLabel, "ReportLabel1", "ReportLabel1", ccsText, "", "", $this);
        $this->ReportLabel3 = & new clsControl(ccsReportLabel, "ReportLabel3", "ReportLabel3", ccsText, "", "", $this);
        $this->ReportLabel4 = & new clsControl(ccsReportLabel, "ReportLabel4", "ReportLabel4", ccsText, "", "", $this);
        $this->ReportLabel6 = & new clsControl(ccsReportLabel, "ReportLabel6", "ReportLabel6", ccsText, "", "", $this);
        $this->ReportLabel7 = & new clsControl(ccsReportLabel, "ReportLabel7", "ReportLabel7", ccsText, "", "", $this);
        $this->ReportLabel8 = & new clsControl(ccsReportLabel, "ReportLabel8", "ReportLabel8", ccsText, "", "", $this);
        $this->ReportLabel9 = & new clsControl(ccsReportLabel, "ReportLabel9", "ReportLabel9", ccsText, "", "", $this);
        $this->ReportLabel10 = & new clsControl(ccsReportLabel, "ReportLabel10", "ReportLabel10", ccsText, "", "", $this);
        $this->ReportLabel11 = & new clsControl(ccsReportLabel, "ReportLabel11", "ReportLabel11", ccsText, "", "", $this);
        $this->ReportLabel12 = & new clsControl(ccsReportLabel, "ReportLabel12", "ReportLabel12", ccsText, "", "", $this);
        $this->ReportLabel13 = & new clsControl(ccsReportLabel, "ReportLabel13", "ReportLabel13", ccsText, "", "", $this);
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

//CheckErrors Method @2-E299C5A2
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->PhilhealthNo->Errors->Count());
        $errors = ($errors || $this->ReportLabel5->Errors->Count());
        $errors = ($errors || $this->ReportLabel2->Errors->Count());
        $errors = ($errors || $this->ReportLabel1->Errors->Count());
        $errors = ($errors || $this->ReportLabel3->Errors->Count());
        $errors = ($errors || $this->ReportLabel4->Errors->Count());
        $errors = ($errors || $this->ReportLabel6->Errors->Count());
        $errors = ($errors || $this->ReportLabel7->Errors->Count());
        $errors = ($errors || $this->ReportLabel8->Errors->Count());
        $errors = ($errors || $this->ReportLabel9->Errors->Count());
        $errors = ($errors || $this->ReportLabel10->Errors->Count());
        $errors = ($errors || $this->ReportLabel11->Errors->Count());
        $errors = ($errors || $this->ReportLabel12->Errors->Count());
        $errors = ($errors || $this->ReportLabel13->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-D0F76D88
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PhilhealthNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel6->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel7->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel8->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel9->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel10->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel11->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel12->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel13->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-5AC6953D
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_employee_OfficeID"] = CCGetFromGet("s_employee_OfficeID", NULL);
        $this->DataSource->Parameters["urls_EmployeeIDNo"] = CCGetFromGet("s_EmployeeIDNo", NULL);
        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleName"] = CCGetFromGet("s_MiddleName", NULL);
        $this->DataSource->Parameters["urlCheckBoxList1"] = CCGetFromGet("CheckBoxList1", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $OfficeAcronymKey = "";
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
            $this->PhilhealthNo->SetValue($this->DataSource->PhilhealthNo->GetValue());
            $this->ReportLabel5->SetValue($this->DataSource->ReportLabel5->GetValue());
            $this->ReportLabel2->SetValue($this->DataSource->ReportLabel2->GetValue());
            $this->ReportLabel1->SetValue($this->DataSource->ReportLabel1->GetValue());
            $this->ReportLabel3->SetValue($this->DataSource->ReportLabel3->GetValue());
            $this->ReportLabel4->SetValue($this->DataSource->ReportLabel4->GetValue());
            $this->ReportLabel6->SetValue($this->DataSource->ReportLabel6->GetValue());
            $this->ReportLabel7->SetValue($this->DataSource->ReportLabel7->GetValue());
            $this->ReportLabel8->SetValue($this->DataSource->ReportLabel8->GetValue());
            $this->ReportLabel9->SetValue($this->DataSource->ReportLabel9->GetValue());
            $this->ReportLabel10->SetValue($this->DataSource->ReportLabel10->GetValue());
            $this->ReportLabel11->SetValue($this->DataSource->ReportLabel11->GetValue());
            $this->ReportLabel12->SetValue($this->DataSource->ReportLabel12->GetValue());
            $this->ReportLabel13->SetValue($this->DataSource->ReportLabel13->GetValue());
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
            $this->ControlsVisible["PhilhealthNo"] = $this->PhilhealthNo->Visible;
            $this->ControlsVisible["ReportLabel5"] = $this->ReportLabel5->Visible;
            $this->ControlsVisible["ReportLabel2"] = $this->ReportLabel2->Visible;
            $this->ControlsVisible["ReportLabel1"] = $this->ReportLabel1->Visible;
            $this->ControlsVisible["ReportLabel3"] = $this->ReportLabel3->Visible;
            $this->ControlsVisible["ReportLabel4"] = $this->ReportLabel4->Visible;
            $this->ControlsVisible["ReportLabel6"] = $this->ReportLabel6->Visible;
            $this->ControlsVisible["ReportLabel7"] = $this->ReportLabel7->Visible;
            $this->ControlsVisible["ReportLabel8"] = $this->ReportLabel8->Visible;
            $this->ControlsVisible["ReportLabel9"] = $this->ReportLabel9->Visible;
            $this->ControlsVisible["ReportLabel10"] = $this->ReportLabel10->Visible;
            $this->ControlsVisible["ReportLabel11"] = $this->ReportLabel11->Visible;
            $this->ControlsVisible["ReportLabel12"] = $this->ReportLabel12->Visible;
            $this->ControlsVisible["ReportLabel13"] = $this->ReportLabel13->Visible;
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
                        $this->PhilhealthNo->SetValue($items[$i]->PhilhealthNo);
                        $this->PhilhealthNo->Attributes->RestoreFromArray($items[$i]->_PhilhealthNoAttributes);
                        $this->ReportLabel5->SetValue($items[$i]->ReportLabel5);
                        $this->ReportLabel5->Attributes->RestoreFromArray($items[$i]->_ReportLabel5Attributes);
                        $this->ReportLabel2->SetValue($items[$i]->ReportLabel2);
                        $this->ReportLabel2->Attributes->RestoreFromArray($items[$i]->_ReportLabel2Attributes);
                        $this->ReportLabel1->SetValue($items[$i]->ReportLabel1);
                        $this->ReportLabel1->Attributes->RestoreFromArray($items[$i]->_ReportLabel1Attributes);
                        $this->ReportLabel3->SetValue($items[$i]->ReportLabel3);
                        $this->ReportLabel3->Attributes->RestoreFromArray($items[$i]->_ReportLabel3Attributes);
                        $this->ReportLabel4->SetValue($items[$i]->ReportLabel4);
                        $this->ReportLabel4->Attributes->RestoreFromArray($items[$i]->_ReportLabel4Attributes);
                        $this->ReportLabel6->SetValue($items[$i]->ReportLabel6);
                        $this->ReportLabel6->Attributes->RestoreFromArray($items[$i]->_ReportLabel6Attributes);
                        $this->ReportLabel7->SetValue($items[$i]->ReportLabel7);
                        $this->ReportLabel7->Attributes->RestoreFromArray($items[$i]->_ReportLabel7Attributes);
                        $this->ReportLabel8->SetValue($items[$i]->ReportLabel8);
                        $this->ReportLabel8->Attributes->RestoreFromArray($items[$i]->_ReportLabel8Attributes);
                        $this->ReportLabel9->SetValue($items[$i]->ReportLabel9);
                        $this->ReportLabel9->Attributes->RestoreFromArray($items[$i]->_ReportLabel9Attributes);
                        $this->ReportLabel10->SetValue($items[$i]->ReportLabel10);
                        $this->ReportLabel10->Attributes->RestoreFromArray($items[$i]->_ReportLabel10Attributes);
                        $this->ReportLabel11->SetValue($items[$i]->ReportLabel11);
                        $this->ReportLabel11->Attributes->RestoreFromArray($items[$i]->_ReportLabel11Attributes);
                        $this->ReportLabel12->SetValue($items[$i]->ReportLabel12);
                        $this->ReportLabel12->Attributes->RestoreFromArray($items[$i]->_ReportLabel12Attributes);
                        $this->ReportLabel13->SetValue($items[$i]->ReportLabel13);
                        $this->ReportLabel13->Attributes->RestoreFromArray($items[$i]->_ReportLabel13Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->PhilhealthNo->Show();
                        $this->ReportLabel5->Show();
                        $this->ReportLabel2->Show();
                        $this->ReportLabel1->Show();
                        $this->ReportLabel3->Show();
                        $this->ReportLabel4->Show();
                        $this->ReportLabel6->Show();
                        $this->ReportLabel7->Show();
                        $this->ReportLabel8->Show();
                        $this->ReportLabel9->Show();
                        $this->ReportLabel10->Show();
                        $this->ReportLabel11->Show();
                        $this->ReportLabel12->Show();
                        $this->ReportLabel13->Show();
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

} //End employee_departmentoffice Class @2-FCB6E20C

class clsemployee_departmentofficeDataSource extends clsDBConnection1 {  //employee_departmentofficeDataSource Class @2-7B43C9D8

//DataSource Variables @2-E2AB2588
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
    var $PhilhealthNo;
    var $ReportLabel5;
    var $ReportLabel2;
    var $ReportLabel1;
    var $ReportLabel3;
    var $ReportLabel4;
    var $ReportLabel6;
    var $ReportLabel7;
    var $ReportLabel8;
    var $ReportLabel9;
    var $ReportLabel10;
    var $ReportLabel11;
    var $ReportLabel12;
    var $ReportLabel13;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-87A4D949
    function clsemployee_departmentofficeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_departmentoffice";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->PhilhealthNo = new clsField("PhilhealthNo", ccsText, "");
        
        $this->ReportLabel5 = new clsField("ReportLabel5", ccsText, "");
        
        $this->ReportLabel2 = new clsField("ReportLabel2", ccsText, "");
        
        $this->ReportLabel1 = new clsField("ReportLabel1", ccsText, "");
        
        $this->ReportLabel3 = new clsField("ReportLabel3", ccsText, "");
        
        $this->ReportLabel4 = new clsField("ReportLabel4", ccsText, "");
        
        $this->ReportLabel6 = new clsField("ReportLabel6", ccsText, "");
        
        $this->ReportLabel7 = new clsField("ReportLabel7", ccsText, "");
        
        $this->ReportLabel8 = new clsField("ReportLabel8", ccsText, "");
        
        $this->ReportLabel9 = new clsField("ReportLabel9", ccsText, "");
        
        $this->ReportLabel10 = new clsField("ReportLabel10", ccsText, "");
        
        $this->ReportLabel11 = new clsField("ReportLabel11", ccsText, "");
        
        $this->ReportLabel12 = new clsField("ReportLabel12", ccsText, "");
        
        $this->ReportLabel13 = new clsField("ReportLabel13", ccsText, "");
        

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

//Prepare Method @2-4F5B0E4D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_employee_OfficeID", ccsInteger, "", "", $this->Parameters["urls_employee_OfficeID"], "", false);
        $this->wp->AddParameter("2", "urls_EmployeeIDNo", ccsText, "", "", $this->Parameters["urls_EmployeeIDNo"], "", false);
        $this->wp->AddParameter("3", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("4", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("5", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->AddParameter("6", "urlCheckBoxList1", ccsText, "", "", $this->Parameters["urlCheckBoxList1"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.OfficeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "EmployeeIDNo", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "Surname", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "FirstName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "MiddleName", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opIn, "lut_statofappt2.StatApp", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText, true),false);
        $this->Where = $this->wp->opAND(
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
             $this->wp->Criterion[6]);
    }
//End Prepare Method

//Open Method @2-4F0EC639
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT Surname, FirstName, MiddleName, PagIbigIDNo, PhilhealthNo, Tin, AgencyEmpNo, EmployeeIDNo, OfficeAcronym, lut_statofappt2.*,\n\n" .
        "employee.OfficeID AS employee_OfficeID, employee.StatAppID AS employee_StatAppID, employee.Position AS employee_Position,\n\n" .
        "Rate, MonthlySalary, NameExtension, BloodType, PermHouseNo, PermStreet, PermSubVillage, PermBrgy, PermMunicipality, PermProvince,\n\n" .
        "PermZipcode, EmergencyName, EmergencyAddress, EmergencyContact, employee.MobileNo AS employee_MobileNo \n\n" .
        "FROM (employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) INNER JOIN lut_statofappt2 ON\n\n" .
        "employee.StatAppID = lut_statofappt2.StatAppID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "departmentoffice.OfficeAcronym asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-F47B8CCA
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->PhilhealthNo->SetDBValue($this->f("employee_MobileNo"));
        $this->ReportLabel5->SetDBValue($this->f("NameExtension"));
        $this->ReportLabel2->SetDBValue($this->f("StatApp"));
        $this->ReportLabel1->SetDBValue($this->f("EmergencyName"));
        $this->ReportLabel3->SetDBValue($this->f("PermHouseNo"));
        $this->ReportLabel4->SetDBValue($this->f("PermStreet"));
        $this->ReportLabel6->SetDBValue($this->f("PermSubVillage"));
        $this->ReportLabel7->SetDBValue($this->f("PermBrgy"));
        $this->ReportLabel8->SetDBValue($this->f("PermMunicipality"));
        $this->ReportLabel9->SetDBValue($this->f("PermProvince"));
        $this->ReportLabel10->SetDBValue($this->f("PermZipcode"));
        $this->ReportLabel11->SetDBValue($this->f("EmergencyAddress"));
        $this->ReportLabel12->SetDBValue($this->f("EmergencyContact"));
        $this->ReportLabel13->SetDBValue($this->f("employee_Position"));
    }
//End SetValues Method

} //End employee_departmentofficeDataSource Class @2-FCB6E20C



//Initialize Page @1-0545A417
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
$TemplateFileName = "Query_EmpID_print3.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5FB88FCE
CCSecurityRedirect("7;6;5;4;3;2", "");
//End Authenticate User

//Include events file @1-FBE29736
include_once("./Query_EmpID_print3_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-39F7CACC
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_departmentoffice = & new clsReportemployee_departmentoffice("", $MainPage);
$MainPage->employee_departmentoffice = & $employee_departmentoffice;
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

//Show Page @1-84826C20
$employee_departmentoffice->Show();
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
