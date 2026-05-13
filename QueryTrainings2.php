<?php
//Include Common Files @1-260AC0EA
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QueryTrainings2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//departmentoffice_employee1 ReportGroup class @2-E86660D0
class clsReportGroupdepartmentoffice_employee1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $OfficeAcronym, $_OfficeAcronymAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $TrainingTitle, $_TrainingTitleAttributes;
    var $DateFrom, $_DateFromAttributes;
    var $DateTo, $_DateToAttributes;
    var $NoOfHours, $_NoOfHoursAttributes;
    var $TrainingCategory, $_TrainingCategoryAttributes;
    var $ConductedBy, $_ConductedByAttributes;
    var $Report_CurrentPage, $_Report_CurrentPageAttributes;
    var $Report_TotalPages, $_Report_TotalPagesAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;
    var $OfficeAcronymTotalIndex;
    var $SurnameTotalIndex;
    var $FirstNameTotalIndex;
    var $MiddleNameTotalIndex;

    function clsReportGroupdepartmentoffice_employee1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->OfficeAcronym = $this->Parent->OfficeAcronym->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
        $this->TrainingTitle = $this->Parent->TrainingTitle->Value;
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->NoOfHours = $this->Parent->NoOfHours->Value;
        $this->TrainingCategory = $this->Parent->TrainingCategory->Value;
        $this->ConductedBy = $this->Parent->ConductedBy->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Sorter_EmployeeIDNoAttributes = $this->Parent->Sorter_EmployeeIDNo->Attributes->GetAsArray();
        $this->_Sorter_TrainingTitleAttributes = $this->Parent->Sorter_TrainingTitle->Attributes->GetAsArray();
        $this->_Sorter_DateFromAttributes = $this->Parent->Sorter_DateFrom->Attributes->GetAsArray();
        $this->_Sorter_DateToAttributes = $this->Parent->Sorter_DateTo->Attributes->GetAsArray();
        $this->_Sorter_NoOfHoursAttributes = $this->Parent->Sorter_NoOfHours->Attributes->GetAsArray();
        $this->_Sorter_TrainingCategoryAttributes = $this->Parent->Sorter_TrainingCategory->Attributes->GetAsArray();
        $this->_Sorter_ConductedByAttributes = $this->Parent->Sorter_ConductedBy->Attributes->GetAsArray();
        $this->_OfficeAcronymAttributes = $this->Parent->OfficeAcronym->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_TrainingTitleAttributes = $this->Parent->TrainingTitle->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_NoOfHoursAttributes = $this->Parent->NoOfHours->Attributes->GetAsArray();
        $this->_TrainingCategoryAttributes = $this->Parent->TrainingCategory->Attributes->GetAsArray();
        $this->_ConductedByAttributes = $this->Parent->ConductedBy->Attributes->GetAsArray();
        $this->_Report_CurrentPageAttributes = $this->Parent->Report_CurrentPage->Attributes->GetAsArray();
        $this->_Report_TotalPagesAttributes = $this->Parent->Report_TotalPages->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
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
        $this->EmployeeIDNo = $Header->EmployeeIDNo;
        $Header->_EmployeeIDNoAttributes = $this->_EmployeeIDNoAttributes;
        $this->Parent->EmployeeIDNo->Value = $Header->EmployeeIDNo;
        $this->Parent->EmployeeIDNo->Attributes->RestoreFromArray($Header->_EmployeeIDNoAttributes);
        $this->TrainingTitle = $Header->TrainingTitle;
        $Header->_TrainingTitleAttributes = $this->_TrainingTitleAttributes;
        $this->Parent->TrainingTitle->Value = $Header->TrainingTitle;
        $this->Parent->TrainingTitle->Attributes->RestoreFromArray($Header->_TrainingTitleAttributes);
        $this->DateFrom = $Header->DateFrom;
        $Header->_DateFromAttributes = $this->_DateFromAttributes;
        $this->Parent->DateFrom->Value = $Header->DateFrom;
        $this->Parent->DateFrom->Attributes->RestoreFromArray($Header->_DateFromAttributes);
        $this->DateTo = $Header->DateTo;
        $Header->_DateToAttributes = $this->_DateToAttributes;
        $this->Parent->DateTo->Value = $Header->DateTo;
        $this->Parent->DateTo->Attributes->RestoreFromArray($Header->_DateToAttributes);
        $this->NoOfHours = $Header->NoOfHours;
        $Header->_NoOfHoursAttributes = $this->_NoOfHoursAttributes;
        $this->Parent->NoOfHours->Value = $Header->NoOfHours;
        $this->Parent->NoOfHours->Attributes->RestoreFromArray($Header->_NoOfHoursAttributes);
        $this->TrainingCategory = $Header->TrainingCategory;
        $Header->_TrainingCategoryAttributes = $this->_TrainingCategoryAttributes;
        $this->Parent->TrainingCategory->Value = $Header->TrainingCategory;
        $this->Parent->TrainingCategory->Attributes->RestoreFromArray($Header->_TrainingCategoryAttributes);
        $this->ConductedBy = $Header->ConductedBy;
        $Header->_ConductedByAttributes = $this->_ConductedByAttributes;
        $this->Parent->ConductedBy->Value = $Header->ConductedBy;
        $this->Parent->ConductedBy->Attributes->RestoreFromArray($Header->_ConductedByAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
    }
}
//End departmentoffice_employee1 ReportGroup class

