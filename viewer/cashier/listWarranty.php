<?php $get = new GetModel(); 

if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  $personID = $get->searchCustomerID($key);

  $listWarranty = $get->getWarranty_id($personID);
  
}else if(isset($_POST['sort'])){
  if($_POST['sortkey'] == 1){
    $listWarranty = $get->getWarranty_sort_serial();
  }else if($_POST['sortkey'] == 2){
    $listWarranty = $get->getWarranty_sort_status();
  }else if($_POST['sortkey'] == 3){
    $listWarranty = $get->getWarranty_sort_pDate();
  }  
}else{
   $listWarranty = $get->getAllWarranty();
}


if($listWarranty){
foreach($listWarranty as $warranty){
  //  print_r($warranty);
  $today = new DateTime();
  $start = new DateTime($warranty['purchaseDate']);
  $due = new DateTime($warranty['warrantyEnds']);
   ?>
   <tr class='trlist'>	

    <td class='list' id='productname'><?php echo $warranty['serialNumber'];?></td>
										 <td class='list bold'><?php echo $warranty['lname']." ,".$warranty['fname']." ".$warranty['mname'];?></td>
   <td class='list bold center'><?php echo $start->format('F j, Y');?></td>
   <td class='list bold center'><?php echo $due->format('F j, Y');?></td>
									<td class='list bold center'><?php if($due<$today){
                      echo "<text style='color:yellow'>Expired</text>";
  }else if($warranty['isVoid'] ==1){
    echo "<text style='color:red'>Void<text>";
  }else{
    echo "<text style='color:blue'>Active</text>";
  } ?></td>
   </tr>
    <?php }
}else { ?>
<tr><td></td><td>No Transactions yet.</td></tr>
<?php }?>