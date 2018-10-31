<?php 
	$photo  = $datas['PelatihanPhotoReal'];
	$title  = $datas['PelatihanTitle'];
	$lokasi = $datas['PelatihanLokasi'];
	$start  = $datas['PelatihanStartDate'];
	$end    = $datas['PelatihanEndDate'];
	$detail = $datas['PelatihanDesc'];
	$biaya  = $datas['PelatihanBiaya'];


	$start_date = date('d',strtotime($start));
	$end_date   = date('d', strtotime($end));

	$month   = date('M',strtotime($start));

?>
<style type="text/css" media="screen">
	#imgBanner {
	  background-image: url("../..<?= ($photo); ?>");
	  background-repeat: no-repeat;
	  background-size: 100% 100%;
	  display: inline;
	  float: left;
	  height: 300px;
	  margin-top: 77px;
	  padding: 118px 0;
	  text-align: center;
	  width: 100%;
	}
</style>
<section id="imgBanner">
</section>
<!--=========== BEGIN COURSE BANNER SECTION ================-->
<section id="courseArchive">
	<div class="container">
		<div class="row">
			<!-- start course content -->
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="courseArchive_content">              
					<!-- <div class="singlecourse_ferimg_area">
						<div class="singlecourse_ferimg">
							<img src="img/course-single.jpg" alt="img">
						</div>  
						<div class="singlecourse_bottom">
							<h2>Introduction To Matrix</h2>
							<span class="singlecourse_author">
								<img alt="img" src="img/author.jpg">
								Richard Remus, Teacher
							</span>
							<span class="singlecourse_price">$20</span>
						</div>
					</div> -->
					<div class="single_course_content">
						<h2><?= $title; ?></h2>
						<p><?= $detail; ?>.</p>
						<table class="table table-striped course_table">
							<thead>
								<tr>          
									<th>Workshop</th>
									<th>Lokasi</th>
									<th>Tanggal</th>
									<th>Biaya</th>
								</tr>
							</thead>
							<tbody>
								<tr>          
									<td><?= $title; ?></td>
									<td><?= $lokasi; ?></td>
									<td><?= ($end) ? $start_date." to ".$end_date. " ".$month : $start; ?></td>
									<td><?= $biaya; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
					<!-- start related course -->
					<div class="related_course">
						<h2>More Workshop</h2>
						<div class="row">
							<?php 
								foreach($other as $key => $val):
							?>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="single_course wow fadeInUp" >
									<div class="singCourse_imgarea">
										<img src="<?= base_url($val['PelatihanPhotoReal']); ?>">
										<div class="mask">                         
											<a class="course_more" href="<?= site_url("training/view/".$val['PelatihanId']); ?>">Lihat Detail</a>
										</div>
									</div>
									<div class="singCourse_content">
										<h3 class="singCourse_title">
											<a href="#"><?= $val['PelatihanTitle']; ?></a>
										</h3>
										<p class="singCourse_price"><span><?= $val['PelatihanBiaya']; ?></span></p>
										<p><?= $val['PelatihanDesc']; ?></p>
									</div>
								</div>
							</div>
							<?php endforeach;?>
						</div>
					</div>
					<!-- End related course -->
				</div>
			</div>
			<!-- End course content -->
		</div>
	</div>
</section>
    <!--=========== END COURSE BANNER SECTION ================-->