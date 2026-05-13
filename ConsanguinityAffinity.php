<?php
//Include Common Files @1-63855E34
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "ConsanguinityAffinity.php");
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

//Class_Initialize Event @2-6982B22C
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
        $this->EmployeeID->Page = "ConsanguinityAffinity.php";
        $this->EmployeeIDNo = & new clsControl(ccsLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsLabel, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsLabel, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
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

//Show Method @2-41FBD279
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
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->EmployeeIDNo->Show();
                $this->Surname->Show();
                $this->FirstName->Show();
                $this->MiddleName->Show();
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

//GetErrors Method @2-A7329A15
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee Class @2-FCB6E20C

class clsemployeeDataSource extends clsDBConnection1 {  //employeeDataSource Class @2-3A1764EA

//DataSource Variables @2-4B593C99
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
//End DataSource Variables

//DataSourceClass_Initialize Event @2-69C73424
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

//Open Method @2-7FF4E3DA
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee";
        $this->SQL = "SELECT EmployeeID, EmployeeIDNo, Surname, FirstName, MiddleName, ConsanThird, ConsanThirdDetaila, ConsanFourth, ConsanFourthDetails,\n\n" .
        "AdminOffense, AdminOffenseDetails, CriminallyCharged, CriminallyChargedDetails, ConvictedOfCrime, ConvictedCrimeDetails,\n\n" .
        "SeparatedFromService, SeparatedFromServiceDetails, CandidateElection, CandidateElectionDetails, ResignedGovService, ResignedGovServiceDetails,\n\n" .
        "StatOfImmigrant, StatOfImmigrantDetails, IndigenousGroupMember, IndigenousDetails, DifferentlyAbled, DifferentlyAbledDetails,\n\n" .
        "SoloParent, SoloParentDetails, GovIssuedID, IDNo, DatePlaceIssuance, DateAccomplished \n\n" .
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

//SetValues Method @2-49D9311D
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
    }
//End SetValues Method

} //End employeeDataSource Class @2-FCB6E20C

