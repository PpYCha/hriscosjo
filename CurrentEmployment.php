<?php
//Include Common Files @1-3969C67B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "CurrentEmployment.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridemployee { //employee class @2-25A9BC51

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

//Class_Initialize Event @2-7278A204
    function clsGridemployee($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employee";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployeeDataSource($this);
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
        $this->EmployeeID->Page = "CurrentEmployment.php";
        $this->EmployeeIDNo = & new clsControl(ccsLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsLabel, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsLabel, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->NameExtension = & new clsControl(ccsLabel, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->BirthMonth = & new clsControl(ccsLabel, "BirthMonth", "BirthMonth", ccsText, "", CCGetRequestParam("BirthMonth", ccsGet, NULL), $this);
        $this->BirthDay = & new clsControl(ccsLabel, "BirthDay", "BirthDay", ccsText, "", CCGetRequestParam("BirthDay", ccsGet, NULL), $this);
        $this->BirthYear = & new clsControl(ccsLabel, "BirthYear", "BirthYear", ccsText, "", CCGetRequestParam("BirthYear", ccsGet, NULL), $this);
        $this->employee_Insert = & new clsControl(ccsLink, "employee_Insert", "employee_Insert", ccsText, "", CCGetRequestParam("employee_Insert", ccsGet, NULL), $this);
        $this->employee_Insert->Parameters = CCGetQueryString("QueryString", array("EmployeeID", "ccsForm"));
        $this->employee_Insert->Page = "CurrentEmployment.php";
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

//Show Method @2-9701CC62
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
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["BirthMonth"] = $this->BirthMonth->Visible;
            $this->ControlsVisible["BirthDay"] = $this->BirthDay->Visible;
            $this->ControlsVisible["BirthYear"] = $this->BirthYear->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                $this->EmployeeID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->EmployeeID->Parameters = CCAddParam($this->EmployeeID->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
                $this->Surname->SetValue($this->DataSource->Surname->GetValue());
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
                $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
                $this->BirthMonth->SetValue($this->DataSource->BirthMonth->GetValue());
                $this->BirthDay->SetValue($this->DataSource->BirthDay->GetValue());
                $this->BirthYear->SetValue($this->DataSource->BirthYear->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->EmployeeIDNo->Show();
                $this->Surname->Show();
                $this->FirstName->Show();
                $this->MiddleName->Show();
                $this->NameExtension->Show();
                $this->BirthMonth->Show();
                $this->BirthDay->Show();
                $this->BirthYear->Show();
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
        $this->employee_Insert->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-102DD620
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee Class @2-FCB6E20C

class clsemployeeDataSource extends clsDBConnection1 {  //employeeDataSource Class @2-3A1764EA

//DataSource Variables @2-63C041DC
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EmployeeID;
    var $EmployeeIDNo;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $NameExtension;
    var $BirthMonth;
    var $BirthDay;
    var $BirthYear;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-4E92FACD
    function clsemployeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employee";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->BirthMonth = new clsField("BirthMonth", ccsText, "");
        
        $this->BirthDay = new clsField("BirthDay", ccsText, "");
        
        $this->BirthYear = new clsField("BirthYear", ccsText, "");
        

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

//Open Method @2-AFE2057A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee";
        $this->SQL = "SELECT EmployeeID, EmployeeIDNo, Surname, FirstName, MiddleName, NameExtension, BirthMonth, BirthDay, BirthYear \n\n" .
        "FROM employee {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-1CBA3052
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->BirthMonth->SetDBValue($this->f("BirthMonth"));
        $this->BirthDay->SetDBValue($this->f("BirthDay"));
        $this->BirthYear->SetDBValue($this->f("BirthYear"));
    }
//End SetValues Method

} //End employeeDataSource Class @2-FCB6E20C

class clsRecordemployee1 { //employee1 Class @33-BD315ADE

//Variables @33-D6FF3E86

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

//Class_Initialize Event @33-A66674CE
    function clsRecordemployee1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee1/Error";
        $this->DataSource = new clsemployee1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee1";
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
            $this->Position = & new clsControl(ccsTextBox, "Position", "Position", ccsText, "", CCGetRequestParam("Position", $Method, NULL), $this);
            $this->ItemNo = & new clsControl(ccsTextBox, "ItemNo", "Item No", ccsText, "", CCGetRequestParam("ItemNo", $Method, NULL), $this);
            $this->EffectiveMonth = & new clsControl(ccsListBox, "EffectiveMonth", "Effective Month", ccsText, "", CCGetRequestParam("EffectiveMonth", $Method, NULL), $this);
            $this->EffectiveMonth->DSType = dsTable;
            $this->EffectiveMonth->DataSource = new clsDBConnection1();
            $this->EffectiveMonth->ds = & $this->EffectiveMonth->DataSource;
            $this->EffectiveMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->EffectiveMonth->BoundColumn, $this->EffectiveMonth->TextColumn, $this->EffectiveMonth->DBFormat) = array("Month", "Month", "");
            $this->SalaryGrade = & new clsControl(ccsListBox, "SalaryGrade", "Salary Grade", ccsText, "", CCGetRequestParam("SalaryGrade", $Method, NULL), $this);
            $this->SalaryGrade->DSType = dsTable;
            $this->SalaryGrade->DataSource = new clsDBConnection1();
            $this->SalaryGrade->ds = & $this->SalaryGrade->DataSource;
            $this->SalaryGrade->DataSource->SQL = "SELECT * \n" .
"FROM lut_salarygrade {SQL_Where} {SQL_OrderBy}";
            list($this->SalaryGrade->BoundColumn, $this->SalaryGrade->TextColumn, $this->SalaryGrade->DBFormat) = array("SalaryGrade", "SalaryGrade", "");
            $this->MonthlySalary = & new clsControl(ccsTextBox, "MonthlySalary", "Monthly Salary", ccsSingle, "", CCGetRequestParam("MonthlySalary", $Method, NULL), $this);
            $this->StatAppt = & new clsControl(ccsListBox, "StatAppt", "Stat Appt", ccsText, "", CCGetRequestParam("StatAppt", $Method, NULL), $this);
            $this->StatAppt->DSType = dsTable;
            $this->StatAppt->DataSource = new clsDBConnection1();
            $this->StatAppt->ds = & $this->StatAppt->DataSource;
            $this->StatAppt->DataSource->SQL = "SELECT * \n" .
"FROM lut_statofappt {SQL_Where} {SQL_OrderBy}";
            list($this->StatAppt->BoundColumn, $this->StatAppt->TextColumn, $this->StatAppt->DBFormat) = array("StatAppt", "StatAppt", "");
            $this->OfficeID = & new clsControl(ccsListBox, "OfficeID", "Office ID", ccsInteger, "", CCGetRequestParam("OfficeID", $Method, NULL), $this);
            $this->OfficeID->DSType = dsTable;
            $this->OfficeID->DataSource = new clsDBConnection1();
            $this->OfficeID->ds = & $this->OfficeID->DataSource;
            $this->OfficeID->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            list($this->OfficeID->BoundColumn, $this->OfficeID->TextColumn, $this->OfficeID->DBFormat) = array("OfficeID", "NameOfficeDept", "");
            $this->OrigApptMonth = & new clsControl(ccsListBox, "OrigApptMonth", "Orig Appt Month", ccsText, "", CCGetRequestParam("OrigApptMonth", $Method, NULL), $this);
            $this->OrigApptMonth->DSType = dsTable;
            $this->OrigApptMonth->DataSource = new clsDBConnection1();
            $this->OrigApptMonth->ds = & $this->OrigApptMonth->DataSource;
            $this->OrigApptMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->OrigApptMonth->BoundColumn, $this->OrigApptMonth->TextColumn, $this->OrigApptMonth->DBFormat) = array("Month", "Month", "");
            $this->PromotedMonth = & new clsControl(ccsListBox, "PromotedMonth", "Promoted Month", ccsText, "", CCGetRequestParam("PromotedMonth", $Method, NULL), $this);
            $this->PromotedMonth->DSType = dsTable;
            $this->PromotedMonth->DataSource = new clsDBConnection1();
            $this->PromotedMonth->ds = & $this->PromotedMonth->DataSource;
            $this->PromotedMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->PromotedMonth->BoundColumn, $this->PromotedMonth->TextColumn, $this->PromotedMonth->DBFormat) = array("Month", "Month", "");
            $this->StepInc1Month = & new clsControl(ccsListBox, "StepInc1Month", "Step Inc1 Month", ccsText, "", CCGetRequestParam("StepInc1Month", $Method, NULL), $this);
            $this->StepInc1Month->DSType = dsTable;
            $this->StepInc1Month->DataSource = new clsDBConnection1();
            $this->StepInc1Month->ds = & $this->StepInc1Month->DataSource;
            $this->StepInc1Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc1Month->BoundColumn, $this->StepInc1Month->TextColumn, $this->StepInc1Month->DBFormat) = array("Month", "Month", "");
            $this->StepInc2Month = & new clsControl(ccsListBox, "StepInc2Month", "Step Inc2 Month", ccsText, "", CCGetRequestParam("StepInc2Month", $Method, NULL), $this);
            $this->StepInc2Month->DSType = dsTable;
            $this->StepInc2Month->DataSource = new clsDBConnection1();
            $this->StepInc2Month->ds = & $this->StepInc2Month->DataSource;
            $this->StepInc2Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc2Month->BoundColumn, $this->StepInc2Month->TextColumn, $this->StepInc2Month->DBFormat) = array("Month", "Month", "");
            $this->StepInc3Month = & new clsControl(ccsListBox, "StepInc3Month", "Step Inc3 Month", ccsText, "", CCGetRequestParam("StepInc3Month", $Method, NULL), $this);
            $this->StepInc3Month->DSType = dsTable;
            $this->StepInc3Month->DataSource = new clsDBConnection1();
            $this->StepInc3Month->ds = & $this->StepInc3Month->DataSource;
            $this->StepInc3Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc3Month->BoundColumn, $this->StepInc3Month->TextColumn, $this->StepInc3Month->DBFormat) = array("Month", "Month", "");
            $this->StepInc4Month = & new clsControl(ccsListBox, "StepInc4Month", "Step Inc4 Month", ccsText, "", CCGetRequestParam("StepInc4Month", $Method, NULL), $this);
            $this->StepInc4Month->DSType = dsTable;
            $this->StepInc4Month->DataSource = new clsDBConnection1();
            $this->StepInc4Month->ds = & $this->StepInc4Month->DataSource;
            $this->StepInc4Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc4Month->BoundColumn, $this->StepInc4Month->TextColumn, $this->StepInc4Month->DBFormat) = array("Month", "Month", "");
            $this->StepInc5Month = & new clsControl(ccsListBox, "StepInc5Month", "Step Inc5 Month", ccsText, "", CCGetRequestParam("StepInc5Month", $Method, NULL), $this);
            $this->StepInc5Month->DSType = dsTable;
            $this->StepInc5Month->DataSource = new clsDBConnection1();
            $this->StepInc5Month->ds = & $this->StepInc5Month->DataSource;
            $this->StepInc5Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc5Month->BoundColumn, $this->StepInc5Month->TextColumn, $this->StepInc5Month->DBFormat) = array("Month", "Month", "");
            $this->StepInc6Month = & new clsControl(ccsListBox, "StepInc6Month", "Step Inc6 Month", ccsText, "", CCGetRequestParam("StepInc6Month", $Method, NULL), $this);
            $this->StepInc6Month->DSType = dsTable;
            $this->StepInc6Month->DataSource = new clsDBConnection1();
            $this->StepInc6Month->ds = & $this->StepInc6Month->DataSource;
            $this->StepInc6Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc6Month->BoundColumn, $this->StepInc6Month->TextColumn, $this->StepInc6Month->DBFormat) = array("Month", "Month", "");
            $this->StepInc7Month = & new clsControl(ccsListBox, "StepInc7Month", "Step Inc7 Month", ccsText, "", CCGetRequestParam("StepInc7Month", $Method, NULL), $this);
            $this->StepInc7Month->DSType = dsTable;
            $this->StepInc7Month->DataSource = new clsDBConnection1();
            $this->StepInc7Month->ds = & $this->StepInc7Month->DataSource;
            $this->StepInc7Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc7Month->BoundColumn, $this->StepInc7Month->TextColumn, $this->StepInc7Month->DBFormat) = array("Month", "Month", "");
            $this->StepInc8Month = & new clsControl(ccsListBox, "StepInc8Month", "Step Inc8 Month", ccsText, "", CCGetRequestParam("StepInc8Month", $Method, NULL), $this);
            $this->StepInc8Month->DSType = dsTable;
            $this->StepInc8Month->DataSource = new clsDBConnection1();
            $this->StepInc8Month->ds = & $this->StepInc8Month->DataSource;
            $this->StepInc8Month->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc8Month->BoundColumn, $this->StepInc8Month->TextColumn, $this->StepInc8Month->DBFormat) = array("Month", "Month", "");
            $this->CompRetireMonth = & new clsControl(ccsListBox, "CompRetireMonth", "Comp Retire Month", ccsText, "", CCGetRequestParam("CompRetireMonth", $Method, NULL), $this);
            $this->CompRetireMonth->DSType = dsTable;
            $this->CompRetireMonth->DataSource = new clsDBConnection1();
            $this->CompRetireMonth->ds = & $this->CompRetireMonth->DataSource;
            $this->CompRetireMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->CompRetireMonth->BoundColumn, $this->CompRetireMonth->TextColumn, $this->CompRetireMonth->DBFormat) = array("Month", "Month", "");
            $this->SeparationMonth = & new clsControl(ccsListBox, "SeparationMonth", "Separation Month", ccsText, "", CCGetRequestParam("SeparationMonth", $Method, NULL), $this);
            $this->SeparationMonth->DSType = dsTable;
            $this->SeparationMonth->DataSource = new clsDBConnection1();
            $this->SeparationMonth->ds = & $this->SeparationMonth->DataSource;
            $this->SeparationMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->SeparationMonth->BoundColumn, $this->SeparationMonth->TextColumn, $this->SeparationMonth->DBFormat) = array("Month", "Month", "");
            $this->NosaMonth = & new clsControl(ccsListBox, "NosaMonth", "Nosa Month", ccsText, "", CCGetRequestParam("NosaMonth", $Method, NULL), $this);
            $this->NosaMonth->DSType = dsTable;
            $this->NosaMonth->DataSource = new clsDBConnection1();
            $this->NosaMonth->ds = & $this->NosaMonth->DataSource;
            $this->NosaMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->NosaMonth->BoundColumn, $this->NosaMonth->TextColumn, $this->NosaMonth->DBFormat) = array("Month", "Month", "");
            $this->NosaSalGrade = & new clsControl(ccsListBox, "NosaSalGrade", "Nosa Sal Grade", ccsText, "", CCGetRequestParam("NosaSalGrade", $Method, NULL), $this);
            $this->NosaSalGrade->DSType = dsTable;
            $this->NosaSalGrade->DataSource = new clsDBConnection1();
            $this->NosaSalGrade->ds = & $this->NosaSalGrade->DataSource;
            $this->NosaSalGrade->DataSource->SQL = "SELECT * \n" .
