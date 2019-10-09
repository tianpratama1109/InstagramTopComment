<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.js"></script>       
<script type="text/javascript">
var htmlobjek;
$(document).ready(function(){

 $("#category").change(function(){
    var category = $("#category").val();

  $.ajax({
    url : 'include/service.php',
    data  : 'category='+category,
    type  : 'POST',
    dataType: 'html',
    success : function(msg){
               $("#service").html(msg);
          }
  });
  });

  $("#service").change(function(){
    var service = $("#service").val();

  $.ajax({
    url : 'include/min.php',
    data  : 'service='+service,
    type  : 'POST',
    dataType: 'html',
    success : function(msg){
               $("#min").val(msg);
          }
  });

  $.ajax({
    url : 'include/max.php',
    data  : 'service='+service,
    type  : 'POST',
    dataType: 'html',
    success : function(msg){
               $("#max").val(msg);
          }
  });

  $.ajax({
    url : 'include/rate.php',
    data  : 'service='+service,
    type  : 'POST',
    dataType: 'html',
    success : function(msg){
               $("#rate").val(msg);
          }
  });

  $.ajax({
    url : 'include/description.php',
    data  : 'service='+service,
    type  : 'POST',
    dataType: 'html',
    success : function(msg){
               $("#description").val(msg);
          }
  });

  $.ajax({
    url : 'include/price.php',
    data  : 'service='+service,
    type  : 'POST',
    dataType: 'html',
    success : function(msg){
               $("#price").val(msg);
          }
  });
  });

});
</script>