//departmentoffice_employee1 GroupsCollection class @2-90874B1A
class clsGroupsCollectiondepartmentoffice_employee1 {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $mOfficeAcronymCurrentHeaderIndex;
    var $mSurnameCurrentHeaderIndex;
    var $mFirstNameCurrentHeaderIndex;
    var $mMiddleNameCurrentHeaderIndex;
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
        $this->mSurnameCurrentHeaderIndex = 2;
        $this->mFirstNameCurrentHeaderIndex = 3;
        $this->mMiddleNameCurrentHeaderIndex = 4;
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdepartmentoffice_employee1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        $group->OfficeAcronymTotalIndex = $this->mOfficeAcronymCurrentHeaderIndex;
        $group->SurnameTotalIndex = $this->mSurnameCurrentHeaderIndex;
        $group->FirstNameTotalIndex = $this->mFirstNameCurrentHeaderIndex;
        $group->MiddleNameTotalIndex = $this->mMiddleNameCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->OfficeAcronym->Value = $this->Parent->OfficeAcronym->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
        $this->Parent->TrainingTitle->Value = $this->Parent->TrainingTitle->initialValue;
        $this->Parent->DateFrom->Value = $this->Parent->DateFrom->initialValue;
        $this->Parent->DateTo->Value = $this->Parent->DateTo->initialValue;
        $this->Parent->NoOfHours->Value = $this->Parent->NoOfHours->initialValue;
        $this->Parent->TrainingCategory->Value = $this->Parent->TrainingCategory->initialValue;
        $this->Parent->ConductedBy->Value = $this->Parent->ConductedBy->initialValue;
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
            $OpenFlag = true;
            $GroupOfficeAcronym->GroupType = "OfficeAcronym";
            $this->mOfficeAcronymCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupOfficeAcronym;
        }
        if ($groupName == "Surname" or $OpenFlag) {
            $GroupSurname = & $this->InitGroup(true);
            $this->Parent->Surname_Header->CCSEventResult = CCGetEvent($this->Parent->Surname_Header->CCSEvents, "OnInitialize", $this->Parent->Surname_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Surname_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Surname_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->Surname_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->Surname_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Surname_Header->Height;
                $GroupSurname->SetTotalControls("GetNextValue");
            $this->Parent->Surname_Header->CCSEventResult = CCGetEvent($this->Parent->Surname_Header->CCSEvents, "OnCalculate", $this->Parent->Surname_Header);
            $GroupSurname->SetControls();
            $GroupSurname->Mode = 1;
            $OpenFlag = true;
            $GroupSurname->GroupType = "Surname";
            $this->mSurnameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupSurname;
        }
        if ($groupName == "FirstName" or $OpenFlag) {
            $GroupFirstName = & $this->InitGroup(true);
            $this->Parent->FirstName_Header->CCSEventResult = CCGetEvent($this->Parent->FirstName_Header->CCSEvents, "OnInitialize", $this->Parent->FirstName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->FirstName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->FirstName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->FirstName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->FirstName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FirstName_Header->Height;
                $GroupFirstName->SetTotalControls("GetNextValue");
            $this->Parent->FirstName_Header->CCSEventResult = CCGetEvent($this->Parent->FirstName_Header->CCSEvents, "OnCalculate", $this->Parent->FirstName_Header);
            $GroupFirstName->SetControls();
            $GroupFirstName->Mode = 1;
            $OpenFlag = true;
            $GroupFirstName->GroupType = "FirstName";
            $this->mFirstNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupFirstName;
        }
        if ($groupName == "MiddleName" or $OpenFlag) {
            $GroupMiddleName = & $this->InitGroup(true);
            $this->Parent->MiddleName_Header->CCSEventResult = CCGetEvent($this->Parent->MiddleName_Header->CCSEvents, "OnInitialize", $this->Parent->MiddleName_Header);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->MiddleName_Header->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->MiddleName_Header->Height;
            if (($this->PageSize > 0) and $this->Parent->MiddleName_Header->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            if ($this->Parent->MiddleName_Header->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->MiddleName_Header->Height;
                $GroupMiddleName->SetTotalControls("GetNextValue");
            $this->Parent->MiddleName_Header->CCSEventResult = CCGetEvent($this->Parent->MiddleName_Header->CCSEvents, "OnCalculate", $this->Parent->MiddleName_Header);
            $GroupMiddleName->SetControls();
            $GroupMiddleName->Mode = 1;
            $GroupMiddleName->GroupType = "MiddleName";
            $this->mMiddleNameCurrentHeaderIndex = count($this->Groups);
            $this->Groups[] = & $GroupMiddleName;
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
        $GroupMiddleName = & $this->InitGroup(true);
        $this->Parent->MiddleName_Footer->CCSEventResult = CCGetEvent($this->Parent->MiddleName_Footer->CCSEvents, "OnInitialize", $this->Parent->MiddleName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->MiddleName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->MiddleName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->MiddleName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupMiddleName->SetTotalControls("GetPrevValue");
        $GroupMiddleName->SyncWithHeader($this->Groups[$this->mMiddleNameCurrentHeaderIndex]);
        if ($this->Parent->MiddleName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->MiddleName_Footer->Height;
        $this->Parent->MiddleName_Footer->CCSEventResult = CCGetEvent($this->Parent->MiddleName_Footer->CCSEvents, "OnCalculate", $this->Parent->MiddleName_Footer);
        $GroupMiddleName->SetControls();
        $this->RestoreValues();
        $GroupMiddleName->Mode = 2;
        $GroupMiddleName->GroupType ="MiddleName";
        $this->Groups[] = & $GroupMiddleName;
        if ($groupName == "MiddleName") return;
        $GroupFirstName = & $this->InitGroup(true);
        $this->Parent->FirstName_Footer->CCSEventResult = CCGetEvent($this->Parent->FirstName_Footer->CCSEvents, "OnInitialize", $this->Parent->FirstName_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->FirstName_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->FirstName_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->FirstName_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupFirstName->SetTotalControls("GetPrevValue");
        $GroupFirstName->SyncWithHeader($this->Groups[$this->mFirstNameCurrentHeaderIndex]);
        if ($this->Parent->FirstName_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->FirstName_Footer->Height;
        $this->Parent->FirstName_Footer->CCSEventResult = CCGetEvent($this->Parent->FirstName_Footer->CCSEvents, "OnCalculate", $this->Parent->FirstName_Footer);
        $GroupFirstName->SetControls();
        $this->RestoreValues();
        $GroupFirstName->Mode = 2;
        $GroupFirstName->GroupType ="FirstName";
        $this->Groups[] = & $GroupFirstName;
        if ($groupName == "FirstName") return;
        $GroupSurname = & $this->InitGroup(true);
        $this->Parent->Surname_Footer->CCSEventResult = CCGetEvent($this->Parent->Surname_Footer->CCSEvents, "OnInitialize", $this->Parent->Surname_Footer);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Surname_Footer->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Surname_Footer->Height;
        if (($this->PageSize > 0) and $this->Parent->Surname_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $GroupSurname->SetTotalControls("GetPrevValue");
        $GroupSurname->SyncWithHeader($this->Groups[$this->mSurnameCurrentHeaderIndex]);
        if ($this->Parent->Surname_Footer->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Surname_Footer->Height;
        $this->Parent->Surname_Footer->CCSEventResult = CCGetEvent($this->Parent->Surname_Footer->CCSEvents, "OnCalculate", $this->Parent->Surname_Footer);
        $GroupSurname->SetControls();
        $this->RestoreValues();
        $GroupSurname->Mode = 2;
        $GroupSurname->GroupType ="Surname";
        $this->Groups[] = & $GroupSurname;
        if ($groupName == "Surname") return;
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

//departmentoffice_employee1 Variables @2-28C22B8C

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
    var $Surname_HeaderBlock, $Surname_Header;
    var $Surname_FooterBlock, $Surname_Footer;
    var $FirstName_HeaderBlock, $FirstName_Header;
    var $FirstName_FooterBlock, $FirstName_Footer;
    var $MiddleName_HeaderBlock, $MiddleName_Header;
    var $MiddleName_FooterBlock, $MiddleName_Footer;
    var $SorterName, $SorterDirection;

    var $ds;
    var $DataSource;
    var $UseClientPaging = false;

    //Report Controls
    var $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    var $Page_FooterControls, $Page_HeaderControls;
    var $OfficeAcronym_HeaderControls, $OfficeAcronym_FooterControls;
    var $Surname_HeaderControls, $Surname_FooterControls;
    var $FirstName_HeaderControls, $FirstName_FooterControls;
    var $MiddleName_HeaderControls, $MiddleName_FooterControls;
    var $Sorter_EmployeeIDNo;
    var $Sorter_TrainingTitle;
    var $Sorter_DateFrom;
    var $Sorter_DateTo;
    var $Sorter_NoOfHours;
    var $Sorter_TrainingCategory;
    var $Sorter_ConductedBy;
//End departmentoffice_employee1 Variables

//Class_Initialize Event @2-CD1931FB
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
        $this->Surname_Footer = new clsSection($this);
        $this->Surname_Header = new clsSection($this);
        $this->Surname_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->Surname_Header->Height);
        $this->FirstName_Footer = new clsSection($this);
        $this->FirstName_Header = new clsSection($this);
        $this->FirstName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->FirstName_Header->Height);
        $this->MiddleName_Footer = new clsSection($this);
        $this->MiddleName_Header = new clsSection($this);
        $this->MiddleName_Header->Height = 1;
        $MaxSectionSize = max($MaxSectionSize, $this->MiddleName_Header->Height);
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
        $this->SorterName = CCGetParam("departmentoffice_employee1Order", "");
        $this->SorterDirection = CCGetParam("departmentoffice_employee1Dir", "");

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Sorter_EmployeeIDNo = & new clsSorter($this->ComponentName, "Sorter_EmployeeIDNo", $FileName, $this);
        $this->Sorter_TrainingTitle = & new clsSorter($this->ComponentName, "Sorter_TrainingTitle", $FileName, $this);
        $this->Sorter_DateFrom = & new clsSorter($this->ComponentName, "Sorter_DateFrom", $FileName, $this);
        $this->Sorter_DateTo = & new clsSorter($this->ComponentName, "Sorter_DateTo", $FileName, $this);
        $this->Sorter_NoOfHours = & new clsSorter($this->ComponentName, "Sorter_NoOfHours", $FileName, $this);
        $this->Sorter_TrainingCategory = & new clsSorter($this->ComponentName, "Sorter_TrainingCategory", $FileName, $this);
        $this->Sorter_ConductedBy = & new clsSorter($this->ComponentName, "Sorter_ConductedBy", $FileName, $this);
        $this->OfficeAcronym = & new clsControl(ccsReportLabel, "OfficeAcronym", "OfficeAcronym", ccsText, "", "", $this);
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->EmployeeIDNo = & new clsControl(ccsReportLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", "", $this);
        $this->TrainingTitle = & new clsControl(ccsReportLabel, "TrainingTitle", "TrainingTitle", ccsText, "", "", $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsDate, $DefaultDateFormat, "", $this);
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsDate, $DefaultDateFormat, "", $this);
        $this->NoOfHours = & new clsControl(ccsReportLabel, "NoOfHours", "NoOfHours", ccsText, "", "", $this);
        $this->TrainingCategory = & new clsControl(ccsReportLabel, "TrainingCategory", "TrainingCategory", ccsText, "", "", $this);
        $this->ConductedBy = & new clsControl(ccsReportLabel, "ConductedBy", "ConductedBy", ccsText, "", "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->PageBreak = & new clsPanel("PageBreak", $this);
        $this->Report_CurrentPage = & new clsControl(ccsReportLabel, "Report_CurrentPage", "Report_CurrentPage", ccsInteger, "", "", $this);
        $this->Report_TotalPages = & new clsControl(ccsReportLabel, "Report_TotalPages", "Report_TotalPages", ccsInteger, "", "", $this);
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

//CheckErrors Method @2-9ACF18C0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->TrainingTitle->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->NoOfHours->Errors->Count());
        $errors = ($errors || $this->TrainingCategory->Errors->Count());
        $errors = ($errors || $this->ConductedBy->Errors->Count());
        $errors = ($errors || $this->Report_CurrentPage->Errors->Count());
        $errors = ($errors || $this->Report_TotalPages->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-94FEEE94
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TrainingTitle->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NoOfHours->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TrainingCategory->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConductedBy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentPage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_TotalPages->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-C6737730
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_EmployeeIDNo"] = CCGetFromGet("s_EmployeeIDNo", NULL);
        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleName"] = CCGetFromGet("s_MiddleName", NULL);
        $this->DataSource->Parameters["urls_OfficeID"] = CCGetFromGet("s_OfficeID", NULL);
        $this->DataSource->Parameters["urls_StatAppt"] = CCGetFromGet("s_StatAppt", NULL);
        $this->DataSource->Parameters["urls_TrainingTitle"] = CCGetFromGet("s_TrainingTitle", NULL);
        $this->DataSource->Parameters["urls_DateFrom"] = CCGetFromGet("s_DateFrom", NULL);
        $this->DataSource->Parameters["urls_DateTo"] = CCGetFromGet("s_DateTo", NULL);
        $this->DataSource->Parameters["urls_NoOfHours"] = CCGetFromGet("s_NoOfHours", NULL);
        $this->DataSource->Parameters["urls_TrainingCategory"] = CCGetFromGet("s_TrainingCategory", NULL);
        $this->DataSource->Parameters["urls_ConductedBy"] = CCGetFromGet("s_ConductedBy", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $OfficeAcronymKey = "";
        $SurnameKey = "";
        $FirstNameKey = "";
        $MiddleNameKey = "";
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
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
            $this->TrainingTitle->SetValue($this->DataSource->TrainingTitle->GetValue());
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->NoOfHours->SetValue($this->DataSource->NoOfHours->GetValue());
            $this->TrainingCategory->SetValue($this->DataSource->TrainingCategory->GetValue());
            $this->ConductedBy->SetValue($this->DataSource->ConductedBy->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            if (count($Groups->Groups) == 2 or $OfficeAcronymKey != $this->DataSource->f("OfficeAcronym")) {
                $Groups->OpenGroup("OfficeAcronym");
            } elseif ($SurnameKey != $this->DataSource->f("Surname")) {
                $Groups->OpenGroup("Surname");
            } elseif ($FirstNameKey != $this->DataSource->f("FirstName")) {
                $Groups->OpenGroup("FirstName");
            } elseif ($MiddleNameKey != $this->DataSource->f("MiddleName")) {
                $Groups->OpenGroup("MiddleName");
            }
            $Groups->AddItem();
            $OfficeAcronymKey = $this->DataSource->f("OfficeAcronym");
            $SurnameKey = $this->DataSource->f("Surname");
            $FirstNameKey = $this->DataSource->f("FirstName");
            $MiddleNameKey = $this->DataSource->f("MiddleName");
            $is_next_record = $this->DataSource->next_record();
            if (!$is_next_record || $OfficeAcronymKey != $this->DataSource->f("OfficeAcronym")) {
                $Groups->CloseGroup("OfficeAcronym");
            } elseif ($SurnameKey != $this->DataSource->f("Surname")) {
                $Groups->CloseGroup("Surname");
            } elseif ($FirstNameKey != $this->DataSource->f("FirstName")) {
                $Groups->CloseGroup("FirstName");
            } elseif ($MiddleNameKey != $this->DataSource->f("MiddleName")) {
                $Groups->CloseGroup("MiddleName");
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
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["TrainingTitle"] = $this->TrainingTitle->Visible;
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["NoOfHours"] = $this->NoOfHours->Visible;
            $this->ControlsVisible["TrainingCategory"] = $this->TrainingCategory->Visible;
            $this->ControlsVisible["ConductedBy"] = $this->ConductedBy->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
                        $this->TrainingTitle->SetValue($items[$i]->TrainingTitle);
                        $this->TrainingTitle->Attributes->RestoreFromArray($items[$i]->_TrainingTitleAttributes);
                        $this->DateFrom->SetValue($items[$i]->DateFrom);
                        $this->DateFrom->Attributes->RestoreFromArray($items[$i]->_DateFromAttributes);
                        $this->DateTo->SetValue($items[$i]->DateTo);
                        $this->DateTo->Attributes->RestoreFromArray($items[$i]->_DateToAttributes);
                        $this->NoOfHours->SetValue($items[$i]->NoOfHours);
                        $this->NoOfHours->Attributes->RestoreFromArray($items[$i]->_NoOfHoursAttributes);
                        $this->TrainingCategory->SetValue($items[$i]->TrainingCategory);
                        $this->TrainingCategory->Attributes->RestoreFromArray($items[$i]->_TrainingCategoryAttributes);
                        $this->ConductedBy->SetValue($items[$i]->ConductedBy);
                        $this->ConductedBy->Attributes->RestoreFromArray($items[$i]->_ConductedByAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->EmployeeIDNo->Show();
                        $this->TrainingTitle->Show();
                        $this->DateFrom->Show();
                        $this->DateTo->Show();
                        $this->NoOfHours->Show();
                        $this->TrainingCategory->Show();
                        $this->ConductedBy->Show();
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
                                $this->Sorter_EmployeeIDNo->Show();
                                $this->Sorter_TrainingTitle->Show();
                                $this->Sorter_DateFrom->Show();
                                $this->Sorter_DateTo->Show();
                                $this->Sorter_NoOfHours->Show();
                                $this->Sorter_TrainingCategory->Show();
                                $this->Sorter_ConductedBy->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->PageBreak->Visible = (($i < count($items) - 1) && ($this->ViewMode == "Print"));
                            $this->Report_CurrentPage->SetValue($items[$i]->PageNumber);
                            $this->Report_CurrentPage->Attributes->RestoreFromArray($items[$i]->_Report_CurrentPageAttributes);
                            $this->Report_TotalPages->SetValue($Groups->TotalPages);
                            $this->Report_TotalPages->Attributes->RestoreFromArray($items[$i]->_Report_TotalPagesAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
                                $this->Report_CurrentPage->Show();
                                $this->Report_TotalPages->Show();
                                $this->Navigator->Show();
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
                    case "Surname":
                        if ($items[$i]->Mode == 1) {
                            $this->Surname->SetValue($items[$i]->Surname);
                            $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                            $this->Surname_Header->CCSEventResult = CCGetEvent($this->Surname_Header->CCSEvents, "BeforeShow", $this->Surname_Header);
                            if ($this->Surname_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Surname_Header";
                                $this->Attributes->Show();
                                $this->Surname->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Surname_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Surname_Footer->CCSEventResult = CCGetEvent($this->Surname_Footer->CCSEvents, "BeforeShow", $this->Surname_Footer);
                            if ($this->Surname_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Surname_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Surname_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "FirstName":
                        if ($items[$i]->Mode == 1) {
                            $this->FirstName->SetValue($items[$i]->FirstName);
                            $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                            $this->FirstName_Header->CCSEventResult = CCGetEvent($this->FirstName_Header->CCSEvents, "BeforeShow", $this->FirstName_Header);
                            if ($this->FirstName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FirstName_Header";
                                $this->Attributes->Show();
                                $this->FirstName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FirstName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->FirstName_Footer->CCSEventResult = CCGetEvent($this->FirstName_Footer->CCSEvents, "BeforeShow", $this->FirstName_Footer);
                            if ($this->FirstName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section FirstName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section FirstName_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "MiddleName":
                        if ($items[$i]->Mode == 1) {
                            $this->MiddleName->SetValue($items[$i]->MiddleName);
                            $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                            $this->MiddleName_Header->CCSEventResult = CCGetEvent($this->MiddleName_Header->CCSEvents, "BeforeShow", $this->MiddleName_Header);
                            if ($this->MiddleName_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section MiddleName_Header";
                                $this->Attributes->Show();
                                $this->MiddleName->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section MiddleName_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->MiddleName_Footer->CCSEventResult = CCGetEvent($this->MiddleName_Footer->CCSEvents, "BeforeShow", $this->MiddleName_Footer);
                            if ($this->MiddleName_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section MiddleName_Footer";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section MiddleName_Footer", true, "Section Detail");
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

//DataSource Variables @2-F1136140
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
    var $EmployeeIDNo;
    var $TrainingTitle;
    var $DateFrom;
    var $DateTo;
    var $NoOfHours;
    var $TrainingCategory;
    var $ConductedBy;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-64EC0361
    function clsdepartmentoffice_employee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report departmentoffice_employee1";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->TrainingTitle = new clsField("TrainingTitle", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsDate, $this->DateFormat);
        
        $this->NoOfHours = new clsField("NoOfHours", ccsText, "");
        
        $this->TrainingCategory = new clsField("TrainingCategory", ccsText, "");
        
        $this->ConductedBy = new clsField("ConductedBy", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-B0B55B58
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateTo";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_EmployeeIDNo" => array("EmployeeIDNo", ""), 
            "Sorter_TrainingTitle" => array("TrainingTitle", ""), 
            "Sorter_DateFrom" => array("DateFrom", ""), 
            "Sorter_DateTo" => array("DateTo", ""), 
            "Sorter_NoOfHours" => array("NoOfHours", ""), 
            "Sorter_TrainingCategory" => array("TrainingCategory", ""), 
            "Sorter_ConductedBy" => array("ConductedBy", "")));
    }
//End SetOrder Method

//Prepare Method @2-96DD808E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_EmployeeIDNo", ccsText, "", "", $this->Parameters["urls_EmployeeIDNo"], "", false);
        $this->wp->AddParameter("2", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->AddParameter("5", "urls_OfficeID", ccsInteger, "", "", $this->Parameters["urls_OfficeID"], "", false);
        $this->wp->AddParameter("6", "urls_StatAppt", ccsText, "", "", $this->Parameters["urls_StatAppt"], "", false);
        $this->wp->AddParameter("7", "urls_TrainingTitle", ccsText, "", "", $this->Parameters["urls_TrainingTitle"], "", false);
        $this->wp->AddParameter("8", "urls_DateFrom", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->Parameters["urls_DateFrom"], "", false);
        $this->wp->AddParameter("9", "urls_DateTo", ccsDate, $DefaultDateFormat, $this->DateFormat, $this->Parameters["urls_DateTo"], "", false);
        $this->wp->AddParameter("10", "urls_NoOfHours", ccsText, "", "", $this->Parameters["urls_NoOfHours"], "", false);
        $this->wp->AddParameter("11", "urls_TrainingCategory", ccsText, "", "", $this->Parameters["urls_TrainingCategory"], "", false);
        $this->wp->AddParameter("12", "urls_ConductedBy", ccsText, "", "", $this->Parameters["urls_ConductedBy"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "EmployeeIDNo", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "MiddleName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "employee.OfficeID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "StatAppt", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opContains, "TrainingTitle", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsText),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opEqual, "DateFrom", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsDate),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opEqual, "DateTo", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsDate),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opContains, "NoOfHours", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsText),false);
        $this->wp->Criterion[11] = $this->wp->Operation(opContains, "TrainingCategory", $this->wp->GetDBValue("11"), $this->ToSQL($this->wp->GetDBValue("11"), ccsText),false);
        $this->wp->Criterion[12] = $this->wp->Operation(opContains, "ConductedBy", $this->wp->GetDBValue("12"), $this->ToSQL($this->wp->GetDBValue("12"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
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
             $this->wp->Criterion[10]), 
             $this->wp->Criterion[11]), 
             $this->wp->Criterion[12]);
    }
//End Prepare Method

//Open Method @2-53DFF260
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT OfficeAcronym, employee.*, employee_training.* \n\n" .
        "FROM (employee INNER JOIN departmentoffice ON\n\n" .
        "employee.OfficeID = departmentoffice.OfficeID) INNER JOIN employee_training ON\n\n" .
        "employee_training.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, "departmentoffice.OfficeAcronym asc,employee.Surname asc,employee.FirstName asc,employee.MiddleName asc" .  ($this->Order ? ", " . $this->Order: "")));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-40E46D56
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->TrainingTitle->SetDBValue($this->f("TrainingTitle"));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue(trim($this->f("DateTo")));
        $this->NoOfHours->SetDBValue($this->f("NoOfHours"));
        $this->TrainingCategory->SetDBValue($this->f("TrainingCategory"));
        $this->ConductedBy->SetDBValue($this->f("ConductedBy"));
    }
//End SetValues Method

} //End departmentoffice_employee1DataSource Class @2-FCB6E20C

class clsRecorddepartmentoffice_employee { //departmentoffice_employee Class @11-B39F2074

//Variables @11-D6FF3E86

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

//Class_Initialize Event @11-42D1D53F
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
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_EmployeeIDNo", "s_Surname", "s_FirstName", "s_MiddleName", "s_OfficeID", "s_StatAppt", "s_TrainingTitle", "s_DateFrom", "s_DateTo", "s_NoOfHours", "s_TrainingCategory", "s_ConductedBy", "ccsForm"));
            $this->ClearParameters->Page = "QueryTrainings2.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_EmployeeIDNo = & new clsControl(ccsTextBox, "s_EmployeeIDNo", "s_EmployeeIDNo", ccsText, "", CCGetRequestParam("s_EmployeeIDNo", $Method, NULL), $this);
            $this->s_Surname = & new clsControl(ccsTextBox, "s_Surname", "s_Surname", ccsText, "", CCGetRequestParam("s_Surname", $Method, NULL), $this);
            $this->s_FirstName = & new clsControl(ccsTextBox, "s_FirstName", "s_FirstName", ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_MiddleName = & new clsControl(ccsTextBox, "s_MiddleName", "s_MiddleName", ccsText, "", CCGetRequestParam("s_MiddleName", $Method, NULL), $this);
            $this->s_OfficeID = & new clsControl(ccsListBox, "s_OfficeID", "s_OfficeID", ccsInteger, "", CCGetRequestParam("s_OfficeID", $Method, NULL), $this);
            $this->s_StatAppt = & new clsControl(ccsListBox, "s_StatAppt", "s_StatAppt", ccsText, "", CCGetRequestParam("s_StatAppt", $Method, NULL), $this);
            $this->s_TrainingTitle = & new clsControl(ccsTextBox, "s_TrainingTitle", "s_TrainingTitle", ccsText, "", CCGetRequestParam("s_TrainingTitle", $Method, NULL), $this);
            $this->s_DateFrom = & new clsControl(ccsTextBox, "s_DateFrom", "s_DateFrom", ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DateFrom", $Method, NULL), $this);
            $this->DatePicker_s_DateFrom = & new clsDatePicker("DatePicker_s_DateFrom", "departmentoffice_employee", "s_DateFrom", $this);
            $this->s_DateTo = & new clsControl(ccsTextBox, "s_DateTo", "s_DateTo", ccsDate, $DefaultDateFormat, CCGetRequestParam("s_DateTo", $Method, NULL), $this);
            $this->DatePicker_s_DateTo = & new clsDatePicker("DatePicker_s_DateTo", "departmentoffice_employee", "s_DateTo", $this);
            $this->s_NoOfHours = & new clsControl(ccsTextBox, "s_NoOfHours", "s_NoOfHours", ccsText, "", CCGetRequestParam("s_NoOfHours", $Method, NULL), $this);
            $this->s_TrainingCategory = & new clsControl(ccsTextBox, "s_TrainingCategory", "s_TrainingCategory", ccsText, "", CCGetRequestParam("s_TrainingCategory", $Method, NULL), $this);
            $this->s_ConductedBy = & new clsControl(ccsTextBox, "s_ConductedBy", "s_ConductedBy", ccsText, "", CCGetRequestParam("s_ConductedBy", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @11-D91524CB
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_EmployeeIDNo->Validate() && $Validation);
        $Validation = ($this->s_Surname->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_MiddleName->Validate() && $Validation);
        $Validation = ($this->s_OfficeID->Validate() && $Validation);
        $Validation = ($this->s_StatAppt->Validate() && $Validation);
        $Validation = ($this->s_TrainingTitle->Validate() && $Validation);
        $Validation = ($this->s_DateFrom->Validate() && $Validation);
        $Validation = ($this->s_DateTo->Validate() && $Validation);
        $Validation = ($this->s_NoOfHours->Validate() && $Validation);
        $Validation = ($this->s_TrainingCategory->Validate() && $Validation);
        $Validation = ($this->s_ConductedBy->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_EmployeeIDNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_OfficeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_StatAppt->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_TrainingTitle->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DateFrom->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_DateTo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_NoOfHours->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_TrainingCategory->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_ConductedBy->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @11-983434FB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->s_Surname->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_MiddleName->Errors->Count());
        $errors = ($errors || $this->s_OfficeID->Errors->Count());
        $errors = ($errors || $this->s_StatAppt->Errors->Count());
        $errors = ($errors || $this->s_TrainingTitle->Errors->Count());
        $errors = ($errors || $this->s_DateFrom->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DateFrom->Errors->Count());
        $errors = ($errors || $this->s_DateTo->Errors->Count());
        $errors = ($errors || $this->DatePicker_s_DateTo->Errors->Count());
        $errors = ($errors || $this->s_NoOfHours->Errors->Count());
        $errors = ($errors || $this->s_TrainingCategory->Errors->Count());
        $errors = ($errors || $this->s_ConductedBy->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @11-ED598703
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

//Operation Method @11-9262332F
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
        $Redirect = "QueryTrainings2.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "QueryTrainings2.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @11-15BC7D60
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

        $this->s_OfficeID->Prepare();
        $this->s_StatAppt->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_EmployeeIDNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Surname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_OfficeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_StatAppt->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_TrainingTitle->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DateFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DateFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_DateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_s_DateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_NoOfHours->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_TrainingCategory->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_ConductedBy->Errors->ToString());
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
        $this->s_EmployeeIDNo->Show();
        $this->s_Surname->Show();
        $this->s_FirstName->Show();
        $this->s_MiddleName->Show();
        $this->s_OfficeID->Show();
        $this->s_StatAppt->Show();
        $this->s_TrainingTitle->Show();
        $this->s_DateFrom->Show();
        $this->DatePicker_s_DateFrom->Show();
        $this->s_DateTo->Show();
        $this->DatePicker_s_DateTo->Show();
        $this->s_NoOfHours->Show();
        $this->s_TrainingCategory->Show();
        $this->s_ConductedBy->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End departmentoffice_employee Class @11-FCB6E20C

//Initialize Page @1-F7B31773
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
$TemplateFileName = "QueryTrainings2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-C9BE49DA
include_once("./QueryTrainings2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-6B96DE64
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$departmentoffice_employee1 = & new clsReportdepartmentoffice_employee1("", $MainPage);
$departmentoffice_employee = & new clsRecorddepartmentoffice_employee("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QueryTrainings2.php";
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
