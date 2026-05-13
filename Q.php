<?php
//Include Common Files @1-2C3BF989
define("RelativePath", ".");
define("PathToCurrentPage", "/");
define("FileName", "Q.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//employee ReportGroup class @2-DF83B374
class clsReportGroupemployee {
    var $GroupType;
    var $mode; //1 - open, 2 - close
    var $Report_TotalRecords, $_Report_TotalRecordsAttributes;
    var $EmployeeIDNo, $_EmployeeIDNoAttributes;
    var $Surname, $_SurnameAttributes;
    var $FirstName, $_FirstNameAttributes;
    var $MiddleName, $_MiddleNameAttributes;
    var $MiddleInitial, $_MiddleInitialAttributes;
    var $NameExtension, $_NameExtensionAttributes;
    var $BirthMonth, $_BirthMonthAttributes;
    var $BirthDay, $_BirthDayAttributes;
    var $BirthYear, $_BirthYearAttributes;
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
    var $Citizenship, $_CitizenshipAttributes;
    var $ResHouseNo, $_ResHouseNoAttributes;
    var $ResStreet, $_ResStreetAttributes;
    var $ResSubVillage, $_ResSubVillageAttributes;
    var $ResBrgy, $_ResBrgyAttributes;
    var $ResMunicipality, $_ResMunicipalityAttributes;
    var $ResProvince, $_ResProvinceAttributes;
    var $ResZipcode, $_ResZipcodeAttributes;
    var $PermHouseNo, $_PermHouseNoAttributes;
    var $PermStreet, $_PermStreetAttributes;
    var $PermSubVillage, $_PermSubVillageAttributes;
    var $PermBrgy, $_PermBrgyAttributes;
    var $PermMunicipality, $_PermMunicipalityAttributes;
    var $PermProvince, $_PermProvinceAttributes;
    var $PermZipcode, $_PermZipcodeAttributes;
    var $TelNo, $_TelNoAttributes;
    var $MobileNo, $_MobileNoAttributes;
    var $EmailAdd, $_EmailAddAttributes;
    var $SpouseSurname, $_SpouseSurnameAttributes;
    var $SpouseFirstName, $_SpouseFirstNameAttributes;
    var $SpouseMiddleName, $_SpouseMiddleNameAttributes;
    var $SpouseNameExt, $_SpouseNameExtAttributes;
    var $SpouseOccupatn, $_SpouseOccupatnAttributes;
    var $SpouseBusinessName, $_SpouseBusinessNameAttributes;
    var $SpouseBusinessAddress, $_SpouseBusinessAddressAttributes;
    var $SpouseTelNo, $_SpouseTelNoAttributes;
    var $FatherSurname, $_FatherSurnameAttributes;
    var $FatherFirstName, $_FatherFirstNameAttributes;
    var $FatherMiddleName, $_FatherMiddleNameAttributes;
    var $FatherNameExt, $_FatherNameExtAttributes;
    var $MotherMaiden, $_MotherMaidenAttributes;
    var $MotherSurname, $_MotherSurnameAttributes;
    var $MotherFirstName, $_MotherFirstNameAttributes;
    var $MotherMiddleName, $_MotherMiddleNameAttributes;
    var $EmpPicture2, $_EmpPicture2Attributes;
    var $TotalCount_EmployeeID, $_TotalCount_EmployeeIDAttributes;
    var $Report_CurrentPage, $_Report_CurrentPageAttributes;
    var $Report_TotalPages, $_Report_TotalPagesAttributes;
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
        $this->MiddleInitial = $this->Parent->MiddleInitial->Value;
        $this->NameExtension = $this->Parent->NameExtension->Value;
        $this->BirthMonth = $this->Parent->BirthMonth->Value;
        $this->BirthDay = $this->Parent->BirthDay->Value;
        $this->BirthYear = $this->Parent->BirthYear->Value;
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
        $this->Citizenship = $this->Parent->Citizenship->Value;
        $this->ResHouseNo = $this->Parent->ResHouseNo->Value;
        $this->ResStreet = $this->Parent->ResStreet->Value;
        $this->ResSubVillage = $this->Parent->ResSubVillage->Value;
        $this->ResBrgy = $this->Parent->ResBrgy->Value;
        $this->ResMunicipality = $this->Parent->ResMunicipality->Value;
        $this->ResProvince = $this->Parent->ResProvince->Value;
        $this->ResZipcode = $this->Parent->ResZipcode->Value;
        $this->PermHouseNo = $this->Parent->PermHouseNo->Value;
        $this->PermStreet = $this->Parent->PermStreet->Value;
        $this->PermSubVillage = $this->Parent->PermSubVillage->Value;
        $this->PermBrgy = $this->Parent->PermBrgy->Value;
        $this->PermMunicipality = $this->Parent->PermMunicipality->Value;
        $this->PermProvince = $this->Parent->PermProvince->Value;
        $this->PermZipcode = $this->Parent->PermZipcode->Value;
        $this->TelNo = $this->Parent->TelNo->Value;
        $this->MobileNo = $this->Parent->MobileNo->Value;
        $this->EmailAdd = $this->Parent->EmailAdd->Value;
        $this->SpouseSurname = $this->Parent->SpouseSurname->Value;
        $this->SpouseFirstName = $this->Parent->SpouseFirstName->Value;
        $this->SpouseMiddleName = $this->Parent->SpouseMiddleName->Value;
        $this->SpouseNameExt = $this->Parent->SpouseNameExt->Value;
        $this->SpouseOccupatn = $this->Parent->SpouseOccupatn->Value;
        $this->SpouseBusinessName = $this->Parent->SpouseBusinessName->Value;
        $this->SpouseBusinessAddress = $this->Parent->SpouseBusinessAddress->Value;
        $this->SpouseTelNo = $this->Parent->SpouseTelNo->Value;
        $this->FatherSurname = $this->Parent->FatherSurname->Value;
        $this->FatherFirstName = $this->Parent->FatherFirstName->Value;
        $this->FatherMiddleName = $this->Parent->FatherMiddleName->Value;
        $this->FatherNameExt = $this->Parent->FatherNameExt->Value;
        $this->MotherMaiden = $this->Parent->MotherMaiden->Value;
        $this->MotherSurname = $this->Parent->MotherSurname->Value;
        $this->MotherFirstName = $this->Parent->MotherFirstName->Value;
        $this->MotherMiddleName = $this->Parent->MotherMiddleName->Value;
        $this->EmpPicture2 = $this->Parent->EmpPicture2->Value;
    }

    function SetTotalControls($mode = "", $PrevGroup = "") {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetTotalValue($mode);
        $this->TotalCount_EmployeeID = $this->Parent->TotalCount_EmployeeID->GetTotalValue($mode);
        $this->_Report_TotalRecordsAttributes = $this->Parent->Report_TotalRecords->Attributes->GetAsArray();
        $this->_EmployeeIDNoAttributes = $this->Parent->EmployeeIDNo->Attributes->GetAsArray();
        $this->_SurnameAttributes = $this->Parent->Surname->Attributes->GetAsArray();
        $this->_FirstNameAttributes = $this->Parent->FirstName->Attributes->GetAsArray();
        $this->_MiddleNameAttributes = $this->Parent->MiddleName->Attributes->GetAsArray();
        $this->_MiddleInitialAttributes = $this->Parent->MiddleInitial->Attributes->GetAsArray();
        $this->_NameExtensionAttributes = $this->Parent->NameExtension->Attributes->GetAsArray();
        $this->_BirthMonthAttributes = $this->Parent->BirthMonth->Attributes->GetAsArray();
        $this->_BirthDayAttributes = $this->Parent->BirthDay->Attributes->GetAsArray();
        $this->_BirthYearAttributes = $this->Parent->BirthYear->Attributes->GetAsArray();
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
        $this->_CitizenshipAttributes = $this->Parent->Citizenship->Attributes->GetAsArray();
        $this->_ResHouseNoAttributes = $this->Parent->ResHouseNo->Attributes->GetAsArray();
        $this->_ResStreetAttributes = $this->Parent->ResStreet->Attributes->GetAsArray();
        $this->_ResSubVillageAttributes = $this->Parent->ResSubVillage->Attributes->GetAsArray();
        $this->_ResBrgyAttributes = $this->Parent->ResBrgy->Attributes->GetAsArray();
        $this->_ResMunicipalityAttributes = $this->Parent->ResMunicipality->Attributes->GetAsArray();
        $this->_ResProvinceAttributes = $this->Parent->ResProvince->Attributes->GetAsArray();
        $this->_ResZipcodeAttributes = $this->Parent->ResZipcode->Attributes->GetAsArray();
        $this->_PermHouseNoAttributes = $this->Parent->PermHouseNo->Attributes->GetAsArray();
        $this->_PermStreetAttributes = $this->Parent->PermStreet->Attributes->GetAsArray();
        $this->_PermSubVillageAttributes = $this->Parent->PermSubVillage->Attributes->GetAsArray();
        $this->_PermBrgyAttributes = $this->Parent->PermBrgy->Attributes->GetAsArray();
        $this->_PermMunicipalityAttributes = $this->Parent->PermMunicipality->Attributes->GetAsArray();
        $this->_PermProvinceAttributes = $this->Parent->PermProvince->Attributes->GetAsArray();
        $this->_PermZipcodeAttributes = $this->Parent->PermZipcode->Attributes->GetAsArray();
        $this->_TelNoAttributes = $this->Parent->TelNo->Attributes->GetAsArray();
        $this->_MobileNoAttributes = $this->Parent->MobileNo->Attributes->GetAsArray();
        $this->_EmailAddAttributes = $this->Parent->EmailAdd->Attributes->GetAsArray();
        $this->_SpouseSurnameAttributes = $this->Parent->SpouseSurname->Attributes->GetAsArray();
        $this->_SpouseFirstNameAttributes = $this->Parent->SpouseFirstName->Attributes->GetAsArray();
        $this->_SpouseMiddleNameAttributes = $this->Parent->SpouseMiddleName->Attributes->GetAsArray();
        $this->_SpouseNameExtAttributes = $this->Parent->SpouseNameExt->Attributes->GetAsArray();
        $this->_SpouseOccupatnAttributes = $this->Parent->SpouseOccupatn->Attributes->GetAsArray();
        $this->_SpouseBusinessNameAttributes = $this->Parent->SpouseBusinessName->Attributes->GetAsArray();
        $this->_SpouseBusinessAddressAttributes = $this->Parent->SpouseBusinessAddress->Attributes->GetAsArray();
        $this->_SpouseTelNoAttributes = $this->Parent->SpouseTelNo->Attributes->GetAsArray();
        $this->_FatherSurnameAttributes = $this->Parent->FatherSurname->Attributes->GetAsArray();
        $this->_FatherFirstNameAttributes = $this->Parent->FatherFirstName->Attributes->GetAsArray();
        $this->_FatherMiddleNameAttributes = $this->Parent->FatherMiddleName->Attributes->GetAsArray();
        $this->_FatherNameExtAttributes = $this->Parent->FatherNameExt->Attributes->GetAsArray();
        $this->_MotherMaidenAttributes = $this->Parent->MotherMaiden->Attributes->GetAsArray();
        $this->_MotherSurnameAttributes = $this->Parent->MotherSurname->Attributes->GetAsArray();
        $this->_MotherFirstNameAttributes = $this->Parent->MotherFirstName->Attributes->GetAsArray();
        $this->_MotherMiddleNameAttributes = $this->Parent->MotherMiddleName->Attributes->GetAsArray();
        $this->_EmpPicture2Attributes = $this->Parent->EmpPicture2->Attributes->GetAsArray();
        $this->_TotalCount_EmployeeIDAttributes = $this->Parent->TotalCount_EmployeeID->Attributes->GetAsArray();
        $this->_Report_CurrentPageAttributes = $this->Parent->Report_CurrentPage->Attributes->GetAsArray();
        $this->_Report_TotalPagesAttributes = $this->Parent->Report_TotalPages->Attributes->GetAsArray();
        $this->_NavigatorAttributes = $this->Parent->Navigator->Attributes->GetAsArray();
    }
    function SyncWithHeader(& $Header) {
        $Header->Report_TotalRecords = $this->Report_TotalRecords;
        $Header->_Report_TotalRecordsAttributes = $this->_Report_TotalRecordsAttributes;
        $Header->TotalCount_EmployeeID = $this->TotalCount_EmployeeID;
        $Header->_TotalCount_EmployeeIDAttributes = $this->_TotalCount_EmployeeIDAttributes;
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
        $this->MiddleInitial = $Header->MiddleInitial;
        $Header->_MiddleInitialAttributes = $this->_MiddleInitialAttributes;
        $this->Parent->MiddleInitial->Value = $Header->MiddleInitial;
        $this->Parent->MiddleInitial->Attributes->RestoreFromArray($Header->_MiddleInitialAttributes);
        $this->NameExtension = $Header->NameExtension;
        $Header->_NameExtensionAttributes = $this->_NameExtensionAttributes;
        $this->Parent->NameExtension->Value = $Header->NameExtension;
        $this->Parent->NameExtension->Attributes->RestoreFromArray($Header->_NameExtensionAttributes);
        $this->BirthMonth = $Header->BirthMonth;
        $Header->_BirthMonthAttributes = $this->_BirthMonthAttributes;
        $this->Parent->BirthMonth->Value = $Header->BirthMonth;
        $this->Parent->BirthMonth->Attributes->RestoreFromArray($Header->_BirthMonthAttributes);
        $this->BirthDay = $Header->BirthDay;
        $Header->_BirthDayAttributes = $this->_BirthDayAttributes;
        $this->Parent->BirthDay->Value = $Header->BirthDay;
        $this->Parent->BirthDay->Attributes->RestoreFromArray($Header->_BirthDayAttributes);
        $this->BirthYear = $Header->BirthYear;
        $Header->_BirthYearAttributes = $this->_BirthYearAttributes;
        $this->Parent->BirthYear->Value = $Header->BirthYear;
        $this->Parent->BirthYear->Attributes->RestoreFromArray($Header->_BirthYearAttributes);
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
        $this->Citizenship = $Header->Citizenship;
        $Header->_CitizenshipAttributes = $this->_CitizenshipAttributes;
        $this->Parent->Citizenship->Value = $Header->Citizenship;
        $this->Parent->Citizenship->Attributes->RestoreFromArray($Header->_CitizenshipAttributes);
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
        $this->TelNo = $Header->TelNo;
        $Header->_TelNoAttributes = $this->_TelNoAttributes;
        $this->Parent->TelNo->Value = $Header->TelNo;
        $this->Parent->TelNo->Attributes->RestoreFromArray($Header->_TelNoAttributes);
        $this->MobileNo = $Header->MobileNo;
        $Header->_MobileNoAttributes = $this->_MobileNoAttributes;
        $this->Parent->MobileNo->Value = $Header->MobileNo;
        $this->Parent->MobileNo->Attributes->RestoreFromArray($Header->_MobileNoAttributes);
        $this->EmailAdd = $Header->EmailAdd;
        $Header->_EmailAddAttributes = $this->_EmailAddAttributes;
        $this->Parent->EmailAdd->Value = $Header->EmailAdd;
        $this->Parent->EmailAdd->Attributes->RestoreFromArray($Header->_EmailAddAttributes);
        $this->SpouseSurname = $Header->SpouseSurname;
        $Header->_SpouseSurnameAttributes = $this->_SpouseSurnameAttributes;
        $this->Parent->SpouseSurname->Value = $Header->SpouseSurname;
        $this->Parent->SpouseSurname->Attributes->RestoreFromArray($Header->_SpouseSurnameAttributes);
        $this->SpouseFirstName = $Header->SpouseFirstName;
        $Header->_SpouseFirstNameAttributes = $this->_SpouseFirstNameAttributes;
        $this->Parent->SpouseFirstName->Value = $Header->SpouseFirstName;
        $this->Parent->SpouseFirstName->Attributes->RestoreFromArray($Header->_SpouseFirstNameAttributes);
        $this->SpouseMiddleName = $Header->SpouseMiddleName;
        $Header->_SpouseMiddleNameAttributes = $this->_SpouseMiddleNameAttributes;
        $this->Parent->SpouseMiddleName->Value = $Header->SpouseMiddleName;
        $this->Parent->SpouseMiddleName->Attributes->RestoreFromArray($Header->_SpouseMiddleNameAttributes);
        $this->SpouseNameExt = $Header->SpouseNameExt;
        $Header->_SpouseNameExtAttributes = $this->_SpouseNameExtAttributes;
        $this->Parent->SpouseNameExt->Value = $Header->SpouseNameExt;
        $this->Parent->SpouseNameExt->Attributes->RestoreFromArray($Header->_SpouseNameExtAttributes);
        $this->SpouseOccupatn = $Header->SpouseOccupatn;
        $Header->_SpouseOccupatnAttributes = $this->_SpouseOccupatnAttributes;
        $this->Parent->SpouseOccupatn->Value = $Header->SpouseOccupatn;
        $this->Parent->SpouseOccupatn->Attributes->RestoreFromArray($Header->_SpouseOccupatnAttributes);
        $this->SpouseBusinessName = $Header->SpouseBusinessName;
        $Header->_SpouseBusinessNameAttributes = $this->_SpouseBusinessNameAttributes;
        $this->Parent->SpouseBusinessName->Value = $Header->SpouseBusinessName;
        $this->Parent->SpouseBusinessName->Attributes->RestoreFromArray($Header->_SpouseBusinessNameAttributes);
        $this->SpouseBusinessAddress = $Header->SpouseBusinessAddress;
        $Header->_SpouseBusinessAddressAttributes = $this->_SpouseBusinessAddressAttributes;
        $this->Parent->SpouseBusinessAddress->Value = $Header->SpouseBusinessAddress;
        $this->Parent->SpouseBusinessAddress->Attributes->RestoreFromArray($Header->_SpouseBusinessAddressAttributes);
        $this->SpouseTelNo = $Header->SpouseTelNo;
        $Header->_SpouseTelNoAttributes = $this->_SpouseTelNoAttributes;
        $this->Parent->SpouseTelNo->Value = $Header->SpouseTelNo;
        $this->Parent->SpouseTelNo->Attributes->RestoreFromArray($Header->_SpouseTelNoAttributes);
        $this->FatherSurname = $Header->FatherSurname;
        $Header->_FatherSurnameAttributes = $this->_FatherSurnameAttributes;
        $this->Parent->FatherSurname->Value = $Header->FatherSurname;
        $this->Parent->FatherSurname->Attributes->RestoreFromArray($Header->_FatherSurnameAttributes);
        $this->FatherFirstName = $Header->FatherFirstName;
        $Header->_FatherFirstNameAttributes = $this->_FatherFirstNameAttributes;
        $this->Parent->FatherFirstName->Value = $Header->FatherFirstName;
        $this->Parent->FatherFirstName->Attributes->RestoreFromArray($Header->_FatherFirstNameAttributes);
        $this->FatherMiddleName = $Header->FatherMiddleName;
        $Header->_FatherMiddleNameAttributes = $this->_FatherMiddleNameAttributes;
        $this->Parent->FatherMiddleName->Value = $Header->FatherMiddleName;
        $this->Parent->FatherMiddleName->Attributes->RestoreFromArray($Header->_FatherMiddleNameAttributes);
        $this->FatherNameExt = $Header->FatherNameExt;
        $Header->_FatherNameExtAttributes = $this->_FatherNameExtAttributes;
        $this->Parent->FatherNameExt->Value = $Header->FatherNameExt;
        $this->Parent->FatherNameExt->Attributes->RestoreFromArray($Header->_FatherNameExtAttributes);
        $this->MotherMaiden = $Header->MotherMaiden;
        $Header->_MotherMaidenAttributes = $this->_MotherMaidenAttributes;
        $this->Parent->MotherMaiden->Value = $Header->MotherMaiden;
        $this->Parent->MotherMaiden->Attributes->RestoreFromArray($Header->_MotherMaidenAttributes);
        $this->MotherSurname = $Header->MotherSurname;
        $Header->_MotherSurnameAttributes = $this->_MotherSurnameAttributes;
        $this->Parent->MotherSurname->Value = $Header->MotherSurname;
        $this->Parent->MotherSurname->Attributes->RestoreFromArray($Header->_MotherSurnameAttributes);
        $this->MotherFirstName = $Header->MotherFirstName;
        $Header->_MotherFirstNameAttributes = $this->_MotherFirstNameAttributes;
        $this->Parent->MotherFirstName->Value = $Header->MotherFirstName;
        $this->Parent->MotherFirstName->Attributes->RestoreFromArray($Header->_MotherFirstNameAttributes);
        $this->MotherMiddleName = $Header->MotherMiddleName;
        $Header->_MotherMiddleNameAttributes = $this->_MotherMiddleNameAttributes;
        $this->Parent->MotherMiddleName->Value = $Header->MotherMiddleName;
        $this->Parent->MotherMiddleName->Attributes->RestoreFromArray($Header->_MotherMiddleNameAttributes);
        $this->EmpPicture2 = $Header->EmpPicture2;
        $Header->_EmpPicture2Attributes = $this->_EmpPicture2Attributes;
        $this->Parent->EmpPicture2->Value = $Header->EmpPicture2;
        $this->Parent->EmpPicture2->Attributes->RestoreFromArray($Header->_EmpPicture2Attributes);
    }
    function ChangeTotalControls() {
        $this->Report_TotalRecords = $this->Parent->Report_TotalRecords->GetValue();
        $this->TotalCount_EmployeeID = $this->Parent->TotalCount_EmployeeID->GetValue();
    }
}
//End employee ReportGroup class

