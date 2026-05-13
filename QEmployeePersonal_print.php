<?php
//Include Common Files @1-E556A69D
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "QEmployeePersonal_print.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee ReportGroup class @2-F9E58244
class clsReportGroupemployee {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $BirthMonth, $_BirthMonthAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $BirthDay, $_BirthDayAttributes;
    var $BirthYear, $_BirthYearAttributes;
    var $EmailAdd, $_EmailAddAttributes;
    var $MobileNo, $_MobileNoAttributes;
    var $TelNo, $_TelNoAttributes;
    var $ResHouseNo, $_ResHouseNoAttributes;
    var $ResStreet, $_ResStreetAttributes;
    var $ResSubVillage, $_ResSubVillageAttributes;
    var $ResBrgy, $_ResBrgyAttributes;
    var $ResMunicipality, $_ResMunicipalityAttributes;
    var $ResProvince, $_ResProvinceAttributes;
    var $ResZipcode, $_ResZipcodeAttributes;
    var $Citizenship, $_CitizenshipAttributes;
    var $PermHouseNo, $_PermHouseNoAttributes;
    var $PermStreet, $_PermStreetAttributes;
    var $PermSubVillage, $_PermSubVillageAttributes;
    var $PermBrgy, $_PermBrgyAttributes;
    var $PermMunicipality, $_PermMunicipalityAttributes;
    var $PermProvince, $_PermProvinceAttributes;
    var $PermZipcode, $_PermZipcodeAttributes;
    var $EmpPicture, $_EmpPictureAttributes;
    var $PlaceOfBirth, $_PlaceOfBirthAttributes;
    var $Sex, $_SexAttributes;
    var $CivilStatus, $_CivilStatusAttributes;
    var $Height, $_HeightAttributes;
    var $Weight, $_WeightAttributes;
    var $BloodType, $_BloodTypeAttributes;
    var $GsisIdNo, $_GsisIdNoAttributes;
    var $GsisBPN, $_GsisBPNAttributes;
    var $PagIbigIDNo, $_PagIbigIDNoAttributes;
    var $PhilhealthNo, $_PhilhealthNoAttributes;
    var $SssNo, $_SssNoAttributes;
    var $Tin, $_TinAttributes;
    var $AgencyEmpNo, $_AgencyEmpNoAttributes;
    var $AgencyEmpNo1, $_AgencyEmpNo1Attributes;
    var $AgencyEmpNo2, $_AgencyEmpNo2Attributes;
    var $AgencyEmpNo3, $_AgencyEmpNo3Attributes;
    var $AgencyEmpNo4, $_AgencyEmpNo4Attributes;
    var $AgencyEmpNo5, $_AgencyEmpNo5Attributes;
    var $AgencyEmpNo6, $_AgencyEmpNo6Attributes;
    var $AgencyEmpNo7, $_AgencyEmpNo7Attributes;
    var $AgencyEmpNo8, $_AgencyEmpNo8Attributes;
    var $AgencyEmpNo9, $_AgencyEmpNo9Attributes;
    var $AgencyEmpNo10, $_AgencyEmpNo10Attributes;
    var $AgencyEmpNo11, $_AgencyEmpNo11Attributes;
    var $AgencyEmpNo12, $_AgencyEmpNo12Attributes;
    var $AgencyEmpNo13, $_AgencyEmpNo13Attributes;
    var $AgencyEmpNo15, $_AgencyEmpNo15Attributes;
    var $AgencyEmpNo16, $_AgencyEmpNo16Attributes;
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
        $this->EmployeeIDNo = $this->Parent->EmployeeIDNo->Value;
        $this->Surname = $this->Parent->Surname->Value;
        $this->FirstName = $this->Parent->FirstName->Value;
        $this->MiddleName = $this->Parent->MiddleName->Value;
        $this->BirthMonth = $this->Parent->BirthMonth->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->BirthDay = $this->Parent->BirthDay->Value;
        $this->BirthYear = $this->Parent->BirthYear->Value;
        $this->EmailAdd = $this->Parent->EmailAdd->Value;
        $this->MobileNo = $this->Parent->MobileNo->Value;
        $this->TelNo = $this->Parent->TelNo->Value;
        $this->ResHouseNo = $this->Parent->ResHouseNo->Value;
        $this->ResStreet = $this->Parent->ResStreet->Value;
        $this->ResSubVillage = $this->Parent->ResSubVillage->Value;
        $this->ResBrgy = $this->Parent->ResBrgy->Value;
        $this->ResMunicipality = $this->Parent->ResMunicipality->Value;
        $this->ResProvince = $this->Parent->ResProvince->Value;
        $this->ResZipcode = $this->Parent->ResZipcode->Value;
        $this->Citizenship = $this->Parent->Citizenship->Value;
        $this->PermHouseNo = $this->Parent->PermHouseNo->Value;
        $this->PermStreet = $this->Parent->PermStreet->Value;
        $this->PermSubVillage = $this->Parent->PermSubVillage->Value;
        $this->PermBrgy = $this->Parent->PermBrgy->Value;
        $this->PermMunicipality = $this->Parent->PermMunicipality->Value;
        $this->PermProvince = $this->Parent->PermProvince->Value;
        $this->PermZipcode = $this->Parent->PermZipcode->Value;
        $this->EmpPicture = $this->Parent->EmpPicture->Value;
        $this->PlaceOfBirth = $this->Parent->PlaceOfBirth->Value;
        $this->Sex = $this->Parent->Sex->Value;
        $this->CivilStatus = $this->Parent->CivilStatus->Value;
        $this->Height = $this->Parent->Height->Value;
        $this->Weight = $this->Parent->Weight->Value;
        $this->BloodType = $this->Parent->BloodType->Value;
        $this->GsisIdNo = $this->Parent->GsisIdNo->Value;
        $this->GsisBPN = $this->Parent->GsisBPN->Value;
        $this->PagIbigIDNo = $this->Parent->PagIbigIDNo->Value;
        $this->PhilhealthNo = $this->Parent->PhilhealthNo->Value;
        $this->SssNo = $this->Parent->SssNo->Value;
        $this->Tin = $this->Parent->Tin->Value;
        $this->AgencyEmpNo = $this->Parent->AgencyEmpNo->Value;
        $this->AgencyEmpNo1 = $this->Parent->AgencyEmpNo1->Value;
        $this->AgencyEmpNo2 = $this->Parent->AgencyEmpNo2->Value;
        $this->AgencyEmpNo3 = $this->Parent->AgencyEmpNo3->Value;
        $this->AgencyEmpNo4 = $this->Parent->AgencyEmpNo4->Value;
        $this->AgencyEmpNo5 = $this->Parent->AgencyEmpNo5->Value;
        $this->AgencyEmpNo6 = $this->Parent->AgencyEmpNo6->Value;
        $this->AgencyEmpNo7 = $this->Parent->AgencyEmpNo7->Value;
        $this->AgencyEmpNo8 = $this->Parent->AgencyEmpNo8->Value;
        $this->AgencyEmpNo9 = $this->Parent->AgencyEmpNo9->Value;
        $this->AgencyEmpNo10 = $this->Parent->AgencyEmpNo10->Value;
        $this->AgencyEmpNo11 = $this->Parent->AgencyEmpNo11->Value;
        $this->AgencyEmpNo12 = $this->Parent->AgencyEmpNo12->Value;
        $this->AgencyEmpNo13 = $this->Parent->AgencyEmpNo13->Value;
        $this->AgencyEmpNo15 = $this->Parent->AgencyEmpNo15->Value;
        $this->AgencyEmpNo16 = $this->Parent->AgencyEmpNo16->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_BirthMonthAttributes = $this->Parent->BirthMonth->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_BirthDayAttributes = $this->Parent->BirthDay->Attributes->GetAsArray();
        $this->_BirthYearAttributes = $this->Parent->BirthYear->Attributes->GetAsArray();
        $this->_EmailAddAttributes = $this->Parent->EmailAdd->Attributes->GetAsArray();
        $this->_MobileNoAttributes = $this->Parent->MobileNo->Attributes->GetAsArray();
        $this->_TelNoAttributes = $this->Parent->TelNo->Attributes->GetAsArray();
        $this->_ResHouseNoAttributes = $this->Parent->ResHouseNo->Attributes->GetAsArray();
        $this->_ResStreetAttributes = $this->Parent->ResStreet->Attributes->GetAsArray();
        $this->_ResSubVillageAttributes = $this->Parent->ResSubVillage->Attributes->GetAsArray();
        $this->_ResBrgyAttributes = $this->Parent->ResBrgy->Attributes->GetAsArray();
        $this->_ResMunicipalityAttributes = $this->Parent->ResMunicipality->Attributes->GetAsArray();
        $this->_ResProvinceAttributes = $this->Parent->ResProvince->Attributes->GetAsArray();
        $this->_ResZipcodeAttributes = $this->Parent->ResZipcode->Attributes->GetAsArray();
        $this->_CitizenshipAttributes = $this->Parent->Citizenship->Attributes->GetAsArray();
        $this->_PermHouseNoAttributes = $this->Parent->PermHouseNo->Attributes->GetAsArray();
        $this->_PermStreetAttributes = $this->Parent->PermStreet->Attributes->GetAsArray();
        $this->_PermSubVillageAttributes = $this->Parent->PermSubVillage->Attributes->GetAsArray();
        $this->_PermBrgyAttributes = $this->Parent->PermBrgy->Attributes->GetAsArray();
        $this->_PermMunicipalityAttributes = $this->Parent->PermMunicipality->Attributes->GetAsArray();
        $this->_PermProvinceAttributes = $this->Parent->PermProvince->Attributes->GetAsArray();
        $this->_PermZipcodeAttributes = $this->Parent->PermZipcode->Attributes->GetAsArray();
        $this->_EmpPictureAttributes = $this->Parent->EmpPicture->Attributes->GetAsArray();
        $this->_PlaceOfBirthAttributes = $this->Parent->PlaceOfBirth->Attributes->GetAsArray();
        $this->_SexAttributes = $this->Parent->Sex->Attributes->GetAsArray();
        $this->_CivilStatusAttributes = $this->Parent->CivilStatus->Attributes->GetAsArray();
        $this->_HeightAttributes = $this->Parent->Height->Attributes->GetAsArray();
        $this->_WeightAttributes = $this->Parent->Weight->Attributes->GetAsArray();
        $this->_BloodTypeAttributes = $this->Parent->BloodType->Attributes->GetAsArray();
        $this->_GsisIdNoAttributes = $this->Parent->GsisIdNo->Attributes->GetAsArray();
        $this->_GsisBPNAttributes = $this->Parent->GsisBPN->Attributes->GetAsArray();
        $this->_PagIbigIDNoAttributes = $this->Parent->PagIbigIDNo->Attributes->GetAsArray();
        $this->_PhilhealthNoAttributes = $this->Parent->PhilhealthNo->Attributes->GetAsArray();
        $this->_SssNoAttributes = $this->Parent->SssNo->Attributes->GetAsArray();
        $this->_TinAttributes = $this->Parent->Tin->Attributes->GetAsArray();
        $this->_AgencyEmpNoAttributes = $this->Parent->AgencyEmpNo->Attributes->GetAsArray();
        $this->_AgencyEmpNo1Attributes = $this->Parent->AgencyEmpNo1->Attributes->GetAsArray();
        $this->_AgencyEmpNo2Attributes = $this->Parent->AgencyEmpNo2->Attributes->GetAsArray();
        $this->_AgencyEmpNo3Attributes = $this->Parent->AgencyEmpNo3->Attributes->GetAsArray();
        $this->_AgencyEmpNo4Attributes = $this->Parent->AgencyEmpNo4->Attributes->GetAsArray();
        $this->_AgencyEmpNo5Attributes = $this->Parent->AgencyEmpNo5->Attributes->GetAsArray();
        $this->_AgencyEmpNo6Attributes = $this->Parent->AgencyEmpNo6->Attributes->GetAsArray();
        $this->_AgencyEmpNo7Attributes = $this->Parent->AgencyEmpNo7->Attributes->GetAsArray();
        $this->_AgencyEmpNo8Attributes = $this->Parent->AgencyEmpNo8->Attributes->GetAsArray();
        $this->_AgencyEmpNo9Attributes = $this->Parent->AgencyEmpNo9->Attributes->GetAsArray();
        $this->_AgencyEmpNo10Attributes = $this->Parent->AgencyEmpNo10->Attributes->GetAsArray();
        $this->_AgencyEmpNo11Attributes = $this->Parent->AgencyEmpNo11->Attributes->GetAsArray();
        $this->_AgencyEmpNo12Attributes = $this->Parent->AgencyEmpNo12->Attributes->GetAsArray();
        $this->_AgencyEmpNo13Attributes = $this->Parent->AgencyEmpNo13->Attributes->GetAsArray();
        $this->_AgencyEmpNo15Attributes = $this->Parent->AgencyEmpNo15->Attributes->GetAsArray();
        $this->_AgencyEmpNo16Attributes = $this->Parent->AgencyEmpNo16->Attributes->GetAsArray();
        $this->_Report_CurrentDateAttributes = $this->Parent->Report_CurrentDate->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $this->EmployeeIDNo = $Header->EmployeeIDNo;
        $Header->_EmployeeIDNoAttributes = $this->_EmployeeIDNoAttributes;
        $this->Parent->EmployeeIDNo->Value = $Header->EmployeeIDNo;
        $this->Parent->EmployeeIDNo->Attributes->RestoreFromArray($Header->_EmployeeIDNoAttributes);
        $this->Surname = $Header->Surname;
        $Header->_SurnameAttributes = $this->_SurnameAttributes;
        $this->Parent->Surname->Value = $Header->Surname;
        $this->Parent->Surname->Attributes->RestoreFromArray($Header->_SurnameAttributes);
        $this->FirstName = $Header->FirstName;
        $Header->_FirstNameAttributes = $this->_FirstNameAttributes;
        $this->Parent->FirstName->Value = $Header->FirstName;
        $this->Parent->FirstName->Attributes->RestoreFromArray($Header->_FirstNameAttributes);
        $this->MiddleName = $Header->MiddleName;
        $Header->_MiddleNameAttributes = $this->_MiddleNameAttributes;
        $this->Parent->MiddleName->Value = $Header->MiddleName;
        $this->Parent->MiddleName->Attributes->RestoreFromArray($Header->_MiddleNameAttributes);
        $this->BirthMonth = $Header->BirthMonth;
        $Header->_BirthMonthAttributes = $this->_BirthMonthAttributes;
        $this->Parent->BirthMonth->Value = $Header->BirthMonth;
        $this->Parent->BirthMonth->Attributes->RestoreFromArray($Header->_BirthMonthAttributes);
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
        $this->BirthDay = $Header->BirthDay;
        $Header->_BirthDayAttributes = $this->_BirthDayAttributes;
        $this->Parent->BirthDay->Value = $Header->BirthDay;
        $this->Parent->BirthDay->Attributes->RestoreFromArray($Header->_BirthDayAttributes);
        $this->BirthYear = $Header->BirthYear;
        $Header->_BirthYearAttributes = $this->_BirthYearAttributes;
        $this->Parent->BirthYear->Value = $Header->BirthYear;
        $this->Parent->BirthYear->Attributes->RestoreFromArray($Header->_BirthYearAttributes);
        $this->EmailAdd = $Header->EmailAdd;
        $Header->_EmailAddAttributes = $this->_EmailAddAttributes;
        $this->Parent->EmailAdd->Value = $Header->EmailAdd;
        $this->Parent->EmailAdd->Attributes->RestoreFromArray($Header->_EmailAddAttributes);
        $this->MobileNo = $Header->MobileNo;
        $Header->_MobileNoAttributes = $this->_MobileNoAttributes;
        $this->Parent->MobileNo->Value = $Header->MobileNo;
        $this->Parent->MobileNo->Attributes->RestoreFromArray($Header->_MobileNoAttributes);
        $this->TelNo = $Header->TelNo;
        $Header->_TelNoAttributes = $this->_TelNoAttributes;
        $this->Parent->TelNo->Value = $Header->TelNo;
        $this->Parent->TelNo->Attributes->RestoreFromArray($Header->_TelNoAttributes);
        $this->ResHouseNo = $Header->ResHouseNo;
        $Header->_ResHouseNoAttributes = $this->_ResHouseNoAttributes;
        $this->Parent->ResHouseNo->Value = $Header->ResHouseNo;
        $this->Parent->ResHouseNo->Attributes->RestoreFromArray($Header->_ResHouseNoAttributes);
        $this->ResStreet = $Header->ResStreet;
        $Header->_ResStreetAttributes = $this->_ResStreetAttributes;
        $this->Parent->ResStreet->Value = $Header->ResStreet;
        $this->Parent->ResStreet->Attributes->RestoreFromArray($Header->_ResStreetAttributes);
        $this->ResSubVillage = $Header->ResSubVillage;
        $Header->_ResSubVillageAttributes = $this->_ResSubVillageAttributes;
        $this->Parent->ResSubVillage->Value = $Header->ResSubVillage;
        $this->Parent->ResSubVillage->Attributes->RestoreFromArray($Header->_ResSubVillageAttributes);
        $this->ResBrgy = $Header->ResBrgy;
        $Header->_ResBrgyAttributes = $this->_ResBrgyAttributes;
        $this->Parent->ResBrgy->Value = $Header->ResBrgy;
        $this->Parent->ResBrgy->Attributes->RestoreFromArray($Header->_ResBrgyAttributes);
        $this->ResMunicipality = $Header->ResMunicipality;
        $Header->_ResMunicipalityAttributes = $this->_ResMunicipalityAttributes;
        $this->Parent->ResMunicipality->Value = $Header->ResMunicipality;
        $this->Parent->ResMunicipality->Attributes->RestoreFromArray($Header->_ResMunicipalityAttributes);
        $this->ResProvince = $Header->ResProvince;
        $Header->_ResProvinceAttributes = $this->_ResProvinceAttributes;
        $this->Parent->ResProvince->Value = $Header->ResProvince;
        $this->Parent->ResProvince->Attributes->RestoreFromArray($Header->_ResProvinceAttributes);
        $this->ResZipcode = $Header->ResZipcode;
        $Header->_ResZipcodeAttributes = $this->_ResZipcodeAttributes;
        $this->Parent->ResZipcode->Value = $Header->ResZipcode;
        $this->Parent->ResZipcode->Attributes->RestoreFromArray($Header->_ResZipcodeAttributes);
        $this->Citizenship = $Header->Citizenship;
        $Header->_CitizenshipAttributes = $this->_CitizenshipAttributes;
        $this->Parent->Citizenship->Value = $Header->Citizenship;
        $this->Parent->Citizenship->Attributes->RestoreFromArray($Header->_CitizenshipAttributes);
        $this->PermHouseNo = $Header->PermHouseNo;
        $Header->_PermHouseNoAttributes = $this->_PermHouseNoAttributes;
        $this->Parent->PermHouseNo->Value = $Header->PermHouseNo;
        $this->Parent->PermHouseNo->Attributes->RestoreFromArray($Header->_PermHouseNoAttributes);
        $this->PermStreet = $Header->PermStreet;
        $Header->_PermStreetAttributes = $this->_PermStreetAttributes;
        $this->Parent->PermStreet->Value = $Header->PermStreet;
        $this->Parent->PermStreet->Attributes->RestoreFromArray($Header->_PermStreetAttributes);
        $this->PermSubVillage = $Header->PermSubVillage;
        $Header->_PermSubVillageAttributes = $this->_PermSubVillageAttributes;
        $this->Parent->PermSubVillage->Value = $Header->PermSubVillage;
        $this->Parent->PermSubVillage->Attributes->RestoreFromArray($Header->_PermSubVillageAttributes);
        $this->PermBrgy = $Header->PermBrgy;
        $Header->_PermBrgyAttributes = $this->_PermBrgyAttributes;
        $this->Parent->PermBrgy->Value = $Header->PermBrgy;
        $this->Parent->PermBrgy->Attributes->RestoreFromArray($Header->_PermBrgyAttributes);
        $this->PermMunicipality = $Header->PermMunicipality;
        $Header->_PermMunicipalityAttributes = $this->_PermMunicipalityAttributes;
        $this->Parent->PermMunicipality->Value = $Header->PermMunicipality;
        $this->Parent->PermMunicipality->Attributes->RestoreFromArray($Header->_PermMunicipalityAttributes);
        $this->PermProvince = $Header->PermProvince;
        $Header->_PermProvinceAttributes = $this->_PermProvinceAttributes;
        $this->Parent->PermProvince->Value = $Header->PermProvince;
        $this->Parent->PermProvince->Attributes->RestoreFromArray($Header->_PermProvinceAttributes);
        $this->PermZipcode = $Header->PermZipcode;
        $Header->_PermZipcodeAttributes = $this->_PermZipcodeAttributes;
        $this->Parent->PermZipcode->Value = $Header->PermZipcode;
        $this->Parent->PermZipcode->Attributes->RestoreFromArray($Header->_PermZipcodeAttributes);
        $this->EmpPicture = $Header->EmpPicture;
        $Header->_EmpPictureAttributes = $this->_EmpPictureAttributes;
        $this->Parent->EmpPicture->Value = $Header->EmpPicture;
        $this->Parent->EmpPicture->Attributes->RestoreFromArray($Header->_EmpPictureAttributes);
        $this->PlaceOfBirth = $Header->PlaceOfBirth;
        $Header->_PlaceOfBirthAttributes = $this->_PlaceOfBirthAttributes;
        $this->Parent->PlaceOfBirth->Value = $Header->PlaceOfBirth;
        $this->Parent->PlaceOfBirth->Attributes->RestoreFromArray($Header->_PlaceOfBirthAttributes);
        $this->Sex = $Header->Sex;
        $Header->_SexAttributes = $this->_SexAttributes;
        $this->Parent->Sex->Value = $Header->Sex;
        $this->Parent->Sex->Attributes->RestoreFromArray($Header->_SexAttributes);
        $this->CivilStatus = $Header->CivilStatus;
        $Header->_CivilStatusAttributes = $this->_CivilStatusAttributes;
        $this->Parent->CivilStatus->Value = $Header->CivilStatus;
        $this->Parent->CivilStatus->Attributes->RestoreFromArray($Header->_CivilStatusAttributes);
        $this->Height = $Header->Height;
        $Header->_HeightAttributes = $this->_HeightAttributes;
        $this->Parent->Height->Value = $Header->Height;
        $this->Parent->Height->Attributes->RestoreFromArray($Header->_HeightAttributes);
        $this->Weight = $Header->Weight;
        $Header->_WeightAttributes = $this->_WeightAttributes;
        $this->Parent->Weight->Value = $Header->Weight;
        $this->Parent->Weight->Attributes->RestoreFromArray($Header->_WeightAttributes);
        $this->BloodType = $Header->BloodType;
        $Header->_BloodTypeAttributes = $this->_BloodTypeAttributes;
        $this->Parent->BloodType->Value = $Header->BloodType;
        $this->Parent->BloodType->Attributes->RestoreFromArray($Header->_BloodTypeAttributes);
        $this->GsisIdNo = $Header->GsisIdNo;
        $Header->_GsisIdNoAttributes = $this->_GsisIdNoAttributes;
        $this->Parent->GsisIdNo->Value = $Header->GsisIdNo;
        $this->Parent->GsisIdNo->Attributes->RestoreFromArray($Header->_GsisIdNoAttributes);
        $this->GsisBPN = $Header->GsisBPN;
        $Header->_GsisBPNAttributes = $this->_GsisBPNAttributes;
        $this->Parent->GsisBPN->Value = $Header->GsisBPN;
        $this->Parent->GsisBPN->Attributes->RestoreFromArray($Header->_GsisBPNAttributes);
        $this->PagIbigIDNo = $Header->PagIbigIDNo;
        $Header->_PagIbigIDNoAttributes = $this->_PagIbigIDNoAttributes;
        $this->Parent->PagIbigIDNo->Value = $Header->PagIbigIDNo;
        $this->Parent->PagIbigIDNo->Attributes->RestoreFromArray($Header->_PagIbigIDNoAttributes);
        $this->PhilhealthNo = $Header->PhilhealthNo;
        $Header->_PhilhealthNoAttributes = $this->_PhilhealthNoAttributes;
        $this->Parent->PhilhealthNo->Value = $Header->PhilhealthNo;
        $this->Parent->PhilhealthNo->Attributes->RestoreFromArray($Header->_PhilhealthNoAttributes);
        $this->SssNo = $Header->SssNo;
        $Header->_SssNoAttributes = $this->_SssNoAttributes;
        $this->Parent->SssNo->Value = $Header->SssNo;
        $this->Parent->SssNo->Attributes->RestoreFromArray($Header->_SssNoAttributes);
        $this->Tin = $Header->Tin;
        $Header->_TinAttributes = $this->_TinAttributes;
        $this->Parent->Tin->Value = $Header->Tin;
        $this->Parent->Tin->Attributes->RestoreFromArray($Header->_TinAttributes);
        $this->AgencyEmpNo = $Header->AgencyEmpNo;
        $Header->_AgencyEmpNoAttributes = $this->_AgencyEmpNoAttributes;
        $this->Parent->AgencyEmpNo->Value = $Header->AgencyEmpNo;
        $this->Parent->AgencyEmpNo->Attributes->RestoreFromArray($Header->_AgencyEmpNoAttributes);
        $this->AgencyEmpNo1 = $Header->AgencyEmpNo1;
        $Header->_AgencyEmpNo1Attributes = $this->_AgencyEmpNo1Attributes;
        $this->Parent->AgencyEmpNo1->Value = $Header->AgencyEmpNo1;
        $this->Parent->AgencyEmpNo1->Attributes->RestoreFromArray($Header->_AgencyEmpNo1Attributes);
        $this->AgencyEmpNo2 = $Header->AgencyEmpNo2;
        $Header->_AgencyEmpNo2Attributes = $this->_AgencyEmpNo2Attributes;
        $this->Parent->AgencyEmpNo2->Value = $Header->AgencyEmpNo2;
        $this->Parent->AgencyEmpNo2->Attributes->RestoreFromArray($Header->_AgencyEmpNo2Attributes);
        $this->AgencyEmpNo3 = $Header->AgencyEmpNo3;
        $Header->_AgencyEmpNo3Attributes = $this->_AgencyEmpNo3Attributes;
        $this->Parent->AgencyEmpNo3->Value = $Header->AgencyEmpNo3;
        $this->Parent->AgencyEmpNo3->Attributes->RestoreFromArray($Header->_AgencyEmpNo3Attributes);
        $this->AgencyEmpNo4 = $Header->AgencyEmpNo4;
        $Header->_AgencyEmpNo4Attributes = $this->_AgencyEmpNo4Attributes;
        $this->Parent->AgencyEmpNo4->Value = $Header->AgencyEmpNo4;
        $this->Parent->AgencyEmpNo4->Attributes->RestoreFromArray($Header->_AgencyEmpNo4Attributes);
        $this->AgencyEmpNo5 = $Header->AgencyEmpNo5;
        $Header->_AgencyEmpNo5Attributes = $this->_AgencyEmpNo5Attributes;
        $this->Parent->AgencyEmpNo5->Value = $Header->AgencyEmpNo5;
        $this->Parent->AgencyEmpNo5->Attributes->RestoreFromArray($Header->_AgencyEmpNo5Attributes);
        $this->AgencyEmpNo6 = $Header->AgencyEmpNo6;
        $Header->_AgencyEmpNo6Attributes = $this->_AgencyEmpNo6Attributes;
        $this->Parent->AgencyEmpNo6->Value = $Header->AgencyEmpNo6;
        $this->Parent->AgencyEmpNo6->Attributes->RestoreFromArray($Header->_AgencyEmpNo6Attributes);
        $this->AgencyEmpNo7 = $Header->AgencyEmpNo7;
        $Header->_AgencyEmpNo7Attributes = $this->_AgencyEmpNo7Attributes;
        $this->Parent->AgencyEmpNo7->Value = $Header->AgencyEmpNo7;
        $this->Parent->AgencyEmpNo7->Attributes->RestoreFromArray($Header->_AgencyEmpNo7Attributes);
        $this->AgencyEmpNo8 = $Header->AgencyEmpNo8;
        $Header->_AgencyEmpNo8Attributes = $this->_AgencyEmpNo8Attributes;
        $this->Parent->AgencyEmpNo8->Value = $Header->AgencyEmpNo8;
        $this->Parent->AgencyEmpNo8->Attributes->RestoreFromArray($Header->_AgencyEmpNo8Attributes);
        $this->AgencyEmpNo9 = $Header->AgencyEmpNo9;
        $Header->_AgencyEmpNo9Attributes = $this->_AgencyEmpNo9Attributes;
        $this->Parent->AgencyEmpNo9->Value = $Header->AgencyEmpNo9;
        $this->Parent->AgencyEmpNo9->Attributes->RestoreFromArray($Header->_AgencyEmpNo9Attributes);
        $this->AgencyEmpNo10 = $Header->AgencyEmpNo10;
        $Header->_AgencyEmpNo10Attributes = $this->_AgencyEmpNo10Attributes;
        $this->Parent->AgencyEmpNo10->Value = $Header->AgencyEmpNo10;
        $this->Parent->AgencyEmpNo10->Attributes->RestoreFromArray($Header->_AgencyEmpNo10Attributes);
        $this->AgencyEmpNo11 = $Header->AgencyEmpNo11;
        $Header->_AgencyEmpNo11Attributes = $this->_AgencyEmpNo11Attributes;
        $this->Parent->AgencyEmpNo11->Value = $Header->AgencyEmpNo11;
        $this->Parent->AgencyEmpNo11->Attributes->RestoreFromArray($Header->_AgencyEmpNo11Attributes);
        $this->AgencyEmpNo12 = $Header->AgencyEmpNo12;
        $Header->_AgencyEmpNo12Attributes = $this->_AgencyEmpNo12Attributes;
        $this->Parent->AgencyEmpNo12->Value = $Header->AgencyEmpNo12;
        $this->Parent->AgencyEmpNo12->Attributes->RestoreFromArray($Header->_AgencyEmpNo12Attributes);
        $this->AgencyEmpNo13 = $Header->AgencyEmpNo13;
        $Header->_AgencyEmpNo13Attributes = $this->_AgencyEmpNo13Attributes;
        $this->Parent->AgencyEmpNo13->Value = $Header->AgencyEmpNo13;
        $this->Parent->AgencyEmpNo13->Attributes->RestoreFromArray($Header->_AgencyEmpNo13Attributes);
        $this->AgencyEmpNo15 = $Header->AgencyEmpNo15;
        $Header->_AgencyEmpNo15Attributes = $this->_AgencyEmpNo15Attributes;
        $this->Parent->AgencyEmpNo15->Value = $Header->AgencyEmpNo15;
        $this->Parent->AgencyEmpNo15->Attributes->RestoreFromArray($Header->_AgencyEmpNo15Attributes);
        $this->AgencyEmpNo16 = $Header->AgencyEmpNo16;
        $Header->_AgencyEmpNo16Attributes = $this->_AgencyEmpNo16Attributes;
        $this->Parent->AgencyEmpNo16->Value = $Header->AgencyEmpNo16;
        $this->Parent->AgencyEmpNo16->Attributes->RestoreFromArray($Header->_AgencyEmpNo16Attributes);
    }
    function ChangeTotalControls() {
    }
}
//End employee ReportGroup class

