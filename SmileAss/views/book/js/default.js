$(function () {
var id_doctor=0;

    $.get('book/xhrGetListings', function (o) {

        //$("#listInserts")
        for (i = 0; i < o.length; i++) {
           // console.log(o[i].id_specialty);
            $("#listInserts").append('<div class ="field" > <a class ="del" rel="' + o[i].specialty + '" id="' + o[i].id_specialty + '">' + o[i].specialty + '</a></div>');
        } //id_specialty, specialty
        addDelClickLis();
    }, 'json'); // смотри файлик book_modeL. Єта функция витягивает список всех консультаций 

    function addDelClickLis() {
        $(".del").click(function () {
            var id = $(this).attr('id');
           

            $(this).parent().siblings().remove();
            $(this).parent().remove();
            $("h1").text("Book ");
            getListDoctor(id);

        });

    }
    function getListDoctor(id) {


        $.get('book/xhrGetListDoctor/' + id, function (o) {//Єта функция витягивает список всех врачей

            //$("#listInserts")
            for (i = 0; i < o.length; i++) {
                //console.log("specialty: " + o[i].id_specialty);
                $("#listInserts").append('<div  class ="field"> <a class ="del" id=' + o[i].id_doctor + ' href="#">' + o[i].first_name + '</a></div>');
            } //id_specialty, specialty
            addDelClickLisDoctor();
        }, 'json');
    }

    function addDelClickLisDoctor() {//Єта функция удаляет список консультаций
        $(".del").click(function () {
            id_doctor = $(this).attr('id');
           
           
            $(this).parent().siblings().remove();
            $(this).parent().remove();
            $("h1").text("Book Appointment");
            getTimeDoctor(id_doctor);

        });


    }

    function getTimeDoctor(id) {
       
        $.get('book/xhrGetTimeList/' + id, function (o) {//віягивает список досутпного времени резервации
            calendar();
            //$("#listInserts")
            for (i = 0; i < o.length; i++) {
                console.log("year: " + o[i].year);
                console.log("month: " + o[i].month);
                console.log("day: " + o[i].day);
                console.log("hour: " + o[i].hour);
                BlockDay(o[i].hour,o[i].day,o[i].month); // hour, day, month
            }
           
        }, 'json');

        
    }
    
    
    
    function calendar(){
        $("#bookingButt").css('visibility','visible');
  

    for (i = 0; i < 3; i++) {
         var x = 1;
        day = new Date(new Date().getTime() + i * 24 * 60 * 60 * 1000);
        var dd = String(day.getDate());
        var mm = String(day.getMonth() + 1);
        var yyyy = day.getFullYear();
        $("#callendar").append("<div  class='day'> " + yyyy + "-" + mm + "-" + dd + " </div>");

        for (j = 0; j < 6; j++) {
            $("#callendar").append("<div dd="+dd+" mm = "+mm+" yyyy="+yyyy+" hour =" + x + " hour =" + x + "  class='cell'> " + x++ + " </div>");
        }

 
    }


    $(".cell").click(function() { //функция вібирает конкретную дату
        $(".selected").removeClass("selected");
        var yyyy= $(this).attr("yyyy");
         var mm = $(this).attr("mm");
        var  dd = $(this).attr("dd");
         var hour = $(this).attr("hour");
       
      $(this).addClass("selected");
        

    });
   
    
   
    
    // new Date("July 27, 1962 23:30:00")  
    // var dd = String(today.getDate());
    // var mm = String(today.getMonth() + 1); //January is 0!
    // var yyyy = today.getFullYear();
    //  var today = new Date(new Date("July 27, 1962 23:30:00").getTime() + day(5));
    // 24 * 60 * 60 * 1000; -> 1 day 
}
    
    function BlockDay(h,d,m){ // функция которая скрівает все уже доступніе
        console.log("blockDay")
       $(".cell").each(function(){
             if (($(this).attr("hour")==h) && 
                 ($(this).attr("dd")==d) &&
                 ($(this).attr("mm")==m) ) 
                 
                 {$(this).css('visibility', 'hidden'); /// <- - 
                  console.log("hiddenn");}
        });
   }
   
             
     $("#bookingButt").click(function(){ 
         day=$(".selected").attr("dd");
         month=$(".selected").attr("mm");
         year=$(".selected").attr("yyyy");
         hour=$(".selected").attr("hour");
         /*
     console.log(day);
     console.log(month); 
     console.log(year); 
     console.log(hour);
     console.log("id_doctor: " +id_doctor);*/
      console.log("last id_doctor: "+id_doctor);
         console.log("heress");
       $.post('book/booking/',{"id_doctor":id_doctor,"day":day, "month":month,"year":year,"hour":hour},function(o){
          console.log();
           console.log();
           console.log();
           console.log();
           
            console.log(":) "+o);
           
           
                   alert("Thanks for booking! You booked a appointment "+year+"/"+month+"/"+day+"/"+hour+" PM ");
           setTimeout( 'location="http://smileass/listOfAppointments";', 200 );
       });
    });
             

});
