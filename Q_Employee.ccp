<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee, lut_statofappt2" name="employee" orderBy="employee.Surname, FirstName" pageSizeLimit="100" wizardCaption="List of Employee " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="False" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" activeCollection="TableParameters" pasteActions="pasteActions">
			<Components>
				<Label id="17" fieldSourceType="DBColumn" dataType="Integer" html="False" name="employee_TotalRecords" wizardUseTemplateBlock="False" PathID="employeeemployee_TotalRecords" format="#,##0">
					<Components/>
					<Events>
						<Event name="BeforeShow" type="Server">
							<Actions>
								<Action actionName="Retrieve number of records" actionCategory="Database" id="18"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="36" fieldSourceType="DBColumn" dataType="Text" html="False" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeSurname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="38" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleName" fieldSource="MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Image id="39" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmpPicture" fieldSource="EmpPicture" wizardCaption="Emp Picture" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmpPicture" visible="Yes">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Image>
				<Navigator id="40" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
				<Link id="41" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="employeeLink1" wizardUseTemplateBlock="False" hrefSource="QEmployeePersonal.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="56" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="42" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link2" PathID="employeeLink2" wizardUseTemplateBlock="False" hrefSource="QEmp_Children.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="98" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link3" PathID="employeeLink3" wizardUseTemplateBlock="False" hrefSource="QEmp_Educatn.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="97" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="44" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link4" PathID="employeeLink4" wizardUseTemplateBlock="False" hrefSource="QEmp_Eligibility2.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="96" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="45" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link5" PathID="employeeLink5" wizardUseTemplateBlock="False" hrefSource="QEmp_WorkExp3.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="95" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="46" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link6" PathID="employeeLink6" wizardUseTemplateBlock="False" hrefSource="QEmp_VolWork2.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="94" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="48" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link8" PathID="employeeLink8" wizardUseTemplateBlock="False" hrefSource="QEmp_Skills2.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="93" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="49" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link9" PathID="employeeLink9" wizardUseTemplateBlock="False" hrefSource="QEmp_Distiction.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="83" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="50" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link10" PathID="employeeLink10" wizardUseTemplateBlock="False" hrefSource="QEmp_CurrentPosition.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="88" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="53" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link7" PathID="employeeLink7" wizardUseTemplateBlock="False" hrefSource="QEmp_Trainng2.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="77" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link11" PathID="employeeLink11" wizardUseTemplateBlock="False" hrefSource="QEmp_Membership.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="90" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="80" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link14" PathID="employeeLink14" wizardUseTemplateBlock="False" hrefSource="QEmp_Consanguinity2.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="89" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="81" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link15" PathID="employeeLink15" wizardUseTemplateBlock="False" hrefSource="QEmp_References.ccp">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="85" sourceType="DataField" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="19" conditionType="Parameter" useIsNull="False" field="employee.EmployeeIDNo" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1" parameterSource="s_EmployeeIDNo"/>
				<TableParameter id="20" conditionType="Parameter" useIsNull="False" field="employee.Surname" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2" parameterSource="s_Surname"/>
				<TableParameter id="21" conditionType="Parameter" useIsNull="False" field="employee.FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3" parameterSource="s_FirstName"/>
				<TableParameter id="22" conditionType="Parameter" useIsNull="False" field="employee.MiddleName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4" parameterSource="s_MiddleName"/>
				<TableParameter id="23" conditionType="Parameter" useIsNull="False" field="employee.Sex" parameterSource="s_Sex" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="5"/>
				<TableParameter id="24" conditionType="Parameter" useIsNull="False" field="employee.CivilStatus" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="6" parameterSource="s_CivilStatus"/>
				<TableParameter id="25" conditionType="Parameter" useIsNull="False" field="employee.PermMunicipality" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="7" parameterSource="s_PermMunicipality"/>
				<TableParameter id="27" conditionType="Parameter" useIsNull="False" field="employee.OfficeID" parameterSource="s_OfficeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="9"/>
				<TableParameter id="28" conditionType="Parameter" useIsNull="False" field="employee.SalaryGrade" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="10" parameterSource="s_SalaryGrade"/>
				<TableParameter id="29" conditionType="Parameter" useIsNull="False" field="employee.StepIncrement" dataType="Text" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="11" parameterSource="s_StepIncrement"/>
				<TableParameter id="58" conditionType="Parameter" useIsNull="False" field="employee.EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
				<TableParameter id="67" conditionType="Parameter" useIsNull="False" field="lut_statofappt2.StatApp" dataType="Text" searchConditionType="In" parameterType="URL" logicOperator="And" parameterSource="CheckBoxList1"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="52" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="309"/>
				<JoinTable id="65" tableName="lut_statofappt2" posLeft="191" posTop="10" posWidth="95" posHeight="88"/>
			</JoinTables>
			<JoinLinks>
				<JoinTable2 id="66" tableLeft="employee" tableRight="lut_statofappt2" fieldLeft="employee.StatAppID" fieldRight="lut_statofappt2.StatAppID" joinType="inner" conditionType="Equal"/>
			</JoinLinks>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Link id="69" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
		<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employeeSearch" returnPage="Q_Employee.ccp" PathID="employeeSearch" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="Q_Employee.ccp" removeParameters="s_EmployeeIDNo;s_Surname;s_FirstName;s_MiddleName;CheckBoxList1;s_Sex;s_CivilStatus;s_PermMunicipality;s_OfficeID" PathID="employeeSearchClearParameters">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" PathID="employeeSearchButton_DoSearch">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_EmployeeIDNo" PathID="employeeSearchs_EmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Surname" PathID="employeeSearchs_Surname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" PathID="employeeSearchs_FirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MiddleName" PathID="employeeSearchs_MiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<CheckBoxList id="64" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" html="True" returnValueType="Number" name="CheckBoxList1" connection="Connection1" dataSource="lut_statofappt2" boundColumn="StatApp" textColumn="StatApp" PathID="employeeSearchCheckBoxList1">
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
				<ListBox id="10" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_Sex" connection="Connection1" dataSource="lut_sex" boundColumn="SexID" textColumn="Sex" PathID="employeeSearchs_Sex">
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
				<ListBox id="11" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_CivilStatus" connection="Connection1" dataSource="lut_civilstatus" boundColumn="CivilStat" textColumn="CivilStat" PathID="employeeSearchs_CivilStatus">
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
				<ListBox id="12" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Text" returnValueType="Number" name="s_PermMunicipality" connection="Connection1" dataSource="lut_municipality" boundColumn="Municipality" textColumn="Municipality" PathID="employeeSearchs_PermMunicipality">
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
				<ListBox id="14" visible="Yes" fieldSourceType="DBColumn" sourceType="Table" dataType="Integer" returnValueType="Number" name="s_OfficeID" connection="Connection1" dataSource="departmentoffice" boundColumn="OfficeID" textColumn="OfficeAcronym" PathID="employeeSearchs_OfficeID" orderBy="OfficeAcronym">
					<Components/>
					<Events/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables>
						<JoinTable id="105" tableName="departmentoffice" posLeft="10" posTop="10" posWidth="129" posHeight="180"/>
					</JoinTables>
					<JoinLinks/>
					<Fields/>
					<Attributes/>
					<Features/>
				</ListBox>
			</Components>
			<Events/>
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
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="Q_Employee_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="Q_Employee.php" forShow="True" url="Q_Employee.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="106" groupID="7"/>
		<Group id="107" groupID="6"/>
		<Group id="108" groupID="5"/>
		<Group id="109" groupID="4"/>
		<Group id="110" groupID="3"/>
		<Group id="111" groupID="2"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