//employee GroupsCollection class @2-9A7B0CFE
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
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->BirthMonth->Value = $this->Parent->BirthMonth->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->BirthDay->Value = $this->Parent->BirthDay->initialValue;
        $this->Parent->BirthYear->Value = $this->Parent->BirthYear->initialValue;
        $this->Parent->EmailAdd->Value = $this->Parent->EmailAdd->initialValue;
        $this->Parent->MobileNo->Value = $this->Parent->MobileNo->initialValue;
        $this->Parent->TelNo->Value = $this->Parent->TelNo->initialValue;
        $this->Parent->ResHouseNo->Value = $this->Parent->ResHouseNo->initialValue;
        $this->Parent->ResStreet->Value = $this->Parent->ResStreet->initialValue;
        $this->Parent->ResSubVillage->Value = $this->Parent->ResSubVillage->initialValue;
        $this->Parent->ResBrgy->Value = $this->Parent->ResBrgy->initialValue;
        $this->Parent->ResMunicipality->Value = $this->Parent->ResMunicipality->initialValue;
        $this->Parent->ResProvince->Value = $this->Parent->ResProvince->initialValue;
        $this->Parent->ResZipcode->Value = $this->Parent->ResZipcode->initialValue;
        $this->Parent->Citizenship->Value = $this->Parent->Citizenship->initialValue;
        $this->Parent->PermHouseNo->Value = $this->Parent->PermHouseNo->initialValue;
        $this->Parent->PermStreet->Value = $this->Parent->PermStreet->initialValue;
        $this->Parent->PermSubVillage->Value = $this->Parent->PermSubVillage->initialValue;
        $this->Parent->PermBrgy->Value = $this->Parent->PermBrgy->initialValue;
        $this->Parent->PermMunicipality->Value = $this->Parent->PermMunicipality->initialValue;
        $this->Parent->PermProvince->Value = $this->Parent->PermProvince->initialValue;
        $this->Parent->PermZipcode->Value = $this->Parent->PermZipcode->initialValue;
        $this->Parent->EmpPicture->Value = $this->Parent->EmpPicture->initialValue;
        $this->Parent->PlaceOfBirth->Value = $this->Parent->PlaceOfBirth->initialValue;
        $this->Parent->Sex->Value = $this->Parent->Sex->initialValue;
        $this->Parent->CivilStatus->Value = $this->Parent->CivilStatus->initialValue;
        $this->Parent->Height->Value = $this->Parent->Height->initialValue;
        $this->Parent->Weight->Value = $this->Parent->Weight->initialValue;
        $this->Parent->BloodType->Value = $this->Parent->BloodType->initialValue;
        $this->Parent->GsisIdNo->Value = $this->Parent->GsisIdNo->initialValue;
        $this->Parent->GsisBPN->Value = $this->Parent->GsisBPN->initialValue;
        $this->Parent->PagIbigIDNo->Value = $this->Parent->PagIbigIDNo->initialValue;
        $this->Parent->PhilhealthNo->Value = $this->Parent->PhilhealthNo->initialValue;
        $this->Parent->SssNo->Value = $this->Parent->SssNo->initialValue;
        $this->Parent->Tin->Value = $this->Parent->Tin->initialValue;
        $this->Parent->AgencyEmpNo->Value = $this->Parent->AgencyEmpNo->initialValue;
        $this->Parent->AgencyEmpNo1->Value = $this->Parent->AgencyEmpNo1->initialValue;
        $this->Parent->AgencyEmpNo2->Value = $this->Parent->AgencyEmpNo2->initialValue;
        $this->Parent->AgencyEmpNo3->Value = $this->Parent->AgencyEmpNo3->initialValue;
        $this->Parent->AgencyEmpNo4->Value = $this->Parent->AgencyEmpNo4->initialValue;
        $this->Parent->AgencyEmpNo5->Value = $this->Parent->AgencyEmpNo5->initialValue;
        $this->Parent->AgencyEmpNo6->Value = $this->Parent->AgencyEmpNo6->initialValue;
        $this->Parent->AgencyEmpNo7->Value = $this->Parent->AgencyEmpNo7->initialValue;
        $this->Parent->AgencyEmpNo8->Value = $this->Parent->AgencyEmpNo8->initialValue;
        $this->Parent->AgencyEmpNo9->Value = $this->Parent->AgencyEmpNo9->initialValue;
        $this->Parent->AgencyEmpNo10->Value = $this->Parent->AgencyEmpNo10->initialValue;
        $this->Parent->AgencyEmpNo11->Value = $this->Parent->AgencyEmpNo11->initialValue;
        $this->Parent->AgencyEmpNo12->Value = $this->Parent->AgencyEmpNo12->initialValue;
        $this->Parent->AgencyEmpNo13->Value = $this->Parent->AgencyEmpNo13->initialValue;
        $this->Parent->AgencyEmpNo15->Value = $this->Parent->AgencyEmpNo15->initialValue;
        $this->Parent->AgencyEmpNo16->Value = $this->Parent->AgencyEmpNo16->initialValue;
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

