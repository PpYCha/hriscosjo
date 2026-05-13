<?php
//Include Common Files @1-922CA703
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Cert_Appearance2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//departmentoffice_employee1 ReportGroup class @2-6E048772
class clsReportGroupdepartmentoffice_employee1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Surname, $_SurnameAttributes;
    var $NameOfficeDept, $_NameOfficeDeptAttributes;
    var $CertDay, $_CertDayAttributes;
    var $CertMonth, $_CertMonthAttributes;
    var $CertYear, $_CertYearAttributes;
    var $ServiceRecPurpose, $_ServiceRecPurposeAttributes;
    var $ImageLink2, $_ImageLink2Page, $_ImageLink2Parameters, $_ImageLink2Attributes;
    var $ImageLink3, $_ImageLink3Page, $_ImageLink3Parameters, $_ImageLink3Attributes;
    var $ImageLink4, $_ImageLink4Page, $_ImageLink4Parameters, $_ImageLink4Attributes;
    var $ImageLink1, $_ImageLink1Page, $_ImageLink1Parameters, $_ImageLink1Attributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupdepartmentoffice_employee1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Surname = $this->Parent->Surname->Value;
        $this->NameOfficeDept = $this->Parent->NameOfficeDept->Value;
        $this->CertDay = $this->Parent->CertDay->Value;
        $this->CertMonth = $this->Parent->CertMonth->Value;
        $this->CertYear = $this->Parent->CertYear->Value;
        $this->ServiceRecPurpose = $this->Parent->ServiceRecPurpose->Value;
        $this->ImageLink2 = $this->Parent->ImageLink2->Value;
        $this->ImageLink3 = $this->Parent->ImageLink3->Value;
        $this->ImageLink4 = $this->Parent->ImageLink4->Value;
        $this->ImageLink1 = $this->Parent->ImageLink1->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_ImageLink2Page = $this->Parent->ImageLink2->Page;
        $this->_ImageLink2Parameters = $this->Parent->ImageLink2->Parameters;
        $this->_ImageLink3Page = $this->Parent->ImageLink3->Page;
        $this->_ImageLink3Parameters = $this->Parent->ImageLink3->Parameters;
        $this->_ImageLink4Page = $this->Parent->ImageLink4->Page;
        $this->_ImageLink4Parameters = $this->Parent->ImageLink4->Parameters;
        $this->_ImageLink1Page = $this->Parent->ImageLink1->Page;
        $this->_ImageLink1Parameters = $this->Parent->ImageLink1->Parameters;
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_NameOfficeDeptAttributes = $this->Parent->NameOfficeDept->Attributes->GetAsArray();
        $this->_CertDayAttributes = $this->Parent->CertDay->Attributes->GetAsArray();
        $this->_CertMonthAttributes = $this->Parent->CertMonth->Attributes->GetAsArray();
        $this->_CertYearAttributes = $this->Parent->CertYear->Attributes->GetAsArray();
        $this->_ServiceRecPurposeAttributes = $this->Parent->ServiceRecPurpose->Attributes->GetAsArray();
        $this->_ImageLink2Attributes = $this->Parent->ImageLink2->Attributes->GetAsArray();
        $this->_ImageLink3Attributes = $this->Parent->ImageLink3->Attributes->GetAsArray();
        $this->_ImageLink4Attributes = $this->Parent->ImageLink4->Attributes->GetAsArray();
        $this->_ImageLink1Attributes = $this->Parent->ImageLink1->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
        $this->NameOfficeDept = $Header->NameOfficeDept;
        $Header->_NameOfficeDeptAttributes = $this->_NameOfficeDeptAttributes;
        $this->Parent->NameOfficeDept->Value = $Header->NameOfficeDept;
        $this->Parent->NameOfficeDept->Attributes->RestoreFromArray($Header->_NameOfficeDeptAttributes);
        $this->CertDay = $Header->CertDay;
        $Header->_CertDayAttributes = $this->_CertDayAttributes;
        $this->Parent->CertDay->Value = $Header->CertDay;
        $this->Parent->CertDay->Attributes->RestoreFromArray($Header->_CertDayAttributes);
        $this->CertMonth = $Header->CertMonth;
        $Header->_CertMonthAttributes = $this->_CertMonthAttributes;
        $this->Parent->CertMonth->Value = $Header->CertMonth;
        $this->Parent->CertMonth->Attributes->RestoreFromArray($Header->_CertMonthAttributes);
        $this->CertYear = $Header->CertYear;
        $Header->_CertYearAttributes = $this->_CertYearAttributes;
        $this->Parent->CertYear->Value = $Header->CertYear;
        $this->Parent->CertYear->Attributes->RestoreFromArray($Header->_CertYearAttributes);
        $this->ServiceRecPurpose = $Header->ServiceRecPurpose;
        $Header->_ServiceRecPurposeAttributes = $this->_ServiceRecPurposeAttributes;
        $this->Parent->ServiceRecPurpose->Value = $Header->ServiceRecPurpose;
        $this->Parent->ServiceRecPurpose->Attributes->RestoreFromArray($Header->_ServiceRecPurposeAttributes);
        $this->ImageLink2 = $Header->ImageLink2;
        $this->_ImageLink2Page = $Header->_ImageLink2Page;
        $this->_ImageLink2Parameters = $Header->_ImageLink2Parameters;
        $Header->_ImageLink2Attributes = $this->_ImageLink2Attributes;
        $this->Parent->ImageLink2->Value = $Header->ImageLink2;
        $this->Parent->ImageLink2->Attributes->RestoreFromArray($Header->_ImageLink2Attributes);
        $this->ImageLink3 = $Header->ImageLink3;
        $this->_ImageLink3Page = $Header->_ImageLink3Page;
        $this->_ImageLink3Parameters = $Header->_ImageLink3Parameters;
        $Header->_ImageLink3Attributes = $this->_ImageLink3Attributes;
        $this->Parent->ImageLink3->Value = $Header->ImageLink3;
        $this->Parent->ImageLink3->Attributes->RestoreFromArray($Header->_ImageLink3Attributes);
        $this->ImageLink4 = $Header->ImageLink4;
        $this->_ImageLink4Page = $Header->_ImageLink4Page;
        $this->_ImageLink4Parameters = $Header->_ImageLink4Parameters;
        $Header->_ImageLink4Attributes = $this->_ImageLink4Attributes;
        $this->Parent->ImageLink4->Value = $Header->ImageLink4;
        $this->Parent->ImageLink4->Attributes->RestoreFromArray($Header->_ImageLink4Attributes);
        $this->ImageLink1 = $Header->ImageLink1;
        $this->_ImageLink1Page = $Header->_ImageLink1Page;
        $this->_ImageLink1Parameters = $Header->_ImageLink1Parameters;
        $Header->_ImageLink1Attributes = $this->_ImageLink1Attributes;
        $this->Parent->ImageLink1->Value = $Header->ImageLink1;
        $this->Parent->ImageLink1->Attributes->RestoreFromArray($Header->_ImageLink1Attributes);
    }
    function ChangeTotalControls() {
    }
}
//End departmentoffice_employee1 ReportGroup class

