<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Joyful" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="employee" name="employee" orderBy="EmployeeID" pageSizeLimit="100" wizardCaption="List of Employee " wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records">
<Components>
<Link id="11" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="employee_Insert" hrefSource="EmployeeCopy.ccp" removeParameters="EmployeeID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="employeeemployee_Insert">
<Components/>
<Events/>
<LinkParameters/>
<Attributes/>
<Features/>
</Link>
<Label id="12" fieldSourceType="DBColumn" dataType="Text" html="False" name="employee_TotalRecords" wizardUseTemplateBlock="False" PathID="employeeemployee_TotalRecords">
<Components/>
<Events>
<Event name="BeforeShow" type="Server">
<Actions>
<Action actionName="Retrieve number of records" actionCategory="Database" id="13"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Label>
<Sorter id="18" visible="True" name="Sorter_EmployeeID" column="EmployeeID" wizardCaption="ID" wizardSortingType="SimpleDir" wizardControl="EmployeeID" wizardAddNbsp="False" PathID="employeeSorter_EmployeeID">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="19" visible="True" name="Sorter_EmployeeIDNo" column="EmployeeIDNo" wizardCaption="IDNo" wizardSortingType="SimpleDir" wizardControl="EmployeeIDNo" wizardAddNbsp="False" PathID="employeeSorter_EmployeeIDNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="20" visible="True" name="Sorter_Surname" column="Surname" wizardCaption="Surname" wizardSortingType="SimpleDir" wizardControl="Surname" wizardAddNbsp="False" PathID="employeeSorter_Surname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="21" visible="True" name="Sorter_FirstName" column="FirstName" wizardCaption="First Name" wizardSortingType="SimpleDir" wizardControl="FirstName" wizardAddNbsp="False" PathID="employeeSorter_FirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="22" visible="True" name="Sorter_MiddleName" column="MiddleName" wizardCaption="Middle Name" wizardSortingType="SimpleDir" wizardControl="MiddleName" wizardAddNbsp="False" PathID="employeeSorter_MiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="23" visible="True" name="Sorter_EmpPicture" column="EmpPicture" wizardCaption="Emp Picture" wizardSortingType="SimpleDir" wizardControl="EmpPicture" wizardAddNbsp="False" PathID="employeeSorter_EmpPicture">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="24" visible="True" name="Sorter_MiddleInitial" column="MiddleInitial" wizardCaption="Middle Initial" wizardSortingType="SimpleDir" wizardControl="MiddleInitial" wizardAddNbsp="False" PathID="employeeSorter_MiddleInitial">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="25" visible="True" name="Sorter_NameExtension" column="NameExtension" wizardCaption="Name Extension" wizardSortingType="SimpleDir" wizardControl="NameExtension" wizardAddNbsp="False" PathID="employeeSorter_NameExtension">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="26" visible="True" name="Sorter_BirthMonth" column="BirthMonth" wizardCaption="Birth Month" wizardSortingType="SimpleDir" wizardControl="BirthMonth" wizardAddNbsp="False" PathID="employeeSorter_BirthMonth">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="27" visible="True" name="Sorter_BirthDay" column="BirthDay" wizardCaption="Birth Day" wizardSortingType="SimpleDir" wizardControl="BirthDay" wizardAddNbsp="False" PathID="employeeSorter_BirthDay">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="28" visible="True" name="Sorter_BirthYear" column="BirthYear" wizardCaption="Birth Year" wizardSortingType="SimpleDir" wizardControl="BirthYear" wizardAddNbsp="False" PathID="employeeSorter_BirthYear">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="29" visible="True" name="Sorter_PlaceOfBirth" column="PlaceOfBirth" wizardCaption="Place Of Birth" wizardSortingType="SimpleDir" wizardControl="PlaceOfBirth" wizardAddNbsp="False" PathID="employeeSorter_PlaceOfBirth">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="30" visible="True" name="Sorter_Sex" column="Sex" wizardCaption="Sex" wizardSortingType="SimpleDir" wizardControl="Sex" wizardAddNbsp="False" PathID="employeeSorter_Sex">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="31" visible="True" name="Sorter_CivilStatus" column="CivilStatus" wizardCaption="Civil Status" wizardSortingType="SimpleDir" wizardControl="CivilStatus" wizardAddNbsp="False" PathID="employeeSorter_CivilStatus">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="32" visible="True" name="Sorter_Height" column="Height" wizardCaption="Height" wizardSortingType="SimpleDir" wizardControl="Height" wizardAddNbsp="False" PathID="employeeSorter_Height">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="33" visible="True" name="Sorter_Weight" column="Weight" wizardCaption="Weight" wizardSortingType="SimpleDir" wizardControl="Weight" wizardAddNbsp="False" PathID="employeeSorter_Weight">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="34" visible="True" name="Sorter_BloodType" column="BloodType" wizardCaption="Blood Type" wizardSortingType="SimpleDir" wizardControl="BloodType" wizardAddNbsp="False" PathID="employeeSorter_BloodType">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="35" visible="True" name="Sorter_GsisIdNo" column="GsisIdNo" wizardCaption="Gsis Id No" wizardSortingType="SimpleDir" wizardControl="GsisIdNo" wizardAddNbsp="False" PathID="employeeSorter_GsisIdNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Sorter id="36" visible="True" name="Sorter_GsisBPN" column="GsisBPN" wizardCaption="Gsis BPN" wizardSortingType="SimpleDir" wizardControl="GsisBPN" wizardAddNbsp="False" PathID="employeeSorter_GsisBPN">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Sorter>
<Link id="37" visible="Yes" fieldSourceType="DBColumn" dataType="Integer" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="EmployeeID" fieldSource="EmployeeID" wizardCaption="ID" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAlign="right" wizardAddNbsp="True" hrefSource="EmployeeCopy.ccp" wizardThemeItem="GridA" PathID="employeeEmployeeID">
<Components/>
<Events/>
<LinkParameters>
<LinkParameter id="38" sourceType="DataField" format="yyyy-mm-dd" name="EmployeeID" source="EmployeeID"/>
</LinkParameters>
<Attributes/>
<Features/>
</Link>
<Label id="40" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmployeeIDNo" fieldSource="EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmployeeIDNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="42" fieldSourceType="DBColumn" dataType="Text" html="False" name="Surname" fieldSource="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeSurname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="44" fieldSourceType="DBColumn" dataType="Text" html="False" name="FirstName" fieldSource="FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeFirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="46" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleName" fieldSource="MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="48" fieldSourceType="DBColumn" dataType="Text" html="False" name="EmpPicture" fieldSource="EmpPicture" wizardCaption="Emp Picture" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeEmpPicture">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="50" fieldSourceType="DBColumn" dataType="Text" html="False" name="MiddleInitial" fieldSource="MiddleInitial" wizardCaption="Middle Initial" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeMiddleInitial">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="52" fieldSourceType="DBColumn" dataType="Text" html="False" name="NameExtension" fieldSource="NameExtension" wizardCaption="Name Extension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeNameExtension">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="54" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthMonth" fieldSource="BirthMonth" wizardCaption="Birth Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthMonth">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="56" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthDay" fieldSource="BirthDay" wizardCaption="Birth Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthDay">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="58" fieldSourceType="DBColumn" dataType="Text" html="False" name="BirthYear" fieldSource="BirthYear" wizardCaption="Birth Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBirthYear">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="60" fieldSourceType="DBColumn" dataType="Text" html="False" name="PlaceOfBirth" fieldSource="PlaceOfBirth" wizardCaption="Place Of Birth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeePlaceOfBirth">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="62" fieldSourceType="DBColumn" dataType="Text" html="False" name="Sex" fieldSource="Sex" wizardCaption="Sex" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeSex">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="64" fieldSourceType="DBColumn" dataType="Text" html="False" name="CivilStatus" fieldSource="CivilStatus" wizardCaption="Civil Status" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeCivilStatus">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="66" fieldSourceType="DBColumn" dataType="Text" html="False" name="Height" fieldSource="Height" wizardCaption="Height" wizardSize="7" wizardMaxLength="7" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeHeight">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="68" fieldSourceType="DBColumn" dataType="Text" html="False" name="Weight" fieldSource="Weight" wizardCaption="Weight" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeWeight">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="70" fieldSourceType="DBColumn" dataType="Text" html="False" name="BloodType" fieldSource="BloodType" wizardCaption="Blood Type" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeBloodType">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="72" fieldSourceType="DBColumn" dataType="Text" html="False" name="GsisIdNo" fieldSource="GsisIdNo" wizardCaption="Gsis Id No" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeGsisIdNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Label id="74" fieldSourceType="DBColumn" dataType="Text" html="False" name="GsisBPN" fieldSource="GsisBPN" wizardCaption="Gsis BPN" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="employeeGsisBPN">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Label>
<Navigator id="75" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardImagesScheme="Joyful">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Navigator>
</Components>
<Events/>
<TableParameters>
<TableParameter id="14" conditionType="Parameter" useIsNull="False" field="EmployeeIDNo" parameterSource="s_EmployeeIDNo" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="1"/>
<TableParameter id="15" conditionType="Parameter" useIsNull="False" field="Surname" parameterSource="s_Surname" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="2"/>
<TableParameter id="16" conditionType="Parameter" useIsNull="False" field="FirstName" parameterSource="s_FirstName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="3"/>
<TableParameter id="17" conditionType="Parameter" useIsNull="False" field="MiddleName" parameterSource="s_MiddleName" dataType="Text" logicOperator="And" searchConditionType="Contains" parameterType="URL" orderNumber="4"/>
</TableParameters>
<JoinTables/>
<JoinLinks/>
<Fields>
<Field id="10" tableName="employee" fieldName="EmployeeID"/>
<Field id="39" tableName="employee" fieldName="EmployeeIDNo"/>
<Field id="41" tableName="employee" fieldName="Surname"/>
<Field id="43" tableName="employee" fieldName="FirstName"/>
<Field id="45" tableName="employee" fieldName="MiddleName"/>
<Field id="47" tableName="employee" fieldName="EmpPicture"/>
<Field id="49" tableName="employee" fieldName="MiddleInitial"/>
<Field id="51" tableName="employee" fieldName="NameExtension"/>
<Field id="53" tableName="employee" fieldName="BirthMonth"/>
<Field id="55" tableName="employee" fieldName="BirthDay"/>
<Field id="57" tableName="employee" fieldName="BirthYear"/>
<Field id="59" tableName="employee" fieldName="PlaceOfBirth"/>
<Field id="61" tableName="employee" fieldName="Sex"/>
<Field id="63" tableName="employee" fieldName="CivilStatus"/>
<Field id="65" tableName="employee" fieldName="Height"/>
<Field id="67" tableName="employee" fieldName="Weight"/>
<Field id="69" tableName="employee" fieldName="BloodType"/>
<Field id="71" tableName="employee" fieldName="GsisIdNo"/>
<Field id="73" tableName="employee" fieldName="GsisBPN"/>
</Fields>
<SPParameters/>
<SQLParameters/>
<SecurityGroups/>
<Attributes/>
<Features/>
</Grid>
<Record id="3" sourceType="Table" urlType="Relative" secured="False" allowInsert="False" allowUpdate="False" allowDelete="False" validateData="True" preserveParameters="None" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" name="employeeSearch" wizardCaption="Search Employee " wizardOrientation="Vertical" wizardFormMethod="post" returnPage="EmployeeCopy.ccp" PathID="employeeSearch">
<Components>
<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ClearParameters" hrefSource="EmployeeCopy.ccp" removeParameters="s_EmployeeIDNo;s_Surname;s_FirstName;s_MiddleName" wizardThemeItem="SorterLink" wizardDefaultValue="Clear" PathID="employeeSearchClearParameters">
<Components/>
<Events/>
<LinkParameters/>
<Attributes/>
<Features/>
</Link>
<Button id="5" urlType="Relative" enableValidation="True" isDefault="False" name="Button_DoSearch" operation="Search" wizardCaption="Search" PathID="employeeSearchButton_DoSearch">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<TextBox id="6" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_EmployeeIDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" PathID="employeeSearchs_EmployeeIDNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="7" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_Surname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="8" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_FirstName" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_FirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="9" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="s_MiddleName" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" PathID="employeeSearchs_MiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
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
<Record id="76" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="employee1" dataSource="employee" errorSummator="Error" wizardCaption="Add/Edit Employee " wizardFormMethod="post" PathID="employee1" pasteAsReplace="pasteAsReplace" pasteActions="pasteActions">
<Components>
<Button id="77" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardCaption="Add" PathID="employee1Button_Insert">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="78" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardCaption="Submit" PathID="employee1Button_Update">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<Button id="79" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardCaption="Delete" PathID="employee1Button_Delete">
<Components/>
<Events>
<Event name="OnClick" type="Client">
<Actions>
<Action actionName="Confirmation Message" actionCategory="General" id="80" message="Delete record?"/>
</Actions>
</Event>
</Events>
<Attributes/>
<Features/>
</Button>
<Button id="81" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardCaption="Cancel" PathID="employee1Button_Cancel">
<Components/>
<Events/>
<Attributes/>
<Features/>
</Button>
<TextBox id="83" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EmployeeIDNo" fieldSource="EmployeeIDNo" required="False" caption="IDNo" wizardCaption="IDNo" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1EmployeeIDNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="84" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Surname" fieldSource="Surname" required="True" caption="Surname" wizardCaption="Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Surname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="85" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FirstName" fieldSource="FirstName" required="True" caption="First Name" wizardCaption="First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="86" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MiddleName" fieldSource="MiddleName" required="True" caption="Middle Name" wizardCaption="Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="87" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MiddleInitial" fieldSource="MiddleInitial" required="False" caption="Middle Initial" wizardCaption="Middle Initial" wizardSize="1" wizardMaxLength="1" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MiddleInitial">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="88" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="NameExtension" fieldSource="NameExtension" required="False" caption="Name Extension" wizardCaption="Name Extension" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1NameExtension">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<ListBox id="89" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BirthMonth" fieldSource="BirthMonth" required="False" caption="Birth Month" wizardCaption="Birth Month" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BirthMonth" sourceType="Table" connection="Connection1" dataSource="lut_month" boundColumn="Month" textColumn="Month">
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
<TextBox id="92" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PlaceOfBirth" fieldSource="PlaceOfBirth" required="False" caption="Place Of Birth" wizardCaption="Place Of Birth" wizardSize="50" wizardMaxLength="100" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PlaceOfBirth">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<ListBox id="93" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Sex" fieldSource="Sex" required="False" caption="Sex" wizardCaption="Sex" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Sex" sourceType="Table" connection="Connection1" dataSource="lut_sex" boundColumn="Sex" textColumn="Sex">
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
<ListBox id="94" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="CivilStatus" fieldSource="CivilStatus" required="False" caption="Civil Status" wizardCaption="Civil Status" wizardSize="10" wizardMaxLength="10" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1CivilStatus" sourceType="Table" connection="Connection1" dataSource="lut_civilstatus" boundColumn="CivilStat" textColumn="CivilStat">
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
<TextBox id="95" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Height" fieldSource="Height" required="False" caption="Height" wizardCaption="Height" wizardSize="7" wizardMaxLength="7" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Height">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="96" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Weight" fieldSource="Weight" required="False" caption="Weight" wizardCaption="Weight" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Weight">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<ListBox id="97" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BloodType" fieldSource="BloodType" required="False" caption="Blood Type" wizardCaption="Blood Type" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BloodType" sourceType="Table" connection="Connection1" dataSource="lut_bloodtype" boundColumn="BloodType" textColumn="BloodType">
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
<TextBox id="98" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GsisIdNo" fieldSource="GsisIdNo" required="False" caption="Gsis Id No" wizardCaption="Gsis Id No" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1GsisIdNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="99" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="GsisBPN" fieldSource="GsisBPN" required="False" caption="Gsis BPN" wizardCaption="Gsis BPN" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1GsisBPN">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="100" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PagIbigIDNo" fieldSource="PagIbigIDNo" required="False" caption="Pag Ibig IDNo" wizardCaption="Pag Ibig IDNo" wizardSize="14" wizardMaxLength="14" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PagIbigIDNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="101" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PhilhealthNo" fieldSource="PhilhealthNo" required="False" caption="Philhealth No" wizardCaption="Philhealth No" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PhilhealthNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="102" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SssNo" fieldSource="SssNo" required="False" caption="Sss No" wizardCaption="Sss No" wizardSize="16" wizardMaxLength="16" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SssNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="103" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Tin" fieldSource="Tin" required="False" caption="Tin" wizardCaption="Tin" wizardSize="15" wizardMaxLength="15" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Tin">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="104" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="AgencyEmpNo" fieldSource="AgencyEmpNo" required="False" caption="Agency Emp No" wizardCaption="Agency Emp No" wizardSize="6" wizardMaxLength="6" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1AgencyEmpNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="105" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Citizenship" fieldSource="Citizenship" required="False" caption="Citizenship" wizardCaption="Citizenship" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1Citizenship">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="106" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResHouseNo" fieldSource="ResHouseNo" required="False" caption="Res House No" wizardCaption="Res House No" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResHouseNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="108" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResSubVillage" fieldSource="ResSubVillage" required="False" caption="Res Sub Village" wizardCaption="Res Sub Village" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResSubVillage">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="110" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResMunicipality" fieldSource="ResMunicipality" required="False" caption="Res Municipality" wizardCaption="Res Municipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResMunicipality">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="112" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResZipcode" fieldSource="ResZipcode" required="False" caption="Res Zipcode" wizardCaption="Res Zipcode" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResZipcode">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="113" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermHouseNo" fieldSource="PermHouseNo" required="False" caption="Perm House No" wizardCaption="Perm House No" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermHouseNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="115" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermSubVillage" fieldSource="PermSubVillage" required="False" caption="Perm Sub Village" wizardCaption="Perm Sub Village" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermSubVillage">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="117" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermMunicipality" fieldSource="PermMunicipality" required="False" caption="Perm Municipality" wizardCaption="Perm Municipality" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermMunicipality">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="119" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermZipcode" fieldSource="PermZipcode" required="False" caption="Perm Zipcode" wizardCaption="Perm Zipcode" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermZipcode">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="120" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="TelNo" fieldSource="TelNo" required="False" caption="Tel No" wizardCaption="Tel No" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1TelNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="121" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MobileNo" fieldSource="MobileNo" required="False" caption="Mobile No" wizardCaption="Mobile No" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MobileNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="122" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EmailAdd" fieldSource="EmailAdd" required="False" caption="Email Add" wizardCaption="Email Add" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1EmailAdd">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="123" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseSurname" fieldSource="SpouseSurname" required="False" caption="Spouse Surname" wizardCaption="Spouse Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseSurname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="124" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseFirstName" fieldSource="SpouseFirstName" required="False" caption="Spouse First Name" wizardCaption="Spouse First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseFirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="125" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseMiddleName" fieldSource="SpouseMiddleName" required="False" caption="Spouse Middle Name" wizardCaption="Spouse Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseMiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="126" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseNameExt" fieldSource="SpouseNameExt" required="False" caption="Spouse Name Ext" wizardCaption="Spouse Name Ext" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseNameExt">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="127" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseOccupatn" fieldSource="SpouseOccupatn" required="False" caption="Spouse Occupatn" wizardCaption="Spouse Occupatn" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseOccupatn">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="128" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseBusinessName" fieldSource="SpouseBusinessName" required="False" caption="Spouse Business Name" wizardCaption="Spouse Business Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseBusinessName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="129" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseBusinessAddress" fieldSource="SpouseBusinessAddress" required="False" caption="Spouse Business Address" wizardCaption="Spouse Business Address" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseBusinessAddress">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="130" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="SpouseTelNo" fieldSource="SpouseTelNo" required="False" caption="Spouse Tel No" wizardCaption="Spouse Tel No" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1SpouseTelNo">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="131" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherSurname" fieldSource="FatherSurname" required="False" caption="Father Surname" wizardCaption="Father Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherSurname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="132" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherFirstName" fieldSource="FatherFirstName" required="False" caption="Father First Name" wizardCaption="Father First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherFirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="133" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherMiddleName" fieldSource="FatherMiddleName" required="False" caption="Father Middle Name" wizardCaption="Father Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherMiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="134" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="FatherNameExt" fieldSource="FatherNameExt" required="False" caption="Father Name Ext" wizardCaption="Father Name Ext" wizardSize="5" wizardMaxLength="5" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1FatherNameExt">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="135" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherMaiden" fieldSource="MotherMaiden" required="False" caption="Mother Maiden" wizardCaption="Mother Maiden" wizardSize="50" wizardMaxLength="70" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherMaiden">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="136" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherSurname" fieldSource="MotherSurname" required="False" caption="Mother Surname" wizardCaption="Mother Surname" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherSurname">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="137" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherFirstName" fieldSource="MotherFirstName" required="False" caption="Mother First Name" wizardCaption="Mother First Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherFirstName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="138" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="MotherMiddleName" fieldSource="MotherMiddleName" required="False" caption="Mother Middle Name" wizardCaption="Mother Middle Name" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1MotherMiddleName">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="139" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="EmpPicture" fieldSource="EmpPicture" required="False" caption="Emp Picture" wizardCaption="Emp Picture" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1EmpPicture">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<ListBox id="90" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BirthDay" fieldSource="BirthDay" required="False" caption="Birth Day" wizardCaption="Birth Day" wizardSize="2" wizardMaxLength="2" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BirthDay" sourceType="Table" connection="Connection1" dataSource="lut_day" boundColumn="Day" textColumn="Day">
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
<TextBox id="91" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="BirthYear" fieldSource="BirthYear" required="False" caption="Birth Year" wizardCaption="Birth Year" wizardSize="4" wizardMaxLength="4" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1BirthYear">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="107" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResStreet" fieldSource="ResStreet" required="False" caption="Res Street" wizardCaption="Res Street" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResStreet">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="109" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResBrgy" fieldSource="ResBrgy" required="False" caption="Res Brgy" wizardCaption="Res Brgy" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResBrgy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="111" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="ResProvince" fieldSource="ResProvince" required="False" caption="Res Province" wizardCaption="Res Province" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1ResProvince">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="114" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermStreet" fieldSource="PermStreet" required="False" caption="Perm Street" wizardCaption="Perm Street" wizardSize="25" wizardMaxLength="25" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermStreet">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="116" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermBrgy" fieldSource="PermBrgy" required="False" caption="Perm Brgy" wizardCaption="Perm Brgy" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermBrgy">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
<TextBox id="118" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PermProvince" fieldSource="PermProvince" required="False" caption="Perm Province" wizardCaption="Perm Province" wizardSize="35" wizardMaxLength="35" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="employee1PermProvince">
<Components/>
<Events/>
<Attributes/>
<Features/>
</TextBox>
</Components>
<Events/>
<TableParameters>
<TableParameter id="82" conditionType="Parameter" useIsNull="False" field="EmployeeID" parameterSource="EmployeeID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
</TableParameters>
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
		<CodeFile id="Events" language="PHPTemplates" name="EmployeeCopy_events.php" forShow="False" comment="//" codePage="windows-1252"/>
<CodeFile id="Code" language="PHPTemplates" name="EmployeeCopy.php" forShow="True" url="EmployeeCopy.php" comment="//" codePage="windows-1252"/>
</CodeFiles>
	<SecurityGroups/>
<CachingParameters/>
<Attributes/>
<Features/>
<Events/>
</Page>
