<?php $query = mysql_query("select * from note where accountID = {$_SESSION['accountID']}");
   WHILE($row = mysql_fetch_assoc($query)){ ?>
		<tr>	
    <td class='list' id='notedescription'><?php echo $row['problemDescription']; ?></td>
    <td class='list'><?php echo $row['device']; ?></td>
    <td class='list'><a class='edit' href='technician.php?option=editnote&id=<?php echo $row['noteID']?>'><em>Edit</em></a></td>
    <td class='list'><a class='view' href='technician.php?option=viewnote&id=<?php echo $row['noteID']?>'><em>View</em></a></td>
    </tr>
    <tr>	
		<?php }?>