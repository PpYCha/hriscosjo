<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="65" linesPerPhysicalPage="50" connection="Connection1" dataSource="departmentoffice, employee, employee_training" name="departmentoffice_employee1" orderBy="Surname" pageSizeLimit="100" wizardCaption=" Departmentoffice, Employee, Employee Training " wizardLayoutType="GroupLeft">
			<Components>
				<Section id="32" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components>
						<ReportLabel id="41" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="departmentoffice_employee1Report_HeaderReport_TotalRecords">
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
				<Section id="33" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
						<Sorter id="58" visible="True" name="Sorter_EmployeeIDNo" column="EmployeeIDNo" wizardCaption="Employee IDNo" wizardSortingType="SimpleDir" wizardControl="EmployeeIDNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="60" visible="True" name="Sorter_Surname" column="Surname" wizardCaption="Surname" wizardSortingType="SimpleDir" wizardControl="Surname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="62" visible="True" name="Sorter_FirstName" column="FirstName" wizardCaption="First Name" wizardSortingType="SimpleDir" wizardControl="FirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="64" visible="True" name="Sorter_MiddleName" column="MiddleName" wizardCaption="Middle Name" wizardSortingType="SimpleDir" wizardControl="MiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="66" visible="True" name="Sorter_TrainingTitle" column="TrainingTitle" wizardCaption="Training Title" wizardSortingType="SimpleDir" wizardControl="TrainingTitle">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="68" visible="True" name="Sorter_DateFrom" column="DateFrom" wizardCaption="Date From" wizardSortingType="SimpleDir" wizardControl="DateFrom">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="70" visible="True" name="Sorter_DateTo" column="DateTo" wizardCaption="Date To" wizardSortingType="SimpleDir" wizardControl="DateTo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="72" visible="True" name="Sorter_NoOfHours" column="NoOfHours" wizardCaption="No Of Hours" wizardSortingType="SimpleDir" wizardControl="NoOfHours">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="74" visible="True" name="Sorter_TrainingCategory" column="TrainingCategory" wizardCaption="Training Category" wizardSortingType="SimpleDir" wizardControl="TrainingCategory">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
						<Sorter id="76" visible="True" name="Sorter_ConductedBy" column="ConductedBy" wizardCaption="Conducted By" wizardSortingType="SimpleDir" wizardControl="ConductedBy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Sorter>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="35" visible="True" lines="0" name="OfficeAcronym_Header">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="36" visible="True" lines="1" name="Detail">
					<Components>
						<ReportLabel id="57" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="True" resetAt="Report" name="OfficeAcronym" fieldSource="OfficeAcronym" wizardCaption="OfficeAcronym" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailOfficeAcronym">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="59" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="EmployeeIDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailEmployeeIDNo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="61" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="63" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="65" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="67" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="TrainingTitle" fieldSource="TrainingTitle" wizardCaption="TrainingTitle" wizardSize="50" wizardMaxLength="150" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailTrainingTitle">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="69" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="DateFrom" fieldSource="DateFrom" wizardCaption="DateFrom" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailDateFrom">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="71" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="DateTo" fieldSource="DateTo" wizardCaption="DateTo" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailDateTo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="73" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="NoOfHours" fieldSource="NoOfHours" wizardCaption="NoOfHours" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailNoOfHours">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="75" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="TrainingCategory" fieldSource="TrainingCategory" wizardCaption="TrainingCategory" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailTrainingCategory">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="77" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ConductedBy" fieldSource="ConductedBy" wizardCaption="ConductedBy" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailConductedBy">
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
				<Section id="37" visible="True" lines="0" name="OfficeAcronym_Footer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="38" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="39" visible="True" name="NoRecords" wizardNoRecords="No records">
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
				<Section id="40" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Panel id="42" visible="True" name="PageBreak">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<Navigator id="43" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Joyful">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="44" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
			<Events/>
			<TableParameters>
				<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="EmployeeIDNo" parameterSource="s_EmployeeIDNo" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="Surname" parameterSource="s_Surname" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
				<TableParameter id="48" conditionType="Parameter" useIsNull="False" field="MiddleName" parameterSource="s_MiddleName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
				<TableParameter id="49" conditionType="Parameter" useIsNull="False" field="employee.OfficeID" parameterSource="s_OfficeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="5"/>
				<TableParameter id="50" conditionType="Parameter" useIsNull="False" field="StatAppt" parameterSource="s_StatAppt" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="6"/>
				<TableParameter id="51" conditionType="Parameter" useIsNull="False" field="TrainingTitle" parameterSource="s_TrainingTitle" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="7"/>
				<TableParameter id="52" conditionType="Parameter" useIsNull="False" field="DateFrom" parameterSource="s_DateFrom" dataType="Date" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="8"/>
				<TableParameter id="53" conditionType="Parameter" useIsNull="False" field="DateTo" parameterSource="s_DateTo" dataType="Date" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="9"/>
				<TableParameter id="54" conditionType="Parameter" useIsNull="False" field="NoOfHours" parameterSource="s_NoOfHours" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="10"/>
				<TableParameter id="55" conditionType="Parameter" useIsNull="False" field="TrainingCategory" parameterSource="s_TrainingCategory" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="11"/>
				<TableParameter id="56" conditionType="Parameter" useIsNull="False" field="ConductedBy" parameterSource="s_ConductedBy" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="12"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="3" tableName="departmentoffice" posLeft="10" posTop="10" posWidth="129" posHeight="180"/>
				<JoinTable id="4" tableName="employee" posLeft="204" posTop="13" posWidth="160" posHeight="180"/>
				<JoinTable id="5" tableName="employee_training" posLeft="21" posTop="200" posWidth="131" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="6" tableLeft="employee" tableRight="departmentoffice" fieldLeft="employee.OfficeID" fieldRight="departmentoffice.OfficeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="7" tableLeft="employee_training" tableRight="employee" fieldLeft="employee_training.EmployeeID" fieldRight="employee.EmployeeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="8" tableName="departmentoffice" fieldName="OfficeAcronym"/>
				<Field id="9" tableName="employee" fieldName="employee.*"/>
				<Field id="10" tableName="employee_training" fieldName="employee_training.*"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups>
				<ReportGroup id="34" name="OfficeAcronym" field="OfficeAcronym" sqlField="departmentoffice.OfficeAcronym" sortOrder="asc"/>
			</ReportGroups>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="11" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="departmentoffice_employee" wizardCaption="Search Departmentoffice Employee " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="QueryTrainings.ccp" PathID="departmentoffice_employee">
			<Components>
				<Link id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="QueryTrainings.ccp" removeParameters="s_EmployeeIDNo;s_Surname;s_FirstName;s_MiddleName;s_OfficeID;s_StatAppt;s_TrainingTitle;s_DateFrom;s_DateTo;s_NoOfHours;s_TrainingCategory;s_ConductedBy" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="departmentoffice_employeeClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="13" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="departmentoffice_employeeButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="14" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="departmentoffice_employees_EmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="15" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="departmentoffice_employees_Surname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="16" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="departmentoffice_employees_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="17" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="departmentoffice_employees_MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="18" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_OfficeID" wizardCaption="Office ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_OfficeID">
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
				<ListBox id="19" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_StatAppt" wizardCaption="Stat Appt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="departmentoffice_employees_StatAppt">
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
				<TextBox id="20" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_TrainingTitle" wizardCaption="Training Title" wizardSize="50" wizardMaxLength="150" wizardIsPassword="False" PathID="departmentoffice_employees_TrainingTitle">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DateFrom" wizardCaption="Date From" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="departmentoffice_employees_DateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="22" name="DatePicker_s_DateFrom" control="s_DateFrom" wizardSatellite="True" wizardControl="s_DateFrom" wizardDatePickerType="Image" wizardPicture="Styles/Fresh/Images/DatePicker.gif" style="Styles/Fresh/Style.css" PathID="departmentoffice_employeeDatePicker_s_DateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="s_DateTo" wizardCaption="Date To" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" PathID="departmentoffice_employees_DateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="24" name="DatePicker_s_DateTo" control="s_DateTo" wizardSatellite="True" wizardControl="s_DateTo" wizardDatePickerType="Image" wizardPicture="Styles/Fresh/Images/DatePicker.gif" style="Styles/Fresh/Style.css" PathID="departmentoffice_employeeDatePicker_s_DateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
				<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_NoOfHours" wizardCaption="No Of Hours" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" PathID="departmentoffice_employees_NoOfHours">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="26" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_TrainingCategory" wizardCaption="Training Category" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="departmentoffice_employees_TrainingCategory">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="27" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_ConductedBy" wizardCaption="Conducted By" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" PathID="departmentoffice_employees_ConductedBy">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="31" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
		<Link id="28" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="QueryTrainings.ccp" wizardTheme="Joyful" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="30" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="29" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="QueryTrainings_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="QueryTrainings.php" forShow="True" url="QueryTrainings.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
