<div id='adminleft'>
	<header id='accounttitle'>
		<p>Customer Information</p>
	</header>
<form method='POST' action='../mysystem/controller/tech_controller.php'>
   <input type="hidden" name="action" value="add">
   <input type="hidden" name="target" value="customer">
   
   
		<table>
			<tr>
				<td>First name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode);" class='input' type='text' name='fname' placeholder='First name' onfocus="if (this.placeholder == &#39;First name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;First name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Middle name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode);" class='input' type='text' name='mname' placeholder='Middle name' onfocus="if (this.placeholder == &#39;Middle name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Middle name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Last name</td>
			</tr>
			<tr>
				<td><input onkeydown="return isAlpha(event.keyCode);" class='input' type='text' name='lname' placeholder='Last name' onfocus="if (this.placeholder == &#39;Last name&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Last name&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Address</td>
			</tr>
			<tr>
				<td><input class='input' type='text' name='address' placeholder='Address' onfocus="if (this.placeholder == &#39;Address&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Address&#39;;}" autofocus required/></td>
			</tr>
			<tr>
				<td>Contact number</td>
			</tr>
			<tr>
				<td><input onkeydown="return allNumbers(event);" maxlength="11" class='input' type='text' name='number' placeholder='Contact number' onfocus="if (this.placeholder == &#39;Contact number&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Contact number&#39;;}" autofocus required/></td>
			</tr>
                      <tr>
   <td>Device: </td>
                      </tr>
   
   <tr>
   <td>
<!--   &nbsp; &nbsp; &nbsp;* Nothing added -->
   </td>
   </tr>

   <tr><td>
<input id="device" class='input' type='text' name='device' placeholder='Enter Device Name here' onfocus="if (this.placeholder == &#39;Contact number&#39;) {this.placeholder = &#39;&#39;;}" onblur="if (this.placeholder == &#39;&#39;) {this.placeholder = &#39;Contact number&#39;;}" autofocus required></td></tr>
   <tr><td><input type="submit" class="inputbutton" value="Save" > </td></tr>

	
		</table>
	</form>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>List of all services</p>

  <ul id='search'>
<form method='POST'>
  <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Service'/></li>
  <li><button  style="height: 30px;  width: 40px;" type='submit' name='search' autofocus/><a></a></button></li>
  </form>		
  </ul>

<ul id='productfilter'>
			<li>Sort by &nbsp; </li>

			<li>
                  <form method="POST">
				<select style="height: 30px;;" ame='sortkey' class='inputselectproductfilter'>
					<option value="1">Name</option>
					<option value="3">Service Rate</option>
				</select>
			</li>
    <li><button type="submit" style="height: 30px;  width: 40px;" name="sort"><a></a></button></form></li>

		</ul>
	</header>

	<table id='emplisttable'>
		<tr>
			<th class='listtitle servicetabletitle' id='tabletitle' style='width: 80%'>Service name</th>
			<th class='listtitle'>Rate</th>
			<th class='listtitle'>Applied</th>
		</tr>
		<tr>

   <?php 

    include "listService.php";

   ?>
	</table>
        
	
</div>
<div id='clear'></div>