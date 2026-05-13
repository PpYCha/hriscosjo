<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee, lut_modeseparatn" name="employee" pageSizeLimit="100" wizardCaption="List of Employee " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="TableParameters">
			<Components>
				<Link id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="CurrentPosition.ccp" wizardThemeItem="GridA" PathID="employeeEmployeeID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="15" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeSurname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleName" fieldSource="MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="NameExtension" fieldSource="NameExtension" wizardCaption="Name Extension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeNameExtension">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthMonth" fieldSource="BirthMonth" wizardCaption="Birth Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthMonth">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="32" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthDay" fieldSource="BirthDay" wizardCaption="Birth Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthDay">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthYear" fieldSource="BirthYear" wizardCaption="Birth Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="109" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="108" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="330"/>
				<JoinTable id="162" tableName="lut_modeseparatn" posLeft="191" posTop="10" posWidth="142" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="171" tableLeft="employee" tableRight="lut_modeseparatn" fieldLeft="employee.ModeSeparatnID" fieldRight="lut_modeseparatn.ModeSeparatnID" joinType="left" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="3" tableName="employee" fieldName="EmployeeID"/>
				<Field id="16" tableName="employee" fieldName="EmployeeIDNo"/>
				<Field id="18" tableName="employee" fieldName="Surname"/>
				<Field id="20" tableName="employee" fieldName="FirstName"/>
				<Field id="22" tableName="employee" fieldName="MiddleName"/>
				<Field id="26" tableName="employee" fieldName="BirthMonth"/>
				<Field id="28" tableName="employee" fieldName="BirthDay"/>
				<Field id="30" tableName="employee" fieldName="BirthYear"/>
				<Field id="164" tableName="lut_modeseparatn" fieldName="lut_modeseparatn.*"/>
				<Field id="166" tableName="employee" fieldName="NameExtension"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="33" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="True" allowDelete="False" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee1" errorSummator="Error" wizardCaption="Add/Edit Employee " wizardFormMethod="post" PathID="employee1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" dataSource="employee">
			<Components>
				<Button id="34" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="35" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="36" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="employee1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="37" message="Delete record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="38" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="40" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Position" fieldSource="Position" required="False" caption="Position" wizardCaption="Position" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Position">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="42" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="EffectiveMonth" fieldSource="EffectiveMonth" required="False" caption="Effective Month" wizardCaption="Effective Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1EffectiveMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="117" tableName="lut_month" posLeft="10" posTop="10" posWidth="95" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Single" name="MonthlySalary" fieldSource="MonthlySalary" required="False" caption="Monthly Salary" wizardCaption="Monthly Salary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MonthlySalary">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="48" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StatAppt" fieldSource="StatAppID" required="False" caption="Stat Appt" wizardCaption="Stat Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StatAppt" connection="Connection1" dataSource="lut_statofappt2" boundColumn="StatAppID" textColumn="StatApp">
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
				<ListBox id="49" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="OfficeID" fieldSource="OfficeID" required="False" caption="Office ID" wizardCaption="Office ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1OfficeID" connection="Connection1" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="NameOfficeDept" orderBy="NameOfficeDept">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="141" tableName="departmentoffice" posLeft="10" posTop="10" posWidth="129" posHeight="180"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="50" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="OrigApptMonth" fieldSource="OrigApptMonth" required="False" caption="Orig Appt Month" wizardCaption="Orig Appt Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1OrigApptMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<CheckBox id="90" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="DetailedID" fieldSource="DetailedID" required="False" caption="Detailed ID" wizardCaption="Detailed ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" checkedValue="1" uncheckedValue="0" PathID="employee1DetailedID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DetailedOffice" fieldSource="DetailedOffice" required="False" caption="Detailed Office" wizardCaption="Detailed Office" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DetailedOffice">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DetailedDate" fieldSource="DetailedDate" required="False" caption="Detailed Date" wizardCaption="Detailed Date" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DetailedDate" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="93" name="DatePicker_DetailedDate" control="DetailedDate" wizardSatellite="True" wizardControl="DetailedDate" wizardDatePickerType="Image" wizardPicture="Styles/Fresh/Images/DatePicker.gif" style="Styles/Fresh/Style.css" PathID="employee1DatePicker_DetailedDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DetailedRemarks" fieldSource="DetailedRemarks" required="False" caption="Detailed Remarks" wizardCaption="Detailed Remarks" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DetailedRemarks">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="43" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="EffectiveDay" fieldSource="EffectiveDay" required="False" caption="Effective Day" wizardCaption="Effective Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1EffectiveDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EffectiveYear" fieldSource="EffectiveYear" required="False" caption="Effective Year" wizardCaption="Effective Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1EffectiveYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="51" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="OrigApptDay" fieldSource="OrigApptDay" required="False" caption="Orig Appt Day" wizardCaption="Orig Appt Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1OrigApptDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OrigApptYear" fieldSource="OrigApptYear" required="False" caption="Orig Appt Year" wizardCaption="Orig Appt Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1OrigApptYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="82" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="LastService" fieldSource="LastService" required="False" caption="Last Service" wizardCaption="Last Service" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1LastService">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox1" PathID="employee1TextBox1" sourceType="Table" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month" fieldSource="LastServiceMonth">
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
				<ListBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox2" PathID="employee1TextBox2" sourceType="Table" fieldSource="LastServiceDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<CheckBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="CheckBox1" PathID="employee1CheckBox1" fieldSource="ReassignmentID" checkedValue="1" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="122" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="TextBox4" PathID="employee1TextBox4" sourceType="Table" connection="Connection1" fieldSource="ReassignmentOffice" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="NameOfficeDept">
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
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox5" PathID="employee1TextBox5" fieldSource="ReassignmentDate" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="130" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox8" wizardEmptyCaption="Select Value" PathID="employee1ListBox8" connection="Connection1" fieldSource="SecRecPurposeID" dataSource="lut_servicerecpurpose" boundColumn="SecRecPurposeID" textColumn="ServiceRecPurpose" orderBy="ServiceRecPurpose">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="152" tableName="lut_servicerecpurpose" posLeft="10" posTop="10" posWidth="128" posHeight="88"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<TextBox id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox7" PathID="employee1TextBox7" fieldSource="ReassignmentRemarks">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="148" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TextBox11" PathID="employee1TextBox11" fieldSource="SalaryWords">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="149" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox18" wizardEmptyCaption="Select Value" PathID="employee1ListBox18" fieldSource="CertMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<TextBox id="151" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox20" wizardEmptyCaption="Select Value" PathID="employee1ListBox20" fieldSource="CertYear">
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
				<ListBox id="150" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox19" wizardEmptyCaption="Select Value" PathID="employee1ListBox19" connection="Connection1" fieldSource="CertDay" dataSource="lut_days" boundColumn="day" textColumn="day">
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
				<ListBox id="161" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="ListBox1" wizardEmptyCaption="Select Value" PathID="employee1ListBox1" connection="Connection1" dataSource="lut_modeseparatn" boundColumn="ModeSeparatnID" textColumn="ModeSeparatn" fieldSource="ModeSeparatnID">
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
				<ListBox id="172" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox2" wizardEmptyCaption="Select Value" PathID="employee1ListBox2" connection="Connection1" fieldSource="Rate" dataSource="lut_rate" boundColumn="Rate" textColumn="Rate">
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
				<ListBox id="173" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="ListBox3" wizardEmptyCaption="Select Value" PathID="employee1ListBox3" connection="Connection1" dataSource="lut_status" boundColumn="StatID" textColumn="Status" fieldSource="StatID">
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
				<TextBox id="174" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox3" PathID="employee1TextBox3" fieldSource="EntrancePGNS" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="175" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox6" PathID="employee1TextBox6" format="mm/dd/yyyy" fieldSource="PrevEmpFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="176" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox8" PathID="employee1TextBox8" fieldSource="PrevEmpTo" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="177" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox9" PathID="employee1TextBox9" fieldSource="PrevEmpFrom2" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="178" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox10" PathID="employee1TextBox10" fieldSource="PrevEmpTo2" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="179" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox12" PathID="employee1TextBox12" fieldSource="PrevEmpFrom3" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="180" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox13" PathID="employee1TextBox13" fieldSource="PrevEmpTo3" format="mm/dd/yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="181" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox14" PathID="employee1TextBox14" fieldSource="PrevEmpFrom4" format="mm/dd/yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="182" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox15" PathID="employee1TextBox15" fieldSource="PrevEmpTo4" format="mm/dd/yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="183" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox16" PathID="employee1TextBox16" fieldSource="PrevEmpFrom5" format="mm/dd/yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="184" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="TextBox17" PathID="employee1TextBox17" fieldSource="PrevEmpTo5" format="mm/dd/yyyy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="39" conditionType="Parameter" useIsNull="False" field="EmployeeID" parameterSource="EmployeeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="116" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="309"/>
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
		<Link id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="Employee.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="CurrentPosition.php" forShow="True" url="CurrentPosition.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="168" groupID="7"/>
		<Group id="169" groupID="6"/>
		<Group id="170" groupID="5"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
