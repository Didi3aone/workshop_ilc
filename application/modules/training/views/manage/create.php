<?php
    $id         = isset($datas["PelatihanId"]) ? $datas["PelatihanId"] : "";
    $title      = isset($datas["PelatihanTitle"]) ? $datas["PelatihanTitle"] : "";
    $company    = isset($datas["PelatihanCompany"]) ? $datas["PelatihanCompany"] : "";
    $real       = isset($datas["PelatihanPhotoReal"]) ? $datas["PelatihanPhotoReal"] : "";
    $photo      = isset($datas["PelatihanPhoto"]) ? $datas["PelatihanPhoto"] : "";
    $lokasi     = isset($datas["PelatihanLokasi"]) ? $datas["PelatihanLokasi"] : "";
    $biaya      = isset($datas["PelatihanBiaya"]) ? $datas["PelatihanBiaya"] : "";
    $start      = isset($datas["PelatihanStartDate"]) ? $datas["PelatihanStartDate"] : "";
    $end        = isset($datas["PelatihanEndDate"]) ? $datas["PelatihanEndDate"] : "";
    $desc       = isset($datas["PelatihanDesc"]) ? $datas["PelatihanDesc"] : "";
    $create     = isset($datas["PelatihanCreatedDate"]) ? $datas["PelatihanCreatedDate"] : "";
    $update     = isset($datas["PelatihanUpdatedDate"]) ? $datas["PelatihanUpdatedDate"] : "";
    $createdby  = isset($datas["username"]) ? $datas["username"] : "";
    $updatedby  = isset($datas["username`"]) ? $datas["username`"] : "";

    $btn_msg = ($id == 0) ? "Create" : " Update";
    $btn_up_msg = ($id == 0) ? "Upload" : " Change";
    $title_msg = ($id == 0) ? "Create" : " Update";
?>
<!-- MAIN CONTENT -->
<div id="content">
    <div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
			<h1 class="page-title txt-color-blueDark"><?= $title_page ?></h1>
		</div>
	</div>

    <!-- widget grid -->
    <section id="widget-grid" class="">

        <div class="row">
            <!-- NEW WIDGET ROW START -->
            <article class="col-sm-12 col-md-12 col-lg-12">
                <!-- Widget ID (each widget will need unique ID)-->
                <div class="jarviswidget" id="wid-id-0"
                data-widget-editbutton="false"
                data-widget-deletebutton="false">
                    <header>
                        <span class="widget-icon"> <i class="fa fa-pencil-square-o"></i> </span>
                        <h2>Form Workshop</h2>

                    </header>
                    <!-- widget div-->
                    <div>
                        <form id="form" class="smart-form" method="POST" action="<?= site_url('manager/training/process_form') ?>" enctype='multipart/form-data'>
                            <?php if($id != 0): ?>
                                <input type="hidden" name="id" value="<?= $id ?>" />
                            <?php endif; ?>
                            <fieldset>
                                
                                <section>
                                    <label class="label">Judul <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="title" value="<?= $title ?>" placeholder="Judul">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Lokasi <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="lokasi" value="<?= $lokasi; ?>" placeholder="Lokasi">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Biaya <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="biaya" value="<?= $biaya; ?>" placeholder="Biaya">
                                    </label>
                                </section>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Tanggal Mulai <sup class="color-red">*</sup></label>
                                        <label class="input">
                                            <input type="text" name="dates" class="datetimepicker1" value="<?= $start; ?>" placeholder="Tanggal Mulai">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Tanggal Selesai</label>
                                        <label class="input">
                                            <input type="text" name="enddates" class="datepickers" value="<?= $end; ?>" placeholder="Tanggal Selesai">
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div id="image_preview_primary" class="add-image-preview"></div>
                                    </div>
                                    <section class="col col-6">
                                        <label class="label">Upload Brosur</label>
                                            <?php if(!empty($photo)) :?>
                                                <a href="<?= base_url($photo) ?>"  data-lightbox="roadtrip">
                                                    <img src="<?= base_url($photo) ?>" alt="" height=100 width=100></a>
                                            <?php endif; ?> &nbsp;
                                            <button type="button" id="addimage" data-maxsize="<?= MAX_UPLOAD_IMAGE_SIZE ?>" data-maxwords="<?= WORDS_MAX_UPLOAD_IMAGE_SIZE ?>" data-edit="0" class="btn btn-primary"><?= $btn_up_msg ?></button>
                                         <div class="note"> Klik Button (add image) Brosur</div>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Upload Real Brosur</label>
                                        <label class="input">
                                            <?php 
                                                if( !empty($real) ) : ?>
                                                    <img src="<?= base_url($real); ?>" id="imgprev" width=160 alt="">
                                                    <button type="button" class="btn btn-primary klik">Change</button></br>
                                                    <input type="file" id="img" style="display: none; margin-top: 10px;" name="real_image">
                                                    <?php else : ?>
                                                    <input type="file" name="real_image">
                                                <?php endif;
                                            ?>
                                        </label>
                                        <div class="note"> Untuk di slide rekomendasi ukuran file 1024x600</div>
                                    </section>
                                </div>

                                <section>
                                    <label class="label">Deskripsi</label>
                                    <label class="textarea">
                                        <textarea name="desc" class="tinymce"><?= $desc; ?></textarea>
                                    </label>
                                </section>

                                <footer>
									<button type="submit" class="btn btn-submit btn-primary"> <i class="fa fa-save"></i>
										<?= $btn_msg; ?>
									</button>
									<a href="<?= site_url() ?>manager/training" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
								</footer>

                            </fieldset>

                            <fieldset>
                                <div class="row">
                                    <p>Informasi tambahan</p>
                                    <?php if(!empty($create)) : ?>
                                    <section class="col col-lg-12">
                                        <label class="label"> Created Date</label>
                                        <label class="input">                                       
                                            <input type="text" name="" value="<?= $create ?>" readonly="readonly"> 
                                        </label>
                                    </section>
                                    <?php endif;?>

                                    <?php if(!empty($update)) :?>
                                    <section class="col col-lg-12">
                                        <label class="label"> Updated Date</label>
                                        <label class="input">                                       
                                            <input type="text" name="" value="<?= $update ?>" readonly="readonly"> 
                                        </label>
                                    </section>
                                    <?php endif;?>

                                    <?php if(!empty($createdby)) :?>
                                    <section class="col col-lg-12">
                                        <label class="label"> Created By</label>
                                        <label class="input">                                       
                                            <input type="text" name="" value="<?= $createdby ?>" readonly="readonly"> 
                                        </label>
                                    </section>
                                    <?php endif;?>

                                    <?php if(!empty($updatedby)) :?>
                                    <section class="col col-lg-12">
                                        <label class="label"> Updated By</label>
                                        <label class="input">                                       
                                            <input type="text" name="" value="<?= $updatedby ?>" readonly="readonly"> 
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
            </article>
        </div>
    </section> <!-- end widget grid -->
</div> <!-- END MAIN CONTENT -->