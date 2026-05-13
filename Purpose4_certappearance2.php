<?php
//Include Common Files @1-E6D15968
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Purpose4_certappearance2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridcert_appearance { //cert_appearance class @2-C3DE5299

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

//Class_Initialize Event @2-DE340AFD
    function clsGridcert_appearance($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "cert_appearance";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid cert_appearance";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clscert_appearanceDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 5;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<br>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->AppearanceName = & new clsControl(ccsLink, "AppearanceName", "AppearanceName", ccsText, "", CCGetRequestParam("AppearanceName", ccsGet, NULL), $this);
        $this->AppearanceName->Page = "Purpose4_certappearance2.php";
        $this->AppearanceID = & new clsControl(ccsLabel, "AppearanceID", "AppearanceID", ccsInteger, "", CCGetRequestParam("AppearanceID", ccsGet, NULL), $this);
        $this->AppearanceDesgntnPlace = & new clsControl(ccsLabel, "AppearanceDesgntnPlace", "AppearanceDesgntnPlace", ccsText, "", CCGetRequestParam("AppearanceDesgntnPlace", ccsGet, NULL), $this);
        $this->AppearancePurpose = & new clsControl(ccsLabel, "AppearancePurpose", "AppearancePurpose", ccsText, "", CCGetRequestParam("AppearancePurpose", ccsGet, NULL), $this);
        $this->CertDay = & new clsControl(ccsLabel, "CertDay", "CertDay", ccsText, "", CCGetRequestParam("CertDay", ccsGet, NULL), $this);
        $this->CertMonth = & new clsControl(ccsLabel, "CertMonth", "CertMonth", ccsText, "", CCGetRequestParam("CertMonth", ccsGet, NULL), $this);
        $this->CertYear = & new clsControl(ccsLabel, "CertYear", "CertYear", ccsText, "", CCGetRequestParam("CertYear", ccsGet, NULL), $this);
        $this->cert_appearance_Insert = & new clsControl(ccsLink, "cert_appearance_Insert", "cert_appearance_Insert", ccsText, "", CCGetRequestParam("cert_appearance_Insert", ccsGet, NULL), $this);
        $this->cert_appearance_Insert->Parameters = CCGetQueryString("QueryString", array("AppearanceID", "ccsForm"));
        $this->cert_appearance_Insert->Page = "Purpose4_certappearance2.php";
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

//Show Method @2-4322609A
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


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
            $this->ControlsVisible["AppearanceName"] = $this->AppearanceName->Visible;
            $this->ControlsVisible["AppearanceID"] = $this->AppearanceID->Visible;
            $this->ControlsVisible["AppearanceDesgntnPlace"] = $this->AppearanceDesgntnPlace->Visible;
            $this->ControlsVisible["AppearancePurpose"] = $this->AppearancePurpose->Visible;
            $this->ControlsVisible["CertDay"] = $this->CertDay->Visible;
            $this->ControlsVisible["CertMonth"] = $this->CertMonth->Visible;
            $this->ControlsVisible["CertYear"] = $this->CertYear->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->AppearanceName->SetValue($this->DataSource->AppearanceName->GetValue());
                $this->AppearanceName->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->AppearanceName->Parameters = CCAddParam($this->AppearanceName->Parameters, "AppearanceID", $this->DataSource->f("AppearanceID"));
                $this->AppearanceID->SetValue($this->DataSource->AppearanceID->GetValue());
                $this->AppearanceDesgntnPlace->SetValue($this->DataSource->AppearanceDesgntnPlace->GetValue());
                $this->AppearancePurpose->SetValue($this->DataSource->AppearancePurpose->GetValue());
                $this->CertDay->SetValue($this->DataSource->CertDay->GetValue());
                $this->CertMonth->SetValue($this->DataSource->CertMonth->GetValue());
                $this->CertYear->SetValue($this->DataSource->CertYear->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->AppearanceName->Show();
                $this->AppearanceID->Show();
                $this->AppearanceDesgntnPlace->Show();
                $this->AppearancePurpose->Show();
                $this->CertDay->Show();
                $this->CertMonth->Show();
                $this->CertYear->Show();
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
        $this->cert_appearance_Insert->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-CCD34292
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->AppearanceName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AppearanceID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AppearanceDesgntnPlace->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AppearancePurpose->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CertYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End cert_appearance Class @2-FCB6E20C

class clscert_appearanceDataSource extends clsDBConnection1 {  //cert_appearanceDataSource Class @2-8D8E59AA

//DataSource Variables @2-A1DC486A
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $AppearanceName;
    var $AppearanceID;
    var $AppearanceDesgntnPlace;
    var $AppearancePurpose;
    var $CertDay;
    var $CertMonth;
    var $CertYear;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-264E0B67
    function clscert_appearanceDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid cert_appearance";
        $this->Initialize();
        $this->AppearanceName = new clsField("AppearanceName", ccsText, "");
        
        $this->AppearanceID = new clsField("AppearanceID", ccsInteger, "");
        
        $this->AppearanceDesgntnPlace = new clsField("AppearanceDesgntnPlace", ccsText, "");
        
        $this->AppearancePurpose = new clsField("AppearancePurpose", ccsText, "");
        
        $this->CertDay = new clsField("CertDay", ccsText, "");
        
        $this->CertMonth = new clsField("CertMonth", ccsText, "");
        
        $this->CertYear = new clsField("CertYear", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9AA9146D
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "AppearanceID desc";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-F251F8A0
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM cert_appearance";
        $this->SQL = "SELECT AppearanceID, AppearanceName, AppearanceDesgntnPlace, AppearancePurpose, CertDay, CertMonth, CertYear \n\n" .
        "FROM cert_appearance {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-6E5129E6
    function SetValues()
    {
        $this->AppearanceName->SetDBValue($this->f("AppearanceName"));
        $this->AppearanceID->SetDBValue(trim($this->f("AppearanceID")));
        $this->AppearanceDesgntnPlace->SetDBValue($this->f("AppearanceDesgntnPlace"));
        $this->AppearancePurpose->SetDBValue($this->f("AppearancePurpose"));
        $this->CertDay->SetDBValue($this->f("CertDay"));
        $this->CertMonth->SetDBValue($this->f("CertMonth"));
        $this->CertYear->SetDBValue($this->f("CertYear"));
    }
//End SetValues Method

} //End cert_appearanceDataSource Class @2-FCB6E20C

class clsRecordcert_appearance1 { //cert_appearance1 Class @27-B840736A

//Variables @27-D6FF3E86

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

//Class_Initialize Event @27-B7016625
    function clsRecordcert_appearance1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record cert_appearance1/Error";
        $this->DataSource = new clscert_appearance1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "cert_appearance1";
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
            $this->AppearanceName = & new clsControl(ccsTextBox, "AppearanceName", "Appearance Name", ccsText, "", CCGetRequestParam("AppearanceName", $Method, NULL), $this);
            $this->AppearanceName->Required = true;
            $this->AppearanceDesgntnPlace = & new clsControl(ccsTextBox, "AppearanceDesgntnPlace", "Appearance Desgntn Place", ccsText, "", CCGetRequestParam("AppearanceDesgntnPlace", $Method, NULL), $this);
            $this->AppearanceDesgntnPlace->Required = true;
            $this->AppearancePurpose = & new clsControl(ccsTextBox, "AppearancePurpose", "Appearance Purpose", ccsText, "", CCGetRequestParam("AppearancePurpose", $Method, NULL), $this);
            $this->AppearancePurpose->Required = true;
            $this->CertDay = & new clsControl(ccsListBox, "CertDay", "Cert Day", ccsText, "", CCGetRequestParam("CertDay", $Method, NULL), $this);
            $this->CertDay->DSType = dsTable;
            $this->CertDay->DataSource = new clsDBConnection1();
            $this->CertDay->ds = & $this->CertDay->DataSource;
            $this->CertDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_days {SQL_Where} {SQL_OrderBy}";
            list($this->CertDay->BoundColumn, $this->CertDay->TextColumn, $this->CertDay->DBFormat) = array("day", "day", "");
            $this->CertDay->Required = true;
            $this->CertMonth = & new clsControl(ccsListBox, "CertMonth", "Cert Month", ccsText, "", CCGetRequestParam("CertMonth", $Method, NULL), $this);
            $this->CertMonth->DSType = dsTable;
            $this->CertMonth->DataSource = new clsDBConnection1();
            $this->CertMonth->ds = & $this->CertMonth->DataSource;
            $this->CertMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->CertMonth->BoundColumn, $this->CertMonth->TextColumn, $this->CertMonth->DBFormat) = array("Month", "Month", "");
            $this->CertMonth->Required = true;
            $this->CertYear = & new clsControl(ccsTextBox, "CertYear", "Cert Year", ccsText, "", CCGetRequestParam("CertYear", $Method, NULL), $this);
            $this->CertYear->Required = true;
        }
    }
//End Class_Initialize Event

//Initialize Method @27-52CFEFF8
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlAppearanceID"] = CCGetFromGet("AppearanceID", NULL);
    }
//End Initialize Method

//Validate Method @27-79503A91
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->AppearanceName->Validate() && $Validation);
        $Validation = ($this->AppearanceDesgntnPlace->Validate() && $Validation);
        $Validation = ($this->AppearancePurpose->Validate() && $Validation);
        $Validation = ($this->CertDay->Validate() && $Validation);
        $Validation = ($this->CertMonth->Validate() && $Validation);
        $Validation = ($this->CertYear->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->AppearanceName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AppearanceDesgntnPlace->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AppearancePurpose->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CertDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CertMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CertYear->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @27-9F8F18AC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->AppearanceName->Errors->Count());
        $errors = ($errors || $this->AppearanceDesgntnPlace->Errors->Count());
        $errors = ($errors || $this->AppearancePurpose->Errors->Count());
        $errors = ($errors || $this->CertDay->Errors->Count());
        $errors = ($errors || $this->CertMonth->Errors->Count());
        $errors = ($errors || $this->CertYear->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @27-ED598703
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

//Operation Method @27-2F4ECA2E
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
        $Redirect = "CertificateofAppeanace.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
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

//InsertRow Method @27-0D002D03
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->AppearanceName->SetValue($this->AppearanceName->GetValue(true));
        $this->DataSource->AppearanceDesgntnPlace->SetValue($this->AppearanceDesgntnPlace->GetValue(true));
        $this->DataSource->AppearancePurpose->SetValue($this->AppearancePurpose->GetValue(true));
        $this->DataSource->CertDay->SetValue($this->CertDay->GetValue(true));
        $this->DataSource->CertMonth->SetValue($this->CertMonth->GetValue(true));
        $this->DataSource->CertYear->SetValue($this->CertYear->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @27-019F1EF5
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->AppearanceName->SetValue($this->AppearanceName->GetValue(true));
        $this->DataSource->AppearanceDesgntnPlace->SetValue($this->AppearanceDesgntnPlace->GetValue(true));
        $this->DataSource->AppearancePurpose->SetValue($this->AppearancePurpose->GetValue(true));
        $this->DataSource->CertDay->SetValue($this->CertDay->GetValue(true));
        $this->DataSource->CertMonth->SetValue($this->CertMonth->GetValue(true));
        $this->DataSource->CertYear->SetValue($this->CertYear->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @27-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @27-7CD91715
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
                    $this->AppearanceName->SetValue($this->DataSource->AppearanceName->GetValue());
                    $this->AppearanceDesgntnPlace->SetValue($this->DataSource->AppearanceDesgntnPlace->GetValue());
                    $this->AppearancePurpose->SetValue($this->DataSource->AppearancePurpose->GetValue());
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
            $Error = ComposeStrings($Error, $this->AppearanceName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AppearanceDesgntnPlace->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AppearancePurpose->Errors->ToString());
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
        $this->AppearanceName->Show();
        $this->AppearanceDesgntnPlace->Show();
        $this->AppearancePurpose->Show();
        $this->CertDay->Show();
        $this->CertMonth->Show();
        $this->CertYear->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End cert_appearance1 Class @27-FCB6E20C

class clscert_appearance1DataSource extends clsDBConnection1 {  //cert_appearance1DataSource Class @27-CBCCBD78

//DataSource Variables @27-6DA3352C
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
    var $AppearanceName;
    var $AppearanceDesgntnPlace;
    var $AppearancePurpose;
    var $CertDay;
    var $CertMonth;
    var $CertYear;
//End DataSource Variables

//DataSourceClass_Initialize Event @27-0BD9BA8D
    function clscert_appearance1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record cert_appearance1/Error";
        $this->Initialize();
        $this->AppearanceName = new clsField("AppearanceName", ccsText, "");
        
        $this->AppearanceDesgntnPlace = new clsField("AppearanceDesgntnPlace", ccsText, "");
        
        $this->AppearancePurpose = new clsField("AppearancePurpose", ccsText, "");
        
        $this->CertDay = new clsField("CertDay", ccsText, "");
        
        $this->CertMonth = new clsField("CertMonth", ccsText, "");
        
        $this->CertYear = new clsField("CertYear", ccsText, "");
        

        $this->InsertFields["AppearanceName"] = array("Name" => "AppearanceName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AppearanceDesgntnPlace"] = array("Name" => "AppearanceDesgntnPlace", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AppearancePurpose"] = array("Name" => "AppearancePurpose", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CertDay"] = array("Name" => "CertDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CertMonth"] = array("Name" => "CertMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CertYear"] = array("Name" => "CertYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AppearanceName"] = array("Name" => "AppearanceName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AppearanceDesgntnPlace"] = array("Name" => "AppearanceDesgntnPlace", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AppearancePurpose"] = array("Name" => "AppearancePurpose", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertDay"] = array("Name" => "CertDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertMonth"] = array("Name" => "CertMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CertYear"] = array("Name" => "CertYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @27-B2006BEA
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlAppearanceID", ccsInteger, "", "", $this->Parameters["urlAppearanceID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "AppearanceID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @27-E8E20FF4
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM cert_appearance {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @27-E0DC014E
    function SetValues()
    {
        $this->AppearanceName->SetDBValue($this->f("AppearanceName"));
        $this->AppearanceDesgntnPlace->SetDBValue($this->f("AppearanceDesgntnPlace"));
        $this->AppearancePurpose->SetDBValue($this->f("AppearancePurpose"));
        $this->CertDay->SetDBValue($this->f("CertDay"));
        $this->CertMonth->SetDBValue($this->f("CertMonth"));
        $this->CertYear->SetDBValue($this->f("CertYear"));
    }
//End SetValues Method

//Insert Method @27-D72BE844
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["AppearanceName"]["Value"] = $this->AppearanceName->GetDBValue(true);
        $this->InsertFields["AppearanceDesgntnPlace"]["Value"] = $this->AppearanceDesgntnPlace->GetDBValue(true);
        $this->InsertFields["AppearancePurpose"]["Value"] = $this->AppearancePurpose->GetDBValue(true);
        $this->InsertFields["CertDay"]["Value"] = $this->CertDay->GetDBValue(true);
        $this->InsertFields["CertMonth"]["Value"] = $this->CertMonth->GetDBValue(true);
        $this->InsertFields["CertYear"]["Value"] = $this->CertYear->GetDBValue(true);
        $this->SQL = CCBuildInsert("cert_appearance", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @27-FE666F45
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["AppearanceName"]["Value"] = $this->AppearanceName->GetDBValue(true);
        $this->UpdateFields["AppearanceDesgntnPlace"]["Value"] = $this->AppearanceDesgntnPlace->GetDBValue(true);
        $this->UpdateFields["AppearancePurpose"]["Value"] = $this->AppearancePurpose->GetDBValue(true);
        $this->UpdateFields["CertDay"]["Value"] = $this->CertDay->GetDBValue(true);
        $this->UpdateFields["CertMonth"]["Value"] = $this->CertMonth->GetDBValue(true);
        $this->UpdateFields["CertYear"]["Value"] = $this->CertYear->GetDBValue(true);
        $this->SQL = CCBuildUpdate("cert_appearance", $this->UpdateFields, $this);
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

//Delete Method @27-FCABB7B6
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM cert_appearance";
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

} //End cert_appearance1DataSource Class @27-FCB6E20C

//Initialize Page @1-0A260AD3
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
$TemplateFileName = "Purpose4_certappearance2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-05C7F15B
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$cert_appearance = & new clsGridcert_appearance("", $MainPage);
$cert_appearance1 = & new clsRecordcert_appearance1("", $MainPage);
$MainPage->cert_appearance = & $cert_appearance;
$MainPage->cert_appearance1 = & $cert_appearance1;
$cert_appearance->Initialize();
$cert_appearance1->Initialize();

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

//Execute Components @1-AC89CE15
$cert_appearance1->Operation();
//End Execute Components

//Go to destination page @1-4F1642DD
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($cert_appearance);
    unset($cert_appearance1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B2299C90
$cert_appearance->Show();
$cert_appearance1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-9E9465C6
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($cert_appearance);
unset($cert_appearance1);
unset($Tpl);
//End Unload Page


?>
