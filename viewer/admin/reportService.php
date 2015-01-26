
	<table id='emplisttable'>
		<tr>	
			<th class='listtitle' id='tabletitle'>Name</th>
			<th class='listtitle'>Total Services Rendered</th>
		</tr>

  <?php 
	   $listEmployees = NULL;
          
           $access = new GetModel();
  $listEmployees = $access -> getAllEmployees();
foreach ($listEmployees as $employee){
   $totalSales = NULL;
  if($employee['position'] == 3){
  ?>

		<tr class='trlist'>	
		   <td class='list' id='employeename'><?php echo $employee['lname'].', '.$employee['fname'].' '.$employee['mname']; ?></td>
	  <?php $empSales = $access->getService_by_id($employee['accountID']); ?>
	     									   
     <?php if($empSales){
               foreach ($empSales as $empSale){ 
                 $totalSales += $empSale['amountDue'];
		 $fSales = number_format($totalSales, 2, '.', ',');
             } ?>
	  <td class='list stock'>P <?php echo $fSales;?></td>
     <?php }else{ $totalSales = 0; ?>
	  <td class='list stock'><?php echo $totalSales;?></td>
     <?php }  ?>

	  
</td>
		</tr>
		<?php }}?>
	</table>