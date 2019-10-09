$(document).ready(function(){
    $("form#loginform").submit(function () {
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
            $("#btn-login8").html('<i class="fa fa-paper-plane-o"></i> Suntik');
            if(hasil.result){
              window.location.replace(hasil.redirect);
              $("#salsakp8").html(hasil.content);
            }else
              $("#salsakp8").html(hasil.content);
            },error: function (a, b, c) {
              $("input").removeAttr("disabled", "disabled");
              $("button").removeAttr("disabled", "disabled");
              $("#btn-login8").html('<i class="fa fa-paper-plane-o"></i> Suntik');
              $("#salsakp8").html(c);
            },beforeSend:function() {
              $("input").attr("disabled", "disabled");
              $("#btn-login8").html('<i class="fa fa-spinner fa-spin" style="font-size:20px"></i> Loading..');
              $("#salsakp8").html('');
              $("button").attr("disabled", "disabled");
            }
        });
          return false
          });});
          
$(document).ready(function(){
    $("form#formlikekomen").submit(function () {
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
            $("#btn-login9").html('<i class="fa fa-paper-plane-o"></i> Suntik');
            if(hasil.result){
              window.location.replace(hasil.redirect);
              $("#salsakp9").html(hasil.content);
            }else
              $("#salsakp9").html(hasil.content);
            },error: function (a, b, c) {
              $("input").removeAttr("disabled", "disabled");
              $("button").removeAttr("disabled", "disabled");
              $("#btn-login9").html('<i class="fa fa-paper-plane-o"></i> Suntik');
              $("#salsakp9").html(c);
            },beforeSend:function() {
              $("input").attr("disabled", "disabled");
              $("#btn-login9").html('<i class="fa fa-spinner fa-spin" style="font-size:20px"></i> Loading..');
              $("#salsakp9").html('');
              $("button").attr("disabled", "disabled");
            }
        });
          return false
          });});