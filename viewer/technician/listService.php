 <?php 
if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  $query = mysql_query("select * from service where serviceStatus = 1 AND serviceName LIKE '%$key%' ");
}else if(isset($_POST['sort'])){
  if($_POST['sortkey'] == 1){
  $query = mysql_query("select * from service where serviceStatus = 1 ORDER BY serviceName ASC");
  }else if($_POST['sortkey'] == 3){
      $query = mysql_query("select * from service where serviceStatus = 1 ORDER BY serviceRate DESC");    
  }
}else{
  $query = mysql_query("select * from service where serviceStatus = 1");
}
   while ($row = mysql_fetch_assoc($query)){

   ?>
   <td class='list' id='servicename'><?php echo $row['serviceName'];?></td>
   <td class='list' id='rate'><?php echo $row['serviceRate'];?></td>
			<td class='list'><a class='repair' href='technician.php?option=customerrepair'><em>Apply repair</em></a></td>
		</tr>
   <?php 	
   //include('repairAppliedPopUp.php'); 
} 
   ?>