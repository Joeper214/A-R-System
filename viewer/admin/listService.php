<?php
if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  $query = mysql_query("SELECT * FROM service WHERE serviceName LIKE '%$key%'");
}else{
$query = mysql_query("SELECT * FROM service");
}

while($row = mysql_fetch_assoc($query)) {
  ?>
  
			<tr>	
    <td class='list' id='servicename'><?php echo $row['serviceName']; ?></td>
    <td class='list' id='price'>P  <?php echo $row['serviceRate']; ?></td>
									      <td class='list'><a class='edit' href='admin.php?option=editService&serviceID=<?php echo $row['serviceID']; ?>'><em>Edit</em></a></td>
									      
  <td class='list'>
					
									      <?php
									      if($row['serviceStatus'] == 1) {
										echo "<span id='available'><a class='available' onclick='disableService({$row['serviceID']})' href='#'><em>available</em></a></span>";
									      } else {
										echo "<span id='notavailable'><a class='unavailable' onclick='enableService({$row['serviceID']})' href='#'><em>Not Available</em></a></span>";
									      }
  ?>
  </td>
      </tr>
		<?php
      }
mysql_close();
?>
