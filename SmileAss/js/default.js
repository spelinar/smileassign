$(function() {
    
     
    
    
     $.get('dashboard/xhrGetListings',function(o){  
            //$("#listInserts")
            for( i =0 ; i< o.length;i++){
                $("#listInserts").append("<div  >"+o[i].text +  ' <a class ="del" rel="'+o[i].id+'" href="#">x</a></div>');
            }
           addDelClickLis();
        },'json'); 
    
   
    
    $("#randomInsert").submit(function(){

        var url = $(this).attr("action");
        
        var data = $(this).serialize();
        
        $.post(url,data,function(o){
             $("#listInserts").append("<div>"+o.text +  '<a class ="del" rel="'+o.id+'" href="#">x</a></div>');
        
            
             addDelClickLis();
            
        },'json');
       
        return false;
    });
    
    
    function addDelClickLis(){
    $(".del").click(function(){
        
       $.post("dashboard/xhrDel",{'id' : $(this).attr("rel")},function(){
            
           
        },'json');
        $(this).parent().remove();
    
    });
       
       
     }
  
    
    
    
});