<?php
//Include Common Files @1-F5579192
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ServiceRecord2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsEditableGridemployee_servicerecord { //employee_servicerecord Class @2-72C71555

//Variables @2-F667987F

    // Public variables
    var $ComponentType = "EditableGrid";
    var $ComponentName;
    var $HTMLFormAction;
    var $PressedButton;
    var $Errors;
    var $ErrorBlock;
    var $FormSubmitted;
    var $FormParameters;
    var $FormState;
    var $FormEnctype;
    var $CachedColumns;
    var $TotalRows;
    var $UpdatedRows;
    var $EmptyRows;
    var $Visible;
    var $RowsErrors;
    var $ds;
    var $DataSource;
    var $PageSize;
    var $IsEmpty;
    var $SorterName = "";
    var $SorterDirection = "";
    var $PageNumber;
    var $ControlsVisible = array();

    var $CCSEvents = "";
    var $CCSEventResult;

    var $RelativePath = "";

    var $InsertAllowed = false;
    var $UpdateAllowed = false;
    var $DeleteAllowed = false;
    var $ReadAllowed   = false;
    var $EditMode;
    var $ValidatingControls;
    var $Controls;
    var $ControlsErrors;
    var $RowNumber;
    var $Attributes;
    var $PrimaryKeys;

    // Class variables
//End Variables

//Class_Initialize Event @2-42499889
    function clsEditableGridemployee_servicerecord($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "EditableGrid employee_servicerecord/Error";
        $this->ControlsErrors = array();
        $this->ComponentName = "employee_servicerecord";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->CachedColumns["ServiceRecID"][0] = "ServiceRecID";
        $this->DataSource = new clsemployee_servicerecordDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 50;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: EditableGrid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->EmptyRows = 3;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if(!$this->Visible) return;

        $CCSForm = CCGetFromGet("ccsForm", "");
        $this->FormEnctype = "application/x-www-form-urlencoded";
        $this->FormSubmitted = ($CCSForm == $this->ComponentName);
        if($this->FormSubmitted) {
            $this->FormState = CCGetFromPost("FormState", "");
            $this->SetFormState($this->FormState);
        } else {
            $this->FormState = "";
        }
        $Method = $this->FormSubmitted ? ccsPost : ccsGet;

        $this->employee_servicerecord_TotalRecords = & new clsControl(ccsLabel, "employee_servicerecord_TotalRecords", "employee_servicerecord_TotalRecords", ccsText, "", NULL, $this);
        $this->EmployeeID = & new clsControl(ccsTextBox, "EmployeeID", "Employee ID", ccsInteger, "", NULL, $this);
        $this->EmployeeID->Required = true;
        $this->DateFrom = & new clsControl(ccsTextBox, "DateFrom", "Date From", ccsDate, $DefaultDateFormat, NULL, $this);
        $this->DateFrom->Required = true;
        $this->DatePicker_DateFrom = & new clsDatePicker("DatePicker_DateFrom", "employee_servicerecord", "DateFrom", $this);
        $this->DateTo = & new clsControl(ccsTextBox, "DateTo", "Date To", ccsText, "", NULL, $this);
        $this->Designation = & new clsControl(ccsTextBox, "Designation", "Designation", ccsText, "", NULL, $this);
        $this->StatofAppt = & new clsControl(ccsTextBox, "StatofAppt", "Statof Appt", ccsText, "", NULL, $this);
        $this->AnnualSalary = & new clsControl(ccsTextBox, "AnnualSalary", "Annual Salary", ccsSingle, "", NULL, $this);
        $this->OfficeStatn = & new clsControl(ccsTextBox, "OfficeStatn", "Office Statn", ccsText, "", NULL, $this);
        $this->Branch = & new clsControl(ccsTextBox, "Branch", "Branch", ccsText, "", NULL, $this);
        $this->AbsenceWOPay = & new clsControl(ccsTextBox, "AbsenceWOPay", "Absence WOPay", ccsText, "", NULL, $this);
        $this->Separation = & new clsControl(ccsTextBox, "Separation", "Separation", ccsText, "", NULL, $this);
        $this->CheckBox_Delete_Panel = & new clsPanel("CheckBox_Delete_Panel", $this);
        $this->CheckBox_Delete = & new clsControl(ccsCheckBox, "CheckBox_Delete", "CheckBox_Delete", ccsBoolean, $CCSLocales->GetFormatInfo("BooleanFormat"), NULL, $this);
        $this->CheckBox_Delete->CheckedValue = true;
        $this->CheckBox_Delete->UncheckedValue = false;
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->Button_Submit = & new clsButton("Button_Submit", $Method, $this);
        $this->Cancel = & new clsButton("Cancel", $Method, $this);
        $this->CheckBox_Delete_Panel->AddComponent("CheckBox_Delete", $this->CheckBox_Delete);
    }
//End Class_Initialize Event

//Initialize Method @2-CC58A334
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);

        $this->DataSource->Parameters["urlServiceRecID"] = CCGetFromGet("ServiceRecID", NULL);
    }
