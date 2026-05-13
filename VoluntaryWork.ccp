<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee_voluntaryworkinvolve" name="employee_voluntaryworkinv" orderBy="VolWorkID" pageSizeLimit="100" wizardCaption="List of Employee Voluntaryworkinvolve " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" activeCollection="TableParameters">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employee_voluntaryworkinv_Insert" hrefSource="VoluntaryWork.ccp" removeParameters="VolWorkID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="employee_voluntaryworkinvemployee_voluntaryworkinv_Insert">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="12" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="Employee ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="VoluntaryWork.ccp" wizardThemeItem="GridA" PathID="employee_voluntaryworkinvEmployeeID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="13" sourceType="DataField" format="yyyy-mm-dd" name="VolWorkID" source="VolWorkID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="15" fieldSourceType="DBColumn" dataType="Text" html="False" name="NameAddOrganizatn" fieldSource="NameAddOrganizatn" wizardCaption="Name Add Organizatn" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_voluntaryworkinvNameAddOrganizatn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="17" fieldSourceType="DBColumn" dataType="Text" html="False" name="DateFrom" fieldSource="DateFrom" wizardCaption="Date From" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_voluntaryworkinvDateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="19" fieldSourceType="DBColumn" dataType="Text" html="False" name="DateTo" fieldSource="DateTo" wizardCaption="Date To" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_voluntaryworkinvDateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="21" fieldSourceType="DBColumn" dataType="Text" html="False" name="NoOfHours" fieldSource="NoOfHours" wizardCaption="No Of Hours" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_voluntaryworkinvNoOfHours">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="23" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionNatureWork" fieldSource="PositionNatureWork" wizardCaption="Position Nature Work" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employee_voluntaryworkinvPositionNatureWork">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="24" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="40"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="42" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="41" tableName="employee_voluntaryworkinvolve" posLeft="10" posTop="10" posWidth="153" posHeight="168"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="3" tableName="employee_voluntaryworkinvolve" fieldName="VolWorkID"/>
				<Field id="11" tableName="employee_voluntaryworkinvolve" fieldName="EmployeeID"/>
				<Field id="14" tableName="employee_voluntaryworkinvolve" fieldName="NameAddOrganizatn"/>
				<Field id="16" tableName="employee_voluntaryworkinvolve" fieldName="DateFrom"/>
				<Field id="18" tableName="employee_voluntaryworkinvolve" fieldName="DateTo"/>
				<Field id="20" tableName="employee_voluntaryworkinvolve" fieldName="NoOfHours"/>
				<Field id="22" tableName="employee_voluntaryworkinvolve" fieldName="PositionNatureWork"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="25" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee_voluntaryworkinv1" dataSource="employee_voluntaryworkinvolve" errorSummator="Error" wizardCaption="Add/Edit Employee Voluntaryworkinvolve " wizardFormMethod="post" PathID="employee_voluntaryworkinv1">
			<Components>
				<Button id="26" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee_voluntaryworkinv1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="27" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee_voluntaryworkinv1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="28" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="employee_voluntaryworkinv1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="29" message="Delete record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="30" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee_voluntaryworkinv1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="32" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" name="EmployeeID" fieldSource="EmployeeID" required="True" caption="Employee ID" wizardCaption="Employee ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_voluntaryworkinv1EmployeeID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="33" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NameAddOrganizatn" fieldSource="NameAddOrganizatn" required="False" caption="Name Add Organizatn" wizardCaption="Name Add Organizatn" wizardSize="50" wizardMaxLength="200" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_voluntaryworkinv1NameAddOrganizatn">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="34" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DateFrom" fieldSource="DateFrom" required="False" caption="Date From" wizardCaption="Date From" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_voluntaryworkinv1DateFrom">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="35" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DateTo" fieldSource="DateTo" required="False" caption="Date To" wizardCaption="Date To" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_voluntaryworkinv1DateTo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="36" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NoOfHours" fieldSource="NoOfHours" required="False" caption="No Of Hours" wizardCaption="No Of Hours" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_voluntaryworkinv1NoOfHours">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionNatureWork" fieldSource="PositionNatureWork" required="False" caption="Position Nature Work" wizardCaption="Position Nature Work" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee_voluntaryworkinv1PositionNatureWork">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="31" conditionType="Parameter" useIsNull="False" field="VolWorkID" parameterSource="VolWorkID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
				<JoinTable id="38" tableName="employee_voluntaryworkinvolve" posLeft="10" posTop="10" posWidth="153" posHeight="168"/>
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
		<Link id="39" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="Employee.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="VoluntaryWork.php" forShow="True" url="VoluntaryWork.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="VoluntaryWork_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="43" groupID="7"/>
		<Group id="44" groupID="6"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
