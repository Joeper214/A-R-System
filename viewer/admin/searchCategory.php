<?php $numCat = false;
$count = NULL;
while($row = mysql_fetch_assoc($query)) {
  $count++;  
  ?>
  
			<tr>	
    <td class='list' id='categoryname'><?php echo $row['categoryName']; ?></td>
									      <td class='list'><a class='edit' href='admin.php?option=editCategory&category_id=<?php echo $row['categoryID']; ?>'><em>Edit</em></a></td>
									      <td class='list'><a class='view' href='admin.php?option=viewCategory&category_id=<?php echo $row['categoryID']; ?>'><em>View</em></a></td>
									      <td class='list'>
									      
									      <?php
									      if($row['categoryStatus'] == 1) {
										echo "<span id='notavailable'>
<a class='available' onclick='javascript:disableCategory({$row['categoryID']});' href='#' '><em>Not available</em></a></span>";
									      } else {
										echo "<span id='available'><a class='unavailable' onclick='javascript:enableCategory({$row['categoryID']});' href='#'><em>Available</em></a></span>";
									      }
  ?>
  </td>
			</tr>
      <?php

 
      
      } if($count == 0){?>
  <tr><td>No results found!</td></tr>
      <?php }?>