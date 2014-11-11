<?php

 /*
    connector class in mysql using pdo
    author: Jofel Bayron
    Date created: Sept 29 2013
 */
   class DBConnector{ 
      /*db settings*/
      
      private $u_name;
      private $p_word;
      private $dsn;
      private $pdo;
      private $pds;

      public function __construct(){
	/*     
         $this->u_name = "public";
         $this->p_word = '201m!trIpt$npublic';
         $this->dsn = "mysql:host=localhost;dbname=moco";
	*/
	 $this->u_name = "root";
         $this->p_word = '';
         $this->dsn = "mysql:host=localhost;dbname=mysystem";

      }
	    
      public function connect(){
        try{
           $this->pdo = new PDO($this->dsn, $this->u_name, $this->p_word);
        }catch(PDOException $e){
           echo "Unable to established database connection!";
        }
      }
	  
	  /* SQL QUERIES */
      
	  //SELECT
      public function selectAll($query){ 
	return $this->pdo->query($query);
      }

      public function select($query, $arr_val){
        $this->execQuery($query, $arr_val);
        return $this->pst;
      }
	  
	  //INSERT
      public function insert($query, $array){
        try{
          $this->execQuery($query, $array);
          return true;
        }catch(Exception $e){
          return false;
        }
      }
	  
	  //UPDATE
      public function update($query, $values){
        try{
	  $this->execQuery($query, $values);
          return true;
        }catch(Exception $e){
	  return false;
        }
      }
	  
      //DELETE ROWS
      public function delete($query, $values){
        try{
	  $this->execQuery($query, $values);
          return true;
        }catch(Exception $e){
	  return false;
        }
      }

      public function doesExist($query){
        $rs = $this->selectAll($query);
        return $rs->fetchColumn()>0;
      }

      public function doesExistSelect($query, $param){
        $rs = $this->select($query,$param);
        return $rs->fetchColumn()>0;
      }

      public function count($query){
	$rs = $this->selectAll($query);
        return $rs->fetchColumn();
      }
	  
	  /*******end of INUPSEDEL QUERIES *******/
		
	  /****prepare statement and execute******/
	  
      private function execQuery($query, $values){
	    $this->pst = $this->pdo->prepare($query);
	    $this->pst->execute($values);		
      }

	  
	  /***** other queries ******/
      public function isDBExist($db_name){
         $sql = "select count(db_name)
                 from backup_db.backup_databases
                 where db_name='$db_name'";
        
         $rs = $this->select($sql);
         $num_row = $rs->fetchColumn();
         return $num_row>0;
      }
     
      public function createDB($db_name){
         $sql = "create database $db_name";
         $this->select($sql);
      }

      public function quote($str){
	 return $this->pdo->quote($str);
      }

      public function trans_beg(){
	$this->pdo->beginTransaction();
      }

      public function commit(){
	$this->pdo->commit();
      }
      public function rollback(){
	$this->pdo->rollback();
      }
   
      public function closeConn(){
	$this->pdo->close();
      }
     
   }

?>
