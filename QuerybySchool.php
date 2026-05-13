<?php
//Include Common Files @1-6610CA9B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QuerybySchool.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordemployee_employee_educbac { //employee_employee_educbac Class @6-47752AE4

//Variables @6-D6FF3E86

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

//Class_Initialize Event @6-4D3AD575
    function clsRecordemployee_employee_educbac($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee_employee_educbac/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee_employee_educbac";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = & new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_SchoolName", "ccsForm"));
            $this->ClearParameters->Page = "QuerybySchool.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_SchoolName = & new clsControl(ccsTextBox, "s_SchoolName", "s_SchoolName", ccsText, "", CCGetRequestParam("s_SchoolName", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @6-356D70EC
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_SchoolName->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_SchoolName->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @6-040C90E3
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_SchoolName->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @6-ED598703
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

//Operation Method @6-09EE2BC1
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
        $Redirect = "QuerybySchool.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "QuerybySchool.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @6-E3448F80
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


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_SchoolName->Errors->ToString());
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
        $this->s_SchoolName->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employee_employee_educbac Class @6-FCB6E20C

//employee_employee_educbac1 ReportGroup class @2-19844E23
class clsReportGroupemployee_employee_educbac1 {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $Surname, $_SurnameAttributes;
    var $PermHouseNo, $_PermHouseNoAttributes;
    var $Position, $_PositionAttributes;
    var $DegreeCourse, $_DegreeCourseAttributes;
    var $YearGrad, $_YearGradAttributes;
    var $TelNo, $_TelNoAttributes;
    var $MobileNo, $_MobileNoAttributes;
    var $EmailAdd, $_EmailAddAttributes;
    var $EmailAdd5, $_EmailAdd5Attributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $PermStreet, $_PermStreetAttributes;
    var $PermSubVillage, $_PermSubVillageAttributes;
    var $PermBrgy, $_PermBrgyAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_employee_educbac1(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Surname = $this->Parent->Surname->Value;
        $this->PermHouseNo = $this->Parent->PermHouseNo->Value;
        $this->Position = $this->Parent->Position->Value;
        $this->DegreeCourse = $this->Parent->DegreeCourse->Value;
        $this->YearGrad = $this->Parent->YearGrad->Value;
        $this->TelNo = $this->Parent->TelNo->Value;
        $this->MobileNo = $this->Parent->MobileNo->Value;
        $this->EmailAdd = $this->Parent->EmailAdd->Value;
        $this->EmailAdd5 = $this->Parent->EmailAdd5->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->PermStreet = $this->Parent->PermStreet->Value;
        $this->PermSubVillage = $this->Parent->PermSubVillage->Value;
        $this->PermBrgy = $this->Parent->PermBrgy->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_PermHouseNoAttributes = $this->Parent->PermHouseNo->Attributes->GetAsArray();
        $this->_PositionAttributes = $this->Parent->Position->Attributes->GetAsArray();
        $this->_DegreeCourseAttributes = $this->Parent->DegreeCourse->Attributes->GetAsArray();
        $this->_YearGradAttributes = $this->Parent->YearGrad->Attributes->GetAsArray();
        $this->_TelNoAttributes = $this->Parent->TelNo->Attributes->GetAsArray();
        $this->_MobileNoAttributes = $this->Parent->MobileNo->Attributes->GetAsArray();
        $this->_EmailAddAttributes = $this->Parent->EmailAdd->Attributes->GetAsArray();
        $this->_EmailAdd5Attributes = $this->Parent->EmailAdd5->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_PermStreetAttributes = $this->Parent->PermStreet->Attributes->GetAsArray();
        $this->_PermSubVillageAttributes = $this->Parent->PermSubVillage->Attributes->GetAsArray();
        $this->_PermBrgyAttributes = $this->Parent->PermBrgy->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
        $this->PermHouseNo = $Header->PermHouseNo;
        $Header->_PermHouseNoAttributes = $this->_PermHouseNoAttributes;
        $this->Parent->PermHouseNo->Value = $Header->PermHouseNo;
        $this->Parent->PermHouseNo->Attributes->RestoreFromArray($Header->_PermHouseNoAttributes);
        $this->Position = $Header->Position;
        $Header->_PositionAttributes = $this->_PositionAttributes;
        $this->Parent->Position->Value = $Header->Position;
        $this->Parent->Position->Attributes->RestoreFromArray($Header->_PositionAttributes);
        $this->DegreeCourse = $Header->DegreeCourse;
        $Header->_DegreeCourseAttributes = $this->_DegreeCourseAttributes;
        $this->Parent->DegreeCourse->Value = $Header->DegreeCourse;
        $this->Parent->DegreeCourse->Attributes->RestoreFromArray($Header->_DegreeCourseAttributes);
        $this->YearGrad = $Header->YearGrad;
        $Header->_YearGradAttributes = $this->_YearGradAttributes;
        $this->Parent->YearGrad->Value = $Header->YearGrad;
        $this->Parent->YearGrad->Attributes->RestoreFromArray($Header->_YearGradAttributes);
        $this->TelNo = $Header->TelNo;
        $Header->_TelNoAttributes = $this->_TelNoAttributes;
        $this->Parent->TelNo->Value = $Header->TelNo;
        $this->Parent->TelNo->Attributes->RestoreFromArray($Header->_TelNoAttributes);
        $this->MobileNo = $Header->MobileNo;
        $Header->_MobileNoAttributes = $this->_MobileNoAttributes;
        $this->Parent->MobileNo->Value = $Header->MobileNo;
        $this->Parent->MobileNo->Attributes->RestoreFromArray($Header->_MobileNoAttributes);
        $this->EmailAdd = $Header->EmailAdd;
        $Header->_EmailAddAttributes = $this->_EmailAddAttributes;
        $this->Parent->EmailAdd->Value = $Header->EmailAdd;
        $this->Parent->EmailAdd->Attributes->RestoreFromArray($Header->_EmailAddAttributes);
        $this->EmailAdd5 = $Header->EmailAdd5;
        $Header->_EmailAdd5Attributes = $this->_EmailAdd5Attributes;
        $this->Parent->EmailAdd5->Value = $Header->EmailAdd5;
        $this->Parent->EmailAdd5->Attributes->RestoreFromArray($Header->_EmailAdd5Attributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->MiddleName = $Header->MiddleName;
        $Header->_MiddleNameAttributes = $this->_MiddleNameAttributes;
        $this->Parent->MiddleName->Value = $Header->MiddleName;
        $this->Parent->MiddleName->Attributes->RestoreFromArray($Header->_MiddleNameAttributes);
        $this->PermStreet = $Header->PermStreet;
        $Header->_PermStreetAttributes = $this->_PermStreetAttributes;
        $this->Parent->PermStreet->Value = $Header->PermStreet;
        $this->Parent->PermStreet->Attributes->RestoreFromArray($Header->_PermStreetAttributes);
        $this->PermSubVillage = $Header->PermSubVillage;
        $Header->_PermSubVillageAttributes = $this->_PermSubVillageAttributes;
        $this->Parent->PermSubVillage->Value = $Header->PermSubVillage;
        $this->Parent->PermSubVillage->Attributes->RestoreFromArray($Header->_PermSubVillageAttributes);
        $this->PermBrgy = $Header->PermBrgy;
        $Header->_PermBrgyAttributes = $this->_PermBrgyAttributes;
        $this->Parent->PermBrgy->Value = $Header->PermBrgy;
        $this->Parent->PermBrgy->Attributes->RestoreFromArray($Header->_PermBrgyAttributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
    }
}
//End employee_employee_educbac1 ReportGroup class

//employee_employee_educbac1 GroupsCollection class @2-0E5D380F
class clsGroupsCollectionemployee_employee_educbac1 {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_employee_educbac1(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_employee_educbac1($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->PermHouseNo->Value = $this->Parent->PermHouseNo->initialValue;
        $this->Parent->Position->Value = $this->Parent->Position->initialValue;
        $this->Parent->DegreeCourse->Value = $this->Parent->DegreeCourse->initialValue;
        $this->Parent->YearGrad->Value = $this->Parent->YearGrad->initialValue;
        $this->Parent->TelNo->Value = $this->Parent->TelNo->initialValue;
        $this->Parent->MobileNo->Value = $this->Parent->MobileNo->initialValue;
        $this->Parent->EmailAdd->Value = $this->Parent->EmailAdd->initialValue;
        $this->Parent->EmailAdd5->Value = $this->Parent->EmailAdd5->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->PermStreet->Value = $this->Parent->PermStreet->initialValue;
        $this->Parent->PermSubVillage->Value = $this->Parent->PermSubVillage->initialValue;
        $this->Parent->PermBrgy->Value = $this->Parent->PermBrgy->initialValue;
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
//End employee_employee_educbac1 GroupsCollection class

class clsReportemployee_employee_educbac1 { //employee_employee_educbac1 Class @2-5E6AD64E

//employee_employee_educbac1 Variables @2-87F7EA53

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
//End employee_employee_educbac1 Variables

//Class_Initialize Event @2-EFD8506F
    function clsReportemployee_employee_educbac1($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_employee_educbac1";
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
        $this->Page_Footer->Height = 2;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Page_Header->Height = 1;
        $MinPageSize += $this->Page_Header->Height;
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployee_employee_educbac1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Print");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 1000000000;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 100;
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
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->PermHouseNo = & new clsControl(ccsReportLabel, "PermHouseNo", "PermHouseNo", ccsText, "", "", $this);
        $this->Position = & new clsControl(ccsReportLabel, "Position", "Position", ccsText, "", "", $this);
        $this->DegreeCourse = & new clsControl(ccsReportLabel, "DegreeCourse", "DegreeCourse", ccsText, "", "", $this);
        $this->YearGrad = & new clsControl(ccsReportLabel, "YearGrad", "YearGrad", ccsText, "", "", $this);
        $this->TelNo = & new clsControl(ccsReportLabel, "TelNo", "TelNo", ccsText, "", "", $this);
        $this->MobileNo = & new clsControl(ccsReportLabel, "MobileNo", "MobileNo", ccsText, "", "", $this);
        $this->EmailAdd = & new clsControl(ccsReportLabel, "EmailAdd", "EmailAdd", ccsText, "", "", $this);
        $this->EmailAdd5 = & new clsControl(ccsReportLabel, "EmailAdd5", "EmailAdd5", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->PermStreet = & new clsControl(ccsReportLabel, "PermStreet", "PermStreet", ccsText, "", "", $this);
        $this->PermSubVillage = & new clsControl(ccsReportLabel, "PermSubVillage", "PermSubVillage", ccsText, "", "", $this);
        $this->PermBrgy = & new clsControl(ccsReportLabel, "PermBrgy", "PermBrgy", ccsText, "", "", $this);
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

//CheckErrors Method @2-B7A3611A
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->PermHouseNo->Errors->Count());
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->DegreeCourse->Errors->Count());
        $errors = ($errors || $this->YearGrad->Errors->Count());
        $errors = ($errors || $this->TelNo->Errors->Count());
        $errors = ($errors || $this->MobileNo->Errors->Count());
        $errors = ($errors || $this->EmailAdd->Errors->Count());
        $errors = ($errors || $this->EmailAdd5->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->PermStreet->Errors->Count());
        $errors = ($errors || $this->PermSubVillage->Errors->Count());
        $errors = ($errors || $this->PermBrgy->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-7C3BB567
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermHouseNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DegreeCourse->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearGrad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TelNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobileNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmailAdd->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmailAdd5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermStreet->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermSubVillage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermBrgy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-12F72349
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_SchoolName"] = CCGetFromGet("s_SchoolName", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee_employee_educbac1($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->PermHouseNo->SetValue($this->DataSource->PermHouseNo->GetValue());
            $this->Position->SetValue($this->DataSource->Position->GetValue());
            $this->DegreeCourse->SetValue($this->DataSource->DegreeCourse->GetValue());
            $this->YearGrad->SetValue($this->DataSource->YearGrad->GetValue());
            $this->TelNo->SetValue($this->DataSource->TelNo->GetValue());
            $this->MobileNo->SetValue($this->DataSource->MobileNo->GetValue());
            $this->EmailAdd->SetValue($this->DataSource->EmailAdd->GetValue());
            $this->EmailAdd5->SetValue($this->DataSource->EmailAdd5->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->PermStreet->SetValue($this->DataSource->PermStreet->GetValue());
            $this->PermSubVillage->SetValue($this->DataSource->PermSubVillage->GetValue());
            $this->PermBrgy->SetValue($this->DataSource->PermBrgy->GetValue());
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
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["PermHouseNo"] = $this->PermHouseNo->Visible;
            $this->ControlsVisible["Position"] = $this->Position->Visible;
            $this->ControlsVisible["DegreeCourse"] = $this->DegreeCourse->Visible;
            $this->ControlsVisible["YearGrad"] = $this->YearGrad->Visible;
            $this->ControlsVisible["TelNo"] = $this->TelNo->Visible;
            $this->ControlsVisible["MobileNo"] = $this->MobileNo->Visible;
            $this->ControlsVisible["EmailAdd"] = $this->EmailAdd->Visible;
            $this->ControlsVisible["EmailAdd5"] = $this->EmailAdd5->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["PermStreet"] = $this->PermStreet->Visible;
            $this->ControlsVisible["PermSubVillage"] = $this->PermSubVillage->Visible;
            $this->ControlsVisible["PermBrgy"] = $this->PermBrgy->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->PermHouseNo->SetValue($items[$i]->PermHouseNo);
                        $this->PermHouseNo->Attributes->RestoreFromArray($items[$i]->_PermHouseNoAttributes);
                        $this->Position->SetValue($items[$i]->Position);
                        $this->Position->Attributes->RestoreFromArray($items[$i]->_PositionAttributes);
                        $this->DegreeCourse->SetValue($items[$i]->DegreeCourse);
                        $this->DegreeCourse->Attributes->RestoreFromArray($items[$i]->_DegreeCourseAttributes);
                        $this->YearGrad->SetValue($items[$i]->YearGrad);
                        $this->YearGrad->Attributes->RestoreFromArray($items[$i]->_YearGradAttributes);
                        $this->TelNo->SetValue($items[$i]->TelNo);
                        $this->TelNo->Attributes->RestoreFromArray($items[$i]->_TelNoAttributes);
                        $this->MobileNo->SetValue($items[$i]->MobileNo);
                        $this->MobileNo->Attributes->RestoreFromArray($items[$i]->_MobileNoAttributes);
                        $this->EmailAdd->SetValue($items[$i]->EmailAdd);
                        $this->EmailAdd->Attributes->RestoreFromArray($items[$i]->_EmailAddAttributes);
                        $this->EmailAdd5->SetValue($items[$i]->EmailAdd5);
                        $this->EmailAdd5->Attributes->RestoreFromArray($items[$i]->_EmailAdd5Attributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->PermStreet->SetValue($items[$i]->PermStreet);
                        $this->PermStreet->Attributes->RestoreFromArray($items[$i]->_PermStreetAttributes);
                        $this->PermSubVillage->SetValue($items[$i]->PermSubVillage);
                        $this->PermSubVillage->Attributes->RestoreFromArray($items[$i]->_PermSubVillageAttributes);
                        $this->PermBrgy->SetValue($items[$i]->PermBrgy);
                        $this->PermBrgy->Attributes->RestoreFromArray($items[$i]->_PermBrgyAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Surname->Show();
                        $this->PermHouseNo->Show();
                        $this->Position->Show();
                        $this->DegreeCourse->Show();
                        $this->YearGrad->Show();
                        $this->TelNo->Show();
                        $this->MobileNo->Show();
                        $this->EmailAdd->Show();
                        $this->EmailAdd5->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->PermStreet->Show();
                        $this->PermSubVillage->Show();
                        $this->PermBrgy->Show();
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
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End employee_employee_educbac1 Class @2-FCB6E20C

class clsemployee_employee_educbac1DataSource extends clsDBConnection1 {  //employee_employee_educbac1DataSource Class @2-FA34D7C2

//DataSource Variables @2-5295C5AC
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Surname;
    var $PermHouseNo;
    var $Position;
    var $DegreeCourse;
    var $YearGrad;
    var $TelNo;
    var $MobileNo;
    var $EmailAdd;
    var $EmailAdd5;
    var $FirstName;
    var $MiddleName;
    var $PermStreet;
    var $PermSubVillage;
    var $PermBrgy;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-6825004E
    function clsemployee_employee_educbac1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_employee_educbac1";
        $this->Initialize();
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->PermHouseNo = new clsField("PermHouseNo", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->DegreeCourse = new clsField("DegreeCourse", ccsText, "");
        
        $this->YearGrad = new clsField("YearGrad", ccsText, "");
        
        $this->TelNo = new clsField("TelNo", ccsText, "");
        
        $this->MobileNo = new clsField("MobileNo", ccsText, "");
        
        $this->EmailAdd = new clsField("EmailAdd", ccsText, "");
        
        $this->EmailAdd5 = new clsField("EmailAdd5", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->PermStreet = new clsField("PermStreet", ccsText, "");
        
        $this->PermSubVillage = new clsField("PermSubVillage", ccsText, "");
        
        $this->PermBrgy = new clsField("PermBrgy", ccsText, "");
        

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

//Prepare Method @2-A62059E4
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_SchoolName", ccsText, "", "", $this->Parameters["urls_SchoolName"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "SchoolName", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-B249DE07
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_educbackgrnd INNER JOIN employee ON\n\n" .
        "employee_educbackgrnd.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-E0D940F6
    function SetValues()
    {
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->PermHouseNo->SetDBValue($this->f("PermHouseNo"));
        $this->Position->SetDBValue($this->f("Position"));
        $this->DegreeCourse->SetDBValue($this->f("DegreeCourse"));
        $this->YearGrad->SetDBValue($this->f("YearGrad"));
        $this->TelNo->SetDBValue($this->f("TelNo"));
        $this->MobileNo->SetDBValue($this->f("MobileNo"));
        $this->EmailAdd->SetDBValue($this->f("EmailAdd"));
        $this->EmailAdd5->SetDBValue($this->f("SchoolName"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->PermStreet->SetDBValue($this->f("PermStreet"));
        $this->PermSubVillage->SetDBValue($this->f("PermSubVillage"));
        $this->PermBrgy->SetDBValue($this->f("PermBrgy"));
    }
//End SetValues Method

} //End employee_employee_educbac1DataSource Class @2-FCB6E20C



//Initialize Page @1-245310CF
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
$TemplateFileName = "QuerybySchool.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-F2E50448
include_once("./QuerybySchool_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4AAE9E93
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_employee_educbac = & new clsRecordemployee_employee_educbac("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QuerybySchool.php";
$employee_employee_educbac1 = & new clsReportemployee_employee_educbac1("", $MainPage);
$MainPage->employee_employee_educbac = & $employee_employee_educbac;
$MainPage->Report_Print = & $Report_Print;
$MainPage->employee_employee_educbac1 = & $employee_employee_educbac1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_employee_educbac1->Initialize();

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

//Execute Components @1-E507B05C
$employee_employee_educbac->Operation();
//End Execute Components

//Go to destination page @1-5D555D4C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_employee_educbac);
    unset($employee_employee_educbac1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-0BDFD331
$employee_employee_educbac->Show();
$employee_employee_educbac1->Show();
$Report_Print->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-0307C723
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_employee_educbac);
unset($employee_employee_educbac1);
unset($Tpl);
//End Unload Page


?>
