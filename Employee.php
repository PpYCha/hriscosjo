<?php
//Include Common Files @1-AA313059
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Employee.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

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

//Class_Initialize Event @3-A9BB6973
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
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_EmployeeIDNo", "s_Surname", "s_FirstName", "s_MiddleName", "ccsForm"));
            $this->ClearParameters->Page = "Employee.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_EmployeeIDNo = & new clsControl(ccsTextBox, "s_EmployeeIDNo", "s_EmployeeIDNo", ccsText, "", CCGetRequestParam("s_EmployeeIDNo", $Method, NULL), $this);
            $this->s_Surname = & new clsControl(ccsTextBox, "s_Surname", "s_Surname", ccsText, "", CCGetRequestParam("s_Surname", $Method, NULL), $this);
            $this->s_FirstName = & new clsControl(ccsTextBox, "s_FirstName", "s_FirstName", ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_MiddleName = & new clsControl(ccsTextBox, "s_MiddleName", "s_MiddleName", ccsText, "", CCGetRequestParam("s_MiddleName", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-7250C7F5
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_EmployeeIDNo->Validate() && $Validation);
        $Validation = ($this->s_Surname->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_MiddleName->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_EmployeeIDNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleName->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-27F34876
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->s_Surname->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_MiddleName->Errors->Count());
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

//Operation Method @3-03D4AE34
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
        $Redirect = "Employee.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "Employee.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-C1862F87
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
            $Error = ComposeStrings($Error, $this->s_EmployeeIDNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Surname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MiddleName->Errors->ToString());
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employeeSearch Class @3-FCB6E20C

class clsRecordemployee1 { //employee1 Class @76-BD315ADE

//Variables @76-D6FF3E86

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

//Class_Initialize Event @76-1AD09A3A
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
            $this->FormEnctype = "multipart/form-data";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = & new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = & new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = & new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = & new clsButton("Button_Cancel", $Method, $this);
            $this->EmployeeIDNo = & new clsControl(ccsTextBox, "EmployeeIDNo", "IDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", $Method, NULL), $this);
            $this->Surname = & new clsControl(ccsTextBox, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", $Method, NULL), $this);
            $this->Surname->Required = true;
            $this->FirstName = & new clsControl(ccsTextBox, "FirstName", "First Name", ccsText, "", CCGetRequestParam("FirstName", $Method, NULL), $this);
            $this->FirstName->Required = true;
            $this->MiddleName = & new clsControl(ccsTextBox, "MiddleName", "Middle Name", ccsText, "", CCGetRequestParam("MiddleName", $Method, NULL), $this);
            $this->MiddleName->Required = true;
            $this->MiddleInitial = & new clsControl(ccsTextBox, "MiddleInitial", "Middle Initial", ccsText, "", CCGetRequestParam("MiddleInitial", $Method, NULL), $this);
            $this->NameExtension = & new clsControl(ccsListBox, "NameExtension", "Name Extension", ccsText, "", CCGetRequestParam("NameExtension", $Method, NULL), $this);
            $this->NameExtension->DSType = dsTable;
            $this->NameExtension->DataSource = new clsDBConnection1();
            $this->NameExtension->ds = & $this->NameExtension->DataSource;
            $this->NameExtension->DataSource->SQL = "SELECT * \n" .
"FROM lut_namext {SQL_Where} {SQL_OrderBy}";
            list($this->NameExtension->BoundColumn, $this->NameExtension->TextColumn, $this->NameExtension->DBFormat) = array("NameEx", "NameEx", "");
            $this->BirthMonth = & new clsControl(ccsListBox, "BirthMonth", "Birth Month", ccsText, "", CCGetRequestParam("BirthMonth", $Method, NULL), $this);
            $this->BirthMonth->DSType = dsTable;
            $this->BirthMonth->DataSource = new clsDBConnection1();
            $this->BirthMonth->ds = & $this->BirthMonth->DataSource;
            $this->BirthMonth->DataSource->SQL = "SELECT * \n" .
"FROM lut_month {SQL_Where} {SQL_OrderBy}";
            list($this->BirthMonth->BoundColumn, $this->BirthMonth->TextColumn, $this->BirthMonth->DBFormat) = array("Month", "Month", "");
            $this->PlaceOfBirth = & new clsControl(ccsTextBox, "PlaceOfBirth", "Place Of Birth", ccsText, "", CCGetRequestParam("PlaceOfBirth", $Method, NULL), $this);
            $this->Sex = & new clsControl(ccsListBox, "Sex", "Sex", ccsText, "", CCGetRequestParam("Sex", $Method, NULL), $this);
            $this->Sex->DSType = dsTable;
            $this->Sex->DataSource = new clsDBConnection1();
            $this->Sex->ds = & $this->Sex->DataSource;
            $this->Sex->DataSource->SQL = "SELECT * \n" .
"FROM lut_sex {SQL_Where} {SQL_OrderBy}";
            list($this->Sex->BoundColumn, $this->Sex->TextColumn, $this->Sex->DBFormat) = array("SexID", "Sex", "");
            $this->CivilStatus = & new clsControl(ccsListBox, "CivilStatus", "Civil Status", ccsText, "", CCGetRequestParam("CivilStatus", $Method, NULL), $this);
            $this->CivilStatus->DSType = dsTable;
            $this->CivilStatus->DataSource = new clsDBConnection1();
            $this->CivilStatus->ds = & $this->CivilStatus->DataSource;
            $this->CivilStatus->DataSource->SQL = "SELECT * \n" .
"FROM lut_civilstatus {SQL_Where} {SQL_OrderBy}";
            list($this->CivilStatus->BoundColumn, $this->CivilStatus->TextColumn, $this->CivilStatus->DBFormat) = array("CivilStat", "CivilStat", "");
            $this->Height = & new clsControl(ccsTextBox, "Height", "Height", ccsText, "", CCGetRequestParam("Height", $Method, NULL), $this);
            $this->Weight = & new clsControl(ccsTextBox, "Weight", "Weight", ccsText, "", CCGetRequestParam("Weight", $Method, NULL), $this);
            $this->BloodType = & new clsControl(ccsListBox, "BloodType", "Blood Type", ccsText, "", CCGetRequestParam("BloodType", $Method, NULL), $this);
            $this->BloodType->DSType = dsTable;
            $this->BloodType->DataSource = new clsDBConnection1();
            $this->BloodType->ds = & $this->BloodType->DataSource;
            $this->BloodType->DataSource->SQL = "SELECT * \n" .
"FROM lut_bloodtype {SQL_Where} {SQL_OrderBy}";
            list($this->BloodType->BoundColumn, $this->BloodType->TextColumn, $this->BloodType->DBFormat) = array("BloodType", "BloodType", "");
            $this->GsisIdNo = & new clsControl(ccsTextBox, "GsisIdNo", "Gsis Id No", ccsText, "", CCGetRequestParam("GsisIdNo", $Method, NULL), $this);
            $this->GsisBPN = & new clsControl(ccsTextBox, "GsisBPN", "Gsis BPN", ccsText, "", CCGetRequestParam("GsisBPN", $Method, NULL), $this);
            $this->PagIbigIDNo = & new clsControl(ccsTextBox, "PagIbigIDNo", "Pag Ibig IDNo", ccsText, "", CCGetRequestParam("PagIbigIDNo", $Method, NULL), $this);
            $this->PhilhealthNo = & new clsControl(ccsTextBox, "PhilhealthNo", "Philhealth No", ccsText, "", CCGetRequestParam("PhilhealthNo", $Method, NULL), $this);
            $this->SssNo = & new clsControl(ccsTextBox, "SssNo", "Sss No", ccsText, "", CCGetRequestParam("SssNo", $Method, NULL), $this);
            $this->Tin = & new clsControl(ccsTextBox, "Tin", "Tin", ccsText, "", CCGetRequestParam("Tin", $Method, NULL), $this);
            $this->AgencyEmpNo = & new clsControl(ccsTextBox, "AgencyEmpNo", "Agency Emp No", ccsText, "", CCGetRequestParam("AgencyEmpNo", $Method, NULL), $this);
            $this->Citizenship = & new clsControl(ccsTextBox, "Citizenship", "Citizenship", ccsText, "", CCGetRequestParam("Citizenship", $Method, NULL), $this);
            $this->ResHouseNo = & new clsControl(ccsTextBox, "ResHouseNo", "Res House No", ccsText, "", CCGetRequestParam("ResHouseNo", $Method, NULL), $this);
            $this->ResSubVillage = & new clsControl(ccsTextBox, "ResSubVillage", "Res Sub Village", ccsText, "", CCGetRequestParam("ResSubVillage", $Method, NULL), $this);
            $this->ResMunicipality = & new clsControl(ccsListBox, "ResMunicipality", "Res Municipality", ccsText, "", CCGetRequestParam("ResMunicipality", $Method, NULL), $this);
            $this->ResMunicipality->DSType = dsTable;
            $this->ResMunicipality->DataSource = new clsDBConnection1();
            $this->ResMunicipality->ds = & $this->ResMunicipality->DataSource;
            $this->ResMunicipality->DataSource->SQL = "SELECT * \n" .
"FROM lut_municipality {SQL_Where} {SQL_OrderBy}";
            list($this->ResMunicipality->BoundColumn, $this->ResMunicipality->TextColumn, $this->ResMunicipality->DBFormat) = array("Municipality", "Municipality", "");
            $this->ResZipcode = & new clsControl(ccsTextBox, "ResZipcode", "Res Zipcode", ccsText, "", CCGetRequestParam("ResZipcode", $Method, NULL), $this);
            $this->PermHouseNo = & new clsControl(ccsTextBox, "PermHouseNo", "Perm House No", ccsText, "", CCGetRequestParam("PermHouseNo", $Method, NULL), $this);
            $this->PermSubVillage = & new clsControl(ccsTextBox, "PermSubVillage", "Perm Sub Village", ccsText, "", CCGetRequestParam("PermSubVillage", $Method, NULL), $this);
            $this->PermMunicipality = & new clsControl(ccsListBox, "PermMunicipality", "Perm Municipality", ccsText, "", CCGetRequestParam("PermMunicipality", $Method, NULL), $this);
            $this->PermMunicipality->DSType = dsTable;
            $this->PermMunicipality->DataSource = new clsDBConnection1();
            $this->PermMunicipality->ds = & $this->PermMunicipality->DataSource;
            $this->PermMunicipality->DataSource->SQL = "SELECT * \n" .
"FROM lut_municipality {SQL_Where} {SQL_OrderBy}";
            list($this->PermMunicipality->BoundColumn, $this->PermMunicipality->TextColumn, $this->PermMunicipality->DBFormat) = array("Municipality", "Municipality", "");
            $this->PermZipcode = & new clsControl(ccsTextBox, "PermZipcode", "Perm Zipcode", ccsText, "", CCGetRequestParam("PermZipcode", $Method, NULL), $this);
            $this->TelNo = & new clsControl(ccsTextBox, "TelNo", "Tel No", ccsText, "", CCGetRequestParam("TelNo", $Method, NULL), $this);
            $this->MobileNo = & new clsControl(ccsTextBox, "MobileNo", "Mobile No", ccsText, "", CCGetRequestParam("MobileNo", $Method, NULL), $this);
            $this->EmailAdd = & new clsControl(ccsTextBox, "EmailAdd", "Email Add", ccsText, "", CCGetRequestParam("EmailAdd", $Method, NULL), $this);
            $this->SpouseSurname = & new clsControl(ccsTextBox, "SpouseSurname", "Spouse Surname", ccsText, "", CCGetRequestParam("SpouseSurname", $Method, NULL), $this);
            $this->SpouseFirstName = & new clsControl(ccsTextBox, "SpouseFirstName", "Spouse First Name", ccsText, "", CCGetRequestParam("SpouseFirstName", $Method, NULL), $this);
            $this->SpouseMiddleName = & new clsControl(ccsTextBox, "SpouseMiddleName", "Spouse Middle Name", ccsText, "", CCGetRequestParam("SpouseMiddleName", $Method, NULL), $this);
            $this->SpouseNameExt = & new clsControl(ccsListBox, "SpouseNameExt", "Spouse Name Ext", ccsText, "", CCGetRequestParam("SpouseNameExt", $Method, NULL), $this);
            $this->SpouseNameExt->DSType = dsTable;
            $this->SpouseNameExt->DataSource = new clsDBConnection1();
            $this->SpouseNameExt->ds = & $this->SpouseNameExt->DataSource;
            $this->SpouseNameExt->DataSource->SQL = "SELECT * \n" .
"FROM lut_namext {SQL_Where} {SQL_OrderBy}";
            list($this->SpouseNameExt->BoundColumn, $this->SpouseNameExt->TextColumn, $this->SpouseNameExt->DBFormat) = array("NameEx", "NameEx", "");
            $this->SpouseOccupatn = & new clsControl(ccsTextBox, "SpouseOccupatn", "Spouse Occupatn", ccsText, "", CCGetRequestParam("SpouseOccupatn", $Method, NULL), $this);
            $this->SpouseBusinessName = & new clsControl(ccsTextBox, "SpouseBusinessName", "Spouse Business Name", ccsText, "", CCGetRequestParam("SpouseBusinessName", $Method, NULL), $this);
            $this->SpouseBusinessAddress = & new clsControl(ccsTextBox, "SpouseBusinessAddress", "Spouse Business Address", ccsText, "", CCGetRequestParam("SpouseBusinessAddress", $Method, NULL), $this);
            $this->SpouseTelNo = & new clsControl(ccsTextBox, "SpouseTelNo", "Spouse Tel No", ccsText, "", CCGetRequestParam("SpouseTelNo", $Method, NULL), $this);
            $this->FatherSurname = & new clsControl(ccsTextBox, "FatherSurname", "Father Surname", ccsText, "", CCGetRequestParam("FatherSurname", $Method, NULL), $this);
            $this->FatherFirstName = & new clsControl(ccsTextBox, "FatherFirstName", "Father First Name", ccsText, "", CCGetRequestParam("FatherFirstName", $Method, NULL), $this);
            $this->FatherMiddleName = & new clsControl(ccsTextBox, "FatherMiddleName", "Father Middle Name", ccsText, "", CCGetRequestParam("FatherMiddleName", $Method, NULL), $this);
            $this->FatherNameExt = & new clsControl(ccsListBox, "FatherNameExt", "Father Name Ext", ccsText, "", CCGetRequestParam("FatherNameExt", $Method, NULL), $this);
            $this->FatherNameExt->DSType = dsTable;
            $this->FatherNameExt->DataSource = new clsDBConnection1();
            $this->FatherNameExt->ds = & $this->FatherNameExt->DataSource;
            $this->FatherNameExt->DataSource->SQL = "SELECT * \n" .
"FROM lut_namext {SQL_Where} {SQL_OrderBy}";
            list($this->FatherNameExt->BoundColumn, $this->FatherNameExt->TextColumn, $this->FatherNameExt->DBFormat) = array("NameEx", "NameEx", "");
            $this->MotherMaiden = & new clsControl(ccsTextBox, "MotherMaiden", "Mother Maiden", ccsText, "", CCGetRequestParam("MotherMaiden", $Method, NULL), $this);
            $this->MotherSurname = & new clsControl(ccsTextBox, "MotherSurname", "Mother Surname", ccsText, "", CCGetRequestParam("MotherSurname", $Method, NULL), $this);
            $this->MotherFirstName = & new clsControl(ccsTextBox, "MotherFirstName", "Mother First Name", ccsText, "", CCGetRequestParam("MotherFirstName", $Method, NULL), $this);
            $this->MotherMiddleName = & new clsControl(ccsTextBox, "MotherMiddleName", "Mother Middle Name", ccsText, "", CCGetRequestParam("MotherMiddleName", $Method, NULL), $this);
            $this->BirthDay = & new clsControl(ccsListBox, "BirthDay", "Birth Day", ccsText, "", CCGetRequestParam("BirthDay", $Method, NULL), $this);
            $this->BirthDay->DSType = dsTable;
            $this->BirthDay->DataSource = new clsDBConnection1();
            $this->BirthDay->ds = & $this->BirthDay->DataSource;
            $this->BirthDay->DataSource->SQL = "SELECT * \n" .
"FROM lut_day {SQL_Where} {SQL_OrderBy}";
            list($this->BirthDay->BoundColumn, $this->BirthDay->TextColumn, $this->BirthDay->DBFormat) = array("Day", "Day", "");
            $this->BirthYear = & new clsControl(ccsTextBox, "BirthYear", "Birth Year", ccsText, "", CCGetRequestParam("BirthYear", $Method, NULL), $this);
            $this->ResStreet = & new clsControl(ccsTextBox, "ResStreet", "Res Street", ccsText, "", CCGetRequestParam("ResStreet", $Method, NULL), $this);
            $this->ResBrgy = & new clsControl(ccsTextBox, "ResBrgy", "Res Brgy", ccsText, "", CCGetRequestParam("ResBrgy", $Method, NULL), $this);
            $this->ResProvince = & new clsControl(ccsTextBox, "ResProvince", "Res Province", ccsText, "", CCGetRequestParam("ResProvince", $Method, NULL), $this);
            $this->PermStreet = & new clsControl(ccsTextBox, "PermStreet", "Perm Street", ccsText, "", CCGetRequestParam("PermStreet", $Method, NULL), $this);
            $this->PermBrgy = & new clsControl(ccsTextBox, "PermBrgy", "Perm Brgy", ccsText, "", CCGetRequestParam("PermBrgy", $Method, NULL), $this);
            $this->PermProvince = & new clsControl(ccsTextBox, "PermProvince", "Perm Province", ccsText, "", CCGetRequestParam("PermProvince", $Method, NULL), $this);
            $this->FileUpload1 = & new clsFileUpload("FileUpload1", "FileUpload1", "tempfolder/", "photofolder/", "*", "", 100000, $this);
            $this->TextBox1 = & new clsControl(ccsTextBox, "TextBox1", "TextBox1", ccsDate, array("mm", "/", "dd", "/", "yyyy"), CCGetRequestParam("TextBox1", $Method, NULL), $this);
            $this->ListBox1 = & new clsControl(ccsListBox, "ListBox1", "ListBox1", ccsText, "", CCGetRequestParam("ListBox1", $Method, NULL), $this);
            $this->ListBox1->DSType = dsTable;
            $this->ListBox1->DataSource = new clsDBConnection1();
            $this->ListBox1->ds = & $this->ListBox1->DataSource;
            $this->ListBox1->DataSource->SQL = "SELECT * \n" .
"FROM lut_title {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox1->BoundColumn, $this->ListBox1->TextColumn, $this->ListBox1->DBFormat) = array("Title", "Title", "");
            $this->ListBox2 = & new clsControl(ccsListBox, "ListBox2", "ListBox2", ccsText, "", CCGetRequestParam("ListBox2", $Method, NULL), $this);
            $this->ListBox2->DSType = dsTable;
            $this->ListBox2->DataSource = new clsDBConnection1();
            $this->ListBox2->ds = & $this->ListBox2->DataSource;
            $this->ListBox2->DataSource->SQL = "SELECT * \n" .
"FROM lut_identity {SQL_Where} {SQL_OrderBy}";
            list($this->ListBox2->BoundColumn, $this->ListBox2->TextColumn, $this->ListBox2->DBFormat) = array("identity", "identity", "");
            $this->TextBox2 = & new clsControl(ccsTextBox, "TextBox2", "TextBox2", ccsText, "", CCGetRequestParam("TextBox2", $Method, NULL), $this);
            $this->TextBox3 = & new clsControl(ccsTextBox, "TextBox3", "TextBox3", ccsText, "", CCGetRequestParam("TextBox3", $Method, NULL), $this);
            $this->TextBox4 = & new clsControl(ccsTextBox, "TextBox4", "TextBox4", ccsText, "", CCGetRequestParam("TextBox4", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Initialize Method @76-AAA85980
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);
    }
//End Initialize Method

//Validate Method @76-3CA47DC3
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->EmployeeIDNo->Validate() && $Validation);
        $Validation = ($this->Surname->Validate() && $Validation);
        $Validation = ($this->FirstName->Validate() && $Validation);
        $Validation = ($this->MiddleName->Validate() && $Validation);
        $Validation = ($this->MiddleInitial->Validate() && $Validation);
        $Validation = ($this->NameExtension->Validate() && $Validation);
        $Validation = ($this->BirthMonth->Validate() && $Validation);
        $Validation = ($this->PlaceOfBirth->Validate() && $Validation);
        $Validation = ($this->Sex->Validate() && $Validation);
        $Validation = ($this->CivilStatus->Validate() && $Validation);
        $Validation = ($this->Height->Validate() && $Validation);
        $Validation = ($this->Weight->Validate() && $Validation);
        $Validation = ($this->BloodType->Validate() && $Validation);
        $Validation = ($this->GsisIdNo->Validate() && $Validation);
        $Validation = ($this->GsisBPN->Validate() && $Validation);
        $Validation = ($this->PagIbigIDNo->Validate() && $Validation);
        $Validation = ($this->PhilhealthNo->Validate() && $Validation);
        $Validation = ($this->SssNo->Validate() && $Validation);
        $Validation = ($this->Tin->Validate() && $Validation);
        $Validation = ($this->AgencyEmpNo->Validate() && $Validation);
        $Validation = ($this->Citizenship->Validate() && $Validation);
        $Validation = ($this->ResHouseNo->Validate() && $Validation);
        $Validation = ($this->ResSubVillage->Validate() && $Validation);
        $Validation = ($this->ResMunicipality->Validate() && $Validation);
        $Validation = ($this->ResZipcode->Validate() && $Validation);
        $Validation = ($this->PermHouseNo->Validate() && $Validation);
        $Validation = ($this->PermSubVillage->Validate() && $Validation);
        $Validation = ($this->PermMunicipality->Validate() && $Validation);
        $Validation = ($this->PermZipcode->Validate() && $Validation);
        $Validation = ($this->TelNo->Validate() && $Validation);
        $Validation = ($this->MobileNo->Validate() && $Validation);
        $Validation = ($this->EmailAdd->Validate() && $Validation);
        $Validation = ($this->SpouseSurname->Validate() && $Validation);
        $Validation = ($this->SpouseFirstName->Validate() && $Validation);
        $Validation = ($this->SpouseMiddleName->Validate() && $Validation);
        $Validation = ($this->SpouseNameExt->Validate() && $Validation);
        $Validation = ($this->SpouseOccupatn->Validate() && $Validation);
        $Validation = ($this->SpouseBusinessName->Validate() && $Validation);
        $Validation = ($this->SpouseBusinessAddress->Validate() && $Validation);
        $Validation = ($this->SpouseTelNo->Validate() && $Validation);
        $Validation = ($this->FatherSurname->Validate() && $Validation);
        $Validation = ($this->FatherFirstName->Validate() && $Validation);
        $Validation = ($this->FatherMiddleName->Validate() && $Validation);
        $Validation = ($this->FatherNameExt->Validate() && $Validation);
        $Validation = ($this->MotherMaiden->Validate() && $Validation);
        $Validation = ($this->MotherSurname->Validate() && $Validation);
        $Validation = ($this->MotherFirstName->Validate() && $Validation);
        $Validation = ($this->MotherMiddleName->Validate() && $Validation);
        $Validation = ($this->BirthDay->Validate() && $Validation);
        $Validation = ($this->BirthYear->Validate() && $Validation);
        $Validation = ($this->ResStreet->Validate() && $Validation);
        $Validation = ($this->ResBrgy->Validate() && $Validation);
        $Validation = ($this->ResProvince->Validate() && $Validation);
        $Validation = ($this->PermStreet->Validate() && $Validation);
        $Validation = ($this->PermBrgy->Validate() && $Validation);
        $Validation = ($this->PermProvince->Validate() && $Validation);
        $Validation = ($this->FileUpload1->Validate() && $Validation);
        $Validation = ($this->TextBox1->Validate() && $Validation);
        $Validation = ($this->ListBox1->Validate() && $Validation);
        $Validation = ($this->ListBox2->Validate() && $Validation);
        $Validation = ($this->TextBox2->Validate() && $Validation);
        $Validation = ($this->TextBox3->Validate() && $Validation);
        $Validation = ($this->TextBox4->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->EmployeeIDNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MiddleInitial->Errors->Count() == 0);
        $Validation =  $Validation && ($this->NameExtension->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BirthMonth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PlaceOfBirth->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Sex->Errors->Count() == 0);
        $Validation =  $Validation && ($this->CivilStatus->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Height->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Weight->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BloodType->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GsisIdNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->GsisBPN->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PagIbigIDNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PhilhealthNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SssNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Tin->Errors->Count() == 0);
        $Validation =  $Validation && ($this->AgencyEmpNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->Citizenship->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResHouseNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResSubVillage->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResMunicipality->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResZipcode->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PermHouseNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PermSubVillage->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PermMunicipality->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PermZipcode->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TelNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MobileNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->EmailAdd->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseSurname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseFirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseMiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseNameExt->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseOccupatn->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseBusinessName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseBusinessAddress->Errors->Count() == 0);
        $Validation =  $Validation && ($this->SpouseTelNo->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FatherSurname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FatherFirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FatherMiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FatherNameExt->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MotherMaiden->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MotherSurname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MotherFirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->MotherMiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BirthDay->Errors->Count() == 0);
        $Validation =  $Validation && ($this->BirthYear->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResStreet->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResBrgy->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ResProvince->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PermStreet->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PermBrgy->Errors->Count() == 0);
        $Validation =  $Validation && ($this->PermProvince->Errors->Count() == 0);
        $Validation =  $Validation && ($this->FileUpload1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox1->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ListBox2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox3->Errors->Count() == 0);
        $Validation =  $Validation && ($this->TextBox4->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @76-0578CAC4
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->MiddleInitial->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->BirthMonth->Errors->Count());
        $errors = ($errors || $this->PlaceOfBirth->Errors->Count());
        $errors = ($errors || $this->Sex->Errors->Count());
        $errors = ($errors || $this->CivilStatus->Errors->Count());
        $errors = ($errors || $this->Height->Errors->Count());
        $errors = ($errors || $this->Weight->Errors->Count());
        $errors = ($errors || $this->BloodType->Errors->Count());
        $errors = ($errors || $this->GsisIdNo->Errors->Count());
        $errors = ($errors || $this->GsisBPN->Errors->Count());
        $errors = ($errors || $this->PagIbigIDNo->Errors->Count());
        $errors = ($errors || $this->PhilhealthNo->Errors->Count());
        $errors = ($errors || $this->SssNo->Errors->Count());
        $errors = ($errors || $this->Tin->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo->Errors->Count());
        $errors = ($errors || $this->Citizenship->Errors->Count());
        $errors = ($errors || $this->ResHouseNo->Errors->Count());
        $errors = ($errors || $this->ResSubVillage->Errors->Count());
        $errors = ($errors || $this->ResMunicipality->Errors->Count());
        $errors = ($errors || $this->ResZipcode->Errors->Count());
        $errors = ($errors || $this->PermHouseNo->Errors->Count());
        $errors = ($errors || $this->PermSubVillage->Errors->Count());
        $errors = ($errors || $this->PermMunicipality->Errors->Count());
        $errors = ($errors || $this->PermZipcode->Errors->Count());
        $errors = ($errors || $this->TelNo->Errors->Count());
        $errors = ($errors || $this->MobileNo->Errors->Count());
        $errors = ($errors || $this->EmailAdd->Errors->Count());
        $errors = ($errors || $this->SpouseSurname->Errors->Count());
        $errors = ($errors || $this->SpouseFirstName->Errors->Count());
        $errors = ($errors || $this->SpouseMiddleName->Errors->Count());
        $errors = ($errors || $this->SpouseNameExt->Errors->Count());
        $errors = ($errors || $this->SpouseOccupatn->Errors->Count());
        $errors = ($errors || $this->SpouseBusinessName->Errors->Count());
        $errors = ($errors || $this->SpouseBusinessAddress->Errors->Count());
        $errors = ($errors || $this->SpouseTelNo->Errors->Count());
        $errors = ($errors || $this->FatherSurname->Errors->Count());
        $errors = ($errors || $this->FatherFirstName->Errors->Count());
        $errors = ($errors || $this->FatherMiddleName->Errors->Count());
        $errors = ($errors || $this->FatherNameExt->Errors->Count());
        $errors = ($errors || $this->MotherMaiden->Errors->Count());
        $errors = ($errors || $this->MotherSurname->Errors->Count());
        $errors = ($errors || $this->MotherFirstName->Errors->Count());
        $errors = ($errors || $this->MotherMiddleName->Errors->Count());
        $errors = ($errors || $this->BirthDay->Errors->Count());
        $errors = ($errors || $this->BirthYear->Errors->Count());
        $errors = ($errors || $this->ResStreet->Errors->Count());
        $errors = ($errors || $this->ResBrgy->Errors->Count());
        $errors = ($errors || $this->ResProvince->Errors->Count());
        $errors = ($errors || $this->PermStreet->Errors->Count());
        $errors = ($errors || $this->PermBrgy->Errors->Count());
        $errors = ($errors || $this->PermProvince->Errors->Count());
        $errors = ($errors || $this->FileUpload1->Errors->Count());
        $errors = ($errors || $this->TextBox1->Errors->Count());
        $errors = ($errors || $this->ListBox1->Errors->Count());
        $errors = ($errors || $this->ListBox2->Errors->Count());
        $errors = ($errors || $this->TextBox2->Errors->Count());
        $errors = ($errors || $this->TextBox3->Errors->Count());
        $errors = ($errors || $this->TextBox4->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//MasterDetail @76-ED598703
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

//Operation Method @76-3F38AE3C
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

        $this->FileUpload1->Upload();

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

//InsertRow Method @76-6AFD70A1
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->EmployeeIDNo->SetValue($this->EmployeeIDNo->GetValue(true));
        $this->DataSource->Surname->SetValue($this->Surname->GetValue(true));
        $this->DataSource->FirstName->SetValue($this->FirstName->GetValue(true));
        $this->DataSource->MiddleName->SetValue($this->MiddleName->GetValue(true));
        $this->DataSource->MiddleInitial->SetValue($this->MiddleInitial->GetValue(true));
        $this->DataSource->NameExtension->SetValue($this->NameExtension->GetValue(true));
        $this->DataSource->BirthMonth->SetValue($this->BirthMonth->GetValue(true));
        $this->DataSource->PlaceOfBirth->SetValue($this->PlaceOfBirth->GetValue(true));
        $this->DataSource->Sex->SetValue($this->Sex->GetValue(true));
        $this->DataSource->CivilStatus->SetValue($this->CivilStatus->GetValue(true));
        $this->DataSource->Height->SetValue($this->Height->GetValue(true));
        $this->DataSource->Weight->SetValue($this->Weight->GetValue(true));
        $this->DataSource->BloodType->SetValue($this->BloodType->GetValue(true));
        $this->DataSource->GsisIdNo->SetValue($this->GsisIdNo->GetValue(true));
        $this->DataSource->GsisBPN->SetValue($this->GsisBPN->GetValue(true));
        $this->DataSource->PagIbigIDNo->SetValue($this->PagIbigIDNo->GetValue(true));
        $this->DataSource->PhilhealthNo->SetValue($this->PhilhealthNo->GetValue(true));
        $this->DataSource->SssNo->SetValue($this->SssNo->GetValue(true));
        $this->DataSource->Tin->SetValue($this->Tin->GetValue(true));
        $this->DataSource->AgencyEmpNo->SetValue($this->AgencyEmpNo->GetValue(true));
        $this->DataSource->Citizenship->SetValue($this->Citizenship->GetValue(true));
        $this->DataSource->ResHouseNo->SetValue($this->ResHouseNo->GetValue(true));
        $this->DataSource->ResSubVillage->SetValue($this->ResSubVillage->GetValue(true));
        $this->DataSource->ResMunicipality->SetValue($this->ResMunicipality->GetValue(true));
        $this->DataSource->ResZipcode->SetValue($this->ResZipcode->GetValue(true));
        $this->DataSource->PermHouseNo->SetValue($this->PermHouseNo->GetValue(true));
        $this->DataSource->PermSubVillage->SetValue($this->PermSubVillage->GetValue(true));
        $this->DataSource->PermMunicipality->SetValue($this->PermMunicipality->GetValue(true));
        $this->DataSource->PermZipcode->SetValue($this->PermZipcode->GetValue(true));
        $this->DataSource->TelNo->SetValue($this->TelNo->GetValue(true));
        $this->DataSource->MobileNo->SetValue($this->MobileNo->GetValue(true));
        $this->DataSource->EmailAdd->SetValue($this->EmailAdd->GetValue(true));
        $this->DataSource->SpouseSurname->SetValue($this->SpouseSurname->GetValue(true));
        $this->DataSource->SpouseFirstName->SetValue($this->SpouseFirstName->GetValue(true));
        $this->DataSource->SpouseMiddleName->SetValue($this->SpouseMiddleName->GetValue(true));
        $this->DataSource->SpouseNameExt->SetValue($this->SpouseNameExt->GetValue(true));
        $this->DataSource->SpouseOccupatn->SetValue($this->SpouseOccupatn->GetValue(true));
        $this->DataSource->SpouseBusinessName->SetValue($this->SpouseBusinessName->GetValue(true));
        $this->DataSource->SpouseBusinessAddress->SetValue($this->SpouseBusinessAddress->GetValue(true));
        $this->DataSource->SpouseTelNo->SetValue($this->SpouseTelNo->GetValue(true));
        $this->DataSource->FatherSurname->SetValue($this->FatherSurname->GetValue(true));
        $this->DataSource->FatherFirstName->SetValue($this->FatherFirstName->GetValue(true));
        $this->DataSource->FatherMiddleName->SetValue($this->FatherMiddleName->GetValue(true));
        $this->DataSource->FatherNameExt->SetValue($this->FatherNameExt->GetValue(true));
        $this->DataSource->MotherMaiden->SetValue($this->MotherMaiden->GetValue(true));
        $this->DataSource->MotherSurname->SetValue($this->MotherSurname->GetValue(true));
        $this->DataSource->MotherFirstName->SetValue($this->MotherFirstName->GetValue(true));
        $this->DataSource->MotherMiddleName->SetValue($this->MotherMiddleName->GetValue(true));
        $this->DataSource->BirthDay->SetValue($this->BirthDay->GetValue(true));
        $this->DataSource->BirthYear->SetValue($this->BirthYear->GetValue(true));
        $this->DataSource->ResStreet->SetValue($this->ResStreet->GetValue(true));
        $this->DataSource->ResBrgy->SetValue($this->ResBrgy->GetValue(true));
        $this->DataSource->ResProvince->SetValue($this->ResProvince->GetValue(true));
        $this->DataSource->PermStreet->SetValue($this->PermStreet->GetValue(true));
        $this->DataSource->PermBrgy->SetValue($this->PermBrgy->GetValue(true));
        $this->DataSource->PermProvince->SetValue($this->PermProvince->GetValue(true));
        $this->DataSource->FileUpload1->SetValue($this->FileUpload1->GetValue(true));
        $this->DataSource->TextBox1->SetValue($this->TextBox1->GetValue(true));
        $this->DataSource->ListBox1->SetValue($this->ListBox1->GetValue(true));
        $this->DataSource->ListBox2->SetValue($this->ListBox2->GetValue(true));
        $this->DataSource->TextBox2->SetValue($this->TextBox2->GetValue(true));
        $this->DataSource->TextBox3->SetValue($this->TextBox3->GetValue(true));
        $this->DataSource->TextBox4->SetValue($this->TextBox4->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        if($this->DataSource->Errors->Count() == 0) {
            $this->FileUpload1->Move();
        }
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @76-8BBB443F
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->EmployeeIDNo->SetValue($this->EmployeeIDNo->GetValue(true));
        $this->DataSource->Surname->SetValue($this->Surname->GetValue(true));
        $this->DataSource->FirstName->SetValue($this->FirstName->GetValue(true));
        $this->DataSource->MiddleName->SetValue($this->MiddleName->GetValue(true));
        $this->DataSource->MiddleInitial->SetValue($this->MiddleInitial->GetValue(true));
        $this->DataSource->NameExtension->SetValue($this->NameExtension->GetValue(true));
        $this->DataSource->BirthMonth->SetValue($this->BirthMonth->GetValue(true));
        $this->DataSource->PlaceOfBirth->SetValue($this->PlaceOfBirth->GetValue(true));
        $this->DataSource->Sex->SetValue($this->Sex->GetValue(true));
        $this->DataSource->CivilStatus->SetValue($this->CivilStatus->GetValue(true));
        $this->DataSource->Height->SetValue($this->Height->GetValue(true));
        $this->DataSource->Weight->SetValue($this->Weight->GetValue(true));
        $this->DataSource->BloodType->SetValue($this->BloodType->GetValue(true));
        $this->DataSource->GsisIdNo->SetValue($this->GsisIdNo->GetValue(true));
        $this->DataSource->GsisBPN->SetValue($this->GsisBPN->GetValue(true));
        $this->DataSource->PagIbigIDNo->SetValue($this->PagIbigIDNo->GetValue(true));
        $this->DataSource->PhilhealthNo->SetValue($this->PhilhealthNo->GetValue(true));
        $this->DataSource->SssNo->SetValue($this->SssNo->GetValue(true));
        $this->DataSource->Tin->SetValue($this->Tin->GetValue(true));
        $this->DataSource->AgencyEmpNo->SetValue($this->AgencyEmpNo->GetValue(true));
        $this->DataSource->Citizenship->SetValue($this->Citizenship->GetValue(true));
        $this->DataSource->ResHouseNo->SetValue($this->ResHouseNo->GetValue(true));
        $this->DataSource->ResSubVillage->SetValue($this->ResSubVillage->GetValue(true));
        $this->DataSource->ResMunicipality->SetValue($this->ResMunicipality->GetValue(true));
        $this->DataSource->ResZipcode->SetValue($this->ResZipcode->GetValue(true));
        $this->DataSource->PermHouseNo->SetValue($this->PermHouseNo->GetValue(true));
        $this->DataSource->PermSubVillage->SetValue($this->PermSubVillage->GetValue(true));
        $this->DataSource->PermMunicipality->SetValue($this->PermMunicipality->GetValue(true));
        $this->DataSource->PermZipcode->SetValue($this->PermZipcode->GetValue(true));
        $this->DataSource->TelNo->SetValue($this->TelNo->GetValue(true));
        $this->DataSource->MobileNo->SetValue($this->MobileNo->GetValue(true));
        $this->DataSource->EmailAdd->SetValue($this->EmailAdd->GetValue(true));
        $this->DataSource->SpouseSurname->SetValue($this->SpouseSurname->GetValue(true));
        $this->DataSource->SpouseFirstName->SetValue($this->SpouseFirstName->GetValue(true));
        $this->DataSource->SpouseMiddleName->SetValue($this->SpouseMiddleName->GetValue(true));
        $this->DataSource->SpouseNameExt->SetValue($this->SpouseNameExt->GetValue(true));
        $this->DataSource->SpouseOccupatn->SetValue($this->SpouseOccupatn->GetValue(true));
        $this->DataSource->SpouseBusinessName->SetValue($this->SpouseBusinessName->GetValue(true));
        $this->DataSource->SpouseBusinessAddress->SetValue($this->SpouseBusinessAddress->GetValue(true));
        $this->DataSource->SpouseTelNo->SetValue($this->SpouseTelNo->GetValue(true));
        $this->DataSource->FatherSurname->SetValue($this->FatherSurname->GetValue(true));
        $this->DataSource->FatherFirstName->SetValue($this->FatherFirstName->GetValue(true));
        $this->DataSource->FatherMiddleName->SetValue($this->FatherMiddleName->GetValue(true));
        $this->DataSource->FatherNameExt->SetValue($this->FatherNameExt->GetValue(true));
        $this->DataSource->MotherMaiden->SetValue($this->MotherMaiden->GetValue(true));
        $this->DataSource->MotherSurname->SetValue($this->MotherSurname->GetValue(true));
        $this->DataSource->MotherFirstName->SetValue($this->MotherFirstName->GetValue(true));
        $this->DataSource->MotherMiddleName->SetValue($this->MotherMiddleName->GetValue(true));
        $this->DataSource->BirthDay->SetValue($this->BirthDay->GetValue(true));
        $this->DataSource->BirthYear->SetValue($this->BirthYear->GetValue(true));
        $this->DataSource->ResStreet->SetValue($this->ResStreet->GetValue(true));
        $this->DataSource->ResBrgy->SetValue($this->ResBrgy->GetValue(true));
        $this->DataSource->ResProvince->SetValue($this->ResProvince->GetValue(true));
        $this->DataSource->PermStreet->SetValue($this->PermStreet->GetValue(true));
        $this->DataSource->PermBrgy->SetValue($this->PermBrgy->GetValue(true));
        $this->DataSource->PermProvince->SetValue($this->PermProvince->GetValue(true));
        $this->DataSource->FileUpload1->SetValue($this->FileUpload1->GetValue(true));
        $this->DataSource->TextBox1->SetValue($this->TextBox1->GetValue(true));
        $this->DataSource->ListBox1->SetValue($this->ListBox1->GetValue(true));
        $this->DataSource->ListBox2->SetValue($this->ListBox2->GetValue(true));
        $this->DataSource->TextBox2->SetValue($this->TextBox2->GetValue(true));
        $this->DataSource->TextBox3->SetValue($this->TextBox3->GetValue(true));
        $this->DataSource->TextBox4->SetValue($this->TextBox4->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        if($this->DataSource->Errors->Count() == 0) {
            $this->FileUpload1->Move();
        }
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @76-2B077D44
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        if($this->DataSource->Errors->Count() == 0) {
            $this->FileUpload1->Delete();
        }
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @76-995142F6
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

        $this->NameExtension->Prepare();
        $this->BirthMonth->Prepare();
        $this->Sex->Prepare();
        $this->CivilStatus->Prepare();
        $this->BloodType->Prepare();
        $this->ResMunicipality->Prepare();
        $this->PermMunicipality->Prepare();
        $this->SpouseNameExt->Prepare();
        $this->FatherNameExt->Prepare();
        $this->BirthDay->Prepare();
        $this->ListBox1->Prepare();
        $this->ListBox2->Prepare();

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
                    $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
                    $this->Surname->SetValue($this->DataSource->Surname->GetValue());
                    $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
                    $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
                    $this->MiddleInitial->SetValue($this->DataSource->MiddleInitial->GetValue());
                    $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
                    $this->BirthMonth->SetValue($this->DataSource->BirthMonth->GetValue());
                    $this->PlaceOfBirth->SetValue($this->DataSource->PlaceOfBirth->GetValue());
                    $this->Sex->SetValue($this->DataSource->Sex->GetValue());
                    $this->CivilStatus->SetValue($this->DataSource->CivilStatus->GetValue());
                    $this->Height->SetValue($this->DataSource->Height->GetValue());
                    $this->Weight->SetValue($this->DataSource->Weight->GetValue());
                    $this->BloodType->SetValue($this->DataSource->BloodType->GetValue());
                    $this->GsisIdNo->SetValue($this->DataSource->GsisIdNo->GetValue());
                    $this->GsisBPN->SetValue($this->DataSource->GsisBPN->GetValue());
                    $this->PagIbigIDNo->SetValue($this->DataSource->PagIbigIDNo->GetValue());
                    $this->PhilhealthNo->SetValue($this->DataSource->PhilhealthNo->GetValue());
                    $this->SssNo->SetValue($this->DataSource->SssNo->GetValue());
                    $this->Tin->SetValue($this->DataSource->Tin->GetValue());
                    $this->AgencyEmpNo->SetValue($this->DataSource->AgencyEmpNo->GetValue());
                    $this->Citizenship->SetValue($this->DataSource->Citizenship->GetValue());
                    $this->ResHouseNo->SetValue($this->DataSource->ResHouseNo->GetValue());
                    $this->ResSubVillage->SetValue($this->DataSource->ResSubVillage->GetValue());
                    $this->ResMunicipality->SetValue($this->DataSource->ResMunicipality->GetValue());
                    $this->ResZipcode->SetValue($this->DataSource->ResZipcode->GetValue());
                    $this->PermHouseNo->SetValue($this->DataSource->PermHouseNo->GetValue());
                    $this->PermSubVillage->SetValue($this->DataSource->PermSubVillage->GetValue());
                    $this->PermMunicipality->SetValue($this->DataSource->PermMunicipality->GetValue());
                    $this->PermZipcode->SetValue($this->DataSource->PermZipcode->GetValue());
                    $this->TelNo->SetValue($this->DataSource->TelNo->GetValue());
                    $this->MobileNo->SetValue($this->DataSource->MobileNo->GetValue());
                    $this->EmailAdd->SetValue($this->DataSource->EmailAdd->GetValue());
                    $this->SpouseSurname->SetValue($this->DataSource->SpouseSurname->GetValue());
                    $this->SpouseFirstName->SetValue($this->DataSource->SpouseFirstName->GetValue());
                    $this->SpouseMiddleName->SetValue($this->DataSource->SpouseMiddleName->GetValue());
                    $this->SpouseNameExt->SetValue($this->DataSource->SpouseNameExt->GetValue());
                    $this->SpouseOccupatn->SetValue($this->DataSource->SpouseOccupatn->GetValue());
                    $this->SpouseBusinessName->SetValue($this->DataSource->SpouseBusinessName->GetValue());
                    $this->SpouseBusinessAddress->SetValue($this->DataSource->SpouseBusinessAddress->GetValue());
                    $this->SpouseTelNo->SetValue($this->DataSource->SpouseTelNo->GetValue());
                    $this->FatherSurname->SetValue($this->DataSource->FatherSurname->GetValue());
                    $this->FatherFirstName->SetValue($this->DataSource->FatherFirstName->GetValue());
                    $this->FatherMiddleName->SetValue($this->DataSource->FatherMiddleName->GetValue());
                    $this->FatherNameExt->SetValue($this->DataSource->FatherNameExt->GetValue());
                    $this->MotherMaiden->SetValue($this->DataSource->MotherMaiden->GetValue());
                    $this->MotherSurname->SetValue($this->DataSource->MotherSurname->GetValue());
                    $this->MotherFirstName->SetValue($this->DataSource->MotherFirstName->GetValue());
                    $this->MotherMiddleName->SetValue($this->DataSource->MotherMiddleName->GetValue());
                    $this->BirthDay->SetValue($this->DataSource->BirthDay->GetValue());
                    $this->BirthYear->SetValue($this->DataSource->BirthYear->GetValue());
                    $this->ResStreet->SetValue($this->DataSource->ResStreet->GetValue());
                    $this->ResBrgy->SetValue($this->DataSource->ResBrgy->GetValue());
                    $this->ResProvince->SetValue($this->DataSource->ResProvince->GetValue());
                    $this->PermStreet->SetValue($this->DataSource->PermStreet->GetValue());
                    $this->PermBrgy->SetValue($this->DataSource->PermBrgy->GetValue());
                    $this->PermProvince->SetValue($this->DataSource->PermProvince->GetValue());
                    $this->FileUpload1->SetValue($this->DataSource->FileUpload1->GetValue());
                    $this->TextBox1->SetValue($this->DataSource->TextBox1->GetValue());
                    $this->ListBox1->SetValue($this->DataSource->ListBox1->GetValue());
                    $this->ListBox2->SetValue($this->DataSource->ListBox2->GetValue());
                    $this->TextBox2->SetValue($this->DataSource->TextBox2->GetValue());
                    $this->TextBox3->SetValue($this->DataSource->TextBox3->GetValue());
                    $this->TextBox4->SetValue($this->DataSource->TextBox4->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->EmployeeIDNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Surname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MiddleInitial->Errors->ToString());
            $Error = ComposeStrings($Error, $this->NameExtension->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthMonth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PlaceOfBirth->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Sex->Errors->ToString());
            $Error = ComposeStrings($Error, $this->CivilStatus->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Height->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Weight->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BloodType->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GsisIdNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->GsisBPN->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PagIbigIDNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PhilhealthNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SssNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Tin->Errors->ToString());
            $Error = ComposeStrings($Error, $this->AgencyEmpNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Citizenship->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResHouseNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResSubVillage->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResMunicipality->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResZipcode->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PermHouseNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PermSubVillage->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PermMunicipality->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PermZipcode->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TelNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MobileNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->EmailAdd->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseSurname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseFirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseMiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseNameExt->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseOccupatn->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseBusinessName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseBusinessAddress->Errors->ToString());
            $Error = ComposeStrings($Error, $this->SpouseTelNo->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FatherSurname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FatherFirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FatherMiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FatherNameExt->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MotherMaiden->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MotherSurname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MotherFirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->MotherMiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthDay->Errors->ToString());
            $Error = ComposeStrings($Error, $this->BirthYear->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResStreet->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResBrgy->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ResProvince->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PermStreet->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PermBrgy->Errors->ToString());
            $Error = ComposeStrings($Error, $this->PermProvince->Errors->ToString());
            $Error = ComposeStrings($Error, $this->FileUpload1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ListBox2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox3->Errors->ToString());
            $Error = ComposeStrings($Error, $this->TextBox4->Errors->ToString());
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
        $this->EmployeeIDNo->Show();
        $this->Surname->Show();
        $this->FirstName->Show();
        $this->MiddleName->Show();
        $this->MiddleInitial->Show();
        $this->NameExtension->Show();
        $this->BirthMonth->Show();
        $this->PlaceOfBirth->Show();
        $this->Sex->Show();
        $this->CivilStatus->Show();
        $this->Height->Show();
        $this->Weight->Show();
        $this->BloodType->Show();
        $this->GsisIdNo->Show();
        $this->GsisBPN->Show();
        $this->PagIbigIDNo->Show();
        $this->PhilhealthNo->Show();
        $this->SssNo->Show();
        $this->Tin->Show();
        $this->AgencyEmpNo->Show();
        $this->Citizenship->Show();
        $this->ResHouseNo->Show();
        $this->ResSubVillage->Show();
        $this->ResMunicipality->Show();
        $this->ResZipcode->Show();
        $this->PermHouseNo->Show();
        $this->PermSubVillage->Show();
        $this->PermMunicipality->Show();
        $this->PermZipcode->Show();
        $this->TelNo->Show();
        $this->MobileNo->Show();
        $this->EmailAdd->Show();
        $this->SpouseSurname->Show();
        $this->SpouseFirstName->Show();
        $this->SpouseMiddleName->Show();
        $this->SpouseNameExt->Show();
        $this->SpouseOccupatn->Show();
        $this->SpouseBusinessName->Show();
        $this->SpouseBusinessAddress->Show();
        $this->SpouseTelNo->Show();
        $this->FatherSurname->Show();
        $this->FatherFirstName->Show();
        $this->FatherMiddleName->Show();
        $this->FatherNameExt->Show();
        $this->MotherMaiden->Show();
        $this->MotherSurname->Show();
        $this->MotherFirstName->Show();
        $this->MotherMiddleName->Show();
        $this->BirthDay->Show();
        $this->BirthYear->Show();
        $this->ResStreet->Show();
        $this->ResBrgy->Show();
        $this->ResProvince->Show();
        $this->PermStreet->Show();
        $this->PermBrgy->Show();
        $this->PermProvince->Show();
        $this->FileUpload1->Show();
        $this->TextBox1->Show();
        $this->ListBox1->Show();
        $this->ListBox2->Show();
        $this->TextBox2->Show();
        $this->TextBox3->Show();
        $this->TextBox4->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End employee1 Class @76-FCB6E20C

class clsemployee1DataSource extends clsDBConnection1 {  //employee1DataSource Class @76-BDA765D5

//DataSource Variables @76-109B9BBC
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
    var $EmployeeIDNo;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $MiddleInitial;
    var $NameExtension;
    var $BirthMonth;
    var $PlaceOfBirth;
    var $Sex;
    var $CivilStatus;
    var $Height;
    var $Weight;
    var $BloodType;
    var $GsisIdNo;
    var $GsisBPN;
    var $PagIbigIDNo;
    var $PhilhealthNo;
    var $SssNo;
    var $Tin;
    var $AgencyEmpNo;
    var $Citizenship;
    var $ResHouseNo;
    var $ResSubVillage;
    var $ResMunicipality;
    var $ResZipcode;
    var $PermHouseNo;
    var $PermSubVillage;
    var $PermMunicipality;
    var $PermZipcode;
    var $TelNo;
    var $MobileNo;
    var $EmailAdd;
    var $SpouseSurname;
    var $SpouseFirstName;
    var $SpouseMiddleName;
    var $SpouseNameExt;
    var $SpouseOccupatn;
    var $SpouseBusinessName;
    var $SpouseBusinessAddress;
    var $SpouseTelNo;
    var $FatherSurname;
    var $FatherFirstName;
    var $FatherMiddleName;
    var $FatherNameExt;
    var $MotherMaiden;
    var $MotherSurname;
    var $MotherFirstName;
    var $MotherMiddleName;
    var $BirthDay;
    var $BirthYear;
    var $ResStreet;
    var $ResBrgy;
    var $ResProvince;
    var $PermStreet;
    var $PermBrgy;
    var $PermProvince;
    var $FileUpload1;
    var $TextBox1;
    var $ListBox1;
    var $ListBox2;
    var $TextBox2;
    var $TextBox3;
    var $TextBox4;
//End DataSource Variables

//DataSourceClass_Initialize Event @76-0554962F
    function clsemployee1DataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record employee1/Error";
        $this->Initialize();
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->MiddleInitial = new clsField("MiddleInitial", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->BirthMonth = new clsField("BirthMonth", ccsText, "");
        
        $this->PlaceOfBirth = new clsField("PlaceOfBirth", ccsText, "");
        
        $this->Sex = new clsField("Sex", ccsText, "");
        
        $this->CivilStatus = new clsField("CivilStatus", ccsText, "");
        
        $this->Height = new clsField("Height", ccsText, "");
        
        $this->Weight = new clsField("Weight", ccsText, "");
        
        $this->BloodType = new clsField("BloodType", ccsText, "");
        
        $this->GsisIdNo = new clsField("GsisIdNo", ccsText, "");
        
        $this->GsisBPN = new clsField("GsisBPN", ccsText, "");
        
        $this->PagIbigIDNo = new clsField("PagIbigIDNo", ccsText, "");
        
        $this->PhilhealthNo = new clsField("PhilhealthNo", ccsText, "");
        
        $this->SssNo = new clsField("SssNo", ccsText, "");
        
        $this->Tin = new clsField("Tin", ccsText, "");
        
        $this->AgencyEmpNo = new clsField("AgencyEmpNo", ccsText, "");
        
        $this->Citizenship = new clsField("Citizenship", ccsText, "");
        
        $this->ResHouseNo = new clsField("ResHouseNo", ccsText, "");
        
        $this->ResSubVillage = new clsField("ResSubVillage", ccsText, "");
        
        $this->ResMunicipality = new clsField("ResMunicipality", ccsText, "");
        
        $this->ResZipcode = new clsField("ResZipcode", ccsText, "");
        
        $this->PermHouseNo = new clsField("PermHouseNo", ccsText, "");
        
        $this->PermSubVillage = new clsField("PermSubVillage", ccsText, "");
        
        $this->PermMunicipality = new clsField("PermMunicipality", ccsText, "");
        
        $this->PermZipcode = new clsField("PermZipcode", ccsText, "");
        
        $this->TelNo = new clsField("TelNo", ccsText, "");
        
        $this->MobileNo = new clsField("MobileNo", ccsText, "");
        
        $this->EmailAdd = new clsField("EmailAdd", ccsText, "");
        
        $this->SpouseSurname = new clsField("SpouseSurname", ccsText, "");
        
        $this->SpouseFirstName = new clsField("SpouseFirstName", ccsText, "");
        
        $this->SpouseMiddleName = new clsField("SpouseMiddleName", ccsText, "");
        
        $this->SpouseNameExt = new clsField("SpouseNameExt", ccsText, "");
        
        $this->SpouseOccupatn = new clsField("SpouseOccupatn", ccsText, "");
        
        $this->SpouseBusinessName = new clsField("SpouseBusinessName", ccsText, "");
        
        $this->SpouseBusinessAddress = new clsField("SpouseBusinessAddress", ccsText, "");
        
        $this->SpouseTelNo = new clsField("SpouseTelNo", ccsText, "");
        
        $this->FatherSurname = new clsField("FatherSurname", ccsText, "");
        
        $this->FatherFirstName = new clsField("FatherFirstName", ccsText, "");
        
        $this->FatherMiddleName = new clsField("FatherMiddleName", ccsText, "");
        
        $this->FatherNameExt = new clsField("FatherNameExt", ccsText, "");
        
        $this->MotherMaiden = new clsField("MotherMaiden", ccsText, "");
        
        $this->MotherSurname = new clsField("MotherSurname", ccsText, "");
        
        $this->MotherFirstName = new clsField("MotherFirstName", ccsText, "");
        
        $this->MotherMiddleName = new clsField("MotherMiddleName", ccsText, "");
        
        $this->BirthDay = new clsField("BirthDay", ccsText, "");
        
        $this->BirthYear = new clsField("BirthYear", ccsText, "");
        
        $this->ResStreet = new clsField("ResStreet", ccsText, "");
        
        $this->ResBrgy = new clsField("ResBrgy", ccsText, "");
        
        $this->ResProvince = new clsField("ResProvince", ccsText, "");
        
        $this->PermStreet = new clsField("PermStreet", ccsText, "");
        
        $this->PermBrgy = new clsField("PermBrgy", ccsText, "");
        
        $this->PermProvince = new clsField("PermProvince", ccsText, "");
        
        $this->FileUpload1 = new clsField("FileUpload1", ccsText, "");
        
        $this->TextBox1 = new clsField("TextBox1", ccsDate, $this->DateFormat);
        
        $this->ListBox1 = new clsField("ListBox1", ccsText, "");
        
        $this->ListBox2 = new clsField("ListBox2", ccsText, "");
        
        $this->TextBox2 = new clsField("TextBox2", ccsText, "");
        
        $this->TextBox3 = new clsField("TextBox3", ccsText, "");
        
        $this->TextBox4 = new clsField("TextBox4", ccsText, "");
        

        $this->InsertFields["EmployeeIDNo"] = array("Name" => "EmployeeIDNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Surname"] = array("Name" => "Surname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MiddleName"] = array("Name" => "MiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MiddleInitial"] = array("Name" => "MiddleInitial", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["NameExtension"] = array("Name" => "NameExtension", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["BirthMonth"] = array("Name" => "BirthMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PlaceOfBirth"] = array("Name" => "PlaceOfBirth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Sex"] = array("Name" => "Sex", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["CivilStatus"] = array("Name" => "CivilStatus", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Height"] = array("Name" => "Height", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Weight"] = array("Name" => "Weight", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["BloodType"] = array("Name" => "BloodType", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["GsisIdNo"] = array("Name" => "GsisIdNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["GsisBPN"] = array("Name" => "GsisBPN", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PagIbigIDNo"] = array("Name" => "PagIbigIDNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PhilhealthNo"] = array("Name" => "PhilhealthNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SssNo"] = array("Name" => "SssNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Tin"] = array("Name" => "Tin", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["AgencyEmpNo"] = array("Name" => "AgencyEmpNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Citizenship"] = array("Name" => "Citizenship", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResHouseNo"] = array("Name" => "ResHouseNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResSubVillage"] = array("Name" => "ResSubVillage", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResMunicipality"] = array("Name" => "ResMunicipality", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResZipcode"] = array("Name" => "ResZipcode", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PermHouseNo"] = array("Name" => "PermHouseNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PermSubVillage"] = array("Name" => "PermSubVillage", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PermMunicipality"] = array("Name" => "PermMunicipality", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PermZipcode"] = array("Name" => "PermZipcode", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["TelNo"] = array("Name" => "TelNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MobileNo"] = array("Name" => "MobileNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmailAdd"] = array("Name" => "EmailAdd", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseSurname"] = array("Name" => "SpouseSurname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseFirstName"] = array("Name" => "SpouseFirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseMiddleName"] = array("Name" => "SpouseMiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseNameExt"] = array("Name" => "SpouseNameExt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseOccupatn"] = array("Name" => "SpouseOccupatn", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseBusinessName"] = array("Name" => "SpouseBusinessName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseBusinessAddress"] = array("Name" => "SpouseBusinessAddress", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["SpouseTelNo"] = array("Name" => "SpouseTelNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FatherSurname"] = array("Name" => "FatherSurname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FatherFirstName"] = array("Name" => "FatherFirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FatherMiddleName"] = array("Name" => "FatherMiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["FatherNameExt"] = array("Name" => "FatherNameExt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MotherMaiden"] = array("Name" => "MotherMaiden", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MotherSurname"] = array("Name" => "MotherSurname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MotherFirstName"] = array("Name" => "MotherFirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["MotherMiddleName"] = array("Name" => "MotherMiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["BirthDay"] = array("Name" => "BirthDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["BirthYear"] = array("Name" => "BirthYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResStreet"] = array("Name" => "ResStreet", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResBrgy"] = array("Name" => "ResBrgy", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ResProvince"] = array("Name" => "ResProvince", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PermStreet"] = array("Name" => "PermStreet", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PermBrgy"] = array("Name" => "PermBrgy", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["PermProvince"] = array("Name" => "PermProvince", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmpPicture"] = array("Name" => "EmpPicture", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["BirthDate"] = array("Name" => "BirthDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["Title"] = array("Name" => "Title", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["Identity"] = array("Name" => "Identity", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmergencyName"] = array("Name" => "EmergencyName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmergencyAddress"] = array("Name" => "EmergencyAddress", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["EmergencyContact"] = array("Name" => "EmergencyContact", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmployeeIDNo"] = array("Name" => "EmployeeIDNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Surname"] = array("Name" => "Surname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FirstName"] = array("Name" => "FirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MiddleName"] = array("Name" => "MiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MiddleInitial"] = array("Name" => "MiddleInitial", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["NameExtension"] = array("Name" => "NameExtension", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["BirthMonth"] = array("Name" => "BirthMonth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PlaceOfBirth"] = array("Name" => "PlaceOfBirth", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Sex"] = array("Name" => "Sex", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["CivilStatus"] = array("Name" => "CivilStatus", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Height"] = array("Name" => "Height", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Weight"] = array("Name" => "Weight", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["BloodType"] = array("Name" => "BloodType", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["GsisIdNo"] = array("Name" => "GsisIdNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["GsisBPN"] = array("Name" => "GsisBPN", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PagIbigIDNo"] = array("Name" => "PagIbigIDNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PhilhealthNo"] = array("Name" => "PhilhealthNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SssNo"] = array("Name" => "SssNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Tin"] = array("Name" => "Tin", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["AgencyEmpNo"] = array("Name" => "AgencyEmpNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Citizenship"] = array("Name" => "Citizenship", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResHouseNo"] = array("Name" => "ResHouseNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResSubVillage"] = array("Name" => "ResSubVillage", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResMunicipality"] = array("Name" => "ResMunicipality", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResZipcode"] = array("Name" => "ResZipcode", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PermHouseNo"] = array("Name" => "PermHouseNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PermSubVillage"] = array("Name" => "PermSubVillage", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PermMunicipality"] = array("Name" => "PermMunicipality", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PermZipcode"] = array("Name" => "PermZipcode", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["TelNo"] = array("Name" => "TelNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MobileNo"] = array("Name" => "MobileNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmailAdd"] = array("Name" => "EmailAdd", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseSurname"] = array("Name" => "SpouseSurname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseFirstName"] = array("Name" => "SpouseFirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseMiddleName"] = array("Name" => "SpouseMiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseNameExt"] = array("Name" => "SpouseNameExt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseOccupatn"] = array("Name" => "SpouseOccupatn", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseBusinessName"] = array("Name" => "SpouseBusinessName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseBusinessAddress"] = array("Name" => "SpouseBusinessAddress", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["SpouseTelNo"] = array("Name" => "SpouseTelNo", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FatherSurname"] = array("Name" => "FatherSurname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FatherFirstName"] = array("Name" => "FatherFirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FatherMiddleName"] = array("Name" => "FatherMiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["FatherNameExt"] = array("Name" => "FatherNameExt", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MotherMaiden"] = array("Name" => "MotherMaiden", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MotherSurname"] = array("Name" => "MotherSurname", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MotherFirstName"] = array("Name" => "MotherFirstName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["MotherMiddleName"] = array("Name" => "MotherMiddleName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["BirthDay"] = array("Name" => "BirthDay", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["BirthYear"] = array("Name" => "BirthYear", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResStreet"] = array("Name" => "ResStreet", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResBrgy"] = array("Name" => "ResBrgy", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ResProvince"] = array("Name" => "ResProvince", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PermStreet"] = array("Name" => "PermStreet", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PermBrgy"] = array("Name" => "PermBrgy", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["PermProvince"] = array("Name" => "PermProvince", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmpPicture"] = array("Name" => "EmpPicture", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["BirthDate"] = array("Name" => "BirthDate", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["Title"] = array("Name" => "Title", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["Identity"] = array("Name" => "Identity", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmergencyName"] = array("Name" => "EmergencyName", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmergencyAddress"] = array("Name" => "EmergencyAddress", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["EmergencyContact"] = array("Name" => "EmergencyContact", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @76-361705F1
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

//Open Method @76-FDA4A403
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

//SetValues Method @76-F5E41145
    function SetValues()
    {
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->MiddleInitial->SetDBValue($this->f("MiddleInitial"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->BirthMonth->SetDBValue($this->f("BirthMonth"));
        $this->PlaceOfBirth->SetDBValue($this->f("PlaceOfBirth"));
        $this->Sex->SetDBValue($this->f("Sex"));
        $this->CivilStatus->SetDBValue($this->f("CivilStatus"));
        $this->Height->SetDBValue($this->f("Height"));
        $this->Weight->SetDBValue($this->f("Weight"));
        $this->BloodType->SetDBValue($this->f("BloodType"));
        $this->GsisIdNo->SetDBValue($this->f("GsisIdNo"));
        $this->GsisBPN->SetDBValue($this->f("GsisBPN"));
        $this->PagIbigIDNo->SetDBValue($this->f("PagIbigIDNo"));
        $this->PhilhealthNo->SetDBValue($this->f("PhilhealthNo"));
        $this->SssNo->SetDBValue($this->f("SssNo"));
        $this->Tin->SetDBValue($this->f("Tin"));
        $this->AgencyEmpNo->SetDBValue($this->f("AgencyEmpNo"));
        $this->Citizenship->SetDBValue($this->f("Citizenship"));
        $this->ResHouseNo->SetDBValue($this->f("ResHouseNo"));
        $this->ResSubVillage->SetDBValue($this->f("ResSubVillage"));
        $this->ResMunicipality->SetDBValue($this->f("ResMunicipality"));
        $this->ResZipcode->SetDBValue($this->f("ResZipcode"));
        $this->PermHouseNo->SetDBValue($this->f("PermHouseNo"));
        $this->PermSubVillage->SetDBValue($this->f("PermSubVillage"));
        $this->PermMunicipality->SetDBValue($this->f("PermMunicipality"));
        $this->PermZipcode->SetDBValue($this->f("PermZipcode"));
        $this->TelNo->SetDBValue($this->f("TelNo"));
        $this->MobileNo->SetDBValue($this->f("MobileNo"));
        $this->EmailAdd->SetDBValue($this->f("EmailAdd"));
        $this->SpouseSurname->SetDBValue($this->f("SpouseSurname"));
        $this->SpouseFirstName->SetDBValue($this->f("SpouseFirstName"));
        $this->SpouseMiddleName->SetDBValue($this->f("SpouseMiddleName"));
        $this->SpouseNameExt->SetDBValue($this->f("SpouseNameExt"));
        $this->SpouseOccupatn->SetDBValue($this->f("SpouseOccupatn"));
        $this->SpouseBusinessName->SetDBValue($this->f("SpouseBusinessName"));
        $this->SpouseBusinessAddress->SetDBValue($this->f("SpouseBusinessAddress"));
        $this->SpouseTelNo->SetDBValue($this->f("SpouseTelNo"));
        $this->FatherSurname->SetDBValue($this->f("FatherSurname"));
        $this->FatherFirstName->SetDBValue($this->f("FatherFirstName"));
        $this->FatherMiddleName->SetDBValue($this->f("FatherMiddleName"));
        $this->FatherNameExt->SetDBValue($this->f("FatherNameExt"));
        $this->MotherMaiden->SetDBValue($this->f("MotherMaiden"));
        $this->MotherSurname->SetDBValue($this->f("MotherSurname"));
        $this->MotherFirstName->SetDBValue($this->f("MotherFirstName"));
        $this->MotherMiddleName->SetDBValue($this->f("MotherMiddleName"));
        $this->BirthDay->SetDBValue($this->f("BirthDay"));
        $this->BirthYear->SetDBValue($this->f("BirthYear"));
        $this->ResStreet->SetDBValue($this->f("ResStreet"));
        $this->ResBrgy->SetDBValue($this->f("ResBrgy"));
        $this->ResProvince->SetDBValue($this->f("ResProvince"));
        $this->PermStreet->SetDBValue($this->f("PermStreet"));
        $this->PermBrgy->SetDBValue($this->f("PermBrgy"));
        $this->PermProvince->SetDBValue($this->f("PermProvince"));
        $this->FileUpload1->SetDBValue($this->f("EmpPicture"));
        $this->TextBox1->SetDBValue(trim($this->f("BirthDate")));
        $this->ListBox1->SetDBValue($this->f("Title"));
        $this->ListBox2->SetDBValue($this->f("Identity"));
        $this->TextBox2->SetDBValue($this->f("EmergencyName"));
        $this->TextBox3->SetDBValue($this->f("EmergencyAddress"));
        $this->TextBox4->SetDBValue($this->f("EmergencyContact"));
    }
//End SetValues Method

//Insert Method @76-CF0D2C24
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        $this->InsertFields["EmployeeIDNo"]["Value"] = $this->EmployeeIDNo->GetDBValue(true);
        $this->InsertFields["Surname"]["Value"] = $this->Surname->GetDBValue(true);
        $this->InsertFields["FirstName"]["Value"] = $this->FirstName->GetDBValue(true);
        $this->InsertFields["MiddleName"]["Value"] = $this->MiddleName->GetDBValue(true);
        $this->InsertFields["MiddleInitial"]["Value"] = $this->MiddleInitial->GetDBValue(true);
        $this->InsertFields["NameExtension"]["Value"] = $this->NameExtension->GetDBValue(true);
        $this->InsertFields["BirthMonth"]["Value"] = $this->BirthMonth->GetDBValue(true);
        $this->InsertFields["PlaceOfBirth"]["Value"] = $this->PlaceOfBirth->GetDBValue(true);
        $this->InsertFields["Sex"]["Value"] = $this->Sex->GetDBValue(true);
        $this->InsertFields["CivilStatus"]["Value"] = $this->CivilStatus->GetDBValue(true);
        $this->InsertFields["Height"]["Value"] = $this->Height->GetDBValue(true);
        $this->InsertFields["Weight"]["Value"] = $this->Weight->GetDBValue(true);
        $this->InsertFields["BloodType"]["Value"] = $this->BloodType->GetDBValue(true);
        $this->InsertFields["GsisIdNo"]["Value"] = $this->GsisIdNo->GetDBValue(true);
        $this->InsertFields["GsisBPN"]["Value"] = $this->GsisBPN->GetDBValue(true);
        $this->InsertFields["PagIbigIDNo"]["Value"] = $this->PagIbigIDNo->GetDBValue(true);
        $this->InsertFields["PhilhealthNo"]["Value"] = $this->PhilhealthNo->GetDBValue(true);
        $this->InsertFields["SssNo"]["Value"] = $this->SssNo->GetDBValue(true);
        $this->InsertFields["Tin"]["Value"] = $this->Tin->GetDBValue(true);
        $this->InsertFields["AgencyEmpNo"]["Value"] = $this->AgencyEmpNo->GetDBValue(true);
        $this->InsertFields["Citizenship"]["Value"] = $this->Citizenship->GetDBValue(true);
        $this->InsertFields["ResHouseNo"]["Value"] = $this->ResHouseNo->GetDBValue(true);
        $this->InsertFields["ResSubVillage"]["Value"] = $this->ResSubVillage->GetDBValue(true);
        $this->InsertFields["ResMunicipality"]["Value"] = $this->ResMunicipality->GetDBValue(true);
        $this->InsertFields["ResZipcode"]["Value"] = $this->ResZipcode->GetDBValue(true);
        $this->InsertFields["PermHouseNo"]["Value"] = $this->PermHouseNo->GetDBValue(true);
        $this->InsertFields["PermSubVillage"]["Value"] = $this->PermSubVillage->GetDBValue(true);
        $this->InsertFields["PermMunicipality"]["Value"] = $this->PermMunicipality->GetDBValue(true);
        $this->InsertFields["PermZipcode"]["Value"] = $this->PermZipcode->GetDBValue(true);
        $this->InsertFields["TelNo"]["Value"] = $this->TelNo->GetDBValue(true);
        $this->InsertFields["MobileNo"]["Value"] = $this->MobileNo->GetDBValue(true);
        $this->InsertFields["EmailAdd"]["Value"] = $this->EmailAdd->GetDBValue(true);
        $this->InsertFields["SpouseSurname"]["Value"] = $this->SpouseSurname->GetDBValue(true);
        $this->InsertFields["SpouseFirstName"]["Value"] = $this->SpouseFirstName->GetDBValue(true);
        $this->InsertFields["SpouseMiddleName"]["Value"] = $this->SpouseMiddleName->GetDBValue(true);
        $this->InsertFields["SpouseNameExt"]["Value"] = $this->SpouseNameExt->GetDBValue(true);
        $this->InsertFields["SpouseOccupatn"]["Value"] = $this->SpouseOccupatn->GetDBValue(true);
        $this->InsertFields["SpouseBusinessName"]["Value"] = $this->SpouseBusinessName->GetDBValue(true);
        $this->InsertFields["SpouseBusinessAddress"]["Value"] = $this->SpouseBusinessAddress->GetDBValue(true);
        $this->InsertFields["SpouseTelNo"]["Value"] = $this->SpouseTelNo->GetDBValue(true);
        $this->InsertFields["FatherSurname"]["Value"] = $this->FatherSurname->GetDBValue(true);
        $this->InsertFields["FatherFirstName"]["Value"] = $this->FatherFirstName->GetDBValue(true);
        $this->InsertFields["FatherMiddleName"]["Value"] = $this->FatherMiddleName->GetDBValue(true);
        $this->InsertFields["FatherNameExt"]["Value"] = $this->FatherNameExt->GetDBValue(true);
        $this->InsertFields["MotherMaiden"]["Value"] = $this->MotherMaiden->GetDBValue(true);
        $this->InsertFields["MotherSurname"]["Value"] = $this->MotherSurname->GetDBValue(true);
        $this->InsertFields["MotherFirstName"]["Value"] = $this->MotherFirstName->GetDBValue(true);
        $this->InsertFields["MotherMiddleName"]["Value"] = $this->MotherMiddleName->GetDBValue(true);
        $this->InsertFields["BirthDay"]["Value"] = $this->BirthDay->GetDBValue(true);
        $this->InsertFields["BirthYear"]["Value"] = $this->BirthYear->GetDBValue(true);
        $this->InsertFields["ResStreet"]["Value"] = $this->ResStreet->GetDBValue(true);
        $this->InsertFields["ResBrgy"]["Value"] = $this->ResBrgy->GetDBValue(true);
        $this->InsertFields["ResProvince"]["Value"] = $this->ResProvince->GetDBValue(true);
        $this->InsertFields["PermStreet"]["Value"] = $this->PermStreet->GetDBValue(true);
        $this->InsertFields["PermBrgy"]["Value"] = $this->PermBrgy->GetDBValue(true);
        $this->InsertFields["PermProvince"]["Value"] = $this->PermProvince->GetDBValue(true);
        $this->InsertFields["EmpPicture"]["Value"] = $this->FileUpload1->GetDBValue(true);
        $this->InsertFields["BirthDate"]["Value"] = $this->TextBox1->GetDBValue(true);
        $this->InsertFields["Title"]["Value"] = $this->ListBox1->GetDBValue(true);
        $this->InsertFields["Identity"]["Value"] = $this->ListBox2->GetDBValue(true);
        $this->InsertFields["EmergencyName"]["Value"] = $this->TextBox2->GetDBValue(true);
        $this->InsertFields["EmergencyAddress"]["Value"] = $this->TextBox3->GetDBValue(true);
        $this->InsertFields["EmergencyContact"]["Value"] = $this->TextBox4->GetDBValue(true);
        $this->SQL = CCBuildInsert("employee", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @76-038B5C70
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        $this->UpdateFields["EmployeeIDNo"]["Value"] = $this->EmployeeIDNo->GetDBValue(true);
        $this->UpdateFields["Surname"]["Value"] = $this->Surname->GetDBValue(true);
        $this->UpdateFields["FirstName"]["Value"] = $this->FirstName->GetDBValue(true);
        $this->UpdateFields["MiddleName"]["Value"] = $this->MiddleName->GetDBValue(true);
        $this->UpdateFields["MiddleInitial"]["Value"] = $this->MiddleInitial->GetDBValue(true);
        $this->UpdateFields["NameExtension"]["Value"] = $this->NameExtension->GetDBValue(true);
        $this->UpdateFields["BirthMonth"]["Value"] = $this->BirthMonth->GetDBValue(true);
        $this->UpdateFields["PlaceOfBirth"]["Value"] = $this->PlaceOfBirth->GetDBValue(true);
        $this->UpdateFields["Sex"]["Value"] = $this->Sex->GetDBValue(true);
        $this->UpdateFields["CivilStatus"]["Value"] = $this->CivilStatus->GetDBValue(true);
        $this->UpdateFields["Height"]["Value"] = $this->Height->GetDBValue(true);
        $this->UpdateFields["Weight"]["Value"] = $this->Weight->GetDBValue(true);
        $this->UpdateFields["BloodType"]["Value"] = $this->BloodType->GetDBValue(true);
        $this->UpdateFields["GsisIdNo"]["Value"] = $this->GsisIdNo->GetDBValue(true);
        $this->UpdateFields["GsisBPN"]["Value"] = $this->GsisBPN->GetDBValue(true);
        $this->UpdateFields["PagIbigIDNo"]["Value"] = $this->PagIbigIDNo->GetDBValue(true);
        $this->UpdateFields["PhilhealthNo"]["Value"] = $this->PhilhealthNo->GetDBValue(true);
        $this->UpdateFields["SssNo"]["Value"] = $this->SssNo->GetDBValue(true);
        $this->UpdateFields["Tin"]["Value"] = $this->Tin->GetDBValue(true);
        $this->UpdateFields["AgencyEmpNo"]["Value"] = $this->AgencyEmpNo->GetDBValue(true);
        $this->UpdateFields["Citizenship"]["Value"] = $this->Citizenship->GetDBValue(true);
        $this->UpdateFields["ResHouseNo"]["Value"] = $this->ResHouseNo->GetDBValue(true);
        $this->UpdateFields["ResSubVillage"]["Value"] = $this->ResSubVillage->GetDBValue(true);
        $this->UpdateFields["ResMunicipality"]["Value"] = $this->ResMunicipality->GetDBValue(true);
        $this->UpdateFields["ResZipcode"]["Value"] = $this->ResZipcode->GetDBValue(true);
        $this->UpdateFields["PermHouseNo"]["Value"] = $this->PermHouseNo->GetDBValue(true);
        $this->UpdateFields["PermSubVillage"]["Value"] = $this->PermSubVillage->GetDBValue(true);
        $this->UpdateFields["PermMunicipality"]["Value"] = $this->PermMunicipality->GetDBValue(true);
        $this->UpdateFields["PermZipcode"]["Value"] = $this->PermZipcode->GetDBValue(true);
        $this->UpdateFields["TelNo"]["Value"] = $this->TelNo->GetDBValue(true);
        $this->UpdateFields["MobileNo"]["Value"] = $this->MobileNo->GetDBValue(true);
        $this->UpdateFields["EmailAdd"]["Value"] = $this->EmailAdd->GetDBValue(true);
        $this->UpdateFields["SpouseSurname"]["Value"] = $this->SpouseSurname->GetDBValue(true);
        $this->UpdateFields["SpouseFirstName"]["Value"] = $this->SpouseFirstName->GetDBValue(true);
        $this->UpdateFields["SpouseMiddleName"]["Value"] = $this->SpouseMiddleName->GetDBValue(true);
        $this->UpdateFields["SpouseNameExt"]["Value"] = $this->SpouseNameExt->GetDBValue(true);
        $this->UpdateFields["SpouseOccupatn"]["Value"] = $this->SpouseOccupatn->GetDBValue(true);
        $this->UpdateFields["SpouseBusinessName"]["Value"] = $this->SpouseBusinessName->GetDBValue(true);
        $this->UpdateFields["SpouseBusinessAddress"]["Value"] = $this->SpouseBusinessAddress->GetDBValue(true);
        $this->UpdateFields["SpouseTelNo"]["Value"] = $this->SpouseTelNo->GetDBValue(true);
        $this->UpdateFields["FatherSurname"]["Value"] = $this->FatherSurname->GetDBValue(true);
        $this->UpdateFields["FatherFirstName"]["Value"] = $this->FatherFirstName->GetDBValue(true);
        $this->UpdateFields["FatherMiddleName"]["Value"] = $this->FatherMiddleName->GetDBValue(true);
        $this->UpdateFields["FatherNameExt"]["Value"] = $this->FatherNameExt->GetDBValue(true);
        $this->UpdateFields["MotherMaiden"]["Value"] = $this->MotherMaiden->GetDBValue(true);
        $this->UpdateFields["MotherSurname"]["Value"] = $this->MotherSurname->GetDBValue(true);
        $this->UpdateFields["MotherFirstName"]["Value"] = $this->MotherFirstName->GetDBValue(true);
        $this->UpdateFields["MotherMiddleName"]["Value"] = $this->MotherMiddleName->GetDBValue(true);
        $this->UpdateFields["BirthDay"]["Value"] = $this->BirthDay->GetDBValue(true);
        $this->UpdateFields["BirthYear"]["Value"] = $this->BirthYear->GetDBValue(true);
        $this->UpdateFields["ResStreet"]["Value"] = $this->ResStreet->GetDBValue(true);
        $this->UpdateFields["ResBrgy"]["Value"] = $this->ResBrgy->GetDBValue(true);
        $this->UpdateFields["ResProvince"]["Value"] = $this->ResProvince->GetDBValue(true);
        $this->UpdateFields["PermStreet"]["Value"] = $this->PermStreet->GetDBValue(true);
        $this->UpdateFields["PermBrgy"]["Value"] = $this->PermBrgy->GetDBValue(true);
        $this->UpdateFields["PermProvince"]["Value"] = $this->PermProvince->GetDBValue(true);
        $this->UpdateFields["EmpPicture"]["Value"] = $this->FileUpload1->GetDBValue(true);
        $this->UpdateFields["BirthDate"]["Value"] = $this->TextBox1->GetDBValue(true);
        $this->UpdateFields["Title"]["Value"] = $this->ListBox1->GetDBValue(true);
        $this->UpdateFields["Identity"]["Value"] = $this->ListBox2->GetDBValue(true);
        $this->UpdateFields["EmergencyName"]["Value"] = $this->TextBox2->GetDBValue(true);
        $this->UpdateFields["EmergencyAddress"]["Value"] = $this->TextBox3->GetDBValue(true);
        $this->UpdateFields["EmergencyContact"]["Value"] = $this->TextBox4->GetDBValue(true);
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

//Delete Method @76-C822B971
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

} //End employee1DataSource Class @76-FCB6E20C

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

//Class_Initialize Event @2-00AFCA77
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
        $this->EmployeeID->Page = "Employee.php";
        $this->EmployeeIDNo = & new clsControl(ccsLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsLabel, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsLabel, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsLabel, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->EmpPicture = & new clsControl(ccsImage, "EmpPicture", "EmpPicture", ccsText, "", CCGetRequestParam("EmpPicture", ccsGet, NULL), $this);
        $this->MiddleInitial = & new clsControl(ccsLink, "MiddleInitial", "MiddleInitial", ccsText, "", CCGetRequestParam("MiddleInitial", ccsGet, NULL), $this);
        $this->MiddleInitial->Page = "Children.php";
        $this->BirthDay = & new clsControl(ccsLink, "BirthDay", "BirthDay", ccsText, "", CCGetRequestParam("BirthDay", ccsGet, NULL), $this);
        $this->BirthDay->Page = "WorkExperience2.php";
        $this->Sex = & new clsControl(ccsLink, "Sex", "Sex", ccsText, "", CCGetRequestParam("Sex", ccsGet, NULL), $this);
        $this->Sex->Page = "SpecialSkills.php";
        $this->Weight = & new clsControl(ccsLink, "Weight", "Weight", ccsText, "", CCGetRequestParam("Weight", ccsGet, NULL), $this);
        $this->Weight->Page = "ConsanguinityAffinity.php";
        $this->NameExtension = & new clsControl(ccsLink, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->NameExtension->Page = "EducBackground.php";
        $this->BirthMonth = & new clsControl(ccsLink, "BirthMonth", "BirthMonth", ccsText, "", CCGetRequestParam("BirthMonth", ccsGet, NULL), $this);
        $this->BirthMonth->Page = "Eligibility.php";
        $this->BirthYear = & new clsControl(ccsLink, "BirthYear", "BirthYear", ccsText, "", CCGetRequestParam("BirthYear", ccsGet, NULL), $this);
        $this->BirthYear->Page = "VoluntaryWork.php";
        $this->PlaceOfBirth = & new clsControl(ccsLink, "PlaceOfBirth", "PlaceOfBirth", ccsText, "", CCGetRequestParam("PlaceOfBirth", ccsGet, NULL), $this);
        $this->PlaceOfBirth->Page = "Training2.php";
        $this->CivilStatus = & new clsControl(ccsLink, "CivilStatus", "CivilStatus", ccsText, "", CCGetRequestParam("CivilStatus", ccsGet, NULL), $this);
        $this->CivilStatus->Page = "NonAcademicDistinctions.php";
        $this->Height = & new clsControl(ccsLink, "Height", "Height", ccsText, "", CCGetRequestParam("Height", ccsGet, NULL), $this);
        $this->Height->Page = "MembershipAssocOrg.php";
        $this->BloodType = & new clsControl(ccsLink, "BloodType", "BloodType", ccsText, "", CCGetRequestParam("BloodType", ccsGet, NULL), $this);
        $this->BloodType->Page = "References.php";
        $this->GsisIdNo = & new clsControl(ccsLink, "GsisIdNo", "GsisIdNo", ccsText, "", CCGetRequestParam("GsisIdNo", ccsGet, NULL), $this);
        $this->GsisIdNo->Page = "ServiceRecord3.php";
        $this->GsisBPN = & new clsControl(ccsLink, "GsisBPN", "GsisBPN", ccsText, "", CCGetRequestParam("GsisBPN", ccsGet, NULL), $this);
        $this->GsisBPN->Page = "CurrentPosition.php";
        $this->employee_Insert = & new clsControl(ccsLink, "employee_Insert", "employee_Insert", ccsText, "", CCGetRequestParam("employee_Insert", ccsGet, NULL), $this);
        $this->employee_Insert->Parameters = CCGetQueryString("QueryString", array("EmployeeID", "ccsForm"));
        $this->employee_Insert->Page = "Employee.php";
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

//Show Method @2-F05F76B2
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
        $this->DataSource->Parameters["urlStatApptID"] = CCGetFromGet("StatApptID", NULL);

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
            $this->ControlsVisible["EmpPicture"] = $this->EmpPicture->Visible;
            $this->ControlsVisible["MiddleInitial"] = $this->MiddleInitial->Visible;
            $this->ControlsVisible["BirthDay"] = $this->BirthDay->Visible;
            $this->ControlsVisible["Sex"] = $this->Sex->Visible;
            $this->ControlsVisible["Weight"] = $this->Weight->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["BirthMonth"] = $this->BirthMonth->Visible;
            $this->ControlsVisible["BirthYear"] = $this->BirthYear->Visible;
            $this->ControlsVisible["PlaceOfBirth"] = $this->PlaceOfBirth->Visible;
            $this->ControlsVisible["CivilStatus"] = $this->CivilStatus->Visible;
            $this->ControlsVisible["Height"] = $this->Height->Visible;
            $this->ControlsVisible["BloodType"] = $this->BloodType->Visible;
            $this->ControlsVisible["GsisIdNo"] = $this->GsisIdNo->Visible;
            $this->ControlsVisible["GsisBPN"] = $this->GsisBPN->Visible;
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
                $this->EmpPicture->SetValue($this->DataSource->EmpPicture->GetValue());
                $this->MiddleInitial->SetValue($this->DataSource->MiddleInitial->GetValue());
                $this->MiddleInitial->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->MiddleInitial->Parameters = CCAddParam($this->MiddleInitial->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->BirthDay->SetValue($this->DataSource->BirthDay->GetValue());
                $this->BirthDay->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->BirthDay->Parameters = CCAddParam($this->BirthDay->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Sex->SetValue($this->DataSource->Sex->GetValue());
                $this->Sex->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Sex->Parameters = CCAddParam($this->Sex->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Weight->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Weight->Parameters = CCAddParam($this->Weight->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
                $this->NameExtension->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->NameExtension->Parameters = CCAddParam($this->NameExtension->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->BirthMonth->SetValue($this->DataSource->BirthMonth->GetValue());
                $this->BirthMonth->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->BirthMonth->Parameters = CCAddParam($this->BirthMonth->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->BirthYear->SetValue($this->DataSource->BirthYear->GetValue());
                $this->BirthYear->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->BirthYear->Parameters = CCAddParam($this->BirthYear->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->PlaceOfBirth->SetValue($this->DataSource->PlaceOfBirth->GetValue());
                $this->PlaceOfBirth->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->PlaceOfBirth->Parameters = CCAddParam($this->PlaceOfBirth->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->CivilStatus->SetValue($this->DataSource->CivilStatus->GetValue());
                $this->CivilStatus->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->CivilStatus->Parameters = CCAddParam($this->CivilStatus->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Height->SetValue($this->DataSource->Height->GetValue());
                $this->Height->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->Height->Parameters = CCAddParam($this->Height->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->BloodType->SetValue($this->DataSource->BloodType->GetValue());
                $this->BloodType->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->BloodType->Parameters = CCAddParam($this->BloodType->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->GsisIdNo->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->GsisIdNo->Parameters = CCAddParam($this->GsisIdNo->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->GsisBPN->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->GsisBPN->Parameters = CCAddParam($this->GsisBPN->Parameters, "EmployeeID", $this->DataSource->f("EmployeeID"));
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->EmployeeID->Show();
                $this->EmployeeIDNo->Show();
                $this->Surname->Show();
                $this->FirstName->Show();
                $this->MiddleName->Show();
                $this->EmpPicture->Show();
                $this->MiddleInitial->Show();
                $this->BirthDay->Show();
                $this->Sex->Show();
                $this->Weight->Show();
                $this->NameExtension->Show();
                $this->BirthMonth->Show();
                $this->BirthYear->Show();
                $this->PlaceOfBirth->Show();
                $this->CivilStatus->Show();
                $this->Height->Show();
                $this->BloodType->Show();
                $this->GsisIdNo->Show();
                $this->GsisBPN->Show();
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
        $this->employee_Insert->Show();
        $this->employee_TotalRecords->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-A3D123C5
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmpPicture->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleInitial->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Sex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Weight->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PlaceOfBirth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CivilStatus->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Height->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BloodType->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GsisIdNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GsisBPN->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End employee Class @2-FCB6E20C

class clsemployeeDataSource extends clsDBConnection1 {  //employeeDataSource Class @2-3A1764EA

//DataSource Variables @2-A8E7EF67
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
    var $EmpPicture;
    var $MiddleInitial;
    var $BirthDay;
    var $Sex;
    var $NameExtension;
    var $BirthMonth;
    var $BirthYear;
    var $PlaceOfBirth;
    var $CivilStatus;
    var $Height;
    var $BloodType;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-5CD8B06E
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
        
        $this->EmpPicture = new clsField("EmpPicture", ccsText, "");
        
        $this->MiddleInitial = new clsField("MiddleInitial", ccsText, "");
        
        $this->BirthDay = new clsField("BirthDay", ccsText, "");
        
        $this->Sex = new clsField("Sex", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->BirthMonth = new clsField("BirthMonth", ccsText, "");
        
        $this->BirthYear = new clsField("BirthYear", ccsText, "");
        
        $this->PlaceOfBirth = new clsField("PlaceOfBirth", ccsText, "");
        
        $this->CivilStatus = new clsField("CivilStatus", ccsText, "");
        
        $this->Height = new clsField("Height", ccsText, "");
        
        $this->BloodType = new clsField("BloodType", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-220B48D3
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "EmployeeID";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-99602BD2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_EmployeeIDNo", ccsText, "", "", $this->Parameters["urls_EmployeeIDNo"], "", false);
        $this->wp->AddParameter("2", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->AddParameter("5", "urlStatApptID", ccsInteger, "", "", $this->Parameters["urlStatApptID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opContains, "EmployeeIDNo", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsText),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "MiddleName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opEqual, "StatApptID", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsInteger),false);
        $this->Where = $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, $this->wp->opAND(
             false, 
             $this->wp->Criterion[1], 
             $this->wp->Criterion[2]), 
             $this->wp->Criterion[3]), 
             $this->wp->Criterion[4]), 
             $this->wp->Criterion[5]);
    }
//End Prepare Method

//Open Method @2-5F49C936
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM employee";
        $this->SQL = "SELECT EmployeeID, EmployeeIDNo, Surname, FirstName, MiddleName, EmpPicture, MiddleInitial, NameExtension, BirthMonth, BirthDay, BirthYear,\n\n" .
        "PlaceOfBirth, Sex, CivilStatus, Height, Weight, BloodType, GsisIdNo, GsisBPN \n\n" .
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

//SetValues Method @2-4C7EA925
    function SetValues()
    {
        $this->EmployeeID->SetDBValue(trim($this->f("EmployeeID")));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->EmpPicture->SetDBValue($this->f("EmpPicture"));
        $this->MiddleInitial->SetDBValue($this->f("MiddleInitial"));
        $this->BirthDay->SetDBValue($this->f("BirthDay"));
        $this->Sex->SetDBValue($this->f("Sex"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->BirthMonth->SetDBValue($this->f("BirthMonth"));
        $this->BirthYear->SetDBValue($this->f("BirthYear"));
        $this->PlaceOfBirth->SetDBValue($this->f("PlaceOfBirth"));
        $this->CivilStatus->SetDBValue($this->f("CivilStatus"));
        $this->Height->SetDBValue($this->f("Height"));
        $this->BloodType->SetDBValue($this->f("BloodType"));
    }
//End SetValues Method

} //End employeeDataSource Class @2-FCB6E20C



//Initialize Page @1-5AEB3360
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
$TemplateFileName = "Employee.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Authenticate User @1-19145DD4
CCSecurityRedirect("7;6;5;3", "");
//End Authenticate User

//Include events file @1-B5F44EEA
include_once("./Employee_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-D3B2001B
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employeeSearch = & new clsRecordemployeeSearch("", $MainPage);
$employee1 = & new clsRecordemployee1("", $MainPage);
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "index.php";
$employee = & new clsGridemployee("", $MainPage);
$MainPage->employeeSearch = & $employeeSearch;
$MainPage->employee1 = & $employee1;
$MainPage->Link1 = & $Link1;
$MainPage->employee = & $employee;
$employee1->Initialize();
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

//Execute Components @1-48519A34
$employeeSearch->Operation();
$employee1->Operation();
//End Execute Components

//Go to destination page @1-02AFEEBD
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBConnection1->close();
    header("Location: " . $Redirect);
    unset($employeeSearch);
    unset($employee1);
    unset($employee);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-C09069C3
$employeeSearch->Show();
$employee1->Show();
$employee->Show();
$Link1->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-049D86EF
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBConnection1->close();
unset($employeeSearch);
unset($employee1);
unset($employee);
unset($Tpl);
//End Unload Page


?>
