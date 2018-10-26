</div> 
<!-- PAGE FOOTER -->
    <?php 
        $_dm = $this->Dynamic_model->set_model("tbl_change_log","tcl","change_log_id")->get_all_data(array(
            "row_array" => true,
            // "debug"     => true,
            "order_by"  => array("change_log_id" => "desc"),
            "limit"     => 1
        ))['datas'];
        // pr($_dm);exit;
    ?>
    <div class="page-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <span class="txt-color-white"> - CMS <a href="<?= site_url('change_log'); ?>" target="_blank" style="color: white;"><?= $_dm['change_log_curr_version']; ?> </a>© <?php echo date('Y'); ?></span>
            </div>
        </div>
    </div>
    <!-- END PAGE FOOTER --> 
        <div id="shortcut">
            <ul>
                <li>
                    <a href="<?= site_url('manager/user/change_password') ?>" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-key fa-4x"></i> <span>Change Password </span> </span> </a>
                </li>
                <li>
                    <a href="<?= site_url('manager/user/profile') ?>" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>Change Profile </span> </span> </a>
                </li>
            </ul>
        </div>
        <!-- END SHORTCUT AREA -->

        <!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)
        <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>-->


        <!-- #PLUGINS -->
        <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local-->
        <script src="<?php echo base_url() ?>assets/js/jquery-1.12.4.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/jquery-ui-1.12.1.min.js"></script>

        <!-- IMPORTANT: APP CONFIG -->
        <script src="<?php echo base_url() ?>assets/js/app.config.seed.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/smartwidgets/jarvis.widget.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery-touch/jquery.ui.touch-punch.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/sweetalert.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/SmartNotification.min.js"></script>

        <!-- form and validate js -->
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery.form.min.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/jquery.validate.min.js"></script>

        <!-- daterange picker -->
        <script src="<?php echo base_url() ?>assets/js/plugins/moment.js"></script>
        <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-daterangepicker-master/daterangepicker.js"></script>

        <!-- select 2 -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/plugins/bootstrap-daterangepicker-master/daterangepicker.css">

        <!--[if IE 8]>
            <h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
        <![endif]-->

        <!-- MAIN APP JS FILE -->
        <script src="<?php echo base_url() ?>assets/js/app.js"></script>
        <script src="<?php echo base_url() ?>assets/js/global.js"></script>
        <!-- end plugin -->
        <!-- for script javascript -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
        <?php $this->load->view("layout/footers/javascript"); ?>
    </body>
</html>
