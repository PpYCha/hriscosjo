<?php
//Include Common Files @1-6DC1B901
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "VoluntaryWork.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridemployee_voluntaryworkinv { //employee_voluntaryworkinv class @2-99A5DC4A

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

//Class_Initialize Event @2-AC66C89E
    function clsGridemployee_voluntaryworkinv($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_voluntaryworkinv";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employee_voluntaryworkinv";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployee_voluntaryworkinvDataSource($this);
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
        $this->EmployeeID->Page = "VoluntaryWork.php";
        $this->NameAddOrganizatn = & new clsControl(ccsLabel, "NameAddOrganizatn", "NameAddOrganizatn", ccsText, "", CCGetRequestParam("NameAddOrganizatn", ccsGet, NULL), $this);
        $this->DateFrom = & new clsControl(ccsLabel, "DateFrom", "DateFrom", ccsText, "", CCGetRequestParam("DateFrom", ccsGet, NULL), $this);
        $this->DateTo = & new clsControl(ccsLabel, "DateTo", "DateTo", ccsText, "", CCGetRequestParam("DateTo", ccsGet, NULL), $this);
        $this->NoOfHours = & new clsControl(ccsLabel, "NoOfHours", "NoOfHours", ccsText, "", CCGetRequestParam("NoOfHours", ccsGet, NULL), $this);
        $this->PositionNatureWork = & new clsControl(ccsLabel, "PositionNatureWork", "PositionNatureWork", ccsText, "", CCGetRequestParam("PositionNatureWork", ccsGet, NULL), $this);
        $this->employee_voluntaryworkinv_Insert = & new clsControl(ccsLink, "employee_voluntaryworkinv_Insert", "employee_voluntaryworkinv_Insert", ccsText, "", CCGetRequestParam("employee_voluntaryworkinv_Insert", ccsGet, NULL), $this);
        $this->employee_voluntaryworkinv_Insert->Parameters = CCGetQueryString("QueryString", array("VolWorkID", "ccsForm"));
        $this->employee_voluntaryworkinv_Insert->Page = "VoluntaryWork.php";
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

//Show Method @2-B56305C3
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
            $this->ControlsVisible["NameAddOrganizatn"] = $this->NameAddOrganizatn->Visible;
            $this->ControlsVisible["DateFrom"] = $this->DateFrom->Visible;
            $this->ControlsVisible["DateTo"] = $this->DateTo->Visible;
            $this->ControlsVisible["NoOfHours"] = $this->NoOfHours->Visible;
            $this->ControlsVisible["PositionNatureWork"] = $this->PositionNatureWork->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                $this->EmployeeID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->EmployeeID->Parameters = CCAddParam($this->EmployeeID->Parameters, "VolWorkID", $this->DataSource->f("VolWorkID"));
                $this->NameAddOrganizatn->SetValue($this->DataSource->NameAddOrganizatn->GetValue());
                $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
                $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
                $this->NoOfHours->SetValue($this->DataSource->NoOfHours->GetValue());
                $this->PositionNatureWork->SetValue($this->DataSource->PositionNatureWork->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->NameAddOrganizatn->Show();
                $this->DateFrom->Show();
                $this->DateTo->Show();
                $this->NoOfHours->Show();
                $this->PositionNatureWork->Show();
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
        $this->employee_voluntaryworkinv_Insert->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-B6DB46C8
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameAddOrganizatn->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NoOfHours->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionNatureWork->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee_voluntaryworkinv Class @2-FCB6E20C

class clsemployee_voluntaryworkinvDataSource extends clsDBConnection1 {  //employee_voluntaryworkinvDataSource Class @2-E02A1D16

//DataSource Variables @2-9B36194A
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EmployeeID;
    var $NameAddOrganizatn;
    var $DateFrom;
    var $DateTo;
    var $NoOfHours;
    var $PositionNatureWork;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-D0D6FFC7
    function clsemployee_voluntaryworkinvDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employee_voluntaryworkinv";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->NameAddOrganizatn = new clsField("NameAddOrganizatn", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsText, "");
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->NoOfHours = new clsField("NoOfHours", ccsText, "");
        
        $this->PositionNatureWork = new clsField("PositionNatureWork", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-BD71105A
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "VolWorkID";
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

//Open Method @2-5E1ADDE5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee_voluntaryworkinvolve";
        $this->SQL = "SELECT VolWorkID, EmployeeID, NameAddOrganizatn, DateFrom, DateTo, NoOfHours, PositionNatureWork \n\n" .
        "FROM employee_voluntaryworkinvolve {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-30CD5C14
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->NameAddOrganizatn->SetDBValue($this->f("NameAddOrganizatn"));
        $this->DateFrom->SetDBValue($this->f("DateFrom"));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->NoOfHours->SetDBValue($this->f("NoOfHours"));
        $this->PositionNatureWork->SetDBValue($this->f("PositionNatureWork"));
    }
//End SetValues Method

} //End employee_voluntaryworkinvDataSource Class @2-FCB6E20C

class clsRecordemployee_voluntaryworkinv1 { //employee_voluntaryworkinv1 Class @25-04325500

//Variables @25-D6FF3E86

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

//Class_Initialize Event @25-03002B68
    function clsRecordemployee_voluntaryworkinv1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee_voluntaryworkinv1/Error";
        $this->DataSource = new clsemployee_voluntaryworkinv1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee_voluntaryworkinv1";
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
            $this->NameAddOrganizatn = & new clsControl(ccsTextBox, "NameAddOrganizatn", "Name Add Organizatn", ccsText, "", CCGetRequestParam("NameAddOrganizatn", $Method, NULL), $this);
            $this->DateFrom = & new clsControl(ccsTextBox, "DateFrom", "Date From", ccsText, "", CCGetRequestParam("DateFrom", $Method, NULL), $this);
            $this->DateTo = & new clsControl(ccsTextBox, "DateTo", "Date To", ccsText, "", CCGetRequestParam("DateTo", $Method, NULL), $this);
            $this->NoOfHours = & new clsControl(ccsTextBox, "NoOfHours", "No Of Hours", ccsText, "", CCGetRequestParam("NoOfHours", $Method, NULL), $this);
            $this->PositionNatureWork = & new clsControl(ccsTextBox, "PositionNatureWork", "Position Nature Work", ccsText, "", CCGetRequestParam("PositionNatureWork", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @25-EFAF16AC
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlVolWorkID"] = CCGetFromGet("VolWorkID", NULL);
    }
//End Initialize Method

//Validate Method @25-949B7907
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->NameAddOrganizatn->Validate() && $Validation);
        $Validation = ($this->DateFrom->Validate() && $Validation);
        $Validation = ($this->DateTo->Validate() && $Validation);
        $Validation = ($this->NoOfHours->Validate() && $Validation);
        $Validation = ($this->PositionNatureWork->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NameAddOrganizatn->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateFrom->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateTo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NoOfHours->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionNatureWork->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @25-2AE602F0
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->NameAddOrganizatn->Errors->Count());
        $errors = ($errors || $this->DateFrom->Errors->Count());
        $errors = ($errors || $this->DateTo->Errors->Count());
        $errors = ($errors || $this->NoOfHours->Errors->Count());
        $errors = ($errors || $this->PositionNatureWork->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @25-ED598703
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

//Operation Method @25-288F0419
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

//InsertRow Method @25-A3F7AB32
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->NameAddOrganizatn->SetValue($this->NameAddOrganizatn->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->NoOfHours->SetValue($this->NoOfHours->GetValue(true));
        $this->DataSource->PositionNatureWork->SetValue($this->PositionNatureWork->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @25-A6285205
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->NameAddOrganizatn->SetValue($this->NameAddOrganizatn->GetValue(true));
        $this->DataSource->DateFrom->SetValue($this->DateFrom->GetValue(true));
        $this->DataSource->DateTo->SetValue($this->DateTo->GetValue(true));
        $this->DataSource->NoOfHours->SetValue($this->NoOfHours->GetValue(true));
        $this->DataSource->PositionNatureWork->SetValue($this->PositionNatureWork->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @25-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @25-C4DF8E6C
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
                    $this->NameAddOrganizatn->SetValue($this->DataSource->NameAddOrganizatn->GetValue());
                    $this->DateFrom->SetValue($this->DataSource->DateFrom->GetValue());
                    $this->DateTo->SetValue($this->DataSource->DateTo->GetValue());
                    $this->NoOfHours->SetValue($this->DataSource->NoOfHours->GetValue());
                    $this->PositionNatureWork->SetValue($this->DataSource->PositionNatureWork->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NameAddOrganizatn->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateTo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NoOfHours->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionNatureWork->Errors->ToString());
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
        $this->NameAddOrganizatn->Show();
        $this->DateFrom->Show();
        $this->DateTo->Show();
        $this->NoOfHours->Show();
        $this->PositionNatureWork->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee_voluntaryworkinv1 Class @25-FCB6E20C

class clsemployee_voluntaryworkinv1DataSource extends clsDBConnection1 {  //employee_voluntaryworkinv1DataSource Class @25-0976E69B

//DataSource Variables @25-83BD9EC2
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
    var $NameAddOrganizatn;
    var $DateFrom;
    var $DateTo;
    var $NoOfHours;
    var $PositionNatureWork;
//End DataSource Variables

//DataSourceClass_Initialize Event @25-5676DEC9
    function clsemployee_voluntaryworkinv1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee_voluntaryworkinv1/Error";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->NameAddOrganizatn = new clsField("NameAddOrganizatn", ccsText, "");
        
        $this->DateFrom = new clsField("DateFrom", ccsText, "");
        
        $this->DateTo = new clsField("DateTo", ccsText, "");
        
        $this->NoOfHours = new clsField("NoOfHours", ccsText, "");
        
        $this->PositionNatureWork = new clsField("PositionNatureWork", ccsText, "");
        

        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["NameAddOrganizatn"] = array("Name" => "NameAddOrganizatn", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NoOfHours"] = array("Name" => "NoOfHours", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionNatureWork"] = array("Name" => "PositionNatureWork", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["NameAddOrganizatn"] = array("Name" => "NameAddOrganizatn", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateFrom"] = array("Name" => "DateFrom", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateTo"] = array("Name" => "DateTo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NoOfHours"] = array("Name" => "NoOfHours", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionNatureWork"] = array("Name" => "PositionNatureWork", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @25-B7B94055
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlVolWorkID", ccsInteger, "", "", $this->Parameters["urlVolWorkID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "VolWorkID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @25-4CB70085
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_voluntaryworkinvolve {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @25-30CD5C14
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->NameAddOrganizatn->SetDBValue($this->f("NameAddOrganizatn"));
        $this->DateFrom->SetDBValue($this->f("DateFrom"));
        $this->DateTo->SetDBValue($this->f("DateTo"));
        $this->NoOfHours->SetDBValue($this->f("NoOfHours"));
        $this->PositionNatureWork->SetDBValue($this->f("PositionNatureWork"));
    }
//End SetValues Method

//Insert Method @25-105384C2
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->InsertFields["NameAddOrganizatn"]["Value"] = $this->NameAddOrganizatn->GetDBValue(true);
        $this->InsertFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->InsertFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->InsertFields["NoOfHours"]["Value"] = $this->NoOfHours->GetDBValue(true);
        $this->InsertFields["PositionNatureWork"]["Value"] = $this->PositionNatureWork->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee_voluntaryworkinvolve", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @25-16CA8B59
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->UpdateFields["NameAddOrganizatn"]["Value"] = $this->NameAddOrganizatn->GetDBValue(true);
        $this->UpdateFields["DateFrom"]["Value"] = $this->DateFrom->GetDBValue(true);
        $this->UpdateFields["DateTo"]["Value"] = $this->DateTo->GetDBValue(true);
        $this->UpdateFields["NoOfHours"]["Value"] = $this->NoOfHours->GetDBValue(true);
        $this->UpdateFields["PositionNatureWork"]["Value"] = $this->PositionNatureWork->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employee_voluntaryworkinvolve", $this->UpdateFields, $this);
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

//Delete Method @25-83F12BE3
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM employee_voluntaryworkinvolve";
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

} //End employee_voluntaryworkinv1DataSource Class @25-FCB6E20C

//Initialize Page @1-340F4EE1
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
$TemplateFileName = "VoluntaryWork.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5E8EA550
CCSecurityRedirect("7;6", "");
//End Authenticate User

//Include events file @1-507826BC
include_once("./VoluntaryWork_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-A41B7C38
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_voluntaryworkinv = & new clsGridemployee_voluntaryworkinv("", $MainPage);
$employee_voluntaryworkinv1 = & new clsRecordemployee_voluntaryworkinv1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Employee.php";
$MainPage->employee_voluntaryworkinv = & $employee_voluntaryworkinv;
$MainPage->employee_voluntaryworkinv1 = & $employee_voluntaryworkinv1;
$MainPage->Link1 = & $Link1;
$employee_voluntaryworkinv->Initialize();
$employee_voluntaryworkinv1->Initialize();

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

//Execute Components @1-5DF6505D
$employee_voluntaryworkinv1->Operation();
//End Execute Components

//Go to destination page @1-F5560429
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_voluntaryworkinv);
    unset($employee_voluntaryworkinv1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-61625979
$employee_voluntaryworkinv->Show();
$employee_voluntaryworkinv1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-4B2C19E0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_voluntaryworkinv);
unset($employee_voluntaryworkinv1);
unset($Tpl);
//End Unload Page


?>
