		<?php

$key = NULL;
if(isset($_POST['search'])){
  $key = $_POST['searchKey'];
  $query = mysql_query("SELECT * FROM category WHERE categoryName LIKE '%$key%'");

  include"searchCategory.php";
  
}else{
  $query = mysql_query("SELECT * FROM category");
$numCat = 2;
while($row = mysql_fetch_assoc($query)) {
  if($row['categoryName'] == "Accessories"){
    $numCat = 1;
  }else{
    $numCat = 2;
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


if($numCat==2){
  $insert = new InsertModel();
  $query = mysql_query("SELECT COUNT(*) as Cats FROM category 
WHERE categoryName='Accessories'");
  while($row = mysql_fetch_assoc($query)) {
    if($row['Cats'] > 0){

    }else{
      $insert->insertIntoCategory("Accessories","For cunsumable type of category","1");     
      header("Refresh:0");
    }


  }
}
mysql_close();
?>
