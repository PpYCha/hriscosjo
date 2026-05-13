<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="None" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Report id="2" secured="False" enablePrint="True" showMode="Print" sourceType="Table" returnValueType="Number" linesPerWebPage="40" connection="Connection1" dataSource="employee, lut_servicerecpurpose, departmentoffice" activeCollection="TableParameters" name="departmentoffice_employee1" pageSizeLimit="100" wizardCaption=" Departmentoffice, Employee, Lut Servicerecpurpose " wizardLayoutType="Tabular" pasteActions="pasteActions">
			<Components>
				<Section id="32" visible="True" lines="0" name="Report_Header" wizardSectionType="ReportHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="33" visible="True" lines="1" name="Page_Header" wizardSectionType="PageHeader">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<Section id="34" visible="True" lines="1" name="Detail" pasteActions="pasteActions" pasteAsReplace="pasteAsReplace">
					<Components>
						<Hidden id="45" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailSurname">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="47" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="FirstName" fieldSource="FirstName" wizardCaption="FirstName" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailFirstName">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="49" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="MiddleInitial" fieldSource="MiddleInitial" wizardCaption="MiddleInitial" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailMiddleInitial">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="51" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="NameOfficeDept" fieldSource="NameOfficeDept" wizardCaption="NameOfficeDept" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailNameOfficeDept">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="53" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="employee_Position" fieldSource="employee_Position" wizardCaption="employee_Position" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1Detailemployee_Position">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="55" fieldSourceType="DBColumn" dataType="Float" html="False" hideDuplicates="False" resetAt="Report" name="MonthlySalary" fieldSource="MonthlySalary" wizardCaption="MonthlySalary" wizardSize="12" wizardMaxLength="12" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" wizardAlign="right" PathID="departmentoffice_employee1DetailMonthlySalary" format="#,##0.00">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="57" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="SalaryWords" fieldSource="SalaryWords" wizardCaption="SalaryWords" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailSalaryWords">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="59" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="CertDay" fieldSource="CertDay" wizardCaption="CertDay" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailCertDay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="61" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="CertMonth" fieldSource="CertMonth" wizardCaption="CertMonth" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailCertMonth">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="63" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="CertYear" fieldSource="CertYear" wizardCaption="CertYear" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailCertYear">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="65" fieldSourceType="DBColumn" dataType="Text" html="False" hideDuplicates="False" resetAt="Report" name="ServiceRecPurpose" fieldSource="ServiceRecPurpose" wizardCaption="ServiceRecPurpose" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="False" PathID="departmentoffice_employee1DetailServiceRecPurpose">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="71" fieldSourceType="DBColumn" dataType="Text" name="Hidden1" PathID="departmentoffice_employee1DetailHidden1" fieldSource="Title">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="73" fieldSourceType="DBColumn" dataType="Text" name="Hidden3" PathID="departmentoffice_employee1DetailHidden3" fieldSource="EffectiveDay">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="80" fieldSourceType="DBColumn" dataType="Float" name="Hidden6" PathID="departmentoffice_employee1DetailHidden6" fieldSource="Expr1" format="#,##0.00">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="83" fieldSourceType="DBColumn" dataType="Text" name="Hidden5" PathID="departmentoffice_employee1DetailHidden5" fieldSource="NameExtension">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="103" fieldSourceType="DBColumn" dataType="Text" name="Hidden7" PathID="departmentoffice_employee1DetailHidden7" fieldSource="NameOfficeHead">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="104" fieldSourceType="DBColumn" dataType="Text" name="Hidden8" PathID="departmentoffice_employee1DetailHidden8" fieldSource="Position">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="74" fieldSourceType="DBColumn" dataType="Text" name="Hidden4" PathID="departmentoffice_employee1DetailHidden4" fieldSource="EffectiveYear">
							<Components/>
							<Events/>
							<Attributes/>
							<Features/>
						</Hidden>
						<Hidden id="72" fieldSourceType="DBColumn" dataType="Text" name="Hidden2" PathID="departmentoffice_employee1DetailHidden2" fieldSource="EffectiveMonth">
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
				<Section id="37" visible="True" lines="1" name="Page_Footer" wizardSectionType="PageFooter" pageBreakAfter="True" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
					<Components>
					</Components>
					<Events/>
					<Attributes/>
					<Features/>
				</Section>
				<ImageLink id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ImageLink1" PathID="departmentoffice_employee1ImageLink1">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</ImageLink>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="81"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="92" conditionType="Parameter" useIsNull="False" field="employee.EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
				<TableParameter id="93" conditionType="Parameter" useIsNull="False" field="employee.Surname" dataType="Text" searchConditionType="BeginsWith" parameterType="URL" logicOperator="And" parameterSource="s_Surname"/>
				<TableParameter id="94" conditionType="Parameter" useIsNull="False" field="employee.FirstName" dataType="Text" searchConditionType="BeginsWith" parameterType="URL" logicOperator="And" parameterSource="s_FirstName"/>
				<TableParameter id="95" conditionType="Parameter" useIsNull="False" field="employee.MiddleInitial" dataType="Text" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="s_MiddleInitial"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="4" tableName="employee" posLeft="162" posTop="13" posWidth="160" posHeight="320"/>
				<JoinTable id="6" tableName="lut_servicerecpurpose" posLeft="341" posTop="10" posWidth="128" posHeight="88"/>
				<JoinTable id="88" tableName="departmentoffice" posWidth="105" posHeight="202" posLeft="5" posTop="110"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="96" tableLeft="employee" tableRight="lut_servicerecpurpose" fieldLeft="employee.SecRecPurposeID" fieldRight="lut_servicerecpurpose.SecRecPurposeID" joinType="inner" conditionType="Equal"/>
				<JoinTable2 id="97" tableLeft="employee" tableRight="departmentoffice" fieldLeft="employee.OfficeID" fieldRight="departmentoffice.OfficeID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields>
				<Field id="10" tableName="lut_servicerecpurpose" fieldName="ServiceRecPurpose"/>
				<Field id="12" tableName="employee" fieldName="Surname"/>
				<Field id="13" tableName="employee" fieldName="FirstName"/>
				<Field id="14" tableName="employee" fieldName="MiddleInitial"/>
				<Field id="15" tableName="employee" fieldName="employee.Position" alias="employee_Position"/>
				<Field id="16" tableName="employee" fieldName="MonthlySalary"/>
				<Field id="17" tableName="employee" fieldName="SalaryWords"/>
				<Field id="18" tableName="employee" fieldName="CertDay"/>
				<Field id="19" tableName="employee" fieldName="CertMonth"/>
				<Field id="20" tableName="employee" fieldName="CertYear"/>
				<Field id="70" tableName="employee" fieldName="Title"/>
				<Field id="75" tableName="employee" fieldName="OrigApptMonth"/>
				<Field id="76" tableName="employee" fieldName="OrigApptDay"/>
				<Field id="77" tableName="employee" fieldName="OrigApptYear"/>
				<Field id="78" tableName="employee" fieldName="MonthlySalary+2000.00" isExpression="True" alias="Expr1"/>
				<Field id="82" tableName="employee" fieldName="NameExtension"/>
				<Field id="84" tableName="employee" fieldName="EffectiveMonth"/>
				<Field id="85" tableName="employee" fieldName="EffectiveDay"/>
				<Field id="86" tableName="employee" fieldName="EffectiveYear"/>
				<Field id="102" tableName="departmentoffice" fieldName="departmentoffice.*"/>
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
		<CodeFile id="Code" language="PHPTemplates" name="Cert_AssumptnDuty.php" forShow="True" url="Cert_AssumptnDuty.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="Cert_AssumptnDuty_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
