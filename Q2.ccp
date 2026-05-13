<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Report id="2" secured="False" enablePrint="False" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="65" linesPerPhysicalPage="50" connection="Connection1" dataSource="employee" name="employee" orderBy="Surname" pageSizeLimit="100" wizardCaption=" Employee " wizardLayoutType="Form">
			<Components>
				<Section id="28" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="34" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="employeeReport_HeaderReport_TotalRecords">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="29" visible="True" lines="0" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="30" visible="True" lines="56" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="62" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="EmployeeIDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailEmployeeIDNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="63" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="64" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="66" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleInitial" fieldSource="MiddleInitial" wizardCaption="MiddleInitial" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailMiddleInitial">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="67" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="NameExtension" fieldSource="NameExtension" wizardCaption="NameExtension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailNameExtension">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="68" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthMonth" fieldSource="BirthMonth" wizardCaption="BirthMonth" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailBirthMonth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="71" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PlaceOfBirth" fieldSource="PlaceOfBirth" wizardCaption="PlaceOfBirth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPlaceOfBirth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="72" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Sex" fieldSource="Sex" wizardCaption="Sex" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSex">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="73" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="CivilStatus" fieldSource="CivilStatus" wizardCaption="CivilStatus" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailCivilStatus">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="74" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Height" fieldSource="Height" wizardCaption="Height" wizardSize="7" wizardMaxLength="7" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailHeight">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="75" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Weight" fieldSource="Weight" wizardCaption="Weight" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailWeight">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="76" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BloodType" fieldSource="BloodType" wizardCaption="BloodType" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailBloodType">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="77" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="GsisIdNo" fieldSource="GsisIdNo" wizardCaption="GsisIdNo" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailGsisIdNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="78" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="GsisBPN" fieldSource="GsisBPN" wizardCaption="GsisBPN" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailGsisBPN">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="79" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PagIbigIDNo" fieldSource="PagIbigIDNo" wizardCaption="PagIbigIDNo" wizardSize="14" wizardMaxLength="14" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPagIbigIDNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="80" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PhilhealthNo" fieldSource="PhilhealthNo" wizardCaption="PhilhealthNo" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPhilhealthNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="81" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SssNo" fieldSource="SssNo" wizardCaption="SssNo" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSssNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="82" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Tin" fieldSource="Tin" wizardCaption="Tin" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailTin">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="83" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="AgencyEmpNo" fieldSource="AgencyEmpNo" wizardCaption="AgencyEmpNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailAgencyEmpNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="84" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Citizenship" fieldSource="Citizenship" wizardCaption="Citizenship" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailCitizenship">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="85" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ResHouseNo" fieldSource="ResHouseNo" wizardCaption="ResHouseNo" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailResHouseNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="92" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermHouseNo" fieldSource="PermHouseNo" wizardCaption="PermHouseNo" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPermHouseNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="94" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermSubVillage" fieldSource="PermSubVillage" wizardCaption="PermSubVillage" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPermSubVillage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="96" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermMunicipality" fieldSource="PermMunicipality" wizardCaption="PermMunicipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPermMunicipality">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="98" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermZipcode" fieldSource="PermZipcode" wizardCaption="PermZipcode" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPermZipcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="99" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="TelNo" fieldSource="TelNo" wizardCaption="TelNo" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailTelNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="100" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MobileNo" fieldSource="MobileNo" wizardCaption="MobileNo" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailMobileNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="101" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="EmailAdd" fieldSource="EmailAdd" wizardCaption="EmailAdd" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailEmailAdd">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="102" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseSurname" fieldSource="SpouseSurname" wizardCaption="SpouseSurname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="103" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseFirstName" fieldSource="SpouseFirstName" wizardCaption="SpouseFirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="104" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseMiddleName" fieldSource="SpouseMiddleName" wizardCaption="SpouseMiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="105" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseNameExt" fieldSource="SpouseNameExt" wizardCaption="SpouseNameExt" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseNameExt">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="106" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseOccupatn" fieldSource="SpouseOccupatn" wizardCaption="SpouseOccupatn" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseOccupatn">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="107" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseBusinessName" fieldSource="SpouseBusinessName" wizardCaption="SpouseBusinessName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseBusinessName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="108" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseBusinessAddress" fieldSource="SpouseBusinessAddress" wizardCaption="SpouseBusinessAddress" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseBusinessAddress">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="109" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SpouseTelNo" fieldSource="SpouseTelNo" wizardCaption="SpouseTelNo" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailSpouseTelNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="110" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FatherSurname" fieldSource="FatherSurname" wizardCaption="FatherSurname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailFatherSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="111" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FatherFirstName" fieldSource="FatherFirstName" wizardCaption="FatherFirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailFatherFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="112" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FatherMiddleName" fieldSource="FatherMiddleName" wizardCaption="FatherMiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailFatherMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="113" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FatherNameExt" fieldSource="FatherNameExt" wizardCaption="FatherNameExt" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailFatherNameExt">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="114" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MotherMaiden" fieldSource="MotherMaiden" wizardCaption="MotherMaiden" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailMotherMaiden">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="115" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MotherSurname" fieldSource="MotherSurname" wizardCaption="MotherSurname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailMotherSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="116" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MotherFirstName" fieldSource="MotherFirstName" wizardCaption="MotherFirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailMotherFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="117" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MotherMiddleName" fieldSource="MotherMiddleName" wizardCaption="MotherMiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailMotherMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Image id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EmpPicture3" PathID="employeeDetailEmpPicture3" fieldSource="EmpPicture">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
						<Link id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="employeeDetailLink1" hrefSource="QChildren.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="120" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="employeeDetailLink2" hrefSource="QEducation.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="122" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="employeeDetailLink3" hrefSource="QEligibility.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="124" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="employeeDetailLink4" hrefSource="QWorkExp2.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="126" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link5" PathID="employeeDetailLink5" hrefSource="QTraining2.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="128" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link6" PathID="employeeDetailLink6" hrefSource="QSkills.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="130" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link7" PathID="employeeDetailLink7" hrefSource="QDistinctions.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="132" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link8" PathID="employeeDetailLink8" hrefSource="QMembership.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="134" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link9" PathID="employeeDetailLink9" hrefSource="QConsanguinity.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="136" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link10" PathID="employeeDetailLink10" hrefSource="QReferences.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="138" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="139" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link11" PathID="employeeDetailLink11" hrefSource="QServiceRecord.ccp" wizardUseTemplateBlock="False">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="140" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<Link id="141" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link12" PathID="employeeDetailLink12" wizardUseTemplateBlock="False" hrefSource="QCurrentEmployment.ccp">
							<Components/>
							<Events/>
							<LinkParameters>
								<LinkParameter id="143" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
							</LinkParameters>
							<Attributes/>
							<Features/>
						</Link>
						<ReportLabel id="69" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthDay" fieldSource="BirthDay" wizardCaption="BirthDay" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailBirthDay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="70" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthYear" fieldSource="BirthYear" wizardCaption="BirthYear" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailBirthYear">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="86" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ResStreet" fieldSource="ResStreet" wizardCaption="ResStreet" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailResStreet">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="87" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ResSubVillage" fieldSource="ResSubVillage" wizardCaption="ResSubVillage" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailResSubVillage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="88" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ResBrgy" fieldSource="ResBrgy" wizardCaption="ResBrgy" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailResBrgy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="89" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ResMunicipality" fieldSource="ResMunicipality" wizardCaption="ResMunicipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailResMunicipality">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="90" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ResProvince" fieldSource="ResProvince" wizardCaption="ResProvince" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailResProvince">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="91" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ResZipcode" fieldSource="ResZipcode" wizardCaption="ResZipcode" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailResZipcode">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="93" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermStreet" fieldSource="PermStreet" wizardCaption="PermStreet" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPermStreet">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="95" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermBrgy" fieldSource="PermBrgy" wizardCaption="PermBrgy" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPermBrgy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="97" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermProvince" fieldSource="PermProvince" wizardCaption="PermProvince" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employeeDetailPermProvince">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="31" visible="True" lines="2" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="32" visible="True" name="NoRecords" wizardNoRecords="No records">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="33" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<ReportLabel id="35" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentPage" fieldSource="PageNumber" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardPrefix="Page " PathID="employeePage_FooterReport_CurrentPage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="36" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalPages" fieldSource="TotalPages" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardPrefix=" of " PathID="employeePage_FooterReport_TotalPages">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="37" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Joyful">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="38" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="40" conditionType="Parameter" useIsNull="False" field="EmployeeIDNo" parameterSource="s_EmployeeIDNo" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
				<TableParameter id="41" conditionType="Parameter" useIsNull="False" field="Surname" parameterSource="s_Surname" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="43" conditionType="Parameter" useIsNull="False" field="MiddleName" parameterSource="s_MiddleName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
				<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="Sex" parameterSource="s_Sex" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
				<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="CivilStatus" parameterSource="s_CivilStatus" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="6"/>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="PermMunicipality" parameterSource="s_PermMunicipality" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="7"/>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="OfficeID" parameterSource="s_OfficeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="8"/>
				<TableParameter id="48" conditionType="Parameter" useIsNull="False" field="StatAppt" parameterSource="s_StatAppt" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="9"/>
				<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="SalaryGrade" parameterSource="s_SalaryGrade" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="10"/>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="OrigApptMonth" parameterSource="s_OrigApptMonth" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="11"/>
				<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="OrigApptDay" parameterSource="s_OrigApptDay" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="12"/>
				<TableParameter id="52" conditionType="Parameter" useIsNull="False" field="OrigApptYear" parameterSource="s_OrigApptYear" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="13"/>
				<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="PromotedMonth" parameterSource="s_PromotedMonth" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="14"/>
				<TableParameter id="54" conditionType="Parameter" useIsNull="False" field="PromotedDay" parameterSource="s_PromotedDay" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="15"/>
				<TableParameter id="55" conditionType="Parameter" useIsNull="False" field="PromotedYear" parameterSource="s_PromotedYear" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="16"/>
				<TableParameter id="56" conditionType="Parameter" useIsNull="False" field="CompRetireMonth" parameterSource="s_CompRetireMonth" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="17"/>
				<TableParameter id="57" conditionType="Parameter" useIsNull="False" field="CompRetireDay" parameterSource="s_CompRetireDay" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="18"/>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="CompRetireYear" parameterSource="s_CompRetireYear" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="19"/>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" field="SeparationMonth" parameterSource="s_SeparationMonth" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="20"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" field="SeparationDay" parameterSource="s_SeparationDay" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="21"/>
				<TableParameter id="61" conditionType="Parameter" useIsNull="False" field="SeparationYear" parameterSource="s_SeparationYear" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="22"/>
			</TableParameters>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Link id="142" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employeeSearch" wizardCaption="Search Employee " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="Q2.ccp" PathID="employeeSearch" pasteActions="pasteActions">
			<Components>
				<ListBox id="16" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_OrigApptMonth" wizardCaption="Orig Appt Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_OrigApptMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="17" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_OrigApptDay" wizardCaption="Orig Appt Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_OrigApptDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="18" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_OrigApptYear" wizardCaption="Orig Appt Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_OrigApptYear">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_PromotedMonth" wizardCaption="Promoted Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_PromotedMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="20" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_PromotedDay" wizardCaption="Promoted Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_PromotedDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_PromotedYear" wizardCaption="Promoted Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_PromotedYear">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="22" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_CompRetireMonth" wizardCaption="Comp Retire Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_CompRetireMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="23" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_CompRetireDay" wizardCaption="Comp Retire Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_CompRetireDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_CompRetireYear" wizardCaption="Comp Retire Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_CompRetireYear">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="25" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_SeparationMonth" wizardCaption="Separation Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_SeparationMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="26" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_SeparationDay" wizardCaption="Separation Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_SeparationDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_SeparationYear" wizardCaption="Separation Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_SeparationYear">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="employeeSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="Q2.ccp" removeParameters="s_EmployeeIDNo;s_Surname;s_FirstName;s_MiddleName;s_Sex;s_CivilStatus;s_PermMunicipality;s_OfficeID;s_StatAppt;s_SalaryGrade;s_OrigApptMonth;s_OrigApptDay;s_OrigApptYear;s_PromotedMonth;s_PromotedDay;s_PromotedYear;s_CompRetireMonth;s_CompRetireDay;s_CompRetireYear;s_SeparationMonth;s_SeparationDay;s_SeparationYear" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="employeeSearchClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<ListBox id="14" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_StatAppt" wizardCaption="Stat Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_StatAppt" connection="Connection1" dataSource="lut_statofappt" boundColumn="StatAppt" textColumn="StatAppt">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="13" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_OfficeID" wizardCaption="Office ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_OfficeID" connection="Connection1" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="OfficeAcronym">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="12" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_PermMunicipality" wizardCaption="Perm Municipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employeeSearchs_PermMunicipality" connection="Connection1" dataSource="lut_municipality" boundColumn="Municipality" textColumn="Municipality">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_Surname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="employeeSearchs_EmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters/>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<ISPParameters/>
			<ISQLParameters/>
			<IFormElements/>

			<USPParameters/>
			<USQLParameters/>
			<UConditions/>
			<UFormElements/>
			<DSPParameters/>
			<DSQLParameters/>
			<DConditions/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Record>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="Q2_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="Q2.php" forShow="True" url="Q2.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
