<div id='adminleft'>
<?php if (isset($_GET['fail'])){
   echo "<script> alert('{$_GET['fail']}');</script>";
 }else if(isset($_GET['success'])){
   echo "<script> alert('{$_GET['success']}');</script>";
   
 }
if(isset($_GET['year'])){

}else{
  $_GET['year'] = 0;
}
$month = NULL;

if(isset($_POST['month'])){
  if($_POST['month'] == 1){
    $month = "January";
  }else if($_POST['month'] == 2){
     $month = "February";
  }else if($_POST['month'] == 3){
     $month = "March";
  }else if($_POST['month'] == 4){
     $month = "April";
  }else if($_POST['month'] == 5){
     $month = "May";
  }else if($_POST['month'] == 6){
     $month = "June";
  }else if($_POST['month'] == 7){
     $month = "July";
  }else if($_POST['month'] == 8){
 $month = "August";
  }else if($_POST['month'] == 9){
     $month = "September";
  }else if($_POST['month'] == 10){
     $month = "October";
  }else if($_POST['month'] == 11){
     $month = "November";
  }else if($_POST['month'] == 12){
     $month = "December";
  }else{
    $month = "Today";
  }
}else{
  $month = "Today";
}
?>
	<header id='accounttitle'>
		<p>Filter transactions</p>
	</header>
	<table>


			<tr>
		<form method='POST'>
				<td>Transaction type</td>
			</tr>
			<tr>
				<td>
					<select name='transact_type' class='inputselect'>						<option value="0">All</option>
						<option value="1">Sales</option>
						<option value="2">Technical</option>
					</select>
                                      
				</td>


   <tr>
   <td>Browse by Month and Year</td>
   </tr>
   <tr>
  <td><select name="month" class="inputselect">
   <option <?php if ($_GET['year'] ==0 ){echo "selected='true'" ;}?> value="0" onclick="cyear(0)">Today</option>   
   <option <?php if($_GET['year'] == 1){echo "selected='true'" ;}?> value="01"  onclick="cyear(1)">January</option>
 <option <?php if($_GET['year'] == 2){echo "selected='true'" ;}?>value="02" onclick="cyear(2)">February</option>
 <option <?php if($_GET['year'] == 3){echo "selected='true'" ;}?> value="03" onclick="cyear(3)">March</option>
 <option  <?php if($_GET['year'] == 4){echo "selected='true'" ;}?>value="04" onclick="cyear(4)">April</option>
 <option <?php if($_GET['year'] == 5){echo "selected='true'" ;}?> value="05" onclick="cyear(5)">May</option>
 <option <?php if($_GET['year'] == 6){echo "selected='true'" ;}?> value="06" onclick="cyear(6)">June</option>
 <option <?php if($_GET['year'] == 7){echo "selected='true'" ;}?> value="07" onclick="cyear(7)">July</option>
 <option <?php if($_GET['year'] == 8){echo "selected='true'" ;}?> value="08" onclick="cyear(8)">August</option>
 <option <?php if($_GET['year'] == 9){echo "selected='true'" ;}?> value="09" onclick="cyear(9)">September</option>
 <option <?php if($_GET['year'] == 10){echo "selected='true'" ;}?> value="10" onclick="cyear(10)">October</option>
 <option <?php if($_GET['year'] == 11){echo "selected='true'" ;}?> value="11" onclick="cyear(11)">November</option>
 <option <?php if($_GET['year'] == 12){echo "selected='true'" ;}?> value="12" onclick="cyear(12)">December</option>

   </select></td>
   <?php 
   if(isset($_GET['year']) && $_GET['year'] != 0){
    include "year.php";
   }
    ?>

