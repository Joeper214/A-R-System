<div id='adminleft'>
<?php 
if(isset($_GET['year'])){

}else{
  $_GET['year'] = 0;
}
?>

	<header id='accounttitle'>
		<p>Transaction Reports</p>
	</header>
	<table>

		<form method='POST'>
 <td>Browse by Month and Year</td>
   </tr>
   <tr>
  <td><select id="month" name="month" class="inputselect">
   <option <?php if ($_GET['year'] ==0 ){echo "selected='true'" ;}?> value="0" onclick="tyear(0)">Today</option>   
   <option <?php if($_GET['year'] == 1){echo "selected='true'" ;}?> value="01"  onclick="tyear(1)">January</option>
 <option <?php if($_GET['year'] == 2){echo "selected='true'" ;}?>value="02" onclick="tyear(2)">February</option>
 <option <?php if($_GET['year'] == 3){echo "selected='true'" ;}?> value="03" onclick="tyear(3)">March</option>
 <option  <?php if($_GET['year'] == 4){echo "selected='true'" ;}?>value="04" onclick="tyear(4)">April</option>
 <option <?php if($_GET['year'] == 5){echo "selected='true'" ;}?> value="05" onclick="tyear(5)">May</option>
 <option <?php if($_GET['year'] == 6){echo "selected='true'" ;}?> value="06" onclick="tyear(6)">June</option>
 <option <?php if($_GET['year'] == 7){echo "selected='true'" ;}?> value="07" onclick="tyear(7)">July</option>
 <option <?php if($_GET['year'] == 8){echo "selected='true'" ;}?> value="08" onclick="tyear(8)">August</option>
 <option <?php if($_GET['year'] == 9){echo "selected='true'" ;}?> value="09" onclick="tyear(9)">September</option>
 <option <?php if($_GET['year'] == 10){echo "selected='true'" ;}?> value="10" onclick="tyear(10)">October</option>
 <option <?php if($_GET['year'] == 11){echo "selected='true'" ;}?> value="11" onclick="tyear(11)">November</option>
 <option <?php if($_GET['year'] == 12){echo "selected='true'" ;}?> value="12" onclick="tyear(12)">December</option>

   </select></td>
   <?php 
   if(isset($_GET['year']) && $_GET['year'] != 0){
    include "year.php";
   }
    ?>

</tr>
			<tr>
				<td colspan='2'><input type='submit' class='fullinputbutton' name='viewreports' value='VIEW REPORTS' /></td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>Technical transactions</p>
   </br>   </br>
		   <ul id='search'>
	        		<form method='POST'>
   <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Customer'/></li>
   <li><button  type='submit' name='search' style="height: 30px;  width: 40px;" autofocus/><a></a></button></li>
   </form>
   </ul>

		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>

			<li>
                  <form method="POST">
				<select name='sortkey' class='inputselectproductfilter' style="height: 35px; ">
   <option value="1">Name</option>
   <option value="3">Price</option>
				</select>
			</li>
    <li><button type="submit" name="sort" style="height: 35px;  width: 40px;"><a></a></button></form>
</li>

		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Date</th>
			<th class='listtitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle' id='tabletitle'>Attendant</th>
			<th class='listtitle'>Payment</th>
			<th class='listtitle'>View</th>
		</tr>
   <?php include "listTransactions.php" ?>
	</table>
	
	<form method='POST'>
   <input id='monthval' type='hidden' value='<?php echo $month?>'>
   <input id='yearval' type='hidden' value='<?php echo $year?>'>
   		<input style='width: 150px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' 
                   onclick='techReport()' type='submit' class='inputbutton' name='printtechnicalreport' value='GENERATE REPORT' />
	</form>
	
</div>
<div id='clear'></div>
