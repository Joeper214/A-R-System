<tr>
   <td>
   <select id="year" name="year" class="inputselect">
   <?php for($i=0;$i<30;$i++){
   if($i<10){
   echo "<option value='200$i'>200$i</option>";
   }else{
     echo "<option value='20$i'>20$i</option>";
   }
      }
   ?>
   </select>
   </td>
   </tr>
   </tr>