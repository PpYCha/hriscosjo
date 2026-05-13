<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="Connection1" dataSource="departmentoffice, employee, lut_sex, lut_statofappt2" orderBy="employee.Surname" name="departmentoffice_employee1" pageSizeLimit="100" wizardCaption=" Departmentoffice, Employee, Lut Sex " wizardLayoutType="GroupLeftAbove" activeCollection="TableParameters">
			<Components>
				<Section id="34" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="43" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="departmentoffice_employee1Report_HeaderReport_TotalRecords" format="#,##0">
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
				<Section id="35" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="37" visible="True" lines="1" name="OfficeAcronym_Header">
					<Components>
						<ReportLabel id="44" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="OfficeAcronym" fieldSource="OfficeAcronym" wizardCaption="OfficeAcronym" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1OfficeAcronym_HeaderOfficeAcronym">
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
				<Section id="38" visible="True" lines="1" name="Detail" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="53" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="55" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="57" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="59" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="61" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthMonth" fieldSource="BirthMonth" wizardCaption="BirthMonth" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailBirthMonth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="67" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PlaceOfBirth" fieldSource="PlaceOfBirth" wizardCaption="PlaceOfBirth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailPlaceOfBirth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="69" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="employee_Sex" wizardCaption="employee_Sex" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="departmentoffice_employee1Detailemployee_Sex" fieldSource="lut_sex_Sex">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="71" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="CivilStatus" fieldSource="CivilStatus" wizardCaption="CivilStatus" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailCivilStatus">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="63" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthDay" fieldSource="BirthDay" wizardCaption="BirthDay" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailBirthDay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthYear" fieldSource="BirthYear" wizardCaption="BirthYear" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailBirthYear">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="89" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel2" PathID="departmentoffice_employee1DetailReportLabel2" fieldSource="Expr1">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="96" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel3" PathID="departmentoffice_employee1DetailReportLabel3" fieldSource="StatApp">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="97" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel1" PathID="departmentoffice_employee1DetailReportLabel1" fieldSource="employee_Position">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="99" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel4" PathID="departmentoffice_employee1DetailReportLabel4" fieldSource="NameExtension">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="102" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel6" PathID="departmentoffice_employee1DetailReportLabel6" fieldSource="BirthDate" format="mm/dd/yyyy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="104" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel7" PathID="departmentoffice_employee1DetailReportLabel7" fieldSource="MiddleInitial">
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
				<Section id="39" visible="True" lines="0" name="OfficeAcronym_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="40" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="41" visible="True" name="NoRecords" wizardNoRecords="No records">
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
				<Section id="42" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Panel id="45" visible="True" name="PageBreak">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<Navigator id="47" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Tile">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="48" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
						<ReportLabel id="46" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="departmentoffice_employee1Page_FooterReport_CurrentDate">
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
						<Action actionName="Custom Code" actionCategory="General" id="72"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="employee.OfficeID" parameterSource="s_employee_OfficeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="employee.BirthMonth" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="2" parameterSource="s_BirthMonth"/>
				<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="employee.BirthDay" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3" parameterSource="s_BirthDay"/>
				<TableParameter id="52" conditionType="Parameter" useIsNull="False" field="employee.BirthYear" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="4" parameterSource="s_BirthYear"/>
				<TableParameter id="94" conditionType="Parameter" useIsNull="False" field="lut_statofappt2.StatApp" dataType="Text" searchConditionType="In" parameterType="URL" logicOperator="And" parameterSource="CheckBoxList1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="3" tableName="departmentoffice" posLeft="311" posTop="125" posWidth="129" posHeight="180"/>
				<JoinTable id="4" tableName="employee" posLeft="44" posTop="26" posWidth="160" posHeight="250"/>
				<JoinTable id="14" tableName="lut_sex" posLeft="231" posTop="6" posWidth="95" posHeight="88"/>
				<JoinTable id="91" tableName="lut_statofappt2" posLeft="347" posTop="10" posWidth="95" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="16" tableLeft="employee" tableRight="departmentoffice" fieldLeft="employee.OfficeID" fieldRight="departmentoffice.OfficeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="17" tableLeft="employee" tableRight="lut_sex" fieldLeft="employee.Sex" fieldRight="lut_sex.SexID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="92" tableLeft="employee" tableRight="lut_statofappt2" fieldLeft="employee.StatAppID" fieldRight="lut_statofappt2.StatAppID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="6" tableName="departmentoffice" fieldName="OfficeAcronym"/>
				<Field id="8" tableName="employee" fieldName="Surname"/>
				<Field id="9" tableName="employee" fieldName="FirstName"/>
				<Field id="10" tableName="employee" fieldName="MiddleName"/>
				<Field id="11" tableName="employee" fieldName="BirthMonth"/>
				<Field id="12" tableName="employee" fieldName="BirthDay"/>
				<Field id="13" tableName="employee" fieldName="BirthYear"/>
				<Field id="18" tableName="employee" fieldName="employee.Sex" alias="employee_Sex"/>
				<Field id="19" tableName="employee" fieldName="PlaceOfBirth"/>
				<Field id="20" tableName="employee" fieldName="CivilStatus"/>
				<Field id="21" tableName="lut_sex" fieldName="lut_sex.Sex" alias="lut_sex_Sex"/>
				<Field id="22" tableName="employee" fieldName="employee.OfficeID" alias="employee_OfficeID"/>
				<Field id="86" tableName="employee" fieldName="BirthDate"/>
				<Field id="87" fieldName="DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), BirthDate)), '%Y') + 0" isExpression="True" alias="Expr1"/>
				<Field id="93" tableName="lut_statofappt2" fieldName="lut_statofappt2.*"/>
				<Field id="98" tableName="employee" fieldName="employee.Position" alias="employee_Position"/>
				<Field id="100" tableName="employee" fieldName="NameExtension"/>
				<Field id="105" tableName="employee" fieldName="MiddleInitial"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="36" name="OfficeAcronym" field="OfficeAcronym" sqlField="departmentoffice.OfficeAcronym" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="23" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="departmentoffice_employee" wizardCaption="Search Departmentoffice Employee " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="QueryCSC.ccp" PathID="departmentoffice_employee" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Link id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="QueryCSC.ccp" removeParameters="s_employee_OfficeID;s_BirthMonth;s_BirthDay;s_BirthYear;CheckBoxList1" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="departmentoffice_employeeClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="25" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="departmentoffice_employeeButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="26" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_employee_OfficeID" wizardCaption="Office ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_employee_OfficeID" connection="Connection1" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="OfficeAcronym" orderBy="OfficeAcronym">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="79" tableName="departmentoffice" posLeft="10" posTop="10" posWidth="129" posHeight="180"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
				<ListBox id="27" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_BirthMonth" wizardCaption="Birth Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_BirthMonth" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month" unique="True">
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
				<ListBox id="28" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_BirthDay" wizardCaption="Birth Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_BirthDay" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
				<TextBox id="29" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_BirthYear" wizardCaption="Birth Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_BirthYear">
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
				<CheckBoxList id="90" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" html="True" returnValueType="Number" name="CheckBoxList1" PathID="departmentoffice_employeeCheckBoxList1" connection="Connection1" dataSource="lut_statofappt2" boundColumn="StatApp" textColumn="StatApp">
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
				</CheckBoxList>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="33" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="30" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="QueryBirthday2print.ccp" wizardTheme="Tile" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="32" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="31" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="QueryCSC_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="QueryCSC.php" forShow="True" url="QueryCSC.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="80" groupID="7"/>
		<Group id="81" groupID="6"/>
		<Group id="82" groupID="5"/>
		<Group id="83" groupID="4"/>
		<Group id="84" groupID="3"/>
		<Group id="85" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
