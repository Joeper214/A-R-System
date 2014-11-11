<?php if(isset($_GET['id'])){
       $get = new GetModel();
$noteInfo = $get->getNoteInfo($_GET['id']);
}else{
  $msg = "please pick a note to edit";
  header("location: technician.php?option=managenote&msg=$msg");
}


foreach($noteInfo as $note){
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Edit Note</p>
	</header>
<form method="POST" action='../mysystem/controller/tech_controller.php'>
       <input type="hidden" name="action" value="edit">
       <input type="hidden" name="target" value="note">
       <input type="hidden" name="noteID" value="<?php echo $_GET['id'];?>">
       <input type="hidden" name="accountID" value="<?php echo $_SESSION['accountID']; ?>">

		<table>
			<tr>
				<td>Device</td>
			</tr>
			<tr>
				<td><input class='input' style='width: 255px;' type='text' name='device' placeholder='Device' value="<?php echo $note['device']?>" onfocus="if (this.placeholder == &#39;Device&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Device&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Problem Category</td>
			</tr>
			<tr>
				<td>

    <?php $probCategory = array("Software problem","Blue Screen","Display Problem","Sound problem","Network Problem","Boot Problem","Printer Problem","Other"); ?>
    <select class='inputselect' name="prob">
       <?php foreach($probCategory as $prob){
       if($note['problemCategory']==$prob){
  echo "<option value='{$note['problemCategory']}' selected='true'>{$note['problemCategory']}</option>";
}else{
    echo "<option value='{$prob}'>{$prob}</option>";
}
} ?>
       </select>
       </td>
			</tr>
			<tr>
				<td>Problem description</td>
			</tr>
			<tr>
				<td><input class='input' style='width: 255px;' type='text' name='probdesc' value="<?php echo $note['problemDescription']; ?>" placeholder='Problem description' onfocus="if (this.placeholder == &#39;Problem description&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Problem description&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Obvious issues</td>
			</tr>
			<tr>
				<td><input class='input' style='width: 255px;' type='text' name='obissues' value="<?php echo $note['obviousIssues']; ?>" placeholder='Obvious issues' onfocus="if (this.placeholder == &#39;Obvious issues&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Obvious issues&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Quick solutions applied</td>
			</tr>
			<tr>
    <td><textarea class='textarea1' name='quicksolution' placeholder='Quick solutions applied to the problem' onfocus="if (this.placeholder == &#39;Quick solutions applied to the problem&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Quick solutions applied to the problem&#39;;}" autofocus required/><?php echo $note['quickSolution']; ?></textarea></td>
			</tr>
			<tr>
				<td>Computer gathered data</td>
			</tr>
			<tr>
				<td><textarea class='textarea1' name='gatdata' placeholder='Gathered data from the computer [separate by comma if more than one]' onfocus="if (this.placeholder == &#39;Gathered data from the computer [separate by comma if more than one]&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Gathered data from the computer [separate by comma if more than one]&#39;;}" autofocus required /><?php echo $note['gatheredData']; ?></textarea></td>
			</tr>
			<tr>
				<td>Evaluated problem</td>
			</tr>
			<tr>
				<td><textarea class='textarea1' name='evaluation' placeholder='Evaluated Problem [separate by comma if more than one]' onfocus="if (this.placeholder == &#39;Evaluated Problem [separate by comma if more than one]&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Evaluated Problem [separate by comma if more than one]&#39;;}" autofocus required /><?php echo $note['evaluatedProblem']; ?></textarea></td>
			</tr>
			<tr>
				<td>Problem solution</td>
			</tr>
			<tr>
				<td><textarea class='textarea1' name='probsol' placeholder='Problem Solution [separate by comma if more than one]' onfocus="if (this.placeholder == &#39;Problem Solution [separate by comma if more than one]&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Problem Solution [separate by comma if more than one]&#39;;}" autofocus required/><?php echo $note['problemSolution']; ?></textarea></td>
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
    <?php } ?>
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
		</tr>


	</table>
</div>
<div id='clear'></div>

<?php
	if(isset($_POST['save'])) {
		echo "<script>noteHasBeenUpdated()</script>";
	} else if(isset($_POST['cancel'])) {
		echo "<script>manageNote()</script>";
	}
?>