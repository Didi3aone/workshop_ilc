<?php
    $id                 = isset($datas["PelatihanId"]) ? $datas["PelatihanId"] : "";
    $image 	            = isset($datas["PelatihanId"]) ? $datas["PelatihanId"] : "";

    $btn_msg = ($id == 0) ? "Create" : " Update";
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
                        <form id="form" class="smart-form" method="POST" action="<?= site_url('manager/training/process_form') ?>">
                            <?php if($id != 0): ?>
                                <input type="hidden" name="id" value="<?= $id ?>" />
                            <?php endif; ?>
                            <fieldset>
                                
                                <section>
                                    <label class="label">Judul <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="title" value="" placeholder="Judul">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Perusahaan <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="company" value="" placeholder="Perusahaan">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Lokasi <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="lokasi" value="" placeholder="Lokasi">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Biaya <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="biaya" value="" placeholder="Biaya">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Tanggal Pelaksana <sup class="color-red">*</sup></label>
                                    <label class="input">
                                        <input type="text" name="dates" class="datepicker" value="" placeholder="Tanggal Pelaksana">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Deskripsi</label>
                                    <label class="textarea">
                                        <textarea name="desc" class="tinymce"></textarea>
                                    </label>
                                </section>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div id="image_preview_primary" class="add-image-preview"></div>
                                    </div>
                                    <section class="col col-6">
                                        <label class="label">Upload Brosur</label>
                                            <?php if(!empty($image)) :?>
                                                <a href="<?= base_url($image) ?>"  data-lightbox="roadtrip">
                                                    <img src="<?= base_url($image) ?>" alt="" height=100 width=100></a>
                                            <?php endif; ?> &nbsp;
                                            <button type="button" id="addimage" data-maxsize="<?= MAX_UPLOAD_IMAGE_SIZE ?>" data-maxwords="<?= WORDS_MAX_UPLOAD_IMAGE_SIZE ?>" data-edit="0" class="btn btn-primary"><?= $btn_msg ?></button>
                                         <div class="note"> Klik Button (add image) Brosur</div>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">File Real</label>
                                        <label class="input">
                                            <input type="file" name="real_image" class="form-control" placeholder="File Real" value="" /> <br>
                                            <?php if($image): ?>
                                            <div class="file_tech_div">
                                                <img src="<?= base_url($image) ?>" style="width: 90px;height: 70px;">
                                            <?php  endif; ?>
                                        </label>
                                        <div class="note"> File Ukuran asli</div>
                                    </section>
                                </div>

                                <footer>
									<button type="submit" class="btn btn-submit btn-primary"> <i class="fa fa-save"></i>
										Save
									</button>
									<a href="<?= site_url() ?>manager/training" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Cancel</a>
								</footer>

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