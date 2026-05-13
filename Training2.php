<?php
//Include Common Files @1-08BF3D02
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Training2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridemployee_training { //employee_training class @2-4F93FC4D

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

//Class_Initialize Event @2-854D54A5
    function clsGridemployee_training($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_training";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employee_training";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployee_trainingDataSource($this);
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
        $this->EmployeeID->Page = "Training2.php";
        $this->TrainingTitle = & new clsControl(ccsLabel, "TrainingTitle", "TrainingTitle", ccsText, "", CCGetRequestParam("TrainingTitle", ccsGet, NULL), $this);
        $this->DateFrom = & new clsControl(ccsLabel, "DateFrom", "DateFrom", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("DateFrom", ccsGet, NULL), $this);
        $this->DateTo = & new clsControl(ccsLabel, "DateTo", "DateTo", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("DateTo", ccsGet, NULL), $this);
        $this->NoOfHours = & new clsControl(ccsLabel, "NoOfHours", "NoOfHours", ccsText, "", CCGetRequestParam("NoOfHours", ccsGet, NULL), $this);
        $this->TrainingCategory = & new clsControl(ccsLabel, "TrainingCategory", "TrainingCategory", ccsText, "", CCGetRequestParam("TrainingCategory", ccsGet, NULL), $this);
        $this->ConductedBy = & new clsControl(ccsLabel, "ConductedBy", "ConductedBy", ccsText, "", CCGetRequestParam("ConductedBy", ccsGet, NULL), $this);
        $this->employee_training_Insert = & new clsControl(ccsLink, "employee_training_Insert", "employee_training_Insert", ccsText, "", CCGetRequestParam("employee_training_Insert", ccsGet, NULL), $this);
        $this->employee_training_Insert->Parameters = CCGetQueryString("QueryString", array("TrainingID", "ccsForm"));
        $this->employee_training_Insert->Page = "Training2.php";
        $this->employee_training_TotalRecords = & new clsControl(ccsLabel, "employee_training_TotalRecords", "employee_training_TotalRecords", ccsText, "", CCGetRequestParam("employee_training_TotalRecords", ccsGet, NULL), $this);
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

//Show Method @2-2BF3620C
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
            $this->ControlsVisible["TrainingTitle"] = $this->TrainingTitle->Visible;
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["NoOfHours"] = $this->NoOfHours->Visible;
            $this->ControlsVisible["TrainingCategory"] = $this->TrainingCategory->Visible;
            $this->ControlsVisible["ConductedBy"] = $this->ConductedBy->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                $this->EmployeeID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->EmployeeID->Parameters = CCAddParam($this->EmployeeID->Parameters, "TrainingID", $this->DataSource->f("TrainingID"));
                $this->TrainingTitle->SetValue($this->DataSource->TrainingTitle->GetValue());
                $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
                $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
                $this->NoOfHours->SetValue($this->DataSource->NoOfHours->GetValue());
                $this->TrainingCategory->SetValue($this->DataSource->TrainingCategory->GetValue());
                $this->ConductedBy->SetValue($this->DataSource->ConductedBy->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->TrainingTitle->Show();
                $this->DateFrom->Show();
                $this->DateTo->Show();
                $this->NoOfHours->Show();
                $this->TrainingCategory->Show();
                $this->ConductedBy->Show();
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
        $this->employee_training_Insert->Show();
        $this->employee_training_TotalRecords->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-25BFECC9
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
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

} //End employee_training Class @2-FCB6E20C

class clsemployee_trainingDataSource extends clsDBConnection1 {  //employee_trainingDataSource Class @2-45D1F7FF

//DataSource Variables @2-4E339C25
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EmployeeID;
    var $TrainingTitle;
    var $DateFrom;
    var $DateTo;
    var $NoOfHours;
    var $TrainingCategory;
    var $ConductedBy;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-88CB5A4D
    function clsemployee_trainingDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employee_training";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->TrainingTitle = new clsField("TrainingTitle", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsDate, $this->DateFormat);
        
        $this->NoOfHours = new clsField("NoOfHours", ccsText, "");
        
        $this->TrainingCategory = new clsField("TrainingCategory", ccsText, "");
        
        $this->ConductedBy = new clsField("ConductedBy", ccsText, "");
        

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

//Open Method @2-BB454D07
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee_training";
        $this->SQL = "SELECT TrainingID, EmployeeID, TrainingTitle, DateFrom, DateTo, NoOfHours, TrainingCategory, ConductedBy \n\n" .
        "FROM employee_training {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-E6BCB9D2
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->TrainingTitle->SetDBValue($this->f("TrainingTitle"));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue(trim($this->f("DateTo")));
        $this->NoOfHours->SetDBValue($this->f("NoOfHours"));
        $this->TrainingCategory->SetDBValue($this->f("TrainingCategory"));
        $this->ConductedBy->SetDBValue($this->f("ConductedBy"));
    }
//End SetValues Method

} //End employee_trainingDataSource Class @2-FCB6E20C

class clsRecordemployee_training1 { //employee_training1 Class @30-48CEE230

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

//Class_Initialize Event @30-ED9E6E15
    function clsRecordemployee_training1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee_training1/Error";
        $this->DataSource = new clsemployee_training1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee_training1";
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
            $this->EmployeeID = & new clsControl(ccsTextBox, "EmployeeID", "Employee ID", ccsInteger, "", CCGetRequestParam("EmployeeID", $Method, NULL), $this);
            $this->EmployeeID->Required = true;
            $this->TrainingTitle = & new clsControl(ccsTextBox, "TrainingTitle", "Training Title", ccsText, "", CCGetRequestParam("TrainingTitle", $Method, NULL), $this);
            $this->DateFrom = & new clsControl(ccsTextBox, "DateFrom", "Date From", ccsDate, $DefaultDateFormat, CCGetRequestParam("DateFrom", $Method, NULL), $this);
            $this->DatePicker_DateFrom = & new clsDatePicker("DatePicker_DateFrom", "employee_training1", "DateFrom", $this);
            $this->DateTo = & new clsControl(ccsTextBox, "DateTo", "Date To", ccsDate, $DefaultDateFormat, CCGetRequestParam("DateTo", $Method, NULL), $this);
            $this->DatePicker_DateTo = & new clsDatePicker("DatePicker_DateTo", "employee_training1", "DateTo", $this);
            $this->NoOfHours = & new clsControl(ccsTextBox, "NoOfHours", "No Of Hours", ccsText, "", CCGetRequestParam("NoOfHours", $Method, NULL), $this);
            $this->TrainingCategory = & new clsControl(ccsListBox, "TrainingCategory", "Training Category", ccsText, "", CCGetRequestParam("TrainingCategory", $Method, NULL), $this);
            $this->TrainingCategory->DSType = dsTable;
            $this->TrainingCategory->DataSource = new clsDBConnection1();
            $this->TrainingCategory->ds = & $this->TrainingCategory->DataSource;
            $this->TrainingCategory->DataSource->SQL = "SELECT * \n" .
"FROM lut_trainingcat {SQL_Where} {SQL_OrderBy}";
            list($this->TrainingCategory->BoundColumn, $this->TrainingCategory->TextColumn, $this->TrainingCategory->DBFormat) = array("TrainingCat", "TrainingCat", "");
            $this->ConductedBy = & new clsControl(ccsTextBox, "ConductedBy", "Conducted By", ccsText, "", CCGetRequestParam("ConductedBy", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @30-CC7F4A1E
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlTrainingID"] = CCGetFromGet("TrainingID", NULL);
    }
//End Initialize Method

//Validate Method @30-1C0DDB91
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->TrainingTitle->Validate() && $Validation);
        $Validation = ($this->DateFrom->Validate() && $Validation);
        $Validation = ($this->DateTo->Validate() && $Validation);
        $Validation = ($this->NoOfHours->Validate() && $Validation);
        $Validation = ($this->TrainingCategory->Validate() && $Validation);
        $Validation = ($this->ConductedBy->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TrainingTitle->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateFrom->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateTo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NoOfHours->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TrainingCategory->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ConductedBy->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @30-455E23CB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->TrainingTitle->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateTo->Errors->Count());
        $errors = ($errors || $this->NoOfHours->Errors->Count());
        $errors = ($errors || $this->TrainingCategory->Errors->Count());
        $errors = ($errors || $this->ConductedBy->Errors->Count());
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

//Operation Method @30-B908BA44
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
            }
        }
        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
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

