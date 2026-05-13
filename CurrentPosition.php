<?php
//Include Common Files @1-5597B3AA
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "CurrentPosition.php");
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

//Class_Initialize Event @2-FFBC0F87
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
        $this->EmployeeID->Page = "CurrentPosition.php";
        $this->EmployeeIDNo = & new clsControl(ccsLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsLabel, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsLabel, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->NameExtension = & new clsControl(ccsLabel, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->BirthMonth = & new clsControl(ccsLabel, "BirthMonth", "BirthMonth", ccsText, "", CCGetRequestParam("BirthMonth", ccsGet, NULL), $this);
        $this->BirthDay = & new clsControl(ccsLabel, "BirthDay", "BirthDay", ccsText, "", CCGetRequestParam("BirthDay", ccsGet, NULL), $this);
        $this->BirthYear = & new clsControl(ccsLabel, "BirthYear", "BirthYear", ccsText, "", CCGetRequestParam("BirthYear", ccsGet, NULL), $this);
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

//Show Method @2-E04D1E83
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

//Open Method @2-69A2C137
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee LEFT JOIN lut_modeseparatn ON\n\n" .
        "employee.ModeSeparatnID = lut_modeseparatn.ModeSeparatnID";
        $this->SQL = "SELECT EmployeeID, EmployeeIDNo, Surname, FirstName, MiddleName, BirthMonth, BirthDay, BirthYear, lut_modeseparatn.*, NameExtension \n\n" .
        "FROM employee LEFT JOIN lut_modeseparatn ON\n\n" .
        "employee.ModeSeparatnID = lut_modeseparatn.ModeSeparatnID {SQL_Where} {SQL_OrderBy}";
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

//Class_Initialize Event @33-68A5EC0C
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
        $this->UpdateAllowed = true;
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
            $this->EffectiveMonth = & new clsControl(ccsListBox, "EffectiveMonth", "Effective Month", ccsText, "", CCGetRequestParam("EffectiveMonth", $Method, NULL), $this);
            $this->EffectiveMonth->DSType = dsTable;
            $this->EffectiveMonth->DataSource = new clsDBConnection1();
            $this->EffectiveMonth->ds = & $this->EffectiveMonth->DataSource;
            $this->EffectiveMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->EffectiveMonth->BoundColumn, $this->EffectiveMonth->TextColumn, $this->EffectiveMonth->DBFormat) = array("Month", "Month", "");
            $this->MonthlySalary = & new clsControl(ccsTextBox, "MonthlySalary", "Monthly Salary", ccsSingle, "", CCGetRequestParam("MonthlySalary", $Method, NULL), $this);
            $this->StatAppt = & new clsControl(ccsListBox, "StatAppt", "Stat Appt", ccsText, "", CCGetRequestParam("StatAppt", $Method, NULL), $this);
            $this->StatAppt->DSType = dsTable;
            $this->StatAppt->DataSource = new clsDBConnection1();
            $this->StatAppt->ds = & $this->StatAppt->DataSource;
            $this->StatAppt->DataSource->SQL = "SELECT * \n" .
"FROM lut_statofappt2 {SQL_Where} {SQL_OrderBy}";
            list($this->StatAppt->BoundColumn, $this->StatAppt->TextColumn, $this->StatAppt->DBFormat) = array("StatAppID", "StatApp", "");
            $this->OfficeID = & new clsControl(ccsListBox, "OfficeID", "Office ID", ccsInteger, "", CCGetRequestParam("OfficeID", $Method, NULL), $this);
            $this->OfficeID->DSType = dsTable;
            $this->OfficeID->DataSource = new clsDBConnection1();
            $this->OfficeID->ds = & $this->OfficeID->DataSource;
            $this->OfficeID->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            $this->OfficeID->DataSource->Order = "NameOfficeDept";
            list($this->OfficeID->BoundColumn, $this->OfficeID->TextColumn, $this->OfficeID->DBFormat) = array("OfficeID", "NameOfficeDept", "");
            $this->OfficeID->DataSource->Order = "NameOfficeDept";
            $this->OrigApptMonth = & new clsControl(ccsListBox, "OrigApptMonth", "Orig Appt Month", ccsText, "", CCGetRequestParam("OrigApptMonth", $Method, NULL), $this);
            $this->OrigApptMonth->DSType = dsTable;
            $this->OrigApptMonth->DataSource = new clsDBConnection1();
            $this->OrigApptMonth->ds = & $this->OrigApptMonth->DataSource;
            $this->OrigApptMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->OrigApptMonth->BoundColumn, $this->OrigApptMonth->TextColumn, $this->OrigApptMonth->DBFormat) = array("Month", "Month", "");
            $this->DetailedID = & new clsControl(ccsCheckBox, "DetailedID", "Detailed ID", ccsInteger, "", CCGetRequestParam("DetailedID", $Method, NULL), $this);
            $this->DetailedID->CheckedValue = $this->DetailedID->GetParsedValue(1);
            $this->DetailedID->UncheckedValue = $this->DetailedID->GetParsedValue(0);
            $this->DetailedOffice = & new clsControl(ccsTextBox, "DetailedOffice", "Detailed Office", ccsText, "", CCGetRequestParam("DetailedOffice", $Method, NULL), $this);
            $this->DetailedDate = & new clsControl(ccsTextBox, "DetailedDate", "Detailed Date", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("DetailedDate", $Method, NULL), $this);
            $this->DatePicker_DetailedDate = & new clsDatePicker("DatePicker_DetailedDate", "employee1", "DetailedDate", $this);
            $this->DetailedRemarks = & new clsControl(ccsTextBox, "DetailedRemarks", "Detailed Remarks", ccsText, "", CCGetRequestParam("DetailedRemarks", $Method, NULL), $this);
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
            $this->LastService = & new clsControl(ccsTextBox, "LastService", "Last Service", ccsText, "", CCGetRequestParam("LastService", $Method, NULL), $this);
            $this->TextBox1 = & new clsControl(ccsListBox, "TextBox1", "TextBox1", ccsText, "", CCGetRequestParam("TextBox1", $Method, NULL), $this);
            $this->TextBox1->DSType = dsTable;
            $this->TextBox1->DataSource = new clsDBConnection1();
            $this->TextBox1->ds = & $this->TextBox1->DataSource;
            $this->TextBox1->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->TextBox1->BoundColumn, $this->TextBox1->TextColumn, $this->TextBox1->DBFormat) = array("Month", "Month", "");
            $this->TextBox2 = & new clsControl(ccsListBox, "TextBox2", "TextBox2", ccsText, "", CCGetRequestParam("TextBox2", $Method, NULL), $this);
            $this->TextBox2->DSType = dsTable;
            $this->TextBox2->DataSource = new clsDBConnection1();
            $this->TextBox2->ds = & $this->TextBox2->DataSource;
            $this->TextBox2->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->TextBox2->BoundColumn, $this->TextBox2->TextColumn, $this->TextBox2->DBFormat) = array("Day", "Day", "");
            $this->CheckBox1 = & new clsControl(ccsCheckBox, "CheckBox1", "CheckBox1", ccsInteger, "", CCGetRequestParam("CheckBox1", $Method, NULL), $this);
            $this->CheckBox1->CheckedValue = $this->CheckBox1->GetParsedValue(1);
            $this->CheckBox1->UncheckedValue = $this->CheckBox1->GetParsedValue(0);
            $this->TextBox4 = & new clsControl(ccsListBox, "TextBox4", "TextBox4", ccsInteger, "", CCGetRequestParam("TextBox4", $Method, NULL), $this);
            $this->TextBox4->DSType = dsTable;
            $this->TextBox4->DataSource = new clsDBConnection1();
            $this->TextBox4->ds = & $this->TextBox4->DataSource;
            $this->TextBox4->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            list($this->TextBox4->BoundColumn, $this->TextBox4->TextColumn, $this->TextBox4->DBFormat) = array("OfficeID", "NameOfficeDept", "");
            $this->TextBox5 = & new clsControl(ccsTextBox, "TextBox5", "TextBox5", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox5", $Method, NULL), $this);
            $this->ListBox8 = & new clsControl(ccsListBox, "ListBox8", "ListBox8", ccsText, "", CCGetRequestParam("ListBox8", $Method, NULL), $this);
            $this->ListBox8->DSType = dsTable;
            $this->ListBox8->DataSource = new clsDBConnection1();
            $this->ListBox8->ds = & $this->ListBox8->DataSource;
            $this->ListBox8->DataSource->SQL = "SELECT * \n" .
"FROM lut_servicerecpurpose {SQL_Where} {SQL_OrderBy}";
            $this->ListBox8->DataSource->Order = "ServiceRecPurpose";
            list($this->ListBox8->BoundColumn, $this->ListBox8->TextColumn, $this->ListBox8->DBFormat) = array("SecRecPurposeID", "ServiceRecPurpose", "");
            $this->ListBox8->DataSource->Order = "ServiceRecPurpose";
            $this->TextBox7 = & new clsControl(ccsTextBox, "TextBox7", "TextBox7", ccsText, "", CCGetRequestParam("TextBox7", $Method, NULL), $this);
            $this->TextBox11 = & new clsControl(ccsTextBox, "TextBox11", "TextBox11", ccsText, "", CCGetRequestParam("TextBox11", $Method, NULL), $this);
            $this->ListBox18 = & new clsControl(ccsListBox, "ListBox18", "ListBox18", ccsText, "", CCGetRequestParam("ListBox18", $Method, NULL), $this);
            $this->ListBox18->DSType = dsTable;
            $this->ListBox18->DataSource = new clsDBConnection1();
            $this->ListBox18->ds = & $this->ListBox18->DataSource;
            $this->ListBox18->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox18->BoundColumn, $this->ListBox18->TextColumn, $this->ListBox18->DBFormat) = array("Month", "Month", "");
            $this->ListBox20 = & new clsControl(ccsTextBox, "ListBox20", "ListBox20", ccsText, "", CCGetRequestParam("ListBox20", $Method, NULL), $this);
            $this->ListBox19 = & new clsControl(ccsListBox, "ListBox19", "ListBox19", ccsText, "", CCGetRequestParam("ListBox19", $Method, NULL), $this);
            $this->ListBox19->DSType = dsTable;
            $this->ListBox19->DataSource = new clsDBConnection1();
            $this->ListBox19->ds = & $this->ListBox19->DataSource;
            $this->ListBox19->DataSource->SQL = "SELECT * \n" .
