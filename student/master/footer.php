</div> <!-- container -->

</div> <!-- content -->
</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->
</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="../../res/assets/js/jquery.min.js"></script>
<script src="../../res/assets/js/bootstrap.min.js"></script>
<script src="../../res/assets/js/detect.js"></script>
<script src="../../res/assets/js/fastclick.js"></script>
<script src="../../res/assets/js/jquery.blockUI.js"></script>
<script src="../../res/assets/js/waves.js"></script>
<script src="../../res/assets/js/jquery.slimscroll.js"></script>
<script src="../../res/assets/js/jquery.scrollTo.min.js"></script>
<script src="../../res/plugins/switchery/switchery.min.js"></script>
<script src="../../res/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../res/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="../../res/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="../../res/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="../../res/plugins/datatables/jszip.min.js"></script>
<script src="../../res/plugins/datatables/pdfmake.min.js"></script>
<script src="../../res/plugins/datatables/vfs_fonts.js"></script>
<script src="../../res/plugins/datatables/buttons.html5.min.js"></script>
<script src="../../res/plugins/datatables/buttons.print.min.js"></script>
<script src="../../res/plugins/datatables/dataTables.fixedHeader.min.js"></script>
<script src="../../res/plugins/datatables/dataTables.keyTable.min.js"></script>
<script src="../../res/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="../../res/plugins/datatables/responsive.bootstrap.min.js"></script>
<script src="../../res/plugins/datatables/dataTables.scroller.min.js"></script>
<script src="../../res/plugins/datatables/dataTables.colVis.js"></script>
<script src="../../res/plugins/datatables/dataTables.fixedColumns.min.js"></script>

<script src="../../res/plugins/moment/moment.js"></script>
<script src="../../res/plugins/timepicker/bootstrap-timepicker.js"></script>
<script src="../../res/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script src="../../res/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
<script src="../../res/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../../res/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- App js -->
<script src="../../res/assets/js/jquery.core.js"></script>
<script src="../../res/assets/js/jquery.app.js"></script>

<script>
        jQuery(document).ready(function () {
            jQuery('#duration').timepicker({
                minuteStep: 20,
                showMeridian: false,
                defaultTime: "1:00"
            });
        });

        $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        timePickerIncrement: 20,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        },
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-success',
        cancelClass: 'btn-default',
        minDate: moment(),
        maxDate: moment().add(2, 'days')
    });
</script>

</body>

</html>