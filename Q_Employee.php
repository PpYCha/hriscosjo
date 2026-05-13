<?php
//Include Common Files @1-8DE98D11
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Q_Employee.php");
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

//Class_Initialize Event @2-621983F1
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

        $this->EmployeeIDNo = & new clsControl(ccsLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsLabel, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsLabel, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->EmpPicture = & new clsControl(ccsImage, "EmpPicture", "EmpPicture", ccsText, "", CCGetRequestParam("EmpPicture", ccsGet, NULL), $this);
        $this->Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $this);
        $this->Link1->Page = "QEmployeePersonal.php";
        $this->Link2 = & new clsControl(ccsLink, "Link2", "Link2", ccsText, "", CCGetRequestParam("Link2", ccsGet, NULL), $this);
        $this->Link2->Page = "QEmp_Children.php";
        $this->Link3 = & new clsControl(ccsLink, "Link3", "Link3", ccsText, "", CCGetRequestParam("Link3", ccsGet, NULL), $this);
        $this->Link3->Page = "QEmp_Educatn.php";
        $this->Link4 = & new clsControl(ccsLink, "Link4", "Link4", ccsText, "", CCGetRequestParam("Link4", ccsGet, NULL), $this);
        $this->Link4->Page = "QEmp_Eligibility2.php";
        $this->Link5 = & new clsControl(ccsLink, "Link5", "Link5", ccsText, "", CCGetRequestParam("Link5", ccsGet, NULL), $this);
        $this->Link5->Page = "QEmp_WorkExp3.php";
        $this->Link6 = & new clsControl(ccsLink, "Link6", "Link6", ccsText, "", CCGetRequestParam("Link6", ccsGet, NULL), $this);
        $this->Link6->Page = "QEmp_VolWork2.php";
        $this->Link8 = & new clsControl(ccsLink, "Link8", "Link8", ccsText, "", CCGetRequestParam("Link8", ccsGet, NULL), $this);
        $this->Link8->Page = "QEmp_Skills2.php";
        $this->Link9 = & new clsControl(ccsLink, "Link9", "Link9", ccsText, "", CCGetRequestParam("Link9", ccsGet, NULL), $this);
        $this->Link9->Page = "QEmp_Distiction.php";
        $this->Link10 = & new clsControl(ccsLink, "Link10", "Link10", ccsText, "", CCGetRequestParam("Link10", ccsGet, NULL), $this);
        $this->Link10->Page = "QEmp_CurrentPosition.php";
        $this->Link7 = & new clsControl(ccsLink, "Link7", "Link7", ccsText, "", CCGetRequestParam("Link7", ccsGet, NULL), $this);
        $this->Link7->Page = "QEmp_Trainng2.php";
        $this->Link11 = & new clsControl(ccsLink, "Link11", "Link11", ccsText, "", CCGetRequestParam("Link11", ccsGet, NULL), $this);
        $this->Link11->Page = "QEmp_Membership.php";
        $this->Link14 = & new clsControl(ccsLink, "Link14", "Link14", ccsText, "", CCGetRequestParam("Link14", ccsGet, NULL), $this);
        $this->Link14->Page = "QEmp_Consanguinity2.php";
        $this->Link15 = & new clsControl(ccsLink, "Link15", "Link15", ccsText, "", CCGetRequestParam("Link15", ccsGet, NULL), $this);
        $this->Link15->Page = "QEmp_References.php";
        $this->employee_TotalRecords = & new clsControl(ccsLabel, "employee_TotalRecords", "employee_TotalRecords", ccsInteger, array(False, 0, Null, Null, False, "", "", 1, True, ""), CCGetRequestParam("employee_TotalRecords", ccsGet, NULL), $this);
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

