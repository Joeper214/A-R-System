<?php $get = new GetModel();

$month = null;
$year = null;
$ttype = null;
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
}else{
      $transactions = $get->getOnlyTech();
}
   
if($transactions){
   foreach($transactions as $transaction){
     $date = new DateTime($transaction['dateRecorded']);
     $amount = number_format($transaction['amountDue'], 2, '.', ',');
?>
<tr>	
   <td class='list' id='reportdate'><?php echo $date->format('m/d/Y'); ?></td>
   <td class='list reportscustomername'><?php echo $transaction['lname']." ,"
                                .$transaction['fname']; ?> </td>
   <td class='list reportsattendant'><?php 
			   $attendant = $get->getAttendant($transaction['accountID']);
                            echo $attendant;
                           ?> </td>
   <td class='list transactionpayment'>P <?php echo $amount; ?></td>
   <td class='list'><a class='view' href="technician.php?option=reportsdetail&transID=<?php echo $transaction['transactionID']; ?>"><em>view detail</em></a></td>
		</tr>
								   <?php }}else{ ?>
  <tr>
    <td> Nothing to display</td>
    </tr>
    <?php }?>