class clsRecordemployee1 { //employee1 Class @105-BD315ADE

//Variables @105-D6FF3E86

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

//Class_Initialize Event @105-8762EECB
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
            $this->ConsanThird = & new clsControl(ccsListBox, "ConsanThird", "Consan Third", ccsText, "", CCGetRequestParam("ConsanThird", $Method, NULL), $this);
            $this->ConsanThird->DSType = dsTable;
            $this->ConsanThird->DataSource = new clsDBConnection1();
            $this->ConsanThird->ds = & $this->ConsanThird->DataSource;
            $this->ConsanThird->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->ConsanThird->BoundColumn, $this->ConsanThird->TextColumn, $this->ConsanThird->DBFormat) = array("Answer", "Answer", "");
            $this->ConsanThirdDetaila = & new clsControl(ccsTextBox, "ConsanThirdDetaila", "Consan Third Detaila", ccsText, "", CCGetRequestParam("ConsanThirdDetaila", $Method, NULL), $this);
            $this->ConsanFourth = & new clsControl(ccsListBox, "ConsanFourth", "Consan Fourth", ccsText, "", CCGetRequestParam("ConsanFourth", $Method, NULL), $this);
            $this->ConsanFourth->DSType = dsTable;
            $this->ConsanFourth->DataSource = new clsDBConnection1();
            $this->ConsanFourth->ds = & $this->ConsanFourth->DataSource;
            $this->ConsanFourth->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->ConsanFourth->BoundColumn, $this->ConsanFourth->TextColumn, $this->ConsanFourth->DBFormat) = array("Answer", "Answer", "");
            $this->ConsanFourthDetails = & new clsControl(ccsTextBox, "ConsanFourthDetails", "Consan Fourth Details", ccsText, "", CCGetRequestParam("ConsanFourthDetails", $Method, NULL), $this);
            $this->AdminOffense = & new clsControl(ccsListBox, "AdminOffense", "Admin Offense", ccsText, "", CCGetRequestParam("AdminOffense", $Method, NULL), $this);
            $this->AdminOffense->DSType = dsTable;
            $this->AdminOffense->DataSource = new clsDBConnection1();
            $this->AdminOffense->ds = & $this->AdminOffense->DataSource;
            $this->AdminOffense->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->AdminOffense->BoundColumn, $this->AdminOffense->TextColumn, $this->AdminOffense->DBFormat) = array("Answer", "Answer", "");
            $this->AdminOffenseDetails = & new clsControl(ccsTextBox, "AdminOffenseDetails", "Admin Offense Details", ccsText, "", CCGetRequestParam("AdminOffenseDetails", $Method, NULL), $this);
            $this->CriminallyCharged = & new clsControl(ccsListBox, "CriminallyCharged", "Criminally Charged", ccsText, "", CCGetRequestParam("CriminallyCharged", $Method, NULL), $this);
            $this->CriminallyCharged->DSType = dsTable;
            $this->CriminallyCharged->DataSource = new clsDBConnection1();
            $this->CriminallyCharged->ds = & $this->CriminallyCharged->DataSource;
            $this->CriminallyCharged->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->CriminallyCharged->BoundColumn, $this->CriminallyCharged->TextColumn, $this->CriminallyCharged->DBFormat) = array("Answer", "Answer", "");
            $this->CriminallyChargedDetails = & new clsControl(ccsTextBox, "CriminallyChargedDetails", "Criminally Charged Details", ccsText, "", CCGetRequestParam("CriminallyChargedDetails", $Method, NULL), $this);
            $this->ConvictedOfCrime = & new clsControl(ccsListBox, "ConvictedOfCrime", "Convicted Of Crime", ccsText, "", CCGetRequestParam("ConvictedOfCrime", $Method, NULL), $this);
            $this->ConvictedOfCrime->DSType = dsTable;
            $this->ConvictedOfCrime->DataSource = new clsDBConnection1();
            $this->ConvictedOfCrime->ds = & $this->ConvictedOfCrime->DataSource;
            $this->ConvictedOfCrime->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->ConvictedOfCrime->BoundColumn, $this->ConvictedOfCrime->TextColumn, $this->ConvictedOfCrime->DBFormat) = array("Answer", "Answer", "");
            $this->ConvictedCrimeDetails = & new clsControl(ccsTextBox, "ConvictedCrimeDetails", "Convicted Crime Details", ccsText, "", CCGetRequestParam("ConvictedCrimeDetails", $Method, NULL), $this);
            $this->SeparatedFromService = & new clsControl(ccsListBox, "SeparatedFromService", "Separated From Service", ccsText, "", CCGetRequestParam("SeparatedFromService", $Method, NULL), $this);
            $this->SeparatedFromService->DSType = dsTable;
            $this->SeparatedFromService->DataSource = new clsDBConnection1();
            $this->SeparatedFromService->ds = & $this->SeparatedFromService->DataSource;
            $this->SeparatedFromService->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->SeparatedFromService->BoundColumn, $this->SeparatedFromService->TextColumn, $this->SeparatedFromService->DBFormat) = array("Answer", "Answer", "");
            $this->SeparatedFromServiceDetails = & new clsControl(ccsTextBox, "SeparatedFromServiceDetails", "Separated From Service Details", ccsText, "", CCGetRequestParam("SeparatedFromServiceDetails", $Method, NULL), $this);
            $this->CandidateElection = & new clsControl(ccsListBox, "CandidateElection", "Candidate Election", ccsText, "", CCGetRequestParam("CandidateElection", $Method, NULL), $this);
            $this->CandidateElection->DSType = dsTable;
            $this->CandidateElection->DataSource = new clsDBConnection1();
            $this->CandidateElection->ds = & $this->CandidateElection->DataSource;
            $this->CandidateElection->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->CandidateElection->BoundColumn, $this->CandidateElection->TextColumn, $this->CandidateElection->DBFormat) = array("Answer", "Answer", "");
            $this->CandidateElectionDetails = & new clsControl(ccsTextBox, "CandidateElectionDetails", "Candidate Election Details", ccsText, "", CCGetRequestParam("CandidateElectionDetails", $Method, NULL), $this);
            $this->ResignedGovService = & new clsControl(ccsListBox, "ResignedGovService", "Resigned Gov Service", ccsText, "", CCGetRequestParam("ResignedGovService", $Method, NULL), $this);
            $this->ResignedGovService->DSType = dsTable;
            $this->ResignedGovService->DataSource = new clsDBConnection1();
            $this->ResignedGovService->ds = & $this->ResignedGovService->DataSource;
            $this->ResignedGovService->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->ResignedGovService->BoundColumn, $this->ResignedGovService->TextColumn, $this->ResignedGovService->DBFormat) = array("Answer", "Answer", "");
            $this->ResignedGovServiceDetails = & new clsControl(ccsTextBox, "ResignedGovServiceDetails", "Resigned Gov Service Details", ccsText, "", CCGetRequestParam("ResignedGovServiceDetails", $Method, NULL), $this);
            $this->StatOfImmigrant = & new clsControl(ccsListBox, "StatOfImmigrant", "Stat Of Immigrant", ccsText, "", CCGetRequestParam("StatOfImmigrant", $Method, NULL), $this);
            $this->StatOfImmigrant->DSType = dsTable;
            $this->StatOfImmigrant->DataSource = new clsDBConnection1();
            $this->StatOfImmigrant->ds = & $this->StatOfImmigrant->DataSource;
            $this->StatOfImmigrant->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->StatOfImmigrant->BoundColumn, $this->StatOfImmigrant->TextColumn, $this->StatOfImmigrant->DBFormat) = array("Answer", "Answer", "");
            $this->StatOfImmigrantDetails = & new clsControl(ccsTextBox, "StatOfImmigrantDetails", "Stat Of Immigrant Details", ccsText, "", CCGetRequestParam("StatOfImmigrantDetails", $Method, NULL), $this);
            $this->IndigenousGroupMember = & new clsControl(ccsListBox, "IndigenousGroupMember", "Indigenous Group Member", ccsText, "", CCGetRequestParam("IndigenousGroupMember", $Method, NULL), $this);
            $this->IndigenousGroupMember->DSType = dsTable;
            $this->IndigenousGroupMember->DataSource = new clsDBConnection1();
            $this->IndigenousGroupMember->ds = & $this->IndigenousGroupMember->DataSource;
            $this->IndigenousGroupMember->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->IndigenousGroupMember->BoundColumn, $this->IndigenousGroupMember->TextColumn, $this->IndigenousGroupMember->DBFormat) = array("Answer", "Answer", "");
            $this->IndigenousDetails = & new clsControl(ccsTextBox, "IndigenousDetails", "Indigenous Details", ccsText, "", CCGetRequestParam("IndigenousDetails", $Method, NULL), $this);
            $this->DifferentlyAbled = & new clsControl(ccsListBox, "DifferentlyAbled", "Differently Abled", ccsText, "", CCGetRequestParam("DifferentlyAbled", $Method, NULL), $this);
            $this->DifferentlyAbled->DSType = dsTable;
            $this->DifferentlyAbled->DataSource = new clsDBConnection1();
            $this->DifferentlyAbled->ds = & $this->DifferentlyAbled->DataSource;
            $this->DifferentlyAbled->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->DifferentlyAbled->BoundColumn, $this->DifferentlyAbled->TextColumn, $this->DifferentlyAbled->DBFormat) = array("Answer", "Answer", "");
            $this->DifferentlyAbledDetails = & new clsControl(ccsTextBox, "DifferentlyAbledDetails", "Differently Abled Details", ccsText, "", CCGetRequestParam("DifferentlyAbledDetails", $Method, NULL), $this);
            $this->SoloParent = & new clsControl(ccsListBox, "SoloParent", "Solo Parent", ccsText, "", CCGetRequestParam("SoloParent", $Method, NULL), $this);
            $this->SoloParent->DSType = dsTable;
            $this->SoloParent->DataSource = new clsDBConnection1();
            $this->SoloParent->ds = & $this->SoloParent->DataSource;
            $this->SoloParent->DataSource->SQL = "SELECT * \n" .
