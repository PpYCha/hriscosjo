<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0" pasteActions="pasteActions">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="Connection1" dataSource="employee, lut_servicerecpurpose, employee_servicerecord" name="employee_lut_servicerecpu" orderBy="DateFrom, DateTo, MonthlySalary" pageSizeLimit="100" wizardCaption=" Employee, Lut Servicerecpurpose, Employee Servicerecord " wizardLayoutType="Tabular" pasteActions="pasteActions" activeCollection="TableParameters">
			<Components>
				<Section id="32" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="33" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="34" visible="True" lines="1" name="Detail" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
						<Hidden id="50" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<ReportLabel id="68" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="DateTo" fieldSource="DateTo" wizardCaption="DateTo" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailDateTo">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="70" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Designation" fieldSource="Designation" wizardCaption="Designation" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailDesignation">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="72" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="StatofAppt" fieldSource="StatofAppt" wizardCaption="StatofAppt" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailStatofAppt">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="74" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="AnnualSalary" fieldSource="AnnualSalary" wizardCaption="AnnualSalary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_lut_servicerecpuDetailAnnualSalary" format="#,##0.00">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="76" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Slash" fieldSource="Slash" wizardCaption="Slash" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailSlash">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="78" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="OfficeStatn" fieldSource="OfficeStatn" wizardCaption="OfficeStatn" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailOfficeStatn">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="80" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Branch" fieldSource="Branch" wizardCaption="Branch" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailBranch">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="82" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="AbsenceWOPay" fieldSource="AbsenceWOPay" wizardCaption="AbsenceWOPay" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailAbsenceWOPay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Hidden id="52" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="54" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailMiddleName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="56" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="NameExtension" fieldSource="NameExtension" wizardCaption="NameExtension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailNameExtension">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="58" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthMonth" fieldSource="BirthMonth" wizardCaption="BirthMonth" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailBirthMonth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="60" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthDay" fieldSource="BirthDay" wizardCaption="BirthDay" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailBirthDay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="62" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="BirthYear" fieldSource="BirthYear" wizardCaption="BirthYear" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailBirthYear">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="64" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PlaceOfBirth" fieldSource="PlaceOfBirth" wizardCaption="PlaceOfBirth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailPlaceOfBirth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<ReportLabel id="66" fieldSourceType="DBColumn" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="DateFrom" fieldSource="DateFrom" wizardCaption="DateFrom" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailDateFrom" format="mm/dd/yyyy">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="84" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Separation" fieldSource="Separation" wizardCaption="Separation" wizardSize="50" wizardMaxLength="60" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailSeparation">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Hidden id="86" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ServiceRecPurpose" fieldSource="ServiceRecPurpose" wizardCaption="ServiceRecPurpose" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_servicerecpuDetailServiceRecPurpose">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="88" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="OfficeID" fieldSource="OfficeID" wizardCaption="OfficeID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_lut_servicerecpuDetailOfficeID">
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
				<Section id="35" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
					<Components>
						<Panel id="36" visible="True" name="NoRecords" wizardNoRecords="No records">
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
				<Section id="37" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
					<Components>
						<Panel id="38" visible="True" name="PageBreak">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Panel>
						<ReportLabel id="40" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentPage" fieldSource="PageNumber" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix="Page " PathID="employee_lut_servicerecpuPage_FooterReport_CurrentPage">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<ReportLabel id="41" fieldSourceType="SpecialValue" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalPages" fieldSource="TotalPages" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" wizardPrefix=" of " PathID="employee_lut_servicerecpuPage_FooterReport_TotalPages">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</ReportLabel>
						<Navigator id="42" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Custom" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Apricot">
							<Components/>
							<Events>
								<Event name="BeforeShow" type="Server">
									<Actions>
										<Action actionName="Hide-Show Component" actionCategory="General" id="43" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
						<Action actionName="Custom Code" actionCategory="General" id="92"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="44" conditionType="Parameter" useIsNull="False" field="Surname" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" parameterSource="s_Surname"/>
				<TableParameter id="45" conditionType="Parameter" useIsNull="False" field="FirstName" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="2" parameterSource="s_FirstName"/>
				<TableParameter id="46" conditionType="Parameter" useIsNull="False" field="MiddleName" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="3" parameterSource="s_MiddleName"/>
				<TableParameter id="47" conditionType="Parameter" useIsNull="False" field="NameExtension" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="4" parameterSource="s_NameExtension"/>
				<TableParameter id="48" conditionType="Parameter" useIsNull="False" field="OfficeID" parameterSource="s_OfficeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="5"/>
				<TableParameter id="104" conditionType="Parameter" useIsNull="False" field="employee.EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="3" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="271"/>
				<JoinTable id="13" tableName="lut_servicerecpurpose" posLeft="270" posTop="203" posWidth="128" posHeight="88"/>
				<JoinTable id="16" tableName="employee_servicerecord" posLeft="270" posTop="12" posWidth="156" posHeight="180"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="17" tableLeft="employee_servicerecord" fieldLeft="employee_servicerecord.EmployeeID" tableRight="employee" fieldRight="employee.EmployeeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="14" tableLeft="employee" fieldLeft="employee.SecRecPurposeID" tableRight="lut_servicerecpurpose" fieldRight="lut_servicerecpurpose.SecRecPurposeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="4" tableName="employee" fieldName="Surname"/>
				<Field id="5" tableName="employee" fieldName="FirstName"/>
				<Field id="6" tableName="employee" fieldName="MiddleName"/>
				<Field id="7" tableName="employee" fieldName="NameExtension"/>
				<Field id="8" tableName="employee" fieldName="BirthMonth"/>
				<Field id="9" tableName="employee" fieldName="BirthDay"/>
				<Field id="10" tableName="employee" fieldName="BirthYear"/>
				<Field id="11" tableName="employee" fieldName="PlaceOfBirth"/>
				<Field id="12" tableName="employee" fieldName="employee.SecRecPurposeID" alias="employee_SecRecPurposeID"/>
				<Field id="15" tableName="lut_servicerecpurpose" fieldName="lut_servicerecpurpose.*"/>
				<Field id="18" tableName="employee_servicerecord" fieldName="employee_servicerecord.*"/>
				<Field id="19" tableName="employee" fieldName="OfficeID"/>
				<Field id="101" tableName="employee" fieldName="employee.EmployeeID" alias="employee_EmployeeID"/>
				<Field id="105" tableName="employee" fieldName="CertDay"/>
				<Field id="106" tableName="employee" fieldName="CertMonth"/>
				<Field id="107" tableName="employee" fieldName="CertYear"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<ReportGroups/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Report>
		<Record id="20" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employee_employee_service" wizardCaption="Search Employee Employee Service " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="SRreport.ccp" PathID="employee_employee_service" pasteActions="pasteActions">
			<Components>
				<Link id="21" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="SRreport.ccp" removeParameters="s_Surname;s_FirstName;s_MiddleName;s_NameExtension;s_OfficeID" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="employee_employee_serviceClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="22" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="employee_employee_serviceButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="23" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employee_employee_services_Surname" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="24" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employee_employee_services_FirstName" required="True">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="25" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employee_employee_services_MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<Link id="108" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="employee_employee_serviceLink3" hrefSource="Purpose4_copy.ccp" wizardUseTemplateBlock="False">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
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
		<Link id="89" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print1" hrefSource="SRreport_ms_backup3_2c.ccp" wizardTheme="Apricot" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print1">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Hide-Show Component" actionCategory="General" id="90" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="91" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Link id="109" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="SRreport.php" forShow="True" url="SRreport.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="SRreport_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="110" groupID="7"/>
		<Group id="111" groupID="6"/>
		<Group id="112" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
