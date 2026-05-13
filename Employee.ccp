<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employeeSearch" wizardCaption="Search Employee " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="Employee.ccp" PathID="employeeSearch" connection="Connection1" activeCollection="TableParameters">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="Employee.ccp" removeParameters="s_EmployeeIDNo;s_Surname;s_FirstName;s_MiddleName" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="employeeSearchClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="employeeSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="employeeSearchs_EmployeeIDNo">
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
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
			</JoinTables>
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
		<Record id="76" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee1" dataSource="employee" errorSummator="Error" wizardCaption="Add/Edit Employee " wizardFormMethod="post" PathID="employee1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Button id="77" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="78" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="79" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="employee1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="80" message="Delete record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="81" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EmployeeIDNo" fieldSource="EmployeeIDNo" required="False" caption="IDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1EmployeeIDNo">
					<Components/>
					<Events/>

					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Surname" fieldSource="Surname" required="True" caption="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Surname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FirstName" fieldSource="FirstName" required="True" caption="First Name" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MiddleName" fieldSource="MiddleName" required="True" caption="Middle Name" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MiddleInitial" fieldSource="MiddleInitial" required="False" caption="Middle Initial" wizardCaption="Middle Initial" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MiddleInitial">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NameExtension" fieldSource="NameExtension" required="False" caption="Name Extension" wizardCaption="Name Extension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1NameExtension" sourceType="Table" connection="Connection1" dataSource="lut_namext" boundColumn="NameEx" textColumn="NameEx">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="89" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BirthMonth" fieldSource="BirthMonth" required="False" caption="Birth Month" wizardCaption="Birth Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BirthMonth" sourceType="Table" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PlaceOfBirth" fieldSource="PlaceOfBirth" required="False" caption="Place Of Birth" wizardCaption="Place Of Birth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PlaceOfBirth">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="93" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Sex" fieldSource="Sex" required="False" caption="Sex" wizardCaption="Sex" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Sex" sourceType="Table" connection="Connection1" dataSource="lut_sex" boundColumn="SexID" textColumn="Sex">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<ListBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CivilStatus" fieldSource="CivilStatus" required="False" caption="Civil Status" wizardCaption="Civil Status" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1CivilStatus" sourceType="Table" connection="Connection1" dataSource="lut_civilstatus" boundColumn="CivilStat" textColumn="CivilStat">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="95" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Height" fieldSource="Height" required="False" caption="Height" wizardCaption="Height" wizardSize="7" wizardMaxLength="7" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Height">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Weight" fieldSource="Weight" required="False" caption="Weight" wizardCaption="Weight" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Weight">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="97" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BloodType" fieldSource="BloodType" required="False" caption="Blood Type" wizardCaption="Blood Type" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BloodType" sourceType="Table" connection="Connection1" dataSource="lut_bloodtype" boundColumn="BloodType" textColumn="BloodType">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GsisIdNo" fieldSource="GsisIdNo" required="False" caption="Gsis Id No" wizardCaption="Gsis Id No" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1GsisIdNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GsisBPN" fieldSource="GsisBPN" required="False" caption="Gsis BPN" wizardCaption="Gsis BPN" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1GsisBPN">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PagIbigIDNo" fieldSource="PagIbigIDNo" required="False" caption="Pag Ibig IDNo" wizardCaption="Pag Ibig IDNo" wizardSize="14" wizardMaxLength="14" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PagIbigIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="101" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PhilhealthNo" fieldSource="PhilhealthNo" required="False" caption="Philhealth No" wizardCaption="Philhealth No" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PhilhealthNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SssNo" fieldSource="SssNo" required="False" caption="Sss No" wizardCaption="Sss No" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SssNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="103" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Tin" fieldSource="Tin" required="False" caption="Tin" wizardCaption="Tin" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Tin">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="AgencyEmpNo" fieldSource="AgencyEmpNo" required="False" caption="Agency Emp No" wizardCaption="Agency Emp No" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1AgencyEmpNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Citizenship" fieldSource="Citizenship" required="False" caption="Citizenship" wizardCaption="Citizenship" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Citizenship">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResHouseNo" fieldSource="ResHouseNo" required="False" caption="Res House No" wizardCaption="Res House No" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResHouseNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="108" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResSubVillage" fieldSource="ResSubVillage" required="False" caption="Res Sub Village" wizardCaption="Res Sub Village" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResSubVillage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResMunicipality" fieldSource="ResMunicipality" required="False" caption="Res Municipality" wizardCaption="Res Municipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResMunicipality" sourceType="Table" connection="Connection1" dataSource="lut_municipality" boundColumn="Municipality" textColumn="Municipality">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResZipcode" fieldSource="ResZipcode" required="False" caption="Res Zipcode" wizardCaption="Res Zipcode" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResZipcode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermHouseNo" fieldSource="PermHouseNo" required="False" caption="Perm House No" wizardCaption="Perm House No" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermHouseNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermSubVillage" fieldSource="PermSubVillage" required="False" caption="Perm Sub Village" wizardCaption="Perm Sub Village" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermSubVillage">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermMunicipality" fieldSource="PermMunicipality" required="False" caption="Perm Municipality" wizardCaption="Perm Municipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermMunicipality" sourceType="Table" connection="Connection1" dataSource="lut_municipality" boundColumn="Municipality" textColumn="Municipality">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermZipcode" fieldSource="PermZipcode" required="False" caption="Perm Zipcode" wizardCaption="Perm Zipcode" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermZipcode">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="120" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TelNo" fieldSource="TelNo" required="False" caption="Tel No" wizardCaption="Tel No" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1TelNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MobileNo" fieldSource="MobileNo" required="False" caption="Mobile No" wizardCaption="Mobile No" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MobileNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="122" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EmailAdd" fieldSource="EmailAdd" required="False" caption="Email Add" wizardCaption="Email Add" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1EmailAdd">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseSurname" fieldSource="SpouseSurname" required="False" caption="Spouse Surname" wizardCaption="Spouse Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseSurname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseFirstName" fieldSource="SpouseFirstName" required="False" caption="Spouse First Name" wizardCaption="Spouse First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseMiddleName" fieldSource="SpouseMiddleName" required="False" caption="Spouse Middle Name" wizardCaption="Spouse Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseNameExt" fieldSource="SpouseNameExt" required="False" caption="Spouse Name Ext" wizardCaption="Spouse Name Ext" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseNameExt" sourceType="Table" connection="Connection1" dataSource="lut_namext" boundColumn="NameEx" textColumn="NameEx">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseOccupatn" fieldSource="SpouseOccupatn" required="False" caption="Spouse Occupatn" wizardCaption="Spouse Occupatn" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseOccupatn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseBusinessName" fieldSource="SpouseBusinessName" required="False" caption="Spouse Business Name" wizardCaption="Spouse Business Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseBusinessName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseBusinessAddress" fieldSource="SpouseBusinessAddress" required="False" caption="Spouse Business Address" wizardCaption="Spouse Business Address" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseBusinessAddress">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseTelNo" fieldSource="SpouseTelNo" required="False" caption="Spouse Tel No" wizardCaption="Spouse Tel No" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseTelNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherSurname" fieldSource="FatherSurname" required="False" caption="Father Surname" wizardCaption="Father Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherSurname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="132" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherFirstName" fieldSource="FatherFirstName" required="False" caption="Father First Name" wizardCaption="Father First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherMiddleName" fieldSource="FatherMiddleName" required="False" caption="Father Middle Name" wizardCaption="Father Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherNameExt" fieldSource="FatherNameExt" required="False" caption="Father Name Ext" wizardCaption="Father Name Ext" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherNameExt" sourceType="Table" connection="Connection1" dataSource="lut_namext" boundColumn="NameEx" textColumn="NameEx">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherMaiden" fieldSource="MotherMaiden" required="False" caption="Mother Maiden" wizardCaption="Mother Maiden" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherMaiden">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="136" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherSurname" fieldSource="MotherSurname" required="False" caption="Mother Surname" wizardCaption="Mother Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherSurname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherFirstName" fieldSource="MotherFirstName" required="False" caption="Mother First Name" wizardCaption="Mother First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherMiddleName" fieldSource="MotherMiddleName" required="False" caption="Mother Middle Name" wizardCaption="Mother Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="90" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BirthDay" fieldSource="BirthDay" required="False" caption="Birth Day" wizardCaption="Birth Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BirthDay" sourceType="Table" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BirthYear" fieldSource="BirthYear" required="False" caption="Birth Year" wizardCaption="Birth Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BirthYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResStreet" fieldSource="ResStreet" required="False" caption="Res Street" wizardCaption="Res Street" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResStreet">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="109" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResBrgy" fieldSource="ResBrgy" required="False" caption="Res Brgy" wizardCaption="Res Brgy" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResBrgy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="111" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResProvince" fieldSource="ResProvince" required="False" caption="Res Province" wizardCaption="Res Province" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResProvince">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermStreet" fieldSource="PermStreet" required="False" caption="Perm Street" wizardCaption="Perm Street" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermStreet">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermBrgy" fieldSource="PermBrgy" required="False" caption="Perm Brgy" wizardCaption="Perm Brgy" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermBrgy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermProvince" fieldSource="PermProvince" required="False" caption="Perm Province" wizardCaption="Perm Province" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermProvince">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<FileUpload id="140" fieldSourceType="DBColumn" allowedFileMasks="*" fileSizeLimit="100000" dataType="Text" tempFileFolder="tempfolder" name="FileUpload1" PathID="employee1FileUpload1" fieldSource="EmpPicture" processedFileFolder="photofolder">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</FileUpload>
				<TextBox id="182" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox1" PathID="employee1TextBox1" fieldSource="BirthDate" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="184" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox1" wizardEmptyCaption="Select Value" PathID="employee1ListBox1" connection="Connection1" fieldSource="Title" dataSource="lut_title" boundColumn="Title" textColumn="Title">
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
				<ListBox id="185" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox2" wizardEmptyCaption="Select Value" PathID="employee1ListBox2" connection="Connection1" dataSource="lut_identity" boundColumn="identity" textColumn="identity" fieldSource="Identity">
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
				<TextBox id="190" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox2" PathID="employee1TextBox2" fieldSource="EmergencyName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="191" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox3" PathID="employee1TextBox3" fieldSource="EmergencyAddress">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="192" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox4" PathID="employee1TextBox4" fieldSource="EmergencyContact">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="82" conditionType="Parameter" useIsNull="False" field="EmployeeID" parameterSource="EmployeeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="180" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="181" fieldName="*"/>
			</Fields>
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
		<Link id="156" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee" name="employee" pageSizeLimit="100" wizardCaption="List of Employee " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" pasteActions="pasteActions" activeCollection="TableParameters" orderBy="EmployeeID">
			<Components>
				<Link id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employee_Insert" hrefSource="Employee.ccp" removeParameters="EmployeeID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="employeeemployee_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="12" fieldSourceType="DBColumn" dataType="Integer" html="False" name="employee_TotalRecords" wizardUseTemplateBlock="False" PathID="employeeemployee_TotalRecords" format="#,##0">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="13"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Link id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="Employee.ccp" wizardThemeItem="GridA" PathID="employeeEmployeeID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="38" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeSurname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleName" fieldSource="MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="48" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmpPicture" fieldSource="EmpPicture" wizardCaption="Emp Picture" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmpPicture" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Link id="50" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleInitial" fieldSource="MiddleInitial" wizardCaption="Middle Initial" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleInitial" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="Children.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="141" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Navigator id="75" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="56" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthDay" fieldSource="BirthDay" wizardCaption="Birth Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthDay" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="WorkExperience2.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="157" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="62" fieldSourceType="DBColumn" dataType="Text" html="False" name="Sex" fieldSource="Sex" wizardCaption="Sex" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeSex" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="SpecialSkills.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="146" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="68" fieldSourceType="DBColumn" dataType="Text" html="False" name="Weight" wizardCaption="Weight" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeWeight" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="ConsanguinityAffinity.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="150" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="52" fieldSourceType="DBColumn" dataType="Text" html="False" name="NameExtension" fieldSource="NameExtension" wizardCaption="Name Extension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeNameExtension" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="EducBackground.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="142" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="54" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthMonth" fieldSource="BirthMonth" wizardCaption="Birth Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthMonth" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="Eligibility.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="143" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="58" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthYear" fieldSource="BirthYear" wizardCaption="Birth Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthYear" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="VoluntaryWork.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="144" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="60" fieldSourceType="DBColumn" dataType="Text" html="False" name="PlaceOfBirth" fieldSource="PlaceOfBirth" wizardCaption="Place Of Birth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeePlaceOfBirth" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="Training2.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="158" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="64" fieldSourceType="DBColumn" dataType="Text" html="False" name="CivilStatus" fieldSource="CivilStatus" wizardCaption="Civil Status" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeCivilStatus" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="NonAcademicDistinctions.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="147" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="66" fieldSourceType="DBColumn" dataType="Text" html="False" name="Height" fieldSource="Height" wizardCaption="Height" wizardSize="7" wizardMaxLength="7" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeHeight" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="MembershipAssocOrg.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="148" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="70" fieldSourceType="DBColumn" dataType="Text" html="False" name="BloodType" fieldSource="BloodType" wizardCaption="Blood Type" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBloodType" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="References.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="149" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="72" fieldSourceType="DBColumn" dataType="Text" html="False" name="GsisIdNo" wizardCaption="Gsis Id No" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeGsisIdNo" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="ServiceRecord3.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="159" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
				<Link id="74" fieldSourceType="DBColumn" dataType="Text" html="False" name="GsisBPN" wizardCaption="Gsis BPN" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeGsisBPN" visible="Yes" hrefType="Page" urlType="Relative" preserveParameters="GET" hrefSource="CurrentPosition.ccp">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<LinkParameters>
						<LinkParameter id="166" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="14" conditionType="Parameter" useIsNull="False" field="EmployeeIDNo" parameterSource="s_EmployeeIDNo" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
				<TableParameter id="15" conditionType="Parameter" useIsNull="False" field="Surname" parameterSource="s_Surname" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="16" conditionType="Parameter" useIsNull="False" field="FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="17" conditionType="Parameter" useIsNull="False" field="MiddleName" parameterSource="s_MiddleName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
				<TableParameter id="176" conditionType="Parameter" useIsNull="False" field="StatApptID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="StatApptID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="175" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="225"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="10" tableName="employee" fieldName="EmployeeID"/>
				<Field id="39" tableName="employee" fieldName="EmployeeIDNo"/>
				<Field id="41" tableName="employee" fieldName="Surname"/>
				<Field id="43" tableName="employee" fieldName="FirstName"/>
				<Field id="45" tableName="employee" fieldName="MiddleName"/>
				<Field id="47" tableName="employee" fieldName="EmpPicture"/>
				<Field id="49" tableName="employee" fieldName="MiddleInitial"/>
				<Field id="51" tableName="employee" fieldName="NameExtension"/>
				<Field id="53" tableName="employee" fieldName="BirthMonth"/>
				<Field id="55" tableName="employee" fieldName="BirthDay"/>
				<Field id="57" tableName="employee" fieldName="BirthYear"/>
				<Field id="59" tableName="employee" fieldName="PlaceOfBirth"/>
				<Field id="61" tableName="employee" fieldName="Sex"/>
				<Field id="63" tableName="employee" fieldName="CivilStatus"/>
				<Field id="65" tableName="employee" fieldName="Height"/>
				<Field id="67" tableName="employee" fieldName="Weight"/>
				<Field id="69" tableName="employee" fieldName="BloodType"/>
				<Field id="71" tableName="employee" fieldName="GsisIdNo"/>
				<Field id="73" tableName="employee" fieldName="GsisBPN"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="Employee_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="Employee.php" forShow="True" url="Employee.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="186" groupID="7"/>
		<Group id="187" groupID="6"/>
		<Group id="188" groupID="5"/>
		<Group id="189" groupID="3"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events>
		<Event name="BeforeShow" type="Server">
			<Actions>
				<Action actionName="Custom Code" actionCategory="General" id="178"/>
			</Actions>
		</Event>
	</Events>
</Page>