//End Initialize Method

//SetPrimaryKeys Method @2-EBC3F86C
    function SetPrimaryKeys($PrimaryKeys) {
        $this->PrimaryKeys = $PrimaryKeys;
        return $this->PrimaryKeys;
    }
//End SetPrimaryKeys Method

//GetPrimaryKeys Method @2-74F9A772
    function GetPrimaryKeys() {
        return $this->PrimaryKeys;
    }
//End GetPrimaryKeys Method

//GetFormParameters Method @2-DDCDF428
    function GetFormParameters()
    {
        for($RowNumber = 1; $RowNumber <= $this->TotalRows; $RowNumber++)
        {
            $this->FormParameters["EmployeeID"][$RowNumber] = CCGetFromPost("EmployeeID_" . $RowNumber, NULL);
            $this->FormParameters["DateFrom"][$RowNumber] = CCGetFromPost("DateFrom_" . $RowNumber, NULL);
            $this->FormParameters["DateTo"][$RowNumber] = CCGetFromPost("DateTo_" . $RowNumber, NULL);
            $this->FormParameters["Designation"][$RowNumber] = CCGetFromPost("Designation_" . $RowNumber, NULL);
            $this->FormParameters["StatofAppt"][$RowNumber] = CCGetFromPost("StatofAppt_" . $RowNumber, NULL);
            $this->FormParameters["AnnualSalary"][$RowNumber] = CCGetFromPost("AnnualSalary_" . $RowNumber, NULL);
            $this->FormParameters["OfficeStatn"][$RowNumber] = CCGetFromPost("OfficeStatn_" . $RowNumber, NULL);
            $this->FormParameters["Branch"][$RowNumber] = CCGetFromPost("Branch_" . $RowNumber, NULL);
            $this->FormParameters["AbsenceWOPay"][$RowNumber] = CCGetFromPost("AbsenceWOPay_" . $RowNumber, NULL);
            $this->FormParameters["Separation"][$RowNumber] = CCGetFromPost("Separation_" . $RowNumber, NULL);
            $this->FormParameters["CheckBox_Delete"][$RowNumber] = CCGetFromPost("CheckBox_Delete_" . $RowNumber, NULL);
        }
    }
//End GetFormParameters Method

//Validate Method @2-931BC021
    function Validate()
    {
        $Validation = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);

        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["ServiceRecID"] = $this->CachedColumns["ServiceRecID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->EmployeeID->SetText($this->FormParameters["EmployeeID"][$this->RowNumber], $this->RowNumber);
            $this->DateFrom->SetText($this->FormParameters["DateFrom"][$this->RowNumber], $this->RowNumber);
            $this->DateTo->SetText($this->FormParameters["DateTo"][$this->RowNumber], $this->RowNumber);
            $this->Designation->SetText($this->FormParameters["Designation"][$this->RowNumber], $this->RowNumber);
            $this->StatofAppt->SetText($this->FormParameters["StatofAppt"][$this->RowNumber], $this->RowNumber);
            $this->AnnualSalary->SetText($this->FormParameters["AnnualSalary"][$this->RowNumber], $this->RowNumber);
            $this->OfficeStatn->SetText($this->FormParameters["OfficeStatn"][$this->RowNumber], $this->RowNumber);
            $this->Branch->SetText($this->FormParameters["Branch"][$this->RowNumber], $this->RowNumber);
            $this->AbsenceWOPay->SetText($this->FormParameters["AbsenceWOPay"][$this->RowNumber], $this->RowNumber);
            $this->Separation->SetText($this->FormParameters["Separation"][$this->RowNumber], $this->RowNumber);
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if(!$this->CheckBox_Delete->Value)
                    $Validation = ($this->ValidateRow() && $Validation);
            }
            else if($this->CheckInsert())
            {
                $Validation = ($this->ValidateRow() && $Validation);
            }
        }
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//ValidateRow Method @2-1B418425
    function ValidateRow()
    {
        global $CCSLocales;
        $this->EmployeeID->Validate();
        $this->DateFrom->Validate();
        $this->DateTo->Validate();
        $this->Designation->Validate();
        $this->StatofAppt->Validate();
        $this->AnnualSalary->Validate();
        $this->OfficeStatn->Validate();
        $this->Branch->Validate();
        $this->AbsenceWOPay->Validate();
        $this->Separation->Validate();
        $this->CheckBox_Delete->Validate();
        $this->RowErrors = new clsErrors();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidateRow", $this);
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Designation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatofAppt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AnnualSalary->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeStatn->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Branch->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AbsenceWOPay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Separation->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CheckBox_Delete->Errors->ToString());
        $this->EmployeeID->Errors->Clear();
        $this->DateFrom->Errors->Clear();
        $this->DateTo->Errors->Clear();
        $this->Designation->Errors->Clear();
        $this->StatofAppt->Errors->Clear();
        $this->AnnualSalary->Errors->Clear();
        $this->OfficeStatn->Errors->Clear();
        $this->Branch->Errors->Clear();
        $this->AbsenceWOPay->Errors->Clear();
        $this->Separation->Errors->Clear();
        $this->CheckBox_Delete->Errors->Clear();
        $errors = ComposeStrings($errors, $this->RowErrors->ToString());
        $this->RowsErrors[$this->RowNumber] = $errors;
        return $errors != "" ? 0 : 1;
    }
