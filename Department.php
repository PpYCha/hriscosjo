<?php
//Include Common Files @1-697717DA
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Department.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGriddepartmentoffice { //departmentoffice class @2-10CFDBBB

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

//Class_Initialize Event @2-56757028
    function clsGriddepartmentoffice($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "departmentoffice";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid departmentoffice";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsdepartmentofficeDataSource($this);
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

        $this->OfficeAcronym = & new clsControl(ccsLink, "OfficeAcronym", "OfficeAcronym", ccsText, "", CCGetRequestParam("OfficeAcronym", ccsGet, NULL), $this);
        $this->OfficeAcronym->Page = "Department.php";
        $this->NameOfficeDept = & new clsControl(ccsLabel, "NameOfficeDept", "NameOfficeDept", ccsText, "", CCGetRequestParam("NameOfficeDept", ccsGet, NULL), $this);
        $this->NameOfficeHead = & new clsControl(ccsLabel, "NameOfficeHead", "NameOfficeHead", ccsText, "", CCGetRequestParam("NameOfficeHead", ccsGet, NULL), $this);
        $this->Position = & new clsControl(ccsLabel, "Position", "Position", ccsText, "", CCGetRequestParam("Position", ccsGet, NULL), $this);
        $this->MobileNo = & new clsControl(ccsLabel, "MobileNo", "MobileNo", ccsText, "", CCGetRequestParam("MobileNo", ccsGet, NULL), $this);
        $this->OfficeNo = & new clsControl(ccsLabel, "OfficeNo", "OfficeNo", ccsText, "", CCGetRequestParam("OfficeNo", ccsGet, NULL), $this);
        $this->EmailAdd = & new clsControl(ccsLabel, "EmailAdd", "EmailAdd", ccsText, "", CCGetRequestParam("EmailAdd", ccsGet, NULL), $this);
        $this->departmentoffice_Insert = & new clsControl(ccsLink, "departmentoffice_Insert", "departmentoffice_Insert", ccsText, "", CCGetRequestParam("departmentoffice_Insert", ccsGet, NULL), $this);
        $this->departmentoffice_Insert->Parameters = CCGetQueryString("QueryString", array("OfficeID", "ccsForm"));
        $this->departmentoffice_Insert->Page = "Department.php";
        $this->departmentoffice_TotalRecords = & new clsControl(ccsLabel, "departmentoffice_TotalRecords", "departmentoffice_TotalRecords", ccsText, "", CCGetRequestParam("departmentoffice_TotalRecords", ccsGet, NULL), $this);
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

//Show Method @2-93FEBC36
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_OfficeAcronym"] = CCGetFromGet("s_OfficeAcronym", NULL);
        $this->DataSource->Parameters["urls_NameOfficeDept"] = CCGetFromGet("s_NameOfficeDept", NULL);

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
            $this->ControlsVisible["OfficeAcronym"] = $this->OfficeAcronym->Visible;
            $this->ControlsVisible["NameOfficeDept"] = $this->NameOfficeDept->Visible;
            $this->ControlsVisible["NameOfficeHead"] = $this->NameOfficeHead->Visible;
            $this->ControlsVisible["Position"] = $this->Position->Visible;
            $this->ControlsVisible["MobileNo"] = $this->MobileNo->Visible;
            $this->ControlsVisible["OfficeNo"] = $this->OfficeNo->Visible;
            $this->ControlsVisible["EmailAdd"] = $this->EmailAdd->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->OfficeAcronym->SetValue($this->DataSource->OfficeAcronym->GetValue());
                $this->OfficeAcronym->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->OfficeAcronym->Parameters = CCAddParam($this->OfficeAcronym->Parameters, "OfficeID", $this->DataSource->f("OfficeID"));
                $this->NameOfficeDept->SetValue($this->DataSource->NameOfficeDept->GetValue());
                $this->NameOfficeHead->SetValue($this->DataSource->NameOfficeHead->GetValue());
                $this->Position->SetValue($this->DataSource->Position->GetValue());
                $this->MobileNo->SetValue($this->DataSource->MobileNo->GetValue());
                $this->OfficeNo->SetValue($this->DataSource->OfficeNo->GetValue());
                $this->EmailAdd->SetValue($this->DataSource->EmailAdd->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->OfficeAcronym->Show();
                $this->NameOfficeDept->Show();
                $this->NameOfficeHead->Show();
                $this->Position->Show();
                $this->MobileNo->Show();
                $this->OfficeNo->Show();
                $this->EmailAdd->Show();
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
        $this->departmentoffice_Insert->Show();
        $this->departmentoffice_TotalRecords->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-6B78714D
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->OfficeAcronym->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameOfficeDept->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameOfficeHead->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Position->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobileNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->OfficeNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmailAdd->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End departmentoffice Class @2-FCB6E20C

class clsdepartmentofficeDataSource extends clsDBConnection1 {  //departmentofficeDataSource Class @2-DFEF9E47

//DataSource Variables @2-B8007916
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $OfficeAcronym;
    var $NameOfficeDept;
    var $NameOfficeHead;
    var $Position;
    var $MobileNo;
    var $OfficeNo;
    var $EmailAdd;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-1A70D1B6
    function clsdepartmentofficeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid departmentoffice";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->NameOfficeDept = new clsField("NameOfficeDept", ccsText, "");
        
        $this->NameOfficeHead = new clsField("NameOfficeHead", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->MobileNo = new clsField("MobileNo", ccsText, "");
        
        $this->OfficeNo = new clsField("OfficeNo", ccsText, "");
        
        $this->EmailAdd = new clsField("EmailAdd", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-6544DFB1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "OfficeAcronym";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-F108C549
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_OfficeAcronym", ccsText, "", "", $this->Parameters["urls_OfficeAcronym"], "", false);
        $this->wp->AddParameter("2", "urls_NameOfficeDept", ccsText, "", "", $this->Parameters["urls_NameOfficeDept"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "OfficeAcronym", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "NameOfficeDept", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->Where = $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]);
    }
//End Prepare Method

//Open Method @2-EAA44C35
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM departmentoffice";
        $this->SQL = "SELECT OfficeID, OfficeAcronym, NameOfficeDept, NameOfficeHead, Position, MobileNo, OfficeNo, EmailAdd \n\n" .
        "FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-876CC8B2
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->NameOfficeDept->SetDBValue($this->f("NameOfficeDept"));
        $this->NameOfficeHead->SetDBValue($this->f("NameOfficeHead"));
        $this->Position->SetDBValue($this->f("Position"));
        $this->MobileNo->SetDBValue($this->f("MobileNo"));
        $this->OfficeNo->SetDBValue($this->f("OfficeNo"));
        $this->EmailAdd->SetDBValue($this->f("EmailAdd"));
    }
//End SetValues Method

} //End departmentofficeDataSource Class @2-FCB6E20C

class clsRecorddepartmentofficeSearch { //departmentofficeSearch Class @3-B87CCDBB

//Variables @3-D6FF3E86

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

//Class_Initialize Event @3-1F201833
    function clsRecorddepartmentofficeSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record departmentofficeSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "departmentofficeSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = & new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_OfficeAcronym", "s_NameOfficeDept", "ccsForm"));
            $this->ClearParameters->Page = "Department.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_OfficeAcronym = & new clsControl(ccsTextBox, "s_OfficeAcronym", "s_OfficeAcronym", ccsText, "", CCGetRequestParam("s_OfficeAcronym", $Method, NULL), $this);
            $this->s_NameOfficeDept = & new clsControl(ccsTextBox, "s_NameOfficeDept", "s_NameOfficeDept", ccsText, "", CCGetRequestParam("s_NameOfficeDept", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-56AA787D
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_OfficeAcronym->Validate() && $Validation);
        $Validation = ($this->s_NameOfficeDept->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_OfficeAcronym->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_NameOfficeDept->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-B7EE0630
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->s_NameOfficeDept->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @3-ED598703
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

//Operation Method @3-CA4201D3
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = "Department.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "Department.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-111D4FD8
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
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_OfficeAcronym->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_NameOfficeDept->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->ClearParameters->Show();
        $this->Button_DoSearch->Show();
        $this->s_OfficeAcronym->Show();
        $this->s_NameOfficeDept->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End departmentofficeSearch Class @3-FCB6E20C

class clsRecorddepartmentoffice1 { //departmentoffice1 Class @37-E9C41A50

//Variables @37-D6FF3E86

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

//Class_Initialize Event @37-E94CBAA5
    function clsRecorddepartmentoffice1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record departmentoffice1/Error";
        $this->DataSource = new clsdepartmentoffice1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "departmentoffice1";
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
            $this->OfficeAcronym = & new clsControl(ccsTextBox, "OfficeAcronym", "Office Acronym", ccsText, "", CCGetRequestParam("OfficeAcronym", $Method, NULL), $this);
            $this->NameOfficeDept = & new clsControl(ccsTextBox, "NameOfficeDept", "Name Office Dept", ccsText, "", CCGetRequestParam("NameOfficeDept", $Method, NULL), $this);
            $this->NameOfficeHead = & new clsControl(ccsTextBox, "NameOfficeHead", "Name Office Head", ccsText, "", CCGetRequestParam("NameOfficeHead", $Method, NULL), $this);
            $this->Position = & new clsControl(ccsTextBox, "Position", "Position", ccsText, "", CCGetRequestParam("Position", $Method, NULL), $this);
            $this->MobileNo = & new clsControl(ccsTextBox, "MobileNo", "Mobile No", ccsText, "", CCGetRequestParam("MobileNo", $Method, NULL), $this);
            $this->OfficeNo = & new clsControl(ccsTextBox, "OfficeNo", "Office No", ccsText, "", CCGetRequestParam("OfficeNo", $Method, NULL), $this);
            $this->EmailAdd = & new clsControl(ccsTextBox, "EmailAdd", "Email Add", ccsText, "", CCGetRequestParam("EmailAdd", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @37-DAF5E779
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlOfficeID"] = CCGetFromGet("OfficeID", NULL);
    }
//End Initialize Method

//Validate Method @37-C975E693
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->OfficeAcronym->Validate() && $Validation);
        $Validation = ($this->NameOfficeDept->Validate() && $Validation);
        $Validation = ($this->NameOfficeHead->Validate() && $Validation);
        $Validation = ($this->Position->Validate() && $Validation);
        $Validation = ($this->MobileNo->Validate() && $Validation);
        $Validation = ($this->OfficeNo->Validate() && $Validation);
        $Validation = ($this->EmailAdd->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->OfficeAcronym->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NameOfficeDept->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NameOfficeHead->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Position->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MobileNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->OfficeNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EmailAdd->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @37-14C349DC
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->OfficeAcronym->Errors->Count());
        $errors = ($errors || $this->NameOfficeDept->Errors->Count());
        $errors = ($errors || $this->NameOfficeHead->Errors->Count());
        $errors = ($errors || $this->Position->Errors->Count());
        $errors = ($errors || $this->MobileNo->Errors->Count());
        $errors = ($errors || $this->OfficeNo->Errors->Count());
        $errors = ($errors || $this->EmailAdd->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @37-ED598703
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

//Operation Method @37-288F0419
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

//InsertRow Method @37-7B32C048
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->OfficeAcronym->SetValue($this->OfficeAcronym->GetValue(true));
        $this->DataSource->NameOfficeDept->SetValue($this->NameOfficeDept->GetValue(true));
        $this->DataSource->NameOfficeHead->SetValue($this->NameOfficeHead->GetValue(true));
        $this->DataSource->Position->SetValue($this->Position->GetValue(true));
        $this->DataSource->MobileNo->SetValue($this->MobileNo->GetValue(true));
        $this->DataSource->OfficeNo->SetValue($this->OfficeNo->GetValue(true));
        $this->DataSource->EmailAdd->SetValue($this->EmailAdd->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @37-94C9F71D
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->OfficeAcronym->SetValue($this->OfficeAcronym->GetValue(true));
        $this->DataSource->NameOfficeDept->SetValue($this->NameOfficeDept->GetValue(true));
        $this->DataSource->NameOfficeHead->SetValue($this->NameOfficeHead->GetValue(true));
        $this->DataSource->Position->SetValue($this->Position->GetValue(true));
        $this->DataSource->MobileNo->SetValue($this->MobileNo->GetValue(true));
        $this->DataSource->OfficeNo->SetValue($this->OfficeNo->GetValue(true));
        $this->DataSource->EmailAdd->SetValue($this->EmailAdd->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @37-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @37-A1E0E92B
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
                    $this->OfficeAcronym->SetValue($this->DataSource->OfficeAcronym->GetValue());
                    $this->NameOfficeDept->SetValue($this->DataSource->NameOfficeDept->GetValue());
                    $this->NameOfficeHead->SetValue($this->DataSource->NameOfficeHead->GetValue());
                    $this->Position->SetValue($this->DataSource->Position->GetValue());
                    $this->MobileNo->SetValue($this->DataSource->MobileNo->GetValue());
                    $this->OfficeNo->SetValue($this->DataSource->OfficeNo->GetValue());
                    $this->EmailAdd->SetValue($this->DataSource->EmailAdd->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->OfficeAcronym->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NameOfficeDept->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NameOfficeHead->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Position->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MobileNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->OfficeNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EmailAdd->Errors->ToString());
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
        $this->OfficeAcronym->Show();
        $this->NameOfficeDept->Show();
        $this->NameOfficeHead->Show();
        $this->Position->Show();
        $this->MobileNo->Show();
        $this->OfficeNo->Show();
        $this->EmailAdd->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End departmentoffice1 Class @37-FCB6E20C

class clsdepartmentoffice1DataSource extends clsDBConnection1 {  //departmentoffice1DataSource Class @37-1525427A

//DataSource Variables @37-15861640
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
    var $OfficeAcronym;
    var $NameOfficeDept;
    var $NameOfficeHead;
    var $Position;
    var $MobileNo;
    var $OfficeNo;
    var $EmailAdd;
//End DataSource Variables

//DataSourceClass_Initialize Event @37-5D8BA0F8
    function clsdepartmentoffice1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record departmentoffice1/Error";
        $this->Initialize();
        $this->OfficeAcronym = new clsField("OfficeAcronym", ccsText, "");
        
        $this->NameOfficeDept = new clsField("NameOfficeDept", ccsText, "");
        
        $this->NameOfficeHead = new clsField("NameOfficeHead", ccsText, "");
        
        $this->Position = new clsField("Position", ccsText, "");
        
        $this->MobileNo = new clsField("MobileNo", ccsText, "");
        
        $this->OfficeNo = new clsField("OfficeNo", ccsText, "");
        
        $this->EmailAdd = new clsField("EmailAdd", ccsText, "");
        

        $this->InsertFields["OfficeAcronym"] = array("Name" => "OfficeAcronym", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NameOfficeDept"] = array("Name" => "NameOfficeDept", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NameOfficeHead"] = array("Name" => "NameOfficeHead", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Position"] = array("Name" => "Position", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MobileNo"] = array("Name" => "MobileNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["OfficeNo"] = array("Name" => "OfficeNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmailAdd"] = array("Name" => "EmailAdd", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OfficeAcronym"] = array("Name" => "OfficeAcronym", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NameOfficeDept"] = array("Name" => "NameOfficeDept", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NameOfficeHead"] = array("Name" => "NameOfficeHead", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Position"] = array("Name" => "Position", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MobileNo"] = array("Name" => "MobileNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["OfficeNo"] = array("Name" => "OfficeNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmailAdd"] = array("Name" => "EmailAdd", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @37-7000E044
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlOfficeID", ccsInteger, "", "", $this->Parameters["urlOfficeID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "OfficeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @37-B3D1720D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @37-876CC8B2
    function SetValues()
    {
        $this->OfficeAcronym->SetDBValue($this->f("OfficeAcronym"));
        $this->NameOfficeDept->SetDBValue($this->f("NameOfficeDept"));
        $this->NameOfficeHead->SetDBValue($this->f("NameOfficeHead"));
        $this->Position->SetDBValue($this->f("Position"));
        $this->MobileNo->SetDBValue($this->f("MobileNo"));
        $this->OfficeNo->SetDBValue($this->f("OfficeNo"));
        $this->EmailAdd->SetDBValue($this->f("EmailAdd"));
    }
//End SetValues Method

//Insert Method @37-72D627F4
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["OfficeAcronym"]["Value"] = $this->OfficeAcronym->GetDBValue(true);
        $this->InsertFields["NameOfficeDept"]["Value"] = $this->NameOfficeDept->GetDBValue(true);
        $this->InsertFields["NameOfficeHead"]["Value"] = $this->NameOfficeHead->GetDBValue(true);
        $this->InsertFields["Position"]["Value"] = $this->Position->GetDBValue(true);
        $this->InsertFields["MobileNo"]["Value"] = $this->MobileNo->GetDBValue(true);
        $this->InsertFields["OfficeNo"]["Value"] = $this->OfficeNo->GetDBValue(true);
        $this->InsertFields["EmailAdd"]["Value"] = $this->EmailAdd->GetDBValue(true);
        $this->SQL = CCBuildInsert("departmentoffice", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @37-485F4BFE
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["OfficeAcronym"]["Value"] = $this->OfficeAcronym->GetDBValue(true);
        $this->UpdateFields["NameOfficeDept"]["Value"] = $this->NameOfficeDept->GetDBValue(true);
        $this->UpdateFields["NameOfficeHead"]["Value"] = $this->NameOfficeHead->GetDBValue(true);
        $this->UpdateFields["Position"]["Value"] = $this->Position->GetDBValue(true);
        $this->UpdateFields["MobileNo"]["Value"] = $this->MobileNo->GetDBValue(true);
        $this->UpdateFields["OfficeNo"]["Value"] = $this->OfficeNo->GetDBValue(true);
        $this->UpdateFields["EmailAdd"]["Value"] = $this->EmailAdd->GetDBValue(true);
        $this->SQL = CCBuildUpdate("departmentoffice", $this->UpdateFields, $this);
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

//Delete Method @37-0C7D12F4
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM departmentoffice";
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

} //End departmentoffice1DataSource Class @37-FCB6E20C

//Initialize Page @1-26573879
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
$TemplateFileName = "Department.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-4B0BB954
CCSecurityRedirect("3", "");
//End Authenticate User

//Include events file @1-51BF14B7
include_once("./Department_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-5A2E90A9
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$departmentoffice = & new clsGriddepartmentoffice("", $MainPage);
$departmentofficeSearch = & new clsRecorddepartmentofficeSearch("", $MainPage);
$departmentoffice1 = & new clsRecorddepartmentoffice1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "index.php";
$MainPage->departmentoffice = & $departmentoffice;
$MainPage->departmentofficeSearch = & $departmentofficeSearch;
$MainPage->departmentoffice1 = & $departmentoffice1;
$MainPage->Link1 = & $Link1;
$departmentoffice->Initialize();
$departmentoffice1->Initialize();

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

//Execute Components @1-CD7C2CDD
$departmentofficeSearch->Operation();
$departmentoffice1->Operation();
//End Execute Components

//Go to destination page @1-DA9B4227
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($departmentoffice);
    unset($departmentofficeSearch);
    unset($departmentoffice1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B2B49061
$departmentoffice->Show();
$departmentofficeSearch->Show();
$departmentoffice1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-88852A88
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($departmentoffice);
unset($departmentofficeSearch);
unset($departmentoffice1);
unset($Tpl);
//End Unload Page


?>
