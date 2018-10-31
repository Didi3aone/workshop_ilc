<!--=========== BEGIN CONTACT SECTION ================-->
<section id="contact" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12"> 
                <div class="title_area">
                    <h2 class="title_two">Contact & address</h2>
                    <span></span> 
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="contact_form wow fadeInLeft">
                    <form class="submitphoto_form" id="forms">
                        <input type="text" name="name" id="name" class="wp-form-control wpcf7-text" required placeholder="Your name">
                        <input type="mail" name="email" id="email" class="wp-form-control wpcf7-email" required placeholder="Email address">          
                        <input type="text" name="subject" id="subject" class="wp-form-control wpcf7-text" required placeholder="Subject">
                        <textarea name="content" class="wp-form-control wpcf7-textarea" id="content" cols="30" rows="10" placeholder="What would you like to tell us"></textarea>
                        <button type="button" class="wpcf7-submit button-submited">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="contact_address wow fadeInRight">
                    <h3>Address</h3>
                    <div class="address_group">
                        <?php 
                            $contact = $this->Dynamic_model->set_model("tbl_contact_us")->get_all_data(array(
                                "row_array" => true
                            ))['datas'];
                        ?>
                        <p><?= $contact['cont_address'] ?></p>
                        <p>Phone: <?= $contact['cont_telp']; ?></p>
                        <p>Email: <?= $contact['cont_email']; ?></p>
                    </div>
                    <!-- <div class="address_group">
                        <ul class="footer_social">
                            <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Google+"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="soc_tooltip" title="" data-placement="top" data-toggle="tooltip" data-original-title="Youtube"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========== END CONTACT SECTION ================-->

<!--=========== BEGIN GOOGLE MAP SECTION ================-->
<section id="googleMap">
    <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=200+Lincoln+Ave,+Salinas,+CA,+USA&amp;aq=&amp;sll=30.977609,-95.712891&amp;sspn=42.157377,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=200+Lincoln+Ave,+Salinas,+California+93901-2639&amp;t=m&amp;z=14&amp;ll=36.674837,-121.657691&amp;output=embed"></iframe>
</section>
<!--=========== END GOOGLE MAP SECTION ================