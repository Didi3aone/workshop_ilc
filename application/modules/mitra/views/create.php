<?php
    $id 		 = isset($item['mitra_id']) ? $item['mitra_id'] : "";
    $title       = isset($item['mitra_name']) ? $item['mitra_name'] : "";
    $image 		 = isset($item['mitra_photo']) ? $item['mitra_photo'] : "";
    $description = isset($item['mitra_desc']) ? $item['mitra_desc'] : "";

    $created_date = isset($item['mitra_created_date']) ? $item['mitra_created_date'] : "";
    $updated_date = isset($item['mitra_updated_date']) ? $item['mitra_updated_date'] : "";

    $btn_msg     = ($id == null) ? "Upload" : "Change"; 
?>
<!-- START ROW -->
<div id="content">
	<section id="widget-grid" class="">
		<div class="row">

			<!-- NEW COL START -->
			<article class="col-sm-12 col-md-12 col-lg-12">
				
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
						<h2><?php echo $title_page ?> </h2>				
						
					</header>

					<!-- widget div-->
					<div>
						<!-- widget content -->
						<div class="widget-body no-padding">
							
							<form id="form" class="smart-form" method="POST" action="<?= site_url('manager/mitra/process_form') ?>">
								<?php if($id != '' ) :?>
									<input type="hidden" name="id" value="<?= $id ?>">
								<?php endif;?>
								<fieldset>
									<div class="row">
										<section class="col col-lg-12">
											<label class="label">Name</label>
											<label class="input">
												<input type="text" name="name" value="<?= $title ?>" placeholder="Name">
											</label>
										</section>

										<section class="col col-lg-12">
											<label class="label">Link web</label>
											<label class="input">
												<input type="text" name="web" value="<?= $title ?>" placeholder="Link web">
											</label>
											<div class="note">OPSIONAL</div>
										</section>
									</div>
									<div class="row">
		                                <div class="col-xs-12">
		                                    <div id="image_preview_primary" class="add-image-preview"></div>
		                                </div>
										<section class="col col-6">
											<label class="label">Upload Foto mitra</label>
												<?php if(!empty($image)) :?>
													<a href="<?= base_url($image) ?>"  data-lightbox="roadtrip">
														<img src="<?= base_url($image) ?>" alt="" height=100 width=100></a>
												<?php endif; ?> &nbsp;
												<button type="button" id="addimage" data-maxsize="<?= MAX_UPLOAD_IMAGE_SIZE ?>" data-maxwords="<?= WORDS_MAX_UPLOAD_IMAGE_SIZE ?>" data-edit="0" class="btn btn-primary"><?= $btn_msg ?></button>
											 <div class="note"> Klik Button (add image) </div>
										</section>
									</div>

		                            <div class="row">
										<section class="col col-lg-12">
											<label class="label">Deskripsi</label>
											<label class="textarea"> 										
												<textarea name="desc" class="custom-scroll" style="max-height:180px;"><?= $description  ?></textarea>
											</label>
											<div class="note">OPSIONAL</div>
										</section>
									</div>

									<footer>
										<button type="submit" class="btn btn-submit btn-primary"> <i class="fa fa-save"></i>
											Save
										</button>
										<a href="<?= site_url() ?>manager/background" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
									</footer>
								</fieldset>
                                
								<fieldset>
									<div class="row">
										<?php if(!empty($created_date)) : ?>
										<section class="col col-lg-12">
											<label class="label"> Created Date</label>
											<label class="input"> 										
												<input type="text" name="" value="<?= $created_date ?>" readonly="readonly"> 
											</label>
										</section>
										<?php endif;?>
										<?php if(!empty($updated_date)) :?>
										<section class="col col-lg-12">
											<label class="label"> Updated Date</label>
											<label class="input"> 										
												<input type="text" name="" value="<?= $updated_date ?>" readonly="readonly"> 
											</label>
										</section>
										<?php endif;?>
									</div>
								</fieldset>
							</form>
						</div>
						<!-- end widget content -->
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
			</article>
			<!-- END COL -->	
		</div>
		<!-- END ROW -->
	</section>
</div>