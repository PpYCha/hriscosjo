<?php
//Include Common Files @1-634AE7A9
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Query_PSA.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee ReportGroup class @2-D3DDCC93
class clsReportGroupemployee {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $ResHouseNo, $_ResHouseNoAttributes;
    var $ResStreet, $_ResStreetAttributes;
    var $ResSubVillage, $_ResSubVillageAttributes;
    var $ResBrgy, $_ResBrgyAttributes;
    var $ResMunicipality, $_ResMunicipalityAttributes;
    var $ResProvince, $_ResProvinceAttributes;
    var $ResZipcode, $_ResZipcodeAttributes;
    var $MobileNo, $_MobileNoAttributes;
    var $TotalCount_Surname, $_TotalCount_SurnameAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->ResHouseNo = $this->Parent->ResHouseNo->Value;
        $this->ResStreet = $this->Parent->ResStreet->Value;
        $this->ResSubVillage = $this->Parent->ResSubVillage->Value;
        $this->ResBrgy = $this->Parent->ResBrgy->Value;
        $this->ResMunicipality = $this->Parent->ResMunicipality->Value;
        $this->ResProvince = $this->Parent->ResProvince->Value;
        $this->ResZipcode = $this->Parent->ResZipcode->Value;
        $this->MobileNo = $this->Parent->MobileNo->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->TotalCount_Surname = $this->Parent->TotalCount_Surname->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_ResHouseNoAttributes = $this->Parent->ResHouseNo->Attributes->GetAsArray();
        $this->_ResStreetAttributes = $this->Parent->ResStreet->Attributes->GetAsArray();
        $this->_ResSubVillageAttributes = $this->Parent->ResSubVillage->Attributes->GetAsArray();
        $this->_ResBrgyAttributes = $this->Parent->ResBrgy->Attributes->GetAsArray();
        $this->_ResMunicipalityAttributes = $this->Parent->ResMunicipality->Attributes->GetAsArray();
        $this->_ResProvinceAttributes = $this->Parent->ResProvince->Attributes->GetAsArray();
        $this->_ResZipcodeAttributes = $this->Parent->ResZipcode->Attributes->GetAsArray();
        $this->_MobileNoAttributes = $this->Parent->MobileNo->Attributes->GetAsArray();
        $this->_TotalCount_SurnameAttributes = $this->Parent->TotalCount_Surname->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $Header->TotalCount_Surname = $this->TotalCount_Surname;
        $Header->_TotalCount_SurnameAttributes = $this->_TotalCount_SurnameAttributes;
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
        $this->ResHouseNo = $Header->ResHouseNo;
        $Header->_ResHouseNoAttributes = $this->_ResHouseNoAttributes;
        $this->Parent->ResHouseNo->Value = $Header->ResHouseNo;
        $this->Parent->ResHouseNo->Attributes->RestoreFromArray($Header->_ResHouseNoAttributes);
        $this->ResStreet = $Header->ResStreet;
        $Header->_ResStreetAttributes = $this->_ResStreetAttributes;
        $this->Parent->ResStreet->Value = $Header->ResStreet;
        $this->Parent->ResStreet->Attributes->RestoreFromArray($Header->_ResStreetAttributes);
        $this->ResSubVillage = $Header->ResSubVillage;
        $Header->_ResSubVillageAttributes = $this->_ResSubVillageAttributes;
        $this->Parent->ResSubVillage->Value = $Header->ResSubVillage;
        $this->Parent->ResSubVillage->Attributes->RestoreFromArray($Header->_ResSubVillageAttributes);
        $this->ResBrgy = $Header->ResBrgy;
        $Header->_ResBrgyAttributes = $this->_ResBrgyAttributes;
        $this->Parent->ResBrgy->Value = $Header->ResBrgy;
        $this->Parent->ResBrgy->Attributes->RestoreFromArray($Header->_ResBrgyAttributes);
        $this->ResMunicipality = $Header->ResMunicipality;
        $Header->_ResMunicipalityAttributes = $this->_ResMunicipalityAttributes;
        $this->Parent->ResMunicipality->Value = $Header->ResMunicipality;
        $this->Parent->ResMunicipality->Attributes->RestoreFromArray($Header->_ResMunicipalityAttributes);
        $this->ResProvince = $Header->ResProvince;
        $Header->_ResProvinceAttributes = $this->_ResProvinceAttributes;
        $this->Parent->ResProvince->Value = $Header->ResProvince;
        $this->Parent->ResProvince->Attributes->RestoreFromArray($Header->_ResProvinceAttributes);
        $this->ResZipcode = $Header->ResZipcode;
        $Header->_ResZipcodeAttributes = $this->_ResZipcodeAttributes;
        $this->Parent->ResZipcode->Value = $Header->ResZipcode;
        $this->Parent->ResZipcode->Attributes->RestoreFromArray($Header->_ResZipcodeAttributes);
        $this->MobileNo = $Header->MobileNo;
        $Header->_MobileNoAttributes = $this->_MobileNoAttributes;
        $this->Parent->MobileNo->Value = $Header->MobileNo;
        $this->Parent->MobileNo->Attributes->RestoreFromArray($Header->_MobileNoAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
        $this->TotalCount_Surname = $this->Parent->TotalCount_Surname->GetValue();
    }
}
//End employee ReportGroup class

