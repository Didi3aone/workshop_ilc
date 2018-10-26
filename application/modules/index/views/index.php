<!--=========== BEGIN SLIDER SECTION ================-->
<!-- <section id="slider"> -->
    <div class="row" style="margin-top: 65px;">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      	<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      	<li data-target="#myCarousel" data-slide-to="1"></li>
		      	<li data-target="#myCarousel" data-slide-to="2"></li>
		      	<li data-target="#myCarousel" data-slide-to="3"></li>
		      	<li data-target="#myCarousel" data-slide-to="4"></li>
		      	<li data-target="#myCarousel" data-slide-to="5"></li>
		    </ol>


		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
			    <?php
			    	$page = 1;
	                $slide = $this->Dynamic_model->set_model("tbl_pelatihan")->get_all_data(array(
	                    "conditions" => array("PelatihanIsActive" => STATUS_ACTIVE, "PelatihanPhotoReal !=''" => NULL),
	                    "order_by"   => array("PelatihanId" => "desc"),
	                    "limit"      =>  5
	                ))['datas'];

	                foreach($slide as $key => $val) :
	                    $img   = $val['PelatihanPhotoReal'];
	                    $title = $val['PelatihanTitle'];
	                    $desc  = $val['PelatihanDesc'];
	            ?> 
			    <div class="item <?= ($page <= 1) ? "active" : ""; ?>">
			        <img src="<?= base_url($img); ?>" alt="Chania">
			        <div class="carousel-caption">
			          <h3><?= $title; ?></h3>
			          <p><?= $desc; ?></p>
			          <p><a href="<?= site_url('register'); ?>" class="btn btn-primary" title="">Register</a></p>
			        </div>
			    </div>		  
				<?php 
					$page++; 
					endforeach; 
				?>
		    </div>
		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      	<span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      	<span class="sr-only">Next</span>
		    </a>
		</div>
    </div>
<!-- </section> -->
<!--=========== END SLIDER SECTION ================-->
<!--=========== BEGIN WHY US SECTION ================-->
<section id="whyUs">
    <div class="container">
	    <div class="block"  style="margin-top: 20px;">
	      	<div class="row" style="background-color: #de5f15;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
		        <div class="span4" style="margin-bottom: 40px; margin-left: 10px;">
		          	<img class="img-left" src="http://assets.barcroftmedia.com.s3-website-eu-west-1.amazonaws.com/assets/images/recent-images-11.jpg"/ height="170">
			          <div class="content-heading putih"><h3>Experience &nbsp </h3></div>
			          <p class="putih">Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
			          <p class="putih">Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
			          <p class="putih">Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
			          <a href="" class="btn btn-info" title="">Cara mendaftar</a>
		        </div>
		    </div>
	     	<hr/>
	      	<!-- <div class="row" style="background-color: #4c6d79;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);">
		        <div class="span4"  style="margin-bottom: 40px; margin-left: 10px;">
			        <img class="img-right" src="http://assets.barcroftmedia.com.s3-website-eu-west-1.amazonaws.com/assets/images/recent-images-11.jpg"/ height="170">
			          <div class="content-heading putih"><h3>Experience &nbsp </h3></div>
			          <p class="putih">Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
			          <p class="putih">Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
			          <p class="putih">Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.</p>
			          <a href="" class="btn btn-info" title="">Cara mendaftar</a>
		        </div>
		    </div> -->
	    </div>
	</div>
      <!-- End why us bottom -->
</section>
<!--=========== END WHY US SECTION ================-->
<!--=========== BEGIN OUR TUTORS SECTION ================-->
<section id="ourTutors">
  	<div class="container">
   		<!-- Our courses titile -->
	    <div class="row">
	      	<div class="col-lg-12 col-md-12"> 
	        	<div class="title_area">
	          		<h2 class="title_two">-- MITRA KAMI --</h2>
		          	<span></span> 
		        </div>
		    </div>
	    </div>
        <!-- End Our courses titile -->

        <!-- Start Our courses content -->
        <div class="row">
			<div class="MultiCarousel" data-items="1,3,5,6" data-slide="1" id="MultiCarousel"  data-interval="1000">
	            <div class="MultiCarousel-inner">
	                <div class="item">
	                    <div class="pad15">
	                        <img src="<?= base_url(); ?>assets/frontend/img/notice.jpg" alt="" class="img-responsive">
	                    </div>
	                </div>
	                <div class="item">
	                    <div class="pad15">
	                        <img src="<?= base_url(); ?>assets/frontend/img/notice.jpg" alt="" class="img-responsive">
	                    </div>
	                </div>
	            </div>
	            <button class="btn btn-primary leftLst"><</button>
	            <button class="btn btn-primary rightLst">></button>
	        </div>
		</div>
        <!-- End Our courses content -->
    </div>
</section>
<!--=========== END OUR TUTORS SECTION ================-->
    