<?php
//Include Common Files @1-9B356076
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "WorkExperience2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridemployee_workexperience { //employee_workexperience class @2-16DE2150

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

//Class_Initialize Event @2-1FF07508
    function clsGridemployee_workexperience($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_workexperience";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employee_workexperience";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployee_workexperienceDataSource($this);
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
        $this->EmployeeID->Page = "WorkExperience2.php";
        $this->DateFrom = & new clsControl(ccsLabel, "DateFrom", "DateFrom", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("DateFrom", ccsGet, NULL), $this);
        $this->DateTo = & new clsControl(ccsLabel, "DateTo", "DateTo", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("DateTo", ccsGet, NULL), $this);
        $this->PositionTitle = & new clsControl(ccsLabel, "PositionTitle", "PositionTitle", ccsText, "", CCGetRequestParam("PositionTitle", ccsGet, NULL), $this);
        $this->Department = & new clsControl(ccsLabel, "Department", "Department", ccsText, "", CCGetRequestParam("Department", ccsGet, NULL), $this);
        $this->MonthlySalary = & new clsControl(ccsLabel, "MonthlySalary", "MonthlySalary", ccsSingle, array(False, 2, Null, Null, False, "", "", 1, True, ""), CCGetRequestParam("MonthlySalary", ccsGet, NULL), $this);
        $this->SalaryGrade = & new clsControl(ccsLabel, "SalaryGrade", "SalaryGrade", ccsText, "", CCGetRequestParam("SalaryGrade", ccsGet, NULL), $this);
        $this->StatusOfAppt = & new clsControl(ccsLabel, "StatusOfAppt", "StatusOfAppt", ccsText, "", CCGetRequestParam("StatusOfAppt", ccsGet, NULL), $this);
        $this->GovernmentService = & new clsControl(ccsLabel, "GovernmentService", "GovernmentService", ccsText, "", CCGetRequestParam("GovernmentService", ccsGet, NULL), $this);
        $this->StepIncremt = & new clsControl(ccsLabel, "StepIncremt", "StepIncremt", ccsText, "", CCGetRequestParam("StepIncremt", ccsGet, NULL), $this);
        $this->employee_workexperience_Insert = & new clsControl(ccsLink, "employee_workexperience_Insert", "employee_workexperience_Insert", ccsText, "", CCGetRequestParam("employee_workexperience_Insert", ccsGet, NULL), $this);
        $this->employee_workexperience_Insert->Parameters = CCGetQueryString("QueryString", array("WorkExpID", "ccsForm"));
        $this->employee_workexperience_Insert->Page = "WorkExperience2.php";
        $this->employee_workexperience_TotalRecords = & new clsControl(ccsLabel, "employee_workexperience_TotalRecords", "employee_workexperience_TotalRecords", ccsText, "", CCGetRequestParam("employee_workexperience_TotalRecords", ccsGet, NULL), $this);
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

//Show Method @2-41B06272
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
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["PositionTitle"] = $this->PositionTitle->Visible;
            $this->ControlsVisible["Department"] = $this->Department->Visible;
            $this->ControlsVisible["MonthlySalary"] = $this->MonthlySalary->Visible;
            $this->ControlsVisible["SalaryGrade"] = $this->SalaryGrade->Visible;
            $this->ControlsVisible["StatusOfAppt"] = $this->StatusOfAppt->Visible;
            $this->ControlsVisible["GovernmentService"] = $this->GovernmentService->Visible;
            $this->ControlsVisible["StepIncremt"] = $this->StepIncremt->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                $this->EmployeeID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->EmployeeID->Parameters = CCAddParam($this->EmployeeID->Parameters, "WorkExpID", $this->DataSource->f("WorkExpID"));
                $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
                $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
                $this->PositionTitle->SetValue($this->DataSource->PositionTitle->GetValue());
                $this->Department->SetValue($this->DataSource->Department->GetValue());
                $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
                $this->SalaryGrade->SetValue($this->DataSource->SalaryGrade->GetValue());
                $this->StatusOfAppt->SetValue($this->DataSource->StatusOfAppt->GetValue());
                $this->GovernmentService->SetValue($this->DataSource->GovernmentService->GetValue());
                $this->StepIncremt->SetValue($this->DataSource->StepIncremt->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->DateFrom->Show();
                $this->DateTo->Show();
                $this->PositionTitle->Show();
                $this->Department->Show();
                $this->MonthlySalary->Show();
                $this->SalaryGrade->Show();
                $this->StatusOfAppt->Show();
                $this->GovernmentService->Show();
                $this->StepIncremt->Show();
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
        $this->employee_workexperience_Insert->Show();
        $this->employee_workexperience_TotalRecords->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-C11F8C94
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionTitle->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Department->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MonthlySalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SalaryGrade->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatusOfAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GovernmentService->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StepIncremt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee_workexperience Class @2-FCB6E20C

class clsemployee_workexperienceDataSource extends clsDBConnection1 {  //employee_workexperienceDataSource Class @2-5B42D1A5

//DataSource Variables @2-1BB36750
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EmployeeID;
    var $DateFrom;
    var $DateTo;
    var $PositionTitle;
    var $Department;
    var $MonthlySalary;
    var $SalaryGrade;
    var $StatusOfAppt;
    var $GovernmentService;
    var $StepIncremt;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-F0375396
    function clsemployee_workexperienceDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employee_workexperience";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsDate, $this->DateFormat);
        
        $this->PositionTitle = new clsField("PositionTitle", ccsText, "");
        
        $this->Department = new clsField("Department", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->SalaryGrade = new clsField("SalaryGrade", ccsText, "");
        
        $this->StatusOfAppt = new clsField("StatusOfAppt", ccsText, "");
        
        $this->GovernmentService = new clsField("GovernmentService", ccsText, "");
        
        $this->StepIncremt = new clsField("StepIncremt", ccsText, "");
        

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

//Open Method @2-8215E9D5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee_workexperience";
        $this->SQL = "SELECT WorkExpID, EmployeeID, DateFrom, DateTo, PositionTitle, Department, MonthlySalary, SalaryGrade, StepIncremt, StatusOfAppt,\n\n" .
        "GovernmentService \n\n" .
        "FROM employee_workexperience {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-D523C18C
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue(trim($this->f("DateTo")));
        $this->PositionTitle->SetDBValue($this->f("PositionTitle"));
        $this->Department->SetDBValue($this->f("Department"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->SalaryGrade->SetDBValue($this->f("SalaryGrade"));
        $this->StatusOfAppt->SetDBValue($this->f("StatusOfAppt"));
        $this->GovernmentService->SetDBValue($this->f("GovernmentService"));
        $this->StepIncremt->SetDBValue($this->f("StepIncremt"));
    }
//End SetValues Method

} //End employee_workexperienceDataSource Class @2-FCB6E20C

class clsRecordemployee_workexperience1 { //employee_workexperience1 Class @39-A28A4565

//Variables @39-D6FF3E86

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

//Class_Initialize Event @39-B8F49790
    function clsRecordemployee_workexperience1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee_workexperience1/Error";
        $this->DataSource = new clsemployee_workexperience1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee_workexperience1";
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
            $this->DateFrom = & new clsControl(ccsTextBox, "DateFrom", "Date From", ccsDate, $DefaultDateFormat, CCGetRequestParam("DateFrom", $Method, NULL), $this);
            $this->DateFrom->Required = true;
            $this->DatePicker_DateFrom = & new clsDatePicker("DatePicker_DateFrom", "employee_workexperience1", "DateFrom", $this);
            $this->DateTo = & new clsControl(ccsTextBox, "DateTo", "Date To", ccsDate, $DefaultDateFormat, CCGetRequestParam("DateTo", $Method, NULL), $this);
            $this->DatePicker_DateTo = & new clsDatePicker("DatePicker_DateTo", "employee_workexperience1", "DateTo", $this);
            $this->PositionTitle = & new clsControl(ccsTextBox, "PositionTitle", "Position Title", ccsText, "", CCGetRequestParam("PositionTitle", $Method, NULL), $this);
            $this->Department = & new clsControl(ccsTextBox, "Department", "Department", ccsText, "", CCGetRequestParam("Department", $Method, NULL), $this);
            $this->MonthlySalary = & new clsControl(ccsTextBox, "MonthlySalary", "Monthly Salary", ccsSingle, "", CCGetRequestParam("MonthlySalary", $Method, NULL), $this);
            $this->SalaryGrade = & new clsControl(ccsListBox, "SalaryGrade", "Salary Grade", ccsText, "", CCGetRequestParam("SalaryGrade", $Method, NULL), $this);
            $this->SalaryGrade->DSType = dsTable;
            $this->SalaryGrade->DataSource = new clsDBConnection1();
            $this->SalaryGrade->ds = & $this->SalaryGrade->DataSource;
            $this->SalaryGrade->DataSource->SQL = "SELECT * \n" .
"FROM lut_salarygrade {SQL_Where} {SQL_OrderBy}";
            list($this->SalaryGrade->BoundColumn, $this->SalaryGrade->TextColumn, $this->SalaryGrade->DBFormat) = array("SalaryGrade", "SalaryGrade", "");
            $this->StatusOfAppt = & new clsControl(ccsListBox, "StatusOfAppt", "Status Of Appt", ccsText, "", CCGetRequestParam("StatusOfAppt", $Method, NULL), $this);
            $this->StatusOfAppt->DSType = dsTable;
            $this->StatusOfAppt->DataSource = new clsDBConnection1();
            $this->StatusOfAppt->ds = & $this->StatusOfAppt->DataSource;
            $this->StatusOfAppt->DataSource->SQL = "SELECT * \n" .
"FROM lut_statofappt {SQL_Where} {SQL_OrderBy}";
            list($this->StatusOfAppt->BoundColumn, $this->StatusOfAppt->TextColumn, $this->StatusOfAppt->DBFormat) = array("StatAppt", "StatAppt", "");
            $this->GovernmentService = & new clsControl(ccsListBox, "GovernmentService", "Government Service", ccsText, "", CCGetRequestParam("GovernmentService", $Method, NULL), $this);
            $this->GovernmentService->DSType = dsTable;
            $this->GovernmentService->DataSource = new clsDBConnection1();
            $this->GovernmentService->ds = & $this->GovernmentService->DataSource;
            $this->GovernmentService->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->GovernmentService->BoundColumn, $this->GovernmentService->TextColumn, $this->GovernmentService->DBFormat) = array("Answer", "Answer", "");
            $this->StepIncremt = & new clsControl(ccsListBox, "StepIncremt", "Step Incremt", ccsText, "", CCGetRequestParam("StepIncremt", $Method, NULL), $this);
            $this->StepIncremt->DSType = dsTable;
            $this->StepIncremt->DataSource = new clsDBConnection1();
            $this->StepIncremt->ds = & $this->StepIncremt->DataSource;
            $this->StepIncremt->DataSource->SQL = "SELECT * \n" .
"FROM lut_stepincrement {SQL_Where} {SQL_OrderBy}";
            list($this->StepIncremt->BoundColumn, $this->StepIncremt->TextColumn, $this->StepIncremt->DBFormat) = array("StepIncrement", "StepIncrement", "");
        }
    }
//End Class_Initialize Event

//Initialize Method @39-2438538C
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Order = "DateFrom desc";

        $this->DataSource->Parameters["urlWorkExpID"] = CCGetFromGet("WorkExpID", NULL);
    }
//End Initialize Method

//Validate Method @39-D5F02BD4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->DateFrom->Validate() && $Validation);
        $Validation = ($this->DateTo->Validate() && $Validation);
        $Validation = ($this->PositionTitle->Validate() && $Validation);
        $Validation = ($this->Department->Validate() && $Validation);
        $Validation = ($this->MonthlySalary->Validate() && $Validation);
        $Validation = ($this->SalaryGrade->Validate() && $Validation);
        $Validation = ($this->StatusOfAppt->Validate() && $Validation);
        $Validation = ($this->GovernmentService->Validate() && $Validation);
        $Validation = ($this->StepIncremt->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateFrom->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateTo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionTitle->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Department->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MonthlySalary->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SalaryGrade->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StatusOfAppt->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GovernmentService->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepIncremt->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @39-2E870541
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateTo->Errors->Count());
        $errors = ($errors || $this->PositionTitle->Errors->Count());
        $errors = ($errors || $this->Department->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->SalaryGrade->Errors->Count());
        $errors = ($errors || $this->StatusOfAppt->Errors->Count());
        $errors = ($errors || $this->GovernmentService->Errors->Count());
        $errors = ($errors || $this->StepIncremt->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @39-ED598703
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

//Operation Method @39-B908BA44
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

//InsertRow Method @39-31D71269
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->PositionTitle->SetValue($this->PositionTitle->GetValue(true));
        $this->DataSource->Department->SetValue($this->Department->GetValue(true));
        $this->DataSource->MonthlySalary->SetValue($this->MonthlySalary->GetValue(true));
        $this->DataSource->SalaryGrade->SetValue($this->SalaryGrade->GetValue(true));
        $this->DataSource->StatusOfAppt->SetValue($this->StatusOfAppt->GetValue(true));
        $this->DataSource->GovernmentService->SetValue($this->GovernmentService->GetValue(true));
        $this->DataSource->StepIncremt->SetValue($this->StepIncremt->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @39-B5B7A19F
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->PositionTitle->SetValue($this->PositionTitle->GetValue(true));
        $this->DataSource->Department->SetValue($this->Department->GetValue(true));
        $this->DataSource->MonthlySalary->SetValue($this->MonthlySalary->GetValue(true));
        $this->DataSource->SalaryGrade->SetValue($this->SalaryGrade->GetValue(true));
        $this->DataSource->StatusOfAppt->SetValue($this->StatusOfAppt->GetValue(true));
        $this->DataSource->GovernmentService->SetValue($this->GovernmentService->GetValue(true));
        $this->DataSource->StepIncremt->SetValue($this->StepIncremt->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @39-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @39-069A102B
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

        $this->SalaryGrade->Prepare();
        $this->StatusOfAppt->Prepare();
        $this->GovernmentService->Prepare();
        $this->StepIncremt->Prepare();

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
                    $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
                    $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
                    $this->PositionTitle->SetValue($this->DataSource->PositionTitle->GetValue());
                    $this->Department->SetValue($this->DataSource->Department->GetValue());
                    $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
                    $this->SalaryGrade->SetValue($this->DataSource->SalaryGrade->GetValue());
                    $this->StatusOfAppt->SetValue($this->DataSource->StatusOfAppt->GetValue());
                    $this->GovernmentService->SetValue($this->DataSource->GovernmentService->GetValue());
                    $this->StepIncremt->SetValue($this->DataSource->StepIncremt->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionTitle->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Department->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MonthlySalary->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SalaryGrade->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StatusOfAppt->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GovernmentService->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepIncremt->Errors->ToString());
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
        $this->DateFrom->Show();
        $this->DatePicker_DateFrom->Show();
        $this->DateTo->Show();
        $this->DatePicker_DateTo->Show();
        $this->PositionTitle->Show();
        $this->Department->Show();
        $this->MonthlySalary->Show();
        $this->SalaryGrade->Show();
        $this->StatusOfAppt->Show();
        $this->GovernmentService->Show();
        $this->StepIncremt->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee_workexperience1 Class @39-FCB6E20C

class clsemployee_workexperience1DataSource extends clsDBConnection1 {  //employee_workexperience1DataSource Class @39-5BA56C61

//DataSource Variables @39-624D0E7C
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
    var $DateFrom;
    var $DateTo;
    var $PositionTitle;
    var $Department;
    var $MonthlySalary;
    var $SalaryGrade;
    var $StatusOfAppt;
    var $GovernmentService;
    var $StepIncremt;
//End DataSource Variables

//DataSourceClass_Initialize Event @39-7DC930A5
    function clsemployee_workexperience1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee_workexperience1/Error";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsDate, $this->DateFormat);
        
        $this->PositionTitle = new clsField("PositionTitle", ccsText, "");
        
        $this->Department = new clsField("Department", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->SalaryGrade = new clsField("SalaryGrade", ccsText, "");
        
        $this->StatusOfAppt = new clsField("StatusOfAppt", ccsText, "");
        
        $this->GovernmentService = new clsField("GovernmentService", ccsText, "");
        
        $this->StepIncremt = new clsField("StepIncremt", ccsText, "");
        

        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionTitle"] = array("Name" => "PositionTitle", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Department"] = array("Name" => "Department", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MonthlySalary"] = array("Name" => "MonthlySalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["SalaryGrade"] = array("Name" => "SalaryGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StatusOfAppt"] = array("Name" => "StatusOfAppt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["GovernmentService"] = array("Name" => "GovernmentService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepIncremt"] = array("Name" => "StepIncremt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionTitle"] = array("Name" => "PositionTitle", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Department"] = array("Name" => "Department", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MonthlySalary"] = array("Name" => "MonthlySalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["SalaryGrade"] = array("Name" => "SalaryGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StatusOfAppt"] = array("Name" => "StatusOfAppt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["GovernmentService"] = array("Name" => "GovernmentService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepIncremt"] = array("Name" => "StepIncremt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @39-26EEBB87
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlWorkExpID", ccsInteger, "", "", $this->Parameters["urlWorkExpID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "WorkExpID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @39-68CEBE32
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_workexperience {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @39-D523C18C
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue(trim($this->f("DateTo")));
        $this->PositionTitle->SetDBValue($this->f("PositionTitle"));
        $this->Department->SetDBValue($this->f("Department"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->SalaryGrade->SetDBValue($this->f("SalaryGrade"));
        $this->StatusOfAppt->SetDBValue($this->f("StatusOfAppt"));
        $this->GovernmentService->SetDBValue($this->f("GovernmentService"));
        $this->StepIncremt->SetDBValue($this->f("StepIncremt"));
    }
//End SetValues Method

//Insert Method @39-B593D7C0
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->InsertFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->InsertFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->InsertFields["PositionTitle"]["Value"] = $this->PositionTitle->GetDBValue(true);
        $this->InsertFields["Department"]["Value"] = $this->Department->GetDBValue(true);
        $this->InsertFields["MonthlySalary"]["Value"] = $this->MonthlySalary->GetDBValue(true);
        $this->InsertFields["SalaryGrade"]["Value"] = $this->SalaryGrade->GetDBValue(true);
        $this->InsertFields["StatusOfAppt"]["Value"] = $this->StatusOfAppt->GetDBValue(true);
        $this->InsertFields["GovernmentService"]["Value"] = $this->GovernmentService->GetDBValue(true);
        $this->InsertFields["StepIncremt"]["Value"] = $this->StepIncremt->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee_workexperience", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @39-3B112222
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->UpdateFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->UpdateFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->UpdateFields["PositionTitle"]["Value"] = $this->PositionTitle->GetDBValue(true);
        $this->UpdateFields["Department"]["Value"] = $this->Department->GetDBValue(true);
        $this->UpdateFields["MonthlySalary"]["Value"] = $this->MonthlySalary->GetDBValue(true);
        $this->UpdateFields["SalaryGrade"]["Value"] = $this->SalaryGrade->GetDBValue(true);
        $this->UpdateFields["StatusOfAppt"]["Value"] = $this->StatusOfAppt->GetDBValue(true);
        $this->UpdateFields["GovernmentService"]["Value"] = $this->GovernmentService->GetDBValue(true);
        $this->UpdateFields["StepIncremt"]["Value"] = $this->StepIncremt->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employee_workexperience", $this->UpdateFields, $this);
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

//Delete Method @39-34062CB6
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM employee_workexperience";
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

} //End employee_workexperience1DataSource Class @39-FCB6E20C

//Initialize Page @1-F63439BB
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
$TemplateFileName = "WorkExperience2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5E8EA550
CCSecurityRedirect("7;6", "");
//End Authenticate User

//Include events file @1-C0DD9475
include_once("./WorkExperience2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-8F07CE84
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_workexperience = & new clsGridemployee_workexperience("", $MainPage);
$employee_workexperience1 = & new clsRecordemployee_workexperience1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Employee.php";
$MainPage->employee_workexperience = & $employee_workexperience;
$MainPage->employee_workexperience1 = & $employee_workexperience1;
$MainPage->Link1 = & $Link1;
$employee_workexperience->Initialize();
$employee_workexperience1->Initialize();

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

//Execute Components @1-F8B859A6
$employee_workexperience1->Operation();
//End Execute Components

//Go to destination page @1-4FB24DB0
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_workexperience);
    unset($employee_workexperience1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-E46E362D
$employee_workexperience->Show();
$employee_workexperience1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-A285BE10
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_workexperience);
unset($employee_workexperience1);
unset($Tpl);
//End Unload Page


?>
