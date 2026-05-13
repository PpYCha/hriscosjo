<?php
//Include Common Files @1-1104DB00
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Eligibility.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridemployee_eligibility { //employee_eligibility class @2-14F11760

//Variables @2-AC1EDBB9

    // Public variables
    var $ComponentType = "Grid";
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $ErrorBlock;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $ForceIteration = false;
    var $HasRecord = false;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $RowNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";
    var $Attributes;

    // Grid Controls
    var $StaticControls;
    var $RowControls;
//End Variables

//Class_Initialize Event @2-91019880
    function clsGridemployee_eligibility($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_eligibility";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employee_eligibility";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployee_eligibilityDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmployeeID = & new clsControl(ccsLink, "EmployeeID", "EmployeeID", ccsInteger, "", CCGetRequestParam("EmployeeID", ccsGet, NULL), $this);
        $this->EmployeeID->Page = "Eligibility.php";
        $this->CareerService = & new clsControl(ccsLabel, "CareerService", "CareerService", ccsText, "", CCGetRequestParam("CareerService", ccsGet, NULL), $this);
        $this->Rating = & new clsControl(ccsLabel, "Rating", "Rating", ccsText, "", CCGetRequestParam("Rating", ccsGet, NULL), $this);
        $this->DateOfExam = & new clsControl(ccsLabel, "DateOfExam", "DateOfExam", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("DateOfExam", ccsGet, NULL), $this);
        $this->PlaceOfExam = & new clsControl(ccsLabel, "PlaceOfExam", "PlaceOfExam", ccsText, "", CCGetRequestParam("PlaceOfExam", ccsGet, NULL), $this);
        $this->LicenseNo = & new clsControl(ccsLabel, "LicenseNo", "LicenseNo", ccsText, "", CCGetRequestParam("LicenseNo", ccsGet, NULL), $this);
        $this->DateOfValidity = & new clsControl(ccsLabel, "DateOfValidity", "DateOfValidity", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("DateOfValidity", ccsGet, NULL), $this);
        $this->employee_eligibility_Insert = & new clsControl(ccsLink, "employee_eligibility_Insert", "employee_eligibility_Insert", ccsText, "", CCGetRequestParam("employee_eligibility_Insert", ccsGet, NULL), $this);
        $this->employee_eligibility_Insert->Parameters = CCGetQueryString("QueryString", array("EligibilityID", "ccsForm"));
        $this->employee_eligibility_Insert->Page = "Eligibility.php";
        $this->employee_eligibility_TotalRecords = & new clsControl(ccsLabel, "employee_eligibility_TotalRecords", "employee_eligibility_TotalRecords", ccsText, "", CCGetRequestParam("employee_eligibility_TotalRecords", ccsGet, NULL), $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-FDA6E5B6
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["EmployeeID"] = $this->EmployeeID->Visible;
            $this->ControlsVisible["CareerService"] = $this->CareerService->Visible;
            $this->ControlsVisible["Rating"] = $this->Rating->Visible;
            $this->ControlsVisible["DateOfExam"] = $this->DateOfExam->Visible;
            $this->ControlsVisible["PlaceOfExam"] = $this->PlaceOfExam->Visible;
            $this->ControlsVisible["LicenseNo"] = $this->LicenseNo->Visible;
            $this->ControlsVisible["DateOfValidity"] = $this->DateOfValidity->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                $this->EmployeeID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->EmployeeID->Parameters = CCAddParam($this->EmployeeID->Parameters, "EligibilityID", $this->DataSource->f("EligibilityID"));
                $this->CareerService->SetValue($this->DataSource->CareerService->GetValue());
                $this->Rating->SetValue($this->DataSource->Rating->GetValue());
                $this->DateOfExam->SetValue($this->DataSource->DateOfExam->GetValue());
                $this->PlaceOfExam->SetValue($this->DataSource->PlaceOfExam->GetValue());
                $this->LicenseNo->SetValue($this->DataSource->LicenseNo->GetValue());
                $this->DateOfValidity->SetValue($this->DataSource->DateOfValidity->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->CareerService->Show();
                $this->Rating->Show();
                $this->DateOfExam->Show();
                $this->PlaceOfExam->Show();
                $this->LicenseNo->Show();
                $this->DateOfValidity->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->employee_eligibility_Insert->Show();
        $this->employee_eligibility_TotalRecords->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-0631FE2E
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CareerService->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Rating->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateOfExam->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PlaceOfExam->Errors->ToString());
        $errors = ComposeStrings($errors, $this->LicenseNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateOfValidity->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee_eligibility Class @2-FCB6E20C

class clsemployee_eligibilityDataSource extends clsDBConnection1 {  //employee_eligibilityDataSource Class @2-290E4A2F

//DataSource Variables @2-C262F65E
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EmployeeID;
    var $CareerService;
    var $Rating;
    var $DateOfExam;
    var $PlaceOfExam;
    var $LicenseNo;
    var $DateOfValidity;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-8828B339
    function clsemployee_eligibilityDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employee_eligibility";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->CareerService = new clsField("CareerService", ccsText, "");
        
        $this->Rating = new clsField("Rating", ccsText, "");
        
        $this->DateOfExam = new clsField("DateOfExam", ccsDate, $this->DateFormat);
        
        $this->PlaceOfExam = new clsField("PlaceOfExam", ccsText, "");
        
        $this->LicenseNo = new clsField("LicenseNo", ccsText, "");
        
        $this->DateOfValidity = new clsField("DateOfValidity", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-36C68208
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateOfExam desc";
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

//Open Method @2-4D2D944D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee_eligibility";
        $this->SQL = "SELECT EligibilityID, EmployeeID, CareerService, Rating, DateOfExam, PlaceOfExam, LicenseNo, DateOfValidity \n\n" .
        "FROM employee_eligibility {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-D6C61F51
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->CareerService->SetDBValue($this->f("CareerService"));
        $this->Rating->SetDBValue($this->f("Rating"));
        $this->DateOfExam->SetDBValue(trim($this->f("DateOfExam")));
        $this->PlaceOfExam->SetDBValue($this->f("PlaceOfExam"));
        $this->LicenseNo->SetDBValue($this->f("LicenseNo"));
        $this->DateOfValidity->SetDBValue(trim($this->f("DateOfValidity")));
    }
//End SetValues Method

} //End employee_eligibilityDataSource Class @2-FCB6E20C

class clsRecordemployee_eligibility1 { //employee_eligibility1 Class @30-7FCD050F

//Variables @30-D6FF3E86

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

//Class_Initialize Event @30-AB485472
    function clsRecordemployee_eligibility1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee_eligibility1/Error";
        $this->DataSource = new clsemployee_eligibility1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee_eligibility1";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->EmployeeID = & new clsControl(ccsTextBox, "EmployeeID", "Employee ID", ccsInteger, "", CCGetRequestParam("EmployeeID", $Method, NULL), $this);
            $this->EmployeeID->Required = true;
            $this->CareerService = & new clsControl(ccsTextBox, "CareerService", "Career Service", ccsText, "", CCGetRequestParam("CareerService", $Method, NULL), $this);
            $this->Rating = & new clsControl(ccsTextBox, "Rating", "Rating", ccsText, "", CCGetRequestParam("Rating", $Method, NULL), $this);
            $this->DateOfExam = & new clsControl(ccsTextBox, "DateOfExam", "Date Of Exam", ccsDate, $DefaultDateFormat, CCGetRequestParam("DateOfExam", $Method, NULL), $this);
            $this->DatePicker_DateOfExam = & new clsDatePicker("DatePicker_DateOfExam", "employee_eligibility1", "DateOfExam", $this);
            $this->PlaceOfExam = & new clsControl(ccsTextBox, "PlaceOfExam", "Place Of Exam", ccsText, "", CCGetRequestParam("PlaceOfExam", $Method, NULL), $this);
            $this->LicenseNo = & new clsControl(ccsTextBox, "LicenseNo", "License No", ccsText, "", CCGetRequestParam("LicenseNo", $Method, NULL), $this);
            $this->DateOfValidity = & new clsControl(ccsTextBox, "DateOfValidity", "Date Of Validity", ccsDate, $DefaultDateFormat, CCGetRequestParam("DateOfValidity", $Method, NULL), $this);
            $this->DatePicker_DateOfValidity = & new clsDatePicker("DatePicker_DateOfValidity", "employee_eligibility1", "DateOfValidity", $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @30-EE49D2AA
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEligibilityID"] = CCGetFromGet("EligibilityID", NULL);
    }
//End Initialize Method

//Validate Method @30-EC9CFF41
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->CareerService->Validate() && $Validation);
        $Validation = ($this->Rating->Validate() && $Validation);
        $Validation = ($this->DateOfExam->Validate() && $Validation);
        $Validation = ($this->PlaceOfExam->Validate() && $Validation);
        $Validation = ($this->LicenseNo->Validate() && $Validation);
        $Validation = ($this->DateOfValidity->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CareerService->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Rating->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateOfExam->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PlaceOfExam->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LicenseNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateOfValidity->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @30-9814F9B0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->CareerService->Errors->Count());
        $errors = ($errors || $this->Rating->Errors->Count());
        $errors = ($errors || $this->DateOfExam->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateOfExam->Errors->Count());
        $errors = ($errors || $this->PlaceOfExam->Errors->Count());
        $errors = ($errors || $this->LicenseNo->Errors->Count());
        $errors = ($errors || $this->DateOfValidity->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateOfValidity->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @30-ED598703
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

//Operation Method @30-288F0419
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @30-CBA42F81
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->CareerService->SetValue($this->CareerService->GetValue(true));
        $this->DataSource->Rating->SetValue($this->Rating->GetValue(true));
        $this->DataSource->DateOfExam->SetValue($this->DateOfExam->GetValue(true));
        $this->DataSource->PlaceOfExam->SetValue($this->PlaceOfExam->GetValue(true));
        $this->DataSource->LicenseNo->SetValue($this->LicenseNo->GetValue(true));
        $this->DataSource->DateOfValidity->SetValue($this->DateOfValidity->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @30-245F18D4
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->CareerService->SetValue($this->CareerService->GetValue(true));
        $this->DataSource->Rating->SetValue($this->Rating->GetValue(true));
        $this->DataSource->DateOfExam->SetValue($this->DateOfExam->GetValue(true));
        $this->DataSource->PlaceOfExam->SetValue($this->PlaceOfExam->GetValue(true));
        $this->DataSource->LicenseNo->SetValue($this->LicenseNo->GetValue(true));
        $this->DataSource->DateOfValidity->SetValue($this->DateOfValidity->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @30-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @30-6660BFE3
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
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                    $this->CareerService->SetValue($this->DataSource->CareerService->GetValue());
                    $this->Rating->SetValue($this->DataSource->Rating->GetValue());
                    $this->DateOfExam->SetValue($this->DataSource->DateOfExam->GetValue());
                    $this->PlaceOfExam->SetValue($this->DataSource->PlaceOfExam->GetValue());
                    $this->LicenseNo->SetValue($this->DataSource->LicenseNo->GetValue());
                    $this->DateOfValidity->SetValue($this->DataSource->DateOfValidity->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CareerService->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Rating->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateOfExam->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateOfExam->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PlaceOfExam->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LicenseNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateOfValidity->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateOfValidity->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->EmployeeID->Show();
        $this->CareerService->Show();
        $this->Rating->Show();
        $this->DateOfExam->Show();
        $this->DatePicker_DateOfExam->Show();
        $this->PlaceOfExam->Show();
        $this->LicenseNo->Show();
        $this->DateOfValidity->Show();
        $this->DatePicker_DateOfValidity->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee_eligibility1 Class @30-FCB6E20C

class clsemployee_eligibility1DataSource extends clsDBConnection1 {  //employee_eligibility1DataSource Class @30-56BA4AC4

//DataSource Variables @30-6FE49908
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $InsertParameters;
    var $UpdateParameters;
    var $DeleteParameters;
    var $wp;
    var $AllParametersSet;

    var $InsertFields = array();
    var $UpdateFields = array();

    // Datasource fields
    var $EmployeeID;
    var $CareerService;
    var $Rating;
    var $DateOfExam;
    var $PlaceOfExam;
    var $LicenseNo;
    var $DateOfValidity;
//End DataSource Variables

//DataSourceClass_Initialize Event @30-CF2B8B80
    function clsemployee_eligibility1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee_eligibility1/Error";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->CareerService = new clsField("CareerService", ccsText, "");
        
        $this->Rating = new clsField("Rating", ccsText, "");
        
        $this->DateOfExam = new clsField("DateOfExam", ccsDate, $this->DateFormat);
        
        $this->PlaceOfExam = new clsField("PlaceOfExam", ccsText, "");
        
        $this->LicenseNo = new clsField("LicenseNo", ccsText, "");
        
        $this->DateOfValidity = new clsField("DateOfValidity", ccsDate, $this->DateFormat);
        

        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["CareerService"] = array("Name" => "CareerService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Rating"] = array("Name" => "Rating", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DateOfExam"] = array("Name" => "DateOfExam", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["PlaceOfExam"] = array("Name" => "PlaceOfExam", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["LicenseNo"] = array("Name" => "LicenseNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DateOfValidity"] = array("Name" => "DateOfValidity", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["CareerService"] = array("Name" => "CareerService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Rating"] = array("Name" => "Rating", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateOfExam"] = array("Name" => "DateOfExam", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PlaceOfExam"] = array("Name" => "PlaceOfExam", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LicenseNo"] = array("Name" => "LicenseNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateOfValidity"] = array("Name" => "DateOfValidity", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @30-725D95ED
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEligibilityID", ccsInteger, "", "", $this->Parameters["urlEligibilityID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "EligibilityID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @30-7465401C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_eligibility {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @30-D6C61F51
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->CareerService->SetDBValue($this->f("CareerService"));
        $this->Rating->SetDBValue($this->f("Rating"));
        $this->DateOfExam->SetDBValue(trim($this->f("DateOfExam")));
        $this->PlaceOfExam->SetDBValue($this->f("PlaceOfExam"));
        $this->LicenseNo->SetDBValue($this->f("LicenseNo"));
        $this->DateOfValidity->SetDBValue(trim($this->f("DateOfValidity")));
    }
//End SetValues Method

//Insert Method @30-65E37848
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->InsertFields["CareerService"]["Value"] = $this->CareerService->GetDBValue(true);
        $this->InsertFields["Rating"]["Value"] = $this->Rating->GetDBValue(true);
        $this->InsertFields["DateOfExam"]["Value"] = $this->DateOfExam->GetDBValue(true);
        $this->InsertFields["PlaceOfExam"]["Value"] = $this->PlaceOfExam->GetDBValue(true);
        $this->InsertFields["LicenseNo"]["Value"] = $this->LicenseNo->GetDBValue(true);
        $this->InsertFields["DateOfValidity"]["Value"] = $this->DateOfValidity->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee_eligibility", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @30-6E202283
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->UpdateFields["CareerService"]["Value"] = $this->CareerService->GetDBValue(true);
        $this->UpdateFields["Rating"]["Value"] = $this->Rating->GetDBValue(true);
        $this->UpdateFields["DateOfExam"]["Value"] = $this->DateOfExam->GetDBValue(true);
        $this->UpdateFields["PlaceOfExam"]["Value"] = $this->PlaceOfExam->GetDBValue(true);
        $this->UpdateFields["LicenseNo"]["Value"] = $this->LicenseNo->GetDBValue(true);
        $this->UpdateFields["DateOfValidity"]["Value"] = $this->DateOfValidity->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employee_eligibility", $this->UpdateFields, $this);
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @30-1EFC963A
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM employee_eligibility";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End employee_eligibility1DataSource Class @30-FCB6E20C

//Initialize Page @1-F9B3AC60
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
$TemplateFileName = "Eligibility.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5E8EA550
CCSecurityRedirect("7;6", "");
//End Authenticate User

//Include events file @1-A983EF52
include_once("./Eligibility_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5A5BF2FD
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_eligibility = & new clsGridemployee_eligibility("", $MainPage);
$employee_eligibility1 = & new clsRecordemployee_eligibility1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Employee.php";
$MainPage->employee_eligibility = & $employee_eligibility;
$MainPage->employee_eligibility1 = & $employee_eligibility1;
$MainPage->Link1 = & $Link1;
$employee_eligibility->Initialize();
$employee_eligibility1->Initialize();

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

//Execute Components @1-B22D535E
$employee_eligibility1->Operation();
//End Execute Components

//Go to destination page @1-CE8F3FCB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_eligibility);
    unset($employee_eligibility1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-06645187
$employee_eligibility->Show();
$employee_eligibility1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C136B3CC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_eligibility);
unset($employee_eligibility1);
unset($Tpl);
//End Unload Page


?>
