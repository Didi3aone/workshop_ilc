        </div>
    </div>

    <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<!--     <script src="<?php echo base_url() ?>/assets/js/plugin/pace/pace.min.js"></script> -->

    <script> if (!window.jQuery) { document.write('<script src="<?php echo base_url() ?>/assets/js/jquery-1.12.4.min.js"><\/script>');} </script>
    <script> if (!window.jQuery.ui) { document.write('<script src="<?php echo base_url() ?>/assets/js/jquery-ui-1.12.1.min.js"><\/script>');} </script>
    <!-- IMPORTANT: APP CONFIG -->
    <script src="<?php echo base_url(); ?>assets/js/app.config.js"></script>

    <!-- BOOTSTRAP JS -->       
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- JQUERY VALIDATE -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.form.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/sweetalert.min.js"></script>
    <script type="text/javascript">
        runAllForms();
    </script>
     <?php
        if(isset($script_js)) {
            $this->load->view($script_js);
        }
    ?>
    </body>
</html>