"FROM lut_days {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox19->BoundColumn, $this->ListBox19->TextColumn, $this->ListBox19->DBFormat) = array("day", "day", "");
            $this->ListBox1 = & new clsControl(ccsListBox, "ListBox1", "ListBox1", ccsInteger, "", CCGetRequestParam("ListBox1", $Method, NULL), $this);
            $this->ListBox1->DSType = dsTable;
            $this->ListBox1->DataSource = new clsDBConnection1();
            $this->ListBox1->ds = & $this->ListBox1->DataSource;
            $this->ListBox1->DataSource->SQL = "SELECT * \n" .
"FROM lut_modeseparatn {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox1->BoundColumn, $this->ListBox1->TextColumn, $this->ListBox1->DBFormat) = array("ModeSeparatnID", "ModeSeparatn", "");
            $this->ListBox2 = & new clsControl(ccsListBox, "ListBox2", "ListBox2", ccsText, "", CCGetRequestParam("ListBox2", $Method, NULL), $this);
            $this->ListBox2->DSType = dsTable;
            $this->ListBox2->DataSource = new clsDBConnection1();
            $this->ListBox2->ds = & $this->ListBox2->DataSource;
            $this->ListBox2->DataSource->SQL = "SELECT * \n" .
"FROM lut_rate {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox2->BoundColumn, $this->ListBox2->TextColumn, $this->ListBox2->DBFormat) = array("Rate", "Rate", "");
            $this->ListBox3 = & new clsControl(ccsListBox, "ListBox3", "ListBox3", ccsText, "", CCGetRequestParam("ListBox3", $Method, NULL), $this);
            $this->ListBox3->DSType = dsTable;
            $this->ListBox3->DataSource = new clsDBConnection1();
            $this->ListBox3->ds = & $this->ListBox3->DataSource;
            $this->ListBox3->DataSource->SQL = "SELECT * \n" .
