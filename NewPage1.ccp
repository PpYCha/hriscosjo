<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Apricot" wizardThemeVersion="3.0">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" linesPerPhysicalPage="50" connection="Connection1" dataSource="employee, employee_leave" name="employee_employee_leave" pageSizeLimit="100" wizardCaption=" Employee, Employee Leave " wizardLayoutType="Tabular">
<Components>
<Section id="13" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Section>
<Section id="14" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
<Components>
<Sorter id="23" visible="True" name="Sorter_Surname" column="Surname" wizardCaption="Surname" wizardSortingType="SimpleDir" wizardControl="Surname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="25" visible="True" name="Sorter_FirstName" column="FirstName" wizardCaption="First Name" wizardSortingType="SimpleDir" wizardControl="FirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="27" visible="True" name="Sorter_LeaveID" column="LeaveID" wizardCaption="Leave ID" wizardSortingType="SimpleDir" wizardControl="LeaveID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="29" visible="True" name="Sorter_EmployeeID" column="employee_leave.EmployeeID" wizardCaption="Employee ID" wizardSortingType="SimpleDir" wizardControl="EmployeeID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="31" visible="True" name="Sorter_LeaveMonth" column="LeaveMonth" wizardCaption="Leave Month" wizardSortingType="SimpleDir" wizardControl="LeaveMonth">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="33" visible="True" name="Sorter_LeaveYear" column="LeaveYear" wizardCaption="Leave Year" wizardSortingType="SimpleDir" wizardControl="LeaveYear">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="35" visible="True" name="Sorter_Particular" column="Particular" wizardCaption="Particular" wizardSortingType="SimpleDir" wizardControl="Particular">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="37" visible="True" name="Sorter_VLEarned" column="VLEarned" wizardCaption="VLEarned" wizardSortingType="SimpleDir" wizardControl="VLEarned">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="39" visible="True" name="Sorter_VLAbsenceUndertWpay" column="VLAbsenceUndertWpay" wizardCaption="VLAbsence Undert Wpay" wizardSortingType="SimpleDir" wizardControl="VLAbsenceUndertWpay">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="41" visible="True" name="Sorter_VLPrevBalance" column="VLPrevBalance" wizardCaption="VLPrev Balance" wizardSortingType="SimpleDir" wizardControl="VLPrevBalance">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="43" visible="True" name="Sorter_VLUndertWopay" column="VLUndertWopay" wizardCaption="VLUndert Wopay" wizardSortingType="SimpleDir" wizardControl="VLUndertWopay">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="45" visible="True" name="Sorter_SLEarned" column="SLEarned" wizardCaption="SLEarned" wizardSortingType="SimpleDir" wizardControl="SLEarned">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="47" visible="True" name="Sorter_SLAbsenceWpay" column="SLAbsenceWpay" wizardCaption="SLAbsence Wpay" wizardSortingType="SimpleDir" wizardControl="SLAbsenceWpay">
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
<Section id="15" visible="True" lines="1" name="Detail">
<Components>
<ReportLabel id="24" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_leaveDetailSurname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="26" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_leaveDetailFirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="28" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="LeaveID" fieldSource="LeaveID" wizardCaption="LeaveID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailLeaveID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="30" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="EmployeeID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailEmployeeID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="32" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="LeaveMonth" fieldSource="LeaveMonth" wizardCaption="LeaveMonth" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_leaveDetailLeaveMonth">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="34" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="LeaveYear" fieldSource="LeaveYear" wizardCaption="LeaveYear" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_leaveDetailLeaveYear">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="36" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Particular" fieldSource="Particular" wizardCaption="Particular" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_employee_leaveDetailParticular">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="38" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="VLEarned" fieldSource="VLEarned" wizardCaption="VLEarned" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailVLEarned">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="40" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="VLAbsenceUndertWpay" fieldSource="VLAbsenceUndertWpay" wizardCaption="VLAbsenceUndertWpay" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailVLAbsenceUndertWpay">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="42" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="VLPrevBalance" fieldSource="VLPrevBalance" wizardCaption="VLPrevBalance" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailVLPrevBalance">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="44" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="VLUndertWopay" fieldSource="VLUndertWopay" wizardCaption="VLUndertWopay" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailVLUndertWopay">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="46" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="SLEarned" fieldSource="SLEarned" wizardCaption="SLEarned" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailSLEarned">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="48" fieldSourceType="DBColumn" dataType="Single" html="False" hideDuplicates="False" resetAt="Report" name="SLAbsenceWpay" fieldSource="SLAbsenceWpay" wizardCaption="SLAbsenceWpay" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="employee_employee_leaveDetailSLAbsenceWpay">
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
<Section id="16" visible="True" lines="0" name="Report_Footer" wizardSectionType="ReportFooter">
<Components>
<Panel id="17" visible="True" name="NoRecords" wizardNoRecords="No records">
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
<Section id="18" visible="True" lines="2" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
<Components>
<Panel id="19" visible="True" name="PageBreak">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Panel>
<ReportLabel id="20" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="employee_employee_leavePage_FooterReport_CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<Navigator id="21" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Apricot">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Hide-Show Component" actionCategory="General" id="22" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
<TableParameters/>
<JoinTables>
<JoinTable id="3" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
<JoinTable id="4" tableName="employee_leave" posLeft="191" posTop="10" posWidth="160" posHeight="180"/>
</JoinTables>
<JoinLinks>
<JoinTable2 id="5" tableLeft="employee_leave" tableRight="employee" fieldLeft="employee_leave.EmployeeID" fieldRight="employee.EmployeeID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
<Fields>
<Field id="6" tableName="employee" fieldName="EmployeeIDNo"/>
<Field id="7" tableName="employee_leave" fieldName="employee_leave.*"/>
<Field id="8" tableName="employee" fieldName="Surname"/>
<Field id="9" tableName="employee" fieldName="FirstName"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<ReportGroups/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Report>
<Link id="10" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="NewPage1.ccp" wizardTheme="Apricot" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Hide-Show Component" actionCategory="General" id="12" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
</Actions>
</Event>
</Events>
<LinkParameters>
<LinkParameter id="11" sourceType="Expression" format="yyyy-mm-dd" name="ViewMode" source="&quot;Print&quot;"/>
</LinkParameters>
<Attributes/>
<Features/>
</Link>
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="NewPage1_events.php" forShow="False" comment="//" codePage="windows-1252"/>
<CodeFile id="Code" language="PHPTemplates" name="NewPage1.php" forShow="True" url="NewPage1.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events/>
</Page>