//departmentoffice_employee1 GroupsCollection class @2-F4E3BDC6
class clsGroupsCollectiondepartmentoffice_employee1 {
    var $Groups;
    var $mPageCurrentHeaderIndex;
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
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupdepartmentoffice_employee1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->NameOfficeDept->Value = $this->Parent->NameOfficeDept->initialValue;
        $this->Parent->CertDay->Value = $this->Parent->CertDay->initialValue;
        $this->Parent->CertMonth->Value = $this->Parent->CertMonth->initialValue;
        $this->Parent->CertYear->Value = $this->Parent->CertYear->initialValue;
        $this->Parent->ServiceRecPurpose->Value = $this->Parent->ServiceRecPurpose->initialValue;
        $this->Parent->ImageLink2->Value = $this->Parent->ImageLink2->initialValue;
        $this->Parent->ImageLink3->Value = $this->Parent->ImageLink3->initialValue;
        $this->Parent->ImageLink4->Value = $this->Parent->ImageLink4->initialValue;
        $this->Parent->ImageLink1->Value = $this->Parent->ImageLink1->initialValue;
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
//End departmentoffice_employee1 GroupsCollection class

class clsReportdepartmentoffice_employee1 { //departmentoffice_employee1 Class @2-AE91AF00

//departmentoffice_employee1 Variables @2-87F7EA53

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
//End departmentoffice_employee1 Variables

//Class_Initialize Event @2-E91AE805
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
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsdepartmentoffice_employee1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Print");
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

