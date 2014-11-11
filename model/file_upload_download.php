<?php
class FileUploadDownload{
  
  protected $upload_dir;
  protected $file;
  protected $file_types;
 
  public function __construct(){
    $this->file_types = array('gif', 'png', 'jpeg','jpg');  
  }

  public function setFileTypes($f_types){
    $this->file_ftypes = $f_types;
  }

  public function uploadFile($base_dir, $file_post_name){
    /* precondition:
           base_dir -> the base directory where the file us uploaded
           file_post_name -> the value of file input name attribute
      
      postcondition: 
           upload the file to the directory specified 
           by $base_dir
    */
    $this->upload_dir = $base_dir;
    $this->file = $this->upload_dir.basename($_FILES[$file_post_name]['name']); 

    if(move_uploaded_file($_FILES[$file_post_name]['tmp_name'], $this->file)){
      return true;
    }else{
      return false;
    }
  }

  public function getFileSize($file_post_name){
    return $_FILES[$file_post_name]['size'];
  }

  public function getFileType($file_post_name){
    $file_info = pathinfo($_FILES[$file_post_name]['name']);
    return $file_info['extension'];
  }

  public function setValidFileType($types){
    $this->file_types = $types;
  }

  public function isValidFileType($file_post_name){
    return in_array($this->getFIleType($file_post_name),$this->file_types);
  }

  /***download functions*****/
  
}

?>