//employee GroupsCollection class @2-82A54BA2
class clsGroupsCollectionemployee {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->ResHouseNo->Value = $this->Parent->ResHouseNo->initialValue;
        $this->Parent->ResStreet->Value = $this->Parent->ResStreet->initialValue;
        $this->Parent->ResSubVillage->Value = $this->Parent->ResSubVillage->initialValue;
        $this->Parent->ResBrgy->Value = $this->Parent->ResBrgy->initialValue;
        $this->Parent->ResMunicipality->Value = $this->Parent->ResMunicipality->initialValue;
        $this->Parent->ResProvince->Value = $this->Parent->ResProvince->initialValue;
        $this->Parent->ResZipcode->Value = $this->Parent->ResZipcode->initialValue;
        $this->Parent->MobileNo->Value = $this->Parent->MobileNo->initialValue;
        $this->Parent->TotalCount_Surname->Value = $this->Parent->TotalCount_Surname->initialValue;
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
//End employee GroupsCollection class

class clsReportemployee { //employee Class @2-3BA851DF

//employee Variables @2-87F7EA53

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
//End employee Variables

//Class_Initialize Event @2-2542D055
    function clsReportemployee($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee";
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
        $this->DataSource = new clsemployeeDataSource($this);
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

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsSingle, array(False, 0, Null, Null, False, "", "", 1, True, ""), 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->HTML = true;
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->Report_Row_Number->EmptyText = "&nbsp;";
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->Surname->HTML = true;
        $this->Surname->EmptyText = "&nbsp;";
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->FirstName->HTML = true;
        $this->FirstName->EmptyText = "&nbsp;";
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->MiddleName->HTML = true;
        $this->MiddleName->EmptyText = "&nbsp;";
        $this->ResHouseNo = & new clsControl(ccsReportLabel, "ResHouseNo", "ResHouseNo", ccsText, "", "", $this);
        $this->ResHouseNo->HTML = true;
        $this->ResHouseNo->EmptyText = "&nbsp;";
        $this->ResStreet = & new clsControl(ccsReportLabel, "ResStreet", "ResStreet", ccsText, "", "", $this);
        $this->ResStreet->HTML = true;
        $this->ResStreet->EmptyText = "&nbsp;";
        $this->ResSubVillage = & new clsControl(ccsReportLabel, "ResSubVillage", "ResSubVillage", ccsText, "", "", $this);
        $this->ResSubVillage->HTML = true;
        $this->ResSubVillage->EmptyText = "&nbsp;";
        $this->ResBrgy = & new clsControl(ccsReportLabel, "ResBrgy", "ResBrgy", ccsText, "", "", $this);
        $this->ResBrgy->HTML = true;
        $this->ResBrgy->EmptyText = "&nbsp;";
        $this->ResMunicipality = & new clsControl(ccsReportLabel, "ResMunicipality", "ResMunicipality", ccsText, "", "", $this);
        $this->ResMunicipality->HTML = true;
        $this->ResMunicipality->EmptyText = "&nbsp;";
        $this->ResProvince = & new clsControl(ccsReportLabel, "ResProvince", "ResProvince", ccsText, "", "", $this);
        $this->ResProvince->HTML = true;
        $this->ResProvince->EmptyText = "&nbsp;";
        $this->ResZipcode = & new clsControl(ccsReportLabel, "ResZipcode", "ResZipcode", ccsText, "", "", $this);
        $this->ResZipcode->HTML = true;
        $this->ResZipcode->EmptyText = "&nbsp;";
        $this->MobileNo = & new clsControl(ccsReportLabel, "MobileNo", "MobileNo", ccsText, "", "", $this);
        $this->MobileNo->HTML = true;
        $this->MobileNo->EmptyText = "&nbsp;";
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->TotalCount_Surname = & new clsControl(ccsReportLabel, "TotalCount_Surname", "TotalCount_Surname", ccsInteger, "", 0, $this);
        $this->TotalCount_Surname->HTML = true;
        $this->TotalCount_Surname->TotalFunction = "Count";
        $this->TotalCount_Surname->IsEmptySource = true;
        $this->TotalCount_Surname->EmptyText = "&nbsp;";
        $this->Report_CurrentDate = & new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Report_CurrentDate->HTML = true;
        $this->Report_CurrentDate->EmptyText = "&nbsp;";
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

//CheckErrors Method @2-5834EE01
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->ResHouseNo->Errors->Count());
        $errors = ($errors || $this->ResStreet->Errors->Count());
        $errors = ($errors || $this->ResSubVillage->Errors->Count());
        $errors = ($errors || $this->ResBrgy->Errors->Count());
        $errors = ($errors || $this->ResMunicipality->Errors->Count());
        $errors = ($errors || $this->ResProvince->Errors->Count());
        $errors = ($errors || $this->ResZipcode->Errors->Count());
        $errors = ($errors || $this->MobileNo->Errors->Count());
        $errors = ($errors || $this->TotalCount_Surname->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-187F026F
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResHouseNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResStreet->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResSubVillage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResBrgy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResMunicipality->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResProvince->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResZipcode->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobileNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-3D0BBDE8
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;


        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->ResHouseNo->SetValue($this->DataSource->ResHouseNo->GetValue());
            $this->ResStreet->SetValue($this->DataSource->ResStreet->GetValue());
            $this->ResSubVillage->SetValue($this->DataSource->ResSubVillage->GetValue());
            $this->ResBrgy->SetValue($this->DataSource->ResBrgy->GetValue());
            $this->ResMunicipality->SetValue($this->DataSource->ResMunicipality->GetValue());
            $this->ResProvince->SetValue($this->DataSource->ResProvince->GetValue());
            $this->ResZipcode->SetValue($this->DataSource->ResZipcode->GetValue());
            $this->MobileNo->SetValue($this->DataSource->MobileNo->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            $this->Report_Row_Number->SetValue(1);
            $this->TotalCount_Surname->SetValue(1);
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
            $this->ControlsVisible["Report_Row_Number"] = $this->Report_Row_Number->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["ResHouseNo"] = $this->ResHouseNo->Visible;
            $this->ControlsVisible["ResStreet"] = $this->ResStreet->Visible;
            $this->ControlsVisible["ResSubVillage"] = $this->ResSubVillage->Visible;
            $this->ControlsVisible["ResBrgy"] = $this->ResBrgy->Visible;
            $this->ControlsVisible["ResMunicipality"] = $this->ResMunicipality->Visible;
            $this->ControlsVisible["ResProvince"] = $this->ResProvince->Visible;
            $this->ControlsVisible["ResZipcode"] = $this->ResZipcode->Visible;
            $this->ControlsVisible["MobileNo"] = $this->MobileNo->Visible;
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
                        $this->ResHouseNo->SetValue($items[$i]->ResHouseNo);
                        $this->ResHouseNo->Attributes->RestoreFromArray($items[$i]->_ResHouseNoAttributes);
                        $this->ResStreet->SetValue($items[$i]->ResStreet);
                        $this->ResStreet->Attributes->RestoreFromArray($items[$i]->_ResStreetAttributes);
                        $this->ResSubVillage->SetValue($items[$i]->ResSubVillage);
                        $this->ResSubVillage->Attributes->RestoreFromArray($items[$i]->_ResSubVillageAttributes);
                        $this->ResBrgy->SetValue($items[$i]->ResBrgy);
                        $this->ResBrgy->Attributes->RestoreFromArray($items[$i]->_ResBrgyAttributes);
                        $this->ResMunicipality->SetValue($items[$i]->ResMunicipality);
                        $this->ResMunicipality->Attributes->RestoreFromArray($items[$i]->_ResMunicipalityAttributes);
                        $this->ResProvince->SetValue($items[$i]->ResProvince);
                        $this->ResProvince->Attributes->RestoreFromArray($items[$i]->_ResProvinceAttributes);
                        $this->ResZipcode->SetValue($items[$i]->ResZipcode);
                        $this->ResZipcode->Attributes->RestoreFromArray($items[$i]->_ResZipcodeAttributes);
                        $this->MobileNo->SetValue($items[$i]->MobileNo);
                        $this->MobileNo->Attributes->RestoreFromArray($items[$i]->_MobileNoAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->ResHouseNo->Show();
                        $this->ResStreet->Show();
                        $this->ResSubVillage->Show();
                        $this->ResBrgy->Show();
                        $this->ResMunicipality->Show();
                        $this->ResProvince->Show();
                        $this->ResZipcode->Show();
                        $this->MobileNo->Show();
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
                            $this->TotalCount_Surname->SetValue($items[$i]->TotalCount_Surname);
                            $this->TotalCount_Surname->Attributes->RestoreFromArray($items[$i]->_TotalCount_SurnameAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_Surname->Show();
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
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
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

} //End employee Class @2-FCB6E20C

class clsemployeeDataSource extends clsDBConnection1 {  //employeeDataSource Class @2-3A1764EA

//DataSource Variables @2-0C58D740
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $ResHouseNo;
    var $ResStreet;
    var $ResSubVillage;
    var $ResBrgy;
    var $ResMunicipality;
    var $ResProvince;
    var $ResZipcode;
    var $MobileNo;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-654EADE1
    function clsemployeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee";
        $this->Initialize();
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->ResHouseNo = new clsField("ResHouseNo", ccsText, "");
        
        $this->ResStreet = new clsField("ResStreet", ccsText, "");
        
        $this->ResSubVillage = new clsField("ResSubVillage", ccsText, "");
        
        $this->ResBrgy = new clsField("ResBrgy", ccsText, "");
        
        $this->ResMunicipality = new clsField("ResMunicipality", ccsText, "");
        
        $this->ResProvince = new clsField("ResProvince", ccsText, "");
        
        $this->ResZipcode = new clsField("ResZipcode", ccsText, "");
        
        $this->MobileNo = new clsField("MobileNo", ccsText, "");
        

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

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-DAE23119
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-830124DD
    function SetValues()
    {
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->ResHouseNo->SetDBValue($this->f("ResHouseNo"));
        $this->ResStreet->SetDBValue($this->f("ResStreet"));
        $this->ResSubVillage->SetDBValue($this->f("ResSubVillage"));
        $this->ResBrgy->SetDBValue($this->f("ResBrgy"));
        $this->ResMunicipality->SetDBValue($this->f("ResMunicipality"));
        $this->ResProvince->SetDBValue($this->f("ResProvince"));
        $this->ResZipcode->SetDBValue($this->f("ResZipcode"));
        $this->MobileNo->SetDBValue($this->f("MobileNo"));
    }
//End SetValues Method

} //End employeeDataSource Class @2-FCB6E20C

//Initialize Page @1-B0CCB428
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
$TemplateFileName = "Query_PSA.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-7D7FFFC6
include_once("./Query_PSA_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D404C797
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee = & new clsReportemployee("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->HTML = true;
$Report_Print->Page = "Query_PSA.php";
$MainPage->employee = & $employee;
$MainPage->Report_Print = & $Report_Print;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee->Initialize();

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

//Go to destination page @1-CDB6DC63
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-9205851C
$employee->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-6B533D76
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee);
unset($Tpl);
//End Unload Page


?>
