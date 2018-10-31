<!--=========== BEGIN FOOTER SECTION ================-->
<footer id="footer">
    <!-- Start footer top area -->
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-ld-3  col-md-3 col-sm-3">
                    <div class="single_footer_widget">
                        <img src="<?= base_url(); ?>assets/frontend/img/ilc.jpeg" alt="logo" class="img-res">
                        <p>
                            <?php 
                            $contact = $this->Dynamic_model->set_model("tbl_contact_us")->get_all_data(array(
                                "row_array" => true
                            ))['datas'];
                        ?>
                            <p><?= $contact['cont_address'] ?></p>
                            <p>Phone: <?= $contact['cont_telp']; ?></p>
                            <p>Email: <?= $contact['cont_email']; ?></p>
                        </p>
                    </div>
                </div>

                <div class="col-ld-3  col-md-3 col-sm-3">
                    <div class="single_footer_widget">
                        <h3>Tautan</h3>
                        <ul class="footer_widget_nav">
                          <li><a href="<?= site_url('about'); ?>">Tentang Kami</a></li>
                          <li><a href="<?= site_url('syarat-ketentuan'); ?>">Syarat & Ketentuan</a></li>
                          <li><a href="<?= site_url('tutorial-pembayaran'); ?>">Panduan Pembayaran</a></li>
                          <li><a href="<?= site_url('tutorial-pendaftaran'); ?>">Cara Daftar</a></li>
                          <li><a href="<?= site_url('contact-us'); ?>">Hubungi Kami</a></li>
                          <li><a href="#">Karir</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3  col-md-3 col-sm-3"></div>
                <div class="col-lg-3  col-md-3 col-sm-3">
                    <div class="single_footer_widget">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="single">
                                    <h3 style="color: white;">Opening Hours</h3>
                                        <p style="color: white;">Senin - Jumat : 8.00 am - 20.00 pm
                                        Sabtu : 8.00 am - 18.00 pm<br/>
                                        Minggu : Tutup</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <div class="row">
                <div class="col-ld-3  col-md-3 col-sm-3">
                    <div class="single_footer_widget">
                        <h4 style="color: white;">Metode Pembayaran</h4>
                        <?php 
                            $payment = $this->Dynamic_model->set_model('tbl_payment')->get_all_data()['datas'];

                            foreach($payment as $img) :
                        ?>
                            <img src="<?= base_url($img['payment_image']); ?>" class="img-responsive" style="height: 40px;">
                        <?php endforeach; ?>
                    </div>
                </div><br>

                <div class="col-ld-3  col-md-3 col-sm-3">
                    <div class="single_footer_widget">
                        <h3>Ikuti Kami</h3>
                        <ul class="footer_social">
                            <li><a data-toggle="tooltip" data-placement="top" title="Facebook" class="soc_tooltip" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a data-toggle="tooltip" data-placement="top" title="Twitter" class="soc_tooltip"  href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a data-toggle="tooltip" data-placement="top" title="Google+" class="soc_tooltip"  href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a data-toggle="tooltip" data-placement="top" title="Linkedin" class="soc_tooltip"  href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a data-toggle="tooltip" data-placement="top" title="Youtube" class="soc_tooltip"  href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3  col-md-3 col-sm-3"></div>

                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="col-sm-12">
                        <div class="single">
                            <i style="color:white;">Newsletter</i>
                            <div class="input-group">
                                <input type="email" id="email" class="form-control td-inputan" placeholder="Enter your email">
                                 <span class="input-group-btn">
                                     <button type="button" class="btn btn-danger btn-subcribe">Subscribe</button>
                                 </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer top area -->
    <!-- Start footer bottom area -->
    <div class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_bootomLeft">
                        <p style="color: white;"> Copyright &copy; All Rights Reserved</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="footer_bootomRight">
                        <!-- <p>Designed by <a href="http://wpfreeware.com/" rel="nofollow">Wpfreeware.com</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer bottom area -->
</footer>
<!--=========== END FOOTER SECTION ================--> 
    <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="<?= base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery-ui-1.12.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap-notify.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/sweetalert.min.js"></script>
    <!-- Preloader js file -->
    <script src="<?= base_url(); ?>assets/frontend/js/queryloader2.min.js" type="text/javascript"></script>
    <!-- For smooth animatin  -->
    <script src="<?= base_url(); ?>assets/frontend/js/wow.min.js"></script>  
    <!-- slick slider -->
    <script src="<?= base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables/dataTables.tableTools.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/datatable-responsive/datatables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/slick.min.js"></script>
    <!-- superslides slider -->
    <script src="<?= base_url(); ?>assets/frontend/js/jquery.easing.1.3.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/jquery.circliful.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/jquery.animate-enhanced.min.js"></script>
    <script src="<?= base_url(); ?>assets/frontend/js/jquery.superslides.min.js" type="text/javascript" charset="utf-8"></script>   
    <!-- for circle counter -->
   <!--  <script src='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js'></script> -->
    <!-- Gallery slider -->
    <script type="text/javascript" language="javascript" src="<?= base_url(); ?>assets/frontend/js/jquery.tosrus.min.all.js"></script>   
   
    <!-- Custom js-->
    <script src="<?= base_url(); ?>assets/frontend/js/custom.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/moment.js"></script>
    <script src="<?php echo base_url() ?>assets/js/plugins/bootstrap-daterangepicker-master/daterangepicker.js"></script>
    <script src="<?php echo base_url() ?>assets/js/global.js"></script>
    <script src="<?php echo base_url() ?>assets/js/global.js"></script>
    <?php $this->load->view("layout/footers/javascript/script_js"); ?>
    <!--=============================================== 
    Template Design By WpFreeware Team.
    Author URI : http://www.wpfreeware.com/
    ====================================================-->
    <?php 
        if(isset($script_js)) {
            $this->load->view($script_js);
        }
    ?>
  </body>
</html>