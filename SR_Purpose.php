<?php
//Include Common Files @1-4089103B
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "SR_Purpose.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsRecordemployee { //employee Class @2-15CB1A23

//Variables @2-D6FF3E86

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

//Class_Initialize Event @2-AA6B253B
    function clsRecordemployee($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee/Error";
        $this->DataSource = new clsemployeeDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee";
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
            $this->SecRecPurposeID = & new clsControl(ccsListBox, "SecRecPurposeID", "Sec Rec Purpose ID", ccsInteger, "", CCGetRequestParam("SecRecPurposeID", $Method, NULL), $this);
            $this->SecRecPurposeID->DSType = dsTable;
            $this->SecRecPurposeID->DataSource = new clsDBConnection1();
            $this->SecRecPurposeID->ds = & $this->SecRecPurposeID->DataSource;
            $this->SecRecPurposeID->DataSource->SQL = "SELECT * \n" .
"FROM lut_servicerecpurpose {SQL_Where} {SQL_OrderBy}";
            list($this->SecRecPurposeID->BoundColumn, $this->SecRecPurposeID->TextColumn, $this->SecRecPurposeID->DBFormat) = array("SecRecPurposeID", "ServiceRecPurpose", "");
            $this->CertDay = & new clsControl(ccsListBox, "CertDay", "Cert Day", ccsText, "", CCGetRequestParam("CertDay", $Method, NULL), $this);
            $this->CertDay->DSType = dsTable;
            $this->CertDay->DataSource = new clsDBConnection1();
            $this->CertDay->ds = & $this->CertDay->DataSource;
            $this->CertDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_days {SQL_Where} {SQL_OrderBy}";
            list($this->CertDay->BoundColumn, $this->CertDay->TextColumn, $this->CertDay->DBFormat) = array("day", "day", "");
            $this->CertMonth = & new clsControl(ccsListBox, "CertMonth", "Cert Month", ccsText, "", CCGetRequestParam("CertMonth", $Method, NULL), $this);
            $this->CertMonth->DSType = dsTable;
            $this->CertMonth->DataSource = new clsDBConnection1();
            $this->CertMonth->ds = & $this->CertMonth->DataSource;
            $this->CertMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->CertMonth->BoundColumn, $this->CertMonth->TextColumn, $this->CertMonth->DBFormat) = array("Month", "Month", "");
            $this->CertYear = & new clsControl(ccsTextBox, "CertYear", "Cert Year", ccsText, "", CCGetRequestParam("CertYear", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @2-AAA85980
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
    }
//End Initialize Method

//Validate Method @2-3A450A95
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->SecRecPurposeID->Validate() && $Validation);
        $Validation = ($this->CertDay->Validate() && $Validation);
        $Validation = ($this->CertMonth->Validate() && $Validation);
        $Validation = ($this->CertYear->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->SecRecPurposeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CertDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CertMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CertYear->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-73FEBD56
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->SecRecPurposeID->Errors->Count());
        $errors = ($errors || $this->CertDay->Errors->Count());
        $errors = ($errors || $this->CertMonth->Errors->Count());
        $errors = ($errors || $this->CertYear->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @2-ED598703
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

//Operation Method @2-288F0419
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

//InsertRow Method @2-D1DF049E
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->SecRecPurposeID->SetValue($this->SecRecPurposeID->GetValue(true));
        $this->DataSource->CertDay->SetValue($this->CertDay->GetValue(true));
        $this->DataSource->CertMonth->SetValue($this->CertMonth->GetValue(true));
        $this->DataSource->CertYear->SetValue($this->CertYear->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @2-2A7EB2D1
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->SecRecPurposeID->SetValue($this->SecRecPurposeID->GetValue(true));
        $this->DataSource->CertDay->SetValue($this->CertDay->GetValue(true));
        $this->DataSource->CertMonth->SetValue($this->CertMonth->GetValue(true));
        $this->DataSource->CertYear->SetValue($this->CertYear->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @2-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @2-630D5977
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

        $this->SecRecPurposeID->Prepare();
        $this->CertDay->Prepare();
        $this->CertMonth->Prepare();

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
                    $this->SecRecPurposeID->SetValue($this->DataSource->SecRecPurposeID->GetValue());
                    $this->CertDay->SetValue($this->DataSource->CertDay->GetValue());
                    $this->CertMonth->SetValue($this->DataSource->CertMonth->GetValue());
                    $this->CertYear->SetValue($this->DataSource->CertYear->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->SecRecPurposeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CertDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CertMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CertYear->Errors->ToString());
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
        $this->SecRecPurposeID->Show();
        $this->CertDay->Show();
        $this->CertMonth->Show();
        $this->CertYear->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee Class @2-FCB6E20C

class clsemployeeDataSource extends clsDBConnection1 {  //employeeDataSource Class @2-3A1764EA

//DataSource Variables @2-38FFC976
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
    var $SecRecPurposeID;
    var $CertDay;
    var $CertMonth;
    var $CertYear;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-DFABB6CB
    function clsemployeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee/Error";
        $this->Initialize();
        $this->SecRecPurposeID = new clsField("SecRecPurposeID", ccsInteger, "");
        
        $this->CertDay = new clsField("CertDay", ccsText, "");
        
        $this->CertMonth = new clsField("CertMonth", ccsText, "");
        
        $this->CertYear = new clsField("CertYear", ccsText, "");
        

        $this->InsertFields["SecRecPurposeID"] = array("Name" => "SecRecPurposeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["CertDay"] = array("Name" => "CertDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CertMonth"] = array("Name" => "CertMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CertYear"] = array("Name" => "CertYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SecRecPurposeID"] = array("Name" => "SecRecPurposeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertDay"] = array("Name" => "CertDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertMonth"] = array("Name" => "CertMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertYear"] = array("Name" => "CertYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @2-361705F1
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

//Open Method @2-FDA4A403
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

//SetValues Method @2-197DF8D3
    function SetValues()
    {
        $this->SecRecPurposeID->SetDBValue(trim($this->f("SecRecPurposeID")));
        $this->CertDay->SetDBValue($this->f("CertDay"));
        $this->CertMonth->SetDBValue($this->f("CertMonth"));
        $this->CertYear->SetDBValue($this->f("CertYear"));
    }
//End SetValues Method

//Insert Method @2-61493374
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["SecRecPurposeID"]["Value"] = $this->SecRecPurposeID->GetDBValue(true);
        $this->InsertFields["CertDay"]["Value"] = $this->CertDay->GetDBValue(true);
        $this->InsertFields["CertMonth"]["Value"] = $this->CertMonth->GetDBValue(true);
        $this->InsertFields["CertYear"]["Value"] = $this->CertYear->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @2-E71148F1
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["SecRecPurposeID"]["Value"] = $this->SecRecPurposeID->GetDBValue(true);
        $this->UpdateFields["CertDay"]["Value"] = $this->CertDay->GetDBValue(true);
        $this->UpdateFields["CertMonth"]["Value"] = $this->CertMonth->GetDBValue(true);
        $this->UpdateFields["CertYear"]["Value"] = $this->CertYear->GetDBValue(true);
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

//Delete Method @2-C822B971
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

} //End employeeDataSource Class @2-FCB6E20C

//Initialize Page @1-6BC14B4D
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
$TemplateFileName = "SR_Purpose.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-400A7603
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee = & new clsRecordemployee("", $MainPage);
$MainPage->employee = & $employee;
$employee->Initialize();

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

//Execute Components @1-2A73C940
$employee->Operation();
//End Execute Components

//Go to destination page @1-CDB6DC63
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-407081AB
$employee->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-6B533D76
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee);
unset($Tpl);
//End Unload Page


?>
