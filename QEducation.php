<?php
//Include Common Files @1-B39D66AC
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QEducation.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_educbackgrnd ReportGroup class @2-0E316E1E
class clsReportGroupemployee_educbackgrnd {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Level, $_LevelAttributes;
    var $SchoolName, $_SchoolNameAttributes;
    var $DegreeCourse, $_DegreeCourseAttributes;
    var $YearFrom, $_YearFromAttributes;
    var $YearTo, $_YearToAttributes;
    var $HighGradeLevel, $_HighGradeLevelAttributes;
    var $YearGrad, $_YearGradAttributes;
    var $Honors, $_HonorsAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_educbackgrnd(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->Level = $this->Parent->Level->Value;
        $this->SchoolName = $this->Parent->SchoolName->Value;
        $this->DegreeCourse = $this->Parent->DegreeCourse->Value;
        $this->YearFrom = $this->Parent->YearFrom->Value;
        $this->YearTo = $this->Parent->YearTo->Value;
        $this->HighGradeLevel = $this->Parent->HighGradeLevel->Value;
        $this->YearGrad = $this->Parent->YearGrad->Value;
        $this->Honors = $this->Parent->Honors->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_LevelAttributes = $this->Parent->Level->Attributes->GetAsArray();
        $this->_SchoolNameAttributes = $this->Parent->SchoolName->Attributes->GetAsArray();
        $this->_DegreeCourseAttributes = $this->Parent->DegreeCourse->Attributes->GetAsArray();
        $this->_YearFromAttributes = $this->Parent->YearFrom->Attributes->GetAsArray();
        $this->_YearToAttributes = $this->Parent->YearTo->Attributes->GetAsArray();
        $this->_HighGradeLevelAttributes = $this->Parent->HighGradeLevel->Attributes->GetAsArray();
        $this->_YearGradAttributes = $this->Parent->YearGrad->Attributes->GetAsArray();
        $this->_HonorsAttributes = $this->Parent->Honors->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
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
    }
    function ChangeTotalControls() {
    }
}
//End employee_educbackgrnd ReportGroup class

