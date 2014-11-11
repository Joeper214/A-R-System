<div id='adminleft'>
	<header id='accounttitle'>
		<p>Add Note</p>
	</header>
	<form method="POST" action='../mysystem/controller/tech_controller.php'>
       <input type="hidden" name="action" value="add">
       <input type="hidden" name="target" value="note">
       <input type="hidden" name="accountID" value="<?php echo $_SESSION['accountID']; ?>">
		<table>
			<tr>
				<td>Device</td>
			</tr>
			<tr>
				<td><input class='input' style='width: 255px;' type='text' name='device' placeholder='Device' onfocus="if (this.placeholder == &#39;Device&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Device&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Problem Category</td>
			</tr>
			<tr>
				<td>
					<select class='inputselect' name="prob">
						<option value="Software problem">Software problem</option>
						<option value="Blue Screen">Blue Screen</option>
						<option value="Display Problem"> Display Problem</option>
						<option value="Sound problem">Sound problem</option>
						<option value="Network Problem">Network Problem</option>
						<option value="Boot Problem">Boot Problem</option>
						<option value="Printer Problem">Printer Problem</option>
						<option value="Other">Other</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Problem description</td>
			</tr>
			<tr>
				<td><input class='input' style='width: 255px;' type='text' name='probdesc' placeholder='Problem description' onfocus="if (this.placeholder == &#39;Problem description&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Problem description&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Obvious issues</td>
			</tr>
			<tr>
				<td><input class='input' style='width: 255px;' type='text' name='obissues' placeholder='Obvious issues' onfocus="if (this.placeholder == &#39;Obvious issues&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Obvious issues&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Quick solutions applied</td>
			</tr>
			<tr>
				<td><textarea class='textarea1' name='quicksolution' placeholder='Quick solutions applied to the problem' onfocus="if (this.placeholder == &#39;Quick solutions applied to the problem&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Quick solutions applied to the problem&#39;;}" autofocus required/></textarea></td>
			</tr>
			<tr>
				<td>Computer gathered data</td>
			</tr>
			<tr>
				<td><textarea class='textarea1' name='gatdata' placeholder='Gathered data from the computer [separate by comma if more than one]' onfocus="if (this.placeholder == &#39;Gathered data from the computer [separate by comma if more than one]&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Gathered data from the computer [separate by comma if more than one]&#39;;}" autofocus required /></textarea></td>
			</tr>
			<tr>
				<td>Evaluated problem</td>
			</tr>
			<tr>
				<td><textarea class='textarea1' name='evaluation' placeholder='Evaluated Problem [separate by comma if more than one]' onfocus="if (this.placeholder == &#39;Evaluated Problem [separate by comma if more than one]&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Evaluated Problem [separate by comma if more than one]&#39;;}" autofocus required /></textarea></td>
			</tr>
			<tr>
				<td>Problem solution</td>
			</tr>
			<tr>
				<td><textarea class='textarea1' name='probsol' placeholder='Problem Solution [separate by comma if more than one]' onfocus="if (this.placeholder == &#39;Problem Solution [separate by comma if more than one]&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Problem Solution [separate by comma if more than one]&#39;;}" autofocus required/></textarea></td>
			</tr>
		</table>
		<table id='repairbuttons' style='margin-top: -5px;'>
			<tr>
				<td colspan='2' style='float: right;' >
					<input type='reset' class='inputbutton' name='cancel' value='CANCEL' formnovalidate />
					<input type='submit' class='inputbutton' name='save' value='SAVE' />
				</td>
			</tr>
		</table>
	</form>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all notes</p>
		<ul id='search'>
			<li><input type='text' name='search' placeholder="Search Note" onfocus="if (this.placeholder == &#39;Search Note&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Search Note&#39;;}"/></li>
			<li><a href='#' name='search'/></a></li>
		</ul>
		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>
			<li>
				<select name='productfilter' class='inputselectproductfilter'>
					<option>Name</option>
					<option>Category</option>
				</select>
			</li>
			<li><a href='#' name='view'/></a></li>
		</ul>
	</header>

	<table id='emplisttable'>
		<tr>
			<th class='listtitle servicetabletitle' id='tabletitle'>Problem description</th>
			<th class='listtitle'>Device</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>View</th>
		</tr>
  <?php  include"listNotes.php"; ?>
	</table>
</div>
<div id='clear'></div>

<?php
	if(isset($_POST['save'])) {
		echo "<script>noteHasBeenAdded()</script>";
	} else if(isset($_POST['cancel'])) {
		echo "<script>manageNote()</script>";
	}
?>