//Class_Initialize Event @2-E93DD2C3
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
        $this->Detail->Height = 41;
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
                $this->PageSize = 100;
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

        $this->EmployeeIDNo = & new clsControl(ccsReportLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", "", $this);
        $this->EmployeeIDNo->HTML = true;
        $this->EmployeeIDNo->EmptyText = "&nbsp;";
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->Surname->HTML = true;
        $this->Surname->EmptyText = "&nbsp;";
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->FirstName->HTML = true;
        $this->FirstName->EmptyText = "&nbsp;";
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->MiddleName->HTML = true;
        $this->MiddleName->EmptyText = "&nbsp;";
        $this->BirthMonth = & new clsControl(ccsReportLabel, "BirthMonth", "BirthMonth", ccsText, "", "", $this);
        $this->BirthMonth->HTML = true;
        $this->BirthMonth->EmptyText = "&nbsp;";
        $this->NameExtension = & new clsControl(ccsReportLabel, "NameExtension", "NameExtension", ccsText, "", "", $this);
        $this->NameExtension->HTML = true;
        $this->NameExtension->EmptyText = "&nbsp;";
        $this->BirthDay = & new clsControl(ccsReportLabel, "BirthDay", "BirthDay", ccsText, "", "", $this);
        $this->BirthDay->HTML = true;
        $this->BirthDay->EmptyText = "&nbsp;";
        $this->BirthYear = & new clsControl(ccsReportLabel, "BirthYear", "BirthYear", ccsText, "", "", $this);
        $this->BirthYear->HTML = true;
        $this->BirthYear->EmptyText = "&nbsp;";
        $this->EmailAdd = & new clsControl(ccsReportLabel, "EmailAdd", "EmailAdd", ccsText, "", "", $this);
        $this->EmailAdd->HTML = true;
        $this->EmailAdd->EmptyText = "&nbsp;";
        $this->MobileNo = & new clsControl(ccsReportLabel, "MobileNo", "MobileNo", ccsText, "", "", $this);
        $this->MobileNo->HTML = true;
        $this->MobileNo->EmptyText = "&nbsp;";
        $this->TelNo = & new clsControl(ccsReportLabel, "TelNo", "TelNo", ccsText, "", "", $this);
        $this->TelNo->HTML = true;
        $this->TelNo->EmptyText = "&nbsp;";
        $this->ResHouseNo = & new clsControl(ccsReportLabel, "ResHouseNo", "ResHouseNo", ccsText, "", "", $this);
        $this->ResHouseNo->HTML = true;
        $this->ResHouseNo->EmptyText = "&nbsp;";
        $this->ResStreet = & new clsControl(ccsReportLabel, "ResStreet", "ResStreet", ccsText, "", "", $this);
        $this->ResStreet->HTML = true;
        $this->ResStreet->EmptyText = "&nbsp;";
        $this->ResSubVillage = & new clsControl(ccsReportLabel, "ResSubVillage", "ResSubVillage", ccsText, "", "", $this);
        $this->ResSubVillage->HTML = true;
        $this->ResSubVillage->EmptyText = "&nbsp;";
        $this->ResBrgy = & new clsControl(ccsReportLabel, "ResBrgy", "ResBrgy", ccsText, "", "", $this);
        $this->ResBrgy->HTML = true;
        $this->ResBrgy->EmptyText = "&nbsp;";
        $this->ResMunicipality = & new clsControl(ccsReportLabel, "ResMunicipality", "ResMunicipality", ccsText, "", "", $this);
        $this->ResMunicipality->HTML = true;
        $this->ResMunicipality->EmptyText = "&nbsp;";
        $this->ResProvince = & new clsControl(ccsReportLabel, "ResProvince", "ResProvince", ccsText, "", "", $this);
        $this->ResProvince->HTML = true;
        $this->ResProvince->EmptyText = "&nbsp;";
        $this->ResZipcode = & new clsControl(ccsReportLabel, "ResZipcode", "ResZipcode", ccsText, "", "", $this);
        $this->ResZipcode->HTML = true;
        $this->ResZipcode->EmptyText = "&nbsp;";
        $this->Citizenship = & new clsControl(ccsReportLabel, "Citizenship", "Citizenship", ccsText, "", "", $this);
        $this->Citizenship->HTML = true;
        $this->Citizenship->EmptyText = "&nbsp;";
        $this->PermHouseNo = & new clsControl(ccsReportLabel, "PermHouseNo", "PermHouseNo", ccsText, "", "", $this);
        $this->PermHouseNo->HTML = true;
        $this->PermHouseNo->EmptyText = "&nbsp;";
        $this->PermStreet = & new clsControl(ccsReportLabel, "PermStreet", "PermStreet", ccsText, "", "", $this);
        $this->PermStreet->HTML = true;
        $this->PermStreet->EmptyText = "&nbsp;";
        $this->PermSubVillage = & new clsControl(ccsReportLabel, "PermSubVillage", "PermSubVillage", ccsText, "", "", $this);
        $this->PermSubVillage->HTML = true;
        $this->PermSubVillage->EmptyText = "&nbsp;";
        $this->PermBrgy = & new clsControl(ccsReportLabel, "PermBrgy", "PermBrgy", ccsText, "", "", $this);
        $this->PermBrgy->HTML = true;
        $this->PermBrgy->EmptyText = "&nbsp;";
        $this->PermMunicipality = & new clsControl(ccsReportLabel, "PermMunicipality", "PermMunicipality", ccsText, "", "", $this);
        $this->PermMunicipality->HTML = true;
        $this->PermMunicipality->EmptyText = "&nbsp;";
        $this->PermProvince = & new clsControl(ccsReportLabel, "PermProvince", "PermProvince", ccsText, "", "", $this);
        $this->PermProvince->HTML = true;
        $this->PermProvince->EmptyText = "&nbsp;";
        $this->PermZipcode = & new clsControl(ccsReportLabel, "PermZipcode", "PermZipcode", ccsText, "", "", $this);
        $this->PermZipcode->HTML = true;
        $this->PermZipcode->EmptyText = "&nbsp;";
        $this->EmpPicture = & new clsControl(ccsImage, "EmpPicture", "EmpPicture", ccsText, "", CCGetRequestParam("EmpPicture", ccsGet, NULL), $this);
        $this->EmpPicture->HTML = true;
        $this->PlaceOfBirth = & new clsControl(ccsReportLabel, "PlaceOfBirth", "PlaceOfBirth", ccsText, "", "", $this);
        $this->PlaceOfBirth->HTML = true;
        $this->PlaceOfBirth->EmptyText = "&nbsp;";
        $this->Sex = & new clsControl(ccsReportLabel, "Sex", "Sex", ccsText, "", "", $this);
        $this->Sex->HTML = true;
        $this->Sex->EmptyText = "&nbsp;";
        $this->CivilStatus = & new clsControl(ccsReportLabel, "CivilStatus", "CivilStatus", ccsText, "", "", $this);
        $this->CivilStatus->HTML = true;
        $this->CivilStatus->EmptyText = "&nbsp;";
        $this->Height = & new clsControl(ccsReportLabel, "Height", "Height", ccsText, "", "", $this);
        $this->Height->HTML = true;
        $this->Height->EmptyText = "&nbsp;";
        $this->Weight = & new clsControl(ccsReportLabel, "Weight", "Weight", ccsText, "", "", $this);
        $this->Weight->HTML = true;
        $this->Weight->EmptyText = "&nbsp;";
        $this->BloodType = & new clsControl(ccsReportLabel, "BloodType", "BloodType", ccsText, "", "", $this);
        $this->BloodType->HTML = true;
        $this->BloodType->EmptyText = "&nbsp;";
        $this->GsisIdNo = & new clsControl(ccsReportLabel, "GsisIdNo", "GsisIdNo", ccsText, "", "", $this);
        $this->GsisIdNo->HTML = true;
        $this->GsisIdNo->EmptyText = "&nbsp;";
        $this->GsisBPN = & new clsControl(ccsReportLabel, "GsisBPN", "GsisBPN", ccsText, "", "", $this);
        $this->GsisBPN->HTML = true;
        $this->GsisBPN->EmptyText = "&nbsp;";
        $this->PagIbigIDNo = & new clsControl(ccsReportLabel, "PagIbigIDNo", "PagIbigIDNo", ccsText, "", "", $this);
        $this->PagIbigIDNo->HTML = true;
        $this->PagIbigIDNo->EmptyText = "&nbsp;";
        $this->PhilhealthNo = & new clsControl(ccsReportLabel, "PhilhealthNo", "PhilhealthNo", ccsText, "", "", $this);
        $this->PhilhealthNo->HTML = true;
        $this->PhilhealthNo->EmptyText = "&nbsp;";
        $this->SssNo = & new clsControl(ccsReportLabel, "SssNo", "SssNo", ccsText, "", "", $this);
        $this->SssNo->HTML = true;
        $this->SssNo->EmptyText = "&nbsp;";
        $this->Tin = & new clsControl(ccsReportLabel, "Tin", "Tin", ccsText, "", "", $this);
        $this->Tin->HTML = true;
        $this->Tin->EmptyText = "&nbsp;";
        $this->AgencyEmpNo = & new clsControl(ccsReportLabel, "AgencyEmpNo", "AgencyEmpNo", ccsText, "", "", $this);
        $this->AgencyEmpNo->HTML = true;
        $this->AgencyEmpNo->EmptyText = "&nbsp;";
        $this->AgencyEmpNo1 = & new clsControl(ccsReportLabel, "AgencyEmpNo1", "AgencyEmpNo1", ccsText, "", "", $this);
        $this->AgencyEmpNo1->HTML = true;
        $this->AgencyEmpNo1->EmptyText = "&nbsp;";
        $this->AgencyEmpNo2 = & new clsControl(ccsReportLabel, "AgencyEmpNo2", "AgencyEmpNo2", ccsText, "", "", $this);
        $this->AgencyEmpNo2->HTML = true;
        $this->AgencyEmpNo2->EmptyText = "&nbsp;";
        $this->AgencyEmpNo3 = & new clsControl(ccsReportLabel, "AgencyEmpNo3", "AgencyEmpNo3", ccsText, "", "", $this);
        $this->AgencyEmpNo3->HTML = true;
        $this->AgencyEmpNo3->EmptyText = "&nbsp;";
        $this->AgencyEmpNo4 = & new clsControl(ccsReportLabel, "AgencyEmpNo4", "AgencyEmpNo4", ccsText, "", "", $this);
        $this->AgencyEmpNo4->HTML = true;
        $this->AgencyEmpNo4->EmptyText = "&nbsp;";
        $this->AgencyEmpNo5 = & new clsControl(ccsReportLabel, "AgencyEmpNo5", "AgencyEmpNo5", ccsText, "", "", $this);
        $this->AgencyEmpNo5->HTML = true;
        $this->AgencyEmpNo5->EmptyText = "&nbsp;";
        $this->AgencyEmpNo6 = & new clsControl(ccsReportLabel, "AgencyEmpNo6", "AgencyEmpNo6", ccsText, "", "", $this);
        $this->AgencyEmpNo6->HTML = true;
        $this->AgencyEmpNo6->EmptyText = "&nbsp;";
        $this->AgencyEmpNo7 = & new clsControl(ccsReportLabel, "AgencyEmpNo7", "AgencyEmpNo7", ccsText, "", "", $this);
        $this->AgencyEmpNo7->HTML = true;
        $this->AgencyEmpNo7->EmptyText = "&nbsp;";
        $this->AgencyEmpNo8 = & new clsControl(ccsReportLabel, "AgencyEmpNo8", "AgencyEmpNo8", ccsText, "", "", $this);
        $this->AgencyEmpNo8->HTML = true;
        $this->AgencyEmpNo8->EmptyText = "&nbsp;";
        $this->AgencyEmpNo9 = & new clsControl(ccsReportLabel, "AgencyEmpNo9", "AgencyEmpNo9", ccsText, "", "", $this);
        $this->AgencyEmpNo9->HTML = true;
        $this->AgencyEmpNo9->EmptyText = "&nbsp;";
        $this->AgencyEmpNo10 = & new clsControl(ccsReportLabel, "AgencyEmpNo10", "AgencyEmpNo10", ccsText, "", "", $this);
        $this->AgencyEmpNo10->HTML = true;
        $this->AgencyEmpNo10->EmptyText = "&nbsp;";
        $this->AgencyEmpNo11 = & new clsControl(ccsReportLabel, "AgencyEmpNo11", "AgencyEmpNo11", ccsText, "", "", $this);
        $this->AgencyEmpNo11->HTML = true;
        $this->AgencyEmpNo11->EmptyText = "&nbsp;";
        $this->AgencyEmpNo12 = & new clsControl(ccsReportLabel, "AgencyEmpNo12", "AgencyEmpNo12", ccsText, "", "", $this);
        $this->AgencyEmpNo12->HTML = true;
        $this->AgencyEmpNo12->EmptyText = "&nbsp;";
        $this->AgencyEmpNo13 = & new clsControl(ccsReportLabel, "AgencyEmpNo13", "AgencyEmpNo13", ccsText, "", "", $this);
        $this->AgencyEmpNo13->HTML = true;
        $this->AgencyEmpNo13->EmptyText = "&nbsp;";
        $this->AgencyEmpNo15 = & new clsControl(ccsReportLabel, "AgencyEmpNo15", "AgencyEmpNo15", ccsText, "", "", $this);
        $this->AgencyEmpNo15->HTML = true;
        $this->AgencyEmpNo15->EmptyText = "&nbsp;";
        $this->AgencyEmpNo16 = & new clsControl(ccsReportLabel, "AgencyEmpNo16", "AgencyEmpNo16", ccsText, "", "", $this);
        $this->AgencyEmpNo16->HTML = true;
        $this->AgencyEmpNo16->EmptyText = "&nbsp;";
        $this->Report_CurrentDate = & new clsControl(ccsReportLabel, "Report_CurrentDate", "Report_CurrentDate", ccsText, array('ShortDate'), "", $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->PageBreak = & new clsPanel("PageBreak", $this);
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

//CheckErrors Method @2-345AB773
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->BirthMonth->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->BirthDay->Errors->Count());
        $errors = ($errors || $this->BirthYear->Errors->Count());
        $errors = ($errors || $this->EmailAdd->Errors->Count());
        $errors = ($errors || $this->MobileNo->Errors->Count());
        $errors = ($errors || $this->TelNo->Errors->Count());
        $errors = ($errors || $this->ResHouseNo->Errors->Count());
        $errors = ($errors || $this->ResStreet->Errors->Count());
        $errors = ($errors || $this->ResSubVillage->Errors->Count());
        $errors = ($errors || $this->ResBrgy->Errors->Count());
        $errors = ($errors || $this->ResMunicipality->Errors->Count());
        $errors = ($errors || $this->ResProvince->Errors->Count());
        $errors = ($errors || $this->ResZipcode->Errors->Count());
        $errors = ($errors || $this->Citizenship->Errors->Count());
        $errors = ($errors || $this->PermHouseNo->Errors->Count());
        $errors = ($errors || $this->PermStreet->Errors->Count());
        $errors = ($errors || $this->PermSubVillage->Errors->Count());
        $errors = ($errors || $this->PermBrgy->Errors->Count());
        $errors = ($errors || $this->PermMunicipality->Errors->Count());
        $errors = ($errors || $this->PermProvince->Errors->Count());
        $errors = ($errors || $this->PermZipcode->Errors->Count());
        $errors = ($errors || $this->EmpPicture->Errors->Count());
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
        $errors = ($errors || $this->AgencyEmpNo1->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo2->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo3->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo4->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo5->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo6->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo7->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo8->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo9->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo10->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo11->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo12->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo13->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo15->Errors->Count());
        $errors = ($errors || $this->AgencyEmpNo16->Errors->Count());
        $errors = ($errors || $this->Report_CurrentDate->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-D85A22E8
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthYear->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmailAdd->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobileNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TelNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResHouseNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResStreet->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResSubVillage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResBrgy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResMunicipality->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResProvince->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResZipcode->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Citizenship->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermHouseNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermStreet->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermSubVillage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermBrgy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermMunicipality->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermProvince->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermZipcode->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmpPicture->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PlaceOfBirth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Sex->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CivilStatus->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Height->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Weight->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BloodType->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GsisIdNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->GsisBPN->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PagIbigIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PhilhealthNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SssNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Tin->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo1->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo3->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo4->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo5->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo6->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo7->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo8->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo9->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo10->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo11->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo12->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo13->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo15->Errors->ToString());
        $errors = ComposeStrings($errors, $this->AgencyEmpNo16->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentDate->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-58260562
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
            $this->EmployeeIDNo->SetValue($this->DataSource->EmployeeIDNo->GetValue());
            $this->Surname->SetValue($this->DataSource->Surname->GetValue());
            $this->FirstName->SetValue($this->DataSource->FirstName->GetValue());
            $this->MiddleName->SetValue($this->DataSource->MiddleName->GetValue());
            $this->BirthMonth->SetValue($this->DataSource->BirthMonth->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->BirthDay->SetValue($this->DataSource->BirthDay->GetValue());
            $this->BirthYear->SetValue($this->DataSource->BirthYear->GetValue());
            $this->EmailAdd->SetValue($this->DataSource->EmailAdd->GetValue());
            $this->MobileNo->SetValue($this->DataSource->MobileNo->GetValue());
            $this->TelNo->SetValue($this->DataSource->TelNo->GetValue());
            $this->ResHouseNo->SetValue($this->DataSource->ResHouseNo->GetValue());
            $this->ResStreet->SetValue($this->DataSource->ResStreet->GetValue());
            $this->ResSubVillage->SetValue($this->DataSource->ResSubVillage->GetValue());
            $this->ResBrgy->SetValue($this->DataSource->ResBrgy->GetValue());
            $this->ResMunicipality->SetValue($this->DataSource->ResMunicipality->GetValue());
            $this->ResProvince->SetValue($this->DataSource->ResProvince->GetValue());
            $this->ResZipcode->SetValue($this->DataSource->ResZipcode->GetValue());
            $this->Citizenship->SetValue($this->DataSource->Citizenship->GetValue());
            $this->PermHouseNo->SetValue($this->DataSource->PermHouseNo->GetValue());
            $this->PermStreet->SetValue($this->DataSource->PermStreet->GetValue());
            $this->PermSubVillage->SetValue($this->DataSource->PermSubVillage->GetValue());
            $this->PermBrgy->SetValue($this->DataSource->PermBrgy->GetValue());
            $this->PermMunicipality->SetValue($this->DataSource->PermMunicipality->GetValue());
            $this->PermProvince->SetValue($this->DataSource->PermProvince->GetValue());
            $this->PermZipcode->SetValue($this->DataSource->PermZipcode->GetValue());
            $this->EmpPicture->SetValue($this->DataSource->EmpPicture->GetValue());
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
            $this->AgencyEmpNo1->SetValue($this->DataSource->AgencyEmpNo1->GetValue());
            $this->AgencyEmpNo2->SetValue($this->DataSource->AgencyEmpNo2->GetValue());
            $this->AgencyEmpNo3->SetValue($this->DataSource->AgencyEmpNo3->GetValue());
            $this->AgencyEmpNo4->SetValue($this->DataSource->AgencyEmpNo4->GetValue());
            $this->AgencyEmpNo5->SetValue($this->DataSource->AgencyEmpNo5->GetValue());
            $this->AgencyEmpNo6->SetValue($this->DataSource->AgencyEmpNo6->GetValue());
            $this->AgencyEmpNo7->SetValue($this->DataSource->AgencyEmpNo7->GetValue());
            $this->AgencyEmpNo8->SetValue($this->DataSource->AgencyEmpNo8->GetValue());
            $this->AgencyEmpNo9->SetValue($this->DataSource->AgencyEmpNo9->GetValue());
            $this->AgencyEmpNo10->SetValue($this->DataSource->AgencyEmpNo10->GetValue());
            $this->AgencyEmpNo11->SetValue($this->DataSource->AgencyEmpNo11->GetValue());
            $this->AgencyEmpNo12->SetValue($this->DataSource->AgencyEmpNo12->GetValue());
            $this->AgencyEmpNo13->SetValue($this->DataSource->AgencyEmpNo13->GetValue());
            $this->AgencyEmpNo15->SetValue($this->DataSource->AgencyEmpNo15->GetValue());
            $this->AgencyEmpNo16->SetValue($this->DataSource->AgencyEmpNo16->GetValue());
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
            $this->ControlsVisible["EmployeeIDNo"] = $this->EmployeeIDNo->Visible;
            $this->ControlsVisible["Surname"] = $this->Surname->Visible;
            $this->ControlsVisible["FirstName"] = $this->FirstName->Visible;
            $this->ControlsVisible["MiddleName"] = $this->MiddleName->Visible;
            $this->ControlsVisible["BirthMonth"] = $this->BirthMonth->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["BirthDay"] = $this->BirthDay->Visible;
            $this->ControlsVisible["BirthYear"] = $this->BirthYear->Visible;
            $this->ControlsVisible["EmailAdd"] = $this->EmailAdd->Visible;
            $this->ControlsVisible["MobileNo"] = $this->MobileNo->Visible;
            $this->ControlsVisible["TelNo"] = $this->TelNo->Visible;
            $this->ControlsVisible["ResHouseNo"] = $this->ResHouseNo->Visible;
            $this->ControlsVisible["ResStreet"] = $this->ResStreet->Visible;
            $this->ControlsVisible["ResSubVillage"] = $this->ResSubVillage->Visible;
            $this->ControlsVisible["ResBrgy"] = $this->ResBrgy->Visible;
            $this->ControlsVisible["ResMunicipality"] = $this->ResMunicipality->Visible;
            $this->ControlsVisible["ResProvince"] = $this->ResProvince->Visible;
            $this->ControlsVisible["ResZipcode"] = $this->ResZipcode->Visible;
            $this->ControlsVisible["Citizenship"] = $this->Citizenship->Visible;
            $this->ControlsVisible["PermHouseNo"] = $this->PermHouseNo->Visible;
            $this->ControlsVisible["PermStreet"] = $this->PermStreet->Visible;
            $this->ControlsVisible["PermSubVillage"] = $this->PermSubVillage->Visible;
            $this->ControlsVisible["PermBrgy"] = $this->PermBrgy->Visible;
            $this->ControlsVisible["PermMunicipality"] = $this->PermMunicipality->Visible;
            $this->ControlsVisible["PermProvince"] = $this->PermProvince->Visible;
            $this->ControlsVisible["PermZipcode"] = $this->PermZipcode->Visible;
            $this->ControlsVisible["EmpPicture"] = $this->EmpPicture->Visible;
            $this->ControlsVisible["PlaceOfBirth"] = $this->PlaceOfBirth->Visible;
            $this->ControlsVisible["Sex"] = $this->Sex->Visible;
            $this->ControlsVisible["CivilStatus"] = $this->CivilStatus->Visible;
            $this->ControlsVisible["Height"] = $this->Height->Visible;
            $this->ControlsVisible["Weight"] = $this->Weight->Visible;
            $this->ControlsVisible["BloodType"] = $this->BloodType->Visible;
            $this->ControlsVisible["GsisIdNo"] = $this->GsisIdNo->Visible;
            $this->ControlsVisible["GsisBPN"] = $this->GsisBPN->Visible;
            $this->ControlsVisible["PagIbigIDNo"] = $this->PagIbigIDNo->Visible;
            $this->ControlsVisible["PhilhealthNo"] = $this->PhilhealthNo->Visible;
            $this->ControlsVisible["SssNo"] = $this->SssNo->Visible;
            $this->ControlsVisible["Tin"] = $this->Tin->Visible;
            $this->ControlsVisible["AgencyEmpNo"] = $this->AgencyEmpNo->Visible;
            $this->ControlsVisible["AgencyEmpNo1"] = $this->AgencyEmpNo1->Visible;
            $this->ControlsVisible["AgencyEmpNo2"] = $this->AgencyEmpNo2->Visible;
            $this->ControlsVisible["AgencyEmpNo3"] = $this->AgencyEmpNo3->Visible;
            $this->ControlsVisible["AgencyEmpNo4"] = $this->AgencyEmpNo4->Visible;
            $this->ControlsVisible["AgencyEmpNo5"] = $this->AgencyEmpNo5->Visible;
            $this->ControlsVisible["AgencyEmpNo6"] = $this->AgencyEmpNo6->Visible;
            $this->ControlsVisible["AgencyEmpNo7"] = $this->AgencyEmpNo7->Visible;
            $this->ControlsVisible["AgencyEmpNo8"] = $this->AgencyEmpNo8->Visible;
            $this->ControlsVisible["AgencyEmpNo9"] = $this->AgencyEmpNo9->Visible;
            $this->ControlsVisible["AgencyEmpNo10"] = $this->AgencyEmpNo10->Visible;
            $this->ControlsVisible["AgencyEmpNo11"] = $this->AgencyEmpNo11->Visible;
            $this->ControlsVisible["AgencyEmpNo12"] = $this->AgencyEmpNo12->Visible;
            $this->ControlsVisible["AgencyEmpNo13"] = $this->AgencyEmpNo13->Visible;
            $this->ControlsVisible["AgencyEmpNo15"] = $this->AgencyEmpNo15->Visible;
            $this->ControlsVisible["AgencyEmpNo16"] = $this->AgencyEmpNo16->Visible;
            $this->ControlsVisible["Report_CurrentDate"] = $this->Report_CurrentDate->Visible;
            do {
                $this->Attributes->RestoreFromArray($items[$i]->Attributes);
                $this->RowNumber = $items[$i]->RowNumber;
                switch ($items[$i]->GroupType) {
                    Case "":
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Detail";
                        $this->EmployeeIDNo->SetValue($items[$i]->EmployeeIDNo);
                        $this->EmployeeIDNo->Attributes->RestoreFromArray($items[$i]->_EmployeeIDNoAttributes);
                        $this->Surname->SetValue($items[$i]->Surname);
                        $this->Surname->Attributes->RestoreFromArray($items[$i]->_SurnameAttributes);
                        $this->FirstName->SetValue($items[$i]->FirstName);
                        $this->FirstName->Attributes->RestoreFromArray($items[$i]->_FirstNameAttributes);
                        $this->MiddleName->SetValue($items[$i]->MiddleName);
                        $this->MiddleName->Attributes->RestoreFromArray($items[$i]->_MiddleNameAttributes);
                        $this->BirthMonth->SetValue($items[$i]->BirthMonth);
                        $this->BirthMonth->Attributes->RestoreFromArray($items[$i]->_BirthMonthAttributes);
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->BirthDay->SetValue($items[$i]->BirthDay);
                        $this->BirthDay->Attributes->RestoreFromArray($items[$i]->_BirthDayAttributes);
                        $this->BirthYear->SetValue($items[$i]->BirthYear);
                        $this->BirthYear->Attributes->RestoreFromArray($items[$i]->_BirthYearAttributes);
                        $this->EmailAdd->SetValue($items[$i]->EmailAdd);
                        $this->EmailAdd->Attributes->RestoreFromArray($items[$i]->_EmailAddAttributes);
                        $this->MobileNo->SetValue($items[$i]->MobileNo);
                        $this->MobileNo->Attributes->RestoreFromArray($items[$i]->_MobileNoAttributes);
                        $this->TelNo->SetValue($items[$i]->TelNo);
                        $this->TelNo->Attributes->RestoreFromArray($items[$i]->_TelNoAttributes);
                        $this->ResHouseNo->SetValue($items[$i]->ResHouseNo);
                        $this->ResHouseNo->Attributes->RestoreFromArray($items[$i]->_ResHouseNoAttributes);
                        $this->ResStreet->SetValue($items[$i]->ResStreet);
                        $this->ResStreet->Attributes->RestoreFromArray($items[$i]->_ResStreetAttributes);
                        $this->ResSubVillage->SetValue($items[$i]->ResSubVillage);
                        $this->ResSubVillage->Attributes->RestoreFromArray($items[$i]->_ResSubVillageAttributes);
                        $this->ResBrgy->SetValue($items[$i]->ResBrgy);
                        $this->ResBrgy->Attributes->RestoreFromArray($items[$i]->_ResBrgyAttributes);
                        $this->ResMunicipality->SetValue($items[$i]->ResMunicipality);
                        $this->ResMunicipality->Attributes->RestoreFromArray($items[$i]->_ResMunicipalityAttributes);
                        $this->ResProvince->SetValue($items[$i]->ResProvince);
                        $this->ResProvince->Attributes->RestoreFromArray($items[$i]->_ResProvinceAttributes);
                        $this->ResZipcode->SetValue($items[$i]->ResZipcode);
                        $this->ResZipcode->Attributes->RestoreFromArray($items[$i]->_ResZipcodeAttributes);
                        $this->Citizenship->SetValue($items[$i]->Citizenship);
                        $this->Citizenship->Attributes->RestoreFromArray($items[$i]->_CitizenshipAttributes);
                        $this->PermHouseNo->SetValue($items[$i]->PermHouseNo);
                        $this->PermHouseNo->Attributes->RestoreFromArray($items[$i]->_PermHouseNoAttributes);
                        $this->PermStreet->SetValue($items[$i]->PermStreet);
                        $this->PermStreet->Attributes->RestoreFromArray($items[$i]->_PermStreetAttributes);
                        $this->PermSubVillage->SetValue($items[$i]->PermSubVillage);
                        $this->PermSubVillage->Attributes->RestoreFromArray($items[$i]->_PermSubVillageAttributes);
                        $this->PermBrgy->SetValue($items[$i]->PermBrgy);
                        $this->PermBrgy->Attributes->RestoreFromArray($items[$i]->_PermBrgyAttributes);
                        $this->PermMunicipality->SetValue($items[$i]->PermMunicipality);
                        $this->PermMunicipality->Attributes->RestoreFromArray($items[$i]->_PermMunicipalityAttributes);
                        $this->PermProvince->SetValue($items[$i]->PermProvince);
                        $this->PermProvince->Attributes->RestoreFromArray($items[$i]->_PermProvinceAttributes);
                        $this->PermZipcode->SetValue($items[$i]->PermZipcode);
                        $this->PermZipcode->Attributes->RestoreFromArray($items[$i]->_PermZipcodeAttributes);
                        $this->EmpPicture->SetValue($items[$i]->EmpPicture);
                        $this->EmpPicture->Attributes->RestoreFromArray($items[$i]->_EmpPictureAttributes);
                        $this->PlaceOfBirth->SetValue($items[$i]->PlaceOfBirth);
                        $this->PlaceOfBirth->Attributes->RestoreFromArray($items[$i]->_PlaceOfBirthAttributes);
                        $this->Sex->SetValue($items[$i]->Sex);
                        $this->Sex->Attributes->RestoreFromArray($items[$i]->_SexAttributes);
                        $this->CivilStatus->SetValue($items[$i]->CivilStatus);
                        $this->CivilStatus->Attributes->RestoreFromArray($items[$i]->_CivilStatusAttributes);
                        $this->Height->SetValue($items[$i]->Height);
                        $this->Height->Attributes->RestoreFromArray($items[$i]->_HeightAttributes);
                        $this->Weight->SetValue($items[$i]->Weight);
                        $this->Weight->Attributes->RestoreFromArray($items[$i]->_WeightAttributes);
                        $this->BloodType->SetValue($items[$i]->BloodType);
                        $this->BloodType->Attributes->RestoreFromArray($items[$i]->_BloodTypeAttributes);
                        $this->GsisIdNo->SetValue($items[$i]->GsisIdNo);
                        $this->GsisIdNo->Attributes->RestoreFromArray($items[$i]->_GsisIdNoAttributes);
                        $this->GsisBPN->SetValue($items[$i]->GsisBPN);
                        $this->GsisBPN->Attributes->RestoreFromArray($items[$i]->_GsisBPNAttributes);
                        $this->PagIbigIDNo->SetValue($items[$i]->PagIbigIDNo);
                        $this->PagIbigIDNo->Attributes->RestoreFromArray($items[$i]->_PagIbigIDNoAttributes);
                        $this->PhilhealthNo->SetValue($items[$i]->PhilhealthNo);
                        $this->PhilhealthNo->Attributes->RestoreFromArray($items[$i]->_PhilhealthNoAttributes);
                        $this->SssNo->SetValue($items[$i]->SssNo);
                        $this->SssNo->Attributes->RestoreFromArray($items[$i]->_SssNoAttributes);
                        $this->Tin->SetValue($items[$i]->Tin);
                        $this->Tin->Attributes->RestoreFromArray($items[$i]->_TinAttributes);
                        $this->AgencyEmpNo->SetValue($items[$i]->AgencyEmpNo);
                        $this->AgencyEmpNo->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNoAttributes);
                        $this->AgencyEmpNo1->SetValue($items[$i]->AgencyEmpNo1);
                        $this->AgencyEmpNo1->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo1Attributes);
                        $this->AgencyEmpNo2->SetValue($items[$i]->AgencyEmpNo2);
                        $this->AgencyEmpNo2->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo2Attributes);
                        $this->AgencyEmpNo3->SetValue($items[$i]->AgencyEmpNo3);
                        $this->AgencyEmpNo3->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo3Attributes);
                        $this->AgencyEmpNo4->SetValue($items[$i]->AgencyEmpNo4);
                        $this->AgencyEmpNo4->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo4Attributes);
                        $this->AgencyEmpNo5->SetValue($items[$i]->AgencyEmpNo5);
                        $this->AgencyEmpNo5->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo5Attributes);
                        $this->AgencyEmpNo6->SetValue($items[$i]->AgencyEmpNo6);
                        $this->AgencyEmpNo6->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo6Attributes);
                        $this->AgencyEmpNo7->SetValue($items[$i]->AgencyEmpNo7);
                        $this->AgencyEmpNo7->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo7Attributes);
                        $this->AgencyEmpNo8->SetValue($items[$i]->AgencyEmpNo8);
                        $this->AgencyEmpNo8->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo8Attributes);
                        $this->AgencyEmpNo9->SetValue($items[$i]->AgencyEmpNo9);
                        $this->AgencyEmpNo9->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo9Attributes);
                        $this->AgencyEmpNo10->SetValue($items[$i]->AgencyEmpNo10);
                        $this->AgencyEmpNo10->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo10Attributes);
                        $this->AgencyEmpNo11->SetValue($items[$i]->AgencyEmpNo11);
                        $this->AgencyEmpNo11->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo11Attributes);
                        $this->AgencyEmpNo12->SetValue($items[$i]->AgencyEmpNo12);
                        $this->AgencyEmpNo12->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo12Attributes);
                        $this->AgencyEmpNo13->SetValue($items[$i]->AgencyEmpNo13);
                        $this->AgencyEmpNo13->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo13Attributes);
                        $this->AgencyEmpNo15->SetValue($items[$i]->AgencyEmpNo15);
                        $this->AgencyEmpNo15->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo15Attributes);
                        $this->AgencyEmpNo16->SetValue($items[$i]->AgencyEmpNo16);
                        $this->AgencyEmpNo16->Attributes->RestoreFromArray($items[$i]->_AgencyEmpNo16Attributes);
                        $this->Report_CurrentDate->SetValue(CCFormatDate(CCGetDateArray(), $this->Report_CurrentDate->Format));
                        $this->Report_CurrentDate->Attributes->RestoreFromArray($items[$i]->_Report_CurrentDateAttributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->EmployeeIDNo->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->BirthMonth->Show();
                        $this->NameExtension->Show();
                        $this->BirthDay->Show();
                        $this->BirthYear->Show();
                        $this->EmailAdd->Show();
                        $this->MobileNo->Show();
                        $this->TelNo->Show();
                        $this->ResHouseNo->Show();
                        $this->ResStreet->Show();
                        $this->ResSubVillage->Show();
                        $this->ResBrgy->Show();
                        $this->ResMunicipality->Show();
                        $this->ResProvince->Show();
                        $this->ResZipcode->Show();
                        $this->Citizenship->Show();
                        $this->PermHouseNo->Show();
                        $this->PermStreet->Show();
                        $this->PermSubVillage->Show();
                        $this->PermBrgy->Show();
                        $this->PermMunicipality->Show();
                        $this->PermProvince->Show();
                        $this->PermZipcode->Show();
                        $this->EmpPicture->Show();
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
                        $this->AgencyEmpNo1->Show();
                        $this->AgencyEmpNo2->Show();
                        $this->AgencyEmpNo3->Show();
                        $this->AgencyEmpNo4->Show();
                        $this->AgencyEmpNo5->Show();
                        $this->AgencyEmpNo6->Show();
                        $this->AgencyEmpNo7->Show();
                        $this->AgencyEmpNo8->Show();
                        $this->AgencyEmpNo9->Show();
                        $this->AgencyEmpNo10->Show();
                        $this->AgencyEmpNo11->Show();
                        $this->AgencyEmpNo12->Show();
                        $this->AgencyEmpNo13->Show();
                        $this->AgencyEmpNo15->Show();
                        $this->AgencyEmpNo16->Show();
                        $this->Report_CurrentDate->Show();
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
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->PageBreak->Show();
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

//DataSource Variables @2-7E46921C
    var $Parent = "";
    var $CCSEvents = "";
    var $CCSEventResult;
    var $ErrorBlock;
    var $CmdExecution;

    var $wp;


    // Datasource fields
    var $EmployeeIDNo;
    var $Surname;
    var $FirstName;
    var $MiddleName;
    var $BirthMonth;
    var $NameExtension;
    var $BirthDay;
    var $BirthYear;
    var $EmailAdd;
    var $MobileNo;
    var $TelNo;
    var $ResHouseNo;
    var $ResStreet;
    var $ResSubVillage;
    var $ResBrgy;
    var $ResMunicipality;
    var $ResProvince;
    var $ResZipcode;
    var $Citizenship;
    var $PermHouseNo;
    var $PermStreet;
    var $PermSubVillage;
    var $PermBrgy;
    var $PermMunicipality;
    var $PermProvince;
    var $PermZipcode;
    var $EmpPicture;
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
    var $AgencyEmpNo1;
    var $AgencyEmpNo2;
    var $AgencyEmpNo3;
    var $AgencyEmpNo4;
    var $AgencyEmpNo5;
    var $AgencyEmpNo6;
    var $AgencyEmpNo7;
    var $AgencyEmpNo8;
    var $AgencyEmpNo9;
    var $AgencyEmpNo10;
    var $AgencyEmpNo11;
    var $AgencyEmpNo12;
    var $AgencyEmpNo13;
    var $AgencyEmpNo15;
    var $AgencyEmpNo16;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-04A5A654
    function clsemployeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee";
        $this->Initialize();
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->BirthMonth = new clsField("BirthMonth", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->BirthDay = new clsField("BirthDay", ccsText, "");
        
        $this->BirthYear = new clsField("BirthYear", ccsText, "");
        
        $this->EmailAdd = new clsField("EmailAdd", ccsText, "");
        
        $this->MobileNo = new clsField("MobileNo", ccsText, "");
        
        $this->TelNo = new clsField("TelNo", ccsText, "");
        
        $this->ResHouseNo = new clsField("ResHouseNo", ccsText, "");
        
        $this->ResStreet = new clsField("ResStreet", ccsText, "");
        
        $this->ResSubVillage = new clsField("ResSubVillage", ccsText, "");
        
        $this->ResBrgy = new clsField("ResBrgy", ccsText, "");
        
        $this->ResMunicipality = new clsField("ResMunicipality", ccsText, "");
        
        $this->ResProvince = new clsField("ResProvince", ccsText, "");
        
        $this->ResZipcode = new clsField("ResZipcode", ccsText, "");
        
        $this->Citizenship = new clsField("Citizenship", ccsText, "");
        
        $this->PermHouseNo = new clsField("PermHouseNo", ccsText, "");
        
        $this->PermStreet = new clsField("PermStreet", ccsText, "");
        
        $this->PermSubVillage = new clsField("PermSubVillage", ccsText, "");
        
        $this->PermBrgy = new clsField("PermBrgy", ccsText, "");
        
        $this->PermMunicipality = new clsField("PermMunicipality", ccsText, "");
        
        $this->PermProvince = new clsField("PermProvince", ccsText, "");
        
        $this->PermZipcode = new clsField("PermZipcode", ccsText, "");
        
        $this->EmpPicture = new clsField("EmpPicture", ccsText, "");
        
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
        
        $this->AgencyEmpNo1 = new clsField("AgencyEmpNo1", ccsText, "");
        
        $this->AgencyEmpNo2 = new clsField("AgencyEmpNo2", ccsText, "");
        
        $this->AgencyEmpNo3 = new clsField("AgencyEmpNo3", ccsText, "");
        
        $this->AgencyEmpNo4 = new clsField("AgencyEmpNo4", ccsText, "");
        
        $this->AgencyEmpNo5 = new clsField("AgencyEmpNo5", ccsText, "");
        
        $this->AgencyEmpNo6 = new clsField("AgencyEmpNo6", ccsText, "");
        
        $this->AgencyEmpNo7 = new clsField("AgencyEmpNo7", ccsText, "");
        
        $this->AgencyEmpNo8 = new clsField("AgencyEmpNo8", ccsText, "");
        
        $this->AgencyEmpNo9 = new clsField("AgencyEmpNo9", ccsText, "");
        
        $this->AgencyEmpNo10 = new clsField("AgencyEmpNo10", ccsText, "");
        
        $this->AgencyEmpNo11 = new clsField("AgencyEmpNo11", ccsText, "");
        
        $this->AgencyEmpNo12 = new clsField("AgencyEmpNo12", ccsText, "");
        
        $this->AgencyEmpNo13 = new clsField("AgencyEmpNo13", ccsText, "");
        
        $this->AgencyEmpNo15 = new clsField("AgencyEmpNo15", ccsText, "");
        
        $this->AgencyEmpNo16 = new clsField("AgencyEmpNo16", ccsText, "");
        

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

//Prepare Method @2-B547B724
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlEmployeeID", ccsInteger, "", "", $this->Parameters["urlEmployeeID"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "employee.EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-F2F2796E
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee LEFT JOIN lut_sex ON\n\n" .
        "employee.Sex = lut_sex.SexID {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-C59A74D3
    function SetValues()
    {
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->BirthMonth->SetDBValue($this->f("BirthMonth"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->BirthDay->SetDBValue($this->f("BirthDay"));
        $this->BirthYear->SetDBValue($this->f("BirthYear"));
        $this->EmailAdd->SetDBValue($this->f("EmailAdd"));
        $this->MobileNo->SetDBValue($this->f("MobileNo"));
        $this->TelNo->SetDBValue($this->f("TelNo"));
        $this->ResHouseNo->SetDBValue($this->f("ResHouseNo"));
        $this->ResStreet->SetDBValue($this->f("ResStreet"));
        $this->ResSubVillage->SetDBValue($this->f("ResSubVillage"));
        $this->ResBrgy->SetDBValue($this->f("ResBrgy"));
        $this->ResMunicipality->SetDBValue($this->f("ResMunicipality"));
        $this->ResProvince->SetDBValue($this->f("ResProvince"));
        $this->ResZipcode->SetDBValue($this->f("ResZipcode"));
        $this->Citizenship->SetDBValue($this->f("Citizenship"));
        $this->PermHouseNo->SetDBValue($this->f("PermHouseNo"));
        $this->PermStreet->SetDBValue($this->f("PermStreet"));
        $this->PermSubVillage->SetDBValue($this->f("PermSubVillage"));
        $this->PermBrgy->SetDBValue($this->f("PermBrgy"));
        $this->PermMunicipality->SetDBValue($this->f("PermMunicipality"));
        $this->PermProvince->SetDBValue($this->f("PermProvince"));
        $this->PermZipcode->SetDBValue($this->f("PermZipcode"));
        $this->EmpPicture->SetDBValue($this->f("EmpPicture"));
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
        $this->AgencyEmpNo1->SetDBValue($this->f("SpouseSurname"));
        $this->AgencyEmpNo2->SetDBValue($this->f("SpouseFirstName"));
        $this->AgencyEmpNo3->SetDBValue($this->f("SpouseMiddleName"));
        $this->AgencyEmpNo4->SetDBValue($this->f("SpouseOccupatn"));
        $this->AgencyEmpNo5->SetDBValue($this->f("SpouseBusinessName"));
        $this->AgencyEmpNo6->SetDBValue($this->f("SpouseBusinessAddress"));
        $this->AgencyEmpNo7->SetDBValue($this->f("SpouseTelNo"));
        $this->AgencyEmpNo8->SetDBValue($this->f("FatherSurname"));
        $this->AgencyEmpNo9->SetDBValue($this->f("FatherFirstName"));
        $this->AgencyEmpNo10->SetDBValue($this->f("FatherMiddleName"));
        $this->AgencyEmpNo11->SetDBValue($this->f("MotherSurname"));
        $this->AgencyEmpNo12->SetDBValue($this->f("MotherFirstName"));
        $this->AgencyEmpNo13->SetDBValue($this->f("MotherMiddleName"));
        $this->AgencyEmpNo15->SetDBValue($this->f("FatherNameExt"));
        $this->AgencyEmpNo16->SetDBValue($this->f("SpouseNameExt"));
    }
//End SetValues Method

} //End employeeDataSource Class @2-FCB6E20C

//Initialize Page @1-C7FA8005
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
$TemplateFileName = "QEmployeePersonal_print.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4DCE7F16
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee = & new clsReportemployee("", $MainPage);
$MainPage->employee = & $employee;
$employee->Initialize();

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

//Show Page @1-407081AB
$employee->Show();
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