//employee_educbackgrnd GroupsCollection class @2-02CB0307
class clsGroupsCollectionemployee_educbackgrnd {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_educbackgrnd(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_educbackgrnd($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->Level->Value = $this->Parent->Level->initialValue;
        $this->Parent->SchoolName->Value = $this->Parent->SchoolName->initialValue;
        $this->Parent->DegreeCourse->Value = $this->Parent->DegreeCourse->initialValue;
        $this->Parent->YearFrom->Value = $this->Parent->YearFrom->initialValue;
        $this->Parent->YearTo->Value = $this->Parent->YearTo->initialValue;
        $this->Parent->HighGradeLevel->Value = $this->Parent->HighGradeLevel->initialValue;
        $this->Parent->YearGrad->Value = $this->Parent->YearGrad->initialValue;
        $this->Parent->Honors->Value = $this->Parent->Honors->initialValue;
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
//End employee_educbackgrnd GroupsCollection class

class clsReportemployee_educbackgrnd { //employee_educbackgrnd Class @2-7CE0BEDA

//employee_educbackgrnd Variables @2-87F7EA53

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
//End employee_educbackgrnd Variables

//Class_Initialize Event @2-B9334B42
    function clsReportemployee_educbackgrnd($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_educbackgrnd";
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
        $this->DataSource = new clsemployee_educbackgrndDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
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

        $this->Level = & new clsControl(ccsReportLabel, "Level", "Level", ccsText, "", "", $this);
        $this->SchoolName = & new clsControl(ccsReportLabel, "SchoolName", "SchoolName", ccsText, "", "", $this);
        $this->DegreeCourse = & new clsControl(ccsReportLabel, "DegreeCourse", "DegreeCourse", ccsText, "", "", $this);
        $this->YearFrom = & new clsControl(ccsReportLabel, "YearFrom", "YearFrom", ccsText, "", "", $this);
        $this->YearTo = & new clsControl(ccsReportLabel, "YearTo", "YearTo", ccsText, "", "", $this);
        $this->HighGradeLevel = & new clsControl(ccsReportLabel, "HighGradeLevel", "HighGradeLevel", ccsText, "", "", $this);
        $this->YearGrad = & new clsControl(ccsReportLabel, "YearGrad", "YearGrad", ccsText, "", "", $this);
        $this->Honors = & new clsControl(ccsReportLabel, "Honors", "Honors", ccsText, "", "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
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

//CheckErrors Method @2-C27B3D14
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Level->Errors->Count());
        $errors = ($errors || $this->SchoolName->Errors->Count());
        $errors = ($errors || $this->DegreeCourse->Errors->Count());
        $errors = ($errors || $this->YearFrom->Errors->Count());
        $errors = ($errors || $this->YearTo->Errors->Count());
        $errors = ($errors || $this->HighGradeLevel->Errors->Count());
        $errors = ($errors || $this->YearGrad->Errors->Count());
        $errors = ($errors || $this->Honors->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-844666FB
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Level->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SchoolName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DegreeCourse->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HighGradeLevel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearGrad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Honors->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-28116690
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

        $Groups = new clsGroupsCollectionemployee_educbackgrnd($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->Level->SetValue($this->DataSource->Level->GetValue());
            $this->SchoolName->SetValue($this->DataSource->SchoolName->GetValue());
            $this->DegreeCourse->SetValue($this->DataSource->DegreeCourse->GetValue());
            $this->YearFrom->SetValue($this->DataSource->YearFrom->GetValue());
            $this->YearTo->SetValue($this->DataSource->YearTo->GetValue());
            $this->HighGradeLevel->SetValue($this->DataSource->HighGradeLevel->GetValue());
            $this->YearGrad->SetValue($this->DataSource->YearGrad->GetValue());
            $this->Honors->SetValue($this->DataSource->Honors->GetValue());
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
            $this->ControlsVisible["Level"] = $this->Level->Visible;
            $this->ControlsVisible["SchoolName"] = $this->SchoolName->Visible;
            $this->ControlsVisible["DegreeCourse"] = $this->DegreeCourse->Visible;
            $this->ControlsVisible["YearFrom"] = $this->YearFrom->Visible;
            $this->ControlsVisible["YearTo"] = $this->YearTo->Visible;
            $this->ControlsVisible["HighGradeLevel"] = $this->HighGradeLevel->Visible;
            $this->ControlsVisible["YearGrad"] = $this->YearGrad->Visible;
            $this->ControlsVisible["Honors"] = $this->Honors->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
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
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->Level->Show();
                        $this->SchoolName->Show();
                        $this->DegreeCourse->Show();
                        $this->YearFrom->Show();
                        $this->YearTo->Show();
                        $this->HighGradeLevel->Show();
                        $this->YearGrad->Show();
                        $this->Honors->Show();
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
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
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

} //End employee_educbackgrnd Class @2-FCB6E20C

class clsemployee_educbackgrndDataSource extends clsDBConnection1 {  //employee_educbackgrndDataSource Class @2-B6AA235D

//DataSource Variables @2-1B0256F6
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $Level;
    var $SchoolName;
    var $DegreeCourse;
    var $YearFrom;
    var $YearTo;
    var $HighGradeLevel;
    var $YearGrad;
    var $Honors;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-AAB5A163
    function clsemployee_educbackgrndDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_educbackgrnd";
        $this->Initialize();
        $this->Level = new clsField("Level", ccsText, "");
        
        $this->SchoolName = new clsField("SchoolName", ccsText, "");
        
        $this->DegreeCourse = new clsField("DegreeCourse", ccsText, "");
        
        $this->YearFrom = new clsField("YearFrom", ccsText, "");
        
        $this->YearTo = new clsField("YearTo", ccsText, "");
        
        $this->HighGradeLevel = new clsField("HighGradeLevel", ccsText, "");
        
        $this->YearGrad = new clsField("YearGrad", ccsText, "");
        
        $this->Honors = new clsField("Honors", ccsText, "");
        

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

//Prepare Method @2-532AFE75
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-1CE40365
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_educbackgrnd {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-F71FB752
    function SetValues()
    {
        $this->Level->SetDBValue($this->f("Level"));
        $this->SchoolName->SetDBValue($this->f("SchoolName"));
        $this->DegreeCourse->SetDBValue($this->f("DegreeCourse"));
        $this->YearFrom->SetDBValue($this->f("YearFrom"));
        $this->YearTo->SetDBValue($this->f("YearTo"));
        $this->HighGradeLevel->SetDBValue($this->f("HighGradeLevel"));
        $this->YearGrad->SetDBValue($this->f("YearGrad"));
        $this->Honors->SetDBValue($this->f("Honors"));
    }
//End SetValues Method

} //End employee_educbackgrndDataSource Class @2-FCB6E20C

//Initialize Page @1-77778F12
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
$TemplateFileName = "QEducation.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-0E8D2AC3
include_once("./QEducation_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-CDC82DEF
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_educbackgrnd = & new clsReportemployee_educbackgrnd("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q2.php";
$MainPage->employee_educbackgrnd = & $employee_educbackgrnd;
$MainPage->Link1 = & $Link1;
$employee_educbackgrnd->Initialize();

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

//Go to destination page @1-27151A57
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_educbackgrnd);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A3FB13E7
$employee_educbackgrnd->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-78CBDCBB
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_educbackgrnd);
unset($Tpl);
//End Unload Page


?>