"FROM lut_salarygrade {SQL_Where} {SQL_OrderBy}";
            list($this->NosaSalGrade->BoundColumn, $this->NosaSalGrade->TextColumn, $this->NosaSalGrade->DBFormat) = array("SalaryGrade", "SalaryGrade", "");
            $this->NosaSalary = & new clsControl(ccsTextBox, "NosaSalary", "Nosa Salary", ccsSingle, "", CCGetRequestParam("NosaSalary", $Method, NULL), $this);
            $this->NosaTotal = & new clsControl(ccsTextBox, "NosaTotal", "Nosa Total", ccsSingle, "", CCGetRequestParam("NosaTotal", $Method, NULL), $this);
            $this->NosiMonth = & new clsControl(ccsListBox, "NosiMonth", "Nosi Month", ccsText, "", CCGetRequestParam("NosiMonth", $Method, NULL), $this);
            $this->NosiMonth->DSType = dsTable;
            $this->NosiMonth->DataSource = new clsDBConnection1();
            $this->NosiMonth->ds = & $this->NosiMonth->DataSource;
            $this->NosiMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->NosiMonth->BoundColumn, $this->NosiMonth->TextColumn, $this->NosiMonth->DBFormat) = array("Month", "Month", "");
            $this->NosiSalGrade = & new clsControl(ccsListBox, "NosiSalGrade", "Nosi Sal Grade", ccsText, "", CCGetRequestParam("NosiSalGrade", $Method, NULL), $this);
            $this->NosiSalGrade->DSType = dsTable;
            $this->NosiSalGrade->DataSource = new clsDBConnection1();
            $this->NosiSalGrade->ds = & $this->NosiSalGrade->DataSource;
            $this->NosiSalGrade->DataSource->SQL = "SELECT * \n" .
"FROM lut_salarygrade {SQL_Where} {SQL_OrderBy}";
            list($this->NosiSalGrade->BoundColumn, $this->NosiSalGrade->TextColumn, $this->NosiSalGrade->DBFormat) = array("SalaryGrade", "SalaryGrade", "");
            $this->NosiSalary = & new clsControl(ccsTextBox, "NosiSalary", "Nosi Salary", ccsSingle, "", CCGetRequestParam("NosiSalary", $Method, NULL), $this);
            $this->NosiTotal = & new clsControl(ccsTextBox, "NosiTotal", "Nosi Total", ccsSingle, "", CCGetRequestParam("NosiTotal", $Method, NULL), $this);
            $this->EffectiveDay = & new clsControl(ccsListBox, "EffectiveDay", "Effective Day", ccsText, "", CCGetRequestParam("EffectiveDay", $Method, NULL), $this);
            $this->EffectiveDay->DSType = dsTable;
            $this->EffectiveDay->DataSource = new clsDBConnection1();
            $this->EffectiveDay->ds = & $this->EffectiveDay->DataSource;
            $this->EffectiveDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->EffectiveDay->BoundColumn, $this->EffectiveDay->TextColumn, $this->EffectiveDay->DBFormat) = array("Day", "Day", "");
            $this->EffectiveYear = & new clsControl(ccsTextBox, "EffectiveYear", "Effective Year", ccsText, "", CCGetRequestParam("EffectiveYear", $Method, NULL), $this);
            $this->OrigApptDay = & new clsControl(ccsListBox, "OrigApptDay", "Orig Appt Day", ccsText, "", CCGetRequestParam("OrigApptDay", $Method, NULL), $this);
            $this->OrigApptDay->DSType = dsTable;
            $this->OrigApptDay->DataSource = new clsDBConnection1();
            $this->OrigApptDay->ds = & $this->OrigApptDay->DataSource;
            $this->OrigApptDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->OrigApptDay->BoundColumn, $this->OrigApptDay->TextColumn, $this->OrigApptDay->DBFormat) = array("Day", "Day", "");
            $this->OrigApptYear = & new clsControl(ccsTextBox, "OrigApptYear", "Orig Appt Year", ccsText, "", CCGetRequestParam("OrigApptYear", $Method, NULL), $this);
            $this->PromotedDay = & new clsControl(ccsListBox, "PromotedDay", "Promoted Day", ccsText, "", CCGetRequestParam("PromotedDay", $Method, NULL), $this);
            $this->PromotedDay->DSType = dsTable;
            $this->PromotedDay->DataSource = new clsDBConnection1();
            $this->PromotedDay->ds = & $this->PromotedDay->DataSource;
            $this->PromotedDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->PromotedDay->BoundColumn, $this->PromotedDay->TextColumn, $this->PromotedDay->DBFormat) = array("Day", "Day", "");
            $this->PromotedYear = & new clsControl(ccsTextBox, "PromotedYear", "Promoted Year", ccsText, "", CCGetRequestParam("PromotedYear", $Method, NULL), $this);
            $this->StepInc1Day = & new clsControl(ccsListBox, "StepInc1Day", "Step Inc1 Day", ccsText, "", CCGetRequestParam("StepInc1Day", $Method, NULL), $this);
            $this->StepInc1Day->DSType = dsTable;
            $this->StepInc1Day->DataSource = new clsDBConnection1();
            $this->StepInc1Day->ds = & $this->StepInc1Day->DataSource;
            $this->StepInc1Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc1Day->BoundColumn, $this->StepInc1Day->TextColumn, $this->StepInc1Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc1Year = & new clsControl(ccsTextBox, "StepInc1Year", "Step Inc1 Year", ccsText, "", CCGetRequestParam("StepInc1Year", $Method, NULL), $this);
            $this->StepInc2Day = & new clsControl(ccsListBox, "StepInc2Day", "Step Inc2 Day", ccsText, "", CCGetRequestParam("StepInc2Day", $Method, NULL), $this);
            $this->StepInc2Day->DSType = dsTable;
            $this->StepInc2Day->DataSource = new clsDBConnection1();
            $this->StepInc2Day->ds = & $this->StepInc2Day->DataSource;
            $this->StepInc2Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc2Day->BoundColumn, $this->StepInc2Day->TextColumn, $this->StepInc2Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc2Year = & new clsControl(ccsTextBox, "StepInc2Year", "Step Inc2 Year", ccsText, "", CCGetRequestParam("StepInc2Year", $Method, NULL), $this);
            $this->StepInc3Day = & new clsControl(ccsListBox, "StepInc3Day", "Step Inc3 Day", ccsText, "", CCGetRequestParam("StepInc3Day", $Method, NULL), $this);
            $this->StepInc3Day->DSType = dsTable;
            $this->StepInc3Day->DataSource = new clsDBConnection1();
            $this->StepInc3Day->ds = & $this->StepInc3Day->DataSource;
            $this->StepInc3Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc3Day->BoundColumn, $this->StepInc3Day->TextColumn, $this->StepInc3Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc3Year = & new clsControl(ccsTextBox, "StepInc3Year", "Step Inc3 Year", ccsText, "", CCGetRequestParam("StepInc3Year", $Method, NULL), $this);
            $this->StepInc4Day = & new clsControl(ccsListBox, "StepInc4Day", "Step Inc4 Day", ccsText, "", CCGetRequestParam("StepInc4Day", $Method, NULL), $this);
            $this->StepInc4Day->DSType = dsTable;
            $this->StepInc4Day->DataSource = new clsDBConnection1();
            $this->StepInc4Day->ds = & $this->StepInc4Day->DataSource;
            $this->StepInc4Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc4Day->BoundColumn, $this->StepInc4Day->TextColumn, $this->StepInc4Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc4Year = & new clsControl(ccsTextBox, "StepInc4Year", "Step Inc4 Year", ccsText, "", CCGetRequestParam("StepInc4Year", $Method, NULL), $this);
            $this->StepInc5Day = & new clsControl(ccsListBox, "StepInc5Day", "Step Inc5 Day", ccsText, "", CCGetRequestParam("StepInc5Day", $Method, NULL), $this);
            $this->StepInc5Day->DSType = dsTable;
            $this->StepInc5Day->DataSource = new clsDBConnection1();
            $this->StepInc5Day->ds = & $this->StepInc5Day->DataSource;
            $this->StepInc5Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc5Day->BoundColumn, $this->StepInc5Day->TextColumn, $this->StepInc5Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc5Year = & new clsControl(ccsTextBox, "StepInc5Year", "Step Inc5 Year", ccsText, "", CCGetRequestParam("StepInc5Year", $Method, NULL), $this);
            $this->StepInc6Day = & new clsControl(ccsListBox, "StepInc6Day", "Step Inc6 Day", ccsText, "", CCGetRequestParam("StepInc6Day", $Method, NULL), $this);
            $this->StepInc6Day->DSType = dsTable;
            $this->StepInc6Day->DataSource = new clsDBConnection1();
            $this->StepInc6Day->ds = & $this->StepInc6Day->DataSource;
            $this->StepInc6Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc6Day->BoundColumn, $this->StepInc6Day->TextColumn, $this->StepInc6Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc6Year = & new clsControl(ccsTextBox, "StepInc6Year", "Step Inc6 Year", ccsText, "", CCGetRequestParam("StepInc6Year", $Method, NULL), $this);
            $this->StepInc7Day = & new clsControl(ccsListBox, "StepInc7Day", "Step Inc7 Day", ccsText, "", CCGetRequestParam("StepInc7Day", $Method, NULL), $this);
            $this->StepInc7Day->DSType = dsTable;
            $this->StepInc7Day->DataSource = new clsDBConnection1();
            $this->StepInc7Day->ds = & $this->StepInc7Day->DataSource;
            $this->StepInc7Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc7Day->BoundColumn, $this->StepInc7Day->TextColumn, $this->StepInc7Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc7Year = & new clsControl(ccsTextBox, "StepInc7Year", "Step Inc7 Year", ccsText, "", CCGetRequestParam("StepInc7Year", $Method, NULL), $this);
            $this->StepInc8Day = & new clsControl(ccsListBox, "StepInc8Day", "Step Inc8 Day", ccsText, "", CCGetRequestParam("StepInc8Day", $Method, NULL), $this);
            $this->StepInc8Day->DSType = dsTable;
            $this->StepInc8Day->DataSource = new clsDBConnection1();
            $this->StepInc8Day->ds = & $this->StepInc8Day->DataSource;
            $this->StepInc8Day->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->StepInc8Day->BoundColumn, $this->StepInc8Day->TextColumn, $this->StepInc8Day->DBFormat) = array("Day", "Day", "");
            $this->StepInc8Year = & new clsControl(ccsTextBox, "StepInc8Year", "Step Inc8 Year", ccsText, "", CCGetRequestParam("StepInc8Year", $Method, NULL), $this);
            $this->CompRetireDay = & new clsControl(ccsListBox, "CompRetireDay", "Comp Retire Day", ccsText, "", CCGetRequestParam("CompRetireDay", $Method, NULL), $this);
            $this->CompRetireDay->DSType = dsTable;
            $this->CompRetireDay->DataSource = new clsDBConnection1();
            $this->CompRetireDay->ds = & $this->CompRetireDay->DataSource;
            $this->CompRetireDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->CompRetireDay->BoundColumn, $this->CompRetireDay->TextColumn, $this->CompRetireDay->DBFormat) = array("Day", "Day", "");
            $this->CompRetireYear = & new clsControl(ccsTextBox, "CompRetireYear", "Comp Retire Year", ccsText, "", CCGetRequestParam("CompRetireYear", $Method, NULL), $this);
            $this->SeparationDay = & new clsControl(ccsListBox, "SeparationDay", "Separation Day", ccsText, "", CCGetRequestParam("SeparationDay", $Method, NULL), $this);
            $this->SeparationDay->DSType = dsTable;
            $this->SeparationDay->DataSource = new clsDBConnection1();
            $this->SeparationDay->ds = & $this->SeparationDay->DataSource;
            $this->SeparationDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->SeparationDay->BoundColumn, $this->SeparationDay->TextColumn, $this->SeparationDay->DBFormat) = array("Day", "Day", "");
            $this->SeparationYear = & new clsControl(ccsTextBox, "SeparationYear", "Separation Year", ccsText, "", CCGetRequestParam("SeparationYear", $Method, NULL), $this);
            $this->NosaDay = & new clsControl(ccsListBox, "NosaDay", "Nosa Day", ccsText, "", CCGetRequestParam("NosaDay", $Method, NULL), $this);
            $this->NosaDay->DSType = dsTable;
            $this->NosaDay->DataSource = new clsDBConnection1();
            $this->NosaDay->ds = & $this->NosaDay->DataSource;
            $this->NosaDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->NosaDay->BoundColumn, $this->NosaDay->TextColumn, $this->NosaDay->DBFormat) = array("Day", "Day", "");
            $this->NosaYear = & new clsControl(ccsTextBox, "NosaYear", "Nosa Year", ccsText, "", CCGetRequestParam("NosaYear", $Method, NULL), $this);
            $this->NosaStepInc = & new clsControl(ccsListBox, "NosaStepInc", "Nosa Step Inc", ccsText, "", CCGetRequestParam("NosaStepInc", $Method, NULL), $this);
            $this->NosaStepInc->DSType = dsTable;
            $this->NosaStepInc->DataSource = new clsDBConnection1();
            $this->NosaStepInc->ds = & $this->NosaStepInc->DataSource;
            $this->NosaStepInc->DataSource->SQL = "SELECT * \n" .
