  function avt_ad(){
        
       
        
      if( ($("#ifadmin").is(".true")) )
      {
           var admin = Boolean(document.getElementById("ifadmin").className);
          $('.butad').removeClass('disn');
        $('.butad').addClass('disb');
          $('.acreg').addClass('disn');  
      }
      
      if(  ($("#ifavt").is(".true"))  )
        
        {
          var avt = Boolean(document.getElementById("ifavt").className);
              $('.acreg').addClass('disn');           
  }
           
};