        $this->Surname = & new clsControl(ccsHidden, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->NameOfficeDept = & new clsControl(ccsHidden, "NameOfficeDept", "NameOfficeDept", ccsText, "", CCGetRequestParam("NameOfficeDept", ccsGet, NULL), $this);
        $this->CertDay = & new clsControl(ccsHidden, "CertDay", "CertDay", ccsText, "", CCGetRequestParam("CertDay", ccsGet, NULL), $this);
        $this->CertMonth = & new clsControl(ccsHidden, "CertMonth", "CertMonth", ccsText, "", CCGetRequestParam("CertMonth", ccsGet, NULL), $this);
        $this->CertYear = & new clsControl(ccsHidden, "CertYear", "CertYear", ccsText, "", CCGetRequestParam("CertYear", ccsGet, NULL), $this);
        $this->ServiceRecPurpose = & new clsControl(ccsHidden, "ServiceRecPurpose", "ServiceRecPurpose", ccsText, "", CCGetRequestParam("ServiceRecPurpose", ccsGet, NULL), $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->ImageLink2 = & new clsControl(ccsImageLink, "ImageLink2", "ImageLink2", ccsText, "", CCGetRequestParam("ImageLink2", ccsGet, NULL), $this);
        $this->ImageLink2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink2->Page = "";
        $this->ImageLink3 = & new clsControl(ccsImageLink, "ImageLink3", "ImageLink3", ccsText, "", CCGetRequestParam("ImageLink3", ccsGet, NULL), $this);
        $this->ImageLink3->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink3->Page = "";
        $this->ImageLink4 = & new clsControl(ccsImageLink, "ImageLink4", "ImageLink4", ccsText, "", CCGetRequestParam("ImageLink4", ccsGet, NULL), $this);
        $this->ImageLink4->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink4->Page = "";
        $this->ImageLink1 = & new clsControl(ccsImageLink, "ImageLink1", "ImageLink1", ccsText, "", CCGetRequestParam("ImageLink1", ccsGet, NULL), $this);
        $this->ImageLink1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ImageLink1->Page = "";
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

//CheckErrors Method @2-13EABC09
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->NameOfficeDept->Errors->Count());
        $errors = ($errors || $this->CertDay->Errors->Count());
        $errors = ($errors || $this->CertMonth->Errors->Count());
        $errors = ($errors || $this->CertYear->Errors->Count());
        $errors = ($errors || $this->ServiceRecPurpose->Errors->Count());
        $errors = ($errors || $this->ImageLink2->Errors->Count());
        $errors = ($errors || $this->ImageLink3->Errors->Count());
        $errors = ($errors || $this->ImageLink4->Errors->Count());
        $errors = ($errors || $this->ImageLink1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-CD68E2FD
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameOfficeDept->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ServiceRecPurpose->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ImageLink1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-9F70CFAE
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;


        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectiondepartmentoffice_employee1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->NameOfficeDept->SetValue($this->DataSource->NameOfficeDept->GetValue());
            $this->CertDay->SetValue($this->DataSource->CertDay->GetValue());
            $this->CertMonth->SetValue($this->DataSource->CertMonth->GetValue());
            $this->CertYear->SetValue($this->DataSource->CertYear->GetValue());
            $this->ServiceRecPurpose->SetValue($this->DataSource->ServiceRecPurpose->GetValue());
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
            $this->ControlsVisible["NameOfficeDept"] = $this->NameOfficeDept->Visible;
            $this->ControlsVisible["CertDay"] = $this->CertDay->Visible;
            $this->ControlsVisible["CertMonth"] = $this->CertMonth->Visible;
            $this->ControlsVisible["CertYear"] = $this->CertYear->Visible;
            $this->ControlsVisible["ServiceRecPurpose"] = $this->ServiceRecPurpose->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->NameOfficeDept->SetValue($items[$i]->NameOfficeDept);
                        $this->NameOfficeDept->Attributes->RestoreFromArray($items[$i]->_NameOfficeDeptAttributes);
                        $this->CertDay->SetValue($items[$i]->CertDay);
                        $this->CertDay->Attributes->RestoreFromArray($items[$i]->_CertDayAttributes);
                        $this->CertMonth->SetValue($items[$i]->CertMonth);
                        $this->CertMonth->Attributes->RestoreFromArray($items[$i]->_CertMonthAttributes);
                        $this->CertYear->SetValue($items[$i]->CertYear);
                        $this->CertYear->Attributes->RestoreFromArray($items[$i]->_CertYearAttributes);
                        $this->ServiceRecPurpose->SetValue($items[$i]->ServiceRecPurpose);
                        $this->ServiceRecPurpose->Attributes->RestoreFromArray($items[$i]->_ServiceRecPurposeAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Surname->Show();
                        $this->NameOfficeDept->Show();
                        $this->CertDay->Show();
                        $this->CertMonth->Show();
                        $this->CertYear->Show();
                        $this->ServiceRecPurpose->Show();
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
                            $this->ImageLink2->SetValue($items[$i]->ImageLink2);
                            $this->ImageLink2->Page = $items[$i]->_ImageLink2Page;
                            $this->ImageLink2->Parameters = $items[$i]->_ImageLink2Parameters;
                            $this->ImageLink2->Attributes->RestoreFromArray($items[$i]->_ImageLink2Attributes);
                            $this->ImageLink3->SetValue($items[$i]->ImageLink3);
                            $this->ImageLink3->Page = $items[$i]->_ImageLink3Page;
                            $this->ImageLink3->Parameters = $items[$i]->_ImageLink3Parameters;
                            $this->ImageLink3->Attributes->RestoreFromArray($items[$i]->_ImageLink3Attributes);
                            $this->ImageLink4->SetValue($items[$i]->ImageLink4);
                            $this->ImageLink4->Page = $items[$i]->_ImageLink4Page;
                            $this->ImageLink4->Parameters = $items[$i]->_ImageLink4Parameters;
                            $this->ImageLink4->Attributes->RestoreFromArray($items[$i]->_ImageLink4Attributes);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->ImageLink2->Show();
                                $this->ImageLink3->Show();
                                $this->ImageLink4->Show();
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

} //End departmentoffice_employee1 Class @2-FCB6E20C

class clsdepartmentoffice_employee1DataSource extends clsDBConnection1 {  //departmentoffice_employee1DataSource Class @2-95CBF60B

//DataSource Variables @2-642FA797
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Surname;
    var $NameOfficeDept;
    var $CertDay;
    var $CertMonth;
    var $CertYear;
    var $ServiceRecPurpose;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-BB03C16F
    function clsdepartmentoffice_employee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report departmentoffice_employee1";
        $this->Initialize();
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->NameOfficeDept = new clsField("NameOfficeDept", ccsText, "");
        
        $this->CertDay = new clsField("CertDay", ccsText, "");
        
        $this->CertMonth = new clsField("CertMonth", ccsText, "");
        
        $this->CertYear = new clsField("CertYear", ccsText, "");
        
        $this->ServiceRecPurpose = new clsField("ServiceRecPurpose", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-F1DE1534
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM cert_appearance {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-AA1040EC
    function SetValues()
    {
        $this->Surname->SetDBValue($this->f("AppearanceName"));
        $this->NameOfficeDept->SetDBValue($this->f("AppearanceDesgntnPlace"));
        $this->CertDay->SetDBValue($this->f("CertDay"));
        $this->CertMonth->SetDBValue($this->f("CertMonth"));
        $this->CertYear->SetDBValue($this->f("CertYear"));
        $this->ServiceRecPurpose->SetDBValue($this->f("AppearancePurpose"));
    }
//End SetValues Method

} //End departmentoffice_employee1DataSource Class @2-FCB6E20C



//Initialize Page @1-C107B2BF
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
$TemplateFileName = "Cert_Appearance2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-EA3D416E
include_once("./Cert_Appearance2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-C9411D52
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$departmentoffice_employee1 = & new clsReportdepartmentoffice_employee1("", $MainPage);
$MainPage->departmentoffice_employee1 = & $departmentoffice_employee1;
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

//Go to destination page @1-701BFE0C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($departmentoffice_employee1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B0B6BCA9
$departmentoffice_employee1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EC936C9D
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($departmentoffice_employee1);
unset($Tpl);
//End Unload Page


?>
