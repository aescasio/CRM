<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{ asset('/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/js/app.min.js') }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->

{{--<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>--}}

<!-- http://plentz.github.io/jquery-maskmoney/ -->
<script src="{{ asset('/plugins/maskMoney/jquery.maskMoney.js') }}"></script>

<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}"></script>

<script src="{{ asset('/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>

<script src="{{ asset('/plugins/bootstrap-combobox/bootstrap-combobox.js') }}"></script>

<script src="{{ asset('/plugins/bootstrap-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>

<script src="{{ asset('/plugins/daterangepicker/daterangepicker.js') }}"></script>

<!-- bootstrap datepicker -->
<script src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>

<!-- bootstrap time picker -->
<script src="{{ asset('/plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>

{{--<script src="../../plugins/input-mask/jquery.inputmask.extensions.js"></script>--}}
        <!-- bootstrap color picker -->
<script src="{{ asset('/plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>

<!-- Full Calendar 2.9.1 -->
<script src="{{ asset('/plugins/fullcalendar/lib/moment.min.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>--}}
<!-- Full Calendar 2.9.1 -->
<script src="{{ asset('/plugins/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- Full Calendar 2.9.1 dependencies-->
<script src="{{ asset('/plugins/fullcalendar/gcal.js') }}"></script>

<script>
    $(function () {

        $("[money-mask]").maskMoney();
        $("[data-mask]").inputmask();

        $("input").focus(function () {
            $(this).css("background-color", "skyblue");
        });
        $("input").blur(function () {
            $(this).css("background-color", "white");
        });

        $("textarea").focus(function () {
            $(this).css("background-color", "skyblue");
        });
        $("textarea").blur(function () {
            $(this).css("background-color", "white");
        });

        /**
         ** checkbox: same as billing address
         **/
        $("[name='same_as_billing']").on("change", function () {
            if (this.checked) {
                /*
                 $("[name='shipping_address']").val($("[name='biling_address']").val());
                 */
                $("[name='shipping_street']").prop('disabled', true).val("");
                $("[name='shipping_city']").prop('disabled', true).val("");
                $("[name='shipping_state']").prop('disabled', true).val("");
                $("[name='shipping_postal']").prop('disabled', true).val("");
                $("[name='shipping_country']").prop('disabled', true).val("");

            } else {
                /*
                 $("[name='shipping_address']").val("");
                 */
                $("[name='shipping_street']").prop('disabled', false);
                $("[name='shipping_city']").prop('disabled', false);
                $("[name='shipping_state']").prop('disabled', false);
                $("[name='shipping_postal']").prop('disabled', false);
                $("[name='shipping_country']").prop('disabled', false);
            }
        });

        // Flash message 3 secs. delay before it disappear
        $('div.alert').not('.alert-danger').not('.alert-important').delay(3000).slideUp(300);

        $('#findCampaign').on('click','button', function (e) {
            var id = this.id, value = this.value;
            $('#findCampaign').modal('toggle');
            $('#campaign_name').val(value);

        });

        $('.combobox').combobox(); //this class extend bootstrap combobox


        @yield('per_page_script')

    });

    @yield('js_function')
</script>

<style>
    .required:after {
        content: ' *';
        color: red;
        padding-left: 5px;
    }

</style>