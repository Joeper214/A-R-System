
	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Name</th>
			<th class='listtitle'>Total Sales</th>
		</tr>

  <?php 
	   $listEmployees = NULL;
           $access = new GetModel();
  $listEmployees = $access -> getAllEmployees();
foreach ($listEmployees as $employee){
  if($employee['position'] == 2){
  ?>

		<tr class='trlist'>	
		   <td class='list' id='employeename'><?php echo $employee['lname'].', '.$employee['fname'].' '.$employee['mname']; ?></td>
 		<td class='list stock'></td>

</td>
		</tr>
																	  <?php }}?>
	</table>