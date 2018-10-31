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
		<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4 col-lg-offset-1 text-right">
            <h1>
                <a class="btn btn-primary" href="<?= site_url(); ?>manager/training" rel="tooltip" title="back" data-placement="left">
                    <i class="fa fa-arrow-left fa-lg"></i>
                </a>
            </h1>
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
                                    <label class="label">Judul</label>
                                    <label class="input">
                                        <input type="text" name="title" readonly value="<?= $title ?>" placeholder="Judul">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Lokasi </label>
                                    <label class="input">
                                        <input type="text" name="lokasi" readonly value="<?= $lokasi; ?>" placeholder="Lokasi">
                                    </label>
                                </section>

                                <section>
                                    <label class="label">Biaya </label>
                                    <label class="input">
                                        <input type="text" name="biaya" readonly value="<?= $biaya; ?>" placeholder="Biaya">
                                    </label>
                                </section>
                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Tanggal Mulai</label>
                                        <label class="input">
                                            <input type="text" name="dates" readonly value="<?= $start; ?>" placeholder="Tanggal Mulai">
                                        </label>
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Tanggal Selesai</label>
                                        <label class="input">
                                            <input type="text" name="enddates" readonly value="<?= $end; ?>" placeholder="Tanggal Selesai">
                                        </label>
                                    </section>
                                </div>

                                <div class="row">
                                    <section class="col col-6">
                                        <label class="label">Upload Brosur</label>
                                            <?php if(!empty($photo)) :?>
                                                <a href="<?= base_url($photo) ?>"  data-lightbox="roadtrip">
                                                    <img src="<?= base_url($photo) ?>" alt="" height=100 width=100>
                                                </a>
                                            <?php endif; ?> &nbsp;
                                    </section>

                                    <section class="col col-6">
                                        <label class="label">Upload Real Brosur</label>
                                        <label class="input">
                                            <?php 
                                                if( !empty($real) ) : ?>
                                                	<a href="<?= base_url($real); ?>" data-lightbox="roadtrip">
	                                                    <img src="<?= base_url($real); ?>" id="imgprev" width=160 alt="">
	                                                </a>
                                                <?php endif;
                                            ?>
                                        </label>
                                    </section>
                                </div>

                                <section>
                                    <label class="label">Deskripsi</label>
                                    <label class="textarea">
                                        <textarea name="desc" class="tinymce"><?= $desc; ?></textarea>
                                    </label>
                                </section>

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