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

if(isset($_GET['month'])){
  if($_GET['month'] == 1){
    $month = "January";
  }else if($_GET['month'] == 2){
     $month = "February";
  }else if($_GET['month'] == 3){
     $month = "March";
  }else if($_GET['month'] == 4){
     $month = "April";
  }else if($_GET['month'] == 5){
     $month = "May";
  }else if($_GET['month'] == 6){
     $month = "June";
  }else if($_GET['month'] == 7){
     $month = "July";
  }else if($_GET['month'] == 8){
 $month = "August";
  }else if($_GET['month'] == 9){
     $month = "September";
  }else if($_GET['month'] == 10){
     $month = "October";
  }else if($_GET['month'] == 11){
     $month = "November";
  }else if($_GET['month'] == 12){
     $month = "December";
  }else{
    $month = "Today";
  }
}else{
  $month = "Today";
}
?>

  </br>

  <?php if(isset($_GET['year']) && $_GET['year'] != 0) {
$get = new GetModel();
$transactions = $get->browseby_month($_GET['month'],$_GET['year']);


$grosssales = NULL;
$techSales = NULL;
$Sales = NULL;
$y = $_GET['year'];
$m = $_GET['year'];

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
  echo " wala";
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
				<td><h1>P <?php echo number_format($Sales, 2, '.', ','); ?></h1></td>
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


		
	</table>
	</br>
	</header>

	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Date</th>
			<th class='listtitle' id='tabletitle'>Customer Name</th>
			<th class='listtitle'>Transaction</th>
			<th class='listtitle' id='tabletitle'>Attendant</th>
			<th class='listtitle'>Payment</th>

		</tr>
										    
    <?php include "listPrint.php"; ?>
	</table>
<div id="print_test" style="display:none">
<p>wewewewe 'testststst</p>
</div>



<form method='POST'>
		<input style='width: 150px; border: none; float: right; margin: 5px 1px 5px 0px; border: 1px solid #fff; box-shadow: 0px 0px 1px #000;' type='submit' class='inputbutton' name='printreport' value='PRINT REPORT' onclick="printReport()" />
	</form>

</div>
<div id='clear'></div>