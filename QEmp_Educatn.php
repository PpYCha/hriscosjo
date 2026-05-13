<?php
//Include Common Files @1-1D47B42C
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QEmp_Educatn.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_employee_educbac ReportGroup class @2-7D4A2D08
class clsReportGroupemployee_employee_educbac {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $ReportLabel2, $_ReportLabel2Attributes;
    var $Report_Row_Number, $_Report_Row_NumberAttributes;
    var $Level, $_LevelAttributes;
    var $SchoolName, $_SchoolNameAttributes;
    var $DegreeCourse, $_DegreeCourseAttributes;
    var $YearFrom, $_YearFromAttributes;
    var $YearTo, $_YearToAttributes;
    var $HighGradeLevel, $_HighGradeLevelAttributes;
    var $YearGrad, $_YearGradAttributes;
    var $Honors, $_HonorsAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $Level1, $_Level1Attributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_employee_educbac(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->ReportLabel2 = $this->Parent->ReportLabel2->Value;
        $this->Level = $this->Parent->Level->Value;
        $this->SchoolName = $this->Parent->SchoolName->Value;
        $this->DegreeCourse = $this->Parent->DegreeCourse->Value;
        $this->YearFrom = $this->Parent->YearFrom->Value;
        $this->YearTo = $this->Parent->YearTo->Value;
        $this->HighGradeLevel = $this->Parent->HighGradeLevel->Value;
        $this->YearGrad = $this->Parent->YearGrad->Value;
        $this->Honors = $this->Parent->Honors->Value;
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->Level1 = $this->Parent->Level1->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetTotalValue($mode);
        $this->_ReportLabel2Attributes = $this->Parent->ReportLabel2->Attributes->GetAsArray();
        $this->_Report_Row_NumberAttributes = $this->Parent->Report_Row_Number->Attributes->GetAsArray();
        $this->_LevelAttributes = $this->Parent->Level->Attributes->GetAsArray();
        $this->_SchoolNameAttributes = $this->Parent->SchoolName->Attributes->GetAsArray();
        $this->_DegreeCourseAttributes = $this->Parent->DegreeCourse->Attributes->GetAsArray();
        $this->_YearFromAttributes = $this->Parent->YearFrom->Attributes->GetAsArray();
        $this->_YearToAttributes = $this->Parent->YearTo->Attributes->GetAsArray();
        $this->_HighGradeLevelAttributes = $this->Parent->HighGradeLevel->Attributes->GetAsArray();
        $this->_YearGradAttributes = $this->Parent->YearGrad->Attributes->GetAsArray();
        $this->_HonorsAttributes = $this->Parent->Honors->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_Level1Attributes = $this->Parent->Level1->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_Row_Number = $this->Report_Row_Number;
        $Header->_Report_Row_NumberAttributes = $this->_Report_Row_NumberAttributes;
        $this->ReportLabel2 = $Header->ReportLabel2;
        $Header->_ReportLabel2Attributes = $this->_ReportLabel2Attributes;
        $this->Parent->ReportLabel2->Value = $Header->ReportLabel2;
        $this->Parent->ReportLabel2->Attributes->RestoreFromArray($Header->_ReportLabel2Attributes);
        $this->Level = $Header->Level;
        $Header->_LevelAttributes = $this->_LevelAttributes;
        $this->Parent->Level->Value = $Header->Level;
        $this->Parent->Level->Attributes->RestoreFromArray($Header->_LevelAttributes);
        $this->SchoolName = $Header->SchoolName;
        $Header->_SchoolNameAttributes = $this->_SchoolNameAttributes;
        $this->Parent->SchoolName->Value = $Header->SchoolName;
        $this->Parent->SchoolName->Attributes->RestoreFromArray($Header->_SchoolNameAttributes);
        $this->DegreeCourse = $Header->DegreeCourse;
        $Header->_DegreeCourseAttributes = $this->_DegreeCourseAttributes;
        $this->Parent->DegreeCourse->Value = $Header->DegreeCourse;
        $this->Parent->DegreeCourse->Attributes->RestoreFromArray($Header->_DegreeCourseAttributes);
        $this->YearFrom = $Header->YearFrom;
        $Header->_YearFromAttributes = $this->_YearFromAttributes;
        $this->Parent->YearFrom->Value = $Header->YearFrom;
        $this->Parent->YearFrom->Attributes->RestoreFromArray($Header->_YearFromAttributes);
        $this->YearTo = $Header->YearTo;
        $Header->_YearToAttributes = $this->_YearToAttributes;
        $this->Parent->YearTo->Value = $Header->YearTo;
        $this->Parent->YearTo->Attributes->RestoreFromArray($Header->_YearToAttributes);
        $this->HighGradeLevel = $Header->HighGradeLevel;
        $Header->_HighGradeLevelAttributes = $this->_HighGradeLevelAttributes;
        $this->Parent->HighGradeLevel->Value = $Header->HighGradeLevel;
        $this->Parent->HighGradeLevel->Attributes->RestoreFromArray($Header->_HighGradeLevelAttributes);
        $this->YearGrad = $Header->YearGrad;
        $Header->_YearGradAttributes = $this->_YearGradAttributes;
        $this->Parent->YearGrad->Value = $Header->YearGrad;
        $this->Parent->YearGrad->Attributes->RestoreFromArray($Header->_YearGradAttributes);
        $this->Honors = $Header->Honors;
        $Header->_HonorsAttributes = $this->_HonorsAttributes;
        $this->Parent->Honors->Value = $Header->Honors;
        $this->Parent->Honors->Attributes->RestoreFromArray($Header->_HonorsAttributes);
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
        $this->Level1 = $Header->Level1;
        $Header->_Level1Attributes = $this->_Level1Attributes;
        $this->Parent->Level1->Value = $Header->Level1;
        $this->Parent->Level1->Attributes->RestoreFromArray($Header->_Level1Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_Row_Number = $this->Parent->Report_Row_Number->GetValue();
    }
}
//End employee_employee_educbac ReportGroup class

//employee_employee_educbac GroupsCollection class @2-991C8EAB
class clsGroupsCollectionemployee_employee_educbac {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_employee_educbac(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_employee_educbac($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->ReportLabel2->Value = $this->Parent->ReportLabel2->initialValue;
        $this->Parent->Report_Row_Number->Value = $this->Parent->Report_Row_Number->initialValue;
        $this->Parent->Level->Value = $this->Parent->Level->initialValue;
        $this->Parent->SchoolName->Value = $this->Parent->SchoolName->initialValue;
        $this->Parent->DegreeCourse->Value = $this->Parent->DegreeCourse->initialValue;
        $this->Parent->YearFrom->Value = $this->Parent->YearFrom->initialValue;
        $this->Parent->YearTo->Value = $this->Parent->YearTo->initialValue;
        $this->Parent->HighGradeLevel->Value = $this->Parent->HighGradeLevel->initialValue;
        $this->Parent->YearGrad->Value = $this->Parent->YearGrad->initialValue;
        $this->Parent->Honors->Value = $this->Parent->Honors->initialValue;
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->Level1->Value = $this->Parent->Level1->initialValue;
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
//End employee_employee_educbac GroupsCollection class

class clsReportemployee_employee_educbac { //employee_employee_educbac Class @2-2D4C98AB

//employee_employee_educbac Variables @2-87F7EA53

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
//End employee_employee_educbac Variables

//Class_Initialize Event @2-8BCC5470
    function clsReportemployee_employee_educbac($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_employee_educbac";
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
        $this->DataSource = new clsemployee_employee_educbacDataSource($this);
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

        $this->ReportLabel2 = & new clsControl(ccsImage, "ReportLabel2", "ReportLabel2", ccsText, "", CCGetRequestParam("ReportLabel2", ccsGet, NULL), $this);
        $this->Report_Row_Number = & new clsControl(ccsReportLabel, "Report_Row_Number", "Report_Row_Number", ccsInteger, "", 0, $this);
        $this->Report_Row_Number->TotalFunction = "Count";
        $this->Report_Row_Number->IsEmptySource = true;
        $this->Level = & new clsControl(ccsReportLabel, "Level", "Level", ccsText, "", "", $this);
        $this->SchoolName = & new clsControl(ccsReportLabel, "SchoolName", "SchoolName", ccsText, "", "", $this);
        $this->DegreeCourse = & new clsControl(ccsReportLabel, "DegreeCourse", "DegreeCourse", ccsText, "", "", $this);
        $this->YearFrom = & new clsControl(ccsReportLabel, "YearFrom", "YearFrom", ccsText, "", "", $this);
        $this->YearTo = & new clsControl(ccsReportLabel, "YearTo", "YearTo", ccsText, "", "", $this);
        $this->HighGradeLevel = & new clsControl(ccsReportLabel, "HighGradeLevel", "HighGradeLevel", ccsText, "", "", $this);
        $this->YearGrad = & new clsControl(ccsReportLabel, "YearGrad", "YearGrad", ccsText, "", "", $this);
        $this->Honors = & new clsControl(ccsReportLabel, "Honors", "Honors", ccsText, "", "", $this);
        $this->EmployeeIDNo = & new clsControl(ccsHidden, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsHidden, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsHidden, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsHidden, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->Level1 = & new clsControl(ccsHidden, "Level1", "Level1", ccsText, "", CCGetRequestParam("Level1", ccsGet, NULL), $this);
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

//CheckErrors Method @2-9EA6B412
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ReportLabel2->Errors->Count());
        $errors = ($errors || $this->Report_Row_Number->Errors->Count());
        $errors = ($errors || $this->Level->Errors->Count());
        $errors = ($errors || $this->SchoolName->Errors->Count());
        $errors = ($errors || $this->DegreeCourse->Errors->Count());
        $errors = ($errors || $this->YearFrom->Errors->Count());
        $errors = ($errors || $this->YearTo->Errors->Count());
        $errors = ($errors || $this->HighGradeLevel->Errors->Count());
        $errors = ($errors || $this->YearGrad->Errors->Count());
        $errors = ($errors || $this->Honors->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->Level1->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-15D04B52
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ReportLabel2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_Row_Number->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Level->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SchoolName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DegreeCourse->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HighGradeLevel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearGrad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Honors->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Level1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-4682F957
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

        $Groups = new clsGroupsCollectionemployee_employee_educbac($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->ReportLabel2->SetValue($this->DataSource->ReportLabel2->GetValue());
            $this->Level->SetValue($this->DataSource->Level->GetValue());
            $this->SchoolName->SetValue($this->DataSource->SchoolName->GetValue());
            $this->DegreeCourse->SetValue($this->DataSource->DegreeCourse->GetValue());
            $this->YearFrom->SetValue($this->DataSource->YearFrom->GetValue());
            $this->YearTo->SetValue($this->DataSource->YearTo->GetValue());
            $this->HighGradeLevel->SetValue($this->DataSource->HighGradeLevel->GetValue());
            $this->YearGrad->SetValue($this->DataSource->YearGrad->GetValue());
            $this->Honors->SetValue($this->DataSource->Honors->GetValue());
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->Level1->SetValue($this->DataSource->Level1->GetValue());
            $this->Report_Row_Number->SetValue(1);
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
            $this->ControlsVisible["Level"] = $this->Level->Visible;
            $this->ControlsVisible["SchoolName"] = $this->SchoolName->Visible;
            $this->ControlsVisible["DegreeCourse"] = $this->DegreeCourse->Visible;
            $this->ControlsVisible["YearFrom"] = $this->YearFrom->Visible;
            $this->ControlsVisible["YearTo"] = $this->YearTo->Visible;
            $this->ControlsVisible["HighGradeLevel"] = $this->HighGradeLevel->Visible;
            $this->ControlsVisible["YearGrad"] = $this->YearGrad->Visible;
            $this->ControlsVisible["Honors"] = $this->Honors->Visible;
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["Level1"] = $this->Level1->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->Report_Row_Number->SetValue($items[$i]->Report_Row_Number);
                        $this->Report_Row_Number->Attributes->RestoreFromArray($items[$i]->_Report_Row_NumberAttributes);
                        $this->Level->SetValue($items[$i]->Level);
                        $this->Level->Attributes->RestoreFromArray($items[$i]->_LevelAttributes);
                        $this->SchoolName->SetValue($items[$i]->SchoolName);
                        $this->SchoolName->Attributes->RestoreFromArray($items[$i]->_SchoolNameAttributes);
                        $this->DegreeCourse->SetValue($items[$i]->DegreeCourse);
                        $this->DegreeCourse->Attributes->RestoreFromArray($items[$i]->_DegreeCourseAttributes);
                        $this->YearFrom->SetValue($items[$i]->YearFrom);
                        $this->YearFrom->Attributes->RestoreFromArray($items[$i]->_YearFromAttributes);
                        $this->YearTo->SetValue($items[$i]->YearTo);
                        $this->YearTo->Attributes->RestoreFromArray($items[$i]->_YearToAttributes);
                        $this->HighGradeLevel->SetValue($items[$i]->HighGradeLevel);
                        $this->HighGradeLevel->Attributes->RestoreFromArray($items[$i]->_HighGradeLevelAttributes);
                        $this->YearGrad->SetValue($items[$i]->YearGrad);
                        $this->YearGrad->Attributes->RestoreFromArray($items[$i]->_YearGradAttributes);
                        $this->Honors->SetValue($items[$i]->Honors);
                        $this->Honors->Attributes->RestoreFromArray($items[$i]->_HonorsAttributes);
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->Level1->SetValue($items[$i]->Level1);
                        $this->Level1->Attributes->RestoreFromArray($items[$i]->_Level1Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Report_Row_Number->Show();
                        $this->Level->Show();
                        $this->SchoolName->Show();
                        $this->DegreeCourse->Show();
                        $this->YearFrom->Show();
                        $this->YearTo->Show();
                        $this->HighGradeLevel->Show();
                        $this->YearGrad->Show();
                        $this->Honors->Show();
                        $this->EmployeeIDNo->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->Level1->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->ReportLabel2->SetValue($items[$i]->ReportLabel2);
                            $this->ReportLabel2->Attributes->RestoreFromArray($items[$i]->_ReportLabel2Attributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
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

} //End employee_employee_educbac Class @2-FCB6E20C

class clsemployee_employee_educbacDataSource extends clsDBConnection1 {  //employee_employee_educbacDataSource Class @2-1B6A0C04

//DataSource Variables @2-BBB8F6D9
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $ReportLabel2;
    var $Level;
    var $SchoolName;
    var $DegreeCourse;
    var $YearFrom;
    var $YearTo;
    var $HighGradeLevel;
    var $YearGrad;
    var $Honors;
    var $EmployeeIDNo;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $Level1;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-8510CCF5
    function clsemployee_employee_educbacDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_employee_educbac";
        $this->Initialize();
        $this->ReportLabel2 = new clsField("ReportLabel2", ccsText, "");
        
        $this->Level = new clsField("Level", ccsText, "");
        
        $this->SchoolName = new clsField("SchoolName", ccsText, "");
        
        $this->DegreeCourse = new clsField("DegreeCourse", ccsText, "");
        
        $this->YearFrom = new clsField("YearFrom", ccsText, "");
        
        $this->YearTo = new clsField("YearTo", ccsText, "");
        
        $this->HighGradeLevel = new clsField("HighGradeLevel", ccsText, "");
        
        $this->YearGrad = new clsField("YearGrad", ccsText, "");
        
        $this->Honors = new clsField("Honors", ccsText, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->Level1 = new clsField("Level1", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-C5EDC1D4
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "EmployeeEducID";
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

//Open Method @2-C2BFE854
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT EmployeeIDNo, employee_educbackgrnd.*, Surname, FirstName, MiddleName, EmpPicture, NameExtension \n\n" .
        "FROM employee_educbackgrnd INNER JOIN employee ON\n\n" .
        "employee_educbackgrnd.EmployeeID = employee.EmployeeID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-087C1BCE
    function SetValues()
    {
        $this->ReportLabel2->SetDBValue($this->f("EmpPicture"));
        $this->Level->SetDBValue($this->f("Level"));
        $this->SchoolName->SetDBValue($this->f("SchoolName"));
        $this->DegreeCourse->SetDBValue($this->f("DegreeCourse"));
        $this->YearFrom->SetDBValue($this->f("YearFrom"));
        $this->YearTo->SetDBValue($this->f("YearTo"));
        $this->HighGradeLevel->SetDBValue($this->f("HighGradeLevel"));
        $this->YearGrad->SetDBValue($this->f("YearGrad"));
        $this->Honors->SetDBValue($this->f("Honors"));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->Level1->SetDBValue($this->f("NameExtension"));
    }
//End SetValues Method

} //End employee_employee_educbacDataSource Class @2-FCB6E20C

//Initialize Page @1-18F6A697
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
$TemplateFileName = "QEmp_Educatn.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-71F55CCE
include_once("./QEmp_Educatn_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D29C0A0B
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_employee_educbac = & new clsReportemployee_employee_educbac("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QEmp_Educatn_print.php";
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q_Employee.php";
$MainPage->employee_employee_educbac = & $employee_employee_educbac;
$MainPage->Report_Print = & $Report_Print;
$MainPage->Link1 = & $Link1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
$employee_employee_educbac->Initialize();

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

//Go to destination page @1-6F168E87
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_employee_educbac);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-D2918F9F
$employee_employee_educbac->Show();
$Report_Print->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-9B836A0E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_employee_educbac);
unset($Tpl);
//End Unload Page


?>
