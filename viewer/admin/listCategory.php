		<?php

$key = NULL;
if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  $query = mysql_query("SELECT * FROM category WHERE categoryName LIKE '%$key%'");

  include"searchCategory.php";
  
}else{
  $query = mysql_query("SELECT * FROM category");
$numCat = NULL;
while($row = mysql_fetch_assoc($query)) {
  if($row['categoryName'] == "Accessories"){
    $numCat = false;
  }else{
    $numCat = true;
  }
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

 
      }

}



if($numCat==true){
  $insert = new InsertModel();
  $insert->insertIntoCategory("Accessories","For cunsumable type of category","1");
}
mysql_close();
?>
