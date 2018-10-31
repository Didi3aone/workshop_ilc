<section id="courseArchive" style="margin-top: 60px;">
    <div class="container">
        <div class="row">
          <!-- start course content -->
         	 <div class="col-lg-8 col-md-8 col-sm-8">
            	<div class="courseArchive_content">
              	<!-- start blog archive  -->
              		<div class="row">
		                <!-- start single blog -->
		                <div class="col-lg-12 col-12 col-sm-12">
		                  	<div class="single_blog">
		                  		<p>
		                  			<?php 
		                  				$deskripsi = str_replace('<img src="../../../', '<img src="', $about['about_desc']);
		                  				echo $deskripsi;
		                  			?>
		                  		</p>
		                  	</div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</section>
