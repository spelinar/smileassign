<?php

class Info_Model extends Model{
    
    function __construct(){
         parent::__construct();
    }
   
    function XHRgetInfo(){
       $id = Session::Get("id");
        
        $sth = $this->db->prepare('select name,second_name,email,age, phone_number from members as  m inner join users as u ON
        m.id_login = u.id where m.id_login =:id');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array ("id"=>$id));
        $data= $sth->fetchAll();
        
        echo json_encode ($data);
             
        
    }
    
    function XHRgetTicketList(){
        $sth = $this->db->prepare('select id_ticket, tittle from ticket');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data= $sth->fetchAll();
        
        echo json_encode ($data);
             
        
    }
 
    function buyTicket(){
       
        $ticket =$_POST["type"];
        $id = $this->getIdMembers();
        $curr_entrance = 0;
        $actuality = 30;
        $payment = 0;
        
        $sth = $this->db->prepare('insert into ticket_info(id_member,id_ticket, curr_entrance,actuality, payment)
        values (:id, :ticket, :curr_entrance, :actuality, :payment);');
        
      
        $res = $sth->execute(array('id'=>$id,'ticket'=>$ticket,'curr_entrance'=>$curr_entrance,
        'actuality'=>$actuality,'payment'=>$payment));
     
        $text =  ($res == true ? "done":"error");
       
        $data= array("text" => $text );
        echo json_encode ($data);  
    }
    
    
    function getIdMembers(){
       $sth= $this->db->prepare(" select id_members from members where id_login=:id");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array("id"=>Session::Get("id")));
         
        $data = $sth->fetchAll();
            return $data[0]["id_members"];
       
    }
    
}

?>