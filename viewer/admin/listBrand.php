		<?php

if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  $query = mysql_query("SELECT * FROM brand WHERE brandName LIKE '%$key%'  ");
}else{
$query = mysql_query("SELECT * FROM brand");
}
$count=NULL;
while($row = mysql_fetch_assoc($query)) {
  $count++;
		?>
		
			<tr>	
				<td class='list' id='brandname'><?php echo $row['brandName']; ?></td>
				<td class='list'><a class='edit' href='admin.php?option=editBrand&brandID=<?php echo $row['brandID']; ?>'><em>Edit</em></a></td>
												    <td class='list'>
					<!--<a class='userenable' href='#'><em>Active</em></a>-->
					<?php
						if($row['brandStatus'] == 1) {
							echo "<span id='available'><a class='available' onclick='javascript:disableBrand({$row['brandID']});' href='#'><em>Available</em></a></span>";
						} else {
							echo "<span id='notavailable'><a class='unavailable' onclick='javascript:enableBrand({$row['brandID']});' href='#' '><em>Not available</em></a></span>";
						}
					?>
				</td>
			</tr>
		<?php
				    }
if($count==0){
  echo"<tr><td>No Brand found</td></tr>";
}

			mysql_close();
		?>
