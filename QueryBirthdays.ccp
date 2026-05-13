<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="Connection1" dataSource="employee, departmentoffice" name="employee_departmentoffice" orderBy="Surname" pageSizeLimit="100" wizardCaption=" Employee, Departmentoffice " wizardLayoutType="GroupLeftAbove">
			<Components>
				<Section id="40" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="41" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="43" visible="True" lines="1" name="OfficeAcronym_Header">
					<Components>
						<ReportLabel id="49" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="OfficeAcronym" fieldSource="OfficeAcronym" wizardCaption="OfficeAcronym" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeOfficeAcronym_HeaderOfficeAcronym">
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
				<Section id="44" visible="True" lines="1" name="Detail" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="70" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="EmployeeIDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailEmployeeIDNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="72" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="74" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="76" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="78" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="NameExtension" fieldSource="NameExtension" wizardCaption="NameExtension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailNameExtension">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="80" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthMonth" fieldSource="BirthMonth" wizardCaption="BirthMonth" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailBirthMonth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="86" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PlaceOfBirth" fieldSource="PlaceOfBirth" wizardCaption="PlaceOfBirth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailPlaceOfBirth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="88" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Sex" fieldSource="Sex" wizardCaption="Sex" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailSex">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="90" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="CivilStatus" fieldSource="CivilStatus" wizardCaption="CivilStatus" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailCivilStatus">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="92" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="employee_Position" fieldSource="employee_Position" wizardCaption="employee_Position" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailemployee_Position">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="94" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="StatAppt" fieldSource="StatAppt" wizardCaption="StatAppt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailStatAppt">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="82" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthDay" fieldSource="BirthDay" wizardCaption="BirthDay" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailBirthDay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="84" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthYear" fieldSource="BirthYear" wizardCaption="BirthYear" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_departmentofficeDetailBirthYear">
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
				<Section id="45" visible="True" lines="1" name="OfficeAcronym_Footer">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="46" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="47" visible="True" name="NoRecords" wizardNoRecords="No records">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="57" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_EmployeeIDNo" summarised="True" function="Count" wizardCaption="Employee IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="Count: " wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="employee_departmentofficeReport_FooterTotalCount_EmployeeIDNo">
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
				<Section id="48" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Panel id="51" visible="True" name="PageBreak">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="52" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="employee_departmentofficePage_FooterReport_CurrentDate">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="53" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentPage" fieldSource="PageNumber" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix="Page " PathID="employee_departmentofficePage_FooterReport_CurrentPage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="54" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalPages" fieldSource="TotalPages" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix=" of " PathID="employee_departmentofficePage_FooterReport_TotalPages">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="55" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Joyful">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="56" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="99"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="employee.OfficeID" parameterSource="s_employee_OfficeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="59" conditionType="Parameter" useIsNull="False" field="EmployeeIDNo" parameterSource="s_EmployeeIDNo" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="60" conditionType="Parameter" useIsNull="False" field="Surname" parameterSource="s_Surname" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="61" conditionType="Parameter" useIsNull="False" field="FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
				<TableParameter id="62" conditionType="Parameter" useIsNull="False" field="MiddleName" parameterSource="s_MiddleName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="5"/>
				<TableParameter id="63" conditionType="Parameter" useIsNull="False" field="BirthMonth" parameterSource="s_BirthMonth" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="6"/>
				<TableParameter id="64" conditionType="Parameter" useIsNull="False" field="BirthDay" parameterSource="s_BirthDay" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="7"/>
				<TableParameter id="65" conditionType="Parameter" useIsNull="False" field="BirthYear" parameterSource="s_BirthYear" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="8"/>
				<TableParameter id="66" conditionType="Parameter" useIsNull="False" field="Sex" parameterSource="s_Sex" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="9"/>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="CivilStatus" parameterSource="s_CivilStatus" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="10"/>
				<TableParameter id="68" conditionType="Parameter" useIsNull="False" field="StatAppt" parameterSource="s_StatAppt" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="11"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="3" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
				<JoinTable id="4" tableName="departmentoffice" posLeft="191" posTop="10" posWidth="129" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="5" tableLeft="employee" tableRight="departmentoffice" fieldLeft="employee.OfficeID" fieldRight="departmentoffice.OfficeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="7" tableName="departmentoffice" fieldName="OfficeAcronym"/>
				<Field id="8" tableName="employee" fieldName="EmployeeIDNo"/>
				<Field id="9" tableName="employee" fieldName="Surname"/>
				<Field id="10" tableName="employee" fieldName="FirstName"/>
				<Field id="11" tableName="employee" fieldName="MiddleName"/>
				<Field id="12" tableName="employee" fieldName="BirthMonth"/>
				<Field id="13" tableName="employee" fieldName="BirthDay"/>
				<Field id="14" tableName="employee" fieldName="BirthYear"/>
				<Field id="15" tableName="employee" fieldName="NameExtension"/>
				<Field id="16" tableName="employee" fieldName="PlaceOfBirth"/>
				<Field id="17" tableName="employee" fieldName="Sex"/>
				<Field id="18" tableName="employee" fieldName="CivilStatus"/>
				<Field id="19" tableName="employee" fieldName="employee.Position" alias="employee_Position"/>
				<Field id="20" tableName="employee" fieldName="StatAppt"/>
				<Field id="21" tableName="employee" fieldName="employee.OfficeID" alias="employee_OfficeID"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="42" name="OfficeAcronym" field="OfficeAcronym" sqlField="departmentoffice.OfficeAcronym" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="22" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="departmentoffice_employee" wizardCaption="Search Departmentoffice Employee " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="QueryBirthdays.ccp" PathID="departmentoffice_employee" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Link id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="QueryBirthdays.ccp" removeParameters="s_employee_OfficeID;s_EmployeeIDNo;s_Surname;s_FirstName;s_MiddleName;s_BirthMonth;s_BirthDay;s_BirthYear;s_Sex;s_CivilStatus;s_StatAppt" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="departmentoffice_employeeClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="24" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="departmentoffice_employeeButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="25" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_employee_OfficeID" wizardCaption="Office ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_employee_OfficeID" connection="Connection1" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="OfficeAcronym">
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
				<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="departmentoffice_employees_EmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="departmentoffice_employees_Surname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="28" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="departmentoffice_employees_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="departmentoffice_employees_MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="30" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_BirthMonth" wizardCaption="Birth Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_BirthMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
				<ListBox id="34" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_CivilStatus" wizardCaption="Civil Status" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_CivilStatus" connection="Connection1" dataSource="lut_civilstatus" boundColumn="CivilStat" textColumn="CivilStat">
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
				<ListBox id="35" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_StatAppt" wizardCaption="Stat Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_StatAppt" connection="Connection1" dataSource="lut_statofappt" boundColumn="StatAppt" textColumn="StatAppt">
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
				<ListBox id="31" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_BirthDay" wizardCaption="Birth Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_BirthDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_BirthYear" wizardCaption="Birth Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_BirthYear">
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
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="39" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
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
		<Link id="36" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="QueryBirthdays.ccp" wizardTheme="Joyful" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="38" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="37" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="QueryBirthdays_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="QueryBirthdays.php" forShow="True" url="QueryBirthdays.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="95" groupID="3"/>
		<Group id="96" groupID="2"/>
		<Group id="97" groupID="1"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
