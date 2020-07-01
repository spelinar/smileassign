$(function() {
  /*[{"date":"2020-01-21 02:00:00","first_name":"Mary","second_name":"Elizabeth","specialty":"Consultation"},{"date":"2020-01-21 06:00:00","first_name":"Mary","second_name":"Elizabeth","specialty":"Consultation"},{"date":"2020-01-22 04:00:00","first_name":"Mary","second_name":"Elizabeth","specialty":"Consultation"},{"date":"2020-01-21 04:00:00","first_name":"Li","second_name":"Xiao","specialty":"Consultation"},{"date":"2020-01-23 05:00:00","first_name":"Li","second_name":"Xiao","specialty":"Consultation"},{"date":"2020-01-21 04:00:00","first_name":"Igor","second_name":"Romanowicz","specialty":"Tooth Pain"}]
  */
    
    $.get('listOfAppointments/XHRgetBookingList',function(o){  
        //alert((o[0].date).substr(0, 13)+"PM");
            //$("#listInserts")
            for( i =0 ; i< o.length;i++){
                $("#listInserts").append(" <div class ='card'> <div> <h2>"+o[i].specialty + "</h2> </div>" +
               "<div> <h4>"+o[i].date + '</h4> </div>' +
               "<div> <h4>"+o[i].first_name +" "+o[i].second_name+ '</h4> </div> </div>');
             
            }
          
        },'json'); 
    
    
});