"FROM lut_ans {SQL_Where} {SQL_OrderBy}";
            list($this->SoloParent->BoundColumn, $this->SoloParent->TextColumn, $this->SoloParent->DBFormat) = array("Answer", "Answer", "");
            $this->SoloParentDetails = & new clsControl(ccsTextBox, "SoloParentDetails", "Solo Parent Details", ccsText, "", CCGetRequestParam("SoloParentDetails", $Method, NULL), $this);
            $this->GovIssuedID = & new clsControl(ccsTextBox, "GovIssuedID", "Gov Issued ID", ccsText, "", CCGetRequestParam("GovIssuedID", $Method, NULL), $this);
            $this->IDNo = & new clsControl(ccsTextBox, "IDNo", "IDNo", ccsText, "", CCGetRequestParam("IDNo", $Method, NULL), $this);
            $this->DatePlaceIssuance = & new clsControl(ccsTextBox, "DatePlaceIssuance", "Date Place Issuance", ccsText, "", CCGetRequestParam("DatePlaceIssuance", $Method, NULL), $this);
            $this->DateAccomplished = & new clsControl(ccsTextBox, "DateAccomplished", "Date Accomplished", ccsDate, $DefaultDateFormat, CCGetRequestParam("DateAccomplished", $Method, NULL), $this);
            $this->DatePicker_DateAccomplished = & new clsDatePicker("DatePicker_DateAccomplished", "employee1", "DateAccomplished", $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @105-AAA85980
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
    }
//End Initialize Method

