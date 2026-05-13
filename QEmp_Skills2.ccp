<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Link id="12" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="QEmp_Skills2_print.ccp" wizardTheme="Gourd" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="14" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="13" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="Q_Employee.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Report id="2" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="Connection1" dataSource="employee, employee_specialskills" name="employee_employee_special" orderBy="SpecialSkillsID" pageSizeLimit="100" wizardCaption=" Employee, Employee Specialskills " wizardLayoutType="Tabular" activeCollection="TableParameters">
			<Components>
				<Section id="15" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="21" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="employee_employee_specialReport_HeaderReport_TotalRecords">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Image id="40" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ReportLabel2" PathID="employee_employee_specialReport_HeaderReportLabel2" fieldSource="EmpPicture" visible="Yes">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Image>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="16" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="17" visible="True" lines="1" name="Detail" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<ReportLabel id="26" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_specialDetailReport_Row_Number">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="38" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SkillsHobbies" fieldSource="SkillsHobbies" wizardCaption="SkillsHobbies" wizardSize="50" wizardMaxLength="150" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_specialDetailSkillsHobbies">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Hidden id="28" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="EmployeeIDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_specialDetailEmployeeIDNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="30" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_specialDetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="32" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_specialDetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="34" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_specialDetailMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="36" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="NameExtension" fieldSource="NameExtension" wizardCaption="NameExtension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_specialDetailNameExtension">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="18" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="19" visible="True" name="NoRecords" wizardNoRecords="No records">
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
				<Section id="20" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Navigator id="23" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Gourd">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="24" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
									</Actions>
								</Event>
							</Events>
							<Attributes/>
							<Features/>
						</Navigator>
						<ReportLabel id="22" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="employee_employee_specialPage_FooterReport_CurrentDate">
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
			<Events/>
			<TableParameters>
				<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="employee.EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="3" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
				<JoinTable id="4" tableName="employee_specialskills" posLeft="253" posTop="19" posWidth="98" posHeight="104"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="43" tableLeft="employee_specialskills" tableRight="employee" fieldLeft="employee_specialskills.EmployeeID" fieldRight="employee.EmployeeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="6" tableName="employee" fieldName="EmployeeIDNo"/>
				<Field id="7" tableName="employee_specialskills" fieldName="employee_specialskills.*"/>
				<Field id="8" tableName="employee" fieldName="Surname"/>
				<Field id="9" tableName="employee" fieldName="FirstName"/>
				<Field id="10" tableName="employee" fieldName="MiddleName"/>
				<Field id="11" tableName="employee" fieldName="NameExtension"/>
				<Field id="41" tableName="employee" fieldName="EmpPicture"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="QEmp_Skills2_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="QEmp_Skills2.php" forShow="True" url="QEmp_Skills2.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
