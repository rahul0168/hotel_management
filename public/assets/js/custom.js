$(function() {
  //var checkoutdate = $('#checkoutdate').getDate();
  $('.btn').click(function() {

   var checkoutdate = new Date($('#checkoutdate').val());
   var checkindate = new Date($('#checkindate').val());

   var diffTime = Math.abs(checkindate -  checkoutdate);
   var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
   var price = diffDays * 500 ;

   document.getElementById("days").value = diffDays;
   document.getElementById("price").value = price;
    //alert(price);
  });
});

	$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
     

    var maxDate = year + '-' + month + '-' + day;
    
    //alert(maxDate);
    $('#checkindate').attr('min', maxDate);
   // $('#checkoutdate').attr('min', maxDate);
});

//   var tomorrow = new Date();
// tomorrow.setDate(new Date().getDate()+1);

$(function(){
    var tomorrow = new Date();
tomorrow.setDate(new Date().getDate()+1);

    var month = tomorrow.getMonth() + 1;
    var day = tomorrow.getDate() ;
    var year = tomorrow.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
     

    var maxDate = year + '-' + month + '-' + day;
    
    //alert(maxDate);
    //$('#checkindate').attr('min', maxDate);
    $('#checkoutdate').attr('min', maxDate);
});