//employee GroupsCollection class @2-9B13263F
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
        $this->Parent->Report_TotalRecords->Value = $this->Parent->Report_TotalRecords->initialValue;
        $this->Parent->EmployeeIDNo->Value = $this->Parent->EmployeeIDNo->initialValue;
        $this->Parent->Surname->Value = $this->Parent->Surname->initialValue;
        $this->Parent->FirstName->Value = $this->Parent->FirstName->initialValue;
        $this->Parent->MiddleName->Value = $this->Parent->MiddleName->initialValue;
        $this->Parent->MiddleInitial->Value = $this->Parent->MiddleInitial->initialValue;
        $this->Parent->NameExtension->Value = $this->Parent->NameExtension->initialValue;
        $this->Parent->BirthMonth->Value = $this->Parent->BirthMonth->initialValue;
        $this->Parent->BirthDay->Value = $this->Parent->BirthDay->initialValue;
        $this->Parent->BirthYear->Value = $this->Parent->BirthYear->initialValue;
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
        $this->Parent->Citizenship->Value = $this->Parent->Citizenship->initialValue;
        $this->Parent->ResHouseNo->Value = $this->Parent->ResHouseNo->initialValue;
        $this->Parent->ResStreet->Value = $this->Parent->ResStreet->initialValue;
        $this->Parent->ResSubVillage->Value = $this->Parent->ResSubVillage->initialValue;
        $this->Parent->ResBrgy->Value = $this->Parent->ResBrgy->initialValue;
        $this->Parent->ResMunicipality->Value = $this->Parent->ResMunicipality->initialValue;
        $this->Parent->ResProvince->Value = $this->Parent->ResProvince->initialValue;
        $this->Parent->ResZipcode->Value = $this->Parent->ResZipcode->initialValue;
        $this->Parent->PermHouseNo->Value = $this->Parent->PermHouseNo->initialValue;
        $this->Parent->PermStreet->Value = $this->Parent->PermStreet->initialValue;
        $this->Parent->PermSubVillage->Value = $this->Parent->PermSubVillage->initialValue;
        $this->Parent->PermBrgy->Value = $this->Parent->PermBrgy->initialValue;
        $this->Parent->PermMunicipality->Value = $this->Parent->PermMunicipality->initialValue;
        $this->Parent->PermProvince->Value = $this->Parent->PermProvince->initialValue;
        $this->Parent->PermZipcode->Value = $this->Parent->PermZipcode->initialValue;
        $this->Parent->TelNo->Value = $this->Parent->TelNo->initialValue;
        $this->Parent->MobileNo->Value = $this->Parent->MobileNo->initialValue;
        $this->Parent->EmailAdd->Value = $this->Parent->EmailAdd->initialValue;
        $this->Parent->SpouseSurname->Value = $this->Parent->SpouseSurname->initialValue;
        $this->Parent->SpouseFirstName->Value = $this->Parent->SpouseFirstName->initialValue;
        $this->Parent->SpouseMiddleName->Value = $this->Parent->SpouseMiddleName->initialValue;
        $this->Parent->SpouseNameExt->Value = $this->Parent->SpouseNameExt->initialValue;
        $this->Parent->SpouseOccupatn->Value = $this->Parent->SpouseOccupatn->initialValue;
        $this->Parent->SpouseBusinessName->Value = $this->Parent->SpouseBusinessName->initialValue;
        $this->Parent->SpouseBusinessAddress->Value = $this->Parent->SpouseBusinessAddress->initialValue;
        $this->Parent->SpouseTelNo->Value = $this->Parent->SpouseTelNo->initialValue;
        $this->Parent->FatherSurname->Value = $this->Parent->FatherSurname->initialValue;
        $this->Parent->FatherFirstName->Value = $this->Parent->FatherFirstName->initialValue;
        $this->Parent->FatherMiddleName->Value = $this->Parent->FatherMiddleName->initialValue;
        $this->Parent->FatherNameExt->Value = $this->Parent->FatherNameExt->initialValue;
        $this->Parent->MotherMaiden->Value = $this->Parent->MotherMaiden->initialValue;
        $this->Parent->MotherSurname->Value = $this->Parent->MotherSurname->initialValue;
        $this->Parent->MotherFirstName->Value = $this->Parent->MotherFirstName->initialValue;
        $this->Parent->MotherMiddleName->Value = $this->Parent->MotherMiddleName->initialValue;
        $this->Parent->EmpPicture2->Value = $this->Parent->EmpPicture2->initialValue;
        $this->Parent->TotalCount_EmployeeID->Value = $this->Parent->TotalCount_EmployeeID->initialValue;
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

