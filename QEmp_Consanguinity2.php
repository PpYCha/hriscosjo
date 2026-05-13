<?php
//Include Common Files @1-F601EAA6
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QEmp_Consanguinity2.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee ReportGroup class @2-795155D7
class clsReportGroupemployee {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $ConsanThird, $_ConsanThirdAttributes;
    var $AdminOffense, $_AdminOffenseAttributes;
    var $GovIssuedID, $_GovIssuedIDAttributes;
    var $IDNo, $_IDNoAttributes;
    var $DatePlaceIssuance, $_DatePlaceIssuanceAttributes;
    var $DateAccomplished, $_DateAccomplishedAttributes;
    var $ConsanThirdDetaila, $_ConsanThirdDetailaAttributes;
    var $ConsanFourth, $_ConsanFourthAttributes;
    var $ConsanFourthDetails, $_ConsanFourthDetailsAttributes;
    var $AdminOffenseDetails, $_AdminOffenseDetailsAttributes;
    var $CriminallyCharged, $_CriminallyChargedAttributes;
    var $CriminallyChargedDetails, $_CriminallyChargedDetailsAttributes;
    var $ConvictedOfCrime, $_ConvictedOfCrimeAttributes;
    var $ConvictedCrimeDetails, $_ConvictedCrimeDetailsAttributes;
    var $SeparatedFromService, $_SeparatedFromServiceAttributes;
    var $SeparatedFromServiceDetails, $_SeparatedFromServiceDetailsAttributes;
    var $CandidateElection, $_CandidateElectionAttributes;
    var $CandidateElectionDetails, $_CandidateElectionDetailsAttributes;
    var $ResignedGovService, $_ResignedGovServiceAttributes;
    var $ResignedGovServiceDetails, $_ResignedGovServiceDetailsAttributes;
    var $StatOfImmigrant, $_StatOfImmigrantAttributes;
    var $StatOfImmigrantDetails, $_StatOfImmigrantDetailsAttributes;
    var $IndigenousGroupMember, $_IndigenousGroupMemberAttributes;
    var $IndigenousDetails, $_IndigenousDetailsAttributes;
    var $DifferentlyAbled, $_DifferentlyAbledAttributes;
    var $DifferentlyAbledDetails, $_DifferentlyAbledDetailsAttributes;
    var $SoloParent, $_SoloParentAttributes;
    var $SoloParentDetails, $_SoloParentDetailsAttributes;
    var $ReportLabel1, $_ReportLabel1Attributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $Surname, $_SurnameAttributes;
    var $Report_CurrentDate, $_Report_CurrentDateAttributes;
    var $Attributes;
    var $ReportTotalIndex = 0;
    var $PageTotalIndex;
    var $PageNumber;
    var $RowNumber;
    var $Parent;

