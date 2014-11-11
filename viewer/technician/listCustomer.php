
<?php 

if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  if($_POST['searchType'] == 1){
    $query = mysql_query("select * from person where personType=1 AND fname LIKE '%$key%'");
  }else if($_POST['searchType'] == 2){
    $query = mysql_query("select * from person where personType=1 AND mname LIKE '%$key%'");
  }else{
    $query = mysql_query("select * from person where personType=1 AND lname LIKE '%$key%'");
  }
}else{
  $query = mysql_query("select * from person where personType=1");
}

   while($row = mysql_fetch_assoc($query)){ ?>
		<tr>	
			<td class='list' id='customername'>
		<?php echo $row['lname']." ,".$row['fname']." ".$row['mname'];?></td>
			<td class='list'><a class='edit' href='technician.php?option=editcustomer&id=<?php echo $row['personID'];?>'><em>Edit</em></a></td>
			<td class='list'><a class='view' href='technician.php?option=viewcustomer&id=<?php echo $row['personID'];?>'><em>View</em></a></td>
			<td class='list'><a class='repair' href='technician.php?option=customerrepair&id=<?php echo $row['personID'];?>'><em>Sales</em></a></td>
		</tr>
   <?php }?>