"FROM lut_stepincrement {SQL_Where} {SQL_OrderBy}";
            list($this->NosaStepInc->BoundColumn, $this->NosaStepInc->TextColumn, $this->NosaStepInc->DBFormat) = array("StepIncrement", "StepIncrement", "");
            $this->NosiDay = & new clsControl(ccsListBox, "NosiDay", "Nosi Day", ccsText, "", CCGetRequestParam("NosiDay", $Method, NULL), $this);
            $this->NosiDay->DSType = dsTable;
            $this->NosiDay->DataSource = new clsDBConnection1();
            $this->NosiDay->ds = & $this->NosiDay->DataSource;
            $this->NosiDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->NosiDay->BoundColumn, $this->NosiDay->TextColumn, $this->NosiDay->DBFormat) = array("Day", "Day", "");
            $this->NosiYear = & new clsControl(ccsTextBox, "NosiYear", "Nosi Year", ccsText, "", CCGetRequestParam("NosiYear", $Method, NULL), $this);
            $this->NosiStepInc = & new clsControl(ccsListBox, "NosiStepInc", "Nosi Step Inc", ccsText, "", CCGetRequestParam("NosiStepInc", $Method, NULL), $this);
            $this->NosiStepInc->DSType = dsTable;
            $this->NosiStepInc->DataSource = new clsDBConnection1();
            $this->NosiStepInc->ds = & $this->NosiStepInc->DataSource;
            $this->NosiStepInc->DataSource->SQL = "SELECT * \n" .
"FROM lut_stepincrement {SQL_Where} {SQL_OrderBy}";
            list($this->NosiStepInc->BoundColumn, $this->NosiStepInc->TextColumn, $this->NosiStepInc->DBFormat) = array("StepIncrement", "StepIncrement", "");
            $this->StepIncrement = & new clsControl(ccsListBox, "StepIncrement", "Step Increment", ccsText, "", CCGetRequestParam("StepIncrement", $Method, NULL), $this);
            $this->StepIncrement->DSType = dsTable;
            $this->StepIncrement->DataSource = new clsDBConnection1();
            $this->StepIncrement->ds = & $this->StepIncrement->DataSource;
            $this->StepIncrement->DataSource->SQL = "SELECT * \n" .
"FROM lut_stepincrement {SQL_Where} {SQL_OrderBy}";
            list($this->StepIncrement->BoundColumn, $this->StepIncrement->TextColumn, $this->StepIncrement->DBFormat) = array("StepIncrement", "StepIncrement", "");
        }
    }
//End Class_Initialize Event

//Initialize Method @33-AAA85980
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
    }
//End Initialize Method

