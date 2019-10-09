$(document).ready(function(){
    $("form#loginform").submit(function () {
      if($('#data').val().length>1||$('#quantity').val.length>1){
        var pdata = $(this).serialize();
        var purl = $(this).attr('action');
        $.ajax({
          url:purl,
          data:pdata,
          timeout:false,
          type:'POST',
          dataType:'JSON',
          success:function(hasil){
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login8").attr("disabled", "disabled");
            $("#btn-login8").html('<i class="fa fa-shopping-cart"></i> Order Sukses');
            if(hasil.result){
              window.location.replace(hasil.redirect);
              $("#salsakp8").html(hasil.content);
            }else
              $("#salsakp8").html(hasil.content);
            },error: function (a, b, c) {
              $("input").removeAttr("disabled", "disabled");
              $("button").removeAttr("disabled", "disabled");
              $("#btn-login8").html('<i class="fa fa-shopping-cart"></i> Order Sekarang');
              $("#salsakp8").html(c);
            },beforeSend:function() {
              $("input").attr("disabled", "disabled");
              $("#btn-login8").html('<i class="fa fa-spinner fa-spin"></i> Loading..');
              $("#salsakp8").html('');
              $("button").attr("disabled", "disabled");
            }
        });
      }
          return false
          });});
          
          
          $(document).ready(function(){
    $("form#addvip").submit(function () {
      if($('#user').val().length>2||$('#jumlah').val.length>0||$('#durasi').val.length>0){
        var pdata = $(this).serialize();
        var purl = $(this).attr('action');
        $.ajax({
          url:purl,
          data:pdata,
          timeout:false,
          type:'POST',
          dataType:'JSON',
          success:function(hasil){
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login2").html('<i class="fa fa-paper-plane-o"></i> Submit');
            if(hasil.result){
              window.location.replace(hasil.redirect);
              $("#salsakp2").html(hasil.content);
            }else
              $("#salsakp2").html(hasil.content);
            },error: function (a, b, c) {
              $("input").removeAttr("disabled", "disabled");
              $("button").removeAttr("disabled", "disabled");
              $("#btn-login2").html('<i class="fa fa-paper-plane-o"></i> Submit');
              $("#salsakp2").html(c);
            },beforeSend:function() {
              $("input").attr("disabled", "disabled");
              $("#btn-login2").html('<i class="fa fa-spinner fa-spin" style="font-size:20px"></i> Loading..');
              $("#salsakp2").html('');
              $("button").attr("disabled", "disabled");
            }
        });
      }
          return false
          });});
          
          
          $(document).ready(function(){
    $("form#logintkn").submit(function () {
      if($('#token').val().length>3){
        var pdata = $(this).serialize();
        var purl = $(this).attr('action');
        $.ajax({
          url:purl,
          data:pdata,
          timeout:false,
          type:'POST',
          dataType:'JSON',
          success:function(hasil){
            $("input").removeAttr("disabled", "disabled");
            $("button").removeAttr("disabled", "disabled");
            $("#btn-login87").html('<i class="fa fa-paper-plane-o"></i> Masuk');
            if(hasil.result){
              window.location.replace(hasil.redirect);
              $("#salsakp87").html(hasil.content);
            }else
              $("#salsakp87").html(hasil.content);
            },error: function (a, b, c) {
              $("input").removeAttr("disabled", "disabled");
              $("button").removeAttr("disabled", "disabled");
              $("#btn-login87").html('<i class="fa fa-paper-plane-o"></i> Masuk');
              $("#salsakp87").html(c);
            },beforeSend:function() {
              $("input").attr("disabled", "disabled");
              $("#btn-login87").html('<i class="fa fa-spinner fa-spin" style="font-size:20px"></i> Loading..');
              $("#salsakp87").html('');
              $("button").attr("disabled", "disabled");
            }
        });
      }
          return false
          });});