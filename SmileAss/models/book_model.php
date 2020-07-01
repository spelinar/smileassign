<?php

class book_model extends Model{
    
    function __construct(){
         parent::__construct();
    }
   

            
    function xhrGetListings(){ //список всех направлений 
        $sth= $this->db->prepare("select id_specialty, specialty from specialty;");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data=$sth->fetchAll();
    
        echo json_encode($data);
    }
    
           
    function xhrGetListDoctor($id_spec){
        
        $sth= $this->db->prepare("select id_doctor,first_name, second_name from doctor WHERE id_specialty = :id ");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(":id"=>$id_spec));
        $sth->execute();
        $data=$sth->fetchAll();
    
        echo json_encode($data);
    }
    
     function xhrGetTimeList($id_doc){
         
         $sth= $this->db->prepare("select year(date) as year, month(date) as month, day(date) as day, hour(date) as hour from booking where id_doctor=:id ");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute(array(":id"=>$id_doc));
        $sth->execute();
        $data=$sth->fetchAll();
    
        echo json_encode($data);
     }
    //function booking($id_doctor,$hour,$day,$month,$year){
    function booking($id_doctor,$hour,$day,$month,$year){
        //Записіваем в базу данніх нужную дату 
        //все резервации 
       $date = "'".$year."-".$month."-".$day." ".$hour.":0:0"."'";
        
      $d=mktime($hour, 0, 0, $month, $day, $year);
       $timestemp =  date("Y-m-d H:i:s", $d);
        
       $id_user = Session::Get("id");
        
 
     //  $sth=  $this->db->prepare("insert into user(login,password,salt) VALUES(:login,:pass,:salt)");
      // $sth->execute(array(':login'=>"niki",':pass'=>"pas",':salt'=> "salt" ));
        
         $sth= $this->db->prepare("insert into booking(date, id_user,id_doctor) VALUES(:date,:id_user,:id_doctor);");
         $sth->execute(array(':date'=> $timestemp,':id_user'=>$id_user,':id_doctor'=>$id_doctor));
        
     echo   $timestemp;
       
    }
}
?>