<?php
/*class Sanitizer{

 
  }*/
 
 function sanitize($input){
   return htmlentities(trim(strip_tags($input)));
 }

 function sanitize_text($input){
   $strip_chars = "'\";";
   return trim($input);
 }

?>