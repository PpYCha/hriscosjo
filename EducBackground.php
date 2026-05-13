<?php
//Include Common Files @1-6119DCFC
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "EducBackground.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridemployee_educbackgrnd { //employee_educbackgrnd class @2-08BFFBE0

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

//Class_Initialize Event @2-10B8C193
    function clsGridemployee_educbackgrnd($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee_educbackgrnd";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid employee_educbackgrnd";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsemployee_educbackgrndDataSource($this);
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
        $this->EmployeeID->Page = "EducBackground.php";
        $this->Level = & new clsControl(ccsLabel, "Level", "Level", ccsText, "", CCGetRequestParam("Level", ccsGet, NULL), $this);
        $this->SchoolName = & new clsControl(ccsLabel, "SchoolName", "SchoolName", ccsText, "", CCGetRequestParam("SchoolName", ccsGet, NULL), $this);
        $this->DegreeCourse = & new clsControl(ccsLabel, "DegreeCourse", "DegreeCourse", ccsText, "", CCGetRequestParam("DegreeCourse", ccsGet, NULL), $this);
        $this->YearFrom = & new clsControl(ccsLabel, "YearFrom", "YearFrom", ccsText, "", CCGetRequestParam("YearFrom", ccsGet, NULL), $this);
        $this->YearTo = & new clsControl(ccsLabel, "YearTo", "YearTo", ccsText, "", CCGetRequestParam("YearTo", ccsGet, NULL), $this);
        $this->HighGradeLevel = & new clsControl(ccsLabel, "HighGradeLevel", "HighGradeLevel", ccsText, "", CCGetRequestParam("HighGradeLevel", ccsGet, NULL), $this);
        $this->YearGrad = & new clsControl(ccsLabel, "YearGrad", "YearGrad", ccsText, "", CCGetRequestParam("YearGrad", ccsGet, NULL), $this);
        $this->Honors = & new clsControl(ccsLabel, "Honors", "Honors", ccsText, "", CCGetRequestParam("Honors", ccsGet, NULL), $this);
        $this->employee_educbackgrnd_Insert = & new clsControl(ccsLink, "employee_educbackgrnd_Insert", "employee_educbackgrnd_Insert", ccsText, "", CCGetRequestParam("employee_educbackgrnd_Insert", ccsGet, NULL), $this);
        $this->employee_educbackgrnd_Insert->Parameters = CCGetQueryString("QueryString", array("EmployeeEducID", "ccsForm"));
        $this->employee_educbackgrnd_Insert->Page = "EducBackground.php";
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

//Show Method @2-4D3AAA10
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
            $this->ControlsVisible["Level"] = $this->Level->Visible;
            $this->ControlsVisible["SchoolName"] = $this->SchoolName->Visible;
            $this->ControlsVisible["DegreeCourse"] = $this->DegreeCourse->Visible;
            $this->ControlsVisible["YearFrom"] = $this->YearFrom->Visible;
            $this->ControlsVisible["YearTo"] = $this->YearTo->Visible;
            $this->ControlsVisible["HighGradeLevel"] = $this->HighGradeLevel->Visible;
            $this->ControlsVisible["YearGrad"] = $this->YearGrad->Visible;
            $this->ControlsVisible["Honors"] = $this->Honors->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeID->SetValue($this->DataSource->EmployeeID->GetValue());
                $this->EmployeeID->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->EmployeeID->Parameters = CCAddParam($this->EmployeeID->Parameters, "EmployeeEducID", $this->DataSource->f("EmployeeEducID"));
                $this->Level->SetValue($this->DataSource->Level->GetValue());
                $this->SchoolName->SetValue($this->DataSource->SchoolName->GetValue());
                $this->DegreeCourse->SetValue($this->DataSource->DegreeCourse->GetValue());
                $this->YearFrom->SetValue($this->DataSource->YearFrom->GetValue());
                $this->YearTo->SetValue($this->DataSource->YearTo->GetValue());
                $this->HighGradeLevel->SetValue($this->DataSource->HighGradeLevel->GetValue());
                $this->YearGrad->SetValue($this->DataSource->YearGrad->GetValue());
                $this->Honors->SetValue($this->DataSource->Honors->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->Level->Show();
                $this->SchoolName->Show();
                $this->DegreeCourse->Show();
                $this->YearFrom->Show();
                $this->YearTo->Show();
                $this->HighGradeLevel->Show();
                $this->YearGrad->Show();
                $this->Honors->Show();
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
        $this->employee_educbackgrnd_Insert->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-FBF68AAF
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Level->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SchoolName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DegreeCourse->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearFrom->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearTo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->HighGradeLevel->Errors->ToString());
        $errors = ComposeStrings($errors, $this->YearGrad->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Honors->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee_educbackgrnd Class @2-FCB6E20C

class clsemployee_educbackgrndDataSource extends clsDBConnection1 {  //employee_educbackgrndDataSource Class @2-B6AA235D

//DataSource Variables @2-E0CA1CE6
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EmployeeID;
    var $Level;
    var $SchoolName;
    var $DegreeCourse;
    var $YearFrom;
    var $YearTo;
    var $HighGradeLevel;
    var $YearGrad;
    var $Honors;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-95EA88C0
    function clsemployee_educbackgrndDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employee_educbackgrnd";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->Level = new clsField("Level", ccsText, "");
        
        $this->SchoolName = new clsField("SchoolName", ccsText, "");
        
        $this->DegreeCourse = new clsField("DegreeCourse", ccsText, "");
        
        $this->YearFrom = new clsField("YearFrom", ccsText, "");
        
        $this->YearTo = new clsField("YearTo", ccsText, "");
        
        $this->HighGradeLevel = new clsField("HighGradeLevel", ccsText, "");
        
        $this->YearGrad = new clsField("YearGrad", ccsText, "");
        
        $this->Honors = new clsField("Honors", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-C5EDC1D4
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "EmployeeEducID";
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

//Open Method @2-839C0A68
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee_educbackgrnd";
        $this->SQL = "SELECT EmployeeEducID, EmployeeID, Level, SchoolName, DegreeCourse, YearFrom, YearTo, HighGradeLevel, YearGrad, Honors \n\n" .
        "FROM employee_educbackgrnd {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-E69C72B8
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->Level->SetDBValue($this->f("Level"));
        $this->SchoolName->SetDBValue($this->f("SchoolName"));
        $this->DegreeCourse->SetDBValue($this->f("DegreeCourse"));
        $this->YearFrom->SetDBValue($this->f("YearFrom"));
        $this->YearTo->SetDBValue($this->f("YearTo"));
        $this->HighGradeLevel->SetDBValue($this->f("HighGradeLevel"));
        $this->YearGrad->SetDBValue($this->f("YearGrad"));
        $this->Honors->SetDBValue($this->f("Honors"));
    }
//End SetValues Method

} //End employee_educbackgrndDataSource Class @2-FCB6E20C

class clsRecordemployee_educbackgrnd1 { //employee_educbackgrnd1 Class @34-EBB2C269

//Variables @34-D6FF3E86

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

//Class_Initialize Event @34-9359C3F6
    function clsRecordemployee_educbackgrnd1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employee_educbackgrnd1/Error";
        $this->DataSource = new clsemployee_educbackgrnd1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employee_educbackgrnd1";
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
            $this->Level = & new clsControl(ccsListBox, "Level", "Level", ccsText, "", CCGetRequestParam("Level", $Method, NULL), $this);
            $this->Level->DSType = dsTable;
            $this->Level->DataSource = new clsDBConnection1();
            $this->Level->ds = & $this->Level->DataSource;
            $this->Level->DataSource->SQL = "SELECT * \n" .
"FROM lut_educbackground {SQL_Where} {SQL_OrderBy}";
            list($this->Level->BoundColumn, $this->Level->TextColumn, $this->Level->DBFormat) = array("EducBackground", "EducBackground", "");
            $this->Level->Required = true;
            $this->SchoolName = & new clsControl(ccsTextBox, "SchoolName", "School Name", ccsText, "", CCGetRequestParam("SchoolName", $Method, NULL), $this);
            $this->DegreeCourse = & new clsControl(ccsTextBox, "DegreeCourse", "Degree Course", ccsText, "", CCGetRequestParam("DegreeCourse", $Method, NULL), $this);
            $this->YearFrom = & new clsControl(ccsTextBox, "YearFrom", "Year From", ccsText, "", CCGetRequestParam("YearFrom", $Method, NULL), $this);
            $this->HighGradeLevel = & new clsControl(ccsTextBox, "HighGradeLevel", "High Grade Level", ccsText, "", CCGetRequestParam("HighGradeLevel", $Method, NULL), $this);
            $this->YearGrad = & new clsControl(ccsTextBox, "YearGrad", "Year Grad", ccsText, "", CCGetRequestParam("YearGrad", $Method, NULL), $this);
            $this->Honors = & new clsControl(ccsTextBox, "Honors", "Honors", ccsText, "", CCGetRequestParam("Honors", $Method, NULL), $this);
            $this->YearTo = & new clsControl(ccsTextBox, "YearTo", "Year To", ccsText, "", CCGetRequestParam("YearTo", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @34-18927A9F
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEmployeeEducID"] = CCGetFromGet("EmployeeEducID", NULL);
    }
//End Initialize Method

//Validate Method @34-3FDD8748
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->EmployeeID->Validate() && $Validation);
        $Validation = ($this->Level->Validate() && $Validation);
        $Validation = ($this->SchoolName->Validate() && $Validation);
        $Validation = ($this->DegreeCourse->Validate() && $Validation);
        $Validation = ($this->YearFrom->Validate() && $Validation);
        $Validation = ($this->HighGradeLevel->Validate() && $Validation);
        $Validation = ($this->YearGrad->Validate() && $Validation);
        $Validation = ($this->Honors->Validate() && $Validation);
        $Validation = ($this->YearTo->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Level->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SchoolName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DegreeCourse->Errors->Count() == 0);
        $Validation =  $Validation && ($this->YearFrom->Errors->Count() == 0);
        $Validation =  $Validation && ($this->HighGradeLevel->Errors->Count() == 0);
        $Validation =  $Validation && ($this->YearGrad->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Honors->Errors->Count() == 0);
        $Validation =  $Validation && ($this->YearTo->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @34-0E59F4F9
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EmployeeID->Errors->Count());
        $errors = ($errors || $this->Level->Errors->Count());
        $errors = ($errors || $this->SchoolName->Errors->Count());
        $errors = ($errors || $this->DegreeCourse->Errors->Count());
        $errors = ($errors || $this->YearFrom->Errors->Count());
        $errors = ($errors || $this->HighGradeLevel->Errors->Count());
        $errors = ($errors || $this->YearGrad->Errors->Count());
        $errors = ($errors || $this->Honors->Errors->Count());
        $errors = ($errors || $this->YearTo->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @34-ED598703
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

//Operation Method @34-288F0419
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

//InsertRow Method @34-42E70047
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->Level->SetValue($this->Level->GetValue(true));
        $this->DataSource->SchoolName->SetValue($this->SchoolName->GetValue(true));
        $this->DataSource->DegreeCourse->SetValue($this->DegreeCourse->GetValue(true));
        $this->DataSource->YearFrom->SetValue($this->YearFrom->GetValue(true));
        $this->DataSource->HighGradeLevel->SetValue($this->HighGradeLevel->GetValue(true));
        $this->DataSource->YearGrad->SetValue($this->YearGrad->GetValue(true));
        $this->DataSource->Honors->SetValue($this->Honors->GetValue(true));
        $this->DataSource->YearTo->SetValue($this->YearTo->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @34-8416B4D4
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EmployeeID->SetValue($this->EmployeeID->GetValue(true));
        $this->DataSource->Level->SetValue($this->Level->GetValue(true));
        $this->DataSource->SchoolName->SetValue($this->SchoolName->GetValue(true));
        $this->DataSource->DegreeCourse->SetValue($this->DegreeCourse->GetValue(true));
        $this->DataSource->YearFrom->SetValue($this->YearFrom->GetValue(true));
        $this->DataSource->HighGradeLevel->SetValue($this->HighGradeLevel->GetValue(true));
        $this->DataSource->YearGrad->SetValue($this->YearGrad->GetValue(true));
        $this->DataSource->Honors->SetValue($this->Honors->GetValue(true));
        $this->DataSource->YearTo->SetValue($this->YearTo->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @34-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @34-0C31D465
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

        $this->Level->Prepare();

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
                    $this->Level->SetValue($this->DataSource->Level->GetValue());
                    $this->SchoolName->SetValue($this->DataSource->SchoolName->GetValue());
                    $this->DegreeCourse->SetValue($this->DataSource->DegreeCourse->GetValue());
                    $this->YearFrom->SetValue($this->DataSource->YearFrom->GetValue());
                    $this->HighGradeLevel->SetValue($this->DataSource->HighGradeLevel->GetValue());
                    $this->YearGrad->SetValue($this->DataSource->YearGrad->GetValue());
                    $this->Honors->SetValue($this->DataSource->Honors->GetValue());
                    $this->YearTo->SetValue($this->DataSource->YearTo->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Level->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SchoolName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DegreeCourse->Errors->ToString());
            $Error = ComposeStrings($Error, $this->YearFrom->Errors->ToString());
            $Error = ComposeStrings($Error, $this->HighGradeLevel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->YearGrad->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Honors->Errors->ToString());
            $Error = ComposeStrings($Error, $this->YearTo->Errors->ToString());
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
        $this->Level->Show();
        $this->SchoolName->Show();
        $this->DegreeCourse->Show();
        $this->YearFrom->Show();
        $this->HighGradeLevel->Show();
        $this->YearGrad->Show();
        $this->Honors->Show();
        $this->YearTo->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee_educbackgrnd1 Class @34-FCB6E20C

class clsemployee_educbackgrnd1DataSource extends clsDBConnection1 {  //employee_educbackgrnd1DataSource Class @34-E82EFEBD

//DataSource Variables @34-4C5E85A6
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
    var $Level;
    var $SchoolName;
    var $DegreeCourse;
    var $YearFrom;
    var $HighGradeLevel;
    var $YearGrad;
    var $Honors;
    var $YearTo;
//End DataSource Variables

//DataSourceClass_Initialize Event @34-6349995A
    function clsemployee_educbackgrnd1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee_educbackgrnd1/Error";
        $this->Initialize();
        $this->EmployeeID = new clsField("EmployeeID", ccsInteger, "");
        
        $this->Level = new clsField("Level", ccsText, "");
        
        $this->SchoolName = new clsField("SchoolName", ccsText, "");
        
        $this->DegreeCourse = new clsField("DegreeCourse", ccsText, "");
        
        $this->YearFrom = new clsField("YearFrom", ccsText, "");
        
        $this->HighGradeLevel = new clsField("HighGradeLevel", ccsText, "");
        
        $this->YearGrad = new clsField("YearGrad", ccsText, "");
        
        $this->Honors = new clsField("Honors", ccsText, "");
        
        $this->YearTo = new clsField("YearTo", ccsText, "");
        

        $this->InsertFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->InsertFields["Level"] = array("Name" => "Level", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SchoolName"] = array("Name" => "SchoolName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DegreeCourse"] = array("Name" => "DegreeCourse", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["YearFrom"] = array("Name" => "YearFrom", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["HighGradeLevel"] = array("Name" => "HighGradeLevel", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["YearGrad"] = array("Name" => "YearGrad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Honors"] = array("Name" => "Honors", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["YearTo"] = array("Name" => "YearTo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeID"] = array("Name" => "EmployeeID", "Value" => "", "DataType" => ccsInteger, "OmitIfEmpty" => 1);
        $this->UpdateFields["Level"] = array("Name" => "Level", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SchoolName"] = array("Name" => "SchoolName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DegreeCourse"] = array("Name" => "DegreeCourse", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["YearFrom"] = array("Name" => "YearFrom", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["HighGradeLevel"] = array("Name" => "HighGradeLevel", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["YearGrad"] = array("Name" => "YearGrad", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Honors"] = array("Name" => "Honors", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["YearTo"] = array("Name" => "YearTo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @34-8BCB400C
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeEducID", ccsInteger, "", "", $this->Parameters["urlEmployeeEducID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "EmployeeEducID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @34-2090089E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee_educbackgrnd {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @34-8A81F2B5
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->Level->SetDBValue($this->f("Level"));
        $this->SchoolName->SetDBValue($this->f("SchoolName"));
        $this->DegreeCourse->SetDBValue($this->f("DegreeCourse"));
        $this->YearFrom->SetDBValue($this->f("YearFrom"));
        $this->HighGradeLevel->SetDBValue($this->f("HighGradeLevel"));
        $this->YearGrad->SetDBValue($this->f("YearGrad"));
        $this->Honors->SetDBValue($this->f("Honors"));
        $this->YearTo->SetDBValue($this->f("YearTo"));
    }
//End SetValues Method

//Insert Method @34-5EE78900
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->InsertFields["Level"]["Value"] = $this->Level->GetDBValue(true);
        $this->InsertFields["SchoolName"]["Value"] = $this->SchoolName->GetDBValue(true);
        $this->InsertFields["DegreeCourse"]["Value"] = $this->DegreeCourse->GetDBValue(true);
        $this->InsertFields["YearFrom"]["Value"] = $this->YearFrom->GetDBValue(true);
        $this->InsertFields["HighGradeLevel"]["Value"] = $this->HighGradeLevel->GetDBValue(true);
        $this->InsertFields["YearGrad"]["Value"] = $this->YearGrad->GetDBValue(true);
        $this->InsertFields["Honors"]["Value"] = $this->Honors->GetDBValue(true);
        $this->InsertFields["YearTo"]["Value"] = $this->YearTo->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee_educbackgrnd", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @34-0A07456F
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["EmployeeID"]["Value"] = $this->EmployeeID->GetDBValue(true);
        $this->UpdateFields["Level"]["Value"] = $this->Level->GetDBValue(true);
        $this->UpdateFields["SchoolName"]["Value"] = $this->SchoolName->GetDBValue(true);
        $this->UpdateFields["DegreeCourse"]["Value"] = $this->DegreeCourse->GetDBValue(true);
        $this->UpdateFields["YearFrom"]["Value"] = $this->YearFrom->GetDBValue(true);
        $this->UpdateFields["HighGradeLevel"]["Value"] = $this->HighGradeLevel->GetDBValue(true);
        $this->UpdateFields["YearGrad"]["Value"] = $this->YearGrad->GetDBValue(true);
        $this->UpdateFields["Honors"]["Value"] = $this->Honors->GetDBValue(true);
        $this->UpdateFields["YearTo"]["Value"] = $this->YearTo->GetDBValue(true);
        $this->SQL = CCBuildUpdate("employee_educbackgrnd", $this->UpdateFields, $this);
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

//Delete Method @34-5306D682
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM employee_educbackgrnd";
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

} //End employee_educbackgrnd1DataSource Class @34-FCB6E20C

//Initialize Page @1-05EB05C8
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
$TemplateFileName = "EducBackground.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5E8EA550
CCSecurityRedirect("7;6", "");
//End Authenticate User

//Include events file @1-2018AA4F
include_once("./EducBackground_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-EE5789C2
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee_educbackgrnd = & new clsGridemployee_educbackgrnd("", $MainPage);
$employee_educbackgrnd1 = & new clsRecordemployee_educbackgrnd1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Employee.php";
$MainPage->employee_educbackgrnd = & $employee_educbackgrnd;
$MainPage->employee_educbackgrnd1 = & $employee_educbackgrnd1;
$MainPage->Link1 = & $Link1;
$employee_educbackgrnd->Initialize();
$employee_educbackgrnd1->Initialize();

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

//Execute Components @1-A7558371
$employee_educbackgrnd1->Operation();
//End Execute Components

//Go to destination page @1-6834F789
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee_educbackgrnd);
    unset($employee_educbackgrnd1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-B3ED3A0B
$employee_educbackgrnd->Show();
$employee_educbackgrnd1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-59F13BE2
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee_educbackgrnd);
unset($employee_educbackgrnd1);
unset($Tpl);
//End Unload Page


?>
