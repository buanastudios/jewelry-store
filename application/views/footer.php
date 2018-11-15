    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
    <!-- jQuery from vendor.arthipesa.com -->
    <script src="<?php echo VENDORPATH.'/jQuery/jquery-3.1.0.min.js?rand='.mt_rand(); ?>" type="text/javascript" crossorigin="anonymous"></script>

    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>    
     -->
     <script src="<?php echo base_url('vendor/fezvrasta/popperjs/dist/umd/popper.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
     <script src="<?php echo base_url('vendor/fezvrasta/tooltipjs/dist/umd/tooltip.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo base_url('vendor/twbs/bootstrap/dist/js/bootstrap.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>-->
    <!--Wenzhixin JS -->
    <?php if (isset($wenzhixin) && ($wenzhixin==true)){ ?>
    <script src="<?php echo base_url('vendor/wenzhixin/bootstrap-table/dist/bootstrap-table.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <?php } ?>
    <!-- Bootstrap Toggle -->
    <script src="<?php echo VENDORPATH.'/bootstrap-toggle/js/bootstrap2-toggle.js?rand='.mt_rand(); ?>" type="text/javascript"></script>        
    <!-- Bootstrap-select -->
    <script src="<?php echo VENDORPATH.'/bootstrap-select/dist/js/bootstrap-select.js?rand='.mt_rand(); ?>" type="text/javascript"></script>                  
    
    <!-- Sparkline -->
    <script src="<?php echo VENDORPATH.'/sparkline/jquery.sparkline.min.js?rand='.mt_rand(); ?>" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?php echo VENDORPATH.'/jvectormap/jquery-jvectormap-1.2.2.min.js?rand='.mt_rand(); ?>" type="text/javascript"></script>
    <script src="<?php echo VENDORPATH.'/jvectormap/jquery-jvectormap-world-mill-en.js?rand='.mt_rand(); ?>" type="text/javascript"></script>
    <!-- SELECT2 JS -->
    <script src="<?php echo base_url('vendor/select2/select2/dist/js/select2.full.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <!-- Moment JS -->
    <script src="<?php echo base_url('vendor/moment/moment/moment.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/moment/moment/min/moment-with-locales.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <!-- Numeral JS -->
    <script src="<?php echo base_url('vendor/adamwdraper/Numeral-js/numeral.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/adamwdraper/Numeral-js/locales.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    
    <!--numbers-to-words-rupiah-->
    <script src="<?php echo base_url('vendor/numbers-to-words-rupiah/index.js').'?rand='.mt_rand();?>" type="text/javascript"></script>

    <!-- Flot JS -->
    <script src="<?php echo base_url('vendor/flot/jquery.flot.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/flot/jquery.flot.time.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/flot/jquery.flot.selection.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/flot/jquery.flot.resize.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/flot/jquery.flot.pie.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/flot/jquery.flot.categories.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <script src="<?php echo base_url('vendor/components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js').'?rand='.mt_rand();?>" type="text/javascript" charset="UTF-8"></script>
    <script src="<?php echo base_url('vendor/pnikolov/bootstrap-daterangepicker/js/daterangepicker.min.js').'?rand='.mt_rand();?>" type="text/javascript" charset="UTF-8"></script>
    
    <!--WEB GETUSERMEDIA
    <script src="<?php echo base_url('vendor/getUserMedia/dist/getUserMedia.js').'?rand='.mt_rand();?>" type="text/javascript"></script>-->
    <!-- WEBCAMJS -->
    <script src="<?php echo base_url('vendor/grimmlink/webcamjs/webcam.min.js').'?rand='.mt_rand();?>" type="text/javascript"></script>

    <!--arthipesa config-->
    <script src="<?php echo base_url('assets/js/config.js').'?rand='.mt_rand();?>" type="text/javascript"></script>    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });            

            $("select").select2(
               {
                    theme: "bootstrap"
               } 
            );
        });

        // Find the right method, call on correct element
        // function launchFullScreen(element) {            
        //   if(element.requestFullScreen) {
        //     element.requestFullScreen();
        //   } else if(element.mozRequestFullScreen) {
        //     element.mozRequestFullScreen();
        //   } else if(element.webkitRequestFullScreen) {
        //     element.webkitRequestFullScreen();
        //   }
        // }

        // Launch fullscreen for browsers that support it!
        // launchFullScreen(document.documentElement); // the whole page
    </script>
    <!--sidebar config-->
    <script src="<?php echo base_url('assets/js/sidebar.js').'?rand='.mt_rand();?>" type="text/javascript"></script>
    <!-- Our Custom JS -->
    <script src="<?php echo base_url('assets/js/').$js.'?rand='.mt_rand();?>" crossorigin="anonymous"></script>    
</body>

</html>