//Validate Method @33-86EDCFA1
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Position->Validate() && $Validation);
        $Validation = ($this->ItemNo->Validate() && $Validation);
        $Validation = ($this->EffectiveMonth->Validate() && $Validation);
        $Validation = ($this->SalaryGrade->Validate() && $Validation);
        $Validation = ($this->MonthlySalary->Validate() && $Validation);
        $Validation = ($this->StatAppt->Validate() && $Validation);
        $Validation = ($this->OfficeID->Validate() && $Validation);
        $Validation = ($this->OrigApptMonth->Validate() && $Validation);
        $Validation = ($this->PromotedMonth->Validate() && $Validation);
        $Validation = ($this->StepInc1Month->Validate() && $Validation);
        $Validation = ($this->StepInc2Month->Validate() && $Validation);
        $Validation = ($this->StepInc3Month->Validate() && $Validation);
        $Validation = ($this->StepInc4Month->Validate() && $Validation);
        $Validation = ($this->StepInc5Month->Validate() && $Validation);
        $Validation = ($this->StepInc6Month->Validate() && $Validation);
        $Validation = ($this->StepInc7Month->Validate() && $Validation);
        $Validation = ($this->StepInc8Month->Validate() && $Validation);
        $Validation = ($this->CompRetireMonth->Validate() && $Validation);
        $Validation = ($this->SeparationMonth->Validate() && $Validation);
        $Validation = ($this->NosaMonth->Validate() && $Validation);
        $Validation = ($this->NosaSalGrade->Validate() && $Validation);
        $Validation = ($this->NosaSalary->Validate() && $Validation);
        $Validation = ($this->NosaTotal->Validate() && $Validation);
        $Validation = ($this->NosiMonth->Validate() && $Validation);
        $Validation = ($this->NosiSalGrade->Validate() && $Validation);
        $Validation = ($this->NosiSalary->Validate() && $Validation);
        $Validation = ($this->NosiTotal->Validate() && $Validation);
        $Validation = ($this->EffectiveDay->Validate() && $Validation);
        $Validation = ($this->EffectiveYear->Validate() && $Validation);
        $Validation = ($this->OrigApptDay->Validate() && $Validation);
        $Validation = ($this->OrigApptYear->Validate() && $Validation);
        $Validation = ($this->PromotedDay->Validate() && $Validation);
        $Validation = ($this->PromotedYear->Validate() && $Validation);
        $Validation = ($this->StepInc1Day->Validate() && $Validation);
        $Validation = ($this->StepInc1Year->Validate() && $Validation);
        $Validation = ($this->StepInc2Day->Validate() && $Validation);
        $Validation = ($this->StepInc2Year->Validate() && $Validation);
        $Validation = ($this->StepInc3Day->Validate() && $Validation);
        $Validation = ($this->StepInc3Year->Validate() && $Validation);
        $Validation = ($this->StepInc4Day->Validate() && $Validation);
        $Validation = ($this->StepInc4Year->Validate() && $Validation);
        $Validation = ($this->StepInc5Day->Validate() && $Validation);
        $Validation = ($this->StepInc5Year->Validate() && $Validation);
        $Validation = ($this->StepInc6Day->Validate() && $Validation);
        $Validation = ($this->StepInc6Year->Validate() && $Validation);
        $Validation = ($this->StepInc7Day->Validate() && $Validation);
        $Validation = ($this->StepInc7Year->Validate() && $Validation);
        $Validation = ($this->StepInc8Day->Validate() && $Validation);
        $Validation = ($this->StepInc8Year->Validate() && $Validation);
        $Validation = ($this->CompRetireDay->Validate() && $Validation);
        $Validation = ($this->CompRetireYear->Validate() && $Validation);
        $Validation = ($this->SeparationDay->Validate() && $Validation);
        $Validation = ($this->SeparationYear->Validate() && $Validation);
        $Validation = ($this->NosaDay->Validate() && $Validation);
        $Validation = ($this->NosaYear->Validate() && $Validation);
        $Validation = ($this->NosaStepInc->Validate() && $Validation);
        $Validation = ($this->NosiDay->Validate() && $Validation);
        $Validation = ($this->NosiYear->Validate() && $Validation);
        $Validation = ($this->NosiStepInc->Validate() && $Validation);
        $Validation = ($this->StepIncrement->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ItemNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EffectiveMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SalaryGrade->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MonthlySalary->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StatAppt->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OfficeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OrigApptMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PromotedMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc1Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc2Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc3Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc4Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc5Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc6Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc7Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc8Month->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CompRetireMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeparationMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosaMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosaSalGrade->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosaSalary->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosaTotal->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosiMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosiSalGrade->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosiSalary->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosiTotal->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EffectiveDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EffectiveYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OrigApptDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OrigApptYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PromotedDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PromotedYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc1Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc1Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc2Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc2Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc3Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc3Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc4Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc4Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc5Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc5Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc6Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc6Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc7Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc7Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc8Day->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepInc8Year->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CompRetireDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CompRetireYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeparationDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeparationYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosaDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosaYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosaStepInc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosiDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosiYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NosiStepInc->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StepIncrement->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @33-ED630C76
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->ItemNo->Errors->Count());
        $errors = ($errors || $this->EffectiveMonth->Errors->Count());
        $errors = ($errors || $this->SalaryGrade->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->StatAppt->Errors->Count());
        $errors = ($errors || $this->OfficeID->Errors->Count());
        $errors = ($errors || $this->OrigApptMonth->Errors->Count());
        $errors = ($errors || $this->PromotedMonth->Errors->Count());
        $errors = ($errors || $this->StepInc1Month->Errors->Count());
        $errors = ($errors || $this->StepInc2Month->Errors->Count());
        $errors = ($errors || $this->StepInc3Month->Errors->Count());
        $errors = ($errors || $this->StepInc4Month->Errors->Count());
        $errors = ($errors || $this->StepInc5Month->Errors->Count());
        $errors = ($errors || $this->StepInc6Month->Errors->Count());
        $errors = ($errors || $this->StepInc7Month->Errors->Count());
        $errors = ($errors || $this->StepInc8Month->Errors->Count());
        $errors = ($errors || $this->CompRetireMonth->Errors->Count());
        $errors = ($errors || $this->SeparationMonth->Errors->Count());
        $errors = ($errors || $this->NosaMonth->Errors->Count());
        $errors = ($errors || $this->NosaSalGrade->Errors->Count());
        $errors = ($errors || $this->NosaSalary->Errors->Count());
        $errors = ($errors || $this->NosaTotal->Errors->Count());
        $errors = ($errors || $this->NosiMonth->Errors->Count());
        $errors = ($errors || $this->NosiSalGrade->Errors->Count());
        $errors = ($errors || $this->NosiSalary->Errors->Count());
        $errors = ($errors || $this->NosiTotal->Errors->Count());
        $errors = ($errors || $this->EffectiveDay->Errors->Count());
        $errors = ($errors || $this->EffectiveYear->Errors->Count());
        $errors = ($errors || $this->OrigApptDay->Errors->Count());
        $errors = ($errors || $this->OrigApptYear->Errors->Count());
        $errors = ($errors || $this->PromotedDay->Errors->Count());
        $errors = ($errors || $this->PromotedYear->Errors->Count());
        $errors = ($errors || $this->StepInc1Day->Errors->Count());
        $errors = ($errors || $this->StepInc1Year->Errors->Count());
        $errors = ($errors || $this->StepInc2Day->Errors->Count());
        $errors = ($errors || $this->StepInc2Year->Errors->Count());
        $errors = ($errors || $this->StepInc3Day->Errors->Count());
        $errors = ($errors || $this->StepInc3Year->Errors->Count());
        $errors = ($errors || $this->StepInc4Day->Errors->Count());
        $errors = ($errors || $this->StepInc4Year->Errors->Count());
        $errors = ($errors || $this->StepInc5Day->Errors->Count());
        $errors = ($errors || $this->StepInc5Year->Errors->Count());
        $errors = ($errors || $this->StepInc6Day->Errors->Count());
        $errors = ($errors || $this->StepInc6Year->Errors->Count());
        $errors = ($errors || $this->StepInc7Day->Errors->Count());
        $errors = ($errors || $this->StepInc7Year->Errors->Count());
        $errors = ($errors || $this->StepInc8Day->Errors->Count());
        $errors = ($errors || $this->StepInc8Year->Errors->Count());
        $errors = ($errors || $this->CompRetireDay->Errors->Count());
        $errors = ($errors || $this->CompRetireYear->Errors->Count());
        $errors = ($errors || $this->SeparationDay->Errors->Count());
        $errors = ($errors || $this->SeparationYear->Errors->Count());
        $errors = ($errors || $this->NosaDay->Errors->Count());
        $errors = ($errors || $this->NosaYear->Errors->Count());
        $errors = ($errors || $this->NosaStepInc->Errors->Count());
        $errors = ($errors || $this->NosiDay->Errors->Count());
        $errors = ($errors || $this->NosiYear->Errors->Count());
        $errors = ($errors || $this->NosiStepInc->Errors->Count());
        $errors = ($errors || $this->StepIncrement->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @33-ED598703
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

//Operation Method @33-288F0419
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

//InsertRow Method @33-DDB22200
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Position->SetValue($this->Position->GetValue(true));
        $this->DataSource->ItemNo->SetValue($this->ItemNo->GetValue(true));
        $this->DataSource->EffectiveMonth->SetValue($this->EffectiveMonth->GetValue(true));
        $this->DataSource->SalaryGrade->SetValue($this->SalaryGrade->GetValue(true));
        $this->DataSource->MonthlySalary->SetValue($this->MonthlySalary->GetValue(true));
        $this->DataSource->StatAppt->SetValue($this->StatAppt->GetValue(true));
        $this->DataSource->OfficeID->SetValue($this->OfficeID->GetValue(true));
        $this->DataSource->OrigApptMonth->SetValue($this->OrigApptMonth->GetValue(true));
        $this->DataSource->PromotedMonth->SetValue($this->PromotedMonth->GetValue(true));
        $this->DataSource->StepInc1Month->SetValue($this->StepInc1Month->GetValue(true));
        $this->DataSource->StepInc2Month->SetValue($this->StepInc2Month->GetValue(true));
        $this->DataSource->StepInc3Month->SetValue($this->StepInc3Month->GetValue(true));
        $this->DataSource->StepInc4Month->SetValue($this->StepInc4Month->GetValue(true));
        $this->DataSource->StepInc5Month->SetValue($this->StepInc5Month->GetValue(true));
        $this->DataSource->StepInc6Month->SetValue($this->StepInc6Month->GetValue(true));
        $this->DataSource->StepInc7Month->SetValue($this->StepInc7Month->GetValue(true));
        $this->DataSource->StepInc8Month->SetValue($this->StepInc8Month->GetValue(true));
        $this->DataSource->CompRetireMonth->SetValue($this->CompRetireMonth->GetValue(true));
        $this->DataSource->SeparationMonth->SetValue($this->SeparationMonth->GetValue(true));
        $this->DataSource->NosaMonth->SetValue($this->NosaMonth->GetValue(true));
        $this->DataSource->NosaSalGrade->SetValue($this->NosaSalGrade->GetValue(true));
        $this->DataSource->NosaSalary->SetValue($this->NosaSalary->GetValue(true));
        $this->DataSource->NosaTotal->SetValue($this->NosaTotal->GetValue(true));
        $this->DataSource->NosiMonth->SetValue($this->NosiMonth->GetValue(true));
        $this->DataSource->NosiSalGrade->SetValue($this->NosiSalGrade->GetValue(true));
        $this->DataSource->NosiSalary->SetValue($this->NosiSalary->GetValue(true));
        $this->DataSource->NosiTotal->SetValue($this->NosiTotal->GetValue(true));
        $this->DataSource->EffectiveDay->SetValue($this->EffectiveDay->GetValue(true));
        $this->DataSource->EffectiveYear->SetValue($this->EffectiveYear->GetValue(true));
        $this->DataSource->OrigApptDay->SetValue($this->OrigApptDay->GetValue(true));
        $this->DataSource->OrigApptYear->SetValue($this->OrigApptYear->GetValue(true));
        $this->DataSource->PromotedDay->SetValue($this->PromotedDay->GetValue(true));
        $this->DataSource->PromotedYear->SetValue($this->PromotedYear->GetValue(true));
        $this->DataSource->StepInc1Day->SetValue($this->StepInc1Day->GetValue(true));
        $this->DataSource->StepInc1Year->SetValue($this->StepInc1Year->GetValue(true));
        $this->DataSource->StepInc2Day->SetValue($this->StepInc2Day->GetValue(true));
        $this->DataSource->StepInc2Year->SetValue($this->StepInc2Year->GetValue(true));
        $this->DataSource->StepInc3Day->SetValue($this->StepInc3Day->GetValue(true));
        $this->DataSource->StepInc3Year->SetValue($this->StepInc3Year->GetValue(true));
        $this->DataSource->StepInc4Day->SetValue($this->StepInc4Day->GetValue(true));
        $this->DataSource->StepInc4Year->SetValue($this->StepInc4Year->GetValue(true));
        $this->DataSource->StepInc5Day->SetValue($this->StepInc5Day->GetValue(true));
        $this->DataSource->StepInc5Year->SetValue($this->StepInc5Year->GetValue(true));
        $this->DataSource->StepInc6Day->SetValue($this->StepInc6Day->GetValue(true));
        $this->DataSource->StepInc6Year->SetValue($this->StepInc6Year->GetValue(true));
        $this->DataSource->StepInc7Day->SetValue($this->StepInc7Day->GetValue(true));
        $this->DataSource->StepInc7Year->SetValue($this->StepInc7Year->GetValue(true));
        $this->DataSource->StepInc8Day->SetValue($this->StepInc8Day->GetValue(true));
        $this->DataSource->StepInc8Year->SetValue($this->StepInc8Year->GetValue(true));
        $this->DataSource->CompRetireDay->SetValue($this->CompRetireDay->GetValue(true));
        $this->DataSource->CompRetireYear->SetValue($this->CompRetireYear->GetValue(true));
        $this->DataSource->SeparationDay->SetValue($this->SeparationDay->GetValue(true));
        $this->DataSource->SeparationYear->SetValue($this->SeparationYear->GetValue(true));
        $this->DataSource->NosaDay->SetValue($this->NosaDay->GetValue(true));
        $this->DataSource->NosaYear->SetValue($this->NosaYear->GetValue(true));
        $this->DataSource->NosaStepInc->SetValue($this->NosaStepInc->GetValue(true));
        $this->DataSource->NosiDay->SetValue($this->NosiDay->GetValue(true));
        $this->DataSource->NosiYear->SetValue($this->NosiYear->GetValue(true));
        $this->DataSource->NosiStepInc->SetValue($this->NosiStepInc->GetValue(true));
        $this->DataSource->StepIncrement->SetValue($this->StepIncrement->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @33-625FBEEC
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Position->SetValue($this->Position->GetValue(true));
        $this->DataSource->ItemNo->SetValue($this->ItemNo->GetValue(true));
        $this->DataSource->EffectiveMonth->SetValue($this->EffectiveMonth->GetValue(true));
        $this->DataSource->SalaryGrade->SetValue($this->SalaryGrade->GetValue(true));
        $this->DataSource->MonthlySalary->SetValue($this->MonthlySalary->GetValue(true));
        $this->DataSource->StatAppt->SetValue($this->StatAppt->GetValue(true));
        $this->DataSource->OfficeID->SetValue($this->OfficeID->GetValue(true));
        $this->DataSource->OrigApptMonth->SetValue($this->OrigApptMonth->GetValue(true));
        $this->DataSource->PromotedMonth->SetValue($this->PromotedMonth->GetValue(true));
        $this->DataSource->StepInc1Month->SetValue($this->StepInc1Month->GetValue(true));
        $this->DataSource->StepInc2Month->SetValue($this->StepInc2Month->GetValue(true));
        $this->DataSource->StepInc3Month->SetValue($this->StepInc3Month->GetValue(true));
        $this->DataSource->StepInc4Month->SetValue($this->StepInc4Month->GetValue(true));
        $this->DataSource->StepInc5Month->SetValue($this->StepInc5Month->GetValue(true));
        $this->DataSource->StepInc6Month->SetValue($this->StepInc6Month->GetValue(true));
        $this->DataSource->StepInc7Month->SetValue($this->StepInc7Month->GetValue(true));
        $this->DataSource->StepInc8Month->SetValue($this->StepInc8Month->GetValue(true));
        $this->DataSource->CompRetireMonth->SetValue($this->CompRetireMonth->GetValue(true));
        $this->DataSource->SeparationMonth->SetValue($this->SeparationMonth->GetValue(true));
        $this->DataSource->NosaMonth->SetValue($this->NosaMonth->GetValue(true));
        $this->DataSource->NosaSalGrade->SetValue($this->NosaSalGrade->GetValue(true));
        $this->DataSource->NosaSalary->SetValue($this->NosaSalary->GetValue(true));
        $this->DataSource->NosaTotal->SetValue($this->NosaTotal->GetValue(true));
        $this->DataSource->NosiMonth->SetValue($this->NosiMonth->GetValue(true));
        $this->DataSource->NosiSalGrade->SetValue($this->NosiSalGrade->GetValue(true));
        $this->DataSource->NosiSalary->SetValue($this->NosiSalary->GetValue(true));
        $this->DataSource->NosiTotal->SetValue($this->NosiTotal->GetValue(true));
        $this->DataSource->EffectiveDay->SetValue($this->EffectiveDay->GetValue(true));
        $this->DataSource->EffectiveYear->SetValue($this->EffectiveYear->GetValue(true));
        $this->DataSource->OrigApptDay->SetValue($this->OrigApptDay->GetValue(true));
        $this->DataSource->OrigApptYear->SetValue($this->OrigApptYear->GetValue(true));
        $this->DataSource->PromotedDay->SetValue($this->PromotedDay->GetValue(true));
        $this->DataSource->PromotedYear->SetValue($this->PromotedYear->GetValue(true));
        $this->DataSource->StepInc1Day->SetValue($this->StepInc1Day->GetValue(true));
        $this->DataSource->StepInc1Year->SetValue($this->StepInc1Year->GetValue(true));
        $this->DataSource->StepInc2Day->SetValue($this->StepInc2Day->GetValue(true));
        $this->DataSource->StepInc2Year->SetValue($this->StepInc2Year->GetValue(true));
        $this->DataSource->StepInc3Day->SetValue($this->StepInc3Day->GetValue(true));
        $this->DataSource->StepInc3Year->SetValue($this->StepInc3Year->GetValue(true));
        $this->DataSource->StepInc4Day->SetValue($this->StepInc4Day->GetValue(true));
        $this->DataSource->StepInc4Year->SetValue($this->StepInc4Year->GetValue(true));
        $this->DataSource->StepInc5Day->SetValue($this->StepInc5Day->GetValue(true));
        $this->DataSource->StepInc5Year->SetValue($this->StepInc5Year->GetValue(true));
        $this->DataSource->StepInc6Day->SetValue($this->StepInc6Day->GetValue(true));
        $this->DataSource->StepInc6Year->SetValue($this->StepInc6Year->GetValue(true));
        $this->DataSource->StepInc7Day->SetValue($this->StepInc7Day->GetValue(true));
        $this->DataSource->StepInc7Year->SetValue($this->StepInc7Year->GetValue(true));
        $this->DataSource->StepInc8Day->SetValue($this->StepInc8Day->GetValue(true));
        $this->DataSource->StepInc8Year->SetValue($this->StepInc8Year->GetValue(true));
        $this->DataSource->CompRetireDay->SetValue($this->CompRetireDay->GetValue(true));
        $this->DataSource->CompRetireYear->SetValue($this->CompRetireYear->GetValue(true));
        $this->DataSource->SeparationDay->SetValue($this->SeparationDay->GetValue(true));
        $this->DataSource->SeparationYear->SetValue($this->SeparationYear->GetValue(true));
        $this->DataSource->NosaDay->SetValue($this->NosaDay->GetValue(true));
        $this->DataSource->NosaYear->SetValue($this->NosaYear->GetValue(true));
        $this->DataSource->NosaStepInc->SetValue($this->NosaStepInc->GetValue(true));
        $this->DataSource->NosiDay->SetValue($this->NosiDay->GetValue(true));
        $this->DataSource->NosiYear->SetValue($this->NosiYear->GetValue(true));
        $this->DataSource->NosiStepInc->SetValue($this->NosiStepInc->GetValue(true));
        $this->DataSource->StepIncrement->SetValue($this->StepIncrement->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @33-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @33-F862BC3F
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

        $this->EffectiveMonth->Prepare();
        $this->SalaryGrade->Prepare();
        $this->StatAppt->Prepare();
        $this->OfficeID->Prepare();
        $this->OrigApptMonth->Prepare();
        $this->PromotedMonth->Prepare();
        $this->StepInc1Month->Prepare();
        $this->StepInc2Month->Prepare();
        $this->StepInc3Month->Prepare();
        $this->StepInc4Month->Prepare();
        $this->StepInc5Month->Prepare();
        $this->StepInc6Month->Prepare();
        $this->StepInc7Month->Prepare();
        $this->StepInc8Month->Prepare();
        $this->CompRetireMonth->Prepare();
        $this->SeparationMonth->Prepare();
        $this->NosaMonth->Prepare();
        $this->NosaSalGrade->Prepare();
        $this->NosiMonth->Prepare();
        $this->NosiSalGrade->Prepare();
        $this->EffectiveDay->Prepare();
        $this->OrigApptDay->Prepare();
        $this->PromotedDay->Prepare();
        $this->StepInc1Day->Prepare();
        $this->StepInc2Day->Prepare();
        $this->StepInc3Day->Prepare();
        $this->StepInc4Day->Prepare();
        $this->StepInc5Day->Prepare();
        $this->StepInc6Day->Prepare();
        $this->StepInc7Day->Prepare();
        $this->StepInc8Day->Prepare();
        $this->CompRetireDay->Prepare();
        $this->SeparationDay->Prepare();
        $this->NosaDay->Prepare();
        $this->NosaStepInc->Prepare();
        $this->NosiDay->Prepare();
        $this->NosiStepInc->Prepare();
        $this->StepIncrement->Prepare();

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
                    $this->Position->SetValue($this->DataSource->Position->GetValue());
                    $this->ItemNo->SetValue($this->DataSource->ItemNo->GetValue());
                    $this->EffectiveMonth->SetValue($this->DataSource->EffectiveMonth->GetValue());
                    $this->SalaryGrade->SetValue($this->DataSource->SalaryGrade->GetValue());
                    $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
                    $this->StatAppt->SetValue($this->DataSource->StatAppt->GetValue());
                    $this->OfficeID->SetValue($this->DataSource->OfficeID->GetValue());
                    $this->OrigApptMonth->SetValue($this->DataSource->OrigApptMonth->GetValue());
                    $this->PromotedMonth->SetValue($this->DataSource->PromotedMonth->GetValue());
                    $this->StepInc1Month->SetValue($this->DataSource->StepInc1Month->GetValue());
                    $this->StepInc2Month->SetValue($this->DataSource->StepInc2Month->GetValue());
                    $this->StepInc3Month->SetValue($this->DataSource->StepInc3Month->GetValue());
                    $this->StepInc4Month->SetValue($this->DataSource->StepInc4Month->GetValue());
                    $this->StepInc5Month->SetValue($this->DataSource->StepInc5Month->GetValue());
                    $this->StepInc6Month->SetValue($this->DataSource->StepInc6Month->GetValue());
                    $this->StepInc7Month->SetValue($this->DataSource->StepInc7Month->GetValue());
                    $this->StepInc8Month->SetValue($this->DataSource->StepInc8Month->GetValue());
                    $this->CompRetireMonth->SetValue($this->DataSource->CompRetireMonth->GetValue());
                    $this->SeparationMonth->SetValue($this->DataSource->SeparationMonth->GetValue());
                    $this->NosaMonth->SetValue($this->DataSource->NosaMonth->GetValue());
                    $this->NosaSalGrade->SetValue($this->DataSource->NosaSalGrade->GetValue());
                    $this->NosaSalary->SetValue($this->DataSource->NosaSalary->GetValue());
                    $this->NosaTotal->SetValue($this->DataSource->NosaTotal->GetValue());
                    $this->NosiMonth->SetValue($this->DataSource->NosiMonth->GetValue());
                    $this->NosiSalGrade->SetValue($this->DataSource->NosiSalGrade->GetValue());
                    $this->NosiSalary->SetValue($this->DataSource->NosiSalary->GetValue());
                    $this->NosiTotal->SetValue($this->DataSource->NosiTotal->GetValue());
                    $this->EffectiveDay->SetValue($this->DataSource->EffectiveDay->GetValue());
                    $this->EffectiveYear->SetValue($this->DataSource->EffectiveYear->GetValue());
                    $this->OrigApptDay->SetValue($this->DataSource->OrigApptDay->GetValue());
                    $this->OrigApptYear->SetValue($this->DataSource->OrigApptYear->GetValue());
                    $this->PromotedDay->SetValue($this->DataSource->PromotedDay->GetValue());
                    $this->PromotedYear->SetValue($this->DataSource->PromotedYear->GetValue());
                    $this->StepInc1Day->SetValue($this->DataSource->StepInc1Day->GetValue());
                    $this->StepInc1Year->SetValue($this->DataSource->StepInc1Year->GetValue());
                    $this->StepInc2Day->SetValue($this->DataSource->StepInc2Day->GetValue());
                    $this->StepInc2Year->SetValue($this->DataSource->StepInc2Year->GetValue());
                    $this->StepInc3Day->SetValue($this->DataSource->StepInc3Day->GetValue());
                    $this->StepInc3Year->SetValue($this->DataSource->StepInc3Year->GetValue());
                    $this->StepInc4Day->SetValue($this->DataSource->StepInc4Day->GetValue());
                    $this->StepInc4Year->SetValue($this->DataSource->StepInc4Year->GetValue());
                    $this->StepInc5Day->SetValue($this->DataSource->StepInc5Day->GetValue());
                    $this->StepInc5Year->SetValue($this->DataSource->StepInc5Year->GetValue());
                    $this->StepInc6Day->SetValue($this->DataSource->StepInc6Day->GetValue());
                    $this->StepInc6Year->SetValue($this->DataSource->StepInc6Year->GetValue());
                    $this->StepInc7Day->SetValue($this->DataSource->StepInc7Day->GetValue());
                    $this->StepInc7Year->SetValue($this->DataSource->StepInc7Year->GetValue());
                    $this->StepInc8Day->SetValue($this->DataSource->StepInc8Day->GetValue());
                    $this->StepInc8Year->SetValue($this->DataSource->StepInc8Year->GetValue());
                    $this->CompRetireDay->SetValue($this->DataSource->CompRetireDay->GetValue());
                    $this->CompRetireYear->SetValue($this->DataSource->CompRetireYear->GetValue());
                    $this->SeparationDay->SetValue($this->DataSource->SeparationDay->GetValue());
                    $this->SeparationYear->SetValue($this->DataSource->SeparationYear->GetValue());
                    $this->NosaDay->SetValue($this->DataSource->NosaDay->GetValue());
                    $this->NosaYear->SetValue($this->DataSource->NosaYear->GetValue());
                    $this->NosaStepInc->SetValue($this->DataSource->NosaStepInc->GetValue());
                    $this->NosiDay->SetValue($this->DataSource->NosiDay->GetValue());
                    $this->NosiYear->SetValue($this->DataSource->NosiYear->GetValue());
                    $this->NosiStepInc->SetValue($this->DataSource->NosiStepInc->GetValue());
                    $this->StepIncrement->SetValue($this->DataSource->StepIncrement->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ItemNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EffectiveMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SalaryGrade->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MonthlySalary->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StatAppt->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OfficeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OrigApptMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PromotedMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc1Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc2Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc3Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc4Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc5Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc6Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc7Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc8Month->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CompRetireMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeparationMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosaMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosaSalGrade->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosaSalary->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosaTotal->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosiMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosiSalGrade->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosiSalary->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosiTotal->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EffectiveDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EffectiveYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OrigApptDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OrigApptYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PromotedDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PromotedYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc1Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc1Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc2Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc2Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc3Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc3Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc4Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc4Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc5Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc5Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc6Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc6Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc7Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc7Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc8Day->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepInc8Year->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CompRetireDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CompRetireYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeparationDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeparationYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosaDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosaYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosaStepInc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosiDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosiYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NosiStepInc->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StepIncrement->Errors->ToString());
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
        $this->Position->Show();
        $this->ItemNo->Show();
        $this->EffectiveMonth->Show();
        $this->SalaryGrade->Show();
        $this->MonthlySalary->Show();
        $this->StatAppt->Show();
        $this->OfficeID->Show();
        $this->OrigApptMonth->Show();
        $this->PromotedMonth->Show();
        $this->StepInc1Month->Show();
        $this->StepInc2Month->Show();
        $this->StepInc3Month->Show();
        $this->StepInc4Month->Show();
        $this->StepInc5Month->Show();
        $this->StepInc6Month->Show();
        $this->StepInc7Month->Show();
        $this->StepInc8Month->Show();
        $this->CompRetireMonth->Show();
        $this->SeparationMonth->Show();
        $this->NosaMonth->Show();
        $this->NosaSalGrade->Show();
        $this->NosaSalary->Show();
        $this->NosaTotal->Show();
        $this->NosiMonth->Show();
        $this->NosiSalGrade->Show();
        $this->NosiSalary->Show();
        $this->NosiTotal->Show();
        $this->EffectiveDay->Show();
        $this->EffectiveYear->Show();
        $this->OrigApptDay->Show();
        $this->OrigApptYear->Show();
        $this->PromotedDay->Show();
        $this->PromotedYear->Show();
        $this->StepInc1Day->Show();
        $this->StepInc1Year->Show();
        $this->StepInc2Day->Show();
        $this->StepInc2Year->Show();
        $this->StepInc3Day->Show();
        $this->StepInc3Year->Show();
        $this->StepInc4Day->Show();
        $this->StepInc4Year->Show();
        $this->StepInc5Day->Show();
        $this->StepInc5Year->Show();
        $this->StepInc6Day->Show();
        $this->StepInc6Year->Show();
        $this->StepInc7Day->Show();
        $this->StepInc7Year->Show();
        $this->StepInc8Day->Show();
        $this->StepInc8Year->Show();
        $this->CompRetireDay->Show();
        $this->CompRetireYear->Show();
        $this->SeparationDay->Show();
        $this->SeparationYear->Show();
        $this->NosaDay->Show();
        $this->NosaYear->Show();
        $this->NosaStepInc->Show();
        $this->NosiDay->Show();
        $this->NosiYear->Show();
        $this->NosiStepInc->Show();
        $this->StepIncrement->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee1 Class @33-FCB6E20C

class clsemployee1DataSource extends clsDBConnection1 {  //employee1DataSource Class @33-BDA765D5

//DataSource Variables @33-3C4442C4
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
    var $Position;
    var $ItemNo;
    var $EffectiveMonth;
    var $SalaryGrade;
    var $MonthlySalary;
    var $StatAppt;
    var $OfficeID;
    var $OrigApptMonth;
    var $PromotedMonth;
    var $StepInc1Month;
    var $StepInc2Month;
    var $StepInc3Month;
    var $StepInc4Month;
    var $StepInc5Month;
    var $StepInc6Month;
    var $StepInc7Month;
    var $StepInc8Month;
    var $CompRetireMonth;
    var $SeparationMonth;
    var $NosaMonth;
    var $NosaSalGrade;
    var $NosaSalary;
    var $NosaTotal;
    var $NosiMonth;
    var $NosiSalGrade;
    var $NosiSalary;
    var $NosiTotal;
    var $EffectiveDay;
    var $EffectiveYear;
    var $OrigApptDay;
    var $OrigApptYear;
    var $PromotedDay;
    var $PromotedYear;
    var $StepInc1Day;
    var $StepInc1Year;
    var $StepInc2Day;
    var $StepInc2Year;
    var $StepInc3Day;
    var $StepInc3Year;
    var $StepInc4Day;
    var $StepInc4Year;
    var $StepInc5Day;
    var $StepInc5Year;
    var $StepInc6Day;
    var $StepInc6Year;
    var $StepInc7Day;
    var $StepInc7Year;
    var $StepInc8Day;
    var $StepInc8Year;
    var $CompRetireDay;
    var $CompRetireYear;
    var $SeparationDay;
    var $SeparationYear;
    var $NosaDay;
    var $NosaYear;
    var $NosaStepInc;
    var $NosiDay;
    var $NosiYear;
    var $NosiStepInc;
    var $StepIncrement;
//End DataSource Variables

//DataSourceClass_Initialize Event @33-E7EC0F04
    function clsemployee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee1/Error";
        $this->Initialize();
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->ItemNo = new clsField("ItemNo", ccsText, "");
        
        $this->EffectiveMonth = new clsField("EffectiveMonth", ccsText, "");
        
        $this->SalaryGrade = new clsField("SalaryGrade", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->StatAppt = new clsField("StatAppt", ccsText, "");
        
        $this->OfficeID = new clsField("OfficeID", ccsInteger, "");
        
        $this->OrigApptMonth = new clsField("OrigApptMonth", ccsText, "");
        
        $this->PromotedMonth = new clsField("PromotedMonth", ccsText, "");
        
        $this->StepInc1Month = new clsField("StepInc1Month", ccsText, "");
        
        $this->StepInc2Month = new clsField("StepInc2Month", ccsText, "");
        
        $this->StepInc3Month = new clsField("StepInc3Month", ccsText, "");
        
        $this->StepInc4Month = new clsField("StepInc4Month", ccsText, "");
        
        $this->StepInc5Month = new clsField("StepInc5Month", ccsText, "");
        
        $this->StepInc6Month = new clsField("StepInc6Month", ccsText, "");
        
        $this->StepInc7Month = new clsField("StepInc7Month", ccsText, "");
        
        $this->StepInc8Month = new clsField("StepInc8Month", ccsText, "");
        
        $this->CompRetireMonth = new clsField("CompRetireMonth", ccsText, "");
        
        $this->SeparationMonth = new clsField("SeparationMonth", ccsText, "");
        
        $this->NosaMonth = new clsField("NosaMonth", ccsText, "");
        
        $this->NosaSalGrade = new clsField("NosaSalGrade", ccsText, "");
        
        $this->NosaSalary = new clsField("NosaSalary", ccsSingle, "");
        
        $this->NosaTotal = new clsField("NosaTotal", ccsSingle, "");
        
        $this->NosiMonth = new clsField("NosiMonth", ccsText, "");
        
        $this->NosiSalGrade = new clsField("NosiSalGrade", ccsText, "");
        
        $this->NosiSalary = new clsField("NosiSalary", ccsSingle, "");
        
        $this->NosiTotal = new clsField("NosiTotal", ccsSingle, "");
        
        $this->EffectiveDay = new clsField("EffectiveDay", ccsText, "");
        
        $this->EffectiveYear = new clsField("EffectiveYear", ccsText, "");
        
        $this->OrigApptDay = new clsField("OrigApptDay", ccsText, "");
        
        $this->OrigApptYear = new clsField("OrigApptYear", ccsText, "");
        
        $this->PromotedDay = new clsField("PromotedDay", ccsText, "");
        
        $this->PromotedYear = new clsField("PromotedYear", ccsText, "");
        
        $this->StepInc1Day = new clsField("StepInc1Day", ccsText, "");
        
        $this->StepInc1Year = new clsField("StepInc1Year", ccsText, "");
        
        $this->StepInc2Day = new clsField("StepInc2Day", ccsText, "");
        
        $this->StepInc2Year = new clsField("StepInc2Year", ccsText, "");
        
        $this->StepInc3Day = new clsField("StepInc3Day", ccsText, "");
        
        $this->StepInc3Year = new clsField("StepInc3Year", ccsText, "");
        
        $this->StepInc4Day = new clsField("StepInc4Day", ccsText, "");
        
        $this->StepInc4Year = new clsField("StepInc4Year", ccsText, "");
        
        $this->StepInc5Day = new clsField("StepInc5Day", ccsText, "");
        
        $this->StepInc5Year = new clsField("StepInc5Year", ccsText, "");
        
        $this->StepInc6Day = new clsField("StepInc6Day", ccsText, "");
        
        $this->StepInc6Year = new clsField("StepInc6Year", ccsText, "");
        
        $this->StepInc7Day = new clsField("StepInc7Day", ccsText, "");
        
        $this->StepInc7Year = new clsField("StepInc7Year", ccsText, "");
        
        $this->StepInc8Day = new clsField("StepInc8Day", ccsText, "");
        
        $this->StepInc8Year = new clsField("StepInc8Year", ccsText, "");
        
        $this->CompRetireDay = new clsField("CompRetireDay", ccsText, "");
        
        $this->CompRetireYear = new clsField("CompRetireYear", ccsText, "");
        
        $this->SeparationDay = new clsField("SeparationDay", ccsText, "");
        
        $this->SeparationYear = new clsField("SeparationYear", ccsText, "");
        
        $this->NosaDay = new clsField("NosaDay", ccsText, "");
        
        $this->NosaYear = new clsField("NosaYear", ccsText, "");
        
        $this->NosaStepInc = new clsField("NosaStepInc", ccsText, "");
        
        $this->NosiDay = new clsField("NosiDay", ccsText, "");
        
        $this->NosiYear = new clsField("NosiYear", ccsText, "");
        
        $this->NosiStepInc = new clsField("NosiStepInc", ccsText, "");
        
        $this->StepIncrement = new clsField("StepIncrement", ccsText, "");
        

        $this->InsertFields["Position"] = array("Name" => "Position", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ItemNo"] = array("Name" => "ItemNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EffectiveMonth"] = array("Name" => "EffectiveMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SalaryGrade"] = array("Name" => "SalaryGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MonthlySalary"] = array("Name" => "MonthlySalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["StatAppt"] = array("Name" => "StatAppt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["OfficeID"] = array("Name" => "OfficeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["OrigApptMonth"] = array("Name" => "OrigApptMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PromotedMonth"] = array("Name" => "PromotedMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc1Month"] = array("Name" => "StepInc1Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc2Month"] = array("Name" => "StepInc2Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc3Month"] = array("Name" => "StepInc3Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc4Month"] = array("Name" => "StepInc4Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc5Month"] = array("Name" => "StepInc5Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc6Month"] = array("Name" => "StepInc6Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc7Month"] = array("Name" => "StepInc7Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc8Month"] = array("Name" => "StepInc8Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CompRetireMonth"] = array("Name" => "CompRetireMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SeparationMonth"] = array("Name" => "SeparationMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosaMonth"] = array("Name" => "NosaMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosaSalGrade"] = array("Name" => "NosaSalGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosaSalary"] = array("Name" => "NosaSalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["NosaTotal"] = array("Name" => "NosaTotal", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["NosiMonth"] = array("Name" => "NosiMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosiSalGrade"] = array("Name" => "NosiSalGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosiSalary"] = array("Name" => "NosiSalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["NosiTotal"] = array("Name" => "NosiTotal", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["EffectiveDay"] = array("Name" => "EffectiveDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EffectiveYear"] = array("Name" => "EffectiveYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["OrigApptDay"] = array("Name" => "OrigApptDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["OrigApptYear"] = array("Name" => "OrigApptYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PromotedDay"] = array("Name" => "PromotedDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PromotedYear"] = array("Name" => "PromotedYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc1Day"] = array("Name" => "StepInc1Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc1Year"] = array("Name" => "StepInc1Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc2Day"] = array("Name" => "StepInc2Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc2Year"] = array("Name" => "StepInc2Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc3Day"] = array("Name" => "StepInc3Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc3Year"] = array("Name" => "StepInc3Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc4Day"] = array("Name" => "StepInc4Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc4Year"] = array("Name" => "StepInc4Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc5Day"] = array("Name" => "StepInc5Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc5Year"] = array("Name" => "StepInc5Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc6Day"] = array("Name" => "StepInc6Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc6Year"] = array("Name" => "StepInc6Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc7Day"] = array("Name" => "StepInc7Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc7Year"] = array("Name" => "StepInc7Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc8Day"] = array("Name" => "StepInc8Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepInc8Year"] = array("Name" => "StepInc8Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CompRetireDay"] = array("Name" => "CompRetireDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CompRetireYear"] = array("Name" => "CompRetireYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SeparationDay"] = array("Name" => "SeparationDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SeparationYear"] = array("Name" => "SeparationYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosaDay"] = array("Name" => "NosaDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosaYear"] = array("Name" => "NosaYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosaStepInc"] = array("Name" => "NosaStepInc", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosiDay"] = array("Name" => "NosiDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosiYear"] = array("Name" => "NosiYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NosiStepInc"] = array("Name" => "NosiStepInc", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StepIncrement"] = array("Name" => "StepIncrement", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Position"] = array("Name" => "Position", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ItemNo"] = array("Name" => "ItemNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EffectiveMonth"] = array("Name" => "EffectiveMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SalaryGrade"] = array("Name" => "SalaryGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MonthlySalary"] = array("Name" => "MonthlySalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["StatAppt"] = array("Name" => "StatAppt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OfficeID"] = array("Name" => "OfficeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["OrigApptMonth"] = array("Name" => "OrigApptMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PromotedMonth"] = array("Name" => "PromotedMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc1Month"] = array("Name" => "StepInc1Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc2Month"] = array("Name" => "StepInc2Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc3Month"] = array("Name" => "StepInc3Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc4Month"] = array("Name" => "StepInc4Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc5Month"] = array("Name" => "StepInc5Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc6Month"] = array("Name" => "StepInc6Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc7Month"] = array("Name" => "StepInc7Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc8Month"] = array("Name" => "StepInc8Month", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CompRetireMonth"] = array("Name" => "CompRetireMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SeparationMonth"] = array("Name" => "SeparationMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosaMonth"] = array("Name" => "NosaMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosaSalGrade"] = array("Name" => "NosaSalGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosaSalary"] = array("Name" => "NosaSalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosaTotal"] = array("Name" => "NosaTotal", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosiMonth"] = array("Name" => "NosiMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosiSalGrade"] = array("Name" => "NosiSalGrade", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosiSalary"] = array("Name" => "NosiSalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosiTotal"] = array("Name" => "NosiTotal", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["EffectiveDay"] = array("Name" => "EffectiveDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EffectiveYear"] = array("Name" => "EffectiveYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OrigApptDay"] = array("Name" => "OrigApptDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OrigApptYear"] = array("Name" => "OrigApptYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PromotedDay"] = array("Name" => "PromotedDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PromotedYear"] = array("Name" => "PromotedYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc1Day"] = array("Name" => "StepInc1Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc1Year"] = array("Name" => "StepInc1Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc2Day"] = array("Name" => "StepInc2Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc2Year"] = array("Name" => "StepInc2Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc3Day"] = array("Name" => "StepInc3Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc3Year"] = array("Name" => "StepInc3Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc4Day"] = array("Name" => "StepInc4Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc4Year"] = array("Name" => "StepInc4Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc5Day"] = array("Name" => "StepInc5Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc5Year"] = array("Name" => "StepInc5Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc6Day"] = array("Name" => "StepInc6Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc6Year"] = array("Name" => "StepInc6Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc7Day"] = array("Name" => "StepInc7Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc7Year"] = array("Name" => "StepInc7Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc8Day"] = array("Name" => "StepInc8Day", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepInc8Year"] = array("Name" => "StepInc8Year", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CompRetireDay"] = array("Name" => "CompRetireDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CompRetireYear"] = array("Name" => "CompRetireYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SeparationDay"] = array("Name" => "SeparationDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SeparationYear"] = array("Name" => "SeparationYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosaDay"] = array("Name" => "NosaDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosaYear"] = array("Name" => "NosaYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosaStepInc"] = array("Name" => "NosaStepInc", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosiDay"] = array("Name" => "NosiDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosiYear"] = array("Name" => "NosiYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NosiStepInc"] = array("Name" => "NosiStepInc", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StepIncrement"] = array("Name" => "StepIncrement", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @33-361705F1
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @33-FDA4A403
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @33-D48ED5BF
    function SetValues()
    {
        $this->Position->SetDBValue($this->f("Position"));
        $this->ItemNo->SetDBValue($this->f("ItemNo"));
        $this->EffectiveMonth->SetDBValue($this->f("EffectiveMonth"));
        $this->SalaryGrade->SetDBValue($this->f("SalaryGrade"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->StatAppt->SetDBValue($this->f("StatAppt"));
        $this->OfficeID->SetDBValue(trim($this->f("OfficeID")));
        $this->OrigApptMonth->SetDBValue($this->f("OrigApptMonth"));
        $this->PromotedMonth->SetDBValue($this->f("PromotedMonth"));
        $this->StepInc1Month->SetDBValue($this->f("StepInc1Month"));
        $this->StepInc2Month->SetDBValue($this->f("StepInc2Month"));
        $this->StepInc3Month->SetDBValue($this->f("StepInc3Month"));
        $this->StepInc4Month->SetDBValue($this->f("StepInc4Month"));
        $this->StepInc5Month->SetDBValue($this->f("StepInc5Month"));
        $this->StepInc6Month->SetDBValue($this->f("StepInc6Month"));
        $this->StepInc7Month->SetDBValue($this->f("StepInc7Month"));
        $this->StepInc8Month->SetDBValue($this->f("StepInc8Month"));
        $this->CompRetireMonth->SetDBValue($this->f("CompRetireMonth"));
        $this->SeparationMonth->SetDBValue($this->f("SeparationMonth"));
        $this->NosaMonth->SetDBValue($this->f("NosaMonth"));
        $this->NosaSalGrade->SetDBValue($this->f("NosaSalGrade"));
        $this->NosaSalary->SetDBValue(trim($this->f("NosaSalary")));
        $this->NosaTotal->SetDBValue(trim($this->f("NosaTotal")));
        $this->NosiMonth->SetDBValue($this->f("NosiMonth"));
        $this->NosiSalGrade->SetDBValue($this->f("NosiSalGrade"));
        $this->NosiSalary->SetDBValue(trim($this->f("NosiSalary")));
        $this->NosiTotal->SetDBValue(trim($this->f("NosiTotal")));
        $this->EffectiveDay->SetDBValue($this->f("EffectiveDay"));
        $this->EffectiveYear->SetDBValue($this->f("EffectiveYear"));
        $this->OrigApptDay->SetDBValue($this->f("OrigApptDay"));
        $this->OrigApptYear->SetDBValue($this->f("OrigApptYear"));
        $this->PromotedDay->SetDBValue($this->f("PromotedDay"));
        $this->PromotedYear->SetDBValue($this->f("PromotedYear"));
        $this->StepInc1Day->SetDBValue($this->f("StepInc1Day"));
        $this->StepInc1Year->SetDBValue($this->f("StepInc1Year"));
        $this->StepInc2Day->SetDBValue($this->f("StepInc2Day"));
        $this->StepInc2Year->SetDBValue($this->f("StepInc2Year"));
        $this->StepInc3Day->SetDBValue($this->f("StepInc3Day"));
        $this->StepInc3Year->SetDBValue($this->f("StepInc3Year"));
        $this->StepInc4Day->SetDBValue($this->f("StepInc4Day"));
        $this->StepInc4Year->SetDBValue($this->f("StepInc4Year"));
        $this->StepInc5Day->SetDBValue($this->f("StepInc5Day"));
        $this->StepInc5Year->SetDBValue($this->f("StepInc5Year"));
        $this->StepInc6Day->SetDBValue($this->f("StepInc6Day"));
        $this->StepInc6Year->SetDBValue($this->f("StepInc6Year"));
        $this->StepInc7Day->SetDBValue($this->f("StepInc7Day"));
        $this->StepInc7Year->SetDBValue($this->f("StepInc7Year"));
        $this->StepInc8Day->SetDBValue($this->f("StepInc8Day"));
        $this->StepInc8Year->SetDBValue($this->f("StepInc8Year"));
        $this->CompRetireDay->SetDBValue($this->f("CompRetireDay"));
        $this->CompRetireYear->SetDBValue($this->f("CompRetireYear"));
        $this->SeparationDay->SetDBValue($this->f("SeparationDay"));
        $this->SeparationYear->SetDBValue($this->f("SeparationYear"));
        $this->NosaDay->SetDBValue($this->f("NosaDay"));
        $this->NosaYear->SetDBValue($this->f("NosaYear"));
        $this->NosaStepInc->SetDBValue($this->f("NosaStepInc"));
        $this->NosiDay->SetDBValue($this->f("NosiDay"));
        $this->NosiYear->SetDBValue($this->f("NosiYear"));
        $this->NosiStepInc->SetDBValue($this->f("NosiStepInc"));
        $this->StepIncrement->SetDBValue($this->f("StepIncrement"));
    }
//End SetValues Method

//Insert Method @33-2C8AC636
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Position"]["Value"] = $this->Position->GetDBValue(true);
        $this->InsertFields["ItemNo"]["Value"] = $this->ItemNo->GetDBValue(true);
        $this->InsertFields["EffectiveMonth"]["Value"] = $this->EffectiveMonth->GetDBValue(true);
        $this->InsertFields["SalaryGrade"]["Value"] = $this->SalaryGrade->GetDBValue(true);
        $this->InsertFields["MonthlySalary"]["Value"] = $this->MonthlySalary->GetDBValue(true);
        $this->InsertFields["StatAppt"]["Value"] = $this->StatAppt->GetDBValue(true);
        $this->InsertFields["OfficeID"]["Value"] = $this->OfficeID->GetDBValue(true);
        $this->InsertFields["OrigApptMonth"]["Value"] = $this->OrigApptMonth->GetDBValue(true);
        $this->InsertFields["PromotedMonth"]["Value"] = $this->PromotedMonth->GetDBValue(true);
        $this->InsertFields["StepInc1Month"]["Value"] = $this->StepInc1Month->GetDBValue(true);
        $this->InsertFields["StepInc2Month"]["Value"] = $this->StepInc2Month->GetDBValue(true);
        $this->InsertFields["StepInc3Month"]["Value"] = $this->StepInc3Month->GetDBValue(true);
        $this->InsertFields["StepInc4Month"]["Value"] = $this->StepInc4Month->GetDBValue(true);
        $this->InsertFields["StepInc5Month"]["Value"] = $this->StepInc5Month->GetDBValue(true);
        $this->InsertFields["StepInc6Month"]["Value"] = $this->StepInc6Month->GetDBValue(true);
        $this->InsertFields["StepInc7Month"]["Value"] = $this->StepInc7Month->GetDBValue(true);
        $this->InsertFields["StepInc8Month"]["Value"] = $this->StepInc8Month->GetDBValue(true);
        $this->InsertFields["CompRetireMonth"]["Value"] = $this->CompRetireMonth->GetDBValue(true);
        $this->InsertFields["SeparationMonth"]["Value"] = $this->SeparationMonth->GetDBValue(true);
        $this->InsertFields["NosaMonth"]["Value"] = $this->NosaMonth->GetDBValue(true);
        $this->InsertFields["NosaSalGrade"]["Value"] = $this->NosaSalGrade->GetDBValue(true);
        $this->InsertFields["NosaSalary"]["Value"] = $this->NosaSalary->GetDBValue(true);
        $this->InsertFields["NosaTotal"]["Value"] = $this->NosaTotal->GetDBValue(true);
        $this->InsertFields["NosiMonth"]["Value"] = $this->NosiMonth->GetDBValue(true);
        $this->InsertFields["NosiSalGrade"]["Value"] = $this->NosiSalGrade->GetDBValue(true);
        $this->InsertFields["NosiSalary"]["Value"] = $this->NosiSalary->GetDBValue(true);
        $this->InsertFields["NosiTotal"]["Value"] = $this->NosiTotal->GetDBValue(true);
        $this->InsertFields["EffectiveDay"]["Value"] = $this->EffectiveDay->GetDBValue(true);
        $this->InsertFields["EffectiveYear"]["Value"] = $this->EffectiveYear->GetDBValue(true);
        $this->InsertFields["OrigApptDay"]["Value"] = $this->OrigApptDay->GetDBValue(true);
        $this->InsertFields["OrigApptYear"]["Value"] = $this->OrigApptYear->GetDBValue(true);
        $this->InsertFields["PromotedDay"]["Value"] = $this->PromotedDay->GetDBValue(true);
        $this->InsertFields["PromotedYear"]["Value"] = $this->PromotedYear->GetDBValue(true);
        $this->InsertFields["StepInc1Day"]["Value"] = $this->StepInc1Day->GetDBValue(true);
        $this->InsertFields["StepInc1Year"]["Value"] = $this->StepInc1Year->GetDBValue(true);
        $this->InsertFields["StepInc2Day"]["Value"] = $this->StepInc2Day->GetDBValue(true);
        $this->InsertFields["StepInc2Year"]["Value"] = $this->StepInc2Year->GetDBValue(true);
        $this->InsertFields["StepInc3Day"]["Value"] = $this->StepInc3Day->GetDBValue(true);
        $this->InsertFields["StepInc3Year"]["Value"] = $this->StepInc3Year->GetDBValue(true);
        $this->InsertFields["StepInc4Day"]["Value"] = $this->StepInc4Day->GetDBValue(true);
        $this->InsertFields["StepInc4Year"]["Value"] = $this->StepInc4Year->GetDBValue(true);
        $this->InsertFields["StepInc5Day"]["Value"] = $this->StepInc5Day->GetDBValue(true);
        $this->InsertFields["StepInc5Year"]["Value"] = $this->StepInc5Year->GetDBValue(true);
        $this->InsertFields["StepInc6Day"]["Value"] = $this->StepInc6Day->GetDBValue(true);
        $this->InsertFields["StepInc6Year"]["Value"] = $this->StepInc6Year->GetDBValue(true);
        $this->InsertFields["StepInc7Day"]["Value"] = $this->StepInc7Day->GetDBValue(true);
        $this->InsertFields["StepInc7Year"]["Value"] = $this->StepInc7Year->GetDBValue(true);
        $this->InsertFields["StepInc8Day"]["Value"] = $this->StepInc8Day->GetDBValue(true);
        $this->InsertFields["StepInc8Year"]["Value"] = $this->StepInc8Year->GetDBValue(true);
        $this->InsertFields["CompRetireDay"]["Value"] = $this->CompRetireDay->GetDBValue(true);
        $this->InsertFields["CompRetireYear"]["Value"] = $this->CompRetireYear->GetDBValue(true);
        $this->InsertFields["SeparationDay"]["Value"] = $this->SeparationDay->GetDBValue(true);
        $this->InsertFields["SeparationYear"]["Value"] = $this->SeparationYear->GetDBValue(true);
        $this->InsertFields["NosaDay"]["Value"] = $this->NosaDay->GetDBValue(true);
        $this->InsertFields["NosaYear"]["Value"] = $this->NosaYear->GetDBValue(true);
        $this->InsertFields["NosaStepInc"]["Value"] = $this->NosaStepInc->GetDBValue(true);
        $this->InsertFields["NosiDay"]["Value"] = $this->NosiDay->GetDBValue(true);
        $this->InsertFields["NosiYear"]["Value"] = $this->NosiYear->GetDBValue(true);
        $this->InsertFields["NosiStepInc"]["Value"] = $this->NosiStepInc->GetDBValue(true);
        $this->InsertFields["StepIncrement"]["Value"] = $this->StepIncrement->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @33-5B98A70A
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Position"]["Value"] = $this->Position->GetDBValue(true);
        $this->UpdateFields["ItemNo"]["Value"] = $this->ItemNo->GetDBValue(true);
        $this->UpdateFields["EffectiveMonth"]["Value"] = $this->EffectiveMonth->GetDBValue(true);
        $this->UpdateFields["SalaryGrade"]["Value"] = $this->SalaryGrade->GetDBValue(true);
        $this->UpdateFields["MonthlySalary"]["Value"] = $this->MonthlySalary->GetDBValue(true);
        $this->UpdateFields["StatAppt"]["Value"] = $this->StatAppt->GetDBValue(true);
        $this->UpdateFields["OfficeID"]["Value"] = $this->OfficeID->GetDBValue(true);
        $this->UpdateFields["OrigApptMonth"]["Value"] = $this->OrigApptMonth->GetDBValue(true);
        $this->UpdateFields["PromotedMonth"]["Value"] = $this->PromotedMonth->GetDBValue(true);
        $this->UpdateFields["StepInc1Month"]["Value"] = $this->StepInc1Month->GetDBValue(true);
        $this->UpdateFields["StepInc2Month"]["Value"] = $this->StepInc2Month->GetDBValue(true);
        $this->UpdateFields["StepInc3Month"]["Value"] = $this->StepInc3Month->GetDBValue(true);
        $this->UpdateFields["StepInc4Month"]["Value"] = $this->StepInc4Month->GetDBValue(true);
        $this->UpdateFields["StepInc5Month"]["Value"] = $this->StepInc5Month->GetDBValue(true);
        $this->UpdateFields["StepInc6Month"]["Value"] = $this->StepInc6Month->GetDBValue(true);
        $this->UpdateFields["StepInc7Month"]["Value"] = $this->StepInc7Month->GetDBValue(true);
        $this->UpdateFields["StepInc8Month"]["Value"] = $this->StepInc8Month->GetDBValue(true);
        $this->UpdateFields["CompRetireMonth"]["Value"] = $this->CompRetireMonth->GetDBValue(true);
        $this->UpdateFields["SeparationMonth"]["Value"] = $this->SeparationMonth->GetDBValue(true);
        $this->UpdateFields["NosaMonth"]["Value"] = $this->NosaMonth->GetDBValue(true);
        $this->UpdateFields["NosaSalGrade"]["Value"] = $this->NosaSalGrade->GetDBValue(true);
        $this->UpdateFields["NosaSalary"]["Value"] = $this->NosaSalary->GetDBValue(true);
        $this->UpdateFields["NosaTotal"]["Value"] = $this->NosaTotal->GetDBValue(true);
        $this->UpdateFields["NosiMonth"]["Value"] = $this->NosiMonth->GetDBValue(true);
        $this->UpdateFields["NosiSalGrade"]["Value"] = $this->NosiSalGrade->GetDBValue(true);
        $this->UpdateFields["NosiSalary"]["Value"] = $this->NosiSalary->GetDBValue(true);
        $this->UpdateFields["NosiTotal"]["Value"] = $this->NosiTotal->GetDBValue(true);
        $this->UpdateFields["EffectiveDay"]["Value"] = $this->EffectiveDay->GetDBValue(true);
        $this->UpdateFields["EffectiveYear"]["Value"] = $this->EffectiveYear->GetDBValue(true);
        $this->UpdateFields["OrigApptDay"]["Value"] = $this->OrigApptDay->GetDBValue(true);
        $this->UpdateFields["OrigApptYear"]["Value"] = $this->OrigApptYear->GetDBValue(true);
        $this->UpdateFields["PromotedDay"]["Value"] = $this->PromotedDay->GetDBValue(true);
        $this->UpdateFields["PromotedYear"]["Value"] = $this->PromotedYear->GetDBValue(true);
        $this->UpdateFields["StepInc1Day"]["Value"] = $this->StepInc1Day->GetDBValue(true);
        $this->UpdateFields["StepInc1Year"]["Value"] = $this->StepInc1Year->GetDBValue(true);
        $this->UpdateFields["StepInc2Day"]["Value"] = $this->StepInc2Day->GetDBValue(true);
        $this->UpdateFields["StepInc2Year"]["Value"] = $this->StepInc2Year->GetDBValue(true);
        $this->UpdateFields["StepInc3Day"]["Value"] = $this->StepInc3Day->GetDBValue(true);
        $this->UpdateFields["StepInc3Year"]["Value"] = $this->StepInc3Year->GetDBValue(true);
        $this->UpdateFields["StepInc4Day"]["Value"] = $this->StepInc4Day->GetDBValue(true);
        $this->UpdateFields["StepInc4Year"]["Value"] = $this->StepInc4Year->GetDBValue(true);
        $this->UpdateFields["StepInc5Day"]["Value"] = $this->StepInc5Day->GetDBValue(true);
        $this->UpdateFields["StepInc5Year"]["Value"] = $this->StepInc5Year->GetDBValue(true);
        $this->UpdateFields["StepInc6Day"]["Value"] = $this->StepInc6Day->GetDBValue(true);
        $this->UpdateFields["StepInc6Year"]["Value"] = $this->StepInc6Year->GetDBValue(true);
        $this->UpdateFields["StepInc7Day"]["Value"] = $this->StepInc7Day->GetDBValue(true);
        $this->UpdateFields["StepInc7Year"]["Value"] = $this->StepInc7Year->GetDBValue(true);
        $this->UpdateFields["StepInc8Day"]["Value"] = $this->StepInc8Day->GetDBValue(true);
        $this->UpdateFields["StepInc8Year"]["Value"] = $this->StepInc8Year->GetDBValue(true);
        $this->UpdateFields["CompRetireDay"]["Value"] = $this->CompRetireDay->GetDBValue(true);
        $this->UpdateFields["CompRetireYear"]["Value"] = $this->CompRetireYear->GetDBValue(true);
        $this->UpdateFields["SeparationDay"]["Value"] = $this->SeparationDay->GetDBValue(true);
        $this->UpdateFields["SeparationYear"]["Value"] = $this->SeparationYear->GetDBValue(true);
        $this->UpdateFields["NosaDay"]["Value"] = $this->NosaDay->GetDBValue(true);
        $this->UpdateFields["NosaYear"]["Value"] = $this->NosaYear->GetDBValue(true);
        $this->UpdateFields["NosaStepInc"]["Value"] = $this->NosaStepInc->GetDBValue(true);
        $this->UpdateFields["NosiDay"]["Value"] = $this->NosiDay->GetDBValue(true);
        $this->UpdateFields["NosiYear"]["Value"] = $this->NosiYear->GetDBValue(true);
        $this->UpdateFields["NosiStepInc"]["Value"] = $this->NosiStepInc->GetDBValue(true);
        $this->UpdateFields["StepIncrement"]["Value"] = $this->StepIncrement->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employee", $this->UpdateFields, $this);
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

//Delete Method @33-C822B971
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM employee";
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

} //End employee1DataSource Class @33-FCB6E20C

//Initialize Page @1-49C605DD
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
$TemplateFileName = "CurrentEmployment.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-54CFE114
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee = & new clsGridemployee("", $MainPage);
$employee1 = & new clsRecordemployee1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Employee.php";
$MainPage->employee = & $employee;
$MainPage->employee1 = & $employee1;
$MainPage->Link1 = & $Link1;
$employee->Initialize();
$employee1->Initialize();

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

//Execute Components @1-9ED88EDD
$employee1->Operation();
//End Execute Components

//Go to destination page @1-B8D7F893
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee);
    unset($employee1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-D044A11C
$employee->Show();
$employee1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-0C00656B
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee);
unset($employee1);
unset($Tpl);
//End Unload Page


?>
