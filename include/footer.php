        </div>
    </div>
    <script src="assets/sinambela.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/wildan.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/vendor/metisMenu/metisMenu.min.js"></script>
    <script src="assets/vendor/raphael/raphael.min.js"></script>
    <script src="assets/vendor/morrisjs/morris.min.js"></script>
    <script src="assets/data/morris-data.js"></script>
    <script src="assets/dist/js/sb-admin-2.js"></script>
    <script src="anu.js"></script>
    <script type="text/javascript">
function send()
{
        showloading();
  var service = $('#service').val();
  var link = $('#link').val();
  var jumlah = $('#jumlah').val();
  $.ajax({
    url : 'content/new-order-act.php',
    data  : 'service='+service+'&link='+link+'&jumlah='+jumlah,
    type  : 'POST',
    dataType: 'html',
    success : function(msg){
hideloading();
               $("#result").prepend(msg).show("slow");
          }
  });
}

function getcut(quantity){
 var rate = $("#rate").val();
 var hasil = eval(quantity) * rate;
 $('#cutbalance').val(hasil);
} 

function getbal(quantity){
var method = $("#method").val();

 if (method== "BANK"){
  var hasil = eval(quantity);
  $('#getbalance').val(hasil);

 } else if (method== "BANK DENNY BRI"){
  var hasil = eval(quantity);
  $('#getbalance').val(hasil);
 } else if (method== "PULSA"){
  var hasil = eval(quantity);
  $('#getbalance').val(hasil);
 } else if (method== "PULSA SALMAN"){
  var hasil = eval(quantity);
  $('#getbalance').val(hasil);
 } else if (method== "PULSA DENNY"){
  var hasil = eval(quantity);
  $('#getbalance').val(hasil);
 } else if (method== "PULSA ARDHI"){
  var hasil = eval(quantity); 
  $('#getbalance').val(hasil);
 }

}

</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