"FROM lut_status {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox3->BoundColumn, $this->ListBox3->TextColumn, $this->ListBox3->DBFormat) = array("StatID", "Status", "");
            $this->TextBox3 = & new clsControl(ccsTextBox, "TextBox3", "TextBox3", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox3", $Method, NULL), $this);
            $this->TextBox6 = & new clsControl(ccsTextBox, "TextBox6", "TextBox6", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox6", $Method, NULL), $this);
            $this->TextBox8 = & new clsControl(ccsTextBox, "TextBox8", "TextBox8", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox8", $Method, NULL), $this);
            $this->TextBox9 = & new clsControl(ccsTextBox, "TextBox9", "TextBox9", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox9", $Method, NULL), $this);
            $this->TextBox10 = & new clsControl(ccsTextBox, "TextBox10", "TextBox10", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox10", $Method, NULL), $this);
            $this->TextBox12 = & new clsControl(ccsTextBox, "TextBox12", "TextBox12", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox12", $Method, NULL), $this);
            $this->TextBox13 = & new clsControl(ccsTextBox, "TextBox13", "TextBox13", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox13", $Method, NULL), $this);
            $this->TextBox14 = & new clsControl(ccsTextBox, "TextBox14", "TextBox14", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox14", $Method, NULL), $this);
            $this->TextBox15 = & new clsControl(ccsTextBox, "TextBox15", "TextBox15", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox15", $Method, NULL), $this);
            $this->TextBox16 = & new clsControl(ccsTextBox, "TextBox16", "TextBox16", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox16", $Method, NULL), $this);
            $this->TextBox17 = & new clsControl(ccsTextBox, "TextBox17", "TextBox17", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox17", $Method, NULL), $this);
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

//Validate Method @33-9D659B7E
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Position->Validate() && $Validation);
        $Validation = ($this->EffectiveMonth->Validate() && $Validation);
        $Validation = ($this->MonthlySalary->Validate() && $Validation);
        $Validation = ($this->StatAppt->Validate() && $Validation);
        $Validation = ($this->OfficeID->Validate() && $Validation);
        $Validation = ($this->OrigApptMonth->Validate() && $Validation);
        $Validation = ($this->DetailedID->Validate() && $Validation);
        $Validation = ($this->DetailedOffice->Validate() && $Validation);
        $Validation = ($this->DetailedDate->Validate() && $Validation);
        $Validation = ($this->DetailedRemarks->Validate() && $Validation);
        $Validation = ($this->EffectiveDay->Validate() && $Validation);
        $Validation = ($this->EffectiveYear->Validate() && $Validation);
        $Validation = ($this->OrigApptDay->Validate() && $Validation);
        $Validation = ($this->OrigApptYear->Validate() && $Validation);
        $Validation = ($this->LastService->Validate() && $Validation);
        $Validation = ($this->TextBox1->Validate() && $Validation);
        $Validation = ($this->TextBox2->Validate() && $Validation);
        $Validation = ($this->CheckBox1->Validate() && $Validation);
        $Validation = ($this->TextBox4->Validate() && $Validation);
        $Validation = ($this->TextBox5->Validate() && $Validation);
        $Validation = ($this->ListBox8->Validate() && $Validation);
        $Validation = ($this->TextBox7->Validate() && $Validation);
        $Validation = ($this->TextBox11->Validate() && $Validation);
        $Validation = ($this->ListBox18->Validate() && $Validation);
        $Validation = ($this->ListBox20->Validate() && $Validation);
        $Validation = ($this->ListBox19->Validate() && $Validation);
        $Validation = ($this->ListBox1->Validate() && $Validation);
        $Validation = ($this->ListBox2->Validate() && $Validation);
        $Validation = ($this->ListBox3->Validate() && $Validation);
        $Validation = ($this->TextBox3->Validate() && $Validation);
        $Validation = ($this->TextBox6->Validate() && $Validation);
        $Validation = ($this->TextBox8->Validate() && $Validation);
        $Validation = ($this->TextBox9->Validate() && $Validation);
        $Validation = ($this->TextBox10->Validate() && $Validation);
        $Validation = ($this->TextBox12->Validate() && $Validation);
        $Validation = ($this->TextBox13->Validate() && $Validation);
        $Validation = ($this->TextBox14->Validate() && $Validation);
        $Validation = ($this->TextBox15->Validate() && $Validation);
        $Validation = ($this->TextBox16->Validate() && $Validation);
        $Validation = ($this->TextBox17->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EffectiveMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MonthlySalary->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StatAppt->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OfficeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OrigApptMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DetailedID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DetailedOffice->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DetailedDate->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DetailedRemarks->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EffectiveDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EffectiveYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OrigApptDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OrigApptYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->LastService->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CheckBox1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox4->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox5->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox8->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox7->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox11->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox18->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox20->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox19->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox6->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox8->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox9->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox10->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox12->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox13->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox14->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox15->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox16->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox17->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @33-AC75D371
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->EffectiveMonth->Errors->Count());
        $errors = ($errors || $this->MonthlySalary->Errors->Count());
        $errors = ($errors || $this->StatAppt->Errors->Count());
        $errors = ($errors || $this->OfficeID->Errors->Count());
        $errors = ($errors || $this->OrigApptMonth->Errors->Count());
        $errors = ($errors || $this->DetailedID->Errors->Count());
        $errors = ($errors || $this->DetailedOffice->Errors->Count());
        $errors = ($errors || $this->DetailedDate->Errors->Count());
        $errors = ($errors || $this->DatePicker_DetailedDate->Errors->Count());
        $errors = ($errors || $this->DetailedRemarks->Errors->Count());
        $errors = ($errors || $this->EffectiveDay->Errors->Count());
        $errors = ($errors || $this->EffectiveYear->Errors->Count());
        $errors = ($errors || $this->OrigApptDay->Errors->Count());
        $errors = ($errors || $this->OrigApptYear->Errors->Count());
        $errors = ($errors || $this->LastService->Errors->Count());
        $errors = ($errors || $this->TextBox1->Errors->Count());
        $errors = ($errors || $this->TextBox2->Errors->Count());
        $errors = ($errors || $this->CheckBox1->Errors->Count());
        $errors = ($errors || $this->TextBox4->Errors->Count());
        $errors = ($errors || $this->TextBox5->Errors->Count());
        $errors = ($errors || $this->ListBox8->Errors->Count());
        $errors = ($errors || $this->TextBox7->Errors->Count());
        $errors = ($errors || $this->TextBox11->Errors->Count());
        $errors = ($errors || $this->ListBox18->Errors->Count());
        $errors = ($errors || $this->ListBox20->Errors->Count());
        $errors = ($errors || $this->ListBox19->Errors->Count());
        $errors = ($errors || $this->ListBox1->Errors->Count());
        $errors = ($errors || $this->ListBox2->Errors->Count());
        $errors = ($errors || $this->ListBox3->Errors->Count());
        $errors = ($errors || $this->TextBox3->Errors->Count());
        $errors = ($errors || $this->TextBox6->Errors->Count());
        $errors = ($errors || $this->TextBox8->Errors->Count());
        $errors = ($errors || $this->TextBox9->Errors->Count());
        $errors = ($errors || $this->TextBox10->Errors->Count());
        $errors = ($errors || $this->TextBox12->Errors->Count());
        $errors = ($errors || $this->TextBox13->Errors->Count());
        $errors = ($errors || $this->TextBox14->Errors->Count());
        $errors = ($errors || $this->TextBox15->Errors->Count());
        $errors = ($errors || $this->TextBox16->Errors->Count());
        $errors = ($errors || $this->TextBox17->Errors->Count());
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

//Operation Method @33-F93F03D0
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
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete)) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert)) {
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

//UpdateRow Method @33-801F71C2
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Position->SetValue($this->Position->GetValue(true));
        $this->DataSource->EffectiveMonth->SetValue($this->EffectiveMonth->GetValue(true));
        $this->DataSource->MonthlySalary->SetValue($this->MonthlySalary->GetValue(true));
        $this->DataSource->StatAppt->SetValue($this->StatAppt->GetValue(true));
        $this->DataSource->OfficeID->SetValue($this->OfficeID->GetValue(true));
        $this->DataSource->OrigApptMonth->SetValue($this->OrigApptMonth->GetValue(true));
        $this->DataSource->DetailedID->SetValue($this->DetailedID->GetValue(true));
        $this->DataSource->DetailedOffice->SetValue($this->DetailedOffice->GetValue(true));
        $this->DataSource->DetailedDate->SetValue($this->DetailedDate->GetValue(true));
        $this->DataSource->DetailedRemarks->SetValue($this->DetailedRemarks->GetValue(true));
        $this->DataSource->EffectiveDay->SetValue($this->EffectiveDay->GetValue(true));
        $this->DataSource->EffectiveYear->SetValue($this->EffectiveYear->GetValue(true));
        $this->DataSource->OrigApptDay->SetValue($this->OrigApptDay->GetValue(true));
        $this->DataSource->OrigApptYear->SetValue($this->OrigApptYear->GetValue(true));
        $this->DataSource->LastService->SetValue($this->LastService->GetValue(true));
        $this->DataSource->TextBox1->SetValue($this->TextBox1->GetValue(true));
        $this->DataSource->TextBox2->SetValue($this->TextBox2->GetValue(true));
        $this->DataSource->CheckBox1->SetValue($this->CheckBox1->GetValue(true));
        $this->DataSource->TextBox4->SetValue($this->TextBox4->GetValue(true));
        $this->DataSource->TextBox5->SetValue($this->TextBox5->GetValue(true));
        $this->DataSource->ListBox8->SetValue($this->ListBox8->GetValue(true));
        $this->DataSource->TextBox7->SetValue($this->TextBox7->GetValue(true));
        $this->DataSource->TextBox11->SetValue($this->TextBox11->GetValue(true));
        $this->DataSource->ListBox18->SetValue($this->ListBox18->GetValue(true));
        $this->DataSource->ListBox20->SetValue($this->ListBox20->GetValue(true));
        $this->DataSource->ListBox19->SetValue($this->ListBox19->GetValue(true));
        $this->DataSource->ListBox1->SetValue($this->ListBox1->GetValue(true));
        $this->DataSource->ListBox2->SetValue($this->ListBox2->GetValue(true));
        $this->DataSource->ListBox3->SetValue($this->ListBox3->GetValue(true));
        $this->DataSource->TextBox3->SetValue($this->TextBox3->GetValue(true));
        $this->DataSource->TextBox6->SetValue($this->TextBox6->GetValue(true));
        $this->DataSource->TextBox8->SetValue($this->TextBox8->GetValue(true));
        $this->DataSource->TextBox9->SetValue($this->TextBox9->GetValue(true));
        $this->DataSource->TextBox10->SetValue($this->TextBox10->GetValue(true));
        $this->DataSource->TextBox12->SetValue($this->TextBox12->GetValue(true));
        $this->DataSource->TextBox13->SetValue($this->TextBox13->GetValue(true));
        $this->DataSource->TextBox14->SetValue($this->TextBox14->GetValue(true));
        $this->DataSource->TextBox15->SetValue($this->TextBox15->GetValue(true));
        $this->DataSource->TextBox16->SetValue($this->TextBox16->GetValue(true));
        $this->DataSource->TextBox17->SetValue($this->TextBox17->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//Show Method @33-5BB53919
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
        $this->StatAppt->Prepare();
        $this->OfficeID->Prepare();
        $this->OrigApptMonth->Prepare();
        $this->EffectiveDay->Prepare();
        $this->OrigApptDay->Prepare();
        $this->TextBox1->Prepare();
        $this->TextBox2->Prepare();
        $this->TextBox4->Prepare();
        $this->ListBox8->Prepare();
        $this->ListBox18->Prepare();
        $this->ListBox19->Prepare();
        $this->ListBox1->Prepare();
        $this->ListBox2->Prepare();
        $this->ListBox3->Prepare();

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
                    $this->EffectiveMonth->SetValue($this->DataSource->EffectiveMonth->GetValue());
                    $this->MonthlySalary->SetValue($this->DataSource->MonthlySalary->GetValue());
                    $this->StatAppt->SetValue($this->DataSource->StatAppt->GetValue());
                    $this->OfficeID->SetValue($this->DataSource->OfficeID->GetValue());
                    $this->OrigApptMonth->SetValue($this->DataSource->OrigApptMonth->GetValue());
                    $this->DetailedID->SetValue($this->DataSource->DetailedID->GetValue());
                    $this->DetailedOffice->SetValue($this->DataSource->DetailedOffice->GetValue());
                    $this->DetailedDate->SetValue($this->DataSource->DetailedDate->GetValue());
                    $this->DetailedRemarks->SetValue($this->DataSource->DetailedRemarks->GetValue());
                    $this->EffectiveDay->SetValue($this->DataSource->EffectiveDay->GetValue());
                    $this->EffectiveYear->SetValue($this->DataSource->EffectiveYear->GetValue());
                    $this->OrigApptDay->SetValue($this->DataSource->OrigApptDay->GetValue());
                    $this->OrigApptYear->SetValue($this->DataSource->OrigApptYear->GetValue());
                    $this->LastService->SetValue($this->DataSource->LastService->GetValue());
                    $this->TextBox1->SetValue($this->DataSource->TextBox1->GetValue());
                    $this->TextBox2->SetValue($this->DataSource->TextBox2->GetValue());
                    $this->CheckBox1->SetValue($this->DataSource->CheckBox1->GetValue());
                    $this->TextBox4->SetValue($this->DataSource->TextBox4->GetValue());
                    $this->TextBox5->SetValue($this->DataSource->TextBox5->GetValue());
                    $this->ListBox8->SetValue($this->DataSource->ListBox8->GetValue());
                    $this->TextBox7->SetValue($this->DataSource->TextBox7->GetValue());
                    $this->TextBox11->SetValue($this->DataSource->TextBox11->GetValue());
                    $this->ListBox18->SetValue($this->DataSource->ListBox18->GetValue());
                    $this->ListBox20->SetValue($this->DataSource->ListBox20->GetValue());
                    $this->ListBox19->SetValue($this->DataSource->ListBox19->GetValue());
                    $this->ListBox1->SetValue($this->DataSource->ListBox1->GetValue());
                    $this->ListBox2->SetValue($this->DataSource->ListBox2->GetValue());
                    $this->ListBox3->SetValue($this->DataSource->ListBox3->GetValue());
                    $this->TextBox3->SetValue($this->DataSource->TextBox3->GetValue());
                    $this->TextBox6->SetValue($this->DataSource->TextBox6->GetValue());
                    $this->TextBox8->SetValue($this->DataSource->TextBox8->GetValue());
                    $this->TextBox9->SetValue($this->DataSource->TextBox9->GetValue());
                    $this->TextBox10->SetValue($this->DataSource->TextBox10->GetValue());
                    $this->TextBox12->SetValue($this->DataSource->TextBox12->GetValue());
                    $this->TextBox13->SetValue($this->DataSource->TextBox13->GetValue());
                    $this->TextBox14->SetValue($this->DataSource->TextBox14->GetValue());
                    $this->TextBox15->SetValue($this->DataSource->TextBox15->GetValue());
                    $this->TextBox16->SetValue($this->DataSource->TextBox16->GetValue());
                    $this->TextBox17->SetValue($this->DataSource->TextBox17->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EffectiveMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MonthlySalary->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StatAppt->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OfficeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OrigApptMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DetailedID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DetailedOffice->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DetailedDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DetailedDate->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DetailedRemarks->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EffectiveDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EffectiveYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OrigApptDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OrigApptYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->LastService->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CheckBox1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox4->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox5->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox8->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox7->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox11->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox18->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox20->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox19->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox6->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox8->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox9->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox10->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox12->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox13->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox14->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox15->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox16->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox17->Errors->ToString());
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
        $this->EffectiveMonth->Show();
        $this->MonthlySalary->Show();
        $this->StatAppt->Show();
        $this->OfficeID->Show();
        $this->OrigApptMonth->Show();
        $this->DetailedID->Show();
        $this->DetailedOffice->Show();
        $this->DetailedDate->Show();
        $this->DatePicker_DetailedDate->Show();
        $this->DetailedRemarks->Show();
        $this->EffectiveDay->Show();
        $this->EffectiveYear->Show();
        $this->OrigApptDay->Show();
        $this->OrigApptYear->Show();
        $this->LastService->Show();
        $this->TextBox1->Show();
        $this->TextBox2->Show();
        $this->CheckBox1->Show();
        $this->TextBox4->Show();
        $this->TextBox5->Show();
        $this->ListBox8->Show();
        $this->TextBox7->Show();
        $this->TextBox11->Show();
        $this->ListBox18->Show();
        $this->ListBox20->Show();
        $this->ListBox19->Show();
        $this->ListBox1->Show();
        $this->ListBox2->Show();
        $this->ListBox3->Show();
        $this->TextBox3->Show();
        $this->TextBox6->Show();
        $this->TextBox8->Show();
        $this->TextBox9->Show();
        $this->TextBox10->Show();
        $this->TextBox12->Show();
        $this->TextBox13->Show();
        $this->TextBox14->Show();
        $this->TextBox15->Show();
        $this->TextBox16->Show();
        $this->TextBox17->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee1 Class @33-FCB6E20C

class clsemployee1DataSource extends clsDBConnection1 {  //employee1DataSource Class @33-BDA765D5

//DataSource Variables @33-537F335B
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $UpdateParameters;
    var $wp;
    var $AllParametersSet;

    var $UpdateFields = array();

    // Datasource fields
    var $Position;
    var $EffectiveMonth;
    var $MonthlySalary;
    var $StatAppt;
    var $OfficeID;
    var $OrigApptMonth;
    var $DetailedID;
    var $DetailedOffice;
    var $DetailedDate;
    var $DetailedRemarks;
    var $EffectiveDay;
    var $EffectiveYear;
    var $OrigApptDay;
    var $OrigApptYear;
    var $LastService;
    var $TextBox1;
    var $TextBox2;
    var $CheckBox1;
    var $TextBox4;
    var $TextBox5;
    var $ListBox8;
    var $TextBox7;
    var $TextBox11;
    var $ListBox18;
    var $ListBox20;
    var $ListBox19;
    var $ListBox1;
    var $ListBox2;
    var $ListBox3;
    var $TextBox3;
    var $TextBox6;
    var $TextBox8;
    var $TextBox9;
    var $TextBox10;
    var $TextBox12;
    var $TextBox13;
    var $TextBox14;
    var $TextBox15;
    var $TextBox16;
    var $TextBox17;
//End DataSource Variables

//DataSourceClass_Initialize Event @33-54C368C5
    function clsemployee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee1/Error";
        $this->Initialize();
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->EffectiveMonth = new clsField("EffectiveMonth", ccsText, "");
        
        $this->MonthlySalary = new clsField("MonthlySalary", ccsSingle, "");
        
        $this->StatAppt = new clsField("StatAppt", ccsText, "");
        
        $this->OfficeID = new clsField("OfficeID", ccsInteger, "");
        
        $this->OrigApptMonth = new clsField("OrigApptMonth", ccsText, "");
        
        $this->DetailedID = new clsField("DetailedID", ccsInteger, "");
        
        $this->DetailedOffice = new clsField("DetailedOffice", ccsText, "");
        
        $this->DetailedDate = new clsField("DetailedDate", ccsDate, $this->DateFormat);
        
        $this->DetailedRemarks = new clsField("DetailedRemarks", ccsText, "");
        
        $this->EffectiveDay = new clsField("EffectiveDay", ccsText, "");
        
        $this->EffectiveYear = new clsField("EffectiveYear", ccsText, "");
        
        $this->OrigApptDay = new clsField("OrigApptDay", ccsText, "");
        
        $this->OrigApptYear = new clsField("OrigApptYear", ccsText, "");
        
        $this->LastService = new clsField("LastService", ccsText, "");
        
        $this->TextBox1 = new clsField("TextBox1", ccsText, "");
        
        $this->TextBox2 = new clsField("TextBox2", ccsText, "");
        
        $this->CheckBox1 = new clsField("CheckBox1", ccsInteger, "");
        
        $this->TextBox4 = new clsField("TextBox4", ccsInteger, "");
        
        $this->TextBox5 = new clsField("TextBox5", ccsDate, $this->DateFormat);
        
        $this->ListBox8 = new clsField("ListBox8", ccsText, "");
        
        $this->TextBox7 = new clsField("TextBox7", ccsText, "");
        
        $this->TextBox11 = new clsField("TextBox11", ccsText, "");
        
        $this->ListBox18 = new clsField("ListBox18", ccsText, "");
        
        $this->ListBox20 = new clsField("ListBox20", ccsText, "");
        
        $this->ListBox19 = new clsField("ListBox19", ccsText, "");
        
        $this->ListBox1 = new clsField("ListBox1", ccsInteger, "");
        
        $this->ListBox2 = new clsField("ListBox2", ccsText, "");
        
        $this->ListBox3 = new clsField("ListBox3", ccsText, "");
        
        $this->TextBox3 = new clsField("TextBox3", ccsDate, $this->DateFormat);
        
        $this->TextBox6 = new clsField("TextBox6", ccsDate, $this->DateFormat);
        
        $this->TextBox8 = new clsField("TextBox8", ccsDate, $this->DateFormat);
        
        $this->TextBox9 = new clsField("TextBox9", ccsDate, $this->DateFormat);
        
        $this->TextBox10 = new clsField("TextBox10", ccsDate, $this->DateFormat);
        
        $this->TextBox12 = new clsField("TextBox12", ccsDate, $this->DateFormat);
        
        $this->TextBox13 = new clsField("TextBox13", ccsDate, $this->DateFormat);
        
        $this->TextBox14 = new clsField("TextBox14", ccsDate, $this->DateFormat);
        
        $this->TextBox15 = new clsField("TextBox15", ccsDate, $this->DateFormat);
        
        $this->TextBox16 = new clsField("TextBox16", ccsDate, $this->DateFormat);
        
        $this->TextBox17 = new clsField("TextBox17", ccsDate, $this->DateFormat);
        

        $this->UpdateFields["Position"] = array("Name" => "Position", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EffectiveMonth"] = array("Name" => "EffectiveMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MonthlySalary"] = array("Name" => "MonthlySalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["StatAppID"] = array("Name" => "StatAppID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OfficeID"] = array("Name" => "OfficeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["OrigApptMonth"] = array("Name" => "OrigApptMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DetailedID"] = array("Name" => "DetailedID", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["DetailedOffice"] = array("Name" => "DetailedOffice", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DetailedDate"] = array("Name" => "DetailedDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DetailedRemarks"] = array("Name" => "DetailedRemarks", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EffectiveDay"] = array("Name" => "EffectiveDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EffectiveYear"] = array("Name" => "EffectiveYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OrigApptDay"] = array("Name" => "OrigApptDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OrigApptYear"] = array("Name" => "OrigApptYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LastService"] = array("Name" => "LastService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LastServiceMonth"] = array("Name" => "LastServiceMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["LastServiceDay"] = array("Name" => "LastServiceDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ReassignmentID"] = array("Name" => "ReassignmentID", "Value" => "", "DataType" => ccsInteger);
        $this->UpdateFields["ReassignmentOffice"] = array("Name" => "ReassignmentOffice", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["ReassignmentDate"] = array("Name" => "ReassignmentDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["SecRecPurposeID"] = array("Name" => "SecRecPurposeID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ReassignmentRemarks"] = array("Name" => "ReassignmentRemarks", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SalaryWords"] = array("Name" => "SalaryWords", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertMonth"] = array("Name" => "CertMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertYear"] = array("Name" => "CertYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertDay"] = array("Name" => "CertDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ModeSeparatnID"] = array("Name" => "ModeSeparatnID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Rate"] = array("Name" => "Rate", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StatID"] = array("Name" => "StatID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EntrancePGNS"] = array("Name" => "EntrancePGNS", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpFrom"] = array("Name" => "PrevEmpFrom", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpTo"] = array("Name" => "PrevEmpTo", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpFrom2"] = array("Name" => "PrevEmpFrom2", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpTo2"] = array("Name" => "PrevEmpTo2", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpFrom3"] = array("Name" => "PrevEmpFrom3", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpTo3"] = array("Name" => "PrevEmpTo3", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpFrom4"] = array("Name" => "PrevEmpFrom4", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpTo4"] = array("Name" => "PrevEmpTo4", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpFrom5"] = array("Name" => "PrevEmpFrom5", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["PrevEmpTo5"] = array("Name" => "PrevEmpTo5", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
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

//SetValues Method @33-859A2617
    function SetValues()
    {
        $this->Position->SetDBValue($this->f("Position"));
        $this->EffectiveMonth->SetDBValue($this->f("EffectiveMonth"));
        $this->MonthlySalary->SetDBValue(trim($this->f("MonthlySalary")));
        $this->StatAppt->SetDBValue($this->f("StatAppID"));
        $this->OfficeID->SetDBValue(trim($this->f("OfficeID")));
        $this->OrigApptMonth->SetDBValue($this->f("OrigApptMonth"));
        $this->DetailedID->SetDBValue(trim($this->f("DetailedID")));
        $this->DetailedOffice->SetDBValue($this->f("DetailedOffice"));
        $this->DetailedDate->SetDBValue(trim($this->f("DetailedDate")));
        $this->DetailedRemarks->SetDBValue($this->f("DetailedRemarks"));
        $this->EffectiveDay->SetDBValue($this->f("EffectiveDay"));
        $this->EffectiveYear->SetDBValue($this->f("EffectiveYear"));
        $this->OrigApptDay->SetDBValue($this->f("OrigApptDay"));
        $this->OrigApptYear->SetDBValue($this->f("OrigApptYear"));
        $this->LastService->SetDBValue($this->f("LastService"));
        $this->TextBox1->SetDBValue($this->f("LastServiceMonth"));
        $this->TextBox2->SetDBValue($this->f("LastServiceDay"));
        $this->CheckBox1->SetDBValue(trim($this->f("ReassignmentID")));
        $this->TextBox4->SetDBValue(trim($this->f("ReassignmentOffice")));
        $this->TextBox5->SetDBValue(trim($this->f("ReassignmentDate")));
        $this->ListBox8->SetDBValue($this->f("SecRecPurposeID"));
        $this->TextBox7->SetDBValue($this->f("ReassignmentRemarks"));
        $this->TextBox11->SetDBValue($this->f("SalaryWords"));
        $this->ListBox18->SetDBValue($this->f("CertMonth"));
        $this->ListBox20->SetDBValue($this->f("CertYear"));
        $this->ListBox19->SetDBValue($this->f("CertDay"));
        $this->ListBox1->SetDBValue(trim($this->f("ModeSeparatnID")));
        $this->ListBox2->SetDBValue($this->f("Rate"));
        $this->ListBox3->SetDBValue($this->f("StatID"));
        $this->TextBox3->SetDBValue(trim($this->f("EntrancePGNS")));
        $this->TextBox6->SetDBValue(trim($this->f("PrevEmpFrom")));
        $this->TextBox8->SetDBValue(trim($this->f("PrevEmpTo")));
        $this->TextBox9->SetDBValue(trim($this->f("PrevEmpFrom2")));
        $this->TextBox10->SetDBValue(trim($this->f("PrevEmpTo2")));
        $this->TextBox12->SetDBValue(trim($this->f("PrevEmpFrom3")));
        $this->TextBox13->SetDBValue(trim($this->f("PrevEmpTo3")));
        $this->TextBox14->SetDBValue(trim($this->f("PrevEmpFrom4")));
        $this->TextBox15->SetDBValue(trim($this->f("PrevEmpTo4")));
        $this->TextBox16->SetDBValue(trim($this->f("PrevEmpFrom5")));
        $this->TextBox17->SetDBValue(trim($this->f("PrevEmpTo5")));
    }
//End SetValues Method

//Update Method @33-1E982911
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Position"]["Value"] = $this->Position->GetDBValue(true);
        $this->UpdateFields["EffectiveMonth"]["Value"] = $this->EffectiveMonth->GetDBValue(true);
        $this->UpdateFields["MonthlySalary"]["Value"] = $this->MonthlySalary->GetDBValue(true);
        $this->UpdateFields["StatAppID"]["Value"] = $this->StatAppt->GetDBValue(true);
        $this->UpdateFields["OfficeID"]["Value"] = $this->OfficeID->GetDBValue(true);
        $this->UpdateFields["OrigApptMonth"]["Value"] = $this->OrigApptMonth->GetDBValue(true);
        $this->UpdateFields["DetailedID"]["Value"] = $this->DetailedID->GetDBValue(true);
        $this->UpdateFields["DetailedOffice"]["Value"] = $this->DetailedOffice->GetDBValue(true);
        $this->UpdateFields["DetailedDate"]["Value"] = $this->DetailedDate->GetDBValue(true);
        $this->UpdateFields["DetailedRemarks"]["Value"] = $this->DetailedRemarks->GetDBValue(true);
        $this->UpdateFields["EffectiveDay"]["Value"] = $this->EffectiveDay->GetDBValue(true);
        $this->UpdateFields["EffectiveYear"]["Value"] = $this->EffectiveYear->GetDBValue(true);
        $this->UpdateFields["OrigApptDay"]["Value"] = $this->OrigApptDay->GetDBValue(true);
        $this->UpdateFields["OrigApptYear"]["Value"] = $this->OrigApptYear->GetDBValue(true);
        $this->UpdateFields["LastService"]["Value"] = $this->LastService->GetDBValue(true);
        $this->UpdateFields["LastServiceMonth"]["Value"] = $this->TextBox1->GetDBValue(true);
        $this->UpdateFields["LastServiceDay"]["Value"] = $this->TextBox2->GetDBValue(true);
        $this->UpdateFields["ReassignmentID"]["Value"] = $this->CheckBox1->GetDBValue(true);
        $this->UpdateFields["ReassignmentOffice"]["Value"] = $this->TextBox4->GetDBValue(true);
        $this->UpdateFields["ReassignmentDate"]["Value"] = $this->TextBox5->GetDBValue(true);
        $this->UpdateFields["SecRecPurposeID"]["Value"] = $this->ListBox8->GetDBValue(true);
        $this->UpdateFields["ReassignmentRemarks"]["Value"] = $this->TextBox7->GetDBValue(true);
        $this->UpdateFields["SalaryWords"]["Value"] = $this->TextBox11->GetDBValue(true);
        $this->UpdateFields["CertMonth"]["Value"] = $this->ListBox18->GetDBValue(true);
        $this->UpdateFields["CertYear"]["Value"] = $this->ListBox20->GetDBValue(true);
        $this->UpdateFields["CertDay"]["Value"] = $this->ListBox19->GetDBValue(true);
        $this->UpdateFields["ModeSeparatnID"]["Value"] = $this->ListBox1->GetDBValue(true);
        $this->UpdateFields["Rate"]["Value"] = $this->ListBox2->GetDBValue(true);
        $this->UpdateFields["StatID"]["Value"] = $this->ListBox3->GetDBValue(true);
        $this->UpdateFields["EntrancePGNS"]["Value"] = $this->TextBox3->GetDBValue(true);
        $this->UpdateFields["PrevEmpFrom"]["Value"] = $this->TextBox6->GetDBValue(true);
        $this->UpdateFields["PrevEmpTo"]["Value"] = $this->TextBox8->GetDBValue(true);
        $this->UpdateFields["PrevEmpFrom2"]["Value"] = $this->TextBox9->GetDBValue(true);
        $this->UpdateFields["PrevEmpTo2"]["Value"] = $this->TextBox10->GetDBValue(true);
        $this->UpdateFields["PrevEmpFrom3"]["Value"] = $this->TextBox12->GetDBValue(true);
        $this->UpdateFields["PrevEmpTo3"]["Value"] = $this->TextBox13->GetDBValue(true);
        $this->UpdateFields["PrevEmpFrom4"]["Value"] = $this->TextBox14->GetDBValue(true);
        $this->UpdateFields["PrevEmpTo4"]["Value"] = $this->TextBox15->GetDBValue(true);
        $this->UpdateFields["PrevEmpFrom5"]["Value"] = $this->TextBox16->GetDBValue(true);
        $this->UpdateFields["PrevEmpTo5"]["Value"] = $this->TextBox17->GetDBValue(true);
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

} //End employee1DataSource Class @33-FCB6E20C



//Initialize Page @1-0F312EF7
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
$TemplateFileName = "CurrentPosition.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-42E7620F
CCSecurityRedirect("7;6;5", "");
//End Authenticate User

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
