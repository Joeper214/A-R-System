<?php 
    $get = new GetModel();
if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  if($_POST['searchType'] == 1){
  $transactions = $get->getTransaction_by_fname($key);
  }else if($_POST['searchType'] ==2){
  $transactions = $get->getTransaction_by_mname($key);
  }else{
  $transactions = $get->getTransaction_by_lname($key);
  }
}else if(isset($_POST['sort'])){
  if($_POST['sortkey'] == 1){
    $transactions = $get->getTransaction_ord_name();
  }else if($_POST['sortkey'] == 2){
    $transactions = $get->getTransaction_ord_type();
  }else if($_POST['sortkey'] == 3){
    $transactions = $get->getTransaction_ord_price();
  }
}else if(isset($_POST['transact_type'])){
  if($_POST['transact_type'] == 1){
    $transactions = $get->getOnlySales();
  }else if($_POST['transact_type'] == 2){
    $transactions = $get->getOnlyTech();
  }
  
}else{
    $transactions = $get->getSalesTransactions();
}
if($transactions){
    foreach($transactions as $transaction){
      //      print_r($transaction);
      $date = new DateTime($transaction['dateRecorded']);

      $amount = number_format($transaction['amountDue'], 2, '.', ',');

?>

     
		<tr>	
		   <td class='list' id='reportdate'><?php echo $date->format('m/d/Y'); ?></td>
<td class='list salesreportscustomername'><?php echo $transaction['lname']." ,"
                                .$transaction['fname']; ?> </td>
							      <td class='list bold'><?php if($transaction['transactionType'] == 1){
	echo "Sales";
      }else{
	echo "Technical";
      }
      ?></td>
			<td class='list salesreportsattendant'><?php 
			   $attendant = $get->getAttendant($transaction['accountID']);
                            echo $attendant;
                           ?></td>
			<td class='list transactionpayment'><?php 
			   echo $amount;
?>
			   </td>

<?php if($transaction['transactionType'] == 1){ ?>
	<td class='list'><a class='view' href='cashier.php?option=salesdetail&transID=<?php echo $transaction['transactionID'];?>'><em>view detail</em></a></td>
<?php       }else{ ?>
        <td  class='list'><a class='view' href='cashier.php?option=technicaldetail&transID=<?php echo $transaction['transactionID'];?>'></td>
				<?php       } ?>
		
		</tr>
		<tr>	
		    <?php }
    }else{ ?>
      <tr><td></td><td>No Transactions yet.</td></tr>
  <?php  }
 ?><!-- End list -->