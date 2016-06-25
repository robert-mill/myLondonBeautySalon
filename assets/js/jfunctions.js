/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
    $("#usFl").text("");
   $(".addImgBtn").hide();
   $(".subNav").on("click", function(){
       var thisId = $(this).attr("id").replace(/ /g,'');
      // $(".container").children("row").hide();
       window.location.replace("http://www.mylondonbeautysalon.co.uk/Services/getService/"+thisId);
       
       /*var topps = $(".subNav").offset().top-=75;
        $('html,body').animate({
        scrollTop:topps 
        },'fast');
        */
    
   }); 
   
   
   $(".addImgBtn").on("click", function(e){
      
      var errorMsg = $("#errorMsg").text();
       if(errorMsg){
            $(".frmSubmitBtn").show(); 
            $(".frmSubmitBtn").css("display","block");
            $(".addImgBtn").hide();
        }else{
        }
         e.preventDefault();
   });
   $(".frmSubmitBtn").on("click", function(e){
        var errorMsg = $("#errorMsg").text();
        if(!errorMsg){
            $(".addImgBtn").show(); 
            $(".addImgBtn").css("display","block");
            $(".frmSubmitBtn").hide();
            
        }else{
            $(".frmSubmitBtn").show(); 
            $(".frmSubmitBtn").css("display","block");
            $(".addImgBtn").hide();
        }
     
   });
});


