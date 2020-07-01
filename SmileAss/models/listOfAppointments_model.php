<?php

class listOfAppointments_model extends Model{
    
    function __construct(){
         parent::__construct();
    }
   
    
    
      function XHRgetBookingList(){
         $id_user = Session::get("id");
        $sth = $this->db->prepare('select date, first_name,second_name, specialty from booking as b   
inner join doctor d on b.id_doctor=d.id_doctor
inner join specialty s on s.id_specialty=d.id_specialty where id_user =:id_user;');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute( array(":id_user"=>$id_user));
        $data= $sth->fetchAll();
       
        echo json_encode ($data);
             
        
    }
}

?>