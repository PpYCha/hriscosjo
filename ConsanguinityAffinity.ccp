<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee" name="employee" pageSizeLimit="100" wizardCaption="List of Employee " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" activeCollection="TableParameters">
			<Components>
				<Link id="38" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="ConsanguinityAffinity.ccp" wizardThemeItem="GridA" PathID="employeeEmployeeID">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="39" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="41" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmployeeIDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="False" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeSurname">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeFirstName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleName" fieldSource="MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleName">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="104" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events>
				<Event name="BeforeExecuteSelect" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="142"/>
					</Actions>
				</Event>
			</Events>
			<TableParameters>
				<TableParameter id="144" conditionType="Parameter" useIsNull="False" field="EmployeeID" dataType="Integer" searchConditionType="Equal" parameterType="URL" logicOperator="And" parameterSource="EmployeeID"/>
			</TableParameters>
			<JoinTables>
				<JoinTable id="143" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="269"/>
			</JoinTables>
			<JoinLinks/>
			<Fields>
				<Field id="3" tableName="employee" fieldName="EmployeeID"/>
				<Field id="40" tableName="employee" fieldName="EmployeeIDNo"/>
				<Field id="42" tableName="employee" fieldName="Surname"/>
				<Field id="44" tableName="employee" fieldName="FirstName"/>
				<Field id="46" tableName="employee" fieldName="MiddleName"/>
				<Field id="48" tableName="employee" fieldName="ConsanThird"/>
				<Field id="50" tableName="employee" fieldName="ConsanThirdDetaila"/>
				<Field id="52" tableName="employee" fieldName="ConsanFourth"/>
				<Field id="54" tableName="employee" fieldName="ConsanFourthDetails"/>
				<Field id="56" tableName="employee" fieldName="AdminOffense"/>
				<Field id="58" tableName="employee" fieldName="AdminOffenseDetails"/>
				<Field id="60" tableName="employee" fieldName="CriminallyCharged"/>
				<Field id="62" tableName="employee" fieldName="CriminallyChargedDetails"/>
				<Field id="64" tableName="employee" fieldName="ConvictedOfCrime"/>
				<Field id="66" tableName="employee" fieldName="ConvictedCrimeDetails"/>
				<Field id="68" tableName="employee" fieldName="SeparatedFromService"/>
				<Field id="70" tableName="employee" fieldName="SeparatedFromServiceDetails"/>
				<Field id="72" tableName="employee" fieldName="CandidateElection"/>
				<Field id="74" tableName="employee" fieldName="CandidateElectionDetails"/>
				<Field id="76" tableName="employee" fieldName="ResignedGovService"/>
				<Field id="78" tableName="employee" fieldName="ResignedGovServiceDetails"/>
				<Field id="80" tableName="employee" fieldName="StatOfImmigrant"/>
				<Field id="82" tableName="employee" fieldName="StatOfImmigrantDetails"/>
				<Field id="84" tableName="employee" fieldName="IndigenousGroupMember"/>
				<Field id="86" tableName="employee" fieldName="IndigenousDetails"/>
				<Field id="88" tableName="employee" fieldName="DifferentlyAbled"/>
				<Field id="90" tableName="employee" fieldName="DifferentlyAbledDetails"/>
				<Field id="92" tableName="employee" fieldName="SoloParent"/>
				<Field id="94" tableName="employee" fieldName="SoloParentDetails"/>
				<Field id="96" tableName="employee" fieldName="GovIssuedID"/>
				<Field id="98" tableName="employee" fieldName="IDNo"/>
				<Field id="100" tableName="employee" fieldName="DatePlaceIssuance"/>
				<Field id="102" tableName="employee" fieldName="DateAccomplished"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="105" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee1" dataSource="employee" errorSummator="Error" wizardCaption="Add/Edit Employee " wizardFormMethod="post" PathID="employee1">
			<Components>
				<Button id="106" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee1Button_Insert">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="107" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee1Button_Update">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="108" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="employee1Button_Delete">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="109" message="Delete record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="110" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee1Button_Cancel">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<ListBox id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ConsanThird" fieldSource="ConsanThird" required="False" caption="Consan Third" wizardCaption="Consan Third" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ConsanThird" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ConsanThirdDetaila" fieldSource="ConsanThirdDetaila" required="False" caption="Consan Third Detaila" wizardCaption="Consan Third Detaila" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ConsanThirdDetaila">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ConsanFourth" fieldSource="ConsanFourth" required="False" caption="Consan Fourth" wizardCaption="Consan Fourth" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ConsanFourth" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ConsanFourthDetails" fieldSource="ConsanFourthDetails" required="False" caption="Consan Fourth Details" wizardCaption="Consan Fourth Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ConsanFourthDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="AdminOffense" fieldSource="AdminOffense" required="False" caption="Admin Offense" wizardCaption="Admin Offense" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1AdminOffense" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="AdminOffenseDetails" fieldSource="AdminOffenseDetails" required="False" caption="Admin Offense Details" wizardCaption="Admin Offense Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1AdminOffenseDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CriminallyCharged" fieldSource="CriminallyCharged" required="False" caption="Criminally Charged" wizardCaption="Criminally Charged" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1CriminallyCharged" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CriminallyChargedDetails" fieldSource="CriminallyChargedDetails" required="False" caption="Criminally Charged Details" wizardCaption="Criminally Charged Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1CriminallyChargedDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="120" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ConvictedOfCrime" fieldSource="ConvictedOfCrime" required="False" caption="Convicted Of Crime" wizardCaption="Convicted Of Crime" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ConvictedOfCrime" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ConvictedCrimeDetails" fieldSource="ConvictedCrimeDetails" required="False" caption="Convicted Crime Details" wizardCaption="Convicted Crime Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ConvictedCrimeDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="122" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SeparatedFromService" fieldSource="SeparatedFromService" required="False" caption="Separated From Service" wizardCaption="Separated From Service" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SeparatedFromService" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SeparatedFromServiceDetails" fieldSource="SeparatedFromServiceDetails" required="False" caption="Separated From Service Details" wizardCaption="Separated From Service Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SeparatedFromServiceDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CandidateElection" fieldSource="CandidateElection" required="False" caption="Candidate Election" wizardCaption="Candidate Election" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1CandidateElection" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CandidateElectionDetails" fieldSource="CandidateElectionDetails" required="False" caption="Candidate Election Details" wizardCaption="Candidate Election Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1CandidateElectionDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResignedGovService" fieldSource="ResignedGovService" required="False" caption="Resigned Gov Service" wizardCaption="Resigned Gov Service" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResignedGovService" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResignedGovServiceDetails" fieldSource="ResignedGovServiceDetails" required="False" caption="Resigned Gov Service Details" wizardCaption="Resigned Gov Service Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResignedGovServiceDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StatOfImmigrant" fieldSource="StatOfImmigrant" required="False" caption="Stat Of Immigrant" wizardCaption="Stat Of Immigrant" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StatOfImmigrant" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="StatOfImmigrantDetails" fieldSource="StatOfImmigrantDetails" required="False" caption="Stat Of Immigrant Details" wizardCaption="Stat Of Immigrant Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1StatOfImmigrantDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IndigenousGroupMember" fieldSource="IndigenousGroupMember" required="False" caption="Indigenous Group Member" wizardCaption="Indigenous Group Member" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1IndigenousGroupMember" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IndigenousDetails" fieldSource="IndigenousDetails" required="False" caption="Indigenous Details" wizardCaption="Indigenous Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1IndigenousDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="132" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DifferentlyAbled" fieldSource="DifferentlyAbled" required="False" caption="Differently Abled" wizardCaption="Differently Abled" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DifferentlyAbled" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DifferentlyAbledDetails" fieldSource="DifferentlyAbledDetails" required="False" caption="Differently Abled Details" wizardCaption="Differently Abled Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DifferentlyAbledDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<ListBox id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SoloParent" fieldSource="SoloParent" required="False" caption="Solo Parent" wizardCaption="Solo Parent" wizardSize="3" wizardMaxLength="3" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SoloParent" sourceType="Table" connection="Connection1" dataSource="lut_ans" boundColumn="Answer" textColumn="Answer">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
					<TableParameters/>
					<SPParameters/>
					<SQLParameters/>
					<JoinTables/>
					<JoinLinks/>
					<Fields/>
				</ListBox>
				<TextBox id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SoloParentDetails" fieldSource="SoloParentDetails" required="False" caption="Solo Parent Details" wizardCaption="Solo Parent Details" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SoloParentDetails">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="136" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GovIssuedID" fieldSource="GovIssuedID" required="False" caption="Gov Issued ID" wizardCaption="Gov Issued ID" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1GovIssuedID">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="IDNo" fieldSource="IDNo" required="False" caption="IDNo" wizardCaption="IDNo" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1IDNo">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="DatePlaceIssuance" fieldSource="DatePlaceIssuance" required="False" caption="Date Place Issuance" wizardCaption="Date Place Issuance" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DatePlaceIssuance">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="139" visible="Yes" fieldSourceType="DBColumn" dataType="Date" name="DateAccomplished" fieldSource="DateAccomplished" required="False" caption="Date Accomplished" wizardCaption="Date Accomplished" wizardSize="8" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1DateAccomplished">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<DatePicker id="140" name="DatePicker_DateAccomplished" control="DateAccomplished" wizardSatellite="True" wizardControl="DateAccomplished" wizardDatePickerType="Image" wizardPicture="Styles/Fresh/Images/DatePicker.gif" style="Styles/Fresh/Style.css" PathID="employee1DatePicker_DateAccomplished">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</DatePicker>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="111" conditionType="Parameter" useIsNull="False" field="EmployeeID" parameterSource="EmployeeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
			</TableParameters>
			<SPParameters/>
			<SQLParameters/>
			<JoinTables>
<JoinTable id="147" tableName="employee" posLeft="10" posTop="10" posWidth="160" posHeight="180"/>
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
		<Link id="141" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="Employee.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="ConsanguinityAffinity.php" forShow="True" url="ConsanguinityAffinity.php" comment="//" codePage="windows-1252"/>
		<CodeFile id="Events" language="PHPTemplates" name="ConsanguinityAffinity_events.php" forShow="False" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="145" groupID="7"/>
<Group id="146" groupID="6"/>
</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