//Class_Initialize Event @2-773205FD
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
        $this->Detail->Height = 58;
        $MaxSectionSize = max($MaxSectionSize, $this->Detail->Height);
        $this->Report_Footer = new clsSection($this);
        $this->Report_Footer->Height = 2;
        $MaxSectionSize = max($MaxSectionSize, $this->Report_Footer->Height);
        $this->Report_Header = new clsSection($this);
        $this->Page_Footer = new clsSection($this);
        $this->Page_Footer->Height = 1;
        $MinPageSize += $this->Page_Footer->Height;
        $this->Page_Header = new clsSection($this);
        $this->Errors = new clsErrors();
        $this->DataSource = new clsemployeeDataSource($this);
        $this->ds = & $this->DataSource;
        $PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(is_numeric($PageSize) && $PageSize > 0) {
            $this->PageSize = $PageSize;
        } else {
            if (!is_numeric($PageSize) || $PageSize < 0)
                $this->PageSize = 65;
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

        $this->Report_TotalRecords = & new clsControl(ccsReportLabel, "Report_TotalRecords", "Report_TotalRecords", ccsText, "", 0, $this);
        $this->Report_TotalRecords->TotalFunction = "Count";
        $this->Report_TotalRecords->IsEmptySource = true;
        $this->EmployeeIDNo = & new clsControl(ccsReportLabel, "EmployeeIDNo", "EmployeeIDNo", ccsText, "", "", $this);
        $this->Surname = & new clsControl(ccsReportLabel, "Surname", "Surname", ccsText, "", "", $this);
        $this->FirstName = & new clsControl(ccsReportLabel, "FirstName", "FirstName", ccsText, "", "", $this);
        $this->MiddleName = & new clsControl(ccsReportLabel, "MiddleName", "MiddleName", ccsText, "", "", $this);
        $this->MiddleInitial = & new clsControl(ccsReportLabel, "MiddleInitial", "MiddleInitial", ccsText, "", "", $this);
        $this->NameExtension = & new clsControl(ccsReportLabel, "NameExtension", "NameExtension", ccsText, "", "", $this);
        $this->BirthMonth = & new clsControl(ccsReportLabel, "BirthMonth", "BirthMonth", ccsText, "", "", $this);
        $this->BirthDay = & new clsControl(ccsReportLabel, "BirthDay", "BirthDay", ccsText, "", "", $this);
        $this->BirthYear = & new clsControl(ccsReportLabel, "BirthYear", "BirthYear", ccsText, "", "", $this);
        $this->PlaceOfBirth = & new clsControl(ccsReportLabel, "PlaceOfBirth", "PlaceOfBirth", ccsText, "", "", $this);
        $this->Sex = & new clsControl(ccsReportLabel, "Sex", "Sex", ccsText, "", "", $this);
        $this->CivilStatus = & new clsControl(ccsReportLabel, "CivilStatus", "CivilStatus", ccsText, "", "", $this);
        $this->Height = & new clsControl(ccsReportLabel, "Height", "Height", ccsText, "", "", $this);
        $this->Weight = & new clsControl(ccsReportLabel, "Weight", "Weight", ccsText, "", "", $this);
        $this->BloodType = & new clsControl(ccsReportLabel, "BloodType", "BloodType", ccsText, "", "", $this);
        $this->GsisIdNo = & new clsControl(ccsReportLabel, "GsisIdNo", "GsisIdNo", ccsText, "", "", $this);
        $this->GsisBPN = & new clsControl(ccsReportLabel, "GsisBPN", "GsisBPN", ccsText, "", "", $this);
        $this->PagIbigIDNo = & new clsControl(ccsReportLabel, "PagIbigIDNo", "PagIbigIDNo", ccsText, "", "", $this);
        $this->PhilhealthNo = & new clsControl(ccsReportLabel, "PhilhealthNo", "PhilhealthNo", ccsText, "", "", $this);
        $this->SssNo = & new clsControl(ccsReportLabel, "SssNo", "SssNo", ccsText, "", "", $this);
        $this->Tin = & new clsControl(ccsReportLabel, "Tin", "Tin", ccsText, "", "", $this);
        $this->AgencyEmpNo = & new clsControl(ccsReportLabel, "AgencyEmpNo", "AgencyEmpNo", ccsText, "", "", $this);
        $this->Citizenship = & new clsControl(ccsReportLabel, "Citizenship", "Citizenship", ccsText, "", "", $this);
        $this->ResHouseNo = & new clsControl(ccsReportLabel, "ResHouseNo", "ResHouseNo", ccsText, "", "", $this);
        $this->ResStreet = & new clsControl(ccsReportLabel, "ResStreet", "ResStreet", ccsText, "", "", $this);
        $this->ResSubVillage = & new clsControl(ccsReportLabel, "ResSubVillage", "ResSubVillage", ccsText, "", "", $this);
        $this->ResBrgy = & new clsControl(ccsReportLabel, "ResBrgy", "ResBrgy", ccsText, "", "", $this);
        $this->ResMunicipality = & new clsControl(ccsReportLabel, "ResMunicipality", "ResMunicipality", ccsText, "", "", $this);
        $this->ResProvince = & new clsControl(ccsReportLabel, "ResProvince", "ResProvince", ccsText, "", "", $this);
        $this->ResZipcode = & new clsControl(ccsReportLabel, "ResZipcode", "ResZipcode", ccsText, "", "", $this);
        $this->PermHouseNo = & new clsControl(ccsReportLabel, "PermHouseNo", "PermHouseNo", ccsText, "", "", $this);
        $this->PermStreet = & new clsControl(ccsReportLabel, "PermStreet", "PermStreet", ccsText, "", "", $this);
        $this->PermSubVillage = & new clsControl(ccsReportLabel, "PermSubVillage", "PermSubVillage", ccsText, "", "", $this);
        $this->PermBrgy = & new clsControl(ccsReportLabel, "PermBrgy", "PermBrgy", ccsText, "", "", $this);
        $this->PermMunicipality = & new clsControl(ccsReportLabel, "PermMunicipality", "PermMunicipality", ccsText, "", "", $this);
        $this->PermProvince = & new clsControl(ccsReportLabel, "PermProvince", "PermProvince", ccsText, "", "", $this);
        $this->PermZipcode = & new clsControl(ccsReportLabel, "PermZipcode", "PermZipcode", ccsText, "", "", $this);
        $this->TelNo = & new clsControl(ccsReportLabel, "TelNo", "TelNo", ccsText, "", "", $this);
        $this->MobileNo = & new clsControl(ccsReportLabel, "MobileNo", "MobileNo", ccsText, "", "", $this);
        $this->EmailAdd = & new clsControl(ccsReportLabel, "EmailAdd", "EmailAdd", ccsText, "", "", $this);
        $this->SpouseSurname = & new clsControl(ccsReportLabel, "SpouseSurname", "SpouseSurname", ccsText, "", "", $this);
        $this->SpouseFirstName = & new clsControl(ccsReportLabel, "SpouseFirstName", "SpouseFirstName", ccsText, "", "", $this);
        $this->SpouseMiddleName = & new clsControl(ccsReportLabel, "SpouseMiddleName", "SpouseMiddleName", ccsText, "", "", $this);
        $this->SpouseNameExt = & new clsControl(ccsReportLabel, "SpouseNameExt", "SpouseNameExt", ccsText, "", "", $this);
        $this->SpouseOccupatn = & new clsControl(ccsReportLabel, "SpouseOccupatn", "SpouseOccupatn", ccsText, "", "", $this);
        $this->SpouseBusinessName = & new clsControl(ccsReportLabel, "SpouseBusinessName", "SpouseBusinessName", ccsText, "", "", $this);
        $this->SpouseBusinessAddress = & new clsControl(ccsReportLabel, "SpouseBusinessAddress", "SpouseBusinessAddress", ccsText, "", "", $this);
        $this->SpouseTelNo = & new clsControl(ccsReportLabel, "SpouseTelNo", "SpouseTelNo", ccsText, "", "", $this);
        $this->FatherSurname = & new clsControl(ccsReportLabel, "FatherSurname", "FatherSurname", ccsText, "", "", $this);
        $this->FatherFirstName = & new clsControl(ccsReportLabel, "FatherFirstName", "FatherFirstName", ccsText, "", "", $this);
        $this->FatherMiddleName = & new clsControl(ccsReportLabel, "FatherMiddleName", "FatherMiddleName", ccsText, "", "", $this);
        $this->FatherNameExt = & new clsControl(ccsReportLabel, "FatherNameExt", "FatherNameExt", ccsText, "", "", $this);
        $this->MotherMaiden = & new clsControl(ccsReportLabel, "MotherMaiden", "MotherMaiden", ccsText, "", "", $this);
        $this->MotherSurname = & new clsControl(ccsReportLabel, "MotherSurname", "MotherSurname", ccsText, "", "", $this);
        $this->MotherFirstName = & new clsControl(ccsReportLabel, "MotherFirstName", "MotherFirstName", ccsText, "", "", $this);
        $this->MotherMiddleName = & new clsControl(ccsReportLabel, "MotherMiddleName", "MotherMiddleName", ccsText, "", "", $this);
        $this->EmpPicture2 = & new clsControl(ccsImage, "EmpPicture2", "EmpPicture2", ccsText, "", CCGetRequestParam("EmpPicture2", ccsGet, NULL), $this);
        $this->NoRecords = & new clsPanel("NoRecords", $this);
        $this->TotalCount_EmployeeID = & new clsControl(ccsReportLabel, "TotalCount_EmployeeID", "TotalCount_EmployeeID", ccsInteger, "", 0, $this);
        $this->TotalCount_EmployeeID->TotalFunction = "Count";
        $this->TotalCount_EmployeeID->IsEmptySource = true;
        $this->Report_CurrentPage = & new clsControl(ccsReportLabel, "Report_CurrentPage", "Report_CurrentPage", ccsInteger, "", "", $this);
        $this->Report_TotalPages = & new clsControl(ccsReportLabel, "Report_TotalPages", "Report_TotalPages", ccsInteger, "", "", $this);
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

//CheckErrors Method @2-9FE6F361
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->Report_TotalRecords->Errors->Count());
        $errors = ($errors || $this->EmployeeIDNo->Errors->Count());
        $errors = ($errors || $this->Surname->Errors->Count());
        $errors = ($errors || $this->FirstName->Errors->Count());
        $errors = ($errors || $this->MiddleName->Errors->Count());
        $errors = ($errors || $this->MiddleInitial->Errors->Count());
        $errors = ($errors || $this->NameExtension->Errors->Count());
        $errors = ($errors || $this->BirthMonth->Errors->Count());
        $errors = ($errors || $this->BirthDay->Errors->Count());
        $errors = ($errors || $this->BirthYear->Errors->Count());
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
        $errors = ($errors || $this->ResStreet->Errors->Count());
        $errors = ($errors || $this->ResSubVillage->Errors->Count());
        $errors = ($errors || $this->ResBrgy->Errors->Count());
        $errors = ($errors || $this->ResMunicipality->Errors->Count());
        $errors = ($errors || $this->ResProvince->Errors->Count());
        $errors = ($errors || $this->ResZipcode->Errors->Count());
        $errors = ($errors || $this->PermHouseNo->Errors->Count());
        $errors = ($errors || $this->PermStreet->Errors->Count());
        $errors = ($errors || $this->PermSubVillage->Errors->Count());
        $errors = ($errors || $this->PermBrgy->Errors->Count());
        $errors = ($errors || $this->PermMunicipality->Errors->Count());
        $errors = ($errors || $this->PermProvince->Errors->Count());
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
        $errors = ($errors || $this->EmpPicture2->Errors->Count());
        $errors = ($errors || $this->TotalCount_EmployeeID->Errors->Count());
        $errors = ($errors || $this->Report_CurrentPage->Errors->Count());
        $errors = ($errors || $this->Report_TotalPages->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//GetErrors Method @2-C48CAE82
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->Report_TotalRecords->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmployeeIDNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Surname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MiddleInitial->Errors->ToString());
        $errors = ComposeStrings($errors, $this->NameExtension->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthMonth->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthDay->Errors->ToString());
        $errors = ComposeStrings($errors, $this->BirthYear->Errors->ToString());
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
        $errors = ComposeStrings($errors, $this->Citizenship->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResHouseNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResStreet->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResSubVillage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResBrgy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResMunicipality->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResProvince->Errors->ToString());
        $errors = ComposeStrings($errors, $this->ResZipcode->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermHouseNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermStreet->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermSubVillage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermBrgy->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermMunicipality->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermProvince->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PermZipcode->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TelNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MobileNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmailAdd->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseSurname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseFirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseMiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseNameExt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseOccupatn->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseBusinessName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseBusinessAddress->Errors->ToString());
        $errors = ComposeStrings($errors, $this->SpouseTelNo->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FatherSurname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FatherFirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FatherMiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->FatherNameExt->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MotherMaiden->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MotherSurname->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MotherFirstName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->MotherMiddleName->Errors->ToString());
        $errors = ComposeStrings($errors, $this->EmpPicture2->Errors->ToString());
        $errors = ComposeStrings($errors, $this->TotalCount_EmployeeID->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_CurrentPage->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Report_TotalPages->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

//Show Method @2-EAF41D7A
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;

        $ShownRecords = 0;

        $this->DataSource->Parameters["urls_EmployeeID"] = CCGetFromGet("s_EmployeeID", NULL);
        $this->DataSource->Parameters["urls_Surname"] = CCGetFromGet("s_Surname", NULL);
        $this->DataSource->Parameters["urls_FirstName"] = CCGetFromGet("s_FirstName", NULL);
        $this->DataSource->Parameters["urls_MiddleName"] = CCGetFromGet("s_MiddleName", NULL);
        $this->DataSource->Parameters["urls_MiddleInitial"] = CCGetFromGet("s_MiddleInitial", NULL);
        $this->DataSource->Parameters["urls_NameExtension"] = CCGetFromGet("s_NameExtension", NULL);
        $this->DataSource->Parameters["urls_OfficeID"] = CCGetFromGet("s_OfficeID", NULL);
        $this->DataSource->Parameters["urls_PermMunicipality"] = CCGetFromGet("s_PermMunicipality", NULL);
        $this->DataSource->Parameters["urls_Sex"] = CCGetFromGet("s_Sex", NULL);
        $this->DataSource->Parameters["urls_CivilStatus"] = CCGetFromGet("s_CivilStatus", NULL);

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
            $this->MiddleInitial->SetValue($this->DataSource->MiddleInitial->GetValue());
            $this->NameExtension->SetValue($this->DataSource->NameExtension->GetValue());
            $this->BirthMonth->SetValue($this->DataSource->BirthMonth->GetValue());
            $this->BirthDay->SetValue($this->DataSource->BirthDay->GetValue());
            $this->BirthYear->SetValue($this->DataSource->BirthYear->GetValue());
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
            $this->ResStreet->SetValue($this->DataSource->ResStreet->GetValue());
            $this->ResSubVillage->SetValue($this->DataSource->ResSubVillage->GetValue());
            $this->ResBrgy->SetValue($this->DataSource->ResBrgy->GetValue());
            $this->ResMunicipality->SetValue($this->DataSource->ResMunicipality->GetValue());
            $this->ResProvince->SetValue($this->DataSource->ResProvince->GetValue());
            $this->ResZipcode->SetValue($this->DataSource->ResZipcode->GetValue());
            $this->PermHouseNo->SetValue($this->DataSource->PermHouseNo->GetValue());
            $this->PermStreet->SetValue($this->DataSource->PermStreet->GetValue());
            $this->PermSubVillage->SetValue($this->DataSource->PermSubVillage->GetValue());
            $this->PermBrgy->SetValue($this->DataSource->PermBrgy->GetValue());
            $this->PermMunicipality->SetValue($this->DataSource->PermMunicipality->GetValue());
            $this->PermProvince->SetValue($this->DataSource->PermProvince->GetValue());
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
            $this->EmpPicture2->SetValue($this->DataSource->EmpPicture2->GetValue());
            $this->Report_TotalRecords->SetValue(1);
            $this->TotalCount_EmployeeID->SetValue(1);
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
            $this->ControlsVisible["MiddleInitial"] = $this->MiddleInitial->Visible;
            $this->ControlsVisible["NameExtension"] = $this->NameExtension->Visible;
            $this->ControlsVisible["BirthMonth"] = $this->BirthMonth->Visible;
            $this->ControlsVisible["BirthDay"] = $this->BirthDay->Visible;
            $this->ControlsVisible["BirthYear"] = $this->BirthYear->Visible;
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
            $this->ControlsVisible["Citizenship"] = $this->Citizenship->Visible;
            $this->ControlsVisible["ResHouseNo"] = $this->ResHouseNo->Visible;
            $this->ControlsVisible["ResStreet"] = $this->ResStreet->Visible;
            $this->ControlsVisible["ResSubVillage"] = $this->ResSubVillage->Visible;
            $this->ControlsVisible["ResBrgy"] = $this->ResBrgy->Visible;
            $this->ControlsVisible["ResMunicipality"] = $this->ResMunicipality->Visible;
            $this->ControlsVisible["ResProvince"] = $this->ResProvince->Visible;
            $this->ControlsVisible["ResZipcode"] = $this->ResZipcode->Visible;
            $this->ControlsVisible["PermHouseNo"] = $this->PermHouseNo->Visible;
            $this->ControlsVisible["PermStreet"] = $this->PermStreet->Visible;
            $this->ControlsVisible["PermSubVillage"] = $this->PermSubVillage->Visible;
            $this->ControlsVisible["PermBrgy"] = $this->PermBrgy->Visible;
            $this->ControlsVisible["PermMunicipality"] = $this->PermMunicipality->Visible;
            $this->ControlsVisible["PermProvince"] = $this->PermProvince->Visible;
            $this->ControlsVisible["PermZipcode"] = $this->PermZipcode->Visible;
            $this->ControlsVisible["TelNo"] = $this->TelNo->Visible;
            $this->ControlsVisible["MobileNo"] = $this->MobileNo->Visible;
            $this->ControlsVisible["EmailAdd"] = $this->EmailAdd->Visible;
            $this->ControlsVisible["SpouseSurname"] = $this->SpouseSurname->Visible;
            $this->ControlsVisible["SpouseFirstName"] = $this->SpouseFirstName->Visible;
            $this->ControlsVisible["SpouseMiddleName"] = $this->SpouseMiddleName->Visible;
            $this->ControlsVisible["SpouseNameExt"] = $this->SpouseNameExt->Visible;
            $this->ControlsVisible["SpouseOccupatn"] = $this->SpouseOccupatn->Visible;
            $this->ControlsVisible["SpouseBusinessName"] = $this->SpouseBusinessName->Visible;
            $this->ControlsVisible["SpouseBusinessAddress"] = $this->SpouseBusinessAddress->Visible;
            $this->ControlsVisible["SpouseTelNo"] = $this->SpouseTelNo->Visible;
            $this->ControlsVisible["FatherSurname"] = $this->FatherSurname->Visible;
            $this->ControlsVisible["FatherFirstName"] = $this->FatherFirstName->Visible;
            $this->ControlsVisible["FatherMiddleName"] = $this->FatherMiddleName->Visible;
            $this->ControlsVisible["FatherNameExt"] = $this->FatherNameExt->Visible;
            $this->ControlsVisible["MotherMaiden"] = $this->MotherMaiden->Visible;
            $this->ControlsVisible["MotherSurname"] = $this->MotherSurname->Visible;
            $this->ControlsVisible["MotherFirstName"] = $this->MotherFirstName->Visible;
            $this->ControlsVisible["MotherMiddleName"] = $this->MotherMiddleName->Visible;
            $this->ControlsVisible["EmpPicture2"] = $this->EmpPicture2->Visible;
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
                        $this->MiddleInitial->SetValue($items[$i]->MiddleInitial);
                        $this->MiddleInitial->Attributes->RestoreFromArray($items[$i]->_MiddleInitialAttributes);
                        $this->NameExtension->SetValue($items[$i]->NameExtension);
                        $this->NameExtension->Attributes->RestoreFromArray($items[$i]->_NameExtensionAttributes);
                        $this->BirthMonth->SetValue($items[$i]->BirthMonth);
                        $this->BirthMonth->Attributes->RestoreFromArray($items[$i]->_BirthMonthAttributes);
                        $this->BirthDay->SetValue($items[$i]->BirthDay);
                        $this->BirthDay->Attributes->RestoreFromArray($items[$i]->_BirthDayAttributes);
                        $this->BirthYear->SetValue($items[$i]->BirthYear);
                        $this->BirthYear->Attributes->RestoreFromArray($items[$i]->_BirthYearAttributes);
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
                        $this->Citizenship->SetValue($items[$i]->Citizenship);
                        $this->Citizenship->Attributes->RestoreFromArray($items[$i]->_CitizenshipAttributes);
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
                        $this->TelNo->SetValue($items[$i]->TelNo);
                        $this->TelNo->Attributes->RestoreFromArray($items[$i]->_TelNoAttributes);
                        $this->MobileNo->SetValue($items[$i]->MobileNo);
                        $this->MobileNo->Attributes->RestoreFromArray($items[$i]->_MobileNoAttributes);
                        $this->EmailAdd->SetValue($items[$i]->EmailAdd);
                        $this->EmailAdd->Attributes->RestoreFromArray($items[$i]->_EmailAddAttributes);
                        $this->SpouseSurname->SetValue($items[$i]->SpouseSurname);
                        $this->SpouseSurname->Attributes->RestoreFromArray($items[$i]->_SpouseSurnameAttributes);
                        $this->SpouseFirstName->SetValue($items[$i]->SpouseFirstName);
                        $this->SpouseFirstName->Attributes->RestoreFromArray($items[$i]->_SpouseFirstNameAttributes);
                        $this->SpouseMiddleName->SetValue($items[$i]->SpouseMiddleName);
                        $this->SpouseMiddleName->Attributes->RestoreFromArray($items[$i]->_SpouseMiddleNameAttributes);
                        $this->SpouseNameExt->SetValue($items[$i]->SpouseNameExt);
                        $this->SpouseNameExt->Attributes->RestoreFromArray($items[$i]->_SpouseNameExtAttributes);
                        $this->SpouseOccupatn->SetValue($items[$i]->SpouseOccupatn);
                        $this->SpouseOccupatn->Attributes->RestoreFromArray($items[$i]->_SpouseOccupatnAttributes);
                        $this->SpouseBusinessName->SetValue($items[$i]->SpouseBusinessName);
                        $this->SpouseBusinessName->Attributes->RestoreFromArray($items[$i]->_SpouseBusinessNameAttributes);
                        $this->SpouseBusinessAddress->SetValue($items[$i]->SpouseBusinessAddress);
                        $this->SpouseBusinessAddress->Attributes->RestoreFromArray($items[$i]->_SpouseBusinessAddressAttributes);
                        $this->SpouseTelNo->SetValue($items[$i]->SpouseTelNo);
                        $this->SpouseTelNo->Attributes->RestoreFromArray($items[$i]->_SpouseTelNoAttributes);
                        $this->FatherSurname->SetValue($items[$i]->FatherSurname);
                        $this->FatherSurname->Attributes->RestoreFromArray($items[$i]->_FatherSurnameAttributes);
                        $this->FatherFirstName->SetValue($items[$i]->FatherFirstName);
                        $this->FatherFirstName->Attributes->RestoreFromArray($items[$i]->_FatherFirstNameAttributes);
                        $this->FatherMiddleName->SetValue($items[$i]->FatherMiddleName);
                        $this->FatherMiddleName->Attributes->RestoreFromArray($items[$i]->_FatherMiddleNameAttributes);
                        $this->FatherNameExt->SetValue($items[$i]->FatherNameExt);
                        $this->FatherNameExt->Attributes->RestoreFromArray($items[$i]->_FatherNameExtAttributes);
                        $this->MotherMaiden->SetValue($items[$i]->MotherMaiden);
                        $this->MotherMaiden->Attributes->RestoreFromArray($items[$i]->_MotherMaidenAttributes);
                        $this->MotherSurname->SetValue($items[$i]->MotherSurname);
                        $this->MotherSurname->Attributes->RestoreFromArray($items[$i]->_MotherSurnameAttributes);
                        $this->MotherFirstName->SetValue($items[$i]->MotherFirstName);
                        $this->MotherFirstName->Attributes->RestoreFromArray($items[$i]->_MotherFirstNameAttributes);
                        $this->MotherMiddleName->SetValue($items[$i]->MotherMiddleName);
                        $this->MotherMiddleName->Attributes->RestoreFromArray($items[$i]->_MotherMiddleNameAttributes);
                        $this->EmpPicture2->SetValue($items[$i]->EmpPicture2);
                        $this->EmpPicture2->Attributes->RestoreFromArray($items[$i]->_EmpPicture2Attributes);
                        $this->Detail->CCSEventResult = CCGetEvent($this->Detail->CCSEvents, "BeforeShow", $this->Detail);
                        $this->Attributes->Show();
                        $this->EmployeeIDNo->Show();
                        $this->Surname->Show();
                        $this->FirstName->Show();
                        $this->MiddleName->Show();
                        $this->MiddleInitial->Show();
                        $this->NameExtension->Show();
                        $this->BirthMonth->Show();
                        $this->BirthDay->Show();
                        $this->BirthYear->Show();
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
                        $this->ResStreet->Show();
                        $this->ResSubVillage->Show();
                        $this->ResBrgy->Show();
                        $this->ResMunicipality->Show();
                        $this->ResProvince->Show();
                        $this->ResZipcode->Show();
                        $this->PermHouseNo->Show();
                        $this->PermStreet->Show();
                        $this->PermSubVillage->Show();
                        $this->PermBrgy->Show();
                        $this->PermMunicipality->Show();
                        $this->PermProvince->Show();
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
                        $this->EmpPicture2->Show();
                        $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                        if ($this->Detail->Visible)
                            $Tpl->parseto("Section Detail", true, "Section Detail");
                        break;
                    case "Report":
                        if ($items[$i]->Mode == 1) {
                            $this->Report_TotalRecords->SetValue($items[$i]->Report_TotalRecords);
                            $this->Report_TotalRecords->Attributes->RestoreFromArray($items[$i]->_Report_TotalRecordsAttributes);
                            $this->Report_Header->CCSEventResult = CCGetEvent($this->Report_Header->CCSEvents, "BeforeShow", $this->Report_Header);
                            if ($this->Report_Header->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Header";
                                $this->Attributes->Show();
                                $this->Report_TotalRecords->Show();
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock;
                                $Tpl->parseto("Section Report_Header", true, "Section Detail");
                            }
                        }
                        if ($items[$i]->Mode == 2) {
                            $this->TotalCount_EmployeeID->SetValue($items[$i]->TotalCount_EmployeeID);
                            $this->TotalCount_EmployeeID->Attributes->RestoreFromArray($items[$i]->_TotalCount_EmployeeIDAttributes);
                            $this->Report_Footer->CCSEventResult = CCGetEvent($this->Report_Footer->CCSEvents, "BeforeShow", $this->Report_Footer);
                            if ($this->Report_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Report_Footer";
                                $this->NoRecords->Show();
                                $this->TotalCount_EmployeeID->Show();
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
                            $this->Report_CurrentPage->SetValue($items[$i]->PageNumber);
                            $this->Report_CurrentPage->Attributes->RestoreFromArray($items[$i]->_Report_CurrentPageAttributes);
                            $this->Report_TotalPages->SetValue($Groups->TotalPages);
                            $this->Report_TotalPages->Attributes->RestoreFromArray($items[$i]->_Report_TotalPagesAttributes);
                            $this->Navigator->PageNumber = $items[$i]->PageNumber;
                            $this->Navigator->TotalPages = $Groups->TotalPages;
                            $this->Navigator->Visible = ("Print" != $this->ViewMode);
                            $this->Page_Footer->CCSEventResult = CCGetEvent($this->Page_Footer->CCSEvents, "BeforeShow", $this->Page_Footer);
                            if ($this->Page_Footer->Visible) {
                                $Tpl->block_path = $ParentPath . "/" . $ReportBlock . "/Section Page_Footer";
                                $this->Report_CurrentPage->Show();
                                $this->Report_TotalPages->Show();
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

//DataSource Variables @2-1A6C7868
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
    var $MiddleInitial;
    var $NameExtension;
    var $BirthMonth;
    var $BirthDay;
    var $BirthYear;
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
    var $ResStreet;
    var $ResSubVillage;
    var $ResBrgy;
    var $ResMunicipality;
    var $ResProvince;
    var $ResZipcode;
    var $PermHouseNo;
    var $PermStreet;
    var $PermSubVillage;
    var $PermBrgy;
    var $PermMunicipality;
    var $PermProvince;
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
    var $EmpPicture2;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-DA9FAC80
    function clsemployeeDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Report employee";
        $this->Initialize();
        $this->EmployeeIDNo = new clsField("EmployeeIDNo", ccsText, "");
        
        $this->Surname = new clsField("Surname", ccsText, "");
        
        $this->FirstName = new clsField("FirstName", ccsText, "");
        
        $this->MiddleName = new clsField("MiddleName", ccsText, "");
        
        $this->MiddleInitial = new clsField("MiddleInitial", ccsText, "");
        
        $this->NameExtension = new clsField("NameExtension", ccsText, "");
        
        $this->BirthMonth = new clsField("BirthMonth", ccsText, "");
        
        $this->BirthDay = new clsField("BirthDay", ccsText, "");
        
        $this->BirthYear = new clsField("BirthYear", ccsText, "");
        
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
        
        $this->ResStreet = new clsField("ResStreet", ccsText, "");
        
        $this->ResSubVillage = new clsField("ResSubVillage", ccsText, "");
        
        $this->ResBrgy = new clsField("ResBrgy", ccsText, "");
        
        $this->ResMunicipality = new clsField("ResMunicipality", ccsText, "");
        
        $this->ResProvince = new clsField("ResProvince", ccsText, "");
        
        $this->ResZipcode = new clsField("ResZipcode", ccsText, "");
        
        $this->PermHouseNo = new clsField("PermHouseNo", ccsText, "");
        
        $this->PermStreet = new clsField("PermStreet", ccsText, "");
        
        $this->PermSubVillage = new clsField("PermSubVillage", ccsText, "");
        
        $this->PermBrgy = new clsField("PermBrgy", ccsText, "");
        
        $this->PermMunicipality = new clsField("PermMunicipality", ccsText, "");
        
        $this->PermProvince = new clsField("PermProvince", ccsText, "");
        
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
        
        $this->EmpPicture2 = new clsField("EmpPicture2", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-C77BE6EA
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "Surname";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-0E9B2DA8
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_EmployeeID", ccsInteger, "", "", $this->Parameters["urls_EmployeeID"], "", false);
        $this->wp->AddParameter("2", "urls_Surname", ccsText, "", "", $this->Parameters["urls_Surname"], "", false);
        $this->wp->AddParameter("3", "urls_FirstName", ccsText, "", "", $this->Parameters["urls_FirstName"], "", false);
        $this->wp->AddParameter("4", "urls_MiddleName", ccsText, "", "", $this->Parameters["urls_MiddleName"], "", false);
        $this->wp->AddParameter("5", "urls_MiddleInitial", ccsText, "", "", $this->Parameters["urls_MiddleInitial"], "", false);
        $this->wp->AddParameter("6", "urls_NameExtension", ccsText, "", "", $this->Parameters["urls_NameExtension"], "", false);
        $this->wp->AddParameter("7", "urls_OfficeID", ccsInteger, "", "", $this->Parameters["urls_OfficeID"], "", false);
        $this->wp->AddParameter("8", "urls_PermMunicipality", ccsText, "", "", $this->Parameters["urls_PermMunicipality"], "", false);
        $this->wp->AddParameter("9", "urls_Sex", ccsText, "", "", $this->Parameters["urls_Sex"], "", false);
        $this->wp->AddParameter("10", "urls_CivilStatus", ccsText, "", "", $this->Parameters["urls_CivilStatus"], "", false);
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "EmployeeID", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),false);
        $this->wp->Criterion[2] = $this->wp->Operation(opContains, "Surname", $this->wp->GetDBValue("2"), $this->ToSQL($this->wp->GetDBValue("2"), ccsText),false);
        $this->wp->Criterion[3] = $this->wp->Operation(opContains, "FirstName", $this->wp->GetDBValue("3"), $this->ToSQL($this->wp->GetDBValue("3"), ccsText),false);
        $this->wp->Criterion[4] = $this->wp->Operation(opContains, "MiddleName", $this->wp->GetDBValue("4"), $this->ToSQL($this->wp->GetDBValue("4"), ccsText),false);
        $this->wp->Criterion[5] = $this->wp->Operation(opContains, "MiddleInitial", $this->wp->GetDBValue("5"), $this->ToSQL($this->wp->GetDBValue("5"), ccsText),false);
        $this->wp->Criterion[6] = $this->wp->Operation(opContains, "NameExtension", $this->wp->GetDBValue("6"), $this->ToSQL($this->wp->GetDBValue("6"), ccsText),false);
        $this->wp->Criterion[7] = $this->wp->Operation(opEqual, "OfficeID", $this->wp->GetDBValue("7"), $this->ToSQL($this->wp->GetDBValue("7"), ccsInteger),false);
        $this->wp->Criterion[8] = $this->wp->Operation(opContains, "PermMunicipality", $this->wp->GetDBValue("8"), $this->ToSQL($this->wp->GetDBValue("8"), ccsText),false);
        $this->wp->Criterion[9] = $this->wp->Operation(opContains, "Sex", $this->wp->GetDBValue("9"), $this->ToSQL($this->wp->GetDBValue("9"), ccsText),false);
        $this->wp->Criterion[10] = $this->wp->Operation(opContains, "CivilStatus", $this->wp->GetDBValue("10"), $this->ToSQL($this->wp->GetDBValue("10"), ccsText),false);
        $this->Where = $this->wp->opAND(
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
             $this->wp->Criterion[10]);
    }
//End Prepare Method

//Open Method @2-DAE23119
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM employee {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-5D29DB36
    function SetValues()
    {
        $this->EmployeeIDNo->SetDBValue($this->f("EmployeeIDNo"));
        $this->Surname->SetDBValue($this->f("Surname"));
        $this->FirstName->SetDBValue($this->f("FirstName"));
        $this->MiddleName->SetDBValue($this->f("MiddleName"));
        $this->MiddleInitial->SetDBValue($this->f("MiddleInitial"));
        $this->NameExtension->SetDBValue($this->f("NameExtension"));
        $this->BirthMonth->SetDBValue($this->f("BirthMonth"));
        $this->BirthDay->SetDBValue($this->f("BirthDay"));
        $this->BirthYear->SetDBValue($this->f("BirthYear"));
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
        $this->ResStreet->SetDBValue($this->f("ResStreet"));
        $this->ResSubVillage->SetDBValue($this->f("ResSubVillage"));
        $this->ResBrgy->SetDBValue($this->f("ResBrgy"));
        $this->ResMunicipality->SetDBValue($this->f("ResMunicipality"));
        $this->ResProvince->SetDBValue($this->f("ResProvince"));
        $this->ResZipcode->SetDBValue($this->f("ResZipcode"));
        $this->PermHouseNo->SetDBValue($this->f("PermHouseNo"));
        $this->PermStreet->SetDBValue($this->f("PermStreet"));
        $this->PermSubVillage->SetDBValue($this->f("PermSubVillage"));
        $this->PermBrgy->SetDBValue($this->f("PermBrgy"));
        $this->PermMunicipality->SetDBValue($this->f("PermMunicipality"));
        $this->PermProvince->SetDBValue($this->f("PermProvince"));
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
        $this->EmpPicture2->SetDBValue($this->f("EmpPicture"));
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

//Class_Initialize Event @3-D1E04C6C
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
            $this->ClearParameters->Parameters = CCGetQueryString("QueryString", array("s_EmployeeID", "s_Surname", "s_FirstName", "s_MiddleName", "s_MiddleInitial", "s_NameExtension", "s_OfficeID", "s_PermMunicipality", "s_Sex", "s_CivilStatus", "ccsForm"));
            $this->ClearParameters->Page = "Q.php";
            $this->Button_DoSearch = & new clsButton("Button_DoSearch", $Method, $this);
            $this->s_EmployeeID = & new clsControl(ccsTextBox, "s_EmployeeID", "s_EmployeeID", ccsInteger, "", CCGetRequestParam("s_EmployeeID", $Method, NULL), $this);
            $this->s_Surname = & new clsControl(ccsTextBox, "s_Surname", "s_Surname", ccsText, "", CCGetRequestParam("s_Surname", $Method, NULL), $this);
            $this->s_FirstName = & new clsControl(ccsTextBox, "s_FirstName", "s_FirstName", ccsText, "", CCGetRequestParam("s_FirstName", $Method, NULL), $this);
            $this->s_MiddleName = & new clsControl(ccsTextBox, "s_MiddleName", "s_MiddleName", ccsText, "", CCGetRequestParam("s_MiddleName", $Method, NULL), $this);
            $this->s_MiddleInitial = & new clsControl(ccsTextBox, "s_MiddleInitial", "s_MiddleInitial", ccsText, "", CCGetRequestParam("s_MiddleInitial", $Method, NULL), $this);
            $this->s_NameExtension = & new clsControl(ccsTextBox, "s_NameExtension", "s_NameExtension", ccsText, "", CCGetRequestParam("s_NameExtension", $Method, NULL), $this);
            $this->s_OfficeID = & new clsControl(ccsListBox, "s_OfficeID", "s_OfficeID", ccsInteger, "", CCGetRequestParam("s_OfficeID", $Method, NULL), $this);
            $this->s_OfficeID->DSType = dsTable;
            $this->s_OfficeID->DataSource = new clsDBConnection1();
            $this->s_OfficeID->ds = & $this->s_OfficeID->DataSource;
            $this->s_OfficeID->DataSource->SQL = "SELECT * \n" .
"FROM departmentoffice {SQL_Where} {SQL_OrderBy}";
            list($this->s_OfficeID->BoundColumn, $this->s_OfficeID->TextColumn, $this->s_OfficeID->DBFormat) = array("OfficeID", "OfficeAcronym", "");
            $this->s_PermMunicipality = & new clsControl(ccsListBox, "s_PermMunicipality", "s_PermMunicipality", ccsText, "", CCGetRequestParam("s_PermMunicipality", $Method, NULL), $this);
            $this->s_Sex = & new clsControl(ccsListBox, "s_Sex", "s_Sex", ccsText, "", CCGetRequestParam("s_Sex", $Method, NULL), $this);
            $this->s_CivilStatus = & new clsControl(ccsListBox, "s_CivilStatus", "s_CivilStatus", ccsText, "", CCGetRequestParam("s_CivilStatus", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @3-C73C7D51
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_EmployeeID->Validate() && $Validation);
        $Validation = ($this->s_Surname->Validate() && $Validation);
        $Validation = ($this->s_FirstName->Validate() && $Validation);
        $Validation = ($this->s_MiddleName->Validate() && $Validation);
        $Validation = ($this->s_MiddleInitial->Validate() && $Validation);
        $Validation = ($this->s_NameExtension->Validate() && $Validation);
        $Validation = ($this->s_OfficeID->Validate() && $Validation);
        $Validation = ($this->s_PermMunicipality->Validate() && $Validation);
        $Validation = ($this->s_Sex->Validate() && $Validation);
        $Validation = ($this->s_CivilStatus->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_EmployeeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Surname->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_FirstName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleName->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_MiddleInitial->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_NameExtension->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_OfficeID->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_PermMunicipality->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_Sex->Errors->Count() == 0);
        $Validation =  $Validation && ($this->s_CivilStatus->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @3-17937933
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->ClearParameters->Errors->Count());
        $errors = ($errors || $this->s_EmployeeID->Errors->Count());
        $errors = ($errors || $this->s_Surname->Errors->Count());
        $errors = ($errors || $this->s_FirstName->Errors->Count());
        $errors = ($errors || $this->s_MiddleName->Errors->Count());
        $errors = ($errors || $this->s_MiddleInitial->Errors->Count());
        $errors = ($errors || $this->s_NameExtension->Errors->Count());
        $errors = ($errors || $this->s_OfficeID->Errors->Count());
        $errors = ($errors || $this->s_PermMunicipality->Errors->Count());
        $errors = ($errors || $this->s_Sex->Errors->Count());
        $errors = ($errors || $this->s_CivilStatus->Errors->Count());
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

//Operation Method @3-CACEFD07
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
        $Redirect = "Q.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "Q.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @3-0D1E3743
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

        $this->s_OfficeID->Prepare();
        $this->s_PermMunicipality->Prepare();
        $this->s_Sex->Prepare();
        $this->s_CivilStatus->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->ClearParameters->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_EmployeeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Surname->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_FirstName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MiddleName->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_MiddleInitial->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_NameExtension->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_OfficeID->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_PermMunicipality->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_Sex->Errors->ToString());
            $Error = ComposeStrings($Error, $this->s_CivilStatus->Errors->ToString());
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
        $this->s_EmployeeID->Show();
        $this->s_Surname->Show();
        $this->s_FirstName->Show();
        $this->s_MiddleName->Show();
        $this->s_MiddleInitial->Show();
        $this->s_NameExtension->Show();
        $this->s_OfficeID->Show();
        $this->s_PermMunicipality->Show();
        $this->s_Sex->Show();
        $this->s_CivilStatus->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End employeeSearch Class @3-FCB6E20C

//Initialize Page @1-8638A89C
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
$TemplateFileName = "Q.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "./";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-C6543C46
include_once("./Q_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-F0D5BE70
$DBConnection1 = new clsDBConnection1();
$MainPage->Connections["Connection1"] = & $DBConnection1;
$Attributes = new clsAttributes("page:");
$MainPage->Attributes = & $Attributes;

// Controls
$employee = & new clsReportemployee("", $MainPage);
$employeeSearch = & new clsRecordemployeeSearch("", $MainPage);
$MainPage->employee = & $employee;
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

//Show Page @1-412EC42C
$employee->Show();
$employeeSearch->Show();
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