//End ValidateRow Method

//CheckInsert Method @2-73EE3619
    function CheckInsert()
    {
        $filed = false;
        $filed = ($filed || (is_array($this->FormParameters["EmployeeID"][$this->RowNumber]) && count($this->FormParameters["EmployeeID"][$this->RowNumber])) || strlen($this->FormParameters["EmployeeID"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["DateFrom"][$this->RowNumber]) && count($this->FormParameters["DateFrom"][$this->RowNumber])) || strlen($this->FormParameters["DateFrom"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["DateTo"][$this->RowNumber]) && count($this->FormParameters["DateTo"][$this->RowNumber])) || strlen($this->FormParameters["DateTo"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Designation"][$this->RowNumber]) && count($this->FormParameters["Designation"][$this->RowNumber])) || strlen($this->FormParameters["Designation"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["StatofAppt"][$this->RowNumber]) && count($this->FormParameters["StatofAppt"][$this->RowNumber])) || strlen($this->FormParameters["StatofAppt"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["AnnualSalary"][$this->RowNumber]) && count($this->FormParameters["AnnualSalary"][$this->RowNumber])) || strlen($this->FormParameters["AnnualSalary"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["OfficeStatn"][$this->RowNumber]) && count($this->FormParameters["OfficeStatn"][$this->RowNumber])) || strlen($this->FormParameters["OfficeStatn"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Branch"][$this->RowNumber]) && count($this->FormParameters["Branch"][$this->RowNumber])) || strlen($this->FormParameters["Branch"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["AbsenceWOPay"][$this->RowNumber]) && count($this->FormParameters["AbsenceWOPay"][$this->RowNumber])) || strlen($this->FormParameters["AbsenceWOPay"][$this->RowNumber]));
        $filed = ($filed || (is_array($this->FormParameters["Separation"][$this->RowNumber]) && count($this->FormParameters["Separation"][$this->RowNumber])) || strlen($this->FormParameters["Separation"][$this->RowNumber]));
        return $filed;
    }
//End CheckInsert Method