</tr>
<tr>
<td colspan='2'><input name="bmonth" type='submit' class='fullinputbutton' name='viewtransactions' value='VIEW TRANSACTIONS' /></td>
  </form>
  </tr>
  </tr>
  </table>
  </br>

  <?php if(isset($_POST['year']) && $_GET['year'] != 0 && isset($_POST['month'])) {
$get = new GetModel();
$transactions = $get->browseby_month($_POST['month'],$_POST['year']);
$grosssales = NULL;
$techSales = NULL;
$Sales = NULL;
$y = $_GET['year'];
$m = $_POST['year'];

if($transactions){
  foreach($transactions as $transaction){
    //      print_r($transaction);
    $date = new DateTime($transaction['dateRecorded']);
    
     $amount = number_format($transaction['amountDue'], 2, '.', ',');
     $grosssales += $transaction['amountDue'];


  if($transaction['transactionType'] == 2){
    $techSales += $transaction['amountDue'];
  }
  if($transaction['transactionType'] == 1){
    $Sales += $transaction['amountDue'];
  }
}
}else{
  
}
?>
<?php 
}else{
   $get = new GetModel();
$transactions = $get->getSalesTransactions();
$grosssales = NULL;
$techSales = NULL;
$Sales = NULL;
if($transactions){
  foreach($transactions as $transaction){
    //      print_r($transaction);
    $date = new DateTime($transaction['dateRecorded']);
    
     $amount = number_format($transaction['amountDue'], 2, '.', ',');
     $grosssales += $transaction['amountDue'];
  }

  if($transaction['transactionType'] == 2){
    $techSales += $transaction['amountDue'];
  }
  if($transaction['transactionType'] == 1){
    $Sales += $transaction['amountDue'];
  }
}else{
  
}
}
?>

<header id='accounttitle'>
  <p><?php if ($month){echo $month; }else{ echo "Daily";}?>'s Income</p>
  </header>
  <table>
		<form method='POST'>
			<tr>
				<td><?php echo $month ?> Technical income</td>
			</tr>
			<tr>
				<td><h1>P <?php echo number_format($techSales, 2, '.', ','); ?></h1></td>
			</tr>
<tr>
				<td><?php echo $month ?> Sales income</td>
			</tr>
			<tr>
				<td><h1>P <?php echo number_format($grosssales-$techSales, 2, '.', ','); ?></h1></td>
			</tr>
			<tr>
				<td><?php echo $month ?> Gross sales</td>
			</tr>
			<tr>
		   <td><h1 style='margin: 0px; padding: 0px; font-size: 30px; color: #333;'>P <?php echo number_format($grosssales, 2, '.', ','); ?></h1></td>
			</tr>
		</form>
	</table>
</div>

<div id='adminright'>
	<header id='accounttitle'>
		<p>Technical transaction's pending payment'</p>
	</header>

	<table id="emplisttable">
		<tr>	
			<th class='listtitle' id='tabletitle'>Date</th>
			<th class='listtitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle' id='tabletitle' style='width: 200px;'>Amount Due</th>

			<th class='listtitle'>View</th>
		</tr>
<?php 
   $tech = new GetModel();
$technicals = $tech->getTechnicals();
if($technicals){
foreach($technicals as $tech){
  $date = new DateTime($tech['serviceDate']);
  $person = $tech['lname'].", ".$tech['fname']." ".$tech['mname'];
  $amountDue = number_format( $tech['subtotal'], 2, '.', ','); 
?>
		<tr>	
<td class='list' id='reportdate'><?php echo $date->format('m/d/Y');?></td>
<td class='list technicalpendingpaymentname'><?php echo $person;?></td>
<td class='list price'>P <?php echo $amountDue; ?></td>
<td class='list'><a class='view' href='cashier.php?option=pendingpaymentdetail&personID=<?php echo $tech['personID']?>&accID=<?php echo $tech['accountID']?>'><em>view detail</em></a></td>
		</tr>
						      <?php }}else{ ?>
<tr><td></td><td>No Technical Transactions yet.</td></tr>
    <?php } ?>
		
	</table>
	</br>
	<header id='accounttitle'>
		<p>Today's transactions'</p>
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
				<select name='sortkey' class='inputselectproductfilter' style="height: 35px;">
					<option value="1">Name</option>
					<option value="2">Type</option>
					<option value="3">Price</option>
				</select>
			</li>
    <li><button type="submit" name="sort" style="height: 35px;  width: 40px;"><a></a></button></form></li>

		</ul>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Date</th>
			<th class='listtitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle'>Transaction</th>
			<th class='listtitle' id='tabletitle'>Attendant</th>
			<th class='listtitle'>Payment</th>
			<th class='listtitle'>View</th>
		</tr>
										    
    <?php include "listTransactions.php"; ?>
	</table>
<form method='POST'>
            <input id='monthval' type='hidden' value='<?php echo $month?>'>
            <input id='yearval' type='hidden' value='<?php echo $year?>'>
            <input id='ttype' type='hidden' value='<?php echo $ttype?>'>
		<input style='width: 150px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='printreport' value='GENERATE REPORT' onclick="cashierReport()" />
	</form>

</div>
<div id='clear'></div>