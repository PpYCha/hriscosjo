<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="True" urlType="Relative" isIncluded="False" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Grid id="2" secured="False" sourceType="Table" returnValueType="Number" defaultPageSize="10" connection="Connection1" dataSource="signatories" name="signatories" pageSizeLimit="100" wizardCaption="List of Signatories " wizardTheme="Joyful" wizardGridType="Tabular" wizardSortingType="SimpleDir" wizardAllowInsert="True" wizardAltRecord="False" wizardAltRecordType="Style" wizardRecordSeparator="False" wizardNoRecords="No records" wizardThemeVersion="3.0">
			<Components>
				<Link id="4" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="signatories_Insert" hrefSource="Signatories.ccp" removeParameters="SigID" wizardThemeItem="FooterA" wizardDefaultValue="Add New" wizardUseTemplateBlock="False" PathID="signatoriessignatories_Insert" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
				<Link id="22" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Signatory1" fieldSource="Signatory1" wizardCaption="Signatory1" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" hrefSource="Signatories.ccp" wizardThemeItem="GridA" PathID="signatoriesSignatory1" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<LinkParameters>
						<LinkParameter id="23" sourceType="DataField" format="yyyy-mm-dd" name="SigID" source="SigID"/>
					</LinkParameters>
					<Attributes/>
					<Features/>
				</Link>
				<Label id="25" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig1" fieldSource="PositionSig1" wizardCaption="Position Sig1" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig1" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="27" fieldSourceType="DBColumn" dataType="Text" html="False" name="Signatory2" fieldSource="Signatory2" wizardCaption="Signatory2" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesSignatory2" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="29" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig2" fieldSource="PositionSig2" wizardCaption="Position Sig2" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig2" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="31" fieldSourceType="DBColumn" dataType="Text" html="False" name="Signatory3" fieldSource="Signatory3" wizardCaption="Signatory3" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesSignatory3" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="33" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig3" fieldSource="PositionSig3" wizardCaption="Position Sig3" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig3" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="35" fieldSourceType="DBColumn" dataType="Text" html="False" name="Signatory4" fieldSource="Signatory4" wizardCaption="Signatory4" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesSignatory4" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="37" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig4" fieldSource="PositionSig4" wizardCaption="Position Sig4" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig4" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="39" fieldSourceType="DBColumn" dataType="Text" html="False" name="Signatory5" fieldSource="Signatory5" wizardCaption="Signatory5" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesSignatory5" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="41" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig5" fieldSource="PositionSig5" wizardCaption="Position Sig5" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig5" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="43" fieldSourceType="DBColumn" dataType="Text" html="False" name="Signatory6" fieldSource="Signatory6" wizardCaption="Signatory6" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesSignatory6" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="45" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig6" fieldSource="PositionSig6" wizardCaption="Position Sig6" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig6" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="47" fieldSourceType="DBColumn" dataType="Text" html="False" name="Signatory7" fieldSource="Signatory7" wizardCaption="Signatory7" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesSignatory7" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="49" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig7" fieldSource="PositionSig7" wizardCaption="Position Sig7" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig7" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="51" fieldSourceType="DBColumn" dataType="Text" html="False" name="Signatory8" fieldSource="Signatory8" wizardCaption="Signatory8" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesSignatory8" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Label id="53" fieldSourceType="DBColumn" dataType="Text" html="False" name="PositionSig8" fieldSource="PositionSig8" wizardCaption="Position Sig8" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" wizardAddNbsp="True" PathID="signatoriesPositionSig8" wizardTheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Label>
				<Navigator id="54" size="10" type="Centered" pageSizes="1;5;10;25;50" name="Navigator" wizardPagingType="Centered" wizardFirst="True" wizardFirstText="First" wizardPrev="True" wizardPrevText="Prev" wizardNext="True" wizardNextText="Next" wizardLast="True" wizardLastText="Last" wizardPageNumbers="Centered" wizardSize="10" wizardTotalPages="True" wizardHideDisabled="False" wizardOfText="of" wizardPageSize="True" wizardTheme="Joyful" wizardImagesScheme="Joyful" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Navigator>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields>
				<Field id="3" tableName="signatories" fieldName="SigID"/>
				<Field id="21" tableName="signatories" fieldName="Signatory1"/>
				<Field id="24" tableName="signatories" fieldName="PositionSig1"/>
				<Field id="26" tableName="signatories" fieldName="Signatory2"/>
				<Field id="28" tableName="signatories" fieldName="PositionSig2"/>
				<Field id="30" tableName="signatories" fieldName="Signatory3"/>
				<Field id="32" tableName="signatories" fieldName="PositionSig3"/>
				<Field id="34" tableName="signatories" fieldName="Signatory4"/>
				<Field id="36" tableName="signatories" fieldName="PositionSig4"/>
				<Field id="38" tableName="signatories" fieldName="Signatory5"/>
				<Field id="40" tableName="signatories" fieldName="PositionSig5"/>
				<Field id="42" tableName="signatories" fieldName="Signatory6"/>
				<Field id="44" tableName="signatories" fieldName="PositionSig6"/>
				<Field id="46" tableName="signatories" fieldName="Signatory7"/>
				<Field id="48" tableName="signatories" fieldName="PositionSig7"/>
				<Field id="50" tableName="signatories" fieldName="Signatory8"/>
				<Field id="52" tableName="signatories" fieldName="PositionSig8"/>
			</Fields>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<Features/>
		</Grid>
		<Record id="55" sourceType="Table" urlType="Relative" secured="False" allowInsert="True" allowUpdate="True" allowDelete="True" validateData="True" preserveParameters="GET" returnValueType="Number" returnValueTypeForDelete="Number" returnValueTypeForInsert="Number" returnValueTypeForUpdate="Number" connection="Connection1" name="signatories1" dataSource="signatories" errorSummator="Error" wizardCaption="Add/Edit Signatories " wizardTheme="Joyful" wizardFormMethod="post" PathID="signatories1" wizardThemeVersion="3.0">
			<Components>
				<Button id="56" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Insert" operation="Insert" wizardTheme="Joyful" wizardCaption="Add" PathID="signatories1Button_Insert" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="57" urlType="Relative" enableValidation="True" isDefault="False" name="Button_Update" operation="Update" wizardTheme="Joyful" wizardCaption="Submit" PathID="signatories1Button_Update" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="58" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Delete" operation="Delete" wizardTheme="Joyful" wizardCaption="Delete" PathID="signatories1Button_Delete" wizardThemeVersion="3.0">
					<Components/>
					<Events>
						<Event name="OnClick" type="Client">
							<Actions>
								<Action actionName="Confirmation Message" actionCategory="General" id="59" message="Delete record?"/>
							</Actions>
						</Event>
					</Events>
					<Attributes/>
					<Features/>
				</Button>
				<Button id="60" urlType="Relative" enableValidation="False" isDefault="False" name="Button_Cancel" operation="Cancel" wizardTheme="Joyful" wizardCaption="Cancel" PathID="signatories1Button_Cancel" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</Button>
				<TextBox id="62" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory1" fieldSource="Signatory1" required="False" caption="Signatory1" wizardCaption="Signatory1" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory1" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="63" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig1" fieldSource="PositionSig1" required="False" caption="Position Sig1" wizardCaption="Position Sig1" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig1" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="64" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory2" fieldSource="Signatory2" required="False" caption="Signatory2" wizardCaption="Signatory2" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory2" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="65" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig2" fieldSource="PositionSig2" required="False" caption="Position Sig2" wizardCaption="Position Sig2" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig2" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>

					<Features/>
				</TextBox>
				<TextBox id="66" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory3" fieldSource="Signatory3" required="False" caption="Signatory3" wizardCaption="Signatory3" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory3" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="67" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig3" fieldSource="PositionSig3" required="False" caption="Position Sig3" wizardCaption="Position Sig3" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig3" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="68" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory4" fieldSource="Signatory4" required="False" caption="Signatory4" wizardCaption="Signatory4" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="69" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig4" fieldSource="PositionSig4" required="False" caption="Position Sig4" wizardCaption="Position Sig4" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig4" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="70" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory5" fieldSource="Signatory5" required="False" caption="Signatory5" wizardCaption="Signatory5" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory5" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="71" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig5" fieldSource="PositionSig5" required="False" caption="Position Sig5" wizardCaption="Position Sig5" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig5" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="72" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory6" fieldSource="Signatory6" required="False" caption="Signatory6" wizardCaption="Signatory6" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory6" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="73" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig6" fieldSource="PositionSig6" required="False" caption="Position Sig6" wizardCaption="Position Sig6" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig6" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="74" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory7" fieldSource="Signatory7" required="False" caption="Signatory7" wizardCaption="Signatory7" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory7" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="75" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig7" fieldSource="PositionSig7" required="False" caption="Position Sig7" wizardCaption="Position Sig7" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig7" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="76" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="Signatory8" fieldSource="Signatory8" required="False" caption="Signatory8" wizardCaption="Signatory8" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1Signatory8" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
				<TextBox id="77" visible="Yes" fieldSourceType="DBColumn" dataType="Text" name="PositionSig8" fieldSource="PositionSig8" required="False" caption="Position Sig8" wizardCaption="Position Sig8" wizardTheme="Joyful" wizardSize="50" wizardMaxLength="50" wizardIsPassword="False" wizardUseTemplateBlock="False" PathID="signatories1PositionSig8" wizardThemeVersion="3.0">
					<Components/>
					<Events/>
					<Attributes/>
					<Features/>
				</TextBox>
			</Components>
			<Events/>
			<TableParameters>
				<TableParameter id="61" conditionType="Parameter" useIsNull="False" field="SigID" parameterSource="SigID" dataType="Integer" logicOperator="And" searchConditionType="Equal" parameterType="URL" orderNumber="1"/>
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
		<Link id="79" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Link1" PathID="Link1" hrefSource="index.ccp" wizardUseTemplateBlock="False">
			<Components/>
			<Events/>
			<LinkParameters/>
			<Attributes/>
			<Features/>
		</Link>
	</Components>
	<CodeFiles>
		<CodeFile id="Code" language="PHPTemplates" name="Signatories.php" forShow="True" url="Signatories.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups>
		<Group id="80" groupID="7"/>
	</SecurityGroups>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
