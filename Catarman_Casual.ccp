<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Tile" wizardThemeVersion="3.0">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Web" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="Connection1" dataSource="employee, lut_statofappt2" name="employee_lut_statofappt3" orderBy="Surname" pageSizeLimit="100" wizardCaption=" Employee, Lut Statofappt2 " wizardLayoutType="Tabular" activeCollection="TableParameters">
<Components>
<Section id="16" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
<Components>
<ReportLabel id="22" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_TotalRecords" function="Count" wizardUseTemplateBlock="False" PathID="employee_lut_statofappt3Report_HeaderReport_TotalRecords" format="#,##0">
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
<Section id="17" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Section>
<Section id="18" visible="True" lines="1" name="Detail">
<Components>
<ReportLabel id="32" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="Report_Row_Number" function="Count" wizardAlign="right" wizardCaption="#" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailReport_Row_Number">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="34" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailSurname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="37" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailFirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="40" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleName" fieldSource="MiddleName" wizardCaption="MiddleName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailMiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="43" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermBrgy" fieldSource="PermBrgy" wizardCaption="PermBrgy" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailPermBrgy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="46" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="PermMunicipality" fieldSource="PermMunicipality" wizardCaption="PermMunicipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailPermMunicipality">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="49" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Position" fieldSource="Position" wizardCaption="Position" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailPosition">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<ReportLabel id="55" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="StatApp" fieldSource="StatApp" wizardCaption="StatApp" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="employee_lut_statofappt3DetailStatApp">
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
<Section id="19" visible="True" lines="1" name="Report_Footer" wizardSectionType="ReportFooter">
<Components>
<Panel id="20" visible="True" name="NoRecords" wizardNoRecords="No records">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Panel>
<ReportLabel id="27" fieldSourceType="DBColumn" dataType="Integer" html="False" hideDuplicates="False" resetAt="Report" name="TotalCount_Surname" summarised="True" function="Count" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardPrefix="Count: " wizardAddNbsp="False" wizardAlign="right" wizardVAlign="baseline" PathID="employee_lut_statofappt3Report_FooterTotalCount_Surname">
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
<Section id="21" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True">
<Components>
<ReportLabel id="23" fieldSourceType="SpecialValue" dataType="Date" html="False" hideDuplicates="False" resetAt="Report" name="Report_CurrentDate" fieldSource="CurrentDate" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardInsertToDateTD="True" PathID="employee_lut_statofappt3Page_FooterReport_CurrentDate">
<Components/>
<Events/>
<Attributes/>
<Features/>
</ReportLabel>
<Navigator id="24" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardImagesScheme="Tile">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Hide-Show Component" actionCategory="General" id="25" action="Hide" conditionType="Parameter" dataType="Integer" condition="LessThan" name1="TotalPages" sourceType1="SpecialValue" name2="2" sourceType2="Expression"/>
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
<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="PermMunicipality" parameterSource="s_PermMunicipality" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
<TableParameter id="29" conditionType="Parameter" useIsNull="False" field="Position" parameterSource="s_Position" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
<TableParameter id="57" conditionType="Parameter" useIsNull="False" field="lut_statofappt2.StatApp" dataType="Text" searchConditionType="In" parameterType="URL" logicOperator="And" parameterSource="CheckBoxList1"/>
</TableParameters>
<JoinTables>
<JoinTable id="3" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="211"/>
<JoinTable id="4" tableName="lut_statofappt2" posLeft="191" posTop="10" posWidth="95" posHeight="88"/>
</JoinTables>
<JoinLinks>
<JoinTable2 id="5" tableLeft="employee" tableRight="lut_statofappt2" fieldLeft="employee.StatAppID" fieldRight="lut_statofappt2.StatAppID" joinType="inner" conditionType="Equal"/>
</JoinLinks>
<Fields>
<Field id="26" tableName="employee" fieldName="Surname" alias="Surname"/>
<Field id="36" tableName="employee" fieldName="FirstName" alias="FirstName"/>
<Field id="39" tableName="employee" fieldName="MiddleName" alias="MiddleName"/>
<Field id="42" tableName="employee" fieldName="PermBrgy" alias="PermBrgy"/>
<Field id="45" tableName="employee" fieldName="PermMunicipality" alias="PermMunicipality"/>
<Field id="48" tableName="employee" fieldName="Position" alias="Position"/>
<Field id="51" tableName="employee" fieldName="employee.StatAppID" alias="employee_StatAppID"/>
<Field id="54" tableName="lut_statofappt2" fieldName="StatApp" alias="StatApp"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<ReportGroups/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Report>
<Record id="6" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employee_lut_statofappt2" wizardCaption="Search Employee Lut Statofappt2 " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="Catarman_Casual.ccp" PathID="employee_lut_statofappt2">
<Components>
<Link id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="Catarman_Casual.ccp" removeParameters="s_PermMunicipality;s_Position;s_employee_StatAppID" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="employee_lut_statofappt2ClearParameters">
<Components/>
<Events/>
<LinkParameters/>
<Attributes/>
<Features/>
</Link>
<Button id="8" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="employee_lut_statofappt2Button_DoSearch">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<ListBox id="9" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_PermMunicipality" wizardCaption="Perm Municipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardEmptyCaption="Select Value" PathID="employee_lut_statofappt2s_PermMunicipality" connection="Connection1" dataSource="lut_municipality" boundColumn="Municipality" textColumn="Municipality">
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
<TextBox id="10" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Position" wizardCaption="Position" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" PathID="employee_lut_statofappt2s_Position">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<CheckBoxList id="56" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" html="True" returnValueType="Number" name="CheckBoxList1" PathID="employee_lut_statofappt2CheckBoxList1" connection="Connection1" dataSource="lut_statofappt2" boundColumn="StatApp" textColumn="StatApp">
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
<Action actionName="Hide-Show Component" actionCategory="General" id="15" action="Hide" conditionType="Parameter" dataType="Text" condition="Equal" parameter1="Print" name1="ViewMode" sourceType1="URL" name2="&quot;Print&quot;" sourceType2="Expression"/>
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
<Link id="12" visible="Dynamic" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Report_Print" hrefSource="Catarman_Casual.ccp" wizardTheme="Tile" wizardThemeType="File" wizardDefaultValue="Printable version" wizardUseTemplateBlock="True" wizardBeforeHTML="&lt;p align=&quot;right&quot;&gt;" wizardAfterHTML="&lt;/p&gt;" wizardLinkTarget="_blank" PathID="Report_Print">
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
</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="Catarman_Casual_events.php" forShow="False" comment="//" codePage="windows-1252"/>
<CodeFile id="Code" language="PHPTemplates" name="Catarman_Casual.php" forShow="True" url="Catarman_Casual.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events/>
</Page>