//CheckErrors Method @2-F5A3B433
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-6B923CC2
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted)
            return;

        $this->GetFormParameters();
        $this->PressedButton = "Button_Submit";
        if($this->Button_Submit->Pressed) {
            $this->PressedButton = "Button_Submit";
        } else if($this->Cancel->Pressed) {
            $this->PressedButton = "Cancel";
        }

        $Redirect = $FileName . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Submit") {
            if(!CCGetEvent($this->Button_Submit->CCSEvents, "OnClick", $this->Button_Submit) || !$this->UpdateGrid()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Cancel") {
            if(!CCGetEvent($this->Cancel->CCSEvents, "OnClick", $this->Cancel)) {
                $Redirect = "";
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//UpdateGrid Method @2-9264EB2F
    function UpdateGrid()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSubmit", $this);
        if(!$this->Validate()) return;
        $Validation = true;
        for($this->RowNumber = 1; $this->RowNumber <= $this->TotalRows; $this->RowNumber++)
        {
            $this->DataSource->CachedColumns["ServiceRecID"] = $this->CachedColumns["ServiceRecID"][$this->RowNumber];
            $this->DataSource->CurrentRow = $this->RowNumber;
            $this->EmployeeID->SetText($this->FormParameters["EmployeeID"][$this->RowNumber], $this->RowNumber);
            $this->DateFrom->SetText($this->FormParameters["DateFrom"][$this->RowNumber], $this->RowNumber);
            $this->DateTo->SetText($this->FormParameters["DateTo"][$this->RowNumber], $this->RowNumber);
            $this->Designation->SetText($this->FormParameters["Designation"][$this->RowNumber], $this->RowNumber);
            $this->StatofAppt->SetText($this->FormParameters["StatofAppt"][$this->RowNumber], $this->RowNumber);
            $this->AnnualSalary->SetText($this->FormParameters["AnnualSalary"][$this->RowNumber], $this->RowNumber);
            $this->OfficeStatn->SetText($this->FormParameters["OfficeStatn"][$this->RowNumber], $this->RowNumber);
            $this->Branch->SetText($this->FormParameters["Branch"][$this->RowNumber], $this->RowNumber);
            $this->AbsenceWOPay->SetText($this->FormParameters["AbsenceWOPay"][$this->RowNumber], $this->RowNumber);
            $this->Separation->SetText($this->FormParameters["Separation"][$this->RowNumber], $this->RowNumber);
            $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
            if ($this->UpdatedRows >= $this->RowNumber) {
                if($this->CheckBox_Delete->Value) {
                    if($this->DeleteAllowed) { $Validation = ($this->DeleteRow() && $Validation); }
                } else if($this->UpdateAllowed) {
                    $Validation = ($this->UpdateRow() && $Validation);
                }
            }
            else if($this->CheckInsert() && $this->InsertAllowed)
            {
                $Validation = ($Validation && $this->InsertRow());
            }
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterSubmit", $this);
        if ($this->Errors->Count() == 0 && $Validation){
            $this->DataSource->close();
            return true;
        }
        return false;
    }
//End UpdateGrid Method

//InsertRow Method @2-FD33DD5A
    function InsertRow()
    {
        if(!$this->InsertAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->Designation->SetValue($this->Designation->GetValue(true));
        $this->DataSource->StatofAppt->SetValue($this->StatofAppt->GetValue(true));
        $this->DataSource->AnnualSalary->SetValue($this->AnnualSalary->GetValue(true));
        $this->DataSource->OfficeStatn->SetValue($this->OfficeStatn->GetValue(true));
        $this->DataSource->Branch->SetValue($this->Branch->GetValue(true));
        $this->DataSource->AbsenceWOPay->SetValue($this->AbsenceWOPay->GetValue(true));
        $this->DataSource->Separation->SetValue($this->Separation->GetValue(true));
        $this->DataSource->Insert();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End InsertRow Method

//UpdateRow Method @2-ACA894B2
    function UpdateRow()
    {
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->Designation->SetValue($this->Designation->GetValue(true));
        $this->DataSource->StatofAppt->SetValue($this->StatofAppt->GetValue(true));
        $this->DataSource->AnnualSalary->SetValue($this->AnnualSalary->GetValue(true));
        $this->DataSource->OfficeStatn->SetValue($this->OfficeStatn->GetValue(true));
        $this->DataSource->Branch->SetValue($this->Branch->GetValue(true));
        $this->DataSource->AbsenceWOPay->SetValue($this->AbsenceWOPay->GetValue(true));
        $this->DataSource->Separation->SetValue($this->Separation->GetValue(true));
        $this->DataSource->Update();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End UpdateRow Method

//DeleteRow Method @2-A4A656F6
    function DeleteRow()
    {
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $errors = "";
        if($this->DataSource->Errors->Count() > 0) {
            $errors = $this->DataSource->Errors->ToString();
            $this->RowsErrors[$this->RowNumber] = $errors;
            $this->DataSource->Errors->Clear();
        }
        return (($this->Errors->Count() == 0) && !strlen($errors));
    }
//End DeleteRow Method

//FormScript Method @2-B6B1FAA5
    function FormScript($TotalRows)
    {
        $script = "";
        $script .= "\n<script language=\"JavaScript\" type=\"text/javascript\">\n<!--\n";
        $script .= "var employee_servicerecordElements;\n";
        $script .= "var employee_servicerecordEmptyRows = 3;\n";
        $script .= "var " . $this->ComponentName . "EmployeeIDID = 0;\n";
        $script .= "var " . $this->ComponentName . "DateFromID = 1;\n";
        $script .= "var " . $this->ComponentName . "DateToID = 2;\n";
        $script .= "var " . $this->ComponentName . "DesignationID = 3;\n";
        $script .= "var " . $this->ComponentName . "StatofApptID = 4;\n";
        $script .= "var " . $this->ComponentName . "AnnualSalaryID = 5;\n";
        $script .= "var " . $this->ComponentName . "OfficeStatnID = 6;\n";
        $script .= "var " . $this->ComponentName . "BranchID = 7;\n";
        $script .= "var " . $this->ComponentName . "AbsenceWOPayID = 8;\n";
        $script .= "var " . $this->ComponentName . "SeparationID = 9;\n";
        $script .= "var " . $this->ComponentName . "DeleteControl = 10;\n";
        $script .= "\nfunction initemployee_servicerecordElements() {\n";
        $script .= "\tvar ED = document.forms[\"employee_servicerecord\"];\n";
        $script .= "\temployee_servicerecordElements = new Array (\n";
        for($i = 1; $i <= $TotalRows; $i++) {
            $script .= "\t\tnew Array(" . "ED.EmployeeID_" . $i . ", " . "ED.DateFrom_" . $i . ", " . "ED.DateTo_" . $i . ", " . "ED.Designation_" . $i . ", " . "ED.StatofAppt_" . $i . ", " . "ED.AnnualSalary_" . $i . ", " . "ED.OfficeStatn_" . $i . ", " . "ED.Branch_" . $i . ", " . "ED.AbsenceWOPay_" . $i . ", " . "ED.Separation_" . $i . ", " . "ED.CheckBox_Delete_" . $i . ")";
            if($i != $TotalRows) $script .= ",\n";
        }
        $script .= ");\n";
        $script .= "}\n";
        $script .= "\n//-->\n</script>";
        return $script;
    }
//End FormScript Method

//SetFormState Method @2-8D754FF4
    function SetFormState($FormState)
    {
        if(strlen($FormState)) {
            $FormState = str_replace("\\\\", "\\" . ord("\\"), $FormState);
            $FormState = str_replace("\\;", "\\" . ord(";"), $FormState);
            $pieces = explode(";", $FormState);
            $this->UpdatedRows = $pieces[0];
            $this->EmptyRows   = $pieces[1];
            $this->TotalRows = $this->UpdatedRows + $this->EmptyRows;
            $RowNumber = 0;
            for($i = 2; $i < sizeof($pieces); $i = $i + 1)  {
                $piece = $pieces[$i + 0];
                $piece = str_replace("\\" . ord("\\"), "\\", $piece);
                $piece = str_replace("\\" . ord(";"), ";", $piece);
                $this->CachedColumns["ServiceRecID"][$RowNumber] = $piece;
                $RowNumber++;
            }

            if(!$RowNumber) { $RowNumber = 1; }
            for($i = 1; $i <= $this->EmptyRows; $i++) {
                $this->CachedColumns["ServiceRecID"][$RowNumber] = "";
                $RowNumber++;
            }
        }
    }
//End SetFormState Method

//GetFormState Method @2-CB7E2444
    function GetFormState($NonEmptyRows)
    {
        if(!$this->FormSubmitted) {
            $this->FormState  = $NonEmptyRows . ";";
            $this->FormState .= $this->InsertAllowed ? $this->EmptyRows : "0";
            if($NonEmptyRows) {
                for($i = 0; $i <= $NonEmptyRows; $i++) {
                    $this->FormState .= ";" . str_replace(";", "\\;", str_replace("\\", "\\\\", $this->CachedColumns["ServiceRecID"][$i]));
                }
            }
        }
        return $this->FormState;
    }
//End GetFormState Method

//Show Method @2-86811650
    function Show()
    {
        global $Tpl;
        global $FileName;
        global $CCSLocales;
        global $CCSUseAmp;
        $Error = "";

        if(!$this->Visible) { return; }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->open();
        $is_next_record = ($this->ReadAllowed && $this->DataSource->next_record());
        $this->IsEmpty = ! $is_next_record;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) { return; }

        $this->Attributes->Show();
        $this->Button_Submit->Visible = $this->Button_Submit->Visible && ($this->InsertAllowed || $this->UpdateAllowed || $this->DeleteAllowed);
        $ParentPath = $Tpl->block_path;
        $EditableGridPath = $ParentPath . "/EditableGrid " . $this->ComponentName;
        $EditableGridRowPath = $ParentPath . "/EditableGrid " . $this->ComponentName . "/Row";
        $Tpl->block_path = $EditableGridRowPath;
        $this->RowNumber = 0;
        $NonEmptyRows = 0;
        $EmptyRowsLeft = $this->EmptyRows;
        $this->ControlsVisible["EmployeeID"] = $this->EmployeeID->Visible;
        $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
        $this->ControlsVisible["DatePicker_DateFrom"] = $this->DatePicker_DateFrom->Visible;
        $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
        $this->ControlsVisible["Designation"] = $this->Designation->Visible;
        $this->ControlsVisible["StatofAppt"] = $this->StatofAppt->Visible;
        $this->ControlsVisible["AnnualSalary"] = $this->AnnualSalary->Visible;
        $this->ControlsVisible["OfficeStatn"] = $this->OfficeStatn->Visible;
        $this->ControlsVisible["Branch"] = $this->Branch->Visible;
        $this->ControlsVisible["AbsenceWOPay"] = $this->AbsenceWOPay->Visible;
        $this->ControlsVisible["Separation"] = $this->Separation->Visible;
        $this->ControlsVisible["CheckBox_Delete_Panel"] = $this->CheckBox_Delete_Panel->Visible;
        $this->ControlsVisible["CheckBox_Delete"] = $this->CheckBox_Delete->Visible;
        if ($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed)) {
            do {
                $this->RowNumber++;
                if($is_next_record) {
                    $NonEmptyRows++;
                    $this->DataSource->SetValues();
                }
                if (!($is_next_record) || !($this->DeleteAllowed)) {
                    $this->CheckBox_Delete->Visible = false;
                    $this->CheckBox_Delete_Panel->Visible = false;
                }
                if (!($this->FormSubmitted) && $is_next_record) {
                    $this->CachedColumns["ServiceRecID"][$this->RowNumber] = $this->DataSource->CachedColumns["ServiceRecID"];
                    $this->CheckBox_Delete->SetValue("");
                    $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                    $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
                    $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
                    $this->Designation->SetValue($this->DataSource->Designation->GetValue());
                    $this->StatofAppt->SetValue($this->DataSource->StatofAppt->GetValue());
                    $this->AnnualSalary->SetValue($this->DataSource->AnnualSalary->GetValue());
                    $this->OfficeStatn->SetValue($this->DataSource->OfficeStatn->GetValue());
                    $this->Branch->SetValue($this->DataSource->Branch->GetValue());
                    $this->AbsenceWOPay->SetValue($this->DataSource->AbsenceWOPay->GetValue());
                    $this->Separation->SetValue($this->DataSource->Separation->GetValue());
                } elseif ($this->FormSubmitted && $is_next_record) {
                    $this->EmployeeID->SetText($this->FormParameters["EmployeeID"][$this->RowNumber], $this->RowNumber);
                    $this->DateFrom->SetText($this->FormParameters["DateFrom"][$this->RowNumber], $this->RowNumber);
                    $this->DateTo->SetText($this->FormParameters["DateTo"][$this->RowNumber], $this->RowNumber);
                    $this->Designation->SetText($this->FormParameters["Designation"][$this->RowNumber], $this->RowNumber);
                    $this->StatofAppt->SetText($this->FormParameters["StatofAppt"][$this->RowNumber], $this->RowNumber);
                    $this->AnnualSalary->SetText($this->FormParameters["AnnualSalary"][$this->RowNumber], $this->RowNumber);
                    $this->OfficeStatn->SetText($this->FormParameters["OfficeStatn"][$this->RowNumber], $this->RowNumber);
                    $this->Branch->SetText($this->FormParameters["Branch"][$this->RowNumber], $this->RowNumber);
                    $this->AbsenceWOPay->SetText($this->FormParameters["AbsenceWOPay"][$this->RowNumber], $this->RowNumber);
                    $this->Separation->SetText($this->FormParameters["Separation"][$this->RowNumber], $this->RowNumber);
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                } elseif (!$this->FormSubmitted) {
                    $this->CachedColumns["ServiceRecID"][$this->RowNumber] = "";
                    $this->EmployeeID->SetText("");
                    $this->DateFrom->SetText("");
                    $this->DateTo->SetText("");
                    $this->Designation->SetText("");
                    $this->StatofAppt->SetText("");
                    $this->AnnualSalary->SetText("");
                    $this->OfficeStatn->SetText("");
                    $this->Branch->SetText("");
                    $this->AbsenceWOPay->SetText("");
                    $this->Separation->SetText("");
                } else {
                    $this->EmployeeID->SetText($this->FormParameters["EmployeeID"][$this->RowNumber], $this->RowNumber);
                    $this->DateFrom->SetText($this->FormParameters["DateFrom"][$this->RowNumber], $this->RowNumber);
                    $this->DateTo->SetText($this->FormParameters["DateTo"][$this->RowNumber], $this->RowNumber);
                    $this->Designation->SetText($this->FormParameters["Designation"][$this->RowNumber], $this->RowNumber);
                    $this->StatofAppt->SetText($this->FormParameters["StatofAppt"][$this->RowNumber], $this->RowNumber);
                    $this->AnnualSalary->SetText($this->FormParameters["AnnualSalary"][$this->RowNumber], $this->RowNumber);
                    $this->OfficeStatn->SetText($this->FormParameters["OfficeStatn"][$this->RowNumber], $this->RowNumber);
                    $this->Branch->SetText($this->FormParameters["Branch"][$this->RowNumber], $this->RowNumber);
                    $this->AbsenceWOPay->SetText($this->FormParameters["AbsenceWOPay"][$this->RowNumber], $this->RowNumber);
                    $this->Separation->SetText($this->FormParameters["Separation"][$this->RowNumber], $this->RowNumber);
                    $this->CheckBox_Delete->SetText($this->FormParameters["CheckBox_Delete"][$this->RowNumber], $this->RowNumber);
                }
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show($this->RowNumber);
                $this->DateFrom->Show($this->RowNumber);
                $this->DatePicker_DateFrom->Show($this->RowNumber);
                $this->DateTo->Show($this->RowNumber);
                $this->Designation->Show($this->RowNumber);
                $this->StatofAppt->Show($this->RowNumber);
                $this->AnnualSalary->Show($this->RowNumber);
                $this->OfficeStatn->Show($this->RowNumber);
                $this->Branch->Show($this->RowNumber);
                $this->AbsenceWOPay->Show($this->RowNumber);
                $this->Separation->Show($this->RowNumber);
                $this->CheckBox_Delete_Panel->Show($this->RowNumber);
                if (isset($this->RowsErrors[$this->RowNumber]) && ($this->RowsErrors[$this->RowNumber] != "")) {
                    $Tpl->setblockvar("RowError", "");
                    $Tpl->setvar("Error", $this->RowsErrors[$this->RowNumber]);
                    $this->Attributes->Show();
                    $Tpl->parse("RowError", false);
                } else {
                    $Tpl->setblockvar("RowError", "");
                }
                $Tpl->setvar("FormScript", $this->FormScript($this->RowNumber));
                $Tpl->parse();
                if ($is_next_record) {
                    if ($this->FormSubmitted) {
                        $is_next_record = $this->RowNumber < $this->UpdatedRows;
                        if (($this->DataSource->CachedColumns["ServiceRecID"] == $this->CachedColumns["ServiceRecID"][$this->RowNumber])) {
                            if ($this->ReadAllowed) $this->DataSource->next_record();
                        }
                    }else{
                        $is_next_record = ($this->RowNumber < $this->PageSize) &&  $this->ReadAllowed && $this->DataSource->next_record();
                    }
                } else { 
                    $EmptyRowsLeft--;
                }
            } while($is_next_record || ($EmptyRowsLeft && $this->InsertAllowed));
        } else {
            $Tpl->block_path = $EditableGridPath;
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $Tpl->block_path = $EditableGridPath;
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if ($this->Navigator->TotalPages <= 1) {
            $this->Navigator->Visible = false;
        }
        $this->employee_servicerecord_TotalRecords->Show();
        $this->Navigator->Show();
        $this->Button_Submit->Show();
        $this->Cancel->Show();

        if($this->CheckErrors()) {
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        if (!$CCSUseAmp) {
            $Tpl->SetVar("HTMLFormProperties", "method=\"POST\" action=\"" . $this->HTMLFormAction . "\" name=\"" . $this->ComponentName . "\"");
        } else {
            $Tpl->SetVar("HTMLFormProperties", "method=\"post\" action=\"" . str_replace("&", "&amp;", $this->HTMLFormAction) . "\" id=\"" . $this->ComponentName . "\"");
        }
        $Tpl->SetVar("FormState", CCToHTML($this->GetFormState($NonEmptyRows)));
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee_servicerecord Class @2-FCB6E20C

class clsemployee_servicerecordDataSource extends clsDBConnection1 {  //employee_servicerecordDataSource Class @2-530A2DAD

//DataSource Variables @2-0E5638F6
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $InsertParameters;
    var $UpdateParameters;
    var $DeleteParameters;
    var $CountSQL;
    var $wp;
    var $AllParametersSet;

    var $CachedColumns;
    var $CurrentRow;
    var $InsertFields = array();
    var $UpdateFields = array();

    // Datasource fields
    var $EmployeeID;
    var $DateFrom;
    var $DateTo;
    var $Designation;
    var $StatofAppt;
    var $AnnualSalary;
    var $OfficeStatn;
    var $Branch;
    var $AbsenceWOPay;
    var $Separation;
    var $CheckBox_Delete;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-C2F97AB9
    function clsemployee_servicerecordDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "EditableGrid employee_servicerecord/Error";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsDate, $this->DateFormat);
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->Designation = new clsField("Designation", ccsText, "");
        
        $this->StatofAppt = new clsField("StatofAppt", ccsText, "");
        
        $this->AnnualSalary = new clsField("AnnualSalary", ccsSingle, "");
        
        $this->OfficeStatn = new clsField("OfficeStatn", ccsText, "");
        
        $this->Branch = new clsField("Branch", ccsText, "");
        
        $this->AbsenceWOPay = new clsField("AbsenceWOPay", ccsText, "");
        
        $this->Separation = new clsField("Separation", ccsText, "");
        
        $this->CheckBox_Delete = new clsField("CheckBox_Delete", ccsBoolean, $this->BooleanFormat);
        

        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Designation"] = array("Name" => "Designation", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StatofAppt"] = array("Name" => "StatofAppt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AnnualSalary"] = array("Name" => "AnnualSalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->InsertFields["OfficeStatn"] = array("Name" => "OfficeStatn", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Branch"] = array("Name" => "Branch", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AbsenceWOPay"] = array("Name" => "AbsenceWOPay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Separation"] = array("Name" => "Separation", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Designation"] = array("Name" => "Designation", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StatofAppt"] = array("Name" => "StatofAppt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AnnualSalary"] = array("Name" => "AnnualSalary", "Value" => "", "DataType" => ccsSingle, "OmitIfEmpty" => 1);
        $this->UpdateFields["OfficeStatn"] = array("Name" => "OfficeStatn", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Branch"] = array("Name" => "Branch", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AbsenceWOPay"] = array("Name" => "AbsenceWOPay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Separation"] = array("Name" => "Separation", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-11DF3D42
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "DateFrom";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-867A0EC8
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlServiceRecID", ccsInteger, "", "", $this->Parameters["urlServiceRecID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "ServiceRecID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-5F06FDCA
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee_servicerecord";
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_servicerecord {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-794ED918
    function SetValues()
    {
        $this->CachedColumns["ServiceRecID"] = $this->f("ServiceRecID");
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->DateFrom->SetDBValue(trim($this->f("DateFrom")));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->Designation->SetDBValue($this->f("Designation"));
        $this->StatofAppt->SetDBValue($this->f("StatofAppt"));
        $this->AnnualSalary->SetDBValue(trim($this->f("AnnualSalary")));
        $this->OfficeStatn->SetDBValue($this->f("OfficeStatn"));
        $this->Branch->SetDBValue($this->f("Branch"));
        $this->AbsenceWOPay->SetDBValue($this->f("AbsenceWOPay"));
        $this->Separation->SetDBValue($this->f("Separation"));
    }
//End SetValues Method

//Insert Method @2-A13897C6
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->InsertFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->InsertFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->InsertFields["Designation"]["Value"] = $this->Designation->GetDBValue(true);
        $this->InsertFields["StatofAppt"]["Value"] = $this->StatofAppt->GetDBValue(true);
        $this->InsertFields["AnnualSalary"]["Value"] = $this->AnnualSalary->GetDBValue(true);
        $this->InsertFields["OfficeStatn"]["Value"] = $this->OfficeStatn->GetDBValue(true);
        $this->InsertFields["Branch"]["Value"] = $this->Branch->GetDBValue(true);
        $this->InsertFields["AbsenceWOPay"]["Value"] = $this->AbsenceWOPay->GetDBValue(true);
        $this->InsertFields["Separation"]["Value"] = $this->Separation->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee_servicerecord", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-383C6B53
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $SelectWhere = $this->Where;
        $this->Where = "ServiceRecID=" . $this->ToSQL($this->CachedColumns["ServiceRecID"], ccsInteger);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->UpdateFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->UpdateFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->UpdateFields["Designation"]["Value"] = $this->Designation->GetDBValue(true);
        $this->UpdateFields["StatofAppt"]["Value"] = $this->StatofAppt->GetDBValue(true);
        $this->UpdateFields["AnnualSalary"]["Value"] = $this->AnnualSalary->GetDBValue(true);
        $this->UpdateFields["OfficeStatn"]["Value"] = $this->OfficeStatn->GetDBValue(true);
        $this->UpdateFields["Branch"]["Value"] = $this->Branch->GetDBValue(true);
        $this->UpdateFields["AbsenceWOPay"]["Value"] = $this->AbsenceWOPay->GetDBValue(true);
        $this->UpdateFields["Separation"]["Value"] = $this->Separation->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employee_servicerecord", $this->UpdateFields, $this);
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
        $this->Where = $SelectWhere;
    }
//End Update Method

//Delete Method @2-966BB8DD
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $SelectWhere = $this->Where;
        $this->Where = "ServiceRecID=" . $this->ToSQL($this->CachedColumns["ServiceRecID"], ccsInteger);
        $this->SQL = "DELETE FROM employee_servicerecord";
        $this->SQL = CCBuildSQL($this->SQL, $this->Where, "");
        if (!strlen($this->Where) && $this->Errors->Count() == 0) 
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
        $this->Where = $SelectWhere;
    }
//End Delete Method

} //End employee_servicerecordDataSource Class @2-FCB6E20C

//Initialize Page @1-CBAA25D9
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
$TemplateFileName = "ServiceRecord2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-751F8C0D
include_once("./ServiceRecord2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-53331D64
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_servicerecord = & new clsEditableGridemployee_servicerecord("", $MainPage);
$MainPage->employee_servicerecord = & $employee_servicerecord;
$employee_servicerecord->Initialize();

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

//Execute Components @1-777D719D
$employee_servicerecord->Operation();
//End Execute Components

//Go to destination page @1-4DCA7C1E
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_servicerecord);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-484D78B1
$employee_servicerecord->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-C375DB0B
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_servicerecord);
unset($Tpl);
//End Unload Page


?>