//Validate Method @105-8816026F
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->ConsanThird->Validate() && $Validation);
        $Validation = ($this->ConsanThirdDetaila->Validate() && $Validation);
        $Validation = ($this->ConsanFourth->Validate() && $Validation);
        $Validation = ($this->ConsanFourthDetails->Validate() && $Validation);
        $Validation = ($this->AdminOffense->Validate() && $Validation);
        $Validation = ($this->AdminOffenseDetails->Validate() && $Validation);
        $Validation = ($this->CriminallyCharged->Validate() && $Validation);
        $Validation = ($this->CriminallyChargedDetails->Validate() && $Validation);
        $Validation = ($this->ConvictedOfCrime->Validate() && $Validation);
        $Validation = ($this->ConvictedCrimeDetails->Validate() && $Validation);
        $Validation = ($this->SeparatedFromService->Validate() && $Validation);
        $Validation = ($this->SeparatedFromServiceDetails->Validate() && $Validation);
        $Validation = ($this->CandidateElection->Validate() && $Validation);
        $Validation = ($this->CandidateElectionDetails->Validate() && $Validation);
        $Validation = ($this->ResignedGovService->Validate() && $Validation);
        $Validation = ($this->ResignedGovServiceDetails->Validate() && $Validation);
        $Validation = ($this->StatOfImmigrant->Validate() && $Validation);
        $Validation = ($this->StatOfImmigrantDetails->Validate() && $Validation);
        $Validation = ($this->IndigenousGroupMember->Validate() && $Validation);
        $Validation = ($this->IndigenousDetails->Validate() && $Validation);
        $Validation = ($this->DifferentlyAbled->Validate() && $Validation);
        $Validation = ($this->DifferentlyAbledDetails->Validate() && $Validation);
        $Validation = ($this->SoloParent->Validate() && $Validation);
        $Validation = ($this->SoloParentDetails->Validate() && $Validation);
        $Validation = ($this->GovIssuedID->Validate() && $Validation);
        $Validation = ($this->IDNo->Validate() && $Validation);
        $Validation = ($this->DatePlaceIssuance->Validate() && $Validation);
        $Validation = ($this->DateAccomplished->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->ConsanThird->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ConsanThirdDetaila->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ConsanFourth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ConsanFourthDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AdminOffense->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AdminOffenseDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CriminallyCharged->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CriminallyChargedDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ConvictedOfCrime->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ConvictedCrimeDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeparatedFromService->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SeparatedFromServiceDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CandidateElection->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CandidateElectionDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResignedGovService->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResignedGovServiceDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StatOfImmigrant->Errors->Count() == 0);
        $Validation =  $Validation && ($this->StatOfImmigrantDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IndigenousGroupMember->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IndigenousDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DifferentlyAbled->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DifferentlyAbledDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SoloParent->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SoloParentDetails->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GovIssuedID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->IDNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DatePlaceIssuance->Errors->Count() == 0);
        $Validation =  $Validation && ($this->DateAccomplished->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @105-8880D5AE
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ConsanThird->Errors->Count());
        $errors = ($errors || $this->ConsanThirdDetaila->Errors->Count());
        $errors = ($errors || $this->ConsanFourth->Errors->Count());
        $errors = ($errors || $this->ConsanFourthDetails->Errors->Count());
        $errors = ($errors || $this->AdminOffense->Errors->Count());
        $errors = ($errors || $this->AdminOffenseDetails->Errors->Count());
        $errors = ($errors || $this->CriminallyCharged->Errors->Count());
        $errors = ($errors || $this->CriminallyChargedDetails->Errors->Count());
        $errors = ($errors || $this->ConvictedOfCrime->Errors->Count());
        $errors = ($errors || $this->ConvictedCrimeDetails->Errors->Count());
        $errors = ($errors || $this->SeparatedFromService->Errors->Count());
        $errors = ($errors || $this->SeparatedFromServiceDetails->Errors->Count());
        $errors = ($errors || $this->CandidateElection->Errors->Count());
        $errors = ($errors || $this->CandidateElectionDetails->Errors->Count());
        $errors = ($errors || $this->ResignedGovService->Errors->Count());
        $errors = ($errors || $this->ResignedGovServiceDetails->Errors->Count());
        $errors = ($errors || $this->StatOfImmigrant->Errors->Count());
        $errors = ($errors || $this->StatOfImmigrantDetails->Errors->Count());
        $errors = ($errors || $this->IndigenousGroupMember->Errors->Count());
        $errors = ($errors || $this->IndigenousDetails->Errors->Count());
        $errors = ($errors || $this->DifferentlyAbled->Errors->Count());
        $errors = ($errors || $this->DifferentlyAbledDetails->Errors->Count());
        $errors = ($errors || $this->SoloParent->Errors->Count());
        $errors = ($errors || $this->SoloParentDetails->Errors->Count());
        $errors = ($errors || $this->GovIssuedID->Errors->Count());
        $errors = ($errors || $this->IDNo->Errors->Count());
        $errors = ($errors || $this->DatePlaceIssuance->Errors->Count());
        $errors = ($errors || $this->DateAccomplished->Errors->Count());
        $errors = ($errors || $this->DatePicker_DateAccomplished->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @105-ED598703
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

//Operation Method @105-288F0419
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

//InsertRow Method @105-D4A33E58
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->ConsanThird->SetValue($this->ConsanThird->GetValue(true));
        $this->DataSource->ConsanThirdDetaila->SetValue($this->ConsanThirdDetaila->GetValue(true));
        $this->DataSource->ConsanFourth->SetValue($this->ConsanFourth->GetValue(true));
        $this->DataSource->ConsanFourthDetails->SetValue($this->ConsanFourthDetails->GetValue(true));
        $this->DataSource->AdminOffense->SetValue($this->AdminOffense->GetValue(true));
        $this->DataSource->AdminOffenseDetails->SetValue($this->AdminOffenseDetails->GetValue(true));
        $this->DataSource->CriminallyCharged->SetValue($this->CriminallyCharged->GetValue(true));
        $this->DataSource->CriminallyChargedDetails->SetValue($this->CriminallyChargedDetails->GetValue(true));
        $this->DataSource->ConvictedOfCrime->SetValue($this->ConvictedOfCrime->GetValue(true));
        $this->DataSource->ConvictedCrimeDetails->SetValue($this->ConvictedCrimeDetails->GetValue(true));
        $this->DataSource->SeparatedFromService->SetValue($this->SeparatedFromService->GetValue(true));
        $this->DataSource->SeparatedFromServiceDetails->SetValue($this->SeparatedFromServiceDetails->GetValue(true));
        $this->DataSource->CandidateElection->SetValue($this->CandidateElection->GetValue(true));
        $this->DataSource->CandidateElectionDetails->SetValue($this->CandidateElectionDetails->GetValue(true));
        $this->DataSource->ResignedGovService->SetValue($this->ResignedGovService->GetValue(true));
        $this->DataSource->ResignedGovServiceDetails->SetValue($this->ResignedGovServiceDetails->GetValue(true));
        $this->DataSource->StatOfImmigrant->SetValue($this->StatOfImmigrant->GetValue(true));
        $this->DataSource->StatOfImmigrantDetails->SetValue($this->StatOfImmigrantDetails->GetValue(true));
        $this->DataSource->IndigenousGroupMember->SetValue($this->IndigenousGroupMember->GetValue(true));
        $this->DataSource->IndigenousDetails->SetValue($this->IndigenousDetails->GetValue(true));
        $this->DataSource->DifferentlyAbled->SetValue($this->DifferentlyAbled->GetValue(true));
        $this->DataSource->DifferentlyAbledDetails->SetValue($this->DifferentlyAbledDetails->GetValue(true));
        $this->DataSource->SoloParent->SetValue($this->SoloParent->GetValue(true));
        $this->DataSource->SoloParentDetails->SetValue($this->SoloParentDetails->GetValue(true));
        $this->DataSource->GovIssuedID->SetValue($this->GovIssuedID->GetValue(true));
        $this->DataSource->IDNo->SetValue($this->IDNo->GetValue(true));
        $this->DataSource->DatePlaceIssuance->SetValue($this->DatePlaceIssuance->GetValue(true));
        $this->DataSource->DateAccomplished->SetValue($this->DateAccomplished->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @105-D60E34A3
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->ConsanThird->SetValue($this->ConsanThird->GetValue(true));
        $this->DataSource->ConsanThirdDetaila->SetValue($this->ConsanThirdDetaila->GetValue(true));
        $this->DataSource->ConsanFourth->SetValue($this->ConsanFourth->GetValue(true));
        $this->DataSource->ConsanFourthDetails->SetValue($this->ConsanFourthDetails->GetValue(true));
        $this->DataSource->AdminOffense->SetValue($this->AdminOffense->GetValue(true));
        $this->DataSource->AdminOffenseDetails->SetValue($this->AdminOffenseDetails->GetValue(true));
        $this->DataSource->CriminallyCharged->SetValue($this->CriminallyCharged->GetValue(true));
        $this->DataSource->CriminallyChargedDetails->SetValue($this->CriminallyChargedDetails->GetValue(true));
        $this->DataSource->ConvictedOfCrime->SetValue($this->ConvictedOfCrime->GetValue(true));
        $this->DataSource->ConvictedCrimeDetails->SetValue($this->ConvictedCrimeDetails->GetValue(true));
        $this->DataSource->SeparatedFromService->SetValue($this->SeparatedFromService->GetValue(true));
        $this->DataSource->SeparatedFromServiceDetails->SetValue($this->SeparatedFromServiceDetails->GetValue(true));
        $this->DataSource->CandidateElection->SetValue($this->CandidateElection->GetValue(true));
        $this->DataSource->CandidateElectionDetails->SetValue($this->CandidateElectionDetails->GetValue(true));
        $this->DataSource->ResignedGovService->SetValue($this->ResignedGovService->GetValue(true));
        $this->DataSource->ResignedGovServiceDetails->SetValue($this->ResignedGovServiceDetails->GetValue(true));
        $this->DataSource->StatOfImmigrant->SetValue($this->StatOfImmigrant->GetValue(true));
        $this->DataSource->StatOfImmigrantDetails->SetValue($this->StatOfImmigrantDetails->GetValue(true));
        $this->DataSource->IndigenousGroupMember->SetValue($this->IndigenousGroupMember->GetValue(true));
        $this->DataSource->IndigenousDetails->SetValue($this->IndigenousDetails->GetValue(true));
        $this->DataSource->DifferentlyAbled->SetValue($this->DifferentlyAbled->GetValue(true));
        $this->DataSource->DifferentlyAbledDetails->SetValue($this->DifferentlyAbledDetails->GetValue(true));
        $this->DataSource->SoloParent->SetValue($this->SoloParent->GetValue(true));
        $this->DataSource->SoloParentDetails->SetValue($this->SoloParentDetails->GetValue(true));
        $this->DataSource->GovIssuedID->SetValue($this->GovIssuedID->GetValue(true));
        $this->DataSource->IDNo->SetValue($this->IDNo->GetValue(true));
        $this->DataSource->DatePlaceIssuance->SetValue($this->DatePlaceIssuance->GetValue(true));
        $this->DataSource->DateAccomplished->SetValue($this->DateAccomplished->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @105-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @105-34BB46BE
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

        $this->ConsanThird->Prepare();
        $this->ConsanFourth->Prepare();
        $this->AdminOffense->Prepare();
        $this->CriminallyCharged->Prepare();
        $this->ConvictedOfCrime->Prepare();
        $this->SeparatedFromService->Prepare();
        $this->CandidateElection->Prepare();
        $this->ResignedGovService->Prepare();
        $this->StatOfImmigrant->Prepare();
        $this->IndigenousGroupMember->Prepare();
        $this->DifferentlyAbled->Prepare();
        $this->SoloParent->Prepare();

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
                    $this->ConsanThird->SetValue($this->DataSource->ConsanThird->GetValue());
                    $this->ConsanThirdDetaila->SetValue($this->DataSource->ConsanThirdDetaila->GetValue());
                    $this->ConsanFourth->SetValue($this->DataSource->ConsanFourth->GetValue());
                    $this->ConsanFourthDetails->SetValue($this->DataSource->ConsanFourthDetails->GetValue());
                    $this->AdminOffense->SetValue($this->DataSource->AdminOffense->GetValue());
                    $this->AdminOffenseDetails->SetValue($this->DataSource->AdminOffenseDetails->GetValue());
                    $this->CriminallyCharged->SetValue($this->DataSource->CriminallyCharged->GetValue());
                    $this->CriminallyChargedDetails->SetValue($this->DataSource->CriminallyChargedDetails->GetValue());
                    $this->ConvictedOfCrime->SetValue($this->DataSource->ConvictedOfCrime->GetValue());
                    $this->ConvictedCrimeDetails->SetValue($this->DataSource->ConvictedCrimeDetails->GetValue());
                    $this->SeparatedFromService->SetValue($this->DataSource->SeparatedFromService->GetValue());
                    $this->SeparatedFromServiceDetails->SetValue($this->DataSource->SeparatedFromServiceDetails->GetValue());
                    $this->CandidateElection->SetValue($this->DataSource->CandidateElection->GetValue());
                    $this->CandidateElectionDetails->SetValue($this->DataSource->CandidateElectionDetails->GetValue());
                    $this->ResignedGovService->SetValue($this->DataSource->ResignedGovService->GetValue());
                    $this->ResignedGovServiceDetails->SetValue($this->DataSource->ResignedGovServiceDetails->GetValue());
                    $this->StatOfImmigrant->SetValue($this->DataSource->StatOfImmigrant->GetValue());
                    $this->StatOfImmigrantDetails->SetValue($this->DataSource->StatOfImmigrantDetails->GetValue());
                    $this->IndigenousGroupMember->SetValue($this->DataSource->IndigenousGroupMember->GetValue());
                    $this->IndigenousDetails->SetValue($this->DataSource->IndigenousDetails->GetValue());
                    $this->DifferentlyAbled->SetValue($this->DataSource->DifferentlyAbled->GetValue());
                    $this->DifferentlyAbledDetails->SetValue($this->DataSource->DifferentlyAbledDetails->GetValue());
                    $this->SoloParent->SetValue($this->DataSource->SoloParent->GetValue());
                    $this->SoloParentDetails->SetValue($this->DataSource->SoloParentDetails->GetValue());
                    $this->GovIssuedID->SetValue($this->DataSource->GovIssuedID->GetValue());
                    $this->IDNo->SetValue($this->DataSource->IDNo->GetValue());
                    $this->DatePlaceIssuance->SetValue($this->DataSource->DatePlaceIssuance->GetValue());
                    $this->DateAccomplished->SetValue($this->DataSource->DateAccomplished->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ConsanThird->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ConsanThirdDetaila->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ConsanFourth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ConsanFourthDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AdminOffense->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AdminOffenseDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CriminallyCharged->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CriminallyChargedDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ConvictedOfCrime->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ConvictedCrimeDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeparatedFromService->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SeparatedFromServiceDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CandidateElection->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CandidateElectionDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResignedGovService->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResignedGovServiceDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StatOfImmigrant->Errors->ToString());
            $Error = ComposeStrings($Error, $this->StatOfImmigrantDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IndigenousGroupMember->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IndigenousDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DifferentlyAbled->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DifferentlyAbledDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SoloParent->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SoloParentDetails->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GovIssuedID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->IDNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePlaceIssuance->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DateAccomplished->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_DateAccomplished->Errors->ToString());
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
        $this->ConsanThird->Show();
        $this->ConsanThirdDetaila->Show();
        $this->ConsanFourth->Show();
        $this->ConsanFourthDetails->Show();
        $this->AdminOffense->Show();
        $this->AdminOffenseDetails->Show();
        $this->CriminallyCharged->Show();
        $this->CriminallyChargedDetails->Show();
        $this->ConvictedOfCrime->Show();
        $this->ConvictedCrimeDetails->Show();
        $this->SeparatedFromService->Show();
        $this->SeparatedFromServiceDetails->Show();
        $this->CandidateElection->Show();
        $this->CandidateElectionDetails->Show();
        $this->ResignedGovService->Show();
        $this->ResignedGovServiceDetails->Show();
        $this->StatOfImmigrant->Show();
        $this->StatOfImmigrantDetails->Show();
        $this->IndigenousGroupMember->Show();
        $this->IndigenousDetails->Show();
        $this->DifferentlyAbled->Show();
        $this->DifferentlyAbledDetails->Show();
        $this->SoloParent->Show();
        $this->SoloParentDetails->Show();
        $this->GovIssuedID->Show();
        $this->IDNo->Show();
        $this->DatePlaceIssuance->Show();
        $this->DateAccomplished->Show();
        $this->DatePicker_DateAccomplished->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee1 Class @105-FCB6E20C

class clsemployee1DataSource extends clsDBConnection1 {  //employee1DataSource Class @105-BDA765D5

//DataSource Variables @105-E1B8C997
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
    var $ConsanThird;
    var $ConsanThirdDetaila;
    var $ConsanFourth;
    var $ConsanFourthDetails;
    var $AdminOffense;
    var $AdminOffenseDetails;
    var $CriminallyCharged;
    var $CriminallyChargedDetails;
    var $ConvictedOfCrime;
    var $ConvictedCrimeDetails;
    var $SeparatedFromService;
    var $SeparatedFromServiceDetails;
    var $CandidateElection;
    var $CandidateElectionDetails;
    var $ResignedGovService;
    var $ResignedGovServiceDetails;
    var $StatOfImmigrant;
    var $StatOfImmigrantDetails;
    var $IndigenousGroupMember;
    var $IndigenousDetails;
    var $DifferentlyAbled;
    var $DifferentlyAbledDetails;
    var $SoloParent;
    var $SoloParentDetails;
    var $GovIssuedID;
    var $IDNo;
    var $DatePlaceIssuance;
    var $DateAccomplished;
//End DataSource Variables

//DataSourceClass_Initialize Event @105-46648D67
    function clsemployee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee1/Error";
        $this->Initialize();
        $this->ConsanThird = new clsField("ConsanThird", ccsText, "");
        
        $this->ConsanThirdDetaila = new clsField("ConsanThirdDetaila", ccsText, "");
        
        $this->ConsanFourth = new clsField("ConsanFourth", ccsText, "");
        
        $this->ConsanFourthDetails = new clsField("ConsanFourthDetails", ccsText, "");
        
        $this->AdminOffense = new clsField("AdminOffense", ccsText, "");
        
        $this->AdminOffenseDetails = new clsField("AdminOffenseDetails", ccsText, "");
        
        $this->CriminallyCharged = new clsField("CriminallyCharged", ccsText, "");
        
        $this->CriminallyChargedDetails = new clsField("CriminallyChargedDetails", ccsText, "");
        
        $this->ConvictedOfCrime = new clsField("ConvictedOfCrime", ccsText, "");
        
        $this->ConvictedCrimeDetails = new clsField("ConvictedCrimeDetails", ccsText, "");
        
        $this->SeparatedFromService = new clsField("SeparatedFromService", ccsText, "");
        
        $this->SeparatedFromServiceDetails = new clsField("SeparatedFromServiceDetails", ccsText, "");
        
        $this->CandidateElection = new clsField("CandidateElection", ccsText, "");
        
        $this->CandidateElectionDetails = new clsField("CandidateElectionDetails", ccsText, "");
        
        $this->ResignedGovService = new clsField("ResignedGovService", ccsText, "");
        
        $this->ResignedGovServiceDetails = new clsField("ResignedGovServiceDetails", ccsText, "");
        
        $this->StatOfImmigrant = new clsField("StatOfImmigrant", ccsText, "");
        
        $this->StatOfImmigrantDetails = new clsField("StatOfImmigrantDetails", ccsText, "");
        
        $this->IndigenousGroupMember = new clsField("IndigenousGroupMember", ccsText, "");
        
        $this->IndigenousDetails = new clsField("IndigenousDetails", ccsText, "");
        
        $this->DifferentlyAbled = new clsField("DifferentlyAbled", ccsText, "");
        
        $this->DifferentlyAbledDetails = new clsField("DifferentlyAbledDetails", ccsText, "");
        
        $this->SoloParent = new clsField("SoloParent", ccsText, "");
        
        $this->SoloParentDetails = new clsField("SoloParentDetails", ccsText, "");
        
        $this->GovIssuedID = new clsField("GovIssuedID", ccsText, "");
        
        $this->IDNo = new clsField("IDNo", ccsText, "");
        
        $this->DatePlaceIssuance = new clsField("DatePlaceIssuance", ccsText, "");
        
        $this->DateAccomplished = new clsField("DateAccomplished", ccsDate, $this->DateFormat);
        

        $this->InsertFields["ConsanThird"] = array("Name" => "ConsanThird", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ConsanThirdDetaila"] = array("Name" => "ConsanThirdDetaila", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ConsanFourth"] = array("Name" => "ConsanFourth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ConsanFourthDetails"] = array("Name" => "ConsanFourthDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AdminOffense"] = array("Name" => "AdminOffense", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AdminOffenseDetails"] = array("Name" => "AdminOffenseDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CriminallyCharged"] = array("Name" => "CriminallyCharged", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CriminallyChargedDetails"] = array("Name" => "CriminallyChargedDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ConvictedOfCrime"] = array("Name" => "ConvictedOfCrime", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ConvictedCrimeDetails"] = array("Name" => "ConvictedCrimeDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SeparatedFromService"] = array("Name" => "SeparatedFromService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SeparatedFromServiceDetails"] = array("Name" => "SeparatedFromServiceDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CandidateElection"] = array("Name" => "CandidateElection", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CandidateElectionDetails"] = array("Name" => "CandidateElectionDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResignedGovService"] = array("Name" => "ResignedGovService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResignedGovServiceDetails"] = array("Name" => "ResignedGovServiceDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StatOfImmigrant"] = array("Name" => "StatOfImmigrant", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["StatOfImmigrantDetails"] = array("Name" => "StatOfImmigrantDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["IndigenousGroupMember"] = array("Name" => "IndigenousGroupMember", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["IndigenousDetails"] = array("Name" => "IndigenousDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DifferentlyAbled"] = array("Name" => "DifferentlyAbled", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DifferentlyAbledDetails"] = array("Name" => "DifferentlyAbledDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SoloParent"] = array("Name" => "SoloParent", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SoloParentDetails"] = array("Name" => "SoloParentDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["GovIssuedID"] = array("Name" => "GovIssuedID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["IDNo"] = array("Name" => "IDNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DatePlaceIssuance"] = array("Name" => "DatePlaceIssuance", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["DateAccomplished"] = array("Name" => "DateAccomplished", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["ConsanThird"] = array("Name" => "ConsanThird", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ConsanThirdDetaila"] = array("Name" => "ConsanThirdDetaila", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ConsanFourth"] = array("Name" => "ConsanFourth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ConsanFourthDetails"] = array("Name" => "ConsanFourthDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AdminOffense"] = array("Name" => "AdminOffense", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AdminOffenseDetails"] = array("Name" => "AdminOffenseDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CriminallyCharged"] = array("Name" => "CriminallyCharged", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CriminallyChargedDetails"] = array("Name" => "CriminallyChargedDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ConvictedOfCrime"] = array("Name" => "ConvictedOfCrime", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ConvictedCrimeDetails"] = array("Name" => "ConvictedCrimeDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SeparatedFromService"] = array("Name" => "SeparatedFromService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SeparatedFromServiceDetails"] = array("Name" => "SeparatedFromServiceDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CandidateElection"] = array("Name" => "CandidateElection", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CandidateElectionDetails"] = array("Name" => "CandidateElectionDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResignedGovService"] = array("Name" => "ResignedGovService", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResignedGovServiceDetails"] = array("Name" => "ResignedGovServiceDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StatOfImmigrant"] = array("Name" => "StatOfImmigrant", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["StatOfImmigrantDetails"] = array("Name" => "StatOfImmigrantDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["IndigenousGroupMember"] = array("Name" => "IndigenousGroupMember", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["IndigenousDetails"] = array("Name" => "IndigenousDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DifferentlyAbled"] = array("Name" => "DifferentlyAbled", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DifferentlyAbledDetails"] = array("Name" => "DifferentlyAbledDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SoloParent"] = array("Name" => "SoloParent", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SoloParentDetails"] = array("Name" => "SoloParentDetails", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["GovIssuedID"] = array("Name" => "GovIssuedID", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["IDNo"] = array("Name" => "IDNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DatePlaceIssuance"] = array("Name" => "DatePlaceIssuance", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["DateAccomplished"] = array("Name" => "DateAccomplished", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @105-361705F1
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

//Open Method @105-FDA4A403
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

//SetValues Method @105-761D36D9
    function SetValues()
    {
        $this->ConsanThird->SetDBValue($this->f("ConsanThird"));
        $this->ConsanThirdDetaila->SetDBValue($this->f("ConsanThirdDetaila"));
        $this->ConsanFourth->SetDBValue($this->f("ConsanFourth"));
        $this->ConsanFourthDetails->SetDBValue($this->f("ConsanFourthDetails"));
        $this->AdminOffense->SetDBValue($this->f("AdminOffense"));
        $this->AdminOffenseDetails->SetDBValue($this->f("AdminOffenseDetails"));
        $this->CriminallyCharged->SetDBValue($this->f("CriminallyCharged"));
        $this->CriminallyChargedDetails->SetDBValue($this->f("CriminallyChargedDetails"));
        $this->ConvictedOfCrime->SetDBValue($this->f("ConvictedOfCrime"));
        $this->ConvictedCrimeDetails->SetDBValue($this->f("ConvictedCrimeDetails"));
        $this->SeparatedFromService->SetDBValue($this->f("SeparatedFromService"));
        $this->SeparatedFromServiceDetails->SetDBValue($this->f("SeparatedFromServiceDetails"));
        $this->CandidateElection->SetDBValue($this->f("CandidateElection"));
        $this->CandidateElectionDetails->SetDBValue($this->f("CandidateElectionDetails"));
        $this->ResignedGovService->SetDBValue($this->f("ResignedGovService"));
        $this->ResignedGovServiceDetails->SetDBValue($this->f("ResignedGovServiceDetails"));
        $this->StatOfImmigrant->SetDBValue($this->f("StatOfImmigrant"));
        $this->StatOfImmigrantDetails->SetDBValue($this->f("StatOfImmigrantDetails"));
        $this->IndigenousGroupMember->SetDBValue($this->f("IndigenousGroupMember"));
        $this->IndigenousDetails->SetDBValue($this->f("IndigenousDetails"));
        $this->DifferentlyAbled->SetDBValue($this->f("DifferentlyAbled"));
        $this->DifferentlyAbledDetails->SetDBValue($this->f("DifferentlyAbledDetails"));
        $this->SoloParent->SetDBValue($this->f("SoloParent"));
        $this->SoloParentDetails->SetDBValue($this->f("SoloParentDetails"));
        $this->GovIssuedID->SetDBValue($this->f("GovIssuedID"));
        $this->IDNo->SetDBValue($this->f("IDNo"));
        $this->DatePlaceIssuance->SetDBValue($this->f("DatePlaceIssuance"));
        $this->DateAccomplished->SetDBValue(trim($this->f("DateAccomplished")));
    }
//End SetValues Method

//Insert Method @105-8AC5334B
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["ConsanThird"]["Value"] = $this->ConsanThird->GetDBValue(true);
        $this->InsertFields["ConsanThirdDetaila"]["Value"] = $this->ConsanThirdDetaila->GetDBValue(true);
        $this->InsertFields["ConsanFourth"]["Value"] = $this->ConsanFourth->GetDBValue(true);
        $this->InsertFields["ConsanFourthDetails"]["Value"] = $this->ConsanFourthDetails->GetDBValue(true);
        $this->InsertFields["AdminOffense"]["Value"] = $this->AdminOffense->GetDBValue(true);
        $this->InsertFields["AdminOffenseDetails"]["Value"] = $this->AdminOffenseDetails->GetDBValue(true);
        $this->InsertFields["CriminallyCharged"]["Value"] = $this->CriminallyCharged->GetDBValue(true);
        $this->InsertFields["CriminallyChargedDetails"]["Value"] = $this->CriminallyChargedDetails->GetDBValue(true);
        $this->InsertFields["ConvictedOfCrime"]["Value"] = $this->ConvictedOfCrime->GetDBValue(true);
        $this->InsertFields["ConvictedCrimeDetails"]["Value"] = $this->ConvictedCrimeDetails->GetDBValue(true);
        $this->InsertFields["SeparatedFromService"]["Value"] = $this->SeparatedFromService->GetDBValue(true);
        $this->InsertFields["SeparatedFromServiceDetails"]["Value"] = $this->SeparatedFromServiceDetails->GetDBValue(true);
        $this->InsertFields["CandidateElection"]["Value"] = $this->CandidateElection->GetDBValue(true);
        $this->InsertFields["CandidateElectionDetails"]["Value"] = $this->CandidateElectionDetails->GetDBValue(true);
        $this->InsertFields["ResignedGovService"]["Value"] = $this->ResignedGovService->GetDBValue(true);
        $this->InsertFields["ResignedGovServiceDetails"]["Value"] = $this->ResignedGovServiceDetails->GetDBValue(true);
        $this->InsertFields["StatOfImmigrant"]["Value"] = $this->StatOfImmigrant->GetDBValue(true);
        $this->InsertFields["StatOfImmigrantDetails"]["Value"] = $this->StatOfImmigrantDetails->GetDBValue(true);
        $this->InsertFields["IndigenousGroupMember"]["Value"] = $this->IndigenousGroupMember->GetDBValue(true);
        $this->InsertFields["IndigenousDetails"]["Value"] = $this->IndigenousDetails->GetDBValue(true);
        $this->InsertFields["DifferentlyAbled"]["Value"] = $this->DifferentlyAbled->GetDBValue(true);
        $this->InsertFields["DifferentlyAbledDetails"]["Value"] = $this->DifferentlyAbledDetails->GetDBValue(true);
        $this->InsertFields["SoloParent"]["Value"] = $this->SoloParent->GetDBValue(true);
        $this->InsertFields["SoloParentDetails"]["Value"] = $this->SoloParentDetails->GetDBValue(true);
        $this->InsertFields["GovIssuedID"]["Value"] = $this->GovIssuedID->GetDBValue(true);
        $this->InsertFields["IDNo"]["Value"] = $this->IDNo->GetDBValue(true);
        $this->InsertFields["DatePlaceIssuance"]["Value"] = $this->DatePlaceIssuance->GetDBValue(true);
        $this->InsertFields["DateAccomplished"]["Value"] = $this->DateAccomplished->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @105-09403F11
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["ConsanThird"]["Value"] = $this->ConsanThird->GetDBValue(true);
        $this->UpdateFields["ConsanThirdDetaila"]["Value"] = $this->ConsanThirdDetaila->GetDBValue(true);
        $this->UpdateFields["ConsanFourth"]["Value"] = $this->ConsanFourth->GetDBValue(true);
        $this->UpdateFields["ConsanFourthDetails"]["Value"] = $this->ConsanFourthDetails->GetDBValue(true);
        $this->UpdateFields["AdminOffense"]["Value"] = $this->AdminOffense->GetDBValue(true);
        $this->UpdateFields["AdminOffenseDetails"]["Value"] = $this->AdminOffenseDetails->GetDBValue(true);
        $this->UpdateFields["CriminallyCharged"]["Value"] = $this->CriminallyCharged->GetDBValue(true);
        $this->UpdateFields["CriminallyChargedDetails"]["Value"] = $this->CriminallyChargedDetails->GetDBValue(true);
        $this->UpdateFields["ConvictedOfCrime"]["Value"] = $this->ConvictedOfCrime->GetDBValue(true);
        $this->UpdateFields["ConvictedCrimeDetails"]["Value"] = $this->ConvictedCrimeDetails->GetDBValue(true);
        $this->UpdateFields["SeparatedFromService"]["Value"] = $this->SeparatedFromService->GetDBValue(true);
        $this->UpdateFields["SeparatedFromServiceDetails"]["Value"] = $this->SeparatedFromServiceDetails->GetDBValue(true);
        $this->UpdateFields["CandidateElection"]["Value"] = $this->CandidateElection->GetDBValue(true);
        $this->UpdateFields["CandidateElectionDetails"]["Value"] = $this->CandidateElectionDetails->GetDBValue(true);
        $this->UpdateFields["ResignedGovService"]["Value"] = $this->ResignedGovService->GetDBValue(true);
        $this->UpdateFields["ResignedGovServiceDetails"]["Value"] = $this->ResignedGovServiceDetails->GetDBValue(true);
        $this->UpdateFields["StatOfImmigrant"]["Value"] = $this->StatOfImmigrant->GetDBValue(true);
        $this->UpdateFields["StatOfImmigrantDetails"]["Value"] = $this->StatOfImmigrantDetails->GetDBValue(true);
        $this->UpdateFields["IndigenousGroupMember"]["Value"] = $this->IndigenousGroupMember->GetDBValue(true);
        $this->UpdateFields["IndigenousDetails"]["Value"] = $this->IndigenousDetails->GetDBValue(true);
        $this->UpdateFields["DifferentlyAbled"]["Value"] = $this->DifferentlyAbled->GetDBValue(true);
        $this->UpdateFields["DifferentlyAbledDetails"]["Value"] = $this->DifferentlyAbledDetails->GetDBValue(true);
        $this->UpdateFields["SoloParent"]["Value"] = $this->SoloParent->GetDBValue(true);
        $this->UpdateFields["SoloParentDetails"]["Value"] = $this->SoloParentDetails->GetDBValue(true);
        $this->UpdateFields["GovIssuedID"]["Value"] = $this->GovIssuedID->GetDBValue(true);
        $this->UpdateFields["IDNo"]["Value"] = $this->IDNo->GetDBValue(true);
        $this->UpdateFields["DatePlaceIssuance"]["Value"] = $this->DatePlaceIssuance->GetDBValue(true);
        $this->UpdateFields["DateAccomplished"]["Value"] = $this->DateAccomplished->GetDBValue(true);
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

//Delete Method @105-C822B971
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

} //End employee1DataSource Class @105-FCB6E20C

//Initialize Page @1-1B1CCA89
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
$TemplateFileName = "ConsanguinityAffinity.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5E8EA550
CCSecurityRedirect("7;6", "");
//End Authenticate User

//Include events file @1-40DD8F99
include_once("./ConsanguinityAffinity_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-FF123A8A
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
