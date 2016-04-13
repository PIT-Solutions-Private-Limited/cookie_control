jQuery(document).ready(function(){
    	  jQuery('#cctoggle').on('click',function(){
    	  	if(document.getElementById('cchide-popup').checked){
    	  		CookieControl.setCookie('civicShowCookieIcon', 'no');$('#ccc-icon').hide()
    	  	}
    		 if(jQuery(this).attr('class') == 'cctoggle-on'){
    			 jQuery.ajax({
                     url: 'index.php',
                     type: "POST",
                     data: {
                             eID: 'cookieDelete',
                             action: 'main',                            
                             parameters: ({
                                 'in':2
                         })
                     },
                     success: function(data) {
                        //alert(data);
                     	CookieControl.reset();
                     	setTimeout(function(){window.location.reload()}, 500);
                     }
             });
    			
    		 }else{ 
    			 jQuery.ajax({
                     url: 'index.php',
                     type: "POST",
                     data: {
                             eID: 'cookieDelete',
                             action: 'main',                              
                             parameters: ({
                                     'in': 1
                             })
                     },
                     success: function(data) {
 						//alert(data);
                     }
             });
    		 }
    		 return false;
    	  });
    	 jQuery('#cookie_enable').bind('click',function(){
    		  CookieControl.setCookie('civicShowCookieIcon', 'yes');
    		  $('#cccwr').show();
        	  $('#ccc-icon').show();
    	  });
    	  
    	  setTimeout(function(){
    		  $('#cccwr').hide()
        	  $('#ccc-icon').hide()
          },300000) ;
});
