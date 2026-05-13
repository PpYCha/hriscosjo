<?php
//Include Common Files @1-ABC96C8C
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Signatories.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridsignatories { //signatories class @2-BDF2E199

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

//Class_Initialize Event @2-4A9DC130
    function clsGridsignatories($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "signatories";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid signatories";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clssignatoriesDataSource($this);
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

        $this->Signatory1 = & new clsControl(ccsLink, "Signatory1", "Signatory1", ccsText, "", CCGetRequestParam("Signatory1", ccsGet, NULL), $this);
        $this->Signatory1->Page = "Signatories.php";
        $this->PositionSig1 = & new clsControl(ccsLabel, "PositionSig1", "PositionSig1", ccsText, "", CCGetRequestParam("PositionSig1", ccsGet, NULL), $this);
        $this->Signatory2 = & new clsControl(ccsLabel, "Signatory2", "Signatory2", ccsText, "", CCGetRequestParam("Signatory2", ccsGet, NULL), $this);
        $this->PositionSig2 = & new clsControl(ccsLabel, "PositionSig2", "PositionSig2", ccsText, "", CCGetRequestParam("PositionSig2", ccsGet, NULL), $this);
        $this->Signatory3 = & new clsControl(ccsLabel, "Signatory3", "Signatory3", ccsText, "", CCGetRequestParam("Signatory3", ccsGet, NULL), $this);
        $this->PositionSig3 = & new clsControl(ccsLabel, "PositionSig3", "PositionSig3", ccsText, "", CCGetRequestParam("PositionSig3", ccsGet, NULL), $this);
        $this->Signatory4 = & new clsControl(ccsLabel, "Signatory4", "Signatory4", ccsText, "", CCGetRequestParam("Signatory4", ccsGet, NULL), $this);
        $this->PositionSig4 = & new clsControl(ccsLabel, "PositionSig4", "PositionSig4", ccsText, "", CCGetRequestParam("PositionSig4", ccsGet, NULL), $this);
        $this->Signatory5 = & new clsControl(ccsLabel, "Signatory5", "Signatory5", ccsText, "", CCGetRequestParam("Signatory5", ccsGet, NULL), $this);
        $this->PositionSig5 = & new clsControl(ccsLabel, "PositionSig5", "PositionSig5", ccsText, "", CCGetRequestParam("PositionSig5", ccsGet, NULL), $this);
        $this->Signatory6 = & new clsControl(ccsLabel, "Signatory6", "Signatory6", ccsText, "", CCGetRequestParam("Signatory6", ccsGet, NULL), $this);
        $this->PositionSig6 = & new clsControl(ccsLabel, "PositionSig6", "PositionSig6", ccsText, "", CCGetRequestParam("PositionSig6", ccsGet, NULL), $this);
        $this->Signatory7 = & new clsControl(ccsLabel, "Signatory7", "Signatory7", ccsText, "", CCGetRequestParam("Signatory7", ccsGet, NULL), $this);
        $this->PositionSig7 = & new clsControl(ccsLabel, "PositionSig7", "PositionSig7", ccsText, "", CCGetRequestParam("PositionSig7", ccsGet, NULL), $this);
        $this->Signatory8 = & new clsControl(ccsLabel, "Signatory8", "Signatory8", ccsText, "", CCGetRequestParam("Signatory8", ccsGet, NULL), $this);
        $this->PositionSig8 = & new clsControl(ccsLabel, "PositionSig8", "PositionSig8", ccsText, "", CCGetRequestParam("PositionSig8", ccsGet, NULL), $this);
        $this->signatories_Insert = & new clsControl(ccsLink, "signatories_Insert", "signatories_Insert", ccsText, "", CCGetRequestParam("signatories_Insert", ccsGet, NULL), $this);
        $this->signatories_Insert->Parameters = CCGetQueryString("QueryString", array("SigID", "ccsForm"));
        $this->signatories_Insert->Page = "Signatories.php";
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

//Show Method @2-3E10AF26
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
            $this->ControlsVisible["Signatory1"] = $this->Signatory1->Visible;
            $this->ControlsVisible["PositionSig1"] = $this->PositionSig1->Visible;
            $this->ControlsVisible["Signatory2"] = $this->Signatory2->Visible;
            $this->ControlsVisible["PositionSig2"] = $this->PositionSig2->Visible;
            $this->ControlsVisible["Signatory3"] = $this->Signatory3->Visible;
            $this->ControlsVisible["PositionSig3"] = $this->PositionSig3->Visible;
            $this->ControlsVisible["Signatory4"] = $this->Signatory4->Visible;
            $this->ControlsVisible["PositionSig4"] = $this->PositionSig4->Visible;
            $this->ControlsVisible["Signatory5"] = $this->Signatory5->Visible;
            $this->ControlsVisible["PositionSig5"] = $this->PositionSig5->Visible;
            $this->ControlsVisible["Signatory6"] = $this->Signatory6->Visible;
            $this->ControlsVisible["PositionSig6"] = $this->PositionSig6->Visible;
            $this->ControlsVisible["Signatory7"] = $this->Signatory7->Visible;
            $this->ControlsVisible["PositionSig7"] = $this->PositionSig7->Visible;
            $this->ControlsVisible["Signatory8"] = $this->Signatory8->Visible;
            $this->ControlsVisible["PositionSig8"] = $this->PositionSig8->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->Signatory1->SetValue($this->DataSource->Signatory1->GetValue());
                $this->Signatory1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Signatory1->Parameters = CCAddParam($this->Signatory1->Parameters, "SigID", $this->DataSource->f("SigID"));
                $this->PositionSig1->SetValue($this->DataSource->PositionSig1->GetValue());
                $this->Signatory2->SetValue($this->DataSource->Signatory2->GetValue());
                $this->PositionSig2->SetValue($this->DataSource->PositionSig2->GetValue());
                $this->Signatory3->SetValue($this->DataSource->Signatory3->GetValue());
                $this->PositionSig3->SetValue($this->DataSource->PositionSig3->GetValue());
                $this->Signatory4->SetValue($this->DataSource->Signatory4->GetValue());
                $this->PositionSig4->SetValue($this->DataSource->PositionSig4->GetValue());
                $this->Signatory5->SetValue($this->DataSource->Signatory5->GetValue());
                $this->PositionSig5->SetValue($this->DataSource->PositionSig5->GetValue());
                $this->Signatory6->SetValue($this->DataSource->Signatory6->GetValue());
                $this->PositionSig6->SetValue($this->DataSource->PositionSig6->GetValue());
                $this->Signatory7->SetValue($this->DataSource->Signatory7->GetValue());
                $this->PositionSig7->SetValue($this->DataSource->PositionSig7->GetValue());
                $this->Signatory8->SetValue($this->DataSource->Signatory8->GetValue());
                $this->PositionSig8->SetValue($this->DataSource->PositionSig8->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->Signatory1->Show();
                $this->PositionSig1->Show();
                $this->Signatory2->Show();
                $this->PositionSig2->Show();
                $this->Signatory3->Show();
                $this->PositionSig3->Show();
                $this->Signatory4->Show();
                $this->PositionSig4->Show();
                $this->Signatory5->Show();
                $this->PositionSig5->Show();
                $this->Signatory6->Show();
                $this->PositionSig6->Show();
                $this->Signatory7->Show();
                $this->PositionSig7->Show();
                $this->Signatory8->Show();
                $this->PositionSig8->Show();
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
        $this->signatories_Insert->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-9F3F49F8
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Signatory1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory6->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig6->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory7->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig7->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Signatory8->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PositionSig8->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End signatories Class @2-FCB6E20C

class clssignatoriesDataSource extends clsDBConnection1 {  //signatoriesDataSource Class @2-42428611

//DataSource Variables @2-05C91F67
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $Signatory1;
    var $PositionSig1;
    var $Signatory2;
    var $PositionSig2;
    var $Signatory3;
    var $PositionSig3;
    var $Signatory4;
    var $PositionSig4;
    var $Signatory5;
    var $PositionSig5;
    var $Signatory6;
    var $PositionSig6;
    var $Signatory7;
    var $PositionSig7;
    var $Signatory8;
    var $PositionSig8;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-B600D92B
    function clssignatoriesDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid signatories";
        $this->Initialize();
        $this->Signatory1 = new clsField("Signatory1", ccsText, "");
        
        $this->PositionSig1 = new clsField("PositionSig1", ccsText, "");
        
        $this->Signatory2 = new clsField("Signatory2", ccsText, "");
        
        $this->PositionSig2 = new clsField("PositionSig2", ccsText, "");
        
        $this->Signatory3 = new clsField("Signatory3", ccsText, "");
        
        $this->PositionSig3 = new clsField("PositionSig3", ccsText, "");
        
        $this->Signatory4 = new clsField("Signatory4", ccsText, "");
        
        $this->PositionSig4 = new clsField("PositionSig4", ccsText, "");
        
        $this->Signatory5 = new clsField("Signatory5", ccsText, "");
        
        $this->PositionSig5 = new clsField("PositionSig5", ccsText, "");
        
        $this->Signatory6 = new clsField("Signatory6", ccsText, "");
        
        $this->PositionSig6 = new clsField("PositionSig6", ccsText, "");
        
        $this->Signatory7 = new clsField("Signatory7", ccsText, "");
        
        $this->PositionSig7 = new clsField("PositionSig7", ccsText, "");
        
        $this->Signatory8 = new clsField("Signatory8", ccsText, "");
        
        $this->PositionSig8 = new clsField("PositionSig8", ccsText, "");
        

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

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-AAB10795
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM signatories";
        $this->SQL = "SELECT SigID, Signatory1, PositionSig1, Signatory2, PositionSig2, Signatory3, PositionSig3, Signatory4, PositionSig4, Signatory5,\n\n" .
        "PositionSig5, Signatory6, PositionSig6, Signatory7, PositionSig7, Signatory8, PositionSig8 \n\n" .
        "FROM signatories {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-3C02604D
    function SetValues()
    {
        $this->Signatory1->SetDBValue($this->f("Signatory1"));
        $this->PositionSig1->SetDBValue($this->f("PositionSig1"));
        $this->Signatory2->SetDBValue($this->f("Signatory2"));
        $this->PositionSig2->SetDBValue($this->f("PositionSig2"));
        $this->Signatory3->SetDBValue($this->f("Signatory3"));
        $this->PositionSig3->SetDBValue($this->f("PositionSig3"));
        $this->Signatory4->SetDBValue($this->f("Signatory4"));
        $this->PositionSig4->SetDBValue($this->f("PositionSig4"));
        $this->Signatory5->SetDBValue($this->f("Signatory5"));
        $this->PositionSig5->SetDBValue($this->f("PositionSig5"));
        $this->Signatory6->SetDBValue($this->f("Signatory6"));
        $this->PositionSig6->SetDBValue($this->f("PositionSig6"));
        $this->Signatory7->SetDBValue($this->f("Signatory7"));
        $this->PositionSig7->SetDBValue($this->f("PositionSig7"));
        $this->Signatory8->SetDBValue($this->f("Signatory8"));
        $this->PositionSig8->SetDBValue($this->f("PositionSig8"));
    }
//End SetValues Method

} //End signatoriesDataSource Class @2-FCB6E20C

class clsRecordsignatories1 { //signatories1 Class @55-FBFC49FB

//Variables @55-D6FF3E86

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

//Class_Initialize Event @55-701E5916
    function clsRecordsignatories1($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record signatories1/Error";
        $this->DataSource = new clssignatories1DataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "signatories1";
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
            $this->Signatory1 = & new clsControl(ccsTextBox, "Signatory1", "Signatory1", ccsText, "", CCGetRequestParam("Signatory1", $Method, NULL), $this);
            $this->PositionSig1 = & new clsControl(ccsTextBox, "PositionSig1", "Position Sig1", ccsText, "", CCGetRequestParam("PositionSig1", $Method, NULL), $this);
            $this->Signatory2 = & new clsControl(ccsTextBox, "Signatory2", "Signatory2", ccsText, "", CCGetRequestParam("Signatory2", $Method, NULL), $this);
            $this->PositionSig2 = & new clsControl(ccsTextBox, "PositionSig2", "Position Sig2", ccsText, "", CCGetRequestParam("PositionSig2", $Method, NULL), $this);
            $this->Signatory3 = & new clsControl(ccsTextBox, "Signatory3", "Signatory3", ccsText, "", CCGetRequestParam("Signatory3", $Method, NULL), $this);
            $this->PositionSig3 = & new clsControl(ccsTextBox, "PositionSig3", "Position Sig3", ccsText, "", CCGetRequestParam("PositionSig3", $Method, NULL), $this);
            $this->Signatory4 = & new clsControl(ccsTextBox, "Signatory4", "Signatory4", ccsText, "", CCGetRequestParam("Signatory4", $Method, NULL), $this);
            $this->PositionSig4 = & new clsControl(ccsTextBox, "PositionSig4", "Position Sig4", ccsText, "", CCGetRequestParam("PositionSig4", $Method, NULL), $this);
            $this->Signatory5 = & new clsControl(ccsTextBox, "Signatory5", "Signatory5", ccsText, "", CCGetRequestParam("Signatory5", $Method, NULL), $this);
            $this->PositionSig5 = & new clsControl(ccsTextBox, "PositionSig5", "Position Sig5", ccsText, "", CCGetRequestParam("PositionSig5", $Method, NULL), $this);
            $this->Signatory6 = & new clsControl(ccsTextBox, "Signatory6", "Signatory6", ccsText, "", CCGetRequestParam("Signatory6", $Method, NULL), $this);
            $this->PositionSig6 = & new clsControl(ccsTextBox, "PositionSig6", "Position Sig6", ccsText, "", CCGetRequestParam("PositionSig6", $Method, NULL), $this);
            $this->Signatory7 = & new clsControl(ccsTextBox, "Signatory7", "Signatory7", ccsText, "", CCGetRequestParam("Signatory7", $Method, NULL), $this);
            $this->PositionSig7 = & new clsControl(ccsTextBox, "PositionSig7", "Position Sig7", ccsText, "", CCGetRequestParam("PositionSig7", $Method, NULL), $this);
            $this->Signatory8 = & new clsControl(ccsTextBox, "Signatory8", "Signatory8", ccsText, "", CCGetRequestParam("Signatory8", $Method, NULL), $this);
            $this->PositionSig8 = & new clsControl(ccsTextBox, "PositionSig8", "Position Sig8", ccsText, "", CCGetRequestParam("PositionSig8", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @55-15643D49
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlSigID"] = CCGetFromGet("SigID", NULL);
    }
//End Initialize Method

//Validate Method @55-D6311859
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->Signatory1->Validate() && $Validation);
        $Validation = ($this->PositionSig1->Validate() && $Validation);
        $Validation = ($this->Signatory2->Validate() && $Validation);
        $Validation = ($this->PositionSig2->Validate() && $Validation);
        $Validation = ($this->Signatory3->Validate() && $Validation);
        $Validation = ($this->PositionSig3->Validate() && $Validation);
        $Validation = ($this->Signatory4->Validate() && $Validation);
        $Validation = ($this->PositionSig4->Validate() && $Validation);
        $Validation = ($this->Signatory5->Validate() && $Validation);
        $Validation = ($this->PositionSig5->Validate() && $Validation);
        $Validation = ($this->Signatory6->Validate() && $Validation);
        $Validation = ($this->PositionSig6->Validate() && $Validation);
        $Validation = ($this->Signatory7->Validate() && $Validation);
        $Validation = ($this->PositionSig7->Validate() && $Validation);
        $Validation = ($this->Signatory8->Validate() && $Validation);
        $Validation = ($this->PositionSig8->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->Signatory1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Signatory2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Signatory3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Signatory4->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig4->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Signatory5->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig5->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Signatory6->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig6->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Signatory7->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig7->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Signatory8->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PositionSig8->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @55-4E2768AD
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Signatory1->Errors->Count());
        $errors = ($errors || $this->PositionSig1->Errors->Count());
        $errors = ($errors || $this->Signatory2->Errors->Count());
        $errors = ($errors || $this->PositionSig2->Errors->Count());
        $errors = ($errors || $this->Signatory3->Errors->Count());
        $errors = ($errors || $this->PositionSig3->Errors->Count());
        $errors = ($errors || $this->Signatory4->Errors->Count());
        $errors = ($errors || $this->PositionSig4->Errors->Count());
        $errors = ($errors || $this->Signatory5->Errors->Count());
        $errors = ($errors || $this->PositionSig5->Errors->Count());
        $errors = ($errors || $this->Signatory6->Errors->Count());
        $errors = ($errors || $this->PositionSig6->Errors->Count());
        $errors = ($errors || $this->Signatory7->Errors->Count());
        $errors = ($errors || $this->PositionSig7->Errors->Count());
        $errors = ($errors || $this->Signatory8->Errors->Count());
        $errors = ($errors || $this->PositionSig8->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @55-ED598703
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

//Operation Method @55-288F0419
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

//InsertRow Method @55-CB5C0DF7
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->Signatory1->SetValue($this->Signatory1->GetValue(true));
        $this->DataSource->PositionSig1->SetValue($this->PositionSig1->GetValue(true));
        $this->DataSource->Signatory2->SetValue($this->Signatory2->GetValue(true));
        $this->DataSource->PositionSig2->SetValue($this->PositionSig2->GetValue(true));
        $this->DataSource->Signatory3->SetValue($this->Signatory3->GetValue(true));
        $this->DataSource->PositionSig3->SetValue($this->PositionSig3->GetValue(true));
        $this->DataSource->Signatory4->SetValue($this->Signatory4->GetValue(true));
        $this->DataSource->PositionSig4->SetValue($this->PositionSig4->GetValue(true));
        $this->DataSource->Signatory5->SetValue($this->Signatory5->GetValue(true));
        $this->DataSource->PositionSig5->SetValue($this->PositionSig5->GetValue(true));
        $this->DataSource->Signatory6->SetValue($this->Signatory6->GetValue(true));
        $this->DataSource->PositionSig6->SetValue($this->PositionSig6->GetValue(true));
        $this->DataSource->Signatory7->SetValue($this->Signatory7->GetValue(true));
        $this->DataSource->PositionSig7->SetValue($this->PositionSig7->GetValue(true));
        $this->DataSource->Signatory8->SetValue($this->Signatory8->GetValue(true));
        $this->DataSource->PositionSig8->SetValue($this->PositionSig8->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @55-8C4E5238
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->Signatory1->SetValue($this->Signatory1->GetValue(true));
        $this->DataSource->PositionSig1->SetValue($this->PositionSig1->GetValue(true));
        $this->DataSource->Signatory2->SetValue($this->Signatory2->GetValue(true));
        $this->DataSource->PositionSig2->SetValue($this->PositionSig2->GetValue(true));
        $this->DataSource->Signatory3->SetValue($this->Signatory3->GetValue(true));
        $this->DataSource->PositionSig3->SetValue($this->PositionSig3->GetValue(true));
        $this->DataSource->Signatory4->SetValue($this->Signatory4->GetValue(true));
        $this->DataSource->PositionSig4->SetValue($this->PositionSig4->GetValue(true));
        $this->DataSource->Signatory5->SetValue($this->Signatory5->GetValue(true));
        $this->DataSource->PositionSig5->SetValue($this->PositionSig5->GetValue(true));
        $this->DataSource->Signatory6->SetValue($this->Signatory6->GetValue(true));
        $this->DataSource->PositionSig6->SetValue($this->PositionSig6->GetValue(true));
        $this->DataSource->Signatory7->SetValue($this->Signatory7->GetValue(true));
        $this->DataSource->PositionSig7->SetValue($this->PositionSig7->GetValue(true));
        $this->DataSource->Signatory8->SetValue($this->Signatory8->GetValue(true));
        $this->DataSource->PositionSig8->SetValue($this->PositionSig8->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @55-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @55-D0D11B9A
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
                    $this->Signatory1->SetValue($this->DataSource->Signatory1->GetValue());
                    $this->PositionSig1->SetValue($this->DataSource->PositionSig1->GetValue());
                    $this->Signatory2->SetValue($this->DataSource->Signatory2->GetValue());
                    $this->PositionSig2->SetValue($this->DataSource->PositionSig2->GetValue());
                    $this->Signatory3->SetValue($this->DataSource->Signatory3->GetValue());
                    $this->PositionSig3->SetValue($this->DataSource->PositionSig3->GetValue());
                    $this->Signatory4->SetValue($this->DataSource->Signatory4->GetValue());
                    $this->PositionSig4->SetValue($this->DataSource->PositionSig4->GetValue());
                    $this->Signatory5->SetValue($this->DataSource->Signatory5->GetValue());
                    $this->PositionSig5->SetValue($this->DataSource->PositionSig5->GetValue());
                    $this->Signatory6->SetValue($this->DataSource->Signatory6->GetValue());
                    $this->PositionSig6->SetValue($this->DataSource->PositionSig6->GetValue());
                    $this->Signatory7->SetValue($this->DataSource->Signatory7->GetValue());
                    $this->PositionSig7->SetValue($this->DataSource->PositionSig7->GetValue());
                    $this->Signatory8->SetValue($this->DataSource->Signatory8->GetValue());
                    $this->PositionSig8->SetValue($this->DataSource->PositionSig8->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->Signatory1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Signatory2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Signatory3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Signatory4->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig4->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Signatory5->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig5->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Signatory6->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig6->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Signatory7->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig7->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Signatory8->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PositionSig8->Errors->ToString());
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
        $this->Signatory1->Show();
        $this->PositionSig1->Show();
        $this->Signatory2->Show();
        $this->PositionSig2->Show();
        $this->Signatory3->Show();
        $this->PositionSig3->Show();
        $this->Signatory4->Show();
        $this->PositionSig4->Show();
        $this->Signatory5->Show();
        $this->PositionSig5->Show();
        $this->Signatory6->Show();
        $this->PositionSig6->Show();
        $this->Signatory7->Show();
        $this->PositionSig7->Show();
        $this->Signatory8->Show();
        $this->PositionSig8->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End signatories1 Class @55-FCB6E20C

class clssignatories1DataSource extends clsDBConnection1 {  //signatories1DataSource Class @55-97B01BA3

//DataSource Variables @55-8F89DCE6
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
    var $Signatory1;
    var $PositionSig1;
    var $Signatory2;
    var $PositionSig2;
    var $Signatory3;
    var $PositionSig3;
    var $Signatory4;
    var $PositionSig4;
    var $Signatory5;
    var $PositionSig5;
    var $Signatory6;
    var $PositionSig6;
    var $Signatory7;
    var $PositionSig7;
    var $Signatory8;
    var $PositionSig8;
//End DataSource Variables

//DataSourceClass_Initialize Event @55-6F5ABC41
    function clssignatories1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record signatories1/Error";
        $this->Initialize();
        $this->Signatory1 = new clsField("Signatory1", ccsText, "");
        
        $this->PositionSig1 = new clsField("PositionSig1", ccsText, "");
        
        $this->Signatory2 = new clsField("Signatory2", ccsText, "");
        
        $this->PositionSig2 = new clsField("PositionSig2", ccsText, "");
        
        $this->Signatory3 = new clsField("Signatory3", ccsText, "");
        
        $this->PositionSig3 = new clsField("PositionSig3", ccsText, "");
        
        $this->Signatory4 = new clsField("Signatory4", ccsText, "");
        
        $this->PositionSig4 = new clsField("PositionSig4", ccsText, "");
        
        $this->Signatory5 = new clsField("Signatory5", ccsText, "");
        
        $this->PositionSig5 = new clsField("PositionSig5", ccsText, "");
        
        $this->Signatory6 = new clsField("Signatory6", ccsText, "");
        
        $this->PositionSig6 = new clsField("PositionSig6", ccsText, "");
        
        $this->Signatory7 = new clsField("Signatory7", ccsText, "");
        
        $this->PositionSig7 = new clsField("PositionSig7", ccsText, "");
        
        $this->Signatory8 = new clsField("Signatory8", ccsText, "");
        
        $this->PositionSig8 = new clsField("PositionSig8", ccsText, "");
        

        $this->InsertFields["Signatory1"] = array("Name" => "Signatory1", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig1"] = array("Name" => "PositionSig1", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Signatory2"] = array("Name" => "Signatory2", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig2"] = array("Name" => "PositionSig2", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Signatory3"] = array("Name" => "Signatory3", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig3"] = array("Name" => "PositionSig3", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Signatory4"] = array("Name" => "Signatory4", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig4"] = array("Name" => "PositionSig4", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Signatory5"] = array("Name" => "Signatory5", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig5"] = array("Name" => "PositionSig5", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Signatory6"] = array("Name" => "Signatory6", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig6"] = array("Name" => "PositionSig6", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Signatory7"] = array("Name" => "Signatory7", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig7"] = array("Name" => "PositionSig7", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Signatory8"] = array("Name" => "Signatory8", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PositionSig8"] = array("Name" => "PositionSig8", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory1"] = array("Name" => "Signatory1", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig1"] = array("Name" => "PositionSig1", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory2"] = array("Name" => "Signatory2", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig2"] = array("Name" => "PositionSig2", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory3"] = array("Name" => "Signatory3", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig3"] = array("Name" => "PositionSig3", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory4"] = array("Name" => "Signatory4", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig4"] = array("Name" => "PositionSig4", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory5"] = array("Name" => "Signatory5", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig5"] = array("Name" => "PositionSig5", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory6"] = array("Name" => "Signatory6", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig6"] = array("Name" => "PositionSig6", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory7"] = array("Name" => "Signatory7", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig7"] = array("Name" => "PositionSig7", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Signatory8"] = array("Name" => "Signatory8", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PositionSig8"] = array("Name" => "PositionSig8", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @55-330249A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlSigID", ccsInteger, "", "", $this->Parameters["urlSigID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "SigID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @55-6D4BBF3F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM signatories {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @55-3C02604D
    function SetValues()
    {
        $this->Signatory1->SetDBValue($this->f("Signatory1"));
        $this->PositionSig1->SetDBValue($this->f("PositionSig1"));
        $this->Signatory2->SetDBValue($this->f("Signatory2"));
        $this->PositionSig2->SetDBValue($this->f("PositionSig2"));
        $this->Signatory3->SetDBValue($this->f("Signatory3"));
        $this->PositionSig3->SetDBValue($this->f("PositionSig3"));
        $this->Signatory4->SetDBValue($this->f("Signatory4"));
        $this->PositionSig4->SetDBValue($this->f("PositionSig4"));
        $this->Signatory5->SetDBValue($this->f("Signatory5"));
        $this->PositionSig5->SetDBValue($this->f("PositionSig5"));
        $this->Signatory6->SetDBValue($this->f("Signatory6"));
        $this->PositionSig6->SetDBValue($this->f("PositionSig6"));
        $this->Signatory7->SetDBValue($this->f("Signatory7"));
        $this->PositionSig7->SetDBValue($this->f("PositionSig7"));
        $this->Signatory8->SetDBValue($this->f("Signatory8"));
        $this->PositionSig8->SetDBValue($this->f("PositionSig8"));
    }
//End SetValues Method

//Insert Method @55-6AFDE166
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["Signatory1"]["Value"] = $this->Signatory1->GetDBValue(true);
        $this->InsertFields["PositionSig1"]["Value"] = $this->PositionSig1->GetDBValue(true);
        $this->InsertFields["Signatory2"]["Value"] = $this->Signatory2->GetDBValue(true);
        $this->InsertFields["PositionSig2"]["Value"] = $this->PositionSig2->GetDBValue(true);
        $this->InsertFields["Signatory3"]["Value"] = $this->Signatory3->GetDBValue(true);
        $this->InsertFields["PositionSig3"]["Value"] = $this->PositionSig3->GetDBValue(true);
        $this->InsertFields["Signatory4"]["Value"] = $this->Signatory4->GetDBValue(true);
        $this->InsertFields["PositionSig4"]["Value"] = $this->PositionSig4->GetDBValue(true);
        $this->InsertFields["Signatory5"]["Value"] = $this->Signatory5->GetDBValue(true);
        $this->InsertFields["PositionSig5"]["Value"] = $this->PositionSig5->GetDBValue(true);
        $this->InsertFields["Signatory6"]["Value"] = $this->Signatory6->GetDBValue(true);
        $this->InsertFields["PositionSig6"]["Value"] = $this->PositionSig6->GetDBValue(true);
        $this->InsertFields["Signatory7"]["Value"] = $this->Signatory7->GetDBValue(true);
        $this->InsertFields["PositionSig7"]["Value"] = $this->PositionSig7->GetDBValue(true);
        $this->InsertFields["Signatory8"]["Value"] = $this->Signatory8->GetDBValue(true);
        $this->InsertFields["PositionSig8"]["Value"] = $this->PositionSig8->GetDBValue(true);
        $this->SQL = CCBuildInsert("signatories", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @55-1A107372
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["Signatory1"]["Value"] = $this->Signatory1->GetDBValue(true);
        $this->UpdateFields["PositionSig1"]["Value"] = $this->PositionSig1->GetDBValue(true);
        $this->UpdateFields["Signatory2"]["Value"] = $this->Signatory2->GetDBValue(true);
        $this->UpdateFields["PositionSig2"]["Value"] = $this->PositionSig2->GetDBValue(true);
        $this->UpdateFields["Signatory3"]["Value"] = $this->Signatory3->GetDBValue(true);
        $this->UpdateFields["PositionSig3"]["Value"] = $this->PositionSig3->GetDBValue(true);
        $this->UpdateFields["Signatory4"]["Value"] = $this->Signatory4->GetDBValue(true);
        $this->UpdateFields["PositionSig4"]["Value"] = $this->PositionSig4->GetDBValue(true);
        $this->UpdateFields["Signatory5"]["Value"] = $this->Signatory5->GetDBValue(true);
        $this->UpdateFields["PositionSig5"]["Value"] = $this->PositionSig5->GetDBValue(true);
        $this->UpdateFields["Signatory6"]["Value"] = $this->Signatory6->GetDBValue(true);
        $this->UpdateFields["PositionSig6"]["Value"] = $this->PositionSig6->GetDBValue(true);
        $this->UpdateFields["Signatory7"]["Value"] = $this->Signatory7->GetDBValue(true);
        $this->UpdateFields["PositionSig7"]["Value"] = $this->PositionSig7->GetDBValue(true);
        $this->UpdateFields["Signatory8"]["Value"] = $this->Signatory8->GetDBValue(true);
        $this->UpdateFields["PositionSig8"]["Value"] = $this->PositionSig8->GetDBValue(true);
        $this->SQL = CCBuildUpdate("signatories", $this->UpdateFields, $this);
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

//Delete Method @55-670FC2A2
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $this->SQL = "DELETE FROM signatories";
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

} //End signatories1DataSource Class @55-FCB6E20C

//Initialize Page @1-2C20134F
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
$TemplateFileName = "Signatories.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-BF449D47
CCSecurityRedirect("7", "");
//End Authenticate User

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-56B5738E
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$signatories = & new clsGridsignatories("", $MainPage);
$signatories1 = & new clsRecordsignatories1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "index.php";
$MainPage->signatories = & $signatories;
$MainPage->signatories1 = & $signatories1;
$MainPage->Link1 = & $Link1;
$signatories->Initialize();
$signatories1->Initialize();

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

//Execute Components @1-8412E98F
$signatories1->Operation();
//End Execute Components

//Go to destination page @1-6D602375
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($signatories);
    unset($signatories1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-41535C97
$signatories->Show();
$signatories1->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-EEA045A1
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($signatories);
unset($signatories1);
unset($Tpl);
//End Unload Page


?>
