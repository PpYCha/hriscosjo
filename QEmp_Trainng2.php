<?php
//Include Common Files @1-A19A5562
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QEmp_Trainng2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_employee_trainin ReportGroup class @2-DA2D6277
class clsReportGroupemployee_employee_trainin {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $ReportLabel2, $_ReportLabel2Attributes;
    var $TrainingTitle, $_TrainingTitleAttributes;
    var $DateFrom, $_DateFromAttributes;
    var $DateTo, $_DateToAttributes;
    var $NoOfHours, $_NoOfHoursAttributes;
    var $TrainingCategory, $_TrainingCategoryAttributes;
    var $ConductedBy, $_ConductedByAttributes;
    var $EmpPicture, $_EmpPictureAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $Surname, $_SurnameAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_employee_trainin(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->ReportLabel2 = $this->Parent->ReportLabel2->Value;
        $this->TrainingTitle = $this->Parent->TrainingTitle->Value;
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->NoOfHours = $this->Parent->NoOfHours->Value;
        $this->TrainingCategory = $this->Parent->TrainingCategory->Value;
        $this->ConductedBy = $this->Parent->ConductedBy->Value;
        $this->EmpPicture = $this->Parent->EmpPicture->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_ReportLabel2Attributes = $this->Parent->ReportLabel2->Attributes->GetAsArray();
        $this->_TrainingTitleAttributes = $this->Parent->TrainingTitle->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_NoOfHoursAttributes = $this->Parent->NoOfHours->Attributes->GetAsArray();
        $this->_TrainingCategoryAttributes = $this->Parent->TrainingCategory->Attributes->GetAsArray();
        $this->_ConductedByAttributes = $this->Parent->ConductedBy->Attributes->GetAsArray();
        $this->_EmpPictureAttributes = $this->Parent->EmpPicture->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
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
        $this->EmpPicture = $Header->EmpPicture;
        $Header->_EmpPictureAttributes = $this->_EmpPictureAttributes;
        $this->Parent->EmpPicture->Value = $Header->EmpPicture;
        $this->Parent->EmpPicture->Attributes->RestoreFromArray($Header->_EmpPictureAttributes);
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
        $this->MiddleName = $Header->MiddleName;
        $Header->_MiddleNameAttributes = $this->_MiddleNameAttributes;
        $this->Parent->MiddleName->Value = $Header->MiddleName;
        $this->Parent->MiddleName->Attributes->RestoreFromArray($Header->_MiddleNameAttributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
        $this->EmployeeIDNo = $Header->EmployeeIDNo;
        $Header->_EmployeeIDNoAttributes = $this->_EmployeeIDNoAttributes;
        $this->Parent->EmployeeIDNo->Value = $Header->EmployeeIDNo;
        $this->Parent->EmployeeIDNo->Attributes->RestoreFromArray($Header->_EmployeeIDNoAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
    }
}
//End employee_employee_trainin ReportGroup class

//employee_employee_trainin GroupsCollection class @2-79FAA5B9
class clsGroupsCollectionemployee_employee_trainin {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_employee_trainin(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_employee_trainin($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->ReportLabel2->Value = $this->Parent->ReportLabel2->initialValue;
        $this->Parent->TrainingTitle->Value = $this->Parent->TrainingTitle->initialValue;
        $this->Parent->DateFrom->Value = $this->Parent->DateFrom->initialValue;
        $this->Parent->DateTo->Value = $this->Parent->DateTo->initialValue;
        $this->Parent->NoOfHours->Value = $this->Parent->NoOfHours->initialValue;
        $this->Parent->TrainingCategory->Value = $this->Parent->TrainingCategory->initialValue;
        $this->Parent->ConductedBy->Value = $this->Parent->ConductedBy->initialValue;
        $this->Parent->EmpPicture->Value = $this->Parent->EmpPicture->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
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
//End employee_employee_trainin GroupsCollection class

class clsReportemployee_employee_trainin { //employee_employee_trainin Class @2-BACFC88B

//employee_employee_trainin Variables @2-87F7EA53

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
//End employee_employee_trainin Variables

//Class_Initialize Event @2-0EC35630
    function clsReportemployee_employee_trainin($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_employee_trainin";
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
        $this->DataSource = new clsemployee_employee_traininDataSource($this);
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
        $this->TrainingTitle = & new clsControl(ccsReportLabel, "TrainingTitle", "TrainingTitle", ccsText, "", "", $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsDate, array("mm", "/", "dd", "/", "yyyy"), "", $this);
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsDate, array("mm", "/", "dd", "/", "yyyy"), "", $this);
        $this->NoOfHours = & new clsControl(ccsReportLabel, "NoOfHours", "NoOfHours", ccsText, "", "", $this);
        $this->TrainingCategory = & new clsControl(ccsReportLabel, "TrainingCategory", "TrainingCategory", ccsText, "", "", $this);
        $this->ConductedBy = & new clsControl(ccsReportLabel, "ConductedBy", "ConductedBy", ccsText, "", "", $this);
        $this->EmpPicture = & new clsControl(ccsHidden, "EmpPicture", "EmpPicture", ccsText, "", CCGetRequestParam("EmpPicture", ccsGet, NULL), $this);
        $this->NameExtension = & new clsControl(ccsHidden, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsHidden, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsHidden, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsHidden, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->EmployeeIDNo = & new clsControl(ccsHidden, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
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

//CheckErrors Method @2-10639437
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->ReportLabel2->Errors->Count());
        $errors = ($errors || $this->TrainingTitle->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->NoOfHours->Errors->Count());
        $errors = ($errors || $this->TrainingCategory->Errors->Count());
        $errors = ($errors || $this->ConductedBy->Errors->Count());
        $errors = ($errors || $this->EmpPicture->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-C1E51F37
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TrainingTitle->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NoOfHours->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TrainingCategory->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConductedBy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmpPicture->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-AD938D81
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

        $Groups = new clsGroupsCollectionemployee_employee_trainin($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->ReportLabel2->SetValue($this->DataSource->ReportLabel2->GetValue());
            $this->TrainingTitle->SetValue($this->DataSource->TrainingTitle->GetValue());
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->NoOfHours->SetValue($this->DataSource->NoOfHours->GetValue());
            $this->TrainingCategory->SetValue($this->DataSource->TrainingCategory->GetValue());
            $this->ConductedBy->SetValue($this->DataSource->ConductedBy->GetValue());
            $this->EmpPicture->SetValue($this->DataSource->EmpPicture->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
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
            $this->ControlsVisible["TrainingTitle"] = $this->TrainingTitle->Visible;
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["NoOfHours"] = $this->NoOfHours->Visible;
            $this->ControlsVisible["TrainingCategory"] = $this->TrainingCategory->Visible;
            $this->ControlsVisible["ConductedBy"] = $this->ConductedBy->Visible;
            $this->ControlsVisible["EmpPicture"] = $this->EmpPicture->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
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
                        $this->EmpPicture->SetValue($items[$i]->EmpPicture);
                        $this->EmpPicture->Attributes->RestoreFromArray($items[$i]->_EmpPictureAttributes);
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->TrainingTitle->Show();
                        $this->DateFrom->Show();
                        $this->DateTo->Show();
                        $this->NoOfHours->Show();
                        $this->TrainingCategory->Show();
                        $this->ConductedBy->Show();
                        $this->EmpPicture->Show();
                        $this->NameExtension->Show();
                        $this->MiddleName->Show();
                        $this->FirstName->Show();
                        $this->Surname->Show();
                        $this->EmployeeIDNo->Show();
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

} //End employee_employee_trainin Class @2-FCB6E20C

class clsemployee_employee_traininDataSource extends clsDBConnection1 {  //employee_employee_traininDataSource Class @2-E2E4E933

//DataSource Variables @2-A04E0C8C
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $ReportLabel2;
    var $TrainingTitle;
    var $DateFrom;
    var $DateTo;
    var $NoOfHours;
    var $TrainingCategory;
    var $ConductedBy;
    var $EmpPicture;
    var $NameExtension;
    var $MiddleName;
    var $FirstName;
    var $Surname;
    var $EmployeeIDNo;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-3F5E3904
    function clsemployee_employee_traininDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_employee_trainin";
        $this->Initialize();
        $this->ReportLabel2 = new clsField("ReportLabel2", ccsText, "");
        
        $this->TrainingTitle = new clsField("TrainingTitle", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsDate, $this->DateFormat);
        
        $this->NoOfHours = new clsField("NoOfHours", ccsText, "");
        
        $this->TrainingCategory = new clsField("TrainingCategory", ccsText, "");
        
        $this->ConductedBy = new clsField("ConductedBy", ccsText, "");
        
        $this->EmpPicture = new clsField("EmpPicture", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        

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

//Open Method @2-C10429FF
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT EmployeeIDNo, employee_training.*, Surname, FirstName, MiddleName, NameExtension, EmpPicture \n\n" .
        "FROM employee_training INNER JOIN employee ON\n\n" .
        "employee_training.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-BAD32ADF
    function SetValues()
    {
        $this->ReportLabel2->SetDBValue($this->f("EmpPicture"));
        $this->TrainingTitle->SetDBValue($this->f("TrainingTitle"));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue(trim($this->f("DateTo")));
        $this->NoOfHours->SetDBValue($this->f("NoOfHours"));
        $this->TrainingCategory->SetDBValue($this->f("TrainingCategory"));
        $this->ConductedBy->SetDBValue($this->f("ConductedBy"));
        $this->EmpPicture->SetDBValue($this->f("EmpPicture"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
    }
//End SetValues Method

} //End employee_employee_traininDataSource Class @2-FCB6E20C

//Initialize Page @1-26987C7C
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
$TemplateFileName = "QEmp_Trainng2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-14CA4554
include_once("./QEmp_Trainng2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-F60E0939
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_employee_trainin = & new clsReportemployee_employee_trainin("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QEmp_Trainng2_print.php";
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q_Employee.php";
$MainPage->employee_employee_trainin = & $employee_employee_trainin;
$MainPage->Report_Print = & $Report_Print;
$MainPage->Link1 = & $Link1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_employee_trainin->Initialize();

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

//Go to destination page @1-73896F98
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_employee_trainin);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-41F9DF5A
$employee_employee_trainin->Show();
$Report_Print->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-D9F2BBF9
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_employee_trainin);
unset($Tpl);
//End Unload Page


?>
