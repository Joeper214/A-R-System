<?php
	$goTo = new ConnectModel();
	$goTo -> connectToDatabase();
?>
<?php if(isset($_GET['msg'])){
  echo "<p style='color:red' ><b>".$_GET['msg']."</b></p>";
}
?>

<div id='adminleft'>
	<header id='accounttitle'>
		<p>Add Service</p>
	</header>
	<table>
<?php
  if(isset($_GET['failed'])){
    echo "<p style='color:red'>".$_GET['failed']."</p>";
  }else if(isset($_GET['success'])){
    echo "<p style='color:blue'>".$_GET['success']."</p>";
  }else{
  }

?>
		<form method='POST' action="../mysystem/controller/exec_controller.php">
	  <input type="hidden" name="action" value="add">
	  <input type="hidden" name="target" value="service">
			<tr>
				<td>Service name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode);" class='input' type='text' name='serviceName' placeholder='Service name' onfocus="if (this.placeholder == &#39;Service name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Service name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Service rate</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event);" class='input' type='text' name='serviceRate' placeholder='Service rate' onfocus="if (this.placeholder == &#39;Service rate&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Service rate&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td colspan='2'>
					<input class='inputbutton' type='reset' name='cancel' value='CANCEL' formnovalidate />
					<input class='inputbutton' type='submit' name='save' value='SAVE' />
				</td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all services</p>
  <form method='POST'>
  <ul id='search'>
  <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Service'/></li>
  <li><button  type='submit' name='search' autofocus/><a></a></button></li>
  </ul>
  </form>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle servicetabletitle' id='tabletitle' style='width: 65%;'>Service Name</th>
			<th class='listtitle'>Rate</th>
			<th class='listtitle'>Edit</th>
			<th class='listtitle'>Status</th>
		</tr>
	  <?php include("listService.php"); ?>
	</table>
	
</div>
<div id='clear'></div>
<?php
	if(isset($_POST['save'])) {
		echo "<script>serviceAdded()</script>";
	} else if(isset($_POST['cancel'])) {
		echo "<script>manageService()</script>";
	}
?>