//Show Method @2-9C25C7D9
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_EmployeeIDNo"] = CCGetFromGet("s_EmployeeIDNo", NULL);
        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleName"] = CCGetFromGet("s_MiddleName", NULL);
        $this->DataSource->Parameters["urls_Sex"] = CCGetFromGet("s_Sex", NULL);
        $this->DataSource->Parameters["urls_CivilStatus"] = CCGetFromGet("s_CivilStatus", NULL);
        $this->DataSource->Parameters["urls_PermMunicipality"] = CCGetFromGet("s_PermMunicipality", NULL);
        $this->DataSource->Parameters["urls_OfficeID"] = CCGetFromGet("s_OfficeID", NULL);
        $this->DataSource->Parameters["urls_SalaryGrade"] = CCGetFromGet("s_SalaryGrade", NULL);
        $this->DataSource->Parameters["urls_StepIncrement"] = CCGetFromGet("s_StepIncrement", NULL);
        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
        $this->DataSource->Parameters["urlCheckBoxList1"] = CCGetFromGet("CheckBoxList1", NULL);

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
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["EmpPicture"] = $this->EmpPicture->Visible;
            $this->ControlsVisible["Link1"] = $this->Link1->Visible;
            $this->ControlsVisible["Link2"] = $this->Link2->Visible;
            $this->ControlsVisible["Link3"] = $this->Link3->Visible;
            $this->ControlsVisible["Link4"] = $this->Link4->Visible;
            $this->ControlsVisible["Link5"] = $this->Link5->Visible;
            $this->ControlsVisible["Link6"] = $this->Link6->Visible;
            $this->ControlsVisible["Link8"] = $this->Link8->Visible;
            $this->ControlsVisible["Link9"] = $this->Link9->Visible;
            $this->ControlsVisible["Link10"] = $this->Link10->Visible;
            $this->ControlsVisible["Link7"] = $this->Link7->Visible;
            $this->ControlsVisible["Link11"] = $this->Link11->Visible;
            $this->ControlsVisible["Link14"] = $this->Link14->Visible;
            $this->ControlsVisible["Link15"] = $this->Link15->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
                $this->Surname->SetValue($this->DataSource->Surname->GetValue());
                $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
                $this->EmpPicture->SetValue($this->DataSource->EmpPicture->GetValue());
                $this->Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link1->Parameters = CCAddParam($this->Link1->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link2->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link2->Parameters = CCAddParam($this->Link2->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link3->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link3->Parameters = CCAddParam($this->Link3->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link4->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link4->Parameters = CCAddParam($this->Link4->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link5->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link5->Parameters = CCAddParam($this->Link5->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link6->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link6->Parameters = CCAddParam($this->Link6->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link8->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link8->Parameters = CCAddParam($this->Link8->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link9->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link9->Parameters = CCAddParam($this->Link9->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link10->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link10->Parameters = CCAddParam($this->Link10->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link7->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link7->Parameters = CCAddParam($this->Link7->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link11->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link11->Parameters = CCAddParam($this->Link11->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link14->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link14->Parameters = CCAddParam($this->Link14->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Link15->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Link15->Parameters = CCAddParam($this->Link15->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeIDNo->Show();
                $this->Surname->Show();
                $this->FirstName->Show();
                $this->MiddleName->Show();
                $this->EmpPicture->Show();
                $this->Link1->Show();
                $this->Link2->Show();
                $this->Link3->Show();
                $this->Link4->Show();
                $this->Link5->Show();
                $this->Link6->Show();
                $this->Link8->Show();
                $this->Link9->Show();
                $this->Link10->Show();
                $this->Link7->Show();
                $this->Link11->Show();
                $this->Link14->Show();
                $this->Link15->Show();
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
        $this->employee_TotalRecords->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-B813F6C1
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmpPicture->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link6->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link8->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link9->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link10->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link7->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link11->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link14->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Link15->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee Class @2-FCB6E20C

class clsemployeeDataSource extends clsDBConnection1 {  //employeeDataSource Class @2-3A1764EA

//DataSource Variables @2-2DB2F32A
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $CountSQL;
    var $wp;


    // Datasource fields
    var $EmployeeIDNo;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $EmpPicture;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-3168115E
    function clsemployeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid employee";
        $this->Initialize();
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->EmpPicture = new clsField("EmpPicture", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-D43D218A
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "employee.Surname, FirstName";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-61A55B1B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_EmployeeIDNo", ccsText, "", "", $this->Parameters["urls_EmployeeIDNo"], "", false);
        $this->wp->AddParameter("2", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->AddParameter("5", "urls_Sex", ccsInteger, "", "", $this->Parameters["urls_Sex"], "", false);
        $this->wp->AddParameter("6", "urls_CivilStatus", ccsText, "", "", $this->Parameters["urls_CivilStatus"], "", false);
        $this->wp->AddParameter("7", "urls_PermMunicipality", ccsText, "", "", $this->Parameters["urls_PermMunicipality"], "", false);
        $this->wp->AddParameter("8", "urls_OfficeID", ccsInteger, "", "", $this->Parameters["urls_OfficeID"], "", false);
        $this->wp->AddParameter("9", "urls_SalaryGrade", ccsText, "", "", $this->Parameters["urls_SalaryGrade"], "", false);
        $this->wp->AddParameter("10", "urls_StepIncrement", ccsText, "", "", $this->Parameters["urls_StepIncrement"], "", false);
        $this->wp->AddParameter("11", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->wp->AddParameter("12", "urlCheckBoxList1", ccsText, "", "", $this->Parameters["urlCheckBoxList1"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.EmployeeIDNo", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "employee.Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "employee.FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "employee.MiddleName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "employee.Sex", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opEqual, "employee.CivilStatus", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opEqual, "employee.PermMunicipality", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsText),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opEqual, "employee.OfficeID", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsInteger),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opEqual, "employee.SalaryGrade", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsText),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opEqual, "employee.StepIncrement", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsText),false);
        $this->wp->Criterion[11] = $this->wp->Operation(opEqual, "employee.EmployeeID", $this->wp->GetDBValue("11"), $this->ToSQL($this->wp->GetDBValue("11"), ccsInteger),false);
        $this->wp->Criterion[12] = $this->wp->Operation(opIn, "lut_statofappt2.StatApp", $this->wp->GetDBValue("12"), $this->ToSQL($this->wp->GetDBValue("12"), ccsText, true),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]), 
             $this->wp->Criterion[6]), 
             $this->wp->Criterion[7]), 
             $this->wp->Criterion[8]), 
             $this->wp->Criterion[9]), 
             $this->wp->Criterion[10]), 
             $this->wp->Criterion[11]), 
             $this->wp->Criterion[12]);
    }
//End Prepare Method

//Open Method @2-0685DEBB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee INNER JOIN lut_statofappt2 ON\n\n" .
        "employee.StatAppID = lut_statofappt2.StatAppID";
        $this->SQL = "SELECT * \n\n" .
        "FROM employee INNER JOIN lut_statofappt2 ON\n\n" .
        "employee.StatAppID = lut_statofappt2.StatAppID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-FFCFDDB3
    function SetValues()
    {
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->EmpPicture->SetDBValue($this->f("EmpPicture"));
    }
//End SetValues Method

} //End employeeDataSource Class @2-FCB6E20C

class clsRecordemployeeSearch { //employeeSearch Class @3-4066B21E

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

//Class_Initialize Event @3-79185184
    function clsRecordemployeeSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record employeeSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "employeeSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = split(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->ClearParameters = & new clsControl(ccsLink, "ClearParameters", "ClearParameters", ccsText, "", CCGetRequestParam("ClearParameters", $Method, NULL), $this);
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_EmployeeIDNo", "s_Surname", "s_FirstName", "s_MiddleName", "CheckBoxList1", "s_Sex", "s_CivilStatus", "s_PermMunicipality", "s_OfficeID", "ccsForm"));
            $this->ClearParameters->Page = "Q_Employee.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_EmployeeIDNo = & new clsControl(ccsTextBox, "s_EmployeeIDNo", "s_EmployeeIDNo", ccsText, "", CCGetRequestParam("s_EmployeeIDNo", $Method, NULL), $this);
            $this->s_Surname = & new clsControl(ccsTextBox, "s_Surname", "s_Surname", ccsText, "", CCGetRequestParam("s_Surname", $Method, NULL), $this);
            $this->s_FirstName = & new clsControl(ccsTextBox, "s_FirstName", "s_FirstName", ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_MiddleName = & new clsControl(ccsTextBox, "s_MiddleName", "s_MiddleName", ccsText, "", CCGetRequestParam("s_MiddleName", $Method, NULL), $this);
            $this->CheckBoxList1 = & new clsControl(ccsCheckBoxList, "CheckBoxList1", "CheckBoxList1", ccsText, "", CCGetRequestParam("CheckBoxList1", $Method, NULL), $this);
            $this->CheckBoxList1->Multiple = true;
            $this->CheckBoxList1->DSType = dsTable;
            $this->CheckBoxList1->DataSource = new clsDBConnection1();
            $this->CheckBoxList1->ds = & $this->CheckBoxList1->DataSource;
            $this->CheckBoxList1->DataSource->SQL = "SELECT * \n" .
"FROM lut_statofappt2 {SQL_Where} {SQL_OrderBy}";
            list($this->CheckBoxList1->BoundColumn, $this->CheckBoxList1->TextColumn, $this->CheckBoxList1->DBFormat) = array("StatApp", "StatApp", "");
            $this->CheckBoxList1->HTML = true;
            $this->s_Sex = & new clsControl(ccsListBox, "s_Sex", "s_Sex", ccsInteger, "", CCGetRequestParam("s_Sex", $Method, NULL), $this);
            $this->s_Sex->DSType = dsTable;
            $this->s_Sex->DataSource = new clsDBConnection1();
            $this->s_Sex->ds = & $this->s_Sex->DataSource;
            $this->s_Sex->DataSource->SQL = "SELECT * \n" .
"FROM lut_sex {SQL_Where} {SQL_OrderBy}";
            list($this->s_Sex->BoundColumn, $this->s_Sex->TextColumn, $this->s_Sex->DBFormat) = array("SexID", "Sex", "");
            $this->s_CivilStatus = & new clsControl(ccsListBox, "s_CivilStatus", "s_CivilStatus", ccsText, "", CCGetRequestParam("s_CivilStatus", $Method, NULL), $this);
            $this->s_CivilStatus->DSType = dsTable;
            $this->s_CivilStatus->DataSource = new clsDBConnection1();
            $this->s_CivilStatus->ds = & $this->s_CivilStatus->DataSource;
            $this->s_CivilStatus->DataSource->SQL = "SELECT * \n" .
"FROM lut_civilstatus {SQL_Where} {SQL_OrderBy}";
            list($this->s_CivilStatus->BoundColumn, $this->s_CivilStatus->TextColumn, $this->s_CivilStatus->DBFormat) = array("CivilStat", "CivilStat", "");
            $this->s_PermMunicipality = & new clsControl(ccsListBox, "s_PermMunicipality", "s_PermMunicipality", ccsText, "", CCGetRequestParam("s_PermMunicipality", $Method, NULL), $this);
            $this->s_PermMunicipality->DSType = dsTable;
            $this->s_PermMunicipality->DataSource = new clsDBConnection1();
            $this->s_PermMunicipality->ds = & $this->s_PermMunicipality->DataSource;
            $this->s_PermMunicipality->DataSource->SQL = "SELECT * \n" .
"FROM lut_municipality {SQL_Where} {SQL_OrderBy}";
            list($this->s_PermMunicipality->BoundColumn, $this->s_PermMunicipality->TextColumn, $this->s_PermMunicipality->DBFormat) = array("Municipality", "Municipality", "");
            $this->s_OfficeID = & new clsControl(ccsListBox, "s_OfficeID", "s_OfficeID", ccsInteger, "", CCGetRequestParam("s_OfficeID", $Method, NULL), $this);
            $this->s_OfficeID->DSType = dsTable;
            $this->s_OfficeID->DataSource = new clsDBConnection1();
            $this->s_OfficeID->ds = & $this->s_OfficeID->DataSource;
            $this->s_OfficeID->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            $this->s_OfficeID->DataSource->Order = "OfficeAcronym";
            list($this->s_OfficeID->BoundColumn, $this->s_OfficeID->TextColumn, $this->s_OfficeID->DBFormat) = array("OfficeID", "OfficeAcronym", "");
            $this->s_OfficeID->DataSource->Order = "OfficeAcronym";
        }
    }
//End Class_Initialize Event

//Validate Method @3-94015293
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_EmployeeIDNo->Validate() && $Validation);
        $Validation = ($this->s_Surname->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_MiddleName->Validate() && $Validation);
        $Validation = ($this->CheckBoxList1->Validate() && $Validation);
        $Validation = ($this->s_Sex->Validate() && $Validation);
        $Validation = ($this->s_CivilStatus->Validate() && $Validation);
        $Validation = ($this->s_PermMunicipality->Validate() && $Validation);
        $Validation = ($this->s_OfficeID->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_EmployeeIDNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CheckBoxList1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Sex->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_CivilStatus->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PermMunicipality->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_OfficeID->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-3C6C0628
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->s_Surname->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_MiddleName->Errors->Count());
        $errors = ($errors || $this->CheckBoxList1->Errors->Count());
        $errors = ($errors || $this->s_Sex->Errors->Count());
        $errors = ($errors || $this->s_CivilStatus->Errors->Count());
        $errors = ($errors || $this->s_PermMunicipality->Errors->Count());
        $errors = ($errors || $this->s_OfficeID->Errors->Count());
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

//Operation Method @3-BD2AC90E
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
        $Redirect = "Q_Employee.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "Q_Employee.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-0583FD8A
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

        $this->CheckBoxList1->Prepare();
        $this->s_Sex->Prepare();
        $this->s_CivilStatus->Prepare();
        $this->s_PermMunicipality->Prepare();
        $this->s_OfficeID->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_EmployeeIDNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Surname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CheckBoxList1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Sex->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_CivilStatus->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PermMunicipality->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_OfficeID->Errors->ToString());
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
        $this->s_EmployeeIDNo->Show();
        $this->s_Surname->Show();
        $this->s_FirstName->Show();
        $this->s_MiddleName->Show();
        $this->CheckBoxList1->Show();
        $this->s_Sex->Show();
        $this->s_CivilStatus->Show();
        $this->s_PermMunicipality->Show();
        $this->s_OfficeID->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employeeSearch Class @3-FCB6E20C

//Initialize Page @1-C843EFE9
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
$TemplateFileName = "Q_Employee.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-5FB88FCE
CCSecurityRedirect("7;6;5;4;3;2", "");
//End Authenticate User

//Include events file @1-85570DD0
include_once("./Q_Employee_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-09E6AF68
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee = & new clsGridemployee("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "index.php";
$employeeSearch = & new clsRecordemployeeSearch("", $MainPage);
$MainPage->employee = & $employee;
$MainPage->Link1 = & $Link1;
$MainPage->employeeSearch = & $employeeSearch;
$employee->Initialize();

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

//Execute Components @1-89AB6C89
$employeeSearch->Operation();
//End Execute Components

//Go to destination page @1-92BCBB79
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employee);
    unset($employeeSearch);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-D4A908E8
$employee->Show();
$employeeSearch->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-30B256D2
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employee);
unset($employeeSearch);
unset($Tpl);
//End Unload Page


?>
