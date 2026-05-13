<?php
//Include Common Files @1-15F40188
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QTraining.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee_training ReportGroup class @2-0E27C643
class clsReportGroupemployee_training {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $TrainingTitle, $_TrainingTitleAttributes;
    var $DateFrom, $_DateFromAttributes;
    var $DateTo, $_DateToAttributes;
    var $NoOfHours, $_NoOfHoursAttributes;
    var $TrainingCategory, $_TrainingCategoryAttributes;
    var $ConductedBy, $_ConductedByAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee_training(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->TrainingTitle = $this->Parent->TrainingTitle->Value;
        $this->DateFrom = $this->Parent->DateFrom->Value;
        $this->DateTo = $this->Parent->DateTo->Value;
        $this->NoOfHours = $this->Parent->NoOfHours->Value;
        $this->TrainingCategory = $this->Parent->TrainingCategory->Value;
        $this->ConductedBy = $this->Parent->ConductedBy->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_Sorter_TrainingTitleAttributes = $this->Parent->Sorter_TrainingTitle->Attributes->GetAsArray();
        $this->_Sorter_DateFromAttributes = $this->Parent->Sorter_DateFrom->Attributes->GetAsArray();
        $this->_Sorter_DateToAttributes = $this->Parent->Sorter_DateTo->Attributes->GetAsArray();
        $this->_Sorter_NoOfHoursAttributes = $this->Parent->Sorter_NoOfHours->Attributes->GetAsArray();
        $this->_Sorter_TrainingCategoryAttributes = $this->Parent->Sorter_TrainingCategory->Attributes->GetAsArray();
        $this->_Sorter_ConductedByAttributes = $this->Parent->Sorter_ConductedBy->Attributes->GetAsArray();
        $this->_TrainingTitleAttributes = $this->Parent->TrainingTitle->Attributes->GetAsArray();
        $this->_DateFromAttributes = $this->Parent->DateFrom->Attributes->GetAsArray();
        $this->_DateToAttributes = $this->Parent->DateTo->Attributes->GetAsArray();
        $this->_NoOfHoursAttributes = $this->Parent->NoOfHours->Attributes->GetAsArray();
        $this->_TrainingCategoryAttributes = $this->Parent->TrainingCategory->Attributes->GetAsArray();
        $this->_ConductedByAttributes = $this->Parent->ConductedBy->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
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
    }
}
//End employee_training ReportGroup class

