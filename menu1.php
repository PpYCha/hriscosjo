<?php

class clsMenumenu1Menu2 extends clsMenu { //Menu2 class @42-79A737FF

//Class_Initialize Event @42-CC038136
    function clsMenumenu1Menu2($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Menu2";
        $this->Visible = True;
        $this->controls = array();
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->ErrorBlock = "Menu Menu2";

        $this->StaticItems = array();
        $this->StaticItems[] = array("item_id" => "MenuItem1", "item_id_parent" => null, "item_caption" => "MAIN MENU", "item_url" => array("Page" => $this->RelativePath . "", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem2", "item_id_parent" => null, "item_caption" => "EMPLOYEES", "item_url" => array("Page" => $this->RelativePath . "", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem2Item1", "item_id_parent" => "MenuItem2", "item_caption" => "201 File", "item_url" => array("Page" => $this->RelativePath . "Employee.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3", "item_id_parent" => null, "item_caption" => "QUERIES", "item_url" => array("Page" => $this->RelativePath . "", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item1", "item_id_parent" => "MenuItem3", "item_caption" => "Employees Profile", "item_url" => array("Page" => $this->RelativePath . "Q_Employee.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item11", "item_id_parent" => "MenuItem3", "item_caption" => "Employees Per Department", "item_url" => array("Page" => $this->RelativePath . "Query_EmpDepartment2.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item2", "item_id_parent" => "MenuItem3", "item_caption" => "Employees Per Department with Salary", "item_url" => array("Page" => $this->RelativePath . "Query_EmpDepartment.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item3", "item_id_parent" => "MenuItem3", "item_caption" => "Employees ID Numbers", "item_url" => array("Page" => $this->RelativePath . "Query_EmpID.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item4", "item_id_parent" => "MenuItem3", "item_caption" => "Birthday Celebrants", "item_url" => array("Page" => $this->RelativePath . "QueryBirthday.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item7", "item_id_parent" => "MenuItem3", "item_caption" => "Reassigned & Detailed", "item_url" => array("Page" => $this->RelativePath . "QueryReassignDetailed.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item12", "item_id_parent" => "MenuItem3", "item_caption" => "PWDs", "item_url" => array("Page" => $this->RelativePath . "Query_PWD.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item13", "item_id_parent" => "MenuItem3", "item_caption" => "Solo Parents", "item_url" => array("Page" => $this->RelativePath . "Query_SoloParent.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem3Item10", "item_id_parent" => "MenuItem3", "item_caption" => "Inactive Employees", "item_url" => array("Page" => $this->RelativePath . "QueryCompulsory.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem4", "item_id_parent" => null, "item_caption" => "REPORTS", "item_url" => array("Page" => $this->RelativePath . "", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem4Item2", "item_id_parent" => "MenuItem4", "item_caption" => "Service Records", "item_url" => array("Page" => $this->RelativePath . "SRreport.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem4Item1", "item_id_parent" => "MenuItem4", "item_caption" => "Certifications", "item_url" => array("Page" => $this->RelativePath . "Cert_latestsalary1.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem4Item11", "item_id_parent" => "MenuItem4", "item_caption" => "Certificate of Appearance", "item_url" => array("Page" => $this->RelativePath . "CertificateofAppeanace.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem5", "item_id_parent" => null, "item_caption" => "FILE MAINTENANCE", "item_url" => array("Page" => $this->RelativePath . "", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem5Item1", "item_id_parent" => "MenuItem5", "item_caption" => "System Users", "item_url" => array("Page" => $this->RelativePath . "Users.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem5Item2", "item_id_parent" => "MenuItem5", "item_caption" => "Purpose of SR/Certification Request", "item_url" => array("Page" => $this->RelativePath . "LUF_SR.php", "Parameters" => null), "item_target" => "", "item_title" => "");
        $this->StaticItems[] = array("item_id" => "MenuItem5Item3", "item_id_parent" => "MenuItem5", "item_caption" => "Department/Office", "item_url" => array("Page" => $this->RelativePath . "LUF_Department.php", "Parameters" => null), "item_target" => "", "item_title" => "");

        $this->DataSource = new clsmenu1Menu2DataSource($this);
        $this->ds = & $this->DataSource;
        $this->DataSource->SetProvider(array("DBLib" => "Array"));

        parent::clsMenu("item_id_parent", "item_id", null);

        $this->ItemLink = & new clsControl(ccsLink, "ItemLink", "ItemLink", ccsText, "", CCGetRequestParam("ItemLink", ccsGet, NULL), $this);
        $this->controls["ItemLink"] = & $this->ItemLink;
        $this->ItemLink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->ItemLink->Page = "";
        $this->LinkStartParameters = $this->ItemLink->Parameters;
    }
//End Class_Initialize Event

//SetControlValues Method @42-B7BF812B
    function SetControlValues() {
        $this->ItemLink->SetValue($this->DataSource->ItemLink->GetValue());
        $LinkUrl = $this->DataSource->f("item_url");
        $this->ItemLink->Page = $LinkUrl["Page"];
        $this->ItemLink->Parameters = $this->SetParamsFromDB($this->LinkStartParameters, $LinkUrl["Parameters"]);
    }
//End SetControlValues Method

//ShowAttributes @42-17684C76
    function ShowAttributes() {
        $this->Attributes->SetValue("MenuType", "menu_htb");
        $this->Attributes->Show();
    }
//End ShowAttributes

} //End Menu2 Class @42-FCB6E20C

//menu1Menu2DataSource Class @42-6B312E9D
class clsmenu1Menu2DataSource extends DB_Adapter {
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;
    var $wp;
    var $Record = array();
    var $Index;
    var $FieldsList = array();

    function clsmenu1Menu2DataSource($parent) {
        $this->Parent = & $parent;
        $this->ErrorBlock = "Menu Menu2";
        $this->ItemLink = new clsField("ItemLink", ccsText, "");
        $this->FieldsList["ItemLink"] = & $this->ItemLink;
    }

    function Prepare()
    {
    }

    function Open()
    {
        $this->query($this->Parent->StaticItems);
    }

    function SetValues()
    {
        $this->ItemLink->SetDBValue($this->f("item_caption"));
    }
}
//End menu1Menu2DataSource Class

class clsmenu1 { //menu1 class @1-2EDC3989

//Variables @1-9721D5A2
    var $ComponentType = "IncludablePage";
    var $Connections = array();
    var $FileName = "";
    var $Redirect = "";
    var $Tpl = "";
    var $TemplateFileName = "";
    var $BlockToParse = "";
    var $ComponentName = "";
    var $Attributes = "";

    // Events;
    var $CCSEvents = "";
    var $CCSEventResult = "";
    var $RelativePath;
    var $Visible;
    var $Parent;
//End Variables

//Class_Initialize Event @1-FBEAC2FE
    function clsmenu1($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->FileName = "menu1.php";
        $this->Redirect = "";
        $this->TemplateFileName = "menu1.html";
        $this->BlockToParse = "main";
        $this->TemplateEncoding = "CP1252";
        $this->ContentType = "text/html";
    }
//End Class_Initialize Event

//Class_Terminate Event @1-C0C96EFC
    function Class_Terminate()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUnload", $this);
        unset($this->Menu2);
    }
//End Class_Terminate Event

//BindEvents Method @1-514F5560
    function BindEvents()
    {
        $this->Logout->CCSEvents["BeforeShow"] = "menu1_Logout_BeforeShow";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInitialize", $this);
    }
//End BindEvents Method

//Operations Method @1-7E2A14CF
    function Operations()
    {
        global $Redirect;
        if(!$this->Visible)
            return "";
    }
//End Operations Method

//Initialize Method @1-207FF0B3
    function Initialize()
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInitialize", $this);
        if(!$this->Visible)
            return "";
        $this->Attributes = & $this->Parent->Attributes;

        // Create Components
        $this->Logout = & new clsControl(ccsLink, "Logout", "Logout", ccsText, "", CCGetRequestParam("Logout", ccsGet, NULL), $this);
        $this->Logout->Page = $this->RelativePath . "logout.php";
        $this->Menu2 = & new clsMenumenu1Menu2($this->RelativePath, $this);
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);
        $this->Logout->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
        $this->Logout->Parameters = CCAddParam($this->Logout->Parameters, "Logout", "True");
    }
//End Initialize Method

//Show Method @1-FFA3BBDF
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        $block_path = $Tpl->block_path;
        $Tpl->LoadTemplate("/" . $this->TemplateFileName, $this->ComponentName, $this->TemplateEncoding, "remove");
        $Tpl->block_path = $Tpl->block_path . "/" . $this->ComponentName;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) {
            $Tpl->block_path = $block_path;
            $Tpl->SetVar($this->ComponentName, "");
            return "";
        }
        $this->Attributes->Show();
        $this->Menu2->Show();
        $this->Logout->Show();
        $Tpl->Parse();
        $Tpl->block_path = $block_path;
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
        $Tpl->SetVar($this->ComponentName, $Tpl->GetVar($this->ComponentName));
    }
//End Show Method

} //End menu1 Class @1-FCB6E20C

//Include Event File @1-86F5A231
include_once(RelativePath . "/menu1_events.php");
//End Include Event File


?>