    function clsReportGroupemployee(& $parent) {
        $this->Parent = & $parent;
        $this->Attributes = $this->Parent->Attributes->GetAsArray();
    }
    function SetControls($PrevGroup = "") {
        $this->ConsanThird = $this->Parent->ConsanThird->Value;
        $this->AdminOffense = $this->Parent->AdminOffense->Value;
        $this->GovIssuedID = $this->Parent->GovIssuedID->Value;
        $this->IDNo = $this->Parent->IDNo->Value;
        $this->DatePlaceIssuance = $this->Parent->DatePlaceIssuance->Value;
        $this->DateAccomplished = $this->Parent->DateAccomplished->Value;
        $this->ConsanThirdDetaila = $this->Parent->ConsanThirdDetaila->Value;
        $this->ConsanFourth = $this->Parent->ConsanFourth->Value;
        $this->ConsanFourthDetails = $this->Parent->ConsanFourthDetails->Value;
        $this->AdminOffenseDetails = $this->Parent->AdminOffenseDetails->Value;
        $this->CriminallyCharged = $this->Parent->CriminallyCharged->Value;
        $this->CriminallyChargedDetails = $this->Parent->CriminallyChargedDetails->Value;
        $this->ConvictedOfCrime = $this->Parent->ConvictedOfCrime->Value;
        $this->ConvictedCrimeDetails = $this->Parent->ConvictedCrimeDetails->Value;
        $this->SeparatedFromService = $this->Parent->SeparatedFromService->Value;
        $this->SeparatedFromServiceDetails = $this->Parent->SeparatedFromServiceDetails->Value;
        $this->CandidateElection = $this->Parent->CandidateElection->Value;
        $this->CandidateElectionDetails = $this->Parent->CandidateElectionDetails->Value;
        $this->ResignedGovService = $this->Parent->ResignedGovService->Value;
        $this->ResignedGovServiceDetails = $this->Parent->ResignedGovServiceDetails->Value;
        $this->StatOfImmigrant = $this->Parent->StatOfImmigrant->Value;
        $this->StatOfImmigrantDetails = $this->Parent->StatOfImmigrantDetails->Value;
        $this->IndigenousGroupMember = $this->Parent->IndigenousGroupMember->Value;
        $this->IndigenousDetails = $this->Parent->IndigenousDetails->Value;
        $this->DifferentlyAbled = $this->Parent->DifferentlyAbled->Value;
        $this->DifferentlyAbledDetails = $this->Parent->DifferentlyAbledDetails->Value;
        $this->SoloParent = $this->Parent->SoloParent->Value;
        $this->SoloParentDetails = $this->Parent->SoloParentDetails->Value;
        $this->ReportLabel1 = $this->Parent->ReportLabel1->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->Surname = $this->Parent->Surname->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_ConsanThirdAttributes = $this->Parent->ConsanThird->Attributes->GetAsArray();
        $this->_AdminOffenseAttributes = $this->Parent->AdminOffense->Attributes->GetAsArray();
        $this->_GovIssuedIDAttributes = $this->Parent->GovIssuedID->Attributes->GetAsArray();
        $this->_IDNoAttributes = $this->Parent->IDNo->Attributes->GetAsArray();
        $this->_DatePlaceIssuanceAttributes = $this->Parent->DatePlaceIssuance->Attributes->GetAsArray();
        $this->_DateAccomplishedAttributes = $this->Parent->DateAccomplished->Attributes->GetAsArray();
        $this->_ConsanThirdDetailaAttributes = $this->Parent->ConsanThirdDetaila->Attributes->GetAsArray();
        $this->_ConsanFourthAttributes = $this->Parent->ConsanFourth->Attributes->GetAsArray();
        $this->_ConsanFourthDetailsAttributes = $this->Parent->ConsanFourthDetails->Attributes->GetAsArray();
        $this->_AdminOffenseDetailsAttributes = $this->Parent->AdminOffenseDetails->Attributes->GetAsArray();
        $this->_CriminallyChargedAttributes = $this->Parent->CriminallyCharged->Attributes->GetAsArray();
        $this->_CriminallyChargedDetailsAttributes = $this->Parent->CriminallyChargedDetails->Attributes->GetAsArray();
        $this->_ConvictedOfCrimeAttributes = $this->Parent->ConvictedOfCrime->Attributes->GetAsArray();
        $this->_ConvictedCrimeDetailsAttributes = $this->Parent->ConvictedCrimeDetails->Attributes->GetAsArray();
        $this->_SeparatedFromServiceAttributes = $this->Parent->SeparatedFromService->Attributes->GetAsArray();
        $this->_SeparatedFromServiceDetailsAttributes = $this->Parent->SeparatedFromServiceDetails->Attributes->GetAsArray();
        $this->_CandidateElectionAttributes = $this->Parent->CandidateElection->Attributes->GetAsArray();
        $this->_CandidateElectionDetailsAttributes = $this->Parent->CandidateElectionDetails->Attributes->GetAsArray();
        $this->_ResignedGovServiceAttributes = $this->Parent->ResignedGovService->Attributes->GetAsArray();
        $this->_ResignedGovServiceDetailsAttributes = $this->Parent->ResignedGovServiceDetails->Attributes->GetAsArray();
        $this->_StatOfImmigrantAttributes = $this->Parent->StatOfImmigrant->Attributes->GetAsArray();
        $this->_StatOfImmigrantDetailsAttributes = $this->Parent->StatOfImmigrantDetails->Attributes->GetAsArray();
        $this->_IndigenousGroupMemberAttributes = $this->Parent->IndigenousGroupMember->Attributes->GetAsArray();
        $this->_IndigenousDetailsAttributes = $this->Parent->IndigenousDetails->Attributes->GetAsArray();
        $this->_DifferentlyAbledAttributes = $this->Parent->DifferentlyAbled->Attributes->GetAsArray();
        $this->_DifferentlyAbledDetailsAttributes = $this->Parent->DifferentlyAbledDetails->Attributes->GetAsArray();
        $this->_SoloParentAttributes = $this->Parent->SoloParent->Attributes->GetAsArray();
        $this->_SoloParentDetailsAttributes = $this->Parent->SoloParentDetails->Attributes->GetAsArray();
        $this->_ReportLabel1Attributes = $this->Parent->ReportLabel1->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->ConsanThird = $Header->ConsanThird;
        $Header->_ConsanThirdAttributes = $this->_ConsanThirdAttributes;
        $this->Parent->ConsanThird->Value = $Header->ConsanThird;
        $this->Parent->ConsanThird->Attributes->RestoreFromArray($Header->_ConsanThirdAttributes);
        $this->AdminOffense = $Header->AdminOffense;
        $Header->_AdminOffenseAttributes = $this->_AdminOffenseAttributes;
        $this->Parent->AdminOffense->Value = $Header->AdminOffense;
        $this->Parent->AdminOffense->Attributes->RestoreFromArray($Header->_AdminOffenseAttributes);
        $this->GovIssuedID = $Header->GovIssuedID;
        $Header->_GovIssuedIDAttributes = $this->_GovIssuedIDAttributes;
        $this->Parent->GovIssuedID->Value = $Header->GovIssuedID;
        $this->Parent->GovIssuedID->Attributes->RestoreFromArray($Header->_GovIssuedIDAttributes);
        $this->IDNo = $Header->IDNo;
        $Header->_IDNoAttributes = $this->_IDNoAttributes;
        $this->Parent->IDNo->Value = $Header->IDNo;
        $this->Parent->IDNo->Attributes->RestoreFromArray($Header->_IDNoAttributes);
        $this->DatePlaceIssuance = $Header->DatePlaceIssuance;
        $Header->_DatePlaceIssuanceAttributes = $this->_DatePlaceIssuanceAttributes;
        $this->Parent->DatePlaceIssuance->Value = $Header->DatePlaceIssuance;
        $this->Parent->DatePlaceIssuance->Attributes->RestoreFromArray($Header->_DatePlaceIssuanceAttributes);
        $this->DateAccomplished = $Header->DateAccomplished;
        $Header->_DateAccomplishedAttributes = $this->_DateAccomplishedAttributes;
        $this->Parent->DateAccomplished->Value = $Header->DateAccomplished;
        $this->Parent->DateAccomplished->Attributes->RestoreFromArray($Header->_DateAccomplishedAttributes);
        $this->ConsanThirdDetaila = $Header->ConsanThirdDetaila;
        $Header->_ConsanThirdDetailaAttributes = $this->_ConsanThirdDetailaAttributes;
        $this->Parent->ConsanThirdDetaila->Value = $Header->ConsanThirdDetaila;
        $this->Parent->ConsanThirdDetaila->Attributes->RestoreFromArray($Header->_ConsanThirdDetailaAttributes);
        $this->ConsanFourth = $Header->ConsanFourth;
        $Header->_ConsanFourthAttributes = $this->_ConsanFourthAttributes;
        $this->Parent->ConsanFourth->Value = $Header->ConsanFourth;
        $this->Parent->ConsanFourth->Attributes->RestoreFromArray($Header->_ConsanFourthAttributes);
        $this->ConsanFourthDetails = $Header->ConsanFourthDetails;
        $Header->_ConsanFourthDetailsAttributes = $this->_ConsanFourthDetailsAttributes;
        $this->Parent->ConsanFourthDetails->Value = $Header->ConsanFourthDetails;
        $this->Parent->ConsanFourthDetails->Attributes->RestoreFromArray($Header->_ConsanFourthDetailsAttributes);
        $this->AdminOffenseDetails = $Header->AdminOffenseDetails;
        $Header->_AdminOffenseDetailsAttributes = $this->_AdminOffenseDetailsAttributes;
        $this->Parent->AdminOffenseDetails->Value = $Header->AdminOffenseDetails;
        $this->Parent->AdminOffenseDetails->Attributes->RestoreFromArray($Header->_AdminOffenseDetailsAttributes);
        $this->CriminallyCharged = $Header->CriminallyCharged;
        $Header->_CriminallyChargedAttributes = $this->_CriminallyChargedAttributes;
        $this->Parent->CriminallyCharged->Value = $Header->CriminallyCharged;
        $this->Parent->CriminallyCharged->Attributes->RestoreFromArray($Header->_CriminallyChargedAttributes);
        $this->CriminallyChargedDetails = $Header->CriminallyChargedDetails;
        $Header->_CriminallyChargedDetailsAttributes = $this->_CriminallyChargedDetailsAttributes;
        $this->Parent->CriminallyChargedDetails->Value = $Header->CriminallyChargedDetails;
        $this->Parent->CriminallyChargedDetails->Attributes->RestoreFromArray($Header->_CriminallyChargedDetailsAttributes);
        $this->ConvictedOfCrime = $Header->ConvictedOfCrime;
        $Header->_ConvictedOfCrimeAttributes = $this->_ConvictedOfCrimeAttributes;
        $this->Parent->ConvictedOfCrime->Value = $Header->ConvictedOfCrime;
        $this->Parent->ConvictedOfCrime->Attributes->RestoreFromArray($Header->_ConvictedOfCrimeAttributes);
        $this->ConvictedCrimeDetails = $Header->ConvictedCrimeDetails;
        $Header->_ConvictedCrimeDetailsAttributes = $this->_ConvictedCrimeDetailsAttributes;
        $this->Parent->ConvictedCrimeDetails->Value = $Header->ConvictedCrimeDetails;
        $this->Parent->ConvictedCrimeDetails->Attributes->RestoreFromArray($Header->_ConvictedCrimeDetailsAttributes);
        $this->SeparatedFromService = $Header->SeparatedFromService;
        $Header->_SeparatedFromServiceAttributes = $this->_SeparatedFromServiceAttributes;
        $this->Parent->SeparatedFromService->Value = $Header->SeparatedFromService;
        $this->Parent->SeparatedFromService->Attributes->RestoreFromArray($Header->_SeparatedFromServiceAttributes);
        $this->SeparatedFromServiceDetails = $Header->SeparatedFromServiceDetails;
        $Header->_SeparatedFromServiceDetailsAttributes = $this->_SeparatedFromServiceDetailsAttributes;
        $this->Parent->SeparatedFromServiceDetails->Value = $Header->SeparatedFromServiceDetails;
        $this->Parent->SeparatedFromServiceDetails->Attributes->RestoreFromArray($Header->_SeparatedFromServiceDetailsAttributes);
        $this->CandidateElection = $Header->CandidateElection;
        $Header->_CandidateElectionAttributes = $this->_CandidateElectionAttributes;
        $this->Parent->CandidateElection->Value = $Header->CandidateElection;
        $this->Parent->CandidateElection->Attributes->RestoreFromArray($Header->_CandidateElectionAttributes);
        $this->CandidateElectionDetails = $Header->CandidateElectionDetails;
        $Header->_CandidateElectionDetailsAttributes = $this->_CandidateElectionDetailsAttributes;
        $this->Parent->CandidateElectionDetails->Value = $Header->CandidateElectionDetails;
        $this->Parent->CandidateElectionDetails->Attributes->RestoreFromArray($Header->_CandidateElectionDetailsAttributes);
        $this->ResignedGovService = $Header->ResignedGovService;
        $Header->_ResignedGovServiceAttributes = $this->_ResignedGovServiceAttributes;
        $this->Parent->ResignedGovService->Value = $Header->ResignedGovService;
        $this->Parent->ResignedGovService->Attributes->RestoreFromArray($Header->_ResignedGovServiceAttributes);
        $this->ResignedGovServiceDetails = $Header->ResignedGovServiceDetails;
        $Header->_ResignedGovServiceDetailsAttributes = $this->_ResignedGovServiceDetailsAttributes;
        $this->Parent->ResignedGovServiceDetails->Value = $Header->ResignedGovServiceDetails;
        $this->Parent->ResignedGovServiceDetails->Attributes->RestoreFromArray($Header->_ResignedGovServiceDetailsAttributes);
        $this->StatOfImmigrant = $Header->StatOfImmigrant;
        $Header->_StatOfImmigrantAttributes = $this->_StatOfImmigrantAttributes;
        $this->Parent->StatOfImmigrant->Value = $Header->StatOfImmigrant;
        $this->Parent->StatOfImmigrant->Attributes->RestoreFromArray($Header->_StatOfImmigrantAttributes);
        $this->StatOfImmigrantDetails = $Header->StatOfImmigrantDetails;
        $Header->_StatOfImmigrantDetailsAttributes = $this->_StatOfImmigrantDetailsAttributes;
        $this->Parent->StatOfImmigrantDetails->Value = $Header->StatOfImmigrantDetails;
        $this->Parent->StatOfImmigrantDetails->Attributes->RestoreFromArray($Header->_StatOfImmigrantDetailsAttributes);
        $this->IndigenousGroupMember = $Header->IndigenousGroupMember;
        $Header->_IndigenousGroupMemberAttributes = $this->_IndigenousGroupMemberAttributes;
        $this->Parent->IndigenousGroupMember->Value = $Header->IndigenousGroupMember;
        $this->Parent->IndigenousGroupMember->Attributes->RestoreFromArray($Header->_IndigenousGroupMemberAttributes);
        $this->IndigenousDetails = $Header->IndigenousDetails;
        $Header->_IndigenousDetailsAttributes = $this->_IndigenousDetailsAttributes;
        $this->Parent->IndigenousDetails->Value = $Header->IndigenousDetails;
        $this->Parent->IndigenousDetails->Attributes->RestoreFromArray($Header->_IndigenousDetailsAttributes);
        $this->DifferentlyAbled = $Header->DifferentlyAbled;
        $Header->_DifferentlyAbledAttributes = $this->_DifferentlyAbledAttributes;
        $this->Parent->DifferentlyAbled->Value = $Header->DifferentlyAbled;
        $this->Parent->DifferentlyAbled->Attributes->RestoreFromArray($Header->_DifferentlyAbledAttributes);
        $this->DifferentlyAbledDetails = $Header->DifferentlyAbledDetails;
        $Header->_DifferentlyAbledDetailsAttributes = $this->_DifferentlyAbledDetailsAttributes;
        $this->Parent->DifferentlyAbledDetails->Value = $Header->DifferentlyAbledDetails;
        $this->Parent->DifferentlyAbledDetails->Attributes->RestoreFromArray($Header->_DifferentlyAbledDetailsAttributes);
        $this->SoloParent = $Header->SoloParent;
        $Header->_SoloParentAttributes = $this->_SoloParentAttributes;
        $this->Parent->SoloParent->Value = $Header->SoloParent;
        $this->Parent->SoloParent->Attributes->RestoreFromArray($Header->_SoloParentAttributes);
        $this->SoloParentDetails = $Header->SoloParentDetails;
        $Header->_SoloParentDetailsAttributes = $this->_SoloParentDetailsAttributes;
        $this->Parent->SoloParentDetails->Value = $Header->SoloParentDetails;
        $this->Parent->SoloParentDetails->Attributes->RestoreFromArray($Header->_SoloParentDetailsAttributes);
        $this->ReportLabel1 = $Header->ReportLabel1;
        $Header->_ReportLabel1Attributes = $this->_ReportLabel1Attributes;
        $this->Parent->ReportLabel1->Value = $Header->ReportLabel1;
        $this->Parent->ReportLabel1->Attributes->RestoreFromArray($Header->_ReportLabel1Attributes);
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
        $this->EmployeeIDNo = $Header->EmployeeIDNo;
        $Header->_EmployeeIDNoAttributes = $this->_EmployeeIDNoAttributes;
        $this->Parent->EmployeeIDNo->Value = $Header->EmployeeIDNo;
        $this->Parent->EmployeeIDNo->Attributes->RestoreFromArray($Header->_EmployeeIDNoAttributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->MiddleName = $Header->MiddleName;
        $Header->_MiddleNameAttributes = $this->_MiddleNameAttributes;
        $this->Parent->MiddleName->Value = $Header->MiddleName;
        $this->Parent->MiddleName->Attributes->RestoreFromArray($Header->_MiddleNameAttributes);
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee ReportGroup class

//employee GroupsCollection class @2-2ECD266E
class clsGroupsCollectionemployee {
    var $Groups;
    var $mPageCurrentHeaderIndex;
    var $PageSize;
    var $TotalPages = 0;
    var $TotalRows = 0;
    var $CurrentPageSize = 0;
    var $Pages;
    var $Parent;
    var $LastDetailIndex;

    function clsGroupsCollectionemployee(& $parent) {
        $this->Parent = & $parent;
        $this->Groups = array();
        $this->Pages  = array();
        $this->mReportTotalIndex = 0;
        $this->mPageTotalIndex = 1;
    }

    function & InitGroup() {
        $group = new clsReportGroupemployee($this->Parent);
        $group->RowNumber = $this->TotalRows + 1;
        $group->PageNumber = $this->TotalPages;
        $group->PageTotalIndex = $this->mPageCurrentHeaderIndex;
        return $group;
    }

    function RestoreValues() {
        $this->Parent->ConsanThird->Value = $this->Parent->ConsanThird->initialValue;
        $this->Parent->AdminOffense->Value = $this->Parent->AdminOffense->initialValue;
        $this->Parent->GovIssuedID->Value = $this->Parent->GovIssuedID->initialValue;
        $this->Parent->IDNo->Value = $this->Parent->IDNo->initialValue;
        $this->Parent->DatePlaceIssuance->Value = $this->Parent->DatePlaceIssuance->initialValue;
        $this->Parent->DateAccomplished->Value = $this->Parent->DateAccomplished->initialValue;
        $this->Parent->ConsanThirdDetaila->Value = $this->Parent->ConsanThirdDetaila->initialValue;
        $this->Parent->ConsanFourth->Value = $this->Parent->ConsanFourth->initialValue;
        $this->Parent->ConsanFourthDetails->Value = $this->Parent->ConsanFourthDetails->initialValue;
        $this->Parent->AdminOffenseDetails->Value = $this->Parent->AdminOffenseDetails->initialValue;
        $this->Parent->CriminallyCharged->Value = $this->Parent->CriminallyCharged->initialValue;
        $this->Parent->CriminallyChargedDetails->Value = $this->Parent->CriminallyChargedDetails->initialValue;
        $this->Parent->ConvictedOfCrime->Value = $this->Parent->ConvictedOfCrime->initialValue;
        $this->Parent->ConvictedCrimeDetails->Value = $this->Parent->ConvictedCrimeDetails->initialValue;
        $this->Parent->SeparatedFromService->Value = $this->Parent->SeparatedFromService->initialValue;
        $this->Parent->SeparatedFromServiceDetails->Value = $this->Parent->SeparatedFromServiceDetails->initialValue;
        $this->Parent->CandidateElection->Value = $this->Parent->CandidateElection->initialValue;
        $this->Parent->CandidateElectionDetails->Value = $this->Parent->CandidateElectionDetails->initialValue;
        $this->Parent->ResignedGovService->Value = $this->Parent->ResignedGovService->initialValue;
        $this->Parent->ResignedGovServiceDetails->Value = $this->Parent->ResignedGovServiceDetails->initialValue;
        $this->Parent->StatOfImmigrant->Value = $this->Parent->StatOfImmigrant->initialValue;
        $this->Parent->StatOfImmigrantDetails->Value = $this->Parent->StatOfImmigrantDetails->initialValue;
        $this->Parent->IndigenousGroupMember->Value = $this->Parent->IndigenousGroupMember->initialValue;
        $this->Parent->IndigenousDetails->Value = $this->Parent->IndigenousDetails->initialValue;
        $this->Parent->DifferentlyAbled->Value = $this->Parent->DifferentlyAbled->initialValue;
        $this->Parent->DifferentlyAbledDetails->Value = $this->Parent->DifferentlyAbledDetails->initialValue;
        $this->Parent->SoloParent->Value = $this->Parent->SoloParent->initialValue;
        $this->Parent->SoloParentDetails->Value = $this->Parent->SoloParentDetails->initialValue;
        $this->Parent->ReportLabel1->Value = $this->Parent->ReportLabel1->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
    }

    function OpenPage() {
        $this->TotalPages++;
        $Group = & $this->InitGroup();
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnInitialize", $this->Parent->Page_Header);
        if ($this->Parent->Page_Header->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Page_Header->Height;
        $Group->SetTotalControls("GetNextValue");
        $this->Parent->Page_Header->CCSEventResult = CCGetEvent($this->Parent->Page_Header->CCSEvents, "OnCalculate", $this->Parent->Page_Header);
        $Group->SetControls();
        $Group->Mode = 1;
        $Group->GroupType = "Page";
        $Group->PageTotalIndex = count($this->Groups);
        $this->mPageCurrentHeaderIndex = count($this->Groups);
        $this->Groups[] =  & $Group;
        $this->Pages[] =  count($this->Groups) == 2 ? 0 : count($this->Groups) - 1;
    }

    function OpenGroup($groupName) {
        $Group = "";
        $OpenFlag = false;
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnInitialize", $this->Parent->Report_Header);
            if ($this->Parent->Report_Header->Visible) 
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Header->Height;
                $Group->SetTotalControls("GetNextValue");
            $this->Parent->Report_Header->CCSEventResult = CCGetEvent($this->Parent->Report_Header->CCSEvents, "OnCalculate", $this->Parent->Report_Header);
            $Group->SetControls();
            $Group->Mode = 1;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->OpenPage();
        }
    }

    function ClosePage() {
        $Group = & $this->InitGroup();
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnInitialize", $this->Parent->Page_Footer);
        $Group->SetTotalControls("GetPrevValue");
        $Group->SyncWithHeader($this->Groups[$this->mPageCurrentHeaderIndex]);
        $this->Parent->Page_Footer->CCSEventResult = CCGetEvent($this->Parent->Page_Footer->CCSEvents, "OnCalculate", $this->Parent->Page_Footer);
        $Group->SetControls();
        $this->RestoreValues();
        $this->CurrentPageSize = 0;
        $Group->Mode = 2;
        $Group->GroupType = "Page";
        $this->Groups[] = & $Group;
    }

    function CloseGroup($groupName)
    {
        $Group = "";
        if ($groupName == "Report") {
            $Group = & $this->InitGroup(true);
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnInitialize", $this->Parent->Report_Footer);
            if ($this->Parent->Page_Footer->Visible) 
                $OverSize = $this->Parent->Report_Footer->Height + $this->Parent->Page_Footer->Height;
            else
                $OverSize = $this->Parent->Report_Footer->Height;
            if (($this->PageSize > 0) and $this->Parent->Report_Footer->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
                $this->ClosePage();
                $this->OpenPage();
            }
            $Group->SetTotalControls("GetPrevValue");
            $Group->SyncWithHeader($this->Groups[0]);
            if ($this->Parent->Report_Footer->Visible)
                $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Report_Footer->Height;
            $this->Parent->Report_Footer->CCSEventResult = CCGetEvent($this->Parent->Report_Footer->CCSEvents, "OnCalculate", $this->Parent->Report_Footer);
            $Group->SetControls();
            $this->RestoreValues();
            $Group->Mode = 2;
            $Group->GroupType = "Report";
            $this->Groups[] = & $Group;
            $this->ClosePage();
            return;
        }
    }

    function AddItem()
    {
        $Group = & $this->InitGroup(true);
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnInitialize", $this->Parent->Detail);
        if ($this->Parent->Page_Footer->Visible) 
            $OverSize = $this->Parent->Detail->Height + $this->Parent->Page_Footer->Height;
        else
            $OverSize = $this->Parent->Detail->Height;
        if (($this->PageSize > 0) and $this->Parent->Detail->Visible and ($this->CurrentPageSize + $OverSize > $this->PageSize)) {
            $this->ClosePage();
            $this->OpenPage();
        }
        $this->TotalRows++;
        if ($this->LastDetailIndex)
            $PrevGroup = & $this->Groups[$this->LastDetailIndex];
        else
            $PrevGroup = "";
        $Group->SetTotalControls("", $PrevGroup);
        if ($this->Parent->Detail->Visible)
            $this->CurrentPageSize = $this->CurrentPageSize + $this->Parent->Detail->Height;
        $this->Parent->Detail->CCSEventResult = CCGetEvent($this->Parent->Detail->CCSEvents, "OnCalculate", $this->Parent->Detail);
        $Group->SetControls($PrevGroup);
        $this->LastDetailIndex = count($this->Groups);
        $this->Groups[] = & $Group;
    }
}
//End employee GroupsCollection class

class clsReportemployee { //employee Class @2-3BA851DF

//employee Variables @2-87F7EA53

    var $ComponentType = "Report";
    var $PageSize;
    var $ComponentName;
    var $Visible;
    var $Errors;
    var $CCSEvents = array();
    var $CCSEventResult;
    var $RelativePath = "";
    var $ViewMode = "Web";
    var $TemplateBlock;
    var $PageNumber;
    var $RowNumber;
    var $TotalRows;
    var $TotalPages;
    var $ControlsVisible = array();
    var $IsEmpty;
    var $Attributes;
    var $DetailBlock, $Detail;
    var $Report_FooterBlock, $Report_Footer;
    var $Report_HeaderBlock, $Report_Header;
    var $Page_FooterBlock, $Page_Footer;
    var $Page_HeaderBlock, $Page_Header;
    var $SorterName, $SorterDirection;

    var $ds;
    var $DataSource;
    var $UseClientPaging = false;

    //Report Controls
    var $StaticControls, $RowControls, $Report_FooterControls, $Report_HeaderControls;
    var $Page_FooterControls, $Page_HeaderControls;
//End employee Variables

//Class_Initialize Event @2-F1668BD9
    function clsReportemployee($RelativePath = "", & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "employee";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->Detail = new clsSection($this);
        $MinPageSize = 0;
        $MaxSectionSize = 0;
        $this->Detail->Height = 34;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 2;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployeeDataSource($this);
        $this->ds = & $this->DataSource;
        $this->ViewMode = CCGetParam("ViewMode", "Web");
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else if($this->ViewMode == "Print") {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 50;
             else if ($PageSize == "0")
                $this->PageSize = 0;
             else 
                $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 40;
             else if ($PageSize == "0")
                $this->PageSize = 100;
             else 
                $this->PageSize = min(100, $PageSize);
        }
        $MinPageSize += $MaxSectionSize;
        if ($this->PageSize && $MinPageSize && $this->PageSize < $MinPageSize)
            $this->PageSize = $MinPageSize;
        $this->PageNumber = $this->ViewMode == "Print" ? 1 : intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0 ) {
            $this->PageNumber = 1;
        }

        $this->ConsanThird = & new clsControl(ccsReportLabel, "ConsanThird", "ConsanThird", ccsText, "", "", $this);
        $this->AdminOffense = & new clsControl(ccsReportLabel, "AdminOffense", "AdminOffense", ccsText, "", "", $this);
        $this->GovIssuedID = & new clsControl(ccsReportLabel, "GovIssuedID", "GovIssuedID", ccsText, "", "", $this);
        $this->IDNo = & new clsControl(ccsReportLabel, "IDNo", "IDNo", ccsText, "", "", $this);
        $this->DatePlaceIssuance = & new clsControl(ccsReportLabel, "DatePlaceIssuance", "DatePlaceIssuance", ccsText, "", "", $this);
        $this->DateAccomplished = & new clsControl(ccsReportLabel, "DateAccomplished", "DateAccomplished", ccsDate, array("mmmm", " ", "d", ", ", "yyyy"), "", $this);
        $this->ConsanThirdDetaila = & new clsControl(ccsReportLabel, "ConsanThirdDetaila", "ConsanThirdDetaila", ccsText, "", "", $this);
        $this->ConsanFourth = & new clsControl(ccsReportLabel, "ConsanFourth", "ConsanFourth", ccsText, "", "", $this);
        $this->ConsanFourthDetails = & new clsControl(ccsReportLabel, "ConsanFourthDetails", "ConsanFourthDetails", ccsText, "", "", $this);
        $this->AdminOffenseDetails = & new clsControl(ccsReportLabel, "AdminOffenseDetails", "AdminOffenseDetails", ccsText, "", "", $this);
        $this->CriminallyCharged = & new clsControl(ccsReportLabel, "CriminallyCharged", "CriminallyCharged", ccsText, "", "", $this);
        $this->CriminallyChargedDetails = & new clsControl(ccsReportLabel, "CriminallyChargedDetails", "CriminallyChargedDetails", ccsText, "", "", $this);
        $this->ConvictedOfCrime = & new clsControl(ccsReportLabel, "ConvictedOfCrime", "ConvictedOfCrime", ccsText, "", "", $this);
        $this->ConvictedCrimeDetails = & new clsControl(ccsReportLabel, "ConvictedCrimeDetails", "ConvictedCrimeDetails", ccsText, "", "", $this);
        $this->SeparatedFromService = & new clsControl(ccsReportLabel, "SeparatedFromService", "SeparatedFromService", ccsText, "", "", $this);
        $this->SeparatedFromServiceDetails = & new clsControl(ccsReportLabel, "SeparatedFromServiceDetails", "SeparatedFromServiceDetails", ccsText, "", "", $this);
        $this->CandidateElection = & new clsControl(ccsReportLabel, "CandidateElection", "CandidateElection", ccsText, "", "", $this);
        $this->CandidateElectionDetails = & new clsControl(ccsReportLabel, "CandidateElectionDetails", "CandidateElectionDetails", ccsText, "", "", $this);
        $this->ResignedGovService = & new clsControl(ccsReportLabel, "ResignedGovService", "ResignedGovService", ccsText, "", "", $this);
        $this->ResignedGovServiceDetails = & new clsControl(ccsReportLabel, "ResignedGovServiceDetails", "ResignedGovServiceDetails", ccsText, "", "", $this);
        $this->StatOfImmigrant = & new clsControl(ccsReportLabel, "StatOfImmigrant", "StatOfImmigrant", ccsText, "", "", $this);
        $this->StatOfImmigrantDetails = & new clsControl(ccsReportLabel, "StatOfImmigrantDetails", "StatOfImmigrantDetails", ccsText, "", "", $this);
        $this->IndigenousGroupMember = & new clsControl(ccsReportLabel, "IndigenousGroupMember", "IndigenousGroupMember", ccsText, "", "", $this);
        $this->IndigenousDetails = & new clsControl(ccsReportLabel, "IndigenousDetails", "IndigenousDetails", ccsText, "", "", $this);
        $this->DifferentlyAbled = & new clsControl(ccsReportLabel, "DifferentlyAbled", "DifferentlyAbled", ccsText, "", "", $this);
        $this->DifferentlyAbledDetails = & new clsControl(ccsReportLabel, "DifferentlyAbledDetails", "DifferentlyAbledDetails", ccsText, "", "", $this);
        $this->SoloParent = & new clsControl(ccsReportLabel, "SoloParent", "SoloParent", ccsText, "", "", $this);
        $this->SoloParentDetails = & new clsControl(ccsReportLabel, "SoloParentDetails", "SoloParentDetails", ccsText, "", "", $this);
        $this->ReportLabel1 = & new clsControl(ccsImage, "ReportLabel1", "ReportLabel1", ccsText, "", CCGetRequestParam("ReportLabel1", ccsGet, NULL), $this);
        $this->NameExtension = & new clsControl(ccsHidden, "NameExtension", "NameExtension", ccsText, "", CCGetRequestParam("NameExtension", ccsGet, NULL), $this);
        $this->EmployeeIDNo = & new clsControl(ccsHidden, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", CCGetRequestParam("EmployeeIDNo", ccsGet, NULL), $this);
        $this->FirstName = & new clsControl(ccsHidden, "FirstName", "FirstName", ccsText, "", CCGetRequestParam("FirstName", ccsGet, NULL), $this);
        $this->MiddleName = & new clsControl(ccsHidden, "MiddleName", "MiddleName", ccsText, "", CCGetRequestParam("MiddleName", ccsGet, NULL), $this);
        $this->Surname = & new clsControl(ccsHidden, "Surname", "Surname", ccsText, "", CCGetRequestParam("Surname", ccsGet, NULL), $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->PageBreak = & new clsPanel("PageBreak", $this);
        $this->Report_CurrentDate = & new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->Navigator = & new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpCentered, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @2-6C59EE65
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = $this->PageSize;
        $this->DataSource->AbsolutePage = $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//CheckErrors Method @2-4546B608
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ConsanThird->Errors->Count());
        $errors = ($errors || $this->AdminOffense->Errors->Count());
        $errors = ($errors || $this->GovIssuedID->Errors->Count());
        $errors = ($errors || $this->IDNo->Errors->Count());
        $errors = ($errors || $this->DatePlaceIssuance->Errors->Count());
        $errors = ($errors || $this->DateAccomplished->Errors->Count());
        $errors = ($errors || $this->ConsanThirdDetaila->Errors->Count());
        $errors = ($errors || $this->ConsanFourth->Errors->Count());
        $errors = ($errors || $this->ConsanFourthDetails->Errors->Count());
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
        $errors = ($errors || $this->ReportLabel1->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-2251D481
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->ConsanThird->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AdminOffense->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GovIssuedID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DatePlaceIssuance->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DateAccomplished->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConsanThirdDetaila->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConsanFourth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConsanFourthDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AdminOffenseDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CriminallyCharged->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CriminallyChargedDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConvictedOfCrime->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ConvictedCrimeDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SeparatedFromService->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SeparatedFromServiceDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CandidateElection->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CandidateElectionDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResignedGovService->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResignedGovServiceDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatOfImmigrant->Errors->ToString());
        $errors = ComposeStrings($errors, $this->StatOfImmigrantDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IndigenousGroupMember->Errors->ToString());
        $errors = ComposeStrings($errors, $this->IndigenousDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DifferentlyAbled->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DifferentlyAbledDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SoloParent->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SoloParentDetails->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ReportLabel1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-62E07208
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urlEmployeeID"] = CCGetFromGet("EmployeeID", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();

        $Groups = new clsGroupsCollectionemployee($this);
        $Groups->PageSize = $this->PageSize > 0 ? $this->PageSize : 0;

        $is_next_record = $this->DataSource->next_record();
        $this->IsEmpty = ! $is_next_record;
        while($is_next_record) {
            $this->DataSource->SetValues();
            $this->ConsanThird->SetValue($this->DataSource->ConsanThird->GetValue());
            $this->AdminOffense->SetValue($this->DataSource->AdminOffense->GetValue());
            $this->GovIssuedID->SetValue($this->DataSource->GovIssuedID->GetValue());
            $this->IDNo->SetValue($this->DataSource->IDNo->GetValue());
            $this->DatePlaceIssuance->SetValue($this->DataSource->DatePlaceIssuance->GetValue());
            $this->DateAccomplished->SetValue($this->DataSource->DateAccomplished->GetValue());
            $this->ConsanThirdDetaila->SetValue($this->DataSource->ConsanThirdDetaila->GetValue());
            $this->ConsanFourth->SetValue($this->DataSource->ConsanFourth->GetValue());
            $this->ConsanFourthDetails->SetValue($this->DataSource->ConsanFourthDetails->GetValue());
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
            $this->ReportLabel1->SetValue($this->DataSource->ReportLabel1->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            if (count($Groups->Groups) == 0) $Groups->OpenGroup("Report");
            $Groups->AddItem();
            $is_next_record = $this->DataSource->next_record();
        }
        if (!count($Groups->Groups)) 
            $Groups->OpenGroup("Report");
        else
            $this->NoRecords->Visible = false;
        $Groups->CloseGroup("Report");
        $this->TotalPages = $Groups->TotalPages;
        $this->TotalRows = $Groups->TotalRows;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $this->Attributes->Show();
        $ReportBlock = "Report " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;

        if($this->CheckErrors()) {
            $Tpl->replaceblock("", $this->GetErrors());
            $Tpl->block_path = $ParentPath;
            return;
        } else {
            $items = & $Groups->Groups;
            $i = $Groups->Pages[min($this->PageNumber, $Groups->TotalPages) - 1];
            $this->ControlsVisible["ConsanThird"] = $this->ConsanThird->Visible;
            $this->ControlsVisible["AdminOffense"] = $this->AdminOffense->Visible;
            $this->ControlsVisible["GovIssuedID"] = $this->GovIssuedID->Visible;
            $this->ControlsVisible["IDNo"] = $this->IDNo->Visible;
            $this->ControlsVisible["DatePlaceIssuance"] = $this->DatePlaceIssuance->Visible;
            $this->ControlsVisible["DateAccomplished"] = $this->DateAccomplished->Visible;
            $this->ControlsVisible["ConsanThirdDetaila"] = $this->ConsanThirdDetaila->Visible;
            $this->ControlsVisible["ConsanFourth"] = $this->ConsanFourth->Visible;
            $this->ControlsVisible["ConsanFourthDetails"] = $this->ConsanFourthDetails->Visible;
            $this->ControlsVisible["AdminOffenseDetails"] = $this->AdminOffenseDetails->Visible;
            $this->ControlsVisible["CriminallyCharged"] = $this->CriminallyCharged->Visible;
            $this->ControlsVisible["CriminallyChargedDetails"] = $this->CriminallyChargedDetails->Visible;
            $this->ControlsVisible["ConvictedOfCrime"] = $this->ConvictedOfCrime->Visible;
            $this->ControlsVisible["ConvictedCrimeDetails"] = $this->ConvictedCrimeDetails->Visible;
            $this->ControlsVisible["SeparatedFromService"] = $this->SeparatedFromService->Visible;
            $this->ControlsVisible["SeparatedFromServiceDetails"] = $this->SeparatedFromServiceDetails->Visible;
            $this->ControlsVisible["CandidateElection"] = $this->CandidateElection->Visible;
            $this->ControlsVisible["CandidateElectionDetails"] = $this->CandidateElectionDetails->Visible;
            $this->ControlsVisible["ResignedGovService"] = $this->ResignedGovService->Visible;
            $this->ControlsVisible["ResignedGovServiceDetails"] = $this->ResignedGovServiceDetails->Visible;
            $this->ControlsVisible["StatOfImmigrant"] = $this->StatOfImmigrant->Visible;
            $this->ControlsVisible["StatOfImmigrantDetails"] = $this->StatOfImmigrantDetails->Visible;
            $this->ControlsVisible["IndigenousGroupMember"] = $this->IndigenousGroupMember->Visible;
            $this->ControlsVisible["IndigenousDetails"] = $this->IndigenousDetails->Visible;
            $this->ControlsVisible["DifferentlyAbled"] = $this->DifferentlyAbled->Visible;
            $this->ControlsVisible["DifferentlyAbledDetails"] = $this->DifferentlyAbledDetails->Visible;
            $this->ControlsVisible["SoloParent"] = $this->SoloParent->Visible;
            $this->ControlsVisible["SoloParentDetails"] = $this->SoloParentDetails->Visible;
            $this->ControlsVisible["ReportLabel1"] = $this->ReportLabel1->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->ConsanThird->SetValue($items[$i]->ConsanThird);
                        $this->ConsanThird->Attributes->RestoreFromArray($items[$i]->_ConsanThirdAttributes);
                        $this->AdminOffense->SetValue($items[$i]->AdminOffense);
                        $this->AdminOffense->Attributes->RestoreFromArray($items[$i]->_AdminOffenseAttributes);
                        $this->GovIssuedID->SetValue($items[$i]->GovIssuedID);
                        $this->GovIssuedID->Attributes->RestoreFromArray($items[$i]->_GovIssuedIDAttributes);
                        $this->IDNo->SetValue($items[$i]->IDNo);
                        $this->IDNo->Attributes->RestoreFromArray($items[$i]->_IDNoAttributes);
                        $this->DatePlaceIssuance->SetValue($items[$i]->DatePlaceIssuance);
                        $this->DatePlaceIssuance->Attributes->RestoreFromArray($items[$i]->_DatePlaceIssuanceAttributes);
                        $this->DateAccomplished->SetValue($items[$i]->DateAccomplished);
                        $this->DateAccomplished->Attributes->RestoreFromArray($items[$i]->_DateAccomplishedAttributes);
                        $this->ConsanThirdDetaila->SetValue($items[$i]->ConsanThirdDetaila);
                        $this->ConsanThirdDetaila->Attributes->RestoreFromArray($items[$i]->_ConsanThirdDetailaAttributes);
                        $this->ConsanFourth->SetValue($items[$i]->ConsanFourth);
                        $this->ConsanFourth->Attributes->RestoreFromArray($items[$i]->_ConsanFourthAttributes);
                        $this->ConsanFourthDetails->SetValue($items[$i]->ConsanFourthDetails);
                        $this->ConsanFourthDetails->Attributes->RestoreFromArray($items[$i]->_ConsanFourthDetailsAttributes);
                        $this->AdminOffenseDetails->SetValue($items[$i]->AdminOffenseDetails);
                        $this->AdminOffenseDetails->Attributes->RestoreFromArray($items[$i]->_AdminOffenseDetailsAttributes);
                        $this->CriminallyCharged->SetValue($items[$i]->CriminallyCharged);
                        $this->CriminallyCharged->Attributes->RestoreFromArray($items[$i]->_CriminallyChargedAttributes);
                        $this->CriminallyChargedDetails->SetValue($items[$i]->CriminallyChargedDetails);
                        $this->CriminallyChargedDetails->Attributes->RestoreFromArray($items[$i]->_CriminallyChargedDetailsAttributes);
                        $this->ConvictedOfCrime->SetValue($items[$i]->ConvictedOfCrime);
                        $this->ConvictedOfCrime->Attributes->RestoreFromArray($items[$i]->_ConvictedOfCrimeAttributes);
                        $this->ConvictedCrimeDetails->SetValue($items[$i]->ConvictedCrimeDetails);
                        $this->ConvictedCrimeDetails->Attributes->RestoreFromArray($items[$i]->_ConvictedCrimeDetailsAttributes);
                        $this->SeparatedFromService->SetValue($items[$i]->SeparatedFromService);
                        $this->SeparatedFromService->Attributes->RestoreFromArray($items[$i]->_SeparatedFromServiceAttributes);
                        $this->SeparatedFromServiceDetails->SetValue($items[$i]->SeparatedFromServiceDetails);
                        $this->SeparatedFromServiceDetails->Attributes->RestoreFromArray($items[$i]->_SeparatedFromServiceDetailsAttributes);
                        $this->CandidateElection->SetValue($items[$i]->CandidateElection);
                        $this->CandidateElection->Attributes->RestoreFromArray($items[$i]->_CandidateElectionAttributes);
                        $this->CandidateElectionDetails->SetValue($items[$i]->CandidateElectionDetails);
                        $this->CandidateElectionDetails->Attributes->RestoreFromArray($items[$i]->_CandidateElectionDetailsAttributes);
                        $this->ResignedGovService->SetValue($items[$i]->ResignedGovService);
                        $this->ResignedGovService->Attributes->RestoreFromArray($items[$i]->_ResignedGovServiceAttributes);
                        $this->ResignedGovServiceDetails->SetValue($items[$i]->ResignedGovServiceDetails);
                        $this->ResignedGovServiceDetails->Attributes->RestoreFromArray($items[$i]->_ResignedGovServiceDetailsAttributes);
                        $this->StatOfImmigrant->SetValue($items[$i]->StatOfImmigrant);
                        $this->StatOfImmigrant->Attributes->RestoreFromArray($items[$i]->_StatOfImmigrantAttributes);
                        $this->StatOfImmigrantDetails->SetValue($items[$i]->StatOfImmigrantDetails);
                        $this->StatOfImmigrantDetails->Attributes->RestoreFromArray($items[$i]->_StatOfImmigrantDetailsAttributes);
                        $this->IndigenousGroupMember->SetValue($items[$i]->IndigenousGroupMember);
                        $this->IndigenousGroupMember->Attributes->RestoreFromArray($items[$i]->_IndigenousGroupMemberAttributes);
                        $this->IndigenousDetails->SetValue($items[$i]->IndigenousDetails);
                        $this->IndigenousDetails->Attributes->RestoreFromArray($items[$i]->_IndigenousDetailsAttributes);
                        $this->DifferentlyAbled->SetValue($items[$i]->DifferentlyAbled);
                        $this->DifferentlyAbled->Attributes->RestoreFromArray($items[$i]->_DifferentlyAbledAttributes);
                        $this->DifferentlyAbledDetails->SetValue($items[$i]->DifferentlyAbledDetails);
                        $this->DifferentlyAbledDetails->Attributes->RestoreFromArray($items[$i]->_DifferentlyAbledDetailsAttributes);
                        $this->SoloParent->SetValue($items[$i]->SoloParent);
                        $this->SoloParent->Attributes->RestoreFromArray($items[$i]->_SoloParentAttributes);
                        $this->SoloParentDetails->SetValue($items[$i]->SoloParentDetails);
                        $this->SoloParentDetails->Attributes->RestoreFromArray($items[$i]->_SoloParentDetailsAttributes);
                        $this->ReportLabel1->SetValue($items[$i]->ReportLabel1);
                        $this->ReportLabel1->Attributes->RestoreFromArray($items[$i]->_ReportLabel1Attributes);
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->ConsanThird->Show();
                        $this->AdminOffense->Show();
                        $this->GovIssuedID->Show();
                        $this->IDNo->Show();
                        $this->DatePlaceIssuance->Show();
                        $this->DateAccomplished->Show();
                        $this->ConsanThirdDetaila->Show();
                        $this->ConsanFourth->Show();
                        $this->ConsanFourthDetails->Show();
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
                        $this->ReportLabel1->Show();
                        $this->NameExtension->Show();
                        $this->EmployeeIDNo->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->Surname->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Footer", true, "Section Detail");
                            }
                        }
                        break;
                    case "Page":
                        if ($items[$i]->Mode == 1) {
                            $this->Page_Header->CCSEventResult = CCGetEvent($this->Page_Header->CCSEvents, "BeforeShow", $this->Page_Header);
                            if ($this->Page_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Header";
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2 && !$this->UseClientPaging || $items[$i]->Mode == 1 && $this->UseClientPaging) {
                            $this->PageBreak->Visible = (($i < count($items) - 1) && ($this->ViewMode == "Print"));
                            $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                            $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
                                $this->Report_CurrentDate->Show();
                                $this->Navigator->Show();
                                $this->Attributes->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Page_Footer", true, "Section Detail");
                            }
                        }
                        break;
                }
                $i++;
            } while ($i < count($items) && ($this->ViewMode == "Print" ||  !($i > 1 && $items[$i]->GroupType == 'Page' && $items[$i]->Mode == 1)));
            $Tpl->block_path = $ParentPath;
            $Tpl->parse($ReportBlock);
            $this->DataSource->close();
        }

    }
//End Show Method

} //End employee Class @2-FCB6E20C

class clsemployeeDataSource extends clsDBConnection1 {  //employeeDataSource Class @2-3A1764EA

//DataSource Variables @2-8236E944
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $ConsanThird;
    var $AdminOffense;
    var $GovIssuedID;
    var $IDNo;
    var $DatePlaceIssuance;
    var $DateAccomplished;
    var $ConsanThirdDetaila;
    var $ConsanFourth;
    var $ConsanFourthDetails;
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
    var $ReportLabel1;
    var $NameExtension;
    var $EmployeeIDNo;
    var $FirstName;
    var $MiddleName;
    var $Surname;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-33688A33
    function clsemployeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee";
        $this->Initialize();
        $this->ConsanThird = new clsField("ConsanThird", ccsText, "");
        
