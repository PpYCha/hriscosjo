<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Joyful" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee" name="employee" pageSizeLimit="100" wizardCaption="List of Employee " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" activeCollection="TableParameters">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employee_Insert" hrefSource="CurrentPosition.ccp" removeParameters="EmployeeID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="employeeemployee_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
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
				<JoinTable id="108" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="3" tableName="employee" fieldName="EmployeeID"/>
				<Field id="16" tableName="employee" fieldName="EmployeeIDNo"/>
				<Field id="18" tableName="employee" fieldName="Surname"/>
				<Field id="20" tableName="employee" fieldName="FirstName"/>
				<Field id="22" tableName="employee" fieldName="MiddleName"/>
				<Field id="24" tableName="employee" fieldName="NameExtension"/>
				<Field id="26" tableName="employee" fieldName="BirthMonth"/>
				<Field id="28" tableName="employee" fieldName="BirthDay"/>
				<Field id="30" tableName="employee" fieldName="BirthYear"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="33" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee1" dataSource="employee" errorSummator="Error" wizardCaption="Add/Edit Employee " wizardFormMethod="post" PathID="employee1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
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
				<TextBox id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ItemNo" fieldSource="ItemNo" required="False" caption="Item No" wizardCaption="Item No" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ItemNo">
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
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="45" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="SalaryGrade" fieldSource="SalaryGrade" required="False" caption="Salary Grade" wizardCaption="Salary Grade" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1SalaryGrade" connection="Connection1" dataSource="lut_salarygrade" boundColumn="SalaryGrade" textColumn="SalaryGrade">
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
				<ListBox id="49" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="OfficeID" fieldSource="OfficeID" required="False" caption="Office ID" wizardCaption="Office ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1OfficeID" connection="Connection1" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="NameOfficeDept">
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
				<ListBox id="53" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="PromotedMonth" fieldSource="PromotedMonth" required="False" caption="Promoted Month" wizardCaption="Promoted Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1PromotedMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="56" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc1Month" fieldSource="StepInc1Month" required="False" caption="Step Inc1 Month" wizardCaption="Step Inc1 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc1Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="59" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc2Month" fieldSource="StepInc2Month" required="False" caption="Step Inc2 Month" wizardCaption="Step Inc2 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc2Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="62" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc3Month" fieldSource="StepInc3Month" required="False" caption="Step Inc3 Month" wizardCaption="Step Inc3 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc3Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="65" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc4Month" fieldSource="StepInc4Month" required="False" caption="Step Inc4 Month" wizardCaption="Step Inc4 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc4Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="68" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc5Month" fieldSource="StepInc5Month" required="False" caption="Step Inc5 Month" wizardCaption="Step Inc5 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc5Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="71" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc6Month" fieldSource="StepInc6Month" required="False" caption="Step Inc6 Month" wizardCaption="Step Inc6 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc6Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="74" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc7Month" fieldSource="StepInc7Month" required="False" caption="Step Inc7 Month" wizardCaption="Step Inc7 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc7Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="77" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc8Month" fieldSource="StepInc8Month" required="False" caption="Step Inc8 Month" wizardCaption="Step Inc8 Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc8Month" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="83" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="CompRetireMonth" fieldSource="CompRetireMonth" required="False" caption="Comp Retire Month" wizardCaption="Comp Retire Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1CompRetireMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="86" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="SeparationMonth" fieldSource="SeparationMonth" required="False" caption="Separation Month" wizardCaption="Separation Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1SeparationMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="89" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="ModeSeparatnID" fieldSource="ModeSeparatnID" required="False" caption="Mode Separatn ID" wizardCaption="Mode Separatn ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1ModeSeparatnID" connection="Connection1" dataSource="lut_modeseparatn" boundColumn="ModeSeparatnID" textColumn="ModeSeparatn">
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
				<TextBox id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DetailedDate" fieldSource="DetailedDate" required="False" caption="Detailed Date" wizardCaption="Detailed Date" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DetailedDate">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="93" name="DatePicker_DetailedDate" control="DetailedDate" wizardSatellite="True" wizardControl="DetailedDate" wizardDatePickerType="Image" wizardPicture="Styles/Joyful/Images/DatePicker.gif" style="Styles/Joyful/Style.css" PathID="employee1DatePicker_DetailedDate">
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
				<ListBox id="95" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosaMonth" fieldSource="NosaMonth" required="False" caption="Nosa Month" wizardCaption="Nosa Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosaMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="98" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosaSalGrade" fieldSource="NosaSalGrade" required="False" caption="Nosa Sal Grade" wizardCaption="Nosa Sal Grade" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosaSalGrade" connection="Connection1" dataSource="lut_salarygrade" boundColumn="SalaryGrade" textColumn="SalaryGrade">
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
				<TextBox id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Single" name="NosaSalary" fieldSource="NosaSalary" required="False" caption="Nosa Salary" wizardCaption="Nosa Salary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1NosaSalary">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="101" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosiMonth" fieldSource="NosiMonth" required="False" caption="Nosi Month" wizardCaption="Nosi Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosiMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="104" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosiSalGrade" fieldSource="NosiSalGrade" required="False" caption="Nosi Sal Grade" wizardCaption="Nosi Sal Grade" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosiSalGrade" connection="Connection1" dataSource="lut_salarygrade" boundColumn="SalaryGrade" textColumn="SalaryGrade">
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
				<TextBox id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Single" name="NosiSalary" fieldSource="NosiSalary" required="False" caption="Nosi Salary" wizardCaption="Nosi Salary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1NosiSalary">
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
				<ListBox id="46" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepIncrement" fieldSource="StepIncrement" required="False" caption="Step Increment" wizardCaption="Step Increment" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepIncrement" connection="Connection1" dataSource="lut_stepincrement" boundColumn="StepIncrement" textColumn="StepIncrement">
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
				<ListBox id="54" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="PromotedDay" fieldSource="PromotedDay" required="False" caption="Promoted Day" wizardCaption="Promoted Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1PromotedDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PromotedYear" fieldSource="PromotedYear" required="False" caption="Promoted Year" wizardCaption="Promoted Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PromotedYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="57" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc1Day" fieldSource="StepInc1Day" required="False" caption="Step Inc1 Day" wizardCaption="Step Inc1 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc1Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="58" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc1Year" fieldSource="StepInc1Year" required="False" caption="Step Inc1 Year" wizardCaption="Step Inc1 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc1Year">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="60" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc2Day" fieldSource="StepInc2Day" required="False" caption="Step Inc2 Day" wizardCaption="Step Inc2 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc2Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="61" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc2Year" fieldSource="StepInc2Year" required="False" caption="Step Inc2 Year" wizardCaption="Step Inc2 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc2Year">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="63" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc3Day" fieldSource="StepInc3Day" required="False" caption="Step Inc3 Day" wizardCaption="Step Inc3 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc3Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc3Year" fieldSource="StepInc3Year" required="False" caption="Step Inc3 Year" wizardCaption="Step Inc3 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc3Year">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="66" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc4Day" fieldSource="StepInc4Day" required="False" caption="Step Inc4 Day" wizardCaption="Step Inc4 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc4Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc4Year" fieldSource="StepInc4Year" required="False" caption="Step Inc4 Year" wizardCaption="Step Inc4 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc4Year">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="69" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc5Day" fieldSource="StepInc5Day" required="False" caption="Step Inc5 Day" wizardCaption="Step Inc5 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc5Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="70" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc5Year" fieldSource="StepInc5Year" required="False" caption="Step Inc5 Year" wizardCaption="Step Inc5 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc5Year">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="72" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc6Day" fieldSource="StepInc6Day" required="False" caption="Step Inc6 Day" wizardCaption="Step Inc6 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc6Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc6Year" fieldSource="StepInc6Year" required="False" caption="Step Inc6 Year" wizardCaption="Step Inc6 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc6Year">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="75" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc7Day" fieldSource="StepInc7Day" required="False" caption="Step Inc7 Day" wizardCaption="Step Inc7 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc7Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc7Year" fieldSource="StepInc7Year" required="False" caption="Step Inc7 Year" wizardCaption="Step Inc7 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc7Year">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="78" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepInc8Day" fieldSource="StepInc8Day" required="False" caption="Step Inc8 Day" wizardCaption="Step Inc8 Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1StepInc8Day" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StepInc8Year" fieldSource="StepInc8Year" required="False" caption="Step Inc8 Year" wizardCaption="Step Inc8 Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StepInc8Year">
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
				<ListBox id="84" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="CompRetireDay" fieldSource="CompRetireDay" required="False" caption="Comp Retire Day" wizardCaption="Comp Retire Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1CompRetireDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CompRetireYear" fieldSource="CompRetireYear" required="False" caption="Comp Retire Year" wizardCaption="Comp Retire Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1CompRetireYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="87" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="SeparationDay" fieldSource="SeparationDay" required="False" caption="Separation Day" wizardCaption="Separation Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1SeparationDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SeparationYear" fieldSource="SeparationYear" required="False" caption="Separation Year" wizardCaption="Separation Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SeparationYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="96" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosaDay" fieldSource="NosaDay" required="False" caption="Nosa Day" wizardCaption="Nosa Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosaDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="97" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NosaYear" fieldSource="NosaYear" required="False" caption="Nosa Year" wizardCaption="Nosa Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1NosaYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="99" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosaStepInc" fieldSource="NosaStepInc" required="False" caption="Nosa Step Inc" wizardCaption="Nosa Step Inc" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosaStepInc" connection="Connection1" dataSource="lut_stepincrement" boundColumn="StepIncrement" textColumn="StepIncrement">
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
				<ListBox id="102" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosiDay" fieldSource="NosiDay" required="False" caption="Nosi Day" wizardCaption="Nosi Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosiDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="103" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NosiYear" fieldSource="NosiYear" required="False" caption="Nosi Year" wizardCaption="Nosi Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1NosiYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="105" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="NosiStepInc" fieldSource="NosiStepInc" required="False" caption="Nosi Step Inc" wizardCaption="Nosi Step Inc" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee1NosiStepInc" connection="Connection1" dataSource="lut_stepincrement" boundColumn="StepIncrement" textColumn="StepIncrement">
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
				<Link id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="employee1Link1" hrefSource="ConstantFactor.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="113" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="39" conditionType="Parameter" useIsNull="False" field="EmployeeID" parameterSource="EmployeeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
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
		<Link id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="Employee.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="CurrentPosition2.php" forShow="True" url="CurrentPosition2.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="110" groupID="5"/>
		<Group id="111" groupID="4"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
