<div id='adminleft'>
<?php if (isset($_GET['fail'])){
   echo "<script> alert('{$_GET['fail']}');</script>";
 }else if(isset($_GET['success'])){
   echo "<script> alert('{$_GET['success']}');</script>";
   
 }
?>
	<header id='accounttitle'>
		<p>Daily Transaction</p>
	</header>
	<table>

		<form method='POST'>
			<tr>
				<td>Transaction type</td>
			</tr>
			<tr>
				<td>
					<select name='month' class='inputselect'>
						<option>All</option>
						<option value="1">Sales</option>
						<option value="2">Technical</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan='2'><input name="transtype" type='submit' class='fullinputbutton' name='viewtransactions' value='VIEW TRANSACTIONS' /></td>
			</tr>
		</form>
	</table>
	</br>
	<header id='accounttitle'>
		<p>Daily Income</p>
	</header>
	<table>
<?php 
   $get = new GetModel();
    $transactions = $get->getSalesTransactions();
$grosssales = NULL;
$techSales = NULL;
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
}else{
  
}
?>
		<form method='POST'>
			<tr>
				<td>Today's current technical income</td>
			</tr>
			<tr>
				<td><h1>P <?php echo number_format($techSales, 2, '.', ','); ?></h1></td>
			</tr>
			<tr>
				<td>Today's current gross sales</td>
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
if(isset($technicals)){
foreach($technicals as $tech){
  $date = new DateTime($tech['serviceDate']);
  $person = $tech['lname'].", ".$tech['fname']." ".$tech['mname'];
  $amountDue = number_format( $tech['subtotal'], 2, '.', ','); 
?>
		<tr>	
<td class='list' id='reportdate'><?php echo $date->format('m/d/Y');?></td>
<td class='list technicalpendingpaymentname'><?php echo $person;?></td>
<td class='list price'>P <?php echo $amountDue; ?></td>
<td class='list'><a class='view' href='admin.php?option=pendingpaymentdetail&personID=<?php echo $tech['personID']?>&accID=<?php echo $tech['accountID']?>'><em>view detail</em></a></td>
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
    <li>Search by: <select name="searchType">
    <option value="1">Firstname</option>
    <option value="2">Middlename</option>
    <option value="3">Lastname</option>
    </select></li>
   <li><input type='text' class='searchinput' name='searchKey' placeholder='Search Customer'/></li>
   <li><button  type='submit' name='search' autofocus/><a></a></button></li>
   </form>
   </ul>

		<ul id='productfilter'>
			<li>Sort by &nbsp; </li>

			<li>
                  <form method="POST">
				<select name='sortkey' class='inputselectproductfilter'>
					<option value="1">Name</option>
					<option value="2">Type</option>
					<option value="3">Price</option>
				</select>
			</li>
    <li><button type="submit" name="sort"><a></a></button></form></li>

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
		<input style='width: 150px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='printreport' value='PRINT REPORT' onclick="printReport()" />
	</form>

</div>
<div id='clear'></div>