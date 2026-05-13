<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee_workexperience" name="employee_workexperience" orderBy="MonthlySalary" pageSizeLimit="100" wizardCaption="List of Employee Workexperience " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" activeCollection="TableParameters">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employee_workexperience_Insert" hrefSource="WorkExperience.ccp" removeParameters="WorkExpID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="employee_workexperienceemployee_workexperience_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="5" fieldSourceType="DBColumn" dataType="Text" html="False" name="employee_workexperience_TotalRecords" wizardUseTemplateBlock="False" PathID="employee_workexperienceemployee_workexperience_TotalRecords">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="6"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Sorter id="7" visible="True" name="Sorter_EmployeeID" column="EmployeeID" wizardCaption="Employee ID" wizardSortingType="SimpleDir" wizardControl="EmployeeID" wizardAddNbsp="False" PathID="employee_workexperienceSorter_EmployeeID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_DateFrom" column="DateFrom" wizardCaption="Date From" wizardSortingType="SimpleDir" wizardControl="DateFrom" wizardAddNbsp="False" PathID="employee_workexperienceSorter_DateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_DateTo" column="DateTo" wizardCaption="Date To" wizardSortingType="SimpleDir" wizardControl="DateTo" wizardAddNbsp="False" PathID="employee_workexperienceSorter_DateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_PositionTitle" column="PositionTitle" wizardCaption="Position Title" wizardSortingType="SimpleDir" wizardControl="PositionTitle" wizardAddNbsp="False" PathID="employee_workexperienceSorter_PositionTitle">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="11" visible="True" name="Sorter_Department" column="Department" wizardCaption="Department" wizardSortingType="SimpleDir" wizardControl="Department" wizardAddNbsp="False" PathID="employee_workexperienceSorter_Department">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_MonthlySalary" column="MonthlySalary" wizardCaption="Monthly Salary" wizardSortingType="SimpleDir" wizardControl="MonthlySalary" wizardAddNbsp="False" PathID="employee_workexperienceSorter_MonthlySalary">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_SalaryGrade" column="SalaryGrade" wizardCaption="Salary Grade" wizardSortingType="SimpleDir" wizardControl="SalaryGrade" wizardAddNbsp="False" PathID="employee_workexperienceSorter_SalaryGrade">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_StepIncremt" column="StepIncremt" wizardCaption="Step Incremt" wizardSortingType="SimpleDir" wizardControl="StepIncremt" wizardAddNbsp="False" PathID="employee_workexperienceSorter_StepIncremt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_StatusOfAppt" column="StatusOfAppt" wizardCaption="Status Of Appt" wizardSortingType="SimpleDir" wizardControl="StatusOfAppt" wizardAddNbsp="False" PathID="employee_workexperienceSorter_StatusOfAppt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_GovernmentService" column="GovernmentService" wizardCaption="Government Service" wizardSortingType="SimpleDir" wizardControl="GovernmentService" wizardAddNbsp="False" PathID="employee_workexperienceSorter_GovernmentService">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="Employee ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="WorkExperience.ccp" wizardThemeItem="GridA" PathID="employee_workexperienceEmployeeID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="19" sourceType="DataField" format="yyyy-mm-dd" name="WorkExpID" source="WorkExpID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="DateFrom" fieldSource="DateFrom" wizardCaption="Date From" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperienceDateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DateTo" fieldSource="DateTo" wizardCaption="Date To" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperienceDateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionTitle" fieldSource="PositionTitle" wizardCaption="Position Title" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperiencePositionTitle">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="Department" fieldSource="Department" wizardCaption="Department" wizardSize="50" wizardMaxLength="150" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperienceDepartment">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Single" html="False" name="MonthlySalary" fieldSource="MonthlySalary" wizardCaption="Monthly Salary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="employee_workexperienceMonthlySalary">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="SalaryGrade" fieldSource="SalaryGrade" wizardCaption="Salary Grade" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperienceSalaryGrade">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="StepIncremt" fieldSource="StepIncremt" wizardCaption="Step Incremt" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperienceStepIncremt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="StatusOfAppt" fieldSource="StatusOfAppt" wizardCaption="Status Of Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperienceStatusOfAppt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="GovernmentService" fieldSource="GovernmentService" wizardCaption="Government Service" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_workexperienceGovernmentService">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="38" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="56"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="57" tableName="employee_workexperience" posLeft="10" posTop="10" posWidth="148" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="3" tableName="employee_workexperience" fieldName="WorkExpID"/>
				<Field id="17" tableName="employee_workexperience" fieldName="EmployeeID"/>
				<Field id="20" tableName="employee_workexperience" fieldName="DateFrom"/>
				<Field id="22" tableName="employee_workexperience" fieldName="DateTo"/>
				<Field id="24" tableName="employee_workexperience" fieldName="PositionTitle"/>
				<Field id="26" tableName="employee_workexperience" fieldName="Department"/>
				<Field id="28" tableName="employee_workexperience" fieldName="MonthlySalary"/>
				<Field id="30" tableName="employee_workexperience" fieldName="SalaryGrade"/>
				<Field id="32" tableName="employee_workexperience" fieldName="StepIncremt"/>
				<Field id="34" tableName="employee_workexperience" fieldName="StatusOfAppt"/>
				<Field id="36" tableName="employee_workexperience" fieldName="GovernmentService"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee_workexperience1" dataSource="employee_workexperience" errorSummator="Error" wizardCaption="Add/Edit Employee Workexperience " wizardFormMethod="post" PathID="employee_workexperience1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee_workexperience1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee_workexperience1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="employee_workexperience1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="43" message="Delete record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee_workexperience1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="EmployeeID" fieldSource="EmployeeID" required="True" caption="Employee ID" wizardCaption="Employee ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_workexperience1EmployeeID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DateFrom" fieldSource="DateFrom" required="True" caption="Date From" wizardCaption="Date From" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_workexperience1DateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DateTo" fieldSource="DateTo" required="True" caption="Date To" wizardCaption="Date To" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_workexperience1DateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionTitle" fieldSource="PositionTitle" required="False" caption="Position Title" wizardCaption="Position Title" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_workexperience1PositionTitle">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Department" fieldSource="Department" required="False" caption="Department" wizardCaption="Department" wizardSize="50" wizardMaxLength="150" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_workexperience1Department">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Single" name="MonthlySalary" fieldSource="MonthlySalary" required="False" caption="Monthly Salary" wizardCaption="Monthly Salary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_workexperience1MonthlySalary">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="52" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="SalaryGrade" fieldSource="SalaryGrade" required="False" caption="Salary Grade" wizardCaption="Salary Grade" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee_workexperience1SalaryGrade" connection="Connection1" dataSource="lut_salarygrade" boundColumn="SalaryGrade" textColumn="SalaryGrade">
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
				<ListBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StatusOfAppt" fieldSource="StatusOfAppt" required="False" caption="Status Of Appt" wizardCaption="Status Of Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_workexperience1StatusOfAppt" sourceType="Table" connection="Connection1" dataSource="lut_statofappt" boundColumn="StatAppt" textColumn="StatAppt">
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
				<ListBox id="55" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="GovernmentService" fieldSource="GovernmentService" required="False" caption="Government Service" wizardCaption="Government Service" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee_workexperience1GovernmentService" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
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
				<ListBox id="53" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StepIncremt" fieldSource="StepIncremt" required="False" caption="Step Incremt" wizardCaption="Step Incremt" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee_workexperience1StepIncremt" connection="Connection1" dataSource="lut_stepincrement" boundColumn="StepIncrement" textColumn="StepIncrement">
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
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="WorkExpID" parameterSource="WorkExpID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
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
		<Link id="59" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="Employee.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="WorkExperience.php" forShow="True" url="WorkExperience.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="WorkExperience_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
