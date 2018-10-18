$(document).ready(function(){
    $('.fulfilled, .pending').click(function(e){
      var stausValue;
        switch(this.className){
          case 'fulfilled': stausValue = 1;
          break;
          case 'pending': stausValue = 0;
          break; 
        }
        let trNode = $(this).closest('tr');
        let idVal =  Number(trNode.children("td:nth-child(1)").text());
       $.ajax({
        method: "POST",
        url: "/ww-admin/handlers/formhandle/orders/update-order.php",
        data: { order_status: stausValue, order_id: idVal }
      })
        
        .done(function( msg ) {
            trNode.remove();
        });
     })


     $('.block-customer, .unblock-customer').click(function(e){
      var cstausValue;
      switch(this.className){
        case 'block-customer': cstausValue = 2;
        break;
        case 'unblock-customer': cstausValue = 1;
        break; 
      }
      let trNode = $(this).closest('tr');
      let idVal =  Number(trNode.children("td:nth-child(1)").text());
     $.ajax({
      method: "POST",
      url: "/ww-admin/handlers/formhandle/customers/update-customer.php",
      data: { active_status: cstausValue, customer_id: idVal }
    })
      .done(function( msg ) {
          trNode.remove();
      });
   })


   $('.block-provider, .unblock-provider').click(function(e){
    var cstausValue;
    switch(this.className){
      case 'block-provider': cstausValue = 2;
      break;
      case 'unblock-provider': cstausValue = 1;
      break; 
    }
    let trNode = $(this).closest('tr');
    let idVal =  Number(trNode.children("td:nth-child(1)").text());
   $.ajax({
    method: "POST",
    url: "/ww-admin/handlers/formhandle/providers/update-provider.php",
    data: { active_status: cstausValue, customer_id: idVal }
  })
    .done(function( msg ) {
        trNode.remove();
        //console.log(msg);
    });
 })
    
});