<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee" name="employee" pageSizeLimit="100" wizardCaption="List of Employee " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" activeCollection="TableParameters">
			<Components>
				<Link id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employee_Insert" hrefSource="OReceipt.ccp" removeParameters="EmployeeID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="employeeemployee_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Sorter id="12" visible="True" name="Sorter_Surname" column="Surname" wizardCaption="Surname" wizardSortingType="SimpleDir" wizardControl="Surname" wizardAddNbsp="False" PathID="employeeSorter_Surname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="13" visible="True" name="Sorter_FirstName" column="FirstName" wizardCaption="First Name" wizardSortingType="SimpleDir" wizardControl="FirstName" wizardAddNbsp="False" PathID="employeeSorter_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="14" visible="True" name="Sorter_MiddleName" column="MiddleName" wizardCaption="Middle Name" wizardSortingType="SimpleDir" wizardControl="MiddleName" wizardAddNbsp="False" PathID="employeeSorter_MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="15" visible="True" name="Sorter_ORNo" column="ORNo" wizardCaption="ORNo" wizardSortingType="SimpleDir" wizardControl="ORNo" wizardAddNbsp="False" PathID="employeeSorter_ORNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="16" visible="True" name="Sorter_IssuedOn" column="IssuedOn" wizardCaption="Issued On" wizardSortingType="SimpleDir" wizardControl="IssuedOn" wizardAddNbsp="False" PathID="employeeSorter_IssuedOn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Sorter id="17" visible="True" name="Sorter_IssuedAt" column="IssuedAt" wizardCaption="Issued At" wizardSortingType="SimpleDir" wizardControl="IssuedAt" wizardAddNbsp="False" PathID="employeeSorter_IssuedAt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Sorter>
				<Link id="18" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" hrefSource="OReceipt.ccp" wizardThemeItem="GridA" PathID="employeeSurname">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="19" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="20" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleName" fieldSource="MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="22" fieldSourceType="DBColumn" dataType="Text" html="False" name="ORNo" fieldSource="ORNo" wizardCaption="ORNo" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeORNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Date" html="False" name="IssuedOn" fieldSource="IssuedOn" wizardCaption="Issued On" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeIssuedOn" format="mmmm d, yyyy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="24" fieldSourceType="DBColumn" dataType="Text" html="False" name="IssuedAt" fieldSource="IssuedAt" wizardCaption="Issued At" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeIssuedAt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="25" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="37" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
				<TableParameter id="38" conditionType="Parameter" useIsNull="False" field="Surname" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_Surname"/>
				<TableParameter id="39" conditionType="Parameter" useIsNull="False" field="FirstName" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_FirstName"/>
				<TableParameter id="40" conditionType="Parameter" useIsNull="False" field="MiddleInitial" dataType="Text" searchConditionType="BeginsWith" parameterType="URL" logicOperator="And" parameterSource="s_MiddleInitial"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="3" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="4" tableName="employee" fieldName="Surname"/>
				<Field id="5" tableName="employee" fieldName="FirstName"/>
				<Field id="6" tableName="employee" fieldName="MiddleName"/>
				<Field id="7" tableName="employee" fieldName="ORNo"/>
				<Field id="8" tableName="employee" fieldName="IssuedOn"/>
				<Field id="9" tableName="employee" fieldName="IssuedAt"/>
				<Field id="10" fieldName="EmployeeID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="26" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee1" dataSource="employee" errorSummator="Error" wizardCaption="Add/Edit Employee " wizardFormMethod="post" PathID="employee1" returnPage="Cert_latestsalary2.ccp">
			<Components>
				<Button id="27" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="28" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="31" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ORNo" fieldSource="ORNo" required="False" caption="ORNo" wizardCaption="ORNo" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ORNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="IssuedOn" fieldSource="IssuedOn" required="False" caption="Issued On" wizardCaption="Issued On" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1IssuedOn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="35" name="DatePicker_IssuedOn" control="IssuedOn" wizardSatellite="True" wizardControl="IssuedOn" wizardDatePickerType="Image" wizardPicture="Styles/Fresh/Images/DatePicker.gif" style="Styles/Fresh/Style.css" PathID="employee1DatePicker_IssuedOn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IssuedAt" fieldSource="IssuedAt" required="False" caption="Issued At" wizardCaption="Issued At" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1IssuedAt">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="32" conditionType="Parameter" useIsNull="False" field="EmployeeID" parameterSource="EmployeeID" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="OReceipt.php" forShow="True" url="OReceipt.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
