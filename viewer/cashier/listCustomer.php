   <?php 
$get = new GetModel();
  if(isset($_POST['search'])){
    $key = $_POST['searchKey'];
    $personID = $get->searchCustomerID($key);

    $query = mysql_query("select * from person where personID = $personID");
  }else{
      $query = mysql_query("select * from person where personType=1");
  }
if($query){
   while($row = mysql_fetch_assoc($query)){ ?>
		<tr>	
			<td class='list' id='customername'>
		<?php echo $row['lname']." ,".$row['fname']." ".$row['mname'];?></td>
			<td class='list'><a class='edit' href='cashier.php?option=editcustomer&id=<?php echo $row['personID'];?>'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='cashier.php?option=viewcustomer&id=<?php echo $row['personID'];?>'><em>View</em></a></td>
			<td class='list'><a class='sales' href='cashier.php?option=product&id=<?php echo $row['personID'];?>'><em>Sales</em></a></td>
		</tr>
       <?php }}else{ ?>
     <tr><td class="list">No added yet.</td></tr>
       <?php } ?>