//employee_training GroupsCollection class @2-E41FD4C7
class clsGroupsCollectionemployee_training {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee_training(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee_training($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
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
//End employee_training GroupsCollection class

class clsReportemployee_training { //employee_training Class @2-667A7F7F

//employee_training Variables @2-8A06CDF4

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
    var $Sorter_TrainingTitle;
    var $Sorter_DateFrom;
    var $Sorter_DateTo;
    var $Sorter_NoOfHours;
    var $Sorter_TrainingCategory;
    var $Sorter_ConductedBy;
//End employee_training Variables

//Class_Initialize Event @2-AE55DDCE
    function clsReportemployee_training($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_training";
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
        $this->DataSource = new clsemployee_trainingDataSource($this);
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
        $this->SorterName = CCGetParam("employee_trainingOrder", "");
        $this->SorterDirection = CCGetParam("employee_trainingDir", "");

        $this->Sorter_TrainingTitle = & new clsSorter($this->ComponentName, "Sorter_TrainingTitle", $FileName, $this);
        $this->Sorter_DateFrom = & new clsSorter($this->ComponentName, "Sorter_DateFrom", $FileName, $this);
        $this->Sorter_DateTo = & new clsSorter($this->ComponentName, "Sorter_DateTo", $FileName, $this);
        $this->Sorter_NoOfHours = & new clsSorter($this->ComponentName, "Sorter_NoOfHours", $FileName, $this);
        $this->Sorter_TrainingCategory = & new clsSorter($this->ComponentName, "Sorter_TrainingCategory", $FileName, $this);
        $this->Sorter_ConductedBy = & new clsSorter($this->ComponentName, "Sorter_ConductedBy", $FileName, $this);
        $this->TrainingTitle = & new clsControl(ccsReportLabel, "TrainingTitle", "TrainingTitle", ccsText, "", "", $this);
        $this->DateFrom = & new clsControl(ccsReportLabel, "DateFrom", "DateFrom", ccsText, "", "", $this);
        $this->DateTo = & new clsControl(ccsReportLabel, "DateTo", "DateTo", ccsText, "", "", $this);
        $this->NoOfHours = & new clsControl(ccsReportLabel, "NoOfHours", "NoOfHours", ccsText, "", "", $this);
        $this->TrainingCategory = & new clsControl(ccsReportLabel, "TrainingCategory", "TrainingCategory", ccsText, "", "", $this);
        $this->ConductedBy = & new clsControl(ccsReportLabel, "ConductedBy", "ConductedBy", ccsText, "", "", $this);
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

//CheckErrors Method @2-C4E940E9
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->TrainingTitle->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->NoOfHours->Errors->Count());
        $errors = ($errors || $this->TrainingCategory->Errors->Count());
        $errors = ($errors || $this->ConductedBy->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-5F8CD23E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->TrainingTitle->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NoOfHours->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TrainingCategory->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConductedBy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-B913283F
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

        $Groups = new clsGroupsCollectionemployee_training($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->TrainingTitle->SetValue($this->DataSource->TrainingTitle->GetValue());
            $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
            $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
            $this->NoOfHours->SetValue($this->DataSource->NoOfHours->GetValue());
            $this->TrainingCategory->SetValue($this->DataSource->TrainingCategory->GetValue());
            $this->ConductedBy->SetValue($this->DataSource->ConductedBy->GetValue());
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
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
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

} //End employee_training Class @2-FCB6E20C

class clsemployee_trainingDataSource extends clsDBConnection1 {  //employee_trainingDataSource Class @2-45D1F7FF

//DataSource Variables @2-B65C55B6
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $TrainingTitle;
    var $DateFrom;
    var $DateTo;
    var $NoOfHours;
    var $TrainingCategory;
    var $ConductedBy;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-7C0D5BEC
    function clsemployee_trainingDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee_training";
        $this->Initialize();
        $this->TrainingTitle = new clsField("TrainingTitle", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsText, "");
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->NoOfHours = new clsField("NoOfHours", ccsText, "");
        
        $this->TrainingCategory = new clsField("TrainingCategory", ccsText, "");
        
        $this->ConductedBy = new clsField("ConductedBy", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-F2641368
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateFrom";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_TrainingTitle" => array("TrainingTitle", ""), 
            "Sorter_DateFrom" => array("DateFrom", ""), 
            "Sorter_DateTo" => array("DateTo", ""), 
            "Sorter_NoOfHours" => array("NoOfHours", ""), 
            "Sorter_TrainingCategory" => array("TrainingCategory", ""), 
            "Sorter_ConductedBy" => array("ConductedBy", "")));
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

//Open Method @2-91E64083
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_training {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-262A1D6C
    function SetValues()
    {
        $this->TrainingTitle->SetDBValue($this->f("TrainingTitle"));
        $this->DateFrom->SetDBValue($this->f("DateFrom"));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->NoOfHours->SetDBValue($this->f("NoOfHours"));
        $this->TrainingCategory->SetDBValue($this->f("TrainingCategory"));
        $this->ConductedBy->SetDBValue($this->f("ConductedBy"));
    }
//End SetValues Method

} //End employee_trainingDataSource Class @2-FCB6E20C

//Initialize Page @1-1A27B1FC
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
$TemplateFileName = "QTraining.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-0A78D0D1
include_once("./QTraining_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4D8001F0
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_training = & new clsReportemployee_training("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "QueryEmpProfile.php";
$MainPage->employee_training = & $employee_training;
$MainPage->Link1 = & $Link1;
$employee_training->Initialize();

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

//Go to destination page @1-3B2690F0
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_training);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-A2B6DF49
$employee_training->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-7B98B8EE
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_training);
unset($Tpl);
//End Unload Page


?>