        $this->AdminOffense = new clsField("AdminOffense", ccsText, "");
        
        $this->GovIssuedID = new clsField("GovIssuedID", ccsText, "");
        
        $this->IDNo = new clsField("IDNo", ccsText, "");
        
        $this->DatePlaceIssuance = new clsField("DatePlaceIssuance", ccsText, "");
        
        $this->DateAccomplished = new clsField("DateAccomplished", ccsDate, $this->DateFormat);
        
        $this->ConsanThirdDetaila = new clsField("ConsanThirdDetaila", ccsText, "");
        
        $this->ConsanFourth = new clsField("ConsanFourth", ccsText, "");
        
        $this->ConsanFourthDetails = new clsField("ConsanFourthDetails", ccsText, "");
        
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
        
        $this->ReportLabel1 = new clsField("ReportLabel1", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        

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

//Open Method @2-73786F2D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT EmployeeIDNo, Surname, FirstName, MiddleName, NameExtension, ConsanThird, ConsanThirdDetaila, ConsanFourth, ConsanFourthDetails,\n\n" .
        "AdminOffense, AdminOffenseDetails, CriminallyCharged, CriminallyChargedDetails, ConvictedOfCrime, ConvictedCrimeDetails,\n\n" .
        "SeparatedFromService, SeparatedFromServiceDetails, CandidateElection, CandidateElectionDetails, ResignedGovService, ResignedGovServiceDetails,\n\n" .
        "StatOfImmigrant, StatOfImmigrantDetails, IndigenousGroupMember, IndigenousDetails, DifferentlyAbled, DifferentlyAbledDetails,\n\n" .
        "SoloParent, SoloParentDetails, GovIssuedID, IDNo, DatePlaceIssuance, DateAccomplished, EmpPicture \n\n" .
        "FROM employee {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-77E77E02
    function SetValues()
    {
        $this->ConsanThird->SetDBValue($this->f("ConsanThird"));
        $this->AdminOffense->SetDBValue($this->f("AdminOffense"));
        $this->GovIssuedID->SetDBValue($this->f("GovIssuedID"));
        $this->IDNo->SetDBValue($this->f("IDNo"));
        $this->DatePlaceIssuance->SetDBValue($this->f("DatePlaceIssuance"));
        $this->DateAccomplished->SetDBValue(trim($this->f("DateAccomplished")));
        $this->ConsanThirdDetaila->SetDBValue($this->f("ConsanThirdDetaila"));
        $this->ConsanFourth->SetDBValue($this->f("ConsanFourth"));
        $this->ConsanFourthDetails->SetDBValue($this->f("ConsanFourthDetails"));
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
        $this->ReportLabel1->SetDBValue($this->f("EmpPicture"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->Surname->SetDBValue($this->f("Surname"));
    }
//End SetValues Method

} //End employeeDataSource Class @2-FCB6E20C

//Initialize Page @1-5AFAA91E
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
$TemplateFileName = "QEmp_Consanguinity2.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-176DA324
include_once("./QEmp_Consanguinity2_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-381AB9EE
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee = & new clsReportemployee("", $MainPage);
$Report_Print = & new clsControl(ccsLink, "Report_Print", "Report_Print", ccsText, "", CCGetRequestParam("Report_Print", ccsGet, NULL), $MainPage);
$Report_Print->Page = "QEmp_Consanguinity2_print.php";
$Link1 = & new clsControl(ccsLink, "Link1", "Link1", ccsText, "", CCGetRequestParam("Link1", ccsGet, NULL), $MainPage);
$Link1->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Link1->Page = "Q_Employee.php";
$MainPage->employee = & $employee;
$MainPage->Report_Print = & $Report_Print;
$MainPage->Link1 = & $Link1;
$Report_Print->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
$Report_Print->Parameters = CCAddParam($Report_Print->Parameters, "ViewMode", "Print");
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

//Show Page @1-BB2DACF4
$employee->Show();
$Report_Print->Show();
$Link1->Show();
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