//InsertRow Method @30-D07D8472
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->TrainingTitle->SetValue($this->TrainingTitle->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->NoOfHours->SetValue($this->NoOfHours->GetValue(true));
        $this->DataSource->TrainingCategory->SetValue($this->TrainingCategory->GetValue(true));
        $this->DataSource->ConductedBy->SetValue($this->ConductedBy->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @30-3F86B327
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->TrainingTitle->SetValue($this->TrainingTitle->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->NoOfHours->SetValue($this->NoOfHours->GetValue(true));
        $this->DataSource->TrainingCategory->SetValue($this->TrainingCategory->GetValue(true));
        $this->DataSource->ConductedBy->SetValue($this->ConductedBy->GetValue(true));
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

//Show Method @30-F46291D1
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

        $this->TrainingCategory->Prepare();

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
                    $this->TrainingTitle->SetValue($this->DataSource->TrainingTitle->GetValue());
                    $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
                    $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
                    $this->NoOfHours->SetValue($this->DataSource->NoOfHours->GetValue());
                    $this->TrainingCategory->SetValue($this->DataSource->TrainingCategory->GetValue());
                    $this->ConductedBy->SetValue($this->DataSource->ConductedBy->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TrainingTitle->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NoOfHours->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TrainingCategory->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ConductedBy->Errors->ToString());
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
        $this->EmployeeID->Show();
        $this->TrainingTitle->Show();
        $this->DateFrom->Show();
        $this->DatePicker_DateFrom->Show();
        $this->DateTo->Show();
        $this->DatePicker_DateTo->Show();
        $this->NoOfHours->Show();
        $this->TrainingCategory->Show();
        $this->ConductedBy->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee_training1 Class @30-FCB6E20C

class clsemployee_training1DataSource extends clsDBConnection1 {  //employee_training1DataSource Class @30-D00547AD

//DataSource Variables @30-E3B5F373
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
    var $TrainingTitle;
    var $DateFrom;
    var $DateTo;
    var $NoOfHours;
    var $TrainingCategory;
    var $ConductedBy;
//End DataSource Variables

//DataSourceClass_Initialize Event @30-C6A6D6AE
    function clsemployee_training1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee_training1/Error";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->TrainingTitle = new clsField("TrainingTitle", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsDate, $this->DateFormat);
        
        $this->NoOfHours = new clsField("NoOfHours", ccsText, "");
        
        $this->TrainingCategory = new clsField("TrainingCategory", ccsText, "");
        
        $this->ConductedBy = new clsField("ConductedBy", ccsText, "");
        

        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["TrainingTitle"] = array("Name" => "TrainingTitle", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["NoOfHours"] = array("Name" => "NoOfHours", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["TrainingCategory"] = array("Name" => "TrainingCategory", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ConductedBy"] = array("Name" => "ConductedBy", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["TrainingTitle"] = array("Name" => "TrainingTitle", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["NoOfHours"] = array("Name" => "NoOfHours", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["TrainingCategory"] = array("Name" => "TrainingCategory", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ConductedBy"] = array("Name" => "ConductedBy", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @30-31E4125A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlTrainingID", ccsInteger, "", "", $this->Parameters["urlTrainingID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "TrainingID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @30-7ABD8E59
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_training {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @30-E6BCB9D2
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->TrainingTitle->SetDBValue($this->f("TrainingTitle"));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue(trim($this->f("DateTo")));
        $this->NoOfHours->SetDBValue($this->f("NoOfHours"));
        $this->TrainingCategory->SetDBValue($this->f("TrainingCategory"));
        $this->ConductedBy->SetDBValue($this->f("ConductedBy"));
    }
//End SetValues Method

//Insert Method @30-368D0F07
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->InsertFields["TrainingTitle"]["Value"] = $this->TrainingTitle->GetDBValue(true);
        $this->InsertFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->InsertFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->InsertFields["NoOfHours"]["Value"] = $this->NoOfHours->GetDBValue(true);
        $this->InsertFields["TrainingCategory"]["Value"] = $this->TrainingCategory->GetDBValue(true);
        $this->InsertFields["ConductedBy"]["Value"] = $this->ConductedBy->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee_training", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @30-CBD72E54
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->UpdateFields["TrainingTitle"]["Value"] = $this->TrainingTitle->GetDBValue(true);
        $this->UpdateFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->UpdateFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->UpdateFields["NoOfHours"]["Value"] = $this->NoOfHours->GetDBValue(true);
        $this->UpdateFields["TrainingCategory"]["Value"] = $this->TrainingCategory->GetDBValue(true);
        $this->UpdateFields["ConductedBy"]["Value"] = $this->ConductedBy->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employee_training", $this->UpdateFields, $this);
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

//Delete Method @30-A9498270
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM employee_training";
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

} //End employee_training1DataSource Class @30-FCB6E20C

//Initialize Page @1-310CC4CE
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
$TemplateFileName = "Training2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-21375735
CCSecurityRedirect("7;6;3", "");
//End Authenticate User

//Include events file @1-2DFFBC6B
include_once("./Training2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-FE3C18B6
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_training = & new clsGridemployee_training("", $MainPage);
$employee_training1 = & new clsRecordemployee_training1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Employee.php";
$MainPage->employee_training = & $employee_training;
$MainPage->employee_training1 = & $employee_training1;
$MainPage->Link1 = & $Link1;
$employee_training->Initialize();
$employee_training1->Initialize();

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

//Execute Components @1-3A2EABA9
$employee_training1->Operation();
//End Execute Components

//Go to destination page @1-8765A2BB
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_training);
    unset($employee_training1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-2088F2A0
$employee_training->Show();
$employee_training1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-A1D7DFFF
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_training);
unset($employee_training1);
unset($Tpl);
//End Unload Page


?>
