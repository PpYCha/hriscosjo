<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Print" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="Connection1" dataSource="employee, departmentoffice, lut_statofappt2, lut_modeseparatn" orderBy="departmentoffice.OfficeAcronym, employee.Surname" name="employee_departmentoffice" pageSizeLimit="100" wizardCaption=" Employee, Departmentoffice, Lut Statofappt2 " wizardLayoutType="Tabular" activeCollection="TableParameters">
			<Components>
				<Section id="36" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="42" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="employee_departmentofficeReport_HeaderReport_TotalRecords">
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
				<Section id="37" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="38" visible="True" lines="1" name="Detail" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="51" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="53" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="OfficeAcronym" fieldSource="OfficeAcronym" wizardCaption="OfficeAcronym" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailOfficeAcronym">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="55" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="57" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="59" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="61" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="employee_Position" fieldSource="employee_Position" wizardCaption="employee_Position" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailemployee_Position">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="69" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="MonthlySalary" fieldSource="MonthlySalary" wizardCaption="MonthlySalary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_departmentofficeDetailMonthlySalary" format="#,##0.00">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="77" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="StatApp" fieldSource="StatApp" wizardCaption="StatApp" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailStatApp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="117" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel1" PathID="employee_departmentofficeDetailReportLabel1" fieldSource="ModeSeparatn">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="121" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel2" PathID="employee_departmentofficeDetailReportLabel2" fieldSource="SeparationMonth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="122" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel3" PathID="employee_departmentofficeDetailReportLabel3" fieldSource="SeparationDay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="123" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel4" PathID="employee_departmentofficeDetailReportLabel4" fieldSource="SeparationYear">
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
				<Section id="39" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="40" visible="True" name="NoRecords" wizardNoRecords="No records">
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
				<Section id="41" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Navigator id="44" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Tile">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="45" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
						<ReportLabel id="43" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="employee_departmentofficePage_FooterReport_CurrentDate">
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
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="78"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="employee.OfficeID" parameterSource="s_employee_OfficeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="105" conditionType="Parameter" useIsNull="False" field="employee.StatAppID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="employee_StatAppID1"/>
				<TableParameter id="115" conditionType="Parameter" useIsNull="False" field="employee.ModeSeparatnID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="employee_ModeSeparatnID"/>
				<TableParameter id="126" conditionType="Parameter" useIsNull="False" field="employee.SeparationYear" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="SeparationYear"/>
				<TableParameter id="146" conditionType="Parameter" useIsNull="False" field="employee.SeparationMonth" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="SeparationMonth"/>
				<TableParameter id="150" conditionType="Parameter" useIsNull="False" field="employee.Position" dataType="Text" searchConditionType="Contains" parameterType="URL" logicOperator="And" parameterSource="Position"/>
				<TableParameter id="152" conditionType="Parameter" useIsNull="False" field="employee.StatAppID" dataType="Integer" searchConditionType="LessThan" parameterType="URL" logicOperator="And" parameterSource="employee_StatAppID2"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="3" tableName="employee" posLeft="10" posTop="10" posWidth="231" posHeight="381"/>
				<JoinTable id="15" tableName="departmentoffice" posLeft="191" posTop="10" posWidth="129" posHeight="180"/>
				<JoinTable id="18" tableName="lut_statofappt2" posLeft="294" posTop="97" posWidth="102" posHeight="88"/>
				<JoinTable id="109" tableName="lut_modeseparatn" posLeft="304" posTop="265" posWidth="108" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="127" tableLeft="employee" tableRight="departmentoffice" fieldLeft="employee.OfficeID" fieldRight="departmentoffice.OfficeID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="128" tableLeft="employee" tableRight="lut_statofappt2" fieldLeft="employee.StatAppID" fieldRight="lut_statofappt2.StatAppID" joinType="left" conditionType="Equal"/>
				<JoinTable2 id="129" tableLeft="employee" tableRight="lut_modeseparatn" fieldLeft="employee.ModeSeparatnID" fieldRight="lut_modeseparatn.ModeSeparatnID" joinType="left" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="4" tableName="employee" fieldName="Surname"/>
				<Field id="5" tableName="employee" fieldName="FirstName"/>
				<Field id="6" tableName="employee" fieldName="MiddleName"/>
				<Field id="9" tableName="employee" fieldName="MonthlySalary"/>
				<Field id="10" tableName="employee" fieldName="employee.StatAppID" alias="employee_StatAppID"/>
				<Field id="11" tableName="employee" fieldName="employee.OfficeID" alias="employee_OfficeID"/>
				<Field id="22" tableName="departmentoffice" fieldName="OfficeAcronym"/>
				<Field id="23" tableName="employee" fieldName="employee.Position" alias="employee_Position"/>
				<Field id="104" tableName="lut_statofappt2" fieldName="lut_statofappt2.*"/>
				<Field id="108" tableName="employee" fieldName="employee.ModeSeparatnID" alias="employee_ModeSeparatnID"/>
				<Field id="111" tableName="lut_modeseparatn" fieldName="lut_modeseparatn.*"/>
				<Field id="118" tableName="employee" fieldName="SeparationMonth"/>
				<Field id="119" tableName="employee" fieldName="SeparationDay"/>
				<Field id="120" tableName="employee" fieldName="SeparationYear"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="25" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="departmentoffice_employee" wizardCaption="Search Departmentoffice Employee " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="QueryCompulsory.ccp" PathID="departmentoffice_employee" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions" connection="Connection1" dataSource="employee" activeCollection="TableParameters">
			<Components>
				<Link id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="QueryCompulsory.ccp" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="departmentoffice_employeeClearParameters" wizardUseTemplateBlock="False" removeParameters="s_employee_OfficeID;Position;employee_ModeSeparatnID;SeparationMonth;SeparationYear;s_CompRetireMonth;s_CompRetireYear;employee_StatAppID1;employee_StatAppID2">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="27" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="departmentoffice_employeeButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="28" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_employee_OfficeID" wizardCaption="Office ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_employee_OfficeID" connection="Connection1" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="OfficeAcronym" orderBy="OfficeAcronym">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="137" tableName="departmentoffice" posLeft="10" posTop="10" posWidth="129" posHeight="180"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<CheckBox id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="employee_StatAppID1" PathID="departmentoffice_employeeemployee_StatAppID1" checkedValue="6" defaultValue="Unchecked" uncheckedValue="0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
				<ListBox id="116" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="employee_ModeSeparatnID" wizardEmptyCaption="Select Value" PathID="departmentoffice_employeeemployee_ModeSeparatnID" connection="Connection1" dataSource="lut_modeseparatn" boundColumn="ModeSeparatnID" textColumn="ModeSeparatn">
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
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SeparationYear" PathID="departmentoffice_employeeSeparationYear">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="145" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="SeparationMonth" wizardEmptyCaption="Select Value" PathID="departmentoffice_employeeSeparationMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<TextBox id="149" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Position" PathID="departmentoffice_employeePosition" fieldSource="Position">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBox id="151" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="employee_StatAppID2" PathID="departmentoffice_employeeemployee_StatAppID2" defaultValue="Unchecked" uncheckedValue="0" checkedValue="6">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</CheckBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="35" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="79"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="148" conditionType="Parameter" useIsNull="False" field="StatAppID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="StatAppID"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="147" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
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
		<Link id="32" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" wizardTheme="Tile" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print" hrefSource="QueryCompulsory_printfinal.ccp">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="34" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="33" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="QueryCompulsory_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="QueryCompulsory.php" forShow="True" url="QueryCompulsory.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="153" groupID="7"/>
		<Group id="154" groupID="6"/>
		<Group id="155" groupID="5"/>
		<Group id="156" groupID="4"/>
		<Group id="157" groupID="3"/>
		<Group id="158" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
