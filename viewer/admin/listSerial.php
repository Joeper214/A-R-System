		<?php
				
			$query = mysql_query("SELECT * FROM serial
                        WHERE productID = $productID
                        ");
$total=NULL;
while($row = mysql_fetch_assoc($query)) {
  $total++;
  ?>
  
			<tr>	
			   <td class='list' id='categoryname'><?php echo $row['serialNumber']; ?></td>
												     <td class='list'><a class='edit' href='admin.php?option=editserial&productID=<?php echo $row['productID']; ?>&serial=<?php echo $row['serialNumber']?>'><em>Edit</em></a></td>
	 <td class='list'>
	   <?php
												     if($row['isTaken'] == 0){
												       if($row['serialStatus'] == 1) {
													 echo "<span id='notavailable'><a class='available' onclick='javascript:disableSerial({$row['productID']},{$row['serialID']});' href='#' ><em>Not available</em></a></span>";
												       }else if($row['serialStatus'] == 2){
													 echo "Defective";								       }else {
													 echo "<span id='available'><a class='unavailable' onclick='javascript:enableSerial({$row['productID']},{$row['serialID']});' xhref='#'><em>Available</em></a></span>";
												       }
												     }else{
				
												       if($row['serialStatus'] == 2){
													 echo "Defective";
												       }else{
												       echo "Sold";								  
												       }
												     }
}
  if ($total<0){
    echo "No serials Yet.";
  }else{
   
  }
  
  ?>
  </td>
      
      </tr>
      <?php
  
mysql_close();
?>
