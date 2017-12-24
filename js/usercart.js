$(document).ready(function(data){

	$('.addtocart').click(function(){

		var product_value = $(this).attr("id");

		var product_id = product_value.split("_"); 

        var product_name = $('#Name'+product_id[product_id.length-1]).text(); 

        var product_price = $('#Price'+product_value).text(); 

        var product_quantity = 1;

        var rest_id = $('#shoppingrest').val();
        

        var action = "add";

        		$.ajax({  
                    url:"action.php",  
                    method:'POST',  
                    dataType:'json',
                    data:{  
                        product_id:product_value,   
                        product_name:product_name,   
                        product_price:product_price,
						            product_quantity:product_quantity,
                        rest_id:rest_id,
                        action:action  
                    },  
                    success:function(data)  
                     {  
                     	//alert("Product has been Added into Cart");
                     	$('#order_table').html(data.order_table);
                     },
    				error: function (jqXHR, exception) {
				        var msg = '';
				        if (jqXHR.status === 0) {
				            msg = 'Not connect.\n Verify Network.';
				        } else if (jqXHR.status == 404) {
				            msg = 'Requested page not found. [404]';
				        } else if (jqXHR.status == 500) {
				            msg = 'Internal Server Error [500].';
				        } else if (exception === 'parsererror') {
				            msg = 'Requested JSON parse failed.';
				        } else if (exception === 'timeout') {
				            msg = 'Time out error.';
				        } else if (exception === 'abort') {
				            msg = 'Ajax request aborted.';
				        } else {
				            msg = 'Uncaught Error.\n' + jqXHR.responseText;
				        }
				        alert(msg);
   				 },  
            
        });  
		
		});

	$(document).on('click', '.deletefromcart', function(){  
           var product_id = $(this).attr("id");  
           var action = "remove";  
           var rest_id = $('#shoppingrest').val();

           if(confirm("Are you sure you want to remove this product?"))  
           {  
                $.ajax({  
                     url:"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{
                      product_id:product_id,
                      action:action,
                      rest_id:rest_id
                    },  
                     success:function(data){  
                          $('#order_table').html(data.order_table);    
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
    });

    $(document).on('input', '.quantity', function(){  

      //alert($(this).val());

          var quantity_id = $(this).attr("id");  

          var temp = quantity_id.split(".");

          var product_id = temp[temp.length-1];

           var quantity = $(this).val();  

           var action = "quantity_change"; 

           var rest_id = $('#shoppingrest').val();

           if(quantity != '')  
           {  
                $.ajax({  
                     url :"action.php",  
                     method:"POST",  
                     dataType:"json",  
                     data:{
                      product_id:product_id,
                      quantity:quantity,
                      action:action,
                      rest_id:rest_id},  
                     success:function(data){  
                          $('#order_table').html(data.order_table);  
                     },
                     error: function (jqXHR, exception) {
                      var msg = '';
                      if (jqXHR.status === 0) {
                          msg = 'Not connect.\n Verify Network.';
                      } else if (jqXHR.status == 404) {
                          msg = 'Requested page not found. [404]';
                      } else if (jqXHR.status == 500) {
                          msg = 'Internal Server Error [500].';
                      } else if (exception === 'parsererror') {
                          msg = 'Requested JSON parse failed.';
                      } else if (exception === 'timeout') {
                          msg = 'Time out error.';
                      } else if (exception === 'abort') {
                          msg = 'Ajax request aborted.';
                      } else {
                          msg = 'Uncaught Error.\n' + jqXHR.responseText;
                      }
                      alert(msg);
                      },
                });  
           }  
    }); 
});
