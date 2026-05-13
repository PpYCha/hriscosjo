<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Joyful" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee_servicerecord" name="employee_servicerecord" orderBy="DateFrom" pageSizeLimit="100" wizardCaption="List of Employee Servicerecord " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" activeCollection="TableParameters">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employee_servicerecord_Insert" hrefSource="ServiceRecord.ccp" removeParameters="ServiceRecID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="employee_servicerecordemployee_servicerecord_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="5" fieldSourceType="DBColumn" dataType="Text" html="False" name="employee_servicerecord_TotalRecords" wizardUseTemplateBlock="False" PathID="employee_servicerecordemployee_servicerecord_TotalRecords">
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
				<Sorter id="7" visible="True" name="Sorter_EmployeeID" column="EmployeeID" wizardCaption="Employee ID" wizardSortingType="SimpleDir" wizardControl="EmployeeID" wizardAddNbsp="False" PathID="employee_servicerecordSorter_EmployeeID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="8" visible="True" name="Sorter_DateFrom" column="DateFrom" wizardCaption="Date From" wizardSortingType="SimpleDir" wizardControl="DateFrom" wizardAddNbsp="False" PathID="employee_servicerecordSorter_DateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="9" visible="True" name="Sorter_DateTo" column="DateTo" wizardCaption="Date To" wizardSortingType="SimpleDir" wizardControl="DateTo" wizardAddNbsp="False" PathID="employee_servicerecordSorter_DateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="10" visible="True" name="Sorter_Designation" column="Designation" wizardCaption="Designation" wizardSortingType="SimpleDir" wizardControl="Designation" wizardAddNbsp="False" PathID="employee_servicerecordSorter_Designation">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="11" visible="True" name="Sorter_StatofAppt" column="StatofAppt" wizardCaption="Statof Appt" wizardSortingType="SimpleDir" wizardControl="StatofAppt" wizardAddNbsp="False" PathID="employee_servicerecordSorter_StatofAppt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="12" visible="True" name="Sorter_AnnualSalary" column="AnnualSalary" wizardCaption="Annual Salary" wizardSortingType="SimpleDir" wizardControl="AnnualSalary" wizardAddNbsp="False" PathID="employee_servicerecordSorter_AnnualSalary">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_OfficeStatn" column="OfficeStatn" wizardCaption="Office Statn" wizardSortingType="SimpleDir" wizardControl="OfficeStatn" wizardAddNbsp="False" PathID="employee_servicerecordSorter_OfficeStatn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_Branch" column="Branch" wizardCaption="Branch" wizardSortingType="SimpleDir" wizardControl="Branch" wizardAddNbsp="False" PathID="employee_servicerecordSorter_Branch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_AbsenceWOPay" column="AbsenceWOPay" wizardCaption="Absence WOPay" wizardSortingType="SimpleDir" wizardControl="AbsenceWOPay" wizardAddNbsp="False" PathID="employee_servicerecordSorter_AbsenceWOPay">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_Separation" column="Separation" wizardCaption="Separation" wizardSortingType="SimpleDir" wizardControl="Separation" wizardAddNbsp="False" PathID="employee_servicerecordSorter_Separation">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="Employee ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="ServiceRecord.ccp" wizardThemeItem="GridA" PathID="employee_servicerecordEmployeeID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="19" sourceType="DataField" format="yyyy-mm-dd" name="ServiceRecID" source="ServiceRecID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="DateFrom" fieldSource="DateFrom" wizardCaption="Date From" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordDateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="DateTo" fieldSource="DateTo" wizardCaption="Date To" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordDateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="Designation" fieldSource="Designation" wizardCaption="Designation" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordDesignation">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="StatofAppt" fieldSource="StatofAppt" wizardCaption="Statof Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordStatofAppt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Single" html="False" name="AnnualSalary" fieldSource="AnnualSalary" wizardCaption="Annual Salary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" PathID="employee_servicerecordAnnualSalary" format="#,##0.00">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="OfficeStatn" fieldSource="OfficeStatn" wizardCaption="Office Statn" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordOfficeStatn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="Branch" fieldSource="Branch" wizardCaption="Branch" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordBranch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="AbsenceWOPay" fieldSource="AbsenceWOPay" wizardCaption="Absence WOPay" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordAbsenceWOPay">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="Separation" fieldSource="Separation" wizardCaption="Separation" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_servicerecordSeparation">
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
				<JoinTable id="57" tableName="employee_servicerecord" posLeft="10" posTop="10" posWidth="124" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="3" tableName="employee_servicerecord" fieldName="ServiceRecID"/>
				<Field id="17" tableName="employee_servicerecord" fieldName="EmployeeID"/>
				<Field id="20" tableName="employee_servicerecord" fieldName="DateFrom"/>
				<Field id="22" tableName="employee_servicerecord" fieldName="DateTo"/>
				<Field id="24" tableName="employee_servicerecord" fieldName="Designation"/>
				<Field id="26" tableName="employee_servicerecord" fieldName="StatofAppt"/>
				<Field id="28" tableName="employee_servicerecord" fieldName="AnnualSalary"/>
				<Field id="30" tableName="employee_servicerecord" fieldName="OfficeStatn"/>
				<Field id="32" tableName="employee_servicerecord" fieldName="Branch"/>
				<Field id="34" tableName="employee_servicerecord" fieldName="AbsenceWOPay"/>
				<Field id="36" tableName="employee_servicerecord" fieldName="Separation"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="39" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee_servicerecord1" dataSource="employee_servicerecord" errorSummator="Error" wizardCaption="Add/Edit Employee Servicerecord " wizardFormMethod="post" PathID="employee_servicerecord1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Button id="40" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee_servicerecord1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="41" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee_servicerecord1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="42" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="employee_servicerecord1Button_Delete">
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
				<Button id="44" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee_servicerecord1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="EmployeeID" fieldSource="EmployeeID" required="True" caption="Employee ID" wizardCaption="Employee ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1EmployeeID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="47" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DateFrom" fieldSource="DateFrom" required="False" caption="Date From" wizardCaption="Date From" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1DateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Designation" fieldSource="Designation" required="False" caption="Designation" wizardCaption="Designation" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1Designation">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="50" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="StatofAppt" fieldSource="StatofAppt" required="False" caption="Statof Appt" wizardCaption="Statof Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardEmptyCaption="Select Value" PathID="employee_servicerecord1StatofAppt" connection="Connection1" dataSource="lut_statofappt" boundColumn="StatAppt" textColumn="StatAppt">
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
				<TextBox id="51" visible="Yes" fieldSourceType="DBColumn" dataType="Single" name="AnnualSalary" fieldSource="AnnualSalary" required="False" caption="Annual Salary" wizardCaption="Annual Salary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1AnnualSalary">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="52" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="OfficeStatn" fieldSource="OfficeStatn" required="False" caption="Office Statn" wizardCaption="Office Statn" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1OfficeStatn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Branch" fieldSource="Branch" required="False" caption="Branch" wizardCaption="Branch" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1Branch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="54" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="AbsenceWOPay" fieldSource="AbsenceWOPay" required="False" caption="Absence WOPay" wizardCaption="Absence WOPay" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1AbsenceWOPay">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="55" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Separation" fieldSource="Separation" required="False" caption="Separation" wizardCaption="Separation" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1Separation">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DateTo" fieldSource="DateTo" required="False" caption="Date To" wizardCaption="Date To" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_servicerecord1DateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="ServiceRecID" parameterSource="ServiceRecID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
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
		<CodeFile id="Events" language="PHPTemplates" name="ServiceRecord_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="ServiceRecord.php" forShow="True" url="ServiceRecord.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
