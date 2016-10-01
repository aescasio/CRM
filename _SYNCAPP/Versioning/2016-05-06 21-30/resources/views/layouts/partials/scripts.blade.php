<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>ci
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<!-- http://plentz.github.io/jquery-maskmoney/ -->
<script src="{{ asset('/plugins/maskMoney/jquery.maskMoney.js') }}"></script>


<script>
    $(function(){

        $("[money-mask]").maskMoney();
        //Date picker
        $('#dpStartDate').datepicker({
            autoclose: true
        });
        $('#dpEndDate').datepicker({
            autoclose: true
        });

        $("input").focus(function(){
            $(this).css("background-color","skyblue");
        });
        $("input").blur(function(){
            $(this).css("background-color","white");
        });

        $("textarea").focus(function(){
            $(this).css("background-color","skyblue");
        });
        $("textarea").blur(function(){
            $(this).css("background-color","white");
        });

    });
</script>