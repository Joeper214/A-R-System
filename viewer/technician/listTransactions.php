<?php 

$month = null;
$year = null;
$ttype = null;
$transactions = null;
    $get = new GetModel();
if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  
  $personID = $get->searchCustomerID($key);

  if($personID){
    $transactions = $get->getTech_by_id($personID);
  }else{
    
  }


}else if(isset($_POST['sort'])){
  if($_POST['sortkey'] == 1){
    $transactions = $get->getTech_ord_name();
  }else if($_POST['sortkey'] == 3){
    $transactions = $get->getTech_ord_price();
  }
}else if(isset($_POST['bmonth'])||(isset($_GET['month']))||isset($_POST['month'])){
  if(isset($_POST['month'])){
    $month = $_POST['month'];
  }else if(isset($_GET['month'])){
    $month = $_GET['month'];
  }else{
    $month = 0;
  }
  
  if(isset($_POST['year'])){
    $year = $_POST['year'];  
  }else if(isset($_GET['year'])){
    $year = $_GET['year'];    
  }else{
    $year = 0;
  }

  if($month == 0){
      $transactions = $get->getOnlyTech();

  }else{
    //echo $month." ".$year;
    $transactions = $get->browseby_month_tech($month,$year);
    print_r($transactions);
  }
}else{
      $transactions = $get->getOnlyTech();
}
$total = null;
if($transactions){
   foreach($transactions as $transaction){
     $date = new DateTime($transaction['dateRecorded']);
     $amount = number_format($transaction['amountDue'], 2, '.', ',');
     $total += $amount;
     
?>
<tr>	
   <td class='list' id='reportdate'><?php echo $date->format('F j, Y'); ?></td>
   <td class='list reportscustomername'><?php echo $transaction['lname']." ,"
                                .$transaction['fname']; ?> </td>
   <td class='list reportsattendant'><?php 
			   $attendant = $get->getAttendant($transaction['accountID']);
                            echo $attendant;
                           ?> </td>
   <td class='list transactionpayment'>P <?php echo $amount; ?></td>
   <td class='list'><a class='view' href="technician.php?option=reportsdetail&transID=<?php echo $transaction['transactionID']; ?>"><em>view detail</em></a></td>
		</tr>
								   <?php } ?>
			    <td class="list"></td><td class="list"></td><td class='list transactionpayment'> Total </td> <td class='list transactionpayment'>P <?php echo number_format($total, 2, '.', ','); ?></td>
																										    <?php }else{ ?>
  <tr>
    <td> Nothing to display</td>
    </tr>
    <?php }?>