<?php

class Dashboard_Model extends Model{
    
    function __construct(){
        
         parent::__construct();
    }
    function xhrInsert(){
    
        
        $sth=$this->db->prepare("Insert into data(text) values (:text)");
        $sth->execute(array(":text"=>$_POST["text"]));
        $data = array("text"=>$_POST["text"], "id" => $this->db->lastInsertId());
        echo json_encode($data);
        
        
    }
    
    function xhrGetListings(){
        $sth= $this->db->prepare("select * from data");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data=$sth->fetchAll();
    
        echo json_encode($data);
    }
    
       function xhrDel($id ){
        $sth= $this->db->prepare("delete from data where id = :id");
        $sth->execute(array(":id"=>$id));
    }
}


?>