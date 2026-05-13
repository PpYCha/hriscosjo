<Page id="1" templateExtension="html" relativePath="." fullRelativePath="." secured="False" urlType="Relative" isIncluded="True" SSLAccess="False" isService="False" cachingEnabled="False" cachingDuration="1 minutes" wizardTheme="Fresh" wizardThemeVersion="3.0" needGeneration="0">
	<Components>
		<Link id="2" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="Logout" hrefSource="logout.ccp" wizardDefaultValue="Logout" PathID="menu1Logout">
			<Components/>
			<Events>
				<Event name="BeforeShow" type="Server">
					<Actions>
						<Action actionName="Custom Code" actionCategory="General" id="10"/>
					</Actions>
				</Event>
			</Events>
			<LinkParameters>
				<LinkParameter id="3" sourceType="Expression" format="yyyy-mm-dd" name="Logout" source="&quot;True&quot;"/>
			</LinkParameters>
			<Attributes/>
			<Features/>
		</Link>
		<Menu id="42" secured="False" sourceType="Table" returnValueType="Number" name="Menu2" menuType="Horizontal" menuSourceType="Static" PathID="menu1Menu2">
			<Components>
				<Link id="43" visible="Yes" fieldSourceType="DBColumn" dataType="Text" html="False" hrefType="Page" urlType="Relative" preserveParameters="GET" name="ItemLink" PathID="menu1Menu2ItemLink">
					<Components/>
					<Events/>
					<LinkParameters/>
					<Attributes/>
					<Features/>
				</Link>
			</Components>
			<Events/>
			<TableParameters/>
			<JoinTables/>
			<JoinLinks/>
			<Fields/>
			<SPParameters/>
			<SQLParameters/>
			<SecurityGroups/>
			<Attributes/>
			<MenuItems>
				<MenuItem id="44" name="MenuItem1" caption="MAIN MENU"/>
<MenuItem id="45" name="MenuItem2" caption="EMPLOYEES"/>
<MenuItem id="46" name="MenuItem2Item1" parent="MenuItem2" caption="201 File" url="Employee.ccp"/>
<MenuItem id="47" name="MenuItem3" caption="QUERIES"/>
<MenuItem id="48" name="MenuItem3Item1" parent="MenuItem3" caption="Employees Profile" url="Q_Employee.ccp"/>
<MenuItem id="49" name="MenuItem3Item11" parent="MenuItem3" caption="Employees Per Department" url="Query_EmpDepartment2.ccp"/>
<MenuItem id="50" name="MenuItem3Item2" parent="MenuItem3" caption="Employees Per Department with Salary" url="Query_EmpDepartment.ccp"/>
<MenuItem id="51" name="MenuItem3Item3" parent="MenuItem3" caption="Employees ID Numbers" url="Query_EmpID.ccp"/>
<MenuItem id="52" name="MenuItem3Item4" parent="MenuItem3" caption="Birthday Celebrants" url="QueryBirthday.ccp"/>
<MenuItem id="53" name="MenuItem3Item7" parent="MenuItem3" caption="Reassigned &amp; Detailed" url="QueryReassignDetailed.ccp"/>
<MenuItem id="54" name="MenuItem3Item12" parent="MenuItem3" caption="PWDs" url="Query_PWD.ccp"/>
<MenuItem id="55" name="MenuItem3Item13" parent="MenuItem3" caption="Solo Parents" url="Query_SoloParent.ccp"/>
<MenuItem id="56" name="MenuItem3Item10" parent="MenuItem3" caption="Inactive Employees" url="QueryCompulsory.ccp"/>
<MenuItem id="57" name="MenuItem4" caption="REPORTS"/>
<MenuItem id="58" name="MenuItem4Item2" parent="MenuItem4" caption="Service Records" url="SRreport.ccp"/>
<MenuItem id="59" name="MenuItem4Item1" parent="MenuItem4" caption="Certifications" url="Cert_latestsalary1.ccp"/>
<MenuItem id="60" name="MenuItem4Item11" parent="MenuItem4" caption="Certificate of Appearance" url="CertificateofAppeanace.ccp"/>
<MenuItem id="61" name="MenuItem5" caption="FILE MAINTENANCE"/>
<MenuItem id="62" name="MenuItem5Item1" parent="MenuItem5" caption="System Users" url="Users.ccp"/>
<MenuItem id="63" name="MenuItem5Item2" parent="MenuItem5" caption="Purpose of SR/Certification Request" url="LUF_SR.ccp"/>
<MenuItem id="64" name="MenuItem5Item3" parent="MenuItem5" caption="Department/Office" url="LUF_Department.ccp"/>
</MenuItems>
			<Features/>
		</Menu>
	</Components>
	<CodeFiles>
		<CodeFile id="Events" language="PHPTemplates" name="menu1_events.php" forShow="False" comment="//" codePage="windows-1252"/>
		<CodeFile id="Code" language="PHPTemplates" name="menu1.php" forShow="True" url="menu1.php" comment="//" codePage="windows-1252"/>
	</CodeFiles>
	<SecurityGroups/>
	<CachingParameters/>
	<Attributes/>
	<Features/>
	<Events/>
</Page>
